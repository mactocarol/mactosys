<footer class="col-md-12 footer">
<div class="row">
	<div class="container">
    	<div class="footer_top">
            <aside class="col-md-4 col-sm-6 contact_info">
                <a class="footer-logo" href="#"><img src="<?php echo base_url('front');?>/images/logo.png" alt=""></a>
                <p>Sed consequat sapien faus quam bibendum convallis quis in nulla. Pellentesque volutpat odio eget diam cursus semper. Sed coquat sapien faucibus quam.</p>
                <a href="#" class=" button_design button_white">Learn more</a>
            </aside>
            
            <aside class="col-md-3  col-sm-6 footer_nav_manu">
            	<h2>Quick Links</h2>
                <ul>
                    <li><a href="<?php echo site_url('About-us');?>">About us</a></li>
                    <li><a href="<?php echo site_url('frequently-asked-questions');?>">Frequently Asked Questions</a></li>
                    <li><a href="<?php echo site_url('terms-and-conditions');?>">Terms and Conditions</a></li>                    
                    <li><a href="<?php echo site_url('Blogs');?>">Blogs</a></li>
                    <li><a href="<?php echo site_url('Contact-us');?>">Contact</a></li>
                </ul>
            </aside>
            <aside class="col-md-3  col-sm-6 footer_nav_manu">
            	<h2>For Job Seekers</h2>
                <ul>
                    <li><a href="<?php echo site_url('jobs/search');?>">Browse Jobs</a></li>
                    <li><a href="<?php echo site_url('jobs/search');?>">Browse Categories</a></li>
                    <li><a href="<?php echo site_url('jobs/post');?>">Submit Resume</a></li>
                    <li><a href="<?php echo site_url('user/dashboard');?>">Candidate Dashboard</a></li>                    
                    <li><a href="<?php echo site_url('jobs/saved');?>">My Saved Jobs</a></li>
                    <li><a href="<?php echo site_url('jobs');?>">My Posted Jobs</a></li>
                </ul>
            </aside>
            <aside class="col-md-2  col-sm-6 footer_nav_manu">
            	<h2>For Search Talent</h2>
                <ul>
                    <li><a href="<?php echo site_url('search');?>">Serach Talent</a></li>
                    <li><a href="<?php echo site_url('user/dashboard');?>">Employer Dashboard</a></li>
                    <li><a href="<?php echo site_url('products/index/1');?>">My Videos</a></li>
                    <li><a href="<?php echo site_url('products/index/2');?>">My Audios</a></li>
                    <li><a href="<?php echo site_url('products/index/3');?>">My Pictures</a></li>
                </ul>
            </aside>
        </div>
        
        
        <div class="careerfy-copyright col-md-12">
                    <div class="col-md-6 col-sm-6"><p>Copyrights © 2018 All Rights Reserved by <a href="#" class="careerfy-color">company name</a></p></div>
                    <div class="col-md-6 col-sm-6">
                        <div class="careerfy-social-network pull-right">
                            <a href="#" class="careerfy-bgcolorhover fa fa-facebook"></a>
                            <a href="#" class="careerfy-bgcolorhover fa fa-twitter"></a>
                            <a href="#" class="careerfy-bgcolorhover fa fa-dribbble"></a>
                            <a href="#" class="careerfy-bgcolorhover fa fa-linkedin"></a>
                            <a href="#" class="careerfy-bgcolorhover fa fa-instagram"></a>
                        </div>
                    </div>
                </div>
        
    </div>
</div>
</footer>

<!-- Modal Profile Picture-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal Profile Picture-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Profile Picture</h4>
      </div>
      <div class="modal-body">
        <p>Upload Profile Picture</p>
        <!--------------------  --------------->
                   <div class="row">
                        <p id="img_success"></p>
                        <div class="col-md-8 text-center">
                            <div id="upload-demo" style="width:350px"></div>
                        </div>
                        <div class="col-md-4" style="padding-top:30px; padding-right:30px;">
                            <strong>Select Image:</strong>
                            <br/>
                            <input type="file" id="upload">
                            <br/>
                            <button class="btn btn-success upload-result">Upload Image</button>
                        </div>
                        <!--<div class="col-md-4" style="">
                            <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
                        </div>-->
                    </div>
                   <!---------------------- --------------->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal cover Picture-->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog cover_pic">

    <!-- Modal Cover Picture-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cover Picture</h4>
      </div>
      <div class="modal-body">
        <p>Upload Cover Picture</p>
        <!--------------------  --------------->
                   <div class="row">
                        <p id="img_success"></p>
                        <div class="col-md-10 text-center">
                            <div id="upload-demo1" style="width:350px"></div>
                        </div>
                        <div class="col-md-2" style="padding-top:30px; ">
                            <strong>Select Image:</strong>
                            <br/>
                            <input type="file" id="upload1">
                            <br/>
                            <button class="btn btn-success upload-result1">Upload Image</button>
                        </div>
                        <!--<div class="col-md-4" style="">
                            <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
                        </div>-->
                    </div>
                   <!---------------------- --------------->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!---------------upload product -------------------------->
