<div class="operatorNotifications view">
<h2><?php  echo __('Operator Notification'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($operatorNotification['OperatorNotification']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player Id'); ?></dt>
		<dd>
			<?php echo h($operatorNotification['OperatorNotification']['player_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($operatorNotification['OperatorNotification']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($operatorNotification['OperatorNotification']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($operatorNotification['OperatorNotification']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Operator Notifications'), array('action' => 'index')); ?> </li>
	</ul>
</div>
