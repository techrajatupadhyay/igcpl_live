<?php

    if($this->session->userdata('user_login_access') != 1)
    {
       return redirect('Login'); 
    }
     
     
    $user_id = $this->session->userdata('user_login_id');	
    $user_type = $this->session->userdata('user_type');
    	       
?>

<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
<style>
   /*@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');*/
   
   h1,h2,h3,h4,h5,h6,p,li,a tr th td span
   {
   //font-family: 'Poppins', sans-serif;
   color:#67757c;
   }
   
   .product_image{
   width: 80px;
   height: 80px;
   }
   .profile 
   {
   height:100px;
   margin: 10px;
   border: 1px solid;
   padding: 5px;
   box-shadow: 2px 2px 2px 2px #ccccccad;
   }
   
   .approved {
	color: green!important;
    text-align: center!important;
    font-size: 35px!important;
    margin-left: 20px!important;
   }
   .Pending{
   color: #ffc107!important;
   /*border: 2px solid #ffc107!important;
   border-radius:50px;*/
    text-align: center!important;
    font-size: 35px!important;
    margin-left: 20px!important;
   }
   .Rejected{
    color:red!important;
    border:2px solid red;
    border-radius:50px;
    text-align: center!important;
    font-size: 35px!important;
    margin-left: 20px!important;
   }
   
</style>

