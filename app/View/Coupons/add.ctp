<div class="coupons form">
<?php echo $this->Form->create('Coupon'); ?>
	<fieldset>
		<legend><?php echo __('Add Coupon'); ?></legend>
	<?php
		echo $this->Form->input('coupon_sponsor_id');
		echo $this->Form->input('serial');
		echo $this->Form->input('used');
		echo $this->Form->input('is_used');
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Coupons'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Coupon Sponsors'), array('controller' => 'coupon_sponsors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon Spponsor'), array('controller' => 'coupon_sponsors', 'action' => 'add')); ?> </li>
	</ul>
</div>
