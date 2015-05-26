<?php
/**
 * Created by PhpStorm.
 * User: eduard
 * Date: 26.05.15
 * Time: 10:44
 */

class OrderEntity extends Entity{

	protected function defaultLabel() {
		return "#".$this->identifier();
	}

	protected function defaultUri() {
		return array('path'=>'orders/'.$this->identifier());
	}


}

function order_form($form,&$form_state){


	return $form;
}