<?php 
class Page_m extends MY_Model
{
	protected $_table_name='pages';
	protected $_order_by='parent_id, order';
	public $_rules= array(
			'parent_id' => array(
			'field' => 'parent_id',
			'label' =>'Parent',
			'rules' =>'trim|intval'
		),
		'template' => array(
			'field' => 'template',
			'label' =>'Template',
			'rules' =>'trim|required|xss_clean',
		),
		'title' => array(
			'field' => 'title',
			'label' =>'Title',
			'rules' =>'trim|required|max_lenght[100]|xss_clean',
		),
		'slug' => array(
			'field' => 'slug',
			'label' =>'Slug',
			'rules' =>'trim|required|max_lenght[100]|url_title|callback__unique_slug|xss_clean',
		),
		'body' => array(
			'field' => 'body',
			'label' =>'Body',
			'rules' =>'trim|required'
		),
		'menu' => array(
			'field' => 'menu',
			'label' =>'Menu',
			'rules' =>'trim|required|xss_clean',
		),
	);
	
	public function get_new($menu=NULL)
	{
		$page = new stdClass();
		$page->title = '';
		$page->slug = '';
		$page->body = '';
		$page->parent_id = 0;
		$page->template='page';
		$page->menu=$menu;
		return $page;
	}

	public function get_archive_link()
	{
		$page = parent::get_by(array('template'=>'news_archive'),TRUE);
		return isset($page->slug) ? $page->slug : ''; 
	}
	
	public function delete($id)
	{	
		//delete a page
		parent::delete($id);
		
		//reset parent ID for  its children
		$this->db->set(array('parent_id'=>0))->where('parent_id',$id)->update($this->_table_name );
	}

	public function get_nested($menu=NULL)
	{
		$this->db->order_by($this->_order_by);
		$this->db->where('menu',$menu);
		$pages = $this->db->get('pages')->result_array();

		$array = array();
		foreach($pages as $page)
		{
			if(!$page['parent_id'])
			{
				$array[$page['id']] = $page;
			}
			
			else
			{
				$array[$page['parent_id']] ['children'][] = $page;
			}
		}
		return $array;
	}
	
	public function save_order($pages)
	{
		if(count($pages))
		{
			foreach($pages as $order => $page)
			{
				if($page['item_id']  != '')
				{
					$data = array('parent_id' => (int) $page['parent_id'], 'order' => $order);
					$this->db->set($data)->where($this->_primary_key , $page['item_id'])->update($this->_table_name);
				}
			}	
		}
	}
}