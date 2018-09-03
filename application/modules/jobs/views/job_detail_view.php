<div class="col-md-12 jobdetail-outer">
	<div class="row">
    	<div class="container">
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
            <form method="Post" action="<?php echo site_url('jobs/apply/'.$reslt['id']);?>">
                <div class="col-md-8">
                    <div class="job-single-sec">
                        <div class="job-single-head">
                            <div class="job-thumb"> <img src="<?php echo base_url('front');?>/images/company-logo.png" alt=""> </div>
                            <div class="job-head-info">
                                <h4><?php echo ($reslt['title']) ? $reslt['title'] : ''; ?></h4>
                                <span><?php echo ($reslt['location']) ? $reslt['location'] : ''; ?></span>
                                <!--<p><i class="fa fa-unlink"></i> www.jobhunt.com</p>
                                <p><i class="fa fa-phone"></i> +90 538 963 54 87</p>
                                <p><i class="fa fa-envelope-o"></i> ali.tufan@jobhunt.com</p>-->
                            </div>
                            
                        </div>
                        <div class="job-details">                            
                                <h3>Experience</h3>
                                <p><?php echo ($reslt['experience']) ? $reslt['experience'].'+ year required' : 'Fresher may apply'; ?></p>                           
                        </div>
                        
                        <div class="job-details">
                                    <h3>Job Description</h3>
                                    <p><?php echo ($reslt['description']) ? $reslt['description'] : ''; ?>.</p>				 				
                        </div>
                        <div class="rating_outer"><strong>Give rating </strong>- 
                            <span class="fa fa-star" id="star1" onclick="job_rating(<?=$reslt['id']?>,1)"></span>
                            <span class="fa fa-star" id="star2" onclick="job_rating(<?=$reslt['id']?>,2)"></span>
                            <span class="fa fa-star" id="star3" onclick="job_rating(<?=$reslt['id']?>,3)"></span>
                            <span class="fa fa-star" id="star4" onclick="job_rating(<?=$reslt['id']?>,4)"></span>
                            <span class="fa fa-star" id="star5" onclick="job_rating(<?=$reslt['id']?>,5)"></span>
                            
                            <span class="pull-right">
                                
                                <a href="#" onclick="likes_job(<?=$reslt['id']?>); return false;" class="likes_job">
                                    <span id="likes-box" <?php if($is_likes_job) { echo 'style="color:#13B5EA !important;"'; } else { echo 'style="color:#333 !important;"'; } ?>><strong><?php if($is_likes_job) { echo 'Added to favourite'; } else { echo 'Add to favourite'; } ?></strong></span>-
                                    <i class="fa fa-heart-o" <?php if($is_likes_job) { echo 'style="color:#13B5EA !important;"'; } else { echo 'style="color:#333 !important;"'; } ?>></i>
                                </a>                                
                            </span>
                        </div>
                        <div id="follow-box"></div>
                        <div class="share-bar">
                            <span>Share</span><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
                        </div>
                        
                        <div class="recent-jobs">
                            <ul class="job-search-list pagination-sm" id="pagination-demo">
                                <?php if(!empty($similar_jobs)) {
                                            foreach($similar_jobs as $row) { ?>
                                                <li>
                                                  
                                                    <div class="col-md-8">
                                                        <h3><a href="<?php echo site_url('jobs/view/'.$row['id']); ?>"><?php echo isset($row['title']) ? ((strlen($row['title']) > 30) ? substr($row['title'],0,30).'...' : $row['title']) : ''; ?> <!--<span>view</span>--></a></h3>
                                                        <p><?php echo isset($row['description']) ? ((strlen($row['description']) > 100) ? substr($row['description'],0,100).'...' : $row['title']) : ''; ?> </p>
                                                        
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <?php $rating = get_job_rating($row['id']);?>
                                                            <div class="rating_outer">
                                                                <span class="fa fa-star <?php if($rating >= 1) echo "checked";?>" id="star1"></span>
                                                                <span class="fa fa-star <?php if($rating >= 2) echo "checked";?>" id="star2"></span>
                                                                <span class="fa fa-star <?php if($rating >= 3) echo "checked";?>" id="star3"></span>
                                                                <span class="fa fa-star <?php if($rating >= 4) echo "checked";?>" id="star4"></span>
                                                                <span class="fa fa-star <?php if($rating >= 5) echo "checked";?>" id="star5"></span>
                                                            </div>
                                                          <div class="apply-btn-box">
                                                          <a href="<?php echo site_url('jobs/view/'.$row['id']); ?>">Apply</a>
                                                          </div>
                                                          
                                                    </div>
                                                    
                                                    <div class="col-md-12"><div class="job_meta_info">
                	<span class="job_title_meta"><i class="fa fa-tag"></i> <?php echo isset($row['name']) ? $row['name'] : ''; ?></span>
                    <span class="job_post_meta"> <i class="fa fa-user"></i> Posted By :<?php echo isset($row['user_id']) ? get_user($row['user_id'])->username : ''; ?></span>
                    <span class="job_loc_meta"><i class="fa fa-map-marker"></i> <?php echo isset($row['location']) ? $row['location'] : ''; ?></span>
                    <span class="job_time"><i class="fa fa-clock-o"></i> <?php echo isset($row['user_id']) ? get_time_ago(strtotime($row['created_at'])) : ''; ?></span>
                </div>
            </div>
                                                    
                                                                                    
                                                </li>
                                <?php } }?>
                            </ul>
                        </div>
                                
                                
                    </div>
                </div>
                
                <div class="col-md-4">
                    <input type="submit" class="btn apply-thisjob" name="Update_profile" value="<?php if(!empty($is_apply)){ echo "Applied"; }else { echo "Apply Job"; }?>" <?php if(!empty($is_apply)) echo "disabled"; ?>>            	
                    <div class="apply-alternative">
                        <a href="#" title=""><i class="fa fa-linkedin"></i> Apply with Linkedin</a>
                        <span><i class="la la-heart-o"></i> Shortlist</span>
                    </div>
                    <div class="job-overview">
                        <h3>Job Overview</h3>
                        <ul>
                            <li><i class="fa fa-money"></i><h3>Offered Salary</h3><span>$<?php echo ($reslt['salary']) ? $reslt['salary'] : ''; ?></span></li>
                            <li><i class="fa fa-mars-double"></i><h3>Gender</h3><span><?php if($reslt['gender']) echo $reslt['gender'];?></span></li>				 				
                            <li><i class="fa fa-puzzle-piece"></i><h3>Category</h3><span><?php echo ($reslt['name']) ? $reslt['name'] : ''; ?></span></li>
                            <li><i class="fa fa-shield"></i><h3>Job Type</h3><span>
                                <?php if($reslt['job_type'] == 1) echo "Full Time";?>
                                <?php if($reslt['job_type'] == 2) echo "Part Time";?>
                                <?php if($reslt['job_type'] == 3) echo "Hourly";?>
                                <?php if($reslt['job_type'] == 4) echo "Freelancer";?>
                            </span></li>
                            <li><i class="fa fa-line-chart "></i><h3>Specialization</h3><span><?php echo ($reslt['specialization']) ? $reslt['specialization'] : ''; ?></span></li>
                        </ul>
                    </div>
                    <div class="job-location">
                        <h3>Job Location : <?php echo ($reslt['location']) ? $reslt['location'] : ''; ?></h3>
                        <div class="job-lctn-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d926917.0482572999!2d-104.57738594649922!3d40.26036964524562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2s!4v1513784737244"></iframe>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
