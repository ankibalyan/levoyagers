<?php
class Scheme extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('scheme_m');
	}
	public function index()
	{
		//Fetch all schemes
		$this->data['schemes']=$this->scheme_m->get_with_join();
		//Load the schemes view
		$this->data['subview']= 'admin/scheme/index';
		$this->load->view('admin/_layout_main',$this->data);
	}

	public function edit($id = NULL)
	{	//fetch a scheme or set a new one
		if($id)
		{
			$this->data['scheme']=$this->scheme_m->get_with_join($id,TRUE);
			count($this->data['scheme']) || $this->data['error'][] = 'scheme could not be found';
		}
		else
		{
			$this->data['scheme'] = $this->scheme_m->get_new();
		}
		
		//setup the form
		$rules=$this->scheme_m->_rules;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE)
		{
			$data = $this->scheme_m->array_from_post(array('title','slug','description','image','active','featured'));
			$this->scheme_m->save($data,$id);
			redirect('admin/scheme');
			
		}
		//load edit view
		$this->data['subview']= 'admin/scheme/edit';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function delete($id = NULL)
	{
		$this->scheme_m->delete($id);
		redirect('admin/scheme');
	}
}