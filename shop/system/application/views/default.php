<?php
if(count($products)>0)
{
	$d=0;
?>
<h2><?php echo $title?></h2>
<table width="100%" cellpadding="0" cellspacing="0" border="1"  bordercolor="#CCCCCC" style="border-collapse:collapse">	
<?php
foreach($products as $row)
{
	if($d%4==0)
	{
	?>
	<tr>
	<?php
	}
?>
<td align="center" valign="bottom" width="25%">
<div style="padding-bottom:10px; padding-top:10px">
<a href="<?php echo link_detail($row['products_id'], $row['products_name'])?>"><img src="<?php echo base_url()?>publics/images/products/thumb/<?php echo $row['products_img']?>" width="60" height="60"/></a><br />
<?php echo anchor(link_detail($row['products_id'], $row['products_name']), $row['products_name'])?><br />
Giá: <?php echo $row['products_price']?> $<br><br>
<a href="<?php echo base_url()?>index.php/addcart/<?php echo remove_tv($row['products_name'])."/".$row['products_id']?>" title="Add to Cart"><img src="<?php echo base_url()?>publics/images/chon_mua.gif "></a>
</div>
</td>
<?php
$d++;
if($d%4==0)
{
?>
</tr>
<?php
}	
}
?>
</table>
<?php
}
else
{
	echo "Đang Cập nhật";
}
?>

