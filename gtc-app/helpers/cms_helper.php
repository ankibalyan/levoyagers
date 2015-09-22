<?php
function add_meta_title($str)
{
	$CI =& get_instance();
	$CI->data['meta_title'] = e($str).' - '. $CI->data['meta_title'];
}

function btn_edit($uri)
{
	return anchor($uri,'<i class="glyphicon glyphicon-edit"></i>');
}
function btn_delete($uri)
{
	return anchor($uri,'<i class="glyphicon glyphicon-remove"></i>',array('onclick'=>"return confirm('You are about to delete a record. This can not be undone. Are you sure?');"));
}
function e($string)
{
	return htmlentities($string);
}

function get_menu($array, $child = FALSE)
	{
		$CI =& get_instance();
		$str = '';		
		if(count($array))
		{
			$str .=  $child==FALSE ? '<ul class="flexy-menu thick orange">'. PHP_EOL :  '<ul>' . PHP_EOL;
			
			foreach($array as $item)
			{
				$active = $CI->uri->segment(1) == $item['slug'] ?TRUE : FALSE;
 				if(isset($item['children']	) && count($item['children']))
				{
					$str .= $active ? '<li class="active">' : '<li>';
					$str .='<a href="' . site_url(e($item['slug'])) . '">';
					$str .= e($item['title']). ' <b class="caret"></b> </a>'. PHP_EOL;
					$str .= get_menu($item['children'], TRUE);
				}
				else
				{
					$str .= $active ?'<li class="active">' : '<li>';
					$str .='<a  href="' . site_url(e($item['slug'])) . '">' . e($item['title']). '</a>';					
				}

				$str .= '</li>' . PHP_EOL;
			}
			$str .= '</ul>' . PHP_EOL;
		}
		return $str;
}

function get_bottom_menu($array, $child = FALSE)
	{
		$CI =& get_instance();
		$str = '';		
		if(count($array))
		{
			$str .=  '<ul>'. PHP_EOL;
			foreach($array as $item)
			{
				$active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
 				if(isset($item['children']	) && count($item['children']))
				{
					$str .= $active ? '<li class="active">' : '<li>';
					$str .='<a href="' . site_url(e($item['slug'])) . '">';
					$str .= e($item['title']). ' <b class="caret"></b> </a>'. PHP_EOL;
				}
				else
				{
					$str .= $active ?'<li class="active">' : '<li>';
					$str .='<a  href="' . site_url(e($item['slug'])) . '">' . e($item['title']). '</a>';					
				}

				$str .= '<span>::</span></li>' . PHP_EOL;
			}
			$str .= '</ul>' . PHP_EOL;
		}
		return $str;
}

function get_page($page)
{
	$str ='<div class="wrap">';
	$str .='<div class="services-header">';
	$str .= '<h3>' . e($page->title) . '</h3>';
	$str .='</div>';
	//$str .= '<p class="pubdate">' . e($page->pubdate) . '</p>';
	$str .= '<p>'.$page->body.'</p>';	
	$str .='</div>';
	$str .='</div>';
	return $str;
}
function get_article($article)
{
	$url ='article/' . intval($article->id) . '/'.e($article->slug);
	$str ='<div class="about-us">';
	$str .='<div class="about-header">';
	$str .= '<h3>' . e($article->title) . '</h3>';
	$str .='</div>';
	$str .='<div class="about-info">';
	$str .= '<p class="pubdate">' . e($article->pub_date) . '</p>';
	$str .= '<p>'.$article->body.'</p>';	
	$str .='</div>';
	$str .='</div>';
	return $str;
}

function get_post($post)
{
	$url ='post/' . intval($post->id) . '/';
	$str = '<div class="blog-grid">';
	$str .= '<div class="blog-poast-head">';
	$str .= '<div class="blog-art-pic">';
	$str .= '<a class="post-pic" href="#"> <img src="'.base_url('wc-upload/gallery').'/'.$post->media_image.'" title="'. e($post->title) .'" width="490" height="330" /></a>';
	$str .= '</div>';
	$str .= '<div class="blog-poast-admin">';
	$str .= '<a href="#"><img src="/wc-upload/gallery/admin-pic1.jpg" title="admin" /></a>';
	$str .= '</div>';
	$str .= '<div class="blog-poast-info">';
	$str .= '<ul>';
	$str .= '<li><a class="admin" href="#"><span> </span> Admin </a></li>';
	$str .= '<li><a class="p-date" href="#"><span> </span>' . e($post->pub_date) . '</a></li>';
	$str .= '<li><a class="p-blog" href="#"><span> </span>Blog,News</a></li>';
	$str .= '<div class="clear"> </div>';
	$str .= '</ul>';
	$str .= '</div>';
	$str .= '</div>';
	$str .= '<div class="blog-info">';
	$str .= '<h3><a href="#">' . e($post->title) . '</a></h3>';
	$str .= '' . $post->post . '</p>';
	$str .= '<a class="btn" href="#">DeTails</a>';
	$str .= '</div>';
	$str .= '</div>';
	return $str;
}
function get_excerpt($articles,$numwords=100)
{
	$str = '';
	$i=1;
	if(count($articles)) : foreach($articles as $article):
	$url ='article/' . intval($article->id) . '/'.e($article->slug);	
	//echo '<h2>'.$i.'</h2>';
	//($i%2)?$str .='<div class="section group group">':$str .='';
	if($i%2 != 0):
		$str .='<div class="section group">'.PHP_EOL;
	else:
		$str .='';
	endif;
	//$str .='<div class="section group group">';
    $str .='<div class="listview_1_of_2 images_1_of_2">'.PHP_EOL;
	$str .='<div class="listimg listimg_2_of_1">'.PHP_EOL;
	$str .='<img src="images/res.png">'.PHP_EOL;
	$str .='</div>'.PHP_EOL;
	$str .='<div class="text list_2_of_1">'.PHP_EOL;
	$str .='<h3>'. anchor($url,e($article->title)) . '</h3>';
	$str .='<h4>Sed ut perspiciatis undeaccusantium .</h4>'.PHP_EOL;
	$str .= '<p class="pubdate">' . e($article->pub_date) . '</p>';
	$str .= '<p>'.limit_to_numwords($article->body,$numwords) .' ... </p>'.PHP_EOL;
	$str .= anchor($url,'Read More',array('title' => e($article->title),'class'=>'btn') );
	$str .='</div></div>'.PHP_EOL;	
	$i++;
	endforeach; endif;
	return $str;
}
function limit_to_numwords($str,$numwords)
{
/*	$excerpt = explode(' ',$str,$numwords+1);
	if(count($excerpt)>=$numwords)
	{
		array_pop($excerpt);
	}
	
	$excerpt = implode(' ',$excerpt);
*/
	
	$excerpt= substr($str,0,$numwords+1);
	return $excerpt;
}

