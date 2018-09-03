<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">Saved Jobs</div>
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
                                  <th>Title</th>
                                  <th>Description</th>                      
                                  <th>Action</th>                      
                                </tr>
                                </thead>
                                <tbody>
                                      <?php if(isset($saved_jobs)) {
                                            $count = 0;                              
                                            foreach($saved_jobs as $row){ ?>
                                        <tr>
                                            <td><?= ++$count; ?></td>
                                            <td>
                                                <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                              </td>
                                            <td>                                    
                                               <?php echo isset($row['description']) ? substr($row['description'],0,100) : ''; ?>                                    
                                            </td>
                                            
                                            <td>
                                                <a href="<?php echo base_url(); ?>jobs/view/<?php echo $row['job_id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a>                                    
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

