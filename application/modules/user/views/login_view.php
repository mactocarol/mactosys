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
<link href="<?php echo base_url('front');?>/css/style.css" rel="stylesheet">
<style>
html{ background:url('<?php echo base_url('front');?>/images/login_bg.jpg') no-repeat center center fixed #0c6295; background-size:cover;}
body{ background:none; height:100%; width:100%; position:relative;}
.login_panel{position: fixed;
width: 35%;
right: 50px;
bottom: 50px;}
.login_panel .input-text-login {

    width: 100%;
    height: 40px;
    border: 1px solid #eee;
    font-size: 13px;
    padding: 10px;

}
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
                    <h1>Login <a href="<?php echo site_url(); ?>" class="pull-right"><i class="fa fa-home"></i></a></h1>
                        <form method="post" action="<?php echo site_url('user/login_check'); ?>">
                            <div class="form-group"><input type="text" name="email" placeholder="Username or Email" class="input-text-login"></div>
                            <div class="form-group"><input type="password" name="password" placeholder="Password" class="input-text-login"> </div>
                            <input type="hidden" name="return_url" value="<?=$return_url?>">
                            <input type="submit" value="Login" class="submit_btn">
                        </form>
                        <div class="col-md-12"><div class="row">
                            <a href="<?php echo site_url('user/register'); ?>">Sign up</a> <a href="<?php echo site_url('terms-and-conditions');?>">terms & condition</a>
                        </div></div>
                        
                    </div></div>
</body>

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<!-- bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

</html>