<div id="productModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Videos</h4>
      </div>
      <div class="modal-body">
        <form>
        	
                       <div class="form-group"> 
                        <div class="input_box"> 
                        	<input placeholder="Enter Video Title" class="input-text form-control" required="required" type="text">
                            <i class="fa fa-tag"></i>
                        </div>
                        </div>
                         <div class="form-group">
                        <div class="input_box"> 
                        	<textarea placeholder="Enter Video Description" class="input-text form-control"></textarea>
                            <i class="fa fa-comment"></i>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="select_panle">
                    	<select>
                        	<option selected="selected">select Category</option>
                            <option>Category 1</option>
                            <option>Category 2</option>
                            <option>Category 3</option>
                            
                        </select>
                         <i class="fa fa-gear"></i>
                         <i class="fa fa-angle-down"></i>
                    </div>
                        </div>
                        <div class="form-group">
                        	
                                <input type="file" name="img[]" class="file">
                                <div class="input-group input_box">
                                  <i class="glyphicon glyphicon-picture"></i>
                                  <input type="text" class="form-control input-text browse-text" disabled placeholder="Upload Video">
                                 
                                    <button class="browse btn btn-primary input-lg" type="button"> Browse</button>
                                  
                                </div>
                        
                        
                        </div>
                        <div class="form-group"> <input type="submit" class="btn btn-primary" value="Submit">
                        
                        </div>
                
        </form>
      </div>
      
    </div>

  </div>
</div>





<script src="<?php echo base_url('front');?>/js/bootstrap-select.min.js"></script>
<script>
        $('.selectpicker').selectpicker({
  style: 'btn-info',
  size: 4
});
</script>
   <script>
			$(document).ready(function() {
            $("#preloader").hide();
            $(".pace").hide();
            var sideslider = $('[data-toggle=collapse-side]');
            var sel = sideslider.attr('data-target');
            var sel2 = sideslider.attr('data-target-2');
            sideslider.click(function(event){
                $(sel).toggleClass('in');
                $(sel2).toggleClass('out');
            });
        });
		</script>
	<script src="<?php echo base_url('front');?>/js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});

});
</script>
<script type="text/javascript" src="<?php echo base_url('front');?>/js/simple-lightbox.js"></script>
<script>
	$(function(){
		var $gallery = $('.gallery a').simpleLightbox();

		$gallery.on('show.simplelightbox', function(){
			console.log('Requested for showing');
		})
		.on('shown.simplelightbox', function(){
			console.log('Shown');
		})
		.on('close.simplelightbox', function(){
			console.log('Requested for closing');
		})
		.on('closed.simplelightbox', function(){
			console.log('Closed');
		})
		.on('change.simplelightbox', function(){
			console.log('Requested for change');
		})
		.on('next.simplelightbox', function(){
			console.log('Requested for next');
		})
		.on('prev.simplelightbox', function(){
			console.log('Requested for prev');
		})
		.on('nextImageLoaded.simplelightbox', function(){
			console.log('Next image loaded');
		})
		.on('prevImageLoaded.simplelightbox', function(){
			console.log('Prev image loaded');
		})
		.on('changed.simplelightbox', function(){
			console.log('Image changed');
		})
		.on('nextDone.simplelightbox', function(){
			console.log('Image changed to next');
		})
		.on('prevDone.simplelightbox', function(){
			console.log('Image changed to prev');
		})
		.on('error.simplelightbox', function(e){
			console.log('No image found, go to the next/prev');
			console.log(e);
		});
	});
