<div class="do-business-outer col-md-12">
<div class="row">
	<div class="container" style="margin-bottom: 3px;">
        <a href="<?php echo site_url('offer');?>" class="btn btn-primary">Back</a>
    </div>
</div>

<div class="row">
	<div class="container">
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
            
        	<div class="do-business-left">
                
            	<h2>offer</h2>
                <ul>
                    <li>
                        <?php echo ($offer->offer) ? $offer->offer : '';?>
                    </li>
                    <li>
                        Will pay <strong><?php echo $offer->offer_amount;?> $ </strong> to  do
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
                	<!--<li>Song must be completed in 10 days. </li>
					<li> $1000 for the completion of the song.</li>
                    <li> Half now half when the song is completed. </li>-->
                </ul>
                <span class="btn btn-primary">$<?php echo ($offer->offer_amount) ? $offer->offer_amount : '';?></span>
                <h3>( Time to Complete - <?php echo ($offer->days) ? $offer->days : '';?> Days )</h3>                
            </div>
            <div class="do-business-right">
            	<h2>what we <span>need</span></h2>
                <!--<p>Kali Girl, we are fans of your music and we would be honored if you would work with us. We need you to finish this song for us: </p>
<p>Link to song .<a href="#">You’re The One </a></p>
<p>Our comp, can supply you with studio time and a flight to our city. Or you can record it on your own a nd send it back to us upon completion. We hope to do business with you. </p>
<p class="text-right">Sincerely, </p>
<p class="text-right">Michigan Hustle Florida Muscle </p>-->
                <p>
                    <li><?php echo ($offer->requirement) ? $offer->requirement : '';?></li>
                    <li>
                                We need you  to do
                                <strong><?php echo $offer->task;?></strong>
                            </li>
                            <li>
                                Have <strong><?php echo $offer->days;?></strong> days to complete the <strong><?php echo $offer->task;?></strong> or not get any money.                                
                            </li>
                            <?php $milestone = json_decode($offer->milestone_amt); $days = json_decode($offer->milestone_days);?>
                            <?php if(!empty($milestone)) {
                                     $i = 0;
                                     foreach($milestone as $row) { ?>
                                     <li>
                                        We will pay <strong><?php echo $row;?> $ </strong>  after <strong><?php echo $days[$i];?></strong> days
                                     </li>
                            <?php $i++; } }?>
                            
                </p>

            </div>
            
            <div class="do-business-action text-center">
                <!--<a href="<?php echo site_url('offer');?>" class="btn btn-primary">Back</a>-->
                <?php if($offer->offer_from != $this->session->userdata('user_id')) { ?>
                                <?php if($offer->status == 2) { ?>
                                To start work, sign to Contract Page, 
                                    <a href="<?php echo site_url('offer/contract/'.$offer->id);?>" class="btn btn-primary">Go to Contract Page</a>                                    
                                <?php } else if($offer->status == 4) { ?>    
                                    <h4>You have declined this offer</h4>
                                <?php } else if($offer->status != 2 && $offer->status != 4) { ?>
                                    <?php if($offer->status == 3){ echo "<h4>You have Negotiated this Offer.</h4>"; } ?><br><br>
                                    <a href="<?php echo site_url('offer/action/'.$offer->id.'/2');?>" class="btn btn-primary">Accept Offer</a>
                                    <a href="<?php echo site_url('offer/action/'.$offer->id.'/4');?>" class="btn btn-primary">Decline Offer</a>
                                    <a href="<?php echo site_url('offer/action/'.$offer->id.'/3');?>" class="btn btn-primary">Negotiate Offer</a>
                                    <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Preview Contract</a>                                    
                                <?php }  ?>
                            <?php }else { ?>
                                <?php if($offer->status == 1) { ?><a href="#" class="btn btn-primary">Pending</a><?php } ?>
                                <?php if($offer->status == 2) { ?><a href="#" class="btn btn-primary">Accepted</a><?php } ?>
                                <?php if($offer->status == 3) { ?><a href="#" class="btn btn-primary">Negotiated</a><?php } ?>
                                <?php if($offer->status == 4) { ?><a href="#" class="btn btn-primary">Declined</a><?php } ?>
                                
                                <?php if($offer->status == 2 && ($offer->is_contract_signed == 1)) { ?>                                
                                    <a href="<?php echo site_url('offer/contract/'.$offer->id);?>" class="btn btn-primary">Go to Contract Page</a>                                    
                                <?php } else{ ?>
                                    <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Preview Contract</a>
                                <?php } ?>
                            <?php } ?>
            </div>
        
        	
    </div>
