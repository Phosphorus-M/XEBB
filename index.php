<?php

$start = explode(' ', microtime())[0] + explode(' ', microtime())[1];

require('core/core.php');

if(isset($_GET['view'])){
	if(file_exists('core/controllers/' . strtolower($_GET['view']) . 'Controller.php')){
		include('core/controllers/' . strtolower($_GET['view']) . 'Controller.php');
		include 'language/'.substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0,2).'/'. strtolower($_GET['view']) .'.php';
	}else{
		include('core/controllers/errorController.php');
	}
} else {
		include 'language/'.substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0,2).'/index.php';
	include('core/controllers/indexController.php');
}
?>
