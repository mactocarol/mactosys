
<section class="search_panel col-md-12">
<div class="container">
	<div class="col-md-3 col-sm-4 sidebar">
    	<div class="careerfy-search-filter-wrap">
            <h2>Search by role</h2>
            <div class="careerfy-checkbox-toggle">
                <ul class="careerfy-checkbox">
                    <li>
                        <input  type="checkbox">
                        <label>Role 1</label>
                    </li>
                    <li>
                        <input  type="checkbox">
                        <label>Role 2 hours</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>Role 3</label>
                    </li>
                    <li>
                        <input  type="checkbox">
                        <label>Role 4</label>
                    </li>
                    <li>
                        <input  type="checkbox">
                        <label>Role 5</label>
                    </li>
                    <li>
                        <input  type="checkbox">
                        <label>Others</label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="careerfy-search-filter-wrap">
            <h2>Search by content</h2>
            <div class="careerfy-checkbox-toggle">
                <ul class="careerfy-checkbox">
                    <li>
                        <input  type="checkbox">
                        <label>Audio</label>
                    </li>
                    <li>
                        <input  type="checkbox">
                        <label>video</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>images</label>
                    </li>
                    <li>
                        <input  type="checkbox">
                        <label>artist</label>
                    </li>
                   
                   
                </ul>
            </div>
        </div>
        
        
        <div class="careerfy-search-filter-wrap">
            <h2>Search by gender</h2>
            <div class="careerfy-checkbox-toggle">
                <ul class="careerfy-checkbox">
                    <li>
                        <input  type="checkbox">
                        <label>male</label>
                    </li>
                    <li>
                        <input  type="checkbox">
                        <label>female</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>all</label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="careerfy-search-filter-wrap">
            <h2>Search by genre of music</h2>
            <div class="careerfy-checkbox-toggle">
                <ul class="careerfy-checkbox">
                    <li>
                        <input  type="checkbox">
                        <label>list 1</label>
                    </li>
                    <li>
                        <input  type="checkbox">
                        <label>list 2</label>
                    </li>
                    <li>
                        <input type="checkbox">
                        <label>list 3</label>
                    </li>
                    <li>
                        <input  type="checkbox">
                        <label>list 4</label>
                    </li>
                   
                   
                </ul>
            </div>
        </div>
        <div class="careerfy-search-filter-wrap">
            <h2>Search by location</h2>
            
            <div class="location_search">
            	<input type="search" class="form-control search-box" placeholder="Location..">
                <input type="submit" value="search" class="button_design button_blue">
            </div>
        </div>
    	
    </div>
    
    <div class="col-md-9 col-sm-8">
    	<ul class="search_list_outer">
            
        <?php if(isset($results1)) {                                    
            foreach($results1 as $row){ ?>
            <li>
            	<div class="search_img"><img src="<?php echo base_url('upload/profile_image/thumb/'.$row['image']);?>"></div>
                <div class="search_content">
                	<div class="col-md-12">
                    	<div class="col-md-9 row">
                        	<div class="search_info">
                            	
                                <p> <span>Joined on : <?php echo isset($row['created_at']) ? date('d M Y',strtotime($row['created_at'])) : '';   ?></span></p>
                                <a href="<?php echo base_url(); ?>search/view/<?php echo $row['id'];?>"><h2><?php echo isset($row['username']) ? $row['username'] : '';   ?> </h2></a>
                            </div>
                        </div>
                        <div class="col-md-3"><span class="tag">artist</span></div>
                    </div>
                    <div class="col-md-12">
                    	 <p><?php echo ($row['about_me']) ? substr($row['about_me'],0,150) : 'No Information Available';   ?>.</p>
                         <p><b><?php echo isset($row['user_type']) ? get_category($row['user_type'])->name : '';   ?> </b></p>
                         <div class="social_info">
                         	<a href="#"><i class="fa fa-heart"></i> 111k</a>
                            <a href="#"><i class="fa fa-share"></i> 2534k</a>
                            <div class="rating_outer"><span class="fa fa-star" id="star1" onclick="add(this,1)"></span>
                                <span class="fa fa-star" id="star2" onclick="add(this,2)"></span>
                                <span class="fa fa-star" id="star3" onclick="add(this,3)"></span>
                                <span class="fa fa-star" id="star4" onclick="add(this,4)"></span>
                                <span class="fa fa-star" id="star5" onclick="add(this,5)"></span>
                            </div>
                         </div>
                         
                    </div>
                </div>
            </li>
            <?php } } ?>
            
        <?php if(isset($results)) {                       
            foreach($results as $row){ ?>
        	<li>
            	<div class="search_img">
                    
                    <?php if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 1) { ?>  
                        <video width="150" height="200"  controlsList="nodownload">
                          <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mp4">
                          <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/avi">
                          <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mov">                        
                        </video>
                      <?php } else if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 2) { ?>
                          <img src="<?php echo base_url('upload/products/album_thumb/'.$row['thumb']);?>" width="150" height="165">                                      
                      <?php } else if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 3){  ?>
                          <img src="<?php echo base_url('upload/products/'.$row['file']);?>" width="150" height="165">
                      <?php } ?>
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
                         	<a href="#"><i class="fa fa-heart"></i> 111k</a>
                            <a href="#"><i class="fa fa-share"></i> 2534k</a>
                            <div class="rating_outer"><span class="fa fa-star" id="star1" onclick="add(this,1)"></span>
                                <span class="fa fa-star" id="star2" onclick="add(this,2)"></span>
                                <span class="fa fa-star" id="star3" onclick="add(this,3)"></span>
                                <span class="fa fa-star" id="star4" onclick="add(this,4)"></span>
                                <span class="fa fa-star" id="star5" onclick="add(this,5)"></span>
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
