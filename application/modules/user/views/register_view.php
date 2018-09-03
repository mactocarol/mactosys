<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<link href="<?php echo base_url('front');?>/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url('front');?>/css/bootstrap.min.css" rel="stylesheet">
<!--<link href="<?php echo base_url('front');?>/css/bannerscollection_zoominout.css" rel="stylesheet" type="text/css">-->
<link href="<?php echo base_url('front');?>/css/tab.css" rel="stylesheet">
<link href="<?php echo base_url('front');?>/css/gallery.css" rel="stylesheet">
<!--<link href="<?php echo base_url('front');?>/css/bootstrap-datetimepicker.css" rel="stylesheet">-->
<link href="https://uxsolutions.github.io/bootstrap-datepicker/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">

<link href="<?php echo base_url('front');?>/css/bootstrap-multiselect.min.css" rel="stylesheet">

<link href="<?php echo base_url('front');?>/css/style.css" rel="stylesheet">
<style>
html{ background:url('<?php echo base_url('front');?>/images/login_bg.jpg') no-repeat center center fixed #0c6295; background-size:cover;}
body{ background:none;  width:100%; position:relative;}
.login_panel{ float:right; position:relative;
width: 35%;
right: 50px;
top: 15px;}
.login_panel .input-text-login {

    width: 100%;
    height: 33px;
    border: 1px solid #eee;
    font-size: 13px;
    padding: 10px;

}
.form-group {
    margin-bottom: 10px;
}
.select_panle select{ height:33px;}
.select_panle i{ top:10px;}
.login_panel .submit_btn {

    background: #14b5eb;
    border: none;
    color: #fff;
    font-size: 16px;
    text-transform: uppercase;
    padding: 11px 30px;
    border-radius: 3px;

}
.login_panel h1 {

    margin: 0 0 20px;
    font-size: 34px;
    color: #fff;
    text-transform: uppercase;
    font-weight: 500;

}
.login_panel a {

    display: inline-block;
    color: #ffff;
    text-transform: capitalize;
    font-weight: 600;
    text-decoration: underline;
    margin: 15px 20px 0 0;

}
.radio_box {
    display: inline-block;
    color: #fff;
}
@media screen and (max-width: 990px) {
	.login_panel{ right:0; width:40%; padding-bottom:20px;}


}
@media screen and (max-width: 768px) {
	.login_panel{ width:100%; padding-bottom:20px;}
	.login_panel_inner {

    background: #fff;
    padding: 20px;
    width: 80%;
    margin: 0 auto;

}
.login_panel h1{ color:#888; font-size:26px;}

#add_form .col-md-6 {

    padding: 0;

}
.login_panel a,.radio_box{ color:#777}
}
@media screen and (max-width: 500px) {
	.login_panel_inner { width:90%;}
}

</style>
</head>

<body>
            <div class="container">
            <div class="login_panel">
                   
                    <div class="login_panel_inner">
                        <?php
                        // display error & success messages
                        if(isset($message)) {					
                            if($success){
                            ?>
                              <div class="alert alert-dismissible alert-success">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> <?php print_r($message); ?>
                              </div>						
                            <?php
                            }else{
                            ?>
                                <div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Error!</strong> <?php print_r($message); ?>
                                </div>						
                            <?php
                            }
                        }
                        ?>
                        <h1>Sign Up <a href="<?php echo site_url(); ?>" class="pull-right"><i class="fa fa-home"></i></a></h1>
                        <form method="post" id="add_form" action="<?php echo site_url('user/register'); ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="f_name" placeholder="First Name" class="input-text-login form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="l_name" placeholder="Last Name" class="input-text-login form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" placeholder="Username" pattern="[A-Za-z0-9]"  class="input-text-login form-control">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="contact" placeholder="Contact Number" class="input-text-login">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email Id" class="input-text-login">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="Password" class="input-text-login">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="repassword" placeholder="Confirm Password" class="input-text-login">
                                </div>
                                <div class="form-group">
                                    <select  id="boot-multiselect-demo" name="category[]" required multiple="multiple" placeholder="Select Category">
                                        <!--<option value="" selected="selected">Select category</option>-->
                                        <?php foreach($categories as $c):?>
                                        <option value="<?=$c['id']?>"><?=$c['name']?></option>
                                        <?php endforeach;?>
                                    </select>                                    
                                </div>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="input-text-login" name="dob" placeholder="Select Date Of Birth" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="radio_box"><input type="radio" name="gender" value="male" > <span>Male</span> </div>
                                    <div class="radio_box"><input type="radio" name="gender" value="female" > <span>Female</span> </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Sign Up" class="submit_btn">
                                </div>
                        </form>
                        <div class="col-md-12">
                            <div class="row">
                                <a href="<?php echo site_url('user'); ?>">Sign in</a> <a href="<?php echo site_url('terms-and-conditions');?>">terms & condition</a>
                            </div>
                        </div>
                        
                    </div>
            </div>
</body>
<script src="<?php echo base_url('front');?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('front');?>/js/moment.js"></script>
<script src="<?php echo base_url('front');?>/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="https://uxsolutions.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datepicker();
                
            });
        </script>
