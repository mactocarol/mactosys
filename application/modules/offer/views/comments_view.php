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