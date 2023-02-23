<?php
   if($this->session->userdata('user_login_access') != 1)
   {
      return redirect('Login'); 
   }
   
   $login_id = $this->session->userdata('user_login_id');
    
   if(isset($user_id))
   {              
      $user_id=$user_id;                    
   }
   else
   {
      $user_id=" ";      
   }
   
   $id = "";
   $user_id = "";
   $update = "";
   $des_id = "";
   $designation = "";
   $user_type = "";
   $Laabh_executive = "";
   $designation = "";
   $first_name ="";
   $contact_no ="";
   $alter_mobileno ="";
   $em_email ="";
   $em_gender ="";
   $em_birthday ="";
   $region ="";
   
    $region_state ="";
   $district_branch  ="";
   
   
   $division_id ="";
   $state_first = "";
   $district_first = "";
   $present_city ="";
   $present_pincode ="";
   $present_full_address ="";
   $state_second = "";
   $district_second = "";
   $permanent_city ="";
   $permanent_pincode ="";
   $permanent_full_address ="";
   $joining_date ="";
   $aadhar_number ="";
   $pan_number ="";
   $pf_number ="";
   $bank_name ="";
   $bank_acc_no ="";
   $ifsc_code ="";
   $em_image ="";
   $signature ="";
   $upload_resume ="";
   $marksheet ="";
   $experience_letter ="";
   
   if(isset($Employee_Details) && $Employee_Details !="")
   {
      $update = true;
      foreach($Employee_Details as $row)
      {
         $id = $row['id'];
         $user_id = $row['user_id'];
         $user_type = $row['user_type'];
         $Laabh_executive = $row['Laabh_executive'];
         $designation = $row['designation'];
         $first_name =$row['first_name'];
         $contact_no =$row['contact_no'];
         $alter_mobileno =$row['alter_mobileno'];
         $em_email =$row['em_email'];
         $em_gender =$row['em_gender'];
         $em_birthday =$row['em_birthday'];
         $region =$row['region'];
   
   
         $region_state =$row['region_state'];
         $district_branch =$row['district_branch'];
   
         $division_id =$row['division'];
         $state_first = $row['state_first'];
         $district_first = $row['district_first'];
         $present_city =$row['present_city'];
         $present_pincode =$row['present_pincode'];
         $present_full_address =$row['present_full_address'];
         $state_second = $row['state_second'];
         $district_second = $row['district_second'];
         $permanent_city =$row['permanent_city'];
         $permanent_pincode =$row['permanent_pincode'];
         $permanent_full_address =$row['permanent_full_address'];
         $joining_date =$row['joining_date'];
         $aadhar_number =$row['aadhar_number'];
         $pan_number =$row['pan_number'];
         $pf_number =$row['pf_number'];
         $bank_name =$row['bank_name'];
         $bank_acc_no =$row['bank_acc_no'];
         $ifsc_code =$row['ifsc_code'];
         $em_image =$row['em_image'];
         $signature =$row['signature'];
         $upload_resume =$row['upload_resume'];
         $marksheet =$row['marksheet'];
         $experience_letter =$row['experience_letter'];
   }
   }
   ?>
<style>
   .star{
   color:red;
   font-size: 18px;
   }
   .region_list{
  /* width: 88%;*/
   border: 1px solid #ccc;
   }
   .dropdown-toggle::after {
   display: none;
   }
   .fa-angle-down{
   font-weight: bold;
   }
   .table-wrapper-scroll-y{
	   font-size:12px;
   }

   .btn {
    border-radius: 2px;
    text-transform: capitalize;
    font-size: 14px!important;
    /* padding: 10px 19px; */
    cursor: pointer;
}

