<section class="search_panel col-md-12">
<div class="container">
    <form method="post" id="filter_form">
	<div class="col-md-3 col-sm-4 sidebar">
        <div class="job-search-filter-wrap">
            <h2 class="minus">Job Title or Keyword</h2>
            <div class="job-checkbox-toggle open filter_job">
                <input class="form-control" name="title" type="text" value="<?php echo (isset($_POST['title'])) ? $_POST['title']:''?>">
            </div>
        </div>
    	<div class="job-search-filter-wrap">
            <h2 class="minus plus">date posted </h2>
            <div class="job-checkbox-toggle">
                <ul class="job-checkbox filter_job">
                    <li>
                        <input  type="radio" class="ago" name="ago" value="1">
                        <label>Today</label>
                    </li>                    
                    <li>
                        <input  type="radio" class="ago" name="ago" value="2">
                        <label>last 2 days</label>
                    </li>
                    <li>
                        <input  type="radio" class="ago" name="ago" value="3">
                        <label>last 15 days</label>
                    </li>
                    <li>
                        <input  type="radio" class="ago" name="ago" value="4">
                        <label>last Month</label>
                    </li>
                    <li>
                        <input  type="radio" class="ago" name="ago" value="5">
                        <label>last 2 Months</label>
                    </li>
                    <li>
                        <input  type="radio" class="ago" name="ago" value="">
                        <label>all</label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="job-search-filter-wrap">
            <h2 class="minus">job type </h2>
            <div class="job-checkbox-toggle">
                <ul class="job-checkbox filter_job">
                    <li>
                        <input  type="checkbox" class="type" name="type[]" value="1">
                        <label>Full Time</label>
                    </li>
                    <li>
                        <input  type="checkbox" class="type" name="type[]" value="2">
                        <label>Part Time</label>
                    </li>
                    <li>
                        <input  type="checkbox" class="type" name="type[]" value="3">
                        <label>Hourly</label>
                    </li>
                    <li>
                        <input  type="checkbox" class="type" name="type[]" value="4">
                        <label>Freelancer</label>
                    </li>                   
                    <li>
                        <input  type="checkbox" class="type" name="type[]" value="0">
                        <label>all</label>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="job-search-filter-wrap">
            <h2 class="minus">Specialization</h2>
            <div class="job-checkbox-toggle open">
                <ul class="careerfy-checkbox filter_job">
                    <?php if(!empty($categories)) {
                           foreach($categories as $c) {?>
                                <li>
                                    <input  type="checkbox" value="<?=$c['id']?>" name="category[]" class="category" <?php echo (isset($_POST['category']) && ($_POST['category'] == $c['id'])) ? 'checked':''?>>
                                    <label><?=$c['name']?></label>
                                </li>
                            <?php } } ?>                    
                </ul>
            </div>
        </div>
        
        
        <div class="job-search-filter-wrap">
            <h2 class="minus">offer sallery </h2>
            <div class="job-checkbox-toggle">
                <select class="selectpicker filter_job" data-live-search="true" name="salary">
                    <option selected="selected">Select Salary</option>
                    <option data-tokens="1" value="100000">Above 1 lac</option>
                    <?php for($i=2; $i<=100; $i++){ ?>
                        <option data-tokens="<?=$i?>" value="<?=$i.'00000'?>"><?=$i?> +</option>
                    <?php } ?>                    
                </select>                
            </div>
        </div>
         <div class="job-search-filter-wrap">
            <h2 class="minus">experience</h2>
            <div class="job-checkbox-toggle">
                <select class="selectpicker filter_job" data-live-search="true" name="experience">
                    <option selected="selected">Select Experience</option>
                    <option data-tokens="0" value="0">Fresher</option>
                    <?php for($i=1; $i<=10; $i++){ ?>
                        <option data-tokens="<?=$i?>" value="<?=$i?>"><?=$i?> +</option>
                    <?php } ?>                    
                </select>                
            </div>
        </div>
        
        <div class="job-search-filter-wrap">
            <h2 class="minus">gender</h2>
            <div class="job-checkbox-toggle">
                <ul class="careerfy-checkbox filter_job">
                    <li>
                        <input  type="checkbox" name="gender[]" value="male" class="gender male">
                        <label>male</label>
                    </li>
                    <li>
                        <input  type="checkbox" name="gender[]" value="female" class="gender female">
                        <label>female</label>
                    </li>
                    <li>
                        <input type="checkbox" name="gender[]" value="both" class="gender both">
                        <label>all</label>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="job-search-filter-wrap">
            <h2 class="minus">location</h2>
            <div class="job-checkbox-toggle open filter_job">
                <input class="form-control" name="location" type="text" value="<?php echo (isset($_POST['location'])) ? $_POST['location']:''?>">
            </div>
        </div>
        
       
        
    	
    </div>
    </form>
    <div class="col-md-9 col-sm-8">
    	<div class="sort-panel">
        <div class="col-md-6"><h2> jobs & vacancies</h2></div>
        <div class="col-md-6">
                            <select class="selectpicker">
                              <option>Default</option>
                              <option>Top</option>
                              <option>Bottom</option>
                            </select><label>sort by : </label>
         </div>
        </div>
        <ul class="job-search-list pagination-sm" id="pagination-demo">
            <div class=""><center><h4><?=count($posted_jobs)?> results found</h4></center></div>
            <?php if(isset($posted_jobs)) {
                    $count = 0;                              
                    foreach($posted_jobs as $row){ ?>
        	<li>
            	
                <div class="col-md-8">
                	<h3><a href="<?php echo site_url('jobs/view/'.$row['id']); ?>"><?php echo isset($row['title']) ? ((strlen($row['title']) > 30) ? substr($row['title'],0,30).'...' : $row['title']) : ''; ?> <!--<span>view</span>--></a></h3>
                    <p><?php echo isset($row['description']) ? ((strlen($row['description']) > 200) ? substr($row['description'],0,200).'...' : $row['description']) : ''; ?> </p>
                   
                </div>
                <div class="col-md-4 text-right">
                	<!--<div class='rating-stars text-center'>
                        <ul id='stars'>
                          <li class='star' title='Poor' data-value='1'>
                            <i class='fa fa-star fa-fw'></i>
                          </li>
                          <li class='star' title='Fair' data-value='2'>
                            <i class='fa fa-star fa-fw'></i>
                          </li>
                          <li class='star' title='Good' data-value='3'>
                            <i class='fa fa-star fa-fw'></i>
                          </li>
                          <li class='star' title='Excellent' data-value='4'>
                            <i class='fa fa-star fa-fw'></i>
                          </li>
                          <li class='star' title='WOW!!!' data-value='5'>
                            <i class='fa fa-star fa-fw'></i>
                          </li>
                        </ul>
                      </div>-->
                        <?php $rating = get_job_rating($row['id']);?>
                            <div class="rating_outer">
                                <span class="fa fa-star <?php if($rating >= 1) echo "checked";?>" id="star1"></span>
                                <span class="fa fa-star <?php if($rating >= 2) echo "checked";?>" id="star2"></span>
                                <span class="fa fa-star <?php if($rating >= 3) echo "checked";?>" id="star3"></span>
                                <span class="fa fa-star <?php if($rating >= 4) echo "checked";?>" id="star4"></span>
                                <span class="fa fa-star <?php if($rating >= 5) echo "checked";?>" id="star5"></span>
                            </div>
                      <div class="apply-btn-box">
                      <!--<i class="fa fa-heart-o"></i>--> <a href="<?php echo site_url('jobs/view/'.$row['id']); ?>">Apply</a>
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
            <?php  } }?>             
            
            
        </ul>
</div>
        
    </div>
    
</div>
</section>
