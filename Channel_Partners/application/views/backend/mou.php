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
   
?>
<style>
   
   .note
   {
   border: 1px solid #1976d2 !important;  
   }
   .doc{
   width:90%;
   }
   .mou-upload-section{
   margin: 0 46px;
   }
   .mou-img{
   	width:120px;
   }
   .logo-mou{
   	width:120px;
   }
   .PrintMou{
   	float:right;
   	width:130px;
   	background-color:#448acc!important;
   	border:1px solid #448acc!important;
   	border-radius:5px!important
   }  
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/seller.css">
<div class="modal fade bs-example-modal-lg" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div style="max-width: 1000px;" class="modal-dialog" role="document">
        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Seller Payment Proof Documents</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="d-inline-block">
				<div class="alert alert-warning" role="alert" style="background-color: #5aaaff;border-color:#5aaaff">
				   <span style="font-weight: bold; color: white;">Please upload the  documents in PDF format with a maximum file size of 2MB.</span>
				</div>
			</div>
			<form method="POST" enctype="multipart/form-data" action="<?php echo site_url('SellerRegister/upload_document'); ?>">
				 
				<input type="hidden" id="labhid" name="labhid" value="<?php echo $labhid;  ?>">
				<input type="hidden" id="sellerid" name="sellerid" value="<?php echo $sellerid;  ?>">
				<input type="hidden" id="doctype" name="doctype" value="5">
				<div class="modal-body">
				   <div class="form-group">
					  <label for="recipient-name" class="col-form-label">Please Select Payment Proof Document - </label>
					  <input type="file" class="form-control" id="paymentdocfile" name="paymentdocfile" accept=".pdf" maxsize=2MB>
				   </div>
				</div>
				<div class="modal-footer">
				   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				   <button type="submit" id="paymentdocfilebtn"  name="submit" disabled="disable" class="btn btn-primary">Upload File</button>
				</div>            
			</form>
        </div>
   </div>
</div>
<div class="modal fade bs-example-modal-lg" id="mouModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div style="max-width: 1000px;" class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Seller MOU Documents</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="d-inline-block">
            <div class="alert alert-warning" role="alert" style="background-color: #5aaaff;border-color:#5aaaff">
               <span style="font-weight: bold; color: white;">Please upload the  documents in PDF format with a maximum file size of 2MB.</span>
            </div>
         </div>
         <form method="POST" enctype="multipart/form-data" action="<?php echo site_url('SellerRegister/upload_document'); ?>">
            <input type="hidden" id="labhid" name="labhid" value="<?php echo $labhid;  ?>">
            <input type="hidden" id="sellerid" name="sellerid" value="<?php echo $sellerid;  ?>">
            <input type="hidden" id="doctype" name="doctype" value="6">
            <div class="modal-body">
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Please Select MOU Document - </label>
                  <input type="file" class="form-control" id="moudocfile" name="moudocfile" accept=".pdf" maxsize=2MB>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" id="moudocfilebtn"  name="submit" disabled="disable" class="btn btn-primary">Upload File</button>
            </div>
         </form>
      </div>
   </div>
