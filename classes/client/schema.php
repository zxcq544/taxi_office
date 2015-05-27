<?php
function __client_schema(&$schema) {
	$schema['taxi_office_clients'] = array(
			'description' => 'TaxiOffice clients base table',
			'fields'      => array(
					'id'      => array(
							'type'     => 'serial',
							'not null' => TRUE,
							'unsigned' => TRUE,
					),
					'phone'   => array(
							'type'     => 'varchar',
							'not null' => TRUE,
							'length'   => 20,
					),
					'name'    => array(
							'type'     => 'varchar',
							'not null' => FALSE,
							'length'   => 100,
							'default'  => NULL,
					),
					'comment' => array(
							'type'     => 'text',
							'not null' => FALSE,
							'size'     => 'tiny',
							'default'  => NULL,
					),
			),
			'primary key' => array('id'),
	);
}