<?php
class Package extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('package_m');
	}
	public function index()
	{
		//Fetch all packages
		$this->data['packages'] = $this->package_m->get_with_join();
		//Load the packages view
		$this->data['subview']= 'admin/package/index';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function edit($id = NULL)
	{	
		$uemail = $this->session->userdata('email'); 
		$uname = $this->session->userdata('name');
		$uid = $this->session->userdata('id');
		
		//fetch a package or set a new one
		if($id)
		{
			$this->data['package']=$this->package_m->get_with_join($id,TRUE);
			count($this->data['package']) || $this->data['error'][] = 'package could not be found';
		}
		else
		{
			$this->data['package'] = $this->package_m->get_new();
		}
		
		//Package for drop Down
		$this->load->model('location_m');
		$this->data['locations'] = $this->location_m->get_in_array();
		$this->load->model('category_m');
		$this->data['categorys'] = $this->category_m->get_in_array();
		$this->load->model('hotel_m');
		$this->data['hotels'] = $this->hotel_m->get_in_array();
		$this->load->model('scheme_m');
		$this->data['schemes'] = $this->scheme_m->get_in_array();
		$this->load->model('transport_m');
		$this->data['transports'] = $this->transport_m->get_in_array();

		//setup the form
		$rules=$this->package_m->_rules;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE)
		{
			$data = $this->package_m->array_from_post(array('title','slug','description','image','active','featured','price','pub_date','start_date','end_date','location_id','category_id','hotel_id','scheme_id','transport_id'));
			$id || $data['user_id'] = $uid;
			//dump($data);
			$this->package_m->save($data,$id);
			redirect('admin/package');
			
		}
		//load edit view
		$this->data['subview']= 'admin/package/edit';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function delete($id = NULL)
	{
		$this->package_m->delete($id);
		redirect('admin/package');
	}
}