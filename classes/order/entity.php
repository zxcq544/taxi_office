<?php


function __order_entity(&$entity) {
	$entity['order'] = array(
			'label'            => 'Заказ',
			'plural label'     => 'Заказы',
			'label callback'   => 'entity_class_label',
			'uri callback'     => 'entity_class_uri',
			'access callback'  => 'order_access',
			'bundles key'      => array(),
			'entity keys'      => array(
					'id' => 'oid',
					//					'label' => 'oid'
			),
			'bundles'          => array(
					'order' => array(
							'label'        => 'Заказ',
							'plural label' => 'Заказы',
							'description'  => '',
							'admin ui'     => array(
									'path' => 'admin/orders'
							)
					)
			),
			'description'      => '',
			'entity class'     => 'OrderEntity',
			'controller class' => 'OrderEntityController',
			'fieldable'        => TRUE,

			'admin ui'         => array(
					'path'             => 'admin/orders',
					'controller class' => 'OrderUIController'
			),
			'base table'       => 'taxi_office_orders',
			'view modes'       => array(
					'full'   => array(
							'label'           => t('Full'),
							'custom settings' => TRUE,
					),
					'teaser' => array(
							'label'           => t('Teaser'),
							'custom settings' => TRUE,
					),
			),
			'module'           => 'taxi_office',
	);
}