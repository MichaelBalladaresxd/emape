<link href="<?php echo base_url('public/'); ?>plugins/bootstrap-fileinput-master/css/fileinput.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url('public/'); ?>plugins/bootstrap-fileinput-master/css/fileinput-rtl.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url('public/'); ?>plugins/bootstrap-fileinput-master/js/fileinput.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('public/'); ?>plugins/bootstrap-fileinput-master/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('public/'); ?>plugins/bootstrap-fileinput-master/js/plugins/purify.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('public/'); ?>plugins/bootstrap-fileinput-master/js/plugins/piexif.min.js" type="text/javascript"></script>

<script src="<?php echo base_url('public/'); ?>plugins/bootstrap-fileinput-master/themes/fa/theme.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('public/'); ?>plugins/bootstrap-fileinput-master/themes/gly/theme.js" type="text/javascript"></script>
<script src="<?php echo base_url('public/'); ?>plugins/bootstrap-fileinput-master/themes/explorer-fas/theme.js" type="text/javascript"></script>




<?php 
switch (isset($_SESSION['idioma'])) {
	case 'es':
	?>
	<script src="<?php echo base_url('public/'); ?>plugins/bootstrap-fileinput-master/js/locales/es.js" type="text/javascript"></script>
	<?php
	break;
	case 'en':
	?>
	<?php
	break;
	case 'pt':
	?>
	<script src="<?php echo base_url('public/'); ?>plugins/bootstrap-fileinput-master/js/locales/pt.js" type="text/javascript"></script>
	<?php	
	break;
	default;
	?>
	<script src="<?php echo base_url('public/'); ?>plugins/bootstrap-fileinput-master/js/locales/es.js" type="text/javascript"></script>
	<?php 
	break;
}

?>
