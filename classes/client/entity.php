<?php

function __client_entity(&$entity) {
	$entity['client'] = array(
			'label'            => t('Клиент'),
			'plural label'     => t('Клиенты'),
			'description'      => t('Клиенты таксопарка'),
			'label callback'   => 'entity_class_label',
			'uri callback'     => 'entity_class_uri',
			'access callback'  => 'taxi_office_clien_access',
			'bundles key'      => array(),
			'entity keys'      => array('id' => 'id', 'label' => 'phone'),
			'bundles'          => array(),
			'entity class'     => 'ClientEntity',
			'controller class' => 'ClientEntityController',
			'fieldable'        => FALSE,
			'admin ui'         => array(
					'path'             => 'admin/clients',
					'controller class' => 'ClientUIController'
			),
			'base table'       => 'taxi_office_clients',
			'view modes'       => array(),
			'module'           => 'taxi_office',
	);
}
