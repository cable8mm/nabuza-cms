<div class="invitationMessages view">
<h2><?php  echo __('Invitation Message'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($invitationMessage['InvitationMessage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kakaotalk Message'); ?></dt>
		<dd>
			<?php echo nl2br($invitationMessage['InvitationMessage']['kakaotalk_message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sms Message'); ?></dt>
		<dd>
			<?php echo nl2br($invitationMessage['InvitationMessage']['sms_message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($invitationMessage['InvitationMessage']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($invitationMessage['InvitationMessage']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Invitation Messages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invitation Message'), array('action' => 'add')); ?> </li>
	</ul>
</div>
