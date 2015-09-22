<?php
class Setting_m extends MY_Model
{
	protected $_table_name = 'settings';
	protected $_order_by = 'id desc';
	protected $_timestamps =FALSE;
	public $_rules= array(
		'title' => array(
			'field' => 'title',
			'label' =>'Title',
			'rules' =>'trim|xss_clean'
		),
	);
	public function __construct() 
	{
		parent::__construct();
	}

	public function get_new()
	{
		$setting = new stdClass();
		$setting->title = '';
		return $setting;
	}
}