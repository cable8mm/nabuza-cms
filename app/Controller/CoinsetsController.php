<?php
App::uses('AppController', 'Controller');
/**
 * Coinsets Controller
 *
 * @property Coinset $Coinset
 */
class CoinsetsController extends AppController {

	var $countCoins	= 49;	// 0부터 시작
	var $countCoinColor	= 5;	// 0부터 시작
	
	public function ajax_get_coins($id = null) {
		if (!$this->Coinset->exists($id)) {
			throw new NotFoundException(__('Invalid coinset'));
		}
		pr($this->RequestHandler);
//		if ($this->RequestHandler->isAjax()) {
//     		Configure::write('debug', 0);
		$coinsetOrders = $this->Coinset->CoinsetOrders->find('all');
		$this->set(compact('coinsetOrders'));
		
     		$this->autoRender = false;
     		$this->layout = 'ajax';
//		}
	}
	
	public function generate_random_coins($id = null) {
		if (!$this->Coinset->exists($id)) {
			throw new NotFoundException(__('Invalid coinset'));
		}
		
		$this->_generate_random_coins($id);
		
		$this->Session->setFlash(__('The random coins has been generated'));
		$this->redirect(array('action' => 'index'));
	}
	
	private function _generate_random_coins($id) {
		for ($i = 0; $i < $this->countCoins; $i++) {
			$coinsetOrder	= $this->Coinset->CoinsetOrder->find('first', array('conditions'=>array('CoinsetOrder.coinset_id'=>$id, 'CoinsetOrder.order'=>$i)));
		
			$coinsetOrder['CoinsetOrder']['coinset_id']	= $id;
			$coinsetOrder['CoinsetOrder']['order']	= $i;
			$coinsetOrder['CoinsetOrder']['coin_color']	= rand(0, $this->countCoinColor - 1);
		
			$this->Coinset->CoinsetOrder->save($coinsetOrder);
				
			$coinsetOrder	= array();
			$this->Coinset->CoinsetOrder->id	= null;
		}
	}
	
	public function change($coinsetId = null) {
		if (!$this->Coinset->exists($coinsetId)) {
			throw new NotFoundException(__('Invalid coinset'));
		}

		if (!isset($this->params['named']['order'])) {
			throw new NotFoundException(__('Invalid Order'));
		}

		if (!isset($this->params['named']['palette_color'])) {
			throw new NotFoundException(__('Invalid Palette Color'));
		}
		
		$coinsetOrder	= $this->Coinset->CoinsetOrder->find('first', array('conditions'=>array('CoinsetOrder.coinset_id'=>$coinsetId, 'CoinsetOrder.order'=>$this->params['named']['order'])));
//		$nextCoinColor	= ($coinsetOrder['CoinsetOrder']['coin_color'] + 1) % $this->countCoinColor;
		$nextCoinColor	= $this->params['named']['palette_color'];
		$coinsetOrder['CoinsetOrder']['coin_color']	= $nextCoinColor;

		$this->Coinset->CoinsetOrder->save($coinsetOrder);
		
		$this->Coinset->recursive = -1;
		$this->Coinset->id = $coinsetId;
		$this->Coinset->saveField('modified', date('Y-m-d H:i:s'));
		
		
		$this->redirect(array('action' => 'custom', $coinsetId, 'order'=>$this->params['named']['order'], 'palette_color'=>$this->params['named']['palette_color']));
		
	}
	
	public function all_change($coinsetId = null) {
		if (!$this->Coinset->exists($coinsetId)) {
			throw new NotFoundException(__('Invalid coinset'));
		}
	
		if (!isset($this->params['named']['all_color'])) {
			throw new NotFoundException(__('Invalid Palette Color'));
		}
	
		$coinColor	= $this->params['named']['all_color'];
	
		$this->Coinset->CoinsetOrder->updateAll(array('CoinsetOrder.coin_color'=>$coinColor), array('CoinsetOrder.coinset_id'=>$coinsetId));
	
		$this->redirect(array('action' => 'custom', $coinsetId, 'palette_color'=>$this->params['named']['palette_color']));
	
	}
	