<script>
    $(document).ready(function() {
	//alert('http://localhost/caroldata.com/hmvc_hotel_booking/registration/register_email_exists');
    $('#add_form').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
					notEmpty: {
						message : 'The Username Field is required'
					},
					 remote: {  
					 type: 'POST',
					 url: "<?php echo site_url();?>user/check_username_exists",
					 data: function(validator) {
						 return {
							 //email: $('#email').val()
							 email: validator.getFieldElements('username').val()
							 };
						},
					 message: 'This Username is already in use.'     
					 },
                     callback: {
                        message: 'please enter only letters and numbers',
                        callback: function(value, validator, $field) {
                            if (!isUsernameValid(value)) {
                              return {
                                valid: false,
                              };
                            }
                            else
                            {
                              return {
                                valid: true,
                              };    
                            }

                        }
                    },
                    stringLength: {
						min: 3 ,
						max: 15,
						message: 'The Username length min 3 and max 15 character Long'
					}
				},
			},
            f_name: {
                validators: {
                    notEmpty: {
                        message: 'The First Name is required'
                    },
                }
            },
			contact: {
                validators: {
                    notEmpty: {
                        message: 'The Contact is required'
                    },
                }
            },
            category: {
                validators: {
                    notEmpty: {
                        message: 'The Category is required'
                    },
                }
            },
            //dob: {
            //    validators: {
            //        notEmpty: {
            //            message: 'The Date Of Birth is required and cannot be empty'
            //        },
            //    }
            //},
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The Gender is required'
                    },
                }
            },
			email: {
                validators: {
					notEmpty: {
						message : 'The email Field is required'
					},
					 remote: {  
					 type: 'POST',
					 url: "<?php echo site_url();?>user/check_email_exists",
					 data: function(validator) {
						 return {
							 //email: $('#email').val()
							 email: validator.getFieldElements('email').val()
							 };
						},
					 message: 'This email is already in use.'     
					 }
				},
			},    
			
			password: {
				validators: {
                    notEmpty: {
						message : 'The password Field is required'
					},
					identical: {
                        field: 'repassword',
                        message: 'The password and its confirm are not the same'
                    },
					stringLength: {
						min: 6 ,
						max: 15,
						message: 'The password length min 6 and max 15 character Long'
					}
				}
			},
			repassword: {
				validators: {
                    notEmpty: {
						message : 'The password Field is required'
					},
					identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
					
				}
			},
        }
    });

});
    
function isUsernameValid(value)
{
  var fieldNum = /^[a-z0-9]+$/i;

  if ((value.match(fieldNum))) {
      return true
  }
  else
  {
      return false
  }

}
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


</html>
