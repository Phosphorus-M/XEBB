<?php

function Categories() {
  $db = new Conexion();
  $sql = $db->query("SELECT * FROM categories;");
  if($db->rows($sql) > 0) {
    while($data = $db->recorrer($sql)) {
      $categories[$data['id']] = array(
        'id' => $data['id'],
        'name' => $data['name']
      );
    }
  } else {
    $categories = false;
  }
  $db->liberar($sql);
  $db->close();

  return $categories;
}

?>