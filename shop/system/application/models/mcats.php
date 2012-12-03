<?php
class Mcats extends Model
{
	function Mcats()
	{
		parent::Model();
	}
	
	function getAllCats()
	{
		$data=array();
		$this->db->where('cat_display', 1);
		$this->db->orderby('cat_order', 'asc');
		$re=$this->db->get('cat');
		if($re->num_rows()>0)
		{
			foreach($re->result_array() as $row)
			{
				$data[]=$row;
			}
		}
		$re->free_result();
		return $data;
	}
	
	function getAllSubcats($catid)
	{
		$data=array();
		$this->db->where('subcat_display', 1);
		$this->db->where('cat_id', $catid);
		$this->db->orderby('subcat_order', 'asc');
		$re=$this->db->get('subcat');
		if($re->num_rows()>0)
		{
			foreach($re->result_array() as $row)
			{
				$data[]=$row;
			}
		}
		$re->free_result();
		return $data;
	}
	
	function getSubcat($subcat_id)
	{
		$data=array();
		$this->db->where('subcat_display', 1);
		$this->db->where('subcat_id', $subcat_id);
		$re=$this->db->get('subcat');
		if($re->num_rows()>0)
		{
			$data=$re->row_array();
		}
		$re->free_result();
		return $data;
	}

} 
?>