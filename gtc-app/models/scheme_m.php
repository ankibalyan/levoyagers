<?php 
class Scheme_m extends MY_Model
{
	protected $_table_name='schemes';
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
	);
	
	public function get_new($menu=NULL)
	{
		$scheme = new stdClass();
		$scheme->title = '';
		$scheme->description = '';
		$scheme->slug = '';
		$scheme->image = '';
		$scheme->media_image = '';
		$scheme->featured= 0;
		$scheme->active=1;
		return $scheme;
	}
}