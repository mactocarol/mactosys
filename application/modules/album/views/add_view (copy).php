<?php $this->load->view('user/includes/sidebar'); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Album
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('user/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Album</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">      
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
         
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
            
        </section>            
        <section class="col-lg-12 connectedSortable">
                
                                  
                <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Create New</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">                                        
                  <form role="form" id="add_product_form" name="" method="post" action="<?php echo base_url().'album/add/'; ?>" enctype="multipart/form-data">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">
                             <div class="form-group">
                                <label>Album Title </label>
                                <input type="text" class="form-control" name="title" placeholder="Album Title" value="" >
                             </div>
                             <div class="row">
                                <div class="col-sm-4">
                                   <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                       <thead>
                                       <tr>
                                         <th>Title</th>                                                                              
                                         <th>Videos</th>
                                         <th></th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                             <?php if(isset($video)) {                                                
                                                   foreach($video as $row){ ?>
                                               <tr>                                                
                                                   <td>
                                                       <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                                     </td>
                                                   <td>                                    
                                                       <?php if(isset($row['file']) && $row['file'] != '') { ?>
                                                           <?php if($row['file_type'] == 1) { ?>
                                                               <video width="200" height="150" controls controlsList="nodownload">
                                                                 <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mp4">
                                                                 <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/avi">
                                                                 <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mov">
                                                               Your browser does not support the products tag.
                                                               </video>
                                                           <?php } } ?>                                                           
                                                   </td>
                                                   <td>
                                                    <input type="checkbox" name="product[]" value="<?=$row['id']?>">
                                                   </td>
                                               </tr>                          
                                       <?php  } }?>                                                                                          
                                       </tfoot>
                                   </table>   
                                </div>
                                <div class="col-sm-4">
                                   <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                       <thead>
                                       <tr>
                                         <th>Title</th>                                                                              
                                         <th>Audios</th>
                                         <th></th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                             <?php if(isset($audio)) {                                                
                                                   foreach($audio as $row){ ?>
                                               <tr>                                                
                                                   <td>
                                                       <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                                   </td>
                                                   <td>                                    
                                                       <?php if(isset($row['file']) && $row['file'] != '') { ?>
                                                           <?php if($row['file_type'] == 2) { ?>
                                                               <audio controls controlsList="nodownload">
                                                                   <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="audio/ogg">
                                                                   <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="audio/mpeg">
                                                                 Your browser does not support the audio element.
                                                               </audio>
                                                           <?php } } ?>
                                                   </td>
                                                   <td>
                                                    <input type="checkbox" name="product[]" value="<?=$row['id']?>">
                                                   </td>
                                               </tr>                          
                                       <?php  } }?>                                                                                          
                                       </tfoot>
                                   </table>   
                                </div>
                                <div class="col-sm-4">
                                   <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                       <thead>
                                       <tr>
                                         <th>Title</th>                                                                              
                                         <th>Pictures</th>
                                         <th></th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                             <?php if(isset($picture)) {                                                
                                                   foreach($picture as $row){ ?>
                                               <tr>                                                
                                                   <td>
                                                       <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                                     </td>
                                                   <td>                                    
                                                       <?php if(isset($row['file']) && $row['file'] != '') { ?>
                                                           <?php if($row['file_type'] == 3) { ?>
                                                               <img src="<?php echo base_url('upload/products/'.$row['file']);?>" width="150">
                                                           <?php } } ?>
                                                   </td>
                                                   <td>
                                                    <input type="checkbox" name="product[]" value="<?=$row['id']?>">
                                                   </td>
                                               </tr>                          
                                       <?php  } }?>                                                                                          
                                       </tfoot>
                                   </table>   
                                </div>
                             </div>                         
                             <div class="box-footer">
                                <input type="submit" class="btn btn-primary" name="Update_profile" value="Create" >
                                
                             </div>
                           </section>
                        
                  </form>
                </div>
               </div>               
        </section>
        <!-- /.Left col -->
   
    </div>

    </section>
    <!-- /.content -->
  </div>
