<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Job Detail
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('user/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Job Detail</li>
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
              
              <form method="Post" action="<?php echo site_url('jobs/apply/'.$reslt['id']);?>">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Job Detail</h3>                      
                    </div>                                    
               
                    <div class="box-body">
                      <section class="col-lg-12 connectedSortable">
                        <div class="form-group">
                           <label>Job Title - </label>                                
                           <?php echo ($reslt['title']) ? $reslt['title'] : ''; ?>
                        </div>
                        <div class="form-group">
                           <label>Job Description - </label>                                
                           <?php echo ($reslt['description']) ? $reslt['description'] : ''; ?>
                        </div>
                        <div class="form-group">
                           <label>Category - </label>                                
                           <?php echo ($reslt['name']) ? $reslt['name'] : ''; ?>
                        </div>
                        
                        <div class="form-group">
                           <label>Job Type - </label>                                
                           
                                <?php if($reslt['job_type'] == 1) echo "Full Time";?>
                                <?php if($reslt['job_type'] == 2) echo "Part Time";?>
                                <?php if($reslt['job_type'] == 3) echo "Hourly";?>
                                <?php if($reslt['job_type'] == 4) echo "Freelancer";?>
                           
                        </div>
                        <div class="form-group">
                           <label>Salary - </label>                                
                           <?php echo ($reslt['salary']) ? $reslt['salary'] : ''; ?>
                        </div>
                        <div class="form-group">
                           <label>Job For - </label>                                
                           <?php if($reslt['gender']) echo $reslt['gender'];?>                            
                        </div>
                        <div class="form-group">
                           <label>Location - </label>                                
                           <?php echo ($reslt['location']) ? $reslt['location'] : ''; ?>
                        </div>
                        <div class="form-group">
                           <label>Specialization - </label>                                
                           <?php echo ($reslt['specialization']) ? $reslt['specialization'] : ''; ?>
                        </div>
                        
                        <div class="box-footer">
                           <input type="submit" class="btn btn-primary" name="Update_profile" value="<?php if(!empty($is_apply)){ echo "Applied"; }else { echo "Apply Job"; }?>" <?php if(!empty($is_apply)) echo "disabled"; ?>>
                           
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
  