<?php 

if(isset($_GET['id']) and is_numeric($_GET['id'])and $_GET['id'] >= 1){
	$forum_id  = intval($_GET['id']);
	if (array_key_exists($forum_id, $_forums)) {
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM threads WHERE id_forum ='$forum_id' AND stinky='0' ORDER BY id DESC; ");
		$sql_stinky = $db->query("SELECT * FROM threads WHERE id_forum ='$forum_id' AND stinky = '1' ORDER BY id DESC; ");
		include(HTML_DIR . 'threads/threads.php');
		$db->liberar($sql,$sql_stinky);
		$db->close();
	}else{
		header('location: ../index.php?view=error');
	}
}else{
	header('location: ../index.php?view=index');	
}

?>