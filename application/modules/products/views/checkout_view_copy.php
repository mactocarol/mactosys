<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Checkout
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('user/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Checkout</li>
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
                    <?php
                    $total = 0;
                    if(!empty($this->cart->contents())){
                                foreach($this->cart->contents() as $row){                                                    
                                $total += $row['subtotal'];                            
                      } } ?>
                  <h3 class="box-title">Amount - <?=$total?></h3><br>                  
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <h3>Login</h3>
                    <?php if(!$this->session->userdata('user_id')){?>
                        if not registered <a href=""><button>Register</button></a>
                        OR
                        
                    <?php }else { ?>
                    <h3>Logged in as <?=$this->session->userdata('email')?></h3>
                    <h3>Choose Payment Method</h3>
                    
                                <?php
                                $paypalURL     = 'https://www.sandbox.paypal.com/cgi-bin/webscr';                                
                                $paypalID      = 'parvez@mactosys.com';
                                $successURL    =  base_url().'products/success';
                                $cancelURL     =  base_url().'products/cancel';
                                $notifyURL     =  base_url().'products/ipn';
                                
                                $itemName = 'Member Subscriptions';
                                $itemNumber = 'MS';
                                
                                                             
                             ?>
                             <form action="<?php echo base_url().'products/buy'; ?>" method="post">
                                
                                <input type="hidden" name="currency_code" value="USD">                                
                                <input type="hidden" name="amount" id="amount" value="<?=$total?>">                                
                                
                                <div class="box-footer">
                                Paypal <input type="radio" name="payment_method" value="paypal">
                                <input type="submit" id="onetime" class="btn btn-primary" name="Update_profile" value="Pay">                                
                                <br>
                                </div>
                            </form>
                    
                    <?php } ?>
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
  