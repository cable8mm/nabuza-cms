<div class="coupons form">
<?php echo $this->Form->create('Coupon'); ?>
	<fieldset>
		<legend><?php echo __('Edit Coupon'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('coupon_spponsor_id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Coupon.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Coupon.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Coupon Sponsors'), array('controller' => 'coupon_sponsors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon Spponsor'), array('controller' => 'coupon_sponsors', 'action' => 'add')); ?> </li>
	</ul>
</div>
