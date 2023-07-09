<div class="players index">
	<h2><?php echo __('Player Statistics'); ?></h2>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Year-Month-Day</th>
			<th>Regist Player Count (Korean / Foreigner)</th>
			<th>Activated Player (Korean / Foreigner) Count</th>
			</tr>
	<?php
	foreach ($result as $k => $playerStatistic): ?>
	<tr>
		<td><?php echo h($k); ?>&nbsp;</td>
		<td><?php echo h($playerStatistic['total']); ?>&nbsp;(<?php echo h($playerStatistic['total_korean']); ?> / <?php echo h($playerStatistic['total_foreigner']); ?>)</td>
		<td><?php echo h($playerStatistic['activated']); ?>&nbsp;(<?php echo h($playerStatistic['activated_korean']); ?> / <?php echo h($playerStatistic['activated_foreigner']); ?>)</td>
		</tr>
<?php endforeach; ?>
	</table>
</div>
