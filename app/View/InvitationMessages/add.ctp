<div class="invitationMessages form">
<?php echo $this->Form->create('InvitationMessage'); ?>

<fieldset>
		<legend><?php echo __('Add Invitation Message'); ?></legend>
		<div class="adminSearchBox">
보낸 사람 닉네임은 <b>%nickname%</b> 키워드를 이용하세요.
</div>
		
	<?php
		echo $this->Form->input('language_id');
		echo $this->Form->input('kakaotalk_message');
		echo $this->Form->input('sms_message');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Invitation Messages'), array('action' => 'index')); ?></li>
	</ul>
</div>
