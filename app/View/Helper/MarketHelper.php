<?php 
/**
 * Market helper
 */
class MarketHelper extends AppHelper {
/**
 * name property
 * 
 * @var string 'Market'
 * @access public
 */
	var $name = 'Market';

	function getName ($k) {
		$markets	= array(1=>'Google Play', 'T-Store', 'App Store');
		
		return $markets[$k];
	}
}
?>