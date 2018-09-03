 <!--<link href="<?php echo base_url('front');?>/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="<?php echo base_url('front');?>/css/bootstrap-select.min.css">
 <link href="<?php echo base_url('front');?>/css/style.css" rel="stylesheet">-->
        <ul class="job-search-list pagination-sm" id="pagination-demo">
            <div class=""><center><h4><?=count($posted_jobs)?> jobs found</h4></center></div>
            <?php if(isset($posted_jobs)) {
                    $count = 0;                              
                    foreach($posted_jobs as $row){ ?>
        	<li>
            	
                <div class="col-md-8">
                	<h3><a href="<?php echo site_url('jobs/view/'.$row['id']); ?>"><?php echo isset($row['title']) ? ((strlen($row['title']) > 30) ? substr($row['title'],0,30).'...' : $row['title']) : ''; ?> <!--<span>view</span>--></a></h3>
                    <p><?php echo isset($row['description']) ? ((strlen($row['description']) > 200) ? substr($row['description'],0,200).'...' : $row['title']) : ''; ?> </p>
                    
                </div>
                <div class="col-md-4 text-right">
                	<div class='rating-stars text-center'>
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
                      </div>
                      <div class="apply-btn-box">
                      <i class="fa fa-heart-o"></i> <a href="<?php echo site_url('jobs/view/'.$row['id']); ?>">Apply</a>
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
        
<!--<script src="<?php echo base_url('front');?>/js/bootstrap-select.min.js"></script>-->
<!--<script>
        $('.selectpicker').selectpicker({
  style: 'btn-info',
  size: 4
});
</script>-->