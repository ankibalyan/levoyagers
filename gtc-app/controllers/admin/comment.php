<?php
class Comment extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('comment_m');
	}
	public function index($id=NULL)
	{
		//Fetch all comments
		$this->data['comments']=$this->comment_m->get_with_join($id=NULL,$single=NULL);
		//Load the comments view
		$this->data['subview']= 'admin/comment/index';
		$this->load->view('admin/_layout_main',$this->data);
	}

	public function edit($id = NULL)
	{	//fetch a comment or set a new one
		if($id)
		{
			$this->data['comment']=$this->comment_m->get($id,TRUE);
			count($this->data['comment']) || $this->data['error'][] = 'comment could not be found';
		}
		else
		{
			$this->data['error'][] = 'You have not selected any Comment';
		}
		
		//setup the form
		$rules=$this->comment_m->_rules;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE && !$this->data['error'])
		{
			$data = $this->comment_m->array_from_post(array('comment','approved','post_id'));
			$data['user_id'] = $this->data['uid'];
			$this->comment_m->save($data,$id);
			redirect('admin/comment');
			
		}
		//load edit view
		$this->data['subview']= 'admin/comment/edit';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function delete($id = NULL)
	{
		$this->comment_m->delete($id);
		redirect('admin/comment');
	}
}