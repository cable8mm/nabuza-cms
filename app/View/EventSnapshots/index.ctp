<div class="eventSnapshots index">
	<h2><?php echo __('Event Snapshots'); ?></h2>
<div class="adminSearchBox">
CSV 필드 순서 : 일련번호(id), 닉네임(nickname), 전화번호(phone_number), 골드(own_gold), 초대장 갯수(invitation_count), 추천 갯수(recommendation_count)
</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('start_shot'); ?></th>
			<th><?php echo $this->Paginator->sort('finish_shot'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($eventSnapshots as $eventSnapshot): ?>
	<tr>
		<td><?php echo h($eventSnapshot['EventSnapshot']['id']); ?>&nbsp;</td>
		<td><?php echo h($eventSnapshot['Event']['title']); ?>&nbsp;</td>
		<td><?php echo h($eventSnapshot['EventSnapshot']['name']); ?>&nbsp;</td>
		<td>
		<?php if(!empty($eventSnapshot['EventSnapshot']['start_shot'])):?>
		<a href="http://nabuza-cms.anytale.com<?php echo h($eventSnapshot['EventSnapshot']['start_shot']); ?>">CSV File Download</a>&nbsp;
		<?php endif;?>
		</td>
		<td>
		<?php if(!empty($eventSnapshot['EventSnapshot']['finish_shot'])):?>
		<a href="http://nabuza-cms.anytale.com<?php echo h($eventSnapshot['EventSnapshot']['finish_shot']); ?>">CSV File Download</a>&nbsp;
		<?php endif;?>
		</td>
		<td><?php echo h($eventSnapshot['EventSnapshot']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Form->postLink(__('Make Start Snapshot'), array('action' => 'make_start_shot', $eventSnapshot['EventSnapshot']['id']), null, __('이벤트 시작 스냅샷을 업데이트 하시겠습니까?')); ?>
		<?php echo $this->Form->postLink(__('Make Finish Snapshot'), array('action' => 'make_finish_shot', $eventSnapshot['EventSnapshot']['id']), null, __('이벤트 종료 스냅샷을 만드시겠습니까?')); ?>
			
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
		<li><?php echo $this->Html->link(__('Make Start Snapshot'), array('action' => 'make_start_shot')); ?></li>
	</ul>
</div>
