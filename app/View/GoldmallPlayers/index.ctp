<div class="goldmallPlayers index">
	<h2><?php echo __('Goldmall Players'); ?></h2>
<?php echo $this->Form->create('GoldmallPlayer', array('action'=>'index','type'=>'get'))?>
<div class="adminSearchBox">
<span style="font-weight:bold">검색 :</span>
<?php // echo $this->Form->select('NdUser.select', array('username_1'=>'완벽아이디','username_2'=>'왼쪽아이디','username_3'=>'오른쪽 아이디','username_4'=>'중간아이디','user_email'=>'이메일','user_tel'=>'전화번호','realname'=>'실명','user_id'=>'회원번호','nickname'=>'닉네임'))?>

<span style="font-weight:bold"><?php echo __('Goldmall Items')?> </span><?php echo $this->Form->select('GoldmallPlayer.goldmall_item_id', $goldmallItems, array('empty'=>'선택 안함'))?>&nbsp;
<span style="font-weight:bold"><?php echo __('과거 ')?> </span><?php echo $this->Form->text('GoldmallPlayer.number')?>회차&nbsp;


<input type="submit" name="submit" value="검색" />
<input type="button" value="전체보기" onclick="location.href='<?php echo $this->Html->url(array('controller'=>'goldmall_players', 'action'=>'index'));?>'" />
</div>
<?php echo $this->Form->end() ?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('goldmall_item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('submitted_player_id'); ?></th>
			<th><?php echo $this->Paginator->sort('submit_count'); ?></th>
			<th><?php echo $this->Paginator->sort('is_winner'); ?></th>
			<th><?php echo $this->Paginator->sort('is_winning_confirm'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($goldmallPlayers as $goldmallPlayer): ?>
	<tr>
		<td><?php echo h($goldmallPlayer['GoldmallPlayer']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($goldmallPlayer['GoldmallItem']['name'], array('controller' => 'goldmall_items', 'action' => 'view', $goldmallPlayer['GoldmallItem']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($goldmallPlayer['Player']['nickname'], array('controller' => 'players', 'action' => 'view', $goldmallPlayer['Player']['id'])); echo ' / '.$goldmallPlayer['Player']['id'];?>
		</td>
		<td><?php echo h($goldmallPlayer['GoldmallPlayer']['submit_count']); ?>&nbsp;</td>
		<td><?php echo h($goldmallPlayer['GoldmallPlayer']['is_winner']); ?>&nbsp;</td>
		<td><?php echo h($goldmallPlayer['GoldmallPlayer']['is_winning_confirm']); ?>&nbsp;</td>
		<td><?php echo h($goldmallPlayer['GoldmallPlayer']['created']); ?>&nbsp;</td>
		<td><?php echo h($goldmallPlayer['GoldmallPlayer']['modified']); ?>&nbsp;</td>
		<td class="actions">
		<?php if($goldmallPlayer['GoldmallPlayer']['is_winner'] == 0):?>
			<?php echo $this->Form->postLink(__('Choice Winner'), array('action' => 'choice_winner', $goldmallPlayer['GoldmallPlayer']['id']), null, __('%s 님을 당첨자로 확정하시겠습니까?\n이 작업은 취소가 불가능합니다.', $goldmallPlayer['Player']['nickname'])); ?> </li>
		<?php endif;?>
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
