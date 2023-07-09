<?php 
/**
 * Tree helper
 *
 * Helper to generate tree representations of MPTT or recursively nested data
 */
class PlayerHelper extends AppHelper {
/**
 * name property
 * 
 * @var string 'Tree'
 * @access public
 */
	var $name = 'Player';
	var $helpers = array ('Html');

	function level ($ownGold) {
		$goldLevels	= array(
				1 => 100
				,500
				,1000
				,2000
				,3000
				,4000
				,6000
				,8000
				,10000
				,15000
				,20000
				,25000
				,35000
				,45000
				,55000
				,80000
				,105000
				,130000
				,160000
				,190000
				,220000
				,300000
				,350000
				,400000
				,500000
				,600000
				,700000
				,900000
				,1100000
				,1300000
				,2000000
				,2500000
				,3000000
				,4000000
				,5000000
				,999999999
				);
		
		foreach($goldLevels as $k=>$goldLevel) {
			if ($goldLevel > $ownGold) {
				return $k;
			}
		}
		
		return 36;
	}
}
?>