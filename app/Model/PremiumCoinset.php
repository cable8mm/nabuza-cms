<?php
App::uses('AppModel', 'Model');
/**
 * PremiumCoinset Model
 *
 * @property PremiumCoinsetOrder $PremiumCoinsetOrder
 */
class PremiumCoinset extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'PremiumCoinsetOrder' => array(
			'className' => 'PremiumCoinsetOrder',
			'foreignKey' => 'premium_coinset_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
