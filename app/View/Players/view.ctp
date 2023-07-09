<div class="players view">
<h2><?php  echo __('Player'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($player['Player']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language Name'); ?></dt>
		<dd>
			<?php echo h($player['Language']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Market Name'); ?></dt>
		<dd>
			<?php echo $this->market->getName($player['Player']['market_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Appid'); ?></dt>
		<dd>
			<?php echo h($player['Player']['appid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AccessToken'); ?></dt>
		<dd>
			<?php echo h($player['AccessToken']['token']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notificationid'); ?></dt>
		<dd>
			<?php echo h($player['Player']['notificationid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Os'); ?></dt>
		<dd>
			<?php echo h($player['Player']['os']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone Number'); ?></dt>
		<dd>
			<?php echo h($player['Player']['phone_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Loginid'); ?></dt>
		<dd>
			<?php echo h($player['Player']['loginid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($player['Player']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nickname'); ?></dt>
		<dd>
			<?php echo h($player['Player']['nickname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Highscore'); ?></dt>
		<dd>
			<?php echo h($player['Player']['highscore']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weekly Highscore'); ?></dt>
		<dd>
			<?php echo h($player['Player']['weekly_highscore']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastweek Highscore'); ?></dt>
		<dd>
			<?php echo h($player['Player']['lastweek_highscore']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Check Highscore'); ?></dt>
		<dd>
			<?php echo h($player['Player']['is_check_highscore']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Game Number'); ?></dt>
		<dd>
			<?php echo h($player['Player']['game_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Own Jade Count'); ?></dt>
		<dd>
			<?php echo h($player['Player']['own_jade_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Own Gold'); ?></dt>
		<dd>
			<?php echo h($player['Player']['own_gold']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gold Medal Count'); ?></dt>
		<dd>
			<?php echo h($player['Player']['gold_medal_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Silver Medal Count'); ?></dt>
		<dd>
			<?php echo h($player['Player']['silver_medal_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bronze Medal Count'); ?></dt>
		<dd>
			<?php echo h($player['Player']['bronze_medal_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Invitation Count'); ?></dt>
		<dd>
			<?php echo h($player['Player']['invitation_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remaining Time'); ?></dt>
		<dd>
			<?php echo h($player['Player']['remaining_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Invitation Sent'); ?></dt>
		<dd>
			<?php echo h($player['Player']['last_invitation_sent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Invitation Notification'); ?></dt>
		<dd>
			<?php echo h($player['Player']['is_invitation_notification']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Gift Notification'); ?></dt>
		<dd>
			<?php echo h($player['Player']['is_gift_notification']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Changing Order Notification'); ?></dt>
		<dd>
			<?php echo h($player['Player']['is_changing_order_notification']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($player['Player']['is_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status Closing'); ?></dt>
		<dd>
			<?php echo h($player['StatusClosing']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recommendation Count'); ?></dt>
		<dd>
			<?php echo h($player['Player']['recommendation_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Review Count'); ?></dt>
		<dd>
			<?php echo h($player['Player']['review_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gift Tournament Id'); ?></dt>
		<dd>
			<?php echo h($player['Player']['gift_tournament_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Anytale'); ?></dt>
		<dd>
			<?php echo h($player['Player']['is_anytale']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($player['Player']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($player['Player']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Game'); ?></dt>
		<dd>
			<?php echo h($player['Player']['start_game']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Level'); ?></dt>
		<dd>
			<?php echo h($player['Player']['last_level']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Players'), array('action' => 'index')); ?> </li>
		<!-- li class="danger"><?php //echo $this->Form->postLink(__('Closing Player'), array('action' => 'closing', $player['Player']['id']), null, __('Are you sure you want to Close # %s?', $player['Player']['id'])); ?> </li-->
<?php //if ($player['Player']['status_closing_id'] == 1):?>
		<!-- li class="danger"><?php //echo $this->Form->postLink(__('Unclosing Player'), array('action' => 'unclosing', $player['Player']['id']), null, __('Are you sure you want to Unclose # %s?', $player['Player']['id'])); ?> </li-->
<?php //endif;?>
		</ul>
</div>
