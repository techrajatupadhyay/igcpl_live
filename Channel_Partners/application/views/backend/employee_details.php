<?php

    if($this->session->userdata('user_login_access') != 1)
    {
       return redirect('Login'); 
    }
         
    $user_id = $this->session->userdata('user_login_id');	
    $user_type = $this->session->userdata('user_type');
    	        
?>

<style>
/*@import url('https://fonts.cdnfonts.com/css/cerebri-sans'); */
   h1,h2,h3,h4,h5,h6,p,li,a tr th td span
   {
   font-family: 'Cerebri Sans,sans-serif;
   color:#343a40;
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


   /*--------------------------------Id card--------------------------------------*/
   .modal-content{
   width:314px;
       height: 560px;
   }
   .idcard-background-img{
   background-image:url("<?php echo base_url(); ?>assets/images/id-card.png");
   height:450px;
   }
   .company_name{
   font-size: 14px;
    padding: 7px;
    text-align: center;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
    padding-top: 15px;
    padding-left: 53px;

   }
   .company_logo{
   width: 60px;
   height: 60px;
   float: right;
   margin-top: -12px;
   margin-right: 14px;
   }
   .label{
   font-weight: 700;
   font-size: 11px;
   color: #000!important;
   }
   .user_info{
   border-left: 2px solid #ffaf00!important;
   line-height: 2!important;
   margin-bottom: 20px;
   }
   .employee_img{
   width: 90px;
   height: 90px;
   margin-top: -43px;
   }
   .employee_qr{
    width:100px;
    height:95px;
    margin-left:3%;
    
   }
   .company_info{
   margin-left: 5%;
   margin-top: -21px;
   }
   .company_info p {
   font-size:11px;
   margin-top: -10px;
   font-family: 'Poppins', sans-serif;
   }
   .employee_details{
   margin-left: 30%;
   }
   .employee_details p{
   font-size: 11px;
   margin-top: -19px;
   font-family: 'Poppins', sans-serif;
   }
   tbody{
   font-size: 12px;
   }
   
</style>
<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
</head>
<div class="pcoded-content">  
    <div class="main-body">
        <div class="page-wrapper">
		    	
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
						 <div class="page-header-title">
							<div class="d-inline">
							   <h4>Employees</h4>
							</div>
						 </div>
						</div>
						<div class="col-lg-4">
						 <div class="page-header-breadcrumb">
							<ul class="breadcrumb-title">
							   <li class="breadcrumb-item">
								  <a href="index.html"> <i class="feather icon-home"></i> </a>
							   </li>
							   <li class="breadcrumb-item"><a href="#!">All Employees</a></li>
							   <li class="breadcrumb-item"><a href="#!">Employee Details</a></li>
							</ul>
						 </div>
					  </div>
					</div>
				</div>									       		
			<section class="content card p-3" >
				<div class="row my-3">
					<div class="col-sm-8 col-md-8 col-lg-8">
						<h3 class="box-title" style="font-family:Cerebri Sans,sans-serif;color: #343a40;font-size: 1rem;">Employee Approvel Details :</h3>
					</div>
					<div class="col-sm-4 col-md-4 col-lg-4 text-right">
					    <button style="font-family:Cerebri Sans,sans-serif;font-size: 1rem;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-address-card"></i>View ID Card </button>
						<a onclick="history.back()">
							<button style="font-size:1rem;" type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-o-left"></i> Back </button>
						</a>
					</div>
				</div>
				<div class="box-body">
					<?php  
					if (isset($Employee_Details)) 
					{
					
					$prifile_image=""; 
					$user_type=""; 
					$regionid=""; 
					foreach ($Employee_Details as $row) 
					{ 
						$prifile_image= $row->em_image;
						$user_type= $row->user_type;

						$reg_val = $row->region;
						$region_value = explode (",", $reg_val); 
						$regionid = $region_value[0];
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
									  <td>Employee ID</td>
									  <td><?php echo $row->user_id; ?></td>
								   </tr>								   
								   <tr>
									  <td>Employee Name</td>
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
											<a  href="<?php echo base_url();?>Admin/Employee_Approvel/<?php echo $row->user_id; ?>/<?php echo $row->id; ?>"  class="btn btn-success">
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
					<?php } ?>
			    </div>
			</section>
		</div>
	</div>
<br><br>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header" >
                <h5 class="modal-title" id="exampleModalLabel">Employee ID Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
			<?php  
			 
			foreach ($Id_Card_Details as $row) 
			{  ?>
                <div class="modal-body" id="divToExport">
                    <div class="idcard-background-img" >
                        <div class="row">
	                        <div class="col-md-12">
	                           <h3 class="text-dark company_name mt-2 ml-5">Indigem Channel Partners<br>Pvt. Ltd.  </h3>	                           
	                        </div>
	                        <div class="col-md-12">
	                           <img src="<?php echo base_url();?>assets/images/logo_new.png" class="company_logo " alt="company logo">
	                        </div>
	                        <div class="col-md-12 text-center">
	                           <img src="<?php echo base_url(); ?><?php echo $prifile_image; ?>" alt="employee_img" class="employee_img ">
	                        </div>
	                        <div class="col-md-12 employee_details">
	                            <div class="user_info">
	                                <p class="mt-1"><span class="label"><?php echo ucwords(strtolower($row->employee_name));?></span></p>
	                                <p><span class="ml-2" style="font-size:12px;"><?php echo ucwords($row->designation);?></span></p>
	                                <p style="margin-top: -25px;"><span class="ml-2" style="font-size:12px;"><?php echo $row->employee_code; ?></span></p>
	                            </div>	                            
	                        </div>
	                        <div class="col-md-12">
	                           <div class="company_info ">
	                                <table style="border: none!important;">
	                                    <tbody>
		                                    <tr>
		                                       <th scope="row">Branch :</th>
		                                       <td><?php echo $row->branch_office_address; ?></td>
		                                    </tr>		                                    
		                                    <tr>
		                                       <th scope="row">Blood Group :</th>
		                                       <td><?php echo $row->blood_group; ?></td>
		                                    </tr>
		                                     <tr>
		                                       <th scope="row">validity (Till) :</th>
		                                       <td><?php echo $row->valid_till; ?></td>
		                                    </tr>
		                                    <tr>
		                                       <th scope="row"><i class="fa fa-phone" aria-hidden="true"></i> </th>
		                                       <td><?php echo $row->phone_number; ?></td>
		                                    </tr>
		                                    <tr>
		                                       <th scope="row"><i class="fa fa-globe" aria-hidden="true"></i></th>
		                                       <td>https://indigemcp.com</td>
		                                    </tr>
	                                    </tbody>
	                                </table>
	                            </div>
	                        </div>

							<?php $qrpath = "uploads/Employee_Documents/".$regionid."/".$row->employee_code."/".$row->employee_code.".png" ;  ?>

                            <div class="col-md-12">
		                        <div class="text-center">
		                           <!--<img src="<?php echo base_url();?>assets/images/QR_code.png" alt="qr code" class="employee_qr">-->
								   <img src="<?php echo base_url(); ?><?php echo $qrpath; ?>" alt="qr code" class="employee_qr">
		                        </div>
		                    </div>
		                </div>
                    </div>                     
			        <a href="<?php echo base_url()?>Admin/print_idcard/<?php echo $row->employee_code; ?>/<?php echo $user_type; ?>" target="_blank"> 
			            <button type="button" class="btn-sm btn-danger pull-right w-100 mt-1" style="font-size: 15px;"><i class="fa fa-print"></i> Print Id Card</button>
                    </a><br>                       
                </div>
			<?php }  } ?>
            </div>
         </div>
      </div>
   </div>
</div>
<br><br>
<script type="text/javascript">
   function generatePDF() {
         
         // Choose the element id which you want to export.
         var element = document.getElementById('divToExport');
         element.style.width = '314px';
         element.style.height = '450px';
         var opt = {
             margin:       0.5,
             filename:     'ID Card.pdf',
             image:        { type: 'jpeg', quality: 1 },
             html2canvas:  { scale: 1 },
             jsPDF:        { unit: 'in', format: 'A4', orientation: 'portrait',precision: '12' }
           };
         
         // choose the element and pass it to html2pdf() function and call the save() on it to save as pdf.
         html2pdf().set(opt).from(element).save();
       }
</script>
<script>
   function printpart () {
     var printwin = window.open("");
     printwin.stop();
     printwin.document.write(document.getElementById("toprint").innerHTML);
     printwin.print();
     printwin.close();
   }
</script>
<!--
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
-->