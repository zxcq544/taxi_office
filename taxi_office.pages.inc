<?php

function taxi_office_dispatcher_page() {
	$nodeJsUrl = variable_get('taxi_office_nodejs_url', '');
	if (!empty($nodeJsUrl)) {
		$headers = @get_headers($nodeJsUrl);
		if ($headers !== FALSE && (bool)preg_match('/200\s*OK/', $headers[0])) {
		} else {
			$http = $headers == FALSE ? '' : ('Статус запроса: <em>' . $headers[0] . '</em>');
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