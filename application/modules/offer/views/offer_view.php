<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">Make Offer</div>
                
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
                                         
                       
                                   <form role="form" id="" name="" method="post" action="<?php echo base_url('offer/send/'); ?>" enctype="multipart/form-data">
        									                                                                                                
                                            <div class="form-group">
                                              <label>What Our Requirement</label>
                                             <div class="input_box">                                                  
                                                 <textarea name="editor1" id="editor1" class=""></textarea>
                                                 <input type="hidden" name="offer_to" value="<?=$offer_to?>">
                                                 <i class="fa fa-comment"></i>
                                             </div>
                                            </div>
                                            <div class="form-group">
                                              <label>What We Offer</label>
                                             <div class="input_box">                                                  
                                                 <textarea name="editor2" id="editor2" class=""></textarea>
                                                 <input type="hidden" name="offer_to" value="<?=$offer_to?>">
                                                 <i class="fa fa-comment"></i>
                                             </div>
                                            </div>
                                            <div class="form-group"> 
                                                <label> Offer Amount </label> 
                                                 <div class="input_box"> 
                                                     <input placeholder="Enter Offer Amount" name="amount" class="input-text form-control" required="required" type="text">
                                                     <i class="fa fa-tag"></i>
                                                 </div>
                                            </div>
                                            <div class="form-group"> 
                                                <label> What to Complete </label> 
                                                 <div class="input_box"> 
                                                     <input placeholder="What task do you want to complete? " name="task" class="input-text form-control" required="required" type="text">
                                                     <i class="fa fa-tag"></i>
                                                 </div>
                                            </div>
                                            <div class="form-group"> 
                                                <label> Days to Complete </label> 
                                                 <div class="input_box"> 
                                                     <input placeholder="No. of days to complete" name="days" class="input-text form-control" required="required" type="number">
                                                     <i class="fa fa-tag"></i>
                                                 </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="button" class="btn btn-primary" id="add_more_milestone" value="Add Milestone"/><small> (You can add upto 3 milestone)</small>
                                                <input type="hidden" name="milestone_field" id="milestone_field" value="1"/>
                                                <div id="milestone_upload_section">
                                                
                                                </div>
                                            </div> 
                                             <div class="form-group"> <input type="submit" class="btn btn-primary" value="Submit">
                                             
                                             </div>
                                     
                                </form>                    
                                
                                                                                                                                                                                    
                 </div>
                
                
            
            
        </div>
        	
    </div>
</div>
</div>

</div>
