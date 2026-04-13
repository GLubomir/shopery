<?php

function shopery_enqueue_scripts(){
	wp_enqueue_style(
		'main',
		get_template_directory_uri() . '/assets/css/main.css',
		[],
		_S_VERSION,
		'all'
	);

	wp_enqueue_script(
		'main',
		get_template_directory_uri() . '/assets/js/main.js',
		[],
		_S_VERSION,
		true
	);
}

function shopery_add_fonts(){
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
	echo '<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">';
}

function shopery_add_favicon(){
	echo '<link rel = "icon" href = "' . get_template_directory_uri() . '/favicon.ico" type = "image/x-icon" />';
	echo '<link rel = "shortcut icon" href = "' . get_template_directory_uri() . '/favicon.ico" type = "image/x-icon" />';
}