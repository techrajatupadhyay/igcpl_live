<!-- Start of Footer section
   ============================================= -->
<footer id="ft-footer" class="ft-footer-section">
   <div class="container">
      <div class="ft-footer-widget-wrapper mt-3">
         <div class="row">
            <div class="col-lg-3 col-md-6">
               <div class="ft-footer-widget ul-li-block headline pera-content">
                  <div class="logo-widget">
                     <div class="site-logo">
                        <!-- <h3 class="widget-title">IGCPL Logo</h3> -->
                        <a href="#"><img src="assets/img/logo/logo_new.png" alt="" class="header_logo"></a>
                     </div>
                     <p><!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ut labore et dolore magna aliqua. --></p>
                     <!-- <div class="ft-btn">
                        <a class="d-flex justify-content-center align-items-center" href="#">Get In Touch</a> 
                        
                        </div> -->
                     <div class="footer_social_icon">
                        <a href="https://www.facebook.com/profile.php?id=100084913943938" class="text-white px-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#!" class="text-white px-2"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/in/indigem-channel-partners-82a92824a" class="text-white px-2"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#!" class="text-white px-2"><i class="fab fa-instagram"></i></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="ft-footer-widget ul-li-block headline pera-content">
                  <div class="menu-widget">
                     <h3 class="widget-title">Quick Links</h3>
                     <ul>
                        <li><a href="<?php echo base_url(); ?>Home">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>About">About us</a></li>
                        <li><a href="<?php echo base_url(); ?>Job_Portal">Careers</a></li>
                        <li><a href="<?php echo base_url(); ?>Contact">Contact</a></li>
                        <li><a href="<?php echo base_url(); ?>FAQ">FAQ'S</a></li>
                        <li><a href="<?php echo base_url(); ?>uploads/Terms_and_conditions/terms_and_conditions.pdf" target="_blank"> Terms and conditions / Refund Policy</a></li>
                         <li><a href="<?php echo base_url(); ?>uploads/Terms_and_conditions/disclaimer_and_privacy _policy.pdf" target="_blank">Privacy Policy / Disclaimer</a></li>
                     </ul>
                  </div> 
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="ft-footer-widget ul-li-block headline pera-content">
                  <div class="menu-widget">
                     <h3 class="widget-title"> Service</h3>
                     <ul>
                        <li><a href="<?php echo base_url(); ?>Service">Marketing & Coordination</a></li>
                        <li><a href="<?php echo base_url(); ?>Service">Logistics support and Physical Store</a></li>
                        <li><a href="<?php echo base_url(); ?>Service">Gem Hosting and Services</a></li>
                        <li><a href="<?php echo base_url(); ?>Service">Cashflow Management</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="ft-footer-widget ul-li-block headline pera-content">
                  <div class="menu-widget">
                     <h3 class="widget-title">Contact Us </h3>
                     <ul>
                        <li class="text-white"><i class="fa fa-location-arrow" aria-hidden="true"></i>  305-306,3rd Floor, Tower A, Spacedge, Sector 46, Sohna Road Gurgaon, Haryana, India, 122018</li>
                        <li class="text-white"><a href="mailto:indigeminfo@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i>  indigeminfo@gmail.com</a></li>
                        <li class="text-white"><a href="mailto:contact@indigemcp.com"><i class="fa fa-envelope" aria-hidden="true"></i>  contact@indigemcp.com</a></li>
                        <li class="text-white"><i class="fa fa-phone" aria-hidden="true"></i><a href="https://api.whatsapp.com/send?phone=+918780982388">  +91 8780982388</a> 
                        <li class="text-white"><i class="fa fa-phone" aria-hidden="true"></i><a href="https://api.whatsapp.com/send?phone=+918555022837"> +91 6265891349</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   
   <div class="ft-footer-copywrite-1 text-center">
      <span style="font-size:14px">Copyright @ 2022 <a href="https://techsumitsolutions.com/">Techsum it solutions pvt. ltd.</a></span>
   </div>
   </div>
</footer>
<!-- End of Footer section-->
<!-- For Js Library -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$(document).ready(function () 
   {
         <?php if($this->session->flashdata('status')){ ?>
            swal({
                  title: "<?= $this->session->flashdata('status') ?>",
                  text: "<?= $this->session->flashdata('status_test') ?>",
                  icon: "<?= $this->session->flashdata('status_icon') ?>",
                  button: "OK!",
               });          
         <?php } ?>  
         
    });
</script>

<script src="<?php base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php base_url();?>assets/js/popper.min.js"></script>
<script src="<?php base_url();?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php base_url();?>assets/js/appear.js"></script>
<script src="<?php base_url();?>assets/js/slick.js"></script>
<script src="<?php base_url();?>assets/js/jquery.counterup.min.js"></script>
<script src="<?php base_url();?>assets/js/waypoints.min.js"></script>
<script src="<?php base_url();?>assets/js/jquery.nice-select.min.js"></script>
<script src="<?php base_url();?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php base_url();?>assets/js/wow.min.js"></script>
<script src="<?php base_url();?>assets/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php base_url();?>assets/js/jquery.filterizr.js"></script>
<script src="<?php base_url();?>assets/js/rbtools.min.js"></script>
<script src="<?php base_url();?>assets/js/jquery.cssslider.min.js"></script>
<script src="<?php base_url();?>assets/js/rs6.min.js"></script>
<script src="<?php base_url();?>assets/js/knob.js"></script>
<script src="<?php base_url();?>assets/js/script.js"></script>
<!--<script src="<?php base_url();?>assets/js/gmaps.min.js"></script>-->