<?php
App::uses('Component', 'Controller');
class NotificationComponent extends Component {
	var $gcmServerKey	= 'AIzaSyCsU2tOfhpJrEU8aQjhWh1pmrTuqJD7RT0';
	var $maxPerOneRequest	= 1000;
	
	var $title;
	var $msg;
	var $notificationIds;
	var $currentNotificationIds; // maxPerOneRequest 갯수 만큼 보내는 용도로 사
	var $totalPage;	// 1부터 시작
	var $currentPage	= 1;	// 1부터 시작
	var $targetPlatform;
	var $count;
	
	var $success = 0;
	var $failure = 0;

	public function reset() {
		$this->title	= '';
		$this->msg		= '';
		$this->notificationIds	= array();
	}
	
	public function send_bulk($os, $notificationIds, $title, $msg ) {	// $os : a => android i => iOS
		$this->title	= $title;
		$this->msg		= $msg;
		$this->totalPage		= ceil(count($notificationIds)/$this->maxPerOneRequest);
		$this->targetPlatform	= $os;
		$this->count	= count($notificationIds);
		
		foreach($notificationIds as $notificationId) {	// notificationId만을 넣는다.(id 값 무시하기 위한 코드)
			$this->notificationIds[]	= $notificationId;
		}
			
		foreach(range(1, $this->totalPage) as $currentPage) {
			$this->currentPage	= $currentPage;
			$result = $this->_send_page();
			$this->success += $result->success;
			$this->failure += $result->failure;
		}

		$bulkResult	= array('success'=>$this->success,'failure'=>$this->failure);
		return $bulkResult;
	}
	
	private function _send_page() {
		$this->currentNotificationIds	= array();
		
		$maxRequest	= ($this->totalPage == $this->currentPage)? $this->count % $this->maxPerOneRequest : $this->maxPerOneRequest;
		
		if ($maxRequest == 0)
			$maxRequest	= $this->maxPerOneRequest;
		
		foreach(range(0,$maxRequest-1) as $number) {
			$key	= (($this->currentPage - 1) * $this->maxPerOneRequest ) + $number;
			$this->currentNotificationIds[]	= $this->notificationIds[$key];
		}
		
		if ($this->targetPlatform == 'a')
			return $this->_androidSend();
		
		if ($this->targetPlatform == 'i')
			return $this->_iosSend();
	}
	
	public function send($os, $notificationIds, $title, $msg ) {	// $os : a => android i => iOS
		$this->title	= $title;
		$this->msg		= $msg;
		
		if (is_array($notificationIds)) {
			foreach($notificationIds as $notificationId) {
				$this->currentNotificationIds[]	= $notificationId;
			}
		}
		else
			$this->currentNotificationIds[]	= $notificationIds;

		
		if ($os == 'a')
			return $this->_androidSend();
		
		if ($os == 'i')
			return $this->_iosSend();
	}
	
	private function _androidSend() {
		$data = array(
				'registration_ids' => $this->currentNotificationIds,
				'data' => array('title'=>$this->title, 'msg' => $this->msg)
		);
		
		$headers = array(
				"Content-Type:application/json",
				"Authorization:key=".$this->gcmServerKey
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		$resultJson = curl_exec($ch);
		curl_close($ch);
		return json_decode($resultJson);
	}
	
	private function _iosSend() {
		
	}
}