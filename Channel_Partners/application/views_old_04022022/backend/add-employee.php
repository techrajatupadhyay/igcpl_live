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
                        <form action="<?php echo base_url();?>Admin/add_employee" method="post"enctype="multipart/form-data">
                           <div class="card-header">
                              <h5>Register new Employees</h5>
                              <span>filds with <b style="color:red;">* </b> is mandetory !</span>
                              <div class="card-header-right">
                                 <ul class="list-unstyled card-option">
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                    <li><i class="feather icon-trash-2 close-card"></i></li>
                                 </ul>
                              </div>
                           </div>
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
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                                                <select id="user_type"name="user_type" class="form-control "required>
                                                   <option> select user type </option>

                                                   <option value="11" <?php echo $user_type == "11" ? "slected" : "";?>> Assistant General Manager</option>
                                                   <option value="6" <?php echo $user_type == "6" ? " selected" : "";?>>Branch Manager</option>
                                                   <option value="13" <?php echo $user_type == "13" ? " slected" : "";?>>Assistant manager</option>
                                                   <option value="2" <?php echo $user_type == "2" ? " slected" : "";?>>Laabh Executive</option> 
                                                   <option value="7" <?php echo $user_type == "7" ? " slected" : "";?>> Senior Office Executive</option> 												   
                                                   <option value="8" <?php echo $user_type == "8" ? " selected" : "";?>> Office Executive (GEM) </option>
                                                   <option value="9" <?php echo $user_type == "9" ? " slected" : "";?>> Office Support Staff</option>                                                                                                     
                                                   <option value="10"> <?php echo $user_type == "10" ? " selected" : "";?> Customer Care Executive </option>
                                                   <option value="12" <?php echo $user_type == "12" ? " slected" : "";?>> Senior Executive </option>

                                                  
                                                                                                     			
                                                </select>                                                  
                                             </div>
                                          </div>										  
										            <div class="col-sm-3">
                                             <h4 class="sub-title">Designation <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                                                <select id="designation" name="designation" class="form-control form-control" required>
                                                   <option> select designation </option>
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
                                                <input type="text" class="form-control"  name="first_name" placeholder="Name" required   value="<?php echo $first_name; ?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title">Mobile Number <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" placeholder="+91" id="phone" name="contact_no" minlength="10" maxlength="12" required value="<?php echo $contact_no;?>">
                                             </div>
                                          </div>                                         
                                       </div>
                                       <div class="row m-b-30">
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Alternate Number </h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" placeholder="+91"  id="phone" name="alter_mobileno" minlength="10" maxlength="12" value="<?php echo $alter_mobileno; ?>" >
                                             </div>
                                          </div>
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Email Id  <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                                <input type="email" class="form-control"  name="em_email" placeholder="Email" required  value="<?php echo $em_email ; ?>" >
                                             </div>
                                          </div>
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Gender <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <select name="em_gender" id="gender" class="form-control form-control" required>
                                                   <option>Select Gender</option>
                                                   <option value="MALE" <?php echo $em_gender == "MALE" ? " selected" : "";?>>Male</option>
                                                   <option value="FEMALE" <?php echo $em_gender == "FEMALE" ? " selected" : "";?>>Female</option>
                                                   <option value="OTHER" <?php echo $em_gender == "OTHER" ? " selected" : "";?>>Other</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row m-b-30">
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Date of Birth <span class="star"> * </span> </h4>
                                             <div class="form-group">
                                                <div class="input-group date" id="datetimepicker1">
                                                   <span class="input-group-addon " style="">
                                                   <span class="icofont icofont-ui-calendar"></span>
                                                   </span>
                                                   <input type="date" class="form-control" name="em_birthday" required value="<?php echo $em_birthday; ?>">                   
                                                </div>
                                             </div>
                                          </div>
										  
                                          <div class="col-md-4">
                                             <h4 class="sub-title">Region <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
												
                                                <select id="region_id" name="region" class="form-control"  autocomplete="off" required>
                                                   <option value="">-- Select region --</option>
                                                   <?php 
                                                      //var_dump($country);
                                                      foreach($region_list as $c)
                                                      {   ?>
                                                      <option value="<?= $c->region_id; ?>" <?php echo $region == $c->region_id ? " selected" : ""; ?> ><?= $c->region_name; ?></option>
                                                   <?php  
                                                      }  ?>
                                                </select>
                                             </div>
                                          </div> 
                                       
                                           <div class="col-md-4">
                                             <h4 class="sub-title">Region State  <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <select id="region_state" name="region_state" class="form-control"  autocomplete="off" required>                                                  
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

                                          <div class="col-md-4">
                                             <h4 class="sub-title"> Distinct Branch <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <select id="district_branch" name="district_branch" class="form-control"  autocomplete="off" required>
                                                   <option value="">-- Select Distinct Branch --</option> 
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

                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Division  <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <select id="division" name="division" class="form-control " required>
                                                   <option> select division </option>
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
                                                   <option value="">-- Select State --</option>
                                                    <?php 
                                                    //var_dump($country);
                                                    foreach($state_list as $c)
                                                    {   ?>
                                                        <option value="<?= $c->state_id; ?>" <?php echo $state_first == $c->state_id ? " selected" : ""; ?> ><?= $c->statename; ?></option>
                                                        <?php  
                                                    }   ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3">
                                             <h4 class="sub-title"> District <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <select id="district_first" name="district_first" class="form-control"  autocomplete="off" required>
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
                                                       <option value="">-- Select District --</option>
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
                                                   <input type="text" class=" form-control"  name="present_city" placeholder="city"  required value="<?php echo $present_city ;?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title"> Pincode <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control"  name="present_pincode" placeholder="pincode"  required value="<?php echo $present_pincode;?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row m-b-30">
                                          <div class="col-sm-12">
                                             <h4 class="sub-title"><i class="fa fa-home" aria-hidden="true"></i> Full Address <span class="star"> * </span></h4>
                                             <textarea class="form-control max-textarea" name="present_full_address" placeholder="present_full_address" maxlength="255" rows="3" required ><?php echo $present_full_address ;?></textarea>
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
                                                        <option value="<?= $c->state_id; ?>" <?php echo $state_second == $c->state_id ? " selected" : ""; ?> ><?= $c->statename; ?></option>
                                                        <?php  
                                                    }   ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 ">
                                             <h4 class="sub-title"> District <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <select id="district_second" name="district_second" class="form-control"  autocomplete="off" required>
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
                                                       <option value="">-- Select District --</option>
                                                       <?php 
                                                    }   
                                                ?>                                        
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title"> City <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-building-o" aria-hidden="true"></i></span>
                                                <input type="text" class=" form-control"  name="permanent_city" placeholder="city"  required value="<?php echo $permanent_city;?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title"> Pincode <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control"  name="permanent_pincode" placeholder="pincode"  required value="<?php echo $permanent_pincode;?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row m-b-30">
                                          <div class="col-sm-12">
                                             <h4 class="sub-title"><i class="fa fa-home" aria-hidden="true"></i> Full Address <span class="star"> * </span></h4>
                                             <textarea class="form-control max-textarea" name="permanent_full_address" placeholder="Permanent Full Address" maxlength="255" rows="3" required><?php echo $permanent_full_address;?></textarea>
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
                                                   <input type="date" class="form-control"  name="joining_date" required value="<?php echo $joining_date; ?>">              
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title">Aadhar Number <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" name="aadhar_number" placeholder="aadhar number" minlength="12" maxlength="14" required value="<?php echo $aadhar_number; ?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title">PAN Number <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" placeholder="pan number"  id="phone" name="pan_number" required value="<?php echo $pan_number; ?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-3 mt-2">
                                             <h4 class="sub-title">PF (UAN) Number </h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" placeholder="pf (uan) number" name="pf_number" value="<?php echo $pf_number; ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row m-b-30">
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Bank Name <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-institution" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control"  name="bank_name" placeholder="bank name" required value="<?php echo $bank_name; ?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Account Number <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-institution" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" placeholder="bank account number" minlength="10" maxlength="20"  id="phone" name="bank_acc_no" required value="<?php echo $bank_acc_no; ?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">IFSC Code <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-institution" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" placeholder="bank ifsc code"   name="ifsc_code" minlength="4" maxlength="10" required value="<?php echo $ifsc_code; ?>">
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
                                             <div class="note" style="border: 2px solid;margin-left: 17px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a">
                                                <div class="box">
                                                   <div class="box-body">
                                                      <div class="box-body box-profile">
													    <?php if(isset($Employee_Details) ) { ?>
                                                            <span id="pro_pic" style="display: block;">
															   <img id="blah" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>/<?php if(isset($Employee_Details)) { echo $em_image; } else{ echo "your-picture.png"; } ?>" height="100" width="100" />														 															                          
															</span>
                                                            <p class="text-muted text-left" style="margin-bottom: 5px;">Employee Passport Size Photo Only <span class="star"> * </span></p>                                                       
															<div class="input-group">
																<div class="input-group-addon">
																   <input type='file'accept="image/png,image/gif, image/jpeg, image/jpg"  name="em_image"onchange="proPic(this);"  <?php echo $em_image; ?> />
																</div>
															</div>
														<?php } else { ?> 
														 <span id="pro_pic" style="display: block;">  
                                                            <img id="blah" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>assets/images/your-picture.png" height="100" width="100" />                        
                                                         </span>
                                                         <p class="text-muted text-left" style="margin-bottom: 5px;">Employee Passport Size Photo Only <span class="star"> * </span></p>                                                      
                                                         <div class="input-group">
                                                            <div class="input-group-addon">
                                                               <input type='file'accept="image/png,image/gif, image/jpeg, image/jpg"  required name="em_image"onchange="proPic(this);"  <?php echo $em_image; ?> />
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
                                             <div class="note" style="border: 2px solid;margin-left: 17px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a">
                                                <div class="box">
                                                   <div class="box-body">
                                                      <div class="box-body box-profile">
													    <?php if(isset($Employee_Details) ) { ?>
                                                         <span id="signature" style="display: block;">  
                                                         <img id="la_signature" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>/<?php if(isset($Employee_Details)) { echo $signature; } else{ echo "your-picture.png"; } ?>" height="100" width="100" />                        
                                                         </span>
                                                         <p class="text-muted text-left" style="margin-bottom: 5px;">Employee Scan signature Photo <span class="star"> * </span>
                                                         </p>
                                                         <div class="input-group">
                                                            <div class="input-group-addon">
                                                               <input type='file' accept="image/png,image/gif, image/jpeg, image/jpg"  name="em_signature" onchange="signature_pic(this);"/>
                                                            </div>
                                                         </div>
														<?php } else { ?>
                                                         <span id="signature" style="display: block;">  
                                                         <img id="la_signature" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>assets/images/your-picture.png" height="100" width="100" />                        
                                                         </span>
                                                         <p class="text-muted text-left" style="margin-bottom: 5px;">Employee Scan signature Photo <span class="star"> * </span>
                                                         </p>
                                                         <div class="input-group">
                                                            <div class="input-group-addon">
                                                               <input type='file' accept="image/png,image/gif, image/jpeg, image/jpg"  name="em_signature" required onchange="signature_pic(this);"/>
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
													<input type="file" accept=".pdf" id="file2_input"  class="form-control bg-white" placeholder="Phone"  id="phone" name="resume">
													<span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
												 </div>
												 <h4 class="sub-title" style="color:#357EC7;"><?php echo $upload_resume; ?> </h4>
												</div>
											<?php } else { ?>											
											    <div class="col-sm-4">
												 <h4 class="sub-title">Upload Resume <span class="star"> * </span></h4>
												 <div class="input-group">
													<input type="file" accept=".pdf" id="file2_input"  required class="form-control bg-white" placeholder="Phone"  id="phone" name="resume">
													<span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
												 </div>
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
												 <h4 class="sub-title">Marksheet of education<span class="star"> * </span></h4>
												 <div class="input-group">
													<input type="file" accept=".pdf"  required class="form-control bg-white"  name="marksheet">
													<span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
												 </div>
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
												 <h4 class="sub-title">experience letter </h4>
												 <div class="input-group">
													<input type="file" accept=".pdf" class="form-control bg-white"  name="experience_letter">
													<span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
												 </div>
												</div>
											<?php } ?>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
						   <input type="hidden" name="isedit" value="<?php echo $update; ?>">
                           <div class="card-block">
                              <div class="row">
                                 <div class="col-lg-9 col-md-9"></div>
                                 <div class="col-lg-3 col-md-3">
                                 <div class="form-group">                             
                                    <button type="submit"  name="submit" class="btn  btn-round btn-block text-white" style="background: #00acaf; border: 1px solid #00acaf;"><i class="fa fa-user-plus"></i>Add Laabh Agent </button>
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

<script>
   function signature_pic(input) 
   {
       if (input.files && input.files[0]) 
       {
           var reader = new FileReader();
           reader.onload = function (e) 
           {
               $('#la_signature')
               .attr('src', e.target.result)
               .width(80)
               .height(100);
           };
           document.getElementById("signature").style.display = "block";
		   
           reader.readAsDataURL(input.files[0]);
       }
   }
</script>



<script>   
   $('.get_state_id').on('change', function() 
   {
       var eid = this.value;
       //alert(eid);          
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
   );         
   });                      
