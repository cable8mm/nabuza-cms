<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 */
class EventsController extends AppController {
	var $uses	= array('Event', 'Player', 'EventWinner');
	var $helpers = array('EventLink');
	var $linkTypes	= array(0=>'없음', '선물하기', '친구초대', '비취구매', '홈페이지 연결');
	
	public function set_winner_choosed_manually($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->request->data['Event']['is_checked'] == false) {	// 체크
				$this->set('isChecked', false);
				$playerIds	= explode(',', $this->request->data['Event']['players']);
				$this->Event->EventWinner->Player->recursive	= -1;
				$players	= $this->Event->EventWinner->Player->find('all', array('conditions'=>array('Player.id'=>$playerIds)));
				$this->set('players', $players);
				$this->request->data['Event']['is_checked'] = true;
			} else {	// 실행
				$this->set('isChecked', true);
				if(isset($this->request->data['Event']['is_update']) || $this->request->data['Event']['is_update'] == false) {
					$this->Event->EventWinner->deleteAll(array('EventWinner.event_id'=>$id));
				}
				
				$playerIds	= explode(',', $this->request->data['Event']['players']);
				$this->Event->EventWinner->Player->recursive	= -1;
				$players	= $this->Event->EventWinner->Player->find('all', array('conditions'=>array('Player.id'=>$playerIds)));
				foreach ($players as $player) {
					$this->Event->EventWinner->id	= null;
					$eventWinner['EventWinner']['event_id']		= $id;
					$eventWinner['EventWinner']['player_id']	= $player['Player']['id'];
					$this->Event->EventWinner->save($eventWinner);
				}
				
				if ($this->Event->updateAll(array('Event.is_winner_choosed'=>true), array('Event.id'=>$id))) {
					$this->Session->setFlash(__('Winner choice is choosed'));
				} else {
					$this->Session->setFlash(__('Winner choice is not choosed. Please, try again.'));
				}
				$this->redirect(array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
			$this->set('isChecked', false);
		}
	}
	
	public function set_winner_choosed($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		
		$this->Event->recursive	= -1;
		$originEvent	= $this->Event->read(null, $id);

		if ($originEvent['Event']['is_winner_choosed'] == true) {
			$this->Session->setFlash(__('이미 당첨자가 선택되었습니다.'));
			$this->redirect(array('action' => 'index'));
			exit();
		}
		
		switch($id) {
			case 3:	// 비치 7개씩 넣어야 함.
				$this->Player->recursive	= -1;
				$players	= $this->Player->find('all', array('conditions'=>array('Player.last_level >=' => 10, 'Player.is_active'=>0)));
				
				foreach ($players as $player) {
					$eventWinner['EventWinner']['event_id']	= $id;
					$eventWinner['EventWinner']['player_id']	= $player['Player']['id'];
					$this->EventWinner->save($eventWinner);
					$this->EventWinner->id	= null;
				}
			break;
		}
		
		if ($this->Event->updateAll(array('Event.is_winner_choosed'=>true), array('Event.id'=>$id))) {
			$this->Session->setFlash(__('Winner choice is complete'));
		} else {
			$this->Session->setFlash(__('Winner choice is not complete. Please, try again.'));
		}
		$this->redirect(array('action' => 'index'));
		
	}
	
