<?php
class Package_m extends MY_Model
{
	protected $_table_name='packages';
	protected $_order_by='id';
	protected $_timestamp = TRUE;
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
			'field' =>'location_id',
			'label' =>'Location',
			'rules' =>'trim|intval',
		),
		'category_id' => array(
			'field' =>'category_id',
			'label' =>'Category',
			'rules' =>'trim|intval',
		),
		'hotel_id' => array(
			'field' =>'hotel_id',
			'label' =>'Hotel',
			'rules' =>'trim|intval',
		),
		'scheme_id' => array(
			'field' =>'scheme_id',
			'label' =>'Scheme',
			'rules' =>'trim|intval',
		),
		'transport_id' => array(
			'field' =>'transport_id',
			'label' =>'Trasport',
			'rules' =>'trim|intval',
		),
	);

	public function get_new($menu=NULL)
	{
		$package = new stdClass();
		$package->title = '';
		$package->description = '';
		$package->slug = '';
		$package->image = 0;
		$package->media_image = 0;
		$package->price = 0;
		$package->pub_date = '';
		$package->end_date = '';
		$package->start_date = '';
		$package->featured= 0;
		$package->active=1;
		$package->category_id = 0;
		$package->location_id = 0;
		$package->hotel_id = 0;
		$package->scheme_id = 0;
		$package->transport_id = 0;
		return $package;
	}
		public function get_with_join($id=NULL,$single=FALSE)
	{
		$this->db->select("packages.*, l.title as package_location, c.title as package_category,s.title as package_scheme,h.title as package_hotel,t.title as package_transport,m.file_name as media_image");
		$this->db->join("locations as l", "packages.location_id=l.id",'left');
		$this->db->join("category as c", "packages.category_id=c.id",'left');
		$this->db->join("schemes as s", "packages.scheme_id=s.id",'left');
		$this->db->join("hotels as h", "packages.hotel_id=h.id",'left');
		$this->db->join("transports as t", "packages.transport_id=t.id",'left');
		$this->db->join("medias as m", "packages.image=m.id",'left');
		if($id)
		{
			$where = array('packages.id'=>$id);
			return parent::get_by($where,$single);
		}
		else
		return parent::get();
	}
}