<?php
class Package extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->data['recent_news']=$this->package_m->get_recent();
	}
	public function index($id, $slug)
	{
		//Fetch all packages
		$this->package_m->set_published();
		$this->data['package']=$this->package_m->get_with_join($id,TRUE);
		add_meta_title($this->data['package']->title);
		//Return 404 if not found
		count($this->data['package']) || show_404(uri_string());
		
		//redirect if slug incorrect
		$requested_slug = $this->uri->segment(3);
		$set_slug = $this->data['package']->slug;
		if($requested_slug != $set_slug)
		{
			redirect('package/'.$this->data['package']->id . '/' . $this->data['package']->slug,'location','301');
		}
		//Load the packages view
		$this->data['subview']= 'package';
//		$this->data['subview'] = $this->data['page']->template;
		$this->load->view('_layout_main',$this->data);
	}
}