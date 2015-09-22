<?php
class Admin_Controller extends MY_Controller
{
	public function __construct() 
	{		
		parent::__construct();
		$this->data['meta_title']= 'WCod Play';
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$exception_uris = array('/login/','/logout/','/register/','/activate/','/resend/','/forget/','/reset_pass/');
		if(in_array($this->uri->slash_segment(3, 'both'), $exception_uris) == FALSE)
		{
			if($this->user_m->loggedin() == FALSE)
			{
				redirect('admin/user/login');	
			}
			if($this->data['role'] && $this->data['role'] =='subscriber')
			redirect('');
		}
		//Login Check
	}	
} 
