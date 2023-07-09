<div class="goldmallItems index">
	<h2><?php echo __('Goldmall Items'); ?></h2>
<?php echo $this->Form->create('GoldmallItem', array('action'=>'index','type'=>'get'))?>
<div class="adminSearchBox">
<span style="font-weight:bold">검색 :</span>
<span style="font-weight:bold"><?php echo __('Is Activate')?> </span>
<?php echo $this->Form->radio('GoldmallItem.is_activate', array('모두 보기', '활성화만 보기'), array('legend' => false));?>
&nbsp;
<input type="submit" name="submit" value="검색" />
<input type="button" value="전체보기" onclick="location.href='<?php echo $this->Html->url(array('controller'=>'goldmall_item', 'action'=>'index'));?>'" />
</div>
<?php echo $this->Form->end() ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('Language.name'); ?></th>
			<th><?php echo $this->Paginator->sort('GoldmallItemController.name'); ?></th>
			<th><?php echo $this->Paginator->sort('Language.name'); ?></th>
			<th><?php echo $this->Paginator->sort('important_point'); ?></th>
			<th><?php echo $this->Paginator->sort('spent_gold'); ?></th>
			<th><?php echo $this->Paginator->sort('award_jade_count'); ?></th>
			<th><?php echo $this->Paginator->sort('award_invitation_count'); ?></th>
			<th><?php echo $this->Paginator->sort('award_gold_count'); ?></th>
			<th><?php echo $this->Paginator->sort('winner_count'); ?></th>
			<th><?php echo $this->Paginator->sort('submit_count'); ?></th>
			<th><?php echo $this->Paginator->sort('started'); ?></th>
			<th><?php echo $this->Paginator->sort('finished'); ?></th>
			<th><?php echo $this->Paginator->sort('is_auto_winner_choosed'); ?></th>
			<th><?php echo $this->Paginator->sort('is_complete'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($goldmallItems as $goldmallItem): ?>
	<tr>
		<td><?php echo h($goldmallItem['GoldmallItem']['id']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItem['Language']['name']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItem['GoldmallItemController']['name']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItem['Language']['name']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItem['GoldmallItem']['important_point']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItem['GoldmallItem']['spent_gold']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItem['GoldmallItem']['award_jade_count']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItem['GoldmallItem']['award_invitation_count']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItem['GoldmallItem']['award_gold_count']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItem['GoldmallItem']['choosed_winner_count']); ?> / <?php echo h($goldmallItem['GoldmallItem']['winner_count']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItem['GoldmallItem']['submit_count']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItem['GoldmallItem']['started']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItem['GoldmallItem']['finished']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItem['GoldmallItem']['is_auto_winner_choosed']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItem['GoldmallItem']['is_complete']); ?>&nbsp;</td>
		<td><?php echo h($goldmallItem['GoldmallItem']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $goldmallItem['GoldmallItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $goldmallItem['GoldmallItem']['id'])); ?>
			<?php 
			if ($goldmallItem['GoldmallItem']['is_complete'] == 0)
			echo $this->Form->postLink(__('완료시키기'), array('action' => 'complete', $goldmallItem['GoldmallItem']['id']), null, __('이 작업은 취소되지 않습니다. 당첨자 선정을 확인해 주세요.\n정말 완료시키겠습니까?', $goldmallItem['GoldmallItem']['id'])); ?>
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
	</ul>
</div>
