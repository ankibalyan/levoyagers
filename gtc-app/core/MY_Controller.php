<?php 
class MY_Controller extends CI_Controller{
	public $data=array();
	public function __construct() {
		parent::__construct();
		$this->data['errors']=array();
		$this->data['site_name']= config_item('site_name');
		$this->data['role'] = $this->session->userdata('access'); 
		$this->load->model('user_m');
		$this->load->model('media_m');
		$this->data['media']=$this->media_m->get(1,TRUE);
		$this->data['uid'] = $this->session->userdata('id');
	}
}