<?php
App::uses('AppController', 'Controller');
/**
 * CoinsetOrders Controller
 *
 * @property CoinsetOrder $CoinsetOrder
 */
class CoinsetOrdersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CoinsetOrder->recursive = 0;
		$this->set('coinsetOrders', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CoinsetOrder->exists($id)) {
			throw new NotFoundException(__('Invalid coinset order'));
		}
		$options = array('conditions' => array('CoinsetOrder.' . $this->CoinsetOrder->primaryKey => $id));
		$this->set('coinsetOrder', $this->CoinsetOrder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CoinsetOrder->create();
			if ($this->CoinsetOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The coinset order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coinset order could not be saved. Please, try again.'));
			}
		}
		$coinsets = $this->CoinsetOrder->Coinset->find('list');
		$this->set(compact('coinsets'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CoinsetOrder->exists($id)) {
			throw new NotFoundException(__('Invalid coinset order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CoinsetOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The coinset order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coinset order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CoinsetOrder.' . $this->CoinsetOrder->primaryKey => $id));
			$this->request->data = $this->CoinsetOrder->find('first', $options);
		}
		$coinsets = $this->CoinsetOrder->Coinset->find('list');
		$this->set(compact('coinsets'));
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
		$this->CoinsetOrder->id = $id;
		if (!$this->CoinsetOrder->exists()) {
			throw new NotFoundException(__('Invalid coinset order'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CoinsetOrder->delete()) {
			$this->Session->setFlash(__('Coinset order deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Coinset order was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
