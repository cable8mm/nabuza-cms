<?php 
class EventHelper extends AppHelper {
/**
 * name property
 * 
 * @var string 'Event'
 * @access public
 */
	var $name = 'Event';

	function type ($type) {
		if($type=0)
			return "이벤트 시작";
		else
			return "이벤트 끝";
	}
}
?>