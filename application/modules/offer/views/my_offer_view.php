<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title"><?=$title?></div>
                
                 <div class="upload_panel">
                 	<!--<button type="button" class="button_design button_blue" data-toggle="modal" data-target="#productModal">Click For Upload Video</button>-->                    
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
                              <th>
                                <?php if($type == 'sent'){
                                        echo 'Offer To';
                                }else{                                        
                                        echo 'Offer From';                                    
                                }
                                ?>
                              </th>                      
                              <th>Offer Amount</th>                                            
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                  <?php if(isset($offer)) {
                                        $count = 0;                              
                                        foreach($offer as $row){ ?>
                                    <tr>
                                        <td>
                                            <?= ++$count; ?>                                            
                                        </td>
                                        <td>
                                            <?php if($type == 'sent'){
                                                    echo isset($row['offer_to']) ? get_user($row['offer_to'])->username.' ('.get_user($row['offer_to'])->username.')' : '';
                                            }else{                                        
                                                    echo isset($row['offer_from']) ? get_user($row['offer_from'])->username.' ('.get_user($row['offer_from'])->username.')' : '';                                    
                                            }
                                            ?>
                                        </td>                                                            
                                        <td>
                                            <?php echo isset($row['offer_amount']) ? $row['offer_amount'] : '';   ?>
                                            <?php if($type == 'sent'){ 
                                                echo (get_offer_money($row['id'])) ? '($'.get_offer_money($row['id']).' sent)': '';
                                            }else{
                                                echo (get_offer_money($row['id'])) ? '($'.get_offer_money($row['id']).' received)': '';
                                            }?>
                                        </td>
                                                                    
                                        <td>
                                            <?php echo ($row['status'] == 1) ? '<button class="btn btn-info">Pending</button>' : '';   ?>
                                            <?php echo ($row['status'] == 2 && ($row['is_contract_signed'] == 0)) ? '<button class="btn-sm btn-success">Accepted</button>' : '';   ?>
                                            <?php echo ($row['status'] == 2 && ($row['is_contract_signed'] == 1)) ? '<button class="btn-sm btn-success">Accept & Contracted</button>': '';?>
                                            <?php echo ($row['status'] == 3) ? '<button class="btn btn-primary">Negotiated</button>' : '';   ?>
                                            <?php echo ($row['status'] == 4) ? '<button class="btn btn-danger">Declined</button>' : '';   ?>                                                                                    
                                        </td>
                                        <td>
                                        <a href="<?php echo site_url('offer/detail/'.$row['id']);?>"><button class="btn btn-info">View </button></a>
                                        <?php if($type == 'sent'){ ?>
                                        <a href="<?php echo site_url('offer/pay/'.$row['id']);?>"><button class="btn btn-info">Send Money</button></a>
                                        <?php } ?>
                                        
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

</div>
