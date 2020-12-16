<?php 
function version(){
	date_default_timezone_set('America/Lima');
	echo "?v=".date("YmdHis");	
}


function ver($text) {
	if (!isset($text) || empty($text))
		return '';
	echo '<pre>';
	var_dump($text);
	echo '</pre>';
}

function verp($text) {
	if (!isset($text) || empty($text))
		return '';
	echo '<pre>';
	print_r($text);
	echo '</pre>';
}


function mostrarVista($body, $data = false){
	$CI = & get_instance();
	// ob_start();
	echo $CI->load->view('template/v_header', $data, true);	
	echo '<div class="wrapper">';
	echo $CI->load->view('template/v_head','', true);
	// $CI->load->model('M_permisos');
	$data['menu'] = array();
	echo $CI->load->view('template/v_sidebar',$data, true); 
	echo '<div class="main-panel">';
	echo $CI->load->view($body, $data, true);
	echo $CI->load->view('template/v_foot','', true);
	echo '</div>';
	echo '</div>';
	echo $CI->load->view('template/v_footer', $data, true);
	// return ob_get_clean();
}


function perfil(){
	$CI = & get_instance();
	$CI->load->model('M_permisos');
	return $CI->M_permisos->datosUser();
}


function agruparArray($array, $key) {
	$return = array();
	foreach($array as $k) {
		$v = (array)$k;
		$return[$v[$key]][] = $v;			
	}
	return $return;
}

function limpiarEstados($array, $key, $filtro, $llave) {
	$return = array();
	foreach($array as $k) {
		$v = (array)$k;
		if ($v[$filtro] == $llave) {
			$return[$v[$key]][] = $v;			
		}

	}
	return $return;
}


function moneda($value){
	$numero = round($value,2);
	return number_format($numero, 2);
}