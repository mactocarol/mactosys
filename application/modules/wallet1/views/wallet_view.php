<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Wallet
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
                  <h3 class="box-title">Wallet Amount : $ <?php echo get_wallet($this->session->userdata('user_id'),0)->amount;?></h3>
                </div>
               </div>
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Wallet History</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>                        
                      <th>transactions</th>                      
                      <th>Increment</th>                      
                      <th>Decrement</th>                                            
                    </tr>
                    </thead>
                    <tbody>
                          <?php if(isset($results)) {
                                $count = 0;                              
                                foreach($results as $row){ ?>
                            <tr>
                                <td><?= ++$count; ?></td>                                
                                <td>
                                    <?php echo (isset($row['paid_from']) && $row['paid_from'] == 1) ? 'Paid to <b>'.get_user($row['paid_to'])->username.'</b>' : '';   ?>
                                    <?php echo (isset($row['paid_to']) && $row['paid_to'] == 1) ? 'Payment made From <b>'.get_user($row['paid_from'])->username.'</b>' : '';   ?>
                                </td>
                                <td><?php echo (isset($row['paid_to']) && $row['paid_to'] == 1) ? $row['amount'] : '';   ?></td>
                                <td><?php echo (isset($row['paid_from']) && $row['paid_from'] == 1) ? $row['amount'] : '';   ?></td>
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
  