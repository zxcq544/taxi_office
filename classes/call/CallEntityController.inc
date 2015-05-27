<?php


class CallEntityController extends EntityAPIController {
	const CALL_VIEW = 'view call';

	public function create(array $values = array()) {
		$time = time();
		$values['created'] = $time;
		return parent::create($values);
	}

	/**
	 * @param CallEntity $entity
	 * @param string     $view_mode
	 * @param null       $langcode
	 * @param array      $content
	 *
	 * @return array
	 */
	public function buildContent($entity, $view_mode = 'full', $langcode = NULL, $content = array()) {
		$content['created'] = array(
															'#title'      => 'Время поступления',
															'#field_name' => 'created',
															'#items'      => array(array('value' => $entity->created)),
															0             => array('#markup' => check_plain(date('d.m.Y H:i:s', $entity->created)))
													) + _taxi_office_view_field_defaults($entity, 'inline');

		if (!empty($entity->hang_time)) {
			$content['hang_time'] = array(
																	'#title'      => 'Время принятия звонка',
																	'#field_name' => 'hang_time',
																	'#items'      => array(array('value' => $entity->hang_time)),
																	0             => array('#markup' => check_plain(date('d.m.Y H:i:s',
																																											 $entity->hang_time)))
															) + _taxi_office_view_field_defaults($entity, 'inline');
		}

		if (!empty($entity->operator)) {
			$operator = person_load($entity->operator);
			if (!empty($operator)) {
				$content['operator'] = array(
																	 '#title'      => 'Оператор',
																	 '#field_name' => 'operator',
																	 '#items'      => array(array('value' => $operator->identifier())),
																	 0             => array('#markup' => l($operator->getFullName(),
																																				 $operator->uri()['path']))
															 ) + _taxi_office_view_field_defaults($entity, 'inline');
			} else {
				$content['operator'] = array(
																	 '#title'      => 'Оператор',
																	 '#field_name' => 'operator',
																	 '#items'      => array(array('value' => NULL)),
																	 0             => array('#markup' => check_plain('Оператор небыл найден'))
															 ) + _taxi_office_view_field_defaults($entity, 'inline');
			}
		}

		$content['status'] = array(
														 '#title'      => 'Статус',
														 '#field_name' => 'status',
														 '#items'      => array(array('value' => $entity->status)),
														 0             => array('#markup' => check_plain($entity->getStatusLabel($entity->status)))
												 ) + _taxi_office_view_field_defaults($entity, 'inline');


		return parent::buildContent($entity, $view_mode, $langcode, $content);
	}

}