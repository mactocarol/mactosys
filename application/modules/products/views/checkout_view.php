<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">View Cart</div>                
                 
                 <div class="upload_listing">
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
                    <div class="box-header">
                    <?php
                    $total = 0;
                    if(!empty($this->cart->contents())){
                                foreach($this->cart->contents() as $row){                                                    
                                $total += $row['subtotal'];                            
                      } } ?>
                      
                    <h3 class="box-title">Total Amount - $ <?=$total?></h3><br>                  
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                                
                        <h5>Choose Payment Method</h5>
                        
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
                                    
                                    Wallet <input type="radio" name="payment_method" value="wallet" ><br>
                                    Paypal <input type="radio" name="payment_method" value="paypal" checked><br>
                                
                                    <input type="submit" id="onetime" class="btn btn-primary" name="Update_profile" value="Pay">                                
                                    <br>
                                    </div>
                                </form>
                     
                    </div>      
                                                                                                                                                                                    
                 </div>
                
                
            
            
        </div>
        	
    </div>
</div>
</div>


