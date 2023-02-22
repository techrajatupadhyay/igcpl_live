<?php

    if($this->session->userdata('user_login_access') != 1)
    {
       return redirect('Login'); 
    }
     
     
    $user_id = $this->session->userdata('user_login_id');	
    $user_type = $this->session->userdata('user_type');
    	       
?>
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
            <div class="page-header">
               <div class="row align-items-end">
                    <div class="col-lg-8">
                     <div class="page-header-title">
                        <div class="d-inline">
                           <h4>Laabh Abhikarta/Agent</h4>
                        </div>
                     </div>
                    </div>
                    <div class="col-lg-4">
                     <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                           <li class="breadcrumb-item">
                              <a href="index.html"> <i class="feather icon-home"></i> </a>
                           </li>
                           <li class="breadcrumb-item"><a href="#!">All Laabh Agent</a></li>
						   <li class="breadcrumb-item"><a href="#!">Laabh Agent Details</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>  
						
		<section class="content card p-3" >
		   <div class="row my-3">
				<div class="col-sm-9 col-md-9 col-lg-9">
					<h3 class="box-title">Laabh Agent Approvel Details</h3>
				</div>
				<div class="col-sm-3 col-md-3 col-lg-3 text-right">
					<a onclick="history.back()">
						<button style="font-size:18px;" type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-o-left"></i> Back </button>
					</a>
				</div>
		   </div>
		   <div class="box-body">
		   <?php  
			if (isset($laabhagent_details)) 
			{ 
				foreach ($laabhagent_details as $laabhagent_details) 
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
							  <img src="<?php echo base_url(); ?><?php echo $laabhagent_details->em_image ?>" height="100" width="100" alt="user" class="profile mr-2">
							  <img src="<?php echo base_url(); ?><?php echo $laabhagent_details->signature ?>" height="100" width="100" alt="user" class="profile mr-2">
							  </td>
						   </tr>
						   <tr>
							  <td>Executive ID</td>
							  <td><?php echo $laabhagent_details->laabh_executive; ?></td>
						   </tr>
						   <tr>
							  <td>Agent ID</td>
							  <td><?php echo $laabhagent_details->user_id; ?></td>
						   </tr>
						   <tr>
							  <td>Agent Name</td>
							  <td class="text-uppercase"><?php echo ucwords(strtolower($laabhagent_details->first_name)); ?></td>
						   </tr>
						   <tr>
							    <td>Designation</td>
								<td>									  										  
									<?php									
										$des_name='';
                                        $value='';											
										$seller_payment_details = $this->db->query("SELECT * FROM designation WHERE (value='".$laabhagent_details->des_id."' || id='".$laabhagent_details->des_id."') ");
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
							  <td><?php echo $laabhagent_details->em_email; ?></td>
						   </tr>
                           <tr>
							  <td>Mobile Number</td>
							  <td><?php echo $laabhagent_details->contact_no; ?></td>
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
								echo $laabhagent_details->em_gender;							
							  ?>
							</td>
					   </tr>
					   <tr>
						  <td>Joining date</td>
						  <td><?php echo $laabhagent_details->joining_date; ?></td>
					   </tr>
					   <tr>
						  <td>Alternate contact</td>
						  <td><?php echo $laabhagent_details->alter_mobileno; ?></td>
					   </tr>
					   <tr>
						  <td>Date of Birth</td>
						  <td><?php 
							 $timestamp = strtotime($laabhagent_details->em_birthday);
							 print date("d-m-Y", $timestamp, );
							 ?>
						  </td>
					   </tr>
					   <tr>
						    <td>Region</td>
								  <td>
								    <?php 
									   echo  "Region - ".$laabhagent_details->region;									 
									?>
									<?php
									    /*
											$region_name='';
                                            										
											$seller_payment_details = $this->db->query("SELECT * FROM region WHERE region_id='".$laabhagent_details->region."' ");
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
						  <td><?php echo $laabhagent_details->aadhar_number; ?></td>
					   </tr>
					   <tr>
						  <td>Permanent Account Number (PAN)</td>
						  <td><?php echo $laabhagent_details->pan_number; ?></td>
					   </tr>
					   <tr>
						  <td>Current City</td>
						  <td><?php echo $laabhagent_details->present_city; ?> </td>
					   </tr>
					   <tr>
						  <td>Current Address</td>						 
					      <td><?php echo wordwrap($laabhagent_details->present_full_address,50,"<br>\n") ; ?> <?php echo $laabhagent_details->present_city; ?>, <?php echo $laabhagent_details->present_pincode; ?>   </td>
					   </tr>
					   <tr>
						  <td>Permanent Address</td>						  
					      <td><?php echo wordwrap($laabhagent_details->permanent_full_address,50,"<br>\n") ; ?> <?php echo $laabhagent_details->permanent_city; ?>, <?php echo $laabhagent_details->permanent_pincode; ?></td>
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
										<td>Contract Letter :</td>
										<td>
											<?php
										
											if($laabhagent_details->contract_letter !="")
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
										<td>Resume :</td>
										<td>
										<?php 																		
											if($laabhagent_details->upload_resume !="")
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
										<td>Qualification Document :</td>
										<td>
										    <?php 																		
											if($laabhagent_details->marksheet !="")
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
										<td>Experience Letter :</td>
										<td>
										    <?php 																																									   
											if($laabhagent_details->experience_letter !="")
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
			<!--		
                <div class="col-md-12">
					<h6 class="box-title">Document Details :</h6>
					<table class="table table-bordered">
						<tbody>
						    <tr>
							  <td>Contract Letter</td>
							  <td><a target="_blank"><h4 class="sub-title" style="color:#357EC7;"><?php echo $laabhagent_details->contract_letter; ?> </h4></a></td>
						    </tr>
							<tr>
							  <td>Resume</td>
							  <td><a><h4 class="sub-title" style="color:#357EC7;"><?php echo $laabhagent_details->upload_resume; ?> </h4></a></td>
						    </tr>
							<tr>
							  <td>Marksheet</td>
							  <td><a><h4 class="sub-title" style="color:#357EC7;"><?php echo $laabhagent_details->marksheet; ?> </h4></a></td>
						    </tr>
						    <tr>
							  <td>Experience Letter</td>
							  <td><a><h4 class="sub-title" style="color:#357EC7;"><?php echo $laabhagent_details->experience_letter; ?> </h4></a></td>
						    </tr>						 
						    
						</tbody>
					</table>			 
			    </div>
			-->
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
								<td><?php echo $laabhagent_details->bank_name; ?></td>
								<td><?php echo $laabhagent_details->bank_acc_no; ?></td>
								<td><?php echo $laabhagent_details->ifsc_code; ?></td>							   
								<td><?php echo $laabhagent_details->pf_number;?></td>																															
								<td>
									<?php 
										if($laabhagent_details->approvel_status==0)
										{
											echo "<i class='fa fa-exclamation-circle Pending' aria-hidden='true'></i>";
										}
										if($laabhagent_details->approvel_status==1)
										{
											echo "<i class='fa fa-check-circle-o approved ' aria-hidden='true' ></i>";
										}
										if($laabhagent_details->approvel_status==2)
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
								    <?php if($laabhagent_details->approvel_status==0){ ?>
										<a  href="<?php echo base_url();?>Laabh_agent/Laabhagent_approvel/<?php echo $laabhagent_details->user_id; ?>/<?php echo $laabhagent_details->id; ?>/<?php echo $laabhagent_details->laabh_executive; ?>"  class="btn btn-success">
											<i class="fa fa-check"></i> Approve 
										</a>
										<a class="btn btn-danger">
											<i class="fa fa-ban"></i> Reject
										</a>
									<?php } else if($laabhagent_details->approvel_status==1) { ?>
										<a class="btn btn-success">
											<i class="fa fa-check"></i> Approved 
										</a>
									<?php } else if($laabhagent_details->approvel_status==2) { ?>										
										<a class="btn btn-danger">
											<i class="fa fa-ban"></i> Rejected 
										</a>	
									<?php }  ?>
								</td>
							</tr>
							
						<?php } else if($user_type==2) { ?>
							<tr>
								<td>Action</td>
								<td style="float:right; border:none;">
								    <?php if($laabhagent_details->approvel_status==0){ ?>
										<a class="btn btn-info">
												<i class="fa fa-info-circle" aria-hidden="true"></i> Pending 
											</a>
										<a class="btn btn-danger">
											<i class="fa fa-ban"></i> Reject
										</a>
									<?php } else if($laabhagent_details->approvel_status==1) { ?>
										<a class="btn btn-success">
											<i class="fa fa-check"></i> Approved 
										</a>
									<?php } else if($laabhagent_details->approvel_status==2) { ?>										
										<a class="btn btn-danger">
											<i class="fa fa-ban"></i> Rejected 
										</a>	
									<?php }  ?>
								</td>
							</tr>
                        <?php } else if($user_type==6) { ?>
							<tr>
								<td>Action</td>
								<td style="float:right; border:none;">
								    <?php if($laabhagent_details->approvel_status==0){ ?>
										<a  href="<?php echo base_url();?>Laabh_agent/Laabhagent_approvel/<?php echo $laabhagent_details->user_id; ?>/<?php echo $laabhagent_details->id; ?>/<?php echo $laabhagent_details->laabh_executive; ?>"  class="btn btn-success">
											<i class="fa fa-check"></i> Approve 
										</a>
										<a class="btn btn-danger">
											<i class="fa fa-ban"></i> Reject
										</a>
									<?php } else if($laabhagent_details->approvel_status==1) { ?>
										<a class="btn btn-success">
											<i class="fa fa-check"></i> Approved 
										</a>
									<?php } else if($laabhagent_details->approvel_status==2) { ?>										
										<a class="btn btn-danger">
											<i class="fa fa-ban"></i> Rejected 
										</a>	
									<?php }  ?>
								</td>
							</tr>
                        <?php } else if($user_type==11) { ?>
							<tr>
								<td>Action</td>
								<td style="float:right; border:none;">
								    <?php if($laabhagent_details->approvel_status==0){ ?>
										<a class="btn btn-info">
											<i class="fa fa-info-circle" aria-hidden="true"></i> Pending 
										</a>
										<a class="btn btn-danger">
											<i class="fa fa-ban"></i> Reject
										</a>
									<?php } else if($laabhagent_details->approvel_status==1) { ?>
										<a class="btn btn-success">
											<i class="fa fa-check"></i> Approved 
										</a>
									<?php } else if($laabhagent_details->approvel_status==2) { ?>										
										<a class="btn btn-danger">
											<i class="fa fa-ban"></i> Rejected 
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
