<?php
App::uses('AppController', 'Controller');
/**
 * Purchasings Controller
 *
 * @property Purchasing $Purchasing
 */
class PurchasingsController extends AppController {
	var $uses	= array('Purchasing', 'Player', 'Product');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$conditions = $this->data = array();
		$this->request->data['Player'] = $this->passedArgs = array_merge($this->passedArgs, $this->params['url']);
		
		if(!empty($this->passedArgs['phone_number'])) {
			$conditions['and'][] = array('Player.phone_number LIKE' => '%'.$this->passedArgs['phone_number'].'%');
		}
		
		if(!empty($this->passedArgs['appid'])) {
			$conditions['and'][] = array('Player.appid' => $this->passedArgs['appid']);
		}
		
		if(!empty($this->passedArgs['nickname'])) {
			$conditions['and'][] = array('Player.nickname LIKE' => '%'.$this->passedArgs['nickname'].'%');
		}

		if(isset($this->passedArgs['is_anytale'])) {
			if($this->passedArgs['is_anytale'] == 0) {
				$conditions['and'][] = array('Player.is_anytale' => 0);
			} else if ($this->passedArgs['is_anytale'] == 1) {
				$conditions['and'][] = array('Player.is_anytale' => 1);
			}
		}
		
		$isAnytales	= array(-1=>'애니테일 멤버 포함', 0=>'애니테일 멤버 제외', 1=>'애니테일 멤버만');
		$this->set('isAnytales', $isAnytales);
		$this->Purchasing->recursive = 0;
		$this->set('purchasings', $this->paginate('Purchasing', $conditions));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Purchasing->exists($id)) {
			throw new NotFoundException(__('Invalid purchasing'));
		}
		$options = array('conditions' => array('Purchasing.' . $this->Purchasing->primaryKey => $id));
		$this->set('purchasing', $this->Purchasing->find('first', $options));
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
			$product	= $this->Product->read(null, $this->request->data['Purchasing']['product_id']);

			$this->Purchasing->create();
			$this->request->data['Purchasing']['player_id']	= $playerId;
			$this->request->data['Purchasing']['method']	= 'a';
			if ($this->Purchasing->save($this->request->data)) {
				
				$player['Player']['own_jade_count']	+= $product['Product']['count'];
				
				if ($this->Player->save($player)) {
					$this->Session->setFlash(__('The purchasing and the player has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The player could not be saved. Please, try again.'));
				}

			} else {
				$this->Session->setFlash(__('The purchasing could not be saved. Please, try again.'));
			}
		}
		
		$products = $this->Purchasing->Product->find('list');
		$this->set(compact('player', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Purchasing->exists($id)) {
			throw new NotFoundException(__('Invalid purchasing'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Purchasing->save($this->request->data)) {
				$this->Session->setFlash(__('The purchasing has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The purchasing could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Purchasing.' . $this->Purchasing->primaryKey => $id));
			$this->request->data = $this->Purchasing->find('first', $options);
		}
		$players = $this->Purchasing->Player->find('list');
		$products = $this->Purchasing->Product->find('list');
		$this->set(compact('players', 'products'));
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
		$this->Purchasing->id = $id;
		if (!$this->Purchasing->exists()) {
			throw new NotFoundException(__('Invalid purchasing'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Purchasing->delete()) {
			$this->Session->setFlash(__('Purchasing deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Purchasing was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
