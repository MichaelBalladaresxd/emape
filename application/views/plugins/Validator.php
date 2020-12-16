<script src="<?php echo base_url('public/'); ?>plugins/jquery-validation-1.17.0/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url('public/'); ?>plugins/jquery-validation-1.17.0/dist/additional-methods.js" type="text/javascript"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.1/umd/popper.js" type="text/javascript"></script> -->

<?php 
$idioma = (isset($_SESSION['idioma']))?$_SESSION['idioma']:'es';
switch ($idioma) {
	case 'es':
	?>
	<script src="<?php echo base_url('public/plugins/'); ?>jquery-validation-1.17.0/src/localization/messages_es_PE.js" type="text/javascript"></script>
	<?php
	break;
	case 'en':
	?>
	<?php
	break;
	case 'pt':
	?>
	<script src="<?php echo base_url('public/plugins/'); ?>jquery-validation-1.17.0/src/localization/messages_pt_BR.js" type="text/javascript"></script>
	<?php	
	break;
}
?>
<script>
	function reset(){
		$("form div.has-error").removeClass('has-error');
		$("form input").prop('disabled', false);
		$("form input").val("");
		$("form input[type='file']").val("");
		$("form textarea").siblings(".help-block").remove();
		$("form textarea").prop('disabled', false);
		$("form textarea").val("");
		$("form input").siblings(".help-block").remove();
		$("form select").siblings(".help-block").remove();
		$("form select").prop('selectedIndex',0)
		$('form')[0].reset();
	}
	
	$.validator.addMethod('seleccionarTabla', function (value, element, param) {
		console.log(value);
		console.log(element);
		console.log(param);
		var countTableSelect = tableFacturasTemporales.rows({selected: true}).count();
		console.log(countTableSelect);
		if(countTableSelect > 0){
			return true;
		}
	}, 'El tamaño del archivo debe ser menor que Mb');

	$.validator.addMethod("email_permitidos", function(value, element) {
		var re = /[a-zA-Z0-9@]+(?=hotmail.com|HOTMAIL.COM|yahoo.com|gmail.com|GMAIL.COM|YAHOO.COM)/;
		var flag = re.test(value);
		// console.log("flag", flag);
		if(!flag) return true;
		else return false;
	});

	$.validator.addMethod('filesize', function (value, element, param) {
		// console.log(((element.files[0].size)/1000)/1000);
		if(value!=''){
			console.log("asd",this.optional(element));
			return this.optional(element) || (((element.files[0].size)/1000)/1000 <= param);
		}
	}, 'El tamaño del archivo debe ser menor que {0}Mb');

	$.validator.addMethod("dni", function(value, element) {
		// console.log("dni",value.length);
		if(value.length==8){
			if((value=='00000000') || (value=='11111111') || (value=='12345678') || (value=='22222222') || (value=='33333333') || (value=='44444444') || (value=='55555555') || (value=='66666666') || (value=='77777777') || (value=='88888888') || (value=='99999999')) {
				return false;
			}else{
				return /^([0-9])*$/.test(value);
			}
		}else{
			return false;
		}
	}, "Ingrese solo DNI Valido");

	$.validator.addMethod("ruc", function(value, element) {
		if(value.length==0){
			return true;
		}else if(value.length==11){
			var iniRuc = value.substr(0, 2);
			console.log("total de caracteres bien", iniRuc);
			if (iniRuc == 10 || iniRuc =='10' || iniRuc == 15 || iniRuc =='15' || iniRuc == 20 || iniRuc =='20') {
				return /^([0-9])*$/.test(value);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}, "Ingrese solo RUC Valido");

	$.validator.addMethod("ruc20", function(value, element) {
		if(value.length==0){
			return true;
		}else if(value.length==11){
			var iniRuc = value.substr(0, 2);
			console.log("total de caracteres bien", iniRuc);
			if (iniRuc == 20 || iniRuc =='20') {
				return /^([0-9])*$/.test(value);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}, "Ingrese solo RUC Valido, solo persona Juridica RUC inicia con \"20\"");

	$.validator.setDefaults({
		highlight: function(element) {
			$(element).closest('.form-group').addClass('has-error has-feedback');
		},
		unhighlight: function(element) {
			$(element).closest('.form-group').removeClass('has-error has-feedback');
		},
		errorElement: 'span',
		errorClass: 'invalid-feedback',
		errorPlacement: function(error, element) {
			// console.log(error);
			// console.log(element);
			if(element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
				if (element.hasClass('selectgroup-input')) {
					error.appendTo(element.parent().parent().parent());
				}else{
					error.appendTo(element.parent().parent());
				}
			}else if (element.prop('type') === 'file') {
				error.appendTo(element.parent().parent().parent());
			}else {
				error.insertAfter(element);
			}
		}
	});
	// $.validator.setDefaults({
	// 	success: "valid",
	// 	onkeyup: false,
	// 	// onclick: false,
	// 	errorElement: "span",
	// 	errorClass: "help-block",
	// 	highlight: function (element, errorClass, validClass) {
	// 		if (!$(element).hasClass('novalidation')) {
	// 			$(element).parents('.form-group').addClass('has-error');
	// 		}else{
	// 			$(element).parents('.form-group').addClass('has-error');
	// 		}
	// 	},
	// 	unhighlight: function (element, errorClass, validClass) {
	// 		if (!$(element).hasClass('novalidation')) {
	// 			$(element).parents('.form-group').removeClass('has-error');
	// 		}else{
	// 			$(element).parents('.form-group').removeClass('has-error');

	// 		}
	// 	},
	// 	errorPlacement: function (error, element) {
	// 		if (element.parent('.input-group').length) {

	// 		}
	// 		else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
	// 			error.appendTo(element.parent().parent());
	// 		}
	// 		else if (element.prop('type') === 'file') {
	// 			error.appendTo(element.parent().parent().parent().parent());
	// 		}
	// 		else if (element.hasClass("summernote")) {
	// 			error.insertAfter(element.siblings(".note-editor"));
	// 		}
	// 		else if (element.is("textarea")) {
	// 			error.insertAfter(element.next());
	// 		}
	// 		else {
	// 			error.insertAfter(element);
	// 		}

	// 	}
	// });
</script>