<h2><?php echo $title?></h2>
<?php
if(isset($thongbao))
{
	echo "<div class='error_text'>".$thongbao."</div><br>";
	//$base_url=base_url();
	echo anchor(base_url(), 'Quay lại trang chủ');
}
else
{
?>
	<?php
	echo validation_errors('<div class="error_text">', '</div>');
	echo form_open('index.php/dangky');
	?>
	<div class="boxtrai">Họ tên: </div>
	<div class="boxphai">
	  <input name="hoten" type="text" id="hoten" size="30" value="<?php echo set_value('hoten')?>">(*)
	</div>
	<div class="boxtrai">Email: </div>
	<div class="boxphai">
	  <input name="email" type="text" id="email" size="30" value="<?php echo set_value('email')?>">(*)
	</div>
	<div class="boxtrai">Password: </div>
	<div class="boxphai">
	  <input name="password" type="password" id="password" size="30" value="<?php echo set_value('password')?>">(*)
	</div>
	<div class="boxtrai">Nhập lại password: </div>
	<div class="boxphai">
	  <input name="re_password" type="password" id="re_password" size="30" value="<?php echo set_value('re_password')?>">(*)
	</div>
	<div class="boxtrai">Địa chỉ: </div>
	<div class="boxphai">
	  <textarea name="diachi" cols="27" id="diachi"><?php echo set_value('diachi')?></textarea>
	  (*)
	</div>
	<div class="boxtrai">Điện thoại: </div>
	<div class="boxphai">
	  <input name="dienthoai" type="password" id="dienthoai" size="30" value="<?php echo set_value('dienthoai')?>">(*)
	</div>
	<div class="boxtrai"></div>
	<div class="boxphai">
	  <input type="submit" name="dangky" value="Đăng Ký">
	</div>
	</form>
<?php
}
?>


