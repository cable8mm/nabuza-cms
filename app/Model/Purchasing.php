<?php
App::uses('AppModel', 'Model');
/**
 * Purchasing Model
 *
 * @property Player $Player
 * @property Product $Product
 */
class Purchasing extends AppModel {
	var $order = 'Purchasing.id DESC';
/**
 * Display field
 *
 * @var string
 */


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Player' => array(
			'className' => 'Player',
			'foreignKey' => 'player_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
