<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Cart
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('user/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">My cart</li>
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
                  <h3 class="box-title">Cart - <?=count($this->cart->contents())?></h3><br>                  
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php //echo "<pre>"; print_r($this->cart->contents());?>
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>                        
                      <th>Title</th>                      
                      <th>Price</th>
                      <th>Action</th>                      
                    </tr>
                    </thead>
                    <tbody>
                          <?php 
                                $count = 0; $total=0;
                                if(!empty($this->cart->contents())){
                                foreach($this->cart->contents() as $row){ ?>
                            <tr>
                                <td><?= ++$count; ?></td>
                                <td>
                                    <?php echo isset($row['name']) ? $row['name'] : ''; ?>                                    
                                </td>                                
                                <td>
                                    <?php echo isset($row['price']) ? $row['price'] : ''; ?> 
                                </td>
                                <td>                                    
                                    <a href="<?php echo base_url(); ?>products/remove_cart/<?php echo $row['rowid'];?>" onclick=" var c = confirm('Are you sure want to delete?'); if(!c) return false;"><i class="fa fa-close" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            
                            <?php $total += $row['subtotal'];?>
                            
                    <?php  } } else { ?>
                    <tr><td colspan="4">No Item in your cart</td></tr>                    
                    <?php } ?>
                    <tr>
                        <td colspan="2">Total</td>
                        <td><?=$total?></td>
                    </tr>                    
                    </tfoot>
                  </table>
                 <a href="<?php echo site_url('products/checkout');?>"><button class="btn btn-default">Checkout</button></a>
              
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
  