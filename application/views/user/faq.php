<section class="col-md-12 faq">
	<div class="row">
    	<div class="container">
        	<div class="col-md-7">
                	<h2>frequently asked questions</h2>
                    <p>Keep up to date with the latest news</p>
                
                     <div class="panel-group" id="accordion">
                           <?php
                           if(!empty($pages)){
                                foreach($pages as $key=>$faq){ ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                          <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#<?=$faq['id']?>">
                                            <?=$faq['question']?></a>
                                          </h4>
                                        </div>
                                        <div id="<?=$faq['id']?>" class="panel-collapse collapse <?=($key == 0)?'in':''?>">
                                          <div class="panel-body">
                                          <p><?=$faq['answer']?></p></div>
                                        </div>
                                    </div> 
                            <?php }
                           }
                           ?> 
                        </div> 
                    
            </div>
            <div class="col-md-5">
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
            	<h2>did'nt find the answer , submit your question</h2>
                <form method="post" action="<?php echo site_url('welcome/ask');?>">
                <div class="form-group">
                	<input type="text" placeholder="Your Name*" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                	<input type="email" placeholder="Your Mail*" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                	<input type="text" placeholder="Subject*" class="form-control" name="subject" required>
                </div>
                <div class="form-group">
                	<textarea  placeholder="Your Question*" class="form-control" name="message" required></textarea>
                </div>
                <div class="form-group">
                	<input type="submit" value="submit question" class="btn btn-primary">
                </div>
                </form>
                
            </div>
        </div>
    </div>
    
</section>