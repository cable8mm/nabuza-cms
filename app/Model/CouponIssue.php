<?php
App::uses('AppModel', 'Model');
/**
 * CouponIssue Model
 *
 * @property CouponSponsor $CouponSponsor
 */
class CouponIssue extends AppModel {
	var $order = 'CouponIssue.id DESC';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'created';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'CouponSponsor' => array(
			'className' => 'CouponSponsor',
			'foreignKey' => 'coupon_sponsor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	public $hasMany = array(
		'Coupon' => array(
			'className' => 'Coupon',
//			'foreignKey' => 'coupon_issue_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
