<?php 
class Transport_m extends MY_Model
{
	protected $_table_name='transports';
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
		$transport = new stdClass();
		$transport->title = '';
		$transport->description = '';
		$transport->slug = '';
		$transport->image = '';
		$transport->media_image = '';
		$transport->featured= 0;
		$transport->active=1;
		return $transport;
	}
}
