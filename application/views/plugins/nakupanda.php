<link href="<?php echo base_url('public/'); ?>plugins/bootstrap4-dialog/dist/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url('public/'); ?>plugins/bootstrap4-dialog/dist/js/bootstrap-dialog.js" type="text/javascript"></script>
<style type="text/css" media="screen">
	.bootstrap-dialog .modal-header{
		border-radius: 0px 0px 0px 0 
	}
	.modal-content{
		border-radius: 0px 0px 0px 0px
	}
	.modal-header{
		border-bottom: none;
	}
	
	.bootstrap-dialog-header{
		width: 100%;
		text-align: center
	}
	.bootstrap-dialog .bootstrap-dialog-message{
		font-size: inherit;
	}
	.bootstrap-dialog-header .bootstrap-dialog-title{
		font-size: 24px;
		font-weight: 600;
	}
	.modal-body{
		padding: 30px;
		padding-bottom: 5px;
		padding-top: 15px;
		background-color: white;
	}
	.modal-footer{
		padding: 30px;
		padding-top: 10px;
		justify-content: center;
		border-top: none;
		background-color: white;
		border-radius: 0px 0px 0px 0px
	}
	.modal-footer>*{
		margin: 0px;
		/*margin-left: .25rem;
		margin-right: .25rem;*/
	}


		
.modal-full .modal-dialog{
	min-width: 100%!important;
	margin: 0!important;
}
.modal-full .modal-dialog .modal-content{
	height: 100vh;
}
.modal-full .modal-dialog .modal-content .modal-body{
	padding-left: 15px;
	padding-right: 15px;
}











</style>
<script type="text/javascript">
	BootstrapDialog.defaultOptions = {
		type: BootstrapDialog.TYPE_SUCCESS,
		closeByBackdrop: false,
		closeByKeyboard: false,
		nl2br: false,
		closable: true,
		closeIcon: '&#215;',
		autodestroy: true,
		draggable: true,
		// btnsOrder: BootstrapDialog.BUTTONS_ORDER_CANCEL_OK,
		spinicon: 'fa fa-spinner fa-fw',
	}
</script>