</style>
<div class="pcoded-content">
   <div class="pcoded-inner-content">
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
                           <li class="breadcrumb-item"><a href="#!">Register Employee</a></li>
                        </ul>
                     </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card">
                        <form id="employee_registration_form" action="<?php echo base_url()?>Admin/add_employee" method="post" enctype="multipart/form-data">
                           <div class="card-header">
                              <h5>Register new Employees</h5>
                              <span>fields with <b style="color:red;">* </b> is mandatory !</span>
                              <div class="card-header-right">
                                 <ul class="list-unstyled card-option">
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                    <li><i class="feather icon-trash-2 close-card"></i></li>
                                 </ul>
                              </div>
                           </div>
                           <div  style="background-color: #fff;border-top: 1px dashed #1abc9c;padding: 20px 25px;position: inherit"></div>
                           <div class="card-block">
                              <div class="row">
                                 <div class="col-sm-12">
                                    <h4 class="sub-title" style="color:red;"><i class="fa fa-user-secret"></i>&nbsp; Employee Details :</h4>
                                    <div class="card-block inner-card-block">
                                        <div class="row m-b-30">
                                          <input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>" placeholder="">
                                          <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" placeholder="">
                                          <div class="col-sm-3">
                                             <h4 class="sub-title">User Type <span class="star"> * </span></h4>
											 <?php //echo $user_type ; ?>
												   
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                                                <select id="user_type" name="user_type" onchange ="ShowHideDiv()" class="form-control "required>
                                                   <option value=""> select user type </option>
                                                   <option value="11" <?php echo $user_type == "11" ? "selected" : "";?>>Assistant General Manager</option>
                                                   <option value="6" <?php echo $user_type == "6" ? " selected" : "";?>>Branch Manager</option>
                                                   <!--<option value="13" <?php echo $user_type == "13" ? " selected" : "";?>>Assistant manager</option>-->
                                                   <option value="2" <?php echo $user_type == "2" ? " selected" : "";?>>Laabh Executive</option> 
                                                   <option value="7" <?php echo $user_type == "7" ? " selected" : "";?>>Senior Office Executive</option> 												   
                                                   <option value="8" <?php echo $user_type == "8" ? " selected" : "";?>>Office Executive (GEM)</option>
                                                   <option value="9" <?php echo $user_type == "9" ? " selected" : "";?>>Office Support Staff</option>                                                                                                     
                                                   <option value="10" <?php echo $user_type == "10" ? " selected" : "";?>>Customer Care Executive</option>
                                                   <option value="12" <?php echo $user_type == "12" ? " selected" : "";?>>Senior Executive</option>                                                                                                
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title">Designation <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                                                <select id="designation" name="designation" class="form-control form-control" required>
                                                   <option value=""> select designation </option>
                                                   <?php												 
                                                      //var_dump($Employee_Designation);
                                                      if(isset($Employee_Designation) && $Employee_Designation !="")
                                                      {  
                                                      foreach($Employee_Designation as $row) 
                                                      {  ?>                                                 
                                                   <option value="<?= $row->value; ?>"<?php echo $designation == $row->value ? " selected" : "";?>><?= $row->des_name; ?> (<?= $row->value; ?>)</option>
                                                   <?php  } } ?>   
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title">Employee Name <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control"  id="emp_name"  name="first_name" placeholder="Name" required   value="<?php echo $first_name; ?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title">Mobile Number <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" placeholder="+91" id="contact" name="contact_no" minlength="10" maxlength="12" required value="<?php echo $contact_no;?>">
                                             </div>
                                          </div>
                                        </div>
										
                                        <div class="row m-b-30">
                                          <div class="col-sm-3">
                                             <h4 class="sub-title">Alternate Number </h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" placeholder="+91"  id="phone" name="alter_mobileno" minlength="10" maxlength="12" value="<?php echo $alter_mobileno; ?>" >
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title">Email Id  <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                                <input type="email" class="form-control" id="email" name="em_email" placeholder="Email" required  value="<?php echo $em_email ; ?>" >
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title">Gender <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <select name="em_gender" id="gender" class="form-control form-control" required>
                                                   <option value="">Select Gender</option>
                                                   <option value="MALE" <?php echo $em_gender == "MALE" ? " selected" : "";?>>Male</option>
                                                   <option value="FEMALE" <?php echo $em_gender == "FEMALE" ? " selected" : "";?>>Female</option>
                                                   <option value="OTHER" <?php echo $em_gender == "OTHER" ? " selected" : "";?>>Other</option>
                                                </select>
                                             </div>
                                          </div>
										            <div class="col-sm-3">
                                             <h4 class="sub-title">Date of Birth <span class="star"> * </span> </h4>
                                             <div class="form-group">
                                                <div class="input-group date" id="datetimepicker1">
                                                   <span class="input-group-addon " style=""><span class="icofont icofont-ui-calendar"></span></span>                                                                                                     
                                                   <input type="date" class="form-control" id="dob"  name="em_birthday" required value="<?php echo $em_birthday; ?>">                   
                                                </div>
                                             </div>
                                          </div>
                                        </div>
										
                                        <div class="row m-b-30">                                        										  										  
                                          <div class="col-md-4" id="single_reg_id" style="display: block">
                                             <h4 class="sub-title">Region <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>						
                                                <select id="sing_region_id" name="single_reg_val" class="form-control"  autocomplete="off" >
                                                   <option value=""> --- Select region --- </option>
                                                   <option value="1" <?php echo $region == "1" ? " selected" : "";?>>Region 1</option>
                                                               <option value="2" <?php echo $region == "2" ? " selected" : "";?>>Region 2</option>
                                                               <option value="3" <?php echo $region == "3" ? " selected" : "";?>>Region 3</option>
                                                   <option value="4" <?php echo $region == "4" ? " selected" : "";?>>Region 4</option>
                                                   <option value="5" <?php echo $region == "5" ? " selected" : "";?>>Region 5</option>
                                                   <option value="6" <?php echo $region == "6" ? " selected" : "";?>>Region 6</option>													   						   
                                                </select>
                                             </div>
                                            </div>                                      
                                            <div class="col-md-4" id="single_reg_sta_id" style="display: block">
                                                <h4 class="sub-title">Region State  <span class="star"> * </span></h4>
                                                <div class="input-group">
                                                   <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                   <select id="single_region_state" name="single_reg_sta_val" class="form-control"  autocomplete="off" >                                                  
                                                      <option value="">-- Select Region State --</option>
                                                      <?php
                                                      if(isset($Employee_Details) && $Employee_Details !="") 
                                                      { 
                                                      //var_dump($country);
                                                      foreach($region_state_list as $rc)
                                                      {   ?>
                                                      
                                                      <option value="<?= $rc->id; ?>" <?php echo $region_state == $rc->id ? " selected" : ""; ?> ><?= $rc->region_name; ?></option>
                                                      <?php  
                                                      }
                                                      }													  														
                                                      ?> 
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="single_dist_bran_id" style="display: block">
												 <h4 class="sub-title"> Distinct Branch <span class="star"> * </span></h4>
												 <div class="input-group">
													<span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
													<select id="single_district_branch" name="single_district_branch_val" class="form-control"  autocomplete="off" >
													   <option value=""> --- Select Distinct Branch --- </option> 
													   <?php
														if(isset($Employee_Details) && $Employee_Details !="") 
														{ 
														  //var_dump($country);
														  foreach($districtbranch as $c)
														  { ?>
															 
															 <option value="<?= $c->Districtcode; ?>" <?php echo $district_branch == $c->Districtcode ? " selected" : ""; ?> ><?= $c->Districtname; ?></option>
															<?php  
														  }
														}													
														  ?> 
													</select>
												 </div>
                                            </div>
																			
                                            <div class="col-md-4" id="multiple_reg_id" style="display: none">										     
												 <h4 class="sub-title">Region <span class="star"> * </span></h4>
												 <div class="input-group dropdown region_list">
													<span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>                                                
													   <input type="hidden" class="form-control" id="reg_val" name="reg_val" required value="">
													   <button class="btn  bg-white text-left dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"  class="form-control"  autocomplete="off" required> ---  Select Employee Region  --- <span class="fa fa-angle-down ml-3" ></span></button>                                                  
														<ul class="dropdown-menu checkbox-menu " aria-labelledby="dropdownMenu1"  id="region_id" name="region[]" autocomplete="off" required style="width:260px;">                                                     
															<li>
															<label  class="px-3" >
															 <p class="mb-2"> --- Selcet Employee Region --- </p>
															 <input type="checkbox" class="table-wrapper-scroll-y my-custom-scrollbar" onchange="getcheck(1)" id="reg1" name="region[]" value="1" <?php echo $region == 1 ? " selected" : ""; ?>  style="height:13px;">&nbsp; <span style="font-size:16px;"> Region 1</span> <br>
															 <input type="checkbox" class="table-wrapper-scroll-y my-custom-scrollbar" onchange="getcheck(2)" id="reg2" name="region[]" value="2" <?php echo $region == 2 ? " selected" : ""; ?>  style="height:13px;">&nbsp; <span style="font-size:16px;"> Region 2</span> <br>
															 <input type="checkbox" class="table-wrapper-scroll-y my-custom-scrollbar" onchange="getcheck(3)" id="reg3" name="region[]" value="3" <?php echo $region == 3 ? " selected" : ""; ?>  style="height:13px;">&nbsp; <span style="font-size:16px;"> Region 3</span> <br>
															 <input type="checkbox" class="table-wrapper-scroll-y my-custom-scrollbar" onchange="getcheck(4)" id="reg4" name="region[]" value="4" <?php echo $region == 4 ? " selected" : ""; ?>  style="height:13px;">&nbsp; <span style="font-size:16px;"> Region 4</span> <br>
															 <input type="checkbox" class="table-wrapper-scroll-y my-custom-scrollbar" onchange="getcheck(5)" id="reg5" name="region[]" value="5" <?php echo $region == 5 ? " selected" : ""; ?>  style="height:13px;">&nbsp; <span style="font-size:16px;"> Region 5</span> <br>
															 <input type="checkbox" class="table-wrapper-scroll-y my-custom-scrollbar" onchange="getcheck(6)" id="reg6" name="region[]" value="6" <?php echo $region == 6 ? " selected" : ""; ?>  style="height:13px;">&nbsp; <span style="font-size:16px;"> Region 6</span> <br>
															 </label> 
															</li>                                                
														</ul>
													
												 </div>
                                            </div>
											
                                            <div class="col-md-4" id="multiple_reg_sta_id" style="display: none">
                                                <h4 class="sub-title">Region State  <span class="star"> * </span></h4>
                                                <div class="input-group dropdown region_list">
                                                   <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>                                               
                                                      <input type="hidden" class="form-control" id="reg_sta_val" name="reg_sta_val" required value="">
                                                      <button class="btn  bg-white text-left dropdown-toggle w-100" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"   class="form-control"  autocomplete="off" required > ---  Select region  State --- <span class="fa fa-angle-down ml-5"></span></button>                                                                                                       
                                                      <ul class="dropdown-menu checkbox-menu " aria-labelledby="dropdownMenu1"  id="region_state" name="region_state" autocomplete="off" required style="width:260px; height:280px; overflow:scroll;">
                                                      <?php
                                                      if(isset($Employee_Details) && $Employee_Details !="") 
                                                      { 
                                                         //var_dump($country);
                                                         foreach($region_state_list as $rc)
                                                         {   ?>
                                                            <li>
                                                               <label class="px-3" >
                                                                  <input type="checkbox" class="table-wrapper-scroll-y my-custom-scrollbar"   name="region_state[]" >&nbsp; <?= $c->region_name; ?> 
                                                               </label> 
                                                            </li>
                                                            <?php  
                                                         }
                                                      }                                                                                            
                                                      ?> 
                                                      </ul>                                               
                                                </div>
                                            </div>
											
                                            <div class="col-md-4" id="multiple_dist_bran_id" style="display: none">
												 <h4 class="sub-title"> District Branch <span class="star"> * </span></h4>
												 <div class="input-group dropdown region_list">
													<span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>                                             
													   <input type="hidden" class="form-control" id="district_branch_val" name="district_branch_val" required value="">
													   <button class="btn  bg-white text-left dropdown-toggle w-100" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"  class="form-control"  autocomplete="off" required> ---  District Branch --- <span class="fa fa-angle-down" style="margin-left:5rem!important;"></span>  </button>                                                                                                     
														<ul class="dropdown-menu checkbox-menu" aria-labelledby="dropdownMenu1" id="district_branch" name="district_branch[]" autocomplete="off" required required style="width:260px; height:280px; overflow:scroll;">
															<?php
															if(isset($Employee_Details) && $Employee_Details !="") 
															{ 
															   //var_dump($country);
																foreach($districtbranch as $c)
																{ ?>
																<li>
																	<label  class="px-3">
																	   <!--<input  class="table-wrapper-scroll-y my-custom-scrollbar"  type="checkbox" onchange="getcheckstate(<?= $rc->region_state; ?>)" id="regstate<?= $rc->region_state; ?>" value="<?= $c->regionstate_id; ?>" <?php echo $region == $c->region_state ? " selected" : ""; ?>  style="height:10px;">&nbsp; <?= $c->region_name; ?> -->
																	</label> 
																</li>
																<?php  
																}
															}                                                                                             
															?> 
														</ul>                                                
												 </div>
                                            </div>																						
										</div>
										
										<div class="row m-b-30">	
                                            <div class="col-sm-4">
												 <h4 class="sub-title">Division  <span class="star"> * </span></h4>
												 <div class="input-group">
													<span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
													<select id="division" name="division" class="form-control " required>
													   <option value=""> select division </option>
													   <?php
														  if(isset($division) && $division !="")
														  {                                      
														  foreach($division as $div)
														  {  ?>
													   <option value="<?= $div->id; ?>" <?php echo $division_id == $div->id ? " selected" : ""; ?> ><?= $div->division_name; ?></option>
													   <?php  } } ?>
													</select>
												 </div>
                                            </div>
                                        </div>
										
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-block">
                              <div class="row">
                                 <div class="col-sm-12">
                                    <h4 class="sub-title" style="color:red;"><i class="fa fa-map-marker"></i>&nbsp;Present Address :</h4>
                                    <div class="card-block inner-card-block">
                                       <div class="row m-b-30">
                                          <div class="col-md-3">
                                             <h4 class="sub-title"> State <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <select id="stateid_first" name="state_first" class="form-control"  autocomplete="off" required>
                                                   <option value=""> -- Select State -- </option>
                                                   <?php 
                                                      //var_dump($country);
                                                      foreach($state_list as $c)
                                                      {   ?>
                                                   <option value="<?= $c->statecode; ?>" <?php echo $state_first == $c->statecode ? " selected" : ""; ?> ><?= $c->statename; ?></option>
                                                   <?php  
                                                      }   ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3">
                                             <h4 class="sub-title"> District </h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <select id="district_first" name="district_first" class="form-control"  autocomplete="off" >
                                                   <?php                                                  
                                                      if(isset($Employee_Details) && $Employee_Details !="") 
                                                      {                                            
                                                         foreach($district_list as $dist)
                                                         {  ?>
                                                            <option value="<?= $dist->Districtcode; ?>" <?php echo $district_first == $dist->Districtcode ? " selected" : ""; ?>   ><?= $dist->Districtname; ?></option>
                                                            <?php  
                                                         } 
                                                      }
                                                      else 
                                                      {  ?>                                        
                                                         <option value=""> -- Select District -- </option>
                                                         <?php 
                                                      }   
                                                      ?>                                        
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title"> City <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>         
                                                <input type="text" class=" form-control"   id="present_city" name="present_city" placeholder="city"  required value="<?php echo $present_city ;?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title"> Pincode <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" id="pin_code1" name="present_pincode" placeholder="pincode"  pattern="[0-9]{6}" required value="<?php echo $present_pincode;?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row m-b-30">
                                          <div class="col-sm-12">
                                             <h4 class="sub-title"><i class="fa fa-home" aria-hidden="true"></i> Full Address <span class="star"> * </span></h4>
                                             <textarea class="form-control max-textarea" id="present_full_address" name="present_full_address" placeholder="present_full_address" maxlength="255" rows="3" required ><?php echo $present_full_address ;?></textarea>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-block">
                              <div class="row">
                                 <div class="col-sm-12">
                                    <h4 class="sub-title" style="color:red;"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Permanent Address :</h4>
                                    <div class="col-md-12">
                                       <div class="" style="float:center;">															   
                                          <b><span style="color:#3a8ace;"> <input type="checkbox" id='same_addr_check' name="same_addr_check"  onclick="autoFilAddress()"  >&nbsp; Same as Present address </span></b>                                                                                                                         
                                       </div>
                                    </div>
                                    <div class="card-block inner-card-block">
                                       <div class="row m-b-30">
                                          <div class="col-md-3">
                                             <h4 class="sub-title"> State <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <select id="stateid_second" name="state_second" class="form-control"  autocomplete="off" required>
                                                   <option value="">-- Select State --</option>
                                                   <?php 
                                                      //var_dump($country);
                                                      foreach($state_list as $c)
                                                      {   ?>
                                                   <option value="<?= $c->statecode; ?>" <?php echo $state_second == $c->statecode ? " selected" : ""; ?> ><?= $c->statename; ?></option>
                                                   <?php  
                                                      }   ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 ">
                                             <h4 class="sub-title"> District </h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <select id="district_second" name="district_second" class="form-control"  autocomplete="off" >
                                                   <?php 
                                                      if(isset($Employee_Details) && $Employee_Details !="") 
                                                      {                                            
                                                         foreach($district_list as $dist)
                                                         {  ?>
                                                            <option value="<?= $dist->Districtcode; ?>" <?php echo $district_second == $dist->Districtcode ? " selected" : ""; ?>   ><?= $dist->Districtname; ?></option>
                                                            <?php  
                                                         } 
                                                      }
                                                      else 
                                                      {  ?>
                                                         <option value=""> -- Select District -- </option>
                                                         <?php                                                                        
                                                         foreach($district_list as $dist)
                                                         {  ?>                                                           
                                                            <option value="<?= $dist->Districtcode; ?>" <?php echo $district_second == $dist->Districtcode ? " selected" : ""; ?>   ><?= $dist->Districtname; ?></option>
                                                            <?php  
                                                         } 
                                                      }   
                                                   ?>                                        
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title"> City <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-building-o" aria-hidden="true"></i></span>
                                                <input type="text" class=" form-control"  id="permanent_city" name="permanent_city" placeholder="city"  required value="<?php echo $permanent_city;?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title"> Pincode <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" id="pin_code2" name="permanent_pincode" placeholder="pincode"  pattern="[0-9]{6}" required value="<?php echo $permanent_pincode;?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row m-b-30">
                                          <div class="col-sm-12">
                                             <h4 class="sub-title"><i class="fa fa-home" aria-hidden="true"></i> Full Address <span class="star"> * </span></h4>
                                             <textarea class="form-control max-textarea" id="permanent_full_address" name="permanent_full_address" placeholder="Permanent Full Address" maxlength="255" rows="3" required><?php echo $permanent_full_address;?></textarea>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-block">
                              <div class="row">
                                 <div class="col-sm-12">
                                    <h4 class="sub-title" style="color:red;"><i class="fa fa-user-secret"></i>&nbsp; Other Details : </h4>
                                    <div class="card-block inner-card-block">
                                       <div class="row m-b-30">
                                          <div class="col-sm-3">
                                             <h4 class="sub-title">Date of Joining <span class="star"> * </span> </h4>
                                             <div class="form-group">
                                                <div class="input-group date" id="datetimepicker1">
                                                   <span class="input-group-addon " style="">
                                                   <span class="icofont icofont-ui-calendar"></span>
                                                   </span>
                                                   <input type="date" class="form-control" id="joining_date" name="joining_date" required value="<?php echo $joining_date; ?>">              
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title">Aadhar Number <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" id="aadharno" name="aadhar_number" placeholder="aadhar number" minlength="12" maxlength="12" required value="<?php echo $aadhar_number; ?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title">PAN Number <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" placeholder="pan number"  id="panNo" name="pan_number" required value="<?php echo $pan_number; ?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-3 mt-2">
                                             <h4 class="sub-title">PF (UAN) Number </h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" id="uanno" placeholder="pf (uan) number" name="pf_number" value="<?php echo $pf_number; ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row m-b-30">
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Bank Name <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-institution" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control"  id="bank_name" name="bank_name" placeholder="bank name" required value="<?php echo $bank_name; ?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Account Number <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-institution" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" id="bank_acc" placeholder="bank account number" minlength="10"   name="bank_acc_no" required value="<?php echo $bank_acc_no; ?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">IFSC Code <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-institution" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" id="bank_ifsc_code" placeholder="bank ifsc code"   name="ifsc_code" minlength="11" maxlength="11" required value="<?php echo $ifsc_code; ?>">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-block">
                              <div class="row">
                                 <div class="col-sm-6">
                                    <h4 class="sub-title" style="color:red;"><i class="fa fa-user-secret"></i>&nbsp; Employee Profile Image : </h4>
                                    <div class="card-block inner-card-block">
                                       <div class="row m-b-30">
                                          <div class="col-sm-12">
                                             <div class="note"  id="pro_img" style="border: 2px solid;margin-left: 17px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a">
                                                <div class="box">
                                                   <div class="box-body">
                                                      <div class="box-body box-profile">
                                                         <?php if(isset($Employee_Details) ) { ?>
                                                         <span id="pro_pic" style="display: block;">
                                                         <img id="blah" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>/<?php if(isset($Employee_Details)) { echo $em_image; } else{ echo "your-picture.png"; } ?>" height="100" width="100" />                                                                                                                
                                                         </span>
                                                         <p class="text-muted text-left" style="margin-bottom: 5px;">Employee Passport Size Photo Only <span class="star"> * </span></p>
                                                         <p class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 1MB</b></p>
                                                         <div class="input-group">
                                                            <div class="input-group-addon">
                                                               <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg"  name="em_image" onchange="proPic(this);"  <?php echo $em_image; ?> />
                                                            </div>
                                                         </div>
                                                         <?php } else { ?> 
                                                         <span id="pro_pic" style="display: block;">  
                                                         <img id="blah" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>assets/images/your-picture.png" height="100" width="100" />                        
                                                         </span>
                                                         <p class="text-muted text-left" style="margin-bottom: 5px;">Employee Passport Size Photo Only <span class="star"> * </span></p>
                                                         <p class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 1MB</b></p>
                                                         <div class="input-group">
                                                            <div class="input-group-addon">
                                                               <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg"  required id="emp_image" name="em_image" onchange="proPic(this);"  <?php echo $em_image; ?> />
                                                            </div>
                                                         </div>
                                                         <?php } ?>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <h4 class="sub-title" style="color:red;"><i class="fa fa-user-secret"></i>&nbsp; Employee Signature : </h4>
                                    <div class="card-block inner-card-block">
                                       <div class="row m-b-30">
                                          <div class="col-sm-12">
                                             <div class="note" id="sign_img" style="border: 2px solid ;margin-left: 17px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a">
                                                <div class="box">
                                                   <div class="box-body">
                                                      <div class="box-body box-profile">
                                                         <?php if(isset($Employee_Details) ) { ?>
                                                         <span id="signature" style="display: block;">  
                                                            <img id="la_signature" style="border:1px solid grey !important;"  accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>/<?php if(isset($Employee_Details)) { echo $signature; } else{ echo "assets/images/signature.png"; } ?>" height="100" width="100" />                        
                                                         </span>
                                                         <p class="text-muted text-left" style="margin-bottom: 5px;">Employee Scan signature Photo <span class="star"> * </span></p>                                                         
                                                         <p class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 1MB</b></p>
                                                         <div class="input-group">
                                                            <div class="input-group-addon">
                                                               <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg"  name="em_signature" onchange="signature_pic(this);"/>
                                                            </div>
                                                         </div>
                                                         <?php } else { ?>
                                                         <span id="signature" style="display: block;">  
                                                         <img id="la_signature" style="border:1px solid grey !important;" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>assets/images/signature.png" height="100" width="100" />                        
                                                         </span>
                                                         <p class="text-muted text-left" style="margin-bottom: 5px;">Employee Scan signature Photo <span class="star"> * </span></p>                                                        
                                                         <p class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 1MB</b></p>                                                        
                                                         <div class="input-group">
                                                            <div class="input-group-addon">
                                                               <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg"  id="emp_sign" name="em_signature" required onchange="signature_pic(this);"/>
                                                            </div>
                                                         </div>
                                                         <?php } ?>
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
                           <div class="card-block">
                              <div class="row">
                                 <div class="col-sm-12">
                                    <h4 class="sub-title" style="color:red;"><i class="fa fa-folder"></i>&nbsp; Document Details :</h4>
                                    <div class="card-block inner-card-block">
                                       <div class="row m-b-30">
                                          <?php if(isset($Employee_Details)) { ?>
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Upload Resume <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <input type="file" accept=".pdf" id="file2_input"  class="form-control bg-white" placeholder="Phone"  name="resume">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
                                             </div>
                                             <h4 class="sub-title" style="color:#357EC7;"><?php echo $upload_resume; ?> </h4>
                                          </div>
                                          <?php } else { ?>                               
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Upload Resume <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <input type="file" accept=".pdf"  required class="form-control bg-white" placeholder="Phone"  id="resume" name="resume">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
                                             </div>
                                             <h4 class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 2MB</b> </h4>
                                          </div>
                                          <?php } ?>
                                          <?php if(isset($Employee_Details)) { ?>
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Marksheet of education<span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <input type="file" accept=".pdf"  class="form-control bg-white"  name="marksheet">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
                                             </div>
                                             <h4 class="sub-title" style="color:#357EC7;"><?php echo $marksheet; ?> </h4>
                                          </div>
                                          <?php } else { ?>
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Marksheet of education <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <input type="file" accept=".pdf"  required class="form-control bg-white"  id="edu_file" name="marksheet">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
                                             </div>
                                             <h4 class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 2MB</b> </h4>
                                          </div>
                                          <?php } ?>
                                          <?php if(isset($Employee_Details)) { ?>
                                          <div class="col-sm-4 ">
                                             <h4 class="sub-title">experience letter </h4>
                                             <div class="input-group">
                                                <input type="file" accept=".pdf" class="form-control bg-white"  name="experience_letter">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
                                             </div>
                                             <h4 class="sub-title" style="color:#357EC7;"><?php echo $experience_letter; ?> </h4>
                                          </div>
                                          <?php } else { ?>
                                          <div class="col-sm-4 ">
                                             <h4 class="sub-title">experience letter <span class="star">  </span> </h4>
                                             <div class="input-group">
                                                <input type="file" accept=".pdf" class="form-control bg-white"  id="experience_letter" name="experience_letter">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
                                             </div>
                                             <h4 class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 2MB</b> </h4>
                                          </div>
                                          <?php } ?>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <input type="hidden" name="isedit" value="<?php echo $update; ?>">
						   
                        <div  style="background-color: #fff;border-top: 1px dashed #1abc9c;padding: 20px 25px;position: inherit"></div>
					   
                           <div class="card-block">
                              <div class="row">
                                 <div class="col-lg-9 col-md-9"></div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">                             
                                       <button type="submit"  name="submit" onclick='return submitForm()' id="sub_btn" class="btn  btn-round btn-block text-white" style="background: #00acaf; border: 1px solid #00acaf;"><i class="fa fa-user-plus"></i>Register Employee </button>                                      
									</div>
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

