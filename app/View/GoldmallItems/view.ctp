<div class="goldmallItems view">
<h2><?php  echo __('Goldmall Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language Name'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['Language']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Important Point'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['important_point']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Spent Gold'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['spent_gold']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Award Jade Count'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['award_jade_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Award Invitation Count'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['award_invitation_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Award Gold Count'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['award_gold_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Url'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['image_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Winner Image Url'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['winner_image_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Winner Count'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['winner_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Submit Count'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['submit_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Started'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['started']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Finished'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['finished']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Auto Winner Choosed'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['is_auto_winner_choosed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('is_complete'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['is_complete']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($goldmallItem['GoldmallItem']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Goldmall Item'), array('action' => 'edit', $goldmallItem['GoldmallItem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Goldmall Item'), array('action' => 'delete', $goldmallItem['GoldmallItem']['id']), null, __('Are you sure you want to delete # %s?', $goldmallItem['GoldmallItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Goldmall Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Goldmall Item'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Goldmall Players'), array('controller' => 'goldmall_players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Goldmall Player'), array('controller' => 'goldmall_players', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Goldmall Players'); ?></h3>
	<?php if (!empty($goldmallItem['GoldmallPlayer'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Goldmall Item Id'); ?></th>
		<th><?php echo __('Submitted Player Id'); ?></th>
		<th><?php echo __('Submit Count'); ?></th>
		<th><?php echo __('Is Winner'); ?></th>
		<th><?php echo __('Is Winning Confirm'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($goldmallItem['GoldmallPlayer'] as $goldmallPlayer): ?>
		<tr>
			<td><?php echo $goldmallPlayer['id']; ?></td>
			<td><?php echo $goldmallPlayer['goldmall_item_id']; ?></td>
			<td><?php echo $goldmallPlayer['submitted_player_id']; ?></td>
			<td><?php echo $goldmallPlayer['submit_count']; ?></td>
			<td><?php echo $goldmallPlayer['is_winner']; ?></td>
			<td><?php echo $goldmallPlayer['is_winning_confirm']; ?></td>
			<td><?php echo $goldmallPlayer['created']; ?></td>
			<td><?php echo $goldmallPlayer['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'goldmall_players', 'action' => 'view', $goldmallPlayer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'goldmall_players', 'action' => 'edit', $goldmallPlayer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'goldmall_players', 'action' => 'delete', $goldmallPlayer['id']), null, __('Are you sure you want to delete # %s?', $goldmallPlayer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Goldmall Player'), array('controller' => 'goldmall_players', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
