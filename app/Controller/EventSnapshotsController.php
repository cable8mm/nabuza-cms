<?php
App::uses('AppController', 'Controller');
/**
 * EventSnapshots Controller
 *
 * @property EventSnapshot $EventSnapshot
 */
class EventSnapshotsController extends AppController {
	var $helpers	= array('Event');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EventSnapshot->recursive = 0;
		$this->set('eventSnapshots', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EventSnapshot->exists($id)) {
			throw new NotFoundException(__('Invalid event snapshot'));
		}
		$options = array('conditions' => array('EventSnapshot.' . $this->EventSnapshot->primaryKey => $id));
		$this->set('eventSnapshot', $this->EventSnapshot->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function make_start_shot() {
		if ($this->request->is('post')) {
			$path	= '/home/nabuza-cms/public_html/app/webroot';
			$localPath	= '/snapshots/'.date('YmdHis').'.csv';
			$sql	= "
					SELECT id,nickname,phone_number,own_gold,invitation_count,recommendation_count, last_level INTO OUTFILE '".$path.$localPath."'
						FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'
						LINES TERMINATED BY '\n'
						FROM players;
					";
			$this->EventSnapshot->query($sql);
			
			$this->request->data['EventSnapshot']['link']	= $localPath;
			$this->request->data['EventSnapshot']['start_shot']	= $localPath;
				
			$this->EventSnapshot->create();
			if ($this->EventSnapshot->save($this->request->data)) {
				$this->Session->setFlash(__('The event snapshot has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event snapshot could not be saved. Please, try again.'));
				$this->redirect(array('action' => 'index'));
			}
		}
		
		$events	= $this->EventSnapshot->Event->find('list');
		$this->set('events', $events);
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function make_finish_shot($id = null) {
		if (!$this->EventSnapshot->exists($id)) {
			throw new NotFoundException(__('Invalid event snapshot'));
		}
		
		if ($this->request->is('post')) {
			$path	= '/home/nabuza-cms/public_html/app/webroot';
			$localPath	= '/snapshots/'.date('YmdHis').'.csv';
			$sql	= "
					SELECT id,nickname,phone_number,own_gold,invitation_count,recommendation_count, last_level INTO OUTFILE '".$path.$localPath."'
						FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'
						LINES TERMINATED BY '\n'
						FROM players;
					";
			$this->EventSnapshot->query($sql);
			
			$this->EventSnapshot->recursive = -1;
			
			$this->request->data['EventSnapshot']['link']	= $localPath;
			
			if ($this->EventSnapshot->updateAll(array('EventSnapshot.finish_shot'=>'"'.$localPath.'"', 'EventSnapshot.finished'=>'"'.date('Y-m-d H:i:s').'"'), array('EventSnapshot.id'=>$id))) {
				$this->Session->setFlash(__('The event finishshot has been update'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event snapshot could not be saved. Please, try again.'));
				$this->redirect(array('action' => 'index'));
			}
		}
		
		
	}
	
	/**
	 * add method
	 *
	 * @return void
	 */
	public function start_finish_shot($id = null) {
		if (!$this->EventSnapshot->exists($id)) {
			throw new NotFoundException(__('Invalid event snapshot'));
		}
	
		if ($this->request->is('post')) {
			$path	= '/home/nabuza-cms/public_html/app/webroot';
			$localPath	= '/snapshots/'.date('YmdHis').'.csv';
			$sql	= "
					SELECT id,nickname,phone_number,own_gold,invitation_count,recommendation_count, last_level INTO OUTFILE '".$path.$localPath."'
						FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'
						LINES TERMINATED BY '\n'
						FROM players;
					";
			$this->EventSnapshot->query($sql);
				
			$this->EventSnapshot->recursive = -1;
				
			$this->request->data['EventSnapshot']['link']	= $localPath;
				
			if ($this->EventSnapshot->updateAll(array('EventSnapshot.start_shot'=>'"'.$localPath.'"', 'EventSnapshot.started'=>'"'.date('Y-m-d H:i:s').'"'), array('EventSnapshot.id'=>$id))) {
				$this->Session->setFlash(__('The event finishshot has been update'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event snapshot could not be saved. Please, try again.'));
				$this->redirect(array('action' => 'index'));
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
		if (!$this->EventSnapshot->exists($id)) {
			throw new NotFoundException(__('Invalid event snapshot'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EventSnapshot->save($this->request->data)) {
				$this->Session->setFlash(__('The event snapshot has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event snapshot could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EventSnapshot.' . $this->EventSnapshot->primaryKey => $id));
			$this->request->data = $this->EventSnapshot->find('first', $options);
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
		$this->EventSnapshot->id = $id;
		if (!$this->EventSnapshot->exists()) {
			throw new NotFoundException(__('Invalid event snapshot'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EventSnapshot->delete()) {
			$this->Session->setFlash(__('Event snapshot deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Event snapshot was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
