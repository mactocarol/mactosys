        <div class="col-md-3 col-sm-4">
            <div class="nav-side-menu">
                <div class="sidebar_title">Navigation</div>
                <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>  
                <div class="menu-list">      
                    <ul id="menu-content" class="menu-content collapse out">
                        <li <?php if($page == 'dashboard') {  echo 'class="active"';} ?>><a href="<?php echo site_url('user/dashboard');?>"> <i class="fa fa-home"></i> Dashboard</a></li>
                        <li <?php if($page == 'profile') {  echo 'class="active"';} ?>><a href="<?php echo site_url('user/profile');?>"><i class=" fa  fa-user"></i> my profile	</a></li>
                       <li data-toggle="collapse" data-target="#products" class="<?php if($page != 'list_products/1' && $page != 'list_products/2' && $page != 'list_products/3' && $page != 'list_album' && $page != 'posted_jobs') { ?>collapsed"<?php }else { echo 'active'.'"'; } ?>>
                         <i class="fa fa-list"></i>My Listing <span class="arrow"></span>
                        </li>
                        <ul class="sub-menu collapse <?php if($page == 'list_products/1' || $page == 'list_products/2' || $page == 'list_products/3' || $page == 'list_album' || $page == 'posted_jobs') { echo 'in';}?>" id="products">
                            <li <?php if($page == 'list_products/1') {  echo 'class="active"';} ?>><a href="<?php echo site_url('products/index/1');?>">my videos</a></li>
                            <li <?php if($page == 'list_products/2') {  echo 'class="active"';} ?>><a href="<?php echo site_url('products/index/2');?>">my audio</a></li>
                            <li <?php if($page == 'list_products/3') {  echo 'class="active"';} ?>><a href="<?php echo site_url('products/index/3');?>">my images</a></li>
                            <li <?php if($page == 'list_album') {  echo 'class="active"';} ?>><a href="<?php echo site_url('album');?>">my albums</a></li>
                            <li <?php if($page == 'posted_jobs') {  echo 'class="active"';} ?>><a href="<?php echo site_url('jobs');?>">my Posted jobs</a></li>
                        </ul>
                        <li data-toggle="collapse" data-target="#offers" class="<?php if($page != 'offer' ) { ?>collapsed"<?php }else { echo 'active'.'"'; } ?>>
                         <i class="fa fa-list"></i>Contract Offers <span class="arrow"></span>
                        </li>
                        <ul class="sub-menu collapse <?php if($page == 'offer' ) { echo 'in';}?>" id="offers">
                            <li <?php if($page == 'sent') {  echo 'class="active"';} ?>><a href="<?php echo site_url('offer/index/sent');?>">Sent Offers</a></li>
                            <li <?php if($page == '') {  echo 'class="active"';} ?>><a href="<?php echo site_url('offer/index');?>">Received Offers</a></li>                                                        
                        </ul>                        
                        <li <?php if($page == 'packages') {  echo 'class="active"';} ?>><a href="<?php echo site_url('packages');?>"><i class=" fa fa-user-circle"></i> My Package	</a></li>
                        <li <?php if($page == 'saved') {  echo 'class="active"';} ?>><a href="<?php echo site_url('jobs/saved'); ?>"><i class=" fa fa-clone"></i> My Applied Jobs	</a></li>
                        <li <?php if($page == 'wallet') {  echo 'class="active"';} ?>><a href="<?php echo site_url('wallet');?>"><i class="fa fa-money"></i> My Wallet	</a></li>
                        <li <?php if($page == 'earnings') {  echo 'class="active"';} ?>><a href="<?php echo site_url('earnings');?>"><i class="fa fa-google-wallet"></i> My Earnings	</a></li>
                        <li <?php if($page == 'my_order') {  echo 'class="active"';} ?>><a href="<?php echo site_url('products/orders');?>"><i class=" fa fa-file"></i> my Orders	</a></li>
                        <li <?php if($page == 'transactions') {  echo 'class="active"';} ?>><a href="<?php echo site_url('transactions');?>"><i class=" fa fa-money"></i> My transaction	</a></li>
                    </ul>
                </div>  
            </div>
        
            <div class="membership">
             <div class="sidebar_title">Membership</div>
                <?php $membership = get_membership($this->session->userdata('user_id'));?>
                <?php $packages = get_packages();?>
                <?php //print_r($packages); ?>
                <form method="post" action="<?php echo site_url('packages/index');?>">
            	<div class="membership_inner">
                	<p>you are using <strong><?=$membership->title?></strong> package</p>
                    <?php if($membership->validity > 0){?>
                    <p>your membership is valid untill - <strong><?=date('d M Y',strtotime($result->account_valid))?></strong></p>
                    <?php } ?>
                    <p>you can add <strong><?=($membership->video_limit > 0)? 'upto '.$membership->video_limit:'Unlimited'?></strong> Videos</p>
                    <p>you can add <strong><?=($membership->audio_limit > 0)? 'upto '.$membership->audio_limit:'Unlimited'?></strong> Audios</p>
                    <p>you can add <strong><?=($membership->pic_limit > 0)? 'upto '.$membership->pic_limit:'Unlimited'?></strong> Pictures</p>
                    <p>you can sell <strong><?=($membership->sell_limit > 0)? 'upto '.$membership->sell_limit:'Unlimited'?></strong> Products</p>
                    <div class="select_panle">
                    	<select name="package" required>
                        	<option selected="selected" value="">select package</option>
                            <?php
                            foreach($packages as $pack){
                                $video_limit = ($pack->video_limit > 0) ? $pack->video_limit : 'Unlimited';
                                $audio_limit = ($pack->audio_limit > 0) ? $pack->audio_limit : 'Unlimited';
                                $pic_limit = ($pack->pic_limit > 0) ? $pack->pic_limit : 'Unlimited';
                            ?>
                            <option value="<?=($pack->id)?>"><?=ucfirst($pack->title).'- (<b>'.$video_limit.'</b> Videos, <b>'.$audio_limit.'</b> Audios, <b>'.$pic_limit.'</b> Pictures)'?></option>
                            <?php } ?>                                                        
                        </select>
                        <i class="fa fa-gear"></i>
                        <i class="fa fa-angle-down"></i>
                    </div>
                    <button type="submit" class="button_design button_blue">change</button>
                </div>
                </form>
            </div>
        </div>