<?php

    if($this->session->userdata('user_login_access') != 1)
    {
       return redirect('Login'); 
    }
         
    $user_id = $this->session->userdata('user_login_id');   
    $usertype = $this->session->userdata('user_type');
                    
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
                                 <h4>Laabh Executive</h4>
                                 <!--<span>Optimising the table's layout for different screen</span>-->
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="page-header-breadcrumb">
                              <ul class="breadcrumb-title">
                                 <li class="breadcrumb-item"><a href="index.html"> <i class="feather icon-home"></i> </a></li>                                                               
                                 <li class="breadcrumb-item"><a href="#!">All Laabh Executive</a></li>                                
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="page-body">
                     <div class="card">
                        <div class="card-header">
                           <h5>All Registered Laabh Executive Details</h5>
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
                                    <th>Executive ID</th>
                                    <th>Executive Name</th>
                                    <th>Region</th>
									<th>Region State </th>									
					                <th>State Branch </th>
									<th>Division </th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Address</th>                                                                   
                                    <th>User Status</th>                        
                                    <th>Action</th>
                                </tr>
                           </thead>
                           <tbody>
                                 <?php
                                  $i=0;                                                                
                                  foreach($employeeslist as $value):
                                  $i++;								  
                                 ?>
                                 <tr>
                                    <td><?php echo $i; ?></td>
									<td><img class="rounded-circle" width="50" height="50" src="<?php echo base_url(); ?><?php echo $value->em_image ?>"></td>
                                    <td><?php echo $value->user_id?></td>                  
                                    <td><?php echo ucwords(strtolower($value->first_name));?></td>
                                    <td>
									<?php 
									/*																																								
										$region_name='';
																								
										$seller_payment_details = $this->db->query("SELECT * FROM region WHERE region_id='".$value->region."' ");
										$pay_details= $seller_payment_details->result();
										//print_r($this->db->last_query());
										foreach($pay_details as $pay_det)
										{			
											$region_name = $pay_det->region_name;																																									
										}
										
										echo $region_name." (".$value->region.")";
                                    */	
                                        echo "Region - ".$value->region;									
									?> 
								    </td>
								    <td>
									<?php 
																																																	
										$region_state_name='';
																								
										$seller_payment_details = $this->db->query("SELECT * FROM region WHERE region_id='".$value->region."' and id='".$value->region_state."' ");
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
									<td>
									<?php 
																																																	
										$division_name='';
																								
										$seller_payment_details = $this->db->query("SELECT * FROM division WHERE id='".$value->division."' ");
										$pay_details= $seller_payment_details->result();
										//print_r($this->db->last_query());
										foreach($pay_details as $pay_det)
										{			
											$division_name = $pay_det->division_name;																																									
										}
										
										echo $division_name;		
									?> 
								    </td>
                                    <td><?php echo $value->contact_no ?></td>
                                    <td><?php echo $value->em_email?></td>
                                    <td><?php echo $value->present_full_address ?> <?php echo $value->present_city ?> <?php echo $value->district_first ?> <?php echo $value->state_first ?>, <?php echo $value->present_pincode ?></td>                                                                  
                                    <td>
                                       <!--<span class="icon icon-success"></span>-->
                                       <?php 
                                        if($value->user_status==0)
                                        {
                                            echo "<i class='fa fa-exclamation-circle Pending' aria-hidden='true'></i>";
                                        }
                                        if($value->user_status==1)
                                        {
                                            echo "<i class='fa fa-check-circle-o approved ' aria-hidden='true' ></i>";
                                        }
                                        if($value->user_status==2)
                                        {
                                            echo "<i class='fa fa-times Rejected ' aria-hidden='true' ></i>";
                                        }
                                       ?>
                                    </td> 
                                    <?php if($usertype==1) { ?>
                                        <td class="jsgrid-align-center ">                         
                                           <a href="<?php echo base_url();?>Laabh_executive/Laabh_Executive_Details/<?php echo $value->id; ?>/<?php echo $value->user_id; ?>/<?php echo $value->user_type; ?>/<?php echo $value->region; ?>" title="view" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a>
                                        </td>									                                                                       
                                    <?php } else if($usertype==6) { ?>
                                        <td class="jsgrid-align-center ">                         
                                           <a href="<?php echo base_url();?>Laabh_executive/Laabh_Executive_Details/<?php echo $value->id; ?>/<?php echo $value->user_id; ?>/<?php echo $value->user_type; ?>/<?php echo $value->region; ?>" title="view" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a>
                                           <!-- <a href="<?php echo base_url();?>SellerRegister/seller_personal_details/<?php echo $value->seller_id; ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-pencil-square-o"></i></a>-->                           
                                           <!--<a href="<?php echo base_url();?>SellerRegister/seller_personal_details/<?php echo $value->seller_id; ?>" title="Delete" onclick="confirm('Are Yoy Want To Delet This Seller!!!')" class="btn btn-sm btn-info waves-effect waves-light sellerdelet"><i class="fa fa-trash-o"></i></a>-->
                                        </td>
									<?php } else if($usertype==11) { ?>
                                        <td class="jsgrid-align-center ">                         
                                           <a href="<?php echo base_url();?>Laabh_executive/Laabh_Executive_Details/<?php echo $value->id; ?>/<?php echo $value->user_id; ?>/<?php echo $value->user_type; ?>/<?php echo $value->region; ?>" title="view" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a>
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