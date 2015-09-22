<?php
class Article extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->data['recent_news']=$this->article_m->get_recent();
	}
	public function index($id, $slug)
	{
		//Fetch all articles
		$this->article_m->set_published();
		$this->data['article']=$this->article_m->get($id);
		add_meta_title($this->data['article']->title);
		//Return 404 if not found
		count($this->data['article']) || show_404(uri_string());
		
		//redirect if slug incorrect
		$requested_slug = $this->uri->segment(3);
		$set_slug = $this->data['article']->slug;
		if($requested_slug != $set_slug)
		{
			redirect('article/'.$this->data['article']->id . '/' . $this->data['article']->slug,'location','301');
		}
		//Load the articles view
		$this->data['subview']= 'article';
//		$this->data['subview'] = $this->data['page']->template;
		$this->load->view('_layout_main',$this->data);
	}
}