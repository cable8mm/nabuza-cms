<?php
App::uses('AppModel', 'Model');
/**
 * PremiumCoinsetOrder Model
 *
 * @property PremiumCoinset $PremiumCoinset
 */
class PremiumCoinsetOrder extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'PremiumCoinset' => array(
			'className' => 'PremiumCoinset',
			'foreignKey' => 'premium_coinset_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
