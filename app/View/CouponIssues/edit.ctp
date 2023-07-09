<div class="couponIssues form">
<?php echo $this->Form->create('CouponIssue'); ?>
	<fieldset>
		<legend><?php echo __('Edit Coupon Issue'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('coupon_sponsor_id');
		echo $this->Form->input('issue_count');
		echo $this->Form->input('used_count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CouponIssue.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CouponIssue.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Coupon Issues'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Coupon Sponsors'), array('controller' => 'coupon_sponsors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon Sponsor'), array('controller' => 'coupon_sponsors', 'action' => 'add')); ?> </li>
	</ul>
</div>
