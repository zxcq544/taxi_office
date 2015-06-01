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

	$form['description'] = array(
			'#type'        => 'textfield',
			'#title'       => t('Пояснения к заказу'),
			//        '#default_value' => 1,
			//        '#size' => 2,
			'#maxlength'   => 255,
			'#description' => t('Description'),
			'#required'    => TRUE,
	);

	$form['order_client_id'] = array(
			'#type'        => 'textfield',
			'#title'       => t('Reference client id'),
			//        '#default_value' => 1,
			//        '#size' => 2,
			'#maxlength'   => 255,
			'#description' => t('Reference client id'),
			'#required'    => TRUE,
	);

	$form['estimated_charge'] = array(
			'#type'        => 'textfield',
			'#title'       => t('Estimated charge'),
			//        '#default_value' => 1,
			//        '#size' => 2,
			'#maxlength'   => 255,
			'#description' => t('Estimated charge'),
			'#required'    => TRUE,
	);

	$form['phone'] = array(
			'#type'        => 'textfield',
			'#title'       => t('phone'),
			//        '#default_value' => 1,
			//        '#size' => 2,
			'#maxlength'   => 255,
			'#description' => t('phone'),
			'#required'    => TRUE,
	);


	$form['status'] = array(
			'#type'        => 'textfield',
			'#title'       => t('status'),
			//        '#default_value' => 1,
			//        '#size' => 2,
			'#maxlength'   => 255,
			'#description' => t('status'),
			'#required'    => TRUE,
	);

	$form['charge'] = array(
			'#type'        => 'textfield',
			'#title'       => t('charge'),
			//        '#default_value' => 1,
			//        '#size' => 2,
			'#maxlength'   => 255,
			'#description' => t('charge'),
			'#required'    => TRUE,
	);

	$form['destination'] = array(
			'#type'        => 'textfield',
			'#title'       => t('destination'),
			//        '#default_value' => 1,
			//        '#size' => 2,
			'#maxlength'   => 255,
			'#description' => t('destination'),
			'#required'    => TRUE,
	);

	$form['submit'] = array(
			'#type'  => 'submit',
			'#value' => 'Отправить'
			//        '#default_value' => 1,
			//        '#size' => 2,
	);

	return $form;
}


function order_form_form_alter(&$form, &$form_state, $form_id) {
	$form['order_form'] = array(
			'#action' => 'path/you/want',
	);
}

function order_form_submit($form, &$form_state) {


	$form_state['values']['cabid'] = 2;
	$entity = entity_ui_controller('order')->entityFormSubmitBuildEntity($form, $form_state);
	$entity->save();
	if(!empty($_GET['ajax'])){
		$form_state['redirect'] = "/dispatcher";
	}
}