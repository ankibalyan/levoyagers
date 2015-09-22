<?php
class Frontend_Controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(FALSE);
		$this->load->helper('form');
		$this->load->library('form_validation');
		//load model
		$this->load->model('page_m');
		$this->load->model('article_m');
		$this->load->model('package_m');
		$this->load->model('post_m');
		//fetch Navigation Menu
		$this->data['top_menu'] = $this->page_m->get_nested('top');
		$this->data['side_menu'] = $this->page_m->get_nested('side');	
		$this->data['bottom_menu'] = $this->page_m->get_nested('top');	
		
		$this->data['news_archive_link'] = $this->page_m->get_archive_link();

		$this->db->select('value')->where(array('title'=>'_wc_site_name','status'=>1));
		$option = $this->db->get('settings')->row();
		if(count($option)) $this->data['meta_title']=$option->value;
		else $this->data['meta_title']=config_item('site_name');
		$this->data['meta_site'] = $this->data['meta_title'];

		$this->db->select('value')->where(array('title'=>'_wc_site_tagline','status'=>1));
		$option = $this->db->get('settings')->row();
		if(count($option)) $this->data['meta_tagline']=$option->value;
		else $this->data['meta_tagline']=config_item('meta_tagline');

		$this->db->select('value')->where(array('title'=>'_wc_site_description','status'=>1));
		$option = $this->db->get('settings')->row();
		if(count($option)) $this->data['meta_description']=$option->value;
		else $this->data['meta_description']=config_item('meta_description');

		$this->db->select('value')->where(array('title'=>'_wc_site_address','status'=>1));
		$option = $this->db->get('settings')->row();
		if(count($option)) $this->data['meta_addresses']=$option->value;
		else $this->data['meta_addresses']=config_item('meta_addresses');
		$this->data['meta_addresses'] = explode(',', $this->data['meta_addresses']);

		$this->db->select('value')->where(array('title'=>'_wc_site_email','status'=>1));
		$option = $this->db->get('settings')->row();
		if(count($option)) $this->data['meta_emails']=$option->value;
		else $this->data['meta_emails']=config_item('meta_emails');
		$this->data['meta_emails'] = explode(',', $this->data['meta_emails']);
	}	
} 
                            