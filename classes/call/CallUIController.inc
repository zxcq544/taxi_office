<?php


class CallUIController extends EntityDefaultUIController {
	public function hook_menu() {
		$items = parent::hook_menu();
		$items['calls/%call'] = array(
				'page callback'    => 'CallUIController::view',
				'page arguments'   => array(1),
				'access callback'  => 'taxi_office_call_access',
				'access arguments' => array('view', 1),
				'type'             => MENU_CALLBACK,
		);

		return $items;
	}

	/**
	 * @param CallEntity $call
	 *
	 * @return bool
	 */
	public static function view($call = NULL) {
		drupal_set_title(
				format_string(t('Call #@id'), array('@id' => $call->identifier()))
		);
		$output = entity_view($call->entityType(), array($call));

		return $output;
	}
}