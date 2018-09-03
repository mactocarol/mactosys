<section class="col-md-12 artist_cover_outer" style="background:url(<?php echo base_url('upload/cover_image/'.$artist->cover_image);?>) no-repeat center;">
	<div class="row">
    	<div class="container">
        	<div class="col-md-8">
                <img src="<?php echo base_url('upload/profile_image/thumb/'.$artist->image);?>" class="pull-left profile-img">
                <h1><?php echo isset($artist->username) ? $artist->username : '';?></h1>
                <p><?php echo ($artist->nationality) ? $artist->nationality : 'No Information Available';?></p>
                <p><a href="<?php echo site_url('search/view/'.$artist->id);?>" class="btn btn-primary">Back to artist page</a></p>
            </div>
        	<div class="col-md-4"><img src="<?php echo base_url('front');?>/images/bronze-badge.png" class="pull-right"></div>
        	
        </div>
    </div>
</section>

<section class="search_panel col-md-12">
<div class="container">
	<div class="col-md-9">
    	<div class="social_info">
                         	<a href="#"><i class="fa fa-heart"></i> 111k</a>
                            <a href="#"><i class="fa fa-star"></i> 2534k</a>
                           <a href="#"><i class="fa fa-share"></i> 2534k</a>
                            <div class="rating_outer"><span class="fa fa-star" id="star1" onclick="add(this,1)"></span>
                                  <span class="fa fa-star" id="star2" onclick="add(this,2)"></span>
                                  <span class="fa fa-star" id="star3" onclick="add(this,3)"></span>
                                  <span class="fa fa-star" id="star4" onclick="add(this,4)"></span>
                                  <span class="fa fa-star" id="star5" onclick="add(this,5)"></span>
                            </div>
        </div>
        
        <div id="horizontalTab">
            <ul class="resp-tabs-list">
                <li>all</li>
                <li>images</li>
                <li>videos</li>
                <li>albums</li>
                <li>music</li>
            </ul>
            <div class="resp-tabs-container">
                        
                <div>
                 <!--  All gallery -->
                    <ul class="search_list_outer">
                    <?php if(isset($products)) {                       
                        foreach($products as $row){ ?>
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
                                                <p><span>By <?php echo isset($row['user_id']) ? get_user($row['user_id'])->username : '';   ?></span> <span>published on : <?php echo isset($row['created_at']) ? date('d M Y',strtotime($row['created_at'])) : '';   ?></span></p>
                                                <h2><?php echo isset($row['title']) ? $row['title'] : ''; ?></h2>
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
                                                <span class="fa fa-star" id="star5" onclick="add(this,5)"></span></div>
                                         </div>
                                         
                                    </div>
                                </div>
                            </li>
                        <?php } } ?>    
                    </ul>
                </div>
                
                <div>
                 <!--  img gallery -->
                    <ul class="search_list_outer">
                    <?php if(isset($products)) {                       
                        foreach($products as $row){
                            if($row['file_type'] == 3) {?>
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
                                                <p><span>By <?php echo isset($row['user_id']) ? get_user($row['user_id'])->username : '';   ?></span> <span>published on : <?php echo isset($row['created_at']) ? date('d M Y',strtotime($row['created_at'])) : '';   ?></span></p>
                                                <h2><?php echo isset($row['title']) ? $row['title'] : ''; ?></h2>
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
                                                <span class="fa fa-star" id="star5" onclick="add(this,5)"></span></div>
                                         </div>
                                         
                                    </div>
                                </div>
                            </li>
                        <?php } } } ?>    
                    </ul>
                </div>
                
                <div>
                 <!--  video gallery -->
                    <ul class="search_list_outer">
                    <?php if(isset($products)) {                       
                        foreach($products as $row){
                            if($row['file_type'] == 1) {?>
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
                                                <p><span>By <?php echo isset($row['user_id']) ? get_user($row['user_id'])->username : '';   ?></span> <span>published on : <?php echo isset($row['created_at']) ? date('d M Y',strtotime($row['created_at'])) : '';   ?></span></p>
                                                <h2><?php echo isset($row['title']) ? $row['title'] : ''; ?></h2>
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
                                                <span class="fa fa-star" id="star5" onclick="add(this,5)"></span></div>
                                         </div>
                                         
                                    </div>
                                </div>
                            </li>
                        <?php } } } ?>    
                    </ul>
                </div>
                
                
                <div>
                <!--  album gallery -->
                    <!--<ul class="search_list_outer">                        
                         <li>
                            <div class="search_img"><img src="<?php echo base_url('front');?>/images/user.png"></div>
                            <div class="search_content">
                                <div class="col-md-12">
                                    <div class="col-md-9 row">
                                        <div class="search_info">
                                            
                                            <p><span>by widthby90</span> <span>published on : october 17,2107</span></p>
                                            <h2>found farewell</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-3"><span class="tag">album</span> <span class="tag">buy</span></div>
                                </div>
                                <div class="col-md-12">
                                     <p>Sed consequat sapien faus quam bibendum convallis quis in nulla. Pellentesque volutpat odio eget diam cursus semper. Sed coquat sapien faucibus quam.</p>
                                     <div class="album_search_list">
                                        <div class="table-responsive">
                                        <table>
                                            <tr><td>
                                                <img src="<?php echo base_url('front');?>/images/a1.jpg"> 
                                                <span class="album-no"> 1 </span>
                                                 <span class="album-title-name"> album name </span>
                                                  <span class="album-track-name"> - song 1 </span>
                                            </td>
                                            <td><i class=" fa fa-play"></i> 3:80</td>
                                            </tr>
                                            <tr><td>
                                                <img src="<?php echo base_url('front');?>/images/a1.jpg"> 
                                                <span class="album-no"> 2 </span>
                                                 <span class="album-title-name"> album name </span>
                                                  <span class="album-track-name"> - song 1 </span>
                                            </td>
                                            <td><i class=" fa fa-play"></i> 3:80</td>
                                            </tr>
                                            <tr><td>
                                                <img src="<?php echo base_url('front');?>/images/a1.jpg"> 
                                                <span class="album-no"> 3 </span>
                                                 <span class="album-title-name"> album name </span>
                                                  <span class="album-track-name"> - song 1 </span>
                                            </td>
                                            <td><i class=" fa fa-play"></i> 3:80</td>
                                            </tr>
                                            <tr><td>
                                                <img src="<?php echo base_url('front');?>/images/a1.jpg"> 
                                                <span class="album-no"> 4 </span>
                                                <span class="album-title-name"> album name </span>
                                                  <span class="album-track-name"> - song 1 </span>
                                            </td>
                                            <td><i class=" fa fa-play"></i> 3:80</td>
                                            </tr>
                                            <tr><td>
                                                <img src="<?php echo base_url('front');?>/images/a1.jpg"> 
                                                <span class="album-no"> 5 </span>
                                                <span class="album-title-name"> album name </span>
                                                  <span class="album-track-name"> - song 1 </span>
                                            </td>
                                            <td><i class=" fa fa-play"></i> 3:80</td>
                                            </tr>
                                        </table>
                                        </div>
                                     </div>
                                     <div class="social_info">
                                        <a href="#"><i class="fa fa-heart"></i> 111k</a>
                                        <a href="#"><i class="fa fa-share"></i> 2534k</a>
                                        <div class="rating_outer"><span class="fa fa-star" id="star1" onclick="add(this,1)"></span>
                                            <span class="fa fa-star" id="star2" onclick="add(this,2)"></span>
                                            <span class="fa fa-star" id="star3" onclick="add(this,3)"></span>
                                            <span class="fa fa-star" id="star4" onclick="add(this,4)"></span>
                                            <span class="fa fa-star" id="star5" onclick="add(this,5)"></span></div>
                                     </div>
                                     
                                </div>
                            </div>
                        </li>
                    </ul>-->
                </div>
                
                 <div>
                <!--  music gallery -->
                    <ul class="search_list_outer">
                    <?php if(isset($products)) {                       
                        foreach($products as $row){
                            if($row['file_type'] == 2) {?>
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
                                                <p><span>By <?php echo isset($row['user_id']) ? get_user($row['user_id'])->username : '';   ?></span> <span>published on : <?php echo isset($row['created_at']) ? date('d M Y',strtotime($row['created_at'])) : '';   ?></span></p>
                                                <h2><?php echo isset($row['title']) ? $row['title'] : ''; ?></h2>
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
                                                <span class="fa fa-star" id="star5" onclick="add(this,5)"></span></div>
                                         </div>
                                         
                                    </div>
                                </div>
                            </li>
                        <?php } } } ?>    
                    </ul>
                </div>
                
            </div>
        </div>
                                    
           <div class="comment_outer">
           	<h2>leave your comment</h2>
            <table>
            	<tr><td colspan="3">
                	<div class="form-group"><textarea class="form-control" placeholder="Your Comment *"></textarea></div>
                </td></tr>
                <tr><td>
                	<div class="form-group"><input type="text" placeholder="Your Name *" class="form-control"></div>
                </td>
                <td>
                	<div class="form-group"><input type="email" placeholder="Your Email *" class="form-control"></div>
                </td>
                <td>
                	<div class="form-group"><input type="urk" placeholder="Your Website *" class="form-control"></div>
                </td>
                </tr>
                <tr><td colspan="3">
                	<p><input type="checkbox"> There are many variations of passages of Lorem Ipsum </p>
                </td></tr>
                <tr><td colspan="3">
                	<input type="submit" value="post comment" class="btn btn-primary">
                </td></tr>
            </table>
           </div>
                               
        
        
    </div>
    
</div>
</section>
