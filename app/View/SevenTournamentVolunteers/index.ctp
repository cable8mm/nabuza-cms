<div class="sevenTournamentVolunteers index">
	<h2><?php echo __('Seven Tournament Volunteers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('player_id'); ?></th>
			<th><?php echo __('Phone Number')?></th>
			<th><?php echo $this->Paginator->sort('highscore'); ?></th>
			<th><?php echo $this->Paginator->sort('ranking'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			</tr>
	<?php
	foreach ($sevenTournamentVolunteers as $sevenTournamentVolunteer): ?>
	<tr>
		<td><?php echo h($sevenTournamentVolunteer['SevenTournamentVolunteer']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($sevenTournamentVolunteer['Player']['nickname'], array('controller' => 'players', 'action' => 'view', $sevenTournamentVolunteer['Player']['id'])); ?>
		</td>
		<td><?php echo h($sevenTournamentVolunteer['Player']['phone_number']); ?>&nbsp;</td>
		<td><?php echo h(number_format($sevenTournamentVolunteer['SevenTournamentVolunteer']['highscore'])); ?>&nbsp;</td>
		<td><?php echo h($sevenTournamentVolunteer['SevenTournamentVolunteer']['ranking']); ?>&nbsp;</td>
		<td><?php echo h($sevenTournamentVolunteer['SevenTournamentVolunteer']['created']); ?>&nbsp;</td>
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
		<li><?php //echo $this->Html->link(__('New Seven Tournament Volunteer'), array('action' => 'add')); ?></li>
		<li><?php //echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
