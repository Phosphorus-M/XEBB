<?php
include 'language/'.substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0,2).'/'. strtolower($_GET['view']) .'.php';
?>
