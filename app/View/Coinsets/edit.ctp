<div class="coinsets form">
<?php echo $this->Form->create('Coinset'); ?>
	<fieldset>
		<legend>코인폭탄 수정</legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('코인폭탄 리스트'), array('action' => 'index')); ?></li>
	</ul>
</div>
