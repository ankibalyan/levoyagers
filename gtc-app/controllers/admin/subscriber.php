<?php
class Subscriber extends Admin_Controller
{
	public function __construct()
	{
		parent :: __construct();
		$this->load->model('subscriber_m');
	}
	
	public function index()
	{
		//Fetch all Subscribers
		$this->data['subscribers'] = $this->subscriber_m->get_emails();
		//Load the subscribes view
		$this->data['subview']= 'admin/subscriber/index';

		$this->load->view('admin/_layout_main',$this->data);
		
	}
	
		public function subscribe()
	{	//set a new one

			$this->data['user'] = $this->subscriber_m->get_new();		
		//setup the form
		$rules=$this->subscriber_m->_rules_page;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE)
		{
			$data = $this->subscriber_m->array_from_post(array('semail'));
			$this->subscriber_m->save($data);
//			redirect('/');
			
		}
		//load SUBSCRIBER view
		$this->load->view('sidebar',$this->data);
	}
	
		public function newsletter($id = NULL)
	{	//Fetch all Subscribers
		$this->data['subscribers'] = $this->subscriber_m->get_emails();
		
		//setup the form
		$rules=$this->subscriber_m->_rules;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE)
		{
			$data = $this->subscriber_m->array_from_post(array('subject','message'));
			$this->sendmails($data);
			redirect('admin/subscriber');
			
		}
		//load edit view
		$this->data['subview']= 'admin/subscriber/send';
		$this->load->view('admin/_layout_main',$this->data);
	}


	public function sendmails($data)
	{
		$emails = $this->subscriber_m->get_emails();
		$this->load->library('email');
		foreach($emails as $email)
		{
			if($email)
			{
				$this->email->from('sf.ankit@gmail.com','Ankit Balyan');
				$this->email->to($email['semail']);
				$this->email->subject($data['subject']);
				$this->email->message($data['message']);
				$this->email->send();
				$this->email->clear();
			}
		}
	}
	public function delete($id = NULL)
	{
		$this->subscriber_m->delete($id);
		redirect('admin/subscriber');
	}
}

