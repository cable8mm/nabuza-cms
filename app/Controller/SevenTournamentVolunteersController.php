<?php
App::uses('AppController', 'Controller');
/**
 * SevenTournamentVolunteers Controller
 *
 * @property SevenTournamentVolunteer $SevenTournamentVolunteer
 */
class SevenTournamentVolunteersController extends AppController {

	
	public function test() {
		App::uses('ConnectionManager', 'Model');
		$db = ConnectionManager::getDataSource('default');

		$sql	= '
				set @num=0;
select * from
(select *, @num:=@num+1 AS rank from 
	(select * from seven_tournament_volunteers where id<=4142 order by id desc limit 7) 
	AS rank order by highscore DESC) AS rank2
where player_id=458;';
		$sql = 'set @num=0';
		$this->SevenTournamentVolunteer->query($sql);
		$sql	= '
				select * from
(select *, @num:=@num+1 AS rank from 
	(select * from seven_tournament_volunteers where id<=4142 order by id desc limit 7) 
	AS rank order by highscore DESC) AS rank2
where player_id=458;
				';
				$players = $this->SevenTournamentVolunteer->query($sql);
				pr($players);
				echo 'Rank => '.$players[0]['rank2']['rank'];
				exit;
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->SevenTournamentVolunteer->recursive = 0;
		$this->set('sevenTournamentVolunteers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->SevenTournamentVolunteer->id = $id;
		if (!$this->SevenTournamentVolunteer->exists()) {
			throw new NotFoundException(__('Invalid seven tournament volunteer'));
		}
		$this->set('sevenTournamentVolunteer', $this->SevenTournamentVolunteer->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SevenTournamentVolunteer->create();
			if ($this->SevenTournamentVolunteer->save($this->request->data)) {
				$this->Session->setFlash(__('The seven tournament volunteer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seven tournament volunteer could not be saved. Please, try again.'));
			}
		}
		$players = $this->SevenTournamentVolunteer->Player->find('list');
		$this->set(compact('players'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->SevenTournamentVolunteer->id = $id;
		if (!$this->SevenTournamentVolunteer->exists()) {
			throw new NotFoundException(__('Invalid seven tournament volunteer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SevenTournamentVolunteer->save($this->request->data)) {
				$this->Session->setFlash(__('The seven tournament volunteer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seven tournament volunteer could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->SevenTournamentVolunteer->read(null, $id);
		}
		$players = $this->SevenTournamentVolunteer->Player->find('list');
		$this->set(compact('players'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->SevenTournamentVolunteer->id = $id;
		if (!$this->SevenTournamentVolunteer->exists()) {
			throw new NotFoundException(__('Invalid seven tournament volunteer'));
		}
		if ($this->SevenTournamentVolunteer->delete()) {
			$this->Session->setFlash(__('Seven tournament volunteer deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Seven tournament volunteer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
