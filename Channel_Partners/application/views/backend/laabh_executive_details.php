<?php

    if($this->session->userdata('user_login_access') != 1)
    {
       return redirect('Login'); 
    }
     
     
    $user_id = $this->session->userdata('user_login_id');	
    $user_type = $this->session->userdata('user_type');
    	
        
?>

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
							   <h4>Laabh Executive</h4>
							</div>
						 </div>
						</div>
						<div class="col-lg-4">
						 <div class="page-header-breadcrumb">
							<ul class="breadcrumb-title">
							   <li class="breadcrumb-item">
								  <a href="index.html"> <i class="feather icon-home"></i> </a>
							   </li>
							   <li class="breadcrumb-item"><a href="#!">All Laabh Executive </a></li>
							   <li class="breadcrumb-item"><a href="#!">Laabh Executive  Details</a></li>
							</ul>
						 </div>
					  </div>
					</div>
				</div>
			<?php } else if($user_type==6) { ?>		
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
						 <div class="page-header-title">
							<div class="d-inline">
							   <h4>Laabh Executive</h4>
							</div>
						 </div>
						</div>
						<div class="col-lg-4">
						 <div class="page-header-breadcrumb">
							<ul class="breadcrumb-title">
							   <li class="breadcrumb-item">
								  <a href="index.html"> <i class="feather icon-home"></i> </a>
							   </li>
							   <li class="breadcrumb-item"><a href="#!">All Laabh Executive</a></li>
							   <li class="breadcrumb-item"><a href="#!">Laabh Executive Details</a></li>
							</ul>
						 </div>
					  </div>
					</div>
				</div>								
	        <?php } ?>
		
			<section class="content card p-3" >
				<div class="row my-3">
					<div class="col-sm-9 col-md-9 col-lg-9">
						<h3 class="box-title">Laabh Executive Approvel Details :</h3>
					</div>
					<div class="col-sm-3 col-md-3 col-lg-3 text-right">
						<a onclick="history.back()">
							<button style="font-size:18px;" type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-o-left"></i> Back </button>
						</a>
					</div>
				</div>
				<div class="box-body">
					<?php  
					if (isset($user_id)) 
					{ 
					foreach ($Laabh_Executive_Single as $row) 
					{ 
					?>
					<div class="row">
						<div class="col-md-5">
							<h6 class="box-title">Personal Details :</h6>
							<table class="table table-bordered">
								<tbody>
								   <tr>
									  <td>Profile Image</td>
									  <td>
									  <img src="<?php echo base_url(); ?><?php echo $row->em_image ?>" height="100" width="100" alt="user" class="profile mr-2">
									  <img src="<?php echo base_url(); ?><?php echo $row->signature ?>" height="100" width="100" alt="user" class="profile mr-2">
									  </td>
								   </tr>
								   <tr>
									  <td>Executive ID</td>
									  <td><?php echo $row->user_id; ?></td>
								   </tr>								   
								   <tr>
									  <td>Executive Name</td>
									  <td class="text-uppercase"><?php echo ucwords(strtolower($row->first_name)); ?></td>
								   </tr>
								   <tr>
									  <td>Designation</td>
									  <td>									  										  
										<?php									
											$des_name='';
                                            $value='';											
											$seller_payment_details = $this->db->query("SELECT * FROM designation WHERE (value='".$row->des_id."' || id='".$row->des_id."') ");
											$pay_details= $seller_payment_details->result();
											//print_r($this->db->last_query());
											foreach($pay_details as $pay_det)
											{			
											    $des_name = $pay_det->des_name;							
												$value = $pay_det->value;																							
											}
											echo $des_name." (".$value.")";
										?>
									  </td>
								   </tr>
								   <tr>
									  <td>Email</td>
									  <td><?php echo $row->em_email; ?></td>
								   </tr>
								   <tr>
									  <td>Mobile Number</td>
									  <td><?php echo $row->contact_no; ?></td>
								   </tr>
                                   <tr>
								      <td>Date of Birth</td>
								      <td><?php echo $row->em_birthday; ?></td>									     									 							  
							       </tr>							   
								</tbody>
							</table>		 
						</div>
												  
						<div class="col-md-7">
							<h6 class="box-title">Personal Details</h6>
							<table class="table table-bordered">
								<tbody>
								<tr>
									<td>Gender</td>
									<td>
									   <?php								
										echo $row->em_gender;							
									  ?>
									</td>
							   </tr>
							   <tr>
								  <td>Joining date</td>
								  <td><?php echo $row->joining_date; ?></td>
							   </tr>
							   <tr>
								  <td>Alternate contact</td>
								  <td><?php echo $row->alter_mobileno; ?></td>
							   </tr>
							   
							   <tr>
								  <td>Region</td>
								  <td>
								    <?php 
									   echo "Region - ".$row->region;									 
									?>
									<?php
									    /*
											$region_name='';
                                            										
											$seller_payment_details = $this->db->query("SELECT * FROM region WHERE region_id='".$row->region."' ");
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
								  <td>Aadhar Number</td>
								  <td><?php echo $row->aadhar_number; ?></td>
							   </tr>
							   <tr>
								  <td> PAN Number</td>
								  <td><?php echo $row->pan_number; ?></td>
							   </tr>
							   <tr>
								  <td>Current City</td>
								 <td><?php echo $row->present_city; ?> </td>
							   </tr>
								<tr>
								  <td>Current Address</td>
								
							     <td><?php echo wordwrap($row->present_full_address,49,"<br>\n") ; ?> <?php echo $row->present_city; ?>, <?php echo $row->present_pincode; ?>   </td>
							   </tr>
							   <tr>
								  <td>Permanent Address</td>
								  <td><?php echo wordwrap($row->permanent_full_address,49,"<br>\n") ; ?> <?php echo $row->permanent_city; ?>, <?php echo $row->permanent_pincode; ?>   </td>
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
												<td>Resume :</td>
												<td>
												<?php 																		
													if($row->upload_resume !="")
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
												<td>Qualification Document :</td>
												<td>
													<?php 																		
													if($row->marksheet !="")
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
												<td>3</td>
												<td>Experience Letter :</td>
												<td>
													<?php 																																									   
													if($row->experience_letter !="")
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
					</div><br>
					
					<div class="row">
						<div class="col-md-12">
							<h6 class="box-title">Bank Details :</h6>
							<table class=" table table-bordered mb-5">
								  <thead>
									 <tr>
										<th>Bank Name</th>
										<th>Account Number</th>
										<th>IFSC  Code</th>
										<th>PF Number</th>								
										<th>Manager Approvel</th>
										
									 </tr>
								  </thead>
								  <tbody>
									<tr>
										<td><?php echo $row->bank_name; ?></td>
										<td><?php echo $row->bank_acc_no; ?></td>
										<td><?php echo $row->ifsc_code; ?></td>							   
										<td><?php echo $row->pf_number;?></td>																															
										<td>
											<?php 
												if($row->user_status==0)
												{
													echo "<i class='fa fa-exclamation-circle Pending' aria-hidden='true'></i>";
												}
												if($row->user_status==1)
												{
													echo "<i class='fa fa-check-circle-o approved ' aria-hidden='true' ></i>";
												}
												if($row->user_status==2)
												{
													echo "<i class='fa fa-times Rejected ' aria-hidden='true' ></i>";
												}
											?>
										</td>								
									</tr>
								  </tbody>
							</table> 
						 </div>
					</div><br>
				
					
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tbody>
								<?php if($user_type==1) { ?>
									<tr>
										<td>Action</td>
										<td style="float:right; border:none;">
										<?php if($row->user_status==0){ ?>
											<a  href="<?php echo base_url();?>Laabh_executive/Laabh_Executive_approvel/<?php echo $row->user_id; ?>/<?php echo $row->id; ?>/<?php echo $row->region; ?>"  class="btn btn-success">
												<i class="fa fa-check"></i> Approve 
											</a>										
											<a class="btn btn-danger">
												<i class="fa fa-ban"></i> Reject 
											</a>										
										<?php } else if($row->user_status==1) { ?>
											<a class="btn btn-success">
												<i class="fa fa-check"></i> Approved 
											</a>
										<?php } else if($row->user_status==2) { ?>																						
											<a class="btn btn-danger">
												<i class="fa fa-ban"></i> Rejected 
											</a>									
										<?php }  ?>
										</td>
									</tr>								   
								<?php } else if($user_type==6 ) { ?>
                                    <tr>
										<td>Action</td>
										<td style="float:right; border:none;">
										<?php if($row->user_status==0){ ?>
											<a class="btn btn-info">
												<i class="fa fa-info-circle" aria-hidden="true"></i> Pending 
											</a>                                           											
										<?php } else if($row->user_status==1) { ?>
											<a class="btn btn-success">
												<i class="fa fa-check"></i> Approved 
											</a>
										<?php } else if($row->user_status==2) { ?>
											<a class="btn btn-danger">
												<i class="fa fa-check"></i> Rejected 
											</a>											
										<?php }  ?>
										</td>
									</tr>
                                <?php } else if($user_type==11 ) { ?>
                                    <tr>
										<td>Action</td>
										<td style="float:right; border:none;">
										<?php if($row->user_status==0){ ?>
											<a class="btn btn-info">
												<i class="fa fa-info-circle" aria-hidden="true"></i> Pending 
											</a>                                           											
										<?php } else if($row->user_status==1) { ?>
											<a class="btn btn-success">
												<i class="fa fa-check"></i> Approved 
											</a>
										<?php } else if($row->user_status==2) { ?>
											<a class="btn btn-danger">
												<i class="fa fa-check"></i> Rejected 
											</a>											
										<?php }  ?>
										</td>
									</tr>									
								<?php }  ?>
									
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
<!--
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
-->