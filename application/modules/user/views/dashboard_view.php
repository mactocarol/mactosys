


<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
        	<div class="panel-profile">
            	<div class="profile-bg-info text-center" style="background-image:url(<?php echo base_url(); ?>upload/cover_image/<?=$result->cover_image?>">
                	<div class="overlay_prof"></div>
            	
                <div class="profile_info">
                <div class="profile-image">
                  <a class="edit_icon" data-toggle="modal" data-target="#myModal1"><i class="fa fa-pencil"></i> Edit cover pic</a>
                  <img src="<?php echo base_url(); ?>upload/profile_image/thumb/<?=$result->image?>" alt="" class="img100_100 img-circle">
                   <a class="edit_icon" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i> Edit profile pic</a>                                      
                </div>
                
                <h3><?php print_r($this->session->userdata('email'));?></h3>
                <h5><?php echo ($result->about_me) ? substr($result->about_me,0,150).'........' : 'I am a music love, web developer and front end themer from Lisbon Portugal,
                  I love travelling, playing drums and surfing'; ?></h5>
              </div>
              
            </div>
            
            <div class="profile-sub-header">

                      <div class="profile-stats-block">
                        <div class="stats-label">
                          <span>
                            Birth date
                          </span>
                        </div>
                        <div class="stats-value">
                          <?php echo ($result->dob) ? date('d M Y',strtotime($result->dob)) : 'Not Mentioned'; ?>
                        </div>
                      </div>
                
                      <div class="profile-stats-block">
                        <div class="stats-label">
                          <span>
                            Nationality
                          </span>
                        </div>
                        <div class="stats-value">
                          <i class="fa fa-language color-primary"></i>&nbsp; <?php echo ($result->nationality) ? date('',strtotime($result->nationality)) : 'Not Mentioned'; ?>
                        </div>
                      </div>
                
                      <div class="profile-stats-block">
                        <div class="stats-label">
                          <span>
                            Cool
                          </span>
                        </div>
                        <a href="" onclick="return false;"><i class="fa fa-hand-peace-o"></i> <?php echo count(get_cool_list($result->id));?></a>
                      </div>
                
                      <div class="profile-stats-block pull-right">
                        <a href="<?php echo site_url('user/profile'); ?>" class="btn btn-primary">
                          Edit Profile
                        </a>
                      </div>
                
                    </div>
                    
             <section class="page-profile">
             	<div class="row">
                	<div class="col-md-8">
                    	<div class="panel panel-default">
                        	<div class="panel-body">
                            	<h4>
                                    <i class="fa fa-list color-primary"></i>&nbsp;&nbsp; My favourite lists
                                  </h4>
                                  <div id="horizontalTab">
                                    <ul class="resp-tabs-list">
                                    <li>images</li>
                                    <li>videos</li>
                                    <li>albums</li>
                                    <li>music</li>
                                    </ul>
                                    <?php $favourite = get_favorite_products($result->id);?>
                                    <?php $fav_album = get_favorite_album($result->id);?>
                                    <div class="resp-tabs-container">
                                        <!--  Images gallery -->
                                        <div>
                                            <div class="gallery">                                            
                                                <?php $k = 0;
                                                    if(!empty($favourite[2])){
                                                    foreach($favourite[2] as $fav){ ?>
                                                        <a href="<?php echo base_url('upload/products/'.$fav['file']);?>"><img src="<?php echo base_url('upload/products/'.$fav['file']);?>" width="102" height="102" alt="" title=""/></a>
                                                        <?php if(($k%4) == 1) { ?><div class="clear"></div><?php } ?>
                                                <?php $k++; } } else { echo 'No Images in your favourite list'; }  ?>                                            
                                            </div>
                                        </div>
                                                                                                                
                                        <!--  video gallery -->
                                       <div>                                                                                            
                                           <?php $k = 0;
                                           if(!empty($favourite[0])){
                                           foreach($favourite[0] as $fav){ ?>    
                                           <div class="col-md-4">
                                              <div class="list-item__image">                                               
                                                  <a href="<?php echo site_url('products/view/'.$fav['id']);?>">
                                                       <video width="250" height="138"  controlsList="nodownload">
                                                           <source src="<?php echo base_url('upload/products/'.$fav['file']); ?>" type="video/mp4">
                                                           <source src="<?php echo base_url('upload/products/'.$fav['file']); ?>" type="video/avi">
                                                           <source src="<?php echo base_url('upload/products/'.$fav['file']); ?>" type="video/mov">                                                  
                                                       </video>
                                                  </a>
                                                  <div class="list-item__play">
                                                    <span class="list-item__play-button" href="<?php echo site_url('products/view/'.$fav['id']);?>">
                                                      <i class="fa  fa-play-circle"></i>
                                                    </span>                                            
                                                  </div>                                                 
                                               </div>
                                                <h6 class="ng-binding"><?=$fav['title']?></h6>                                         
                                           </div>
                                           <?php $k++; } } else { echo 'No Video in your favourite list'; } ?>
                                       </div>
                                       
                                       
                                       <!--  album gallery -->
                                       <div>
                                        <?php $k = 0;
                                           if(!empty($fav_album)){
                                           foreach($fav_album as $fav){ ?>  
                                           <div class="col-md-4">
                                               <div class="list-item__image">
                                                   <a href="<?php echo site_url('album/view/'.$fav->id);?>"><img  src="<?php echo base_url('upload/products/album_thumb/'.$fav->thumb);?>"></a>
                                                   <div class="list-item__play">
                                                     <span class="list-item__play-button" href="#">
                                                       <i class="fa  fa-play-circle"></i>
                                                     </span>
                                                   </div>
                                               </div>
                                               <h6 class="ng-binding"><?=$fav->title?></h6>                                          
                                           </div>
                                           <?php $k++; } } else { echo 'No album in your favourite list'; } ?>
                                       </div>
                                       
                                        
                                       <!--  music gallery -->
                                       <div>
                                        <?php $k = 0;
                                            if(!empty($favourite[1])){
                                           foreach($favourite[1] as $fav){ ?> 
                                           <div class="col-md-4">
                                               <div class="list-item__image">
                                                   <a href="<?php echo site_url('products/view/'.$fav['id']);?>"><img  src="<?php echo base_url('upload/products/album_thumb/'.$fav['thumb']);?>"></a>
                                                   <div class="list-item__play">
                                                     <span class="list-item__play-button" href="#">
                                                       <i class="fa  fa-play-circle"></i>
                                                     </span>
                                                   </div>
                                                 </div>
                                                 <h6 class="ng-binding"><?=$fav['title']?></h6>                                              
                                           </div>
                                           <?php $k++; } } else { echo 'No Audio in your favourite list'; } ?>
                                       </div>                                    
                                    </div>
                                </div>                                                                   
                            </div>
                        </div>
                        
                        <div class="panel panel-default">
                            <?php $favourite_jobs = get_favorite_jobs($result->id);?>
                        	<div class="panel-body">
                            	<h4><i class="fa fa-list color-primary"></i>&nbsp;&nbsp; My favourite job lists</h4>
                                
                                <div class="table-responsive">
                                <table>
                                	<thead>
                                    	<tr><th>Title</th> <th width="100px">Category</th><th width="100px">Action</th></tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(!empty($favourite_jobs)) {
                                            foreach($favourite_jobs as $job){
                                        ?>
                                    	<tr>
                                        	<td><?=$job->title?></td>
                                            <td><?=get_category($job->category)->name?></td>
                                            <td>
                                                <a href="<?php echo site_url('jobs/view/'.$job->id);?>"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <?php } } else { ?>
                                        <tr>
                                        	<td colspan="3">No Jobs in your favourite list</td>                                            
                                        </tr>
                                        <?php } ?>                                        
                                    </tbody>
                                </table>
                                </div>
                             </div>
                        </div>     
                        
                    </div>
                    <div class="col-md-4">
                    	<div class="panel panel-default">
                            <div class="panel-body">
                              <?php $following_list = get_following_list($result->id); ?>
                              <h4>
                                <i class="fa fa-history color-primary"></i>&nbsp;&nbsp; Following this artist (<?=count($following_list)?>)
                              </h4>
                              <div>
                    
                                <ul class="list-inline">
                                <?php
                                if(!empty($following_list)){
                                    foreach($following_list as $following){ ?>
                                        <li>
                                          <a href="<?php echo site_url('search/view/'.$following->artist_id);?>" title="<?=get_user($following->artist_id)->username?>"><img src="<?php echo base_url('upload/profile_image/thumb/'.get_user($following->artist_id)->image);?>" alt="" class="img30_30 img-circle" tooltip-placement="bottom" tooltip="<?=get_user($following->artist_id)->username?>" tooltip-append-to-body="true"></a>
                                        </li>
                                    <?php }
                                    }else{
                                        echo "You haven't started following yet";
                                    }
                                    ?>                            
                                </ul>
                    
                              </div>
                            </div>
                          </div>
                          
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <?php $follower_list = get_follower_list($result->id); ?>
                              <h4>
                                <i class="fa fa-history color-primary"></i>&nbsp;&nbsp; My Followers (<?=count($follower_list)?>)
                              </h4>
                              <div>
                    
                                <ul class="list-inline">
                                <?php
                                if(!empty($follower_list)){
                                    foreach($follower_list as $follower){ ?>
                                        <li>
                                          <a href="<?php echo site_url('search/view/'.$follower->follower_id);?>" title="<?=get_user($follower->follower_id)->username?>"><img src="<?php echo base_url('upload/profile_image/thumb/'.get_user($follower->follower_id)->image);?>" alt="" class="img30_30 img-circle" tooltip-placement="bottom" tooltip="<?=get_user($follower->follower_id)->username?>" tooltip-append-to-body="true"></a>
                                        </li>
                                    <?php }
                                    }else{
                                        echo "Nobody follows you";
                                    }
                                    ?>                            
                                </ul>
                    
                              </div>
                            </div>
                          </div>
                          
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <h4>
                                <i class="fa fa-share-alt color-primary"></i>&nbsp;&nbsp; Share the profile
                              </h4>
                              <div>
                                <a href="javascript:;" class="btn-icon btn-icon-sm btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="javascript:;" class="btn-icon btn-icon-sm btn-facebook"><i class="fa fa-facebook"></i></a>
                                <a href="javascript:;" class="btn-icon btn-icon-sm btn-google-plus"><i class="fa fa-google-plus"></i></a>
                                <a href="javascript:;" class="btn-icon btn-icon-sm btn-pinterest"><i class="fa fa-pinterest"></i></a>
                                <a href="javascript:;" class="btn-icon btn-icon-sm btn-instagram"><i class="fa fa-instagram"></i></a>
                              </div>
                            </div>
                          </div>
                          
                          <!--<div class="panel panel-default">
                            <div class="panel-body">
                              <h4>
                                <i class="fa fa-bullhorn color-primary"></i>&nbsp;&nbsp; Latest chats
                              </h4>
                              <div>
                                <div class="chat-window">
                    
                                  <div class="friends-list">
                                    <div class="friend-item online">
                                      <div class="friend-image">
                                        <img src="<?php echo base_url('front');?>/images/team4.jpg" alt="" class="img30_30 img-circle">
                                      </div>
                                      <div class="friend-name">
                                        <h5>Philip Gragoline</h5>
                                        <h6>
                                          New york
                                        </h6>
                                      </div>
                                    </div>
                    
                                    <div class="friend-item online">
                                      <div class="friend-image">
                                        <img src="<?php echo base_url('front');?>/images/team4.jpg" alt="" class="img30_30 img-circle">
                                      </div>
                                      <div class="friend-name">
                                        <h5>Christopher Factory</h5>
                                        <h6>
                                          New york
                                        </h6>
                                      </div>
                                    </div>
                    
                                    <div class="friend-item online">
                                      <div class="friend-image">
                                        <img src="<?php echo base_url('front');?>/images/team5.jpg" alt="" class="img30_30 img-circle">
                                      </div>
                                      <div class="friend-name">
                                        <h5>Tony Banken</h5>
                                        <h6>
                                          New york
                                        </h6>
                                      </div>
                                    </div>
                    
                                    <div class="friend-item online">
                                      <div class="friend-image">
                                        <img src="<?php echo base_url('front');?>/images/team6.jpg" alt="" class="img30_30 img-circle">
                                      </div>
                                      <div class="friend-name">
                                        <h5>Gregory Anderson</h5>
                                        <h6>
                                          New york
                                        </h6>
                                      </div>
                                    </div>
                    
                                    <div class="friend-item online">
                                      <div class="friend-image">
                                        <img src="<?php echo base_url('front');?>/images/team2.jpg" alt="" class="img30_30 img-circle">
                                      </div>
                                      <div class="friend-name">
                                        <h5>Antony walshy</h5>
                                        <h6>
                                          New york
                                        </h6>
                                      </div>
                                    </div>
                    
                                    <div class="friend-item offline">
                                      <div class="friend-image">
                                        <img src="<?php echo base_url('front');?>/images/team2.jpg" alt="" class="img30_30 img-circle">
                                      </div>
                                      <div class="friend-name">
                                        <h5>Philip Gragoline</h5>
                                        <h6>
                                          New york
                                        </h6>
                                      </div>
                                    </div>
                                  </div>
                    
                                </div>
                              </div>
                            </div>
                          </div>-->
                    </div>
                </div>
             </section>       
        </div>
    </div>
</div>
</div>

</div>