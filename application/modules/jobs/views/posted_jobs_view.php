<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">My Posted Jobs</div>
                <div class="search_panel_outer">
                	<!--<div class="input_box"><input type="search" placeholder="Enter Title For Searching...." class="input-text form-control"><i class="fa fa-search"></i>
                   
                    </div>
                     <button><i class="fa fa-search"></i></button>-->
                </div>
                 <div class="upload_panel">
                 	<!--<button type="button" class="button_design button_blue" data-toggle="modal" data-target="#productModal">Click For Upload Video</button>-->
                    <a href="<?php echo site_url('jobs/post/');?>"><button type="button" class="button_design button_blue">Click to Post New Job </button></a>
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
                                  <th>Category</th>
                                  <th>Job Application</th>                      
                                  <th>Action</th>                      
                                </tr>
                                </thead>
                                <tbody>
                                      <?php if(isset($posted_jobs) && count($posted_jobs) > 0) {
                                            $count = 0;                              
                                            foreach($posted_jobs as $row){ ?>
                                        <tr>
                                            <td><?= ++$count; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('jobs/view/'.$row['id']);?>"><?php echo isset($row['title']) ? $row['title'] : ''; ?></a>
                                              </td>
                                            <td>                                    
                                               <?php echo isset($row['description']) ? substr($row['description'],0,100) : ''; ?>                                    
                                            </td>
                                            <td>
                                                <?php echo isset($row['name']) ? $row['name'] : ''; ?> 
                                            </td>
                                            <td>
                                               <a href="<?php echo site_url('jobs/applied/'.$row['id']);?>"><u><?php echo isset($row['total_app']) ? $row['total_app'].' member applied' : ''; ?></u></a>                                   
                                            </td>                                
                                            <td>
                                                <a href="<?php echo base_url(); ?>jobs/edit/<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <a href="<?php echo base_url(); ?>jobs/delete/<?php echo $row['id'];?>" onclick=" var c = confirm('Are you sure want to delete?'); if(!c) return false;"><i class="fa fa-close" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>                          
                                <?php  } } else { ?>
                                        <tr>
                                            <td colspan="6">You have not posted any jobs yet.</td>                                            
                                        </tr>
                                    <?php }?>                      
                                                                   
                                </tfoot>
                            </table>
                        </div>
                        </div>
                 </div>
                
                
            
            
        </div>
        	
    </div>
</div>
</div>


