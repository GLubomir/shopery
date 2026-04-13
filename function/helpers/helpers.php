<?php 

function dump($args){
	echo '<pre>';
	var_dump($args);
	echo '</pre>';
}

function connect_image($src){
	echo bloginfo('template_url') . '/assets/images/' . $src;
}