<div class="goldmallItemControllers index">
	<h2><?php echo __('Goldmall Item Controllers'); ?></h2>
<?php echo $this->Form->create('GoldmallItemController', array('action'=>'index','type'=>'get'))?>
<div class="adminSearchBox">
<span style="font-weight:bold">검색 :</span>
<span style="font-weight:bold"><?php echo __('Is Activate')?> </span>
<?php echo $this->Form->radio('GoldmallItemController.is_activate', array('모두 보기', '활성화만 보기'), array('legend' => false));?>
&nbsp;
<input type="submit" name="submit" value="검색" />
<input type="button" value="전체보기" onclick="location.href='<?php echo $this->Html->url(array('controller'=>'goldmall_item_controllers', 'action'=>'index'));?>'" />
</div>
<?php echo $this->Form->end() ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('language_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('important_point'); ?></th>
			<th><?php echo $this->Paginator->sort('winner_count'); ?></th>
			<th><?php echo $this->Paginator->sort('spent_gold'); ?></th>
			<th><?php echo $this->Paginator->sort('award_jade_count'); ?></th>
			<th><?php echo $this->Paginator->sort('award_invitation_count'); ?></th>
			<th><?php echo $this->Paginator->sort('award_gold_count'); ?></th>
			<th><?php echo $this->Paginator->sort('is_repeat'); ?></th>
			<th><?php echo $this->Paginator->sort('started'); ?></th>
			<th><?php echo $this->Paginator->sort('term_day'); ?></th>
			<th><?php echo $this->Paginator->sort('is_auto_winner_choosed'); ?></th>
			<th><?php echo $this->Paginator->sort('is_request_delivery_info'); ?></th>
			<th><?php echo $this->Paginator->sort('is_active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($goldmallItemControllers as $goldmallItemController): ?>
	<tr>
		<td><?php echo h($goldmallItemController['GoldmallItemController']['id']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItemController['Language']['name']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItemController['GoldmallItemController']['name']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItemController['GoldmallItemController']['important_point']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItemController['GoldmallItemController']['winner_count']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItemController['GoldmallItemController']['spent_gold']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItemController['GoldmallItemController']['award_jade_count']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItemController['GoldmallItemController']['award_invitation_count']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItemController['GoldmallItemController']['award_gold_count']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItemController['GoldmallItemController']['is_repeat']); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('Y-m-d H:i', $goldmallItemController['GoldmallItemController']['started'])); ?>&nbsp;</td>
		<td><?php echo h($goldmallItemController['GoldmallItemController']['term_day']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItemController['GoldmallItemController']['is_auto_winner_choosed']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItemController['GoldmallItemController']['is_request_delivery_info']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItemController['GoldmallItemController']['is_active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $goldmallItemController['GoldmallItemController']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $goldmallItemController['GoldmallItemController']['id'])); ?>
			<?php 
//			if (empty($goldmallItemController['GoldmallItemController']['is_repeat']))
			echo $this->Form->postLink(__('아이템 만들기'), array('action' => 'generate_goldmall_item', $goldmallItemController['GoldmallItemController']['id']), null, __('Are you sure you want to generate goldmall item copying # %s?', $goldmallItemController['GoldmallItemController']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Goldmall Item Controller'), array('action' => 'add')); ?></li>
	</ul>
</div>
