
<section class="search_panel col-md-12">
<div class="container">
   
        <div class="col-md-3 col-sm-4 sidebar">
         <form method="post" id="filter_form">
        	
            	<div class="sidebar_filter_title">Filter <i class="fa fa-list pull-right"></i></div>
                <div class="sidebar_filter">
            <div class="careerfy-search-filter-wrap">
                <h2>Search by role</h2>
                <div class="careerfy-checkbox-toggle">
                    <ul class="careerfy-checkbox filter_talent">
                        <?php if(!empty($categories)) {
                               foreach($categories as $c) {?>
                                    <li>
                                        <input  type="checkbox" value="<?=$c['id']?>" name="role[]" class="role">
                                        <label><?=$c['name']?></label>
                                    </li>
                                <?php } } ?>                    
                    </ul>
                </div>
            </div>
            <div class="careerfy-search-filter-wrap">
                <h2>Search by content</h2>
                <div class="careerfy-checkbox-toggle">
                    <ul class="careerfy-checkbox filter_talent">
                        <li>
                            <input type="checkbox" name="content[]" value="2" class="content">
                            <label>Audio</label>
                        </li>
                        <li>
                            <input type="checkbox" name="content[]" value="1" class="content">
                            <label>video</label>
                        </li>
                        <li>
                            <input type="checkbox" name="content[]" value="3" class="content">
                            <label>images</label>
                        </li>
                        <li>
                            <input type="checkbox" name="content[]" value="0" class="rating" >
                            <label>artist</label>
                        </li>
                       
                       
                    </ul>
                </div>
            </div>
            
            
            <div class="careerfy-search-filter-wrap">
                <h2>Search by gender</h2>
                <div class="careerfy-checkbox-toggle">
                    <ul class="careerfy-checkbox filter_talent">
                        <li>
                            <input  type="checkbox" name="gender[]" value="male" class="gender male">
                            <label>male</label>
                        </li>
                        <li>
                            <input  type="checkbox" name="gender[]" value="female" class="gender female">
                            <label>female</label>
                        </li>
                        <li>
                            <input type="checkbox"  value="both" class="gender both">
                            <label>all</label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="careerfy-search-filter-wrap">
                <h2>Search by genre of music</h2>
                <div class="careerfy-checkbox-toggle">
                    <ul class="careerfy-checkbox filter_talent">
                        <?php if(!empty($genres)) {
                               foreach($genres as $g) {?>
                                <li>
                                    <input  type="checkbox" name="genre[]" value="<?=$g['id']?>" class="genre">
                                    <label><?=$g['name']?></label>
                                </li>
                            <?php } } ?>
                        
                    </ul>
                </div>
            </div>
            <div class="careerfy-search-filter-wrap">
                <h2>Search by location</h2>
                
                <div class="location_search filter_talent">
                    <input type="search" name="location" class="form-control search-box filter_talent" placeholder="Location..">
                    <!--<input type="submit" value="search" class="button_design button_blue">-->
                </div>
            </div>
            
            </div>
             </form>
        </div>
        
   
    <div class="col-md-9 col-sm-8">
    	<ul class="search_list_outer">
            
        <?php if(isset($results1)) {                                    
            foreach($results1 as $row){ ?>
            <li>
            	<div class="search_img"><a href="<?php echo base_url(); ?>search/view/<?php echo $row['id'];?>"><img src="<?php echo base_url('upload/profile_image/thumb/'.$row['image']);?>"></a></div>
                <div class="search_content">
                	<div class="col-md-12">
                    	<div class="col-md-5 col-sm-5 row">
                        	<div class="search_info">
                            	
                                <p> <span>Joined on : <?php echo isset($row['created_at']) ? date('d M Y',strtotime($row['created_at'])) : '';   ?></span></p>
                                <a href="<?php echo base_url(); ?>search/view/<?php echo $row['id'];?>"><h2><?php echo isset($row['username']) ? $row['username'] : '';   ?> </h2></a>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <?php
                                    if(isset($row['user_type'])) {
                                        $str = '';
                                        foreach(explode(',',$row['user_type']) as $r)
                                        {
                                            echo $str = '<span class="tag">'.get_category($r)->name.'</span>';
                                        }
                                        //echo rtrim($str,', ');
                                    }else {  }  ?> </div>
                    </div>
                    <div class="col-md-12">
                    	 <p><?php echo ($row['about_me']) ? substr($row['about_me'],0,150) : 'No Information Available';   ?>.</p>
                        <!-- <p><b><?php echo isset($row['user_type']) ? get_category($row['user_type'])->name : '';   ?> </b></p>-->
                         <div class="social_info">
                         	<a href="" onclick="return false;"><i class="fa fa-heart"></i> <?php echo count(get_follow_list($row['id']));?></a>
                            <a href="" onclick="return false;"><i class="fa fa-hand-peace-o"></i> <?php echo count(get_cool_list($row['id']));?></a>
                            <!--<div class="rating_outer"><span class="fa fa-star" id="star1"></span>
                                <span class="fa fa-star" id="star2" ></span>
                                <span class="fa fa-star" id="star3" ></span>
                                <span class="fa fa-star" id="star4" ></span>
                                <span class="fa fa-star" id="star5" ></span>
                            </div>-->
                         </div>
                         
                    </div>
                </div>
            </li>
            <?php } } ?>
            
        <?php if(isset($results)) {                       
            foreach($results as $row){ ?>
        	<li>
            	<div class="search_img">
                    <a href="<?php echo site_url('products/view/'.$row['id']);?>">
                    <?php if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 1) { ?>
                        <?php if($row['thumb']) {?>
                        <img src="<?php echo base_url('upload/products/video_thumb/'.$row['thumb']);?>" width="150" height="165">
                        <?php } else {?>
                            <video width="150" height="200"  controlsList="nodownload">
                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mp4">
                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/avi">
                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mov">                        
                            </video>
                        <?php } ?>
                                                                                    
                      <?php } else if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 2) { ?>
                          <img src="<?php echo base_url('upload/products/audio_thumb/'.$row['thumb']);?>" width="150" height="165">                                      
                      <?php } else if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 3){  ?>
                          <img src="<?php echo base_url('upload/products/'.$row['file']);?>" width="150" height="165">
                      <?php } ?>
                    </a>  
                </div>
                <div class="search_content">
                	<div class="col-md-12">
                    	<div class="col-md-9 row">
                        	<div class="search_info">
                            	<i class="fa fa-play-circle"></i>
                                <p><span>By :  <?php echo isset($row['user_id']) ? get_user($row['user_id'])->username : '';   ?></span> <span>published on : <?php echo isset($row['created_at']) ? date('d M Y',strtotime($row['created_at'])) : '';   ?></span></p>
                                <h2><a href="<?php echo site_url('products/view/'.$row['id']);?>"><?php echo isset($row['title']) ? $row['title'] : ''; ?></a></h2>
                            </div>
                        </div>
                        <div class="col-md-3"><span class="tag"><?=($row['file_type'] == '2') ? "Audio" : (($row['file_type'] == '1')  ? "Video" : "Picture");?></span></div>
                    </div>
                    <div class="col-md-12">
                    	 <p><?php echo isset($row['description']) ? substr($row['description'],0,150) : 'No Description Available';   ?>.</p>
                         <div class="social_info">
                         	<a href="" onclick="return false;"><i class="fa fa-star"></i> <?php echo count(get_likes_list($row['id']));?></a>
                            <a href="" onclick="return false;"><i class="fa fa-hand-peace-o"></i> <?php echo count(get_cool_product_list($row['id']));?></a>
                            <?php $rating = get_product_rating($row['id']);?>
                            <div class="rating_outer">
                                <span class="fa fa-star <?php if($rating >= 1) echo "checked";?>" id="star1"></span>
                                <span class="fa fa-star <?php if($rating >= 2) echo "checked";?>" id="star2"></span>
                                <span class="fa fa-star <?php if($rating >= 3) echo "checked";?>" id="star3"></span>
                                <span class="fa fa-star <?php if($rating >= 4) echo "checked";?>" id="star4"></span>
                                <span class="fa fa-star <?php if($rating >= 5) echo "checked";?>" id="star5"></span>
                            </div>
                         </div>
                         
                    </div>
                </div>
            </li>
            <?php } } ?> 
            
            
                                                        
        </ul>
    </div>
    
</div>
</section>



</html>
<script>
    $('input').on('click',function () {
        if ($('input.rating').is(':checked')) {
            $('input.role').attr("disabled", true);
        }
    });
</script>
