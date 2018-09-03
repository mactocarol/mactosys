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
                    <div class="panel-body">
                        <div class="table-responsive"> 
                            <div class="box-header">
                                <h3 class="box-title">Total Products - <?=count($this->cart->contents())?></h3><br>                  
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
                                                $ <?php echo isset($row['price']) ? $row['price'] : ''; ?> 
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
                                    <td colspan="3">Total</td>
                                    <td>$ <?=$total?></td>
                                </tr>                    
                                </tfoot>
                              </table>
                             <a href="<?php echo site_url('products/checkout');?>"><button class="btn btn-info">Checkout</button></a>
                          
                            </div>
                        </div>
                    </div>       
                                                                                                                                                                                    
                 </div>
                
                
            
            
        </div>
        	
    </div>
</div>
</div>


