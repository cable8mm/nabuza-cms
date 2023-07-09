<div class="coinsetOrders index">
	<h2><?php echo __('Coinset Orders'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('coinset_id'); ?></th>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th><?php echo $this->Paginator->sort('coin_color'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($coinsetOrders as $coinsetOrder): ?>
	<tr>
		<td><?php echo h($coinsetOrder['CoinsetOrder']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($coinsetOrder['Coinset']['title'], array('controller' => 'coinsets', 'action' => 'view', $coinsetOrder['Coinset']['id'])); ?>
		</td>
		<td><?php echo h($coinsetOrder['CoinsetOrder']['order']); ?>&nbsp;</td>
		<td><?php echo h($coinsetOrder['CoinsetOrder']['coin_color']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $coinsetOrder['CoinsetOrder']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $coinsetOrder['CoinsetOrder']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $coinsetOrder['CoinsetOrder']['id']), null, __('Are you sure you want to delete # %s?', $coinsetOrder['CoinsetOrder']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Coinset Order'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Coinsets'), array('controller' => 'coinsets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coinset'), array('controller' => 'coinsets', 'action' => 'add')); ?> </li>
	</ul>
</div>
