<?php
App::uses('AppModel', 'Model');
/**
 * GiftTournament Model
 *
 * @property GiftTournamentVolunteer $GiftTournamentVolunteer
 */
class GiftTournament extends AppModel {

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
		'GiftTournamentVolunteer' => array(
			'className' => 'GiftTournamentVolunteer',
			'foreignKey' => 'gift_tournament_id',
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
