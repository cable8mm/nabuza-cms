<div class="couponIssues view">
<h2><?php  echo __('Coupon Issue'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($couponIssue['CouponIssue']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coupon Sponsor'); ?></dt>
		<dd>
			<?php echo h($couponIssue['CouponSponsor']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Issue Count'); ?></dt>
		<dd>
			<?php echo h($couponIssue['CouponIssue']['issue_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Jade Count'); ?></dt>
		<dd>
			<?php echo h($couponIssue['CouponIssue']['jade_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Used Count'); ?></dt>
		<dd>
			<?php echo h($couponIssue['CouponIssue']['used_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($couponIssue['CouponIssue']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($couponIssue['CouponIssue']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Coupon Issues'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon Issue'), array('action' => 'add')); ?> </li>
	</ul>
</div>
<div style="clear:both;"></div>
<div class="coupons index">
	<h2><?php echo __('Coupons'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo h('id'); ?></th>
			<th><?php echo h('serial'); ?></th>
			<th><?php echo h('used'); ?></th>
			<th><?php echo h('is_used'); ?></th>
			<th><?php echo h('used_player_id'); ?></th>
			<th><?php echo h('is_active'); ?></th>
			<th><<?php echo h('created'); ?></th>
	</tr>
	<?php foreach ($couponIssue['Coupon'] as $coupon): ?>
	<tr>
		<td><?php echo h($coupon['id']); ?>&nbsp;</td>
		<td><?php echo h($coupon['serial']); ?>&nbsp;</td>
		<td><?php echo h($coupon['used']); ?>&nbsp;</td>
		<td><?php echo h($coupon['is_used']); ?>&nbsp;</td>
		<td><?php echo h($coupon['used_player_id']); ?>&nbsp;</td>
		<td><?php echo h($coupon['is_active']); ?>&nbsp;</td>
		<td><?php echo h($coupon['created']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
