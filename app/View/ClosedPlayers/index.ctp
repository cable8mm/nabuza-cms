<div class="closedPlayers index">
	<h2><?php echo __('Closed Players'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('player_id'); ?></th>
			<th><?php echo $this->Paginator->sort('os'); ?></th>
			<th><?php echo $this->Paginator->sort('appid'); ?></th>
			<th><?php echo $this->Paginator->sort('phone_number'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($closedPlayers as $closedPlayer): ?>
	<tr>
		<td><?php echo h($closedPlayer['ClosedPlayer']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($closedPlayer['Player']['nickname'], array('controller' => 'players', 'action' => 'view', $closedPlayer['Player']['id'])); ?>
		</td>
		<td><?php echo h($closedPlayer['ClosedPlayer']['os']); ?>&nbsp;</td>
		<td><?php echo h($closedPlayer['ClosedPlayer']['appid']); ?>&nbsp;</td>
		<td><?php echo h($closedPlayer['ClosedPlayer']['phone_number']); ?>&nbsp;</td>
		<td><?php echo h($closedPlayer['ClosedPlayer']['created']); ?>&nbsp;</td>
		<td class="actions">
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
	</ul>
</div>