	public function set_complete($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
	
		$this->Event->recursive	= -1;
		$originEvent	= $this->Event->read(null, $id);
		
		if ($originEvent['Event']['is_completed'] == true) {
			$this->Session->setFlash(__('이미 이벤트가 완료되었습니다.'));
			$this->redirect(array('action' => 'index'));
			exit();
		}
		
		switch($id) {
			case 2:
			case 3:	// 비치 7개씩 넣어야 함.
				
				$eventWinners	= $this->EventWinner->find('all', array('conditions'=>array('EventWinner.event_id'=>$id)));
				
				foreach ($eventWinners as $eventWinner) {
					$player['Player']['id']	= $eventWinner['Player']['id'];
					$player['Player']['own_jade_count']	= $eventWinner['Player']['own_jade_count'] + $eventWinner['Event']['award_jade_count'];
					$player['Player']['invitation_count']	= $eventWinner['Player']['invitation_count'] + $eventWinner['Event']['award_invitation_count'];
					$player['Player']['own_gold']	= $eventWinner['Player']['own_gold'] + $eventWinner['Event']['award_gold_count'];
					
					$this->Player->updateAll(array(
							'Player.own_jade_count' => $player['Player']['own_jade_count'],
							'Player.invitation_count' => $player['Player']['invitation_count'],
							'Player.own_gold' => $player['Player']['own_gold'],
					), array('Player.id'=>$player['Player']['id']));
				}
				
				break;
			case 7:
				$eventWinners	= $this->EventWinner->find('all', array('conditions'=>array('EventWinner.player_id'=>array(1584, 1604, 1588))));
				
				foreach ($eventWinners as $eventWinner) {
					$player['Player']['id']	= $eventWinner['Player']['id'];
					$player['Player']['own_jade_count']	= $eventWinner['Player']['own_jade_count'] + 30;
						
					$this->Player->updateAll(array(
							'Player.own_jade_count' => $player['Player']['own_jade_count'],
					), array('Player.id'=>$player['Player']['id']));
				}

				$eventWinners	= $this->EventWinner->find('all', array('conditions'=>array('EventWinner.player_id'=>array(223, 1241))));
				
				foreach ($eventWinners as $eventWinner) {
					$player['Player']['id']	= $eventWinner['Player']['id'];
					$player['Player']['own_jade_count']	= $eventWinner['Player']['own_jade_count'] + 77;
				
					$this->Player->updateAll(array(
							'Player.own_jade_count' => $player['Player']['own_jade_count'],
					), array('Player.id'=>$player['Player']['id']));
				}
				break;
			case 8:
				$eventWinners	= $this->EventWinner->find('all', array('conditions'=>array('EventWinner.player_id'=>array(1451,1610))));
				
				foreach ($eventWinners as $eventWinner) {
					$player['Player']['id']	= $eventWinner['Player']['id'];
					$player['Player']['own_jade_count']	= $eventWinner['Player']['own_jade_count'] + 30;
				
					$this->Player->updateAll(array(
							'Player.own_jade_count' => $player['Player']['own_jade_count'],
					), array('Player.id'=>$player['Player']['id']));
				}
				
				$eventWinners	= $this->EventWinner->find('all', array('conditions'=>array('EventWinner.player_id'=>array(1604))));
				
				foreach ($eventWinners as $eventWinner) {
					$player['Player']['id']	= $eventWinner['Player']['id'];
					$player['Player']['own_jade_count']	= $eventWinner['Player']['own_jade_count'] + 77;
				
					$this->Player->updateAll(array(
							'Player.own_jade_count' => $player['Player']['own_jade_count'],
					), array('Player.id'=>$player['Player']['id']));
				}
				break;
			case 9:
						$eventWinners	= $this->EventWinner->find('all', array('conditions'=>array('EventWinner.player_id'=>array(251))));
				
				foreach ($eventWinners as $eventWinner) {
					$player['Player']['id']	= $eventWinner['Player']['id'];
					$player['Player']['own_jade_count']	= $eventWinner['Player']['own_jade_count'] + 30;
				
					$this->Player->updateAll(array(
							'Player.own_jade_count' => $player['Player']['own_jade_count'],
					), array('Player.id'=>$player['Player']['id']));
				}
				
				$eventWinners	= $this->EventWinner->find('all', array('conditions'=>array('EventWinner.player_id'=>array(1365,1610))));
				
				foreach ($eventWinners as $eventWinner) {
					$player['Player']['id']	= $eventWinner['Player']['id'];
					$player['Player']['own_jade_count']	= $eventWinner['Player']['own_jade_count'] + 77;
				
					$this->Player->updateAll(array(
							'Player.own_jade_count' => $player['Player']['own_jade_count'],
					), array('Player.id'=>$player['Player']['id']));
				}
					break;
			case 11:
				$eventWinners	= $this->EventWinner->find('all', array('conditions'=>array('EventWinner.player_id'=>array(1728))));
				
				foreach ($eventWinners as $eventWinner) {
					$player['Player']['id']	= $eventWinner['Player']['id'];
					$player['Player']['own_jade_count']	= $eventWinner['Player']['own_jade_count'] + 30;
				
					$this->Player->updateAll(array(
							'Player.own_jade_count' => $player['Player']['own_jade_count'],
					), array('Player.id'=>$player['Player']['id']));
				}
					break;
			}
		
		if ($this->Event->updateAll(array('Event.is_completed'=>true), array('Event.id'=>$id))) {
			$this->Session->setFlash(__('Winner choice is complete'));
		} else {
			$this->Session->setFlash(__('Winner choice is not complete. Please, try again.'));
		}
		$this->redirect(array('action' => 'index'));
	
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$event	= $this->Event->find('first', $options);
		$this->set('event', $event);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		}
		$languages = $this->Event->Language->find('list');
		$this->set(compact('languages'));
		$this->set('linkTypes', $this->linkTypes);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
		}
		$languages = $this->Event->Language->find('list');
		$this->set(compact('languages'));
		$this->set('linkTypes', $this->linkTypes);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Event->delete()) {
			$this->Session->setFlash(__('Event deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Event was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
