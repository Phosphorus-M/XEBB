<?php 
$isset_id = isset($_GET['id']) and is_numeric($_GET['id'])and $_GET['id'] >= 1;
require('core/models/class.');
$config_forums = new ConfigForums();
switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
	case 'add':
		if($_POST) {
	        $config_forums->Add();
	      } else {
	        include(HTML_DIR . 'thread/add_topic.php');
	      }
		break;
	case 'edit':
		
		break;
	case 'delete':
		
	break;
	case 'close':
		
	break;
	case 'announcement':
		
	break;
	default:
		if ($isset_id) {
				//Verifica si el tema existe
		}else{
			header('location: ../index.php?view=index')
		}
		break;
}

?>