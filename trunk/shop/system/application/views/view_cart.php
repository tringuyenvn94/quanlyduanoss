<?php
if($this->cart->total())
{
?>
	<?php echo form_open('index.php/updatecart'); ?>
	<table cellpadding="6" cellspacing="1" style="width:100%" border="0">
	<tr>
	  <th width="9%" align="center">Số lượng </th>
	  <th width="44%" align="center">Tên sản phẩm </th>
	  <th width="14%" align="center">Hình sản phẩm </th>
	  <th width="15%" align="right">Đơn giá</th>
	  <th width="18%" align="right">Thành tiền</th>
	</tr>
	
	<?php $i = 1; ?>
	
	<?php foreach($this->cart->contents() as $items): ?>
	
		<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
		
		<tr>
		  <td align="center"><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
		  <td>
			<?php echo anchor(base_url().'welcome/products/'.$items['id'], $items['name']);  ?>
						
				<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
						
					<p>
						<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
							
							<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
										
						<?php endforeach; ?>
					</p>
					
				<?php endif; ?>	  </td>
		  <td align="center"><img src="<?php echo base_url()?>publics/images/products/thumb/<?php echo $items['hinh']?>" width="60" height="60"></td>
		  <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
		  <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
		</tr>
	
	<?php $i++; ?>
	
	<?php endforeach; ?>
	
	<tr>
	  <td colspan="3"> </td>
	  <td align="right" class="right"><strong>Tổng cộng</strong></td>
	  <td align="right" class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
	</tr>
	</table>
	<p><?php echo form_submit('index.php/update', 'Update your Cart'); ?></p>
	<?php echo form_close()?>
	
<?php
}
else
{
	echo "Giỏ Hàng Rỗng!";
}
?>