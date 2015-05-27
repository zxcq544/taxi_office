<?php
/**
 * Created by PhpStorm.
 * User: eduard
 * Date: 26.05.15
 * Time: 14:54
 */

function __person_entity(&$entity) {
	$entity['person'] = array(
			'label'            => "Человек",
			'plural label'     => 'Человечишки',
			'label callback'   => 'entity_class_label',
			'uri callback'     => 'entity_class_uri',
			'access callback'  => 'person_access',
			'entity keys'      => array(
					'id'     => 'uid',
					'bundle' => 'type',
			),
			'bundles key'      => array('bundle' => 'type'),
			'bundles'          => array(
					'driver'     => array(
							'label'        => 'Водитель',
							'plural label' => 'Водители',
							'description'  => '',
							'admin'        => array(
									'path' => 'admin/persons/drivers'
							)
					),
					'dispatcher' => array(
							'label'        => 'Диспетчеры',
							'plural label' => 'Диспетчеры',
							'admin'        => array(
									'path' => 'admin/persons/dispatchers'
							)
					)
			),
			'description'      => '',
			'entity class'     => 'PersonEntity',
			'controller class' => 'PersonEntityController',
			'fieldable'        => TRUE,

			'admin ui' => array(
					'menu wildcard'    => '%',
					'path'             => 'admin/persons',
					'controller class' => 'PersonUIController'
			),
			'base table'       => 'taxi_office_persons',
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