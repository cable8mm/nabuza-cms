<div class="events view">
<h2><?php  echo __('Event'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($event['Event']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language Name'); ?></dt>
		<dd>
			<?php echo h($event['Language']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($event['Event']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link Url'); ?></dt>
		<dd>
			<?php echo h($event['Event']['link_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Started'); ?></dt>
		<dd>
			<?php echo h($event['Event']['started']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Finished'); ?></dt>
		<dd>
			<?php echo h($event['Event']['finished']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Notify'); ?></dt>
		<dd>
			<?php echo h($event['Event']['is_notify']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Winner Choosed'); ?></dt>
		<dd>
			<?php echo h($event['Event']['is_winner_choosed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Completed'); ?></dt>
		<dd>
			<?php echo h($event['Event']['is_completed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($event['Event']['is_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($event['Event']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($event['Event']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Event Winners'); ?></h3>
	<?php if (!empty($event['EventWinner'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Player Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($event['EventWinner'] as $eventWinner): ?>
		<tr>
			<td><?php echo $eventWinner['id']; ?></td>
			<td><?php echo $eventWinner['event_id']; ?></td>
			<td><?php echo $eventWinner['player_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'players', 'action' => 'view', $eventWinner['player_id'])); ?>
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
