  <?php
class GoldmallShell extends AppShell {
	public $uses	= array('GoldmallItem', 'GoldmallPlayer', 'GoldmallItemController');
	
	// 자동 당첨자 선택
    public function auto_choose_winners() {
        $this->out('Execute auto_choose_winners');
        // 과거 골드몰 중 완료되지 않은 아이템 리스트 중 is_complete되지 않고 is_auto_winner_choosed가 true인 아이템
        $current	= date("Y-m-d H:i:s");
        $this->GoldmallItem->recursive	= 0;
        $goldmallItems	= $this->GoldmallItem->find('all', array('conditions'=>array('GoldmallItem.is_complete'=>0, 'GoldmallItem.finished <'=>$current, 'GoldmallItem.is_auto_winner_choosed'=>1)));
//        $goldmallItems	= $this->GoldmallItem->find('all', array('conditions'=>array('GoldmallItem.id'=>14, 'GoldmallItem.finished <'=>$current, 'GoldmallItem.is_auto_winner_choosed'=>1)));
        
        // winner_count 명을 랜덤하게 뽑는다.
        foreach ($goldmallItems as $goldmallItem) {	// 골드몰 아이템 루프
        	$choosedWinnerCount	= $this->GoldmallPlayer->choosing($goldmallItem['GoldmallItem']['id'], $goldmallItem['GoldmallItem']['winner_count']);

        	$this->GoldmallItem->complete($goldmallItem['GoldmallItem']['id'], $choosedWinnerCount);
        }
    }
    
    // 자동 아이템 만들기
    public function auto_generate_items() {
    	$this->GoldmallItemController->recursive	= -1;
    	$goldmallItemControllers	= $this->GoldmallItemController->find('all', array('conditions'=>array(
    			'GoldmallItemController.is_active'=>1
    			,'GoldmallItemController.is_repeat'=>1
    			)));

       	if (count($goldmallItemControllers) > 0) {
    		foreach ($goldmallItemControllers as $goldmallItemController) {
    			$this->GoldmallItemController->generateItem($goldmallItemController['GoldmallItemController']['id']);
    		}
    	}
    }
}