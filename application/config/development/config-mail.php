<?php defined('BASEPATH') OR exit('No direct script access allowed.');

// 'mail', 'sendmail', or 'smtp'
$config['init_protocol']	= 'smtp';       	    
$config['init_smtp_host']	= 'smtp-relay.sendinblue.com';
$config['init_smtp_port']	= 587;
$config['init_smtp_user']	= 'ronald.carhuaricra@ricv.pe';
$config['init_smtp_pass']	= 'zm1YCBcsU2bp7wyT';


// 'text' or 'html'
$config['init_mailtype']	= 'html';

// PHPMailer's SMTP debug info level: 0 = off, 1 = commands, 2 = commands and data, 3 = as 2 plus connection status, 4 = low level data output.
$config['init_smtp_debug']	= 0;

// '' or 'tls' or 'ssl'
$config['init_smtp_crypto']	= '';    

// 'UTF-8', 'ISO-8859-15', ...; NULL (preferable) means config_item('charset'), i.e. the character set of the site.
$config['init_charset']		= 'utf-8';

$config['init_newline']		= "\r\n";

//correo que figurara en los envios 
$config['init_from_mail']	= 'admin@gobiernodigital.com';
//nombre que figurara en los envios 
$config['init_from_name']	= 'Administrador de Sistema';

$config['init_reply_to_mail'] = 'no-reply@gobiernodigital.com';
$config['init_reply_to_name'] = 'no-reply';