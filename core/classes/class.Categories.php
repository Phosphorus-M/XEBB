<?php

class Categories {

  private $db;
  private $id;
  private $name;

  public function __construct() {
    $this->db = new Conexion();
  }

  private function Errors($url) {
    try {
      if(empty($_POST['name'])) {
        throw new Exception(1);
      } else {
        $this->name = $this->db->real_escape_string($_POST['name']);
      }
    } catch(Exception $error) {
      header('location: '.$url .$error->getMessage());
      exit;
    }
  }

  public function Add() {
    $this->Errors('?view=admin&section=categories&mode=add&error=');
    $this->db->query("INSERT INTO categories (name) VALUES ('$this->name');");
    header('location: ?view=admin&section=categories&mode=add&success=true');
  }

  public function Edit() {
    $this->id = intval($_GET['id']);
    $this->Errors('?view=categories&mode=add&id='.$this->id.'&error=');
    $this->db->query("UPDATE categories SET name='$this->name' WHERE id='$this->id';");
    header('location: ?view=categories&mode=edit&id='.$this->id.'&success=true');
  }

  public function Delete() {
    $this->id = intval($_GET['id']);
    $q = "DELETE FROM categories WHERE id='$this->id';";
    $q .= "DELETE FROM forums WHERE id_categoria='$this->id';";
    $this->db->multi_query($q);
    header('location: ?view=admin&section=categories');
  }

  public function __destruct() {
    $this->db->close();
  }

}

?>