</script>
<script type="text/javascript">
    $(document).on('click', '.browse', function(){
      var file = $(this).parent().parent().parent().find('.file');
      file.trigger('click');
    });
    $(document).on('change', '.file', function(){
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
    
    $(document).on('click', '.browse1', function(){
      var file = $(this).parent().parent().parent().find('.file1');
      file.trigger('click');
    });
    $(document).on('change', '.file1', function(){
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
</script>
<script src="<?php echo base_url('front');?>/js/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: '1950:2011'
    });
  } );
</script>
<!--<script src="<?php echo base_url('front');?>/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url('front');?>/js/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('front');?>/js/bannerscollection_zoominout.js" type="text/javascript"></script>

<script>
	
		jQuery(function() {

			jQuery('#bannerscollection_zoominout_opportune').bannerscollection_zoominout({
				loop: false,
				auto:false,
				skin: 'generous',
				responsive:true,
				width: 1920,
				height: 600,
				width100Proc:true,
				height100Proc:true,
				showNavArrows:true,
				showBottomNav:true,
				thumbsOnMarginTop:14,
				thumbsWrapperMarginTop: -110,
				autoHideBottomNav:false,
				pauseOnMouseOver:false
			});		
			
			
		});
	</script>-->

<!-------------------image crop ------------------------------>
<!--<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>-->
<script src="<?php echo base_url('front');?>/js/croppie.js"></script>
<script type="text/javascript">
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'square'
    },
    boundary: {
        width: 300,
        height: 300
    }
});

$('#upload').on('change', function () { 
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    	
    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload-result').on('click', function (ev) {
	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {
        
		$.ajax({
			url: "<?php echo site_url('user/upload_image');?>",
			type: "POST",
			data: {"image":resp},
            beforeSend: function() {
                $("#preloader").show();
                $(".pace").show();
             },
			success: function (data) {
				//html = '<img src="' + resp + '" />';
				//$("#upload-demo-i").html(html);
                $("#preloader").hide();
                $(".pace").hide();
                console.log(data);
                $("#img_success").html('Image uploaded successfully');
                location.reload();
			}
		});
	});
});

</script>
<script type="text/javascript">
$uploadCrop1 = $('#upload-demo1').croppie({
    enableExif: true,
    viewport: {
        width: 850,
        height: 334,
        type: 'square'
    },
    boundary: {
        width: 1000,
        height: 400
    }
});

$('#upload1').on('change', function () { 
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop1.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    	
    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload-result1').on('click', function (ev) {
	$uploadCrop1.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {

		$.ajax({
			url: "<?php echo site_url('user/cover_image');?>",
			type: "POST",
			data: {"image":resp},
            beforeSend: function() {
                $("#preloader").show();
                $(".pace").show();
             },
			success: function (data) {
				$("#preloader").hide();
                $(".pace").hide();
                $("#img_success").html('Image uploaded successfully');
                location.reload();
			}
		});
	});
});

</script>
<!------------------- image crop end --------------------->
<script>
         $(document).ready(function() {   
         var sideslider = $('[data-toggle=collapse-side]');
         var sel = sideslider.attr('data-target');
         var sel2 = sideslider.attr('data-target-2');
         sideslider.click(function(event){
             $(sel).toggleClass('in');
             $(sel2).toggleClass('out');
         });
     });
</script>
<script>
    function add(ths,sno){    
        for (var i=1;i<=5;i++){
            var cur=document.getElementById("star"+i)
            cur.className="fa fa-star"
        }
    
        for (var i=1;i<=sno;i++){
            var cur=document.getElementById("star"+i)
                if(cur.className=="fa fa-star")
                {
                    cur.className="fa fa-star checked"
                }
        }
    
    }
