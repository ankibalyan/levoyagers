<?php
class Comment_m extends MY_Model
{
	protected $_table_name = 'comments';
	protected $_order_by = 'created desc';
	protected $_timestamps =FALSE;
	public $_rules= array(
		'comment' => array(
			'field' => 'comment',
			'label' =>'Comment',
			'rules' =>'trim|required|xss_clean'
		),
	);

	public function get_new()
	{
		$comment = new stdClass();
		$comment->comment = '';
		$comment->user_id = '';
		$comment->post_id = '';
		return $comment;
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
		$this->db->select("comments.*, p.title as comment_post, u.username as comment_user");
		$this->db->join("posts as p", "comments.post_id=p.id",'left');
		$this->db->join("users as u", "comments.user_id=u.id",'left');
		if($id)
		{
			$where = array('comments.id'=>$id);
			return parent::$this->get_by($where,$single);
		}
		else
		return parent::$this->get();
	}
}