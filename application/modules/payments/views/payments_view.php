<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Payments
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
                  <h3 class="box-title">Payments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>                        
                      <th>Paid From</th>                      
                      <th>Amount</th>                      
                      <th>Paid To</th>                      
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
                                    <?php echo isset($row['paid_from']) ? get_user($row['paid_from'])->username.' ('.get_user($row['paid_from'])->email.')' : ''; ?>                                    
                                </td>                                                            
                                <td>
                                    <?php echo isset($row['amount']) ? $row['amount'] : '';   ?>
                                </td>
                                <td>
                                    <?php echo isset($row['paid_to']) ? get_user($row['paid_to'])->username.' ('.get_user($row['paid_to'])->email.')' : '';   ?>
                                </td>                                
                                <td>
                                    <?php echo ($row['status'] == 0) ? '<button class="btn btn-info">Pending</button>' : '';   ?>
                                    <?php echo ($row['status'] == 1) ? '<button class="btn btn-success">Accepted</button>' : '';   ?>
                                    <?php echo ($row['status'] == 2) ? '<button class="btn btn-danger">Declined</button>' : '';   ?>
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
  