</script>
<script>
    $(document).on("click", "#add_more_milestone", function () {
            var img_count = Number($("#milestone_field").val());
            
            if(img_count <= 3){
                img_count = Number(img_count) + 1;
                $("#milestone_field").val(img_count);
                var html = '';
                html += "<div class='row'>";
                html += "<div class='col-sm-3'>";
                html += "<div class='form-group'>";
                html += "<label class='control-label'>MileStone "+ (img_count-1) +"</label>";
                html += "<input type='number' min='1' class='form-control' id='"+img_count+"' name='milestone_amt[]' placeholder='amount'/>";                
                html += "</div>";
                html += "</div>";
                
                html += "<div class='col-sm-3'>";
                html += "<div class='form-group'>";
                html += "<label class='control-label'>&nbsp;</label>";
                html += "<input type='text' class='form-control' id='"+img_count+"' name='milestone_day[]' placeholder='days'/>";
                html += "</div>";
                html += "</div>";
                
                html += "<div class='col-sm-3'>";
                html += "<label class='control-label'>&nbsp;</label>";
                html += "<div class='form-group'>";
                html += "<img src='<?php echo base_url(); ?>assets/dist/img/bt_delete.png' style='cursor:pointer; height:10px; width:10px;' title='Remove Image' class='remove_img_div'/>";
                html += "</div>";
                html += "</div>";
                html += "</div>";
                $("#milestone_upload_section").append(html);    
            }else{
                alert('You can create maximum 3 milestones.');
            }
            
        });
        
        //remove product image from page
        $(document).on("click", ".remove_img_div", function () {
            var img_count = Number($("#milestone_field").val());
            img_count = Number(img_count) - 1;
            $("#milestone_field").val(img_count);
            $(this).closest(".row").remove();
        });
  </script>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );
</script>
<script>
    function add(ths,sno){
        for (var i=1;i<=5;i++){
            var cur=document.getElementById("star"+i)
            cur.className="fa fa-star"
        }
    
        for (var i=1;i<=sno;i++){
            var cur=document.getElementById("star"+i)
            if(cur.className=="fa fa-star")
            {
                cur.className="fa fa-star checked"
            }
        }                
    }
</script>

<script>
$(document).ready(function(){
    $(".job-search-filter-wrap h2").click(function(){
        $(this).next(".job-checkbox-toggle").slideToggle();
		 $(this).toggleClass("plus");
    });
});
</script>
<script>
$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    responseMessage(msg);
    
  });
  
  
});


function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}
</script>
<script>
    $('input.content').on('click',function () {
        if ($('input.rating').is(':checked')) {
            alert('Please un-check Artist.');
        }
    });
    $('.filter_talent').on('click',function () {
        if ($('input.rating').is(':checked')) {
            $('input.genre').attr("disabled", true);
            $('input.content').attr("checked", false);
        }else{
            $('input.genre').attr("disabled", false);
            //$('input.gender').attr("disabled", false);
        }
        
        if ($('input.content').is(':checked')) {
            $('input.gender').attr("disabled", true);
            $('input.role').attr("disabled", true);
            $('input.genre').attr("disabled", false);
        }else{
            $('input.gender').attr("disabled", false);
            $('input.role').attr("disabled", false);
            $('input.genre').attr("disabled", true);
        }
        
        if ($('input.both').is(':checked')) {
            $('input.gender').attr("checked", true);
        }
        
            
                var url = '<?php echo site_url('search/filter'); ?>'; // the script where you handle the form input.
                
                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#filter_form").serialize(), // serializes the form's elements.
                       beforeSend: function() {
                            $("#preloader").show();
                            $(".pace").show();
                         },
                       success: function(data)
                       {
                          console.log(data); // show response from the php script.
                          $("#preloader").hide();
                          $(".pace").hide();
                          $('.search_list_outer').html(data);
                       }
                     });
            
                e.preventDefault(); // avoid to execute the actual submit of the form.

    });
    
    $('.filter_talent').on('keyup',function () {
        if ($('input.rating').is(':checked')) {
            $('input.genre').attr("disabled", true);
            $('input.content').attr("checked", false);
        }else{
            $('input.genre').attr("disabled", false);
            //$('input.gender').attr("disabled", false);
        }
        
        if ($('input.content').is(':checked')) {
            $('input.gender').attr("disabled", true);
            $('input.role').attr("disabled", true);
            $('input.genre').attr("disabled", false);
        }else{
            $('input.gender').attr("disabled", false);
            $('input.role').attr("disabled", false);
            $('input.genre').attr("disabled", true);
        }
        
        if ($('input.both').is(':checked')) {
            $('input.gender').attr("checked", true);
        }
        
            
                var url = '<?php echo site_url('search/filter'); ?>'; // the script where you handle the form input.
                
                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#filter_form").serialize(), // serializes the form's elements.
                       beforeSend: function() {
                            $("#preloader").show();
                            $(".pace").show();
                         },
                       success: function(data)
                       {
                          console.log(data); // show response from the php script.
                          $("#preloader").hide();
                          $(".pace").hide();
                          $('.search_list_outer').html(data);
                       }
                     });
            
                e.preventDefault(); // avoid to execute the actual submit of the form.

    });
    
    $(document).ready(function(){
        if ($('input.rating').is(':checked')) {
            $('input.genre').attr("disabled", true);
            //$('input.gender').attr("disabled", true);
        }else{
            $('input.genre').attr("disabled", false);
            //$('input.gender').attr("disabled", false);
        }
        
        if ($('input.content').is(':checked')) {
            $('input.gender').attr("disabled", true);
            $('input.role').attr("disabled", true);
            $('input.genre').attr("disabled", false);
        }else{
            $('input.gender').attr("disabled", false);
            $('input.role').attr("disabled", false);
            $('input.genre').attr("disabled", true);
        }
    
    });
