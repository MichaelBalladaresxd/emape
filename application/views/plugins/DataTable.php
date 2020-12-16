<?php 
$urlDtatable = base_url().'public/plugins/dataTables/';
?>


<link rel="stylesheet" type="text/css" href="<?php echo $urlDtatable; ?>DataTables-1.10.21/css/dataTables.bootstrap4.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $urlDtatable; ?>Buttons-1.6.2/css/buttons.bootstrap4.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $urlDtatable; ?>FixedHeader-3.1.7/css/fixedHeader.bootstrap4.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $urlDtatable; ?>RowGroup-1.1.2/css/rowGroup.bootstrap4.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $urlDtatable; ?>Select-1.3.1/css/select.bootstrap4.css"/>

<!-- <script type="text/javascript" src="<?php echo $urlDtatable; ?>jQuery-3.3.1/jquery-3.3.1.js"></script> -->
<script type="text/javascript" src="<?php echo $urlDtatable; ?>JSZip-2.5.0/jszip.js"></script>
<script type="text/javascript" src="<?php echo $urlDtatable; ?>pdfmake-0.1.36/pdfmake.js"></script>
<script type="text/javascript" src="<?php echo $urlDtatable; ?>pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo $urlDtatable; ?>DataTables-1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo $urlDtatable; ?>DataTables-1.10.21/js/dataTables.bootstrap4.js"></script> 
<script type="text/javascript" src="<?php echo $urlDtatable; ?>Buttons-1.6.2/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="<?php echo $urlDtatable; ?>Buttons-1.6.2/js/buttons.bootstrap4.js"></script>
<script type="text/javascript" src="<?php echo $urlDtatable; ?>Buttons-1.6.2/js/buttons.colVis.js"></script>
<script type="text/javascript" src="<?php echo $urlDtatable; ?>Buttons-1.6.2/js/buttons.flash.js"></script>
<script type="text/javascript" src="<?php echo $urlDtatable; ?>Buttons-1.6.2/js/buttons.html5.js"></script>
<script type="text/javascript" src="<?php echo $urlDtatable; ?>Buttons-1.6.2/js/buttons.print.js"></script>
<script type="text/javascript" src="<?php echo $urlDtatable; ?>FixedHeader-3.1.7/js/dataTables.fixedHeader.js"></script>
<script type="text/javascript" src="<?php echo $urlDtatable; ?>RowGroup-1.1.2/js/dataTables.rowGroup.js"></script>
<!-- <script type="text/javascript" src="<?php echo $urlDtatable; ?>Select-1.3.1/js/dataTables.select.js"></script> -->

<script type="text/javascript">
	
	// $.fn.dataTable.ext.errMode = 'none';
	$.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) { 
		console.log(settings);
		console.log(message);
		console.log(helpPage);
		var message = (typeof techNote === "undefined")?'Su sesión expiro':'Ocurrió un error inesperado, comuniquese con el administror de TI';
		// msjsSwal('ERROR', message, true);
	};
	
	// $('.table').on('error.dt', function(e, settings, techNote, message) {
	// 	console.log(message);
	// 	var message = (typeof techNote === "undefined")?'Su sesión expiro':'Ocurrió un error inesperado, comuniquese con el administror de TI';
	// 	msjsSwal('ERROR', message, true);
	// });


	$.extend(true, $.fn.dataTable.defaults, {
		getData: function(){
			// $(".dataTables_processing").removeClass('panel panel-default').addClass('alert alert-dismissible alert-danger');
			// console.log("getData");
			
		},
		preDrawCallback: function(){
			var groupbuttons = $(".dt-buttons");
			groupbuttons.addClass('btn-group');
		},
		drawCallback : function(){
		},
		language:{
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			},
			"buttons": {
				"copy": "Copiar",
				"colvis": "Visibilidad"
			}
		},
	})
	
</script>

