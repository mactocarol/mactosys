<?php //echo "<pre>"; print_r($message); die;?>
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

<!--<section class="col-md-12 album_outer ">
<div class="row">
	<div class="container">
    	<div class="title_text col-md-12 text-center"><div class="row">
        	<h2>featured post</h2>
            <h6>Some of the latest featured uploads</h6>
        </div></div>
        
        <div class="filter-panel text-center">
        	<a class="btn-type2">audio</a> <a class="btn-type2">video</a><a class="btn-type2">images</a><a class="btn-type2">more</a>
        </div>
        
        <?php if(isset($products) && !empty($products)) {                       
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
        <?php } }else{ ?>
        <center>No Uploads yet.</center>
        <?php } ?>
    </div>
</div>
</section>-->


<section class="col-md-12 album_outer_buy">
<div class="row">
    
	<div class="container">
        <?php if($message){
        ?>
            <div class="alert alert-success" id="alert">
                    <strong>Success!</strong> <?php print_r($message); ?> <a href="<?php echo site_url('products/cart_view'); ?>"><button class="btn btn-info">View Cart</button></a>
            </div>
        <?php }?>
        
        <?php
        $product_count  = count($no_of_products) + count($this->cart->contents());
        $limit          = ($current_plan['sell_limit']);
        $flag           = 0;
        $valid_to = (isset($subscr)) ? $subscr->valid_to : $artist->account_valid;                      
        if(($product_count < $limit ) || $limit == '-1'){                        
            if((($artist->account_type == 'pro') && ($valid_to >= date('Y-m-d h:i:s'))) ||  $artist->account_type == '' || $artist->account_type == 'free'){
               $flag = 1;
            }
        }        
        ?>
        
        <?php if(isset($products)) {                       
                foreach($products as $row){ ?>
                    <div class="album_inner_buy"><div class="album_inner_panel">
                        <div class="col-md-6 col-sm-7">
                            <div class="album-img-box">
                                <?php if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 1) { ?>
                                        <?php if($row['thumb']) {?>
                                        <img src="<?php echo base_url('upload/products/video_thumb/'.$row['thumb']);?>" width="102" height="96">
                                        <?php } else {?>
                                            <video width="102" height="96"  controlsList="nodownload">
                                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mp4">
                                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/avi">
                                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mov">                        
                                            </video>
                                        <?php } ?>
                                        
                                      <?php } else if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 2) { ?>
                                          <img src="<?php echo base_url('upload/products/audio_thumb/'.$row['thumb']);?>" width="102" height="96">                                      
                                      <?php } else if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 3){  ?>
                                          <img src="<?php echo base_url('upload/products/image_thumb/'.$row['file']);?>" width="102" height="96">
                                      <?php } ?>
                            </div>
                            <div class="album-info-box">
                                <h3 class="text-uppercase"><a href="<?php echo site_url('products/view/'.$row['id']);?>"><?php echo isset($row['title']) ? ($row['title']) : ''; ?></a></h3>
                                <p><?php echo isset($row['description']) ? substr($row['description'],0,100) : ''; ?>.</p>
                            </div>
                        </div>
                       
                        <div class="col-md-2 col-sm-2">
                            <div class="album-rate"><span>price</span><h4>$<?php echo isset($row['price']) ? ($row['price']) : '-'; ?></h4></div>
                        </div>
                        
                         <div class="col-md-4 col-sm-3 text-center">
                         	<div class="album-buy-now">
                                <?php if($flag) {?>
                                <a href="<?php echo site_url('products/add_to_cart/'.$row['id']);?>/?return_uri=<?=base_url(uri_string())?>" class="btn-type2">Add to Cart</a>
                                <?php } else{?>
                                Not available to sell
                                <?php } ?>
                            </div>
                            <div class="border-box"><a href="<?php echo site_url('products/view/'.$row['id']);?>" class="btn-type2">preview</a></div>
                        </div>
                        
                    </div></div>
        <?php } } ?>
        
        
        <?php if(isset($albums)) {                       
                foreach($albums as $row){ ?>
                    <div class="album_inner_buy"><div class="album_inner_panel">
                        <div class="col-md-6 col-sm-7">
                            <div class="album-img-box">                                
                                <img src="<?php echo base_url('upload/products/album_thumb/'.$row['thumb']);?>" width="102" height="96">                                      
                            </div>
                            <div class="album-info-box">
                                <h3 class="text-uppercase"><a href="<?php echo site_url('album/view/'.$row['id']);?>"><?php echo isset($row['title']) ? ($row['title']) : ''; ?></a></h3>
                                <p><?php echo isset($row['description']) ? substr($row['description'],0,100) : ''; ?>.</p>
                            </div>
                        </div>
                       
                        <div class="col-md-2 col-sm-2">
                            <div class="album-rate"><span>price</span><h4>$<?php echo isset($row['price']) ? ($row['price']) : '-'; ?></h4></div>
                            
                        </div>
                        
                         <div class="col-md-4 col-sm-3 text-center">
                         <div class="album-buy-now">
                                <?php if($flag) {?>
                                <a href="<?php echo site_url('products/add_to_cart/'.$row['id']);?>/?return_uri=<?=base_url(uri_string())?>" class="btn-type2">Add to Cart</a>
                                <?php } else{?>
                                Not available to sell
                                <?php } ?>
                            </div>
                            <div class="border-box"><a href="<?php echo site_url('album/view/'.$row['id']);?>" class="btn-type2">preview</a></div>
                        </div>
                    </div></div>
        <?php } } ?>
    </div>
