<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Posted Jobs
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
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>                        
                      <th>Title</th>
                      <th>Description</th>
                      <th>Category</th>
                      <th>Job Application</th>                      
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
                                   <a href="<?php echo site_url('jobs/applied/'.$row['id']);?>"><u><?php echo isset($row['total_app']) ? $row['total_app'].' member applied' : ''; ?></u></a>                                   
                                </td>                                
                                <td>
                                    <a href="<?php echo base_url(); ?>jobs/edit/<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="<?php echo base_url(); ?>jobs/delete/<?php echo $row['id'];?>" onclick=" var c = confirm('Are you sure want to delete?'); if(!c) return false;"><i class="fa fa-close" aria-hidden="true"></i></a>
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
  