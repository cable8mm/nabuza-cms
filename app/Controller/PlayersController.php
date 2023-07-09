<?php
App::uses('AppController', 'Controller');
/**
 * Players Controller
 *
 * @property Player $Player
 */
class PlayersController extends AppController {

	var $scaffold;
	var $helpers = array('Market');
	
	public function notify($id = null) {
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('The player has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Player->read(null, $id);
		}
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$goldLevels	= array(
				1 => 100
				,500
				,1000
				,2000
				,3000
				,4000
				,6000
				,8000
				,10000
				,15000
				,20000
				,25000
				,35000
				,45000
				,55000
				,80000
				,105000
				,130000
				,160000
				,190000
				,220000
				,300000
				,350000
				,400000
				,500000
				,600000
				,700000
				,900000
				,1100000
				,1300000
				,2000000
				,2500000
				,3000000
				,4000000
				,5000000
				,999999999
		);
		
		$conditions = $this->data = array();

		$this->request->data['Player'] = $this->passedArgs = array_merge($this->passedArgs, $this->params['url']);
	
		if(!empty($this->passedArgs['phone_number'])) {
			$conditions['and'][] = array('Player.phone_number LIKE' => '%'.$this->passedArgs['phone_number'].'%');
		}

		if(!empty($this->passedArgs['gold_level'])) {
			$conditions['and'][] = array('Player.own_gold >= ' => $goldLevels[$this->passedArgs['gold_level']]);
		}
		
		
		if(!empty($this->passedArgs['appid'])) {
			$conditions['and'][] = array('Player.appid' => $this->passedArgs['appid']);
		}
		
		if(!empty($this->passedArgs['nickname'])) {
			$conditions['and'][] = array('Player.nickname LIKE' => '%'.$this->passedArgs['nickname'].'%');
		}

		if(!empty($this->passedArgs['status_closing_id'])) {
			$conditions['and'][] = array('Player.status_closing_id' => $this->passedArgs['status_closing_id']);
//			$this->Player->unbindModel(array('hasOne'=>array('AccessToken')));
		} else {
			$conditions['and'][] = array('NOT'=>array('Player.appid' => ''));
		}
		
		if(!empty($this->passedArgs['start_created'])) {
			$conditions['and'][] = array('Player.created >= ' => $this->passedArgs['start_created']);
		}

		if(!empty($this->passedArgs['end_created'])) {
			$endCreated	= date('Y-m-d', strtotime('+1 day', strtotime($this->passedArgs['end_created'])));
			$conditions['and'][] = array('Player.created <= ' => $endCreated);
		}

		if(isset($this->passedArgs['is_played']) && $this->passedArgs['is_played'] !== '') {
			if ($this->passedArgs['is_played'] == 1)
				$conditions['and'][] = array('Player.highscore <> ' => 0);
			else 
				$conditions['and'][] = array('Player.highscore' => 0);
		}

		if(!empty($this->passedArgs['language_id'])) {
			$conditions['and'][] = array('Player.language_id' => $this->passedArgs['language_id']);
		}

		if(!empty($this->passedArgs['market_id'])) {
			$conditions['and'][] = array('Player.market_id' => $this->passedArgs['market_id']);
		}
		
		$this->Player->recursive = 0;
		$isPlayed	= array('플래이 안 함', '플래이 함');
		$this->set('isPlayed', $isPlayed);
		$this->set('players', $this->paginate('Player', $conditions));
		$this->set('goldLevels', $goldLevels);
		$statusClosings	= $this->Player->StatusClosing->find('list');
		$languages	= $this->Player->Language->find('list');
		$this->set('languages', $languages);
		$this->set('statusClosings', $statusClosings);
		$markets	= array(1=>'Google Play', 'T-Store', 'App Store');	// 1 : Google Play Market / 2 : T-Store / 3 : App Store
		$this->set('markets', $markets);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		$this->set('player', $this->Player->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Player->create();
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('The player has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$player	= $this->Player->read(null, $id);
			
			if ($player['Player']['status_closing_id'] != 2 && $this->request->data['Player']['status_closing_id'] == 2) {	// closed
				// 탈퇴 백업. appid, os, phone number를 closed_players 테이블에 복사한 후 이 값들을 Null로 바꾸어 놓는다.
				$closingPlayer['ClosedPlayer']['os']	= $player['Player']['os'];
				$closingPlayer['ClosedPlayer']['player_id']	= $player['Player']['id'];
				$closingPlayer['ClosedPlayer']['appid']	= $player['Player']['appid'];
				$closingPlayer['ClosedPlayer']['phone_number']	= $player['Player']['phone_number'];
				
				$this->request->data['Player']['os']	= '';
				$this->request->data['Player']['appid'] = '';
				$this->request->data['Player']['phone_number'] = '';
				$this->request->data['Player']['nickname']	= '';
				
				Controller::loadModel('ClosedPlayer');
					
				$this->ClosedPlayer->create();
				$this->ClosedPlayer->save($closingPlayer);
			}
			
			if ($player['Player']['status_closing_id'] != 0 && $this->request->data['Player']['status_closing_id'] == 0) {	// unclosed
				// 탈퇴 백업. appid, os, phone number를 closed_players 테이블에 복사한 후 이 값들을 Null로 바꾸어 놓는다.
				Controller::loadModel('ClosedPlayer');
				
				$closingPlayer	= $this->ClosedPlayer->find('first', array('conditions'=>array('ClosedPlayer.player_id'=> $id)));
				
				$this->request->data['Player']['os']	= $closingPlayer['ClosedPlayer']['os'];
				$this->request->data['Player']['appid']	= $closingPlayer['ClosedPlayer']['appid'];
				$this->request->data['Player']['phone_number']	= $closingPlayer['ClosedPlayer']['phone_number'];
				$this->request->data['Player']['nickname']	= 'SavedPlayer';
			}
			
			if ($this->Player->save($this->request->data)) {
				if ($player['Player']['status_closing_id'] != 0 && $this->request->data['Player']['status_closing_id'] == 0) {	// unclosed
					$this->ClosedPlayer->deleteAll(array('ClosedPlayer.player_id' => $id), false);
				}
				
				$this->Session->setFlash(__('The player has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Player->read(null, $id);
		}
		
		$languages	= $this->Player->Language->find('list');
		$this->set('languages', $languages);
		$statusClosings	= $this->Player->StatusClosing->find('list');
		$this->set('statusClosings', $statusClosings);
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	public function mail() {
		$datetime       = date("Y:m:d H:i:s");
		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail();
		$email->from(array('cable8mm@anytale.com' => '나부자 심심이'))
		->to('nabuza@anytale.com')
		->subject('[나부자-탈퇴요청] '.$player['Player']['nickname'].'님이 나부자 탈퇴 신청을 보내셨습니다.')
		->send("닉네임 : ".$player['Player']['nickname']."\n전화번호 : ".$player['Player']['phone_number']."\nappid : ".$player['Player']['appid']."\n탈퇴를 요청한 시간 : ".$datetime);
		exit;
		$datetime	= date("Y:m:d H:i:s");
		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail();
		$email->from(array('cable8mm@anytale.com' => '나부자'))
		->to('cable8mm@gmail.com')
		->subject('[나부자-탈퇴요청] 이삼구님이 나부자 탈퇴 신청을 보내셨습니다..')
		->send("닉네임 : 이삼구\n전화번호 : 821063900239\nappid : kiadsyf98yaksjdhfpwioehf\n탈퇴를 요청한 시간 : ".$datetime);
		
		exit;
	}
	
	public function unclosing($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		
		// 탈퇴 백업. appid, os, phone number를 closed_players 테이블에 복사한 후 이 값들을 Null로 바꾸어 놓는다.
		$player	= $this->Player->read(null, $id);
		$player['Player']['status_closing_id'] = 0;
		
		if ($this->Player->save($player)) {
			$this->Session->setFlash(__('The player has been unclosed'));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The player could not be unclosed. Please, try again.'));
		}
		
	}
	
	public function closing($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		
		// 탈퇴 백업. appid, os, phone number를 closed_players 테이블에 복사한 후 이 값들을 Null로 바꾸어 놓는다.
		$player	= $this->Player->read(null, $id);
		
		if ($player['Player']['status_closing_id'] != 1) {
			throw new NotFoundException(__('Critical closing error'));
		}
		
		$closingPlayer['ClosedPlayer']['os']	= $player['Player']['os'];
		$closingPlayer['ClosedPlayer']['player_id']	= $player['Player']['id'];
		$closingPlayer['ClosedPlayer']['appid']	= $player['Player']['appid'];
		$closingPlayer['ClosedPlayer']['phone_number']	= $player['Player']['phone_number'];

		$player['Player']['os']	= '';
		$player['Player']['appid'] = '';
		$player['Player']['phone_number'] = '';
		$player['Player']['nickname']	= '';
		$player['Player']['status_closing_id'] = 2;
		
		Controller::loadModel('ClosedPlayer');

		$this->ClosedPlayer->create();
		if ($this->ClosedPlayer->save($closingPlayer)) {
				
			if ($this->Player->save($player)) {
				$this->Session->setFlash(__('The player has been closed'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player could not be closed. Please, try again.'));
			}
			
		} else {
			$this->Session->setFlash(__('The player could not be closed. Please, try again.'));
		}
		
// 		App::uses('CakeEmail', 'Network/Email');
// 		$email = new CakeEmail();
// 		$email->from(array('cable8mm@anytale.com' => 'Nabuza'))
// 		->to('cable8mm@gmail.com')
// 		->subject('You are closed')
// 		->send('You are closed');

	}
}
