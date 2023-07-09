<?php
App::uses('AppModel', 'Model');
/**
 * InvitationMessage Model
 *
 */
class InvitationMessage extends AppModel {

	var $order = 'InvitationMessage.id DESC';
	
	public $belongsTo = array(
			'Language' => array(
					'className' => 'Language',
					'foreignKey' => 'language_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			),
	);
	
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'kakaotalk_message';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'kakaotalk_message' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sms_message' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
