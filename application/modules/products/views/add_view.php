<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">Upload <?=($type == '2') ? "Audios" : (($type == '1')  ? "Videos" : "Pictures");?></div>
                
                 <div class="upload_panel">
                 	<!--<button type="button" class="button_design button_blue" data-toggle="modal" data-target="#productModal">Click For Upload Video</button>-->
                    <a href="<?php echo site_url('products/index/'.$type);?>"><button type="button" class="button_design button_blue"><i class="fa fa-list"></i> My <?=($type == '2') ? "Audios" : (($type == '1')  ? "Videos" : "Pictures");?></button></a>
                 </div>
                 
                 <div class="upload_listing">
                 	
                    <div id="upload_msg"></div> 
                    <?php
                    $types = ($type == '2') ? "Audios" : (($type == '1')  ? "Videos" : "Pictures");
                    if($type == 1){
                        $product_count  = count($no_of_videos);
                        $limit          = ($current_plan['video_limit']);
                    }else if($type == 2){
                        $product_count  = count($no_of_audios);
                        $limit          = ($current_plan['audio_limit']);
                    }else if($type == 3){
                        $product_count  = count($no_of_pictures);
                        $limit          = ($current_plan['pic_limit']);
                    }else{
                        $product_count  = 0;
                        $limit          = 0;
                    }
                    
                       $valid_to = (isset($subscr)) ? $subscr->valid_to : $result->account_valid;                      
                       if(($product_count < $limit ) || $limit == '-1'){                        
                        if((($result->account_type == 'pro') && ($valid_to >= date('Y-m-d h:i:s'))) ||  $result->account_type == '' || $result->account_type == 'free'){ ?>
                            <h4><?php echo $product_count.' of '.(($limit>0)?$limit:'unlimited').' '.$types.' have been uploaded';?></h4>
                             <form role="form" action="<?php echo base_url().'products/add/'.$type; ?>" id="myForm1" name="" method="post" enctype="multipart/form-data">
                                <!--<input type="file" id="upload_file" name="upload_file" />-->
                                <div class="form-group"> 
                                <label><?=($type == '2') ? "Audio" : (($type == '1')  ? "Video" : "Picture");?> Title </label> 
                                 <div class="input_box"> 
                                     <input placeholder="Enter <?=($type == '2') ? "Audio" : (($type == '1')  ? "Video" : "Picture");?> Title" name="title" class="input-text form-control" required="required" type="text">
                                     <i class="fa fa-tag"></i>
                                 </div>
                                 </div>
                                
                                <div class="form-group">
                                    <label>Description</label>
                                   <div class="input_box"> 
                                       <textarea placeholder="Enter <?=($type == '2') ? "Audio" : (($type == '1')  ? "Video" : "Picture");?> Description" name="description" class="input-text form-control" required></textarea>
                                       <i class="fa fa-comment"></i>
                                   </div>
                                   </div>
                                
                                <div class="form-group">
                                    <label><?=($type == '2') ? "Audio" : (($type == '1')  ? "Video" : "Picture");?></label>
                                     <input type="file" name="file" class="file" id="upload_file" required>
                                     <div class="input-group input_box">
                                       <i class="fa fa-file-<?=($type == '2') ? "audio-o" : (($type == '1')  ? "video-o" : "image-o");?>"></i>
                                       <input type="text" class="form-control input-text browse-text" name="" placeholder="Upload <?=($type == '2') ? "Audio" : (($type == '1')  ? "Video" : "Picture");?>" required onkeypress="return false;">
                                      
                                         <button class="browse btn btn-primary input-lg" type="button"> Browse</button>
                                       
                                     </div>                                                          
                                </div>
                                
                                <?php if($type == '2') { ?>
                                 <div class="form-group">
                                    <label>Audio Image</label>
                                     <input type="file" name="image_thumb" class="file1" >
                                     <div class="input-group input_box">
                                       <i class="fa fa-file-image-o"></i>
                                       <input type="text" class="form-control input-text browse-text" name="" placeholder="Upload Image"  onkeypress="return false;">
                                      
                                         <button class="browse1 btn btn-primary input-lg" type="button"> Browse</button>
                                       
                                     </div>                                                          
                                </div>
                                <?php } ?> 
                                 
                                <?php if($type != '3') { ?>
                                            <div class="form-group">
                                            <label>Genre</label>                                             
                                            <div class="">
                                               <select class="selectpicker" data-live-search="true" required name="genre">
                                                   <option value="" selected="selected">Select Genre</option>
                                                   <?php foreach($genres as $g) {?>
                                                      <option  data-tokens="<?=$g['name']?>" value="<?=$g['id']?>"><?=$g['name']?></option>
                                                   <?php } ?>                                       		                                            
                                               </select><i class="fa fa-gear"></i>
                                            </div>
                                <?php } ?>
                                <div class="form-group"> 
                                <label>Price (in dollar)</label>
                                <div class="input_box"> 
                                    <input placeholder="Enter <?=($type == '2') ? "Audio" : (($type == '1')  ? "Video" : "Picture");?> Price" name="price" class="input-text form-control"  type="number" required>
                                    <i class="fa fa-money"></i>
                                </div>
                                </div>
                                <div class="form-group"> 
                                <label>Keywords</label>
                                <div class="input_box"> 
                                    <input placeholder="Enter <?=($type == '2') ? "Audio" : (($type == '1')  ? "Video" : "Picture");?> Tags" name="tags" class="input-text form-control"  type="text">
                                    <i class="fa fa-tag"></i>
                                </div>
                                </div>
                                <input type="hidden" id="thumb" name="thumb" value="">
                                <input type="submit" name='submit_image' class="btn btn-primary" id="get-thumbnail" value="Submit" onclick='upload_image();'/> 
                            </form>     
                    <?php }else{
                            echo "<h4>Your account validity has been expired. please upgrade your account.</h4>";
                        } } else{                            
                            echo "<h4>Your can only upload ".$limit." ".$types.", Delete some old one and try again.</h4>";
                        }?>
                        <video id="main-video" controls style="display:none">
                            <source type="video/mp4">
                        </video>
                        <canvas id="video-canvas" style="display:none"></canvas>       
                                                                                                                                                                                    
                 </div>
                
                
                
                <div class='progress' id="progress_div">
                <div class='bar' id='bar'></div>
                <div class='percent' id='percent'>0%</div>
                </div>
                <br /> 
                <iframe id="upload_frame" name="upload_frame" frameborder="0" border="0" src="" scrolling="no" scrollbar="no" > </iframe> 
                <br /> 
            
            
        </div>
        	
    </div>
</div>
</div>

</div>