function article_link($article)
{
	return 'article/'. intval($article->id).'/'.e($article->slug);
}

function article_links($array)
{		
		$str =  '<ul>'. PHP_EOL ; 
		foreach($array as $item)
			{
				$url = article_link($item);					
				$str.='<li>';
				$str .= '<h3>'. anchor($url,e($item->title)) .' ></h3>';
				$str .= '<p class="pub_date">'.e($item->pub_date).'</p>';
				$str .= '</li>';
			}
			$str .= PHP_EOL;
		return $str;
}

if(!function_exists('ins_gallery'))
{
	function ins_gallery()
	{
		$str = "";
		$str .= '<div class="modal fade" id="mymod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
		$str .= '<div class="modal-dialog">';
		$str .= '<div class="modal-content">';
		$str .= '<div class="modal-header">';
		$str .= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
		//$str .= '<h4 class="modal-title" id="myModalLabel">Edit</h4>';
		$str .= '</div>';
		$str .= '<div class="modal-body">';
		$str .= '<div class="proedit">';
		//fetched contetnt from ajax is to be placed here
		// /$str .= '</div>';
		//$str .= '<div class="modal-footer">';
		//$str .= '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
		//$str .= '<button type="button" class="btn btn-primary">Save changes</button>';
		$str .= '</div></div></div>';
      return $str;
	}
}
function get_subscriber()
{
if(validation_errors())     
   {
?>      		
			<div class="alert alert-danger">
				<?php echo validation_errors(); ?>
		    </div>
<?php }
	echo form_open('subscriber');
	$data=array('name'=>'semail','title'=>'Email','class'=>'email');
	echo form_input($data);
	echo form_submit('submit','subscribe','class="btn btn-primary"');
	echo form_close();  
}

function get_enquire_form($form=NULL)
{
	$str ='';
	$str ='<article class="article">';
	$str .='<h2> Enquire Your Query below,</h2>';
	$str .='<p> Or Email us at info@icubank.in </p>';
  if(validation_errors())     
   {      		
		$str .= '<div class="alert alert-danger">';
		$str .= validation_errors();
		$str .= '</div>';
	} 	
	$str .=  form_open();
	$str .= form_fieldset('Clear Your Doubts');
	$str .= '<div class="pull-left " height="100%" width="100%">';
	$str .= '<img src="'.base_url('wc-load/theme/img/enquireicub.png').'" width="300px" height="260px">';
	$str .= '</div>';
	$str .= '<div class="pull-right">';
	$str .=  form_label('Name','name');
	$data=array('name'=>'name','title'=>'Name','id'=>'name'); $str .=  form_input($data,set_value('name',$form->name));						
	$str .= '<br>';
	$str .=  form_label('Email','email'); 
	$data=array('name'=>'email','title'=>'Email','id'=>'email'); $str .=  form_input($data,set_value('email',$form->email));
	$str .= '<br>';
	$str .=  form_label('Message','message'); 
	$data=array('name'=>'message','title'=>'Message','id'=>'message','rows' => '5', 'width'=> '100%',
	'cols' => '53');
	$str .=  form_textarea($data,set_value('message',$form->message)).'<br>';
	$str .=  form_submit('enquire','Send Query','class="btn btn-success"');
	$str .= '</div>';
	$str .='<div class="clear"></div>';
	$str .=  form_fieldset_close();  
	$str .=  form_close(); 
	$str .='</article>';
	return $str;
}
//Dum Helper
if(!function_exists('dump'))
{
	function dump($var,$label='dump',$echo=TRUE)
	{
		//Store the dump variable
		ob_start();
		var_dump($var);
		$output = ob_get_clean();
		
		//Add Formating
		$output = preg_replace("/\]\=\>\n(\s+)/m","] => ",$output);
		$output = '<pre style="background:fff; color:000; border: 1px dotted #000; padding:10px; margin 10px 0; text-align:left;">' . $label . '=>' . $output . '</pre>';
		
		//output
		if($echo == TRUE)
		{
			echo $output;
		}
		else
		{
			return $output;
		}
	}
}

if(!function_exists('dump_exit'))
{
	function dump_exit($var, $label='dump', $echo = TRUE)
	{
		dump($var,$label,$echo);
		exit;
	
	}
}