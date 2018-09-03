<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Posted Job
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('user/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Job</li>
      </ol>
    </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Main row -->
          <div class="row">            
            <section class="col-lg-7 connectedSortable">         
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
            </section>
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
              
              <form method="Post" action="<?php echo site_url('jobs/edit/'.$reslt->id);?>">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Edit Job</h3>                      
                    </div>                                    
               
                    <div class="box-body">
                      <section class="col-lg-12 connectedSortable">
                        <div class="form-group">
                           <label>Job Title  </label>                                
                           <input name="title" type="text" class="form-control" value="<?php echo ($reslt->title) ? $reslt->title : ''; ?>" placeholder="Job Title....">
                        </div>
                        <div class="form-group">
                           <label>Job Description (min. 50 words) </label>                                
                           <textarea name="editor1" placeholder="Job Description...."><?php echo ($reslt->description) ? $reslt->description : ''; ?></textarea>    
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
                           <input name="salary" type="text" class="form-control" value="<?php echo ($reslt->salary) ? $reslt->salary : ''; ?>" placeholder="Salary">
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
                           <input name="location" type="text" class="form-control" value="<?php echo ($reslt->location) ? $reslt->location : ''; ?>" placeholder="Job Location">
                        </div>
                        <div class="form-group">
                           <label>Specialization</label>                                
                           <input name="specialization" type="text" class="form-control" value="<?php echo ($reslt->specialization) ? $reslt->specialization : ''; ?>" placeholder="Any Specialization Required for this Job">
                        </div>
                        <div class="form-group">
                           <label>Job Status </label>                                
                           <select name="status" class="form-control">
                                <option value="1" <?php if($reslt->status == '1') echo "selected";?>>Open</option>
                                <option value="2" <?php if($reslt->status == '2') echo "selected";?>>Close</option>                                                            
                           </select>    
                        </div>
                        <div class="box-footer">
                           <input type="submit" class="btn btn-primary" name="Update_profile" value="Update">
                           
                        </div>
                      </section>
                    </div>
                <!-- /.box-body -->
              </div>
              </form>  
            </section>
            <!-- /.Left col -->
          </div>
          <!-- /.row (main row) -->
        
        </section>

    <!-- /.content -->
  </div>
  