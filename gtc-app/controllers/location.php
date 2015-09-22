<?php
class Location extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->data['recent_news']=$this->location_m->get_recent();
		$this->load->model('location_m');
	}
	public function index($id, $slug)
	{
		//Fetch all locations
		//$this->location_m->set_published();
		$this->data['location']=$this->location_m->get_with_join($id,TRUE);
		add_meta_title($this->data['location']->title);
		//Return 404 if not found
		count($this->data['location']) || show_404(uri_string());
		
		//redirect if slug incorrect
		$requested_slug = $this->uri->segment(3);
		$set_slug = $this->data['location']->slug;
		if($requested_slug != $set_slug)
		{
			redirect('location/'.$this->data['location']->id . '/' . $this->data['location']->slug,'location','301');
		}
		//Load the locations view
		$this->data['subview']= 'location';
//		$this->data['subview'] = $this->data['page']->template;
		$this->load->view('_layout_main',$this->data);
	}
}