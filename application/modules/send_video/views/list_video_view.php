<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Send Video
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('user/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Send Video</li>
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
              
              <form method="Post" action="<?php echo site_url('send_video/submit');?>">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Wallet Amount : $ <?php echo $wallet = get_wallet($this->session->userdata('user_id'),$result->user_type)->amount;?> ($ <?=get_charge_amount($this->session->userdata('user_id'))?>  will be deducted from your wallet)</h3>
                      <h4><?php if($wallet < get_charge_amount($this->session->userdata('user_id'))) { echo "Please add money to your wallet to send video. <a href='".site_url('user_wallet')."'>Add Money</a>"; }?></h4>
                    </div>                                    
               </div>
               <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Send Video To User</h3>
                    </div>                
                    <div class="box-body">
                        <h3><?=$reciever->username?> (<?=$reciever->email?>)</h3>
                        <input name="receiver" type="hidden" value="<?=$reciever->id?>">
                    </div>
               </div>
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Select Video from list </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>                          
                      <th>Title</th>
                      <th>Video</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                          <?php if(isset($results)) {
                                $count = 0;                              
                                foreach($results as $row){ ?>
                            <tr>                            
                                <td>
                                    
                                    <label><h4><?php echo isset($row['title']) ? $row['title'] : ''; ?></h4></label> 
                                  </td>
                                <td>                                    
                                    <?php if(isset($row['video']) && $row['video'] != '') { ?>  
                                      <video width="100" height="85" controls>
                                        <source src="<?php echo base_url('upload/video/'.$row['video']); ?>" type="video/mp4">
                                        <source src="<?php echo base_url('upload/video/'.$row['video']); ?>" type="video/avi">
                                        <source src="<?php echo base_url('upload/video/'.$row['video']); ?>" type="video/mov">
                                      Your browser does not support the video tag.
                                      </video>
                                    <?php }   ?>                                    
                                </td>                                  
                                <td><input name="video" type="radio" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>"></td>
                            </tr>                          
                    <?php  } }?>                      
                                                       
                    </tfoot>
                  </table>
                 
                  <button type="submit" class="btn btn-primary" <?php if($wallet < 5) { echo "disabled"; }?>>Submit</button>
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
  