<?php
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
$lang = array_merge($lang, array(
	'post_thread' => 'Post Thread',
	'annoucements' => 'Annoucements',
	'replies' => 'Replies',
	'views' => 'Views',
	'dont_exist_no_one_annoucement' => 'Don\'t exist no one announcement',
	'dont_exist_no_one_thread' => 'Don\'t exist no one thread',
	)
);
?>
