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
   	width: 90%;
   }
</style>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/seller.css">

                                    <div class="modal fade bs-example-modal-lg" id="panModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div style="max-width: 1000px;" class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Seller PAN Documents</h5>
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
													<input type="hidden" id="doctype" name="doctype" value="1">
													
												
													<div class="modal-body">
														<div class="form-group">
															<label for="recipient-name" class="col-form-label">Please Select PAN Document - </label>
															<input type="file" class="form-control" id="pandocfile" name="pandocfile" accept=".pdf" maxsize=2MB>
														</div>
													</div>
													
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" id="pandocfilebtn"  name="submit" disabled="disable" class="btn btn-primary">Upload File</button>
													</div>
												</form>  
											</div>
										</div>
			                        </div>
									
									<div class="modal fade bs-example-modal-lg" id="tanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div style="max-width: 1000px;" class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Seller TAN Documents</h5>
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
													<input type="hidden" id="doctype" name="doctype" value="2">
													
												
													<div class="modal-body">
														<div class="form-group">
															<label for="recipient-name" class="col-form-label">Please Select TAN Document - </label>
															<input type="file" class="form-control" id="tandocfile" name="tandocfile" accept=".pdf" maxsize=2MB>
														</div>
													</div>
													
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" id="tandocfilebtn"  name="submit" disabled="disable" class="btn btn-primary">Upload File</button>
													</div>
												</form>  
											</div>
										</div>
			                        </div>
									
									<div class="modal fade bs-example-modal-lg" id="gstinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div style="max-width: 1000px;" class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Seller GSTIN Documents</h5>
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
													<input type="hidden" id="doctype" name="doctype" value="3">													
												
													<div class="modal-body">
														<div class="form-group">
															<label for="recipient-name" class="col-form-label">Please Select GSTIN Document - </label>
															<input type="file" class="form-control" id="gstindocfile" name="gstindocfile" accept=".pdf" maxsize=2MB>
														</div>
													</div>
													
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" id="gstindocfilebtn"  name="submit" disabled="disable" class="btn btn-primary">Upload File</button>
													</div>
												</form>  
											</div>
										</div>
			                        </div>
									
									<div class="modal fade bs-example-modal-lg" id="gemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div style="max-width: 1000px;" class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Seller GEM Registration Documents</h5>
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
													<input type="hidden" id="doctype" name="doctype" value="4">
																									
													<div class="modal-body">
														<div class="form-group">
															<label for="recipient-name" class="col-form-label">Please Select GEM Registration Document - </label>
															<input type="file" class="form-control" id="gemdocfile" name="gemdocfile" accept=".pdf" maxsize=2MB>
														</div>
													</div>
													
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														<button type="submit" id="gemdocfilebtn"  name="submit" disabled="disable" class="btn btn-primary">Upload File</button>
													</div>
												</form>  
											</div>
										</div>
			                        </div>
								<div class="pcoded-content">
									<div class="pcoded-inner-content">
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
															   <li class="breadcrumb-item"><a href="#!">Documents</a></li>
															</ul>
														 </div>
													  </div>
												   </div>
												</div>
										    <div class="card">
											    <div class="container-fluid">
													<div class="row">
														<div class="col-lg-12 col-xlg-12 col-md-12">															
															<div class="row">
																<div class="col-12">																	
																	<?php  $this->load->view('backend/form_top',$sellerid); ?>																	
																	<div class="card card-outline-info">
																		<form action="<?php echo site_url('SellerRegister/submit_document'); ?>" method="post" enctype="multipart/form-data">
																			<div class="card-body">
																				<div class="note" style="border-radius: 5px;border: 2px solid; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 18px; text-transform: capitalize;color:black">
																					<i class="fa fa-file" aria-hidden="true" style="color:#ff0000;"></i>&nbsp;&nbsp;
																					<span style="color:#ff0000;">Upload  Documents</span> 
																				</div>
																			</div>
																			<div class="card-body">                                          										
																				<table class="table table-hover table-bordered" style="background: none">
																					<input type="hidden" class="form-control" name="labhid"    value="<?php echo $labhid; ?>">												
																					<input type="hidden" class="form-control" name="sellerid"  value="<?php echo $sellerid;  ?>">
																					<tbody>
																						<tr>
																							<th scope="row">1</th>
																							<td class="doc"><b>Permanent Account Number (PAN)</b><span class="red-color"> *</span> - </td>
																							<td>														    
																								<?php   
																								   $pandoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='1' limit 1 ");
																								   $pandoc = $pandoc->num_rows();
																								   
																								if($pandoc>0){ ?>
																									<a href="#" style='width:180px!important;padding:7px!important;margin: -5px!important;' class="btn footer-button">															
																									<i class="check-icon fa fa-check" style="background-color:rgb(68 138 204)!important;font-size:17px;border: 1px solid white !important;color:white;"></i></a>
																								<?php } else {  ?>
																									<a href="#" style='width:180px!important;padding:7px!important;margin: -5px!important;' class="btn footer-button" class="btn btn-warning btn-xs mr5 add_gem_doc" data-toggle="modal"  data-target="#panModal" data-whatever="@mdo">
																									   <i class="fa fa-upload" style="font-size:17px;color:white;">&nbsp;&nbsp;<b>Upload Document</b></i>
																									</a>
																								<?php  }  ?>
																																						  
																							</td>													   
																						</tr>
																						<tr>
																							<th scope="row">2</th>
																							<td class="doc"><b>Tax Deduction Account Number (TAN) - </b> </td>
																							<td>													    
																								<?php   
																								   $tandoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='2' limit 1 ");
																								   $tandoc = $tandoc->num_rows();
																								   
																								if($tandoc >0){ ?>
																									<a href="#" style='width:180px!important;padding:7px!important;margin: -5px!important;' class="btn footer-button">															
																									<i class="check-icon fa fa-check" style="background-color:rgb(68 138 204)!important;font-size:17px;border: 1px solid white !important;color:white;"></i></a>
																								<?php } else {  ?>
																									<a href="#" style='width:180px!important;padding:7px!important;margin: -5px!important;' class="btn footer-button" class="btn btn-warning btn-xs mr5 add_gem_doc" data-toggle="modal"  data-target="#tanModal" data-whatever="@mdo">
																									   <i class="fa fa-upload" style="font-size:17px;color:white;">&nbsp;&nbsp;<b>Upload Document</b></i>
																									</a>
																								<?php  }  ?>
																							</td>
																						  
																						</tr>
																						<tr>
																							<th scope="row">3</th>
																							<td class="doc"><b>GSTIN - </b></td>
																							<td>														    
																								<?php   
																								   $gstindoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='3' limit 1 ");
																								   $gstindoc = $gstindoc->num_rows();
																								   
																								if($gstindoc >0){ ?>
																									<a href="#" style='width:180px!important;padding:7px!important;margin: -5px!important;' class="btn footer-button">															
																									<i class="check-icon fa fa-check" style="background-color:rgb(68 138 204)!important;font-size:17px;border: 1px solid white !important;color:white;"></i></a>
																								<?php } else {  ?>
																									<a href="#" style='width:180px!important;padding:7px!important;margin: -5px!important;' class="btn footer-button" class="btn btn-warning btn-xs mr5 add_gem_doc" data-toggle="modal"  data-target="#gstinModal" data-whatever="@mdo">
																									   <i class="fa fa-upload" style="font-size:17px;color:white;">&nbsp;&nbsp;<b>Upload Document</b></i>
																									</a>
																								<?php  }  ?>
																							</td>													    
																						</tr>
																						<tr>
																							<th scope="row">4</th>
																							<td class="doc"><b>GeM Registration Document </b><span class="red-color">*</span> - </td>
																							<td>														    
																								<?php   
																								   $gemdoc = $this->db->query("SELECT * FROM seller_document WHERE seller_id='".$sellerid."' AND doc_type_id='4' limit 1 ");
																								   $gemdoc = $gemdoc->num_rows(); 
																								   
																								if($gemdoc >0){ ?>
																									<a href="#" style='width:180px!important;padding:7px!important;margin: -5px!important;' class="btn footer-button">															
																									<i class="check-icon fa fa-check" style="background-color:rgb(68 138 204)!important;font-size:17px;border: 1px solid white !important;color:white;"></i></a>
																								<?php } else {  ?>
																									<a href="#" style='width:180px!important;padding:7px!important;margin: -5px!important;' class="btn footer-button" class="btn btn-warning btn-xs mr5 add_gem_doc" data-toggle="modal"  data-target="#gemModal" data-whatever="@mdo">
																									   <i class="fa fa-upload" style="font-size:17px;color:white;">&nbsp;&nbsp;<b>Upload Document</b></i>
																									</a>
																								<?php  }  ?>														    
																							</td>													                                  
																						</tr>
																					<!--	
																						<tr>
																							<th scope="row">5</th>
																							<td class="doc"><b>Proof of payment/DD/Cheque - </b></td>
																							<td>
																							   <a href="#" style='width:250px!important;padding:10px!important;margin: -5px!important;' class="btn footer-button" class="btn btn-warning btn-xs mr5 add_doc" data-toggle="modal"  data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-upload" style="font-size:17px;color:white;">&nbsp;&nbsp;<b>Upload Document</b></i></a>
																							</td>													    
																						</tr>
																					-->	
																					</tbody>
																				</table>
																			</div>	
																																													
																			<div class="form-actions col-md-12">                                         
																				<section class="btn-section">
																				  <div class="row">
																					 <div class="col-md-12">
																						<div class="" style="float:right;">													   								    
																							<?php 
																								if($pandoc && $tandoc && $gstindoc && $gemdoc >0)  {  ?>
																							
																								<!-- <button type="button" class="btn footer-button">Previous</button> -->
																								<button type="submit" name="submit" class="btn footer-button"><i class="fa fa-check"></i> Save & Next</button>
																								<!-- <button type="button" class="btn footer-button">Success</button> -->
																						   <?php } else {  ?>
																								<!-- <button type="button" class="btn footer-button">Previous</button> -->
																								<button type="submit" name="submit" class="btn footer-button" disabled="disable"><i class="fa fa-check"></i> Save & Next</button>
																								<!-- <button type="button" class="btn footer-button">Success</button> -->
																						   <?php  }  ?>														   
																						</div>
																					 </div>
																				  </div>
																				</section>
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
								    </div></div>
   </div></div>
 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script type="text/javascript">

    $(document).ready(function () 
	{
        //$('.form-control-pan').on('change', function () 
		$('#pandocfile').on('change', function ()
		{   
		    //alert("File size must under 2MB !");
            var fileEmpty = $('#pandocfile').get(0).files.length === 0;
            var size = parseFloat(pandocfile.files[0].size / 1048576).toFixed(2);
            
            if (!fileEmpty && size>2) 
            {
                alert("File size must under 2MB !");
                //return;
                $('#pandocfilebtn').prop('disabled', true);
            } 
            else if(!fileEmpty && size<=2) 
            {
                $('#pandocfilebtn').prop('disabled', false);
            }
            else
            {
                $('#pandocfilebtn').prop('disabled', true);
            }
        });
		
		
		//$('.form-control-pan').on('change', function () 
		$('#tandocfile').on('change', function ()
		{   
		    //alert("File size must under 2MB !");
            var fileEmpty = $('#tandocfile').get(0).files.length === 0;
            var size = parseFloat(tandocfile.files[0].size / 1048576).toFixed(2);
            
            if (!fileEmpty && size>2) 
            {
                alert("File size must under 2MB !");
                //return;
                $('#tandocfilebtn').prop('disabled', true);
            } 
            else if(!fileEmpty && size<=2) 
            {
                $('#tandocfilebtn').prop('disabled', false);
            }
            else
            {
                $('#tandocfilebtn').prop('disabled', true);
            }
        });
		
		
		//$('.form-control-pan').on('change', function () 
		$('#gstindocfile').on('change', function ()
		{   
		    //alert("File size must under 2MB !");
            var fileEmpty = $('#gstindocfile').get(0).files.length === 0;
            var size = parseFloat(gstindocfile.files[0].size / 1048576).toFixed(2);
            
            if (!fileEmpty && size>2) 
            {
                alert("File size must under 2MB !");
                //return;
                $('#gstindocfilebtn').prop('disabled', true);
            } 
            else if(!fileEmpty && size<=2) 
            {
                $('#gstindocfilebtn').prop('disabled', false);
            }
            else
            {
                $('#gstindocfilebtn').prop('disabled', true);
            }
        });
		
		//$('.form-control-pan').on('change', function () 
		$('#gemdocfile').on('change', function ()
		{   
		    //alert("File size must under 2MB !");
            var fileEmpty = $('#gemdocfile').get(0).files.length === 0;
            var size = parseFloat(gemdocfile.files[0].size / 1048576).toFixed(2);
            
            if (!fileEmpty && size>2) 
            {
                alert("File size must under 2MB !");
                //return;
                $('#gemdocfilebtn').prop('disabled', true);
            } 
            else if(!fileEmpty && size<=2) 
            {
                $('#gemdocfilebtn').prop('disabled', false);
            }
            else
            {
                $('#gemdocfilebtn').prop('disabled', true);
            }
        });
		
		
		
		
		
		
    });
    
    

</script>



<script>

	$(document).ready(function() {
	    
		$('#example').DataTable( {
			dom: 'Bfrtip',
			scrollX: true,
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		} );
		
		
		$(document).on('click', '.add_doc', function(){
                    var eid = $(this).attr("id");
                    //alert(eid);
                    var hscode=eid.split("-");
                    //alert(hscode);
                    $('#hostelid').val(hscode[0]);
                    $('#hostelcode').val(hscode[1]);
                    $('#docser').val(hscode[2]);
                    

                });
		
		
		
	} );

</script>
