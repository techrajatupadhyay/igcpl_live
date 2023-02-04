	<!DOCTYPE html>
	<html lang="en">

	<body>
		<div id="preloader"></div>
		<div class="up">
			<a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
		</div>



<!-- Start of Breadcrumb section
	============================================= -->
	<section id="ft-breadcrumb" class="ft-breadcrumb-section position-relative" data-background="assets/img/bg/bread-bg.jpg">
		<span class="background_overlay"></span>
		<span class="design-shape position-absolute"><img src="assets/img/shape/tmd-sh.png" alt=""></span>
		<div class="container">
			<div class="ft-breadcrumb-content headline text-center position-relative">
				<h2>Contact</h2>
				<div class="ft-breadcrumb-list ul-li">
					<ul>
						<li><a href="<?php echo base_url(); ?>Home">Home</a></li>
						<li>Contact</li>
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
			<div class="ft-contact-page-content">
				<div class="row">
					<div class="col-lg-6">
						<div class="ft-contact-page-text-wrapper">
							<div class="ft-section-title-2 headline pera-content">
								<!-- <span class="sub-title">Get a Quote</span> -->
								<h2 class="text-center">Get in Touch 
								</h2>
							</div>
							<div class="ft-contact-page-contact-info">
								<div class="ft-contact-cta-items d-flex">
									<div class="ft-contact-cta-icon d-flex align-items-center justify-content-center">
										<i class="fal fa-map-marker-alt"></i>
									</div>
									<div class="ft-contact-cta-text headline pera-content">
										<h3>Registered address</h3>
										<p> Indigem Channel Partners Private Limited,305-306,3rd Floor, Tower A, Spacedge , Sector 46, Sohna Road, Gurgaon, Haryana, India 122018 </p>
									</div>

								</div>

								<div class="ft-contact-cta-items d-flex">
									<div class="ft-contact-cta-icon d-flex align-items-center justify-content-center">
										<i class="fal fa-map-marker-alt"></i>
									</div>
									<div class="ft-contact-cta-text headline pera-content">
										<h3>Corporate address</h3>
										<p>The Corporate Office of IGCPL is located at 637, Star Chambers,
										 Harihar Chowk, Rajkot, Gujrat,360001</p>
									</div>
									
								</div>

								<div class="ft-contact-cta-items d-flex">
									<div class="ft-contact-cta-icon d-flex align-items-center justify-content-center">
										<i class="fas fa-phone-alt"></i>
									</div>
									<div class="ft-contact-cta-text headline pera-content">
										<h3>Telephone number</h3>
										<p>(+91) 87809-82388</p>
										<p>(+91) 85550-22837</p>

									</div>
								</div>
								<div class="ft-contact-cta-items d-flex">
									<div class="ft-contact-cta-icon d-flex align-items-center justify-content-center">
										<i class="far fa-envelope"></i>
									</div>
									<div class="ft-contact-cta-text headline pera-content">
										<h3>Mail address</h3>
										<p><a href="mailto:indigeminfo@gmail.com">indigeminfo@gmail.com</a></p>
										<p><a href="mailto:contact@indigemcp.com">contact@indigemcp.com</a></p>
										<p><a href="mailto:md@indigemcp.com.com">md@indigemcp.com</a></p>
										
										
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Start of Contact section
         ============================================= -->
      <!-- <section id="ft-contact" class="ft-contact-section position-relative" data-background="assets/img/bg/c-bg.jpg">
         <div class="container">
            <div class="ft-contact-content">
               <div class="ft-section-title headline pera-content">
                  <span class="sub-title">Any Query ?</span>
                  <h2>Request a Call back
                  </h2> -->
                  <!-- <p>The company is also looking at obtaining contracts for managing GeM-website activities of buyers and sellers. </p> -->
              <!--  </div>
               <div class="ft-contact-form-wrapper">
                  <form action="<?= base_url(); ?>Contact/actioncontact" method="post">
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" name="name" placeholder="Your Name Here">
                        </div>
                        <div class="col-md-6">
                           <input type="email" name="email" placeholder="Your Email">
                        </div>
                        <div class="col-md-6">
                           <input type="number" name="phone" placeholder="Your Phone">
                        </div>
                        <div class="col-md-6">
                           <input type="text" name="business" placeholder="Your Business / Product">
                        </div>
                        <div class="col-md-12">
                           <textarea name="message" placeholder="Your Message"></textarea>
                        </div>
                        <div class="col-md-12">
                           <button class="ft-sb-button" type="submit" name="submit">Submit Now</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section> -->
      <!-- End of Contact section
         ============================================= -->
					<div class="col-lg-6">
						<div class="ft-section-title headline pera-content">
                  <span class="sub-title">Any Query ?</span>
                  <h2>Request a Call back
                  </h2><!--  -->
                  <!-- <p>The company is also looking at obtaining contracts for managing GeM-website activities of buyers and sellers. </p> -->
               </div>
               <div class="ft-contact-form-wrapper">
                  <form action="<?= base_url(); ?>Contact/actioncontact" method="post">
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" name="name" placeholder="Your Name Here" required>
                        </div>
                        <div class="col-md-6">
                           <input type="email" name="email" placeholder="Your Email" required>
                        </div>
                        <div class="col-md-6">
                           <input type="number" id="umobile" name="phone" placeholder="Your Phone" required>
                        </div>
                        <div class="col-md-6">
                           <input type="text" name="business" placeholder="Your Business / Product"required>
                        </div>
                        <div class="col-md-12">
                           <textarea name="message" placeholder="Your Message" required></textarea>
                        </div>
                        <div class="col-md-12">
                           <button class="ft-sb-button" type="submit" name="submit" id="submit">Submit Now</button>
                        </div>
                     </div>
                  </form>
               </div>
				</div>
			</div>
		</div>
	</section>		
<!-- End of contact page section-->





	

	
</body>
</html>			