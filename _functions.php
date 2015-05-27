<?php


function _taxi_office_includes($file_name = NULL, &$schema) {
	$path_to_module = drupal_get_path('module', 'taxi_office') . '/classes';
	$subdirs = array_filter(glob($path_to_module . '/*', GLOB_ONLYDIR), 'is_dir');
	foreach ($subdirs as $dirname) {
		module_load_include('php', 'taxi_office', 'classes/' . basename($dirname) . '/' . $file_name);
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

function _install_helper_fields($fields, $bundle, $entity_type = 'node') {
	foreach ($fields as $field) {
		if (isset($field['field'])) {
			if (!field_info_field($field['field']["field_name"])) {
				field_create_field($field['field']);
				echo $field['field']['field_name'], " field was CREATED", PHP_EOL;
			} else {
				field_update_field($field['field']);
				echo $field['field']['field_name'], " field was UPDATED", PHP_EOL;
			}
		}
		$field['instance']['entity_type'] = $entity_type;
		$field['instance']['bundle'] = $bundle;

		if (field_info_instance($entity_type, $field['instance']['field_name'], $bundle) == NULL) {
			field_create_instance($field['instance']);
			echo $field['instance']['field_name'], " instance was CREATED", PHP_EOL;
		} else {
			field_update_instance($field['instance']);
			echo $field['instance']['field_name'], " instance was UPDATED", PHP_EOL;
		}
	}
}

function _uninstall_helper_fields($fields, $bundle, $entity_type = 'node') {
	$instances = field_info_instances($entity_type, $bundle);
	foreach ($instances as $field_instance) {
		field_delete_instance($field_instance);
	}

	foreach ($fields as $field) {
		field_delete_field($field['field']["field_name"]);
	}
}


function _manage_fields($op = 'install') {
	module_load_include('inc', 'taxi_office', 'taxi_office.entity');
	$entities = taxi_office_entity_info();
	foreach ($entities as $entity_type => $entity) {
		if (module_load_include('php', 'taxi_office', 'classes/' . $entity_type . '/fields')) {
			foreach ($entity['bundles'] as $bundle_name => $bundle) {
				$function = '__' . $entity_type . '_fields';
				echo $function;
				if (function_exists($function)) {
					if ($op == 'install') {
						echo "Installing fields for " . $entity_type . '/' . $bundle_name, PHP_EOL;
						_install_helper_fields($function(), $bundle_name, $entity_type);
					} elseif ($op == "delete") {
						echo "Uninstalling fields for " . $entity_type . '/' . $bundle_name, PHP_EOL;
						_uninstall_helper_fields($function(), $bundle_name, $entity_type);
					}
				}
			}
		}
	}
}