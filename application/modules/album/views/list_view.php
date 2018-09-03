<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">My Albums</div>
                <div class="search_panel_outer">
                	<!--<div class="input_box"><input type="search" placeholder="Enter Title For Searching...." class="input-text form-control"><i class="fa fa-search"></i>
                   
                    </div>
                     <button><i class="fa fa-search"></i></button>-->
                </div>
                 <div class="upload_panel">
                 	<!--<button type="button" class="button_design button_blue" data-toggle="modal" data-target="#productModal">Click For Upload Video</button>-->
                    <a href="<?php echo site_url('album/add/'.$type);?>"><button type="button" class="button_design button_blue">Click To Create Album</button></a>
                 </div>
                 
                 <div class="upload_listing">
                 	 <div class="panel-body">
                        <div class="table-responsive">
                               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                  <th>Sr. No.</th>                        
                                  <th>Title</th>                                                    
                                  <th>Action</th>                      
                                </tr>
                                </thead>
                                <tbody>
                                      <?php if(isset($album)) {
                                            $count = 0;                              
                                            foreach($album as $row){ ?>
                                        <tr>
                                            <td><?= ++$count; ?></td>
                                            <td>
                                                <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                            </td>                                                                        
                                            <td>                                    
                                                <a href="<?php echo base_url(); ?>album/edit/<?php echo $row['id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a href="<?php echo base_url(); ?>album/delete/<?php echo $row['id'];?>/<?php echo $type;?>" onclick=" var c = confirm('Are you sure want to delete?'); if(!c) return false;"><i class="fa fa-close" aria-hidden="true"></i></a>
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


