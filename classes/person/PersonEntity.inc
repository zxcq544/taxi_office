<?php

/**
 * Created by PhpStorm.
 * User: eduard
 * Date: 26.05.15
 * Time: 16:07
 */
class PersonEntity extends Entity {
	protected function defaultLabel() {
		return !empty($this->name)?$this->name:"ЧЕЛОВЕК";
	}

	protected function defaultUri() {
		return array('path' => "persons/" . $this->identifier());
	}

}

function person_form($form,&$form_state){

	return $form;
}