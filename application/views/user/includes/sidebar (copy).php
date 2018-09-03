<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>upload/profile_image/thumb/<?=$result->image?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php print_r($this->session->userdata('email'));?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li <?php if($page == 'dashboard') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('user/dashboard');?>">
            <i class="fa fa-edit"></i> <span>Dashbboard</span>            
          </a>          
        </li>
        <li class="treeview <?php if($page == 'profile' || $page == 'upload_image') { echo 'menu-open'; }?> ">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Profile</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="<?php if($page == 'profile' || $page == 'upload_image') { echo 'display:block'; }?>">
              <li <?php if($page == 'profile') { echo 'class="active"'; }?> ><a href="<?php echo site_url('user/update_profile');?>"><i class="fa fa-circle-o"></i>Update Profile</a></li>
              <li <?php if($page == 'upload_image') { echo 'class="active"'; }?> ><a href="<?php echo site_url('user/upload_image');?>"><i class="fa fa-circle-o"></i>Change Profile Picture</a></li>          
            </ul>
        </li>
        
        <li class="treeview <?php if($page == 'list_products' || $page == 'list_products/1' || $page == 'list_products/2' || $page == 'list_products/3') { echo 'menu-open'; }?> ">
            <a href="#">
              <i class="fa fa-edit"></i> <span>My Products</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="<?php if($page == 'list_products' || $page == 'list_products/1' || $page == 'list_products/2' || $page == 'list_products/3') { echo 'display:block'; }?>">
              <li <?php if($page == 'list_products/2') { echo 'class="active"'; }?> ><a href="<?php echo site_url('products/index/2');?>"><i class="fa fa-circle-o"></i>Audio</a></li>
              <li <?php if($page == 'list_products/1') { echo 'class="active"'; }?> ><a href="<?php echo site_url('products/index/1');?>"><i class="fa fa-circle-o"></i>Video</a></li>
              <li <?php if($page == 'list_products/3') { echo 'class="active"'; }?> ><a href="<?php echo site_url('products/index/3');?>"><i class="fa fa-circle-o"></i>Pictures</a></li>
            </ul>
        </li>
        <li class="treeview <?php if($page == 'list_album' || $page == 'create_album' || $page == 'album') { echo 'menu-open'; }?> ">
            <a href="#">
              <i class="fa fa-edit"></i> <span>My Album</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="<?php if($page == 'list_album' || $page == 'create_album' || $page == 'album') { echo 'display:block'; }?>">
              <li <?php if($page == 'create_album') { echo 'class="active"'; }?> ><a href="<?php echo site_url('album/add');?>"><i class="fa fa-circle-o"></i>Create Album</a></li>
              <li <?php if($page == 'list_album') { echo 'class="active"'; }?> ><a href="<?php echo site_url('album');?>"><i class="fa fa-circle-o"></i>List</a></li>              
            </ul>
        </li>
        <li class="treeview <?php if($page == 'post_job' || $page == 'posted_jobs' || $page == 'search' || $page == 'resume' || $page == 'jobs' || $page == 'saved') { echo 'menu-open'; }?> ">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Jobs</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="<?php if($page == 'post_job' || $page == 'posted_jobs' || $page == 'search' || $page == 'resume' || $page == 'jobs' || $page == 'saved') { echo 'display:block'; }?>">
              <li <?php if($page == 'post_job') { echo 'class="active"'; }?> ><a href="<?php echo site_url('jobs/post');?>"><i class="fa fa-circle-o"></i>Post a Job</a></li>
              <li <?php if($page == 'posted_jobs') { echo 'class="active"'; }?> ><a href="<?php echo site_url('jobs');?>"><i class="fa fa-circle-o"></i>My Posted Job</a></li>
              <li <?php if($page == 'search') { echo 'class="active"'; }?> ><a href="<?php echo site_url('jobs/search');?>"><i class="fa fa-circle-o"></i>Search Job</a></li>
              <li <?php if($page == 'saved') { echo 'class="active"'; }?> ><a href="<?php echo site_url('jobs/saved');?>"><i class="fa fa-circle-o"></i>My Saved Job</a></li>
              <li <?php if($page == 'resume') { echo 'class="active"'; }?> ><a href="<?php echo site_url('jobs/resume');?>"><i class="fa fa-circle-o"></i>Upload Resume</a></li>
            </ul>
        </li>
        
        <li <?php if($page == 'investors') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('musician');?>">
            <i class="fa fa-user"></i> <span>Search Music</span>            
          </a>          
        </li>
        <li <?php if($page == 'pro') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('pro');?>">
            <i class="fa fa-user"></i> <span>My Membership</span>            
          </a>          
        </li>
        
        <li class="treeview <?php if($page == 'recieved_offer' || $page == 'sent_offer' || $page == 'offer') { echo 'menu-open'; }?> ">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Offer</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="<?php if($page == 'recieved_offer' || $page == 'sent_offer' || $page == 'offer') { echo 'display:block'; }?>">
              <li <?php if($page == 'sent_offer') { echo 'class="active"'; }?> ><a href="<?php echo site_url('offer/index/sent');?>"><i class="fa fa-circle-o"></i>Sent Offer</a></li>
              <li <?php if($page == 'recieved_offer') { echo 'class="active"'; }?> ><a href="<?php echo site_url('offer');?>"><i class="fa fa-circle-o"></i>Recieved Offer</a></li>              
            </ul>
        </li>
        <li <?php if($page == 'payments') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('user_payments');?>">
            <i class="fa fa-money"></i> <span>Payments</span>            
          </a>          
        </li>
        <li <?php if($page == 'wallet') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('user_wallet');?>">
            <i class="fa fa-money"></i> <span>Wallet</span>            
          </a>          
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>