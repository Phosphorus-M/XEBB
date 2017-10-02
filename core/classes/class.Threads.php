<?php

class Temas {

  private $db;
  private $id;
  private $title;
  private $content;
  private $forum_id;
  private $author_id;
  private $sticky;

  public function __construct() {
    $this->db = new Conexion();
    $this->id = isset($_GET['id']) ? intval($_GET['id']) : null;
    $this->forum_id = intval($_GET['forum_id']);
    $this->author_id = isset($_SESSION['forum_id']) ? $_SESSION['forum_id'] : null;
  }

  private function Errors($url) {
    try {
      if(empty($_POST['title']) or empty($_POST['content'])) {
        throw new Exception(1);
      } else {
        $this->title = $this->db->real_escape_string($_POST['title']);
        $this->content = $this->db->real_escape_string($_POST['content']);
      }

      if(strlen($this->title) < MIN_TITULOS_TEMAS_LONGITUD) {
        throw new Exception(2);
      }

      if(strlen($this->content) < MIN_CONTENT_TEMAS_LONGITUD) {
        throw new Exception(3);
      }

      if(isset($_POST['sticky']) and $_POST['sticky'] == 1) {
        $this->sticky = 2;
      } else {
        $this->sticky = 1;
      }

    } catch(Exception $error) {
      header('location: ' . $url . $error->getMessage());
      exit;
    }
  }

  private function UpdateMensajesMios(int $mensajes = 1,bool $restar = false){
    if($restar) {
      $_SESSION['users'][$this->author_id]['mensajes'] = $_SESSION['users'][$this->author_id]['mensajes'] - $mensajes;
    } else {
      $_SESSION['users'][$this->author_id]['mensajes'] = $_SESSION['users'][$this->author_id]['mensajes'] + $mensajes;
    }
  }

