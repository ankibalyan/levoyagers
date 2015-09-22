<?php
class Product extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_m');
	}
	public function index()
	{
		//Fetch all products
		$this->data['products']=$this->product_m->get();
		$this->data['customers']=$this->user_m->get_users();
		//Load the products view
		$this->data['subview']= 'admin/product/index';
		$this->load->view('admin/_layout_main',$this->data);
	}

	public function edit($id = NULL)
	{	//fetch a product or set a new one
		if($id)
		{
			$this->data['product']=$this->product_m->get($id,TRUE);
			count($this->data['product']) || $this->data['error'][] = 'product could not be found';
		}
		else
		{
			$this->data['product'] = $this->product_m->get_new();
		}
		$this->data['customers']=$this->user_m->get_users();
		//setup the form
		$rules=$this->product_m->_rules;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE)
		{
			$data = $this->product_m->array_from_post(array('title','description','image','price','option_name','option_values','user_id'));
			//$data['user_id'] = $this->data['uid'];
			$this->product_m->save($data,$id);
			redirect('admin/product');
		}
		//load edit view
		$this->data['subview']= 'admin/product/edit';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function delete($id = NULL)
	{
		$this->product_m->delete($id);
		redirect('admin/product');
	}
}