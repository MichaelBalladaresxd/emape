<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Listado de Puentes</h4>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<button class="btn btn-success float-right" id="btnAgregar"> 
							Agregar 
						</button>
					</div>
					<div class="card-body">
						<table id="tablePuentes" class="table table-striped table-responsive table-bordered" cellspacing="0" width="100%">
							
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script id="tmpVias" type="x-tmpl-mustache">
		<form id="formPuente">
		<div  class="row">
			<input type="text" name="idPuente" value="{{id}}" hidden>
			<div class="col-md-12">
				<div class="form-group">
					<label>Denominación</label>
					<input type="text" class="form-control" name="denominacion" value="{{denominacion}}">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group" >
					<label>Estado del puente</label>
					
					<select class="selectpicker form-control" name="cmbEstadoPuente" id="cmbEstadoPuente" required>
						<option value="">::Elegir</option>
						{{#estadosOption}}
							<option value="{{val}}" {{selected}}>{{txt}}</option>
						{{/estadosOption}}
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group" >
					<label>Tipo de puente</label>

					<select class="selectpicker form-control" name="cmbTipoPuente" id="cmbTipoPuente" required>
						<option value="">::Elegir</option>
						{{#puenteOption}}
							<option value="{{val}}" {{selecPuente}}>{{txt}}</option>
						{{/puenteOption}}
					</select>

				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group" >
					<label>Fecha de inauguración</label>
					<input type="date" class="form-control" name="fecha_inaguracion" value="{{fecha_inaguracion}}">
				</div>
			</div>
			<div class="col-md-7">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group" >
							<label>Cimientos</label>
							<select class="selectpicker form-control" name="cmbCimiento" id="cmbCimiento" required>
								<option value="">::Elegir</option>
								{{#cimientoOption}}
									<option value="{{val}}" {{selecCimiento}}>{{txt}}</option>
								{{/cimientoOption}}
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group" >
							<label>Superficie</label>
							<select class="selectpicker form-control" name="cmbSuperficie" id="cmbSuperficie" required>
								<option value="">::Elegir</option>
								{{#superficieOption}}
									<option value="{{val}}" {{selecSuperficie}}>{{txt}}</option>
								{{/superficieOption}}
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group" >
							<label>Nombre de Via </label>
							<input type="text" class="form-control" name="nombre_via" value="{{Nombre_via}}">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group" >
							<label>Referencia</label>
							<input type="text" class="form-control" name="referencia" value="{{referencia}}">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group" >
							<label>Distrito</label>
							<input type="text" class="form-control" name="distrito" value="{{distrito}}">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group" >
							<label>Latitud</label>
							<input type="text" class="form-control" name="latitud" value="{{latitud}}" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group" >
							<label>Longitud</label>
							<input type="text" class="form-control" name="longitud" value="{{longitud}}" readonly>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group" style="height: 270px;">
							<div style=" background-color: red; height: 100%" id="mapaPuente">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</script>