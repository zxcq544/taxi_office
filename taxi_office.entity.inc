<?php

function taxi_office_entity_info() {
	$entity = array();
	_taxi_office_includes('entity', $entity);
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

function taxi_office_clien_access($op = 'view', $client = NULL, $account = NULL) {
	if (empty($account)) {
		global $user;
		$account = $user;
	}
	switch ($op) {
		case 'view':
			return user_access(ClientEntityController::CLIENT_VIEW, $account);
		case 'edit':
		case 'update':
		case 'create':
			return user_access(ClientEntityController::CLIENT_EDIT, $account);
		case 'delete':
			return user_access(ClientEntityController::CLIENT_DELETE, $account);
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
 * @param array $uids
 *
 * @return array
 */
function person_load_multiple($uids = array()) {
	return entity_load('person', $uids);
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
 * @param $ids
 *
 * @return array
 */
function call_load_multiple($ids) {
	return entity_load('call', $ids);
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
 * @param $cids
 *
 * @return array
 */
function car_load_multiple($cids) {
	return entity_load('car', $cids);
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

/**
 * @param $ids
 *
 * @return array
 */
function order_load_multiple($ids) {
	return entity_load('order', $ids);
}