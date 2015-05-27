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
		case 'create':
		case 'add':
			return FALSE;
		case 'view':
			return user_access(CallEntityController::CALL_VIEW, $account);
		case 'edit':
		case 'update':
			return user_access(CallEntityController::CALL_EDIT, $account);
		case 'delete':
		case 'remove':
			return user_access(CallEntityController::CALL_DELETE . $account);
	}
	return FALSE;
}