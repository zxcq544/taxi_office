<?php


class CallEntityController extends EntityAPIController {
	const CALL_VIEW = 'view call';

	public function create(array $values = array()) {
		$time = time();
		$values['created'] = $time;
		return parent::create($values);
	}
}