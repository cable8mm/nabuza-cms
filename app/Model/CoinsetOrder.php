<?php
App::uses('AppModel', 'Model');
/**
 * CoinsetOrder Model
 *
 * @property Coinset $Coinset
 */
class CoinsetOrder extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'coinset_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Coinset' => array(
			'className' => 'Coinset',
			'foreignKey' => 'coinset_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
