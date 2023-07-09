<?php
App::uses('AppModel', 'Model');
/**
 * GoldmallItemController Model
 *
 * @property GoldmallItem $GoldmallItem
 */
class GoldmallItemController extends AppModel {
	var $order = 'GoldmallItemController.important_point DESC';
	
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
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'important_point' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'spent_gold' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'award_jade_count' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'award_invitation_count' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'award_gold_count' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'image_url' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'url' => array(
				'rule' => array('url'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'winner_image_url' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'url' => array(
				'rule' => array('url'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_repeat' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'started' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'term_day' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_auto_winner_choosed' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_active' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'GoldmallItem' => array(
			'className' => 'GoldmallItem',
			'foreignKey' => 'goldmall_item_controller_id',
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

	public function generateItem($id) {
		$goldmallItemController	= $this->read(null, $id);
		
		$this->GoldmallItem->recursive = -1;
		$prevGoldmallItem	= $this->GoldmallItem->find('first', array('order'=>array('GoldmallItem.finished DESC'), 'conditions'=>array('GoldmallItem.goldmall_item_controller_id'=>$id)));
		$current	= date("Y-m-d H:i:s");

		if (!empty($prevGoldmallItem)) {	// 과거 내역이 있으면...
			$finished	= $prevGoldmallItem['GoldmallItem']['finished'];
			$diff = strtotime($prevGoldmallItem['GoldmallItem']['finished']) - strtotime($current);	// 양수면 finished는 미래, 음수면 finished는 과거, 0이면 같음

			if ($diff >= 0) {	// finished는 미래 혹은 현재
				$started	= $finished;
			} else {	// 과거
				$started	= $current;
			}
		} else {	// 과거 내역이 없으면
			$started	= $goldmallItemController['GoldmallItemController']['started'];
		}
		
		$goldmallItem['GoldmallItem']['goldmall_item_controller_id']	= $id;
		$goldmallItem['GoldmallItem']['language_id']	= $goldmallItemController['GoldmallItemController']['language_id'];
		$goldmallItem['GoldmallItem']['important_point']	= $goldmallItemController['GoldmallItemController']['important_point'];
		$goldmallItem['GoldmallItem']['spent_gold']	= $goldmallItemController['GoldmallItemController']['spent_gold'];
		$goldmallItem['GoldmallItem']['award_jade_count']	= $goldmallItemController['GoldmallItemController']['award_jade_count'];
		$goldmallItem['GoldmallItem']['award_invitation_count']	= $goldmallItemController['GoldmallItemController']['award_invitation_count'];
		$goldmallItem['GoldmallItem']['award_gold_count']	= $goldmallItemController['GoldmallItemController']['award_gold_count'];
		$goldmallItem['GoldmallItem']['image_url']	= $goldmallItemController['GoldmallItemController']['image_url'];
		$goldmallItem['GoldmallItem']['winner_image_url']	= $goldmallItemController['GoldmallItemController']['winner_image_url'];
		$goldmallItem['GoldmallItem']['winner_count']	= $goldmallItemController['GoldmallItemController']['winner_count'];
		$goldmallItem['GoldmallItem']['started']	= $started;
		$goldmallItem['GoldmallItem']['is_auto_winner_choosed']	= ($goldmallItemController['GoldmallItemController']['is_repeat']=='')? 0 : $goldmallItemController['GoldmallItemController']['is_repeat'];
		$goldmallItem['GoldmallItem']['name']	= $goldmallItemController['GoldmallItemController']['name'];
		$goldmallItem['GoldmallItem']['language_id']	= $goldmallItemController['GoldmallItemController']['language_id'];
		$goldmallItem['GoldmallItem']['is_request_delivery_info']	= $goldmallItemController['GoldmallItemController']['is_request_delivery_info'];
		
		// Is Request Delivery Info - is_request_delivery_info
		$finished	= new DateTime($goldmallItem['GoldmallItem']['started']);
		$finished->add(new DateInterval('P'.($goldmallItemController['GoldmallItemController']['term_day']).'D'));
		
		$goldmallItem['GoldmallItem']['finished']	= $finished->format('Y-m-d H:i:s');
		
		$this->GoldmallItem->create();
		return $this->GoldmallItem->save($goldmallItem);
	}
	
}