</div>
</div>
<div class="chat-outer col-md-12">
<div class="row">
	<div class="container">
    	<div class="col-md-4 pull-right text-center">
        	<h2 class="text-capitalize">support desk</h2>
            <p> The conversation is automatically deleted on page load. Max upload size 1MB. The agent of the demo is a human conversations bot that speak english, you can communicate with him with phrases like:</p>
        </div>
    	<div class="col-md-8">
            <div id="send_comments_message"></div>
        	<div class="chat-window-panel">
            	<div class="chat-window-title">
                    <?php if($result->id == $offer->offer_from) { ?>
                	<img src="<?php echo base_url('upload/profile_image/thumb/'.get_user($offer->offer_to)->image);?>"> <?php echo get_user($offer->offer_to)->username; ?>
                    <?php } else { ?>
                    <img src="<?php echo base_url('upload/profile_image/thumb/'.get_user($offer->offer_from)->image);?>"> <?php echo get_user($offer->offer_from)->username; ?>                    
                    <?php } ?>
                </div>
                <div class="chat-window-box">
                    <?php if(!empty($comments)){?>
                	<ul>
                        <?php foreach($comments as $comment) { 
                            if($comment['message_from'] != $result->id){ ?>
                                <li>
                                    <div class="chat-user-left">
                                        <div class="chat-user-box">
                                            <img src="<?php echo base_url('upload/profile_image/thumb/'.get_user($comment['message_from'])->image);?>">
                                            <span><?php echo get_user($comment['message_from'])->username; ?></span>
                                        </div>
                                        <div class="chat-user-message">                                	
                                           <div class="chat-line"> <span><?=$comment['message']?></span></div>
                                           <?php if(($comment['file'])) {?>
                                                <div class="chat-line"> Sent you a file <a href="<?php echo site_url('offer/download/'.$comment['file']);?>" target="_blank"><u><?=($comment['file'])?></u></a></div>
                                            <?php } ?>
                                            <div class="meta-info"><span class="date"><?=date('d M Y',strtotime($comment['created_at']))?></span> <span class="time"><?=date('h:i:s a',strtotime($comment['created_at']))?></span> </div>
                                        </div>
                                    </div>                                                                    
                                </li>
                            <?php } else { ?>
                                <li>                                    
                                    <div class="chat-user-right">
                                        <div class="chat-user-box">
                                            <img src="<?php echo base_url('upload/profile_image/thumb/'.get_user($comment['message_from'])->image);?>">
                                            <span><?php echo get_user($comment['message_from'])->username; ?></span>
                                        </div>
                                        <div class="chat-user-message">
                                            <div class="chat-line"><span><?=$comment['message']?></span></div>
                                            <?php if(($comment['file'])) {?>
                                                <div class="chat-line"> Sent you a file <a href="<?php echo site_url('offer/download/'.$comment['file']);?>" target="_blank"><u><?=($comment['file'])?></u></a></div>
                                            <?php } ?>
                                            <div class="meta-info"><span class="date"><?=date('d M Y',strtotime($comment['created_at']))?></span> <span class="time"><?=date('h:i:s a',strtotime($comment['created_at']))?></span> </div>
                                        </div>
                                    </div>                                                                    
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                    <?php } else { ?>
                    No Cnversation Yet.
                    <?php }?>
                </div>
                
                
                <div class="chat-sender-box">                    
                    <form method="post" id="comment_form" action="" enctype="multipart/form-data">
                        <textarea class="form-control" name="message" id="message" placeholder="write a message" required="required"></textarea>
                        
                        <?php if($result->id == $offer->offer_from) { ?>
                            <input type="hidden" name="message_to" value="<?=$offer->offer_to?>">
                        <?php } else { ?>
                            <input type="hidden" name="message_to" value="<?=$offer->offer_from?>">
                        <?php } ?>
                        
                        <?php if($result->id == $offer->offer_from) { ?>
                            <input type="hidden" name="message_from" value="<?=$offer->offer_from?>">
                        <?php } else { ?>
                            <input type="hidden" name="message_from" value="<?=$offer->offer_to?>">
                        <?php } ?>
                        <input type="hidden" name="offer_id" value="<?=$offer->id?>">
                        
                        <button type="submit" class="btn btn-primary" id="send_comments">send</button>
                        <a>
                            <i class="fa fa-paperclip" onclick="document.getElementById('attachment').click();"></i>                        
                        </a>
                        <div id="attachment_div"></div>
                        
                        <input type="file" id="attachment" name="attachment" onchange="document.getElementById('attachment_div').innerHTML = this.files.item(0).name; " style="display:none" >
                        <h4 id='loading' style="display:none">Sending...<img src="<?php echo base_url('upload/comments/straight-loader.gif');?>" height="150px"></h4>
                    </form>
                </div>
            </div>
        </div>
        
	</div>
 </div>
 </div>


<div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width:800px;">
          
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Contract</h4>
                </div>
                <div class="modal-body">
                  
                    <!--<div class="col-md-4">
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
                    </div>-->
                    <!--<div class="col-md-4">
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
                    </div>-->
                    <!--<div class="col-md-4">
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
                        
                    </div>-->
                    
                    <div class="container" id="contract">
                        <div class="col-md-8">
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
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
          
            </div>
          </div>
