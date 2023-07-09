<?php
App::uses('AppModel', 'Model');
/**
 * Coupon Model
 *
 * @property CouponSponsor $CouponSponsor
 */
class Coupon extends AppModel {
	var $order	= 'Coupon.id DESC';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'serial';

	public $validate = array(
			'serial' => array(
					'alphaNumeric' => array(
							'rule'     => 'isUnique',
							'required' => true,
							'message'  => 'not unique'
					)
			)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'CouponIssue' => array(
			'className' => 'CouponIssue',
			'foreignKey' => 'coupon_issue_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Player' => array(
			'className' => 'Player',
			'foreignKey' => 'used_player_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
}
