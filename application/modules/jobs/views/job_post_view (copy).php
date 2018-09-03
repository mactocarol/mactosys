<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post Your Job
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('user/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Post Job</li>
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
              
              <form method="Post" action="<?php echo site_url('jobs/post');?>">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Post Job</h3>                      
                    </div>                                    
               
                    <div class="box-body">
                      <section class="col-lg-12 connectedSortable">
                        <div class="form-group">
                           <label>Job Title  </label>                                
                           <input name="title" type="text" class="form-control" value="" placeholder="Job Title....">
                        </div>
                        <div class="form-group">
                           <label>Job Description (min. 50 words) </label>                                
                           <textarea name="editor1" placeholder="Job Description...."></textarea>    
                        </div>
                        <div class="form-group">
                           <label>Category </label>                                
                           <select name="category" class="form-control">
                                <option value="">Select Job Category</option>
                                <?php foreach($categories as $cat){ ?>
                                    <option value="<?=$cat['id']?>" ><?=$cat['name']?></option>
                                <?php } ?>
                           </select>    
                        </div>
                        <div class="form-group">
                           <label>Job Type </label>                                
                           <select name="job_type" class="form-control">
                                <option value="">Select Job Type</option>
                                <option value="1">Full Time</option>
                                <option value="2">Part Time</option>
                                <option value="2">Hourly</option>
                                <option value="4">Freelancer</option>
                           </select>    
                        </div>
                        <div class="form-group">
                           <label>Salary</label>                                
                           <input name="salary" type="text" class="form-control" value="" placeholder="Salary">
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
                           <input name="location" type="text" class="form-control" value="" placeholder="Job Location">
                        </div>
                        <div class="form-group">
                           <label>Specialization</label>                                
                           <input name="specialization" type="text" class="form-control" value="" placeholder="Any Specialization Required for this Job">
                        </div>
                        <div class="box-footer">
                           <input type="submit" class="btn btn-primary" name="Update_profile" value="Submit">
                           
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
  