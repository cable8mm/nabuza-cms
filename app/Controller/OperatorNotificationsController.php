<?php
App::uses('AppController', 'Controller');
/**
 * OperatorNotifications Controller
 *
 * @property OperatorNotification $OperatorNotification
 */
class OperatorNotificationsController extends AppController {
	var $uses	= array('OperatorNotification', 'Player');
	var $components	= array('Notification');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OperatorNotification->recursive = 0;
		$this->set('operatorNotifications', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OperatorNotification->exists($id)) {
			throw new NotFoundException(__('Invalid operator notification'));
		}
		$options = array('conditions' => array('OperatorNotification.' . $this->OperatorNotification->primaryKey => $id));
		$this->set('operatorNotification', $this->OperatorNotification->find('first', $options));
	}

	public function event_operator_notification($id = null) {
		if (!$this->OperatorNotification->exists($id)) {
			throw new NotFoundException(__('Invalid operator notification'));
		}
		
		if ($this->request->is('post')) {
			$password	= $this->request->data['OperatorNotification']['password'];
			$title	= $this->request->data['OperatorNotification']['title'];
			$message	= $this->request->data['OperatorNotification']['message'];
				
			if($password == 'doslxpdlf' && !empty($title) && !empty($message)) {
				
				$this->loadModel('EventWinner');
				$sql	= '
						SELECT notificationid
							FROM players AS Player, event_winners AS EventWinner
							WHERE EventWinner.event_id = '.$id.'
								AND EventWinner.player_id = Player.id
								';
				$eventWinners	= $this->EventWinner->query($sql, false);
				
				foreach ($eventWinners as $k=>$eventWinner) {
					$notifinationids[$k]	= $eventWinner['Player']['notificationid'];
				}
				
				$this->OperatorNotification->create();
				$gcmResponse	= $this->Notification->send_bulk('a', $notifinationids, $this->request->data['OperatorNotification']['title'], $this->request->data['OperatorNotification']['message'] );
				$this->request->data['OperatorNotification']['player_id']	= 0;
				$this->request->data['OperatorNotification']['success']	= $gcmResponse['success'];
				$this->request->data['OperatorNotification']['failure']	= $gcmResponse['failure'];
	
				if ($this->OperatorNotification->save($this->request->data)) {
					$this->Session->setFlash(__('The operator notification has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The operator notification could not be saved. Please, try again.'));
				}
				$this->redirect(array('action' => 'add_all_players'));
			} else {
				$this->Session->setFlash(__('The operator password is not collect or all fields must not empty.'));
			}
		}
	}
	
	public function add_all_players() {
		
		if ($this->request->is('post')) {
			$languageId	= $this->request->data['OperatorNotification']['language'];
			$password	= $this->request->data['OperatorNotification']['password'];
			$title	= $this->request->data['OperatorNotification']['title'];
			$message	= $this->request->data['OperatorNotification']['message'];
			
			if($password == 'doslxpdlf' && !empty($title) && !empty($message) && !empty($languageId)) {
				$notifinationids	= $this->Player->find('list', array('fields'=>array('Player.notificationid'), 'conditions'=>array('and'=>array(array('Player.language_id'=>$languageId), 'not'=>array('Player.notificationid'=>'')))));
				$this->OperatorNotification->create();
				$gcmResponse	= $this->Notification->send_bulk('a', $notifinationids, $this->request->data['OperatorNotification']['title'], $this->request->data['OperatorNotification']['message'] );
				$this->request->data['OperatorNotification']['player_id']	= 0;
				$this->request->data['OperatorNotification']['success']	= $gcmResponse['success'];
				$this->request->data['OperatorNotification']['failure']	= $gcmResponse['failure'];
				
				if ($this->OperatorNotification->save($this->request->data)) {
					$this->Session->setFlash(__('The operator notification has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The operator notification could not be saved. Please, try again.'));
				}
				$this->redirect(array('action' => 'add_all_players'));
			} else {
				$this->Session->setFlash(__('The operator password is not collect or all fields must not empty.'));
			}
		}
		
		$languages	= $this->Player->Language->find('list');
		$this->set('languages', $languages);
	}
	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		
		$playerId	= $this->request->params['named']['player_id'];
		if (empty($playerId) || !$this->Player->exists($playerId)) {
			throw new NotFoundException(__('Invalid operator notification'));
		}

		$player	= $this->Player->read(null, $playerId);

		if ($this->request->is('post')) {
			if (!empty($player['Player']['notificationid'])) {
				$this->OperatorNotification->create();
					
				if (empty($player['Player']['os']))
					$player['Player']['os'] = 'a';
					
				$gcmResponse	= $this->Notification->send($player['Player']['os'], $player['Player']['notificationid'], $this->request->data['OperatorNotification']['title'], $this->request->data['OperatorNotification']['message'] );
				$this->request->data['OperatorNotification']['player_id']	= $player['Player']['id'];
				$this->request->data['OperatorNotification']['success']	= $gcmResponse->success;
				$this->request->data['OperatorNotification']['failure']	= $gcmResponse->failure;
				
				if ($this->OperatorNotification->save($this->request->data)) {
					$this->Session->setFlash(__('The operator notification has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The operator notification could not be saved. Please, try again.'));
				}
			} else {
				$this->Session->setFlash(__('The operator notificationid is empty. Please, try again.'));
			}
		}


		$this->set('player', $player);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OperatorNotification->exists($id)) {
			throw new NotFoundException(__('Invalid operator notification'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OperatorNotification->save($this->request->data)) {
				$this->Session->setFlash(__('The operator notification has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The operator notification could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OperatorNotification.' . $this->OperatorNotification->primaryKey => $id));
			$this->request->data = $this->OperatorNotification->find('first', $options);
		}
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
		$this->OperatorNotification->id = $id;
		if (!$this->OperatorNotification->exists()) {
			throw new NotFoundException(__('Invalid operator notification'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OperatorNotification->delete()) {
			$this->Session->setFlash(__('Operator notification deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Operator notification was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
