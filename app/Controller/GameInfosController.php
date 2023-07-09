<?php
App::uses('AppController', 'Controller');
/**
 * GameInfos Controller
 *
 * @property GameInfo $GameInfo
 */
class GameInfosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->GameInfo->recursive = 0;
		$this->set('gameInfos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GameInfo->exists($id)) {
			throw new NotFoundException(__('Invalid game info'));
		}
		$options = array('conditions' => array('GameInfo.' . $this->GameInfo->primaryKey => $id));
		$this->set('gameInfo', $this->GameInfo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GameInfo->create();
			if ($this->GameInfo->save($this->request->data)) {
				$this->Session->setFlash(__('The game info has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game info could not be saved. Please, try again.'));
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
		if (!$this->GameInfo->exists($id)) {
			throw new NotFoundException(__('Invalid game info'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->GameInfo->save($this->request->data)) {
				$this->Session->setFlash(__('The game info has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The game info could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GameInfo.' . $this->GameInfo->primaryKey => $id));
			$this->request->data = $this->GameInfo->find('first', $options);
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
		$this->GameInfo->id = $id;
		if (!$this->GameInfo->exists()) {
			throw new NotFoundException(__('Invalid game info'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->GameInfo->delete()) {
			$this->Session->setFlash(__('Game info deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Game info was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