<script type="text/javascript">
   function autoFilAddress()
   {
      let same_addr_check= document.getElementById('same_addr_check');

      let curstateid_first = document.getElementById('stateid_first').value;
      let curdistrict_first = document.getElementById('district_first').value;
      let curcity_first = document.getElementById('present_city').value;
      let curpin_code1 = document.getElementById('pin_code1').value;		
      let curpresent_full_address = document.getElementById('present_full_address').value;
		
      let perletstateid_second = document.getElementById('stateid_second');		
		let perletdistrict_second = document.getElementById('district_second');	
      let perletcity_second = document.getElementById('permanent_city');
		let perletpin_code2 = document.getElementById('pin_code2');		
		let perletpermanent_full_address = document.getElementById('permanent_full_address');

      if (same_addr_check.checked == true)
      {   
         perletstateid_second.value = curstateid_first; 
         perletdistrict_second.value = curdistrict_first; 
         perletcity_second.value     = curcity_first;   
         perletpin_code2.value      = curpin_code1;     
         perletpermanent_full_address.value = curpresent_full_address;
         
         document.getElementById('stateid_first').setAttribute('readonly', true);
         document.getElementById('district_first').setAttribute('readonly', true);
         document.getElementById('present_city').readOnly =true;
         document.getElementById('pin_code1').readOnly =true;
         document.getElementById('present_full_address').readOnly =true;

         document.getElementById('stateid_second').setAttribute('readonly', true);
         document.getElementById('district_second').setAttribute('readonly', true);
         document.getElementById('permanent_city').readOnly =true;
         document.getElementById('pin_code2').readOnly =true;
         document.getElementById('permanent_full_address').readOnly =true;

      }
      else
      {
         perletstateid_second.value = "";
         perletdistrict_second.value = ""; 
         perletcity_second.value     = "";     
         perletpin_code2.value      = "";     
         perletpermanent_full_address.value  = "";         
         
         document.getElementById('stateid_first').removeAttribute("readonly");
         document.getElementById('district_first').removeAttribute("readonly");
         document.getElementById('present_city').readOnly =false;
         document.getElementById('pin_code1').readOnly =false;
         document.getElementById('present_full_address').readOnly =false;

         document.getElementById('stateid_second').removeAttribute("readonly");
         document.getElementById('district_second').removeAttribute("readonly");
         document.getElementById('permanent_city').readOnly =false;
         document.getElementById('pin_code2').readOnly =false;
         document.getElementById('permanent_full_address').readOnly =false;
      }
   }
