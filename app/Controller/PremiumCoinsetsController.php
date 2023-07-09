<?php
App::uses('AppController', 'Controller');
/**
 * Coinsets Controller
 *
 * @property Coinset $Coinset
 */
class PremiumCoinsetsController extends AppController {

	var $countCoins	= 49;	// 0부터 시작
	var $countCoinColor	= 5;	// 0부터 시작
	
	public function ajax_get_coins($id = null) {
		if (!$this->PremiumCoinset->exists($id)) {
			throw new NotFoundException(__('Invalid coinset'));
		}
		pr($this->RequestHandler);
//		if ($this->RequestHandler->isAjax()) {
//     		Configure::write('debug', 0);
		$premiumCoinsetOrders = $this->PremiumCoinset->CoinsetOrders->find('all');
		$this->set(compact('premiumCoinsetOrders'));
		
     		$this->autoRender = false;
     		$this->layout = 'ajax';
//		}
	}
	
	public function generate_random_coins($id = null) {
		if (!$this->PremiumCoinset->exists($id)) {
			throw new NotFoundException(__('Invalid coinset'));
		}
		
		$this->_generate_random_coins($id);
		
		$this->Session->setFlash(__('The random coins has been generated'));
		$this->redirect(array('action' => 'index'));
	}
	
	private function _generate_random_coins($id) {
		for ($i = 0; $i < $this->countCoins; $i++) {
			$coinsetOrder	= $this->PremiumCoinset->PremiumCoinsetOrder->find('first', array('conditions'=>array('PremiumCoinsetOrder.premium_coinset_id'=>$id, 'PremiumCoinsetOrder.order'=>$i)));
		
			$coinsetOrder['PremiumCoinsetOrder']['premium_coinset_id']	= $id;
			$coinsetOrder['PremiumCoinsetOrder']['order']	= $i;
			$coinsetOrder['PremiumCoinsetOrder']['coin_color']	= rand(0, $this->countCoinColor - 1);
		
			$this->PremiumCoinset->PremiumCoinsetOrder->save($coinsetOrder);
				
			$coinsetOrder	= array();
			$this->PremiumCoinset->PremiumCoinsetOrder->id	= null;
		}
	}
	
	public function change($coinsetId = null) {
		if (!$this->PremiumCoinset->exists($coinsetId)) {
			throw new NotFoundException(__('Invalid coinset'));
		}

		if (!isset($this->params['named']['order'])) {
			throw new NotFoundException(__('Invalid Order'));
		}

		if (!isset($this->params['named']['palette_color'])) {
			throw new NotFoundException(__('Invalid Palette Color'));
		}
		
		$coinsetOrder	= $this->PremiumCoinset->PremiumCoinsetOrder->find('first', array('conditions'=>array('PremiumCoinsetOrder.premium_coinset_id'=>$coinsetId, 'PremiumCoinsetOrder.order'=>$this->params['named']['order'])));

		$nextCoinColor	= $this->params['named']['palette_color'];
		$coinsetOrder['PremiumCoinsetOrder']['coin_color']	= $nextCoinColor;

		$this->PremiumCoinset->PremiumCoinsetOrder->save($coinsetOrder);
// echo date('Y-m-d H:i:s');
		$this->PremiumCoinset->recursive = -1;
		$this->PremiumCoinset->id = $coinsetId;
		$this->PremiumCoinset->saveField('modified', date('Y-m-d H:i:s'));
		
		$this->redirect(array('action' => 'custom', $coinsetId, 'order'=>$this->params['named']['order'], 'palette_color'=>$this->params['named']['palette_color']));
		
	}
	
	public function all_change($coinsetId = null) {
		if (!$this->PremiumCoinset->exists($coinsetId)) {
			throw new NotFoundException(__('Invalid coinset'));
		}
	
		if (!isset($this->params['named']['all_color'])) {
			throw new NotFoundException(__('Invalid Palette Color'));
		}
	
		$coinColor	= $this->params['named']['all_color'];
	
		$this->PremiumCoinset->PremiumCoinsetOrder->updateAll(array('PremiumCoinsetOrder.coin_color'=>$coinColor), array('PremiumCoinsetOrder.premium_coinset_id'=>$coinsetId));
	
		$this->redirect(array('action' => 'custom', $coinsetId, 'palette_color'=>$this->params['named']['palette_color']));
	
	}
	
	public function custom($id = null) {
		if (!$this->PremiumCoinset->exists($id)) {
			throw new NotFoundException(__('Invalid coinset'));
		}
		
		$paletteColor	= 0;
		if (isset($this->params['named']['palette_color'])) {
			$paletteColor	= $this->params['named']['palette_color'];
		}
		
		$this->layout	= 'game';
		
		$coinsetOrders = $this->PremiumCoinset->PremiumCoinsetOrder->find('list', array('fields'=>array('PremiumCoinsetOrder.order', 'PremiumCoinsetOrder.coin_color'),'conditions'=>array('PremiumCoinsetOrder.premium_coinset_id'=>$id)));
		$this->set('coinsetOrders', $coinsetOrders);
		$this->set('paletteColor', $paletteColor);
		$this->set('coinsetId', $id);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PremiumCoinset->recursive = 0;
		$this->set('coinsets', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PremiumCoinset->exists($id)) {
			throw new NotFoundException(__('Invalid coinset'));
		}
		$options = array('conditions' => array('PremiumCoinset.' . $this->Coinset->primaryKey => $id));
		$this->set('coinset', $this->Coinset->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PremiumCoinset->create();
			if ($this->PremiumCoinset->save($this->request->data)) {
				$this->Session->setFlash(__('The coinset has been saved'));
				$this->_generate_random_coins($this->PremiumCoinset->id);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coinset could not be saved. Please, try again.'));
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
		if (!$this->PremiumCoinset->exists($id)) {
			throw new NotFoundException(__('Invalid premium coinset'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PremiumCoinset->save($this->request->data)) {
				$this->Session->setFlash(__('The coinset has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coinset could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PremiumCoinset.' . $this->PremiumCoinset->primaryKey => $id));
			$this->request->data = $this->PremiumCoinset->find('first', $options);
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
		$this->PremiumCoinset->id = $id;
		if (!$this->PremiumCoinset->exists()) {
			throw new NotFoundException(__('Invalid coinset'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PremiumCoinset->delete()) {
			$this->Session->setFlash(__('PremiumCoinset deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Coinset was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
