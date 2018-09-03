<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">Edit Job</div>
                
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
                     
            
                       
                                   <form role="form" id="add_product_form" name="" method="post" action="<?php echo site_url('jobs/edit/'.$reslt->id); ?>" enctype="multipart/form-data">
        									
                                            
            
                                            <div class="form-group"> 
                                            <label> Job Title </label> 
                                             <div class="input_box"> 
                                                 <input placeholder="Job Title" name="title" class="input-text form-control" required="required" type="text" value="<?php echo ($reslt->title) ? $reslt->title : ''; ?>">
                                                 <i class="fa fa-tag"></i>
                                             </div>
                                             </div>
                                            <div class="form-group">
                                              <label>Job Description (min. 50 words) </label>
                                                <div class="input_box"> 
                                                    <textarea placeholder="Job Description" name="editor1" class="input-text form-control" required><?php echo ($reslt->description) ? $reslt->description : ''; ?></textarea>
                                                    <i class="fa fa-comment"></i>
                                                </div>
                                            </div>
                                              
                                             
                        
                                            <div class="form-group">
                                               <label>Category </label>                                
                                               <select name="category" class="form-control">
                                                    <option value="">Select Job Category</option>
                                                    <?php foreach($categories as $cat){ ?>
                                                        <option value="<?=$cat['id']?>" <?php if($reslt->category == $cat['id']) echo "selected";?>><?=$cat['name']?></option>
                                                    <?php } ?>
                                               </select>    
                                            </div>
                                            <div class="form-group">
                                               <label>Job Type </label>                                
                                               <select name="job_type" class="form-control">
                                                    <option value="">Select Job Type</option>
                                                    <option value="1" <?php if($reslt->job_type == 1) echo "selected";?>>Full Time</option>
                                                    <option value="2" <?php if($reslt->job_type == 2) echo "selected";?>>Part Time</option>
                                                    <option value="2" <?php if($reslt->job_type == 3) echo "selected";?>>Hourly</option>
                                                    <option value="4" <?php if($reslt->job_type == 4) echo "selected";?>>Freelancer</option>
                                               </select>    
                                            </div>
                                            <div class="form-group">
                                               <label>Salary</label>                                
                                               <input name="salary" type="text" class="input-text form-control"  placeholder="Salary" value="<?php echo ($reslt->salary) ? $reslt->salary : ''; ?>">
                                            </div>
                                            <div class="form-group">
                                               <label>Job For </label>                                
                                               <select name="gender" class="form-control">
                                                    <option value="All" <?php if($reslt->gender == 'All') echo "selected";?>>All</option>
                                                    <option value="Male" <?php if($reslt->gender == 'Male') echo "selected";?>>Male</option>
                                                    <option value="Female" <?php if($reslt->gender == 'Female') echo "selected";?>>Female</option>                                                               
                                               </select>    
                                            </div>
                                            <div class="form-group">
                                               <label>Location</label>                                
                                               <input name="location" type="text" class="input-text form-control" value="<?php echo ($reslt->location) ? $reslt->location : ''; ?>" placeholder="Job Location">
                                            </div>
                                            <div class="form-group">
                                               <label>Specialization</label>                                
                                               <input name="specialization" type="text" class="input-text form-control" value="<?php echo ($reslt->specialization) ? $reslt->specialization : ''; ?>" placeholder="Any Specialization Required for this Job">
                                            </div>
                                            <div class="form-group">
                                                <label>Job Status </label>                                
                                                <select name="status" class="form-control">
                                                     <option value="1" <?php if($reslt->status == '1') echo "selected";?>>Open</option>
                                                     <option value="2" <?php if($reslt->status == '2') echo "selected";?>>Close</option>                                                            
                                                </select>    
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
