<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?> | allAboutTheMusic.com</title>

<link href="<?php echo base_url('front');?>/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url('front');?>/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('front');?>/css/bootstrap-select.min.css">
<link href="<?php echo base_url('front');?>/css/style.css" rel="stylesheet">
</head>


<body>

<section class="slider_wrap">
<div id="particles-js"></div>
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
                           <a href="#" class="btn btn-primary">+ Post job</a>
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
                                <li class="<?php if($page == 'home') echo 'active';?>"><a href="<?php echo site_url(''); ?>">home</a>
                                <div class="equalizer">
                                            <span class="bar bar-1"></span><span class="bar bar-2"></span><span class="bar bar-3"></span><span class="bar bar-4"></span><span class="bar bar-5"></span><span class="bar bar-6"></span><span class="bar bar-7"></span><span class="bar bar-8"></span><span class="bar bar-9"></span><span class="bar bar-10"></span>
                                </div>
                                        </li>
                                <li><a href="#">about us</a>
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
                                <li><a href="#">blog</a>
                                <div class="equalizer">
                                            <span class="bar bar-1"></span><span class="bar bar-2"></span><span class="bar bar-3"></span><span class="bar bar-4"></span><span class="bar bar-5"></span><span class="bar bar-6"></span><span class="bar bar-7"></span><span class="bar bar-8"></span><span class="bar bar-9"></span><span class="bar bar-10"></span>
                                </div>
                                </li>
                                <li><a href="#">contact us</a>
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
    
    <div class="slider_content col-md-12 text-center">
    <div class="row">
    	<h4>A better career is out there. we'll help you find it to use.</h4>
    	<h1 class="text-capitalize">Music to the Beat </h1>
            
    </div>
    </div>
    
    
    <div class="search_form_top col-md-12">
    	<div class="search_form_top_bg row">
        	<div class="jp_header_form_wrapper">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <input placeholder="Job Title, Keywords, Or Company" type="text" class="form-control">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="jp_form_location_wrapper">
                                   <input type="text" placeholder="City, State Or Zip" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="jp_form_exper_wrapper">
                                      <select class="selectpicker" data-live-search="true">
                                      		<option selected="selected">Select category</option>
                                          <option data-tokens="Category 1">Category 1</option>
                                          <option data-tokens="Category 2">Category 2</option>
                                          <option data-tokens="Category 3">Category 3</option>
                                        </select>

                                    <i class="fa fa-angle-down"></i>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                <div class="jp_form_btn_wrapper">
                                    <button class="btn"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
        </div>
        <div class="btn-outer text-center">
        	<span class="btn-hover-wrap"><a href="#"><i class="fa fa-arrow-circle-o-up"></i>Upload Your Portfolio</a></span>
            <span class="btn-hover-wrap"><a href="#"><i class="fa fa-briefcase"></i>Post Your Requirment</a></span>
        </div>
        
        
    </div>
    
    </div>
 </header>
	
           <div class="slider_img">
           	<img src="<?php echo base_url('front');?>/images/slide1.jpg">
           </div>
           
          
</section>

<div class="bio_outer col-md-12 text-center">
	<div class="row">
    	<div class="container">
        <div class="bio-info">
        <div class="bio-info-inner">
        <p>Allaboutdamusic.com, is a branch of Live This Moment Publishing LLC., which was created by a team of music executives, producers, and artists who have over 15 years of experience in the music industry. Allaboutdamusic.com provides a platform for all talent in any category of music to bring their brand to the music world. Doing music no longer has to be a dream for you, it can be your career, because on this website you can search available jobs in the music world, apply for them, get hired, and get paid for your talent. All while you manage your brand, network & grow relationships with other brands, AND SO MUCH MORE!!! So now that you are truly a part of the music industry, congratulations! Have fun! Be smart! Do business! And ENJOY!!! "Live This Moment" "Bring your Brand to Life" "Make your Dreams a Reality</p></div>
        </div>
        <ul class="col-md-12">
        	<li class="col-md-4 col-sm-4"><h3>123,012</h3><span>jobs added</span></li>
            <li class="col-md-4 col-sm-4"><h3>123,012</h3><span>artist</span></li>
            <li class="col-md-4 col-sm-4"><h3>123,012</h3><span>Positions matched</span></li>
        </ul>
        </div>
    </div>
