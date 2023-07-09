<div class="closedPlayers view">
<h2><?php  echo __('Closed Player'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($closedPlayer['ClosedPlayer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player'); ?></dt>
		<dd>
			<?php echo $this->Html->link($closedPlayer['Player']['nickname'], array('controller' => 'players', 'action' => 'view', $closedPlayer['Player']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Os'); ?></dt>
		<dd>
			<?php echo h($closedPlayer['ClosedPlayer']['os']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Appid'); ?></dt>
		<dd>
			<?php echo h($closedPlayer['ClosedPlayer']['appid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone Number'); ?></dt>
		<dd>
			<?php echo h($closedPlayer['ClosedPlayer']['phone_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($closedPlayer['ClosedPlayer']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Closed Player'), array('action' => 'edit', $closedPlayer['ClosedPlayer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Closed Player'), array('action' => 'delete', $closedPlayer['ClosedPlayer']['id']), null, __('Are you sure you want to delete # %s?', $closedPlayer['ClosedPlayer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Closed Players'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Closed Player'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