</script>

<script type="text/javascript">

   function submitForm()
	{
		
      //document.getElementById('sub_btn').disabled = true;
		//$("#sub_btn").html('<i class="fa fa-spinner fa-spin"></i>Submitting...');
	    //document.getElementById('sub_btn').disabled = true;
			
		var frm = $('#employee_registration_form');		
		var user_type = document.getElementById('user_type').value;
      var designation = document.getElementById('designation').value;        		
		var emp_name = document.getElementById('emp_name').value;
      var contact = document.getElementById('contact').value;
      var email = document.getElementById('email').value;
      var gender = document.getElementById('gender').value;		
		var dob = document.getElementById('dob').value;			
      var division = document.getElementById('division').value;
		
		var stateid_first = document.getElementById('stateid_first').value;
        var district_first = document.getElementById('district_first').value;
        var city_first = document.getElementById('present_city').value;
        var pin_code1 = document.getElementById('pin_code1').value;		
        var present_full_address = document.getElementById('present_full_address').value;
		
        var stateid_second = document.getElementById('stateid_second').value;		
		var district_second = document.getElementById('district_second').value;	
        var city_second = document.getElementById('permanent_city').value;
		var pin_code2 = document.getElementById('pin_code2').value;		
		var permanent_full_address = document.getElementById('permanent_full_address').value;	
        
		var joining_date = document.getElementById('joining_date').value;
		var aadharno = document.getElementById('aadharno').value;
		var panNo = document.getElementById('panNo').value;
		var bank_name = document.getElementById('bank_name').value;
		var bank_acc = document.getElementById('bank_acc').value;
		var bank_ifsc_code = document.getElementById('bank_ifsc_code').value;
		var emp_image = document.getElementById('emp_image').value;
		var emp_sign = document.getElementById('emp_sign').value;
		var resume = document.getElementById('resume').value;
		var edu_file = document.getElementById('edu_file').value;
	
		if (user_type =="") 
		{
			alert("User Type is Mandatory!");
         return	false;			
		}
		else if (designation =='') 
		{
			alert("Designation is Mandatory!");
         return	false;
		}
		else if (emp_name =='') 
		{
			alert("Employee Name is Mandatory!");
         return	false;
		}
		else if (contact =='') 
		{
			alert("Contact Number is Mandatory!");
         return	false;
		}
		else if (email =='') 
		{
			alert("Email is Mandatory!");
		}
		else if (gender =='') 
		{
			alert("Gender is Mandatory!");
         return	false;
		}
		else if (dob =='') 
		{
			alert("Date of Birth is Mandatory!");
         return	false;
		}
		else if (stateid_first =='' || district_first =='' || city_first =='' || pin_code1 =='' || present_full_address =='') 
		{
			alert("Present Address is Mandatory!");
         return	false;
		}
		else if (stateid_second =='' || district_second =='' || city_second =='' || pin_code2 =='' || permanent_full_address =='') 
		{
			alert("Permanent Address is Mandatory!");
         return	false;
		}
		else if (joining_date =='') 
		{
			alert("Joining date is Mandatory!");
         return	false;
		}
		else if (aadharno =='') 
		{
			alert("Employee Aadhar Number is Mandatory!");
         return	false;
		}
		else if (panNo =='') 
		{
			alert("PAN Number is Mandatory!");
         return	false;
		}
		else if (bank_name =='') 
		{
			alert("Bank name is Mandatory!");
         return	false;
		}
		else if (bank_acc =='') 
		{
			alert("Bank Account number is Mandatory!");
         return	false;
		}
		else if (bank_ifsc_code =='') 
		{
			alert("Bank IFSC Code is Mandatory!");
         return	false;
		}
		else if (emp_image =='') 
		{
			alert("Employee Image is Mandatory!");
         return	false;
		}
		else if (emp_sign =='') 
		{
			alert("Employee Signature is Mandatory!");
         return	false;
		}
		else if (resume =='') 
		{
			alert("Employee Resume is Mandatory!");
         return	false;
		}
		else if (edu_file =='') 
		{
			alert("Education Decument is Mandatory!");
         return	false;
		}
		else
		{
         
         $("#sub_btn").html('<i class="fa fa-spinner fa-spin"></i>Submitting...');
	      //document.getElementById('sub_btn').disabled = true;
			return true;
			//document.getElementById("employee_registration_form").submit();		
			//$("#sub_btn").html('<i class="fa fa-spinner fa-spin"></i>Submitting...');
	      //document.getElementById('sub_btn').disabled = true;
			//alert(frm.serialize());
			/*
				$.ajax({
					type: frm.attr('method'),
					url:  frm.attr('action'),				
					data: frm.serialize(),
					success: function (data) {
						//alert('Submission was successful.');
						//console.log(data);
						$("#sub_btn").html('<i class="fa fa-spinner fa-spin"></i>Submitting...');
	                    document.getElementById('sub_btn').disabled = true;
					},
					error: function (data) {
						//alert('An error occurred.');
						//console.log('An error occurred.');
						//console.log(data);
						$("#sub_btn").html('<i class="fa fa-spinner fa-spin"></i>Submitting...');
	                    document.getElementById('sub_btn').disabled = true;
					},
				});
			*/
		}
		
    }
		
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	
    $('#aadharno').change(function () 
    {		
        var opt = "";
        var text = "";
        var txtAadhar = $('#aadharno').val();
        var samagramatch1 = /^[0123456789]\d{11}$/;

        if (!samagramatch1.test(txtAadhar)) 
	    {
            //text += "<br />" + " \u002A" + " Please Enter Valid 12 digit Aadhar No.";
			text += " \u002A" + " Please Enter Valid 12 digit Aadhar No.";
            $("#aadharno").attr('style', 'border:1px solid #d03100 !important;');
            $("#aadharno").css({ "background-color": "#fff2ee" });
            opt = 1;
        } 
	    else 
		{
            $('#aadharno').attr('style', 'border:1px solid green !important;');
            $('#aadharno').css({ "background-color": "#ffffff" });
        }
        if (opt == "1") 
		{
            alert(text);
            $("#aadharno").val("");				
            //alertPopup("Please fill following information.", text);
            return false;
        } 
	    else 
		{

        }
        return true;
    });
	
	
	$('#contact').change(function () {
		var text = "";
		var mobileno = $(this).val();
		//var cellphoneNummber = /^[0123456789]\d{9}$/;
        var cellphoneNummber = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;		
		if (mobileno.match(cellphoneNummber))	
		{
			$('#contact').attr('style', 'border:1px solid green !important;');
            $('#contact').css({ "background-color": "#ffffff" });
			return true;						
		}
		else
		{		        			
			$("#contact").attr('style', 'border:1px solid #d03100 !important;');
            $("#contact").css({ "background-color": "#fff2ee" });
	        text += " \u002A" + " Please Enter Valid 10 digit Mobile Number.";
			alert(text);
		    $("#contact").val("");
            $(this).focus();
            return false;
		}
		      
    });
	
	
	$('#email').change(function () {
		
		var text = "";
		var match = "";		
		var email_val = $(this).val();
		//var mailformat = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;        
		if (email_val.match(mailformat))	       
		{
			$('#email').attr('style', 'border:1px solid green !important;');
            $('#email').css({ "background-color": "#ffffff" });
			return true;			           
        }
		else
		{
            $("#email").attr('style', 'border:1px solid #d03100 !important;');
            $("#email").css({ "background-color": "#fff2ee" });
	        text += " \u002A" + " Please Enter Valid Email ID.";
			alert(text);
		    $("#email").val("");
            $(this).focus();
            return false; 		
        }
    });
	
	$('#panNo').change(function () {
        var text = "";		
		var inputvalues = $(this).val();      
		var regex = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
		
        if (inputvalues.length != 10) 
		{           
			text += " \u002A" + " Please Enter Valid 10 digit PAN NO.";
			alert(text);
			$("#panNo").attr('style', 'border:1px solid #d03100 !important;');
            $("#panNo").css({ "background-color": "#fff2ee" });
		    $("#panNo").val("");
            $(this).focus();
            return false;
        }		  
		else if(!regex.test(inputvalues))
		{      		    
			text += " \u002A" + " Please Enter Valid 10 digit PAN NO.";
			alert(text);
			$("#panNo").attr('style', 'border:1px solid #d03100 !important;');
            $("#panNo").css({ "background-color": "#fff2ee" });
		    $("#panNo").val("");
            $(this).focus();
            return false;			
	    }
		else       
		{
			$('#panNo').attr('style', 'border:1px solid green !important;');
            $('#panNo').css({ "background-color": "#ffffff" });
			return true;			           
        }
		  
	});

