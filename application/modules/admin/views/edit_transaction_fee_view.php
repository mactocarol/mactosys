<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaction Fee
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Edit Transaction fee</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" id="edit_entrepreneur_form" name="" method="post" action="<?php echo base_url().'admin/transaction_fee/'; ?>">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">                             
                             <div class="form-group">
                                <label>Fee Percentage </label>
                                <input type="text" class="form-control" name="transaction_fee" placeholder="Fee Percentage" value="<?php echo isset($result->transaction_fee)? $result->transaction_fee:'';?>">
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
