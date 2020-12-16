<?php 
require_once APPPATH.'third_party/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

function _createPdf($contenido, $nombre, $salida = false){
	try {
		if ($salida == false) {
			$salida = 'S';
		}
		$html2pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', array(10, 5, 10, 10));
		$html2pdf->pdf->SetTitle($nombre);
		$html2pdf->writeHTML($contenido);
		$archivo = $nombre.'.pdf';
		$pdf = $html2pdf->output($archivo, $salida);

		$response['file'] = array(
			'archivo' => $pdf,
			'nombre' => $archivo,
			'type' => 'application/pdf'
		);
		$response['result'] = 'OK';
		return $response;
	} catch (Html2PdfException $e) {
		$html2pdf->clean();
		$formatter = new ExceptionFormatter($e);
		$response['result'] = 'ERROR';
		$response['msj'] = $formatter->getHtmlMessage();
		return $response;
	}
}