/*	
	$('#uanno').change(function () {
		//alert("aaadaa");
		var text = "";
		var match = "";		
		var uanno = $(this).val();
        //var regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
		var uan_format = ^(A-Z\d{5}(/)\d{7})*$;
       
		if (uanno.match(uan_format))	       
		{
			$('#uanno').attr('style', 'border:1px solid green !important;');
            $('#uanno').css({ "background-color": "#ffffff" });
			return true;			           
        }
		else
		{
            $("#uanno").attr('style', 'border:1px solid #d03100 !important;');
            $("#uanno").css({ "background-color": "#fff2ee" });
	        text += " \u002A" + "Please Enter Valid UAN(PF) Number.";
			alert(text);
		    $("#uanno").val("");
            $(this).focus();
            return false; 		
        }
    });
*/
	
	$('#pin_code1').change(function () {
		
		var text = "";
		var match = "";		
		var pin_code1 = $(this).val();	
		var pinpat1=/^\d{6}$/;      
		if (pin_code1.match(pinpat1))	       
		{
			$('#pin_code1').attr('style', 'border:1px solid green !important;');
            $('#pin_code1').css({ "background-color": "#ffffff" });
			return true;			           
        }
		else
		{
            $("#pin_code1").attr('style', 'border:1px solid #d03100 !important;');
            $("#pin_code1").css({ "background-color": "#fff2ee" });
	        text += " \u002A" + " Please Enter Valid 6 digit Pin code.";
			alert(text);
		    $("#pin_code1").val("");
            $(this).focus();
            return false; 		
        }
    });
	
	$('#pin_code2').change(function () {
		
		var text = "";
		var match = "";		
		var pin_code2 = $(this).val();
		var pinpat1=/^\d{6}$/;             
		if (pin_code2.match(pinpat1))	       
		{
			$('#pin_code2').attr('style', 'border:1px solid green !important;');
            $('#pin_code2').css({ "background-color": "#ffffff" });
			return true;			           
        }
		else
		{
            $("#pin_code2").attr('style', 'border:1px solid #d03100 !important;');
            $("#pin_code2").css({ "background-color": "#fff2ee" });
	        text += " \u002A" + " Please Enter Valid 6 digit Pin code.";
			alert(text);
		    $("#pin_code2").val("");
            $(this).focus();
            return false; 		
        }
    });
	
	$('#bank_acc').change(function () {
		
		var text = "";
		var match = "";		
		var bank_acc = $(this).val();
		var bank_acc_pat = /^[0-9]{8,18}$/;           
		if (bank_acc.match(bank_acc_pat))	       
		{
			$('#bank_acc').attr('style', 'border:1px solid green !important;');
            $('#bank_acc').css({ "background-color": "#ffffff" });
			return true;			           
        }
		else
		{
            $("#bank_acc").attr('style', 'border:1px solid #d03100 !important;');
            $("#bank_acc").css({ "background-color": "#fff2ee" });
	        text += " \u002A" + " Please Enter Valid 8 to 18 digit Bank Account Number.";
			alert(text);
		    $("#bank_acc").val("");
            $(this).focus();
            return false; 		
        }
    });
	
	$('#bank_ifsc_code').change(function () {
            //debugger;
            var opt = "";
            var text = "";
            text = "";

            var txtIFSC = $('#bank_ifsc_code');
            var reg = /[A-Z|a-z]{4}[0][a-zA-Z0-9]{6}$/;

            if (txtIFSC.val() != '') 
			{
                if (txtIFSC.val().match(reg)) 
				{
                    
					$('#bank_ifsc_code').attr('style', 'border:1px solid green !important;');
                    $('#bank_ifsc_code').css({ "background-color": "#ffffff" });
                }
                else 
				{

                    text += "\n -IFSC code should be count 11.";
                    text += "\n -Starting 4 should be only alphabets[A-Z].";
                    text += "\n -Remaining 7 should be accepting only alphanumeric.";
                    $('#bank_ifsc_code').val('');                    
					     $("#bank_ifsc_code").attr('style', 'border:1px solid #d03100 !important;');
                    $("#bank_ifsc_code").css({ "background-color": "#fff2ee" });
					
                    opt = 1;
                }
            }

         if (opt == "1") 
			{

                alert(text);
                //document.form1.text1.focus();
                $('#bank_ifsc_code').val('');
				    $(this).focus();
                return false;
            } 
			else 
			{

            }
            return true;
    });


   $('#resume').on('change', function ()
		{   		    
            var fileEmpty = $('#resume').get(0).files.length === 0;
            var size = parseFloat(resume.files[0].size / 1048576).toFixed(2);
            
            if (!fileEmpty && size > 2) 
            {
               alert("File size must under 2MB !");
               $('#resume').val('');                               
               $("#resume").attr('style', 'border:1px solid #d03100 !important;');
               $("#resume").css({ "background-color": "#fff2ee" });
            } 
            else
            {                 
               $('#resume').attr('style', 'border:1px solid green !important;');
               $('#resume').css({ "background-color": "#ffffff" });
            }         
   });

   $('#edu_file').on('change', function ()
		{   		    
            var fileEmpty = $('#edu_file').get(0).files.length === 0;
            var size = parseFloat(edu_file.files[0].size / 1048576).toFixed(2);
            
            if (!fileEmpty && size > 2) 
            {
               alert("File size must under 2MB !");
               $('#edu_file').val('');                               
               $("#edu_file").attr('style', 'border:1px solid #d03100 !important;');
               $("#edu_file").css({ "background-color": "#fff2ee" });
            } 
            else
            {                 
               $('#edu_file').attr('style', 'border:1px solid green !important;');
               $('#edu_file').css({ "background-color": "#ffffff" });
            }         
   });

   $('#experience_letter').on('change', function ()
		{   		    
            var fileEmpty = $('#experience_letter').get(0).files.length === 0;
            var size = parseFloat(experience_letter.files[0].size / 1048576).toFixed(2);
            
            if (!fileEmpty && size > 2) 
            {
               alert("File size must under 2MB !");
               $('#experience_letter').val('');                               
               $("#experience_letter").attr('style', 'border:1px solid #d03100 !important;');
               $("#experience_letter").css({ "background-color": "#fff2ee" });
            } 
            else
            {                  
               $('#experience_letter').attr('style', 'border:1px solid green !important;');
               $('#experience_letter').css({ "background-color": "#ffffff" });
            }         
   });
		
		
		

});

