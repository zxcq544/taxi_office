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
			drupal_add_css(drupal_get_path('module', 'taxi_office') . '/css/style.css');
			$page = array();
			$page['notify_block'] = array(
					'#type'       => 'container',
					'#attributes' => array(
							'class' => 'd-notify-section'
					)
			);
			return '';
		} else {
			$http = $headers == FALSE ? '' : (' Статус запроса: <em>' . $headers[0] . '</em>');
			return 'Не возможно присоединится к адресу <strong>' . $nodeJsUrl . '</strong>' . $http;
		}
	} else {
		//Загружаем шаблон кнопки которая грузит по аяксу форму для добавления заказов
		$str = DRUPAL_ROOT . '/' .
					 drupal_get_path('module', 'taxi_office') . "/template/order_button_to_get_form_by_ajax.tpl.php";
		$page['test'] = [
				'#markup' => file_get_contents($str)
		];
		return $page;
	}
}

function ajax_order_page() {
	$order = entity_create('order', array());
	$form = render(entity_ui_get_form('order', $order, 'add'));
	echo $form;
	exit;
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

function taxi_office_phone_form($form, &$form_state) {
	$form['container'] = array(
			'#type' => 'container',
	);
	$buttons = array();

	$buttons['call1'] = array(
			'#type'       => 'button',
			'#value'      => 'Звонок 1',
			'#attributes' => array(
					'number' => '898954549'
			)
	);
	$buttons['call2'] = array(
			'#type'       => 'button',
			'#value'      => 'Звонок 2',
			'#attributes' => array(
					'number' => '5446546465'
			)
	);
	$buttons['call3'] = array(
			'#type'       => 'button',
			'#value'      => 'Звонок 3',
			'#attributes' => array(
					'number' => '898984545'
			)
	);
	$buttons['call4'] = array(
			'#type'       => 'button',
			'#value'      => 'Звонок 4',
			'#attributes' => array(
					'number' => '898989899899'
			)
	);
	$form['container']['buttons'] = $buttons;
	$form['#attached']['js'][] = drupal_get_path('module', 'taxi_office') . '/js/test-calls.js';

	return $form;
}

function taxi_office_test_drivers() {
	$elements = array();
	$random = rand(1, 15);

	for ($i = 1; $i < $random; $i++) {
		$elements['driver-' . $i] = array(
				'#type'       => 'item',
				'#attributes' => array(
						'class' => array(
								'driver-wrapper',
								'driver-wrapper-' . $i
						),
				),
				'#title'      => 'Driver #' . $i,
		);
		$elements['driver-' . $i]['apply'] = array(
				'#type'  => 'button',
				'#value' => 'Apply',
		);
		$elements['driver-' . $i]['cancel'] = array(
				'#type'  => 'button',
				'#value' => 'Cancel',
		);
	}
	return render($elements);
}


function taxi_office_theme() {
	return array(
			'order_form' => array(
					'template'  => 'template/order_form',
					'variables' => array('order_form' => NULL, 'topics' => NULL, 'parents' => NULL, 'tid' => NULL,
															 'sortby'     => NULL, 'forum_per_page' => NULL),
			),
	);
}

