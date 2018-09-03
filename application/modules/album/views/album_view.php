
<section class="col-md-12 contact-us">
	<div class="row">
    	<div class="container">
        	<div class="col-md-3 col-sm-4">
            	<div class="artist_profile_pic">
                	<a href="<?php echo site_url('search/view/'.$album[0]['user_id']); ?>"><img src="<?php echo base_url('upload/profile_image/thumb/'.get_user($album[0]['user_id'])->image);?>"></a>
                    <div class="artist_profile_pic_inner">
                    	<i class="fa fa-user"></i>
                        <h2><?php echo ($album[0]['user_id']) ? get_user($album[0]['user_id'])->username : '';?></h2>
                        <p><?php echo (get_user($album[0]['user_id'])->user_type) ? get_category(get_user($album[0]['user_id'])->user_type)->name : '';?></p>
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
                	 
                <p><strong>title : </strong> <?php echo ($album[0]['title']) ? $album[0]['title'] : 'Video';?></p>
                <p><strong>Release date : </strong> <?php echo isset($album[0]['created_at']) ? date('d M Y',strtotime($album[0]['created_at'])) : ''; ?></p>
                <p><strong>Total Track : </strong><?php echo isset($album[0]['list']) ? count($album[0]['list']) : ''; ?></p>                
               
                </div>
               
                <div class="artist-content-page">
                	<!--<img src="<?php echo base_url('front');?>/images/8.jpg">-->
                    
                            <img src="<?php echo base_url('upload/products/album_thumb/'.$album[0]['thumb']);?>" width="825" height="394">                                                            
                        
                </div>
                <br>
                <div class="artist-content-page">
                <p><?php echo ($album[0]['description']) ? $album[0]['description'] : 'No Information Available';?></p>
                </div>
                <div id="follow-box"></div>
                <div  class="artist-action-box text-capitalize">                    
                	<div class="cool">
                    	<a href="#" onclick="cool_album(<?=$album[0]['id']?>); return false;"><img src="<?php echo base_url('front');?>/images/cool.png" <?php if($is_cool_products) { echo 'style="background-color:#c1c1c1 !important;"'; } else {  } ?>></a> <?=count(get_cool_album_list($album[0]['id']))?> people think Album is cool
                    </div>
                    <div class="follow">
                    	<a href="#" onclick="likes_album(<?=$album[0]['id']?>); return false;"><img src="<?php echo base_url('front');?>/images/follow.png" <?php if($is_likes) { echo 'style="background-color:#c1c1c1 !important;"'; } else {  } ?>></a> <?=count(get_likes_album_list($album[0]['id']))?> Likes
                    </div>
                    <div class="comment">
                    	<img src="<?php echo base_url('front');?>/images/comment.png"> <?php echo count(get_album_comments_list($album[0]['id']));?> Comments
                    </div>
                    <!--<div class="rating_outer"><strong>Give rating </strong>-
                        <span class="fa fa-star" id="star1" onclick="product_rating(<?=$album[0]['id']?>,1)"></span>
                        <span class="fa fa-star" id="star2" onclick="product_rating(<?=$album[0]['id']?>,2)"></span>
                        <span class="fa fa-star" id="star3" onclick="product_rating(<?=$album[0]['id']?>,3)"></span>
                        <span class="fa fa-star" id="star4" onclick="product_rating(<?=$album[0]['id']?>,4)"></span>
                        <span class="fa fa-star" id="star5" onclick="product_rating(<?=$album[0]['id']?>,5)"></span>
                    </div>-->
                </div>
                <div class="col-md-12">
                    	<div class="panel panel-default">
                        	<div class="panel-body">
                            	<h4><i class="fa fa-list color-primary"></i>&nbsp;&nbsp; Track lists</h4>
                                
                                <div class="table-responsive">
                                <table>
                                	<thead>
                                    	<tr><th></th><th  width="200px"></th> <th>Title/Composer </th><th>Type</th></tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($album as $row){ 
                                            if(isset($row['list']) && $row['list'] != '') { 
                                                foreach($row['list'] as $key=>$list){
                                                    if($list) { ?>
                                                        <tr>
                                                            <td><?=$key+1?></td>
                                                            <td>
                                                                <!--<img src="<?=site_url('upload/products/').$list[0]['thumb']?>">-->
                                                                <?php if($list[0]['file_type'] == 1) { ?>
                                                                    <?php if($row['thumb']) {?>
                                                                    <img src="<?php echo base_url('upload/products/video_thumb/'.$list[0]['thumb']);?>" width="150" height="150">
                                                                    <?php } else {?>
                                                                        <video width="150" height="100" controlsList="nodownload">
                                                                            <source src="<?php echo base_url('upload/products/'.$list[0]['file']); ?>" type="video/mp4">
                                                                            <source src="<?php echo base_url('upload/products/'.$list[0]['file']); ?>" type="video/avi">
                                                                            <source src="<?php echo base_url('upload/products/'.$list[0]['file']); ?>" type="video/mov">                                                                    
                                                                        </video>
                                                                    <?php } ?>                                                                                                                                    
                                                                <?php }else if($list[0]['file_type'] == 2) {?>
                                                                    <img src="<?php echo base_url('upload/products/audio_thumb/'.$list[0]['thumb']);?>" width="150" height="100">
                                                                <?php }else if($list[0]['file_type'] == 3) {?>
                                                                    <img src="<?php echo base_url('upload/products/image_thumb/'.$list[0]['file']);?>" width="150" height="100">
                                                                <?php } ?>
                                                            </td>
                                                            
                                                            <td><h3><a href="<?php echo site_url('products/detail/'.$list[0]['id']);?>"><?=$list[0]['title']?></a></h3><!--<span>John Williams</span>--></td>
                                                            <td><h5><?=($list[0]['file_type'] == 1) ? 'Video' : (($list[0]['file_type'] == 2) ? 'Audio' : 'Picture'); ?></h5>                                                            
                                                        </tr>
                                            <?php        }
                                                    }
                                            } 
                                         } ?>                                        
                                    </tbody>
                                </table>
                                </div>
                             </div>
                        </div>
                </div>
                <div class="artist-comment-list">
                    <h2>Comments</h2>
                	<ul>
                        <?php $comments = get_album_comments_list($album[0]['id']);
                        
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
                    <form method="post" action="<?php echo site_url('album/comments');?>">
                    	<textarea class="form-control" name="comment" placeholder="Your Comment" required></textarea>
                        <input name="product_id" type="hidden" value="<?=$album[0]['id']?>">
                        <button name="submit" name="submit" class="btn btn-info" >Submit</button>
                    </form>
                </div>
                
                <div class="link_artist_page">
                	<a href="<?php echo site_url('search/view/'.$album[0]['user_id']);?>" class="btn btn-primary">go to artist page</a>
                    <a href="<?php echo site_url('offer/send/'.$album[0]['user_id']);?>" class="btn btn-primary">do business with artist </a>
                    <a href="#" class="btn btn-primary">search related to talent in R & B</a>
                </div>
            </div>
            
        
        </div>
    </div>
    
</section>

