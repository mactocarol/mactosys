<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">My Earnings</div>
                <div class="search_panel_outer">
                	<!--<div class="input_box"><input type="search" placeholder="Enter Title For Searching...." class="input-text form-control"><i class="fa fa-search"></i>
                   
                    </div>
                     <button><i class="fa fa-search"></i></button>-->
                </div>
                
                 
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
                        <h4><i class="fa fa-google-wallet" aria-hidden="true"></i> My Wallet - $ <?php echo $wallet->amount?></h4>    
                        <div class="table-responsive">                                                 
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                  <th>Sr. No.</th>                        
                                  <th>Title</th>                                  
                                  <th>Amount</th>                                                                                      
                                  <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                      <?php if(isset($earnings)) {
                                            $count = 0;                              
                                            foreach($earnings as $row){ ?>
                                        <tr>
                                            <td><?= ++$count; ?></td>
                                            <td>
                                                <?php echo ($row['product_id']) ? '<a href="'.site_url('products/view/'.$row['product_id']).'">'.get_product($row['product_id'])->title.'</a>' : '<a href="'.site_url('offer/detail/'.$row['offer_id']).'">By Contract Deal with '.get_user($row['user_id'])->username.'</a>'; ?>
                                              </td>
                                            <td>                                    
                                               <?php echo isset($row['seller_commission']) ? '$ '.($row['seller_commission']).' ( '.$charge.'% transaction fee deducted)' : ''; ?>                                    
                                            </td>
                                            
                                            <td>
                                                <?php echo isset($row['created_at']) ? date('d M Y h:i:s',strtotime($row['created_at'])) : ''; ?>
                                            </td>
                                        </tr>                          
                                <?php  } }?>                      
                                                                   
                                </tfoot>
                            </table>
                        </div>
                        </div>
                 </div>
                
                
            
            
        </div>
        	
    </div>
</div>
</div>


