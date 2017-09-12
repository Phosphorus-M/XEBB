<?php

class ConfigForums{
  private $id;
  private $db;
  private $name;
  private $category;
  private $description;
  private $status;

  public function __construct(){
    $this->db = new Conexion();
  }

  private function Errors($url, $add_mode = false){
    global $_categories;

    try {
      if (empty($_POST['name']) or empty($_POST['description']) or !isset($_POST['status'])) {
        throw new Exception(1);
      }else {
        $this->name = $this->db->real_escape_string($_POST['name']);
        $this->description = $this->db->real_escape_string($_POST['description']);
        if ($_POST['status'] == 1) {
          $this->status = 1;
        }else {
          $this -> status = 0;
        }
      }
      if (!array_key_exists($_POST['categories'], $_categories)) {
        throw new Exception(2);
      }else {
        $this->category = intval($_POST['categories']);
      }
    } catch (Exception $error) {
      header('location:' . $url . $error->getMessage());
      exit;
    }

  }

  public function Add(){
    $this->Errors('?view=configforums&mode=add&error=', true);
    $this->db->query("INSERT INTO forums (name, description, id_categoria, status) VALUES ('$this->name', '$this->description', '$this->category', '$this->status');");
    echo $this->name, '<br/> ', $this->description, '<br/> ', $this->status, '<br/> ',$this->categoria;
    header('location: ?view=configforums&mode=add&success=true');
  }
  public function Edit(){
    $this->id = intval($_GET['id']);
    $this->Errors('?view=configforums&mode=edit&id='. $this->id .'&error=');
    $this->db->query("UPDATE forums SET name='$this->name', description='$this->description', id_categoria='$this->category', status='$this->status' WHERE id='$this->id';");
    header('location: ?view=configforums&mode=edit&id='. $this->id .'&success=true');
  }
  public function Delete(){
    $this->id = intval($_GET['id']);
    $this->db->query("DELETE FROM forums WHERE id='$this->id';");
    header('location: ?view=configforums&success=true');
  }
  public function __destruct(){
    $this->db->close();
  }

}

?>
