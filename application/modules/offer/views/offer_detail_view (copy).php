<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Offer
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
                  <h3 class="box-title">Offer</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">                                     
                        <div class="col-md-6">
                            <label>What Our Requirement</label>
                            <?php echo ($offer->requirement) ? $offer->requirement : '';?>
                        </div>
                        <div class="col-md-6">
                            <label>What We Offer</label>
                            <?php echo ($offer->offer) ? $offer->offer : '';?>
                        </div>
                        <div class="col-md-12">
                            <label>Offer Amount - <?php echo ($offer->offer_amount) ? $offer->offer_amount : '';?> $</label>                            
                        </div>
                        <div class="col-md-12">
                            <label>Time to Complete - <?php echo ($offer->days) ? $offer->days : '';?> Days</label>                        
                        </div>
                        <div class="col-md-12">
                            &nbsp;
                        </div>
                        
                        <div class="col-md-12">
                            <?php if($offer->offer_from != $this->session->userdata('user_id')) { ?>
                                <?php if($offer->status == 2) { ?>
                                To start work, sign to Contract Page, 
                                    <a href="<?php echo site_url('offer/contract/'.$offer->id);?>"><button type="submit" class="btb btn-success" name="accept">Go to Contract Page</button></a>                                    
                                <?php } else if($offer->status == 4) { ?>    
                                    You have declined this offer
                                <?php } else if($offer->status != 2 && $offer->status != 4) { ?>    
                                    <a href="<?php echo site_url('offer/action/'.$offer->id.'/2');?>"><button type="submit" class="btb btn-success" name="accept">Accept Offer</button></a>
                                    <a href="<?php echo site_url('offer/action/'.$offer->id.'/4');?>"><button type="submit" class="btb btn-danger" name="decline">Decline Offer</button></a>
                                    <a href="<?php echo site_url('offer/action/'.$offer->id.'/3');?>"><button type="submit" class="btb btn-info" name="negotiate">Negotiate Offer</button></a>
                                    <a href="#" data-toggle="modal" data-target="#myModal"><button>Preview Contract</button></a>
                                <?php }  ?>
                            <?php }else { ?>
                                <?php if($offer->status == 1) { ?><button class="btb btn-info" name="accept">Pending</button><?php } ?>
                                <?php if($offer->status == 2) { ?><button class="btb btn-success" name="accept">Accepted</button><?php } ?>
                                <?php if($offer->status == 3) { ?><button class="btb btn-primary" name="accept">Negotiated</button><?php } ?>
                                <?php if($offer->status == 4) { ?><button class="btb btn-danger" name="accept">Declined</button><?php } ?>
                                <a href="#" data-toggle="modal" data-target="#myModal"><button>Preview Contract</button></a>
                            <?php } ?>
                            
                        </div>                                                   
                </div>
                <!-- /.box-body -->
              </div>
    
            </section>
            <!-- /.Left col -->
          </div>
          <!-- /.row (main row) -->
        
        </section>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
          
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Contract</h4>
                </div>
                <div class="modal-body">
                  
                    <div class="col-md-4">
                        <label><h3>Sender</h3></label>
                        <ul>
                            <li>
                                <strong><?php echo get_user($offer->offer_from)->username;?></strong>      
                            </li>
                            <li>
                                Will pay <strong><?php echo $offer->offer_amount;?> $ </strong> to <strong><?php echo get_user($offer->offer_to)->username;?></strong> to do
                                <strong><?php echo $offer->task;?></strong>
                            </li>
                            
                            <?php $milestone = json_decode($offer->milestone_amt); $days = json_decode($offer->milestone_days);?>
                            <?php if(!empty($milestone)) {
                                     $i = 0;
                                     foreach($milestone as $row) { ?>
                                     <li>
                                        <strong><?php echo $row;?> $ </strong> will pay after <strong><?php echo $days[$i];?></strong> days
                                     </li>
                            <?php $i++; } }?>
                            <li>
                                <strong><?php echo $offer->days;?></strong> to complete the <strong><?php echo $offer->task;?></strong> or your money will be fully refunded.                                
                            </li>
                        </ul>                        
                    </div>
                    <div class="col-md-4">
                        <label><h3>Contract Offer</h3></label>
                        <ul>                            
                            <li>
                                <strong><?php echo get_user($offer->offer_from)->username;?></strong>  will pay <strong><?php echo $offer->offer_amount;?> $ </strong> to <strong><?php echo get_user($offer->offer_to)->username;?></strong> to do
                                <strong><?php echo $offer->task;?></strong>
                            </li>
                            
                            <?php $milestone = json_decode($offer->milestone_amt); $days = json_decode($offer->milestone_days);?>
                            <?php if(!empty($milestone)) {
                                     $i = 0;
                                     foreach($milestone as $row) { ?>
                                     <li>
                                        <strong><?php echo get_user($offer->offer_to)->username;?></strong> will get <strong><?php echo $row;?> $ </strong> after <strong><?php echo $days[$i];?></strong> days
                                     </li>
                            <?php $i++; } }?>
                            <li>
                               <strong><?php echo get_user($offer->offer_to)->username;?></strong> have to complete the <strong><?php echo $offer->task;?></strong> within <strong><?php echo $offer->days;?></strong> or not get any money.                                
                            </li>
                        </ul>                        
                    </div>
                    <div class="col-md-4">
                        <label><h3>Receiver</h3></label>
                        <ul>
                            <li>
                                <strong><?php echo get_user($offer->offer_to)->username;?></strong>      
                            </li>
                            <li>
                                Will get <strong><?php echo $offer->offer_amount;?> $ </strong> from <strong><?php echo get_user($offer->offer_from)->username;?></strong> to do
                                <strong><?php echo $offer->task;?></strong>
                            </li>
                            
                            <?php $milestone = json_decode($offer->milestone_amt); $days = json_decode($offer->milestone_days);?>
                            <?php if(!empty($milestone)) {
                                     $i = 0;
                                     foreach($milestone as $row) { ?>
                                     <li>
                                        <strong><?php echo $row;?> $ </strong> will get after <strong><?php echo $days[$i];?></strong> days
                                     </li>
                            <?php $i++; } }?>
                            <li>
                                Have <strong><?php echo $offer->days;?></strong> to complete the <strong><?php echo $offer->task;?></strong> or not get any money.                                
                            </li>
                        </ul>
                        
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
          
            </div>
          </div>

    <!-- /.content -->
  </div>
  <script>
	CKEDITOR.replace( 'editor2' );
</script>