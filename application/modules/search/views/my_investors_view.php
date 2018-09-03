<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Investors
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
                  <h3 class="box-title">My Investors</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>                        
                      <th>Username</th>
                      <th>Video</th>
                      <th>Amount</th>
                      <th>Date</th>
                      <th>Status</th>                      
                    </tr>
                    </thead>
                    <tbody>
                          <?php if(isset($results)) {
                                $count = 0;                              
                                foreach($results as $row){ ?>
                            <tr>
                                <td><?= ++$count; ?></td>
                                <td>
                                    <?php echo isset($row->username) ? $row->username : ''; ?>                                    
                                  </td>
                                <td>
                                    <?php if(isset($row->video) && $row->video != '') { ?>  
                                      <video width="150" height="100" controls>
                                        <source src="<?php echo base_url('upload/video/'.$row->video); ?>" type="video/mp4">
                                        <source src="<?php echo base_url('upload/video/'.$row->video); ?>" type="video/avi">
                                        <source src="<?php echo base_url('upload/video/'.$row->video); ?>" type="video/mov">
                                      Your browser does not support the video tag.
                                      </video>
                                    <?php }   ?>
                                    <br>
                                    <?php echo isset($row->title) ? ($row->title) : '';   ?>
                                </td>                                
                                <td>
                                   <?php echo isset($row->amount) ? $row->amount : ''; ?> 
                                </td>
                                <td>
                                    <?php echo isset($row->created_at) ? date('d M Y h:i A',strtotime($row->created_at)) : ''; ?>                                    
                                  </td>
                                <td>
                                   <?php echo ($row->status == 0) ? '<button class="btn btn-info">Waiting Feedback</button>': '' ?>
                                   <?php echo ($row->status == 1) ? '<a href="'.site_url('feedback/view/'.$row->shareid).'"><button class="btn btn-primary">View Feedback</button></a>': '' ?>
                                    <?php echo ($row->status == 2) ? '<button class="btn btn-success">Feedback Approved</button>': '' ?>
                                   <?php echo ($row->status == 3) ? '<button class="btn btn-danger">Feedback Declined</button>': '' ?>
                                </td>
                            </tr>                          
                            <?php  } }?>                            
                                                       
                    </tfoot>
                  </table>
                 
              
                </div>
                <!-- /.box-body -->
              </div>
    
            </section>
            <!-- /.Left col -->
          </div>
          <!-- /.row (main row) -->
        
        </section>

    <!-- /.content -->
  </div>
  