</script>

<script type="text/javascript">
    function ShowHideDiv() 
    {
        var user_type = document.getElementById("user_type");
        //alert(user_type);
        if(user_type.value == "11" || user_type.value == "13")
        {
            $("#single_reg_id").hide();
            $("#single_reg_sta_id").hide();
			$("#single_dist_bran_id").hide();
			
			$("#multiple_reg_id").show();
			$("#multiple_reg_sta_id").show();
			$("#multiple_dist_bran_id").show();
        }
        else if(user_type.value == "6") 
        {
            $("#single_reg_id").show();
            $("#single_reg_sta_id").show();
			$("#single_dist_bran_id").hide();
			
			$("#multiple_reg_id").hide();
			$("#multiple_reg_sta_id").hide();
			$("#multiple_dist_bran_id").show();           
        } 
        else  
        {
            $("#single_reg_id").show();
            $("#single_reg_sta_id").show();
			   $("#single_dist_bran_id").show();
			
			   $("#multiple_reg_id").hide();
			   $("#multiple_reg_sta_id").hide();
			   $("#multiple_dist_bran_id").hide();           
        }		
    }
</script>

<script>
    var rid=[]; 
    function getcheck(id)
    { 
	    //alert("hii:" + rid);
		if(rid.includes(id)== true)
		{			
			const index = rid.indexOf(id);			
			if (index > -1) // only splice array when item is found
			{ 
			   rid.splice(index, 1); // 2nd parameter means remove one item only
			}			
		}
        else
		{  
          	rid.push(id);           
		}			
       
        if(rid !="")
		{			
			$.ajax({    
			url: "<?php  echo base_url(); ?>Admin/get_state_by_region",                            
			method:"POST",
			data:{region_id:rid},
			success: function(data) 
				{ 
					//alert("hii:" + data);
					$('#region_state').html(data);				  
					$("#reg_val").val(rid);
				}
			})
        }
        else
		{
			const index = rid.indexOf(id);			
			if (index > -1) // only splice array when item is found
			{ 
			   rid.splice(index, 1); // 2nd parameter means remove one item only
			}
            alert("Please select at least one Region! ");
		}			
       
    }
   
    var dcid=[];
    function getDistrict(id)
    {
        //alert(id);
        //dcid.push(id);
        //alert("hii:" + dcid);
      if(dcid.includes(id)== true)
		{			
			const index = dcid.indexOf(id);			
			if (index > -1) // only splice array when item is found
			{ 
			   dcid.splice(index, 1); // 2nd parameter means remove one item only
			}			
		}
      else
		{  
         dcid.push(id);           
		}

      if(dcid !="")
		{			
			$.ajax({    
			url: "<?php  echo base_url(); ?>Admin/get_districtbrance_by_state",                            
			method:"POST",
			data:{region_state_id:dcid},
			success: function(data) 
				{ 
					//alert("hii:" + data);
					$('#district_branch').html(data);
					$("#reg_sta_val").val(dcid);  
				}
		    })
		}
      else
		{
			const index = dcid.indexOf(id);			
			if (index == -1) // only splice array when item is found
			{ 
			   dcid.splice(index, 1); // 2nd parameter means remove one item only
			}
            alert("Please select at least 1 Region State! ");
		}		
    }

    var rsbid=[];
    function getDistrictBranch(id)
    {
        //rsbid.push(id);      
      if(rsbid.includes(id)== true)
		{			
			const index = rsbid.indexOf(id);			
			if (index > -1) // only splice array when item is found
			{ 
			   rsbid.splice(index, 1); // 2nd parameter means remove one item only
			}			
		}
        else
		{  
          	rsbid.push(id);           
		}

        if(rsbid !="")
		{			
			//alert("hii:" + data);					
			$("#district_branch_val").val(rsbid);  						    
		}
        else
		{
            alert("Please select at least 1 State Branch! ");
		}		
    }
   
