<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Profile
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
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
                  <h3 class="box-title">Update Profile</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" id="edit_investor_form" name="" method="post" action="<?php echo base_url().'user/update_profile'; ?>">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">                             
                             <div class="form-group">
                                <label>Username </label>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo isset($result->username)? $result->username:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Email </label>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo isset($result->email)? $result->email:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Contact</label>
                                <input type="text" class="form-control" name="contact" placeholder="Contact Number" value="<?php echo isset($result->contact)? $result->contact:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category">
                                    <option value="">Select your category</option>
                                    <?php foreach($categories as $cat){?>
                                        <option value="<?=$cat['name']?>" <?php if($result->category == $cat['name']) echo "selected";?>><?=$cat['name']?></option>
                                    <?php } ?>                                    
                                </select>
                             </div>
                             <?php if($result->user_type == '1') {?>
                             <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" class="form-control" name="companyname" placeholder="Company name" value="<?php echo isset($result->companyname)? $result->companyname:'';?>">
                             </div>
                             <?php } ?>
                             <?php if($result->user_type == '2') {?>
                             <div class="form-group">
                                <label>Skills</label>
                                <input type="text" class="form-control" name="skills" placeholder="Skills ( for eg. smartphones, menswear, digital appliances  etc.)" value="<?php echo isset($result->skills)? $result->skills:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Designation</label>
                                <input type="text" class="form-control" name="designation" placeholder=" Your Current Designation (if any)" value="<?php echo isset($result->designation)? $result->designation:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Experience</label>
                                <input type="text" class="form-control" name="experience" placeholder="Your Experience" value="<?php echo isset($result->experience)? $result->experience:'';?>">
                             </div>
                             <?php } ?>
                             <div class="form-group">
                                <label>Password </label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="">
                             </div>
                             <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Confirm Password" value="">
                             </div>
                             
                             <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Update">                                
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
