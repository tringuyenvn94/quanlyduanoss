<?php
class Mproducts extends Model
{
	function Mproducts()
	{
		parent::Model();
	}
	
	function getAllProducts($subcat_id='', $num=0, $page_current, &$total)
	{
		$data=array();
		if($subcat_id <> '')
		{
			$sql="select * from products
					where products_display=1
					and products_catid='$subcat_id'
					limit $page_current, $num";
			$sql2="select products_id from products
					where products_display=1
					and products_catid='$subcat_id'";
			$re2=$this->db->query($sql2);
			$total=$re2->num_rows();				
		}
		else
		{
			$sql="select * from products
					where products_display=1";
		}			
		$re=$this->db->query($sql);		
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
	
	function getProduct($pro_id)
	{
		$data=array();
		$this->db->where('products_display', 1);
		$this->db->where('products_id', $pro_id);
		$this->db->limit(1);
		$re=$this->db->get('products');
		if($re->num_rows()>0)
		{
			$data=$re->row_array();
		}
		$re->free_result();
		return $data;
	}
}
?>