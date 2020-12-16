<!-- jQuery UI -->
<script src="<?php echo base_url('public/atlantis'); ?>/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?php echo base_url('public/atlantis'); ?>/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="<?php echo base_url('public/atlantis'); ?>/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?php echo base_url('public/atlantis'); ?>/js/atlantis.min.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url('public/atlantis'); ?>/js/setting-demo.js"></script>
<!-- <script src="<?php echo base_url('public/atlantis'); ?>/custom.js"></script> -->


<?php 
$this->load->view('template/v_load'); 
if (isset($js)) {
	foreach ($js as $k => $v) {
		?>
		<script src="<?= base_url('/public/js');?>/<?= $v; ?>.js<?= version(); ?>"></script>
		<?php 
	}
}
?>
<script id="tmpMaps" type="x-tmpl-mustache">
	<div class="div-formulario row">
		<div class="form-group col-sm-4">
			<label>Buscar Dirección</label>
			<input id="pac-input" class="form-control form-control-sm" type="text" placeholder="Buscar Dirección" />
		</div>
		<div class="form-group col-sm-4">
			<label>Latitud</label>
			<input id="mapaLat" class="form-control form-control-sm" type="text" placeholder="Latitud" readonly/>
		</div>
		<div class="form-group col-sm-4">
			<label>Longitud</label>
			<input id="mapaLong" class="form-control form-control-sm" type="text" placeholder="Longitud" readonly/>
		</div>
	</div>
	<div class="form-group divMap d-none" style="width: 100%; position:relative;">
		<div id="map" style="width: 100%; height: 100%"></div>
		<button  id="btnUbicar" type="button" class="btn btn-icon btn-round btn-primary" style=" left: 15px; bottom: 15px; position: absolute"><i class="fa fa-align-left"></i></button>
	</div>
</script>
</body>
</html>
