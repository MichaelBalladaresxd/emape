<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puentes extends CI_Controller {

	public function index(){
		$data['js'] = array('puentes');
		
		$data["plugins"] = [
			"nakupanda" => $this->load->view('plugins/nakupanda', "", true),	
			"googleMaps" => $this->load->view('plugins/googleMaps', "", true),	
			"DataTable" => $this->load->view('plugins/DataTable', "", true),
		];
		
		mostrarVista('pages/v_puentes', $data);
	}

	public function listarPuentes(){
		$campos = 'id_puente,denominacion,id_estado_puente,id_tipo_puente,fecha_inaguracion,cimiento_id_material,superficie_id_material,nombre_via,referencia,idDist,latitud,longitud';
		$response = $this->M_datos->listar('puentes',$campos);
		echo json_encode($response);
	}

	public function registrar(){
		$idPuente = $this->input->post('idPuente');
		$tabla='puentes';
		$parametros = array(
			'denominacion'			=> $this->input->post('denominacion'),
			'id_estado_puente'		=> $this->input->post('cmbEstadoPuente'),
			'id_tipo_puente'		=> $this->input->post('cmbTipoPuente'),
			'fecha_inaguracion'		=> $this->input->post('fecha_inaguracion'),
			'cimiento_id_material'	=> $this->input->post('cmbCimiento'),
			'superficie_id_material'=> $this->input->post('cmbSuperficie'),
			'nombre_via'			=> $this->input->post('nombre_via'),
			'referencia'			=> $this->input->post('referencia'),
			'idDist'				=> $this->input->post('distrito'),
			'latitud'				=> $this->input->post('latitud'),
			'longitud'				=> $this->input->post('longitud'),
			'fecreg'				=>  date('Y-m-d H:i:s')

		);
		$idWhere = array(
			'id_puente' 		=> 	$idPuente,
		);

		if (!empty($idPuente)) {
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

/* End of file Puentes.php */
/* Location: ./application/controllers/Puentes.php */