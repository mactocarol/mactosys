<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">My Wallet</div>
                <div class="search_panel_outer">
                	<div class="input_box"><input type="search" placeholder="Enter Title For Searching...." class="input-text form-control"><i class="fa fa-search"></i>
                   
                    </div>
                     <button><i class="fa fa-search"></i></button>
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
                        <h3><i class="fa fa-google-wallet" aria-hidden="true"></i> My Wallet - $ <?php echo $wallet->amount?></h3>    
                            <div class="box">
                                <div class="box-body">
                                  <h6>Add Money to Wallet </h6>
                                  <form method="post" action="<?php echo site_url('wallet/add_money');?>">
                                    <div class="col-md-12">
                                        <label>Amount</label>
                                        <input type="text" name="amount" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-12">
                                        <a href=""><button class="btn btn-primary">Add</button></a>
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