</div>




        

<section class="popular_cat_home col-md-12 text-center">
    <div class="row">
    
	<div class="container">
            <div class="title_text col-md-12"><div class="row">
                <h2>popular categories</h2>
                <h6><?=$total_jobs_available?> jobs live - 0 added today</h6>
            </div></div>
            <div class="col-md-12">
                <div class="row">
                    <?php $cnt = 0; if(!empty($category)) {
                            foreach($category as $c){
                                if($cnt < 8) {                    ?>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="popular_cat_inner">
                                        <img src="<?php echo base_url('front');?>/images/<?=$c['icon']?>">
                                        <h3><?=$c['name']?></h3>
                                        <span>(<?=$c['total_jobs']?> open position)</span>
                                        </div>
                                    </div>
                    <?php } $cnt++; } }?>                    
                </div>
            </div>
            
            
            <div class="col-md-12"><a href="#" class="button_design button_blue">browse all category</a></div>
    </div>
    
    </div>
</section>     
<section class="news_letter col-md-12 text-center">
<div class="row"> 
	<div class="container">
    	<h2>Upload Your Portfolio For Fnding Best Platform</h2>
        <a href="#" class="button_design button_white">create an account</a>
    </div>
</div>
</section>

<section class="jobs_outer col-md-12">
<div class="row">
	<div class="container">
    	<div class="col-md-9">
            	<div class="title_text col-md-12"><div class="row">
                    <h2>featured jobs</h2>
                    <h6>Lorem Ipsum is simply dummy text of the printing </h6>
                </div></div>
                
                <div class="col-md-12">
                <div class="row">
                	 <ul class="job_list">
                            <?php if(!empty($featured_jobs)) {
                                foreach($featured_jobs as $job){ ?>
                                    <li class="row">
                                        <div class="col-md-2 col-sm-2"><a href="#"><!--<img src="<?php echo base_url('upload');?>/profile_image/<?=get_user($job['user_id'])->image?>">--><center><?=get_user($job['user_id'])->username?></center></a></div>
                                         <div class="col-md-4 col-sm-4"><h4 class="artist_name"><?=$job['title']?></h4><span><?=get_category($job['category'])->name?></span></div>
                                         <div class="col-md-3 col-sm-3"><div class="job_location"><i class="fa fa-map-marker"></i><?=$job['location']?> </div></div>
                                        <div class="col-md-3 col-sm-3"><i class="fa fa-heart-o"></i><a href="#" class="btn btn-primary btn-border">
                                            <?php echo get_job_type($job['job_type']); ?>
                                        </a></div>
                                    </li>
                            <?php } } ?>                                
                    </ul>
                <div class="row text-center"><a href="#" class="button_design button_blue">find more listing</a></div>
                </div>
                </div>
        </div>
        
        <div class="col-md-3">
        	<div class="title_text col-md-12"><div class="row">
                <h2>recent jobs</h2></div></div>
                <?php if(!empty($recent_jobs)) {
                                foreach($recent_jobs as $job){ ?>
                <div class="col-md-12 col-sm-6">
                    <div class="row recent_job_outer">
                        <!--<img src="<?php echo base_url('front');?>/images/job3.png" class="center-block">-->
                        <h1><?=get_user($job['user_id'])->username?></h1>
                        <h3><?=$job['title']?></h3>
                        <h5 class="text-primary"><?=get_category($job['category'])->name?></h5>
                        <p><?=$job['location']?></p>
                        <p><?=substr($job['description'],0,100)?></p>
                        <div class="row"><div class="col-md-6 "><span><?php echo get_job_type($job['job_type']); ?></span><i class="fa fa-heart-o"></i></div>
                        <div class="col-md-6 "><a href="#"  class="btn btn-primary">apply now</a></div></div>
                    </div>
                </div>
                <?php } }?> 
            
        </div>
        
</div>
</div>
</section>


<section class="callaction_outer col-md-12">
<div class="row">
<div class="col-md-6 col-sm-6 recruiter text-left">
	<div class="row">
    	<h2>i am recruiter</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        <a href="#" class="button_design button_white">post new job</a>
    </div>
</div>
<div class="col-md-6 col-sm-6 jobseeker text-right">
	<div class="row">
    	<h2>i am jobseeker</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        <a href="#" class="button_design button_white">browse jobs</a>
    </div>
