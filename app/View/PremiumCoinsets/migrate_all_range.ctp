<div class="coinsets form">
<?php echo $this->Form->create('Coinset'); ?>
	<fieldset>
		<legend><?php echo __('Rearrange All Coinsets'); ?></legend>
<div class="adminSearchBox">
2013년 6월 14일 모든 코인셋을 재배치 합니다.<br />
Is Active를 체크하고 버튼을 누르시면 진행되며, 이 작업은 취소될 수 없습니다.
</div>
		<?php
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('모든 코인 재정렬')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Coinsets'), array('action' => 'index')); ?></li>
	</ul>
</div>
