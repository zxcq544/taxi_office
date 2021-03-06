<?php

/**
 * Created by PhpStorm.
 * User: eduard
 * Date: 26.05.15
 * Time: 10:44
 */
class OrderEntity extends Entity {

	const STATUS_PLANNED            = 'planned';
	const STATUS_INCOMING           = 'incoming';
	const STATUS_ISSUED             = "issued";
	const STATUS_CAB_SELECTION      = "cab_selection";
	const STATUS_CAB_ASSIGNED       = "cab_assigned";
	const STATUS_CAB_SERVED         = "cab_served";
	const STATUS_TRANSPORT_CUSTOMER = "transport_customer";
	const STATUS_COMPLETE           = "complete";
	const STATUS_CANCEL             = "complete";
	const STATUS_FAIL               = "fail";

	static function getStatusesInfo() {

		$statuses = array(
				self::STATUS_PLANNED            => array('label' => 'планируемый',),
				self::STATUS_INCOMING           => array('label' => 'Входящий',),
				self::STATUS_ISSUED             => array('label' => 'Оформлен',),
				self::STATUS_CAB_SELECTION      => array('label' => 'Выбор экипажа',),
				self::STATUS_CAB_ASSIGNED       => array('label' => 'Экипаж назначен',),
				self::STATUS_CAB_SERVED         => array('label' => 'Экипаж подан',),
				self::STATUS_TRANSPORT_CUSTOMER => array('label' => 'Перевозка клиента',),
				self::STATUS_COMPLETE           => array('label' => 'Заказ выполнен',),
				self::STATUS_CANCEL             => array('label' => 'Отлонен',),
				self::STATUS_FAIL               => array('label' => 'Пролет',),
		);

		return $statuses;
	}

	static function getStatusItemInfo($status) {
		return self::getStatusesInfo()[$status];
	}

	function setStatus($status) {
		$old_status = $this->getStatus();
		if ($old_status != $status && in_array($status, array_keys(self::getStatusesInfo()))) {
			$this->status = $status;
		}
	}

	function getStatus() {
		return $this->status;
	}

	protected function defaultLabel() {
		return "#" . $this->identifier();
	}

	protected function defaultUri() {
		return array('path' => 'orders/' . $this->identifier());
	}


}

function order_form($form, &$form_state) {


	return $form;
}