<style type="text/css">
	#map{
		min-height: calc(100vh - 62px - 52px);
		padding: 0px!important;
	}
	.page-with-aside .page-aside{
		min-height: initial;
		height: calc(100vh - 62px - 52px);
		overflow: auto;
	}
</style>
<div class="content">
	<div class="page-inner page-inner-fill">
		<div class="page-with-aside mail-wrapper bg-white">
			<div class="page-aside bg-grey1">
				<div class="aside-header">
					<div class="title">Vías Registradas</div>
					<div class="description">listado de vías </div>
					<a class="btn btn-primary toggle-email-nav" data-toggle="collapse" href="#lista" role="button" aria-expanded="false" aria-controls="email-nav">
						<span class="btn-label">
							<i class="icon-menu"></i>
						</span>
						Lista
					</a>
				</div>
				<div class="aside-nav collapse" id="lista" >
					<ul class="nav nav-pills nav-stacked" id="listVias">

					</ul>
				</div>
			</div>
			<div class="page-content mail-content" id="map">
				
			</div>
		</div>
	</div>
</div>

<script id="tmpListVias" type="x-tmpl-mustache">
	<li>
		<a href="#" data-via="{{ID}}">
			<i class="fas fa-road"></i> 
			<div>
				<p class="m-0"><strong>{{distrito}} - {{NOMBRE_VIA}}</strong></p>
				<p class="m-0">
					<strong>{{cuadras}}</strong>
				</p>
				<k>{{NOMBRE}}</k><br>
			</div>
			{{#lat}}
			<span class="badge badge-primary float-right"><i class="fas fa-map-marker-alt m-0 text-white"></i></span>
			{{/lat}}
		</a>
	</li>
</script>