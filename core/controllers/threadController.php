<?php

$mode = isset($_GET['mode']) ? $_GET['mode'] : null;

if(isset($_GET['forum_id']) and array_key_exists($_GET['forum_id'],$_forums)) {
  $forum_id = intval($_GET['forum_id']);
  require('core/classes/class.Threads.php');
  $isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1;
  $loged = isset($_SESSION['forum_id']);

  if($loged) {
    $closed = ($_forums[$forum_id]['status'] == 1 or $_users[$_SESSION['forum_id']]['permisos'] == 2);
  } else {
    $closed = false;
  }

  $temas = new Temas();

  switch ($mode) {
    case 'add':
      if($loged and $closed) {
        if($_POST) {
          $temas->Add();
        } else {
          $archivo = 'add_topic';
        }
      }
    break;
    case 'edit':
      if($isset_id and $loged) {
        $tema = $temas->Check();
        if(false != $tema) {
          if($_POST) {
            $temas->Edit();
          } else {
            $archivo = 'edit_tema';
          }
        } else {
          header('location: index.php?view=index');
        }
      } else {
        header('location: index.php?view=index');
      }
    break;
    case 'delete':
      if($isset_id and $loged) {
        $temas->Delete();
      } else {
        header('location: index.php?view=index');
      }
    break;
    case 'close':
      if($isset_id and $loged and isset($_GET['estado']) and in_array($_GET['estado'],[0,1])) {
        $temas->Close($_GET['estado']);
      } else {
        header('location: index.php?view=index');
      }
    break;
    case 'responder':
      if($isset_id and $loged) {
        $tema = $temas->Check();
        if(false != $tema) {

          if($tema['estado'] == 0) {
            header('location: index.php?view=index');
            exit;
          }

          if($_POST) {
            $temas->Responder();
          } else {
            $archivo = 'responder';
          }
        } else {
          header('location: index.php?view=index');
        }
      } else {
        header('location: index.php?view=index');
      }
    break;
    default:
      if($isset_id) {
        $tema = $temas->Check();
        if(false != $tema) {
          IncreaseVisita($_GET['id']);
          $respuestas = $temas->GetReturn();
          $archivo = 'view_post';
        } else {
          header('location: index.php?view=index');
        }
      } else {
        header('location: index.php?view=index');
      }
    break;
  }
  require(HTML_DIR . 'posts/index.php');
} else {
  if(null == $mode) {
    header('location: ../index.php?view=index');
  } else {
    header('location: index.php?view=index');
  }

}
?>
