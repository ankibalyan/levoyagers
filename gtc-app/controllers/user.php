<?php
class User extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->data['recent_news'] = $this->article_m->get_recent(2);
	}
	public function index()
	{
		$this->login();
	}

	public function profile()
	{
		if($this->data['uid'])
		{
			if($this->user_m->get($this->data['uid']))
				$this->data['user'] = $this->user_m->getDetail($this->data['uid']);	

			if($this->user_m->getShipping($this->data['uid']))
				$this->data['shipping'] = $this->user_m->getShipping($this->data['uid']);
			else
			{
				$this->data['shipping'] = $this->user_m->getNewShipping();
			}
			if($this->user_m->getBilling($this->data['uid']))
				$this->data['billing'] = $this->user_m->getBilling($this->data['uid']);
			else
			{
				$this->data['billing'] = $this->user_m->getNewBilling();
			}
		}
		else
		redirect('user/login');

		//load login view
		$this->data['subview']='profile';
		$this->load->view('_layout_main',$this->data);

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
				redirect('user/login','refresh');
			}
		}
		else
		{
				//if(validation_errors())
				//echo json_encode(validation_errors()); 
		}

		//load login view
		$this->data['subview']='login';
		$this->load->view('_layout_modal',$this->data);
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
				redirect('user/register','refresh');
			}
			else
			{
				$this->session->set_flashdata('error','The User Can\'t be registered');
				redirect('user/register','refresh');
			}
		}
		//load registraion view
		$this->data['subview']='register';
		$this->load->view('_layout_modal',$this->data);
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
				redirect('user/login','refresh');
			}
		}
		else
		{
				$this->session->set_flashdata('error','Either Token has been expired or invalid, Retry');
				redirect('user/login','refresh');
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
				redirect('user/login','refresh');
			}
			else
			{
				$this->session->set_flashdata('error','The User Name Does not exists');
				redirect('user/resend','refresh');
			}
		}
		//load login view
		$this->data['subview']='resend';
		$this->load->view('_layout_modal',$this->data);

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
				redirect('user/forget','refresh');
			}
		}
		//load login view
		$this->data['subview']='forget_pass';
		$this->load->view('_layout_modal',$this->data);

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
		redirect('user/login');
	}
	
		
}


                            
                            