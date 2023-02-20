<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
      <style>
         h1,h2,h3,h4,h5,h6 {
         font-family: 'Poppins', sans-serif!important;
         }
         p ul li{
         font-family: 'Poppins', sans-serif!important;
         font-weight: 100!important!important;
         }
         .w3-animate-right {
         position: relative;
         animation: animateright 0.44s;
         }
         .w3-animate-left {
         position: relative;
         animation: animateright 0.44s;
         }
         .fa-arrow-right{
         margin-top: 170px;
         font-size: 35px;
         font-weight: 700;
         color: red;
         }
         .ft-about-feature-list-item {
         padding: 27px 20px 25px 20px;
         border-radius: 6px;
         margin-bottom: 6px;
         -webkit-box-shadow: 1.91px 10.833px 50px 0px rgb(68 68 68 / 15%);
         box-shadow: 1.91px 10.833px 50px 0px rgb(68 68 68 / 15%);
         }
         .back-btn{
         background-image: linear-gradient(to right, #ff000059 , #00054ca6);
         color:#000;
         text-align: left;
         border:1px solid red;
         padding: 5px 20px;
         font-weight: 400;
         font-size: 18px;
         border-radius:5px;
         }
         .back-btn img{
         height: 35px;
         }
          @media only screen and (max-width: 800px) {
            .fa-arrow-right{
               display: none;
            }
         }
      </style>
   </head>
   <body>
      <div id="preloader"></div>
      <div class="up">
         <a href="#" class="scrollup text-center"><i class="fas fa-chevron-up mt-3"></i></a>
      </div>
      <!-- Start of Breadcrumb section
         ============================================= -->
      <section id="ft-breadcrumb" class="ft-breadcrumb-section position-relative" data-background="assets/img/bg/bread-bg.jpg">
         <span class="background_overlay"></span>
         <span class="design-shape position-absolute"><img src="assets/img/shape/tmd-sh.png" alt=""></span>
         <div class="container">
            <div class="ft-breadcrumb-content headline text-center position-relative">
               <h2>Logistical Support and Physical Store</h2>
               <div class="ft-breadcrumb-list ul-li">
                  <ul>
                     <li><a href="#">Home</a></li>
                     <li>Services</li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
      <div class="row">
         <div class="col-md-12 my-1">
            <button onclick="history.back()" class="back-btn " style="width:100%"><img src="<?php echo base_url();?>assets/img/service/unnamed.png"> &nbsp;Go Back</button>
         </div>
      </div>
      <br>
      <br>
      <br>
      <div class="container">
         <div class="ft-service-details-text-wrapper mb-3">
            <div class="row">
               <div class="col-md-6">
                  <img src="<?php echo base_url();?>assets/img/service/G-Plus.jpg" class="w3-animate-left">
               </div>
               <div class="col-md-1 w3-center ">
                  <!-- <i class="fa fa-arrow-right" aria-hidden="true"></i> -->
                  <img src="<?php echo base_url();?>assets/img/service/119-1193585_left-right-red-arrow-icon-clip-art-at.png" class="fa-arrow-right">
               </div>
               <div class="col-md-5 ft-about-feature-list-item w3-center  w3-animate-right">
                  <h3 style="text-align: center;">Logistical Support and Physical Store</h3>
                  <p style="text-align:justify">Our G-Plus division shall ensure company logistical support to the buyer and the seller. In addition, the Plus division shall operate and maintain a G-Plus-Store from which it shall carry out the activities of retail and wholesale. The G-Plus division shall also be concerned with return to origin of those items which stand rejected/unsold after a particular time. </p>
               </div>
            </div>
         </div>
      </div>
      <!-- <div class="ft-service-details-counter-wrapper">
         <div class="row">
         	<div class="col-md-6">
         		<div class="ft-service-details-counter-item d-flex align-items-center headline pera-content">
         			<div class="ft-service-details-count-icon">
         				<i class="flaticon-worldwide"></i>
         			</div>
         			<div class="ft-service-details-count-text">
         				<h4 class="title text-uppercase">WE COVERED</h4>
         				<h4 class="count-number"><span class="counter">158</span>+</h4>
         				<p>International gateways</p>
         			</div>
         		</div>
         	</div>
         	<div class="col-md-6">
         		<div class="ft-service-details-counter-item d-flex align-items-center headline pera-content">
         			<div class="ft-service-details-count-icon">
         				<i class="flaticon-logistics"></i>
         			</div>
         			<div class="ft-service-details-count-text">
         				<h4 class="title text-uppercase">WE HANDLED</h4>
         				<h4 class="count-number"><span class="counter">2000</span>+</h4>
         				<p>Tons of air freight annually</p>
         			</div>
         		</div>
         	</div>
         </div>
         </div> -->
      <!-- <h3>How It Works</h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p> -->
      <!-- <div class="ft-video-content position-relative">
         <div class="ft-video-img-play-btn">
         	<div class="ft-video-img">
         		<img src="assets/img/bg/v-bg.jpg" alt="">
         	</div> -->
      <!-- <div class="ft-video-play">
         <a class="d-flex justify-content-center align-items-center position-relative video_box" href="../watch-4.html?v=C4jjFanHZo8">
         	<i class="fas fa-play"></i>
         	<span class="video_btn_border border_wrap-1"></span>
         	<span class="video_btn_border border_wrap-2"></span>
         </a>
         </div> -->
      </div>
      </div>    	
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </section>	
      <!-- End of Service details section
         ============================================= -->	
      <!-- Start of Footer   section
         ============================================= -->
      <!-- <footer id="ft-footer-2" class="ft-footer-section-2" data-background="assets/img/bg/f-bg.png">
         <div class="ft-footer-newslatter position-relative">
         	<div class="container">
         		<div class="ft-footer-newslatter-content d-flex justify-content-between align-items-center flex-wrap">
         			<div class="ft-footer-newslatter-text headline">
         				<h2>Sign up for  alerts,
         				news & insights from Equita.</h2>	
         			</div>
         			<div class="ft-footer-newslatter-form position-relative">
         				<form action="#">
         					<input type="text" placeholder="Email">
         					<button type="submit">Subscribe Now</button>
         				</form>
         			</div>
         		</div>
         	</div>
         </div>
         <div class="ft-footer-widget-wrapper-2">
         	<div class="container">
         		<div class="row">
         			<div class="col-lg-3 col-md-6">
         				<div class="ft-footer-widget ul-li-block headline pera-content">
         					<div class="logo-widget">
         						<div class="site-logo">
         							<h3>IGCPL Logo</h3> -->
      <!-- <a href="#"><img src="assets/img/logo/logo4.png" alt=""></a> -->
      <!-- </div>
         <div class="ft-footer-address">
         	<span>Address: Star Chambers,
         		 Harihar Chowk, Rajkot, Gujrat,360001</span>
         	<span>Website: igcpl.com</span>
         	<span>Email: indigeminfo@gmail.com</span>
         	<span>Phone: (000) 000-0000</span>
         </div>
         </div>
         </div>
         </div>
         <div class="col-lg-3 col-md-6">
         <div class="ft-footer-widget ul-li-block headline pera-content">
         <div class="menu-widget">
         <h3 class="widget-title">Our Services</h3>
         <ul>
         	<li><a href="service-single.php">Marketing and Coordination</a></li>
         	<li><a href="service-single.php">Logistics support and Physical Store</a></li>
         	<li><a href="service-single.php">Gem Hosting and Services</a></li>
         	<li><a href="service-single.php">Cashflow Management</a></li> -->
      <!-- <li><a href="service-single.php">Transport consolidation</a></li> -->
      <!-- </ul>
         </div>
         </div>
         </div>
         <div class="col-lg-3 col-md-6">
         <div class="ft-footer-widget ul-li-block headline pera-content">
         <div class="menu-widget">
         	<h3 class="widget-title">Industry Sectors</h3>
         	<ul> -->
      <!-- <li><a href="service-single.php">Electronics Industry</a></li>
         <li><a href="service-single.php">Industrial & Manufacturing</a></li>
         <li><a href="service-single.php">Semicon & Solar</a></li>
         <li><a href="service-single.php">Oil & Gas Cargo</a></li>
         <li><a href="service-single.php">Energy & Chemicals</a></li> -->
      <!-- </ul>
         </div>
         </div>
         </div>
         <div class="col-lg-3 col-md-6">
         <div class="ft-footer-widget ul-li-block headline pera-content">
         <div class="menu-widget">
         	<h3 class="widget-title">Quick Links</h3>
         	<ul>
         		<li><a href="service-single.php">How it Works</a></li>
         		<li><a href="service-single.php">Help Link</a></li>
         		<li><a href="service-single.php">Terms & Conditions</a></li>
         		<li><a href="service-single.php">Contact Us</a></li>
         		<li><a href="service-single.php">Privacy Policy</a></li>
         	</ul>
         </div>
         </div>
         </div>
         </div>
         </div>
         </div>
         <div class="ft-footer-copywrite-2 text-center">
         <span>Copyright @ 2021 Logistics.All Rights Reserved</span>
         </div>
         </footer>		 -->
      <!-- End of FAQ why choose  section
         ============================================= -->
   </body>
</html>