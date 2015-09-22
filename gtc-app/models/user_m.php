<?php
class User_m extends MY_Model
{
	protected $_table_name='users';
	protected $_order_by='username';
	public $_login_rules=array(
		'username'=>array(
			'field'=>'username',
			'label'=>'User Name',
			'rules'=>'trim|required|xss_clean'
			),
		'password'=>array(
			'field'=>'password',
			'label'=>'Password',
			'rules'=>'trim|required'
			)		
		);
	public $_forget_rules=array(
		'username'=>array(
			'field'=>'username',
			'label'=>'User Name',
			'rules'=>'trim|required|xss_clean'
			),
		);
	public $_resend_rules=array(
		'username'=>array(
			'field'=>'username',
			'label'=>'User Name',
			'rules'=>'trim|required|xss_clean'
			),
		);
	public $_reg_rules=array(
		'username'=>array(
			'field'=>'username',
			'label'=>'User Name',
			'rules'=>'trim|required|is_unique[users.username]|alpha_dash|min_length[5]|max_length[15]|xss_clean'
			),
		'password'=>array(
			'field'=>'password',
			'label'=>'Password',
			'rules'=>'trim|required|min_length[5]|max_length[15]'
			),
		'password_confirm'=>array(
			'field'=>'password_confirm',
			'label'=>'Password Confirm',
			'rules'=>'trim|required|matches[password]|min_length[5]|max_length[15]'
			),
		'email' => array(
			'field'=>'email',
			'label'=>'Email',
			'rules'=>'trim|required|is_unique[users.email]|max_lenght[45]|valid_email|callback__unique_email|xss_clean'
			),
		'first_name' => array(
			'field'=>'first_name',
			'label'=>'First Name',
			'rules'=>'trim|required|min_length[3]|max_length[15]|xss_xlean'
			),
		'last_name' => array(
			'field'=>'last_name',
			'label'=>'Last Name',
			'rules'=>'trim|required|min_length[3]|max_length[15]|xss_xlean'
			),
		'company' => array(
			'field'=>'comapny',
			'label'=>'Company Name',
			'rules'=>'trim|min_length[3]|max_length[100]|xss_xlean'
			),
		'phone' => array(
			'field'=>'phone',
			'label'=>'Phone No',
			'rules'=>'trim|integer|min_length[8]|max_length[10]|xss_xlean'
			),
		);

	public $_reg_admin=array(
		'username'=>array(
			'field'=>'username',
			'label'=>'User Name',
			'rules'=>'trim|required|is_unique[users.username]|alpha_dash|min_length[5]|max_length[15]|xss_clean'
			),
		'password'=>array(
			'field'=>'password',
			'label'=>'Password',
			'rules'=>'trim|required|min_length[5]|max_length[15]'
			),
		'password_confirm'=>array(
			'field'=>'password_confirm',
			'label'=>'Password Confirm',
			'rules'=>'trim|required|matches[password]|min_length[5]|max_length[15]'
			),
		'email' => array(
			'field'=>'email',
			'label'=>'Email',
			'rules'=>'trim|required|max_lenght[45]|valid_email|is_unique[users.username]|xss_clean'
			),
		'group' => array(
			'field'=>'group',
			'label'=>'User Group',
			'rules'=>'trim|required|xss_clean'
			),

		);

	public function __construct() 
	{
		parent::__construct();
	}
	
