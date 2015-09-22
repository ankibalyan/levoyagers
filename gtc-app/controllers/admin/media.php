<?php
class Media extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('media_m');
	}
	public function index($id=NULL)
	{
		//Fetch all medias
		$this->data['medias']=$this->media_m->get($id,$single=NULL);
		//Load the medias view
		$this->data['subview']= 'admin/media/index';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function process()
	{
		//echo $id;
		if($this->input->post('imgscr'))
			$data['process'] = $this->input->post('imgscr');
		print_r($this->input->post('imgscr'));
		$this->load->view('admin/media/process',$this->data);
	}
	public function edit($id = NULL)
	{	//fetch a media or set a new one
		if($id)
		{
			$this->data['media']=$this->media_m->get($id,TRUE);
			count($this->data['media']) || $this->data['error'][] = 'media could not be found';
		}
		else
		{
			//$this->data['error'][] = 'You have not selected any Comment';
		}
		
		//setup the form
		$rules=$this->media_m->_rules;
		$this->form_validation->set_rules($rules);
		
		//process the form 
		if($this->form_validation->run() == TRUE && !isset($this->data['error']))
		{
			$data = $this->media_m->array_from_post(array('userfile'));
			if($data)
			{
				$image_data=$this->media_m->do_upload();
			}
			//dump($image_data);
			//$this->media_m->save($data,$id);
			//redirect('admin/media');
			
		}
		//load edit view
		$this->data['subview']= 'admin/media/edit';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function upload()
	{	//fetch a media or set a new one
		//setup the form
		$this->form_validation->set_rules('userfile', 'User File', 'trim|is_file|xss_clean');

		
		//process the form 
		if($this->form_validation->run() == TRUE && !isset($this->data['error']))
		{
			$data = $this->media_m->array_from_post(array('userfile'));
			if($data)
			{
				$image_data=$this->media_m->do_upload();
			}

			unset($data['userfile']);
			if(count($image_data) && !isset($image_data['error']))
			{
				$stringToFind = getcwd() ;
				$stringToFind = str_replace('\\', '/', $stringToFind);
				$path = $image_data['file_path'];
				$filepath = base_url();
				$pos = strpos($path, $stringToFind);
				if ($pos === 0) 
				{
	    			$filepath .= substr($path,strlen($stringToFind)+1);    
				}

				$data['title']= $image_data['raw_name'];
				$data['file_name']= $image_data['file_name'];
				$data['file_type']= $image_data['file_type'];
				$data['file_path']= $filepath;
				$data['file_size']= $image_data['file_size'];
				$data['image_width']= $image_data['image_width'];
				$data['image_height']= $image_data['image_height'];
				$data['user_id'] = $this->data['uid'];
				$this->media_m->save($data);
			}
			else
			{
				$this->session->set_flashdata('error',$image_data['error']);
				redirect('admin/media/upload','refresh');
			}
			redirect('admin/media');
			
		}
		//load edit view
		$this->data['subview']= 'admin/media/upload';
		$this->load->view('admin/_layout_main',$this->data);
	}
	public function delete($id = NULL)
	{
		$this->media_m->delete($id);
		redirect('admin/media');
	}
	public function gallery()
	{
		//Fetch all medias
		$this->db->where('file_type','image/jpeg');
		$this->data['medias']=$this->media_m->get();
		//Load the medias view
		$this->data['subview']= 'admin/media/gallery';
		$this->load->view('admin/_layout_modal',$this->data);
	}
}