</script>
<script>
    $('.filter_job').on('click',function () {
            //alert();
                var url = '<?php echo site_url('jobs/filter'); ?>'; // the script where you handle the form input.
                
                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#filter_form").serialize(), // serializes the form's elements.
                       beforeSend: function() {
                            $("#preloader").show();
                            $(".pace").show();
                         },
                       success: function(data)
                       {
                          console.log(data); // show response from the php script.
                          $("#preloader").hide();
                          $(".pace").hide();
                          $('.job-search-list').html(data);
                       }
                     });
            
                e.preventDefault(); // avoid to execute the actual submit of the form.
        
    });
    $('.filter_job').on('keyup',function () {
            //alert();
                var url = '<?php echo site_url('jobs/filter'); ?>'; // the script where you handle the form input.
                
                $.ajax({
                       type: "POST",
                       url: url,
                       data: $("#filter_form").serialize(), // serializes the form's elements.
                       beforeSend: function() {
                            $("#preloader").show();
                            $(".pace").show();
                         },
                       success: function(data)
                       {
                          console.log(data); // show response from the php script.
                          $("#preloader").hide();
                          $(".pace").hide();
                          $('.job-search-list').html(data);
                       }
                     });
            
                e.preventDefault(); // avoid to execute the actual submit of the form.
        
    });
</script>
<script>
	$(document).ready(function(){
    $(".sidebar_filter_title").click(function(){
        $(".sidebar_filter").toggle();
    });
});
</script>
<script>
			$(document).ready(function() {   
            var sideslider = $('[data-toggle=collapse-side]');
            var sel = sideslider.attr('data-target');
            var sel2 = sideslider.attr('data-target-2');
            sideslider.click(function(event){
                $(sel).toggleClass('in');
                $(sel2).toggleClass('out');
            });
        });
		</script>

<script>
    $('.showproposal').click(function () {
        var prop = $(this).data('id');
        $("#prpopsal_p").html( prop );       
   });
    $(".showproposal").click(function(){
        var prop = $(this).data('id');
        $(".prpopsal_p").html( prop );        
    });
</script>
<script>
    
    //$('#comment_forms').on('submit',function (e) {
    //    e.preventDefault();
    //    var url = '<?php echo site_url('offer/send_comments'); ?>'; // the script where you handle the form input.
    //            
    //            $.ajax({
    //                   type: "POST",
    //                   url: url,
    //                   data: new FormData(this),//$("#comment_form").serialize(), // serializes the form's elements.                       
    //                   success: function(data)
    //                   {
    //                      console.log(data);                          
    //                      $('#message').val('');
    //                      $('.chat-window-box').html(data);                          
    //                   }
    //                 });
    //            
    //     });
    
    $(document).ready(function (e) {
        $("#comment_form").on('submit',(function(e) {
        e.preventDefault();
        $('#loading').show();
        var url = '<?php echo site_url('offer/send_comments'); ?>';
        $.ajax({
        url: url, // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false
        success: function(data)   // A function to be called if request succeeds
        {
            console.log(data.substring(0, 5));
            if((data.substring(0, 5)) === 'Error'){
                
                    //$('#send_comments_message').html(data);
                    alert(data);
                    $('#message').val('');
                    $('#attachment').val('');
                    $('#attachment_div').html('');
                    //$('.chat-window-box').html(data); 
                
            } else{
                $('#message').val('');
                $('#attachment').val('');
                $('#attachment_div').html('');
                $('.chat-window-box').html(data); 
            }
            $('#loading').hide();
        }
        });
        }));
    });
    
    
                
    setInterval(function(){
        var url = '<?php echo site_url('offer/show_comments'); ?>'; // the script where you handle the form input.
                
                $.ajax({
                       type: "POST",
                       url: url,
                       data: { offer_id : <?=$offer->id?>}, // serializes the form's elements.                       
                       success: function(data)
                       {
                          console.log(data);                                                    
                          $('.chat-window-box').html(data);                          
                       }
                     });
    }, 1000);
