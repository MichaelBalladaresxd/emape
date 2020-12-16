let tableVias = $("#tableVias").DataTable({
    destroy: true,
    "processing": true,
    "serverSide": true,
    'sServerMethod': "POST",
    "ajax": {
        "url": base_url+"vias/listarVias",
        "type": "POST",
    },
    "order": [ 0, 'desc' ],
    "columns": [
    {
        data: 'NOMBRE_VIA',
        title: 'NOMBRE VIA'
    },{
        data: 'NOMBRE', 
        title: 'TRAMO',
    },{
        data: 'CDRA_INI', 
        title: 'CDRA INICIAL',
    },{
        data: 'CDRA_FINAL',
        title: 'CDRA FINAL',
    },{
        title: 'DISTRITO',
        data: 'DISTRITO', 
    }
    ],
    "columnDefs":[{
        "title" : "ACCIONES",
        "targets" : 5,
        "data" : null,
        "render" : function(){
            return `<button type="button" class="btn btn-icon btn-round btn-primary"><i class="fa fa-edit"></i></button>`;
        }
    }]

}).on('click', 'button', function(event) {
    event.preventDefault();
    let full = tableVias.row($(this).parents('tr')).data();
    llamarModal('Agregar Vias', full);
});

$("#btnAgregarVias").click(function(){
    llamarModal('Agregar Vias')
})

function llamarModal(title, full = false){
    console.log(full);
    let template =  document.getElementById('tmpVias').innerHTML;
    let rendered = Mustache.render(template, {
        nombre_via          :full.NOMBRE_VIA,
        tipo_servicio       :full.TIPO,
        tramo               :full.NOMBRE,
        cdra_ini            :full.CDRA_INI,
        cdra_fin            :full.CDRA_FINAL,
        distrito            :full.DISTRITO,
        fec_desde           :full.tiempo_desde,
        fec_hasta           :full.tiempo_hasta,
        id                  :full.ID ,
        via                 :full.id_via,
        ini_lat             :full.inicial_lat,
        ini_long            :full.inicial_long,
        fin_lat             :full.final_lat,
        fin_long            :full.final_long,

        options              : [
        {val : 0 , txt: 'Administrada'},
        {val : 1 , txt: 'Encargada'}
        ],
        selected: function() {
            if (this.val==full.TIPO) return "selected";
            return "";
        }   ,
        
        optionVia : [
        {val:1, txt:'Vía Expresa Javier Prado'},
        {val:2, txt:'Vía Expresa Miguel Grau'},
        {val:3, txt:'Vía Expresa Paseo de la Republica'},
        {val:4, txt:'Av. Caqueta'},
        {val:5, txt:'Av. Alfonso Ugarte'},
        {val:6, txt:'Av. 9 de Diciembre (Paseo Colon)'},
        {val:7, txt:'Autopista Ramiro Priale'},
        {val:8, txt:'AV. Universitaria'},
        {val:9, txt:'Av. Costa Verde'},
        {val:10, txt:'A la vía expresa paseo de la república - plaza Grau'},
        {val:11, txt:'A la vía de evitamiento trébol Caquetá'},
        {val:12, txt:'A la vía evitamiento Pte. Santa rosa'},
        {val:13, txt:'A la vía evitamiento Pte. Ricardo palma'},
        {val:14, txt:'A la vía evitamiento Pte. Huánuco'}
            //RECORRER DATOS PARA MOSTRAR EN EL SELECT LAS VIAS
            ],
            selectedVia: function() {
                if (this.val==full.id_via) return "selected";
                return "";
            } 
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
                $("#formViasAdd").validate({
                    invalidHandler: function(event, validator) {
                        button(dialogRef, btnClick, true);
                    },
                    submitHandler: function(form){
                        $.ajax({
                            url: `${base_url}/vias/registrar`,
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
                $("#formViasAdd").submit();
            }
        }],
        onshown: function(dialogRef, demo){
            $(".btnGPS").click(function(){
                console.log(this);
                let lat = $(this).closest('.form-group').find('input[data-gps="latitud"]').val();
                let long = $(this).closest('.form-group').find('input[data-gps="longitud"]').val();
                llamarModalMapa(this);
                if (lat != false && long != false) {
                    const pos = {
                        lat: parseFloat(lat),
                        lng: parseFloat(long),
                    };
                    setTimeout(function(){
                        console.log(pos)
                        newMarker(pos);
                    },2000)
                }
            });
        },
        onhide: function(dialogRef){

           tableVias.ajax.reload();
       },
   })
}



