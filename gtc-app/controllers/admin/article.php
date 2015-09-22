<?php
class Article extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('article_m');
	}
	public function index()
	{
		//Fetch all articles
		$this->data['articles']=$this->article_m->get();
		//Load the articles view
		$this->data['subview']= 'admin/article/index';
		$this->load->view('admin/_layout_main',$this->data);
	}

	public function edit($id = NULL)
	{	//fetch a article or set a new one
		if($id)
		{
			$this->data['article']=$this->article_m->get($id,TRUE);
			count($this->data['article']) || $this->data['error'][] = 'article could not be found';
		}
		else
		{
			$this->data['article'] = $this->article_m->get_new();
		}
		
		//setup the form
		$rules=$this->article_m->_rules;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE)
		{
			$data = $this->article_m->array_from_post(array('title','slug','body','pub_date'));
			$this->article_m->save($data,$id);
			redirect('admin/article');
			
		}
		//load edit view
		$this->data['subview']= 'admin/article/edit';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function delete($id = NULL)
	{
		$this->article_m->delete($id);
		redirect('admin/article');
	}
}