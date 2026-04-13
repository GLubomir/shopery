<?php

function shopery_add_attributes_for_script($tag, $handle, $src){
	if('main' !== $handle){
		return $tag;
	}

	return str_replace('<script', '<script type="module" defer', $tag);
}
