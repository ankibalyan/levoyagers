<?php
/*
 ________________________________
|______________________(o)_______|
  ____    __     _      _   ||
 /    \  |  \   | |  /  H   ||
|  ..  | | | \  | | /   H   ||
|  __  | | |  \ | |/\   H   ||
|_|  |_| | |   \| |  \ _H_  ||

*/?>
<?php $this->load->view('admin/components/page_head'); ?>
<body>
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
<div class="container container-fluid">
  <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
  <a class="navbar-brand" href="<?php echo site_url('admin/dashboard');?>"><?php echo $meta_title; ?></a></div>
    <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo site_url('');?>">View Site</a></li>
      <li><?php echo anchor('admin/user','Users');?></li>
      <li><?php echo anchor('admin/article','News Articles');?></li>
      </li>
    </ul>
              <ul class="nav navbar-nav navbar-right">
              <?php $email = $this->session->userdata('email'); 
			  		$name = $this->session->userdata('name');
					$id = $this->session->userdata('id');
			  ?>
            <li class="active"><?php echo mailto($email,'<i class="glyphicon glyphicon-user"></i>'.'&nbsp;'.$name.' !');?></li>
            <li><?php echo anchor('admin/user/logout','<i class="glyphicon glyphicon-log-out"></i> Logout');?></li>
          </ul>
  </div>
  </div>
</div>

<div class="container container-fluid container-main" role="dialog" style="margin-top:50px;">
      <div class="row">
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
        <?php $data = array('name' =>$name); ?>
          <?php echo $this->load->view('admin/sidebar',$data,TRUE); ?>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
        <section>
			<?php $this->load->view($subview); ?>
        </section>
        </div>
      </div>
    <div class="popup_bk" id="popup_bk"></div>
    <div class="popup_gal" id="popup_bk"></div>
</div>
<script type="text/javascript">
  $(document).ready(function($) {
    $("#accordion").accordion({
      heightStyle: "content",
      active:false,
      animate:{
        easing:"linear",
        duration:100,
        down:{
          easing:"easeOutBounce",
          duration:500
        }
      },
      collapsible:true
    });
    function close () {
        $(".popup_gal").hide(); 
        $(".popup_bk").hide();
    }
    $('.actlink').click(function(event) {
        event.preventDefault();
        $(".popup_gal").load("/admin/media/gallery").fadeIn('slow'); 
        $(".popup_bk").fadeIn('slow');
    }).stop();
    $('.popup_bk').click(function() {
        close();
    });
  });
</script>
<div style="clear:both" class="clear-fix"></div>
<?php $this->load->view('admin/components/page_foot'); ?>