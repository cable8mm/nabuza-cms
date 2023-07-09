<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Set Winner Choosed Manually'); ?></legend>
<div class="adminSearchBox">
플래이어 번호를 중복으로 입력하실 수 있습니다. (예, "243, 53, 1345")<br />
is_update를 체크하면 기존에 넣었던 플래이어가 있어도 지우지 않습니다.
</div>
<?php if (!empty($players)):?>
<div class="adminSearchBox">
<?php echo '총 당첨자 수 : '.count($players).'명<br />'?>
<?php foreach($players as $player) {
echo ' ['.$player['Player']['id'].'-'.$player['Player']['nickname'].'] ';	
}?>
</div>
<?php endif;?>
<?php
		echo $this->Form->input('players', array('type'=>'textarea'));
		echo $this->Form->input('is_update', array('type'=>'checkbox'));
		echo $this->Form->input('is_checked', array('type'=>'hidden', 'default'=>false));
	?>
	</fieldset>
<?php if ($isChecked == true):?>
<div class="adminSearchBox">
입력하신 당첨자가 아래 사람이 맞는지 확인하세요.<br />
<?php foreach($players as $player):?>
<?php echo $player['Player']['id']-$player['Player']['nickname']?> /
<?php endforeach;?>
</div>
<?php endif;?>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Events'), array('action' => 'index')); ?></li>
	</ul>
</div>
