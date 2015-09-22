<?php
class MY_Model extends CI_Model{
	protected $_table_name='';
	protected $_primary_key='id';
	protected $_primary_filter='intval';
	protected $_order_by='';
	public $_rules=array();
	protected $_timestamp=FALSE;
	public function __construct()
	{
		parent::__construct();
	}

	public function array_from_post($fields)
	{
		$data=array();
		foreach($fields as $field)
		{
			$data[$field]=addslashes($this->input->post($field));
		}
		return $data;
	}

	public function get($id=NULL,$single=FALSE)
	{
		if($id != NULL)
		{
			$filter=$this->_primary_filter;
			$id=$filter($id);
			$this->db->where($this->_primary_key,$id);
			$method='row';
		}
		elseif($single == TRUE)
			{$method='row';}
		else
			{$method='result';}
			$this->db->order_by($this->_order_by);

		return $this->db->get($this->_table_name)->$method();
	}

	public function get_by($where,$single=FALSE)
	{
		$this->db->where($where);
		return $this->get(NULL,$single);
	}
	public function save($data, $id=NULL)
	{
	//TimeStamp
		if($this->_timestamp == TRUE)
		{
			$now=date('y-m-d H:i:s');
			$id || $data['created'] = $now;
			$now=date('y-m-d H:i:s');
			$data['modified']=$now;
		}
	//insert
		if($id==NULL)
		{
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key]=NULL;
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id=$this->db->insert_id();
		}
	//Update
		else {
			$filter = $this->_primary_filter;
			$id=$filter($id);
			$this->db->set($data);
			$this->db->where($this->_primary_key,$id);
			$this->db->update($this->_table_name);
		}
		return $id;
	}
		public function delete($id){
			$filter = $this->_primary_filter;
			$id=$filter($id);
			if(!$id)
			{
				return FALSE;
			}
			$this->db->where($this->_primary_key,$id);
			$this->db->limit(1);
			$this->db->delete($this->_table_name);
	}

	public function get_with_parents($id=NULL,$single=NULL,$menu=NULL)
	{
		$this->db->select("$this->_table_name.*, p.slug as parent_slug, p.title as parent_title");
		if($menu) $this->db->where(array("$this->_table_name.menu"=>$menu));
		$this->db->join("$this->_table_name as p", "$this->_table_name.parent_id=p.id",'left');
		return $this->get($id,$single);
	}


		public function get_in_array($id=NULL,$where=NULL,$single = FALSE)
	{
		//Fetch Items without parents
		$this->db->select('id, title');
		if($where) $this->db->where($where);
		$items = $this->get($id,$single);
		//retrun key => Value pair array
		$array = array('0' => '--None--');
		if(count($items))
		{
			foreach($items as $item)
			{
				$array[$item->id] = $item->title;

			}
		}
		return $array;
	}
		public function set_published()
	{
		$this->db->where('pub_date <=', date('Y-m-d'));
	}

	public function get_with_join($id=NULL,$single=NULL)
	{
		$this->db->select("$this->_table_name.*,m.file_name as media_image");
		$this->db->join("medias as m", "$this->_table_name.image=m.id",'left');
		if($id)
		{
			$where = array("$this->_table_name.id"=>$id);
			return parent::$this->get_by($where,$single);
		}
		else
		return parent::$this->get();
	}
}