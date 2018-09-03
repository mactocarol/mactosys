<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Search Jobs
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('user/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$title?></li>
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
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Search By:</h3>
                </div>                
                <div class="box-body">
                    <form method="post" action="<?php echo site_url('jobs/search');?>">
                        <div class="col-md-2">
                            <select name="category"class="form-control">
                                <option value="">All Category</option>
                                <?php foreach($categories as $cat){ ?>
                                    <option value="<?=$cat['id']?>" <?php if(isset($category) && $cat['id'] == $category) echo "selected";?>><?=$cat['name']?></option>
                                <?php } ?>
                            </select>    
                        </div>
                        
                        <div class="col-md-2">
                            <select name="time"class="form-control">
                                <option value="">All Time</option>                                
                                <option value="1" <?php if(isset($time) && '1' == $time) echo "selected";?>>Within 15 Days</option>
                                <option value="2" <?php if(isset($time) && '2' == $time) echo "selected";?>>Last 30 Days</option>
                                <option value="3" <?php if(isset($time) && '3' == $time) echo "selected";?>>Last 2 Months</option>                                                            
                            </select>    
                        </div>
                        
                         <div class="col-md-2">
                            <select name="job_type"class="form-control">
                                <option value="">All Job Type</option>                                
                                <option value="1" <?php if(isset($job_type) && '1' == $job_type) echo "selected";?>>Full Time</option>
                                <option value="2" <?php if(isset($job_type) && '2' == $job_type) echo "selected";?>>Part Time</option>
                                <option value="3" <?php if(isset($job_type) && '3' == $job_type) echo "selected";?>>Hourly</option>
                                <option value="4" <?php if(isset($job_type) && '4' == $job_type) echo "selected";?>>Freelancer</option>                                
                            </select>    
                        </div>
                         
                        <div class="col-md-2">
                            <select name="gender"class="form-control">
                                <option value="">Job For</option>                                
                                <option value="All" <?php if(isset($job_for) && 'All' == $job_for) echo "selected";?>>All</option>
                                <option value="Male" <?php if(isset($job_for) && 'Male' == $job_for) echo "selected";?>>Male</option>
                                <option value="Female" <?php if(isset($job_for) && 'Female' == $job_for) echo "selected";?>>Female</option>                                
                            </select>    
                        </div>
                        <div class="col-md-2">
                            <input name="location" class="form-control" type="text" placeholder="Job Location" value="<?php echo isset($location) ? $location : ''; ?>">                                   
                        </div>
                        <div class="col-md-2">
                            <input name="specialization" class="form-control" type="text" placeholder="Job Specialization" value="<?php echo isset($specialization) ? $specialization : ''; ?>">                                   
                        </div>
                        
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-danger">Search</button>
                        </div>
                    </form>
                </div>                
              </div>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>                        
                      <th>Title</th>
                      <th>Description</th>
                      <th>Category</th>
                      <th>Action</th>                      
                    </tr>
                    </thead>
                    <tbody>
                          <?php if(isset($posted_jobs)) {
                                $count = 0;                              
                                foreach($posted_jobs as $row){ ?>
                            <tr>
                                <td><?= ++$count; ?></td>
                                <td>
                                    <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                  </td>
                                <td>                                    
                                   <?php echo isset($row['description']) ? substr($row['description'],0,100) : ''; ?>                                    
                                </td>
                                <td>
                                    <?php echo isset($row['name']) ? $row['name'] : ''; ?> 
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>jobs/view/<?php echo $row['id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a>                                    
                                </td>
                            </tr>                          
                    <?php  } }?>                      
                                                       
                    </tfoot>
                  </table>               
            </section>
            <!-- /.Left col -->
          </div>
          <!-- /.row (main row) -->
        
        </section>

    <!-- /.content -->
  </div>
  