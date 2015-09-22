<?php
class Setting extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('setting_m');
	}
	public function index()
	{
		//Fetch all settings
		$this->data['settings']=$this->db->get('settings')->result();
		//Load the settings view
		$this->data['subview']= 'admin/setting/index';
		$this->load->view('admin/_layout_main',$this->data);
	}

	public function save()
	{	
		//setup the form
		$rules=$this->setting_m->_rules;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		//if($this->form_validation->run() == TRUE)
		//{
			//$data = $this->setting_m->array_from_post(array('_wc_site_name','_wc_site_tagline','_wc_site_description','_wc_site_keywords','_wc_site_register','_wc_site_email','_wc_site_mailserver_url','_wc_site_mailserver_login','_wc_site_mailserver_pass','_wc_site_mailserver_port','_wc_site_address','_wc_site_telephone'));
			$keys = trim($this->input->post('fields'));
			$vals = trim($this->input->post('values'));
			$keyArr = explode('|', $keys);
			$valArr = explode('|', $vals);
			$dat = array_combine($keyArr,$valArr);
			foreach ($dat as $key => $value) {
				$new[] = array('title' => $key,'value'=>$value);
			}
			foreach ($new as $item) {
				if(is_array($item))
				{
					$this->db->where('title',$item['title']);
				 	$this->db->update('settings',$item);	
				}
			 	
			}			
	}
}