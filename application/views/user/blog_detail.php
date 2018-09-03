<div class="blog-outer">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-8">
            	<div class="blog_list">
                	<div class="blog-thumbnail">
                    	<a href="#"><img src="<?php echo base_url('upload/blog/thumb/'.$blog->image);?>"></a>
                    </div>
                    <div class="blog-content-wrap">
                    	
                        <h3 class="text-capitalize"><a href="#"><?=$blog->title?></a></h3>
                        <ul class="blog-meta text-capitalize">
                            <li class="entry-meta-author"><a href="#"><i class="fa fa-user"></i> admin</a> </li>
                            <li class="entry-meta-date"><i class="fa fa-calendar"></i> <?=date('d M Y h:i:s',strtotime($blog->created_at))?>	</li>
                            
                        </ul> 
                        <p><?=$blog->description?>.</p>
                        

<div class="row">
<div class="col-lg-6">
	<h3 class="text-capitalize">tag</h3>
    <ul class="tag-list">
        <?php foreach((explode(',',$blog->tags)) as $tag) {?>
    	<li><a href="#"><?=$tag?></a></li>
        <?php } ?>        
    </ul>
</div>
                        
<div class="col-lg-6 text-right">
	<h3 class="text-capitalize">share</h3>
    <ul class="social-link">
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                              </ul>
</div>
   </div>                     
                        
                    </div>
                </div>
                
                <!--<div class="blog_comments">
                <ul>
                    <li>
                        <div class="avatar"><img src="<?php echo base_url('front'); ?>/images/team1.jpg" alt=""></div>
                        <div class="comment-content">
                            <div class="comment-by">Kathy Brown 
                                <div class="comment-by-listing">on <a href="#">Burger House</a></div> 
                                <span class="date">June 2017</span>
                            </div>
                            <p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>
                            	
                        </div>
                        </li>
                        <li>
                        <div class="avatar"><img src="<?php echo base_url('front'); ?>/images/team2.jpg" alt=""></div>
                        <div class="comment-content">
                            <div class="comment-by">Kathy Brown 
                                <div class="comment-by-listing">on <a href="#">Burger House</a></div> 
                                <span class="date">June 2017</span>
                            </div>
                            <p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>
                            	
                        </div>
                        </li>
                        <li>
                        <div class="avatar"><img src="<?php echo base_url('front'); ?>/images/team4.jpg" alt=""></div>
                        <div class="comment-content">
                            <div class="comment-by">Kathy Brown 
                                <div class="comment-by-listing">on <a href="#">Burger House</a></div> 
                                <span class="date">June 2017</span>
                            </div>
                            <p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>
                            	
                        </div>
                        </li>
                </ul>
                </div>
                
                <div class="blog_form">
                	<h3 class="widget-title">leave a comment</h3>
                    <div class="row">
                    	<div class="col-lg-6">
                        	<div class="input_box"><input class="form-control" placeholder="Name" type="text"><i class="fa fa-user"></i></div>
                        </div>
                        <div class="col-lg-6">
                        	<div class="input_box"><input class="form-control" placeholder="Email" type="email"><i class="fa fa-envelope"></i></div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-lg-6">
                        	<div class="input_box"><input class="form-control" placeholder="Subject" type="text"><i class="fa fa-tag"></i></div>
                        </div>
                        <div class="col-lg-6">
                        	<div class="input_box"><input class="form-control" placeholder="Phone Number" type="tel"><i class="fa fa-phone"></i></div>
                        </div>
                    </div>
                    <div class="form-group input_box">
                    	<textarea class="form-control" placeholder="Write Message"></textarea> <i class="fa fa-file"></i>
                    </div>
                    <div class="form-group">
                    	<button class="btn btn-primary">post commnet</button>
                    </div>
                </div>-->
                
                
                
                
            	
            </div>
            <div class="col-lg-4">
            	<div class="search_blog">
                	<form action="#">
					<input class="form-control" placeholder="Search" type="text">
                    <button type="search"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <aside class="widget widget-contact">
                <h3 class="widget-title">More Blogs</h3>
                    <ul class="list-unstyled list-cat">
                    <?php foreach($blogs as $blog){?>
                    <li><a href="<?php echo site_url('welcome/blog_detail/'.$blog['id']);?>"><?=$blog['title']?></a> <span> </span></li>
                    <?php } ?>
                    
                </ul>
                </aside>
                
                         <aside class="widget widget-contact">
                            <h3 class="widget-title">social media</h3>
                           <ul class="social-link">
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                              </ul>
                            </aside>
                
                
            </div>
        </div>
    </div>
</div>