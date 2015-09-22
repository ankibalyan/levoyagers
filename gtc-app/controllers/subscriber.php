<?php  
class Subscriber extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();	
		$this->load->model('subscriber_m');
	}
	public function index()
	{
		$this->data['subscriber'] = $this->subscriber_m->get_new();		
		//setup the form
		$rules=$this->subscriber_m->_rules_page;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE)
		{
			$data = $this->subscriber_m->array_from_post(array('semail'));
			$this->subscriber_m->save($data);
			redirect('');			
		}
		else
		redirect('#');			
	}
    public function _unique_email($str)
    {
        $id=$this->uri->segment(4);
        $this->db->where('semail',$this->input->post('email'));
        !$id || $this->db->where('id !=',$id);
        $user=$this->subscriber_m->check_mail($str);
        if(count($user))
        {
            $this->form_validation->set_message('_unique_email', '%s This user is already registered.');
            return FALSE;
        }
        return TRUE;
    }
}