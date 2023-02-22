<?php
    if($this->session->userdata('user_login_access') != 1)
    {
        return redirect('Login'); 
    }

    $laabh_executive = $this->session->userdata('user_login_id');
	
    $laabh_executive_details = $this->db->query("SELECT * FROM users WHERE user_id='".$laabh_executive."' ");
	$executive_details= $laabh_executive_details->result();
	//print_r($this->db->last_query());
	foreach($executive_details as $row)
	{			
		$region_name = $row->region;
        $region_state = $row->region_state;
        $district_branch = $row->district_branch;		
	}
    
   if(isset($user_id))
   {              
      $user_id=$user_id;                    
   }
   else
   {
      $user_id=" ";      
   }
   
   $user_id = $user_id;
   
   $update = "0";
   $id="";
   $state_first = "";
   $district_first = "";
   $state_second = "";
   $district_second = "";
   //$region_name = "";
   $user_type = "";
   //$Laabh_executive = "";
   $designation_id = "";
   $first_name ="";
   $contact_no ="";
   $alter_mobileno ="";
   $em_email ="";
   $em_gender ="";
   $em_birthday ="";
   
   //$region ="";
   //$region_state ="";
   //$district_branch  ="";


   $division_id ="";
   $present_city ="";
   $present_pincode ="";
   $present_full_address ="";
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
   $resume ="";
   $marksheet ="";
   $experience_letter ="";
   $contract_letter ="";
   if(isset($Laabhagent_Details) && $Laabhagent_Details !="")
   {
      $update = true;
      foreach($Laabhagent_Details as $row)
      {
         $id = $row['id'];
         $state_first = $row['state_first'];
         $district_first = $row['district_first'];
         $permanent_full_address = $row['permanent_full_address'];
         $state_second = $row['state_second'];
         $district_second = $row['district_second'];
         $user_type = $row['user_type'];
         //$Laabh_executive = $row['laabh_executive'];
         $designation_id = $row['des_id'];
         $first_name =$row['first_name'];
         $contact_no =$row['contact_no'];
         $alter_mobileno =$row['alter_mobileno'];
         $em_email =$row['em_email'];
         $em_gender =$row['em_gender'];
         $em_birthday =$row['em_birthday'];
		 
         //$region =$row['region'];
         //$region_state =$row['region_state'];
         //$district_branch =$row['district_branch'];

         $division_id =$row['division'];
         $present_city =$row['present_city'];
         $present_pincode =$row['present_pincode'];
         $present_full_address =$row['present_full_address'];
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
		 $contract_letter =$row['contract_letter'];
		 
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
                           <h4>Laabh Abhikarta/Agent</h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                           <li class="breadcrumb-item">
                              <a href="index.html"> <i class="feather icon-home"></i> </a>
                           </li>
                           <li class="breadcrumb-item"><a href="#!">Register Laabh Abhikarta/Agent</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="page-body">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card">
                        <form id="agent_registration_form" action="<?php echo base_url();?>Laabh_agent/add_agent" method="post"enctype="multipart/form-data">
                           <div class="card-header">
                              <h5>Register new Laabh Agent</h5>
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
                                    <h4 class="sub-title" style="color:red;"><i class="fa fa-user-secret"></i>&nbsp; Laabh Agent Details : </h4>
                                    <div class="card-block inner-card-block">
                                       <div class="row m-b-30">
                                          <input type="hidden" class="form-control"  id="user_type" name="user_type" value="5" >
                                          <input type="hidden" class="form-control"  name="laabh_executive" value="<?php echo $laabh_executive;?>" >
										  
										            <input type="hidden" name="laabh_agent_id" class="form-control" value="<?php echo $user_id;?>" placeholder="">
                                          <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" placeholder="">
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Designation <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>												
                                                <select class="form-control form-control" required readonly disabled ="disabled">
                                                   <option value=""> select designation </option>												   
                                                   <?php 
                                                      if(isset($designation) && $designation !="")
                                                      {
                                                         foreach($designation as $designation) {  ?>
                                                         <option selected value="<?= $designation->value; ?>" ><?= $designation->des_name; ?> (<?= $designation->value; ?>)</option>
                                                   <?php  } } ?>
                                                </select> 
                                                <input type="hidden" id="designation" name="designation"  value="<?php echo $designation->value;?>" placeholder="">												
                                             </div>
                                          </div>
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Agent Name <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control"  id="agent_name" name="agent_name" placeholder="Name" required   value="<?php echo $first_name; ?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">Mobile Number <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" placeholder="+91"  id="contact" name="contact_no"  minlength="10" maxlength="12" required value="<?php echo $contact_no;?>">
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
                                                <input type="email" class="form-control"  id="email" name="em_email" placeholder="Email" required  value="<?php echo $em_email ; ?>" >
                                             </div>
                                          </div>
                                          <div class="col-sm-4">
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
                                          
                                       </div>
                                       <div class="row m-b-30">
                                          <div class="col-sm-6">
                                             <h4 class="sub-title">Date of Birth <span class="star"> * </span> </h4>
                                             <div class="form-group">
                                                <div class="input-group date" id="datetimepicker1">
                                                   <span class="input-group-addon " style="">
                                                   <span class="icofont icofont-ui-calendar"></span>
                                                   </span>
                                                   <input type="date" class="form-control" id="dob" name="em_birthday" required value="<?php echo $em_birthday; ?>">                   
                                                </div>
                                             </div>
                                          </div>
										            <div class="col-sm-6">
                                             <h4 class="sub-title">Division  <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <select id="division" name="division" class="form-control form-control" required>
                                                   <option value=""> select division </option>
                                                    <?php  foreach($division as $division){  ?>
												   
                                                      <option value="<?= $division->id; ?>" <?php echo $division_id == $division->id ? "selected" : ""; ?> ><?= $division->division_name; ?></option> 
                                                                                                   
                                                   <?php  }  ?>
                                                   </select>
                                                </div>
                                             </div>
										            </div>  
                                        <div class="row m-b-30">  	
                                          <div class="col-md-4">
                                             <h4 class="sub-title">Region <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
												<input type="text" value="<?php echo $region_name; ?>" class="form-control"  autocomplete="off" required readonly disabled ="disabled" >
                                                <input type="hidden" id="region_id" name="region" value="<?php echo $region_name; ?>" class="form-control"  autocomplete="off" required readonly > 
                                             <!--	
                                                <select id="region_id" name="region" class="form-control"  autocomplete="off" required>
                                                   <option value="">-- Select region --</option>
                                                   <?php 
                                                      //var_dump($country);
                                                      foreach($region_list as $c)
                                                      {   ?>
                                                      <option value="<?= $c->region_id; ?>" <?php echo $region_name == $c->region_id ? " selected" : ""; ?> ><?= $c->region_name; ?></option>
                                                   <?php  
                                                      }  ?>
                                                </select>
											            -->	
                                             </div>
                                          </div> 
                                       
                                           <div class="col-md-4">
                                             <h4 class="sub-title">Region State  <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <?php  
                                                $sta = $this->db->query("SELECT * FROM region WHERE id=".$region_state." ");
                                                $state_det= $sta->result();
                                                //print_r($this->db->last_query());
                                                foreach($state_det as $dec)
                                                {			
                                                   $state_name = $dec->region_name ;																																												
                                                }  
                                             ?>
                                             <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>												
                                             <input type="text"  value="<?php echo $state_name; ?>" class="form-control"  autocomplete="off" required readonly disabled ="disabled">
                                             <input type="hidden" id="region_state" name="region_state" value="<?php echo $region_state; ?>" class="form-control"  autocomplete="off" required readonly >
                                          <!--    
                                             <select id="region_state" name="region_state" class="form-control"  autocomplete="off" required>                                                  
                                                            <option value="">-- Select Region State --</option>
                                                <?php
                                                if(isset($Laabhagent_Details) && $Laabhagent_Details !="") 
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
                                          -->	
                                             </div>
                                          </div>

                                          <div class="col-md-4">
                                             <h4 class="sub-title"> Distinct Branch <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <?php  
                                                   $dist = $this->db->query("SELECT * FROM district_branch WHERE Districtcode=".$district_branch." ");
                                                   $state_dest= $dist->result();
                                                   //print_r($this->db->last_query());
                                                   foreach($state_dest as $t)
                                                   {			
                                                      $dist_name = $t->Districtname ;																																												
                                                   }  
                                                ?>
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <input type="text" value="<?php echo $dist_name; ?>" class="form-control"  autocomplete="off"  readonly disabled ="disabled">
                                                <input type="hidden" id="district_branch" name="district_branch" value="<?php echo $district_branch; ?>" class="form-control"  autocomplete="off" required readonly >
                                                      <!--    
                                                <select id="district_branch" name="district_branch" class="form-control"  autocomplete="off" required>
                                                               <option value="">-- Select Distinct Branch --</option> 
                                                               <?php
                                                   if(isset($Laabhagent_Details) && $Laabhagent_Details !="") 
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
                                                      --> 
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
                                                   <option value="<?= $c->statecode; ?>" <?php echo $state_first == $c->statecode ? " selected" : ""; ?> ><?= $c->statename; ?></option>
                                                   <?php  
                                                      }  ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3">
                                             <h4 class="sub-title"> District <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <select id="district_first" name="district_first" class="form-control"  autocomplete="off" required>
                                                    <?php if(isset($Laabhagent_Details)) 
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
                                                   <input type="text" class=" form-control"  id="present_city" name="present_city" placeholder="city"  required value="<?php echo $present_city ;?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title"> Pincode <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control"  id="pin_code1" name="present_pincode" placeholder="pincode"  required value="<?php echo $present_pincode;?>">
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
                                                      }  ?>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="col-md-3 ">
                                             <h4 class="sub-title"> District <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <select id="district_second" name="district_second" class="form-control"  autocomplete="off" required>
                                                   <?php if(isset($Laabhagent_Details)) 
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
                                                <input type="text" class=" form-control"  id="permanent_city" name="permanent_city" placeholder="city"  required value="<?php echo $permanent_city;?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <h4 class="sub-title"> Pincode <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control"  id="pin_code2" name="permanent_pincode" placeholder="pincode"  required value="<?php echo $permanent_pincode;?>">
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
                                                   <input type="date" class="form-control"  id="joining_date" name="joining_date" required value="<?php echo $joining_date; ?>">              
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
                                                <input type="number" class="form-control" id="bank_acc" placeholder="bank account number" minlength="10"  name="bank_acc_no" required value="<?php echo $bank_acc_no; ?>">
                                             </div>
                                          </div>
                                          <div class="col-sm-4">
                                             <h4 class="sub-title">IFSC Code <span class="star"> * </span></h4>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-institution" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control"  name="ifsc_code" id="bank_ifsc_code" placeholder="bank ifsc code"  minlength="11" maxlength="11" required value="<?php echo $ifsc_code; ?>">
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
                                    <h4 class="sub-title" style="color:red;"><i class="fa fa-user-secret"></i>&nbsp; Laabh Agent Profile Image : </h4>
                                    <div class="card-block inner-card-block">
                                        <div class="row m-b-30">
                                            <div class="col-sm-12">
                                             <div class="note" id="pro_img" style="border: 2px solid;margin-left: 17px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a">
                                                <div class="box">
                                                   <div class="box-body">
                                                      <div class="box-body box-profile">
                                                         <?php if(isset($Laabhagent_Details)) { ?>
                                                         
                                                         <span id="pro_pic" style="display: block;">  
                                                         <img id="blah" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>/<?php if(isset($Laabhagent_Details)) { echo $em_image; } else{ echo "your-picture.png"; } ?>" height="100" width="100" />                        
                                                         </span>
                                                         <p class="text-muted text-left" style="margin-bottom: 5px;">Laabh Agent Passport Size Photo Only <span class="star"> * </span>
                                                         </p>
                                                         <p class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 1MB</b></p>
                                                         <div class="input-group">
                                                            <div class="input-group-addon">
                                                               <input type='file'accept="image/png,image/gif, image/jpeg, image/jpg"   name="agent_image"onchange="proPic(this);"  <?php echo $em_image; ?> />
                                                            </div>
                                                         </div>
                                                         
                                                         <?php } else { ?> 
                                                         
                                                         <span id="pro_pic" style="display: block;">  
                                                         <img id="blah" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>assets/images/your-picture.png" height="100" width="100" />                        
                                                         </span>
                                                         <p class="text-muted text-left" style="margin-bottom: 5px;">Laabh Agent Passport Size Photo Only <span class="star"> * </span>
                                                         </p>
                                                         <p class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 1MB</b></p>
                                                         <div class="input-group">
                                                            <div class="input-group-addon">
                                                               <input type='file'accept="image/png,image/gif, image/jpeg, image/jpg"  id="agent_image" required name="agent_image"onchange="proPic(this);"  <?php echo $em_image; ?> />
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
                                    <h4 class="sub-title" style="color:red;"><i class="fa fa-user-secret"></i>&nbsp; Laabh Agent Signature : </h4>
                                    <div class="card-block inner-card-block">
                                        <div class="row m-b-30">
                                            <div class="col-sm-12">
                                             <div class="note" id="sign_img" style="border: 2px solid;margin-left: 17px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a">
                                                <div class="box">
                                                   <div class="box-body">
                                                      <div class="box-body box-profile">
													                  <?php if(isset($Laabhagent_Details)) { ?>														
                                                            <span id="signature" style="display: block;">  
                                                               <img id="la_signature" style="border:1px solid grey !important;" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>/<?php if(isset($Laabhagent_Details)) { echo $signature; } else{ echo "assets/images/signature.png"; } ?>" height="100" width="100" />                        
                                                            </span>
                                                            <p class="text-muted text-left" style="margin-bottom: 5px;">Laabh Agent Scan signature Photo <span class="star"> * </span></p>
                                                            <p class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 1MB</b></p>
                                                            <div class="input-group">
                                                               <div class="input-group-addon">
                                                                  <input type='file' accept="image/png,image/gif, image/jpeg, image/jpg"  name="agent_signature"  onchange="signature_pic(this);"/>
                                                               </div>
                                                            </div>
														 
														               <?php } else { ?>
                                                            <span id="signature" style="display: block;">  
                                                               <img id="la_signature" style="border:1px solid grey !important;" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>assets/images/signature.png" height="100" width="100" />                        
                                                            </span>
                                                            <p class="text-muted text-left" style="margin-bottom: 5px;">Laabh Agent Scan signature Photo <span class="star"> * </span></p>
                                                            <p class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 1MB</b></p>
                                                            
                                                            <div class="input-group">
                                                               <div class="input-group-addon">
                                                                  <input type='file' accept="image/png,image/gif, image/jpeg, image/jpg"  id="agent_signature" name="agent_signature" required onchange="signature_pic(this);"/>
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
									        <?php if(isset($Laabhagent_Details)) { ?>
												<div class="col-sm-3">
												 <h4 class="sub-title">Contract Letter <span class="star"> * </span></h4>
												 <div class="input-group">
													<input type="file" accept=".pdf" id="file2_input"  class="form-control bg-white" placeholder="Phone"   name="contract_letter">
													<span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
												 </div>												 
												 <h4 class="sub-title" style="color:#357EC7;"><?php echo $contract_letter; ?> </h4>												 
												</div>
											<?php } else { ?>
												<div class="col-sm-3">
												 <h4 class="sub-title">Contract Letter <span class="star"> * </span></h4>
												 <div class="input-group">
													<input type="file" accept=".pdf"   required class="form-control bg-white"   id="contract_letter" name="contract_letter">
													<span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
												 </div>
                                     <h4 class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 2MB</b> </h4>												 
												</div>											
											<?php } ?>
											
											<?php if(isset($Laabhagent_Details)) { ?>
												<div class="col-sm-3">
												 <h4 class="sub-title">Upload Resume </h4>
												 <div class="input-group">
													<input type="file" accept=".pdf"   class="form-control bg-white" name="resume">
													<span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
												 </div>												 
												 <h4 class="sub-title" style="color:#357EC7;"><?php echo $upload_resume; ?> </h4>												 
											    </div>
											<?php } else { ?>
											    <div class="col-sm-3">
												 <h4 class="sub-title">Upload Resume </h4>
												 <div class="input-group">
													<input type="file" accept=".pdf"    class="form-control bg-white" placeholder="Phone"  id="resume" name="resume" >
													<span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
												 </div>												 
												 <h4 class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 2MB</b> </h4>												 
											    </div>
											<?php } ?>
											<?php if(isset($Laabhagent_Details)) { ?>
												<div class="col-sm-3">
												 <h4 class="sub-title">Marksheet of education </h4>
												 <div class="input-group">
													<input type="file" accept=".pdf"  class="form-control bg-white"  name="marksheet">
													<span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
												 </div>												 
												 <h4 class="sub-title" style="color:#357EC7;"><?php echo $marksheet; ?> </h4>												 
											    </div>
											<?php } else { ?>
											    <div class="col-sm-3">
												 <h4 class="sub-title">Marksheet of education </h4>
												 <div class="input-group">
													<input type="file" accept=".pdf"   class="form-control bg-white" id="edu_file" name="marksheet">
													<span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
												 </div>
                                     <h4 class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 2MB</b> </h4>
											    </div>
											<?php } ?>
                                    <?php if(isset($Laabhagent_Details)) { ?>
										        <div class="col-sm-3">
												 <h4 class="sub-title">experience letter </h4>
												 <div class="input-group">
													<input type="file" accept=".pdf" class="form-control bg-white"  name="experience_letter">
													<span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
												 </div>
												 <h4 class="sub-title" style="color:#357EC7;"><?php echo $experience_letter; ?> </h4>	
												</div>
										    <?php } else { ?>
											    <div class="col-sm-3">
												 <h4 class="sub-title">experience letter </h4>
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
										<button type="submit"  name="submit" onclick='return submitForm()' id="sub_btn" class="btn  btn-round btn-block text-white" style="background: #00acaf; border: 1px solid #00acaf;"><i class="fa fa-user-plus"></i>Add Laabh Agent </button>
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

   function submitForm()
	{
		      		
		var frm = $('#agent_registration_form');		
		var user_type = document.getElementById('user_type').value;
        var designation = document.getElementById('designation').value;        		
		var agent_name = document.getElementById('agent_name').value;
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
		
		var agent_image = document.getElementById('agent_image').value;
		var agent_signature = document.getElementById('agent_signature').value;
		var contract_letter = document.getElementById('contract_letter').value;
		//var resume = document.getElementById('resume').value;
		//var edu_file = document.getElementById('edu_file').value;
	
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
		else if (agent_name =='') 
		{
			alert("Agent Name is Mandatory!");
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
         return	false;
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
		else if (agent_image =='') 
		{
			alert("Agent Image is Mandatory!");
         return	false;
		}
		else if (agent_signature =='') 
		{
			alert("Employee Signature is Mandatory!");
         return	false;
		}
		else if (contract_letter =='') 
		{
			alert("Contract Letter is Mandatory!");
         return	false;
		}
   /*   
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
   */   
		else
		{
			
			//document.getElementById("agent_registration_form").submit();
			
			$("#sub_btn").html('<i class="fa fa-spinner fa-spin"></i>Submitting...');
	      //document.getElementById('sub_btn').disabled = true;
         return true;
			/*	
				$.ajax({
					type: frm.attr('method'),
					url:  frm.attr('action'),				
					data: frm.serialize(),
					success: function (data) {
						//alert('Submission was successful.');
						console.log(data);
					},
					error: function (data) {
						alert('An error occurred.');
						console.log('An error occurred.');
						console.log(data);
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
     
    $('#contract_letter').on('change', function ()
		{   		    
            var fileEmpty = $('#contract_letter').get(0).files.length === 0;
            var size = parseFloat(contract_letter.files[0].size / 1048576).toFixed(2);
            
            if (!fileEmpty && size > 2) 
            {
               alert("File size must under 2MB !");
               $('#contract_letter').val('');                               
               $("#contract_letter").attr('style', 'border:1px solid #d03100 !important;');
               $("#contract_letter").css({ "background-color": "#fff2ee" });
            } 
            else
            {                 
               $('#contract_letter').attr('style', 'border:1px solid green !important;');
               $('#contract_letter').css({ "background-color": "#ffffff" });
            }         
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
   });         
   });                      
</script>



<script>

   function proPic(input) 
   {
            var fileEmpty = $('#agent_image').get(0).files.length === 0;
            var size = parseFloat(agent_image.files[0].size / 1048576).toFixed(2);
            
            if (!fileEmpty && size > 1) 
            {
               alert("File size must be under 1MB !");
               $('#agent_image').val('');                             
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
         var fileEmpty = $('#agent_signature').get(0).files.length === 0;
         var size = parseFloat(agent_signature.files[0].size / 1048576).toFixed(2);
            
            if (!fileEmpty && size > 1) 
            {
               alert("File size must be under 1MB !");
               $('#agent_signature').val('');                             
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
                        .width(80)
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
		  url: "<?php  echo base_url(); ?>SellerRegister/get_state_region",                            
		  method:"POST",
		  data:{state_id:state_id},
		  success: function(data) 
			 { 
				//alert("hii:" + data);
				$('#Laabh_executive').html(data);
			 }
		  })
	   }
	});

});
</script>