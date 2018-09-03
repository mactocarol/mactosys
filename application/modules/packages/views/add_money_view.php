<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
            	<div class="sidebar_title">Upgrade Membership</div>                                 
                 
                <div class="upload_listing">
                 	
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">My Current Plan - <b><?=($current_plan) ? strtoupper($current_plan['title']) : 'Free';?></b></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">                  
                        <!-- text input -->
                        <?php $valid_to = (isset($subscr)) ? $subscr->valid_to : $result->account_valid;?>
                        <?php $membership = get_membership($this->session->userdata('user_id'));?>
                        
                        <?php
                        if($membership->id != 1){
                            if(($result->account_type == 'pro') && ($valid_to >= date('Y-m-d h:i:s'))){ ?>
                                
                            <section class="col-lg-12 connectedSortable">
                                 <div class="form-group row">
                                    <label><h6>Validity
                                    <?php if($result->payment_type == 'one time'){ ?>
                                    <strong>( <?php echo $day_left; ?> days </strong> left to expire)
                                    <?php } else { ?>
                                    ( valid from  <strong><?php echo (isset($subscr)) ? date('d-M-Y',strtotime($subscr->valid_from)) : ''; ?></strong> to <strong><?php echo (isset($subscr)) ? date('d-M-Y',strtotime($subscr->valid_to)) : ''; ?>)</strong></h6> </label>
                                    <?php } ?>
                                 </div>                                                                                 
                            </section>
                            <?php } else { ?>
                                    <h4>Validity : <b>Expired</b></h4>( please recharge to upload & sell more)
                        <?php } } else { echo "( please recharge to upload & sell more)"; }?>
                        
                        <section class="col-lg-12 connectedSortable">
                            
                            <form>
                             <div class="row">
                            <?php foreach($plans as $plan){?>
                           
                            <div class="col-md-6"><div class="plan-outer-box">
                          
                           <input type="radio" name="select_plan" onclick="return func(<?=$plan['amount'];?>,<?=$plan['id']?>)" id="<?=$plan['id']?>" value="<?=$plan['id']?>" required <?php if(isset($flag) && ($package->id == $plan['id'])) { echo 'checked'; }?>>
                            	
                          
                          <label for="<?=$plan['id']?>">
                      
                            	<h2><?php echo isset($plan['title']) ? $plan['title'] : ''; ?></h2>
                                <ul>
                                	<li>Amount : <?php echo isset($plan['amount']) ? $plan['amount'] : ''; ?> </li>
                                    <li>Validity : <?=($plan['validity'] != '-1') ? $plan['validity'].' days' : 'N/A'?>  </li>
                                    <li>Upload Picture (max.) : <?=($plan['pic_limit'] != '-1') ? $plan['pic_limit']: 'UNLIMITED'?>  </li>
                                    <li>Upload Audio (max.) : <?=($plan['audio_limit'] != '-1') ? $plan['audio_limit']: 'UNLIMITED'?> </li>
                                    <li>Upload Video (max.) :  <?=($plan['video_limit'] != '-1') ? $plan['video_limit']: 'UNLIMITED'?> </li>
                                    <li>Sell Product (max.) : <?=($plan['sell_limit'] != '-1') ? $plan['sell_limit']: 'UNLIMITED'?> </li>
                                    
                                </ul>
                                </label>
                            </div>
                            </div>
                           
                            
                                <!--<div class="panel-body">
                                    <div class="table-responsive">                                                 
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                              <th>Title</th>                        
                                              <th>Amount</th>
                                              <th>Validity</th>
                                              <th>Upload Picture (max.)</th>
                                              <th>Upload Audio (max.)</th>
                                              <th>Upload Video (max.)</th>
                                              <th>Sell Product (max.)</th>                                                                                                    
                                              <th></th>                      
                                            </tr>
                                            </thead>
                                            <tbody>
                                                 
                                                    <tr>
                                                        <td><?php echo isset($plan['title']) ? $plan['title'] : ''; ?> </td>
                                                        <td>
                                                            <?php echo isset($plan['amount']) ? $plan['amount'] : ''; ?>                                    
                                                          </td>
                                                        <td>                                    
                                                           <?=($plan['validity'] != '-1') ? $plan['validity'].' days' : 'N/A'?>                                    
                                                        </td>
                                                        <td>
                                                            <?=($plan['pic_limit'] != '-1') ? $plan['pic_limit']: 'UNLIMITED'?>
                                                        </td>
                                                        <td>
                                                            <?=($plan['audio_limit'] != '-1') ? $plan['audio_limit']: 'UNLIMITED'?>
                                                        </td>
                                                        <td>
                                                            <?=($plan['video_limit'] != '-1') ? $plan['video_limit']: 'UNLIMITED'?>
                                                        </td>
                                                        <td>
                                                            <?=($plan['sell_limit'] != '-1') ? $plan['sell_limit']: 'UNLIMITED'?>
                                                        </td>
                                                        
                                                        <td>
                                                           <input type="radio" name="select_plan" onclick="return func(<?=$plan['amount'];?>,<?=$plan['id']?>)" id="<?=$plan['id']?>" value="<?=$plan['id']?>" required <?php if(isset($flag) && ($package->id == $plan['id'])) { echo 'checked'; }?>><br>
                                                        </td>                                                                               
                                                    </tr>                          
                                            </tbody>                                                        
                                        </table>
                                    </div>
                                </div>-->
                            
                             <?php } ?>
                              </div>
                             </form>
                        </section>
                        
                        <section class="col-lg-12 connectedSortable payment_form">
                             <?php
                             //PayPal variables
                                $paypalURL     = 'https://www.sandbox.paypal.com/cgi-bin/webscr';                                
                                $paypalID      = 'parvez@mactosys.com';
                                $successURL    =  base_url().'packages/success1';
                                $cancelURL     =  base_url().'packages/cancel';
                                $notifyURL     =  base_url().'packages/ipn';
                                
                                $itemName = 'Member Subscriptions';
                                $itemNumber = 'MS';
                                
                                                             
                             ?>
                             <form action="<?php echo base_url().'packages/buy'; ?>" method="post">
                                
                                <input type="hidden" name="currency_code" value="USD">                                
                                <input type="hidden" name="amount" id="amount" value="<?php if(isset($flag)) { echo $package->amount; }?>">
                                <input type="hidden" name="plan" id="plan" value="<?php if(isset($flag)) { echo $package->id; }?>">
                                <!-- specify urls -->
                                <input type="hidden" name="cancel_return" value="<?php echo $cancelURL; ?>">
                                <input type="hidden" name="return" value="<?php echo $successURL; ?>">
                                <input type="hidden" name="notify_url" value="<?php echo $notifyURL; ?>">
                                <!-- display the payment button -->
                                <div class="box-footer">
                                
                                <input type="submit" id="onetime" class="btn btn-primary" name="Update_profile" value="Pay One Time" <?php if(!isset($flag)) { echo 'disabled'; }?>>                                                               
                                </div>
                            </form>
                             <form action="<?php echo $paypalURL; ?>" method="post">
                                <!-- identify your business so that you can collect the payments -->
                                <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
                                <!-- specify a subscriptions button. -->
                                <input type="hidden" name="cmd" value="_xclick-subscriptions">
                                <!-- specify details about the subscription that buyers will purchase -->
                                <input type="hidden" name="item_name" id="paypalPlan" value="<?php if(isset($flag)) { echo $package->id; }?>">
                                <input type="hidden" name="item_number" value="<?php echo $itemNumber; ?>">
                                <input type="hidden" name="currency_code" value="USD">
                                <input type="hidden" name="a3" id="paypalAmt" value="<?php if(isset($flag)) { echo $package->amount; }?>">
                                <input type="hidden" name="p3" id="paypalValid" value="1">
                                <input type="hidden" name="t3" value="M">
                                <!-- custom variable user ID -->
                                <input type="hidden" name="src" value="1">
                                <input type="hidden" name="custom" value="<?php echo $result->id; ?>">
                                <!-- specify urls -->
                                <input type="hidden" name="cancel_return" value="<?php echo $cancelURL; ?>">
                                <input type="hidden" name="return" value="<?php echo $successURL; ?>">
                                <input type="hidden" name="notify_url" value="<?php echo $notifyURL; ?>">
                                <!-- display the payment button -->
                                <div class="box-footer">                                
                                <input type="submit" id="recurring" class="btn btn-primary" name="Update_profile" value="Pay Recurring" <?php if(!isset($flag)) { echo 'disabled'; }?>>
                                ( Payment would be auto deducted each month, unless you cancelled it. )
                                <br>
                                </div>
                            </form>
                        </section>                                                                                    
                </div>
            </div>
                    
                </div>
        	
    </div>
</div>
</div>

</div>
