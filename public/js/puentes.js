let tablePuentes = $("#tablePuentes").DataTable({
    destroy: true,
    "processing": true,
    "serverSide": true,
    'sServerMethod': "POST",
    "ajax": {
        "url": base_url+"puentes/listarPuentes",
        "type": "POST",
    },
    "order": [ 0, 'desc' ],
    "columns": [
    {
        data: 'denominacion',
        title: 'NOMBRE VIA'
	},
	{
		data: 'id_estado_puente',
        title: 'ESTADO'
	},{
		data: 'id_tipo_puente',
        title: 'PUENTE'
	},{
		data: 'fecha_inaguracion',
        title: 'FEC. INAGURACION'
	},{
		data: 'cimiento_id_material',
        title: 'CIMIENTO'
	},{
		data: 'superficie_id_material',
        title: 'SUPERFICIE'
	},{
		data: 'nombre_via',
        title: 'VIA'
	},{
		data: 'referencia',
        title: 'REFERENCIA'
	},{
		data: 'latitud',
        title: 'LATITUD'
	},{
		data: 'longitud',
        title: 'LONGITUD'
	}
    ],
    "columnDefs":[{
        "title" : "ACCIONES",
        "targets" : 10,
        "data" : null,
        "render" : function(){
            return `<button type="button" class="btn btn-icon btn-round btn-primary"><i class="fa fa-edit"></i></button>`;
        }
    }]

}).on('click', 'button', function(event) {
    event.preventDefault();
    let full = tablePuentes.row($(this).parents('tr')).data();
    llamarModal('Agregar Puente', full);
});


$("#btnAgregar").click(function(){
	let title = "Nuevo Puente"
	llamarModal(title);
})



function llamarModal(title, full = false){
	console.log('full', full)
	let template =  document.getElementById('tmpVias').innerHTML;
	let rendered = Mustache.render(template, {
		id 					: full.id_puente,
		denominacion		: full.denominacion,
		estado				: full.id_estado_puente,
		tipo_puente			: full.id_tipo_puente,
		fecha_inaguracion	: full.fecha_inaguracion,
		cimientos			: full.cimiento_id_material,
		superficie			: full.superficie_id_material,
		Nombre_via			: full.Nombre_via,
		referencia			: full.referencia,
		distrito			: full.distrito,
		latitud				: full.latitud,
		longitud			: full.longitud,

		estadosOption		:[
			{val:0 , txt: 'Malo'},
			{val:1 , txt: 'Regular'},
			{val:2 , txt: 'Bueno'}
		],
		selected: function() {
            if (this.val==full.id_estado_puente) return "selected";
            return "";
		},
		
		puenteOption		:[
			{val:0 , txt: 'Peatonal'},
			{val:1 , txt: 'Vehicular'},
			{val:2 , txt: 'Intercambio Vial'},
			{val:3 , txt: 'Modular'},
			{val:4 , txt: 'Tunel'}

		],
		selecPuente: function() {
            if (this.val==full.id_tipo_puente) return "selected";
            return "";
		},

		cimientoOption		:[
			{val:0 , txt:'Concreto'},
			{val:1 , txt:'Metalico'},
			{val:2 , txt:'Acero'}
		],
		selecCimiento: function() {
            if (this.val==full.cimiento_id_material) return "selected";
            return "";
		},

		superficieOption		:[
			{val:0 , txt:'Concreto'},
			{val:1 , txt:'Metalico'},
			{val:2 , txt:'Acero'}
		],
		selecSuperficie: function() {
            if (this.val==full.superficie_id_material) return "selected";
            return "";
		},

	});

	BootstrapDialog.show({
		title: title,
		message : rendered,
		size: BootstrapDialog.SIZE_WIDE,
		buttons : [{
			label: "Cancelar",
			cssClass : "btn btn-secondary rounded-0",
			action: function(dialogRef) {
				dialogRef.close();
			}
		},{
			label: 'Guardar Cambios',
			cssClass: 'btn btn-danger rounded-0 m-0',
			autospin: true,
			action: function(dialogRef) {
				let btnClick = this;
                $("#formPuente").validate({
                    invalidHandler: function(event, validator) {
                        button(dialogRef, btnClick, true);
                    },
                    submitHandler: function(form){
                        $.ajax({
                            url: `${base_url}/puentes/registrar`,
                            type: 'POST',
                            dataType: 'json',
                            data: $(form).serialize(),
                        })
                        .done(function(response) {
                            let res = response;
                            if (res.result == "OK") {
                                msj(res.result, res.msj);
                                dialogRef.close();                                
                            }else{
                                msj(res.result, res.msj);
                                button(dialogRef, btnClick, true);
                            }
                        })
                        .fail(function() {
                            console.log('fail');
                        })
                        .always(function() {
                            console.log("complete");
                        });
                        return false;
                    }
                });
                $("#formPuente").submit();
			}
		}],
		onhide: function(dialogRef){
			tablePuentes.ajax.reload();
		}
	});
}