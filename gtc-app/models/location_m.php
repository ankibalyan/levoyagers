<?php 
class Location_m extends MY_Model
{
	protected $_table_name='locations';
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
		$location = new stdClass();
		$location->title = '';
		$location->description = '';
		$location->slug = '';
		$location->country = '';
		$location->image = '';
		$location->media_image = '';
		$location->featured= 0;
		$location->active=1;
		return $location;
	}
}