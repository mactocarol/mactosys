<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Product
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('user/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Product</li>
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
                  <h3 class="box-title">My Current Plan - <b><?=($current_plan) ? strtoupper($current_plan['title']) : 'Free';?></b></h3>
                  <div class="form-group">
                    <label><h4>Validity
                    <?php if($result->payment_type == 'one time'){ ?>
                    <strong>( <?php echo $day_left; ?> days </strong> left to expire)
                    <?php } else { ?>
                    ( valid from  <strong><?php echo (isset($subscr)) ? date('d-M-Y',strtotime($subscr->valid_from)) : ''; ?></strong> to <strong><?php echo (isset($subscr)) ? date('d-M-Y',strtotime($subscr->valid_to)) : ''; ?>)</strong></h4> </label>
                    <?php } ?>
                 </div>
                  <h3 class="box-title">Upload Limit - <b><?=($current_plan['limit'] != '-1') ? count($no_of_products).'/'.strtoupper($current_plan['limit']) : 'UNLIMITED';?></b></h3>
                </div>
               </div>
               
                        
                    
                                                                                                          
                    
                
                <?php $valid_to = (isset($subscr)) ? $subscr->valid_to : $result->account_valid;                      
                       if(count($no_of_products) < $current_plan['limit'] || $current_plan['limit'] == '-1'){
                        if(($result->account_type == 'pro') && ($valid_to >= date('Y-m-d h:i:s')) ){ ?>                    
                <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Add <?=($type == '2') ? "Audio" : (($type == '1')  ? "Video" : "Picture");?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">                                        
                  <form role="form" id="add_product_form" name="" method="post" action="<?php echo base_url().'products/add/'.$type; ?>" enctype="multipart/form-data">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">
                             <div class="form-group">
                                <label>Title </label>
                                <input type="text" class="form-control" name="title" placeholder="Title" value="" >
                             </div>
                             <div class="form-group">
                                <label>Genre </label>
                                <select class="form-control" name="genre">
                                    <option value="">Select Genre</option>
                                    <?php foreach($genres as $g) {?>
                                        <option value="<?=$g['id']?>"><?=$g['name']?></option>
                                    <?php } ?>
                                </select>    
                             </div>
                            <div class="form-group">
                                <label> Upload File </label>
                                <input type="file" class="form-control" name="file" >
                                
                             </div>                             
                             <div class="box-footer">
                                <input type="submit" class="btn btn-primary" name="Update_profile" value="Add" >
                                
                             </div>
                           </section>
                        
                  </form>
                </div>
               </div>
                <?php } }?>
        </section>
        <!-- /.Left col -->
   
    </div>

    </section>
    <!-- /.content -->
  </div>
