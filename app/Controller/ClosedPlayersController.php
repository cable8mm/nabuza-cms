<?php
App::uses('AppController', 'Controller');
/**
 * ClosedPlayers Controller
 *
 * @property ClosedPlayer $ClosedPlayer
 */
class ClosedPlayersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ClosedPlayer->recursive = 0;
		$this->set('closedPlayers', $this->paginate());
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
		$this->ClosedPlayer->id = $id;
		if (!$this->ClosedPlayer->exists()) {
			throw new NotFoundException(__('Invalid closed player'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ClosedPlayer->delete()) {
			$this->Session->setFlash(__('Closed player deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Closed player was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
