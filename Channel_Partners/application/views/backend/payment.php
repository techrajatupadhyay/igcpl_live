<?php

    if($this->session->userdata('user_login_access') != 1)
    {
       return redirect('Login'); 
    }
     
    if(isset($sellerid))
    {        
       $seller_id = $sellerid;                    
    }
   
    if(isset($ispaid))
    {        
       $ispaid = $ispaid;                    
    }
   
    if(isset($state_second))
    {        
       $state_second = $state_second;                    
    }
    
    $labhid = $this->session->userdata('user_login_id');	
    $sellerid = $seller_id;
    	
    $ispaid = '';							
    $pay_status = '';
    $reg_duration = '';
    $renew_date = ''; 
	
    $seller_payment = $this->db->query("SELECT * FROM seller WHERE seller_id='".$sellerid."'AND labh_agent_id='".$labhid."'  AND isactive=1 ");
    $sellerpayment= $seller_payment->result();
    //print_r($sellerpayment);
    foreach($sellerpayment as $pay)
    {				
        $ispaid = $pay->ispaid;							
        $pay_status = $pay->pay_status;
        $reg_duration = $pay->reg_duration;
        $renew_date = $pay->renew_date;							
    }
        
?>
<style>
   .record_table {
   width: 100%;
   border-collapse: collapse;
   }
   .record_table tr:hover {
   background: #eee;
   }
   .record_table td {
   border: 1px solid #eee;
   }
   .defaultContent{
   targets: 0,
   data: null,
   defaultContent: '',
   orderable: false,
   className: 'select-checkbox'
   }
   .note
   {
   border: 1px solid #1976d2 !important;  
   }  
   table{
   width: 100%;
   font-size:14px !important;
   }*
   .dataTables_length{
   display: none;
   }
   .dataTables_filter{
   display: none;
   }
   .dataTables_info{
   display: none;
   }
   .dataTables_paginate {
   display: none;
   }
   /* .checkbox:hover{
   background:#aaccca;
   }*/
   tr {
   /* https://github.com/w3c/csswg-drafts/issues/1899 */
   transform: scale(1);
   position: relative;
   }
   /* The highlight magic is here (webkit only) */
   :checked::before {
   content: ' ';
   position: absolute;
   display: block;
   top: 0;
   left: 0;
   bottom: 0;
   right: 0;
   background: #3a8ace;
   opacity: .5;
   z-index: -1;
   }  
