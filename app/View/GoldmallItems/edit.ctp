<div class="goldmallItems form">
<?php echo $this->Form->create('GoldmallItem'); ?>
	<fieldset>
		<legend><?php echo __('Edit Goldmall Item'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('language_id');
		echo $this->Form->input('important_point');
		echo $this->Form->input('spent_gold');
		echo $this->Form->input('award_jade_count');
		echo $this->Form->input('award_invitation_count');
		echo $this->Form->input('award_gold_count');
		echo $this->Form->input('image_url');
		echo $this->Form->input('winner_image_url');
		echo $this->Form->input('winner_count');
		echo $this->Form->input('submit_count');
		echo $this->Form->input('started');
		echo $this->Form->input('finished');
		echo $this->Form->input('is_auto_winner_choosed');
		echo $this->Form->input('last_winner_choosed');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('GoldmallItem.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('GoldmallItem.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Goldmall Items'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Goldmall Players'), array('controller' => 'goldmall_players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Goldmall Player'), array('controller' => 'goldmall_players', 'action' => 'add')); ?> </li>
	</ul>
</div>
