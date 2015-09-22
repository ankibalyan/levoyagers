<?php
class Hotel extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('hotel_m');
	}
	public function index()
	{
		//Fetch all hotels
		$this->data['hotels']=$this->hotel_m->get_with_join();
		//Load the hotels view
		$this->data['subview']= 'admin/hotel/index';
		$this->load->view('admin/_layout_main',$this->data);
	}

	public function edit($id = NULL)
	{	//fetch a hotel or set a new one
		if($id)
		{
			$this->data['hotel']=$this->hotel_m->get_with_join($id,TRUE);
			count($this->data['hotel']) || $this->data['error'][] = 'hotel could not be found';
		}
		else
		{
			$this->data['hotel'] = $this->hotel_m->get_new();
		}
		
		//setup the form
		$rules=$this->hotel_m->_rules;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE)
		{
			$data = $this->hotel_m->array_from_post(array('title','slug','description','image','location_id','active','featured'));
			$this->hotel_m->save($data,$id);
			redirect('admin/hotel');
			
		}
		//load edit view
		$this->data['subview']= 'admin/hotel/edit';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function delete($id = NULL)
	{
		$this->hotel_m->delete($id);
		redirect('admin/hotel');
	}
}