</script>
<script src="<?php echo base_url('front');?>/js/bootstrap-multiselect.min"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#boot-multiselect-demo').multiselect({
        includeSelectAllOption: true,
        buttonWidth: 250,
        enableFiltering: true
        });
    });
</script>
<!--display bar only if file is chosen--> 
<!--<script> 
$(document).ready(function() {  
    //show the progress bar only if a file field was clicked 
        var show_bar = 0; 
        $('input[type="file"]').click(function(){ 
            show_bar = 1; 
        }); 
    //show iframe on form submit 
        $("#add_product_form").submit(function(){
            console.log('parvez');
            if (show_bar === 1) {
                console.log('parvez1');
                $('#upload_frame').show(); 
                function set () {
                    console.log('parvez2');
                    $('#upload_frame').attr('src','<?php echo site_url();?>/upload_frame.php?up_id=<?php echo uniqid(); ?>'); 
                } 
                setTimeout(set); 
            } 
        }); 
    }); 
</script>-->
<!--<script type="text/javascript" src="http://talkerscode.com/webtricks/demo/js/jquery.js"></script>-->
<script type="text/javascript" src="http://talkerscode.com/webtricks/demo/js/jquery.form.js"></script>
<script>   
            
	function upload_image() 
	{
		var bar = $('#bar');
		var percent = $('#percent');
		
		$('#myForm1').ajaxForm({
			beforeSubmit: function() {
				document.getElementById("progress_div").style.display="block";
				var percentVal = '0%';
				bar.width(percentVal)
				percent.html(percentVal);
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				bar.width(percentVal)
				percent.html(percentVal);
			},
			success: function(data) {
				var percentVal = '100%';
				bar.width(percentVal)
				percent.html(percentVal);
                document.getElementById("upload_msg").innerHTML=data;
                var res = data.split("://");
                if(res[0] == 'http' || res[0] == 'https'){
                    window.location.href = data;
                }
                
			},
			complete: function(xhr) {
				if(xhr.responseText)
				{
                    document.getElementById("upload_msg").innerHTML=data;
					//location.reload();
                    document.getElementById("output_image").innerHTML=xhr.responseText;
				}
			}
		}); 
        
    }    
         var _CANVAS = document.querySelector("#video-canvas"),
                _CTX = _CANVAS.getContext("2d"),
                _VIDEO = document.querySelector("#main-video");
            
            document.querySelector("#upload_file").addEventListener('change', function() {
                
                document.querySelector("#main-video source").setAttribute('src', URL.createObjectURL(document.querySelector("#upload_file").files[0]));
                
                _VIDEO.load();
            
                _VIDEO.addEventListener('loadedmetadata', function() { console.log(_VIDEO.duration);
                  
                    _CANVAS.width = _VIDEO.videoWidth;
                    _CANVAS.height = _VIDEO.videoHeight;
                   
                });
            });
    
        document.querySelector("#get-thumbnail").addEventListener('click', function() {
                _CTX.drawImage(_VIDEO, 0, 0, _VIDEO.videoWidth, _VIDEO.videoHeight);
                console.log('parvez');
                console.log(_VIDEO.videoWidth);
                if(_VIDEO.videoWidth){
                    $('#thumb').val(_CANVAS.toDataURL());    
                }                                
            });
            console.log('khan');
    
    
            
</script> 

<script>
    function follow(artist_id){
        var url = '<?php echo site_url('search/follow'); ?>'; // the script where you handle the form input.
                
                $.ajax({
                       type: "POST",
                       url: url,
                       data: { artist_id : artist_id}, // serializes the form's elements.                       
                       success: function(data)
                       {
                          console.log(data);
                          if(data == 1){
                            $('#follow-box').html(
                                                '<div class="alert alert-success" id="alert">You follow this artist</div>'
                                                );
                            $('.artist_action a.follow').css('color','#13B5EA');
                          }else if(data == 0){
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You unfollow this artist</div>'  
                                                );
                            $('.artist_action a.follow').css('color','#c1c1c1');
                          }else{
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You must login first!</div>'  
                                                );
                          }
                          
                       }
                     });
                
    }
    
    setInterval(function(){
        $('#follow-box').html('');
    }, 3000);
