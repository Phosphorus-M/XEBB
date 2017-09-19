<?php

if(isset($_SESSION['forum_id']) and $_users[$_SESSION['forum_id']]['permisos'] >= 2) {
	$isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1;
	require('core/classes/class.Admin.php');
	$panel_admin = new Admin();
	switch (isset($_GET['section']) ? $_GET['section'] : null ){
		case 'startedpage':{
			$archivo = 'admin/startedpage.php';
			break;
		}
		case 'categories':{
			require('core/classes/class.Categories.php');
			$categories = new Categories();
			switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
					case 'add':{
						if($_POST) {
							$categories->Add();
						} else {
							$archivo = 'categories/add_category.php';
						}
					break;
					}
					case 'edit':{
						if($isset_id and array_key_exists($_GET['id'],$_categories)) {
							if($_POST) {
								$categories->Edit();
							} else {
								$archivo = 'categories/edit_category.php';
							}
						} else {
							require('location: ?view=admin&section=categories');
						}
					break;
					}
					case 'delete':{
						if($isset_id) {
							$categories->Delete();
						} else {
							require('location: ?view=admin&section=categories');
						}
					break;
					}
					default:{
						$archivo = 'categories/all_categories.php';
					break;
					}
				}
				break;
			}
		case 'configforums':{
			require('core/classes/class.ConfigForums.php');
			$config_forums = new ConfigForums();

			switch (isset($_GET['mode']) ? $_GET['mode'] : null ){
			    case 'add':
			      if($_POST) {
			        $config_forums->Add();
			      } else {
			        $archivo = 'forums/add_forum.php';
			      }
			    break;
			    case 'edit':
			      	if($isset_id and array_key_exists($_GET['id'],$_forums)) {
				        if($_POST) {
				          	$config_forums->Edit();
				        } else {
				          	$archivo = 'forums/edit_forum.php';
				        }
			     	} else {
			        	header('location: ?view=admin&section=configforums');
			      	}
		    	break;
		    	case 'delete':
			      if($isset_id) {
			        $config_forums->Delete();
			      } else {
			        header('location: ?view=admin&section=configforums');
			      }
		    	break;
				default:
					$archivo = 'forums/all_forums.php';
					break;
			}
			break;
		}
		default:{
			$archivo = 'admin/startedpage.php';
			break;
		}
}
require(HTML_DIR . 'admin/index.php');
} else {
  header('location: ?view=index');
}

?>
