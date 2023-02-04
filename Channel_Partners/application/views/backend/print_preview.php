<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/seller.css">

<?php
   if($this->session->userdata('user_login_access') != 1)
   {
      return redirect('Login'); 
   }
   
   if(isset($sellerid))
   {   				
      $seller_id=$sellerid;						  
   }
   
   $labhid = $this->session->userdata('user_login_id');
   $sellerid = $seller_id; 
   $basicinfo = $this->employee_model->GetBasic($labhid); 
   
   ?>
<style>
 <!--  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');-->
   
   h1,h2,h3,h4,h5,h6,p,li,a tr th td span{
   font-family: 'Poppins', sans-serif;
   color:#67757c;
   font-size:25px;
   }
   .mou-img{
   width:100px;
   }
   .logo-mou{
   width:110px;
   float: right;
   margin-top: -95px;
   }
   .mou-heading{
   text-align: center;
   /* margin-top: -159px;*/
   }
   .company_name{
   font-size:35px;
   color: #00054c;
   text-align: center;
   margin-left:5%;
   font-weight: 700;
   } 
   .note
   {
   border: 1px solid #1976d2 !important;  
   }  
   .doc{
   width: 90%;
   }
   
   .logo{
   margin-left:30%;
   }
   .logo-img{
   height:80px;
   float: left;
   margin-top:20px;
   }
   .sellerinfo h4{
   font-size:20px;
   }
   .table-sec{
   margin-left:-30px;
   }
   table{
   margin-bottom: 0rem;
   }
   .profile 
   {
   height:180px;
   width:120%;
   border: 1px solid;
   padding: 5px;
   margin-left:-10px!important;
   box-shadow: 2px 2px 2px 2px #ccccccad;
   }
   .addres_table{
   margin-top:-10px;
   }