</div>

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
						   <li class="breadcrumb-item"><a href="#!">MOU</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>            
                     <div class="card">
					 <?php  $this->load->view('backend/form_top',$sellerid); ?>
                        <div class="row">
                            <div class="col-12">						   
                                <?php  //$this->load->view('backend/form_top',$sellerid); ?>							  
                                <div class="card card-outline-info">							
									<div class="card-body">
										<div class="note" style="border-radius: 5px;border: 2px solid; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 18px; text-transform: capitalize;color:black">
										   <i class="fa fa-print" aria-hidden="true" style="color:#ff0000;"></i>&nbsp;&nbsp;
										   <span style="color:#ff0000;">Print MOU</span> 
										</div>
									</div>																											
										<?php foreach($seller as $value): ?> 
											<div class="print-mou" >
												<div id="toprint">	    
											  <!--  <table class="m-4">
												   <tbody> -->
												   	<div class="row">
												   		<div class="col-md-2 col-sm-2">
												   			<img src="<?php echo base_url()?>/assets/images/mou.png" class="mou-img ml-3" style="width: 120px;">
												   		</div>
												   		<div class="col-md-8 col-sm-6" >
																
																	<h1 class="mt-3 ml-5 text-center"><strong style="color:#ff0000;  font-size: 22px;"> INDIGEM CHANNEL PARTNERS PVT. LTD.</strong></h1>
																
																
																	<h4 class="text-center text-dark" style="font-size: 18px;">
																		  <strong>CIN: U74999HR2022PTC105548 </strong>
																	</h4>
																
															</div>
                                             <div class="col-md-2 ">
                                             	<img src="<?php echo base_url()?>/assets/images/logo-icon.png" class="logo-mou mt-1 ml-3">
                                             </div>

													   </div>
													     <table class="m-4">
												   <tbody>
														<tr>
															<td>To,</td>
														</tr>
														<tr>
															<td>The Manager </td>
														</tr>
														<tr>
															<td>IGCPL, <b>INDIGEM CHANNEL PARTNERS</b>; </td>
														</tr>
														<tr>
															<td style="height: 20px"></td>
														</tr>
														<tr>
															<td>Madam/Sir,</td>
														</tr>
														<tr>
															<td style="height: 20px"></td>
														</tr>
														<tr>
															<td style="word-spacing:8px;line-height:25px;">
																<b>Subject :- </b>Request for onboarding M/s. <strong style="font-weight:bold;">
																<?php echo ucwords(strtolower($value->fname)); ?>
															   </strong> for the<br>Period 
															   <strong style="font-weight:bold;"> 
																	<?php 
																		$timestamp = strtotime($value->paid_on);
	                                                                    print date("d-m-Y ", $timestamp, );
	                                                ?>
                                                </strong> to 
                                                <strong style="font-weight:bold;">
                                                   <?php
						                                    $newdate = date('d-m-Y', strtotime("+ ".$value->reg_duration." years"))	;
							                                echo $newdate ;							
							                              ?>

																</strong> 
															</td>
														</tr>
														<tr>
															<td style="height: 20px"></td>
														</tr>
														<tr>
															<td><strong>Please Find Enclosed Following Documents :</strong>
															</td>
														</tr>
														<tr>
															<td style="height: 20px"></td>
														</tr>
														<tr>
															<td>1. Documents as per check list<br>
																 2. Channel partner Authorization Letter<br>3. Proof of payment of onboarding fee/Draft number/Cheque Number/Order Number
																 <strong style="font-weight:bold;"><?php echo  $value->order_id?></strong> <br> of an amount of <strong style="font-weight:bold;">Rs. <?php echo $value->amount;?> ₹</strong> dated towards payment of onboarding fee.<br><br>
															</td>
														</tr>
														<tr>
															<td>
																<strong>It is requested to grant approval for the same and generate the following :</strong>
															</td>
														</tr>
														<tr>
															<td style="height: 25px"></td>
														</tr>
														<tr>
															<td>1. IGCPL Client code <br> 2. User ID and Password for Seller Module </td>
														</tr>
														<tr>
															<td style="text-align : right;"> Name and Sign of Agent with Code </td>
														</tr>
														<tr>
															<td>*****************************************************************************************************************************************</td>
														</tr>
														<tr>
															<td><strong>1. Matter discussed with Manager and approved/rejected</strong>
															</td>
														</tr>
														<tr>
															<td><b>a. Approved cases </b>
															<br> i. IGCPL client code is -  
															   <strong style="font-weight:bold;"> 
																<?php echo $value->seller_id ?></strong>
                                             <br>ii. User ID is -  <strong style="font-weight:bold;"> <?php echo $value->email ?></strong>   
                                            <br>iii. Password - <strong style="font-weight:bold;"> <?php echo $value->dec_pass ?></strong>
															</td>
														</tr>
														<tr>
															<td><b>b. Rejected cases</b>
																<br>1. Permanent Account Number (PAN)
																<br>2. Tax Deduction Account Number (TAN)
																<br>3. GSTIN
																<br>4. GeM Registration Document
																<br>5. MOU
															</td>
														</tr>
														<tr>
															<td> ii. Date of Intimation to Laabh Agent <br></td>
														</tr>
														<!-- <tr>
															<td><span style="text-align: left;"> Name and Sign of Laabh Executive with Code </span></td>
														</tr> -->

														<!-- <tr>
															<td><span style="text-align: left;"> Name and Sign of Laabh Executive with Code </span></td>
															<td><span style="text-align: right;"> Name and Sign of Manager</span></td>
														</tr> -->
														</tbody>
											    </table>
														<div class="row">
															<div class="col-md-6">
																<p style="float:left;" class="ml-3"> Name and Sign of Laabh Executive with Code </p>
															</div>
															<div class="col-md-6">
																<p style="float:right;" class="mr-3"><span style="text-align: left;">Name and Sign of Manager</span></p>
															</div>
														</div>
												
														<a  target="_blank" href="<?php echo base_url();?>/SellerRegister/PrintMou/<?php echo $sellerid?>">
													      <p type="button" class="PrintMou m-3 btn text-white"value="Print MOU">
													  	      <i class="fa fa-print" aria-hidden="true"></i> Print MOU</p></a>
													
													
											  
											</div>
										<?php endforeach; ?>										
									</div>
								
									<div class="card-body">
										<div class="note" style="border-radius: 5px;border: 2px solid; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 18px; text-transform: capitalize;color:black">
										   <i class="fa fa-file" aria-hidden="true" style="color:#ff0000;"></i>&nbsp;&nbsp;
										   <span style="color:#ff0000;">Upload Payment Proof & MOU</span> 
										</div>
									</div>
									
									<form action="<?php echo site_url('SellerRegister/submit_mou'); ?>" method="post" enctype="multipart/form-data">
									    <div class="card-body">										
											<table class="table table-hover table-bordered" style="background: none">
												<input type="hidden" class="form-control" name="labhid"    value="<?php echo $labhid; ?>">												
												<input type="hidden" class="form-control" name="sellerid"  value="<?php echo $sellerid;  ?>">
												<tbody>
													<tr>
														<th scope="row">1</th>
														<td class="doc"><b>Upload Pyment Proof</b> <span class="red-color">*</span>  </td>
														<td>                                             
														<?php   
															$paymentdoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='5' limit 1 ");
															$paymentdoc = $paymentdoc->num_rows();
															  
															if($paymentdoc > 0) { ?>
																<a href="#" style='width:180px!important;padding:7px!important;margin: -5px!important;' class="btn footer-button">                                            
																<i class="check-icon fa fa-check" style="background-color:rgb(68 138 204)!important;font-size:17px;border: 1px solid white !important;color:white;"></i></a>                                               
															<?php } else {  ?>
																<a href="#" style='width:180px!important;padding:7px!important;margin: -5px!important;' class="btn footer-button" class="btn btn-warning btn-xs mr5 add_gem_doc" data-toggle="modal"  data-target="#paymentModal" data-whatever="@mdo">
																<i class="fa fa-upload" style="font-size:17px;color:white;">&nbsp;&nbsp;<b>Upload Document</b></i></a>                                               
															<?php  }  ?>                                                                        
														</td>
													</tr>
													<tr>
														<th scope="row">2</th>
														<td class="doc"><b>Upload MOU</b> <span class="red-color">*</span>  </td>
														<td>                                             
															<?php   
																$moudoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='6' limit 1 ");
																$moudoc = $moudoc->num_rows();
																  
															if($moudoc > 0)  {  ?>
																<a href="#" style='width:180px!important;padding:7px!important;margin: -5px!important;' class="btn footer-button">                                            
																<i class="check-icon fa fa-check" style="background-color:rgb(68 138 204)!important;font-size:17px;border: 1px solid white !important;color:white;"></i></a>													
															<?php } else {  ?>
																<a href="#" style='width:180px!important;padding:7px!important;margin: -5px!important;' class="btn footer-button" class="btn btn-warning btn-xs mr5 add_gem_doc" data-toggle="modal"  data-target="#mouModal" data-whatever="@mdo">
																<i class="fa fa-upload" style="font-size:17px;color:white;">&nbsp;&nbsp;<b>Upload Document</b></i></a>													
															<?php  }  ?>                                                                        
														</td>
													</tr>
												</tbody>
											</table>
										</div> 
										<div class="card-body">
											<div class="row mb-4">
												<div class="form-actions col-md-12">
													<section class="btn-section">
														<div class="row">
															<div class="col-md-12">
															    <?php															                                                                 
																	$sql2 ="SELECT * from seller Where seller_id='".$sellerid."' " ;
																	$data['seller_details'] = $this->db->query($sql2)->result();	
																				
																	foreach($data['seller_details'] as $det)
																	{				
																		$manager_approvel = $det->manager_approvel ;
                                                                        $executive_approvel = $det->executive_approvel ;
																		$seller_status = $det->seller_status ;
																	}
																	if($paymentdoc && $moudoc > 0)  
																	{  																        
																		if($manager_approvel == 0) {  ?>
																		    <div class="" style="float:right;">	
																		        <button type="submit" name="submit" class="btn footer-button" disabled="disable"> Approvel is pending by Manager !</button>																														 																	
																		    </div>
																		<?php } else if($executive_approvel == 0) {  ?>
																		    <div class="" style="float:right;">	
																		        <button type="submit" name="submit" class="btn footer-button" disabled="disable"> Approvel is pending by Laabh Executive !</button>																														 																	
																		    </div>
                                                                        <?php } else {  ?>
																			<div class="" style="float:right;">	
																			    <button type="submit" name="submit" class="btn footer-button" ><i class="fa fa-check"></i> Save & Next</button>																		
																	        </div>
																		<?php }   
																	} 
																	else 
																	{  ?>																		
																		    <div class="" style="float:right;">	
																			    <button type="submit" name="submit" class="btn footer-button" disabled="disable"><i class="fa fa-check"></i> Save & Next</button>																		
																	        </div>
																	    <?php  
																	}  ?>												    																																
															</div>
														</div>
													</section>
												</div>
											</div>
										</div>
									</form>
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
   
