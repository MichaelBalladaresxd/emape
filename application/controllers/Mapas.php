<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapas extends CI_Controller {

	public function index(){
		$data['js'] = array('mapas');
		$data["plugins"] = [
			"nakupanda" => $this->load->view('plugins/nakupanda', "", true),	
			"googleMaps" => $this->load->view('plugins/googleMaps', "", true),	
		];
		
		mostrarVista('pages/v_mapas', $data);
	}

	public function vias(){
		$vias = $this->M_datos->get('vw_01_vias');
		echo json_encode($vias);
	}
}

/* End of file Mapa.php */
/* Location: ./application/controllers/Mapa.php */