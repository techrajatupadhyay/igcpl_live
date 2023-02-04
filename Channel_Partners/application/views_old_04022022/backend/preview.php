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
  <!-- @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');-->
   .note
   {
   border: 1px solid #1976d2 !important;  
   }
   .mou-img{
   width:100px;
   }
   .logo-mou{
   width:110px;
   float: right;
   margin-top: -95px;
   }
   .company_name{
   font-size:35px;
   color: #00054c;
   text-align: center;
   margin-left:5%;
   font-weight: 700;
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
   .profile-img{
   margin-left: 30px !important;
   height: 127px; 
   }
   .profile{
   height: 120px;
   border: 1px solid;
   padding: 5px;
   margin-bottom:10px!important;
   box-shadow: 2px 2px 2px 2px #ccccccad;
</style>
<div class="pcoded-content">
   
      <div class="main-body">
         <div class="page-wrapper">
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
                           <li class="breadcrumb-item"><a href="#!">Onbord New Seller</a></li>
						   <li class="breadcrumb-item"><a href="#!">Preview</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            
           <div class="card">
                        <div class="row">
                            <div class="col-12">
	                            <?php  $this->load->view('backend/form_top',$sellerid); ?>
	                            <div class="container-fluid">
	                                <div class="row">
	                                    <div class="col-lg-12 col-xlg-12 col-md-12">	                                   
	                                        <div class="row">	                                         
	                                            <div class="card card-outline-info">	                                                
													<div class="card-body">
														<div class="note" style="border-radius: 5px;border: 2px solid; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 18px; text-transform: capitalize;color:black">
														   <i class="fa fa-file" aria-hidden="true" style="color:#ff0000;"></i>&nbsp;&nbsp;
														   <span style="color:#ff0000;">Registration  Preview</span> 
														</div>
													</div>																									
													<div class="col-md-12">
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
	                                                           <h5 class="text-center text-white py-3 my-1">Acknowledgement For Indigem Channel partners Private Limited, 2022-2023</h5>
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
	                                                    <div class="col-md-12">
	                                                      <div class="infosection">
	                                                         <div class="sellerinfo">
	                                                            <h3 class="text-white py-2 pl-3 mb-3" style="color: #000;">
	                                                               <i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;&nbsp; Personal Details
	                                                            </h3>
	                                                         </div>
	                                                         <div class="mx-4">
	                                                            <div class="row">
	                                                               <div class="col-md-10">
	                                                                  <input class="preview-input" readonly type="" name="" value="First Name">
	                                                                  <input class="preview-input" readonly type="" name="" value="<?php echo ucwords(strtolower($value->fname)); ?>">
	                                                                  <input class="preview-input" readonly type="" name="" value="Gender">
	                                                                  <input class="preview-input" readonly type="" name="" value="<?php echo $value->gender ?>">
	                                                                  <input class="preview-input" readonly type="" name="" value="Region">
	                                                                  <?php 																	  															   
																	    $region_name='';                                           										
																		$seller_payment_details = $this->db->query("SELECT * FROM region WHERE region_id='".$value->region_id."' ");
																		$pay_details= $seller_payment_details->result();
																		//print_r($this->db->last_query());
																		foreach($pay_details as $pay_det)
																		{			
																			$region_name = $pay_det->region_name;																																									
																		}
																		
																	  ?>
																	  
																	  <input class="preview-input" readonly type="" name="" value="<?php echo $region_name;  ?>">
																	  																	  															  															  
	                                                                  <input class="preview-input" readonly type="" name="" value="Mobile Number">
	                                                                  <input class="preview-input" readonly type="" name="" value="<?php echo $value->contact ?>">
	                                                                  <input class="preview-input" readonly type="" name="" value="Alt Number ">
	                                                                  <input class="preview-input" readonly type="" name="" value="<?php echo $value->altcontact ?>">
	                                                                  <input class="preview-input" readonly type="" name="" value="Date Of Birth">
	                                                                  <input class="preview-input" readonly type="" name="" value="<?php echo $value->dob ?>">
																	  
																	  <input class="preview-input" readonly type="" name="" value="Registered for">
	                                                                  <input class="preview-input" readonly type="" name="" value="<?php echo $value->reg_duration ?> years">
																	  <input class="preview-input" readonly type="" name="" value="Email">
	                                                                  <!--<input class="" readonly type="" name="" value="<?php //echo $value->email ?>" style="width:73%!important;">-->
																	  <input class="preview-input" readonly type="" name="" value="<?php echo $value->email ?>">
																	  
																	  <input class="preview-input" readonly type="" name="" value="Valid From">
	                                                                  <input class="preview-input" readonly type="" name="" value="<?php $timestamp = strtotime($value->paid_on); echo date("d-m-Y ", $timestamp, ); ?>">	                                                                    
																	  <input class="preview-input" readonly type="" name="" value="Valid Upto">
	                                                                  <input class="preview-input" readonly type="" name="" value="<?php echo $newdate = date('d-m-Y', strtotime("+ ".$value->reg_duration." years"))	; ?>">															  	                                                                  	
	                                                               </div><br>
	                                                               <div class="col-md-2">
	                                                                  <img src="<?php echo base_url(); ?><?php echo $value->seller_image ?>" alt="user" class="profile">
	                                                               </div>
	                                                            </div>
	                                                         </div>
	                                                      </div>
	                                                      <div class="infosection">
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
	                                                      </div>
	                                                      <div class="infosection">
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
	                                                      </div>
	                                                      <div class="infosection">
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
	                                                            <input class="preview-input" readonly type="" name="" value="<?php echo $value->gstin ?>">
	                                                         </div>
	                                                         <div class="mx-4">
	                                                            <input class="preview-input" readonly type="" name="" value="Tan Number">
	                                                            <input class="" readonly type="" name="" value="<?php echo $value->tanNo ?>" style="width:73%!important;">
	                                                         </div>
	                                                      </div>
	                                                      <div class="infosection">
	                                                         <div class="sellerinfo">
	                                                            <h3 class="text-white py-2 pl-3 mb-3" style="color: #000;">
	                                                               <i class="fa fa-inr" aria-hidden="true"></i>&nbsp;&nbsp; Payment Details
	                                                            </h3>
	                                                         </div>
															 <?php
															 
															    $amount = '';							
																$pay_status = '';
																$order_id = '';
																$paid_on = '';
																$pg_name = '';							
																$paymode = '';
																	
															    $seller_payment = $this->db->query("SELECT * FROM seller WHERE seller_id='".$sellerid."'AND labh_emp_id='".$value->labh_emp_id."' AND ispaid='1'  AND isactive=1 ");
                                                                $sellerpayment= $seller_payment->result();
																//print_r($sellerpayment);
																														
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
															<div class="mx-4 my-1">
	                                                            <input class="preview-input" readonly type="" name="" value="Transaction ID">
	                                                            <input class="preview-input" readonly type="" name="" value="<?php echo $order_id; ?>">
	                                                            <input class="preview-input" readonly type="" name="" value="Transaction Date">
	                                                            <input class="preview-input" readonly type="" name="" value="<?php echo $paid_on; ?>">
	                                                        </div>
															 
															<div class="mx-4 my-1">
	                                                            <input class="preview-input" readonly type="" name="" value="Bank Name">
	                                                            <input class="preview-input" readonly type="" name="" value="<?php echo $pg_name; ?>">
	                                                            <input class="preview-input" readonly type="" name="" value="Mode of Payment">
	                                                            <input class="preview-input" readonly type="" name="" value="<?php echo $paymode; ?>">
	                                                        </div>
	                                                         
	                                                        <div class="mx-4 my-1">
	                                                            <input class="preview-input" readonly type="" name="" value="Transaction Amount">
	                                                            <input class="preview-input" readonly type="" name="" value="<?php echo $amount; ?> ₹">
	                                                            <input class="preview-input" readonly type="" name="" value="Payment Status">
	                                                            <input class="preview-input" readonly type="" name="" value="<?php echo $pay_status; ?> ">
	                                                        </div>
	                                                      </div>
	                                                      <div class="infosection">
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
	                                                                           }																																					 ?>
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
	                                                      <!--	
	                                                         <div class="row">
	                                                            <div class="col-12 offset-md-2 ">
	                                                         	    <table  class="table table-sm mb-0">
	                                                         		    <tbody>
	                                                         			    <tr>
	                                                         				    <td ><h4>Declaration by Seller : </h4></td>
	                                                         			    </tr>
	                                                         			    <tr>
	                                                         				    <td> <p style="font-size:18px;"> I hereby declare that all the information stated above in this application form are true, complete and correct to the best of my knowledge and belief. In the event of any information being found false or incorrect, I hereby convey my consent for cancellation of my candidature and may be forfeited. </p></td>
	                                                         			    </tr>
	                                                         			    <br> 
	                                                                                                                   <tr>
	                                                         					<td style="text-align: center;"><input style="color:green;" type="checkbox" required="" ><b> : I agree </b><br></td>
	                                                         				</tr>
	                                                         			   
	                                                         		    </tbody>
	                                                         	    </table>
	                                                             </div>
	                                                         </div>
	                                                         -->															
	                                                   </div>
	                                                   <?php endforeach; ?>
	                                                </div>
	                                             </div>
	                                          </div>
	                                       </div>
	                                    <!-- </div> -->
	                                 </div>
	                              </div>
	                            </div>
	                            <div class="card-body">
	                              <div class="row mb-4">
	                                 <div class="form-actions col-md-12">
	                                    <section class="btn-section">
	                                       <div class="row">
	                                          <div class="col-md-12">
	                                             <form action="<?php echo site_url('SellerRegister/submit_registration'); ?>" method="post" enctype="multipart/form-data">
	                                                <input type="hidden" class="form-control" name="labhid"    value="<?php echo $labhid; ?>">												
	                                                <input type="hidden" class="form-control" name="sellerid"  value="<?php echo $sellerid;  ?>">
	                                                <div class="" style="float:right;">
	                                                   <?php 
	                                                      if($paymentdoc && $moudoc > 0)  {  ?>		
	                                                      	<button type="submit" name="submit" class="btn footer-button"><i class="fa fa-check"></i> Submit Registration</button>						
	                                                         <a target="_blank" href="<?php echo base_url();?>/SellerRegister/print_preview/<?php echo $sellerid?>">												
	                                                   <button type="button" class="btn btn-success footer-button"><i class="fa fa-print"></i> Print Registration</button></a>                                                           
	                                                   <?php } else {  ?>																		
	                                                   <button type="submit" name="submit" class="btn footer-button" disabled="disable"><i class="fa fa-check"></i> Save & Next</button>																		
	                                                   <button type="button" class="btn btn-success footer-button"><i class="fa fa-print"></i>Print</button>
	                                                   <?php  }  ?>												    																
	                                                </div>
	                                             </form>
	                                          </div>
	                                       </div>
	                                    </section>
	                                 </div>
	                              </div>
	                            </div>
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
<!--   
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
-->