	public function custom($id = null) {
		if (!$this->Coinset->exists($id)) {
			throw new NotFoundException(__('Invalid coinset'));
		}
		
		$paletteColor	= 0;
		if (isset($this->params['named']['palette_color'])) {
			$paletteColor	= $this->params['named']['palette_color'];
		}
		
		$this->layout	= 'game';
		
		$coinsetOrders = $this->Coinset->CoinsetOrder->find('list', array('fields'=>array('CoinsetOrder.order', 'CoinsetOrder.coin_color'),'conditions'=>array('CoinsetOrder.coinset_id'=>$id)));
		$this->set('coinsetOrders', $coinsetOrders);
		$this->set('paletteColor', $paletteColor);
		$this->set('coinsetId', $id);
	}
	
	public function migrate_all_range() {
		if ($this->request->is('post') || $this->request->is('put')) {
			if(!empty($this->request->data['Coinset']['is_active'])) {
				$coinsets	= $this->Coinset->find('all', array('order'=>array('Coinset.created'), 'conditions'=>array('Coinset.is_active'=>1)));
				
				if (count($coinsets) > 10) {
					return;
				}
				
				$seedCoinsets	= array();
				
				$coinsetId	= 0;
				foreach($coinsets as $k => $coinset) {
					$coinsetId++;
					$seedCoinsets[$k]	= $coinset;
					$seedCoinsets[$k]['Coinset']['id']	= $coinsetId;
					
					foreach ($seedCoinsets[$k]['CoinsetOrder'] as $kk=>$coinsetOrder) {
						$seedCoinsets[$k]['CoinsetOrder'][$kk]['coinset_id']	= $coinsetId;
					}
					
				}

				$multiflyConstant	= 4;	// 3번 더 반복함
				
				$newCoinsets	= array();
				
				for ($j=0; $j < $multiflyConstant; $j++) {
					$newCoinsets	= array_merge($newCoinsets, $seedCoinsets);
				}
				
				$coinsetOrderId	= 1;
				
				foreach ($newCoinsets as $k => $newCoinset) {
					$newCoinsets[$k]['Coinset']['id']	= $k+1;
					
					foreach ($newCoinset['CoinsetOrder'] as $kk => $coinsetOrder) {
						$newCoinsets[$k]['CoinsetOrder'][$kk]['coinset_id']	= $newCoinsets[$k]['Coinset']['id'];
						$newCoinsets[$k]['CoinsetOrder'][$kk]['id']	= $coinsetOrderId++;
						//						pr($newCoinsets[$k]['CoinsetOrder'][$kk]); exit;
						$this->Coinset->CoinsetOrder->save($newCoinsets[$k]['CoinsetOrder'][$kk]);
						$this->Coinset->CoinsetOrder->id	= NULL;
					}
					
					$this->Coinset->save($newCoinsets[$k]);
					$this->Coinset->id = NULL;
// 					foreach ($newCoinsets[$k] as $v) {
// 						$this->Coinset->CoinsetOrder->save($v);
// 					}
				}
			}
		}
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Coinset->recursive = 0;
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
		if (!$this->Coinset->exists($id)) {
			throw new NotFoundException(__('Invalid coinset'));
		}
		$options = array('conditions' => array('Coinset.' . $this->Coinset->primaryKey => $id));
		$this->set('coinset', $this->Coinset->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Coinset->create();
			if ($this->Coinset->save($this->request->data)) {
				$this->Session->setFlash(__('The coinset has been saved'));
				$this->_generate_random_coins($this->Coinset->id);
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
		if (!$this->Coinset->exists($id)) {
			throw new NotFoundException(__('Invalid coinset'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Coinset->save($this->request->data)) {
				$this->Session->setFlash(__('The coinset has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coinset could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Coinset.' . $this->Coinset->primaryKey => $id));
			$this->request->data = $this->Coinset->find('first', $options);
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
		$this->Coinset->id = $id;
		if (!$this->Coinset->exists()) {
			throw new NotFoundException(__('Invalid coinset'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Coinset->delete()) {
			$this->Session->setFlash(__('Coinset deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Coinset was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
