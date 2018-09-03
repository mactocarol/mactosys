<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">My Orders</div>                
                 
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
                            
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php //echo "<pre>"; print_r($this->cart->contents());?>
                             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                  <th>Sr. No.</th>                        
                                  <th width="40%">Products</th>                      
                                  <th>Price</th>
                                  <th>Order Id</th>
                                  <th>Status</th>
                                  <th>Transaction Id</th> 
                                </tr>
                                </thead>
                                <tbody>
                                      <?php 
                                            $count = 0; $total=0;
                                            if(!empty($orders)){
                                            foreach($orders as $row){ 
                                            if(get_order_detail($row['order_no'])) { ?>
                                                <tr>
                                                    <td><?= ++$count; ?></td>
                                                    <td>
                                                        <?php 
                                                            foreach(get_order_detail($row['order_no']) as $order){
                                                                echo "<a href='view/".$order->id."'>".$order->title."</a> <a href='download/?file=".$order->file."'><u>Download Link</u></a>"."<br><br>";
                                                            }
                                                            ?>                                  
                                                    </td>                                
                                                    <td>
                                                        $ <?php echo isset($row['amount']) ? $row['amount'] : ''; ?> 
                                                    </td>
                                                    <td>
                                                        <?php echo isset($row['order_no']) ? $row['order_no'] : ''; ?> 
                                                    </td>
                                                    <td>
                                                        <?php echo isset($row['payment_status']) ? (($row['payment_status']==2)?'Accepted':'Pending') : ''; ?> 
                                                    </td>
                                                    <td>
                                                        <?php echo isset($row['transaction_id']) ? $row['transaction_id'] : ''; ?> 
                                                    </td>
                                                    
                                                </tr>                                                                                
                                        
                                <?php } } } else { ?>
                                <tr><td colspan="4">No Orders</td></tr>                    
                                <?php } ?>
                                                   
                                </tfoot>
                              </table>
                            
                          
                            </div>
                        </div>
                    </div>       
                                                                                                                                                                                    
                 </div>
                
                
            
            
        </div>
        	
    </div>
</div>
</div>


