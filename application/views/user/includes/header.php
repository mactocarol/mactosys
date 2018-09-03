<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$title?> | allAboutTheMusic </title>
<link href="<?php echo base_url('front');?>/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url('front');?>/css/bootstrap.min.css" rel="stylesheet">
<!--<link href="<?php echo base_url('front');?>/css/bannerscollection_zoominout.css" rel="stylesheet" type="text/css">-->
<link href="<?php echo base_url('front');?>/css/tab.css" rel="stylesheet">
<link href="<?php echo base_url('front');?>/css/gallery.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('front');?>/css/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url('front');?>/css/bootstrap-select.min.css">

<link href="<?php echo base_url('front');?>/css/bootstrap-multiselect.min.css" rel="stylesheet">
<!--<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">-->
<link rel="stylesheet" href="<?php echo base_url('front');?>/css/croppie.css">
<link href="<?php echo base_url('assets');?>/style_progress.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('front');?>/css/style.css" rel="stylesheet">
<script src="<?php echo base_url('front');?>/js/jquery.min.js"></script>
<script src="<?php echo base_url('front');?>/js/bootstrap.min.js"></script>


</head>

<body>
<div id="preloader"></div>
<div class="pace pace-inactive"><div class="line-1" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99"></div><div class="line-2"></div><div class="line-3"></div><div class="line-4"></div><div class="line-5"></div><div class="line-6"></div><div class="line-5"></div><div class="line-4"></div><div class="line-3"></div><div class="line-2"></div><div class="line-1"></div></div>
<section class="slider_wrap inner_page">
 <header class="row">
 <div class="container">
    <div class="top_panel_middle col-md-12">
    	<div class="row">
    	<div class="col-md-2 col-sm-2 logo_panel"><a href="#" class="logo"><img src="<?php echo base_url('front');?>/images/logo.png"></a></div>
        <div class="col-md-10 col-sm-10 menu_panel">
        	<div class="navbar-header">
          		<button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        	</div>
            <div class="navbar-inverse side-collapse in text-uppercase">
              <nav role="navigation" class="navbar-collapse">                
                
                <div class="other_info pull-right">
                	<a href="<?php echo site_url('jobs/post');?>" class="btn btn-primary">+ Post job</a>
                    <a href="<?php echo site_url('products/cart_view');?>" ><?=count($this->cart->contents())?> <i class="fa fa-shopping-cart"></i></a>
                        <?php if(!$this->session->userdata('email')) { ?>
                           <a href="<?php echo site_url('user/register'); ?>"><i class="fa fa-key"></i>sign up</a>
                           <a href="<?php echo site_url('user'); ?>"><i class="fa fa-unlock"></i>login</a>
                           <?php } else {?>
                           <ul class="pull-right"><li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>upload/profile_image/thumb/<?=$result->image?>" class="img30_30 img-circle">
                                    <span><?php print_r($this->session->userdata('email'));?></span> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                  <li><a href="<?php echo site_url('user/profile'); ?>"><i class="fa fa-user"></i> Profile</a></li>
                                  <li><a href="<?php echo site_url('user/dashboard'); ?>"><i class="fa fa-gear"></i> My Account</a></li>
                                  <li><a href="<?php echo site_url('user/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                  
                                </ul>
                              </li>
                              </ul>
                           <?php } ?>
                </div>
                <ul class="nav navbar-nav pull-right">
                            <li class="<?php if($page == 'home') echo 'active';?>"><a href="<?php echo site_url('Home'); ?>">home</a>
                            <div class="equalizer">
										<span class="bar bar-1"></span><span class="bar bar-2"></span><span class="bar bar-3"></span><span class="bar bar-4"></span><span class="bar bar-5"></span><span class="bar bar-6"></span><span class="bar bar-7"></span><span class="bar bar-8"></span><span class="bar bar-9"></span><span class="bar bar-10"></span>
							</div>
                                    </li>
                            <li class="<?php if($page == 'about_us') echo 'active';?>"><a href="<?php echo site_url('About-us'); ?>">about us</a>
                            <div class="equalizer">
										<span class="bar bar-1"></span><span class="bar bar-2"></span><span class="bar bar-3"></span><span class="bar bar-4"></span><span class="bar bar-5"></span><span class="bar bar-6"></span><span class="bar bar-7"></span><span class="bar bar-8"></span><span class="bar bar-9"></span><span class="bar bar-10"></span>
							</div>
                            </li>
                            <li class="<?php if($page == 'search') echo 'active';?>"><a href="<?php echo site_url('search'); ?>">search talent</a>
                            <div class="equalizer">
										<span class="bar bar-1"></span><span class="bar bar-2"></span><span class="bar bar-3"></span><span class="bar bar-4"></span><span class="bar bar-5"></span><span class="bar bar-6"></span><span class="bar bar-7"></span><span class="bar bar-8"></span><span class="bar bar-9"></span><span class="bar bar-10"></span>
							</div>
                            </li>
                            <li class="<?php if($page == 'job_search') echo 'active';?>"><a href="<?php echo site_url('jobs/search'); ?>">search jobs</a>
                            <div class="equalizer">
										<span class="bar bar-1"></span><span class="bar bar-2"></span><span class="bar bar-3"></span><span class="bar bar-4"></span><span class="bar bar-5"></span><span class="bar bar-6"></span><span class="bar bar-7"></span><span class="bar bar-8"></span><span class="bar bar-9"></span><span class="bar bar-10"></span>
							</div>
                            </li>
                            <li class="<?php if($page == 'blogs') echo 'active';?>"><a href="<?php echo site_url('Blogs'); ?>">blog</a>
                            <div class="equalizer">
										<span class="bar bar-1"></span><span class="bar bar-2"></span><span class="bar bar-3"></span><span class="bar bar-4"></span><span class="bar bar-5"></span><span class="bar bar-6"></span><span class="bar bar-7"></span><span class="bar bar-8"></span><span class="bar bar-9"></span><span class="bar bar-10"></span>
							</div>
                            </li>
                            <li class="<?php if($page == 'contact_us') echo 'active';?>"><a href="<?php echo site_url('Contact-us'); ?>">contact us</a>
                            <div class="equalizer">
										<span class="bar bar-1"></span><span class="bar bar-2"></span><span class="bar bar-3"></span><span class="bar bar-4"></span><span class="bar bar-5"></span><span class="bar bar-6"></span><span class="bar bar-7"></span><span class="bar bar-8"></span><span class="bar bar-9"></span><span class="bar bar-10"></span>
							</div>
                            </li>
                           
                </ul>
              </nav>
            </div>
        </div>
        </div>
    </div>
    
    
    
    
    
    
    </div>
 </header>
	
 <style>
    .modal-dialog.cover_pic {
        width: 90% !important;
        margin: 30px auto;
    }
 </style>                
</section>
<section class="col-md-12 subheader text-center">
	<div class="row">
    	<div class="container">
        	<h3><?=$title?></h3>
            <div class="breadcrumb">
                <ul>
                    <li><a href="<?php echo site_url('user/dashboard'); ?>">Home</a></li>
                    <li><?=$title?></li>
                </ul>
            </div>
        </div>
    </div>
</section>