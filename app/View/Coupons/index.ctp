<div class="coupons index">
	<h2><?php echo __('Coupons'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('desc'); ?></th>
			<th><?php echo $this->Paginator->sort('serial'); ?></th>
			<th><?php echo $this->Paginator->sort('used'); ?></th>
			<th><?php echo $this->Paginator->sort('is_used'); ?></th>
			<th><?php echo $this->Paginator->sort('is_active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($coupons as $coupon): ?>
	<tr>
		<td><?php echo h($coupon['Coupon']['id']); ?>&nbsp;</td>
		<td><?php echo h($coupon['CouponIssue']['description']); ?>&nbsp;</td>
		<td><?php echo h($coupon['Coupon']['serial']); ?>&nbsp;</td>
		<td><?php echo h($coupon['Coupon']['used']); ?>&nbsp;</td>
		<td><?php echo h($coupon['Coupon']['is_used']); ?>&nbsp;</td>
		<td><?php echo h($coupon['Coupon']['is_active']); ?>&nbsp;</td>
		<td><?php echo h($coupon['Coupon']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $coupon['Coupon']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $coupon['Coupon']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $coupon['Coupon']['id']), null, __('Are you sure you want to delete # %s?', $coupon['Coupon']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Coupon'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Coupon Sponsors'), array('controller' => 'coupon_sponsors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon Spponsor'), array('controller' => 'coupon_sponsors', 'action' => 'add')); ?> </li>
	</ul>
</div>
