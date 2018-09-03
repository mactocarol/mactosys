<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">My <?=($type == '2') ? "Audios" : (($type == '1')  ? "Videos" : "Pictures");?></div>
                <div class="search_panel_outer">
                	<!--<div class="input_box"><input type="search" placeholder="Enter Title For Searching...." class="input-text form-control"><i class="fa fa-search"></i>
                   
                    </div>
                     <button><i class="fa fa-search"></i></button>-->
                </div>
                 <div class="upload_panel">
                 	<!--<button type="button" class="button_design button_blue" data-toggle="modal" data-target="#productModal">Click For Upload Video</button>-->
                    <a href="<?php echo site_url('products/add/'.$type);?>"><button type="button" class="button_design button_blue">Click For Upload <?=($type == '2') ? "Audios" : (($type == '1')  ? "Videos" : "Pictures");?></button></a>
                 </div>
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
                 <div class="upload_listing">
                 	
                                     <!--  video gallery -->
                                <?php if(isset($products)) {
                                        $count = 0;                              
                                        foreach($products as $row){ ?>
                                            <div class="col-md-4">
                                               <div class="list-item__image">
                                               <div class="overlay">
                                                           <a href="<?php echo base_url(); ?>products/edit/<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                                                           
                                                           <a href="<?php echo site_url('products/detail/'.$row['id']);?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                           <a href="<?php echo base_url(); ?>products/delete/<?php echo $row['id'];?>/<?php echo $type;?>" onclick=" var c = confirm('Are you sure want to delete?'); if(!c) return false;"><i class="fa fa-close" aria-hidden="true"></i></a>
                                                           
                                                           </div>
                                                   
                                                   
                                                <!--   <a href="<?php echo site_url('products/detail/'.$row['id']);?>">-->
                                                    <?php if(isset($row['file']) && $row['file'] != '') { ?>
                                                        <?php if($row['file_type'] == 1) { ?>
                                                            <?php if($row['thumb']) {?>
                                                            <img src="<?php echo base_url('upload/products/video_thumb/'.$row['thumb']);?>" height="138">
                                                            <div class="list-item__play">
                                                             <span class="list-item__play-button" href="#">
                                                                <i class="fa  fa-play-circle"></i>
                                                              </span>                                                            
                                                            </div>
                                                            <?php } else {?>
                                                            <video width="250" height="138"  controlsList="nodownload">
                                                              <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mp4">
                                                              <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/avi">
                                                              <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mov">
                                                            Your browser does not support the products tag.
                                                            </video>
                                                            <?php } ?>
                                                        <?php }else if($row['file_type'] == 2) {?>
                                                           
                                                            <img src="<?php echo base_url('upload/products/audio_thumb/'.$row['thumb']);?>" height="138">
                                                            <div class="list-item__play">
                                                             <span class="list-item__play-button" href="#">
                                                                <i class="fa  fa-play-circle"></i>
                                                              </span>                                                            
                                                            </div> 
                                                        <?php }else if($row['file_type'] == 3) {?>
                                                            <img src="<?php echo base_url('upload/products/image_thumb/'.$row['file']);?>" height="138">
                                                            
                                                        <?php } ?>
                                                    <?php } ?>
                                                 
                                                    
                                                 </div>
                                                 <h6 class="ng-binding"><?php echo isset($row['title']) ? substr($row['title'],0,20).'' : ''; ?></h6>
                                                <!-- <h5><?php echo isset($row['name']) ? $row['name'] : ''; ?></h5>-->
                                                 
                                            </div>
                                        <?php } } ?>                                            
                                                                                                                                                                                      
                 </div>
                
                
            
            
        </div>
        	
    </div>
</div>
</div>


