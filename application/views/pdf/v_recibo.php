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
	td.cabecera{
		background-color: #2F2F2F;
		color: white;
	}
</style>

<page backtop="55mm" backbottom="5mm" backleft="0mm" backright="0mm">
	<page_header > 
	<div style="width: 100%; text-align: center;">
		<img src="<?php echo FCPATH."public/img/logo.png";?>" alt="" style="width: 180px"> 
	</div>
	<div class="text-center" style="padding-bottom: 15px">
		<h2>RECIBO DE PAGO VIRTUAL Nº <?php echo $recibo[0]->TXTNUMEROCOMPROBANTE; ?></h2>
	</div>
	<div>
		<table class="table-datos">
			<tr>
				<td class="key"><b>Código:</b></td>
				<td><?php echo perfil()->username; ?></td>
			</tr>
			<tr>
				<td class="key"><b>Contribuyente:</b></td>
				<td><?php echo perfil()->fullname; ?></td>
			</tr>
			<tr>
				<td class="key"><b>Domicilio Fiscal:</b></td>
				<td><?php echo $recibo[0]->TXTDIRECCIONFISCAL; ?></td>
			</tr>
			<tr>
				<td class="key"><b>Fecha:</b></td>
				<td>
					<?php 
					$timestamp = strtotime($recibo[0]->DAFECHAPAGO);
					$mydate = date('d-m-Y', $timestamp);
					echo $mydate;
					?>
				</td>
			</tr>
		</table>
	</div>
	</page_header> 
	<page_footer>
	<div class="text-center">
		<i>Pagina [[page_cu]]/[[page_nb]]</i>
		
	</div>
	</page_footer>

	
	<table class="tableFiltro">
		<?php 
		$total=0;
		foreach ($recibo as $key => $value) {

			if ($key == 0) {
				?>
				<tr>
					<td class="cabecera" style="width: 35%">Concepto</td>
					<td class="cabecera" style="width: 10%">Año</td>
					<td class="cabecera" style="width: 15%">Cuota</td>
					<td class="cabecera text-right" style="width: 10%">Insoluto</td>
					<td class="cabecera text-right" style="width: 10%">Emisión</td>
					<td class="cabecera text-right" style="width: 10%">Interés</td>
					<td class="cabecera text-right" style="width: 10%">Total (S/)</td>
				</tr>
				<?php
			}
			?>
			<tr>
				<td><?php echo $value->TIPOPAGO;?></td>
				<td><?php echo $value->PERIODO;?></td>
				<td><?php echo $value->CUOTA;?></td>
				<td class="text-right"><?php echo number_format($value->NUMINSOLUTO,2);?></td>
				<td class="text-right"><?php echo number_format($value->NUMGASTOEMISION,2);?></td>
				<td class="text-right"><?php echo number_format($value->INTERES, 2);?></td>
				<td class="text-right"><?php echo number_format($value->TOTAL, 2);?></td>
			</tr> 
			<?php 
			$total = $total + $value->TOTAL;
		}
		?>
		<tr>
			<td colspan="7" class="bb-2"></td>
		</tr>
		<tr>
			<td colspan="3"></td>
			<td colspan="3" style="font-size: 16px"><b>PAGO TOTAL</b></td>
			<td class="text-right" style="font-size: 16px"><b>S/ <?php echo number_format($total,2);?></b></td>
		</tr> 
	</table>

</page>