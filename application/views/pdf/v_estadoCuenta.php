<style type="text/css">
	*{
		margin: 0;
	}

	.text-center{
		text-align: center
	}

	table.table-datos tr td.key{
		padding-right: 15px;
	}
	
	table.tableFiltro{
		width:100%;
		font-size: 12px;
		border-collapse: collapse;
		border-spacing: 0;
	}
	table.tableFiltro tr th{
		border: 1px solid black;
		background: #007bff;
		color: white;
		text-align: center;
		padding-top: 3px;
		padding-left: 3px;
		padding-right: 3px;
		padding-bottom: 3px;
		vertical-align: middle;
	}
	table.tableFiltro tr td{
		padding: 5px;
		border-collapse: collapse;
		border-spacing: 0;
		padding-top: 5px;
	}
	.text-right{
		text-align: right;
	}
	.text-center{
		text-align: center;
	}
	td.bb-1{
		border-bottom: 1px solid #2F2F2F;
	}
	td.bb-2{
		border-bottom: 2px solid #2F2F2F;
		font-weight: 600
	}
	td.bt-1{
		border-top: 1px solid #2F2F2F;
	}
	td.bt-2{
		border-top: 2px solid #2F2F2F;
		font-weight: 600;
	}
	td.by-1{
		border-top: 1px solid #2F2F2F;
		border-bottom: 1px solid #2F2F2F;
	}
	td.by-2{
		border-top: 2px solid #2F2F2F;
		border-bottom: 2px solid #2F2F2F;
		font-weight: 600;
	}
</style>
<page backtop="55mm" backbottom="5mm" backleft="0mm" backright="0mm"> 	
	<page_header > 
	<div style="width: 100%; text-align: center;">
		<img src="<?php echo FCPATH."public/img/logo.png";?>" alt="" style="width: 180px"> 
	</div>
	<div class="text-center">
		<h1>ESTADO CUENTA GENERAL</h1>
		<h3><?php echo $tipoReporte; ?></h3>
	</div>

	<div>
		<table style="width: 100%">
			<tr>
				<td style="width: 20%" class="key"><b>Código:</b></td>
				<td style="width: 50%"><?php echo perfil()->username; ?></td>
				<td style="width: 30%; text-align: right;">
					<b>Fecha: </b> <?php echo date("d-m-Y H:i:s"); ?>
				</td>
			</tr>
			<tr>
				<td style="width: 20%" class="key"><b>Contribuyente:</b></td>
				<td style="width: 80%" colspan="2"><?php echo perfil()->fullname; ?></td>
			</tr>
			<tr>
				<td style="width: 20%" class="key"><b>Domicilio Fiscal:</b></td>
				<td style="width: 80%" colspan="2"><?php echo perfil()->companyName; ?></td>
			</tr>
		</table>
	</div>
	</page_header> 
	<page_footer>
	<div class="text-center">
		[[page_cu]]/[[page_nb]]
	</div>
	</page_footer> 
	<?php 
	$titulosGrupos = agruparArray($lista, 'TITULOGRUPO');
	?>
	<table class="tableFiltro">

		<?php 
		$deudaTotal = 0;
		foreach ($titulosGrupos as $tituloGrupo1 => $valoresGrupo1) {
			?>
			<tr>
				<td colspan="9" style="width: 100%; background-color: #2F2F2F; color: white" class="by-2">
					<b><?php echo $tituloGrupo1 ?></b>
				</td>
			</tr>		
			<?php
			$direccionesGrupo2 = agruparArray($valoresGrupo1, 'TXTDIRECCIONPREDIO');
			foreach ($direccionesGrupo2 as $tituloGrupo2 => $valoresGrupo2) {
				if ($tituloGrupo2 !='') {
					?>
					<tr>
						<td></td>
						<td colspan="8" class="bb-2"><?php echo $tituloGrupo2 ?></td>
					</tr>
					<?php
				}
				$tituloPagoGrupo3 = agruparArray($valoresGrupo1, 'TITULOPAGO');
				$total = 0;
				foreach ($tituloPagoGrupo3 as $tituloGrupo3 => $valoresGrupo3) {

					if ($tituloGrupo3 !='') {
						?>
						<tr>
							<td></td>
							<td class="bb-1"><?php echo $tituloGrupo3 ?></td>
							<td class="bb-1 text-left">Año</td>
							<td class="bb-1 text-left">Cuota</td>
							<td class="bb-1 text-right">Insoluto</td>
							<td class="bb-1 text-right">Emisión</td>
							<td class="bb-1 text-right">interés</td>
							<td class="bb-1 text-left">Estado</td>
							<td class="bb-1 text-right">Deuda (S/)</td>
						</tr>
						<?php
					}
					?>
					<?php 
					$subTotal = 0;
					foreach ($valoresGrupo3 as $key => $value) {

						if ($tituloGrupo2 == $value['TXTDIRECCIONPREDIO']) {
							?>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo $value['NUMANIO'];?></td>
								<td class="text-left"><?php echo $value['CUOTA'];?></td>
								<td class="text-right"><?php echo moneda($value['INSOLUTO']);?></td>
								<td class="text-right"><?php echo moneda($value['EMISION']);?></td>
								<td class="text-right"><?php echo moneda($value['REAJUSTEINTERES']);?></td>
								<td class="text-left"><?php echo $value['TXTESTADO'];?></td>
								<td class="text-right"><?php echo moneda($value['TOTALDEUDA']);?></td>					
							</tr> 
							<?php 
							$subTotal = $subTotal + $value['TOTALDEUDA'];
						}
					} 
					?>
					<tr>
						<td class="bb-2 bt-2"></td>
						<td colspan="4" class="bb-2 bt-2" style="background-color: #e0e0e0"></td>
						<td colspan="3" class="bb-2 bt-2" style="background-color: #e0e0e0"><b>SUB TOTAL</b></td>
						<td colspan="1" class="bb-2 bt-2 text-right" style="background-color: #e0e0e0"><b>S/ <?php echo moneda($subTotal); ?></b></td>
					</tr>
					<?php 
					$total = $total + $subTotal;
				} 
				?>
				<tr>
					<td colspan=""></td>
					<td colspan="4" class="by-2" style="background-color: #999999"></td>
					<td colspan="3" class="by-2" style="background-color: #999999"><b>TOTAL</b></td>
					<td colspan="1" class="by-2 text-right" style="background-color: #999999"><b>S/ <?php echo moneda($total); ?></b></td>
				</tr>
				<?php 
			$deudaTotal = $deudaTotal + $total;
			}
		}
		?>
		<tr>
			<td colspan="5"></td>
			<td colspan="3" class="by-2" style="background-color: black; color: white; font-size: 16px"><b>DEUDA TOTAL</b></td>
			<td colspan="1" class="by-2 text-right" style="background-color: black; color: white; font-size: 16px"><b>S/ <?php echo moneda($deudaTotal); ?></b></td>
		</tr>
	</table>

</page> 