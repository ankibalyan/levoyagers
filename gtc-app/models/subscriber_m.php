<?php
class Subscriber_m extends MY_Model
{
	protected $_table_name = 'subscribers';
	protected $_order_by='id';
	public $_rules=array(
	'subject' => array(
		'field' => 'subject',
		'label' => 'Sunject',
		'rules' => 'trim|required|xss_clean'),
	'message' => array(
		'field' => 'message',
		'label' => 'Message',
		'rules' => 'trim|required|xss_clean')
	);
	public $_rules_page=array(	
	'semail' => array(
		'field' => 'semail',
		'label' => 'Email',
		'rules' => 'trim|required|callback__unique_email|xss_clean'),
	);

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_new()
	{
		$subscriber = new stdClass();
		$subscriber->semail = '';
		$subscriber->active = '1';
		return $subscriber;
	}
	
	public function get_emails()
	{
		$this->db->select('*');
		$this->db->from($this->_table_name);
		$this->db->where('active',1);
		$query = $this->db->get();
		$subscribers = $query->result_array();
		if(count($subscribers))
		{	
		return $subscribers;
		}
	}
    public function check_mail($em=NULL)
    {
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where('semail',$em);
        $query = $this->db->get();
        $subscribers = $query->result_array();
        if(count($subscribers))
        {
            return $subscribers;
        }
    }

	public function delete($id)
	{	
		//delete a page
		parent::delete($id);
	}
	
} 