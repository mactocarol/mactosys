<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Investor
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('user/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$title?></li>
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
            <a href="<?php echo site_url('musician');?>"><button class="btn btn-danger">Back</button></a>
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Investor Detail</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">                
                  <form role="form" id="edit_investor_form" name="" method="post" action="<?php echo base_url().'admin/edit_investor/'.$investor->id; ?>">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">                             
                             <div class="form-group">
                                <label>Username </label>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo isset($investor->username)? $investor->username:'';?>" readonly>
                             </div>
                             <div class="form-group">
                                <label>Email </label>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo isset($investor->email)? $investor->email:'';?>" readonly>
                             </div>
                             <div class="form-group">
                                <label>Contact</label>
                                <input type="text" class="form-control" name="contact" placeholder="Contact Number" value="<?php echo isset($investor->contact)? $investor->contact:'';?>" readonly>
                             </div>
                             <div class="form-group">
                                <label>Category</label>
                                <input class="form-control" name="category" value="<?=$investor->category?>" readonly>                                
                             </div>                             
                             <div class="form-group">
                                <label>Skills</label>
                                <input type="text" class="form-control" name="skills" placeholder="Skills ( for eg. smartphones, menswear, digital appliances  etc.)" value="<?php echo isset($investor->skills)? $investor->skills:'';?>" readonly>
                             </div>
                             <div class="form-group">
                                <label>Designation</label>
                                <input type="text" class="form-control" name="designation" placeholder=" Your Current Designation (if any)" value="<?php echo isset($investor->designation)? $investor->designation:'';?>" readonly>
                             </div>
                             <div class="form-group">
                                <label>Experience</label>
                                <input type="text" class="form-control" name="experience" placeholder="Your Experience" value="<?php echo isset($investor->experience)? $investor->experience:'';?>" readonly>
                             </div>            
                             
                             <div class="box-footer">
                                                               
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
