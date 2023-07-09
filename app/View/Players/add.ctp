<div class="players form">
<?php echo $this->Form->create('Player'); ?>
	<fieldset>
		<legend><?php echo __('Add Player'); ?></legend>
	<?php
		echo $this->Form->input('language_id');
		echo $this->Form->input('appid');
		echo $this->Form->input('notificationid');
		echo $this->Form->input('os');
		echo $this->Form->input('phone_number');
		echo $this->Form->input('loginid');
		echo $this->Form->input('password');
		echo $this->Form->input('nickname');
		echo $this->Form->input('highscore');
		echo $this->Form->input('weekly_highscore');
		echo $this->Form->input('lastweek_highscore');
		echo $this->Form->input('is_check_highscore');
		echo $this->Form->input('game_number');
		echo $this->Form->input('own_jade_count');
		echo $this->Form->input('own_gold');
		echo $this->Form->input('gold_medal_count');
		echo $this->Form->input('silver_medal_count');
		echo $this->Form->input('bronze_medal_count');
		echo $this->Form->input('invitation_count');
		echo $this->Form->input('remaining_time');
		echo $this->Form->input('last_invitation_sent');
		echo $this->Form->input('is_invitation_notification');
		echo $this->Form->input('is_gift_notification');
		echo $this->Form->input('is_changing_order_notification');
		echo $this->Form->input('is_active');
		echo $this->Form->input('is_anytale');
		echo $this->Form->input('recommendation_count');
		echo $this->Form->input('review_count');
		echo $this->Form->input('gift_tournament_id');
		echo $this->Form->input('start_game');
		echo $this->Form->input('last_level');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Players'), array('action' => 'index')); ?></li>
	</ul>
</div>
