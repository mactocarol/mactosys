<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Products
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('user/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List Products</li>
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
                  <h3 class="box-title">List <?=($type == '2') ? "Audios" : (($type == '1')  ? "Videos" : "Pictures");?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>                        
                      <th>Title</th>
                      <th>Products</th>                      
                      <th>Action</th>                      
                    </tr>
                    </thead>
                    <tbody>
                          <?php if(isset($album)) {
                                $count = 0;                              
                                foreach($album as $row){ ?>
                            <tr>
                                <td><?= ++$count; ?></td>
                                <td>
                                    <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                  </td>
                                <td>                                    
                                    <?php if(isset($row['list']) && $row['list'] != '') { 
                                            foreach($row['list'] as $list){ ?>                                                
                                                <?php if($list['file_type'] == 1) { ?>
                                                    <video width="200" height="150" controls controlsList="nodownload">
                                                      <source src="<?php echo base_url('upload/products/'.$list['file']); ?>" type="video/mp4">
                                                      <source src="<?php echo base_url('upload/products/'.$list['file']); ?>" type="video/avi">
                                                      <source src="<?php echo base_url('upload/products/'.$list['file']); ?>" type="video/mov">
                                                    Your browser does not support the products tag.
                                                    </video>
                                                <?php }else if($list['file_type'] == 2) {?>
                                                    <audio controls controlsList="nodownload">
                                                        <source src="<?php echo base_url('upload/products/'.$list['file']); ?>" type="audio/ogg">
                                                        <source src="<?php echo base_url('upload/products/'.$list['file']); ?>" type="audio/mpeg">
                                                      Your browser does not support the audio element.
                                                    </audio>
                                                <?php }else if($list['file_type'] == 3) {?>
                                                    <img src="<?php echo base_url('upload/products/'.$list['file']);?>" width="150">
                                                <?php } ?>
                                                <br>
                                                <?php echo $list['title'];?>
                                                <br>
                                                <br>
                                            <?php } }?>
                                </td>                                
                                <td>                                    
                                    <a href="<?php echo base_url(); ?>album/edit/<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="<?php echo base_url(); ?>album/delete/<?php echo $row['id'];?>/<?php echo $type;?>" onclick=" var c = confirm('Are you sure want to delete?'); if(!c) return false;"><i class="fa fa-close" aria-hidden="true"></i></a>
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
  