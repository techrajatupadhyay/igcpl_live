<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<link rel="stylesheet" href="assets/css/color1.css" />
<!-- Style CSS -->
<link rel="stylesheet" href="assets/css/style1.css" />
<!-- Start of Breadcrumb section  -->
<section id="ft-breadcrumb" class="ft-breadcrumb-section position-relative" data-background="assets/img/bg/bread-bg.jpg">
    <span class="background_overlay"></span>
    <span class="design-shape position-absolute">
        <img src="assets/img/shape/tmd-sh.png" alt="">
    </span>
    <div class="container">
        <div class="ft-breadcrumb-content headline text-center position-relative">
            <h2>Sign-in</h2>
            <div class="ft-breadcrumb-list ul-li">
                <ul>
                   <li><a href="<?php echo base_url(); ?>Home">Home</a></li>
                   <li>Sign-in</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End of Breadcrumb section -->
<section id="ft-contact-page" class="ft-contact-page-section page-padding">
    <div class="container">
        <div class="ft-contact-page-content ">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="ft-contact-page-form-wrapper headline">
                        <h3 class="text-center">Sign in</h3>
                        <form class="form-horizontal form-material" method="post" id="loginform" action="Signin/Login_Auth">
                            <a href="javascript:void(0)" class="text-center db"><br/></a>
                            <div class="form-group m-t-40">
                                <div class="col-xs-12">
                                    <input class="form-control" name="email" value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>" type="text" required placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" name="password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>" type="password" required placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group text-center m-t-20">
                                <div class="col-xs-12">
                                    <button class="btn btn-info btn-lg btn-login btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
                            <p class="" style="color:#00044b"><a href="<?php echo base_url();?>Forgot_password">Forgot Password</a> 
                                <a style="margin-left: 230px" href="<?php echo base_url();?>Registration"><span>New User ? Sign up</span></a></p>
							
                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</section>
<!-- SignIn Area End -->