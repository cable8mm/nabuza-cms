<div class="coinsetOrders view">
<h2><?php  echo __('Coinset Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coinsetOrder['CoinsetOrder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coinset'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coinsetOrder['Coinset']['title'], array('controller' => 'coinsets', 'action' => 'view', $coinsetOrder['Coinset']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($coinsetOrder['CoinsetOrder']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coin Color'); ?></dt>
		<dd>
			<?php echo h($coinsetOrder['CoinsetOrder']['coin_color']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Coinset Order'), array('action' => 'edit', $coinsetOrder['CoinsetOrder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Coinset Order'), array('action' => 'delete', $coinsetOrder['CoinsetOrder']['id']), null, __('Are you sure you want to delete # %s?', $coinsetOrder['CoinsetOrder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Coinset Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coinset Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Coinsets'), array('controller' => 'coinsets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coinset'), array('controller' => 'coinsets', 'action' => 'add')); ?> </li>
	</ul>
</div>
