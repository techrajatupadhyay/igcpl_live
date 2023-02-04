<style>
	
	.ft-contact-page-form-wrapper input[type=checkbox]
	{
    width: 10%;
    height: 20px;
    border: none;
    /*padding-left: 20px;
    margin-bottom: 20px;*/
    border-radius: 5px;
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
            <h2>FAQ'S</h2>
            <div class="ft-breadcrumb-list ul-li">
                <ul>
                   <li><a href="<?php echo base_url(); ?>Home">Home</a></li>
                   <li>FAQ'S</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End of Breadcrumb section -->

	<!-- <div class="row back-btn">
		<div class="col-md-10 my-1 ">
            <p onclick="history.back()"  style="width:100%"><img src="<?php echo base_url();?>assets/img/service/unnamed.png"> &nbsp;Go Back</p>
        </div>
        <div class="col-md-2 my-1 ">
            <p onclick="history.back()"  style="width:100%">
            	<a href="<?= base_url(); ?>Signin/logout"><img src="<?php echo base_url();?>assets/img/logout.webp"> &nbsp;Logout</a></p>
         </div> 
	</div> -->
<section id="ft-contact-page" class="ft-contact-page-section page-padding">
    <div class="container">

        <div class="ft-contact-page-content ">
        	<div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="ft-contact-page-form-wrapper headline">
                        <h3 class="text-center">FAQ'S</h3>
                        <div class="my-1 text-dark">
	                        <h4>What services do you provide?</h4>
	                        <p>We provide following services :-</p>
	                        <ul>
	                        	<li> G-Laabh : Coordination at buyer (Government Organizations) doorstep</li>
	                            <li> G-Laabh : Sample clause coordination</li>
	                            <li> G-Laabh : Coordination for CRAC, Bill Processing, Invoice Discount</li>
	                            <li> G-Plus : Physical Sample Stores in 15 cities</li>
	                            <li> G-Plus : Logistics; pick-pack-delivery from seller to buyer</li>
	                            <li> G-Plus : Logistics Support to Sellers</li>
	                            <li> G-Café : GeM registration assistance, Sales of product</li>
	                            <li> G-Café : Product display, After sales services – CRAC, Invoice</li>
	                            <li> G-Cash : Bill Discounting, Bill factoring, fintech services</li>
	                            <li> G-Healthcare (in near future)</li>
	                        </ul>
                        </div>
                         <div class="my-1 text-dark">
	                        <h4>Do you provide services to Non-GeM Sellers?</h4>
	                        <p>Yes, we provide services to Non-GeM Sellers. These services will be available to Non-GeM Sellers after discussion for particular requirements with concerned Seller.</p>
	                    </div>
	                    <div class="my-1 text-dark">
	                        <h4>What are your Divisions/Departments?</h4>
	                        <p>We have total 5 Divisions/Departments. They are –</p>
	                        <ul>
	                        	<li>G-Laabh : Marketing and Coordination</li>
                                <li>G-Plus : Logistics Support and Physical Stores</li>
                                <li>G-Café : GeM Hosting and Services</li>
                                <li>G-Cash : Cash Flow Management</li>
                                <li>G-Healthcare</li>
	                        </ul>
	                    </div>
	                     <div class="my-1 text-dark">
	                        <h4>What are your charges?</h4>
	                        <p>Our charges for onboarding are Rs. 9999 per year. However, as an inaugural year offer, we are onboarding clients like you for Rs.4999 only.</p>
                            <p>This offer is valid till 31 st of December, 2023 only Apart from this, we charge a small commission on each order basis depending on the services availed.</p>
	                    </div>
	                    <div class="my-1 text-dark">
	                        <h4>Which services do you want to register for?</h4>							
	                        <?php if($service_count ==0) { ?>
							  
								<form action="<?= base_url(); ?>FAQ/actionfaq" method="post">
									<table class="table table-borderless">
										<tbody>
										<?php
											foreach($faq as $faq)
											{  ?>								       
												<tr>
													<td> <input class="form-check-input" name="serviceid[]" type="checkbox" value="<?php echo $faq->service_id; ?>"  style="margin-left: 0px;"/></td>
													<td><?php echo  $faq->service_name;  ?></</td>
												</tr>																
												<?php 
											  }  ?> 							        
										   
										</tbody>
									</table>
									<button class="ft-sb-button" type="submit" name="submit" id="submit">Submit </button>
								</form>
	                        <?php } else { ?>
											
							    <table class="table table-borderless">
									<tbody>
																		       
										<tr>
											<td></td>
											<td><b style="align:center;color:red;"><?php echo  "Your Services is Submitted ! ";  ?></b></td>
										</tr>																
												 							        
										   
									</tbody>
							    </table>
							
							<?php }  ?>
							
	                    </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</section>
<!-- SignIn Area End -->