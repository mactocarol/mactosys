<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Plan
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List Plan</li>
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
                  <h3 class="box-title">List membership plan</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>                        
                      <th>Name</th>
                      <th>Amount</th>
                      <th>Validity</th>
                      <th>Picture Limit</th>
                      <th>Audio Limit</th>
                      <th>Video Limit</th>
                      <th>Sell Limit</th>
                      <th>Action</th>                      
                    </tr>
                    </thead>
                    <tbody>
                          <?php if(isset($results)) {
                                $count = 0;                              
                                foreach($results as $row){ ?>
                            <tr>
                                <td><?= ++$count; ?></td>
                                <td>
                                    <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                </td>
                                <td>
                                    <?php echo isset($row['amount']) ? $row['amount'] : ''; ?>                                    
                                </td>
                                <td>
                                    <?php echo ($row['validity'] > 0) ? $row['validity'].' days' : 'N/A'; ?>                                    
                                </td>
                                <td>
                                    <?php echo ($row['pic_limit'] > 0) ? $row['pic_limit'].' days' : 'Unlimited'; ?>                                    
                                </td>
                                  <td>
                                    <?php echo ($row['audio_limit'] > 0) ? $row['audio_limit'].' days' : 'Unlimited'; ?>                                    
                                </td>
                                   <td>
                                    <?php echo ($row['video_limit'] > 0) ? $row['video_limit'].' days' : 'Unlimited'; ?>                                    
                                </td>
                                 <td>
                                    <?php echo ($row['sell_limit'] > 0) ? $row['sell_limit'].' days' : 'Unlimited'; ?>                                    
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>membershipPlan/edit/<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <?php if($row['id'] != 1){?>
                                    <a href="<?php echo base_url(); ?>membershipPlan/delete/<?php echo $row['id'];?>" onclick=" var c = confirm('Are you sure want to delete?'); if(!c) return false;"><i class="fa fa-close" aria-hidden="true"></i></a>
                                    <?php } ?>
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
  