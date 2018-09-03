<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">Update <?=($type == '2') ? "Audios" : (($type == '1')  ? "Videos" : "Pictures");?></div>
                
                 <div class="upload_panel">
                 	<!--<button type="button" class="button_design button_blue" data-toggle="modal" data-target="#productModal">Click For Upload Video</button>-->
                    <a href="<?php echo site_url('products/index/'.$type);?>"><button type="button" class="button_design button_blue">My <?=($type == '2') ? "Audios" : (($type == '1')  ? "Videos" : "Pictures");?></button></a>
                 </div>
                 
                 <div class="upload_listing">
                    <!--
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
                    -->
                    <div id="upload_msg"></div> 
                    
                    
                                   <form role="form" id="myForm1" name="" method="post" action="<?php echo base_url().'products/edit/'.$reslt->id;?>" enctype="multipart/form-data">
        	
                                            <div class="form-group">
                                            <label><?=($type == '2') ? "Audio" : (($type == '1')  ? "Video" : "Picture");?> Title </label> 
                                             <div class="input_box"> 
                                                 <input placeholder="Enter Video Title" name="title" class="input-text form-control" required="required" type="text" value="<?php echo isset($reslt->title)? $reslt->title:'';?>">
                                                 <i class="fa fa-tag"></i>
                                             </div>
                                             </div>
                                              <div class="form-group">
                                                <label>Description</label>
                                             <div class="input_box"> 
                                                 <textarea placeholder="Enter Video Description" name="description" class="input-text form-control" required><?php echo isset($reslt->description)? $reslt->description:'';?></textarea>
                                                 <i class="fa fa-comment"></i>
                                             </div>
                                             </div>
                                              
                                             <div class="form-group">
                                                 <label><?=($type == '2') ? "Audio" : (($type == '1')  ? "Video" : "Picture");?></label>
                                                     <input type="file" name="file" class="file" id="upload_file">
                                                     <div class="input-group input_box">
                                                       <i class="glyphicon glyphicon-picture"></i>
                                                       <input type="text" class="form-control input-text browse-text" name="" placeholder="Upload <?=($type == '2') ? "Audio" : (($type == '1')  ? "Video" : "Picture");?>" onkeypress="return false;">
                                                      
                                                         <button class="browse btn btn-primary input-lg" type="button"> Browse</button>
                                                       
                                                     </div>
                                                    <?php if(isset($reslt->file) && $reslt->file != '' && $reslt->file_type == 1) { ?>  
                                                        <video width="200" height="150" controls controlsList="nodownload">
                                                          <source src="<?php echo base_url('upload/products/'.$reslt->file); ?>" type="video/mp4">
                                                          <source src="<?php echo base_url('upload/products/'.$reslt->file); ?>" type="video/avi">
                                                          <source src="<?php echo base_url('upload/products/'.$reslt->file); ?>" type="video/mov">
                                                        Your browser does not support the video tag.
                                                        </video>
                                                      <?php } else if(isset($reslt->file) && $reslt->file != '' && $reslt->file_type == 2) { ?>
                                                          <audio controls controlsList="nodownload">
                                                              <source src="<?php echo base_url('upload/products/'.$reslt->file); ?>" type="audio/ogg">
                                                              <source src="<?php echo base_url('upload/products/'.$reslt->file); ?>" type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                          </audio>                                      
                                                      <?php } else if(isset($reslt->file) && $reslt->file != '' && $reslt->file_type == 3){  ?>
                                                          <img src="<?php echo base_url('upload/products/'.$reslt->file);?>" width="150">
                                                      <?php } ?>
                                             
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
                                                <img src="<?php echo base_url('upload/products/audio_thumb/'.$reslt->thumb);?>" width="150">
                                           </div>
                                           <?php } ?>
                                           <?php if($type != '3') { ?>
                                              <div class="form-group">
                                                <label>Genre</label>                                             
                                                <div class="">
                                                   <select class="selectpicker" data-live-search="true" required name="genre">
                                                       <option value="" selected="selected">Select Genre</option>
                                                       <?php foreach($genres as $g) {?>
                                                          <option  data-tokens="<?=$g['name']?>" <?php if($g['id'] == $reslt->genre) echo "selected"; ?> value="<?=$g['id']?>"><?=$g['name']?></option>
                                                       <?php } ?>                                       		                                            
                                                   </select><i class="fa fa-gear"></i>
                                                </div>                                             
                                             <?php } ?>
                                             <div class="form-group"> 
                                            <label>Price (in dollar)</label>
                                            <div class="input_box"> 
                                                <input placeholder="Enter <?=($type == '2') ? "Audio" : (($type == '1')  ? "Video" : "Picture");?> Price" name="price" class="input-text form-control"  type="number" value="<?php echo isset($reslt->price)? $reslt->price:'';?>" required>
                                                <i class="fa fa-money"></i>
                                            </div>
                                            </div>
                                             <div class="form-group">
                                            <label>Keywords</label>
                                             <div class="input_box"> 
                                                 <input placeholder="Enter Video Tags" name="tags" class="input-text form-control"  type="text" value="<?php echo isset($reslt->tags)? $reslt->tags:'';?>">
                                                 <i class="fa fa-tag"></i>
                                             </div>
                                             </div>
                                             <input type="hidden" id="thumb" name="thumb" value="">
                                             <div class="form-group">
                                                <!--<input type="submit" class="btn btn-primary" value="Submit">-->
                                                <input type="submit" name='submit_image' class="btn btn-primary" id="get-thumbnail" value="Submit" onclick='upload_image();'/> 
                                             
                                             </div>
                                             
                                     
                                </form>
                                
                                <video id="main-video" controls style="display:none">
                                    <source type="video/mp4">
                                </video>
                                <canvas id="video-canvas" style="display:none"></canvas> 
                    
                            <div class='progress' id="progress_div">
                            <div class='bar' id='bar'></div>
                            <div class='percent' id='percent'>0%</div>
                            </div>    
                                                                                                                                                                                    
                 </div>
                
                
            
            
        </div>
        	
    </div>
</div>
</div>


