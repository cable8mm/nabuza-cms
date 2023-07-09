<div class="coinsets view">
<h2>코인폭탄</h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coinset['Coinset']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($coinset['Coinset']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($coinset['Coinset']['is_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($coinset['Coinset']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($coinset['Coinset']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Coinset'), array('action' => 'edit', $coinset['Coinset']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Coinset'), array('action' => 'delete', $coinset['Coinset']['id']), null, __('Are you sure you want to delete # %s?', $coinset['Coinset']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Coinsets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coinset'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Coinset Orders'), array('controller' => 'coinset_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coinset Order'), array('controller' => 'coinset_orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Coinset Orders'); ?></h3>
	<?php if (!empty($coinset['CoinsetOrder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Coinset Id'); ?></th>
		<th><?php echo __('Order'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($coinset['CoinsetOrder'] as $coinsetOrder): ?>
		<tr>
			<td><?php echo $coinsetOrder['id']; ?></td>
			<td><?php echo $coinsetOrder['coinset_id']; ?></td>
			<td><?php echo $coinsetOrder['order']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'coinset_orders', 'action' => 'view', $coinsetOrder['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'coinset_orders', 'action' => 'edit', $coinsetOrder['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'coinset_orders', 'action' => 'delete', $coinsetOrder['id']), null, __('Are you sure you want to delete # %s?', $coinsetOrder['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Coinset Order'), array('controller' => 'coinset_orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
