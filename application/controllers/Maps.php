<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {

	public function index()
	{
		$data['js'] = array(
			'maps'
		);
		$data["plugins"] = [
			"nakupanda" => $this->load->view('plugins/nakupanda', "", true),	
			"googleMaps" => $this->load->view('plugins/googleMaps', "", true),	
		];
		mostrarVista('pages/v_maps', $data);
	}

}

/* End of file Maps.php */
/* Location: ./application/controllers/Maps.php */