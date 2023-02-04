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
         margin-top: 230px;
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
               <h2>Cash Flow Management</h2>
               <div class="ft-breadcrumb-list ul-li">
                  <ul>
                     <li><a href="#">Home</a></li>
                     <li>Service</li>
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
                  <img src="<?php echo base_url();?>assets/img/service/G-Cash.jpg" class="w3-animate-left">
               </div>
               <div class="col-md-1 w3-center ">
                  <!-- <i class="fa fa-arrow-right" aria-hidden="true"></i> -->
                  <img src="<?php echo base_url();?>assets/img/service/119-1193585_left-right-red-arrow-icon-clip-art-at.png" class="fa-arrow-right"> 
               </div>
               <div class="col-md-5 ft-about-feature-list-item   w3-animate-right">
                  <h3 style="text-align: center;">Cashflow Management</h3>
                  <p  style="text-align:justify";>G- Cashflow Division - The real value of ease of business for the seller lies in expanding its market, delivering the items desired by the buyer to the destination, and receiving its due payments. In the scheme of B2G procurements, due to requirements of Government policies, including the compulsions of the General financial rules of the Government, the supply per-se does-not result in payment due to procedural formalities and requirement of shared-responsibilities in the Government sector. As such IGCPL also proposes to take care of cash-flow management of the interested Sellers by providing Bill-discounting/factoring/ fintech services to Sellers on competitive rates. IGCPL aims to become a factoring service aggregator in India and aims to provide most feasible discounting options to sellers across India. While doing so, IGCPL shall strive to take care of cash-flow of sellers having low turnover/ start-ups, etc., for whom it is ordinarily not easy to get factoring/Bill-discounting at economical rates.  </p>
               </div>
            </div>
         </div>
      </div>
   </section>  
   </body>
</html>