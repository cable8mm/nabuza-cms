<?php
App::uses('AppModel', 'Model');
/**
 * Player Model
 *
 */
class Player extends AppModel {

	public $order	= 'Player.id DESC';
	
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nickname';

	
	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
			'StatusClosing' => array(
					'className' => 'StatusClosing',
					'foreignKey' => 'status_closing_id',
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'type' => 'INNER'
			),
			'Language' => array(
					'className' => 'Language',
					'foreignKey' => 'language_id',
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'type' => 'INNER'
			),
	);
	
	public $hasOne = array(
			'AccessToken' => array(
					'className' => 'AccessToken',
					'foreignKey' => '',				
					'conditions' => array("`AccessToken`.`appid` = `Player`.`appid`"),
					'fields' => '',
					'order' => '',
					'type' => 'INNER'
			),
				
			);
}
