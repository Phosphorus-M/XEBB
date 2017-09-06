<?php

function Forums(){
  $db = new Conexion();
  $sql = $db->query("SELECT * FROM forums;");

  if ($db->rows($sql) > 0) {
    while ($data = $db->recorrer($sql)) {
      $forums[$data['id']] = array(
        'id' => $data['id'],
        'name' => $data['name'],
        'description' => $data['description'],
        'num_of_menssages' => $data['num_of_menssages'],
        'num_of_topics' => $data['num_of_topics'],
        'id_categoria' => $data['id_categoria'],
        'status' => $data['status'],
      );
    }
  }else {
    $forums = false;
  }

  $db->liberar($sql);
  $db-> close;

  return $forums;
}
?>
