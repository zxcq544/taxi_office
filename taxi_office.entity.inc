<?php

function taxi_office_entity_info() {
	$entity = array();
	_taxi_office_include_settings('entity', $entity);
	return $entity;
}

function taxi_office_call_access($op = 'view', $call = NULL, $account = NULL) {
	if (empty($account)) {
		global $user;
		$account = $user;
	}

	switch ($op) {
		case 'view':
			return user_access(CallEntityController::CALL_VIEW, $account);
	}
	return FALSE;
}

/**
 * @param int $uid Drupal user uid
 *
 * @return PersonEntity|null mixed
 */
function person_load($uid) {
	return entity_load_single('person', $uid);
}

/**
 * @param int $id Call id
 *
 * @return CallEntity|null mixed
 */
function call_load($id) {
	return entity_load_single('call', $id);
}

/**
 * @param int $cid Car id
 *
 * @return CarEntity|null mixed
 */
function car_load($cid) {
	return entity_load_single('car', $cid);
}

/**
 * @param int $id Order id
 *
 * @return OrderEntity|null mixed
 *
 */
function order_load($id) {
	return entity_load_single('order', $id);
}