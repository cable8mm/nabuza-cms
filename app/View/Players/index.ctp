<div class="players index">
	<h2><?php echo __('Players'); ?></h2>
	
<?php echo $this->Form->create('Player', array('action'=>'index','type'=>'get'))?>
<div class="adminSearchBox">
<?php // echo $this->Form->select('NdUser.select', array('username_1'=>'완벽아이디','username_2'=>'왼쪽아이디','username_3'=>'오른쪽 아이디','username_4'=>'중간아이디','user_email'=>'이메일','user_tel'=>'전화번호','realname'=>'실명','user_id'=>'회원번호','nickname'=>'닉네임'))?>

<span style="font-weight:bold"><?php echo __('Appid')?> </span><?php echo $this->Form->text('Player.appid')?>&nbsp;
<span style="font-weight:bold">%<?php echo __('Phone Number')?>% </span><?php echo $this->Form->text('Player.phone_number')?>&nbsp;
<span style="font-weight:bold">%<?php echo __('Nickname')?>% </span><?php echo $this->Form->text('Player.nickname')?>&nbsp;
<span style="font-weight:bold"><?php echo __('Is Closing')?> </span><?php echo $this->Form->select('Player.status_closing_id', $statusClosings)?>&nbsp;
<span style="font-weight:bold"><?php echo __('Goldlevel')?> >= </span><?php echo $this->Form->select('Player.gold_level', $goldLevels)?>&nbsp;<br />
<span style="font-weight:bold"><?php echo __('Created')?> 기간 </span><?php echo $this->Form->text('Player.start_created', array('class'=>'datepicker'))?>
 - <?php echo $this->Form->text('Player.end_created', array('class'=>'datepicker'))?>&nbsp;
<span style="font-weight:bold"><?php echo __('Goldlevel')?> >= </span><?php echo $this->Form->select('Player.gold_level', $goldLevels)?>&nbsp;
<span style="font-weight:bold"><?php echo __('Is Played')?> </span><?php echo $this->Form->select('Player.is_played', $isPlayed)?>&nbsp;
<span style="font-weight:bold"><?php echo __('Languages')?> </span><?php echo $this->Form->select('Player.language_id', $languages)?>&nbsp;
<span style="font-weight:bold"><?php echo __('Markets')?> </span><?php echo $this->Form->select('Player.market_id', $markets)?>&nbsp;
<br /><br />
<input type="submit" name="submit" value="검색" />
<input type="button" value="전체보기" onclick="location.href='<?php echo $this->Html->url(array('controller'=>'players', 'action'=>'index'));?>'" />
</div>
<?php echo $this->Form->end() ?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('language_id'); ?></th>
			<th><?php echo $this->Paginator->sort('market_id'); ?></th>
			<!--th><?php echo $this->Paginator->sort('status_closing_id'); ?></th-->
			<th><?php echo $this->Paginator->sort('appid'); ?></th>
			<th><?php echo $this->Paginator->sort('phone_number'); ?></th>
			<th><?php echo $this->Paginator->sort('nickname'); ?></th>
			<th><?php echo $this->Paginator->sort('highscore'); ?></th>
			<th><?php echo $this->Paginator->sort('weekly_highscore'); ?></th>
			<!--th><?php echo $this->Paginator->sort('lastweek_highscore'); ?></th-->
			<!-- th><?php echo $this->Paginator->sort('is_check_highscore'); ?></th -->
			<!--th><?php echo $this->Paginator->sort('game_number'); ?></th-->
			<th><?php echo $this->Paginator->sort('own_jade_count'); ?></th>
			<th><?php echo $this->Paginator->sort('own_gold'); ?>/레벨</th>
			<th><?php echo $this->Paginator->sort('invitation_count'); ?></th>
			<th><?php echo $this->Paginator->sort('recommendation_count'); ?></th>
			<!-- th><?php echo $this->Paginator->sort('gift_tournament_id'); ?></th -->
			<th><?php echo $this->Paginator->sort('start_game'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($players as $player): ?>
	<tr>
		<td><?php echo h($player['Player']['id']); ?>&nbsp;</td>
		<td><?php echo h($player['Language']['name']); ?>&nbsp;</td>
		<td><?php echo $this->market->getName($player['Player']['market_id']); ?>&nbsp;</td>
		<!--td><?php echo h($this->Text->truncate($player['StatusClosing']['name'], 6)); ?>&nbsp;</td-->
		<td><?php echo h($this->Text->truncate($player['Player']['appid'], 8)); ?>&nbsp;</td>
		<td><?php echo h($this->Text->truncate($player['Player']['phone_number'], 8)); ?>&nbsp;</td>
		<td style="word-break:nowrap;"><?php echo h($player['Player']['nickname']); ?>&nbsp;</td>
		<td><?php echo h($player['Player']['highscore']); ?>&nbsp;</td>
		<td><?php echo h($player['Player']['weekly_highscore']); ?>&nbsp;</td>
		<!--td><?php echo h($player['Player']['lastweek_highscore']); ?>&nbsp;</td-->
		<!-- td><?php echo h($player['Player']['is_check_highscore']); ?>&nbsp;</td -->
		<!--td><?php echo h($player['Player']['game_number']); ?>&nbsp;</td-->
		<td><?php echo h($player['Player']['own_jade_count']); ?>&nbsp;</td>
		<td><?php echo h($player['Player']['own_gold']); ?>/
		<?php
		foreach($goldLevels as $k=>$goldLevel) {
			if ($goldLevel > $player['Player']['own_gold']) {
				echo $k;
				break;
			}
		}
		?>
		&nbsp;</td>
		<td><?php echo h($player['Player']['invitation_count']); ?>&nbsp;</td>
		<td><?php echo h($player['Player']['recommendation_count']); ?>&nbsp;</td>
		<!-- td><?php echo h($player['Player']['gift_tournament_id']); ?>&nbsp;</td -->
		<td><?php echo h($this->Time->format("m.d.H.i",$player['Player']['start_game'])); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format("m.d.H.i",$player['Player']['created'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $player['Player']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $player['Player']['id'])); ?>
			<?php echo $this->Html->link(__('Notify'), array('controller'=>'operator_notifications', 'action' => 'add', 'player_id'=>$player['Player']['id']), array('target'=>'_blank')); ?>
			<?php echo $this->Html->link(__('Operator Purchasing'), array('controller'=>'purchasings', 'action' => 'add', 'player_id'=>$player['Player']['id']), array('target'=>'_blank')); ?>
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
		<li><?php //echo $this->Html->link(__('New Player'), array('action' => 'add')); ?></li>
	</ul>
</div>
