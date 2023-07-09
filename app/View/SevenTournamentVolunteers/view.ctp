<div class="sevenTournamentVolunteers view">
<h2><?php  echo __('Seven Tournament Volunteer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sevenTournamentVolunteer['SevenTournamentVolunteer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sevenTournamentVolunteer['Player']['appid'], array('controller' => 'players', 'action' => 'view', $sevenTournamentVolunteer['Player']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Highscore'); ?></dt>
		<dd>
			<?php echo h($sevenTournamentVolunteer['SevenTournamentVolunteer']['highscore']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($sevenTournamentVolunteer['SevenTournamentVolunteer']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Seven Tournament Volunteer'), array('action' => 'edit', $sevenTournamentVolunteer['SevenTournamentVolunteer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Seven Tournament Volunteer'), array('action' => 'delete', $sevenTournamentVolunteer['SevenTournamentVolunteer']['id']), null, __('Are you sure you want to delete # %s?', $sevenTournamentVolunteer['SevenTournamentVolunteer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Seven Tournament Volunteers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Seven Tournament Volunteer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
