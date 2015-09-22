<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Model
{
protected $_table_name='packages';
    protected $_order_by='id';
    protected $_timestamp = TRUE;
    function __construct ()
    {
        parent::__construct();
    }

    public function run ($params = array())
    {
        //dump($params);
        $this->db->select("packages.*, l.title as package_location,
            c.title as package_category,s.title as package_scheme,
            h.title as package_hotel,t.title as package_transport,
            m.file_name as media_image");
        $this->db->join("locations as l", "packages.location_id=l.id",'left');
        $this->db->join("category as c", "packages.category_id=c.id",'left');
        $this->db->join("schemes as s", "packages.scheme_id=s.id",'left');
        $this->db->join("hotels as h", "packages.hotel_id=h.id",'left');
        $this->db->join("transports as t", "packages.transport_id=h.id",'left');
        $this->db->join("medias as m", "packages.image=m.id",'left');
        if(isset($params['category_id']))
        {
            $where =  array('packages.category_id'=>$params['category_id']);    
            $ARRs = parent::get_by($where);
        }
        else
            $ARRs = parent::get();   

        //isset($params['category_id']) ? $where = array('packages.category_id'=>$params['category_id']) : NULL;
        
        $str = '';
        //dump($ARRs);
        foreach ($ARRs as $package):
            $str .= '<div class="destination-places-grids">';
            $str .= '<div class="destination-places-grid last-d-grid" onclick="location.href=\'/package/'.$package->id.'\';">';
            $str .= '<div class="dest-place-pic main_box user_style4" data-hipop="two-horizontal">';
            $str .= '<img src="'.base_url('wc-upload/gallery').'/'.$package->media_image.'" title="'.$package->title.'" width="480" height="180" />';
            $str .= '<a href="#" class="popup"> </a>';
            $str .= '<a href="#" class="popup2"> </a>';
            $str .= '</div>';
            $str .= '<div class="dest-place-opt">';
            $str .= '<ul class="dest-place-opt-fea">';
            $str .= '<li><a class="hot" href="#"><span> </span>'.$package->package_hotel.'</a></li>';
            $str .= '<li><a class="plain" href="#"><span> </span>'.$package->package_transport.'</a></li>';
            $str .= '<li><a class="Breakfast" href="#"><span> </span>'.$package->package_scheme.'</a></li>';
            $str .= '<div class="clear"></div>';
            $str .= '</ul>';
            $str .= '<ul class="dest-place-opt-cast">';
            $str .= '<li><a class="d-place" href="#">'.$package->package_location.'</a></li>';
            $str .= '<li><a class="d-price" href="#">Starting Form '.$package->price.'</a></li>';
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