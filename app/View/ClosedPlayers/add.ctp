<div class="closedPlayers form">
<?php echo $this->Form->create('ClosedPlayer'); ?>
	<fieldset>
		<legend><?php echo __('Add Closed Player'); ?></legend>
	<?php
		echo $this->Form->input('player_id');
		echo $this->Form->input('os');
		echo $this->Form->input('appid');
		echo $this->Form->input('phone_number');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Closed Players'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
