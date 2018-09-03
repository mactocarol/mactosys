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
               <a href="<?php echo site_url('products/add/'.$type);?>"><button class="btn btn-danger">Add <?=($type == '2') ? "Audios" : (($type == '1')  ? "Videos" : "Pictures");?></button></a> 
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Cart - <a href="<?php echo site_url('products/cart_view');?>"><u><?=count($this->cart->contents())?> item</u></a></h3>
                  
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
                      <th>Genre</th>
                      <th>Action</th>                      
                    </tr>
                    </thead>
                    <tbody>
                          <?php if(isset($products)) {
                                $count = 0;                              
                                foreach($products as $row){ ?>
                            <tr>
                                <td><?= ++$count; ?></td>
                                <td>
                                    <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                  </td>
                                <td>                                    
                                    <?php if(isset($row['file']) && $row['file'] != '') { ?>
                                        <?php if($row['file_type'] == 1) { ?>
                                            <video width="200" height="150" controls controlsList="nodownload">
                                              <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mp4">
                                              <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/avi">
                                              <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mov">
                                            Your browser does not support the products tag.
                                            </video>
                                        <?php }else if($row['file_type'] == 2) {?>
                                            <audio controls controlsList="nodownload">
                                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="audio/ogg">
                                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="audio/mpeg">
                                              Your browser does not support the audio element.
                                            </audio>
                                        <?php }else if($row['file_type'] == 3) {?>
                                            <img src="<?php echo base_url('upload/products/'.$row['file']);?>" width="150">
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php echo isset($row['name']) ? $row['name'] : ''; ?> 
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>products/add_to_cart/<?php echo $row['id'];?>/?return_uri=<?=base_url(uri_string())?>"><button class="btn btn-default">Buy</button></a>
                                    <a href="<?php echo base_url(); ?>products/edit/<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="<?php echo base_url(); ?>products/delete/<?php echo $row['id'];?>/<?php echo $type;?>" onclick=" var c = confirm('Are you sure want to delete?'); if(!c) return false;"><i class="fa fa-close" aria-hidden="true"></i></a>
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
  