  public function Add() {
    $this->Errors('?view=threads&mode=add&forum_id='.$this->forum_id.'&error=');
    $this->db->query("INSERT INTO posts (uid,post,subject,date)
    VALUES ('$this->author_id', '$this->content', '$this->title', '$fecha');");
    /*$this->db->query("INSERT INTO threads (title,contenido,forum_id,author_id,lr_date,id_ultimo,fecha_ultimo,sticky)
    /*$fecha = date('d/m/Y h:i a', time());

    VALUES ('$this->title','$this->content','$this->forum_id','$this->author_id','$fecha','$this->author_id','$fecha','$this->anuncio');");
    $ID_TEMA = $this->db->insert_id;
    $query = "UPDATE foros SET cantidad_temas=cantidad_temas + '1', cantidad_mensajes = cantidad_mensajes + '1', ultimo_tema = '$this->title', id_ultimo_tema='$ID_TEMA' WHERE id='$this->forum_id' LIMIT 1;";
    $query .= "UPDATE users SET mensajes=mensajes + '1' WHERE id='$this->author_id' LIMIT 1;";
    $this->db->multi_query($query);
    $this->UpdateMensajesMios();*/
    header('location: ./threads/' . FriendlyURL($ID_TEMA,$this->title,$this->forum_id));
  }

  public function Edit() {
    $this->Errors('?view=threads&mode=edit&id='.$this->id.'&forum_id='.$this->id_foro.'&error=');
    $this->db->query("UPDATE threads SET titulo='$this->title',contenido='$this->content',sticky='$this->sticky'
    WHERE id='$this->id' LIMIT 1;");
    header('location: ./threads/' . UrlAmigable($this->id,$this->titulo,$this->id_foro));
  }

  private function DeleteLast() {
    //Chequeamos que el tema que se quiere borrar sea el ultimo del foro
    $sql = $this->db->query("SELECT id FROM foros WHERE id_ultimo_tema='$this->id' AND id='$this->id_foro' LIMIT 1;");
    if($this->db->rows($sql) > 0) {
      //Extraemos el id y nombre del ultimo tema que NO sea el mismo que se va a borrar
      $sql_2 = $this->db->query("SELECT id,titulo FROM threads WHERE id_foro='$this->id_foro' AND id <> '$this->id' ORDER BY id DESC LIMIT 1;");
      if($this->db->rows($sql_2) > 0) {
        $data_t = $this->db->recorrer($sql_2);
        $id_ultimo_tema = $data_t[0];
        $ultimo_tema = $data_t[1];
      } else {
        $id_ultimo_tema = 0;
        $ultimo_tema = '';
      }
      $this->db->liberar($sql_2);
      $sql_4 = $this->db->query("UPDATE foros SET id_ultimo_tema='$id_ultimo_tema', ultimo_tema='$ultimo_tema' WHERE id='$this->id_foro' LIMIT 1;");
    }
    $this->db->liberar($sql);
  }

  public function Delete() {
    $this->DeleteLast();
    $sql2 = $this->db->query("SELECT author_id FROM threads WHERE id='$this->id' LIMIT 1;");
    if($this->db->rows($sql2) > 0) {
      $sql = $this->db->query("SELECT author_id FROM respuestas WHERE id_tema='$this->id';");
      $author_id_tema = $this->db->recorrer($sql2)[0];
      $mensajes_borrar = 1;
      $is_dueno = ($author_id_tema == $_SESSION['app_id']);
      $mensajes_user_actual = $is_dueno ? 1 : 0;

      if($this->db->rows($sql) > 0) {
        $prepare_sql = $this->db->prepare("UPDATE users SET mensajes=mensajes - '1' WHERE id=? LIMIT 1;");
        $prepare_sql->bind_param('i',$author_id);
        while($data = $this->db->recorrer($sql)) {
          $author_id = $data[0];
          $prepare_sql->execute();
          $mensajes_borrar++;
          if($author_id == $_SESSION['app_id']) {
            $mensajes_user_actual++;
          }
        }
        $prepare_sql->close();
      }
      $this->db->liberar($sql);

      $query = "DELETE FROM temas WHERE id='$this->id' LIMIT 1;";
      $query .= "UPDATE foros SET cantidad_mensajes=cantidad_mensajes - '$mensajes_borrar', cantidad_temas = cantidad_temas - '1'
      WHERE id='$this->id_foro' LIMIT 1;";
      $query .= "DELETE FROM respuestas WHERE id_tema='$this->id';";
      if($is_dueno) {
        $query .= "UPDATE users SET mensajes = mensajes - '1' WHERE id='$author_id_tema' LIMIT 1;";
      }
      $this->db->multi_query($query);

      $this->UpdateMensajesMios($mensajes_user_actual,true);
    }
    $this->db->liberar($sql2);
    header('location: index.php?view=foros&id=' . $this->id_foro);
  }

  public function Close(int $status) {
    $status = intval($status);
    $this->db->query("UPDATE threads SET status='$status' WHERE id='$this->id' LIMIT 1;");
    header('location: index.php?view=threads&id='.$this->id.'&forum_id=' . $this->id_foro);
  }

  public function Responder() {
    if(empty($_POST['content'])) {
      header('location: ?view=threads&mode=responder&id='.$this->id.'&forum_id=' . $this->id_foro);
      exit;
    } else {
      $this->content = $this->db->real_escape_string($_POST['content']);
    }
    $query = "INSERT INTO respuestas (author_id,id_tema,id_foro,contenido)
    VALUES ('$this->author_id','$this->id','$this->id_foro','$this->content');";
    $query .= "UPDATE forums SET cantidad_mensajes = cantidad_mensajes + '1' WHERE id='$this->id_foro' LIMIT 1;";
    $query .= "UPDATE users SET mensajes=mensajes + '1' WHERE id='$this->author_id' LIMIT 1;";
    $query .= "UPDATE threads SET respuestas=respuestas + '1' WHERE id='$this->id' LIMIT 1;";
    $this->db->multi_query($query);
    $this->UpdateMensajesMios();
    header('location: index.php?view=threads&id='.$this->id.'&forum_id=' . $this->id_foro);
  }

  public function Check() {
    $sql = $this->db->query("SELECT * FROM threads WHERE id='$this->id' LIMIT 1;");
    if($this->db->rows($sql) > 0) {
      $tema = $this->db->recorrer($sql);
    } else {
      $tema = false;
    }
    $this->db->liberar($sql);

    return $tema;
  }

  public function GetReturn() {
    $sql = $this->db->query("SELECT * FROM posts WHERE tid='$this->id';");
    if($this->db->rows($sql) > 0) {
      while ($data = $this->db->recorrer($sql)) {
        $return[] = $data;
      }
    } else {
      $return = false;
    }
    $this->db->liberar($sql);

    return $return;
  }

  public function __destruct() {
    $this->db->close();
  }

}

?>
