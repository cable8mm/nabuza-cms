<?php
App::uses('AppController', 'Controller');
/**
 * CouponIssues Controller
 *
 * @property CouponIssue $CouponIssue
 */
class CouponIssuesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CouponIssue->recursive = 0;
		$this->set('couponIssues', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function generate_cvs($id = null) {
		if (!$this->CouponIssue->exists($id)) {
			throw new NotFoundException(__('Invalid coupon issue'));
		}
		
		$path   = WWW_ROOT;
		$localPath      = 'files/coupon_issue_'.$id.'.csv';
		$sql    = "
            SELECT serial INTO OUTFILE '".$path.$localPath."'
            	FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'
                LINES TERMINATED BY '\n'
                FROM coupons
            		WHERE coupon_issue_id	= ".$id;
		$this->CouponIssue->query($sql);
		
		$data	= array('id'=>$id, 'is_exist_csv'=>1);
		$this->CouponIssue->save($data);
		
		$this->Session->setFlash(__('The coupon issue has been download'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function view($id = null) {
		if (!$this->CouponIssue->exists($id)) {
			throw new NotFoundException(__('Invalid coupon issue'));
		}
		$options = array('conditions' => array('CouponIssue.' . $this->CouponIssue->primaryKey => $id));
		$this->set('couponIssue', $this->CouponIssue->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CouponIssue->create();
			Controller::loadModel('Coupon');
			if ($this->CouponIssue->save($this->request->data)) {
				
				$successCount	= 0;
				
				do {
					$this->Coupon->id	= null;
					
					$coupon['Coupon']['coupon_issue_id']	= $this->CouponIssue->id;
					$coupon['Coupon']['serial']	= $this->_generateSerial();
					$coupon['Coupon']['is_used']	= false;
					$coupon['Coupon']['is_active']	= true;
					
					if($this->Coupon->save($coupon)) {
						$successCount++;
					}
				} while ($successCount != $this->request->data['CouponIssue']['issue_count']);
				
				$this->Session->setFlash(__('The coupon issue has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The coupon issue could not be saved. Please, try again.'));
			}
		}
		$couponSponsors = $this->CouponIssue->CouponSponsor->find('list');
		$this->set(compact('couponSponsors'));
	}

	private function _generateSerial() {
		$couponLength	= 16;
		$chars = "0123456789";
		$initialChars	= "123456789";
		$coupon = "";
		for ($i = 0; $i < $couponLength; $i++) {
			if ($i == 0) {
				$coupon = $coupon.$initialChars[mt_rand(0, strlen($initialChars)-1)];
			} else {
				$coupon = $coupon.$chars[mt_rand(0, strlen($chars)-1)];
			}
		}
		return $coupon;
	}
}