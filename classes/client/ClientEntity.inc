<?php


class ClientEntity extends Entity {
	protected function defaultLabel() {
		return empty($this->phone) ? '' : $this->phone;
	}

	protected function defaultUri() {
		return array('path' => 'taxi-client/' . $this->identifier());
	}
}

function client_form($form, &$form_state, $client = NULL) {
	return $form;
}