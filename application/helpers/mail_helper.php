<?php 

function enviarMaiaaaaaaaaa($data, $para, $asunto, $view){
	$CI = & get_instance();

	$config_mail=array(
		'protocol' 	=> 'smtp',
		'smtp_host' => 'smtp-relay.sendinblue.com',
		'smtp_port' => 587,
		'smtp_user' => 'ronald.carhuaricra@ricv.pe',
		'smtp_pass' => 'zm1YCBcsU2bp7wyT',
		'mailtype'	=> 'html',
		'charset' 	=> 'utf-8',
		'newline' 	=> "\r\n"
	);
	$CI->load->library('parser');
	$CI->load->library("email");
	$CI->email->initialize($config_mail);
	$CI->email->from('sap@sap.com', "somos SAP");
	$CI->email->to($para);
	$CI->email->subject($asunto);
	$CI->email->message($CI->parser->parse('mails/'.$view, $data, TRUE));
	if ($CI->email->send()) {
		$response['error'] = EXIT_SUCCESS;		
	}else{
		$response['error'] = EXIT_ERROR;		
	}
	return $response;

}

function error(){
	return "ivan";
}


function enviarMailError($para, $asunto, $mensaje){
	try {

		$CI = & get_instance();
		$CI->load->library('email');
		$CI->load->config('custom_exception', TRUE);
		$email_from_email = $CI->config->item('email_from_email', 'custom_exception'); 
		$email_from_name = $CI->config->item('email_from_name', 'custom_exception');
		$CI->email->clear();
		
		if (is_array($para) && count($para)>0) {
			foreach ($para as $key => $value) {
				$CI->email->to($value);
			}
		}

		$CI->email->from($email_from_email, $email_from_name);
		$CI->email->reply_to(config_item('init_reply_to_mail'), config_item('init_reply_to_name'));
		$CI->email->subject($asunto);
		$CI->email->message($mensaje);
		if (!$CI->email->send()){
			$response['error'] 	= EXIT_ERROR;
			$response['msj']	= $CI->email->print_debugger(array('headers'));
		}else{
			$response['error'] 	= EXIT_SUCCESS;
			$response['msj']	= "Mensaje de Error fue enviado por email.";
		}
		return $response;
	} catch (Exception $e) {
		throw new Exception($e);
		return;
	}
}

function enviarMail($para, $asunto, $mensaje, $CC = false, $CCO = false, $adjuntos = false){
	try {
		$CI = & get_instance();
		$CI->load->library('email');
		$CI->email->clear();
		if (is_array($adjuntos) && count($adjuntos)>0) {
			foreach ($adjuntos as $key => $value) {
				// $mail->AddAttachment('path_to_pdf', $name = 'Name_for_pdf',  $encoding = 'base64', $type = 'application/pdf');
				$CI->email->attach($value['archivo'], '', $value['nombre'], $value['type']);
				// $CI->email->attach($value, 'inline', null, '', true);
			}
		}
		if (is_array($CC) && count($CC)>0) {
			foreach ($CC as $key => $value) {
				$CI->email->cc($value);
			}
		}
		if (is_array($CCO) && count($CCO)>0) {
			foreach ($CCO as $key => $value) {
				$CI->email->bcc($value);
			}
		}

		if (is_array($para) && count($para)>0) {
			foreach ($para as $key => $value) {
				$CI->email->to($value);
			}
		}

		$CI->email->from(config_item('init_from_mail'), config_item('init_from_name'));
		$CI->email->reply_to(config_item('init_reply_to_mail'), config_item('init_reply_to_name'));
		$CI->email->subject($asunto);
		$CI->email->message($mensaje);
		if (!$CI->email->send()){
			$response['result'] 	= 'ERROR';
			$response['msj2'] 	= $CI->email->print_debugger();
			$response['msj']	= $CI->email->print_debugger(array('headers'));
		}else{
			$response['result'] 	= 'OK';
		}
		return $response;
	} catch (Exception $e) {
		throw new Exception($e);
		return;
	}

}