</body>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->

<script type="text/javascript">

$(document).ready(function () 
{
    //$('.form-control-pan').on('change', function () 
    $('#paymentdocfile').on('change', function ()
    {   
        //alert("File size must under 2MB !");
        var fileEmpty = $('#paymentdocfile').get(0).files.length === 0;
        var size = parseFloat(paymentdocfile.files[0].size / 1048576).toFixed(2);
           
        if (!fileEmpty && size>2) 
        {
            alert("File size must under 2MB !");
            //return;
            $('#paymentdocfilebtn').prop('disabled', true);
        } 
        else if(!fileEmpty && size<=2) 
        {
            $('#paymentdocfilebtn').prop('disabled', false);
        }
        else
        {
            $('#paymentdocfilebtn').prop('disabled', true);
        }
    });
   
    
    $('#moudocfile').on('change', function ()
    {   
        //alert("File size must under 2MB !");
        var fileEmpty = $('#moudocfile').get(0).files.length === 0;
        var size = parseFloat(moudocfile.files[0].size / 1048576).toFixed(2);
           
        if (!fileEmpty && size>2) 
        {
            alert("File size must under 2MB !");
            //return;
            $('#moudocfilebtn').prop('disabled', true);
        } 
        else if(!fileEmpty && size<=2) 
        {
            $('#moudocfilebtn').prop('disabled', false);
        }
        else
        {
            $('#moudocfilebtn').prop('disabled', true);
        }
    });
   
});
   
   
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
</body>