</script>



<script>

   function proPic(input) 
   {
            var fileEmpty = $('#emp_image').get(0).files.length === 0;
            var size = parseFloat(emp_image.files[0].size / 1048576).toFixed(2);
            
            if (!fileEmpty && size > 1) 
            {
               alert("File size must be under 1MB !");
               $('#emp_image').val('');                             
               document.getElementById("blah").src = "<?php  echo base_url(); ?>assets/images/your-picture.png";
               $("#pro_img").attr('style', 'border: 1px solid #d03100 !important;margin-left: 17px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a');                                
            }
            else
            {
               if (input.files && input.files[0]) 
               {

                  var reader = new FileReader();
                  reader.onload = function (e) 
                  {
                     $('#blah')
                     .attr('src', e.target.result)
                     .width(100)
                     .height(100);
                  };
                  document.getElementById("pro_pic").style.display = "block";
                  reader.readAsDataURL(input.files[0]);
                  $('#blah').attr('style', 'border:1px solid grey !important;');
                  $("#pro_img").attr('style', 'border: 1px solid green !important;margin-left: 17px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a');
                  
               }
            }
   }

   
   function signature_pic(input) 
   {  
         var fileEmpty = $('#emp_sign').get(0).files.length === 0;
         var size = parseFloat(emp_sign.files[0].size / 1048576).toFixed(2);
            
            if (!fileEmpty && size > 1) 
            {
               alert("File size must be under 1MB !");
               $('#emp_sign').val('');                             
               document.getElementById("la_signature").src = "<?php  echo base_url(); ?>assets/images/signature.png";
               $("#sign_img").attr('style', 'border: 1px solid #d03100 !important;margin-left: 17px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a');                                
            }
            else
            {
               if (input.files && input.files[0]) 
               {
                  var reader = new FileReader();
                  reader.onload = function (e) 
                  {
                     $('#la_signature')
                     .attr('src', e.target.result)
                     .width(100)
                     .height(100);
                  };
                  document.getElementById("signature").style.display = "block";
                  reader.readAsDataURL(input.files[0]);
                  
                  $('#la_signature').attr('style', 'border:1px solid grey !important;');
                  $("#sign_img").attr('style', 'border: 1px solid green !important;margin-left: 17px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a');
                  
               }
            }
   }
