<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SessionHook {

	public function validarSession(){
		$CI =& get_instance();
		$CI->load->model('M_permisos');

		// $CI->M_permisos->armarMenu();

		$urlActual = base_url().$CI->uri->uri_string();
		$loginUser =  base_url();
		

		$urlLibre = $CI->config->item('url_libre');
		$urlLibreAjax = $CI->config->item('url_libre_ajax');
		// var_dump($_SESSION);
		if ($urlActual == base_url('logout')) {
			
		}else if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']!='') {

			$miMenu = $CI->M_permisos->armarMenu();
			if ($miMenu == 'ERROR') {
				if($CI->input->is_ajax_request()){
					$ajax = '';
					foreach ($urlLibreAjax as $key => $value) {
						if(base_url().$value == $urlActual){
							$ajax = "OK";
							continue;
						}
					}
					if ($ajax != 'OK') {
						return json_encode("ajax verificado");
					}
				}else{
					$htmp = '';
					foreach ($urlLibre as $key => $value) {
						if(base_url().$value == $urlActual){
							$htmp = 'OK';
							continue;
						}
					}
					if($htmp != 'OK'){
						redirect(base_url());
					}
				}
			}else{

				$permiso = '';
				foreach ($miMenu as $key => $value) {
					if(strtoupper($value['page']) == strtoupper($CI->router->class)){
						$permiso = "OK";
						continue;
					}
				}
				if ($permiso != 'OK') {
					redirect(base_url($miMenu[0]['page']),'refresh');
				// if($CI->input->is_ajax_request()){

				// }else{

				// }
				}
			}
		}else{
			if($CI->input->is_ajax_request()){
				$ajax = '';
				foreach ($urlLibreAjax as $key => $value) {
					if(base_url().$value == $urlActual){
						$ajax = "OK";
						continue;
					}
				}
				if ($ajax != 'OK') {
					if (empty($_SESSION)) {
						echo json_encode("undefined");exit;
					}
				}
			}else{
				$htmp = '';
				foreach ($urlLibre as $key => $value) {
					if(base_url().$value == $urlActual){
						$htmp = 'OK';
						continue;
					}
				}
				if($htmp != 'OK'){
					redirect(base_url());
				}

			}
			// foreach ($urlLibre as $key => $value) {
			// 	if ($urlActual == base_url($value['url'])) {
			// 		echo  "<hr>";
			// 		echo "redirige";
			// 		echo  "<hr>";
			// 	}
			// }
		}
	}

}