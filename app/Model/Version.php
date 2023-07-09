<?php
App::uses('AppModel', 'Model');
/**
 * Version Model
 *
 */
class Version extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'version';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'version' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'published' => array(
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
