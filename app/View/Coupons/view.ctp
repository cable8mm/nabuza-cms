<div class="coupons view">
<h2><?php  echo __('Coupon'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coupon Spponsor Id'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['coupon_spponsor_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Serial'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['serial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Used'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['used']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Used'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['is_used']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['is_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Coupon'), array('action' => 'edit', $coupon['Coupon']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Coupon'), array('action' => 'delete', $coupon['Coupon']['id']), null, __('Are you sure you want to delete # %s?', $coupon['Coupon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Coupon Sponsors'), array('controller' => 'coupon_sponsors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon Spponsor'), array('controller' => 'coupon_sponsors', 'action' => 'add')); ?> </li>
	</ul>
</div>
