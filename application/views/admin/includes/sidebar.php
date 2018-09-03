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
          <a href="<?php echo site_url('admin/dashboard');?>">
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
          <li <?php if($page == 'profile') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/update_profile');?>"><i class="fa fa-circle-o"></i>Update Profile</a></li>
          <li <?php if($page == 'upload_image') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/upload_image');?>"><i class="fa fa-circle-o"></i>Change Profile Picture</a></li>          
        </ul>
      </li>              
        
        <li class="treeview <?php if($page == 'add_user' || $page == 'list_user' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-user"></i> <span>All Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'add_user' || $page == 'list_user' ) { echo 'display:block'; }?>">
            <li <?php if($page == 'add_user') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/add_user');?>"><i class="fa fa-circle-o"></i> Add</a></li>
            <li <?php if($page == 'list_user') { echo 'class="active"'; }?>><a href="<?php echo site_url('admin/list_user');?>"><i class="fa fa-circle-o"></i> List</a></li>            
          </ul>
        </li>
        <li class="treeview <?php if($page == 'add_category' || $page == 'list_category' || $page == 'edit_category' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-tag"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'add_category' || $page == 'list_category' || $page == 'edit_category' ) { echo 'display:block'; }?>">
            <li <?php if($page == 'add_category') { echo 'class="active"'; }?> ><a href="<?php echo site_url('category/add');?>"><i class="fa fa-circle-o"></i> Add</a></li>
            <li <?php if($page == 'list_category') { echo 'class="active"'; }?>><a href="<?php echo site_url('category');?>"><i class="fa fa-circle-o"></i> List</a></li>            
          </ul>
        </li>
        <li class="treeview <?php if($page == 'list_videos' || $page == 'list_audios' || $page == 'list_pictures' || $page == 'edit_products' || $page == 'add_audios' || $page == 'add_pictures' || $page == 'add_videos') { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-tag"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'list_videos' || $page == 'list_audios' || $page == 'list_pictures' || $page == 'edit_products' || $page == 'add_audios' || $page == 'add_pictures' || $page == 'add_videos') { echo 'display:block'; }?>">
            <li <?php if($page == 'list_videos') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/videos');?>"><i class="fa fa-circle-o"></i>List Videos</a></li>
            <li <?php if($page == 'list_audios') { echo 'class="active"'; }?>><a href="<?php echo site_url('admin/audios');?>"><i class="fa fa-circle-o"></i>List Audios</a></li>
            <li <?php if($page == 'list_pictures') { echo 'class="active"'; }?>><a href="<?php echo site_url('admin/pictures');?>"><i class="fa fa-circle-o"></i>List Pictures</a></li>
            <li <?php if($page == 'add_videos') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/add_products/1');?>"><i class="fa fa-circle-o"></i>Add Videos</a></li>
            <li <?php if($page == 'add_audios') { echo 'class="active"'; }?>><a href="<?php echo site_url('admin/add_products/2');?>"><i class="fa fa-circle-o"></i>Add Audios</a></li>
            <li <?php if($page == 'add_pictures') { echo 'class="active"'; }?>><a href="<?php echo site_url('admin/add_products/3');?>"><i class="fa fa-circle-o"></i>Add Pictures</a></li>            
          </ul>
        </li>
        <li class="treeview <?php if($page == 'add_jobs' || $page == 'list_jobs' || $page == 'edit_jobs' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-tag"></i> <span>Jobs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'add_jobs' || $page == 'list_jobs' || $page == 'edit_jobs' ) { echo 'display:block'; }?>">
            <li <?php if($page == 'add_jobs') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/add_jobs');?>"><i class="fa fa-circle-o"></i> Add</a></li>
            <li <?php if($page == 'list_jobs') { echo 'class="active"'; }?>><a href="<?php echo site_url('admin/jobs');?>"><i class="fa fa-circle-o"></i> List</a></li>            
          </ul>
        </li>
        <li class="treeview <?php if($page == 'add_membershipPlan' || $page == 'list_membershipPlan' || $page == 'edit_membershipPlan' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-tag"></i> <span>Membership Plan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'add_membershipPlan' || $page == 'list_membershipPlan' || $page == 'edit_membershipPlan' ) { echo 'display:block'; }?>">
            <li <?php if($page == 'add_membershipPlan') { echo 'class="active"'; }?> ><a href="<?php echo site_url('membershipPlan/add');?>"><i class="fa fa-circle-o"></i> Add</a></li>
            <li <?php if($page == 'list_membershipPlan') { echo 'class="active"'; }?>><a href="<?php echo site_url('membershipPlan');?>"><i class="fa fa-circle-o"></i> List</a></li>            
          </ul>
        </li>
        <li <?php if($page == 'transactions') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('admin/transactions');?>">
            <i class="fa fa-money"></i> <span>All Transactions</span>            
          </a>          
        </li>
        <li <?php if($page == 'orders') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('admin/orders');?>">
            <i class="fa fa-money"></i> <span>All Orders</span>            
          </a>          
        </li>
        <li <?php if($page == 'earnings') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('admin/earnings');?>">
            <i class="fa fa-money"></i> <span>All Earnings</span>            
          </a>          
        </li>
        <li <?php if($page == 'offer') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('admin/offers');?>">
            <i class="fa fa-money"></i> <span>All Offers</span>            
          </a>          
        </li>
        <!--<li <?php if($page == 'payments') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('payments');?>">
            <i class="fa fa-money"></i> <span>All Payments</span>            
          </a>          
        </li>-->
        <!--<li <?php if($page == 'wallet') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('wallet');?>">
            <i class="fa fa-money"></i> <span>Wallet</span>            
          </a>          
        </li>-->
        <li <?php if($page == 'transaction_fee') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('admin/transaction_fee');?>">
            <i class="fa fa-money"></i> <span>Transaction Fee (%)</span>            
          </a>          
        </li>
		<li class="treeview <?php if($page == 'add_featured_products' || $page == 'list_featured_products' || $page == 'edit_featured_products' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-tag"></i> <span>Featured Recordings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'add_featured_products' || $page == 'list_featured_products' || $page == 'edit_featured_products' ) { echo 'display:block'; }?>">
            <li <?php if($page == 'add_featured_products') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/add_featured_products');?>"><i class="fa fa-circle-o"></i> Add</a></li>
            <li <?php if($page == 'list_featured_products') { echo 'class="active"'; }?>><a href="<?php echo site_url('admin/featured_products');?>"><i class="fa fa-circle-o"></i> List</a></li>            
          </ul>
        </li>
        <li class="treeview <?php if($page == 'add_blogs' || $page == 'list_blogs' || $page == 'edit_blogs' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Blogs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'add_blogs' || $page == 'list_blogs' || $page == 'edit_blogs' ) { echo 'display:block'; }?>">
            <li <?php if($page == 'add_blogs') { echo 'class="active"'; }?> ><a href="<?php echo site_url('blogs/add');?>"><i class="fa fa-circle-o"></i> Add</a></li>
            <li <?php if($page == 'list_blogs') { echo 'class="active"'; }?>><a href="<?php echo site_url('blogs');?>"><i class="fa fa-circle-o"></i> List</a></li>            
          </ul>
        </li>
        <li class="treeview <?php if($page == 'about_us' || $page == 'contact_us' || $page == 'terms & conditions' || $page == 'faq' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-file"></i> <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'about_us' || $page == 'contact_us' || $page == 'terms & conditions' || $page == 'faq' ) { echo 'display:block'; }?>">
            <li <?php if($page == 'about_us') { echo 'class="active"'; }?> ><a href="<?php echo site_url('pages/about_us');?>"><i class="fa fa-circle-o"></i> About Us</a></li>
            <li <?php if($page == 'contact_us') { echo 'class="active"'; }?>><a href="<?php echo site_url('pages/contact_us');?>"><i class="fa fa-circle-o"></i> Contact Us</a></li>
            <li <?php if($page == 'terms & conditions') { echo 'class="active"'; }?>><a href="<?php echo site_url('pages/terms_and_conditions');?>"><i class="fa fa-circle-o"></i>Terms & Conditions</a></li>
            <li <?php if($page == 'faq') { echo 'class="active"'; }?>><a href="<?php echo site_url('pages/faq');?>"><i class="fa fa-circle-o"></i> Faq</a></li>            
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>