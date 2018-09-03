<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Set Contact Us Page
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Contact Us</li>
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
                <!--<button class="btn btn-danger"><a href="<?php echo base_url(); ?>admin/lists" style="color:white">Go to User List</a></button>&nbsp;-->
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Contact Us</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" id="profile_update_form" name="" method="post" action="<?php echo base_url().'pages/contact_us/'; ?>">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">                            
                             <div class="form-group">                                
                                <label>Your Address</label>
                                    <textarea class="form-control" name="desc" id="editor1" ><?php echo isset($reslt->description)? $reslt->description:'';?></textarea>                                
                             </div>                             
                             <div class="form-group">
                                    <label>Your Contact Email</label>                               
                                    <input class="form-control" name="email" id="email" placeholder="Contact Email" value="<?php echo isset($reslt->email)? $reslt->email:'';?>">                                
                             </div>
                             <div class="form-group">
                                    <label>Your Contact Number</label>                               
                                    <input class="form-control" name="phone" id="phone" placeholder="Contact Number" value="<?php echo isset($reslt->phone)? $reslt->phone:'';?>">                                
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