</script>
<script>
   function proPic(input) 
   {
       if (input.files && input.files[0]) 
       {
           var reader = new FileReader();
           reader.onload = function (e) 
           {
               $('#blah')
               .attr('src', e.target.result)
               .width(80)
               .height(100);
           };
           document.getElementById("pro_pic").style.display = "block";
           reader.readAsDataURL(input.files[0]);
       }
   }
</script>

<script>
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
     
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
$(document).ready(function(){
  
   
   $('#region_id').change(function()
   {        
      var region_id = document.getElementById('region_id').value;                   
      //alert("Selected value is : " + class_id);
      if (region_id !='') 
      {
         $.ajax({    
         url: "<?php  echo base_url(); ?>Admin/get_state_by_region",                            
         method:"POST",
         data:{region_id:region_id},
         success: function(data) 
            { 
               //alert("hii:" + data);
               $('#region_state').html(data);
            }
         })
      }
   });   
  


   $('#region_state').change(function()
   {        
      var region_state_id = document.getElementById('region_state').value;                   
      //alert("Selected value is : " + class_id);
      if (region_id !='') 
      {
         $.ajax({    
         url: "<?php  echo base_url(); ?>Admin/get_districtbrance_by_state",                            
         method:"POST",
         data:{region_state_id:region_state_id},
         success: function(data) 
            { 
               //alert("hii:" + data);
               $('#district_branch').html(data);
            }
         })
      }
   });




   $('#statid_first').change(function()
   {        
      var state_id = document.getElementById('stateid_first').value;                   
      alert("Selected value is : " + state_id);
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
   
  
	$('#region_id').change(function()
	{        
	   var state_id = document.getElementById('region_id').value;                   
	   //alert("Selected value is : " + class_id);
	   if (state_id !='') 
	   {
		  $.ajax({    
		  url: "<?php  echo base_url(); ?>SellerRegister/get_region_by_state",                            
		  method:"POST",
		  data:{state_id:state_id},
		  success: function(data) 
			 { 
				//alert("hii:" + data);
				$('#district_branch').html(data);
			 }
		  })
	   }
	});
	
	
});	
	
</script>