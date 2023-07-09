<div class="operatorNotifications index">
	<h2><?php echo __('Operator Notifications'); ?></h2>
<div class="command">이 곳에서는 전체 노티만을 보낼 수 있습니다. 특정 플래이어에게 노티를 보내기 위해서는 운영 > 플래이어 메뉴를 선택해서 "Notify"버튼을 클릭하세요.</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('player_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('message'); ?></th>
			<th><?php echo $this->Paginator->sort('success'); ?></th>
			<th><?php echo $this->Paginator->sort('failure'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($operatorNotifications as $operatorNotification): ?>
	<tr>
		<td><?php echo h($operatorNotification['OperatorNotification']['id']); ?>&nbsp;</td>
		<td>
		<?php if(empty($operatorNotification['Player']['id'])):?>
		전체|이벤트 발송
		<?php else:?>
		<?php echo h($operatorNotification['Player']['id']); ?> / <?php echo h($operatorNotification['Player']['nickname']); ?>&nbsp;
		<?php endif;?>
		</td>
		<td><?php echo h($operatorNotification['OperatorNotification']['title']); ?>&nbsp;</td>
		<td><?php echo h($this->Text->truncate($operatorNotification['OperatorNotification']['message'], 20)); ?>&nbsp;</td>
		<td><?php echo h($operatorNotification['OperatorNotification']['success']); ?>&nbsp;</td>
		<td><?php echo h($operatorNotification['OperatorNotification']['failure']); ?>&nbsp;</td>
		<td><?php echo h($operatorNotification['OperatorNotification']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $operatorNotification['OperatorNotification']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Operator Notification (to all players)'), array('action' => 'add_all_players')); ?></li>
	</ul>
</div>
