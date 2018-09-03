<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Applied
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
              <a href="<?php echo site_url('jobs');?>"><button class="btn btn-danger">Back</button></a>  
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>                        
                      <th>Title</th>
                      <th>Username</th>
                      <th>Resume</th>
                      <th>File (if any)</th>                                        
                    </tr>
                    </thead>
                    <tbody>
                          <?php if(isset($applied_jobs)) {
                                $count = 0;                              
                                foreach($applied_jobs as $row){ ?>
                            <tr>
                                <td><?= ++$count; ?></td>
                                <td>
                                    <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                  </td>
                                <td>                                    
                                   <?php echo isset($row['apply_by']) ? $row['apply_by']->username : ''; ?>                                    
                                </td>
                                <td>                                                                       
                                   <a href="<?php echo site_url('jobs/download?file='.urlencode($row['resume']));?>"><u><?=$row['resume']?></u></a>
                                </td>
                                <td>
                                    <?php
                                     $ext = pathinfo($row['file'], PATHINFO_EXTENSION);
                                     if(isset($row['file']) && $row['file'] != '' && ($ext == 'mp4' || $ext == 'avi' || $ext == 'mov')) { ?>  
                                      <video width="200" height="150" controls controlsList="nodownload">
                                        <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mp4">
                                        <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/avi">
                                        <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mov">
                                      Your browser does not support the video tag.
                                      </video>
                                    <?php } else if(isset($row['file']) && $row['file'] != '' && $ext == 'mp3') { ?>
                                        <audio controls controlsList="nodownload">
                                            <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="audio/ogg">
                                            <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="audio/mpeg">
                                          Your browser does not support the audio element.
                                        </audio>                                      
                                    <?php } else if(isset($row['file']) && $row['file'] != '' && ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png')){  ?>
                                        <img src="<?php echo base_url('upload/products/'.$row['file']);?>" width="150">
                                    <?php } ?>                                   
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
  