</script>

<script>   
    $('.get_state_id').on('change', function() 
    {
       var eid = this.value;                
       var url="<?php echo site_url('SellerRegister/get_state_region'); ?>";
       $.ajax({
		    url:url,
		    method:"POST",
		    data:{eid:eid},
		    dataType:"json",
		    success:function(data)
		    {   
			   // alert(data);             
			   $("#conutryprice").val(data);                        
		    }
        })         
    });                      
</script>

<script type="text/javascript">
    $(document).ready(function()
    {
        $('#PRESENT_stateid').change(function()
        {        
            var state_id = document.getElementById('PRESENT_stateid').value;                   
            //alert(state_id);
            if (state_id !='') 
            {
                $.ajax(
                {     
                   url: "<?php  echo base_url(); ?>SellerRegister/get_district_by_state",
                   method:"POST", 
                   data:{state_id:state_id},
                   success: function(data) 
                   { 
                       $('#PRESENT_district').html(data);
                   }
                })
            }
        });
		
    });

	
</script>



<script>
    $(document).ready(function()
	{
         
        $('#statid_first').change(function()
        {        
			var state_id = document.getElementById('stateid_first').value;                   
			//alert("Selected value is : " + state_id);
			if (state_id !='') 
			{
				$.ajax({    
				url: "<?php  echo base_url(); ?>SellerRegister/get_district_by_state",                            
				method:"POST",
				data:{state_id:state_id},
				success: function(data) 
				   { 
					  //alert("hii:" + data);
					  $('#district_first').html(data);
				   }
				})
			}
        });      
     
	 
        $('#stateid_first').change(function()
        {        
            var state_id = document.getElementById('stateid_first').value;                   
			if (state_id !='') 
			{
				$.ajax({    
				url: "<?php  echo base_url(); ?>SellerRegister/get_district_by_state",                            
				method:"POST",
				data:{state_id:state_id},
				success: function(data) 
				   { 
					  //alert("hii:" + data);
					  $('#district_first').html(data);
				   }
				})
			}
        });
           
           
        $('#stateid_second').change(function()
        {        
            var state_id = document.getElementById('stateid_second').value;                   
            //alert("Selected value is : " + class_id);
            if (state_id !='') 
            {
				$.ajax({    
					url: "<?php  echo base_url(); ?>SellerRegister/get_district_by_state",                            
					method:"POST",
					data:{state_id:state_id},
					success: function(data) 
					{ 
					    //alert("hii:" + data);
						$('#district_second').html(data);
					}
				})
            }
        });
		
		
		
		$('#sing_region_id').change(function()
		{ 			
			var region_id = document.getElementById('sing_region_id').value;                   			
			if (region_id !='') 
			{
				$.ajax({    
					url: "<?php  echo base_url(); ?>Admin/get_single_state_by_region",                            
					method:"POST",
					data:{region_id:region_id},
					success: function(data) 
					{ 
						//alert("hii:" + data);
						$('#single_region_state').html(data);
					}
				})
			}
		});   
	 

	    $('#single_region_state').change(function()
		{        
		    var region_state_id = document.getElementById('single_region_state').value; 
            var user_type = document.getElementById('user_type').value;			
			if (region_state_id !='' && user_type!='6') 
			{
				$.ajax({    
					url: "<?php  echo base_url(); ?>Admin/get_single_districtbrance_by_state",                            
					method:"POST",
					data:{region_state_id:region_state_id},
					success: function(data) 
					{ 
						   //alert("hii:" + data);
						   $('#single_district_branch').html(data);
					}
		        })
		    }
			else if (region_state_id !='' && user_type=='6')
			{
				var dcid =  region_state_id ;
				$.ajax({    
				url: "<?php  echo base_url(); ?>Admin/get_districtbrance_by_state",                            
				method:"POST",
				data:{region_state_id:dcid},
				success: function(data) 
					{ 
						//alert("hii:" + data);
						$('#district_branch').html(data);
						$("#reg_sta_val").val(dcid);  
					}
				})
				
			}
		});
      
    });
</script>

