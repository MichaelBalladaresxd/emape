<?php

defined('BASEPATH') OR exit('No direct script access allowed');

  // Producción Visa
$config['VISA_MERCHANT_ID']			= '527127703';
$config['VISA_USER']				= 'integraciones.visanet@necomplus.com';
$config['VISA_PWD']					= 'd5e7nk$M';
$config['VISA_URL_SECURITY']		= 'https://apiprod.vnforapps.com/api.security/v1/security';
$config['VISA_URL_SESSION']			= 'https://apiprod.vnforapps.com/api.ecommerce/v2/ecommerce/token/session/'.$this->config->item('VISA_MERCHANT_ID');
$config['VISA_URL_JS']				= 'https://static-content.vnforapps.com/v2/js/checkout.js';
$config['VISA_URL_AUTHORIZATION']	= 'https://apiprod.vnforapps.com/api.authorization/v3/authorization/ecommerce/'.$this->config->item('VISA_MERCHANT_ID');