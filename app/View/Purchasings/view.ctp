<div class="purchasings view">
<h2><?php  echo __('Purchasing'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($purchasing['Purchasing']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchasing['Player']['nickname'], array('controller' => 'players', 'action' => 'view', $purchasing['Player']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchasing['Product']['name'], array('controller' => 'products', 'action' => 'view', $purchasing['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Buyed'); ?></dt>
		<dd>
			<?php echo h($purchasing['Purchasing']['buyed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($purchasing['Purchasing']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Purchasing'), array('action' => 'edit', $purchasing['Purchasing']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Purchasing'), array('action' => 'delete', $purchasing['Purchasing']['id']), null, __('Are you sure you want to delete # %s?', $purchasing['Purchasing']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchasings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchasing'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
