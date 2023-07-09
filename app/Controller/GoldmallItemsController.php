<?php
App::uses('AppController', 'Controller');
/**
 * GoldmallItems Controller
 *
 * @property GoldmallItem $GoldmallItem
 */
class GoldmallItemsController extends AppController {

	public function complete($id = null) {
		if (!$this->GoldmallItem->exists($id)) {
			throw new NotFoundException(__('Invalid goldmall item'));
		}
		
		$goldmallItem	= $this->GoldmallItem->read(null, $id);
		
		$choosedWinnerCount	= $this->GoldmallItem->GoldmallPlayer->choosing($goldmallItem['GoldmallItem']['id'], $goldmallItem['GoldmallItem']['winner_count']);
		$this->GoldmallItem->complete($goldmallItem['GoldmallItem']['id'], $choosedWinnerCount);
		
		$this->Session->setFlash(__('The goldmall item has been completed'));
		$this->redirect(array('action' => 'index'));
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$conditions = $this->data = array();
		if (!isset($this->params['url']['is_activate'])) {
			$this->params['url']	= array('is_activate' => 1);
		}
		
		$this->request->data['GoldmallItem'] = $this->passedArgs = array_merge($this->passedArgs, $this->params['url']);
		
		$current	= date('Y-m-d H:i:s');

		if(!empty($this->passedArgs['is_activate'])) {
			$conditions['AND'][] = array(
					'GoldmallItem.started <= '=>$current
					, '`GoldmallItem`.`finished` >=' => $current
			);
		}
		
		$this->GoldmallItem->recursive = 0;
		$this->set('goldmallItems', $this->paginate('GoldmallItem', $conditions));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GoldmallItem->exists($id)) {
			throw new NotFoundException(__('Invalid goldmall item'));
		}
		$options = array('conditions' => array('GoldmallItem.' . $this->GoldmallItem->primaryKey => $id));
		$this->set('goldmallItem', $this->GoldmallItem->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GoldmallItem->create();
			if ($this->GoldmallItem->save($this->request->data)) {
				$this->Session->setFlash(__('The goldmall item has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The goldmall item could not be saved. Please, try again.'));
			}
		}
		
		$languages	= $this->GoldmallItem->Language->find('list');
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
		if (!$this->GoldmallItem->exists($id)) {
			throw new NotFoundException(__('Invalid goldmall item'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->GoldmallItem->save($this->request->data)) {
				$this->Session->setFlash(__('The goldmall item has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The goldmall item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GoldmallItem.' . $this->GoldmallItem->primaryKey => $id));
			$this->request->data = $this->GoldmallItem->find('first', $options);
		}
		$languages	= $this->GoldmallItem->Language->find('list');
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
		$this->GoldmallItem->id = $id;
		if (!$this->GoldmallItem->exists()) {
			throw new NotFoundException(__('Invalid goldmall item'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->GoldmallItem->delete()) {
			$this->Session->setFlash(__('Goldmall item deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Goldmall item was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