	public function login()
	{
		$user = $this->get_by(
			array(
				'username'=>$this->input->post('username'),
				'password'=>$this->hash($this->input->post('password'))
				),TRUE);
		if(count($user) && $this->is_active($user->id) && $this->is_approved($user->id))
		{
			$data=array(
				'name'=> $user->username,
				'id'=> $user->id,
				'access' => $user->role,
				'loggedin'=> TRUE
				);
			$this->session->set_userdata($data);
			return TRUE;
		}
		elseif(count($user) && !$this->is_active($user->id))
		{
			$this->session->set_flashdata('error','Your Account is not activated from your email. Kindly activate to login.');
			redirect('/user/login','refresh');	
		}
		elseif(count($user) && !$this->is_approved($user->id))
		{
			$this->session->set_flashdata('error','Your Account is not Approved from your Admin. Kindly Wait for Addmin Approval to login.');
			redirect('/user/login','refresh');	
		}
	}
	public function register()
	{
		$this->_timestamp=TRUE;
		$data['user'] = $this->get_new();
		$data = $this->array_from_post(array('username','email','password','first_name','last_name','company','phone'));
		$data['active'] = 0;
		$data['password'] = $this->hash($data['password']);
		$data['ip_address'] = $this->get_ip();
		$data['activation_code'] = $this->key_gen();
		$id = $this->save($data);
		if($id)
		{
			if($this->activation_mail($id))
			return TRUE;
		}
		else
		return FALSE;
	}
	public function activate($key =NULL)
	{
		$user= $this->get_by(array('activation_code'=>$key));
		if(count($user) && $key !== NULL  && $key !== '')
		{
			return  (int) $user[0]->id;
		}
		else
			return FALSE;
	}
	
	public function is_active($user_id = NULL)
	{
		$act_user = $this->get_by(array('id' => $user_id,'active' => 1));
		if(count($act_user))
		return TRUE;
		else
		return FALSE;
	}
	public function is_approved($user_id = NULL)
	{
		$act_user = $this->get_by(array('id' => $user_id,'approved' => 1));
		if(count($act_user))
		return TRUE;
		else
		return FALSE;
	}
	public function activation_mail($id)
	{
		$user = $this->get($id,TRUE);
		$mail = array();
		$mail['email'] = $user->email;
		$mail['subject'] = 'Activate your Account';
		$mail['message'] ="<p>dear $user->first_name $user->last_name! <a href='".base_url()."admin/user/activate/$user->activation_code"."'>Click Here</a>";
		$mail['message'] .= '<p>to Activate your Account.</p>';
		if($this->user_m->sendto($mail))
		{
			return TRUE;
		}
		else
		{
			//send error mail to admin
			if($this->failer_mail())
			{
				$this->session->set_flashdata('error','Mail can\' be sent to activate your account');
				redirect('admin/user/resend','refresh');
			}
		}
			
	}
	public function forget_mail($id)
	{
		$user = $this->get($id,TRUE);
		$mail = array();
		$mail['email'] = $user->email;
		$mail['subject'] = 'Reset your Account Password';
		$mail['message'] ="<p>dear $user->first_name $user->last_name! <a href='".base_url()."admin/user/reset_pass/".$user->forgotten_password_code."'>Click Here</a>";
		$mail['message'] .= '<p>to Reset your Account Password.</p>';
		if($this->sendto($mail))
		{
			return TRUE;
		}
		else
		{
			//send error mail to admin
			if($this->failer_mail())
			{
				$this->session->set_flashdata('error','Mail can\' be sent to Reset your account Password');
				redirect('admin/user/forget','refresh');
			}
		}
			
	}

	public function resend()
	{
		$user = $this->get_by(array('username'=>$this->input->post('username')),TRUE);
		if(count($user) && $this->is_active($user->id))
		{
			$this->session->set_flashdata('error','Your Account is already activated. Kindly login with your credentials or use forget Password.');
			redirect('user/login','refresh');
		}
		elseif(count($user) && !$this->is_active($user->id))
		{
		$id = $user->id;
		if($id)
		{
			$data['activation_code'] = $this->key_gen();
			$this->save($data,$id);
			if($this->activation_mail($id))
			return TRUE;

		}
		else
			return FALSE;
		}
	}
	
