<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Maps extends CI_Model
{
    function __construct ()
    {
        parent::__construct();
    }
    
    public function run($params = array()){
    
        $lat = isset($params['lat']) ? $params['lat'] : '0';
        $lon = isset($params['lon']) ? $params['lon'] : '0';        
        $str = '<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://ongopongo.com/maps/embed.php?z=18&la='.$lat.'&lo='.$lon.'&h=350&w=100%&msid=&type=G_NORMAL_MAP&b=yes"></iframe>';
        https://maps.google.com/maps/ms?msid=214738983678512361401.0004609e0fcc239c4f792&msa=0&ll=46.81084,-71.221018&spn=0.009179,0.020964
        return $str;
    }
}