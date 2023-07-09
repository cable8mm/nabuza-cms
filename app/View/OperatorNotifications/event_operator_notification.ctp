<div class="operatorNotifications form">
<?php echo $this->Form->create('OperatorNotification'); ?>
<fieldset>
		<legend><?php echo __('Event Operator Notification'); ?></legend>
<div class="command">이벤트에 당첨된 모든 플래이어에게 노티 메시지를 보냅니다. 이 작업은 취소 될 수 없으며, 발송 성공과 실패의 카운터는 기록하지만, 발송 실패자를 기록하지 않습니다.</div>
		
		<?php
		echo $this->Form->input('title');
		echo $this->Form->input('message');
		echo $this->Form->input('password');
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Operator Notifications'), array('action' => 'index')); ?></li>
	</ul>
</div>
