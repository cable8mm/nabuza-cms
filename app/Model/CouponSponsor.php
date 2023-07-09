<?php
App::uses('AppModel', 'Model');
/**
 * CouponSponsor Model
 *
 * @property CouponIssue $CouponIssue
 */
class CouponSponsor extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'CouponIssue' => array(
			'className' => 'CouponIssue',
			'foreignKey' => 'coupon_sponsor_id',
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