</div>
</section>
<section class="col-md-12 card-outer text-center">
<div class="row">
	<div class="container">
    	<div class="title_text col-md-12 text-center"><div class="row">
        	<h2>executive card</h2>
            <h6>The more card , the more genuine is the User</h6>
        </div></div>
    	
        <?php $cards = get_cards($artist->id);?>
        <div class="col-md-4 col-sm-4">
        	<div class="card-inner">
            	<img src="<?php echo base_url('front');?>/images/gold-card.png">
                <h2><?=$cards[2]?> gold</h2>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
        	<div class="card-inner">
            	<img src="<?php echo base_url('front');?>/images/silver-card.png">
                <h2><?=$cards[1]?> silver</h2>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
        	<div class="card-inner">
            	<img src="<?php echo base_url('front');?>/images/bronzee-card.png">
                <h2><?=$cards[0]?> bronzee</h2>
            </div>
        </div>
	</div>
</div>
</section>
<section class="col-md-12 follower-outer">
<div class="row">
	<div class="container">
    	<div class="col-md-4 ">
        	<div class="follower-list">
                <?php $following_list = get_following_list($artist->id); ?>
            	<div class="follower-title">
                	<h2 class="text-capitalize">following list <span>(<?php echo count($following_list); ?> following)</span></h2>
                </div>
                <ul class="follower-list-inner">
                    <?php
                    if(!empty($following_list)){
                        foreach($following_list as $following){ ?>
                            <li>
                                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url('upload/profile_image/thumb/'.get_user($following->artist_id)->image);?>"></div>
                                <div class="col-md-6 col-sm-6">
                                    <h3 class="text-capitalize"><?=get_user($following->artist_id)->username?></h3>
                                    <p><?=get_category(get_user($following->artist_id)->user_type)->name?></p>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <a href="<?php echo site_url('search/view/'.$following->artist_id);?>">view</a>
                                </div>
                            </li>   
                    <?php }
                    }
                    ?>
                	                    
                </ul>
            </div>
        </div>
        
        <div class="col-md-4  text-center">
        	<img src="<?php echo base_url('front');?>/images/login_logo_bg.png">
        </div>
        
        <div class="col-md-4">
        	<div class="follower-list">
                <?php $follower_list = get_follower_list($artist->id); ?>
            	<div class="follower-title">
                	<h2 class="text-capitalize">follower list <span>(<?php echo count($follower_list); ?> followers)</span></h2>
                </div>
                <ul class="follower-list-inner">
                	<?php
                    if(!empty($follower_list)){
                        foreach($follower_list as $follower){ ?>
                            <li>
                                <div class="col-md-3 col-sm-3"><img src="<?php echo base_url('upload/profile_image/thumb/'.get_user($follower->follower_id)->image);?>"></div>
                                <div class="col-md-6 col-sm-6">
                                    <h3 class="text-capitalize"><?=get_user($follower->follower_id)->username?></h3>
                                    <p><?=get_category(get_user($follower->follower_id)->user_type)->name?></p>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <a href="<?php echo site_url('search/view/'.$follower->follower_id);?>">view</a>
                                </div>
                            </li>   
                    <?php }
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
        
    	
	</div>
</div>
</section>

