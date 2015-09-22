<?php
class Page extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('page_m');
	}
	public function index()
	{
		//Fetch all pages
		$this->data['pages'] = $this->page_m->get_with_parents(NULL,NULL,'top');
		$this->data['side'] = $this->page_m->get_with_parents(NULL,NULL,'side');
		//Load the pages view
		$this->data['subview'] = 'admin/page/index';
		$this->load->view('admin/_layout_main',$this->data);
	}
	
	public function order($menu = 'top')
	{
		$this->data['sortable']=TRUE;
		//Load the order view
		$this->data['subview']= "admin/page/order/$menu";
		$this->load->view('admin/_layout_main',$this->data);

	}
	public function order_ajax($menu = NULL)
	{
		//Save Order from Ajax
		if(isset($_POST['sortable']))
		{
			$this->page_m->save_order($_POST['sortable']);
		}
		//Fetch all pages
		$this->data['pages'] = $this->page_m->get_nested($menu);
		//Load the pages view
		$this->load->view('admin/page/order_ajax', $this->data);
		

	}	
	
	public function edit($menu=NULL,$id = NULL)
	{	//fetch a page or set a new one
		if($id)
		{
			$this->data['page']=$this->page_m->get($id,TRUE);
			count($this->data['page']) || $this->data['error'][] = 'page could not be found';
		}
		else
		{
			$this->data['page'] = $this->page_m->get_new($menu);
		}
		
		//Pages for drop Down
		$where = array('parent_id'=>0,'menu'=>$menu);
		$this->data['pages_no_parents'] = $this->page_m->get_in_array(NULL,$where);
		//dump($this->data['pages_no_parents']);
		
		//setup the form
		$rules=$this->page_m->_rules;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE)
		{
			$data = $this->page_m->array_from_post(array('title','slug','body','parent_id','template','menu'));
			$this->page_m->save($data,$id);
			redirect('admin/page');
			
		}
		//load edit view
		$this->data['subview']= 'admin/page/edit';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function delete($id = NULL)
	{
		$this->page_m->delete($id);
		redirect('admin/page');
	}

	public function _unique_slug($str)
	{
		//Do NOT Validate, if slug is already exists
		//unless it is the slug for current page
		$id=$this->uri->segment(5);
		$this->db->where('slug',$this->input->post('slug'));
		!$id || $this->db->where('id !=',$id);
		$page=$this->page_m->get();
		if(count($page))
		{
			$this->form_validation->set_message('_unique_slug', '%s should be unique');
			return FALSE;
		}
		return TRUE;
	}	
/*	public function _parent_menu($str)
	{
		//Do NOT Validate, if selected menu  does not match to parent page menu is choosen
		//unless it has the No parent 
//		dump($str);
		if($_POST['parent_id'] != 0)
		{
			$id=$this->uri->segment(5);		
			$this->db->where(array('menu'=>$this->input->post('menu'),'parent_id'=>$this->input->post('parent_id')));
			if(count($page))
			{
				$this->form_validation->set_message('_parent_menu', '%s should match to Parent page menu'.  $_POST['parent_id'] );
				return FALSE;
			}
			return TRUE;
		}
		else		
		return TRUE;
	}
	*/
}