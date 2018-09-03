<section class="col-md-12 artist_cover_outer" style="background:url(<?php echo base_url('upload/cover_image/'.$artist->cover_image);?>) no-repeat center;">
	<div class="row">
    	<div class="container">
        	<div class="col-md-8"><img src="<?php echo base_url('upload/profile_image/thumb/'.$artist->image);?>" class="pull-left profile-img"> <h1><?php echo isset($artist->username) ? $artist->username : '';?></h1>
            <p><?php echo ($artist->nationality) ? $artist->nationality : 'No Information Available';?></p></div>
            <p></p>
        	<div class="col-md-4">
                <!--<a href="<?php echo site_url('search/view/'.$artist->id);?>" class="btn btn-primary">Back to artist page</a>-->
                <a href="<?php echo site_url('search/view/'.$artist->id);?>" class="btn btn-primary">go to artist page</a><br><br>
                <a href="<?php echo site_url('offer/send/'.$artist->id);?>" class="btn btn-primary">do business with artist </a>
            </div>
            
        	
        </div>
    </div>
</section>

<section class="col-md-12 album_outer ">
<div class="row">
	<div class="container">
    	<div class="title_text col-md-12 text-center"><div class="row">
        	<h2>featured post</h2>
            <h6>Some of the latest featured uploads</h6>
        </div></div>
        
        <div class="filter-panel text-center">
        	<a href="#" class="btn-type2">audio</a> <a href="#" class="btn-type2">video</a><a href="#" class="btn-type2">images</a><a href="#" class="btn-type2">more</a>
        </div>
        
        <?php if(isset($products)) {                       
                foreach($products as $row){ ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="album-box">
                            
                            <div class="box-thumb">
                                <?php if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 1) { ?>  
                                        <video width="350" height="251"  controlsList="nodownload">
                                          <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mp4">
                                          <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/avi">
                                          <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mov">                        
                                        </video>
                                      <?php } else if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 2) { ?>
                                          <img src="<?php echo base_url('upload/products/album_thumb/'.$row['thumb']);?>" width="350" height="251">                                      
                                      <?php } else if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 3){  ?>
                                          <img src="<?php echo base_url('upload/products/'.$row['file']);?>" width="350" height="251">
                                      <?php } ?>
                            </div>
                            <div class="album-details clearfix">
                                <div class="col-md-8 col-sm-8">
                                    <h3 class="album-name"><a href="<?php echo site_url('products/view/'.$row['id']);?>" title="<?php echo isset($row['title']) ? ($row['title']) : ''; ?>"><?php echo isset($row['title']) ? substr($row['title'],0,10) : ''; ?></a></h3>
                                    <p><span>By <?php echo isset($row['user_id']) ? get_user($row['user_id'])->username : '';   ?></span>
                                    <span><?php echo isset($row['created_at']) ? date('d M Y',strtotime($row['created_at'])) : '';   ?></span></p>
                                </div>
                                <div class="col-md-4 col-sm-4 text-right">
                                    <i class="fa fa-headphones"></i>
                                </div>
                            </div>
                            
                        </div>
                    </div>
        <?php } } ?>
    </div>
</div>
</section>


<section class="col-md-12 album_outer_buy">
<div class="row">
	<div class="container">
        <?php if(isset($products)) {                       
                foreach($products as $row){ ?>
                    <div class="album_inner_buy">
                        <div class="col-md-4">
                            <div class="album-img-box">
                                <?php if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 1) { ?>  
                                        <video width="102" height="96"  controlsList="nodownload">
                                          <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mp4">
                                          <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/avi">
                                          <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mov">                        
                                        </video>
                                      <?php } else if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 2) { ?>
                                          <img src="<?php echo base_url('upload/products/album_thumb/'.$row['thumb']);?>" width="102" height="96">                                      
                                      <?php } else if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 3){  ?>
                                          <img src="<?php echo base_url('upload/products/'.$row['file']);?>" width="102" height="96">
                                      <?php } ?>
                            </div>
                            <div class="album-info-box">
                                <h3 class="text-uppercase"><a href="<?php echo site_url('products/view/'.$row['id']);?>"><?php echo isset($row['title']) ? ($row['title']) : ''; ?></a></h3>
                                <p><?php echo isset($row['description']) ? substr($row['description'],0,100) : ''; ?>.</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="border-box"><a href="#" class="btn-type2">priview</a></div>
                        </div>
                        <div class="col-md-4">
                            <div class="album-rate"><span>ticket</span><h4>$<?php echo isset($row['price']) ? ($row['price']) : '-'; ?></h4></div>
                            <div class="album-buy-now"><a href="#" class="btn-type2">buy now</a></div>
                        </div>
                    </div>
        <?php } } ?>
    </div>
