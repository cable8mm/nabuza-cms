<?php 
class EventLinkHelper extends AppHelper {
	var $name = 'EventLink';

	function linkType ($linkType) {	// 0:없음, 1:선물하기, 2:친구초대, 3:비취구매, 4:HTTP
		$linkTypes	= array('없음', '선물하기', '친구초대', '비취구매', 'HTTP');
		
		return $linkTypes[$linkType];
	}
}
?>