<div class="pcoded-content">  
    <div class="main-body">
        <div class="page-wrapper">
		    <?php if($user_type==2) { ?>
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
						 <div class="page-header-title">
							<div class="d-inline">
							   <h4>Sellers</h4>
							</div>
						 </div>
						</div>
						<div class="col-lg-4">
						 <div class="page-header-breadcrumb">
							<ul class="breadcrumb-title">
							   <li class="breadcrumb-item">
								  <a href="index.html"> <i class="feather icon-home"></i> </a>
							   </li>
							   <li class="breadcrumb-item"><a href="#!">All Sellers</a></li>
							   <li class="breadcrumb-item"><a href="#!">Seller Details</a></li>
							</ul>
						 </div>
					  </div>
					</div>
				</div>
			<?php } else if($user_type==5 || $user_type==6) { ?>		
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
						 <div class="page-header-title">
							<div class="d-inline">
							   <h4>Sellers</h4>
							</div>
						 </div>
						</div>
						<div class="col-lg-4">
						 <div class="page-header-breadcrumb">
							<ul class="breadcrumb-title">
							   <li class="breadcrumb-item">
								  <a href="index.html"> <i class="feather icon-home"></i> </a>
							   </li>
							   <li class="breadcrumb-item"><a href="#!">All Sellers</a></li>
							   <li class="breadcrumb-item"><a href="#!">Seller Details</a></li>
							</ul>
						 </div>
					  </div>
					</div>
				</div>								
	        <?php } ?>
		
			<section class="content card p-3" >
				<div class="row my-3">
					<div class="col-sm-9 col-md-9 col-lg-9">
						<h3 class="box-title">Seller Details :</h3>
					</div>
					<div class="col-sm-3 col-md-3 col-lg-3 text-right">
						<a onclick="history.back()">
							<button style="font-size:18px;" type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-o-left"></i> Back </button>
						</a>
					</div>
				</div>
				<div class="box-body">
					<?php  
					if (isset($seller)) 
					{ 
					foreach ($seller as $seller) 
					{ 
					?>
					<div class="row">
						<div class="col-md-5">
							<h6 class="box-title">Personal Details :</h6>
							<table class="table table-bordered">
								<tbody>
								   <tr>
									  <td>Seller Profile Image</td>
									  <td><img src="<?php echo base_url(); ?><?php echo $seller->seller_image ?>" alt="user" height="100" width="100" class="profile mr-2"></td>
								   </tr>
								   <tr>
									  <td>Laabh Agent ID</td>
									  <td><?php echo $seller->labh_agent_id; ?></td>
								   </tr>
								   <tr>
									  <td>Seller ID</td>
									  <td><?php echo $seller->seller_id; ?></td>
								   </tr>
								   <tr>
									  <td>Seller Name</td>
									  <td class="text-uppercase"><?php echo ucwords(strtolower($seller->fname)); ?></td>
								   </tr>
								   <tr>
										<td>Gender</td>
										<td>
										  <?php
											
											echo $seller->gender;
											
										  ?>
										</td>
								   </tr>
								   <tr>
									  <td>Mobile Number</td>
									  <td><?php echo $seller->contact; ?></td>
								   </tr>
								   <tr>
									  <td>Email</td>
									  <td><?php echo $seller->email; ?></td>
								   </tr>
														   
								   <tr>
									  <td>Date of Birth</td>
									  <td><?php 
										 $timestamp = strtotime($seller->dob);
										 print date("d-m-Y", $timestamp, );
										 ?>
									  </td>
								   </tr>
								   
								   <tr>
									  <td>Aadhar Number</td>
									  <td><?php echo $seller->aadhar; ?></td>
								   </tr>
								   <tr>
									  <td>Onbording Date</td>
									  <td><?php echo $seller->paid_on; ?></td>
								   </tr>
								 
								</tbody>
							</table>						 
						</div>
						<div class="col-md-7">
						    <h6 class="box-title">Company Details :</h6>
							<table class="table table-bordered">
								<tbody>
								   <tr>
									<td>Region</td>
									<td>
										<?php 											
											echo "Region - ".$seller->region_id;									 
										?>
										<?php
										/*										
											$region_name='';																							
											$seller_payment_details = $this->db->query("SELECT * FROM region WHERE region_id='".$seller->region_id."' ");
											$pay_details= $seller_payment_details->result();
											//print_r($this->db->last_query());
											foreach($pay_details as $pay_det)
											{			
												$region_name = $pay_det->region_name;																																									
											}
											echo $region_name ;
										*/	
										?>											
									</td>
							       </tr>
								   <tr>
									  <td>Company Name</td> 
									  <td><?php echo $seller->companyname; ?></td>
								   </tr>
								   <tr>
									  <td>Proprietor Name</td> 
									  <td><?php echo $seller->proprietor_name; ?></td>
								   </tr>					   
								   <tr>
									  <td>Registered/Permanent Address</td>
									  <td><?php echo wordwrap($seller->permanent_address,50,"<br>\n") ; ?> <?php echo $seller->city_second; ?>, <?php echo $seller->pincode_second; ?>   </td>
									  
								   </tr>
								   <tr>
									  <td>Current Address</td>
									 <td><?php echo wordwrap($seller->current_address,50,"<br>\n") ; ?> <?php echo $seller->city_first; ?>, <?php echo $seller->pincode_first; ?>   </td>
									</tr>
									<tr>
									  <td>GSTIN</td>
									  <td><?php echo  $seller->gstin; ?></td>
									</tr>
									<tr>
									  <td>Permanent Account Number (PAN)</td>
									  <td><?php echo $seller->panNo; ?></td>
									</tr>						   
									<tr>
									  <td>Tax Collection Account Number (TAN)</td>
									  <td><?php echo  $seller->tanNo; ?></td>
									</tr>						   
									<tr>
									  <td>Registration Duration</td>
									  <td><?php echo  $seller->reg_duration; ?> Years</td>
									</tr>
									<tr>
										<td>Maneger Approvel Status</td>
										<td>
										    <?php 
											if($seller->manager_approvel==0)
											{
												echo "<i class='fa fa-exclamation-circle Pending' aria-hidden='true'></i>";
											}
											if($seller->manager_approvel==1)
											{
												echo "<i class='fa fa-check-circle-o approved ' aria-hidden='true' ></i>";
											}
											if($seller->manager_approvel==2)
											{
												echo "<i class='fa fa-times Rejected ' aria-hidden='true' ></i>";
											}
										    ?>
										</td>
									</tr>
									<tr>
										<td>Executive Approvel Status</td>
										<td>
										    <?php 
											if($seller->executive_approvel==0)
											{
											    echo "<i class='fa fa-exclamation-circle Pending' aria-hidden='true'></i>";
											}
											if($seller->executive_approvel==1)
											{
												echo "<i class='fa fa-check-circle-o approved ' aria-hidden='true' ></i>";
											}
											if($seller->executive_approvel==2)
											{
												echo "<i class='fa fa-times Rejected ' aria-hidden='true' ></i>";
											}
										    ?>
										</td>
									</tr>
                                    									
								</tbody>
							</table>					   
						</div>			 	
					</div>
					<div class="row">	
						<div class="col-md-12">
							<h6 class="box-title">Document Details :</h6>
							<table style="min-widtd: 100%;"  class="table table-bordered border-primary mb-0" >
								<tbody>
									<tr>
										<td>1</td>
										<td>Permanent Account Number (PAN) :</td>
										<td>
											<?php
											$pandoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$seller->seller_id."' AND doc_type_id='1' limit 1 ");
											$pandoc = $pandoc->num_rows();
											if($pandoc > 0)
											{
												echo "YES";
											}
											else
											{
												echo "NA";
											}																					
											?>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Tax Deduction Account Number (TAN) :</td>
										<td>
										<?php 																		
											$tandoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$seller->seller_id."' AND doc_type_id='2' limit 1 ");
											$tandoc = $tandoc->num_rows();
											if($tandoc > 0)
											{
												echo "YES";
											}
											else
							                {
												echo "NA";
											}																																										
									    ?>
										</td>
									</tr>
									<tr>
										<td>3</td>
										<td>GSTIN :</td>
										<td>
										    <?php 																		
											$gstindoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$seller->seller_id."' AND doc_type_id='3' limit 1 ");
											$gstindoc = $gstindoc->num_rows();
											if($gstindoc > 0)
											{
												echo "YES";
											}
										    else
											{
												echo "NA";
											}																																					 ?>
										</td>
									</tr>
									<tr>
										<td>4</td>
										<td>GeM Registration Document :</td>
										<td>
										    <?php 																																									   
											$gemdoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$seller->seller_id."' AND doc_type_id='4' limit 1 ");
											$gemdoc = $gemdoc->num_rows();
											if($gemdoc > 0)
											{
												echo "YES";
											}
											else
											{
												echo "NA";
											}																																										
											?>
										</td>
									</tr>
									<tr>
										<td>5</td>
										<td>Pyment Proof Document :</td>
										<td>
											<?php 																																									   
											$paymentdoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$seller->seller_id."' AND doc_type_id='5' limit 1 ");
											$paymentdoc = $paymentdoc->num_rows();
										    if($paymentdoc > 0)
											{
												echo "YES";
											}
											else
								            {
												echo "NA";
											}																																										
											?>
										</td>
									</tr>
									<tr>
										<td>6</td>
										<td>MOU Document :</td>
										<td>
											<?php 																																									   
										    $moudoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$seller->seller_id."' AND doc_type_id='6' limit 1 ");
											$moudoc = $moudoc->num_rows();
											if($moudoc > 0)
											{
												echo "YES";
											}
											else
											{
												echo "NA";
									        }																																										
										    ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div></br>
					    
					<div class="row">	
						<div class="col-md-12">
							<h6 class="box-title">Payment Details :</h6>
							<?php									
							$pg_name = '';							
							$paymode = '';
																																							
							$seller_payment_details = $this->db->query("SELECT * FROM payment_details_safe WHERE user_id='".$seller->seller_id."' AND order_no='".$seller->order_id."' AND status=2 ");
							$pay_details= $seller_payment_details->result();
							//print_r($this->db->last_query());
							foreach($pay_details as $pay_det)
							{				
								$pg_name = $pay_det->pg_name;							
								$paymode = $pay_det->paymode;																							
							}
							?>
							<table class=" table table-bordered">
								<thead>
									<tr>										
										<th>Transaction ID</th>
										<th>Transaction Date</th>
										<th>Bank Name</th>
										<th>Mode of Payment</th>
										<th>Transaction Amount</th>
										<th>Payment Status</th>																				
									</tr>
								</thead>
								<tbody>
									<tr>										
										<td><?php echo $seller->order_id; ?></td>
										<td><?php echo $seller->paid_on; ?></td>
										<td><?php echo $pg_name; ?></td>
										<td><?php echo $paymode; ?></td>
										<td><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $seller->amount; ?></td>
										<td><?php echo $seller->pay_status; ?></td>																																					
									</tr>
								</tbody>
							</table> 
						</div>
					</div><br><br>
					
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tbody>
							    <?php if($user_type==1) 
								{   ?>
									<tr>
										<td>Action</td>
										<td style="float:right; border:none;">
											<?php if($seller->seller_status==0)
											{ 
												if($seller->ispaid==1) 
												{   ?>
													<a href="<?php echo base_url();?>SellerRegister/seller_approvel/<?php echo $seller->seller_id; ?>" class="btn btn-success">
														<i class="fa fa-check"></i> Approve 
													</a>								
													<a class="btn btn-danger">
														<i class="fa fa-ban"></i> Reject 
													</a>
													<?php
												}
												else 
												{
													?>
													<a class="btn btn-danger">
														<i class="fa fa-ban"></i> Payment is Pending 
													</a>																					
													<?php
												}										
											} 
											else if($seller->seller_status==1)
											{   ?>
												<a class="btn btn-success">
													<i class="fa fa-check"></i> Approved 
												</a>
												<?php 
											} 
											else if($seller->seller_status==2) 
											{   ?>
												<a class="btn btn-danger">
													<i class="fa fa-ban"></i> Rejected 
												</a>										
												<?php 
											}  ?>
									    </td>
								    </tr>
								    <?php 
							    } 
								else if($user_type == 2) 
								{   ?>
									<tr>
										<td>Action</td>
										<td style="float:right; border:none;">
											<?php if($seller->executive_approvel==0)
											{  
												if($seller->ispaid==1) 
												{   ?>
													<a href="<?php echo base_url();?>SellerRegister/seller_approvel/<?php echo $seller->seller_id; ?>" class="btn btn-success">
														<i class="fa fa-check"></i> Approve 
													</a>								
													<a class="btn btn-danger">
														<i class="fa fa-ban"></i> Reject 
													</a>
													<?php
												}
												else 
												{
													?>
													<a class="btn btn-danger">
														<i class="fa fa-ban"></i> Payment is Pending 
													</a>								
													
													<?php
												}																																		
											} 
											else if($seller->executive_approvel==1) 
											{   ?>
												<a class="btn btn-success">
													<i class="fa fa-check"></i> Approved 
												</a>
											    <?php 
										    } 
											else if($seller->seller_status==2) 
											{   ?>
												<a class="btn btn-danger">
													<i class="fa fa-ban"></i> Rejected 
												</a>											
											    <?php 
										    }   ?>
										</td>
									</tr>                               
								    <?php 
							    } 
								else if($user_type==6 ) 
								{   ?>
                                    <tr>
										<td>Action</td>
										<td style="float:right; border:none;">										
										<?php if($seller->executive_approvel ==0 ) { ?>
											<a class="btn btn-info">
												<i class="fa fa-info-circle" aria-hidden="true"></i> Approvel Pending by Executive!
											</a>
										<?php } else if($seller->executive_approvel ==1 && $seller->manager_approvel==0) { ?>										
											<a  href="<?php echo base_url();?>SellerRegister/seller_approvel/<?php echo $seller->seller_id; ?>"  class="btn btn-success">
												<i class="fa fa-check"></i> Approve 
											</a>
											<a class="btn btn-danger">
												<i class="fa fa-ban"></i> Reject 
											</a>										                                          											
										<?php } else if($seller->manager_approvel==1) { ?>
											<a class="btn btn-success">
												<i class="fa fa-check"></i> Approved 
											</a>
										<?php } else if($seller->manager_approvel==2) { ?>
											<a class="btn btn-danger">
												<i class="fa fa-ban"></i> Rejected 
											</a>											
										<?php }  ?>
										</td>
									</tr>
								    <?php 
							    } 
								else if($user_type == 11) 
								{   ?>
									<tr>
										<td>Action</td>
										<td style="float:right; border:none;">
										<?php
											if($seller->ispaid==1)
											{ 
												if($seller->seller_status==0)
												{   ?>
													<a class="btn btn-info">
														<i class="fa fa-info-circle" aria-hidden="true"></i>Pending
													</a>								
													<a class="btn btn-danger">
														<i class="fa fa-ban"></i> Reject 
													</a>										
												    <?php 
											    } 
												else if($seller->seller_status==1) 
												{   ?>
													<a class="btn btn-success">
														<i class="fa fa-check"></i> Approved 
													</a>
												    <?php 
											    } 
												else if($seller->seller_status==2) 
												{   ?>
													<a class="btn btn-danger">
														<i class="fa fa-ban"></i> Rejected 
													</a>										
												    <?php 
												}
											}  
										?>
										</td>
									</tr>	
								    <?php 
							    }   ?>
								</tbody>
							</table>
						</div>
					</div>	
					<?php } }?>
			    </div>
			</section>
		</div>
	</div>
<br><br>
