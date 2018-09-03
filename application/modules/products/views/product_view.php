
<section class="col-md-12 contact-us">
	<div class="row">
    	<div class="container">
        	<div class="col-md-3 col-sm-4">
            	<div class="artist_profile_pic">
                	<a href="<?php echo site_url('search/view/'.$products[0]['user_id']); ?>"><img src="<?php echo base_url('upload/profile_image/thumb/'.get_user($products[0]['user_id'])->image);?>"></a>
                    <div class="artist_profile_pic_inner">
                    	<i class="fa fa-user"></i>
                        <h2><?php echo ($products[0]['user_id']) ? get_user($products[0]['user_id'])->username : '';?></h2>
                        <p><?php echo (get_user($products[0]['user_id'])->user_type) ? get_category(get_user($products[0]['user_id'])->user_type)->name : '';?></p>
                    </div>
                </div>
                <div class="artist_social">
                	<a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
                 <!--<div class="artist_action">
                 	<a href="#"><span class="fa fa-comment"><i class="fa fa-heart"></i></span></a>
                    <a href="#"><span class="fa fa-comment"><i class="fa fa-star"></i></span></a>
                    <a href="#"><span class="fa fa-comment"><i class="fa fa-hand-peace-o "></i></span></a>
                 </div>-->
            </div>
            
            <div class="col-md-9 col-sm-8">
            	<div class="highlighted-detail">
                	 
                <p><strong>title : </strong> <?php echo ($products[0]['title']) ? $products[0]['title'] : 'Video';?></p>
                <?php if($products[0]['file_type'] != 3) { ?>
                    <p><strong>Genre : </strong> <?php echo isset(get_genre($products[0]['genre'])->name) ? get_genre($products[0]['genre'])->name : 'N/A';?></p>
                <?php } ?>
                <p><strong>Tags : </strong> <?php echo ($products[0]['tags']) ? $products[0]['tags'] : '--';?></p>                
               
                </div>
               
                <div class="artist-content-page">
                	<!--<img src="<?php echo base_url('front');?>/images/8.jpg">-->
                    <?php if(isset($products[0]['file']) && $products[0]['file'] != '') { ?>
                        <?php if($products[0]['file_type'] == 1) { ?>
                            <video width="825" height="394" controls  controlsList="nodownload">
                              <source src="<?php echo base_url('upload/products/'.$products[0]['file']); ?>" type="video/mp4">
                              <source src="<?php echo base_url('upload/products/'.$products[0]['file']); ?>" type="video/avi">
                              <source src="<?php echo base_url('upload/products/'.$products[0]['file']); ?>" type="video/mov">
                            Your browser does not support the products tag.
                            </video>
                        <?php }else if($products[0]['file_type'] == 2) {?>
                            <img src="<?php echo base_url('upload/products/audio_thumb/'.$products[0]['thumb']);?>" >
                            <audio controls controlsList="nodownload">
                                <source src="<?php echo base_url('upload/products/'.$products[0]['file']); ?>" type="audio/ogg">
                                <source src="<?php echo base_url('upload/products/'.$products[0]['file']); ?>" type="audio/mpeg">
                             Your browser does not support the audio element.
                            </audio> 
                        <?php }else if($products[0]['file_type'] == 3) {?>
                            <img src="<?php echo base_url('upload/products/image_thumb/'.$products[0]['file']);?>" >                                                            
                        <?php } ?>
                    <?php } ?>
                </div>
                <br>
                <div class="artist-content-page">
                <p><?php echo ($products[0]['description']) ? $products[0]['description'] : 'No Information Available';?></p>
                </div>
                <div id="follow-box"></div>
                <div  class="artist-action-box text-capitalize">    
               <!-- <a href="#" onclick="likes(<?=$products[0]['id']?>); return false;" <?php if($is_likes) { echo 'style="color:#13B5EA !important;"'; } else { echo 'style="color:#c1c1c1 !important;"'; } ?>  class="follow"><i class="fa fa-heart"></i></span></a>
                    <a href="#"><span class="fa fa-comment"><i class="fa fa-star"></i></span></a>
                    <a href="#" onclick="cool(<?=$artist->id?>); return false;" <?php if($is_cool) { echo 'style="color:#13B5EA !important;"'; } else { echo 'style="color:#c1c1c1 !important;"'; } ?>  class="cool"><i class="fa fa-hand-peace-o "></i></span></a> -->               
                	<div class="cool">
                    	<a href="#" onclick="cool_products(<?=$products[0]['id']?>); return false;"><img src="<?php echo base_url('front');?>/images/cool.png" <?php if($is_cool_products) { echo 'style="background-color:#c1c1c1 !important;"'; } else {  } ?>></a> <?=count(get_cool_product_list($products[0]['id']))?> people think <?php echo ($products[0]['file_type'] == 1) ? 'Video' : (($products[0]['file_type'] == 2) ? 'Audio' : 'Picture');?> is cool
                    </div>
                    <div class="follow">
                    	<a href="#" onclick="likes(<?=$products[0]['id']?>); return false;"><img src="<?php echo base_url('front');?>/images/follow.png" <?php if($is_likes) { echo 'style="background-color:#c1c1c1 !important;"'; } else {  } ?>></a> <?=count(get_likes_list($products[0]['id']))?> Likes
                    </div>
                    <div class="comment">
                    	<img src="<?php echo base_url('front');?>/images/comment.png"> <?php echo count(get_comments_list($products[0]['id']));?> Comments
                    </div>
                    <div class="rating_outer"><strong>Give rating </strong>-
                        <span class="fa fa-star" id="star1" onclick="product_rating(<?=$products[0]['id']?>,1)"></span>
                        <span class="fa fa-star" id="star2" onclick="product_rating(<?=$products[0]['id']?>,2)"></span>
                        <span class="fa fa-star" id="star3" onclick="product_rating(<?=$products[0]['id']?>,3)"></span>
                        <span class="fa fa-star" id="star4" onclick="product_rating(<?=$products[0]['id']?>,4)"></span>
                        <span class="fa fa-star" id="star5" onclick="product_rating(<?=$products[0]['id']?>,5)"></span>
                    </div>
                </div>
                <div class="artist-comment-list">
                	<ul>
                        <?php $comments = get_comments_list($products[0]['id']);
                        
                        ?>
                        
                        <?php if(!empty($comments)) {
                        foreach($comments as $comment) {?>
                    	<li>
                        	<div class="col-md-2 col-sm-3 no-padding"><img src="<?php echo base_url('upload/profile_image/thumb/'.get_user($comment->message_from)->image);?>"></div>
                            <div class="col-md-10 col-sm-9">
                            	<h2><?php echo ($comment->message_from) ? get_user($comment->message_from)->username : '';?></h2>
                                <p><?php echo ($comment->message) ? $comment->message : '';?></p>
                            </div>
                        </li>
                        <?php } }else echo "<h5>No Comments Yet</h5>"; ?>
                        
                    </ul>
                </div>
                
                <div class="comment-box" id="comment-box">
                    <?php
                    if($this->session->flashdata('item')) {
                        $items = $this->session->flashdata('item');
                        if($items->success){
                        ?>
                            <div class="alert alert-success" id="alert">
                                    <strong>Success!</strong> <?php print_r($items->message); ?>
                            </div>
                        <?php
                        }else{
                        ?>
                            <div class="alert alert-danger" id="alert">
                                    <strong>Error!</strong> <?php print_r($items->message); ?>
                            </div>
                        <?php
                        }
                    }
                    ?>
                	<h2>leave your comment</h2>
                    <form method="post" action="<?php echo site_url('products/comments');?>">
                    	<textarea class="form-control" name="comment" placeholder="Your Comment" required></textarea>
                        <input name="product_id" type="hidden" value="<?=$products[0]['id']?>">
                        <button name="submit" name="submit" class="btn btn-info" >Submit</button>
                    </form>
                </div>
                
                <div class="link_artist_page">
                	<a href="<?php echo site_url('search/view/'.$products[0]['user_id']);?>" class="btn btn-primary">go to artist page</a>
                    <a href="<?php echo site_url('offer/send/'.$products[0]['user_id']);?>" class="btn btn-primary">do business with artist </a>
                    <a href="#" class="btn btn-primary">search related to talent in R & B</a>
                </div>
            </div>
            
        
        </div>
    </div>
    
</section>