	public function forget()
	{
		$user = $this->get_by(array('username'=>$this->input->post('username')),TRUE);
		if(count($user) && $this->is_active($user->id))
		{
			$id = $user->id;
			if($id)
			{
				$data['forgotten_password_code'] = $this->key_gen();
				$this->save($data,$id);
				if($this->forget_mail($id))
				return TRUE;
				
				else
				return FALSE;				
			}
		}
		elseif(count($user) && !$this->is_active($user->id))
		{
			$id = $user->id;
			if($id)
			{
				if($this->activation_mail($id))
				{
					$this->session->set_flashdata('error','Activation Code has been resent to your mail, kindly Activate before any acion.');
					redirect('user/forget','refresh');
				}

			}
			else
				return FALSE;
		}
		else
		{
			return FALSE;
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
	}
	public function loggedin()
	{
		return (bool) $this->session->userdata('loggedin');
	}

	public function hash($string)
	{
		return hash('sha1',$string.config_item('encryption_key'));
	}	
	public function key_gen()
	{
		return hash('md5',rand('1000','99999').uniqid(rand()).time());	
	}
	public function get_ip()
	{
		$http_clent_ip = $_SERVER['HTTP_CLIENT_IP'];	
		$http_x_forwarded_for = $_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote_addr = $_SERVER['REMOTE_ADDR'];
		if(!empty($http_clent_ip))
			$ip_address = $http_clent_ip;
		elseif(!empty($http_x_forwarded_for))
			$ip_address = $http_x_forwarded_for;
		else
			$ip_address = $remote_addr;
		return $ip_address;
	}
	public function sendto($data = NULL)
	{

			$this->load->library('email');
			$this->email->clear();
			$this->email->from('ankit.kr.balyan@gmail.com','Ankit Balyan');
			$this->email->to($data['email']);
			$this->email->bcc('ankit.kr.balyan@gmail.com','Ankit Balyan');
			$this->email->reply_to('ankit.kr.balyan@gmail.com','Ankit Balyan');
			$this->email->subject($data['subject']);
			$this->email->message($data['message']);
			if($this->email->send())
			return TRUE;

	}
	public function get_users($where = NULL)
	{
			//Fetch member members
			if($where){$this->db->where($where);} 
			$this->db->select('id, username');
			$members = $this->get();
			//retrun key => Value pair array
			$array = array('' => ' - - None - - ');
			if(count($members))
			{
				foreach($members as $member)
				{
					$array [$member->id] = $member->username;
					
				}
			}
			return $array;
	}
	public function getDetail($id = NULL)
	{
		$this->db->select(array('username','email','first_name','last_name','company','phone'));
		$user = $this->get_by(array('id'=> $id),TRUE);
		return $user;
	}

	public function getShipping($id = NULL)
	{
		$this->_table_name = 'shipping_detail';
		$this->_order_by='user_id';
		$user = $this->get_by(array('user_id'=> $id),TRUE);
		return $user;
	}
	public function getBilling($id = NULL)
	{
		$this->_table_name = 'billing_detail';
		$this->_order_by='user_id';
		$user = $this->get_by(array('user_id'=> $id),TRUE);
		return $user;
	}
	public function get_new()
	{
		$user = new stdClass();
		$user->ip_address = '';
		$user->username = '';
		$user->password = '';
		$user->email ='';
		$user->activation_code = '';
		$user->forgetten_password_code = '';
		$user->forgetten_password_time = '';
		$user->remember_code = '';
		$user->created_on = '';
		$user->last_login = '';
		$user->active = '';
		$user->first_name = '';
		$user->last_name = '';
		$user->company = '';
		$user->phone = '';
		return $user;
	}

	public function getNewShipping()
	{
		$this->_table_name = 'shipping_detail';
		$this->_order_by='userid';
		$user = new stdClass();
		$user->address = '';
		$user->city = '';
		$user->state = '';
		$user->zip ='';
		$user->country = '';
		return $user;		
	}
	public function getNewBilling()
	{
		$this->_table_name = 'shipping_detail';
		$this->_order_by='userid';
		$user = new stdClass();
		$user->address = '';
		$user->city = '';
		$user->state = '';
		$user->zip ='';
		$user->country = '';
		return $user;		
	}
}