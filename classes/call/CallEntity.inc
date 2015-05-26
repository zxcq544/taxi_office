<?php


class CallEntity extends Entity{
	protected function defaultLabel() {
		return "#".$this->identifier();
	}

	protected function defaultUri() {
		return array('path'=>'calls/'.$this->identifier());
	}


}

function call_form($form,&$form_state){

	return $form;
}