<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">Post New Job</div>
                
                 <div class="upload_panel">
                 	<!--<button type="button" class="button_design button_blue" data-toggle="modal" data-target="#productModal">Click For Upload Video</button>-->
                    <a href="<?php echo site_url('jobs');?>"><button type="button" class="button_design button_blue"><i class="fa fa-list"></i> My Posted Jobs</button></a>
                 </div>
                 
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
                     
            
                       
                                   <form role="form" id="add_product_form" name="" method="post" action="<?php echo base_url().'jobs/post'; ?>" enctype="multipart/form-data">
        									
                                            
            
                                            <div class="form-group"> 
                                            <label> Job Title </label> 
                                             <div class="input_box"> 
                                                 <input placeholder="Job Title" name="title" class="input-text form-control" required="required" type="text">
                                                 <i class="fa fa-tag"></i>
                                             </div>
                                             </div>
                                            <div class="form-group">
                                              <label>Job Description (min. 50 words) </label>
                                                <div class="input_box"> 
                                                    <textarea placeholder="Job Description" name="editor1" class="input-text form-control" required></textarea>
                                                    <i class="fa fa-comment"></i>
                                                </div>
                                            </div>
                                              
                                             
                        
                                            <div class="form-group">
                                               <label>Category </label>                                
                                               <select name="category" class="form-control" required>
                                                    <option value="">Select Job Category</option>
                                                    <?php foreach($categories as $cat){ ?>
                                                        <option value="<?=$cat['id']?>" ><?=$cat['name']?></option>
                                                    <?php } ?>
                                               </select>    
                                            </div>
                                            <div class="form-group">
                                               <label>Job Type </label>                                
                                               <select name="job_type" class="form-control" required>
                                                    <option value="">Select Job Type</option>
                                                    <option value="1">Full Time</option>
                                                    <option value="2">Part Time</option>
                                                    <option value="2">Hourly</option>
                                                    <option value="4">Freelancer</option>
                                               </select>    
                                            </div>
                                            <div class="form-group">
                                               <label>Salary Package (<small>Annually</small>)</label>                                                                               
                                               <select class="selectpicker filter_job" data-live-search="true" name="salary" required>
                                                    <option selected="selected" value="">Select Salary</option>
                                                    <option value="Not Disclosed">Not Disclosed</option>
                                                    <option data-tokens="1" value="100000">Above 1 lac</option>
                                                    <?php for($i=2; $i<=100; $i++){ ?>
                                                        <option data-tokens="<?=$i?>" value="<?=$i.'00000'?>"><?=$i?> +</option>
                                                    <?php } ?>                    
                                                </select> 
                                            </div>
                                            <div class="form-group">
                                               <label>Experience Required</label>                                
                                               <select class="selectpicker filter_job" data-live-search="true" name="experience">
                                                    <option selected="selected" value="0">Select Experience</option>
                                                    <option data-tokens="0" value="0">Fresher</option>
                                                    <?php for($i=1; $i<=10; $i++){ ?>
                                                        <option data-tokens="<?=$i?>" value="<?=$i?>"><?=$i?> +</option>
                                                    <?php } ?>                    
                                                </select> 
                                            </div>
                                            <div class="form-group">
                                               <label>Job For </label>                                
                                               <select name="gender" class="form-control">
                                                    <option value="All">All</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>                                
                                               </select>    
                                            </div>
                                            <div class="form-group">
                                               <label>Location</label>                                
                                               <input name="location" type="text" class="input-text form-control" value="" placeholder="Job Location">
                                            </div>
                                            <div class="form-group">
                                               <label>Specialization</label>                                
                                               <input name="specialization" type="text" class="input-text form-control" value="" placeholder="Any Specialization Required for this Job">
                                            </div>
                                            <div class="box-footer">
                                               <input type="submit" class="btn btn-primary" name="Update_profile" value="Submit">
                                               
                                            </div>
                                                                                        
                                </form>
                    
                                
                                                                                                                                                                                    
                 </div>
                
                
            
            
        </div>
        	
    </div>
</div>
</div>

</div>
