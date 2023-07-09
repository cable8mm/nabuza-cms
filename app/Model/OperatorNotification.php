<?php
App::uses('AppModel', 'Model');
/**
 * OperatorNotification Model
 *
 */
class OperatorNotification extends AppModel {
	var $order = 'OperatorNotification.id DESC';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

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
