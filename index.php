<?php

$start = explode(' ', microtime())[0] + explode(' ', microtime())[1];

require('core/core.php');

if(isset($_GET['view'])){
	if(file_exists('core/controllers/' . strtolower($_GET['view']) . 'Controller.php')){
		include('core/controllers/' . strtolower($_GET['view']) . 'Controller.php');
	}else{
		include('core/controllers/errorController.php');
	}
} else {
	include('core/controllers/indexController.php');
}
?>
