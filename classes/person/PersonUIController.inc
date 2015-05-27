<?php
/**
 * Created by PhpStorm.
 * User: eduard
 * Date: 26.05.15
 * Time: 18:41
 */

class PersonUIController extends EntityDefaultUIController {
	function hook_menu(){
		$items = parent::hook_menu();

		$items[$this->path.'/add']['page callback'] = 'entity_ui_bundle_add_page';
		$items[$this->path.'/add']['page arguments'] = array($this->entityType);
	return $items;

	}
}