</style>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/seller.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.5.0/css/select.dataTables.min.css">
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
                        <li class="breadcrumb-item"><a href="#!">Payment</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="card ">
            <?php  $this->load->view('backend/form_top',$sellerid); ?>
            <div class="card card-outline-info">
                <div class="card-body">
                    <div class="note" style="border-radius: 5px;border: 2px solid; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 18px; text-transform: capitalize;color:black">
                       <i class="fa fa-inr" aria-hidden="true" style="color:#ff0000;"></i>&nbsp;&nbsp;
                       <span style="color:#ff0000;">Payment Processing</span>
                    </div>
                </div>
               <?php  if($ispaid == '0' && ($pay_status =="" || $pay_status =="Failed" )) { ?>
               <form action="<?php echo site_url('Transaction/sendData'); ?>" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                     <table  class="table table-hover table-bordered record_table ">
                        <thead>
                           <tr>
                              <th scope="col">Select Plan</th>
                              <th scope="col">Time Duration</th>
                              <th scope="col">Amount (₹)</th>
                              <?php if($state_second == '17') { ?> 
                              <th scope="col">CGST %</th>
                              <th scope="col">SGST %</th>
                              <?php } else { ?> 
                              <th scope="col">GST %</th>
                              <?php } ?> 
                              <th scope="col">Total amount (₹)</th>
                              <th scope="col">Valid From </th>
                              <th scope="col">Valid upto </th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              $i=0;
                              foreach ($usersplan as $plan) 
                              { 													
                                 $i++;  
                                 $pay_id= "chkYes".$i;
                                 
                                 ?>
                           <tr class="checkbox">
                              <td style="text-align:center;"> <input type="radio" name="registration"  id="chkYes<?php echo $pay_id; ?>" onclick="check_amount('<?php echo $pay_id; ?>')" class="checkoption" value="yes"  required ></td>
                              <td><?php echo $plan->reg_dur_details ?></td>
                              <td><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $plan->reg_amount ?></td>
                              <?php if($state_second == '17') { ?>	
                              <td>
                                 <?php 																   
                                    echo $plan->cgst ." %"; 
                                    $percentage = $plan->cgst;
                                    $amount = $plan->reg_amount;
                                    
                                    $cgst_amount = ($percentage / 100) * $amount;
                                    echo " = ".$cgst_amount;
                                    ?> ₹
                              </td>
                              <td>															   
                                 <?php 																   
                                    echo $plan->sgst ." %"; 
                                    $percentage = $plan->sgst;
                                    $amount = $plan->reg_amount;
                                    
                                    $sgst_amount = ($percentage / 100) * $amount;
                                    echo " = ".$sgst_amount;
                                    ?> ₹
                              </td>
                              <td>										    
                                 <?php 
                                    echo $pay_amount = $plan->reg_amount + $cgst_amount + $sgst_amount;
                                    ?> ₹
                                 <input type="hidden" name="pay_amount"  id="chkYes<?php echo $i; ?>"  value="<?php echo $pay_amount; ?>"  required >
                              </td>
                              <?php } else { ?> 
                              <td>															    
                                 <?php 																   
                                    echo $plan->t_gst ." %"; 
                                    $percentage = $plan->t_gst;
                                    $amount = $plan->reg_amount;
                                    
                                    $gst_amount = ($percentage / 100) * $amount;
                                    echo " = ".$gst_amount;
                                    ?> ₹
                              </td>
                              <td>
                                 <?php 
                                    echo $pay_amount = $plan->reg_amount + $gst_amount ;
                                    ?> ₹
                                 <input type="hidden" name="pay_amount"  id="chkYes<?php echo $i; ?>"  value="<?php echo $pay_amount; ?>"  required >
                              </td>
                              <?php }  ?>	
                              <td><?php echo date('d-m-Y'); ?></td>
                              <td><?php echo date('d-m-Y', strtotime("+ ".$plan->for_years." years")); ?></td>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
                  <div class="card-body">
                     <div class="row my-4">
                        <div class="form-actions col-md-12">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="" style="float:center;">															   
                                    <b><span> <input type="checkbox" id='tac' name="terms_and_conditions" value="yes" onclick="EnableDisableTextBox()" >&nbsp; I have read and agree to the
                                    <a href="https://indigemcp.tsdemo.co.in/uploads/Terms_and_conditions/terms_and_conditions1.pdf" style="color:#3a8ace;" target="_blank">  Terms and Conditions</a>
                                    </span></b>                                             
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <input type="hidden" class="form-control" name="order_no" id="order_no" value="RC17045677" />
                  <input type="hidden" class="form-control" name="amount" id="amount" value=" " />								
                  <input type="hidden" class="form-control" name="country" id="country" value="IND" />
                  <input type="hidden" class="form-control" name="currency" id="currency" value="INR" />										
                  <input type="hidden" class="form-control" name="txn_type" id="txn_type" value="SALE" />
                  <input type="hidden" class="form-control" name="success_url" id="success_url" value="<?=base_url("transaction/response");?>">
                  <input type="hidden" class="form-control" name="failure_url" id="failure_url" value="<?=base_url("transaction/response");?>">
                  <input type="hidden" class="form-control" name="channel" id="channel" value="WEB" />
                  <input type="hidden" class="form-control" name="pg_id" id="pg_id" value="" />										
                  <input type="hidden" class="form-control" name="paymode" id="paymode" value="" />
                  <input type="hidden" class="form-control" name="scheme" id="scheme" value="" />
                  <input type="hidden" class="form-control" name="emi_months" id="emi_months" value="" />
                  <input type="hidden" class="form-control" id="card_no" name="card_no" />										
                  <input type="hidden" class="form-control" name="exp_month" id="exp_month" value="" />
                  <input type="hidden" class="form-control" name="exp_year" id="exp_year" value="" />
                  <input type="hidden" class="form-control" name="cvv2" id="cvv2" value="" />
                  <input type="hidden" class="form-control" name="card_name" id="card_name" value="" />
                  <input type="hidden" class="form-control" name="cust_name" id="cust_name" value="testing_rajat" />
                  <input type="hidden" class="form-control" name="email_id" id="email_id" value="rajat.u@techsimsolution.com" />
                  <input type="hidden" class="form-control" name="mobile_no" id="mobile_no" value="9806751573" />																				
                  <input type="hidden" class="form-control" name="unique_id" id="unique_id" value="RC17045677" />										
                  <input type="hidden" class="form-control" name="is_logged_in" id="is_logged_in" value="Y" />
                  <input type="hidden" class="form-control" id="bill_address" name="bill_address" />
                  <input type="hidden" class="form-control" id="bill_city" name="bill_city" />
                  <input type="hidden" class="form-control" id="bill_state" name="bill_state" />
                  <input type="hidden" class="form-control" id="bill_country" name="bill_country" />
                  <input type="hidden" class="form-control" name="bill_zip" id="bill_zip" />
                  <input type="hidden" class="form-control" id="ship_address" name="ship_address" />
                  <input type="hidden" class="form-control" id="ship_city" name="ship_city" />
                  <input type="hidden" class="form-control" id="ship_state" name="ship_state" />
                  <input type="hidden" class="form-control" id="ship_country" name="ship_country" />
                  <input type="hidden" class="form-control" name="ship_zip" id="ship_zip" />
                  <input type="hidden" class="form-control" name="ship_days" id="ship_days" />
                  <input type="hidden" class="form-control" name="address_count" id="address_count" />
                  <input type="hidden" class="form-control" id="item_count" name="item_count" />
                  <input type="hidden" class="form-control" id="item_value" name="item_value" />
                  <input type="hidden" class="form-control" id="item_category" name="item_category" />
                  <input type="hidden" class="form-control" id="UPI_details" name="UPI_Details" />
                  <input type="hidden" class="form-control" id="udf_1" name="udf_1" value="<?php echo $sellerid;  ?>" />
                  <input type="hidden" class="form-control" id="udf_2" name="udf_2" />
                  <input type="hidden" class="form-control" id="udf_3" name="udf_3" />
                  <input type="hidden" class="form-control" id="udf_4" name="udf_4" value="" />
                  <input type="hidden" class="form-control" id="udf_5" name="udf_5" />
                  <input type="hidden" class="form-control" name="labhid"    value="<?php echo $labhid; ?>">                                    
                  <input type="hidden" class="form-control" name="sellerid"  value="<?php echo $sellerid;  ?>">
                  <div class="card-body">
                     <div class="row my-4">
                        <div class="form-actions col-md-12">
                           <section class="btn-section">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="" style="float:right;">                                                                                                  
                                       <button type="submit" name="submit" id="submit" class="btn footer-button" disabled="disabled" ><i class="fa fa-check"></i> Pay Now</button>                                                                                                                                                                 
                                    </div>
                                 </div>
                              </div>
                           </section>
                        </div>
                     </div>
                  </div>
               </form>
               <?php } else if($ispaid == '1' && $pay_status == "Pending") { ?>
               <div class="card-body">
                  <div class="row my-4">
                     <div class="form-actions col-md-12">
                        <section class="btn-section">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="" style="float:right;">
                                    <?php if($ispaid > 0)  {  ?> 
                                    <button type="submit" name="submit" class="btn footer-button"><i class="fa fa-check"></i> Save & Next</button>
                                    <?php } else {  ?>                                       
                                    <button type="submit" name="submit" id="submit" class="btn footer-button" disabled="disabled" ><i class="fa fa-check"></i> Payment status is Pending from Band ! Please wait</button>                                                      
                                    <?php  }  ?>                                                
                                 </div>
                              </div>
                           </div>
                        </section>
                     </div>
                  </div>
               </div>
               <?php } else if($ispaid == '1' && $pay_status == "Successful") { ?>
              <form action="<?php echo site_url('SellerRegister/submit_payment'); ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="container">
				     <input type="hidden" name="sellerid"  value="<?php echo $sellerid; ?>"  required >
                     <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center" style="max-width: 600px;">
                         <tr bgcolor="#d7d7d7">
                           <td  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                         </tr>
                         <tr bgcolor="#d7d7d7">
                           <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                              <!-- Seperator Start -->
                              <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center" style="max-width: 600px; width: 100%;">
                                <tr bgcolor="#d7d7d7">
                                  <td height="10" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                </tr>
                              </table>
                              <?php foreach($seller as $value): ?> 
                              <table align="center" cellpadding="0" cellspacing="0" cols="3" bgcolor="white" class="bordered-left-right" style="border-left: 10px solid #d7d7d7; border-right: 10px solid #d7d7d7; max-width: 600px; width: 100%;">
                                 <tr height="50">
                                    <td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                    </td>
                                 </tr>
                                 <tr align="center">
                                  <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                   </td>

                                  <td class="text-primary" style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                    <img src="<?php echo base_url();?>assets/images/complet_payment.png" alt="GO" width="100" >
                                  </td>
                                  <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                </tr>
                                <tr height="17">
                                  <td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                </tr>


                                <tr align="center">
                                  <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                  <td class="text-primary" style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">

                                    <h1 style="color:#67a43b; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 30px; font-weight: 700; line-height: 34px; margin-bottom: 0; margin-top: 0;">Payment Received</h1>
                                  </td>
                                 
                                </tr>
                            


                                 <tr align="left">
                                  <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                  <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                    <p class="mt-3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">

                                       Hi <strong>[<?php echo ucwords(strtolower($value->fname)); ?>],</strong> 
                                    </p>
                                  </td>
                                  
                              
                                </tr> 
                               <?php $seller_payment_details = $this->db->query("SELECT * FROM payment_details_safe WHERE user_id='".$sellerid."'AND order_no='".$value->order_id."' AND status=2 ");
                                                                $pay_details= $seller_payment_details->result();
                                                foreach($pay_details as $pay_det)
                                                {           
                                                   $pg_name = $pay_det->pg_name;                   
                                                   $paymode = $pay_det->paymode;
                                                }?>
                              
                                <tr align="left">
                                  <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                  <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                    <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">Your transaction was successful!</p>
                                    <br>
                                    <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0; "><strong>Payment Details:</strong><br/>
                                       <span class="mt-4">Order ID: <strong style="font-weight:bold;"><?php echo  $value->order_id?></strong></span><br/>
									    Amount: <strong><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $value->amount;?></strong>    									                                      
                                    </p>
									<p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0; ">
									                                       
    									Mod of Payment : <strong> <?php echo $paymode;?></strong><br/>
										Bank Name: <strong><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $pg_name;?></strong>
                                       
                                    </p>

                                    <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0; ">Resignation for : <strong><?php echo $value->reg_duration; ?> </strong> Year
                                    </p>

                                    <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0; ">Valid From: <strong><?php  $newdate = date("Y-m-d"); 
                                             echo $newdate;  ?> </strong> 

                                       <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0; ">Valid Upto
                                            <strong><?php  $newdate = date("Y-m-d", strtotime(" +2 year")); 
                                            echo $newdate;  ?></strong>
                                    </p>

                                    
                                    <p class="mt-4" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">We advise to keep this details for future reference.&nbsp;&nbsp;&nbsp;&nbsp;<br/></p>
                                  </td>
                                  <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                </tr>
                                 <tr height="30">
                                  <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                  <td style="border-bottom: 1px solid #D3D1D1; color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                  <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                </tr> 
                                <tr height="30">
                                  <td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                </tr>
                                
                                <tr align="center">
                                 
                                  <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                  <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                                    <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">Transaction reference:  <strong>[ <?php echo $value->order_id;?> ]</strong></p>
                                    <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">Payment Date : <strong>[ <?php echo $value->createdon;?> ]</strong></p>
                                    <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;"></p>
                                  </td>
                                  <td width="36" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                </tr>
                                <tr height="20">
                                  <td colspan="3" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                </tr>



                              <?php  endforeach;  ?>     
                              </table>
                              <!-- Generic Pod Left Aligned with Price breakdown End -->
                              <!-- Seperator Start -->
                              <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center" style="max-width: 600px; width: 100%;">
                                <tr bgcolor="#d7d7d7">
                                  <td height="10" style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                                </tr>
                              </table>

                              <!-- Seperator End -->
                           </td>
                         </tr>
                      </table>
                  </div> 
               </div> 
					 
                  <div class="card-body">
                     <div class="row my-4">
                        <div class="form-actions col-md-12">
                           <section class="btn-section">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="" style="float:right;">                                                                                                  
                                       <button type="submit" name="submit" id="submit" class="btn footer-button"  ><i class="fa fa-check"></i> Save & Next</button>                                                                                                                                                                 
                                    </div>
                                 </div>
                              </div>
                           </section>
                        </div>
                     </div>
                  </div>
               </form>
               <?php } ?>
            

</div>
         </div>
</div>
   </div>
</div>
</body>
<script>
   $('#example').dataTable();
   
   //Select row table
   $('#example').on('click', 'tr', function() {
     var $row = $(this),
       isSelected = $row.hasClass('selected')
     $row.toggleClass('selected')
       .find(':checkbox').prop('checked', !isSelected);
   });
   
   // Problem : Checkbox !== select row
   $("#selectAll, #unselectAll").on("click", function() {
     var selectAll = this.id === 'selectAll';
     $("#example tr").toggleClass("selected", selectAll)
       .find(":checkbox").prop('checked', selectAll);
   });
   
   
</script>
<script type="text/javascript">
   function check_amount(pay_id) 
   {  
    //alert (pay_id);
   var amount = document.getElementById(pay_id).value;		
   //var check_amount = $('#'+pay_id).is(':checked'); 
   	
   if(amount != 0 || amount != null)
   {
   $("#amount").val(amount);
   
   if(pay_id == 'chkYes1')
   {
   $("#udf_4").val('1');
   }
   else if(pay_id == 'chkYes2')
   {
   $("#udf_4").val('2');
   }
           			
   }
   else
   {
   alert("Payment Amount is not Sellected !");					
   }     
   
   }
   
   
   /*
   $(function () {
       $("input[name='chkPassPort']").click(function () {
           if ($("#chkYes").is(":checked")) {
               $("#txtPassportNumber").removeAttr("disabled");
               $("#txtPassportNumber").focus();
           } else {
               $("#txtPassportNumber").attr("disabled", "disabled");
           }
       });
   });
   */	
</script>
<script type="text/javascript">
   function EnableDisableTextBox() 
   {       
   var chkYes = $('#tac').is(':checked'); 
   
   if(chkYes == true)
   {
   $('#submit').attr('disabled',false);
   }
   else
   {
   $('#submit').attr('disabled',true);
   }       
   }
   
</script>
<script>
   $(document).ready(function() {
       $('#example').DataTable( {
           columnDefs: [ {
               orderable: false,
               className: 'select-checkbox',
               targets:   0
           } ],
           select: {
               style:    'os',
               selector: 'td:first-child'
           },
          /* order: [[ 1, 'asc' ]]*/
       } );
   } );
   
   
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
   /* $(document).ready(function(){
   
       $('.checkoption').click(function() {
          $('.checkoption').not(this).prop('checked', false);
       });
   
    });*/
   
       $(document).ready(function() {
     $('.record_table tr').click(function(event) {
         if (event.target.type !== 'checkbox') {
             $(':checkbox', this).trigger('click');
         }
     });
   });
   
    
</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   -->
<!-- Script -->
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.5.0/js/dataTables.select.min.js"></script>
<
</body>
</html>