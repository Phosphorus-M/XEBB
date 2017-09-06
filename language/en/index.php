<?php
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
$lang = array_merge($lang, array(
	'user_not_activated' => 'couldn\'t activate your user',
	'user_activated' => '',
	)
);

?>