</div>
</section>
<section class="col-md-12 card-outer text-center">
<div class="row">
	<div class="container">
    	<div class="title_text col-md-12 text-center"><div class="row">
        	<h2>executive card</h2>
            <h6>Lorem Ipsum is simply dummy text of the printing<br > and typesetting industry. Lorem Ipsum has been the industry's standard dummy</h6>
        </div></div>
    	
        
        <div class="col-md-4">
        	<div class="card-inner">
            	<img src="<?php echo base_url('front');?>/images/gold-card.png">
                <h2>10 gold</h2>
            </div>
        </div>
        <div class="col-md-4">
        	<div class="card-inner">
            	<img src="<?php echo base_url('front');?>/images/silver-card.png">
                <h2>10 silver</h2>
            </div>
        </div>
        <div class="col-md-4">
        	<div class="card-inner">
            	<img src="<?php echo base_url('front');?>/images/bronzee-card.png">
                <h2>10 bronzee</h2>
            </div>
        </div>
	</div>
</div>
</section>
<section class="col-md-12 follower-outer">
<div class="row">
	<div class="container">
    	<div class="col-md-4">
        	<div class="follower-list">
            	<div class="follower-title">
                	<h2 class="text-capitalize">following list <span>(1000 following)</span></h2>
                </div>
                <ul class="follower-list-inner">
                	<li>
                        <div class="col-md-3"><img src="<?php echo base_url('front');?>/images/team2.jpg"></div>
                        <div class="col-md-6">
                        	<h3 class="text-capitalize"> karry brown</h3>
                            <p>Lorem Ipsum is simply dummy text of the y</p>
                        </div>
                        <div class="col-md-3">
                        	<a href="#">view</a>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-3"><img src="<?php echo base_url('front');?>/images/team2.jpg"></div>
                        <div class="col-md-6">
                        	<h3 class="text-capitalize"> karry brown</h3>
                            <p>Lorem Ipsum is simply dummy text of the y</p>
                        </div>
                        <div class="col-md-3">
                        	<a href="#">view</a>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-3"><img src="<?php echo base_url('front');?>/images/team2.jpg"></div>
                        <div class="col-md-6">
                        	<h3 class="text-capitalize"> karry brown</h3>
                            <p>Lorem Ipsum is simply dummy text of the y</p>
                        </div>
                        <div class="col-md-3">
                        	<a href="#">view</a>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-3"><img src="<?php echo base_url('front');?>/images/team2.jpg"></div>
                        <div class="col-md-6">
                        	<h3 class="text-capitalize"> karry brown</h3>
                            <p>Lorem Ipsum is simply dummy text of the y</p>
                        </div>
                        <div class="col-md-3">
                        	<a href="#">view</a>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
        
        <div class="col-md-4 text-center">
        	<img src="<?php echo base_url('front');?>/images/login_logo_bg.png">
        </div>
        
        <div class="col-md-4">
        	<div class="follower-list">
            	<div class="follower-title">
                	<h2 class="text-capitalize">follower list <span>(1000 followers)</span></h2>
                </div>
                <ul class="follower-list-inner">
                	<li>
                        <div class="col-md-3"><img src="<?php echo base_url('front');?>/images/team2.jpg"></div>
                        <div class="col-md-6">
                        	<h3 class="text-capitalize"> karry brown</h3>
                            <p>Lorem Ipsum is simply dummy text of the y</p>
                        </div>
                        <div class="col-md-3">
                        	<a href="#">view</a>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-3"><img src="<?php echo base_url('front');?>/images/team2.jpg"></div>
                        <div class="col-md-6">
                        	<h3 class="text-capitalize"> karry brown</h3>
                            <p>Lorem Ipsum is simply dummy text of the y</p>
                        </div>
                        <div class="col-md-3">
                        	<a href="#">view</a>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-3"><img src="<?php echo base_url('front');?>/images/team2.jpg"></div>
                        <div class="col-md-6">
                        	<h3 class="text-capitalize"> karry brown</h3>
                            <p>Lorem Ipsum is simply dummy text of the y</p>
                        </div>
                        <div class="col-md-3">
                        	<a href="#">view</a>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-3"><img src="<?php echo base_url('front');?>/images/team2.jpg"></div>
                        <div class="col-md-6">
                        	<h3 class="text-capitalize"> karry brown</h3>
                            <p>Lorem Ipsum is simply dummy text of the y</p>
                        </div>
                        <div class="col-md-3">
                        	<a href="#">view</a>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
        
    	
	</div>
</div>
</section>

