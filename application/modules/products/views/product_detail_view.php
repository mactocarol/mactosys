<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title"><?php echo ($products[0]['title']) ? $products[0]['title'] : 'Video';?></div>
                <div class="search_panel_outer">
                	<div class="input_box"><input type="search" placeholder="Enter Title For Searching...." class="input-text form-control"><i class="fa fa-search"></i>
                   
                    </div>
                     <button><i class="fa fa-search"></i></button>
                </div>
                 <div class="upload_panel">
                 	<!--<button type="button" class="button_design button_blue" data-toggle="modal" data-target="#productModal">Click For Upload Video</button>-->
                    <a href="<?php echo site_url('products/index/'.$type);?>"><button type="button" class="button_design button_blue">My <?=($type == '2') ? "Audios" : (($type == '1')  ? "Videos" : "Pictures");?></button></a>
                 </div>
                 
                 <div class="upload_listing">
                 	
                                     <!--  video gallery -->
                                <?php if(isset($products)) {
                                        $count = 0;                              
                                        foreach($products as $row){ ?>
                                          
                                            <div class="">
                                           
                                               <div class="list-full-view">
                                                   
                                                   
                                                   
                                                    <?php if(isset($row['file']) && $row['file'] != '') { ?>
                                                        <?php if($row['file_type'] == 1) { ?>
                                                            <video width="600" height="400" controls  controlsList="nodownload">
                                                              <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mp4">
                                                              <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/avi">
                                                              <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mov">
                                                            Your browser does not support the products tag.
                                                            </video>
                                                        <?php }else if($row['file_type'] == 2) {?>
                                                            <img src="<?php echo base_url('upload/products/audio_thumb/'.$row['thumb']);?>">
                                                            <audio controls controlsList="nodownload">
                                                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="audio/ogg">
                                                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="audio/mpeg">
                                                             Your browser does not support the audio element.
                                                            </audio> 
                                                        <?php }else if($row['file_type'] == 3) {?>
                                                            <img src="<?php echo base_url('upload/products/'.$row['file']);?>" height="500">                                                            
                                                        <?php } ?>
                                                    <?php } ?>
                                                                                                      
                                                 </div>
                                               
                                                 <div class="list-fullview-info">
                                                 <h3 class="ng-binding"><?php echo isset($row['title']) ? $row['title'] : ''; ?></h3>
                                                 <h4>Genre - <?php echo isset($row['name']) ? $row['name'] : ''; ?></h4>
                                                 <p><?php echo isset($row['description']) ? $row['description'] : ''; ?></p>
                                                 <a href="<?php echo base_url(); ?>products/edit/<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                 <a href="<?php echo base_url(); ?>products/delete/<?php echo $row['id'];?>/<?php echo $type;?>" onclick=" var c = confirm('Are you sure want to delete?'); if(!c) return false;"><i class="fa fa-close" aria-hidden="true"></i> Delete</a></div>
                                            </div>
                                            </div>
                                        <?php } } ?>                                            
                                     
                
                
            
            
        </div>
        	
    </div>
</div>
</div>


