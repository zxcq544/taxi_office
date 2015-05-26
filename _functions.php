<?php


function _taxi_office_include_settings($file_name = NULL,&$schema) {
	$path_to_module = drupal_get_path('module', 'taxi_office') . '/classes';
	$subdirs = array_filter(glob($path_to_module . '/*', GLOB_ONLYDIR), 'is_dir');
	foreach ($subdirs as $dirname) {
		@include_once $dirname . '/' . $file_name . '.php';
	}
}