</style>
<body onload="window.print()">
   <div class="container-fluid">
      <div class="page-wrapper">
         <div class="page-titles">
            <div id="toprint">
               <div class="card card-outline-info">
                  <div class="row">
                     <div class="col-md-2">
                        <img src="<?php echo base_url()?>/assets/images/mou.png" class="mou-img ml-3" >
                     </div>
                     <div class="col-md-8 col-sm-6 mou-heading" >
                        <h2 class="mt-3 ml-5 text-center">
                           <span class="company_name mt-5">Indigem Channel partners Private Limited</span>
                        </h2>
                     </div>
                     <div class="col-md-2 ">
                        <img src="<?php echo base_url()?>/assets/images/logo-icon.png" class="logo-mou mt-1 mx-3">
                     </div>
                     <div class="col-md-12">
                        <div class="bg-secondary">
                           <h5 class="text-center text-white py-2 my-1">Acknowledgement For Indigem Channel partners Private Limited, 2022-2023</h5>
                        </div>
                     </div>
                     <?php foreach($seller as $value): ?>
                     <div class="col-md-2"></div>
                     <div class="col-md-6" style="float:left;">
                        <table class="">
									<tbody>
									   <tr>
									      <td><b>Laabh ID : </b>  <?php echo $value->labh_agent_id ?> (<?php echo $value->fname; ?>)</td>									      
									   </tr>						
									</tbody>
								</table>
                     </div>
                     <div class="col-md-3" style="float:right;">
                        <table class="">
									<tbody>
									   <tr>
									      <td><b>Seller Id</b> : <?php echo $value->seller_id ?></td>
									   </tr>
									</tbody>
								</table>
                     </div>
                    <!-- <div class="col-md-1"></div> -->
                  </div>
                  <div class="infosection">
                     <div class="sellerinfo">
                        <h4 class="text-white py-1 pl-3 mb-2">
                           <i class="fa fa-user-circle-o mr-3" aria-hidden="true"></i>
                           Personal Details
                        </h4>
                     </div>
                     <div class="row mx-4">
                        <div class="col-md-10">
                           <div class="row">
                              <div class="col-md-12">
                                 <table class="table  table-striped table-bordered">
                                    <tbody>
                                       <tr>
                                          <td>Name</td>
                                          <td><?php echo ucwords(strtolower($value->fname));?></td>
                                           <td>Gender</td>
                                          <td><?php echo $value->gender ?></td>

                                       </tr>
                                       <tr>
                                           <td>Region</td>
                                          <td>
										  <?php 																	  															   
												$region_name='';                                           										
												$seller_payment_details = $this->db->query("SELECT * FROM region WHERE region_id='".$value->region_id."' ");
												$pay_details= $seller_payment_details->result();
												//print_r($this->db->last_query());
												foreach($pay_details as $pay_det)
												{			
													$region_name = $pay_det->region_name;																																									
												}
												echo $region_name;						
											?>
										  </td>
                                           <td>Email</td>
                                          <td colspan="4"><?php echo $value->email ?></td>
                                       </tr>
                                       <tr>
                                          <td>Mobile Number</td>
                                          <td><?php echo $value->contact ?></td>
                                          <td>Alt Number</td>
                                          <td><?php echo $value->altcontact ?></td>
                                       </tr>
                                       <tr>
                                          <td>Date Of Birth</td>
                                          <td><?php echo $value->dob ?></td>
                                          <td>Aadhar Number</td>
                                          <td colspan="4"><?php echo $value->aadhar ?></td>
                                       </tr>
									   <tr>
                                          <td>Valid From</td>
                                          <td><?php $timestamp = strtotime($value->paid_on); echo date("d-m-Y ", $timestamp, ); ?></td>
                                          <td>Valid Upto</td>
                                          <td colspan="4"><?php echo $newdate = date('d-m-Y', strtotime("+ ".$value->reg_duration." years"))	; ?></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                             
                           </div>
                        </div>
                        <div class="col-md-2">
                           <img src="<?php echo base_url(); ?><?php echo $value->seller_image ?>" alt="user" class="profile mr-5">
                        </div>
                     </div>
                  </div>
                  <div class="infosection">
                  	<div class="sellerinfo mb-2">
                        <h4 class="text-white py-1 pl-3 mb-2">
                           <i class="fa fa-location-arrow mr-3" aria-hidden="true"></i>
                            Address
                        </h4>
                     </div>
                     <div class="row mx-4">
                        <div class="col-md-6">
                           <div class="sellerinfo">
                              <h4 class="text-white py-1 pl-3 mb-2">
                                 <i class="fa fa-map-marker  mr-3" aria-hidden="true"></i>
                                 Current Address
                              </h4>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <table class="addres_table table  table-striped table-bordered">
                                    <tbody>
                                       <tr>
                                          <td>State</td>
                                          <?php                                           
                                             $state = $this->db->query("SELECT statename FROM state_master WHERE state_id=".$value->state_first." limit 1");
                                             			$state = $state->result_array();
                                             foreach($state as $state)
                                             {
                                                $state_name = $state['statename'] ;
                                             }
                                             ?>	
                                          <td><?php echo $state_name; ?></td>
                                       </tr>
                                       <tr>
                                          <td>District</td>
                                          <?php 
                                             $district = $this->db->query("SELECT Districtname FROM district_master WHERE Districtcode=".$value->district_first." limit 1");
                                             $district = $district->result_array();
                                             foreach($district as $district)
                                             {
                                                $District_name = $district['Districtname'] ;
                                             }
                                             ?> 
                                          <td><?php echo $District_name ?></td>
                                       </tr>
                                       <tr>
                                          <td>City</td>
                                          <td><?php echo $value->city_first ?></td>
                                       </tr>
                                       <tr>
                                          <td>Pincode</td>
                                          <td><?php echo $value->pincode_first ?></td>
                                       </tr>
                                       <tr>
                                          <td>Address</td>
                                          <td><?php echo $value->current_address ?></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="sellerinfo">
                              <h4 class="text-white py-1 pl-3">
                                 <i class="fa fa-home  mr-3" aria-hidden="true"></i>
                                 Permanent Address
                              </h4>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <table class="addres_table table  table-striped table-bordered">
                                    <tbody>
                                       <tr>
                                          <td>State</td>
                                          <?php                                           
                                             $state = $this->db->query("SELECT statename FROM state_master WHERE state_id=".$value->state_second." limit 1");
                                             			$state = $state->result_array();
                                             foreach($state as $state)
                                             {
                                                $state_name = $state['statename'] ;
                                             }
                                             ?>	
                                          <td><?php echo $state_name; ?></td>
                                       </tr>
                                       <tr>
                                          <td>District</td>
                                          <?php 
                                             $district = $this->db->query("SELECT Districtname FROM district_master WHERE Districtcode=".$value->district_second." limit 1");
                                             $district = $district->result_array();
                                             foreach($district as $district)
                                             {
                                                $District_name = $district['Districtname'] ;
                                             }
                                             ?> 
                                          <td><?php echo $District_name ?></td>
                                       </tr>
                                       <tr>
                                          <td>City</td>
                                          <td><?php echo $value->city_second ?></td>
                                       </tr>
                                       <tr>
                                          <td>Pincode</td>
                                          <td><?php echo $value->pincode_second ?></td>
                                       </tr>
                                       <tr>
                                          <td>Address</td>
                                          <td><?php echo $value->permanent_address ?></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="infosection">
                     <div class="sellerinfo">
                        <h4 class="text-white py-1 pl-3 mb-2">
                           <i class="fa fa-university mr-3" aria-hidden="true"></i>
                           Company Details
                        </h4>
                     </div>
                     <div class="row mx-4">
                        <div class="col-md-12">
                           
                                 <table class="table  table-striped table-bordered">
                                    <tbody>
                                       <tr>
                                          <td>Company Name</td>
                                          <td><?php echo $value->companyname ?></td>
                                          <td>Proprietor Name</td>
                                          <td><?php echo $value->proprietor_name ?></td>
                                       </tr>
                                       <tr>
                                          <td>GSTIN</td>
                                          <td><?php echo $value->gstin ?></td>
                                           <td>Pan Number</td>
                                          <td><?php echo $value->panNo ?></td>
                                       </tr>
                                       <tr>
                                          <td>Tan Number</td>
                                          <td colspan="4"><?php echo $value->tanNo ?></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              
                        </div>
                     </div>
                  </div>

                  <div class="infosection">
                     <div class="sellerinfo">
                        <h4 class="text-white py-1 pl-3 mb-2">
                           <i class="fa fa-inr mr-3" aria-hidden="true"></i>
                           Payment Details
                        </h4>
                     </div>
                     <div class="row mx-4">
					    <?php
															 
															    $seller_payment = $this->db->query("SELECT * FROM seller WHERE seller_id='".$sellerid."'AND labh_emp_id='".$value->labh_emp_id."' AND ispaid='1'  AND isactive=1 ");
                                                                $sellerpayment= $seller_payment->result();
																foreach($sellerpayment as $pay)
																{				
																	$amount = $pay->amount;							
																	$pay_status = $pay->pay_status;
																	$order_id = $pay->order_id;
																	$paid_on = $pay->paid_on;						
																}
																
																$seller_payment_details = $this->db->query("SELECT * FROM payment_details_safe WHERE user_id='".$sellerid."'AND order_no='".$value->order_id."' AND status=2 ");
                                                                $pay_details= $seller_payment_details->result();
																foreach($pay_details as $pay_det)
																{				
																	$pg_name = $pay_det->pg_name;							
																	$paymode = $pay_det->paymode;																							
																}
																
	                                                         ?>
                        <div class="col-md-12">
                          
                                 <table class="table  table-striped table-bordered">
                                    <tbody>
                                       <tr>
                                          <td>Transaction ID</td>
                                          <td><b><?php echo $order_id; ?></b></td>
                                           <td>Transaction Date</td>
                                          <td><b><?php echo $paid_on; ?></b></td>
                                       </tr>
                                       <tr>
                                          <td>Bank Name</td>
                                          <td><b><?php echo $pg_name; ?></b></td>
                                          <td>Mode of Payment</td>
                                          <td><b><?php echo $paymode; ?></b></td>

                                       </tr>
                                       <tr>
                                          <td>Transaction Amount</td>
                                          <td><b><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $amount; ?></b></td>
                                          <td>Payment Status</td>
                                          <td><b><?php echo $pay_status; ?> </b></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              
                          
                     </div>
                  </div>
                  <div class="infosection">
                     <div class="sellerinfo">
                        <h4 class="text-white py-1 pl-3 mb-2">
                           <i class="fa fa-file-o mr-3" aria-hidden="true"></i>
                          Uploaded Documents
                        </h4>
                     </div>
                     <div class="row mx-4">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-12">
                                  <table style="min-widtd: 100%;"  class="table table-bordered border-primary mb-0" >
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>Permanent Account Number (PAN) :</td>
                                 <td>
                                    <?php
                                       $pandoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='1' limit 1 ");
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
                                       $tandoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='2' limit 1 ");
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
                                       $gstindoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='3' limit 1 ");
                                                                                                   $gstindoc = $gstindoc->num_rows();
                                       if($gstindoc > 0)
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
                                 <td>4</td>
                                 <td>GeM Registration Document :</td>
                                 <td>
                                    <?php 																																									   
                                       $gemdoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='4' limit 1 ");
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
                                       $paymentdoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='5' limit 1 ");
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
                                       $moudoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='6' limit 1 ");
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
                             
                           </div>
                        </div>
                     </div>
                  </div>








                  <!-- <input class="preview-input" readonly type="" name="" value="First Name">
                     <input class="preview-input" readonly type="" name="" value="<?php echo ucwords(strtolower($value->fname)); ?>"> -->
                  <!-- <input class="preview-input" readonly type="" name="" value="Gender">
                     <input class="preview-input" readonly type="" name="" value="<?php echo $value->gender ?>"> -->
                  <!-- <input class="preview-input" readonly type="" name="" value="User Type">
                     <input class="preview-input" readonly type="" name="" value="<?php echo $value->usertype ?>"> -->
                  <!--  <input class="preview-input" readonly type="" name="" value="Mobile Number">
                     <input class="preview-input" readonly type="" name="" value="<?php echo $value->contact ?>"> -->
                  <!--  <input class="preview-input" readonly type="" name="" value="Alt Number ">
                     <input class="preview-input" readonly type="" name="" value="<?php echo $value->altcontact ?>"> -->
                  <!-- <input class="preview-input" readonly type="" name="" value="Date Of Birth">
                     <input class="preview-input" readonly type="" name="" value="<?php echo $value->dob ?>"> -->
                  <!-- <input class="preview-input" readonly type="" name="" value="Email">
                     <input class="" readonly type="" name="" value="<?php echo $value->email ?>" style="width:73%!important;">		 -->								  
                  <!--  </div>
                     <div class="col-md-2">
                        <img src="<?php echo base_url(); ?><?php echo $value->seller_image ?>" alt="user" class="profile-img">
                     </div> -->
                  <!-- </div>
                     </div>
                     </div> -->
                  <!-- <div class="infosection">
                     <div class="sellerinfo">
                        <h3 class="text-white py-2 pl-3 mb-3" style="color: #000;">
                           <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp; Current Address
                        </h3>
                     </div>
                     <div class="mx-4">
                        <input class="preview-input" readonly type="" name="" value="State">
                        <?php                                           
                        $state = $this->db->query("SELECT statename FROM state_master WHERE state_id=".$value->state_first." limit 1");
                        			$state = $state->result_array();
                        foreach($state as $state)
                        {
                           $state_name = $state['statename'] ;
                        }
                        ?>													
                        <input class="preview-input" readonly type="" name="" value="<?php echo $state_name; ?>">
                        <input class="preview-input" readonly type="" name="" value="District">
                        <?php 
                        $district = $this->db->query("SELECT Districtname FROM district_master WHERE Districtcode=".$value->district_first." limit 1");
                        $district = $district->result_array();
                        foreach($district as $district)
                        {
                           $District_name = $district['Districtname'] ;
                        }
                        ?> 
                        <input class="preview-input" readonly type="" name="" value="<?php echo $District_name ?>">
                     </div>
                     <div class="mx-4 my-1">
                        <input class="preview-input" readonly type="" name="" value="City">
                        <input class="preview-input" readonly type="" name="" value="<?php echo $value->city_first ?>">
                        <input class="preview-input" readonly type="" name="" value="Pin code">
                        <input class="preview-input" readonly type="" name="" value="<?php echo $value->pincode_first ?>">
                     </div>
                     <div class="mx-4 my-1">
                        <input class="preview-input" readonly type="" name="" value="Address">
                        <input class="" readonly type="" name="" value="<?php echo $value->current_address ?>" style="width:73%">
                     </div>
                     </div> -->
                  <!--  <div class="infosection">
                     <div class="sellerinfo">
                        <h3 class="text-white py-2 pl-3 mb-3" style="color: #000;">
                           <i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp; Permanent Address
                        </h3>
                     </div>
                     <div class="mx-4">
                        <input class="preview-input" readonly type="" name="" value="State">
                        <?php 
                        $state = $this->db->query("SELECT statename FROM state_master WHERE state_id=".$value->state_second." limit 1");
                        			$state = $state->result_array();
                        foreach($state as $state)
                        {
                           $state_name_second = $state['statename'] ;
                        }
                        ?>
                        <input class="preview-input" readonly type="" name="" value="<?php echo $state_name_second ?>">
                        <input class="preview-input" readonly type="" name="" value="District">															
                        <?php 
                        $district = $this->db->query("SELECT Districtname FROM district_master WHERE Districtcode=".$value->district_first." limit 1");
                        $district = $district->result_array();
                        foreach($district as $district)
                        {
                           $District_name_second = $district['Districtname'] ;
                        }
                        ?> 															
                        <input class="preview-input" readonly type="" name="" value="<?php echo $District_name_second ?>">
                     </div>
                     <div class="mx-4 my-1">
                        <input class="preview-input" readonly type="" name="" value="City">
                        <input class="preview-input" readonly type="" name="" value="<?php echo $value->city_second ?>">
                        <input class="preview-input" readonly type="" name="" value="Pin code">
                        <input class="preview-input" readonly type="" name="" value="<?php echo $value->pincode_first ?>">
                     </div>
                     <div class="mx-4 my-1">
                        <input class="preview-input" readonly type="" name="" value="Address">
                        <input class="" type="" name="" value="<?php echo $value->permanent_address ?>" style="width:73%">
                     </div>
                     </div> -->
                  <!--   <div class="infosection">
                     <div class="sellerinfo">
                        <h3 class="text-white py-2 pl-3 mb-3" style="color: #000;">
                           <i class="fa fa-university" aria-hidden="true"></i>&nbsp;&nbsp; Company Details
                        </h3>
                     </div>
                     <div class="mx-4">
                        <input class="preview-input" readonly type="" name="" value="Company Name">
                        <input class="preview-input" readonly type="" name="" value="<?php echo $value->companyname ?>">
                        <input class="preview-input" readonly type="" name="" value="Proprietor Name">
                        <input class="preview-input" readonly type="" name="" value="<?php echo $value->proprietor_name ?>">
                     </div>
                     <div class="mx-4">
                        <input class="preview-input" readonly type="" name="" value="Pan Number">
                        <input class="preview-input" readonly type="" name="" value="<?php echo $value->panNo ?>">
                        <input class="preview-input" readonly type="" name="" value="GSTIN">
                        <input class="preview-input" readonly type="" name="" value="<?php echo $value->panNo ?>">
                     </div>
                     <div class="mx-4">
                        <input class="preview-input" readonly type="" name="" value="Tan Number">
                        <input class="preview-input" readonly type="" name="" value="0106468647">
                     </div>
                     </div> -->
                  <!-- <div class="infosection">
                     <div class="sellerinfo">
                        <h3 class="text-white py-2 pl-3 mb-3" style="color: #000;">
                           <i class="fa fa-inr" aria-hidden="true"></i>&nbsp;&nbsp; Payment Details
                        </h3>
                     </div>
                     <div class="mx-4 my-1">
                        <input class="preview-input" readonly type="" name="" value="Application Number">
                        <input class="preview-input" readonly type="" name="" value="1467999000081423">
                        <input class="preview-input" readonly type="" name="" value="Transaction ID">
                        <input class="preview-input" readonly type="" name="" value="46722010400000095840">
                     </div>
                     <div class="mx-4 my-1">
                        <input class="preview-input" readonly type="" name="" value="Application Date">
                        <input class="preview-input" readonly type="" name="" value="31/12/2021">
                        <input class="preview-input" readonly type="" name="" value="Transaction Date">
                        <input class="preview-input" readonly type="" name="" value="04/01/2022">
                     </div>
                     <div class="mx-4 my-1">
                        <input class="preview-input" readonly type="" name="" value="Transaction Amount">
                        <input class="preview-input" readonly type="" name="" value="2000.00">
                        <input class="preview-input" readonly type="" name="" value="Payment Status">
                        <input class="preview-input" readonly type="" name="" value="Pending ">
                     </div>
                  </div> -->
                 <!--  <div class="infosection">
                     <div class="sellerinfo">
                        <h3 class="text-white py-2 pl-3 mb-3"  style="color: #000;">
                           <i class="fa fa-file-o" aria-hidden="true"></i>&nbsp;&nbsp; Uploaded Documents
                        </h3>
                     </div>
                     <div class="mx-4 my-1">
                       <table style="min-widtd: 100%;"  class="table table-bordered border-primary mb-0" >
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>Permanent Account Number (PAN) :</td>
                                 <td>
                                    <?php
                                       $pandoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='1' limit 1 ");
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
                                       $tandoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='2' limit 1 ");
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
                                       $gstindoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='3' limit 1 ");
                                                                                                   $gstindoc = $gstindoc->num_rows();
                                       if($gstindoc > 0)
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
                                 <td>4</td>
                                 <td>GeM Registration Document :</td>
                                 <td>
                                    <?php 																																									   
                                       $gemdoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='4' limit 1 ");
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
                                       $paymentdoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='5' limit 1 ");
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
                                       $moudoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='6' limit 1 ");
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
                  </div> -->
               </div>
               <?php endforeach; ?>
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
   </div>
   </div>
   <script>
      function printpart () {
        var printwin = window.open("");
        printwin.stop();
        printwin.document.write(document.getElementById("toprint").innerHTML);
        printwin.print();
        printwin.close();
      }
   </script>	
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>