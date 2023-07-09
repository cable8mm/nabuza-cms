<div class="eventSnapshots view">
<h2><?php  echo __('Event Snapshot'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eventSnapshot['EventSnapshot']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($eventSnapshot['EventSnapshot']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($eventSnapshot['EventSnapshot']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($eventSnapshot['EventSnapshot']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Event Snapshot'), array('action' => 'edit', $eventSnapshot['EventSnapshot']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Event Snapshot'), array('action' => 'delete', $eventSnapshot['EventSnapshot']['id']), null, __('Are you sure you want to delete # %s?', $eventSnapshot['EventSnapshot']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Event Snapshots'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event Snapshot'), array('action' => 'add')); ?> </li>
	</ul>
</div>
