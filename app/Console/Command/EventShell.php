<?php
class EventShell extends AppShell {
	public $uses	= array('Event', 'EventSnapshot');
	
	// 자동 당첨자 선택
    public function auto_snapshot() {
        $this->out('Execute auto_snapshot');
        $path	= '/home/nabuza-cms/public_html/app/webroot';
        $localPath	= '/snapshots/'.date('YmdHis').'.csv';
//         $sql	= "
// 					SELECT id,nickname,phone_number,own_gold,invitation_count,recommendation_count, last_level INTO OUTFILE '".$path.$localPath."'
// 						FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'
// 						LINES TERMINATED BY '\n'
// 						FROM players;
// 					";
//         $this->EventSnapshot->query($sql);
        	
        $this->request->data['EventSnapshot']['link']	= $localPath;
        
        $events	= $this->Event->find('all', array('conditions'=>array('Event.is_completed'=>false, 'Event.is_winner_choosed'=>false, )));
        
        $eventSnapshot['EventSnapshot']['name']	= 
        
        exit;
        
        $this->EventSnapshot->create();
        if ($this->EventSnapshot->save($this->request->data)) {
        	$this->Session->setFlash(__('The event snapshot has been saved'));
        	$this->redirect(array('action' => 'index'));
        } else {
        	$this->Session->setFlash(__('The event snapshot could not be saved. Please, try again.'));
        }
    }
}