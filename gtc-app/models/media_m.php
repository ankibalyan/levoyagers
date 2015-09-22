<?php
class Media_m extends MY_Model
{
	protected $_table_name = 'medias';
	protected $_order_by = 'id desc';
	protected $_timestamps =FALSE;
	public $_rules= array(
		'title' => array(
			'field' => 'title',
			'label' =>'Title',
			'rules' =>'trim|required|xss_clean'
		),
		'caption' => array(
			'field' => 'caption',
			'label' =>'Caption',
			'rules' =>'trim|xss_clean'
		),
		'alt' => array(
			'field' => 'alt',
			'label' =>'Alt',
			'rules' =>'trim|xss_clean'
		),
		'userfile' => array(
			'field' => 'userfile',
			'label' =>'File',
			'rules' =>'trim|is_file|xss_clean'
		),
	);
	public function __construct() 
	{
		parent::__construct();
		$this->gallery_path = realpath(APPPATH.'../public_html/voyag/wc-upload/gallery');
		$this->gallery_path_url = base_url('wc-upload/gallery').'/';
	}

	public function get_new()
	{
		$media = new stdClass();
		$media->title = '';
		$media->path = '';
		$media->caption = '';
		$media->alt = '';
		$media->type = '';
//		$media->user_id = '';
		//$media->created = date('Y-m-d');
		return $media;
	}

	public function do_upload()
	{
		$config = array(
			'allowed_types' => 'jpg|jpeg|png|gif',
			'upload_path' => $this->gallery_path,
			//'encrypt_name' => TRUE,
			'max_size' => 2000,
			'max_width' => 2028,
			'max_height' => 1600,
		);
		$this->load->library('upload',$config);
		if(! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			return $error;
		}
		else
		{
			$this->upload->do_upload();
			$image_data = $this->upload->data();
			$config = array(
				'source_image' => $image_data['full_path'],
				'new_image' => $this->gallery_path.'/thumbs',
				'maintain_ratio' => FALSE,
				'width' => 150,
				'height' => 150
			);
			$this->load->library('image_lib',$config);
			$ret = $this->image_lib->resize();
			return $image_data;
		}

		//dump($image_data);
	}
}