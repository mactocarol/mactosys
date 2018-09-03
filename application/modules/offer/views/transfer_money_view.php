<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">Transfer Money</div>
                
                
                 
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
                        
                        <div class="panel-body">
                            
                            <div class="box">
                                <div class="box-body">
                                  <h4 class="box-title">Transfer Money and earn executive cards. The more you transfer, more you earn. </h4>
                                  <form method="post" action="<?php echo site_url('offer/pay/'.$offer->id);?>">
                                    
                                    <div class="input_box"> 
                                        <input type="text" placeholder="Enter Amount" name="amount" class="input-text form-control" value="" required="required">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="col-md-12">
                                        &nbsp;
                                        <input type="hidden" name="seller_id" value="<?php echo ($offer->offer_to) ? $offer->offer_to : ''; ?>">
                                    </div>
                                    <div class="col-md-12">
                                         Wallet <input type="radio" name="payment_method" value="wallet" ><br>
                                         Paypal <input type="radio" name="payment_method" value="paypal" checked><br><br>
                                        <a href=""><button class="btn btn-primary">Transfer</button></a>
                                    </div>
                                  </form>
                                </div>            
                            </div>
                        </div>
                 </div>
                
                
            
            
        </div>
        	
    </div>
</div>
</div>


