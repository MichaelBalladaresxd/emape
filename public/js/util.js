$(function() {	
	activeItemSideBar();
	$('[data-toggle="tooltip"]').tooltip();
});

function msj(error, mensaje){
	if (error=='OK') {
		alertify.success(mensaje).dismissOthers();
	}else{
		alertify.error(mensaje).dismissOthers();
	}
}

function msjsSwal(error, mensaje, timer = true){
	if (error=='OK') {
		if (timer == true) {
			swal({
				title: mensaje,
				html: true,
				type: 'success',
				showConfirmButton: false,
				timer: 3000
			});
		}else{
			swal({
				html: true,
				confirmButtonText: "Entendido",
				confirmButtonClass: "btn-primary btn-sm",
				title: mensaje,
				type: 'success'				
			});
		}
	}else{
		if (timer == true) {
			swal({
				html: true,
				title: mensaje,
				type: 'error',
				showConfirmButton: false,
				timer: 3000
			});
		}else{
			swal({
				html: true,
				confirmButtonText: "Entendido",
				confirmButtonClass: "btn-primary btn-sm",
				title: mensaje,
				type: 'error',
			});	
		}
	}
}

function load(modo, mensaje=false){
	if (modo == 'on') {
		$('body').loadingModal({
			position:'auto',
			text: mensaje,
			color:'#fff',
			opacity:'0.7',
			backgroundColor:'rgb(0,0,0)',
			animation:'foldingCube'
		});
		$('body').loadingModal('show');
		$('form').find('button').prop('disabled',true);
		// $("#preCarga").modal('show');
	}else{
		$('body').loadingModal('hide');
		$('body').loadingModal('destroy');
		$('form').find('button').prop('disabled',false);
	}
}

function mostrarError($form, $element){
	// mostrar errores para jqueryValide
	$form.showErrors($element);
}

function fechaAmigable($data){
	if ($data == '0000-00-00') {
		return "";
	}else{
		return moment($data).format('dddd[,] LL')
	}
	// return moment($data).format('dddd DD [de] MMMM [del] YYYY')
}

function fechaAmigableSinDia($data){
	return moment($data).format('LL')
	// return moment($data).format('dddd DD [de] MMMM [del] YYYY')
}




function reload(table){
	$(table.containers()).find(".reloadTable").click();
}

function activeItemSideBar(){
	// mostrar el Item activo en el sideBar
	var urlActual = window.location.href;
	var sidebar = $("#sideBar");
	$(sidebar).find('li').removeClass('active');
	var urlsSideBar = $(sidebar).find('a');
	$.each(urlsSideBar, function(index, val) {
		if (urlActual == $(val).attr('href')) {
		// console.log(urlActual);
		// console.log($(val).attr('href'));
		// console.log($(val).closest('li'));
		$(val).closest('li').addClass('active');
	}
});
}



function errorAjax(jqXHR, textStatus, errorThrown){
	if (jqXHR.status == 404) {
		console.log(textStatus, "Recurso no encontrado.");
	}
	console.log(jqXHR);
	console.log(textStatus);
	console.log(errorThrown);
}
// $(document).ready(function(){
// 	$('[data-toggle="tooltip"]').tooltip();
// });


// $(document).ajaxError(function(event,request,settings){ 
// 	// console.log("rrrrrrrrrrrrrrrr");
// 	msj('ERROR', 'Ocurrio un problema al comunicarse con el servidor');
// });

// $(document).ajaxStart(function(event,request,settings){ 
// 	// console.log("aaaaaaaaaaaaaaaaa");
// 	load('on');
// })

// $(document).ajaxComplete(function(event,request,settings){ 
// 	// console.log("zzzzzzzzzzzzzzzzzzzz");
// 	load('off');
// })

$(document).ajaxSuccess(function( event, xhr, settings){ 
	console.log(event);
	console.log(xhr);
	console.log(settings);
})



// function crearExcel($cabecera, $body, $nombreExcel = false, $nombreHoja = false){

// 	var createXLSLFormatObj = [];
// 	/* XLS Head Columns */
// 	var xlsHeader = $cabecera;

// 	/* XLS Rows Data */
// 	var xlsRows = $body;


// 	createXLSLFormatObj.push(xlsHeader);
// 	$.each(xlsRows, function(index, value) {
// 		var innerRowData = [];
// 		$.each(value, function(ind, val) {
// 			if (ind == 'url') {
// 				innerRowData.push(base_url+val);
// 			}else{
// 				innerRowData.push(val);
// 			}
// 		});
// 		createXLSLFormatObj.push(innerRowData);
// 	});

// 	var nameExcel = (($nombreExcel==false)?'excel-':$nombreExcel+"-")+moment().format("DD-MM-YYYY");
// 	/* File Name */
// 	var filename = nameExcel+".xlsx";

// 	/* Sheet Name */
// 	var ws_name = ($nombreHoja==false)?null:$nombreHoja;

// 	// if (typeof console !== 'undefined') console.log(new Date());
// 	var wb = XLSX.utils.book_new(),
// 	ws = XLSX.utils.aoa_to_sheet(createXLSLFormatObj);

// 	/* Add worksheet to workbook */
// 	XLSX.utils.book_append_sheet(wb, ws, ws_name);

// 	/* Write workbook and Download */
// 	if (typeof console !== 'undefined') console.log(new Date());
// 	XLSX.writeFile(wb, filename);
// 	if (typeof console !== 'undefined') console.log(new Date());
// }

function button(modal, btnClick, estado){
	if (estado == true) {
		btnClick.find('span').remove();
	}
	modal.enableButtons(estado);
}

