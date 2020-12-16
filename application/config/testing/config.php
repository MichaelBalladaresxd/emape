<?php

defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/Lima');
$config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$config['base_url'] .= "://" . $_SERVER['HTTP_HOST'];
if (!isset($_SERVER['ORIG_SCRIPT_NAME'])) {
    $config['base_url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
} else {
    $config['base_url'] .= str_replace(basename($_SERVER['ORIG_SCRIPT_NAME']), "", $_SERVER['ORIG_SCRIPT_NAME']);
}

$config['API_URL'] = "http://vps-1730597-x.dattaweb.com:3002/";
// $config['API_URL'] = "http://localhost:3002/";
$config['nombreEmpresa'] = "KILLARI";

$config['page_empresa'] = "http://pideloperu.com/gobiernodigital/";

$config['url_libre'] = array('');

$config['url_libre_ajax'] = array(
		'validationUser'
);


$config['captchaActive'] = '';
$config['google_key'] = '6Lc5ufYUAAAAAMO3E7Oj-b5o1bBGR3lN0k8R4UP2';
$config['google_secret'] = '6Lc5ufYUAAAAAF8UWxZBReFNWSyJKTLEIiSJGLI8';



