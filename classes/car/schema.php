<?php

$schema['taxi_office_cars'] = array(
		'description' => 'The base table of taxi_office_cars',
		'fields'      => array(
				'cid' => array(
						'description' => 'Primary key',
						'type'        => 'serial',
						'not null'    => TRUE,
						'unsigned'    => TRUE,
				),
		),
		'primary key' => array('cid'),

);