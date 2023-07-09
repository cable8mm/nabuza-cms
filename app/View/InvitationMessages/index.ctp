<div class="invitationMessages index">
	<h2><?php echo __('Invitation Messages'); ?></h2>
	<div class="adminSearchBox">
	마지막 일련번호의 메시지가 노출됩니다.
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('language_id'); ?></th>
			<th><?php echo $this->Paginator->sort('kakaotalk_message'); ?></th>
			<th><?php echo $this->Paginator->sort('sms_message'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($invitationMessages as $invitationMessage): ?>
	<tr>
		<td><?php echo h($invitationMessage['InvitationMessage']['id']); ?>&nbsp;</td>
		<td><?php echo h($invitationMessage['Language']['name']); ?>&nbsp;</td>
		<td><?php echo h($invitationMessage['InvitationMessage']['kakaotalk_message']); ?>&nbsp;</td>
		<td><?php echo h($invitationMessage['InvitationMessage']['sms_message']); ?>&nbsp;</td>
		<td><?php echo h($invitationMessage['InvitationMessage']['created']); ?>&nbsp;</td>
		<td><?php echo h($invitationMessage['InvitationMessage']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $invitationMessage['InvitationMessage']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Invitation Message'), array('action' => 'add')); ?></li>
	</ul>
</div>
