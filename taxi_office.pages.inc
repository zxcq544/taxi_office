<?php

function taxi_office_dispatcher_page() {
	return '';
}

function taxi_office_config_page($form, &$form_state) {
	$form['taxi_office_nodejs_url'] = array(
			'#type'          => 'textfield',
			'#title'         => 'Адрес сервера NodeJS',
			'#default_value' => variable_get('taxi_office_nodejs_url', 'http://localhost:8080'),
			'#required'      => TRUE,
	);

	return system_settings_form($form);
}