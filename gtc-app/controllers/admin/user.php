                                <?php
class User extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		//Fetch all Users
		$this->data['users']=$this->user_m->get();

		//Load the Users view
		if($this->session->userdata('access') && $this->session->userdata('access') === 'administrator')
		$this->data['subview']='admin/user/adindex';
		else
		$this->data['subview']='admin/user/index';
		$this->load->view('admin/_layout_main',$this->data);
	}
	
	public function edit($id = NULL)
	{	//fetch a user or set a new one
		if($id)
		{
			$this->data['user']=$this->user_m->get($id,TRUE);
//			$this->data['media']=$this->media_m->get($this->data['user']->image,TRUE);
			count($this->data['user']) || $this->data['error'][] = 'User could not be found';
		}
		else
		{
			$this->data['user'] = $this->user_m->get_new();
		}
		
		//setup the form
		$this->load->library('form_validation',array(),'user_edit');
		$rules=$this->user_m->_reg_admin;
		$this->user_edit->set_rules($rules);
		$id || $rules['password'] = '|required';
		
		//process the form 
		if($this->user_edit->run() == TRUE)
		{
			$data = $this->user_m->array_from_post(array('username','email','password','first_name','last_name','company','phone'));
			$data['password']=$this->user_m->hash($data['password']);
			$data['forgotten_password_code'] = NULL;
			$data['forgotten_password_time'] = NULL;
			$this->user_m->save($data,$id);
			redirect('admin/user');
			
		}
		//load edit view
		$this->data['subview']= 'admin/user/edit';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function delete($id = NULL)
	{
		$this->user_m->delete($id);
		redirect('admin/user');
	}
	
	public function login()
	{
		//redirect if he is already logged in.
	 	$dashboard = 'admin/dashboard';
	 	$home = '';
		if($this->user_m->loggedin() == TRUE)
			{
				if($this->data['role'] && $this->data['role'] =='administrator')
				redirect($dashboard);
				else
				redirect($home);
			}
		
		$this->load->library('form_validation',array(),'login_form');
		//set form
		$rules=$this->user_m->_login_rules;
		$this->login_form->set_rules($rules);
		
		//Process form
		if($this->login_form->run() === TRUE)
		{
			//Log in & rediret to secure page 
			if($this->user_m->login() === TRUE)
			{
				if($this->data['role'] && $this->data['role'] ==='administrator')
				redirect($dashboard);
				else
				redirect($home);
			}
			else
			{
				$this->session->set_flashdata('error','The User Name Password combination Does not exists');
				redirect('admin/user/login','refresh');
			}
		}
		else
		{
				//if(validation_errors())
				//echo json_encode(validation_errors()); 
		}

		//load login view
		$this->data['subview']='admin/user/login';
		$this->load->view('admin/_layout_modal',$this->data);
	}
	
	
	public function register()
	{
		
		//redirect if he is already logged in.
	 	$dashboard = 'admin/dashboard';
		$this->user_m->loggedin() == FALSE || redirect($dashboard);

		$this->load->library('form_validation',array(),'register_form');
		//set form
		$rules=$this->user_m->_reg_rules;
		$this->register_form->set_rules($rules);
		
		//Process form
		if($this->register_form->run() === TRUE)
		{
			//Log in & rediret to secure page 
			if($this->user_m->register() === TRUE)
			{
				$this->session->set_flashdata('error','Registration Successfull! Activation Code has been sent to your mail, kindly follow the link to activate');
				redirect('admin/user/register','refresh');
			}
			else
			{
				$this->session->set_flashdata('error','The User Can\'t be registered');
				redirect('admin/user/register','refresh');
			}
		}
		//load registraion view
		$this->data['subview']='admin/user/register';
		$this->load->view('admin/_layout_modal',$this->data);
	}
	
	public function activate($key = NULL)
	{

		//redirect if he is already logged in.
	 	$dashboard = 'admin/dashboard';
		$this->user_m->loggedin() == FALSE || redirect($dashboard);
		
		//Activation Process
		if($key != NULL  && $key != '')
		{
			// rediret to secure page 
			$id = $this->user_m->activate($key);
			if($this->user_m->activate($key) !== FALSE)
			{
				$this->data['user']=$this->user_m->get($id,TRUE);
				count($this->data['user']) || $this->data['error'][] = 'User could not be found';
				$data['activation_code'] = NULL;
				$data['active'] = 1;
				$this->user_m->save($data,$id);
				redirect($dashboard);
			}
			else
			{
				$this->session->set_flashdata('error','Your Account is not activated from your email. Kindly activate to login.');
				redirect('admin/user/login','refresh');
			}
		}
		else
		{
				$this->session->set_flashdata('error','Either Token has been expired or invalid, Retry');
				redirect('admin/user/login','refresh');
		}
	}
	public function resend()
	{
		//redirect if he is already logged in.
	 	$dashboard = 'admin/dashboard';
		$this->user_m->loggedin() == FALSE || redirect($dashboard);
		
		//set form
		$this->load->library('form_validation',array(),'resend_form');
		$rules=$this->user_m->_resend_rules;
		$this->resend_form->set_rules($rules);	
		//Process form
		if($this->resend_form->run() === TRUE)
		{
			//rediret to secure page 
			if($this->user_m->resend() === TRUE)
			{
				$this->session->set_flashdata('error','Activation Code has been resent to your mail, kindly follow the link to activate');
				redirect('admin/user/login','refresh');
			}
			else
			{
				$this->session->set_flashdata('error','The User Name Does not exists');
				redirect('admin/user/resend','refresh');
			}
		}
		//load login view
		$this->data['subview']='admin/user/resend';
		$this->load->view('admin/_layout_modal',$this->data);

	}
	
		public function forget()
	{
		//redirect if he is already logged in.
	 	$dashboard = 'admin/dashboard';
		$this->user_m->loggedin() == FALSE || redirect($dashboard);
		
		//set form
		$this->load->library('form_validation',array(),'forget_form');
		$rules=$this->user_m->_forget_rules;
		$this->forget_form->set_rules($rules);	
		//Process form
		if($this->forget_form->run() === TRUE)
		{
			//rediret to secure page 
			if($this->user_m->forget() === TRUE)
			{
				$this->session->set_flashdata('error','forget Code has been resent to your mail, kindly follow the link to change your password.');
				//redirect('admin/user/login','refresh');
			}
			else
			{
				$this->session->set_flashdata('error','The User Name Does not exists');
				redirect('admin/user/forget','refresh');
			}
		}
		//load login view
		$this->data['subview']='admin/user/forget_pass';
		$this->load->view('admin/_layout_modal',$this->data);

	}
	
	
	public function reset_pass($key = NULL)
	{
		$user= $this->user_m->get_by(array('forgotten_password_code'=>$key));
		if(count($user) && $key != NULL  && $key != '')
		{
			$data['forgotten_password_code'] = NULL;
			$this->user_m->save($data,$user[0]->id);
			$this->edit($user[0]->id);
		}
		else
		{
				$this->session->set_flashdata('error','Either Token has been expired or invalid, Retry');
				redirect('admin/user/forget','refresh');	
		}
	}
	
	public function logout()
	{
		$this->user_m->logout();
		redirect('admin/user/login');
	}
	
	public function order()
	{
		
	}
	
	/*	public function _unique_username($str)
	{
		//return true if it is a reset password request
		if($this->uri->segment(3) === 'reset_pass')
		return TRUE;
	
		//Do NOT Validate, if email is already exists
		//unless it is the email for current user
		$id=$this->uri->segment(4);
		$this->db->where('username',$this->input->post('username'));
		!$id || $this->db->where('id !=',$id);
		$user=$this->user_m->get();
		if(count($user))
		{
			$this->user_edit->set_message('_unique_username', '%s should be unique');
			return FALSE;
		}
		return TRUE;
	}
	public function _unique_email($str)
	{
		//return true if it is a reset password request
		if($this->uri->segment(3) === 'reset_pass')
		return TRUE;

		//Do NOT Validate, if email is already exists
		//unless it is the email for current user
		$id=$this->uri->segment(4);
		$this->db->where('email',$this->input->post('email'));
		!$id || $this->db->where('id !=',$id);
		$user=$this->user_m->get();
		if(count($user))
		{
			$this->user_edit->set_message('_unique_email', '%s should be unique');
			return FALSE;
		}
		return TRUE;
	}
*/	
}


                            