<div class="couponIssues form">
<?php echo $this->Form->create('CouponIssue'); ?>
	<fieldset>
		<legend><?php echo __('Add Coupon Issue'); ?></legend>
	<?php
		echo $this->Form->input('coupon_sponsor_id');
		echo $this->Form->input('jade_count');
		echo $this->Form->input('issue_count');
		echo $this->Form->input('description');
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Coupon Issues'), array('action' => 'index')); ?></li>
	</ul>
</div>
