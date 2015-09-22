<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Destination extends MY_Model
{
    protected $_table_name='locations';
    protected $_order_by='id';
    protected $_timestamp = TRUE;
    function __construct ()
    {
        parent::__construct();
    }

    public function run ($params = array())
    {
        //dump($params);
        $this->db->select("locations.*, c.title as package_category,m.file_name as media_image");
        $this->db->join("category as c", "locations.category_id=c.id",'left');
        $this->db->join("medias as m", "locations.image=m.id",'left');
        if(isset($params['category_id']))
        {
        $where =  array('locations.category_id'=>$params['category_id']);
        $ARRs = parent::get_by($where);
        }
        else
        $ARRs = parent::get();

        //isset($params['category_id']) ? $where = array('packages.category_id'=>$params['category_id']) : NULL;

        $str = '';
        //dump($ARRs);
        foreach ($ARRs as $package):
            $str .= '<div class="destination-places-grids">';
            $str .= '<div class="destination-places-grid last-d-grid" onclick="location.href=\'/location/'.$package->id.'\';">';
            $str .= '<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">';
            $str .= '<img src="'.base_url('wc-upload/gallery').'/'.$package->media_image.'" title="'.$package->title.'" width="480" height="180" />';
            $str .= '<a href="#" class="popup"> </a>';
            $str .= '<a href="#" class="popup2"> </a>';
            $str .= '</div>';
            $str .= '<div class="dest-place-opt">';

            $str .= '<ul class="dest-place-opt-cast">';
            $str .= '<li><a class="d-place" href="#">'.$package->package_category.' : </a></li>';
            $str .= '<li><a class="d-place" href="#"> : '.$package->title.'</a></li>';

            $str .= '<div class="clear"></div>';
            $str .= '</ul>';
            $str .= '</div>';
            $str .= '</div>';
          endforeach;
            $str .= '<div class="clear"></div>';
            $str .= '</div>';
        return $str;
    }
}