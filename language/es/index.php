<?php
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
$lang = array_merge($lang, array(
	'user_not_activated' => 'no se ha podido activar tu usuario',
	'user_activated' => '<strong>Activado!</strong> tu usuario ha sido activado correctamente.',
	)
);
?>
