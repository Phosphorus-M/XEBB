<?php

class Admin{

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


  public function __destruct() {
    $this->db->close();
  }

}

?>
