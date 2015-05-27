<?php


class CallEntity extends Entity {
	protected function defaultLabel() {
		return "#" . $this->identifier();
	}

	protected function defaultUri() {
		return array('path' => 'calls/' . $this->identifier());
	}


}

/**
 * @param            $form
 * @param            $form_state
 * @param CallEntity $call
 *
 * @return mixed
 */
function call_form($form, &$form_state, $call = NULL) {

	return $form;
}