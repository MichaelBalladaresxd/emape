<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Listado de Vías</h4>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<button class="btn btn-success float-right" id="btnAgregarVias"> 
							Agregar 
						</button>
					</div>
					<div class="card-body">
						<table id="tableVias" class="table table-striped table-bordered" cellspacing="0" width="100%">
							
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script id="tmpVias" type="x-tmpl-mustache">

	<form id="formViasAdd" method="post">
		<input type="hidden" name="txtIdVia" id="txtIdVia" value="{{id}}">
		<input type="hidden" name="txtNombreVia" id="txtNombreVia" value="{{via}}">

		<div class="row">
			<div class="col-md-12 form-group">
				<label for="">Nombre de la Via</label>
				<select class="selectpicker form-control form-control-sm" name="cmmbTipoServicio" id="cmbTIpoServ" required>
					<option value="">::Elegir</option>
					{{#optionVia}}
						<option value="{{val}}" {{selectedVia}}>{{txt}}</option>
					{{/optionVia}}
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 form-group">
				<label for="">Distrito</label>
				<input type="text" class="form-control form-control-sm" name="txtDistrito" value="{{distrito}}">
			</div>
			<div class="col-md-6 form-group">
				<label for="">Tramo</label>
				<input type="text" class="form-control form-control-sm" name="txtTramo" value="{{tramo}}">
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="">Cdra. Inicial</label>
				<input type="text" class="form-control form-control-sm" name="cdraInicio" value="{{cdra_ini}}">
			</div>
			<div class="col-md-8 form-group">
				<label for="">Latitud y Longitud</label>
				<div class="input-group">
					<input type="text" class="form-control form-control-sm" value="{{ini_lat}}" placeholder="Latitud" required name="inicial_lat" data-gps="latitud" readonly>
					<input type="text" class="form-control form-control-sm" value="{{ini_long}}" placeholder="Longitud" required name="inicial_long" data-gps="longitud" readonly>
					<div class="input-group-append">
						<button class="btn btn-primary btn-sm btnGPS" type="button"><i class="fas fa-map-marker"></i> GPS</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 form-group">
				<label for="">Cdra. Final</label>
				<input type="text" class="form-control form-control-sm" name="cdraFinal" value="{{cdra_fin}}">
			</div>
			<div class="col-md-8 form-group">
				<label for="">Latitud y Longitud</label>
				<div class="input-group">
					<input type="text" class="form-control form-control-sm" value="{{fin_lat}}" placeholder="Latitud" required name="final_lat" data-gps="latitud" readonly>
					<input type="text" class="form-control form-control-sm" value="{{fin_long}}" placeholder="Longitud" required name="final_long" data-gps="longitud" readonly>
					<div class="input-group-append">
						<button class="btn btn-primary btn-sm btnGPS" type="button"><i class="fas fa-map-marker"></i> GPS</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 form-group">
				<label for="">Tipo de Servicio</label>
				<select class="selectpicker form-control form-control-sm" name="cmmbTipoServicio" id="cmbTIpoServ" required>
					{{#options}}
						<option value="{{val}}" {{selected}}>{{txt}}</option>
					{{/options}}
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 form-group">
				<label for="">Fec. Inicial</label>
				<input type="date" class="form-control form-control-sm" name="fecIncial" value="{{fec_desde}}">
			</div>
			<div class="col-md-6 form-group">
				<label for="">Fec. Final</label>
				<input type="date" class="form-control form-control-sm" name="fecFinal" id="fecFinal"  value="{{fec_hasta}}">
			</div>
			
		</div>


		
	</form>
</script>