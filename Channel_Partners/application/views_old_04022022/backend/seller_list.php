<?php

    if($this->session->userdata('user_login_access') != 1)
    {
       return redirect('Login'); 
    }
     
     
    $user_id = $this->session->userdata('user_login_id');	
    $user_type = $this->session->userdata('user_type');
    	
    	
    //$seller_payment = $this->db->query("SELECT * FROM seller WHERE seller_id='".$user_id."'AND labh_agent_id='".$user_id."'  AND isactive=1 ");
    //$sellerpayment= $seller_payment->result();
    //print_r($sellerpayment);
    //foreach($sellerpayment as $pay)
    //{				
       // $ispaid = $pay->ispaid;							
       // $pay_status = $pay->pay_status;
        //$reg_duration = $pay->reg_duration;
        //$renew_date = $pay->renew_date;							
    //}
        
?>

<style>
   <!--@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');-->
   h1,h2,h3,h4,h5,h6,p,li,a tr th td span{
   font-family: 'Poppins', sans-serif;
   color:#67757c;
 
   }
   .fc-fri {
   background-color: #FFEB3B;
   }
   .fc-event, .fc-event-dot {
   background-color: #FF5722;
   }
   .fc-event {
   border: 0;
   }
   .fc-day-grid-event {
   margin: 0;
   padding: 0;
   }
   .dayWithEvent {
   background: #FFEB3B;
   cursor: pointer;
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
<head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
</head>
<!--
<script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js" nonce="4b1d7f9d-ab42-4815-ae4b-bcee5fb43cb7"></script><script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyQWRtaW50eSUyMC0lMjBQcmVtaXVtJTIwQWRtaW4lMjBUZW1wbGF0ZSUyMGJ5JTIwQ29sb3JsaWIlMjAlMjIlMkMlMjJ4JTIyJTNBMC41OTEzNTYwNTMwMDk5MzIlMkMlMjJ3JTIyJTNBMTM2NiUyQyUyMmglMjIlM0E3NjglMkMlMjJqJTIyJTNBNzg5JTJDJTIyZSUyMiUzQTE4MjElMkMlMjJsJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZjb2xvcmxpYi5jb20lMkYlMkZwb2x5Z29uJTJGYWRtaW50eSUyRmRlZmF1bHQlMkZkdC1leHQtcmVzcG9uc2l2ZS5odG1sJTIyJTJDJTIyciUyMiUzQSUyMmh0dHBzJTNBJTJGJTJGY29sb3JsaWIuY29tJTJGJTJGcG9seWdvbiUyRmFkbWludHklMkZkZWZhdWx0JTJGZHQtZXh0LWtleS10YWJsZS5odG1sJTIyJTJDJTIyayUyMiUzQTI0JTJDJTIybiUyMiUzQSUyMlVURi04JTIyJTJDJTIybyUyMiUzQS0zMzAlMkMlMjJxJTIyJTNBJTVCJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjIwJTIyJTJDJTIyVSUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyMSUyMiUyQyUyMkElMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjIlMjIlMkMlMjItJTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjIzJTIyJTJDJTIyMiUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyNCUyMiUyQyUyMjMlMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjUlMjIlMkMlMjI1JTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjI2JTIyJTJDJTIyOCUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyNyUyMiUyQyUyMjElMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjglMjIlMkMlMjI1JTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjI5JTIyJTJDJTIyNiUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyMTAlMjIlMkMlMjI4JTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjIxMSUyMiUyQyUyMi0lMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjEyJTIyJTJDJTIyMSUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyMTMlMjIlMkMlMjIzJTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTVEJTdE"></script><script nonce="4b1d7f9d-ab42-4815-ae4b-bcee5fb43cb7">(function(w,d){!function(eK,eL,eM,eN){eK.zarazData=eK.zarazData||{};eK.zarazData.executed=[];eK.zaraz={deferred:[],listeners:[]};eK.zaraz.q=[];eK.zaraz._f=function(eO){return function(){var eP=Array.prototype.slice.call(arguments);eK.zaraz.q.push({m:eO,a:eP})}};for(const eQ of["track","set","debug"])eK.zaraz[eQ]=eK.zaraz._f(eQ);eK.zaraz.init=()=>{var eR=eL.getElementsByTagName(eN)[0],eS=eL.createElement(eN),eT=eL.getElementsByTagName("title")[0];eT&&(eK.zarazData.t=eL.getElementsByTagName("title")[0].text);eK.zarazData.x=Math.random();eK.zarazData.w=eK.screen.width;eK.zarazData.h=eK.screen.height;eK.zarazData.j=eK.innerHeight;eK.zarazData.e=eK.innerWidth;eK.zarazData.l=eK.location.href;eK.zarazData.r=eL.referrer;eK.zarazData.k=eK.screen.colorDepth;eK.zarazData.n=eL.characterSet;eK.zarazData.o=(new Date).getTimezoneOffset();if(eK.dataLayer)for(const eX of Object.entries(Object.entries(dataLayer).reduce(((eY,eZ)=>({...eY[1],...eZ[1]})))))zaraz.set(eX[0],eX[1],{scope:"page"});eK.zarazData.q=[];for(;eK.zaraz.q.length;){const e_=eK.zaraz.q.shift();eK.zarazData.q.push(e_)}eS.defer=!0;for(const fa of[localStorage,sessionStorage])Object.keys(fa||{}).filter((fc=>fc.startsWith("_zaraz_"))).forEach((fb=>{try{eK.zarazData["z_"+fb.slice(7)]=JSON.parse(fa.getItem(fb))}catch{eK.zarazData["z_"+fb.slice(7)]=fa.getItem(fb)}}));eS.referrerPolicy="origin";eS.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(eK.zarazData)));eR.parentNode.insertBefore(eS,eR)};["complete","interactive"].includes(eL.readyState)?zaraz.init():eK.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>
-->

<div class="pcoded-main-container">
	<div class="pcoded-wrapper">
		<div class="pcoded-content">
			<div class="pcoded-inner-content">
				<div class="main-body">
					<div class="page-wrapper">
						<div class="page-header">
							<div class="row align-items-end">
								<div class="col-lg-8">
									<div class="page-header-title">
										<div class="d-inline"><br>
											<h4>Sellers</h4>
											<!--<span>Optimising the table's layout for different screen</span>-->
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="page-header-breadcrumb">
										<ul class="breadcrumb-title">
											<li class="breadcrumb-item"><a href="index.html"> <i class="feather icon-home"></i> </a></li>																					
											<li class="breadcrumb-item"><a href="#!">All Sellers</a></li>											
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="page-body">
							<div class="card">
								<div class="card-header">
									<h5>All Onborded Sellers onborded by Laabh Agents</h5>
									<!--<span>The Responsive extension for DataTables can be applied to a DataTable in one of two ways; with a specific class name on the table, or using the DataTables initialisation options. This method shows the latter, with the responsive option being set to the boolean value true.</span>-->
									<div class="card-header-right">
									<ul class="list-unstyled card-option">
									<li><i class="feather icon-maximize full-card"></i></li>
									<li><i class="feather icon-minus minimize-card"></i></li>
									<li><i class="feather icon-trash-2 close-card"></i></li>
									</ul>
									</div>
								</div>
								<div class="card-block">
									<!--<table id="res-config" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="res-config_info" style="width: 1483px;">
									-->
									<table  id="example" class="w-100 table table-striped table-bordered table-hover" width="100%">	
									<thead>
										<tr>
												<th>Sr.</th>
												<th>Image</th>
												<th>Laabh Executive Id</th>
												<th>Laabh Agent Id</th>
												<th>Seller ID</th>
												<th>Seller Name</th>
												<th>Region</th>
                                                <th>Region State </th>
					                            <th>State Branch </th>												
												<th>Contact</th>
												<th>Email</th>
												<th>Address</th>
												<th>Pincode</th>
												<th>Manager Approvel</th>
												<th>Executive Approvel</th>
												<th>Seller Status</th>                        
												<th>Action</th>
											 </tr>
									</thead>
									<tbody>
											<?php
											$i=0;
											foreach($sellerlist as $value): 
											$i++;
											?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><img class="rounded-circle" width="50" height="50" src="<?php echo base_url(); ?><?php echo $value->seller_image ?>"></td>
												<td><?php echo $value->labh_emp_id?></td>
												<td><?php echo $value->labh_agent_id ?></td>
												<td><?php echo $value->seller_id?></td>						
												<td><?php echo ucwords(strtolower($value->fname));?></td>
												
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
													
													echo $region_name." (".$value->region_id.")";		
												?> 
											    </td>
											  <td>
												<?php 
																																																				
													$region_state_name='';
																											
													$seller_payment_details = $this->db->query("SELECT * FROM region WHERE region_id='".$value->region_id."' and id='".$value->region_state."' ");
													$pay_details= $seller_payment_details->result();
													//print_r($this->db->last_query());
													foreach($pay_details as $pay_det)
													{			
														$region_state_name = $pay_det->region_name;																																									
													}
													
													echo $region_state_name;		
												?> 
											  </td>
											  <td>
												<?php 
																																																				
													$district_branch_name='';
																											
													$seller_payment_details = $this->db->query("SELECT * FROM district_branch WHERE Districtcode='".$value->district_branch."' ");
													$pay_details= $seller_payment_details->result();
													//print_r($this->db->last_query());
													foreach($pay_details as $pay_det)
													{			
														$district_branch_name = $pay_det->Districtname;																																									
													}
													
													echo $district_branch_name;		
												?> 
											  </td>

												
												<td><?php echo $value->contact ?></td>
												<td><?php echo $value->email?></td>
												<td><?php echo $value->current_address ?></td>
												<td><?php echo $value->pincode_second ?></td>
												<td>
													<!--<span class="icon icon-success"></span>-->
													<?php 
														if($value->manager_approvel==0)
														{
															echo "<i class='fa fa-exclamation-circle Pending' aria-hidden='true'></i>";
														}
														if($value->manager_approvel==1)
														{
															echo "<i class='fa fa-check-circle-o approved ' aria-hidden='true' ></i>";
														}
														if($value->manager_approvel==2)
														{
															echo "<i class='fa fa-times Rejected ' aria-hidden='true' ></i>";
														}
													?>
												</td>
												<td>
													<!--<span class="icon icon-success"></span>-->
													<?php 
														if($value->executive_approvel==0)
														{
															echo "<i class='fa fa-exclamation-circle Pending' aria-hidden='true'></i>";
														}
														if($value->executive_approvel==1)
														{
															echo "<i class='fa fa-check-circle-o approved ' aria-hidden='true' ></i>";
														}
														if($value->executive_approvel==2)
														{
															echo "<i class='fa fa-times Rejected ' aria-hidden='true' ></i>";
														}
													?>
												</td>
												<td>
													<!--<span class="icon icon-success"></span>-->
													<?php 
														if($value->seller_status==0)
														{
															echo "<i class='fa fa-exclamation-circle Pending' aria-hidden='true'></i>";
														}
														if($value->seller_status==1)
														{
															echo "<i class='fa fa-check-circle-o approved ' aria-hidden='true' ></i>";
														}
														if($value->seller_status==2)
														{
															echo "<i class='fa fa-times Rejected ' aria-hidden='true' ></i>";
														}
													?>
												</td> 
												
												<?php if($user_type==1) { ?>
													<td class="jsgrid-align-center ">                         
													   <a href="<?php echo base_url();?>SellerRegister/SellerDetails/<?php echo $value->seller_id; ?>" title="view" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a>
													  <!-- <a href="<?php echo base_url();?>SellerRegister/seller_personal_details/<?php echo $value->seller_id; ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-pencil-square-o"></i></a>-->                           
													  <!--<a href="<?php echo base_url();?>SellerRegister/seller_personal_details/<?php echo $value->seller_id; ?>" title="Delete" onclick="confirm('Are Yoy Want To Delet This Seller!!!')" class="btn btn-sm btn-info waves-effect waves-light sellerdelet"><i class="fa fa-trash-o"></i></a>-->
													</td>
												<?php } else if($user_type==2) { ?>
													<td class="jsgrid-align-center ">                         
													   <a href="<?php echo base_url();?>SellerRegister/SellerDetails/<?php echo $value->seller_id; ?>" title="view" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a>
													  <!-- <a href="<?php echo base_url();?>SellerRegister/seller_personal_details/<?php echo $value->seller_id; ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-pencil-square-o"></i></a>-->                           
													  <!--<a href="<?php echo base_url();?>SellerRegister/seller_personal_details/<?php echo $value->seller_id; ?>" title="Delete" onclick="confirm('Are Yoy Want To Delet This Seller!!!')" class="btn btn-sm btn-info waves-effect waves-light sellerdelet"><i class="fa fa-trash-o"></i></a>-->
													</td>
												    <?php 
												} 
												else if($user_type==5) 
												{ 
											
											        if($value->seller_status==0)
											        {  ?>
														<td class="jsgrid-align-center ">                         
														   <a href="<?php echo base_url();?>SellerRegister/SellerDetails/<?php echo $value->seller_id; ?>" title="view" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a>
														   <a href="<?php echo base_url();?>SellerRegister/seller_personal_details/<?php echo $value->seller_id; ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-pencil-square-o"></i></a>                           
														   <!--<a href="<?php echo base_url();?>SellerRegister/seller_personal_details/<?php echo $value->seller_id; ?>" title="Delete" onclick="confirm('Are Yoy Want To Delet This Seller!!!')" class="btn btn-sm btn-info waves-effect waves-light sellerdelet"><i class="fa fa-trash-o"></i></a>-->
														</td>
												        <?php 
													} 
													else
													{  ?>
												       <td class="jsgrid-align-center ">                         
														   <a href="<?php echo base_url();?>SellerRegister/SellerDetails/<?php echo $value->seller_id; ?>" title="view" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a>
														   <a href="<?php echo base_url();?>SellerRegister/seller_personal_details/<?php echo $value->seller_id; ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-pencil-square-o"></i></a>                           
														   <!--<a href="<?php echo base_url();?>SellerRegister/seller_personal_details/<?php echo $value->seller_id; ?>" title="Delete" onclick="confirm('Are Yoy Want To Delet This Seller!!!')" class="btn btn-sm btn-info waves-effect waves-light sellerdelet"><i class="fa fa-trash-o"></i></a>-->
														</td>
													    <?php 
													}										    
												}
												else if($user_type==6) { ?>
													<td class="jsgrid-align-center ">                         
													   <a href="<?php echo base_url();?>SellerRegister/SellerDetails/<?php echo $value->seller_id; ?>" title="view" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a>
													  <!-- <a href="<?php echo base_url();?>SellerRegister/seller_personal_details/<?php echo $value->seller_id; ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-pencil-square-o"></i></a>-->                           
													  <!--<a href="<?php echo base_url();?>SellerRegister/seller_personal_details/<?php echo $value->seller_id; ?>" title="Delete" onclick="confirm('Are Yoy Want To Delet This Seller!!!')" class="btn btn-sm btn-info waves-effect waves-light sellerdelet"><i class="fa fa-trash-o"></i></a>-->
													</td>
												<?php }  ?>
											</tr>
											<?php endforeach; ?>
										  </tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>