
<head>
<style type="text/css">
#class{


}

</style>
</head>

<!-- Bootstrap Min CSS -->
    
    <!-- Color CSS -->
    <link rel="stylesheet" href="assets/css/color1.css" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style1.css" />

   <!-- Start of Breadcrumb section
   ============================================= -->
   <section id="ft-breadcrumb" class="ft-breadcrumb-section position-relative" data-background="assets/img/bg/bread-bg.jpg">
      <span class="background_overlay"></span>
      <span class="design-shape position-absolute"><img src="assets/img/shape/tmd-sh.png" alt=""></span>
      <div class="container">
         <div class="ft-breadcrumb-content headline text-center position-relative">
            <h2>Sign-Up</h2>
            <div class="ft-breadcrumb-list ul-li">
               <ul>
                  <li><a href="<?php echo base_url(); ?>Home">Home</a></li>
                  <li>Sign-up</li>
               </ul>
            </div>
         </div>
      </div>
   </section>  
<!-- End of Breadcrumb section
   ============================================= -->


  

<!-- Start of contact page section
   ============================================= -->
   <section id="ft-contact-page" class="ft-contact-page-section page-padding">
      <div class="container">
         <div class="ft-contact-page-content ">
          <div class="col-md-12">
                  <div class="ft-contact-page-form-wrapper headline">
                     <h3 class="text-center">Create Your Account</h3>
                     <form   action="<?php echo base_url(); ?>Registration/actionregister" id="loginform" name="Login_Form" class="form-signin" method="POST">
                        <div class="row">
                           
                           <div class="col-lg-6">
                              <input type="text" name="firstname" required  placeholder="Enter You First Name" required>
                           </div>
                           <div class="col-lg-6">
                              <input type="text" name="lastname" required placeholder="Enter Your Last Name">
                           </div>
                            <div class="col-lg-6">
                              <input type="number" id="umobile" name="mobile_no" required  placeholder="Enter You Mobile Number " required>
                           </div>
                           <div class="col-lg-6">
                              <input type="email" name="email" required placeholder="Enter Your Email" required>
                           </div>
                          
                           
                           <!-- <div class="col-lg-6">
                              <input type="text" name="username" placeholder="Username">
                           </div> -->
                           <div class="col-lg-6">
                              <input type="password" name="password" required placeholder="Password">
                           </div>
                           <div class="col-lg-6">
                              <input type="text" name="address" required placeholder="Address">
                           </div>
                           <!-- <div class="col-lg-6">
                              <input type="date" name="created_at" placeholder="Date">
                           </div> -->
                           <!-- <div class="col-lg-6">
                              <input type="file" class="custom-file-input" name="image" required placeholder="Upload Your Passport Photo">
                           </div> -->
                        </div>
                        <div class="row">
                           <div class="col-lg-6 text-center">
                              <button name="submit" type="submit"> Submit</button>
                           </div>
                           <p style="color: #01054c; font-size:18px; font-weight:500">
                              <a href="<?php echo base_url();?>Signin"><span>Existing User ? Log in</span></a><br>

                           <a  href="<?php echo base_url();?>Forgot_password"><span>Forgot Password</span></a>
                        </p>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>     
<!-- End of contact page section
   ============================================= -->  

   
