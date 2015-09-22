<?php
class Location extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('location_m');
	}
	public function index()
	{
		//Fetch all locations
		$this->data['locations']=$this->location_m->get_with_join();
		//Load the locations view
		$this->data['subview']= 'admin/location/index';
		$this->load->view('admin/_layout_main',$this->data);
	}

	public function edit($id = NULL)
	{	//fetch a location or set a new one
		if($id)
		{
			$this->data['location']=$this->location_m->get_with_join($id,TRUE);
			count($this->data['location']) || $this->data['error'][] = 'location could not be found';
		}
		else
		{
			$this->data['location'] = $this->location_m->get_new();
		}
		
		//setup the form
		$rules=$this->location_m->_rules;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE)
		{
			$data = $this->location_m->array_from_post(array('title','slug','description','image','country','active','featured'));
			$this->location_m->save($data,$id);
			redirect('admin/location');
			
		}
		//load edit view
		$this->data['subview']= 'admin/location/edit';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function delete($id = NULL)
	{
		$this->location_m->delete($id);
		redirect('admin/location');
	}
}