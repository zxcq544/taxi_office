<?php
function __call_schema(&$schema) {
	$schema['taxi_office_calls'] = array(
			'description' => 'TaxiOffice incoming calls base table',
			'fields'      => array(
					'id'        => array(
							'type'     => 'serial',
							'not null' => TRUE,
							'unsigned' => TRUE,
					),
					'hang_time' => array(
							'type'     => 'int',
							'not null' => TRUE,
							'unsigned' => TRUE,
					),
					'operator'  => array(
							'type'     => 'int',
							'not null' => TRUE,
							'unsigned' => TRUE,
							'default'  => 0,
					),

					'status'    => array(
							'type'     => 'int',
							'not null' => TRUE,
							'unsigned' => TRUE,
							'default'  => 0,
					),
			),
			'primary key' => array('id'),
	);
}