<?php
class Article_m extends MY_Model
{
	protected $_table_name = 'articles';
	protected $_order_by = 'pub_date desc, id desc';
	protected $_timestamps =TRUE;
	public $_rules= array(
			'pub_date' => array(
			'field' => 'pub_date',
			'label' =>'Publication Date',
			'rules' =>'trim|required|exact_length[10]|xss_clean',
		),
		'title' => array(
			'field' => 'title',
			'label' =>'Title',
			'rules' =>'trim|required|max_lenght[100]|xss_clean',
		),
		'slug' => array(
			'field' => 'slug',
			'label' =>'Slug',
			'rules' =>'trim|required|max_lenght[100]|url_title|xss_clean',
		),
		'body' => array(
			'field' => 'body',
			'label' =>'Body',
			'rules' =>'trim|required'
		),
		'modified' => array(
			'field' => 'modified',
			'label' =>'modified',
		),
	);
	
	public function get_new()
	{
		$article = new stdClass();
		$article->title = '';
		$article->slug = '';
		$article->body = '';
		$article->pub_date=date('Y-m-d');
		$article->modified=date('Y-m-d H:i:s');
		return $article;
	}
	
	public function get_recent($limit =  3)
	{
		$limit = (int) $limit;
		$this->set_published();
		$this->db->limit($limit);
		return parent::get();
	}
}