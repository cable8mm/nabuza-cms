<?php
App::uses('AppModel', 'Model');
/**
 * EventSnapshot Model
 *
 */
class EventSnapshot extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $order = 'EventSnapshot.id DESC';

	public $belongsTo = array(
			'Event' => array(
					'className' => 'Event',
					'foreignKey' => 'event_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			),
	);
	
}
