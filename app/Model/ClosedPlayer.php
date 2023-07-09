<?php
App::uses('AppModel', 'Model');
/**
 * ClosedPlayer Model
 *
 * @property Player $Player
 */
class ClosedPlayer extends AppModel {

	var $order = 'ClosedPlayer.id DESC';
	
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


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
		)
	);
}
