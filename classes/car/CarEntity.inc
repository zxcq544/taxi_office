<?php

/**
 * Created by PhpStorm.
 * User: eduard
 * Date: 26.05.15
 * Time: 11:39
 */
class CarEntity extends Entity {
	protected function defaultLabel() {
		return "";
	}

	protected function defaultUri() {
		return array('path' => 'cars/' . $this->identifier());
	}

}

function car_form($form, &$form_state) {

	return $form;
}