<div class="purchasings index">
	<h2><?php echo __('Purchasings'); ?></h2>
<?php echo $this->Form->create('Purchasing', array('action'=>'index','type'=>'get'))?>
<div class="adminSearchBox">
<span style="font-weight:bold">검색 :</span>
<span style="font-weight:bold">%<?php echo __('Phone Number')?>% </span><?php echo $this->Form->text('Player.phone_number')?>&nbsp;
<span style="font-weight:bold"><?php echo __('Appid')?> </span><?php echo $this->Form->text('Player.appid')?>&nbsp;
<span style="font-weight:bold">%<?php echo __('Nickname')?>% </span><?php echo $this->Form->text('Player.nickname')?>&nbsp;
<span style="font-weight:bold"><?php echo __('Is Anytale')?> </span><?php echo $this->Form->select('Player.is_anytale', $isAnytales)?>&nbsp;
<input type="submit" name="submit" value="검색" />
<input type="button" value="전체보기" onclick="location.href='<?php echo $this->Html->url(array('controller'=>'players', 'action'=>'index'));?>'" />
</div>
<?php echo $this->Form->end() ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('player_id'); ?></th>
			<th><?php echo $this->Paginator->sort('Player.phone_number'); ?></th>
			<th><?php echo $this->Paginator->sort('Player.appid'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('method'); ?></th>
			<th><?php echo $this->Paginator->sort('buyed'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
	</tr>
	<?php foreach ($purchasings as $purchasing): ?>
	<tr>
		<td><?php echo h($purchasing['Purchasing']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $purchasing['Player']['id']; ?> / <?php echo $purchasing['Player']['nickname']; ?>
		</td>
		<td>
			<?php echo $purchasing['Player']['phone_number']; ?>
		</td>
		<td>
			<?php echo $purchasing['Player']['appid']; ?>
		</td>
		<td>
			<?php echo $purchasing['Product']['name']; ?>
		</td>
		<td><?php echo h($purchasing['Purchasing']['method']); ?>&nbsp;</td>
		<td><?php echo h($purchasing['Purchasing']['buyed']); ?>&nbsp;</td>
		<td><?php echo h($purchasing['Purchasing']['created']); ?>&nbsp;</td>
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
	</ul>
</div>
