<?php $this->load->view('admin/includes/sidebar'); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Plan
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Plan</li>
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
                  <h3 class="box-title">Add Plan</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" id="plan_form" name="" method="post" action="<?php echo base_url().'membershipPlan/add'; ?>">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">
                             <div class="form-group">
                                <label>Name </label>
                                <input type="text" class="form-control" name="title" placeholder="Plan Name" value="<?php echo isset($reslt->title)? $reslt->title:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Amount </label>
                                <input type="text" class="form-control" name="amount" placeholder="Plan amount" value="<?php echo isset($reslt->amount)? $reslt->amount:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Validity </label>
                                <select class="form-control" name="validity"  >
                                    <option value="">Select validity</option>
                                    <option value="-1" <?php if($reslt->validity == '-1') { echo 'selected';}?>>Unlimited</option>
                                    <?php for($i=1;$i<60;$i++){?>
                                    <option value="<?=$i?>" <?php if($reslt->validity == $i) { echo 'selected';}?>><?=$i?></option>
                                    <?php } ?>
                                </select>
                             </div>
                             <div class="form-group">
                                <label>Picture Limit </label>
                                <select class="form-control" name="pic_limit" >
                                    <option value="">Select picture limit</option>
                                    <option value="-1" <?php if($reslt->pic_limit == '-1') { echo 'selected';}?>>Unlimited</option>
                                    <?php for($i=1;$i<51;$i++){?>
                                    <option value="<?=$i?>" <?php if($reslt->pic_limit == $i) { echo 'selected';}?>><?=$i?></option>
                                    <?php } ?>
                                </select>
                             </div>
                             <div class="form-group">
                                <label>Audio Limit</label>
                                <select class="form-control" name="audio_limit" >
                                    <option value="">Select audio limit</option>
                                    <option value="-1" <?php if($reslt->audio_limit == '-1') { echo 'selected';}?>>Unlimited</option>
                                    <?php for($i=1;$i<51;$i++){?>
                                    <option value="<?=$i?>" <?php if($reslt->audio_limit == $i) { echo 'selected';}?>><?=$i?></option>
                                    <?php } ?>
                                </select>
                             </div>
                             <div class="form-group">
                                <label>Video Limit </label>
                                <select class="form-control" name="video_limit" >
                                    <option value="">Select video limit</option>
                                    <option value="-1" <?php if($reslt->video_limit == '-1') { echo 'selected';}?>>Unlimited</option>
                                    <?php for($i=1;$i<51;$i++){?>
                                    <option value="<?=$i?>" <?php if($reslt->video_limit == $i) { echo 'selected';}?>><?=$i?></option>
                                    <?php } ?>
                                </select>
                             </div>
                             <div class="form-group">
                                <label>Product Sell Limit </label>
                                <select class="form-control" name="sell_limit" >
                                    <option value="">Select product sell limit</option>
                                    <option value="-1" <?php if($reslt->sell_limit == '-1') { echo 'selected';}?>>Unlimited</option>
                                    <?php for($i=1;$i<51;$i++){?>
                                    <option value="<?=$i?>" <?php if($reslt->sell_limit == $i) { echo 'selected';}?>><?=$i?></option>
                                    <?php } ?>
                                </select>
                             </div>                            
                                                          
                             <div class="box-footer">
                                <input type="submit" class="btn btn-primary" name="Update_profile" value="Add">
                                
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
