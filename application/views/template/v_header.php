<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="icon" type="image/png" href="<?php echo base_url('public/img/') ?>favi.png" sizes="64x64">
	<title>EMAPE - <?php echo $this->router->class; ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!-- <link rel="icon" href="<?php echo base_url('public/atlantis'); ?>../assets/img/icon.ico" type="image/x-icon"/> -->
	<!-- Fonts and icons -->
	<script src="<?php echo base_url('public/atlantis'); ?>/js/plugin/webfont/webfont.min.js"></script>
	<script>
		
		                                  
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {
				"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], 
				urls: ['<?php echo base_url('public') ?>/atlantis/css/fonts.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
		
		const 	base_url 		= "<?php echo base_url(); ?>";
		
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url('public/atlantis'); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('public/atlantis'); ?>/css/atlantis.css">

	<link rel="stylesheet" href="https://cdn.rawgit.com/bantikyan/icheck-bootstrap/master/icheck-bootstrap.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?php echo base_url('public/atlantis'); ?>/css/demo.css">
	
	<link rel="stylesheet" href="<?php echo base_url('public/plugins'); ?>/microtip/microtip.css<?php version(); ?>">

	

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="<?php echo base_url('public/atlantis'); ?>/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url('public/atlantis'); ?>/js/core/popper.min.js"></script>
	<script src="<?php echo base_url('public/atlantis'); ?>/js/core/bootstrap.min.js"></script>
	<script src="<?php echo base_url('public/'); ?>js/util.js<?php version(); ?>"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
	<script>
		moment.locale('es'); 
	</script>
	<?php
	if (isset($plugins)) {
		foreach ($plugins as $key => $plugin) {
			echo $plugin;
		}
	}
	?>	
	<script src="<?php echo base_url('public/'); ?>plugins/jquery.redirect-master/jquery.redirect.js"></script>

	<!--   JS VIA -->
	
	<!--<script src="<?php echo base_url('public/'); ?>plugins/jquery-numeric/jquery.numeric.min.js"></script> -->

	<!-- Para descargar EXCEL  -->
	<!-- <script type="text/javascript" src="//unpkg.com/xlsx/dist/xlsx.full.min.js"></script> -->
	<!-- Para descargar EXCEL  -->

	
	<!-- jQuery Validate  -->
	<!-- Atlantis JS -->
	<!-- <script type="text/javascript" src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
	<link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">  -->
	<link rel="stylesheet" href="<?php echo base_url('public/atlantis'); ?>/custom.css<?php version(); ?>">
	<?php 
	$this->load->view('plugins/loadingModal');
	$this->load->view('plugins/mustache');
	$this->load->view('plugins/Validator');
	$this->load->view('plugins/Alertify');
	$this->load->view('plugins/SweetAlert');
	$this->load->view('plugins/nakupanda');
	?>
	
	
</head>

	<body data-background-color="bg3" class="<?php echo $this->router->class; ?>">