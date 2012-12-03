		<td height="5px">
			<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
				<tr>
					<td>
						<div id="topmain" class="noidung" align="center">
							
							<?php $this->load->view($main)?>
						</div>
					</td>
				</tr>
			</table>
		</td>
		
		<td width="175" rowspan="3">
			<div class="noidung" align="center">
			
			<?php echo anchor(base_url()."index.php/viewcart", "Giỏ hàng")?> <br />
			<?php 
			if($this->cart->total_items()>0)
			{
			?>
				Số sản phẩm: <?php echo $this->cart->total_items() ?><br />
				Tổng số tiền: $<?php echo $this->cart->total() ?>
			<?php
			}
			else
			{
				echo "Giỏ hàng rỗng";
			}
			?>
			
			</div>
			<div class="space"></div>
			<div class="noidung" align="center">
			<?php $this->load->view('form_login')?>
			</div>
			<div class="space"></div>
			<div class="noidung" align="center">tim kiem</div>
		</td>
	</tr>
	<tr valign="top">
		<td valign="top">
	  		<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
        		<tr valign="top">
          			<td width="50%" valign="top">
					<div class="noidung"></div>
					</td>
          			<td width="50%" valign="top">
						<div class="noidung" id="play" align="center">
							<?php //include("album.php");?>
						</div>
					</td>
        		</tr>
      		</table>
		</td>
  </tr>
</table>


