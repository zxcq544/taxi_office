<?php


class CallEntity extends Entity {

	const CALL_STATUS_NONE = 0;

	protected function defaultLabel() {
		return "#" . $this->identifier();
	}

	protected function defaultUri() {
		return array('path' => 'calls/' . $this->identifier());
	}

	public function getStatuses() {
		return array(
				$this::CALL_STATUS_NONE => 'Без статуса',
		);
	}

	/**
	 * @param int $status
	 *
	 * @return string|null
	 */
	public function getStatusLabel($status) {
		$statuses = $this::getStatuses();
		return isset($statuses[$status]) ? $statuses[$status] : 'Не верный статус';
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