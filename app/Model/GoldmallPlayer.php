<?php
App::uses('AppModel', 'Model');
/**
 * GoldmallPlayer Model
 *
 * @property GoldmallItem $GoldmallItem
 * @property SubmittedPlayer $SubmittedPlayer
 */
class GoldmallPlayer extends AppModel {
	var $order = 'GoldmallPlayer.id DESC';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'submitted_player_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'GoldmallItem' => array(
			'className' => 'GoldmallItem',
			'foreignKey' => 'goldmall_item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Player' => array(
			'className' => 'Player',
			'foreignKey' => 'submitted_player_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function choosing($goldmallItemId, $winnerCount) {
		$weekAgo	= date("Y-m-d H:i:s", strtotime('-1 week'));
		$goldmallItem = $this->GoldmallItem->find('first', array('fields'=>array('GoldmallItem.goldmall_item_controller_id'), 'conditions'=>array('GoldmallItem.id'=>$goldmallItemId)));
		// 같은 골드몰 아이템 리스트 (종료 후 일주일까지)
		$goldmallItems	= $this->GoldmallItem->find('list', array('fields'=>array('GoldmallItem.id'), 
				'conditions'=>array(
						'GoldmallItem.goldmall_item_controller_id'=>$goldmallItem['GoldmallItem']['goldmall_item_controller_id'],
						'GoldmallItem.finished >'=>$weekAgo
						)
				));
		$goldmallItemsString	= implode(',', $goldmallItems);
		// 같은 골드몰 아이템 리스트에서의 당첨자 리스트
		$sql	= '
			SELECT DISTINCT GoldmallPlayer.submitted_player_id
				FROM goldmall_players AS GoldmallPlayer
				WHERE GoldmallPlayer.goldmall_item_id NOT IN ('.$goldmallItemsString.')';

		$goldmallBuddies	= $this->query($sql);
		$goldmallBuddyString	= '';
		
		foreach ($goldmallBuddies as $goldmallBuddy) {
			$goldmallBuddyString	.= $goldmallBuddy['GoldmallPlayer']['submitted_player_id'] . ',';
		}
		
		$goldmallBuddyString	= preg_replace('/,$/', '', $goldmallBuddyString);
		
		$sql	= '
        		SELECT id, submitted_player_id, rand()*100+submit_count AS `weight_point`
        			FROM goldmall_players AS GoldmallPlayer
        			WHERE GoldmallPlayer.goldmall_item_id = '.$goldmallItemId.'
        				AND GoldmallPlayer.id NOT IN ('.$goldmallBuddyString.')
        			ORDER BY weight_point DESC
        			LIMIT '.$winnerCount;
	
		$goldmallPlayers	= $this->query($sql);
	
		if (!$goldmallPlayers)
			return 0;
	
		$choosedWinnerCount	= 0;
		foreach ($goldmallPlayers as $goldmallPlayer) {
			$this->updateAll(
					array('GoldmallPlayer.is_winner' => 1)
					,array('GoldmallPlayer.id'=>$goldmallPlayer['GoldmallPlayer']['id'])
			);
			$choosedWinnerCount++;
		}
	
		return $choosedWinnerCount;
	}
	
// 	public function choosing($goldmallItemId, $winnerCount) {
// 		$sql	= '
//         		SELECT id, submitted_player_id, rand()*100+submit_count AS `weight_point`
//         			FROM goldmall_players AS GoldmallPlayer
//         			WHERE GoldmallPlayer.goldmall_item_id = '.$goldmallItemId.'
//         			ORDER BY weight_point DESC
//         			LIMIT '.$winnerCount;
		        			 
// 		$goldmallPlayers	= $this->query($sql);
		
// 		if (!$goldmallPlayers)
// 			return 0;
		
// 		$choosedWinnerCount	= 0;
// 		foreach ($goldmallPlayers as $goldmallPlayer) {
// 			$this->updateAll(
// 					array('GoldmallPlayer.is_winner' => 1)
// 					,array('GoldmallPlayer.id'=>$goldmallPlayer['GoldmallPlayer']['id'])
// 			);
// 			$choosedWinnerCount++;
// 		}
		
// 		return $choosedWinnerCount;
// 	}
}
