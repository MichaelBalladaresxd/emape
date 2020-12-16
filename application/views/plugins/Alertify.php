
<link href="<?php echo base_url('public/'); ?>plugins/alertifyjs/css/alertify.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('public/'); ?>plugins/alertifyjs/css/themes/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url('public/'); ?>plugins/alertifyjs/alertify.min.js" type="text/javascript"></script>
<style>
	.alertify .ajs-dialog {
		border-radius: 0px;
	}
</style>
<script type="text/javascript">
	// alertify.defaults.transition = "slide";
	alertify.defaults.theme.ok = "btn btn-default";
	alertify.defaults.theme.cancel = "btn btn-danger";
	alertify.defaults.theme.input = "form-control";
	alertify.defaults.closableByDimmer = false;
</script>