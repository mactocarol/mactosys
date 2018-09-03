<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Search Musician
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
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Search By Genre</h3>
                </div>                
                <div class="box-body">
                    <form method="post" action="<?php echo site_url('search/search_by_genre');?>">
                        <div class="col-md-3">
                            <select name="genre"class="form-control">
                                <option value="">Select Genre</option>
                                <?php foreach($genres as $cat){ ?>
                                    <option value="<?=$cat['id']?>" <?php if(isset($genre) && $cat['id'] == $genre) echo "selected";?>><?=$cat['name']?></option>
                                <?php } ?>
                            </select>    
                        </div>
                        
                        <div class="col-md-3">
                            <select name="type"class="form-control">
                                <option value="">Select Album Type</option>                                
                                <option value="1" <?php if(isset($type) && '1' == $type) echo "selected";?>>Video</option>
                                <option value="2" <?php if(isset($type) && '2' == $type) echo "selected";?>>Audio</option>
                                <option value="3" <?php if(isset($type) && '3' == $type) echo "selected";?>>Pictures</option>                                
                            </select>    
                        </div>
                        
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-danger">Search</button>
                        </div>
                    </form>
                </div>                
              </div>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Search By Role</h3>
                </div>                
                <div class="box-body">
                    <form method="post" action="<?php echo site_url('search/search_by_role');?>">                        
                        <div class="col-md-3">
                            <select name="role"class="form-control">
                                <option value="">Select Role</option>
                                <?php foreach($categories as $cat){ ?>
                                    <option value="<?=$cat['id']?>" <?php if(isset($role) && $cat['id'] == $role) echo "selected";?>><?=$cat['name']?></option>
                                <?php } ?>
                            </select>    
                        </div>
                        
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-danger">Search</button>
                        </div>
                    </form>
                </div>                
              </div>
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <?php if(isset($results)) { ?>                    
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>                        
                      <th>Title</th>
                      <th>File</th>
                      <th>Artist</th>
                      <th>Action</th>                      
                    </tr>
                    </thead>
                    <tbody>
                          
                             <?php  $count = 0;                              
                                foreach($results as $row){ ?>
                            <tr>
                                <td><?= ++$count; ?></td>
                                <td>
                                    <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                  </td>
                                <td>
                                    <?php if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 1) { ?>  
                                      <video width="200" height="150" controls controlsList="nodownload">
                                        <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mp4">
                                        <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/avi">
                                        <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mov">
                                      Your browser does not support the video tag.
                                      </video>
                                    <?php } else if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 2) { ?>
                                        <audio controls controlsList="nodownload">
                                            <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="audio/ogg">
                                            <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="audio/mpeg">
                                          Your browser does not support the audio element.
                                        </audio>                                      
                                    <?php } else if(isset($row['file']) && $row['file'] != '' && $row['file_type'] == 3){  ?>
                                        <img src="<?php echo base_url('upload/products/'.$row['file']);?>" width="150">
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php echo isset($row['user_id']) ? get_user($row['user_id'])->username : '';   ?>                                    
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>musician/view/<?php echo $row['id'];?>"><button class="btn btn-default">Profile</button></a>
                                    <a href="<?php echo site_url('offer/send/'.$row['user_id']);?>"><button>Send Offer</button></a><br><br>
                                </td>
                            </tr>                          
                            <?php  } ?>                            
                                                       
                    </tfoot>
                  </table>
                 <?php  } ?>
                 <?php if(isset($results1)) { ?>                    
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>                        
                      <th>Artist</th>
                      <th>Role</th>
                      <th>Location</th>
                      <th>Action</th>                      
                    </tr>
                    </thead>
                    <tbody>
                          
                             <?php  $count = 0;                              
                                foreach($results1 as $row){ ?>
                            <tr>
                                <td><?= ++$count; ?></td>
                                <td>
                                    <?php echo isset($row['username']) ? $row['username'] : '';   ?>                                                                        
                                  </td>
                                <td>
                                    <?php echo isset($row['role']) ? $row['role'] : '';   ?>    
                                </td>
                                <td>
                                    <?php echo isset($row['user_id']) ? get_user($row['user_id'])->username : '';   ?>                                    
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>musician/view/<?php echo $row['id'];?>"><button class="btn btn-default">Profile</button></a>                            
                                </td>
                            </tr>                          
                            <?php  } ?>                            
                                                       
                    </tfoot>
                  </table>
                 <?php  } ?>
              
                </div>
                <!-- /.box-body -->
              </div>
    
            </section>
            <!-- /.Left col -->
          </div>
          <!-- /.row (main row) -->
        
        </section>

    <!-- /.content -->
  </div>
  