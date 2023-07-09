<?php 
$this->Html->script('jquery.popupWindow.js', array('inline' => false));
?>
<?php 
$this->Html->scriptBlock('
$.fn.popupWindow.defaultSettings = {
            centerBrowser:0, // center window over browser window? {1 (YES) or 0 (NO)}. overrides top and left
            centerScreen:0, // center window over entire screen? {1 (YES) or 0 (NO)}. overrides top and left
            height:500, // sets the height in pixels of the window.
            left:0, // left position when the window appears.
            location:0, // determines whether the address bar is displayed {1 (YES) or 0 (NO)}.
            menubar:0, // determines whether the menu bar is displayed {1 (YES) or 0 (NO)}.
            resizable:0, // whether the window can be resized {1 (YES) or 0 (NO)}. Can also be overloaded using resizable.
            scrollbars:0, // determines whether scrollbars appear on the window {1 (YES) or 0 (NO)}.
            status:0, // whether a status line appears at the bottom of the window {1 (YES) or 0 (NO)}.
            width:500, // sets the width in pixels of the window.
            windowName:null, // name of window set from the name attribute of the element that invokes the click
            windowURL:null, // url used for the popup
            top:0, // top position when the window appears.
            toolbar:0 // determines whether a toolbar (includes the forward and back buttons) is displayed {1 (YES) or 0 (NO)}.
        };
		$(document).ready(function() {
$(".popup").popupWindow({ 
    height:960,  
   width:480, 
   top:50, 
   left:50 
})
		});;
',array('inline'=>false));
?>
<div class="notices index">
	<h2><?php echo __('Notices'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('Language.name'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('started'); ?></th>
			<th><?php echo $this->Paginator->sort('finished'); ?></th>
			<th><?php echo $this->Paginator->sort('is_active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($notices as $notice): ?>
	<tr>
		<td><?php echo h($notice['Notice']['id']); ?>&nbsp;</td>
		<td><?php echo h($notice['Language']['name']); ?>&nbsp;</td>
		<td><?php echo h($notice['Notice']['title']); ?>&nbsp;</td>
		<td><?php echo h($notice['Notice']['started']); ?>&nbsp;</td>
		<td><?php echo h($notice['Notice']['finished']); ?>&nbsp;</td>
		<td><?php echo h($notice['Notice']['is_active']); ?>&nbsp;</td>
		<td><?php echo h($notice['Notice']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $notice['Notice']['id'])); ?>
			<?php //echo $this->Html->link(__('Preview'), array('action' => 'preview', $notice['Notice']['id']), array('class'=>'popup')); ?>
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
		<li><?php echo $this->Html->link(__('New Notice'), array('action' => 'add')); ?></li>
	</ul>
</div>
