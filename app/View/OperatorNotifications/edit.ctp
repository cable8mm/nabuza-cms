<div class="operatorNotifications form">
<?php echo $this->Form->create('OperatorNotification'); ?>
	<fieldset>
		<legend><?php echo __('Edit Operator Notification'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('player_id');
		echo $this->Form->input('title');
		echo $this->Form->input('message');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OperatorNotification.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('OperatorNotification.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Operator Notifications'), array('action' => 'index')); ?></li>
	</ul>
</div>
