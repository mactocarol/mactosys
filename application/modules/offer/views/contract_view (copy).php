<?php $this->load->view('user/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Make Contract
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
                  <h3 class="box-title">Make Contract</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 
                    <form method="post" action="<?php echo site_url('offer/contract/'.$offer_id);?>">
                        <div class="row" id="contract">
                        
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
                        <div class="col-md-4">
                            <input type="checkbox" checked disabled> I agree to Contract's terms & conditions<br>
                            <b>Sign Here</b><br>
                            <textarea disabled><?php echo get_user($offer->offer_from)->username;?></textarea>
                        </div>
                        <div class="col-md-4">
                            &nbsp;
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox"> I agree to Contract's terms & conditions<br>
                            <b>Sign Here</b><br>
                            <textarea disabled><?php echo get_user($offer->offer_to)->username;?></textarea>
                        </div>
                        <input type="hidden" name="offer_id" value="">
                        <div class="col-md-12">
                            <?php if($offer->is_contract_signed) { ?>
                                <a href="print" target="_blank" onclick="PrintElem('contract'); return false;">Print Contract</a>
                            <?php } else {?>
                                <button type="submit" class="btb btn-danger">Make Contract</button>
                            <?php }?>
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
 <script>
	CKEDITOR.replace( 'editor3' );
</script>
<script>
    function PrintElem(elem)
    {
        var mywindow = window.open('', 'PRINT', 'height=400,width=600');
    
        mywindow.document.write('<html><head><title>' + document.title  + '</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write('<h1>' + document.title  + '</h1>');
        mywindow.document.write(document.getElementById(elem).innerHTML);
        mywindow.document.write('</body></html>');
    
        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/
    
        mywindow.print();
        mywindow.close();
    
        return true;
    }
</script> 