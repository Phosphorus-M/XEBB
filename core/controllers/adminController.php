<?php

if(isset($_SESSION['forum_id']) and $_users[$_SESSION['forum_id']]['permisos'] >= 2) {
	$isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1;
	require('core/classes/class.Admin.php');
	$panel_admin = new Admin();
	switch (isset($_GET['mode']) ? $_GET['mode'] : null ){
		default:
			include(HTML_DIR . 'admin/index.php');
			break;
	}
} else {
  header('location: ?view=index');
}

?>
