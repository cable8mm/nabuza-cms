<?php
App::uses('AppController', 'Controller');
/**
 * GoldmallItemControllers Controller
 *
 * @property GoldmallItemController $GoldmallItemController
 */
class GoldmallItemControllersController extends AppController {

	var $uses = array('GoldmallItemController', 'GoldmallItem');
	
	public function generate_goldmall_item($id = null) {
		if (!$this->GoldmallItemController->exists($id)) {
			throw new NotFoundException(__('Invalid goldmall item controller'));
		}
		
		if ($this->GoldmallItemController->generateItem($id)) {
			$this->Session->setFlash(__('The goldmall item has been saved'));
			$this->redirect(array('action' => 'view', $id));
		} else {
			$this->Session->setFlash(__('The goldmall item could not be saved. Please, try again.'));
		}
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

		$this->request->data['GoldmallItemController'] = $this->passedArgs = array_merge($this->passedArgs, $this->params['url']);
		
		$current	= date('Y-m-d H:i:s');

		if(!empty($this->passedArgs['is_activate'])) {
			$conditions['OR'][] = array(
					'GoldmallItemController.started <= '=>$current
					, '`GoldmallItemController`.`started` + INTERVAL GoldmallItemController.term_day DAY >=' => $current
			);
			$conditions['OR'][] = array(
					'GoldmallItemController.is_repeat'=>1
			);
			$conditions['AND'][] = array(
					'GoldmallItemController.is_active'=>1
			);
		}
		
		$this->GoldmallItemController->recursive = 0;
		$this->set('goldmallItemControllers', $this->paginate('GoldmallItemController', $conditions));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->GoldmallItemController->exists($id)) {
			throw new NotFoundException(__('Invalid goldmall item controller'));
		}
		$options = array('conditions' => array('GoldmallItemController.' . $this->GoldmallItemController->primaryKey => $id));
		$this->set('goldmallItemController', $this->GoldmallItemController->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GoldmallItemController->create();
			if ($this->GoldmallItemController->save($this->request->data)) {
				$this->Session->setFlash(__('The goldmall item controller has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The goldmall item controller could not be saved. Please, try again.'));
			}
		}
		$languages	= $this->GoldmallItemController->Language->find('list');
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
		if (!$this->GoldmallItemController->exists($id)) {
			throw new NotFoundException(__('Invalid goldmall item controller'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->GoldmallItemController->save($this->request->data)) {
				$this->Session->setFlash(__('The goldmall item controller has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The goldmall item controller could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('GoldmallItemController.' . $this->GoldmallItemController->primaryKey => $id));
			$this->request->data = $this->GoldmallItemController->find('first', $options);
		}
		$languages	= $this->GoldmallItemController->Language->find('list');
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
		$this->GoldmallItemController->id = $id;
		if (!$this->GoldmallItemController->exists()) {
			throw new NotFoundException(__('Invalid goldmall item controller'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->GoldmallItemController->delete()) {
			$this->Session->setFlash(__('Goldmall item controller deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Goldmall item controller was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
