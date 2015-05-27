<?php
/**
 * Created by PhpStorm.
 * User: eduard
 * Date: 27.05.15
 * Time: 13:06
 */
function __person_fields() {
	//driver

	$fields = array();
	$field = array(
			'translatable' => '0',
			'settings'     => array(),
			'field_name'   => 'field_registration_address',
			'type'         => 'addressfield',
			'active'       => '1',
			'locked'       => '0',
			'cardinality'  => '1',
	);


	$instance = array(
			'label'         => 'Адрес прописки',
			'widget'        => array(
					'weight'   => '1',
					'type'     => 'addressfield_standard',
					'active'   => 1,
					'settings' => array(
							'available_countries' => array(
									'BL' => 'BL',
							),
							'default_country'     => 'RU',
							'format_handlers'     => array(
									'address'                  => 'address',
									'address-hide-postal-code' => 0,
									'address-hide-street'      => 0,
									'address-hide-country'     => 0,
									'organisation'             => 0,
									'name-full'                => 0,
									'name-oneline'             => 0,
									'address-optional'         => 0,
							),
					),
			),
			'settings'      => array(
					'user_register_form' => FALSE,
			),
			'display'       => array(
					'default' => array(
							'label'    => 'above',
							'type'     => 'addressfield_default',
							'settings' => array(
									'use_widget_handlers' => 1,
									'format_handlers'     => array(
											0 => 'address',
									),
							),
							'weight'   => 0,
					),
					'full'    => array(
							'type'     => 'hidden',
							'label'    => 'above',
							'settings' => array(),
							'weight'   => 0,
					),
					'teaser'  => array(
							'type'     => 'hidden',
							'label'    => 'above',
							'settings' => array(),
							'weight'   => 0,
					),
			),
			'required'      => 0,
			'description'   => '',
			'default_value' => NULL,
			'field_name'    => 'field_registration_address',
			'entity_type'   => 'person',
			'bundle'        => 'driver',
	);
	$fields[] = array(
			'field'    => $field,
			'instance' => $instance
	);

	$field = array(
			'translatable' => '0',
			'settings'     => array(),
			'field_name'   => 'field_real_address',
			'type'         => 'addressfield',
			'active'       => '1',
			'locked'       => '0',
			'cardinality'  => '1',
	);

	$instance = array(
			'label'         => 'Адрес проживания',
			'widget'        => array(
					'weight'   => '2',
					'type'     => 'addressfield_standard',
					'active'   => 1,
					'settings' => array(
							'available_countries' => array(),
							'default_country'     => 'RU',
							'format_handlers'     => array(
									'address'                  => 'address',
									'address-hide-postal-code' => 0,
									'address-hide-street'      => 0,
									'address-hide-country'     => 0,
									'organisation'             => 0,
									'name-full'                => 0,
									'name-oneline'             => 0,
									'address-optional'         => 0,
							),
					),
			),
			'settings'      => array(
					'user_register_form' => FALSE,
			),
			'display'       => array(
					'default' => array(
							'label'    => 'above',
							'type'     => 'addressfield_default',
							'settings' => array(
									'use_widget_handlers' => 1,
									'format_handlers'     => array(
											0 => 'address',
									),
							),
							'weight'   => 1,
					),
					'full'    => array(
							'type'     => 'hidden',
							'label'    => 'above',
							'settings' => array(),
							'weight'   => 0,
					),
					'teaser'  => array(
							'type'     => 'hidden',
							'label'    => 'above',
							'settings' => array(),
							'weight'   => 0,
					),
			),
			'required'      => 0,
			'description'   => '',
			'default_value' => NULL,
			'field_name'    => 'field_real_address',
			'entity_type'   => 'person',
			'bundle'        => 'driver',
	);
	$fields[] = array(
			'field'    => $field,
			'instance' => $instance
	);

	$field = array(
			'translatable' => '0',
			'settings'     => array(
					'allowed_values'          => array(
							0 => '',
							1 => '',
					),
					'allowed_values_function' => '',
			),
			'field_name'   => 'field_blocked',
			'type'         => 'list_boolean',
			'active'       => '1',
			'locked'       => '0',
			'cardinality'  => '1',
	);


	$instance = array(
			'label'         => 'Блокирован',
			'widget'        => array(
					'weight'   => '3',
					'type'     => 'options_onoff',
					'active'   => 1,
					'settings' => array(
							'display_label' => 0,
					),
			),
			'settings'      => array(
					'user_register_form' => FALSE,
			),
			'display'       => array(
					'default' => array(
							'label'    => 'above',
							'type'     => 'list_default',
							'settings' => array(),
							'weight'   => 2,
					),
					'full'    => array(
							'type'     => 'hidden',
							'label'    => 'above',
							'settings' => array(),
							'weight'   => 0,
					),
					'teaser'  => array(
							'type'     => 'hidden',
							'label'    => 'above',
							'settings' => array(),
							'weight'   => 0,
					),
			),
			'required'      => 0,
			'description'   => '',
			'default_value' => array(
					0 => array(
							'value' => 0,
					),
			),
			'field_name'    => 'field_blocked',
			'entity_type'   => 'person',
			'bundle'        => 'driver',
	);
	$fields[] = array(
			'field'    => $field,
			'instance' => $instance
	);

	$field = array(
			'translatable' => '0',
			'settings'     => array(
					'max_length' => '50',
			),
			'field_name'   => 'field_start_work',
			'type'         => 'text',
			'active'       => '1',
			'locked'       => '0',
			'cardinality'  => '1',
	);


	//Поля для диспетчера
	$instance = array(
			'label'         => 'Начало смены',
			'widget'        => array(
					'weight'   => '1',
					'type'     => 'text_textfield',
					'active'   => 1,
					'settings' => array(
							'size' => '60',
					),
			),
			'settings'      => array(
					'text_processing'    => '0',
					'user_register_form' => FALSE,
			),
			'display'       => array(
					'default' => array(
							'label'    => 'above',
							'type'     => 'text_default',
							'settings' => array(),
							'weight'   => 0,
					),
					'full'    => array(
							'type'     => 'hidden',
							'label'    => 'above',
							'settings' => array(),
							'weight'   => 0,
					),
					'teaser'  => array(
							'type'     => 'hidden',
							'label'    => 'above',
							'settings' => array(),
							'weight'   => 0,
					),
			),
			'required'      => 0,
			'description'   => '',
			'default_value' => array(
					0 => array(
							'value' => '8:00',
					),
			),
			'field_name'    => 'field_start_work',
			'entity_type'   => 'person',
			'bundle'        => 'dispatcher',
	);
	$fields[] = array(
			'field'    => $field,
			'instance' => $instance
	);

	$field = array(
			'translatable' => '0',
			'settings'     => array(
					'max_length' => '50',
			),
			'field_name'   => 'field_end_work',
			'type'         => 'text',
			'active'       => '1',
			'locked'       => '0',
			'cardinality'  => '1',
	);


	$instance = array(
			'label'         => 'Конец смены',
			'widget'        => array(
					'weight'   => '2',
					'type'     => 'text_textfield',
					'active'   => 1,
					'settings' => array(
							'size' => '60',
					),
			),
			'settings'      => array(
					'text_processing'    => '0',
					'user_register_form' => FALSE,
			),
			'display'       => array(
					'default' => array(
							'label'    => 'above',
							'type'     => 'text_default',
							'settings' => array(),
							'weight'   => 1,
					),
					'full'    => array(
							'type'     => 'hidden',
							'label'    => 'above',
							'settings' => array(),
							'weight'   => 0,
					),
					'teaser'  => array(
							'type'     => 'hidden',
							'label'    => 'above',
							'settings' => array(),
							'weight'   => 0,
					),
			),
			'required'      => 0,
			'description'   => '',
			'default_value' => NULL,
			'field_name'    => 'field_end_work',
			'entity_type'   => 'person',
			'bundle'        => 'dispatcher',
	);
	$fields[] = array(
			'field'    => $field,
			'instance' => $instance
	);

	$field = array(
			'translatable' => '0',
			'settings'     => array(
					'max_length' => '100',
			),
			'field_name'   => 'field_internal_phone',
			'type'         => 'text',
			'active'       => '1',
			'locked'       => '0',
			'cardinality'  => '1',
	);


	$instance = array(
			'label'         => 'Внутренний номер',
			'widget'        => array(
					'weight'   => '3',
					'type'     => 'text_textfield',
					'active'   => 1,
					'settings' => array(
							'size' => '60',
					),
			),
			'settings'      => array(
					'text_processing'    => '0',
					'user_register_form' => FALSE,
			),
			'display'       => array(
					'default' => array(
							'label'    => 'above',
							'type'     => 'text_default',
							'settings' => array(),
							'weight'   => 2,
					),
					'full'    => array(
							'type'     => 'hidden',
							'label'    => 'above',
							'settings' => array(),
							'weight'   => 0,
					),
					'teaser'  => array(
							'type'     => 'hidden',
							'label'    => 'above',
							'settings' => array(),
							'weight'   => 0,
					),
			),
			'required'      => 0,
			'description'   => '',
			'default_value' => NULL,
			'field_name'    => 'field_internal_phone',
			'entity_type'   => 'person',
			'bundle'        => 'dispatcher',
	);
	$fields[] = array(
			'field'    => $field,
			'instance' => $instance
	);
	return $fields;

}