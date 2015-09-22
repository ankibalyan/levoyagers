<?php
class Enquire_m extends MY_Model
{
	protected $_table_name = 'Enquiry';
	protected $_order_by = 'time desc';
	protected $_timestamps =FALSE;
	public $_rules= array(
		'name' => array(
			'field' => 'name',
			'label' =>'Name',
			'rules' =>'trim|required|xss_clean'
		),
		'email' => array(
			'field' => 'email',
			'label' =>'Email',
			'rules' =>'trim|required|valid_email|xss_clean'
		),
		'subject' => array(
			'field' => 'subject',
			'label' =>'Subject',
			'rules' =>'trim|required|xss_clean'
		),
		'message' => array(
			'field' => 'message',
			'label' =>'Message',
			'rules' =>'trim|required|xss_clean'
		),

	);

	public function get_new()
	{
		$Enquire = new stdClass();
		$Enquire->name = '';
		$Enquire->email = '';
		$Enquire->subject = '';
		$Enquire->message = '';
		return $Enquire;
	}

	public function get_recent($limit =  6)
	{
		$limit = (int) $limit;
		$this->set_published();
		$this->db->limit($limit);
		return parent::get();
	}
}