</div></div>
</section>

<section class="col-md-12 work_outer text-center">
	<div class="row">
    	<div class="container">
        	<div class="title_text col-md-12"><div class="row">
                <h2>how its work</h2>
                <h6>It is a long established fact that a reader will <br>be distracted by the readable content of a page when looking at its layout.</h6>
            </div></div>
            
            
            <div class="col-md-4 col-sm-4 text-center first">
            	<div class="icon-panel"><i class="fa fa-user"></i></div>
                <h3>register an account</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
            	<div class="icon-panel"><i class="fa fa-search"></i></div>
                <h3>specify & search your job</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
            	<div class="icon-panel"><i class="fa fa-list"></i></div>
                <h3>apply for job</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
            </div>
        </div>
    </div>
</section>


<section class="col-md-12 album_outer ">
<div class="row">
	<div class="container">
    	<div class="title_text col-md-12 text-center"><div class="row">
        	<h2>trending albums  highlights</h2>
            <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</h6>
        </div></div>
        
        
        <div class="col-md-4 col-sm-6">
        	<div class="album-box">
                <div class="box-thumb">
                    <img src="<?php echo base_url('front');?>/images/1.jpg" alt="album">
                </div>
                <div class="album-details clearfix">
                    <div class="col-md-8 col-sm-8">
                        <h3 class="album-name"><a href="#">Under the bus</a></h3>
                        <p>Song Artist Name</p>
                    </div>
                    <div class="col-md-4 col-sm-4 text-right">
                        <i class="fa fa-headphones"></i>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
        	<div class="album-box">
                <div class="box-thumb">
                    <img src="<?php echo base_url('front');?>/images/2.jpg" alt="album">
                </div>
                <div class="album-details clearfix">
                    <div class="col-md-8 col-sm-8">
                        <h3 class="album-name"><a href="#">Under the bus</a></h3>
                        <p>Song Artist Name</p>
                    </div>
                    <div class="col-md-4 col-sm-4 text-right">
                        <i class="fa fa-headphones"></i>
                    </div>
                </div>
                
            </div>
        </div>
        
        <div class="col-md-4 col-sm-6">
        	<div class="album-box">
                <div class="box-thumb">
                    <img src="<?php echo base_url('front');?>/images/3.jpg" alt="album">
                </div>
                <div class="album-details clearfix">
                    <div class="col-md-8 col-sm-8">
                        <h3 class="album-name"><a href="#">Under the bus</a></h3>
                        <p>Song Artist Name</p>
                    </div>
                    <div class="col-md-4 col-sm-4 text-right">
                        <i class="fa fa-headphones"></i>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
        	<div class="album-box">
                <div class="box-thumb">
                    <img src="<?php echo base_url('front');?>/images/4.jpg" alt="album">
                </div>
                <div class="album-details clearfix">
                    <div class="col-md-8 col-sm-8">
                        <h3 class="album-name"><a href="#">Under the bus</a></h3>
                        <p>Song Artist Name</p>
                    </div>
                    <div class="col-md-4 col-sm-4 text-right">
                        <i class="fa fa-headphones"></i>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
        	<div class="album-box">
                <div class="box-thumb">
                    <img src="<?php echo base_url('front');?>/images/5.jpg" alt="album">
                </div>
                <div class="album-details clearfix">
                    <div class="col-md-8 col-sm-8">
                        <h3 class="album-name"><a href="#">Under the bus</a></h3>
                        <p>Song Artist Name</p>
                    </div>
                    <div class="col-md-4  col-sm-4 text-right">
                        <i class="fa fa-headphones"></i>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
        	<div class="album-box">
                <div class="box-thumb">
                    <img src="<?php echo base_url('front');?>/images/6.jpg" alt="album">
                </div>
                <div class="album-details clearfix">
                    <div class="col-md-8 col-sm-8">
                        <h3 class="album-name"><a href="#">Under the bus</a></h3>
                        <p>Song Artist Name</p>
                    </div>
                    <div class="col-md-4 col-sm-4 text-right">
                        <i class="fa fa-headphones"></i>
                    </div>
                </div>
                
            </div>
        </div>
        
        
        
        
        
        
    </div>
</div>
</section>
