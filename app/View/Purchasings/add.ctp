<div class="purchasings form">
<?php echo $this->Form->create('Purchasing'); ?>
	<fieldset>
		<legend><?php echo __('Add Purchasing'); ?></legend>
	<?php
		echo $this->Form->input('player_id', array('type'=>'text', 'disabled'=>true, 'default'=>$player['Player']['id']));
		echo $this->Form->input('product_id');
		echo $this->Form->input('buyed');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Purchasings'), array('action' => 'index')); ?></li>
	</ul>
</div>
