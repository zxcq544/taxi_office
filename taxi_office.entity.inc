<?php

function taxi_office_entity_info() {
	$entity = array();
	_taxi_office_include_settings('entity',$entity);
	return $entity;
}