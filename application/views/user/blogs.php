-
<section class="blog_outer">
	<div class="container">
    	<div class="row">
            <?php foreach($blogs as $blog){?>
        	<div class="col-md-4">
            	<div class="blog_item">
                	<div class="blog-image">
		                        <a href="#"><img src="<?php echo base_url('upload/blog/thumb/'.$blog['image']); ?>" class="img-responsive img-full" alt=""> </a>
            		</div>
                    <div class="blog_content">
                    	<h4 class="text-capitalize"><a href="<?php echo site_url('welcome/blog_detail/'.$blog['id']);?>"><?=$blog['title']?></a></h4>
                        <p><?=substr($blog['description'],0,100)?> [...]</p>
                        <a href="<?php echo site_url('welcome/blog_detail/'.$blog['id']);?>" class="block-read-more">Read More<i class="fa fa-arrow-circle-right"></i></a>
                        <div class="block-info">
	                <ul class="list-info">
	                    <li class="author">
                        	<span class="author-label">By </span><a href="#" class="link"><span class="author-text">Admin</span></a></li>
                        <li class="date"><a href="#" class="link date"><?=date('d M Y h:i:s',strtotime($blog['created_at']))?></a></li>	                </ul>
                </div>
                    </div>
                </div>
            </div>
            <?php } ?>                        
            
        </div>
    </div>
</section>