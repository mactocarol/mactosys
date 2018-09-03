	<footer class="col-md-12 footer">
<div class="row">
	<div class="container">
    	<div class="footer_top">
            <aside class="col-md-4 col-sm-6 contact_info"  data-aos="fade-up" data-aos-duration="3000">
                <a class="footer-logo" href="#"><img src="<?php echo base_url('front');?>/images/logo.png" alt=""></a>
                <p>Sed consequat sapien faus quam bibendum convallis quis in nulla. Pellentesque volutpat odio eget diam cursus semper. Sed coquat sapien .</p>
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
                    <div class="col-md-6 col-sm-6"><p >Copyrights © 2018 All Rights Reserved by <a href="#" class="careerfy-color">company name</a></p></div>
                    <div class="col-md-6 col-sm-6">
                        <div class="careerfy-social-network pull-right" >
                            <a href="#" class="careerfy-bgcolorhover fa fa-facebook"></a>
                            <a href="#" class="careerfy-bgcolorhover fa fa-twitter"></a>
                            <a href="#" class="careerfy-bgcolorhover fa fa-dribbble"></a>
                            <a href="#" class="careerfy-bgcolorhover fa fa-linkedin" ></a>
                            <a href="#" class="careerfy-bgcolorhover fa fa-instagram"></a>
                        </div>
                    </div>
                </div>
        
    </div>
</div>
</footer>

</body>

<script src="<?php echo base_url('front');?>/js/jquery.min.js"></script>
<script src="<?php echo base_url('front');?>/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('front');?>/js/bootstrap-select.min.js"></script>

<script src="<?php echo base_url('front');?>/js/aos.js"></script>
<script>
$(document).ready(function () {
	AOS.init({
		
				easing: 'ease-out-back',
				duration:1000
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
        $('.selectpicker').selectpicker({
  style: 'btn-info',
  size: 4
});
</script>
<script src="<?php echo base_url('front');?>/js/particles.js"></script>
<script>
	
$(document).ready(function() {
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 80,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.5,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 2,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 2,
      "direction": "none",
      "random": false,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "grab"
      },
      "onclick": {
        "enable": true,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 150,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});

//requestAnimationFrame();
});

</script>



</html>
