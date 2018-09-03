<section class="col-md-12 contact-us">
	<div class="row">
    	<div class="container">
        	<div class="col-md-3 col-sm-4">
            	<div class="artist_profile_pic">
                	<img src="<?php echo base_url('upload/profile_image/thumb/'.$artist->image);?>">
                    <div class="artist_profile_pic_inner">
                    	<i class="fa fa-user"></i>
                        <h2><?php echo isset($artist->username) ? $artist->username : '';?></h2>
                        <p><?php echo isset($artist->user_type) ? get_category($artist->user_type)->name : '';?></p>
                    </div>
                </div>
                <div class="artist_social">
                	<a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
                 <div class="artist_action">
                    <div id="follow-box"></div>
                 	<a href="#" onclick="follow(<?=$artist->id?>); return false;" <?php if($is_follow) { echo 'style="color:#13B5EA !important;"'; } else { echo 'style="color:#c1c1c1 !important;"'; } ?>  class="follow"><span class="fa fa-comment"><i class="fa fa-heart"></i></span></a>
                    <!--<a href="#"><span class="fa fa-comment"><i class="fa fa-star"></i></span></a>-->
                    <a href="#" onclick="cool(<?=$artist->id?>); return false;" <?php if($is_cool) { echo 'style="color:#13B5EA !important;"'; } else { echo 'style="color:#c1c1c1 !important;"'; } ?>  class="cool"><span class="fa fa-comment"><i class="fa fa-hand-peace-o "></i></span></a>
                 </div>
            </div>
            
            <div class="col-md-9 col-sm-8">
            	<div class="highlighted-detail">
                	 <!--<img src="<?php echo base_url('front');?>/images/bronze-badge.png" class="pull-right">-->
                <p><strong>home town : </strong> <?php echo ($artist->nationality) ? ($artist->nationality) : 'Not Available';?></p>
                <p><strong>talents : </strong> <?php echo isset($artist->user_type) ? get_category($artist->user_type)->name : '';?></p>
                
               
                </div>
                <h3 class="text-capitalize">biography of artist</h3>
                <p><?php echo ($artist->about_me) ? ($artist->about_me) : 'Not Available';?></p>
                <p>Allaboutdamusic.com, is a branch of Live This Moment Publishing LLC., which was created by a team of music executives, producers, and artists who have over 15 years of experience in the music industry. Allaboutdamusic.com provides a platform for all talent in any category of music to bring their brand to the music world. Doing music no longer has to be a dream for you, it can be your career, because on this website you can search available jobs in the music world, apply for them, get hired, and get paid for your talent. All while you manage your brand, network & grow relationships with other brands, AND SO MUCH MORE!!! So now that you are truly a part of the music industry, congratulations! Have fun! Be smart! Do business! And ENJOY!!! "Live This Moment" "Bring your Brand to Life" "Make your Dreams a Reality</p>
                <div class="link_artist_page">
                	<a href="<?php echo site_url('search/ArtistDetail/'.$artist->id);?>" class="btn btn-primary">Go to Artist Page</a>
                    <a href="<?php echo site_url('offer/send/'.$artist->id);?>" class="btn btn-primary">do business with artist </a>
                    <a href="<?php echo site_url('search');?>" class="btn btn-primary">search related to talent in R & B</a>
                </div>
            </div>
            
        
        </div>
    </div>
    
</section>

<section class="col-md-12 feature-artist">
	<div class="row">
    	<div class="container">
        	<div class="title_text col-md-12">
                <div class="row">
                    <h2>featured artist</h2>
                </div>
            </div>
            <?php if(!empty($featured_artist)) {
                    foreach($featured_artist as $row) { ?>                    
                        <div class="col-md-3">
                            <div class="single-team-member bg_gray">
                                    <div class="team-member-photo">
                                        <img alt="<?php echo isset($row['username']) ? $row['username']: '';?>" src="<?php echo base_url('upload/profile_image/thumb/'.$row['image']);?>">	
                                        <a class="view-full-size" href="<?php echo base_url(); ?>search/view/<?php echo $row['id'];?>"><span>know more</span></a>
                                    </div>
                                    <div class="team-member-details">
                                        <a href="<?php echo base_url(); ?>search/view/<?php echo $row['id'];?>"><h4><?php echo isset($row['username']) ? $row['username']: '';?></h4></a>
                                        <a href="<?php echo base_url(); ?>search/view/<?php echo $row['id'];?>"><span class="caps_small"><?php echo isset($row['user_type']) ? get_category($row['user_type'])->name : '';?></span></a>
                                        <p><?php echo ($row['about_me']) ? substr($row['about_me'],0,20) : 'Not Available';?>.</p>
                                        <a href="" onclick="return false;"><i class="fa fa-heart"></i> <?php echo count(get_follow_list($row['id']));?></a>
                                        <a href="" onclick="return false;"><i class="fa fa-hand-peace-o"></i> <?php echo count(get_cool_list($row['id']));?></a>
                                        
                                    </div>
                                </div>
                        </div>
            <?php } } ?>                    
        </div>
    </div>
</section>
