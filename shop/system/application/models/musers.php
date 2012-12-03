<?php
class Musers extends Model
{
	function Musers()
	{
		parent::Model();
	}
	
	function verifyUser($u, $p)
	{
		$data=array();
		$this->db->where('user_name', $u);
		$this->db->where('user_password', md5($p));
		$this->db->limit(1);
		$re=$this->db->get('user');
		if($re->num_rows()>0)
		{
			$data=$re->row_array();
		}
		else
		{
			$this->session->set_flashdata('login_error', 'Sorry, Try again!');
		}
		$re->free_result();
		return $data;
	}
	
	function addUser($dt)
	{
		$this->db->insert('user', $dt);
		$this->db->insert_id();
	}
	
	function exits_email($email)
	{
		$this->db->where('user_email', $email);
		$re=$this->db->get('user');
		if($re->num_rows()>0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
?>