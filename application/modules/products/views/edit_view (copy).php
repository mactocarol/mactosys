<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Product
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('user/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Product</li>
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
                  <h3 class="box-title">Edit Product</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" id="edit_video_form" name="" method="post" action="<?php echo base_url().'products/edit/'.$reslt->id;?>" enctype="multipart/form-data">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">
                             <div class="form-group">
                                <label>Title </label>
                                <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo isset($reslt->title)? $reslt->title:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Genre </label>
                                <select class="form-control" name="genre">
                                    <option value="">Select Genre</option>
                                    <?php foreach($genres as $g) {?>
                                        <option value="<?=$g['id']?>" <?php if($g['id'] == $reslt->genre) echo "selected"; ?>><?=$g['name']?></option>
                                    <?php } ?>
                                </select>    
                             </div>
                            <div class="form-group">
                                <label> Upload File </label>
                                <input type="file" class="form-control" name="file" >
                                <?php if(isset($reslt->file) && $reslt->file != '' && $reslt->file_type == 1) { ?>  
                                      <video width="200" height="150" controls controlsList="nodownload">
                                        <source src="<?php echo base_url('upload/products/'.$reslt->file); ?>" type="video/mp4">
                                        <source src="<?php echo base_url('upload/products/'.$reslt->file); ?>" type="video/avi">
                                        <source src="<?php echo base_url('upload/products/'.$reslt->file); ?>" type="video/mov">
                                      Your browser does not support the video tag.
                                      </video>
                                    <?php } else if(isset($reslt->file) && $reslt->file != '' && $reslt->file_type == 2) { ?>
                                        <audio controls controlsList="nodownload">
                                            <source src="<?php echo base_url('upload/products/'.$reslt->file); ?>" type="audio/ogg">
                                            <source src="<?php echo base_url('upload/products/'.$reslt->file); ?>" type="audio/mpeg">
                                          Your browser does not support the audio element.
                                        </audio>                                      
                                    <?php } else if(isset($reslt->file) && $reslt->file != '' && $reslt->file_type == 3){  ?>
                                        <img src="<?php echo base_url('upload/products/'.$reslt->file);?>" width="150">
                                    <?php } ?>
                             </div>                             
                             <div class="box-footer">
                                <input type="submit" class="btn btn-primary" name="Update_profile" value="Update">
                                
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
