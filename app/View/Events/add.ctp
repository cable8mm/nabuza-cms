<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Add Event'); ?></legend>
	<?php
		echo $this->Form->input('language_id');
		echo $this->Form->input('title');
		echo $this->Form->input('link_url');
		echo $this->Form->input('started');
		echo $this->Form->input('finished');
		echo $this->Form->input('is_auto_snapshot');
		echo $this->Form->input('is_notify');
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
	</ul>
</div>