</script>
<script>
    function cool(artist_id){
        var url = '<?php echo site_url('search/cool'); ?>'; // the script where you handle the form input.
                
                $.ajax({
                       type: "POST",
                       url: url,
                       data: { artist_id : artist_id}, // serializes the form's elements.                       
                       success: function(data)
                       {
                          console.log(data);
                          if(data == 1){
                            $('#follow-box').html(
                                                '<div class="alert alert-success" id="alert">You gave Cool to this artist</div>'
                                                );
                            $('.artist_action a.cool').css('color','#13B5EA');
                          }else if(data == 0){
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You retrieved Cool from this artist</div>'  
                                                );
                            $('.artist_action a.cool').css('color','#c1c1c1');
                          }else{
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You must login first!</div>'  
                                                );
                          }
                          
                       }
                     });
                
    }
    
    function cool_products(product_id){
        var url = '<?php echo site_url('search/cool_products'); ?>'; // the script where you handle the form input.
                
                $.ajax({
                       type: "POST",
                       url: url,
                       data: { product_id : product_id}, // serializes the form's elements.                       
                       success: function(data)
                       {
                          console.log(data);
                          if(data == 1){
                            $('#follow-box').html(
                                                '<div class="alert alert-success" id="alert">You gave Cool to this.</div>'
                                                );
                            $('.cool img').css('background-color','#c1c1c1');
                          }else if(data == 0){
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You retrieved Cool from this.</div>'  
                                                );
                            $('.cool img').css('background-color','#fff');
                          }else{
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You must login first!</div>'  
                                                );
                          }
                          
                       }
                     });
                
    }
    
    function likes(product_id){
        var url = '<?php echo site_url('search/likes'); ?>'; // the script where you handle the form input.
                
                $.ajax({
                       type: "POST",
                       url: url,
                       data: { product_id : product_id}, // serializes the form's elements.                       
                       success: function(data)
                       {
                          console.log(data);
                          if(data == 1){
                            $('#follow-box').html(
                                                '<div class="alert alert-success" id="alert">You liked this.</div>'
                                                );
                            $('.follow img').css('background-color','#c1c1c1');
                          }else if(data == 0){
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You unliked this.</div>'  
                                                );
                            $('.follow img').css('background-color','#fff');
                          }else{
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You must login first!</div>'  
                                                );
                          }
                          
                       }
                     });
                
    }
    
    function cool_album(product_id){
        var url = '<?php echo site_url('search/cool_album'); ?>'; // the script where you handle the form input.
                
                $.ajax({
                       type: "POST",
                       url: url,
                       data: { product_id : product_id}, // serializes the form's elements.                       
                       success: function(data)
                       {
                          console.log(data);
                          if(data == 1){
                            $('#follow-box').html(
                                                '<div class="alert alert-success" id="alert">You gave Cool to this.</div>'
                                                );
                            $('.cool img').css('background-color','#c1c1c1');
                          }else if(data == 0){
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You retrieved Cool from this.</div>'  
                                                );
                            $('.cool img').css('background-color','#fff');
                          }else{
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You must login first!</div>'  
                                                );
                          }
                          
                       }
                     });
                
    }
    
    function likes_album(product_id){
        var url = '<?php echo site_url('search/likes_album'); ?>'; // the script where you handle the form input.
                
                $.ajax({
                       type: "POST",
                       url: url,
                       data: { product_id : product_id}, // serializes the form's elements.                       
                       success: function(data)
                       {
                          console.log(data);
                          if(data == 1){
                            $('#follow-box').html(
                                                '<div class="alert alert-success" id="alert">You liked this.</div>'
                                                );
                            $('.follow img').css('background-color','#c1c1c1');
                          }else if(data == 0){
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You unliked this.</div>'  
                                                );
                            $('.follow img').css('background-color','#fff');
                          }else{
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You must login first!</div>'  
                                                );
                          }
                          
                       }
                     });
                
    }
    
    
    function product_rating(product_id,sno){
        for (var i=1;i<=5;i++){
            var cur=document.getElementById("star"+i)
            cur.className="fa fa-star"
        }
    
        for (var i=1;i<=sno;i++){
            var cur=document.getElementById("star"+i)
            if(cur.className=="fa fa-star")
            {
                cur.className="fa fa-star checked"
            }
        }
        
        var url = '<?php echo site_url('search/product_rating'); ?>'; // the script where you handle the form input.
                
                $.ajax({
                       type: "POST",
                       url: url,
                       data: { product_id : product_id, rating:sno}, // serializes the form's elements.                       
                       success: function(data)
                       {
                          console.log(data);
                          if(data == 1){
                            $('#follow-box').html(
                                                '<div class="alert alert-success" id="alert">You rated this.</div>'
                                                );
                            
                          }else if(data == 0){
                            $('#follow-box').html(
                                                '<div class="alert alert-success" id="alert">You rated this.</div>'  
                                                );
                            
                          }else{
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You must login first!</div>'  
                                                );
                          }
                          
                       }
                     });
                
    }
    
    function job_rating(job_id,sno){
        for (var i=1;i<=5;i++){
            var cur=document.getElementById("star"+i)
            cur.className="fa fa-star"
        }
    
        for (var i=1;i<=sno;i++){
            var cur=document.getElementById("star"+i)
            if(cur.className=="fa fa-star")
            {
                cur.className="fa fa-star checked"
            }
        }
        
        var url = '<?php echo site_url('search/job_rating'); ?>'; // the script where you handle the form input.
                
                $.ajax({
                       type: "POST",
                       url: url,
                       data: { job_id : job_id, rating:sno}, // serializes the form's elements.                       
                       success: function(data)
                       {
                          console.log(data);
                          if(data == 1){
                            $('#follow-box').html(
                                                '<div class="alert alert-success" id="alert">You rated this.</div>'
                                                );
                            
                          }else if(data == 0){
                            $('#follow-box').html(
                                                '<div class="alert alert-success" id="alert">You rated this.</div>'  
                                                );
                            
                          }else{
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You must login first!</div>'  
                                                );
                          }
                          
                       }
                     });
                
    }
    
    function likes_job(job_id){
        var url = '<?php echo site_url('search/likes_job'); ?>'; // the script where you handle the form input.
                
                $.ajax({
                       type: "POST",
                       url: url,
                       data: { job_id : job_id}, // serializes the form's elements.                       
                       success: function(data)
                       {
                          console.log(data);
                          if(data == 1){
                            $('#follow-box').html(
                                                '<div class="alert alert-success" id="alert">Added to your favourite job list.</div>'
                                                );                            
                            $('.likes_job i').css('color','#13B5EA');
                            $('#likes-box').html('Added to favourite');
                            $('#likes-box').css('color','#13B5EA');
                          }else if(data == 0){
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">Removed from your favourite job list.</div>'  
                                                );
                            $('.likes_job i').css('color','#c1c1c1');
                            $('#likes-box').html('<strong>Add to favourite</strong>');
                            $('#likes-box').css('color','#333');
                          }else{
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You must login first!</div>'  
                                                );
                          }
                          
                       }
                     });
                
    }
        
