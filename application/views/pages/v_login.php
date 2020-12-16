<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="wrapper bg-white d-sm-flex" id="viewLogin">
	<div class="col-sm-6 col-12 px-0 dl bg-info">
		<div class="d-flex justify-content-center dlt">
			<div class="align-self-center text-center text-white">
				<h3>Gobierno Electrónico</h3>
				<h1>Municipal</h1>
			</div>
		</div>
		<div class="bg-white text-center d-sm-flex justify-content-center dlb d-none">
			<img src="<?php echo base_url('public/img/');?>niubus-logo-final_2.jpg" style="align-self: center">			
		</div>
	</div>
	<div class="col-sm-6 bg-white dr d-flex justify-content-center flex-column">
		<div class="container container-login animated fadeIn align-self-center ">
			
			<form id="formLogin" autocomplete="off">
				<div class="login-form">
					<div class="form-group">
						<h1 class="mb-2">
							Pagos en Línea
						</h1>
					</div>
					<div class="form-group">
						<label for="loginUsuario" class="control-label">Código de contribuyente</label>
						<input id="loginUsuario" name="loginUsuario" type="text" class="form-control" required="">
					</div>
					<div class="form-group">
						<label for="loginPass" class="control-label">Clave de acceso</label>
						<input id="loginPass" name="loginPass" type="password" class="form-control" required="">
					</div>
					<?php 
					if ($this->config->item('captchaActive') == 'OK') {
						?>
						<div class="form-group">
							<div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div> 
						</div>
						<?php 
					}
					?>
					<div class="form-group text-center">
						<button type="submit" class="btn-block btn btn-dark btn-rounded btn-login px-5">Ingresar  <span class="ml-2 fa fa-arrow-right"></span></button>
					</div>
				</div>
			</form>
		</div>
		<div class="text-center d-flex d-sm-none justify-content-center dlb">
			<img src="<?php echo base_url('public/img/');?>niubus-logo-final_2.jpg" style="align-self: center">			
		</div>
	</div>
</div>

<script src="<?php echo base_url('public/'); ?>/js/login.js<?php version(); ?>"></script>