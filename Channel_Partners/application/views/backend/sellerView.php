<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
-->
<style>
   
   h1,h2,h3,h4,h5,h6,p,li,a tr th td span{
   font-family: 'Poppins', sans-serif;
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
</style>
<div class="pcoded-content">
   
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-header">
               <div class="row align-items-end">
                    <div class="col-lg-8">
                     <div class="page-header-title">
                        <div class="d-inline">
                           <h4>Seller</h4>
                        </div>
                     </div>
                    </div>
                    <div class="col-lg-4">
                     <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                           <li class="breadcrumb-item">
                              <a href="index.html"> <i class="feather icon-home"></i> </a>
                           </li>
                           <li class="breadcrumb-item"><a href="#!">All Seller</a></li>
						   <li class="breadcrumb-item"><a href="#!">Seller Details</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>  
						
		<section class="content card p-3" >
		   <div class="row my-3">
				<div class="col-sm-9 col-md-9 col-lg-9">
					<h3 class="box-title">Seller Approvel Details</h3>
				</div>
				<div class="col-sm-3 col-md-3 col-lg-3 text-right">
					<a onclick="history.back()">
						<button style="font-size:18px;" type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-o-left"></i> Back </button>
					</a>
				</div>
		   </div>
		   <div class="box-body">
		   <?php  
			  if (isset($sellerView)) 
			  { 
				foreach ($sellerView as $sellerView) 
				{ 
			  ?>
		   <div class="row">
			  <div class="col-md-6">
				 <h6 class="box-title">Personal Details</h6>
				 <table class="table table-bordered">
					<tbody>
					   <tr>
						  <td>Profile Image</td>
						  <td><img src="<?php echo base_url(); ?><?php echo $sellerView->em_image ?>" alt="user" class="profile mr-5"></td>
					   </tr>
					   <tr>
						  <td>User ID</td>
						  <td><?php echo $sellerView->user_id; ?></td>
					   </tr>
					   <tr>
						  <td> Name</td>
						  <td class="text-uppercase"><?php echo ucwords(strtolower($sellerView->first_name)); ?></td>
					   </tr>
					   <tr>
							<td>Gender</td>
							<td>
							  <?php
								if($sellerView->em_gender=="M")
								{
								   echo "Male";
								}
								else if($sellerView->em_gender=="F")
								{
								   echo "Female";
								}
								else if($sellerView->em_gender=="O")
								{
								   echo "Other";
								}
							  ?>
							</td>
					   </tr>
					   <tr>
						  <td>Email</td>
						  <td><?php echo $sellerView->em_email; ?></td>
					   </tr>
					   <tr>
						  <td>Mobile Number</td>
						  <td><?php echo $sellerView->contact_no; ?></td>
					   </tr>
					   <tr>
						  <td>Alternate contact</td>
						  <td><?php echo $sellerView->alter_mobileno; ?></td>
					   </tr>
					   <tr>
						  <td>Date of Birth</td>
						  <td><?php 
							 $timestamp = strtotime($sellerView->em_birthday);
							 print date("d-m-Y", $timestamp, );
							 ?>
						  </td>
					   </tr>
					   
					   <tr>
						  <td>Aadhar Number</td>
						  <td><?php echo $sellerView->aadhar_number; ?></td>
					   </tr>
					   <tr>
						  <td>Permanent Account Number (PAN)</td>
						  <td><?php echo $sellerView->pan_number; ?></td>
					   </tr>
						<tr>
						  <td>Current Address</td>
						 <td><?php echo $sellerView->present_full_address; ?><br> <?php echo $sellerView->present_city; ?><br> <?php echo $sellerView->present_pincode; ?>   </td>
					   </tr>
					   <tr>
						  <td>Permanent Address</td>
						  <td><?php echo $sellerView->present_full_address; ?><br> <?php echo $sellerView->permanent_city; ?>,<br> <?php echo $sellerView->permanent_pincode; ?>   </td>
					   </tr>
					</tbody>
				 </table>
			 
			  </div>
			  
			  <div class="col-md-6">
				 <h6 class="box-title">Document</h6>
				 <table class="table table-bordered">
					<tbody>
					   <tr>
						  <td>Marksheet</td>
						  <td><img src="<?php echo base_url(); ?><?php echo $sellerView->marksheet ?>" alt="marksheet" class="profile mr-5"></td>
					   </tr>
					   <tr>
						  <td>Experience Letter</td>
						  <td><img src="<?php echo base_url(); ?><?php echo $sellerView->experience_letter ?>" alt="experience letter" class="profile mr-5"></td>
					   </tr>
					   <tr>
						  <td>Signature</td>
						  <td><img src="<?php echo base_url(); ?><?php echo $sellerView->signature ?>" alt="signature" class="profile mr-5"></td>
					   </tr>
					   <tr>
						  <td>Resume</td>
						  <td><img src="<?php echo base_url(); ?><?php echo $sellerView->upload_resume ?>" alt="resume" class="profile mr-5"></td>
					   </tr>
					</tbody>
				 </table>
			 
			  </div>


			  <div class="col-md-6">
				 <h6 class="box-title">Bank Details</h6>
				 <table class="table table-bordered">
					<tbody>
						<tr>
						  <td>Bank Name</td> 
						  <td><?php echo $sellerView->bank_name; ?></td>
					   </tr>
					   <tr>
						  <td>Account Number</td> 
						  <td><?php echo $sellerView->bank_acc_no; ?></td>
					   </tr>
						<tr>
						  <td>IFSC  Code</td> 
						  <td><?php echo $sellerView->ifsc_code; ?></td>
					   </tr>
					  
								 
					   <tr>
						  <td>Date</td>
						  <td>
						<?php 
								$timestamp = strtotime($sellerView->created_on);
								echo date("d-m-y ", $timestamp, );
							?>
						  </td>
					   </tr>
					   <tr>
						  <td>User Status</td>
						  <td>
						<?php 
						  if ($sellerView->user_status==0) 
						  {
							 echo 'Pending';
						  }
						  if ($sellerView->user_status==1) 
						  {
							 echo 'Approved';
						  }
						  if ($sellerView->user_status==2) 
						  {
							 echo 'Cancel';
						  }                    
					   ?>
						  </td>
					   </tr>
					 
					</tbody>
				 </table>              
			</div>
				<div class="col-md-12">
					<h6 class="box-title">Payment Details</h6>
					<table class=" table table-bordered mb-5">
						  <thead>
							 <tr>
								<th>Bank Name</th>
								<th>Account Number</th>
								<th>IFSC  Code</th>
								<th>Date</th>
								<th>Status</th>
								<!-- <th>Time Duration</th>
								<th>Amount</th>
								<th>GSTIN</th>
								<th>Total Amount</th>
								<th>Payment Status</th> -->
							 </tr>
						  </thead>
						  <tbody>
							 <tr>
								<td><?php echo $sellerView->bank_name; ?></td>
								<td><?php echo $sellerView->bank_acc_no; ?></td>
								<td><?php echo $sellerView->ifsc_code; ?></td>
							   
								<td><?php $timestamp = strtotime($sellerView->created_on); echo date("d-m-y ", $timestamp,);?>
								</td>
							   <!--  <td><i class="fa fa-inr" aria-hidden="true"></i> <?php echo  $seller->reg_duration; ?></td>
								<td>12%</td>
								<td><i class="fa fa-inr" aria-hidden="true"></i> <?php echo  $seller->reg_duration; ?></td> -->
								
									<td> <?php 
									  if ($sellerView->user_status==0) 
									  {
										 echo 'Pending';
									  }
									  if ($sellerView->user_status==1) 
									  {
										 echo 'Approved';
									  }
									  if ($sellerView->user_status==2) 
									  {
										 echo 'Cancel';
									  }                    
								   ?>
								</td>
								</td>
							 </tr>
						  </tbody>
					</table> 
				 </div>
			</div>

			  <div class="col-md-12">
				 <table class="table table-bordered">
					<tbody>
					   <tr>
						  <td>Action</td>
						  <td style="float:right; border:none;">
							<?php if($sellerView->user_status==0){ ?>
								<a  href="<?php echo base_url();?>Admin/sellerview_approvel/<?php echo $sellerView->user_id; ?>"  class="btn btn-success">
									<i class="fa fa-check"></i> Approve 
								</a>
								<a  href="<?php echo base_url();?>Admin/reject_user/<?php echo $sellerView->user_id; ?>"  class="btn btn-danger">
									<i class="fa fa-ban"></i> Reject 
								</a>
							<?php } else if($sellerView->user_status==1) { ?>
								<a class="btn btn-success">
									<i class="fa fa-check"></i> Approved 
								</a>
							<?php } else if($sellerView->user_status==2) { ?>
								<a  href="<?php echo base_url();?>SellerRegister/seller_approvel/<?php echo $sellerView->user_id; ?>"  class="btn btn-success">
									<i class="fa fa-check"></i> Approve 
								</a>
								<a class="btn btn-success">
									<i class="fa fa-ban"></i> Rejected 
								</a>	
							<?php }  ?>
						  </td>
					   </tr> 
					</tbody>
				 </table>
			  </div>
			  <?php } }?>
		   </div>
		</section>


<!--
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
-->