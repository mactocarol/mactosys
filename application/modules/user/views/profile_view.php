
<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
        	<div class="col-md-9">
            <div class="sidebar_title">Edit Profile</div>
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
            <!--<form id="profile_detail">-->
            <form role="form" id="edit_investor_form" name="" method="post" action="<?php echo base_url().'user/profile'; ?>" enctype="multipart/form-data">                
            <h2>Basic detail</h2>
            <table>
                <tr>
                	<td>
                        <label>First name</label>
                        <div class="input_box"> 
                        	<input type="text" placeholder="Enter Firstname" name="f_name" class="input-text form-control" value="<?php echo ($result->f_name) ? $result->f_name : '';?>" required="required">
                            <i class="fa fa-user"></i>
                        </div>
                </td></tr>
                <tr>
                	<td>
                        <label>Last name</label>
                        <div class="input_box"> 
                        	<input type="text" placeholder="Enter Last name" name="l_name" class="input-text form-control" value="<?php echo ($result->l_name) ? $result->l_name : '';?>" required="">
                            <i class="fa fa-user"></i>
                        </div>
                </td></tr>
            	<tr>
                	<td>
                        <label>Username</label>
                        <div class="input_box"> 
                        	<input type="text" placeholder="Enter Username" name="username" class="input-text form-control" value="<?php echo ($result->username) ? $result->username : 'Not Mentioned';?>" required="required">
                            <i class="fa fa-user"></i>
                        </div>
                </td></tr>
                <tr><td>
                        <label>Email address</label>
                        <div class="input_box">
                        	<input type="email" placeholder="Enter Your Email Address" class="input-text form-control" name="email" value="<?php echo isset($result->email)? $result->email:'';?>">
                            <i class="fa fa-envelope"></i>
                        </div>
                </td></tr>
                
                <tr><td>
                        <label>phone</label>
                        <div class="input_box">
                        	<input type="tel" placeholder="Enter Your Phone No." class="input-text form-control" name="contact"  value="<?php echo isset($result->contact)? $result->contact:'';?>">
                            <i class="fa fa-phone"></i>
                        </div>
                </td></tr>
                <tr><td>
                        <label>Date Of Birth</label>
                        <div class="input_box">
                        	<input type="text" placeholder="Enter Your DOB" class="input-text form-control" id="datepicker" name="dob" value="<?php echo isset($result->dob)? $result->dob:'';?>">
                            <i class="fa fa-calendar"></i>
                        </div>
                </td></tr>
                
                <tr><td>
                        <label>Gender</label>
                        <div class="input_box">
                        	<input type="text" placeholder="Enter Your Gender" class="input-text form-control" name="gender" value="<?php echo isset($result->gender)? $result->gender:'';?>" readonly>
                            <i class="fa fa-user"></i>
                        </div>
                </td></tr>
                
                 <tr><td>
                        <label>Address</label>
                        <div class="input_box">
                        	<input type="text" placeholder="Enter Your Address" class="input-text form-control" name="address" value="<?php echo isset($result->address)? $result->address:'';?>">
                            <i class="fa  fa-home"></i>
                        </div>
                </td></tr>
                <tr><td>
                        <label>About Me</label>
                        <div class="input_box">
                        	<input type="text" placeholder="About Me" class="input-text form-control" name="about_me" value="<?php echo isset($result->about_me)? $result->about_me:'';?>">
                            <i class="fa fa-file"></i>
                        </div>
                </td></tr>
                
               </tr>
            </table>
            <h2>Other detail</h2>
            <table>
            	<tr>
                <tr><td>
                        <label>Category</label>
                        <?php $category = explode(',',$result->user_type);?>
                        <select  id="boot-multiselect-demo" name="category[]" required multiple="multiple">                            
                            <?php foreach($categories as $c):?>
                            <option value="<?=$c['id']?>" <?php if($c['id'] == $category[0] || $c['id'] == $category[1] || $c['id'] == $category[2] || $c['id'] == $category[3] || $c['id'] == $category[4] || $c['id'] == $category[5] || $c['id'] == $category[6] || $c['id'] == $category[7] || $c['id'] == $category[8]) echo 'selected';?>><?=$c['name']?></option>
                            <?php endforeach;?>
                        </select>                                                                    
                </td></tr>
                <tr><td>
                        <label>Company Name (if any)</label>
                        <div class="input_box">
                        	<input type="text" placeholder="Enter Company Name" name="companyname" class="input-text form-control" value="<?php echo isset($result->companyname)? $result->companyname:'';?>">
                            <i class="fa fa-building-o"></i>
                        </div>
                </td></tr>
                <tr><td>
                        <label>Company Logo (if any)</label>
                        <div class="input_box">
                        	 <input type="file" name="file" class="file" id="upload_file" >
                                     <div class="input-group input_box">
                                       <i class="fa fa-file-image-o"></i>
                                       <input type="text" class="form-control input-text browse-text" name="" placeholder="Upload Logo"  onkeypress="return false;">
                                      
                                         <button class="browse btn btn-primary input-lg" type="button"> Browse</button>
                                       
                                     </div>
                        </div>
                        <img src="<?php echo base_url('upload/profile_image/logo/'.$result->companylogo);?>" width="100">
                </td></tr>
                <tr><td>
                        <label>Designation (if any)</label>
                        <div class="input_box">
                        	<input type="text" placeholder="Enter Designation" name="designation" class="input-text form-control" value="<?php echo isset($result->designation)? $result->designation:'';?>">
                            <i class="fa fa-building-o"></i>
                        </div>
                </td></tr>
                <tr><td>
                        <label>Experience (if any)</label>
                        <div class="input_box">
                        	<select class="selectpicker filter_job" data-live-search="true" name="experience">
                                <option selected="selected" value="0">Select Experience</option>
                                <option data-tokens="0" value="0">Fresher</option>
                                <?php for($i=1; $i<=10; $i++){ ?>
                                    <option data-tokens="<?=$i?>" value="<?=$i?>" <?php if($i == $result->experience) echo 'selected'; ?>><?=$i?> +</option>
                                <?php } ?>                    
                            </select>                            
                        </div>
                </td></tr>
               </tr>
                
            </table>
            
            <h2>social detail</h2>
            <table>
            	<tr>
                	<tr><td>
                        <label>facebook</label>
                        <div class="input_box">
                        	<input type="text" placeholder="Enter Your Facebook link" class="input-text form-control">
                            <i class="fa fa-facebook"></i>
                        </div>
                </td></tr>
                <tr><td>
                        <label>twitter</label>
                        <div class="input_box">
                        	<input type="text" placeholder="Enter Your Twitter link" class="input-text form-control">
                            <i class="fa fa-twitter"></i>
                        </div>
                </td></tr>
                <tr><td>
                       
                        	<input type="submit" value="save changes" class="btn btn-primary">
                            
                </td></tr>
                
            
                
               </tr>
            </table>
            </form>
            </div>
            <div class="col-md-3">
            	<div class="chnage_profile_outer text-center">
            	<div class="chnage_profile">
                	<img src="<?php echo base_url('upload/profile_image/thumb/'.$result->image);?>">
                    <div class="edit_profile_img">
                    	<a data-toggle="modal" data-target="#myModal"><i class="fa fa-upload"></i> upload image</a>
                    </div>
                </div>
                <h1><?php echo ($result->username) ? $result->username : 'Not Mentioned';?></h1>
                </div>
                
                <ul class="action_profile_edit">
                <li><a href="<?php echo site_url('products/add/3');?>" class="btn btn-primary"><i class="fa fa-upload"></i> upload images</a></li>
                <li><a href="<?php echo site_url('products/add/1');?>" class="btn btn-primary"><i class="fa fa-upload"></i> upload videos</a></li>
                <li><a href="<?php echo site_url('products/add/2');?>" class="btn btn-primary"><i class="fa fa-upload"></i> upload music</a></li>
                <li><a href="<?php echo site_url('album/add');?>" class="btn btn-primary"><i class="fa fa-upload"></i> upload album</a></li>
                </ul>
                
            </div>
        </div>
        	
    </div>
</div>
</div>


