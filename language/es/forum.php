<?php
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
$lang = array_merge($lang, array(
	'post_thread' => 'Publicar tema',
	'annoucements' => 'Anuncios',
	'replies' => 'Respuestas',
	'views' => 'Visitas',
	'dont_exist_no_one_annoucement' => 'No existe ningun anuncio',
	'dont_exist_no_one_thread' => 'No existe ningún tema',
	)
);
?>
