<?php
App::uses('AppController', 'Controller');
/**
 * GoldmallPlayers Controller
 *
 * @property GoldmallPlayer $GoldmallPlayer
 */
class GoldmallPlayersController extends AppController {

	public function choice_winner($id = null) {
		if (!$this->GoldmallPlayer->exists($id)) {
			throw new NotFoundException(__('Invalid goldmall player'));
		}
		
		// is_winner 필드를 1로 바꾸는걸로...
		$goldmallPlayer	= $this->GoldmallPlayer->read(null, $id);
		$goldmallPlayer['GoldmallPlayer']['is_winner'] = 1;

		if ($this->GoldmallPlayer->save($goldmallPlayer)) {
			$this->Session->setFlash(__('The goldmall player has been saved'));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The goldmall player could not be saved. Please, try again.'));
		}
		
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$conditions = array();
		$this->request->data['GoldmallPlayer'] = $this->passedArgs = array_merge($this->passedArgs, $this->params['url']);
		
		if(!empty($this->passedArgs['goldmall_item_id'])) {
			$conditions['and'][] = array('GoldmallPlayer.goldmall_item_id' => $this->passedArgs['goldmall_item_id']);
		}
		
		$goldmallItems	= $this->GoldmallPlayer->GoldmallItem->find('list', array('fields'=>array('id','name')));
		$this->set('goldmallItems', $goldmallItems);

		$this->GoldmallPlayer->recursive = 0;
		$this->set('goldmallPlayers', $this->paginate('GoldmallPlayer', $conditions));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GoldmallPlayer->exists($id)) {
			throw new NotFoundException(__('Invalid goldmall player'));
		}
		$options = array('conditions' => array('GoldmallPlayer.' . $this->GoldmallPlayer->primaryKey => $id));
		$this->set('goldmallPlayer', $this->GoldmallPlayer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GoldmallPlayer->create();
			if ($this->GoldmallPlayer->save($this->request->data)) {
				$this->Session->setFlash(__('The goldmall player has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The goldmall player could not be saved. Please, try again.'));
			}
		}
		$goldmallItems = $this->GoldmallPlayer->GoldmallItem->find('list');
		$players = $this->GoldmallPlayer->Player->find('list');
		$this->set(compact('goldmallItems', 'players'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->GoldmallPlayer->exists($id)) {
			throw new NotFoundException(__('Invalid goldmall player'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->GoldmallPlayer->save($this->request->data)) {
				$this->Session->setFlash(__('The goldmall player has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The goldmall player could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GoldmallPlayer.' . $this->GoldmallPlayer->primaryKey => $id));
			$this->request->data = $this->GoldmallPlayer->find('first', $options);
		}
		$goldmallItems = $this->GoldmallPlayer->GoldmallItem->find('list');
		$players = $this->GoldmallPlayer->Player->find('list');
		$this->set(compact('goldmallItems', 'players'));
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
		$this->GoldmallPlayer->id = $id;
		if (!$this->GoldmallPlayer->exists()) {
			throw new NotFoundException(__('Invalid goldmall player'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->GoldmallPlayer->delete()) {
			$this->Session->setFlash(__('Goldmall player deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Goldmall player was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
