<?php
class Post extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('post_m');
	}
	public function index()
	{
		//Fetch all posts
		$this->data['posts']=$this->post_m->get();
		//Load the posts view
		$this->data['subview']= 'admin/post/index';
		$this->load->view('admin/_layout_main',$this->data);
	}

	public function edit($id = NULL)
	{	//fetch a post or set a new one
		if($id)
		{
			$this->data['post']=$this->post_m->get($id,TRUE);
			count($this->data['post']) || $this->data['error'][] = 'post could not be found';
		}
		else
		{
			$this->data['post'] = $this->post_m->get_new();
		}
		
		//setup the form
		$rules=$this->post_m->_rules;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE)
		{
			$data = $this->post_m->array_from_post(array('title','image','post','pub_date'));
			$data['user_id'] = $this->data['uid'];
			$this->post_m->save($data,$id);
			redirect('admin/post');
		}
		//load edit view
		$this->data['subview']= 'admin/post/edit';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function delete($id = NULL)
	{
		$this->post_m->delete($id);
		redirect('admin/post');
	}
}