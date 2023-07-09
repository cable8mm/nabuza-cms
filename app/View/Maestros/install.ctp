<div class="maestros form">
<?php echo $this->form->create('Maestro', array('action'=>'install'));?>
	<fieldset>
 		<legend><?php __('Add Maestro');?></legend>
	<?php
		echo $this->form->input('name');
		echo $this->form->input('username');
		echo $this->form->input('password');
	?>
	</fieldset>
<?php echo $this->form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->html->link(__('List Maestros', true), array('action'=>'index'));?></li>
	</ul>
</div>