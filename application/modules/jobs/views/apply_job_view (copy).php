<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Apply Job
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('user/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Apply Job</li>
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
              
              <form method="Post" action="<?php echo site_url('jobs/apply/'.$reslt['id']);?>" enctype="multipart/form-data">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Apply Job</h3>                      
                    </div>                                    
               
                    <div class="box-body">
                      <section class="col-lg-12 connectedSortable">
                        <div class="form-group">
                           <label>Job Title  </label>                                
                           <?php echo ($reslt['title']) ? $reslt['title'] : ''; ?>
                        </div>
                        <div class="form-group">
                           <label>Send Job Proposal (min. 50 words) </label>                                
                           <textarea name="editor1"></textarea>    
                        </div>
                        <div class="form-group">
                           <label>Attach Resume</label>                                
                           <input name="resume" type="file" class="form-control" >
                        </div>
                        <div class="form-group">
                           <label>Attach File (optional)</label>                                
                           <input name="file" type="file" class="form-control" >
                        </div>
                        <input type="hidden" name="apply" value="1">
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
  