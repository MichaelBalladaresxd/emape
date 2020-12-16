<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vias extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('M_datos');

    }

	public function index()
	{
		
		$data['js'] = array('vias',	'maps');
		$data["plugins"] = [
			"DataTable" => $this->load->view('plugins/DataTable', "", true),
			"nakupanda" => $this->load->view('plugins/nakupanda', "", true),	
			"googleMaps" => $this->load->view('plugins/googleMaps', "", true),	
		];
		
		mostrarVista('pages/v_vias', $data);
	}

	public function listarVias(){
		$campos = "ID, id_via, NOMBRE_VIA, TIPO, NOMBRE, CDRA_INI, inicial_lat, inicial_long, CDRA_FINAL, final_lat, final_long, ESTADO, DISTRITO,tiempo_desde,tiempo_hasta";
		$response = $this->M_datos->listar("vw_01_vias", $campos);
		echo json_encode($response);
	}

	public function registrar(){
		// $datos['msj'] = $this->input->post();
		// $datos['result'] = 'OK';
		// echo json_encode($datos);

		$idVia = $this->input->post('txtIdVia');
		$tabla='vias_detalle';
		$parametros = array(
			'id_via'		=> $this->input->post('txtNombreVia'),
			'distrito'		=> $this->input->post('txtDistrito'),
			'nombre_via'	=> $this->input->post('txtTramo'),
			'cuadra_inicial'=> $this->input->post('cdraInicio'),
			'inicial_lat'	=> $this->input->post('inicial_lat'),
			'inicial_long'	=> $this->input->post('inicial_long'),
			'cuadra_final'	=> $this->input->post('cdraFinal'),
			'final_lat'		=> $this->input->post('final_lat'),
			'final_long'	=> $this->input->post('final_long'),
			'tipo'			=> $this->input->post('cmmbTipoServicio'),
			'tiempo_desde'	=> $this->input->post('fecIncial'),
			'tiempo_hasta'	=> $this->input->post('fecFinal')


		);
		$idWhere = array(
			'id_via_detalle' 		=> 	$idVia,
		);

		if (!empty($idVia)) {
			$response = $this->M_datos->update($tabla,$parametros,$idWhere);

			if ($response) {
				$response['msj']	= 'Cambios Guardados correctamente.';
				$response['result'] = 'OK';
			} else {
				$response['msj']	= 'No se Guardaron los cambios.';
				$response['result'] = 'ERROR';
			}
			
			
		} else {
			$response = $this->M_datos->insert($tabla,$parametros);
			if ($response) {
				$response['result']	= 'OK';
				$response['msj']	= 'Datos guardados correctamente.';
			} else {
				$response['result']	= 'ERROR';
				$response['msj']	= 'Error al registrar datos.';
			}
			
		}
		echo json_encode($response);
	}

}

/* End of file Vias.php */
/* Location: ./application/controllers/Vias.php */