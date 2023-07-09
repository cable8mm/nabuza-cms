<style>
.coin {
	background-image:url('/img/coin_effect.png');
	position:absolute;
	width:80px;
	height:80px;
}
.green {
	background-position:0 0;
}
.yellow {
	background-position:-80px 0;
}
.red {
	background-position:-160px 0;
}
.blue {
	background-position:-240px 0;
}
.pupple {
	background-position:-320px 0;
}
.palette_choiced {
	background-color:white;
}
</style>
<div style="width:100%;height:100%;background-image:url(/img/bg.png);">
<?php
$coinStyles[0]	= 'green';
$coinStyles[1]	= 'yellow';
$coinStyles[2]	= 'red';
$coinStyles[3]	= 'blue';
$coinStyles[4]	= 'pupple';
?>
<div style="background-color:grey">
한 색깔로 갈맞춤 : 
<?php for ($i=0;$i<count($coinStyles);$i++):?>
<a href="/premium_coinsets/all_change/<?php echo $coinsetId;?>/palette_color:<?php echo $paletteColor;?>/all_color:<?php echo $i;?>">
<div style="top:20px;left:<?php echo 80+$i*80?>px;" class="coin <?php echo $coinStyles[$i];?>
"></div></a>
<?php endfor;?>
</div>

<div style="background-color:grey; margin-top:80px">
팔레트 선택 : 
<?php for ($i=0;$i<count($coinStyles);$i++):?>
<a href="/premium_coinsets/custom/<?php echo $coinsetId;?>/palette_color:<?php echo $i;?>">
<div style="top:130px;left:<?php echo 80+$i*80?>px;" class="coin <?php echo $coinStyles[$i];?>
<?php 
if ($paletteColor == $i)
	echo ' palette_choiced';
?>
"></div></a>
<?php endfor;?>
</div>
<div style="clear:both"></div>
<div style="background-color:grey;margin-top:100px;">
코인 그리드
</div>
<?php for ($i=0;$i<count($coinsetOrders);$i++):?>
<?php
// 왼쪽 하단에서 위로 올라가면서 키가 올라가는 형식이라 함.
$totalColumnCount	= 7;
$totalRowCount	= ceil(count($coinsetOrders) / $totalColumnCount);
$currentRowCount	= $totalColumnCount - ($i % $totalColumnCount) - 1;
$currentColumnCount	= floor($i / $totalColumnCount);
$currentCoinColor	= $coinsetOrders[$i];
$currentCoinStyle	= $coinStyles[$currentCoinColor];
?>
<a href="/premium_coinsets/change/<?php echo $coinsetId;?>/order:<?php echo $i?>/palette_color:<?php echo $paletteColor;?>">
<div style="top:<?php echo 240+$currentRowCount*80;?>px;left:<?php echo 0+$currentColumnCount*80?>px;" class="coin <?php echo $currentCoinStyle?>">
</div>
</a>
<?php endfor;?>

</div>