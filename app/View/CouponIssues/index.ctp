<div class="couponIssues index">
	<h2><?php echo __('Coupon Issues'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('coupon_sponsor_id'); ?></th>
			<th><?php echo $this->Paginator->sort('jade_count'); ?></th>
			<th><?php echo $this->Paginator->sort('issue_count'); ?></th>
			<th><?php echo $this->Paginator->sort('used_count'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($couponIssues as $couponIssue): ?>
	<tr>
		<td><?php echo h($couponIssue['CouponIssue']['id']); ?>&nbsp;</td>
		<td>
			<?php echo h($couponIssue['CouponSponsor']['name']); ?>
		</td>
		<td><?php echo h($couponIssue['CouponIssue']['jade_count']); ?>&nbsp;</td>
		<td><?php echo h($couponIssue['CouponIssue']['issue_count']); ?>&nbsp;</td>
		<td><?php echo h($couponIssue['CouponIssue']['used_count']); ?>&nbsp;</td>
		<td><?php echo h($couponIssue['CouponIssue']['created']); ?>&nbsp;</td>
		<td><?php echo h($couponIssue['CouponIssue']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $couponIssue['CouponIssue']['id'])); ?>
			<?php 
			if (!empty($couponIssue['CouponIssue']['is_exist_csv']))
				echo $this->Html->link(__('Re-Generate CSV'), array('action' => 'generate_cvs', $couponIssue['CouponIssue']['id'])); 
			else
				echo $this->Html->link(__('Generate CSV'), array('action' => 'generate_cvs', $couponIssue['CouponIssue']['id']));
			?>
			<?php 
			if (!empty($couponIssue['CouponIssue']['is_exist_csv']))
				echo '<a href="/files/coupon_issue_'.$couponIssue['CouponIssue']['id'].'.csv" target="blank">Download CSV</a>';
			?>
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
		<li><?php echo $this->Html->link(__('New Coupon Issue'), array('action' => 'add')); ?></li>
	</ul>
</div>
