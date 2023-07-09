<?php
App::uses('AppModel', 'Model');
/**
 * SevenTournamentVolunteer Model
 *
 * @property Player $Player
 */
class SevenTournamentVolunteer extends AppModel {

	public $order = 'SevenTournamentVolunteer.id DESC';
	
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'player_id';


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
