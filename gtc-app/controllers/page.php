<?php  
class Page extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();	
		$this->load->model('page_m');
		$this->load->model('testimony_m');
	}
	
	public function index($id = NULL)
	{
//		dump($this->uri->segment(1));
//		$this->data['articles']=$this->article_m->get();
		$this->data['page'] = $this->page_m->get_by(array('slug'=> (string) $this->uri->segment(1)),TRUE);
		$this->load->library('shortcodes');
    	$this->data['page']->body = $this->shortcodes->parse($this->data['page']->body);
		count($this->data['page']) || show_404(current_url());
		
		add_meta_title($this->data['page']->title);
//		echo '<pre>' . $this->db->last_query() . '</pre>';
		$method = '_'.$this->data['page']->template;

		if(method_exists($this,$method))
		{
			$this->$method($id);
		}
		else
		{
			log_message('error','Could not load template '. $method . ' in file '. __FILE__ .' at line ' . __LINE__ . PHP_EOL);
			show_error('Could not load template '. $method);
		}
// Load View
		$this->data['subview'] = $this->data['page']->template;
		$this->load->view('_layout_main',$this->data);	
	}
	
	private function _page()
	{
		$this->data['recent_news']=$this->article_m->get_recent();
	}
	private function _homepage()
	{
		$this->db->limit(6);
		$this->package_m->set_published();
		$this->db->where(array('packages.featured'=>1));
		$this->data['packages']=$this->package_m->get_with_join();
		$this->data['recent_news'] = $this->article_m->get_recent(2);
		$this->data['testimonys'] = $this->testimony_m->get();
	}

	private function _packages($id = NULL)
	{
		$this->db->limit(6);
		$this->package_m->set_published();
		$this->data['packages']=$this->package_m->get_with_join();
		//$this->data['recent_news'] = $this->article_m->get_recent();
	}
	private function _contact()
	{
		$this->load->model('enquire_m');
		$this->db->select('value')->where(array('title'=>'_wc_site_address','status'=>1));
		$option = $this->db->get('settings')->row();
		if(count($option)) $this->data['meta_addresses']=$option->value;
		else $this->data['meta_addresses']=config_item('meta_addresses');
		$this->data['meta_addresses'] = explode(',', $this->data['meta_addresses']);

		$this->db->select('value')->where(array('title'=>'_wc_site_telephone','status'=>1));
		$option = $this->db->get('settings')->row();
		if(count($option)) $this->data['meta_telephones']=$option->value;
		else $this->data['meta_telephones']=config_item('meta_telephones');
		$this->data['meta_telephones'] = explode(',', $this->data['meta_telephones']);

		$this->db->select('value')->where(array('title'=>'_wc_site_email','status'=>1));
		$option = $this->db->get('settings')->row();
		if(count($option)) $this->data['meta_emails']=$option->value;
		else $this->data['meta_emails']=config_item('meta_emails');
		$this->data['meta_emails'] = explode(',', $this->data['meta_emails']);
		//dump($this->data['meta_telephones']);

		$this->load->library('form_validation', array(), 'contact_form');
		$this->contact_form->set_rules('name','Name','trim|required|xss_clean');
		$this->contact_form->set_rules('email','Email','trim|required|valid_email|xss_clean');
		$this->contact_form->set_rules('subject','Subject','trim|required|alpha_num|xss_clean');
		$this->contact_form->set_rules('message','Message','trim|required|alpha_num|xss_clean');
		if($this->contact_form->run()===TRUE)
		{
			$data = $this->enquire_m->array_from_post(array('name','email','subject','message'));			
			$this->enquire_m->save($data);
		}
	}
	private function _news_archive()
	{
		$this->data['recent_articles'] = $this->article_m->get_recent();
		$this->article_m->set_published();
		$count = $this->db->count_all_results('articles');
		$perpage =10;
		if($count>$perpage)
		{
			$this->load->library('pagination');			
			$config['base_url'] = site_url($this->uri->segment(1).'/');
			$config['total_rows'] = $count;
			$config['per_page'] = $perpage;
			$config['uri_segment'] = 2; 
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config); 
			$this->data['pagination'] = $this->pagination->create_links();
			$offset= $this->uri->segment(2);
		}
		else
		{
			$this->data['pagination']='';
			$offset=0;	
		}
		
		//fetch aricles
		$this->db->limit($perpage,$offset);
		$this->data['articles']=$this->article_m->get();
//		echo '<pre>'.$this->db->last_query().'</pre>';
	}

	private function _blog()
	{
		$this->data['recent_posts'] = $this->post_m->get_recent();
		$this->article_m->set_published();
		$count = $this->db->count_all_results('posts');
		$perpage =10;
		if($count>$perpage)
		{
			$this->load->library('pagination');			
			$config['base_url'] = site_url($this->uri->segment(1).'/');
			$config['total_rows'] = $count;
			$config['per_page'] = $perpage;
			$config['uri_segment'] = 2; 
			$config['use_page_numbers'] = TRUE;
			$this->pagination->initialize($config); 
			$this->data['pagination'] = $this->pagination->create_links();
			$offset= $this->uri->segment(2);
		}
		else
		{
			$this->data['pagination']='';
			$offset=0;	
		}
		
		//fetch aricles
		$this->db->limit($perpage,$offset);
		$this->data['posts']=$this->post_m->get_recent();
//		echo '<pre>'.$this->db->last_query().'</pre>';
	}
}