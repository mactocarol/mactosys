<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Make Offer
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
                  <h3 class="box-title">Make an Offer</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 
                    <form method="post" action="<?php echo site_url('offer/send');?>">
                        <div class="col-md-6">
                            <label>What Our Requirement</label>
                            <textarea name="editor1" id="editor1" class=""></textarea>
                            <input type="hidden" name="offer_to" value="<?=$offer_to?>">
                        </div>
                        <div class="col-md-6">
                            <label>What We Offer</label>
                            <textarea name="editor2" id="editor2" class=""></textarea>
                        </div>
                        <div class="col-md-12">
                            <label>Offer Amount</label>
                            <input name="amount" id="" class="form-control" type="number" placeholder="Offer Amount">
                        </div>
                        <div class="col-md-12">
                            <label>What to Complete</label>
                            <input name="task" id="" class="form-control" type="text" placeholder="What task do you want to complete? ">
                        </div>
                        <div class="col-md-12">
                            <label>Days to Complete</label>
                            <input name="days" id="" class="form-control" type="number" min=1 placeholder="No. of days to complete">
                        </div>
                        <div class="col-md-12">
                            &nbsp;                            
                        </div>
                        <div class="col-md-12">
                            &nbsp;
                            <input type="button" class="btn btn-primary" id="add_more_milestone" value="Add Milestone"/><small> (You can add upto 3 milestone)</small>
                            <input type="hidden" name="milestone_field" id="milestone_field" value="1"/>
                            <div id="milestone_upload_section">
                            
                            </div>
                        </div>
                        
                        
                        <div class="col-md-12">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btb btn-danger">Make Offer</button>
                        </div>
                    </form>                 
              
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
  <script>
	CKEDITOR.replace( 'editor2' );
    
    
</script>