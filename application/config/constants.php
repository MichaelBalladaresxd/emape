<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code



// $genMenu = array(
// 	array(
// 		'title'			=> 'Configurador',
// 		'root'			=> true,
// 		'bullet'		=> 'dot',
// 		'icon'			=> 'flaticon2-browser-2',
// 		'permission'	=> 'MENU_CONFIGURADOR',
// 		'item' 			=> 	array(
// 			array(
// 				'title' 		=> 'Administrador Municipal',
// 				'bullet' 		=> 'dot',
// 				'page' 			=> 'MENUITEM_ADMINMUNICIPAL',
// 				'permission' 	=> 'MENUITEM_ADMINMUNICIPAL'
// 			),
// 			array(
// 				'title' 		=> 'Configuracion',
// 				'bullet' 		=> 'dot',
// 				'page' 			=> 'MENUITEM_CONFIG',
// 				'permission' 	=> 'MENUITEM_CONFIG'
// 			)
// 		)
// 	),
// 	array(
// 		'title'			=> 'Administrador',
// 		'bullet'		=> 'dot',
// 		'icon'			=> 'flaticon2-digital-marketing',
// 		'permission'	=> 'MENU_ADMINISTRACION',
// 		'item' 			=> array(
// 			array(
// 				'title'			=> 'Conciliacion',
// 				'page'			=> 'MENUITEM_CONCILIACION',
// 				'permission'	=> 'MENUITEM_CONCILIACION'
// 			),
// 			array(
// 				'title'			=> 'Buzon Municipal',
// 				'page'			=> '/MENUITEM_CONFIG_BUZON',
// 				'permission'	=> 'MENUITEM_CONFIG_BUZON'
// 			),
// 			array(
// 				'title'			=> 'Preguntas Frecuentes',
// 				'page'			=> '/MENUITEM_CONFIG_PREGUNTAS',
// 				'permission'	=> 'MENUITEM_CONFIG_PREGUNTAS'
// 			),
// 			array(
// 				'title'			=> 'Noticia Tributaria',
// 				'page'			=> '/MENUITEM_CONFIG_NOTICIAS',
// 				'permission'	=> 'MENUITEM_CONFIG_NOTICIAS'
// 			),
// 			array(
// 				'title'			=> 'Cuenta Correo',
// 				'page'			=> '/MENUITEM_CONFIG_CORREO',
// 				'permission'	=> 'MENUITEM_CONFIG_CORREO'
// 			)
// 		)
// 	),
// 	array(
// 		'title'		 => 'Contribuyente',
// 		'bullet'	 => 'dot',
// 		'icon'		 => 'flaticon2-list-2',
// 		'permission' => 'MENU_CONTRIBUYENTE',
// 		'item' 		 => array(
// 			array(
// 				'title' 		=> 'Mi estado de cuenta',
// 				'page' 			=> 'mi-estado-cuenta',
// 				'permission'	=> 'MENUITEM_MIESTADODECUENTA'
// 			),
// 			array(
// 				'title' 		=> 'Pagos en Línea',
// 				'page' 			=> 'pagos-online',
// 				'permission' 	=> 'MENUITEM_PAGOSENLINEA'
// 			),
// 			array(
// 				'title' 		=> 'Mis recibos',
// 				'page' 			=> 'mis-recibos',
// 				'permission' 	=> 'MENUITEM_MISRECIBOS'
// 			),
// 			array(
// 				'title' 		=> 'Mi buzón municipal',
// 				'page' 			=> 'mi-buzon',
// 				'permission' 	=> 'MENUITEM_MIBANDEJA'
// 			)
// 		)
// 	),
// 	array(
// 		'title'			=> 'Mis Datos',
// 		'root'			=> true,
// 		'icon'			=> 'flaticon2-architecture-and-city',
// 		'page'			=> 'mis-datos',
// 		'permission'	=> 'MENU_MISDATOS',
// 	),
// 	array(
// 		'title'			=> 'Preguntas Frecuentes',
// 		'root'			=> true,
// 		'icon'			=> 'flaticon2-expand',
// 		'page'			=> 'preguntas-frecuentes',
// 		'permission'	=> 'MENU_PREGUNTASFRECUENTES'
// 	),
// 	array(
// 		'title'			=> 'Noticias Tributarias',
// 		'root'			=> true,
// 		'icon'			=> 'flaticon2-expand',
// 		'page'			=> 'noticias-tributarias',
// 		'permission'	=> 'MENU_NOTICIASTRIBUTARIAS'
// 	),
// ); 
$genMenu = array(
	
	// array(
	// 	'title' 		=> 'Administrador Municipal',
	// 	'bullet' 		=> 'dot',
	// 	'page' 			=> 'MENUITEM_ADMINMUNICIPAL',
	// 	'permission' 	=> 'MENUITEM_ADMINMUNICIPAL'
	// ),
	// array(
	// 	'title' 		=> 'Configuracion',
	// 	'bullet' 		=> 'dot',
	// 	'page' 			=> 'MENUITEM_CONFIG',
	// 	'permission' 	=> 'MENUITEM_CONFIG'
	// ),	
	// array(
	// 	'title'			=> 'Conciliacion',
	// 	'page'			=> 'conciliacion',
	// 	'permission'	=> 'MENUITEM_CONCILIACION'
	// ),
	// array(
	// 	'title'			=> 'Buzon Municipal',
	// 	'page'			=> 'MENUITEM_CONFIG_BUZON',
	// 	'permission'	=> 'MENUITEM_CONFIG_BUZON'
	// ),
	// array(
	// 	'title'			=> 'Preguntas Frecuentes',
	// 	'page'			=> 'MENUITEM_CONFIG_PREGUNTAS',
	// 	'permission'	=> 'MENUITEM_CONFIG_PREGUNTAS'
	// ),
	// array(
	// 	'title'			=> 'Noticia Tributaria',
	// 	'page'			=> 'MENUITEM_CONFIG_NOTICIAS',
	// 	'permission'	=> 'MENUITEM_CONFIG_NOTICIAS'
	// ),
	// array(
	// 	'title'			=> 'Cuenta Correo',
	// 	'icon'			=> 'fas fa-cogs',
	// 	'page'			=> 'configurador_mail',
	// 	'permission'	=> 'MENUITEM_CONFIG_CORREO'
		
	// ),

	// array(
	// 	'title' 		=> 'Mi estado de cuenta',
	// 	'page' 			=> 'mi_estado_cuenta',
	// 	'icon'			=> 'fa fa-home',
	// 	'permission'	=> 'MENUITEM_MIESTADODECUENTA'
	// ),
	// array(
	// 	'title' 		=> 'Pagos en Línea',
	// 	'icon'			=> 'fas fa-credit-card',
	// 	'page' 			=> 'pagos_online',
	// 	'permission' 	=> 'MENUITEM_PAGOSENLINEA'
	// ),
	// array(
	// 	'title' 		=> 'Mis recibos',
	// 	'icon'			=> 'fas fa-receipt',
	// 	'page' 			=> 'mis_recibos',
	// 	'permission' 	=> 'MENUITEM_MISRECIBOS'
	// ),
	// array(
	// 	'title' 		=> 'Mi buzón municipal',
	// 	'icon'			=> 'fas fa-envelope',
	// 	'page' 			=> 'mi_buzon',
	// 	'permission' 	=> 'MENUITEM_MIBANDEJA'

	// ),
	// array(
	// 	'title'			=> 'Mis Datos',
	// 	'root'			=> true,
	// 	'icon'			=> 'fas fa-address-card',
	// 	'page'			=> 'mis_datos',
	// 	'permission'	=> 'MENU_MISDATOS',
	// ),
	array(
		'title'			=> 'Vías',
		'root'			=> true,
		'icon'			=> 'fas fa-road',
		'page'			=> 'vias',
		'permission'	=> 'MENU_PREGUNTASFRECUENTES'
	),
	array(
		'title'			=> 'Mapa General',
		'root'			=> true,
		'icon'			=> 'fas fa-map-marked-alt',
		'page'			=> 'mapas',
		'permission'	=> 'MENU_NOTICIASTRIBUTARIAS'
	),
	array(
		'title'			=> 'Puentes',
		'root'			=> true,
		'icon'			=> 'fas fa-map-marked-alt',
		'page'			=> 'puentes',
		'permission'	=> 'MENU_NOTICIASTRIBUTARIAS'
	)
); 
define('GEM_MENU', $genMenu); // highest automatically-assigned error code
