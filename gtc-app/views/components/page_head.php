                                <!--
Author: Ankit Balyan
-->
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?php echo $meta_title; ?></title>
		<meta name="google-site-verification" content="s7KtZIKu7BalA3PsrdPbgE_zW6zTYNW1a_80raid4Yw" />
		<meta charset="UTF-8">
		<meta name="description" content="<?php echo $meta_description; ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="">
		<link rel="stylesheet" href="<?php echo base_url('wc-load/theme/css/style.css');?>" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url('wc-load/theme/css/jquery.bxslider.css');?>" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url('wc-load/theme/css/jquery-ui.css');?>"  />
		<link rel="stylesheet" href="<?php echo base_url('wc-load/theme/css/flexslider.css');?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url('wc-load/theme/css/responsiveslides.css');?>" type="text/css" media="screen" />
		<link rel="shortcut icon" href="<?php echo base_url('wc-load/images/air.png');?>">
		<script src="<?php echo base_url('wc-load/theme/js/jquery.min.js');?>"></script>
		<script src="<?php echo base_url('wc-load/theme/js/flexy-menu.js');?>"></script>
		<script src="<?php echo base_url('wc-load/theme/js/jquery-ui.min.js');?>" ></script>
		<script src="<?php echo base_url('wc-load/theme/js/responsiveslides.min.js');?>"></script>
		<script src="<?php echo base_url('wc-load/theme/js/jquery.bxslider.js');?>"></script>
		<script src="<?php echo base_url('wc-load/theme/js/css3-mediaqueries.js');?>"></script>
		<script src="<?php echo base_url('wc-load/theme/js/jquery.flexslider.js');?>"></script>
		<!----search-scripts---->
		<script src="<?php echo base_url('wc-load/theme/js/modernizr.custom.js');?>"></script>
		<script src="<?php echo base_url('wc-load/theme/js/classie.js');?>"></script>
		<script src="<?php echo base_url('wc-load/theme/js/uisearch.js');?>"></script>
		<script>
		new UISearch( document.getElementById( 'sb-search' ) );
		</script>
		<!----//search-scripts---->
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
				<!----start-top-nav-script---->
		<script type="text/javascript">$(document).ready(function(){$(".flexy-menu").flexymenu({speed: 400,type: "horizontal",align: "right"});});</script>
		<!----//End-top-nav-script---->
		<!---script-->
			<script type="text/javascript">
				$(document).ready(function(){
					$('.bxslider').bxSlider({
						 auto: true,
 						 autoControls: true,
						 minSlides: 4,
						 maxSlides: 4,
						 slideWidth:450,
						 slideMargin: 10
					});
				});
			</script>
		<!---//script---->
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 2500,
			        speed: 600
			      });
			});
		  </script>
	</head>
                            