<div class="eventSnapshots form">
<?php echo $this->Form->create('EventSnapshot'); ?>
	<fieldset>
		<legend><?php echo __('Edit Event Snapshot'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EventSnapshot.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EventSnapshot.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Event Snapshots'), array('action' => 'index')); ?></li>
	</ul>
</div>
