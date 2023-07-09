<?php
class MigratesController extends AppController {
	var $uses = array('Player');
	public function update_weekly_highscore() {
		$players	= $this->Player->find('all', array('conditions'=>array('Player.weekly_highscore'=>0)));
//		pr($players);
exit;
		
		$activeNumber = 0;
		
		foreach($players as $player) {
			$player['Player']['weekly_highscore']	= $activeNumber;
			$this->Player->save($player);
			$activeNumber++;
		}
	}
}