</script>

<script>
    function add_thumb(product_id){
        var url = '<?php echo site_url('search/likes_album'); ?>'; // the script where you handle the form input.
                
                $.ajax({
                       type: "POST",
                       url: url,
                       data: { product_id : product_id}, // serializes the form's elements.                       
                       success: function(data)
                       {
                          console.log(data);
                          if(data == 1){
                            $('#follow-box').html(
                                                '<div class="alert alert-success" id="alert">You liked this.</div>'
                                                );
                            $('.follow img').css('background-color','#c1c1c1');
                          }else if(data == 0){
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You unliked this.</div>'  
                                                );
                            $('.follow img').css('background-color','#fff');
                          }else{
                            $('#follow-box').html(
                                                '<div class="alert alert-danger" id="alert">You must login first!</div>'  
                                                );
                          }
                          
                       }
                     });
                
    }
</script>

<script>
    function func(amt,plan_id){        
        $(':input[type="submit"]').prop('disabled', false);
        $('#amount').val(amt);
        $('#plan').val(plan_id);
        $('#paypalAmt').val(amt);
        $('#paypalPlan').val(plan_id);
    }
</script>
<!--<style>

#myForm 
{ 
width:400px;
margin-top:50px;
margin: 20px; 
background: #A9BCF5; 
border-radius: 10px; 
padding: 15px 
}
.red p{
    color: red;
}
.progress {text-align:left;margin-top:20px;display:none; height:30px !important; position:relative; width:100%; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
.bar { background-color:#13b5ea; width:0%; height:30px; border-radius: 3px; }
.percent { position:absolute; display:inline-block; top:8px; left:48%; }
</style>-->

</body>
</html>
