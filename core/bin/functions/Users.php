<?php 
function Users(){
	$db = new Conexion();
	$sql = $db->query("SELECT * FROM users;");
	if($db->rows($sql)> 0){
		while ($d = $db->recorrer($sql)) {
			$users[$d['id']] = array(
				'id' => $d['id'],
				'user' => $d['user'],
				'pass' => $d['pass'],
				'email' => $d['email'],
				'permisos' => $d['permisos'],
				);
		}
	}else{
		$users =false;
	}
	$db->liberar($sql);
	$db->close();
	return $users;
}

?>