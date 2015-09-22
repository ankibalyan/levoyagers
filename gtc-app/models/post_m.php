<?php
class Post_m extends MY_Model
{
	protected $_table_name = 'posts';
	protected $_order_by = 'pub_date desc, id desc';
	protected $_timestamps =FALSE;
	public $_rules= array(
		'title' => array(
			'field' => 'title',
			'label' =>'Title',
			'rules' =>'trim|required|max_lenght[100]|xss_clean',
		),
		'post' => array(
			'field' => 'post',
			'label' =>'Post',
			'rules' =>'trim|required|xss_clean'
		),
		'pub_date' => array(
			'field' => 'pub_date',
			'label' =>'Publication Date',
			'rules' =>'trim|required|xss_clean',
		),
	);
	
	public function get_new()
	{
		$post = new stdClass();
		$post->title = '';
		$post->image = '';
		$post->post = '';
		$post->pub_date=date('Y-m-d');
		$post->date_added=date('Y-m-d');
		return $post;
	}
	
	public function get_recent($limit =  4)
	{
		$this->db->select("posts.*,m.file_name as media_image");
		$this->db->join("medias as m", "posts.image=m.id",'left');
		$limit = (int) $limit;
		$this->set_published();
		$this->db->limit($limit);
		return parent::get();
	}
}