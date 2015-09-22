<?php
class Category extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_m');
	}
	public function index()
	{
		//Fetch all categorys
		$this->data['categorys']=$this->category_m->get_with_join();
		//Load the categorys view
		$this->data['subview']= 'admin/category/index';
		$this->load->view('admin/_layout_main',$this->data);
	}

	public function edit($id = NULL)
	{	//fetch a category or set a new one
		if($id)
		{
			$this->data['category']=$this->category_m->get_with_join($id,TRUE);
			count($this->data['category']) || $this->data['error'][] = 'category could not be found';
		}
		else
		{
			$this->data['category'] = $this->category_m->get_new();
		}
		
		//Category for drop Down
		$where = array('parent_id'=>0);
		$this->data['category_no_parents'] = $this->category_m->get_in_array(NULL,$where);
//		dump($this->data['category_no_parents']);

		//setup the form
		$rules=$this->category_m->_rules;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE)
		{
			$data = $this->category_m->array_from_post(array('title','slug','description','image','active','featured','parent_id'));
//			dump($data);
			$this->category_m->save($data,$id);
			redirect('admin/category');
			
		}
		//load edit view
		$this->data['subview']= 'admin/category/edit';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function delete($id = NULL)
	{
		$this->category_m->delete($id);
		redirect('admin/category');
	}
}