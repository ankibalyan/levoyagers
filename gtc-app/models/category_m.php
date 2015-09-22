<?php 
class Category_m extends MY_Model
{
	protected $_table_name='category';
	protected $_order_by='id';
	public $_rules= array(
		'title' => array(
			'field' => 'title',
			'label' =>'Title',
			'rules' =>'trim|required|max_lenght[100]|xss_clean',
		),
		'description' => array(
			'field' =>'description',
			'label' =>'Description',
			'rules' =>'trim|required'
		),
		'image' => array(
			'field' =>'image',
			'label' =>'Image',
			'rules' =>'trim|xss_clean',
		),
		'slug' => array(
			'field' => 'slug',
			'label' =>'Slug',
			'rules' =>'trim|required|max_lenght[100]|url_title|callback__unique_slug|xss_clean',
		),
		'featured' => array(
			'field' =>'featured',
			'label' =>'Featured',
			'rules' =>'trim|xss_clean',
		),
		'active' => array(
			'field' =>'active',
			'label' =>'Active',
			'rules' =>'trim|xss_clean',
		),
		'parent_id' => array(
			'field' =>'parent_id',
			'label' =>'Parent',
			'rules' =>'trim|intval',
		),
	);
	
	public function get_new($menu=NULL)
	{
		$category = new stdClass();
		$category->title = '';
		$category->description = '';
		$category->slug = '';
		$category->image = '';
		$category->media_image = '';
		$category->featured= 0;
		$category->active=1;
		$category->parent_id = 0;
		return $category;
	}
	public function get_with_join($id=NULL,$single=NULL)
	{
		$this->db->select("category.*,p.slug as parent_slug, p.title as parent_title,m.file_name as media_image");
		$this->db->join("category as p", "category.parent_id=p.id",'left');
		$this->db->join("medias as m", "category.image=m.id",'left');
		
		if($id)
		{
			$where = array('category.id'=>$id);
			return parent::$this->get_by($where,$single);
		}
		else
		return parent::get();
	}
}