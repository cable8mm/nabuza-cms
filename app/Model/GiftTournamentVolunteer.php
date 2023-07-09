<?php
App::uses('AppModel', 'Model');
/**
 * GiftTournamentVolunteer Model
 *
 * @property GiftTournament $GiftTournament
 * @property Player $Player
 */
class GiftTournamentVolunteer extends AppModel {

	public $order	= 'GiftTournamentVolunteer.id DESC';
	
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
		'GiftTournament' => array(
			'className' => 'GiftTournament',
			'foreignKey' => 'gift_tournament_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Player' => array(
			'className' => 'Player',
			'foreignKey' => 'player_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
