<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">My Transactions</div>
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
                        <div class="table-responsive">                                                 
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                  <th>Sr. No.</th>                        
                                  <th>Order Id</th>
                                  <th>Transaction Id</th>
                                  <th>Amount</th>
                                  <th>Payment Type</th>                      
                                  <th>Status</th>
                                  <th>Payment Mode</th>
                                  <th>Paid To</th>
                                  <th>Order Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                      <?php if(isset($transactions)) {
                                            $count = 0;                              
                                            foreach($transactions as $row){ ?>
                                        <tr>
                                            <td><?= ++$count; ?></td>
                                            <td>
                                                <?php echo isset($row['order_id']) ? $row['order_id'] : ''; ?>                                    
                                              </td>
                                            <td>                                    
                                               <?php echo isset($row['txn_id']) ? ($row['txn_id']) : ''; ?>                                    
                                            </td>
                                            <td>
                                                <?php echo isset($row['payment_amt']) ? $row['payment_amt'].' '.$row['currency_code'] : ''; ?> 
                                            </td>
                                            <td>
                                               <?php echo ($row['payment_type'] == 1) ? 'Membership fee' : (($row['payment_type'] == 2) ? 'Shopping Fee' : (($row['payment_type'] == 3) ? 'Contract Fee' : 'Wallet Amount')); ?>
                                            </td>
                                            <td>
                                                <?php echo isset($row['status']) ? ($row['status']) : ''; ?>
                                            </td>
                                            <td>
                                                <?php echo isset($row['payment_mode']) ? ($row['payment_mode']) : ''; ?>
                                            </td>                                            
                                            <td>
                                                <?php
                                                if($row['payment_type'] != ''){
                                                    echo isset($row['seller_id']) ? get_user($row['seller_id'])->username : 'Admin'; 
                                                } else {
                                                    echo 'Self';
                                                } ?>
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


