<?php


function _taxi_office_include_settings($file_name = NULL, &$schema) {
	$path_to_module = drupal_get_path('module', 'taxi_office') . '/classes';
	$subdirs = array_filter(glob($path_to_module . '/*', GLOB_ONLYDIR), 'is_dir');
	foreach ($subdirs as $dirname) {
		@include_once $dirname . '/' . $file_name . '.php';
		$function_name = '__' . basename($dirname) . '_' . $file_name;
		if (function_exists($function_name))
			$function_name($schema);
	}
}

function _taxi_office_view_field_defaults(
		Entity $entity,
		$label_display = 'above',
		$field_type = 'text',
		$formatter = 'text_default') {
	return array(
			'#theme'         => 'field',
			'#weight'        => 0,
			'#access'        => TRUE,
			'#label_display' => $label_display,
			'#view_mode'     => 'full',
			'#language'      => LANGUAGE_NONE,
			'#field_type'    => $field_type,
			'#entity_type'   => $entity->entityType(),
			'#bundle'        => $entity->bundle(),
			'#formatter'     => $formatter,
	);
}