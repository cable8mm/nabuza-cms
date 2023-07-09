<div class="events index">
	<h2><?php echo __('Events'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('language_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('started'); ?></th>
			<th><?php echo $this->Paginator->sort('finished'); ?></th>
			<th><?php echo $this->Paginator->sort('is_auto_snapshot'); ?></th>
			<th><?php echo $this->Paginator->sort('is_notify'); ?></th>
			<th><?php echo $this->Paginator->sort('is_winner_choosed'); ?></th>
			<th><?php echo $this->Paginator->sort('is_completed'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($events as $event): ?>
	<tr>
		<td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
		<td><?php echo h($event['Language']['name']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['title']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['started']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['finished']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['is_auto_snapshot']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['is_notify']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['is_winner_choosed']); ?>&nbsp;</td>
		<td><?php echo h($event['Event']['is_completed']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $event['Event']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $event['Event']['id'])); ?>
			<?php echo $this->Html->link(__('당첨자 수동 선택'), array('action' => 'set_winner_choosed_manually', $event['Event']['id'])); ?>
			<?php //echo $this->Form->postLink(__('당첨자 자동 선택'), array('action' => 'set_winner_choosed', $event['Event']['id']), null, __('당첨자 선택이 완료되었는지 개발팀에 확인하세요. 당첨자 선택이 완료 되었습니까?')); ?>
			<?php echo $this->Form->postLink(__('리워드 제공&완료'), array('action' => 'set_complete', $event['Event']['id']), null, __('모든 이벤트 처리가 완료되었는지 확인하세요. 이벤트가 완료되었습니까?')); ?>
			<?php echo $this->Html->link(__('운영자 노티피케이션'), array('controller'=>'operator_notifications', 'action' => 'event_operator_notification', $event['Event']['id']), array('target'=>'_blank'), __('노티피케이션은 취소가 되지 않습니다. 운영자 노티피케이션을 보내시겠습니까?')); ?>
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
		<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?></li>
	</ul>
</div>
