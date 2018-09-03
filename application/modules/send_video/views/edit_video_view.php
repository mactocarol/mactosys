<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Video
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('user/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Video</li>
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
                  <h3 class="box-title">Edit Video</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" id="edit_video_form" name="" method="post" action="<?php echo base_url().'video/edit/'.$reslt->id;?>" enctype="multipart/form-data">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">
                             <div class="form-group">
                                <label>Title </label>
                                <input type="text" class="form-control" name="title" placeholder="Link Title (eg. Instagram)" value="<?php echo isset($reslt->title)? $reslt->title:'';?>">
                             </div>
                             
                            <div class="form-group">
                                <label> Upload Video </label>
                                <input type="file" class="form-control" name="video" >
                                <?php if(isset($reslt->video) && $reslt->video != '') { ?>  
                                      <video width="200" height="150" controls>
                                        <source src="<?php echo base_url('upload/video/'.$reslt->video); ?>" type="video/mp4">
                                        <source src="<?php echo base_url('upload/video/'.$reslt->video); ?>" type="video/avi">
                                        <source src="<?php echo base_url('upload/video/'.$reslt->video); ?>" type="video/mov">
                                      Your browser does not support the video tag.
                                      </video>
                                    <?php }  ?>
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
