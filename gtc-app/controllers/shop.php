<?php 
/**
* 
*/
class Shop extends Frontend_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if($this->user_m->loggedin() == FALSE)
		{
				redirect('admin/user/login');	
		}
		$this->load->model('product_m');
	}

	public function index()
	{
		$this->data['products'] = $this->product_m->get_products();

		$this->data['subview'] = 'shop';
		$this->load->view('_layout_main',$this->data);	
	}

	public function add()
	{
		$product = $this->product_m->get_product($this->input->post('id'));
		$insert = array(
			'id' => $this->input->post('id'),
			'qty' => 1,
			'price' => $product->price,
			'name' => $product->title,
			);
		$this->cart->insert($insert);

		//dump($this->cart->insert($insert));
		redirect('/shop');
	}
	public function cart()
	{
		$this->data['subview'] = 'cart';
		$this->load->view('_layout_main',$this->data);	
	}
	public function remove($rowid)
	{
		$data = array(
			'rowid' => $rowid,
			'qty'   => 0
		);
		$this->cart->update($data);
		redirect('/shop');
	}
}