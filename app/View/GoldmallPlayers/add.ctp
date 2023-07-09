<div class="goldmallPlayers form">
<?php echo $this->Form->create('GoldmallPlayer'); ?>
	<fieldset>
		<legend><?php echo __('Add Goldmall Player'); ?></legend>
	<?php
		echo $this->Form->input('goldmall_item_id');
		echo $this->Form->input('submitted_player_id');
		echo $this->Form->input('submit_count');
		echo $this->Form->input('is_winner');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Goldmall Players'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Goldmall Items'), array('controller' => 'goldmall_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Goldmall Item'), array('controller' => 'goldmall_items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
