<?php
class Transport extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transport_m');
	}
	public function index()
	{
		//Fetch all transports
		$this->data['transports']=$this->transport_m->get_with_join();
		//Load the transports view
		$this->data['subview']= 'admin/transport/index';
		$this->load->view('admin/_layout_main',$this->data);
	}

	public function edit($id = NULL)
	{	//fetch a transport or set a new one
		if($id)
		{
			$this->data['transport']=$this->transport_m->get_with_join($id,TRUE);
			count($this->data['transport']) || $this->data['error'][] = 'transport could not be found';
		}
		else
		{
			$this->data['transport'] = $this->transport_m->get_new();
		}
		
		//setup the form
		$rules=$this->transport_m->_rules;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE)
		{
			$data = $this->transport_m->array_from_post(array('title','slug','description','image','active','featured'));
			$this->transport_m->save($data,$id);
			redirect('admin/transport');
			
		}
		//load edit view
		$this->data['subview']= 'admin/transport/edit';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function delete($id = NULL)
	{
		$this->transport_m->delete($id);
		redirect('admin/transport');
	}
}