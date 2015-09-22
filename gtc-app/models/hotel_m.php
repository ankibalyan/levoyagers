<?php 
class Hotel_m extends MY_Model
{
	protected $_table_name='hotels';
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
		'location_id' => array(
			'field' => 'location_id',
			'label' => 'Location',
			'rules' => 'trim|required|intval'
		)
	);
	
	public function get_new($menu=NULL)
	{
		$hotel = new stdClass();
		$hotel->title = '';
		$hotel->description = '';
		$hotel->slug = '';
		$hotel->image = '';
		$hotel->media_image = '';
		$hotel->featured= 0;
		$hotel->active=1;
		$hotel->location_id = '';
		return $hotel;
	}
}