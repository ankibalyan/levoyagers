<?php
class Testimony extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('testimony_m');
	}
	public function index($id=NULL)
	{
		//Fetch all testimonys
		$this->data['testimonys']=$this->testimony_m->get($id=NULL,$single=NULL);
		//Load the testimonys view
		$this->data['subview']= 'admin/testimony/index';
		$this->load->view('admin/_layout_main',$this->data);
	}

	public function edit($id = NULL)
	{	//fetch a testimony or set a new one
		if($id)
		{
			$this->data['testimony']=$this->testimony_m->get($id,TRUE);
			count($this->data['testimony']) || $this->data['error'][] = 'testimony could not be found';
		}
		else
		{
			//$this->data['error'][] = 'You have not selected any Comment';
		}
		
		//setup the form
		$rules=$this->testimony_m->_rules;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE && !$this->data['error'])
		{
			$data = $this->testimony_m->array_from_post(array('comment','name','place','approved'));
			$this->testimony_m->save($data,$id);
			redirect('admin/testimony');
			
		}
		//load edit view
		$this->data['subview']= 'admin/testimony/edit';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function delete($id = NULL)
	{
		$this->testimony_m->delete($id);
		redirect('admin/testimony');
	}
}