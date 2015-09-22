<?php
class Testimony_m extends MY_Model
{
	protected $_table_name = 'testimony';
	protected $_order_by = 'created desc';
	protected $_timestamps =FALSE;
	public $_rules= array(
		'comment' => array(
			'field' => 'comment',
			'label' =>'Comment',
			'rules' =>'trim|required|xss_clean'
		),
		'comment' => array(
			'field' => 'comment',
			'label' =>'Testimony',
			'rules' =>'trim|required|xss_clean'
		),
		'name' => array(
			'field' => 'name',
			'label' =>'Name',
			'rules' =>'trim|required|xss_clean'
		),
		'place' => array(
			'field' => 'place',
			'label' =>'Place',
			'rules' =>'trim|required|xss_clean'
		),

	);

	public function get_new()
	{
		$testimony = new stdClass();
		$testimony->comment = '';
		$testimony->name = '';
		$testimony->place = '';
		$testimony->approved = '';
		$testimony->created = date('Y-m-d');
		return $testimony;
	}

	public function get_recent($limit =  6)
	{
		$limit = (int) $limit;
		$this->set_published();
		$this->db->limit($limit);
		return parent::get();
	}
	public function get_with_join($id=NULL,$single=FALSE)
	{
		$this->db->select("testimonys.*, p.title as testimony_post, u.username as testimony_user");
		$this->db->join("posts as p", "testimonys.post_id=p.id",'left');
		$this->db->join("users as u", "testimonys.user_id=u.id",'left');
		if($id)
		{
			$where = array('testimonys.id'=>$id);
			return parent::$this->get_by($where,$single);
		}
		else
		return parent::$this->get();
	}
}