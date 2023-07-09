<?php
App::uses('AppController', 'Controller');
/**
 * InvitationMessages Controller
 *
 * @property InvitationMessage $InvitationMessage
 */
class InvitationMessagesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->InvitationMessage->recursive = 0;
		$this->set('invitationMessages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->InvitationMessage->exists($id)) {
			throw new NotFoundException(__('Invalid invitation message'));
		}
		$options = array('conditions' => array('InvitationMessage.' . $this->InvitationMessage->primaryKey => $id));
		$this->set('invitationMessage', $this->InvitationMessage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InvitationMessage->create();
			if ($this->InvitationMessage->save($this->request->data)) {
				$this->Session->setFlash(__('The invitation message has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invitation message could not be saved. Please, try again.'));
			}
		}
		$languages = $this->InvitationMessage->Language->find('list');
		$this->set(compact('languages'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->InvitationMessage->exists($id)) {
			throw new NotFoundException(__('Invalid invitation message'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->InvitationMessage->save($this->request->data)) {
				$this->Session->setFlash(__('The invitation message has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The invitation message could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InvitationMessage.' . $this->InvitationMessage->primaryKey => $id));
			$this->request->data = $this->InvitationMessage->find('first', $options);
		}
		$languages = $this->InvitationMessage->Language->find('list');
		$this->set(compact('languages'));
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
		$this->InvitationMessage->id = $id;
		if (!$this->InvitationMessage->exists()) {
			throw new NotFoundException(__('Invalid invitation message'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->InvitationMessage->delete()) {
			$this->Session->setFlash(__('Invitation message deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Invitation message was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
