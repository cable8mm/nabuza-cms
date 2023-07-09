<div class="sevenTournamentVolunteers form">
<?php echo $this->Form->create('SevenTournamentVolunteer'); ?>
	<fieldset>
		<legend><?php echo __('Add Seven Tournament Volunteer'); ?></legend>
	<?php
		echo $this->Form->input('player_id');
		echo $this->Form->input('highscore');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Seven Tournament Volunteers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
