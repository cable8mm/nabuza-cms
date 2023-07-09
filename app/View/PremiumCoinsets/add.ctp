<div class="coinsets form">
<?php echo $this->Form->create('PremiumCoinset'); ?>
	<fieldset>
		<legend><?php echo __('Add PremiumCoinset'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List PremiumCoinsets'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List PremiumCoinset Orders'), array('controller' => 'coinset_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New PremiumCoinset Order'), array('controller' => 'coinset_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
