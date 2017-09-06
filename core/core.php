<?php
/*@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//		Ｗ ｅ ｂ ｓ ｉ ｔｅ　    Ｃ ｏ ｒ ｅ
####################################*/
session_start();

#Constantes de Conexion
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'mysql');
define('DB_NAME', 'XEBB');

#Constantes del sistema
define('HTML_DIR', 'HTML/');
define('FORUM_NAME', 'XEBB');
define('YEAR', date('Y', time()));

define('FORUM_URL', 'http://localhost/XEBB/');
define('PHPMAILER_HOST', '');
define('PHPMAILER_USER', '');
define('PHPMAILER_PASS', '');
define('PHPMAILER_PORT', 465);

#Estructuras
//require_once __DIR__ . '/../config.php';
require('core/classes/class.Connection.php');
require('core/bin/functions/Users.php');

require('core/bin/functions/Encrypt.php');
require('core/bin/functions/EmailTemplate.php');
require('core/bin/functions/LostpassTemplate.php');
require('core/bin/functions/Categories.php');
require('core/bin/functions/Forums.php');
require('core/bin/functions/FriendlyURL.php');
/*
$_categories = Categories();
$_forums = Forums();
*/
$_users = Users();
 ?>
