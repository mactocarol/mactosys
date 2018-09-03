<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
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
            	<div class="sidebar_title">Create Album</div>
                
                
        
            <div class="row">
        
        
                
                    <form role="form" id="add_product_form" name="" method="post" action="<?php echo base_url().'album/add/'; ?>" enctype="multipart/form-data">
                            <!-- text input -->
                            <section class="col-lg-12 connectedSortable">
                                 <div class="form-group">
                                    <label>Album Title </label>
                                    <input type="text" class="form-control" name="title" placeholder="Album Title" value="" required >
                                 </div>
                                 <div class="form-group">
                                    <label>Description</label>
                                   <div class="input_box"> 
                                       <textarea placeholder="Enter Description" name="description" class="input-text form-control" required></textarea>
                                       <i class="fa fa-comment"></i>
                                   </div>
                                   </div>
                                
                                <div class="form-group">
                                    <label>Album Image</label>
                                     <input type="file" name="file" class="file" id="upload_file" required>
                                     <div class="input-group input_box">
                                       <i class="fa fa-file-image-o"></i>
                                       <input type="text" class="form-control input-text browse-text" name="" placeholder="Upload Image" required onkeypress="return false;" data-readonly style="pointer-events: none;">                                      
                                         <button class="browse btn btn-primary input-lg" type="button"> Browse</button>                                       
                                     </div>                                                          
                                </div>                                                                
                               
                                <div class="form-group"> 
                                <label>Price</label>
                                <div class="input_box"> 
                                    <input placeholder="Enter  Price" name="price" class="input-text form-control"  type="text" required>
                                    <i class="fa fa-tag"></i>
                                </div>
                                </div>
                                <div class="form-group"> 
                                <label>Keywords</label>
                                <div class="input_box"> 
                                    <input placeholder="Enter Tags" name="tags" class="input-text form-control"  type="text">
                                    <i class="fa fa-tag"></i>
                                </div>
                                </div>
                                 <div class="row">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                           <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                               <thead>
                                               <tr>
                                                 <th width="40%">Title</th>                                                                              
                                                 <th width="40%">Videos</th>
                                                 <th></th>
                                               </tr>
                                               </thead>
                                               <tbody>
                                                     <?php if(isset($video) && !empty($video)) {                                                
                                                           foreach($video as $row){ ?>
                                                       <tr>                                                
                                                           <td>
                                                               <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                                             </td>
                                                           <td>                                    
                                                               <?php if(isset($row['file']) && $row['file'] != '') { ?>
                                                                   <?php if($row['file_type'] == 1) { ?>
                                                                        <?php if($row['thumb']) {?>
                                                                        <img src="<?php echo base_url('upload/products/video_thumb/'.$row['thumb']);?>" width="150" height="150">
                                                                        <?php } else {?>
                                                                            <video width="150" height="100" controlsList="nodownload">
                                                                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mp4">
                                                                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/avi">
                                                                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mov">
                                                                              Your browser does not support the products tag.
                                                                            </video>
                                                                        <?php } ?>   
                                                                   <?php } } ?>                                                           
                                                           </td>
                                                           <td>
                                                            <input type="checkbox" name="product[]" value="<?=$row['id']?>">
                                                           </td>
                                                       </tr>                          
                                               <?php  } } else { ?>
                                                        <tr>
                                                            <td colspan="3">Not Upload any Videos Yet.</td>
                                                        </tr>
                                                <?php } ?>
                                               </tfoot>
                                           </table>   
                                        </div>
                                    
                                        <div class="table-responsive">
                                           <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                               <thead>
                                               <tr>
                                                 <th width="40%">Title</th>                                                                              
                                                 <th width="40%">Audios</th>
                                                 <th></th>
                                               </tr>
                                               </thead>
                                               <tbody>
                                                     <?php if(isset($audio) && !empty($audio)) {                                                
                                                           foreach($audio as $row){ ?>
                                                       <tr>                                                
                                                           <td>
                                                               <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                                           </td>
                                                           <td>                                    
                                                               <?php if(isset($row['file']) && $row['file'] != '') { ?>
                                                                   <?php if($row['file_type'] == 2) { ?>
                                                                      
                                                                       <img src="<?php echo base_url('upload/products/audio_thumb/'.$row['thumb']);?>" width="150" height="100">
                                                                   <?php } } ?>
                                                           </td>
                                                           <td>
                                                            <input type="checkbox" name="product[]" value="<?=$row['id']?>">
                                                           </td>
                                                       </tr>                          
                                               <?php  } } else { ?>
                                                        <tr>
                                                            <td colspan="3">Not Upload any Audios Yet.</td>
                                                        </tr>
                                                <?php } ?>
                                               </tfoot>
                                           </table>   
                                        </div>
                                    
                                        <div class="table-responsive">
                                           <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                               <thead>
                                               <tr>
                                                 <th width="40%">Title</th>                                                                              
                                                 <th width="40%">Pictures</th>
                                                 <th></th>
                                               </tr>
                                               </thead>
                                               <tbody>
                                                     <?php if(isset($picture) && !empty($picture)) {                                                
                                                           foreach($picture as $row){ ?>
                                                       <tr>                                                
                                                           <td>
                                                               <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                                             </td>
                                                           <td>                                    
                                                               <?php if(isset($row['file']) && $row['file'] != '') { ?>
                                                                   <?php if($row['file_type'] == 3) { ?>
                                                                       <img src="<?php echo base_url('upload/products/image_thumb/'.$row['file']);?>" width="150">
                                                                   <?php } } ?>
                                                           </td>
                                                           <td>
                                                            <input type="checkbox" name="product[]" value="<?=$row['id']?>">
                                                           </td>
                                                       </tr>                          
                                               <?php  } } else { ?>
                                                        <tr>
                                                            <td colspan="3">Not Upload any Pictures Yet.</td>
                                                        </tr>
                                                <?php }?>                                                                                          
                                               </tfoot>
                                           </table>   
                                        </div>
                                    </div>
                                 </div>                         
                                 <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" name="Update_profile" value="Create" >
                                    
                                 </div>
                               </section>
                            
                      </form>                                
            </div>                	
        </div>
        	
    </div>
</div>
</div>

</div>
