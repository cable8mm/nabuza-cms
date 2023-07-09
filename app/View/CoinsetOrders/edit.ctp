<div class="coinsetOrders form">
<?php echo $this->Form->create('CoinsetOrder'); ?>
	<fieldset>
		<legend><?php echo __('Edit Coinset Order'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('coinset_id');
		echo $this->Form->input('order');
		echo $this->Form->input('coin_color');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CoinsetOrder.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CoinsetOrder.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Coinset Orders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Coinsets'), array('controller' => 'coinsets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coinset'), array('controller' => 'coinsets', 'action' => 'add')); ?> </li>
	</ul>
</div>
