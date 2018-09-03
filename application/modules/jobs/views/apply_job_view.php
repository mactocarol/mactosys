<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">Apply Job</div>
                
                
                 
                 <div class="upload_listing">
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
                       
                        <form method="Post" action="<?php echo site_url('jobs/apply/'.$reslt['id']);?>" enctype="multipart/form-data">        									                                                        
                                <h3><?php echo ($reslt['title']) ? $reslt['title'] : ''; ?></h3>                                 
                                 <div class="form-group">
                                   <label>Send Job Proposal (min. 50 words) </label>
                                     <div class="input_box"> 
                                         <textarea placeholder="Job Description" name="editor1" class="input-text form-control" required></textarea>
                                         <i class="fa fa-comment"></i>
                                     </div>
                                 </div>
                                 <div class="form-group"> 
                                     <label> Attach Resume </label> 
                                     <div class="input_box"> 
                                         <input placeholder="Job Title" name="resume" class="input-text form-control" required="required" type="file">
                                         <i class="fa fa-tag"></i>
                                     </div>
                                 </div>
                                 <div class="form-group"> 
                                     <label> Attach File (optional) </label> 
                                     <div class="input_box"> 
                                         <input placeholder="Job Title" name="file" class="input-text form-control" type="file">
                                         <i class="fa fa-tag"></i>
                                     </div>
                                 </div>
                                 <input type="hidden" name="apply" value="1">
             
                                 
                                 <div class="box-footer">
                                    <input type="submit" class="btn btn-primary" name="Update_profile" value="Apply">
                                    
                                </div>
                                                                                 
                        </form>
                                
                                                                                                                                                                                    
                 </div>
                
                
            
            
        </div>
        	
    </div>
</div>
</div>

</div>
