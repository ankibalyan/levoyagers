<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ex_Cont extends Frontend_Controller {
  public function __construct(){
    parent::__construct();
  }

function elfinder_init()
{

  $this->load->helper('path');
//  die('lib');
  $opts = array(
    //'debug' => true, 
    'roots' => array(
      array( 
        'driver' => 'LocalFileSystem', 
        'path'   => set_realpath('/'), 
        'URL'    => site_url() . '/'
        // more elFinder options here
      ) 
    )
  );

  $this->load->library('elfinder/elfinder_lib', $opts);
}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */