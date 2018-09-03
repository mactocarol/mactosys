<section class="col-md-12 contact-us">
	<div class="row">
    	<div class="container">
        	<div class="col-md-6">
            	<div class="address_box">
                	<h2>Request a contact us</h2>
                    <p>Anything you want to know, that seems difficult, please contact us...</p>
                    <h3>Location : </h3>
                    <ul>
                    	<li><i class="fa fa-map-marker"></i> <?=strip_tags($pages->description)?></li>
                        <li><i class="fa fa-phone"></i> <?=$pages->phone?></li>
                        <li><i class="fa fa-envelope"></i> <?=$pages->email?></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
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
                <form method="post" action="<?php echo site_url('welcome/contact');?>">
            	<div class="col-md-6">
                	<div class="form-group"><input type="text" name="name" class="form-control" placeholder="Name" required></div>
                </div>
                <div class="col-md-6">
                	<div class="form-group"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
                </div>
                <div class="col-md-12">
                	<div class="form-group"><input type="text" name="subject" class="form-control" placeholder="Subject" required></div>
                </div>
                <div class="col-md-12">
                	<div class="form-group"><textarea class="form-control" name="message" placeholder="Message" required></textarea></div>
                </div>
                 <div class="col-md-12">
                	<div class="form-group"><input type="submit" value="submit" class="btn btn-primary"></div>
                </div>
                 </form>
            </div>
        </div>
    </div>
    
</section>

<section class="map_outer">
	<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d58884.035046827354!2d75.87430396691336!3d22.71886597489055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1smap!5e0!3m2!1sen!2sin!4v1530602116378" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>