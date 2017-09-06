<?php 

function FriendlyURL($id, $title){
	$title = mb_strtolower($title,'UTF-8');
	$title = trim($title);
	$title = str_replace(
      array('á', 'à', 'ä', 'â', 'ª'),
      'a',
      $title
  	);
	$title = str_replace(
	    array('é', 'è', 'ë', 'ê'),
	    'e',
	    $title
	);
	$title = str_replace(
	    array('í', 'ì', 'ï', 'î'),
	    'i',
	    $title
	);

	$title = str_replace(
	    array('ó', 'ò', 'ö', 'ô'),
	    'o',
	    $title
	);
	$title = str_replace(
	    array('ú', 'ù', 'ü', 'û'),
	    'u',
	    $title
	);
	$title = str_replace(
	    array('ñ', 'ç'),
	    array('n', 'c'),
	    $title
	);
    $title = str_replace(
        array("\\", "¨", "º", "-", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "`", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             ".", " "),
        '-',
        $title
    );
    $friendly_url= $id . '-' . $title;
    return $friendly_url;
}

?>