<?php

function IncreaseVisita(int $id) {
  $db = new Conexion();
  $db->query("UPDATE threads SET views=views + '1' WHERE id='$id' LIMIT 1;");
  $db->close();
}

?>
