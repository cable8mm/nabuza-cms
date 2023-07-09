<div class="goldmallItemControllers view">
<h2><?php  echo __('Goldmall Item Controller'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language Name'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['Language']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Important Point'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['important_point']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Winner Count'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['winner_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Spent Gold'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['spent_gold']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Award Jade Count'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['award_jade_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Award Invitation Count'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['award_invitation_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Award Gold Count'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['award_gold_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Url'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['image_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Winner Image Url'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['winner_image_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Repeat'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['is_repeat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Started'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['started']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Term Day'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['term_day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Auto Winner Choosed'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['is_auto_winner_choosed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['is_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($goldmallItemController['GoldmallItemController']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Goldmall Item Controllers'), array('action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Goldmall Items'); ?></h3>
	<?php if (!empty($goldmallItemController['GoldmallItem'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Language Id'); ?></th>
		<th><?php echo __('Important Point'); ?></th>
		<th><?php echo __('Spent Gold'); ?></th>
		<th><?php echo __('Award Jade Count'); ?></th>
		<th><?php echo __('Award Invitation Count'); ?></th>
		<th><?php echo __('Award Gold Count'); ?></th>
		<th><?php echo __('Winner Count'); ?></th>
		<th><?php echo __('Submit Count'); ?></th>
		<th><?php echo __('Started'); ?></th>
		<th><?php echo __('Finished'); ?></th>
		<th><?php echo __('Is Auto Winner Choosed'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($goldmallItemController['GoldmallItem'] as $goldmallItem): ?>
		<tr>
			<td><?php echo $goldmallItem['id']; ?></td>
			<td><?php echo $goldmallItem['language_id']; ?></td>
			<td><?php echo $goldmallItem['important_point']; ?></td>
			<td><?php echo $goldmallItem['spent_gold']; ?></td>
			<td><?php echo $goldmallItem['award_jade_count']; ?></td>
			<td><?php echo $goldmallItem['award_invitation_count']; ?></td>
			<td><?php echo $goldmallItem['award_gold_count']; ?></td>
			<td><?php echo $goldmallItem['winner_count']; ?></td>
			<td><?php echo $goldmallItem['submit_count']; ?></td>
			<td><?php echo $goldmallItem['started']; ?></td>
			<td><?php echo $goldmallItem['finished']; ?></td>
			<td><?php echo $goldmallItem['is_auto_winner_choosed']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'goldmall_items', 'action' => 'view', $goldmallItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'goldmall_items', 'action' => 'edit', $goldmallItem['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'goldmall_items', 'action' => 'delete', $goldmallItem['id']), null, __('Are you sure you want to delete # %s?', $goldmallItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
		</ul>
	</div>
</div>
