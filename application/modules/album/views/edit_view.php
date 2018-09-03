<div class="dashboard col-md-12">
<div class="row">
	<div class="container">
    	<?php echo $this->load->view('user/includes/sidebar'); ?>
        <div class="col-md-9 col-sm-8">
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
            	<div class="sidebar_title">My Album</div>
                
                <div class="albums_panel col-md-12">
                	<div class="row">
                	<div class="col-md-4"><img src="<?php echo base_url('upload/products/album_thumb/'.$album[0]['thumb']);?>"></div>
                    
                    <div class="col-md-8">
                    	<h1><?php echo $result->username."'s"; ?></h1>
                        <h2><?php echo isset($album[0]['title']) ? $album[0]['title'] : ''; ?></h2>
                        
                        <table>
                        	<!--<tr><td>Allaboutmusic Rating</td><td><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></td></tr>-->
                            <!--<tr><td>User Rating</td><td><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></td></tr>-->
                            <tr><td>Releases</td><td><?php echo isset($album[0]['created_at']) ? date('d M Y',strtotime($album[0]['created_at'])) : ''; ?></td></tr>
                             <tr><td>Total Track</td><td><?php echo isset($album[0]['list']) ? count($album[0]['list']) : ''; ?></td></tr>
                        </table>
                        
                        
                        
                </div>
            
        </div></div>
         <div class="albumstrack_panel col-md-12">
                	<div class="row">
        
        <div class="col-md-12">
                    	<div class="panel panel-default">
                        	<div class="panel-body">
                            	<h4><i class="fa fa-list color-primary"></i>&nbsp;&nbsp; My Track lists</h4>
                                
                                <div class="table-responsive">
                                <table>
                                	<thead>
                                    	<tr><th></th><th  width="200px"></th> <th>Title/Composer </th><th>Type</th><th></th></tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($album as $row){ 
                                            if(isset($row['list']) && $row['list'] != '') { 
                                                foreach($row['list'] as $key=>$list){
                                                    if($list) { ?>
                                                        <tr>
                                                            <td><?=$key+1?></td>
                                                            <td>
                                                                <!--<img src="<?=site_url('upload/products/').$list[0]['thumb']?>">-->
                                                                <?php if($list[0]['file_type'] == 1) { ?>
                                                                
                                                                    <?php if($list[0]['thumb']) {?>
                                                                    <img src="<?php echo base_url('upload/products/video_thumb/'.$list[0]['thumb']);?>" width="150" height="150">
                                                                    <?php } else {?>
                                                                        <video width="150" height="100" controlsList="nodownload">
                                                                            <source src="<?php echo base_url('upload/products/'.$list[0]['file']); ?>" type="video/mp4">
                                                                            <source src="<?php echo base_url('upload/products/'.$list[0]['file']); ?>" type="video/avi">
                                                                            <source src="<?php echo base_url('upload/products/'.$list[0]['file']); ?>" type="video/mov">                                                                    
                                                                        </video>
                                                                    <?php } ?>
                                                                <?php }else if($list[0]['file_type'] == 2) {?>
                                                                    <img src="<?php echo base_url('upload/products/audio_thumb/'.$list[0]['thumb']);?>" width="150" height="100">
                                                                <?php }else if($list[0]['file_type'] == 3) {?>
                                                                    <img src="<?php echo base_url('upload/products/image_thumb/'.$list[0]['file']);?>" width="150" height="100">
                                                                <?php } ?>
                                                            </td>
                                                            
                                                            <td><h3><a href="<?php echo site_url('products/detail/'.$list[0]['id']);?>"><?=$list[0]['title']?></a></h3><!--<span>John Williams</span>--></td>
                                                            <td><h5><?=($list[0]['file_type'] == 1) ? 'Video' : (($list[0]['file_type'] == 2) ? 'Audio' : 'Picture'); ?></h5>
                                                            <td><a href="<?php echo base_url(); ?>album/track_delete/<?php echo $list[0]['track_no'];?>/<?php echo $album[0]['id'];?>" onclick=" var c = confirm('Are you sure want to delete?'); if(!c) return false;"><i class="fa fa-close" aria-hidden="true"></i></a></td>
                                                        </tr>
                                            <?php        }
                                                    }
                                            } 
                                         } ?>                                        
                                    </tbody>
                                </table>
                                </div>
                             </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4><i class="fa fa-list color-primary"></i>&nbsp;&nbsp; Add More Track</h4>
                                    <form role="form" id="add_product_form" name="" method="post" action="<?php echo base_url().'album/edit/'.$album[0]['id']; ?>" enctype="multipart/form-data">
                                        <div class="table-responsive">
                                           <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                               <thead>
                                               <tr>
                                                 <th width="40%">Title</th>                                                                              
                                                 <th width="40%">Videos</th>
                                                 <th></th>
                                               </tr>
                                               </thead>
                                               <tbody>
                                                     <?php if(isset($video) && !empty($video)) {                                                
                                                           foreach($video as $row){ ?>
                                                       <tr>                                                
                                                           <td>
                                                               <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                                             </td>
                                                           <td>                                    
                                                               <?php if(isset($row['file']) && $row['file'] != '') { ?>
                                                                   <?php if($row['file_type'] == 1) { ?>
                                                                        <?php if($row['thumb']) {?>
                                                                        <img src="<?php echo base_url('upload/products/video_thumb/'.$row['thumb']);?>" width="150" height="150">
                                                                        <?php } else {?>
                                                                            <video width="150" height="100" controlsList="nodownload">
                                                                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mp4">
                                                                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/avi">
                                                                                <source src="<?php echo base_url('upload/products/'.$row['file']); ?>" type="video/mov">
                                                                              Your browser does not support the products tag.
                                                                            </video>
                                                                        <?php } ?>
                                                                   <?php } } ?>                                                           
                                                           </td>
                                                           <td>
                                                            <input type="checkbox" name="product[]" value="<?=$row['id']?>">
                                                           </td>
                                                       </tr>                          
                                               <?php  } } else { ?>
                                                        <tr>
                                                            <td colspan="3">Not Upload any Videos Yet.</td>
                                                        </tr>
                                                <?php } ?>
                                               </tfoot>
                                           </table>   
                                        </div>
                                    
                                        <div class="table-responsive">
                                           <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                               <thead>
                                               <tr>
                                                 <th width="40%">Title</th>                                                                              
                                                 <th width="40%">Audios</th>
                                                 <th></th>
                                               </tr>
                                               </thead>
                                               <tbody>
                                                     <?php if(isset($audio) && !empty($audio)) {                                                
                                                           foreach($audio as $row){ ?>
                                                       <tr>                                                
                                                           <td>
                                                               <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                                           </td>
                                                           <td>                                    
                                                               <?php if(isset($row['file']) && $row['file'] != '') { ?>
                                                                   <?php if($row['file_type'] == 2) { ?>
                                                                      
                                                                       <img src="<?php echo base_url('upload/products/audio_thumb/'.$row['thumb']);?>" width="150" height="100">
                                                                   <?php } } ?>
                                                           </td>
                                                           <td>
                                                            <input type="checkbox" name="product[]" value="<?=$row['id']?>">
                                                           </td>
                                                       </tr>                          
                                               <?php  } } else { ?>
                                                        <tr>
                                                            <td colspan="3">Not Upload any Audios Yet.</td>
                                                        </tr>
                                                <?php } ?>
                                               </tfoot>
                                           </table>   
                                        </div>
                                    
                                        <div class="table-responsive">
                                           <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                               <thead>
                                               <tr>
                                                 <th width="40%">Title</th>                                                                              
                                                 <th width="40%">Pictures</th>
                                                 <th></th>
                                               </tr>
                                               </thead>
                                               <tbody>
                                                     <?php if(isset($picture) && !empty($picture)) {                                                
                                                           foreach($picture as $row){ ?>
                                                       <tr>                                                
                                                           <td>
                                                               <?php echo isset($row['title']) ? $row['title'] : ''; ?>                                    
                                                             </td>
                                                           <td>                                    
                                                               <?php if(isset($row['file']) && $row['file'] != '') { ?>
                                                                   <?php if($row['file_type'] == 3) { ?>
                                                                       <img src="<?php echo base_url('upload/products/image_thumb/'.$row['file']);?>" width="150">
                                                                   <?php } } ?>
                                                           </td>
                                                           <td>
                                                            <input type="checkbox" name="product[]" value="<?=$row['id']?>">
                                                           </td>
                                                       </tr>                          
                                               <?php  } } else { ?>
                                                        <tr>
                                                            <td colspan="3">Not Upload any Pictures Yet.</td>
                                                        </tr>
                                                <?php }?>                                                                                          
                                               </tfoot>
                                           </table>   
                                        </div>
                                        <div class="upload_panel">
                                            <button type="submit" class="button_design button_blue" >Add Track</button>
                                        </div>
                                    </form>    
                        </div>
                    </div>
                
                
                 
                 </div></div>
        	
    </div>
        	
    </div>
</div>
</div>

</div>
