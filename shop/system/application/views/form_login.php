<?php 
$sslog=$this->session->userdata('log');
if($sslog['ok'])
{
	echo "Welcome ".$sslog['user_name']."<br>";
	echo $sslog['user_email']."<br>";
	echo "<div>";
	echo anchor('index.php/logout', 'Logout');
	echo"</div>";
}
else
{
	echo form_open('index.php/login');
	if($this->session->flashdata('login_error'))
	{
		echo "<div class='error_text'>";
		echo $this->session->flashdata('login_error');
		echo "</div>";
	}
	?>
  Username: 
    <input type="text" name="username">
    <br>
Passworld: 
<input type="password" name="password">
<br>
<div align="center" style="padding-top:5px">
  <input type="submit" name="login" value="Login" title="Login">
</div>
</form>
<?php
}
?>
