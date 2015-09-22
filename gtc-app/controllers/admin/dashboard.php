<?php 
class Dashboard extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index(){
		$this->load->model('article_m');
		//fetch recently moidified articles
		$this->db->order_by('modified desc');
		$this->db->limit(5);
		$this->data['recent_articles']=$this->article_m->get();
	
		$this->data['subview']= 'admin/dashboard/index';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function modal(){
		$this->data['subview']= 'admin/components/page_head';
		$this->load->view('admin/_layout_modal',$this->data);
	}
}
