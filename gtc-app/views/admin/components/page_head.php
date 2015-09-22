<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $meta_title; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('wc-load/theme/css/bootstrap.min.css');?>"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url('wc-load/theme/css/bootstrap-theme.min.css');?>"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url('wc-load/theme/css/admin.css');?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('wc-load/theme/css/datepicker.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('wc-load/theme/css/base/minified/jquery-ui.min.css');?>">
<link rel="shortcut icon" href="<?php echo base_url('wc-load/images/compin.png');?>">
<script type="text/javascript" src="<?php echo base_url('wc-load/theme/js/jquery-1.10.2.min.js');?>"></script>    
<script type="text/javascript" src="<?php echo base_url('wc-load/theme/js/bootstrap.min.js');?>"></script>    
<script type="text/javascript" src="<?php echo base_url('wc-load/theme/js/bootstrap-datepicker.js');?>"></script>    
<script type="text/javascript" src="<?php echo base_url('wc-load/theme/js/jquery-ui.min.js');?>"></script>
<?php if(isset ($sortable) && $sortable === TRUE): ?>
<script type="text/javascript" src="<?php echo base_url('wc-load/theme/js/jquery.mjs.nestedSortable.js');?>"></script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo base_url('wc-load/theme/js/ckeditor/ckeditor.js');?>"></script>

<!-- <link rel="stylesheet" type="text/css" media="screen" href="<?php //echo base_url('wc-load/theme/js/elfinder/css/elfinder.min.css');?>">
<script type="text/javascript" src="<?php// echo base_url('wc-load/theme/js/elfinder/js/elfinder.min.js');?>"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php// echo base_url('wc-load/theme/js/elfinder/css/theme.css');?>"> -->
    <!--[if lt IE 9]><script src="<?php echo base_url('wc-load/theme/js/ie8-responsive-file-warning.js');?>"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo base_url('wc-load/theme/js/ie8-responsive-file-warning.js');?>"></script>
      <script src="<?php echo base_url('wc-load/theme/js/html5shiv.js');?>"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>