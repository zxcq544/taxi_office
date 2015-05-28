<?php

function taxi_office_dispatcher_page() {
	$nodeJsUrl = variable_get('taxi_office_nodejs_url', '');
	if (!empty($nodeJsUrl)) {
		$scriptUrl = $nodeJsUrl . '/socket.io/socket.io.js';
		$headers = @get_headers($scriptUrl);
		if ($scriptUrl !== FALSE && (bool)preg_match('/200\s*OK/', $headers[0])) {
			drupal_add_js($scriptUrl);
			drupal_add_js('var nodeJsUrl = "' . $nodeJsUrl . '"', 'inline');
			drupal_add_js(drupal_get_path('module', 'taxi_office') . '/js/dispatcher-soket-io.js');
			return '';
		} else {
			$http = $headers == FALSE ? '' : (' Статус запроса: <em>' . $headers[0] . '</em>');
			return 'Не возможно присоединится к адресу <strong>' . $nodeJsUrl . '</strong>' . $http;
		}
	} else
		return 'Нет настроек <strong><em>Адрес сервера NodeJS</em></strong>';
}

function taxi_office_config_page($form, &$form_state) {
	$form['taxi_office_nodejs_url'] = array(
			'#type'          => 'textfield',
			'#title'         => 'Адрес сервера NodeJS',
			'#default_value' => variable_get('taxi_office_nodejs_url', ''),
			'#required'      => TRUE,
	);

	return system_settings_form($form);
}