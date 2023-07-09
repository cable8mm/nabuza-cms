<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __('Nabuza CMS');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('general');
		echo $this->Html->css('maestro');
		echo $this->Html->css('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');

		echo $this->Html->script('http://code.jquery.com/jquery-1.9.1.js');
		echo $this->Html->script('http://code.jquery.com/ui/1.10.3/jquery-ui.js');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<script type="text/javascript"> 
$(document).ready(function(){
 
	$("ul.submenu").parent().append("<span></span>"); 
	
	$("ul.menu li span").click(function() { //Al hacer click se ejecuta...
		
		//Con este codigo aplicamos el movimiento de arriva y abajo para el submenu
		$(this).parent().find("ul.submenu").slideDown('fast').show(); //Menu desplegable al hacer click
 
		$(this).parent().hover(function() {
		}, function(){	
			$(this).parent().find("ul.submenu").slideUp('slow'); //Ocultamos el submenu cuando el raton sale fuera del submenu
		});
 
		}).hover(function() { 
			$(this).addClass("subhover"); //Agregamos la clase subhover
		}, function(){	//Cunado sale el cursor, sacamos la clase
			$(this).removeClass("subhover"); 
	});
	
	$(function() {
//		$( ".datepicker" ).datepicker();
		$( ".datepicker" ).datepicker({
			"dateFormat":"yy-mm-dd"
		});
	  });
});
</script> 
</head>
<body>
	<div id="container">
		<div id="header" style="padding-top:3px">
			<!-- h1><a href="/"><?php echo Configure::read('Settings.title')?> : <?php echo Configure::read('Settings.description')?></a></h1 -->
			<?php if($this->Session->read('Auth.User')) echo $this->Mae->showTreeMenus() ?>
			</div>
		<div id="content" style="padding:0 20px 10px 20px">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			Copyright &copy; <?php echo $this->Html->link(Configure::read('Settings.copyright'), Configure::read('Settings.site_url')); ?> /
			<?php echo 'Powered By <a href="http://www.fastcode.net">Maestros v1.0 - Fastcode Framework</a>' ?> extends SamguLee (cable8mm@gmail.com)
				</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
