<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product_m extends My_Model
{
	protected $_table_name = 'product';
	protected $_order_by = 'id desc';
	protected $_timestamps =FALSE;
	public $_rules= array(
		'title' => array(
			'field' => 'title',
			'label' =>'Title',
			'rules' =>'trim|required|max_lenght[100]|xss_clean',
		),
		'description' => array(
			'field' =>'description',
			'label' =>'Description',
			'rules' =>'trim|required|xss_clean'
		),
		'image' => array(
			'field' =>'image',
			'label' =>'Image',
			'rules' =>'trim|xss_clean'
		),
	);
	public function get_new()
	{
		$product = new stdClass();
		$product->title = '';
		$product->description = '';
		$product->image = '';
		$product->price = '';
		$product->user_id = '';
		return $product;
	}
	public function get_products($id = NULL)
	{
		$this->db->where(array('user_id'=>$this->data['uid']));
		$results = $this->get($id);
		foreach ($results as &$result) 
		{
			if ($result->option_values) {
				$result->option_values = explode(',', $result->option_values);
			}
		}
		return $results;
	}
	public function get_product($id = NULL)
	{
		$this->db->where(array('user_id'=>$this->data['uid']));
		$results = $this->get($id);
			if ($results->option_values) {
				$results->option_values = explode(',', $result->option_values);
			}
		return $results;
	}

}
/* End of file product_m.php */
/* Location: .//C/xampp/htdocs/wc-app/gtc-app/models/product_m.php */