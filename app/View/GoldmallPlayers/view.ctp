<div class="goldmallPlayers view">
<h2><?php  echo __('Goldmall Player'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($goldmallPlayer['GoldmallPlayer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Goldmall Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($goldmallPlayer['GoldmallItem']['name'], array('controller' => 'goldmall_items', 'action' => 'view', $goldmallPlayer['GoldmallItem']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player'); ?></dt>
		<dd>
			<?php echo $this->Html->link($goldmallPlayer['Player']['nickname'], array('controller' => 'players', 'action' => 'view', $goldmallPlayer['Player']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Submit Count'); ?></dt>
		<dd>
			<?php echo h($goldmallPlayer['GoldmallPlayer']['submit_count']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Winner'); ?></dt>
		<dd>
			<?php echo h($goldmallPlayer['GoldmallPlayer']['is_winner']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($goldmallPlayer['GoldmallPlayer']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($goldmallPlayer['GoldmallPlayer']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Goldmall Player'), array('action' => 'edit', $goldmallPlayer['GoldmallPlayer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Goldmall Player'), array('action' => 'delete', $goldmallPlayer['GoldmallPlayer']['id']), null, __('Are you sure you want to delete # %s?', $goldmallPlayer['GoldmallPlayer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Goldmall Players'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Goldmall Player'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Goldmall Items'), array('controller' => 'goldmall_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Goldmall Item'), array('controller' => 'goldmall_items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
