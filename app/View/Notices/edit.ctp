<div class="notices form">
<?php echo $this->Form->create('Notice'); ?>
	<fieldset>
		<legend><?php echo __('Edit Notice'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('language_id');
		echo $this->Form->input('title');
		echo $this->Form->input('contents');
		echo $this->Form->input('is_active');
		echo $this->Form->input('started');
		echo $this->Form->input('finished');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Notices'), array('action' => 'index')); ?></li>
	</ul>
</div>
