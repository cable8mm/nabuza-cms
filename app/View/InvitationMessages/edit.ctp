<div class="invitationMessages form">
<?php echo $this->Form->create('InvitationMessage'); ?>
	<fieldset>
		<legend><?php echo __('Edit Invitation Message'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('kakaotalk_message');
		echo $this->Form->input('sms_message');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('InvitationMessage.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('InvitationMessage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Invitation Messages'), array('action' => 'index')); ?></li>
	</ul>
</div>
