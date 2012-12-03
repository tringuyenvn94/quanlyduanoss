<?php
//$this->db->query("SET NAMES 'utf8'");
mysql_query("SET NAMES 'utf8'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title?></title>
<link href="<?php echo base_url()?>publics/css/main.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?php echo base_url()?>publics/js/menu.js"></script>
</head>

<?php
$this->load->view('header');
$this->load->view('left');
$this->load->view('home');
$this->load->view('footer');
?>