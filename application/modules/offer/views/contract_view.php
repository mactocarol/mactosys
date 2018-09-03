
<div class="contract-outer col-md-12 text-center">
<div class="row">
	<div class="container" id="contract">
    	<h3 class="text-capitalize">contract page</h3>        
         <form method="post" action="<?php echo site_url('offer/contract/'.$offer_id);?>">       
        <div class="col-md-4">
        	<div class="contract-inner">
                <div class="contract-title">
                    <h2 class="text-capitalize">sender</h2>
                </div>
                <!--<ul>
                	<li>human conversations bot that</li>
                    <li> speak english, you can communicate</li>
                    <li> with him with phrases like:</li>
                    <li>human conversations bot that</li>
                    <li> speak english, you can communicate</li>
                    <li>human conversations bot that</li>
                    <li> <input type="checkbox"> speak english, you can communicate</li>
                    <li><a href="#" class="btn btn-primary">Click to sign</a></li>
                </ul>-->
                <ul>
                    <li>
                        <strong><h4><?php echo get_user($offer->offer_from)->username;?></h4></strong>      
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
                    <li>
                        <input type="checkbox" checked disabled> I agree to Contract's terms & conditions<br>
                            <b>Sign Here</b><br>
                            <textarea disabled><?php echo get_user($offer->offer_from)->username;?></textarea>
                    </li>
                </ul>
             </div>
           </div>
           <div class="col-md-4">
        	<div class="contract-inner">
                <div class="contract-title">
                    <h2 class="text-capitalize">contract offer</h2>
                </div>
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
           </div>
           <div class="col-md-4">
        	<div class="contract-inner">
                <div class="contract-title">
                    <h2 class="text-capitalize">recipient</h2>
                </div>
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
                    <li>
                        <input type="checkbox"> I agree to Contract's terms & conditions<br>
                            <b>Sign Here</b><br>
                            <textarea disabled><?php echo get_user($offer->offer_to)->username;?></textarea>
                    </li>
                </ul>
             </div>
           </div>
             <input type="hidden" name="offer_id" value="">
            <div class="col-md-12">
                <?php if($offer->is_contract_signed) { ?>
                    <a href="print" target="_blank" onclick="PrintElem('contract'); return false;" class="btn btn-primary">Print Contract</a>
                <?php } else {?>
                    <button type="submit" class="btn btn-primary">Make Contract</button>
                <?php }?>
            </div>
         </form>
        
        
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
<style>
    .contract-inner {
        min-height: 500px;
    }
</style>
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