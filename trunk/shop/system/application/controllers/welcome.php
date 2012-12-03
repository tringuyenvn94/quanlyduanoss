<?php
class Welcome extends Controller
{
	public $data;
	function Welcome()
	{
		parent::Controller();
		$this->load->library('cart');
		$this->load->helper('dv_helper');
		$this->data['cats']=$this->Mcats->getAllCats();
		foreach($this->data['cats'] as $cat)
		{
			$this->data['subcats'][]=$this->Mcats->getAllSubCats($cat['cat_id']);
			
		}
	}
	
	function index()
	{
		$this->data['title']='';
		
		$this->data['products']=$this->Mproducts->getAllProducts($subcat_id='', 0, 0, $x);
		$this->data['main']='default';
		$this->load->view('template', $this->data);
	}
	
	function cat()
	{
		$subcat_id=(int)$this->uri->segment(4);	
		$cat_name=$this->uri->segment(2);	
		$subcat_name=$this->uri->segment(3);
		
		$this->data['subcat']=$this->Mcats->getSubcat($subcat_id);
		if(count($this->data['subcat'])>0)
		{
			$this->data['title']=$this->data['subcat']['subcat_name'];
		}
		else
		{
			$this->data['title']="";
		}
		$total='';
		$page_current=(int)$this->uri->segment(5);
		$page_item=3;
		$this->data['products']=$this->Mproducts->getAllProducts($subcat_id, $page_item, $page_current, $total);
		$this->load->library('pagination');
		$config['base_url']	=	base_url();
		$config['cur_page']	=	$page_current;
		$config['total_rows'] 	= $total;
		$config['per_page']			= $page_item;
		$config['uri_segment']=5;
		$this->pagination->initialize($config);
		$this->data['paging']		=	$this->pagination->create_links();
		$this->data['main']="listproducts";
		$this->load->view('template', $this->data);
	}
	
	function login()
	{
		if(isset($_POST['login']) && $_POST['username']!="")
		{
			$u=trim($_POST['username']);
			$p=trim($_POST['password']);
			$user=$this->Musers->verifyUser($u, $p);
			if(count($user)>0)
			{
				$datalog=array(
								'log'=>array(
											'ok'=>TRUE,
											'user_id'=>$user['user_id'],
											'user_name'=>$user['user_name'],
											'user_email'=>$user['user_email']
											)
								);
				$this->session->set_userdata($datalog);				
				
			}
			else
			{
				$this->session->set_flashdata('login_error', 'Sorry, Try again!');
			}
		}
		$base_url=base_url();
		redirect($base_url, 'refresh');
		
	}
	function logout()
	{
		$this->session->unset_userdata('log');
		//unset($_SESSION['log']);
		$this->session->set_flashdata('login_error',"You've been logged out!");
		redirect('index.php/welcome', 'refresh');
	}
	
	function products()
	{
		$pro_id=(int)$this->uri->segment(3);
		
		$this->data['product']=$this->Mproducts->getProduct($pro_id);
		if(count($this->data['product'])>0)
		{
			$this->data['title']=$this->data['product']['products_name'];
		}
		else
		{
			redirect('welcome', 'refresh');
		}	
		//$this->data['main']='product_details';
		$this->load->view('template', $this->data);
		
	}
	
	function dangky()
	{
		
		$this->load->library('form_validation');
		$rules=array(
					array(
						'field'=>'hoten',
						'label'=>'Họ tên',
						'rules'=>'trim|required'
						),
					array(
						'field'=>'email',
						'label'=>'Email',
						'rules'=>'trim|required|valid_email|callback_kiemtra_email'
						),
					array(
						'field'=>'password',
						'label'=>'PassWord',
						'rules'=>'trim|required|alpha_numeric'
						),
					array(
						'field'=>'re_password',
						'label'=>'Re Password',
						'rules'=>'trim|required|matches[password]'
						),
					array(
						'field'=>'diachi',
						'label'=>'Địa Chỉ',
						'rules'=>'required|max_length[200]'
						),
					array(
						'field'=>'dienthoai',
						'label'=>'Điện Thoại',
						'rules'=>'required|is_natural'
						)															
					);
		$this->form_validation->set_rules($rules);	
		if($this->form_validation->run())
		{		
			$this->data['thongbao']="Đăng Ký Thành Công";
			$dt['user_name']=$this->input->post('hoten');
			$dt['user_email']=$this->input->post('email');
			$dt['user_password']=md5($this->input->post('password'));
			$dt['user_phone']=$this->input->post('dienthoai');
			$dt['user_address']=$this->input->post('diachi');
			$this->Musers->addUser($dt);
		}
		
		$this->data['title']='Đăng Ký Thành Viên';
		$this->data['main']='form_dangky';
		$this->load->view('template', $this->data);
	}
	function kiemtra_email($email)
	{
		$kq=$this->Musers->exits_email($email);
		if($kq==FALSE)
		{
			$this->form_validation->set_message('kiemtra_email', 'Email bạn chọn đã có trong CSDL, hãy chọn một email khác!');
			return FALSE;
		}
		else
		return TRUE;
	}
	
	function addcart()
	{
		$pro_id=$this->uri->segment(3);
		$product=$this->Mproducts->getProduct($pro_id);
		if($product)
		{
			$data=array(
						'id'=>$product['products_id'],
						'qty'=>1,
						'price'=>$product['products_price'],
						'name'=>$product['products_name'],
						'hinh'=>$product['products_img']
						);	
			$this->cart->insert($data);	
		}
		redirect('index.php/viewcart', 'refresh');
	}
	
	function viewcart()
	{
		
		$this->data['title']="View Cart";	
		$this->data['main']="view_cart";
		$this->load->view('template', $this->data);
	}
	
	function updatecart()
	{
		for($i=1; $i <= $this->cart->total_items(); $i++)
		{
			$rowid=$i.'rowid';
			$qty=$i.'qty';
			$data[]=array(
					'rowid'=>$_POST[$rowid],
						'qty'=>$_POST[$qty]
						);
		}
		if($_POST)
		{
			$dt=$_POST;
		}
		$this->cart->update($dt);
		
		$this->data['title']="View Cart";	
		$this->data['main']="view_cart";
		$this->load->view('template', $this->data);
		
	}

function lienhe()
{
	$this->data['title']="Liên hệ";	
		$this->data['main']="lienhe";
		$this->load->view('template', $this->data);
	}
}
?>