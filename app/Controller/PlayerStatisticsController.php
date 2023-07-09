<?php
App::uses('AppController', 'Controller');
/**
 * Players Controller
 *
 * @property Player $Player
*/
class PlayerStatisticsController extends AppController {
	var $uses	= array('Player');
	
	public function index() {
		$sql	= 'SELECT DATE_FORMAT(`created`, "%y-%m-%d") AS `YYMMDD`, count(*) AS total from players WHERE appid<>"" GROUP BY YYMMDD ORDER BY YYMMDD DESC LIMIT 50';
		$playerStatistics	= $this->Player->query($sql);

		$sql	= 'SELECT DATE_FORMAT(`created`, "%y-%m-%d") AS `YYMMDD`, count(*) AS total_korean from players WHERE appid<>"" AND language_id=1 GROUP BY YYMMDD ORDER BY YYMMDD DESC LIMIT 50';
		$playerKoreanStatistics	= $this->Player->query($sql);
		
		$sql	= 'SELECT DATE_FORMAT(`created`, "%y-%m-%d") AS `YYMMDD`, count(*) AS activated from players WHERE highscore <> 0 AND appid<>"" GROUP BY YYMMDD ORDER BY YYMMDD DESC LIMIT 50';
		$playerStatistics2	= $this->Player->query($sql);
		
		$sql	= 'SELECT DATE_FORMAT(`created`, "%y-%m-%d") AS `YYMMDD`, count(*) AS total_foreigner from players WHERE appid<>"" AND language_id=2 GROUP BY YYMMDD ORDER BY YYMMDD DESC LIMIT 50';
		$playerForeignerStatistics	= $this->Player->query($sql);
		
		$sql	= 'SELECT DATE_FORMAT(`created`, "%y-%m-%d") AS `YYMMDD`, count(*) AS activated_korean from players WHERE highscore <> 0 AND appid<>"" AND language_id=1 GROUP BY YYMMDD ORDER BY YYMMDD DESC LIMIT 50';
		$playerKoreanStatistics2	= $this->Player->query($sql);
				
		$sql	= 'SELECT DATE_FORMAT(`created`, "%y-%m-%d") AS `YYMMDD`, count(*) AS activated_foreigner from players WHERE highscore <> 0 AND appid<>"" AND language_id=2 GROUP BY YYMMDD ORDER BY YYMMDD DESC LIMIT 50';
		$playerForeignerStatistics2	= $this->Player->query($sql);
		
		$result	= array();
		


		foreach ($playerKoreanStatistics as $playerKoreanStatistic) {
			$yymmdd	= $playerKoreanStatistic[0]['YYMMDD'];
			$result[$yymmdd]['total_korean']	= $playerKoreanStatistic[0]['total_korean'];

			if (empty($result[$yymmdd]['total'])) $result[$yymmdd]['total']	= 'None';
			if (empty($result[$yymmdd]['activated'])) $result[$yymmdd]['activated']	= 'None';
			if (empty($result[$yymmdd]['total_foreigner'])) $result[$yymmdd]['total_foreigner']	= 'None';
			if (empty($result[$yymmdd]['activated_korean'])) $result[$yymmdd]['activated_korean']	= 'None';
			if (empty($result[$yymmdd]['activated_foreigner'])) $result[$yymmdd]['activated_foreigner']	= 'None';
		}

		
		foreach ($playerForeignerStatistics as $playerForeignerStatistic) {
			$yymmdd	= $playerForeignerStatistic[0]['YYMMDD'];
			$result[$yymmdd]['total_foreigner']	= $playerForeignerStatistic[0]['total_foreigner'];
			
			if (empty($result[$yymmdd]['total'])) $result[$yymmdd]['total']	= 'None';
			if (empty($result[$yymmdd]['activated'])) $result[$yymmdd]['activated']	= 'None';
			if (empty($result[$yymmdd]['total_korean'])) $result[$yymmdd]['total_korean']	= 'None';
			if (empty($result[$yymmdd]['activated_korean'])) $result[$yymmdd]['activated_korean']	= 'None';
			if (empty($result[$yymmdd]['activated_foreigner'])) $result[$yymmdd]['activated_foreigner']	= 'None';
		}
		
		foreach ($playerKoreanStatistics2 as $playerKoreanStatistic) {
			$yymmdd	= $playerKoreanStatistic[0]['YYMMDD'];
			$result[$yymmdd]['activated_korean']	= $playerKoreanStatistic[0]['activated_korean'];
			
			if (empty($result[$yymmdd]['total'])) $result[$yymmdd]['total']	= 'None';
			if (empty($result[$yymmdd]['activated'])) $result[$yymmdd]['activated']	= 'None';
			if (empty($result[$yymmdd]['total_korean'])) $result[$yymmdd]['total_korean']	= 'None';
			if (empty($result[$yymmdd]['total_foreigner'])) $result[$yymmdd]['total_foreigner']	= 'None';
			if (empty($result[$yymmdd]['activated_foreigner'])) $result[$yymmdd]['activated_foreigner']	= 'None';
		}
		
		foreach ($playerForeignerStatistics2 as $playerForeignerStatistic) {
			$yymmdd	= $playerForeignerStatistic[0]['YYMMDD'];
			$result[$yymmdd]['activated_foreigner']	= $playerForeignerStatistic[0]['activated_foreigner'];
			
			if (empty($result[$yymmdd]['total'])) $result[$yymmdd]['total']	= 'None';
			if (empty($result[$yymmdd]['activated'])) $result[$yymmdd]['activated']	= 'None';
			if (empty($result[$yymmdd]['total_foreigner'])) $result[$yymmdd]['total_foreigner']	= 'None';
			if (empty($result[$yymmdd]['activated_korean'])) $result[$yymmdd]['activated_korean']	= 'None';
			if (empty($result[$yymmdd]['total_korean'])) $result[$yymmdd]['total_korean']	= 'None';
			
		}
		
		foreach ($playerStatistics as $playerStatistic) {
			$yymmdd	= $playerStatistic[0]['YYMMDD'];
			$result[$yymmdd]['total']	= $playerStatistic[0]['total'];
			
			if (empty($result[$yymmdd]['total_korean'])) $result[$yymmdd]['total_korean']	= 'None';
			if (empty($result[$yymmdd]['activated'])) $result[$yymmdd]['activated']	= 'None';
			if (empty($result[$yymmdd]['total_foreigner'])) $result[$yymmdd]['total_foreigner']	= 'None';
			if (empty($result[$yymmdd]['activated_korean'])) $result[$yymmdd]['activated_korean']	= 'None';
			if (empty($result[$yymmdd]['activated_foreigner'])) $result[$yymmdd]['activated_foreigner']	= 'None';
		}
		
		foreach ($playerStatistics2 as $playerStatistic2) {
			$yymmdd	= $playerStatistic2[0]['YYMMDD'];
			$result[$yymmdd]['activated']	= $playerStatistic2[0]['activated'];
			
			if (empty($result[$yymmdd]['total'])) $result[$yymmdd]['total']	= 'None';
			if (empty($result[$yymmdd]['activated'])) $result[$yymmdd]['activated']	= 'None';
			if (empty($result[$yymmdd]['total_foreigner'])) $result[$yymmdd]['total_foreigner']	= 'None';
			if (empty($result[$yymmdd]['activated_korean'])) $result[$yymmdd]['activated_korean']	= 'None';
			if (empty($result[$yymmdd]['activated_foreigner'])) $result[$yymmdd]['activated_foreigner']	= 'None';
				
		
		}
		
		
		$this->set('result', $result);
	}
}