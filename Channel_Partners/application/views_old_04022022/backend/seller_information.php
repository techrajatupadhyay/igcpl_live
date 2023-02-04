<?php
    if($this->session->userdata('user_login_access') != 1)
    {
        return redirect('Login'); 
    }
   
    if(isset($sellerid))
    {              
        $seller_id=$sellerid;                    
    }
    else
    {
       $seller_id=" ";      
    }
    
    $labhid = $this->session->userdata('user_login_id');
	$user_type = $this->session->userdata('user_type');
    $sellerid = $seller_id;
	
    $sql2 ="SELECT * from users Where user_id='".$labhid."' AND user_type='".$user_type."' and status='ACTIVE'" ;
	$data['User_Details'] = $this->db->query($sql2)->result();
	
	foreach($data['User_Details'] as $user)
	{				
		$laabh_executive = $user->Laabh_executive;
		$region_name = $user->region;
        $region_state = $user->region_state;
        $district_branch = $user->district_branch;
	}
	
    $update = "";
    $id = "";
    $seller_id = "";
    $fname = "";
    $lname = "";
    $em_gender = "";
    $labh_emp_id = "";
    $contact = "";
    $altcontact = "";
    $dob = "";
    $email = "";

    //$region ="";
    //$region_state ="";
    //$distinct_branch  ="";
	
    $aadhar = "";      
   $current_address = "";
   $state_first = "";
   $district_first = "";
   $city_first = "";
   $pincode_first = "";
        
   $permanent_full_address = "";
   $state_second = "";
   $district_second = "";
   $city_second = "";
   $pincode_second = "";
        
   $gstin = "";
   $panNo = "";
   $tanNo = "";
   $companyname = "";
   $proprietor_name = "";
   $seller_image = "";
   //var_dump($Seller_Details);
   if(isset($Seller_Details) && $Seller_Details !="")
   {
        $update = true;
        foreach($Seller_Details as $row)
        {
        
        $id = $row['id'];
        $seller_id = $row['seller_id'];
        $fname = $row['fname'];
        
        $em_gender = $row['gender'];
        $labh_emp_id = $row['labh_emp_id'];
        $contact = $row['contact'];
        $altcontact = $row['altcontact'];
        $dob = $row['dob'];
        $email = $row['email'];

        //$region_id = $row['region_id'];
        //$region_state =$row['region_state'];
        //$distinct_branch =$row['distinct_branch'];
		
        $aadhar = $row['aadhar'];       
        $current_address = $row['current_address'];
        $state_first = $row['state_first'];
        $district_first = $row['district_first'];
        $city_first = $row['city_first'];
        $pincode_first = $row['pincode_first'];
        
        $permanent_full_address = $row['permanent_address'];
        $state_second = $row['state_second'];
        $district_second = $row['district_second'];
        $city_second = $row['city_second'];
        $pincode_second = $row['pincode_second'];
        
        $gstin = $row['gstin'];
        $panNo = $row['panNo'];
        $tanNo = $row['tanNo'];
        $companyname = $row['companyname'];
        $proprietor_name = $row['proprietor_name'];
        $seller_image = $row['seller_image'];
                          
     }
     
   }
   
   ?> 
<style>
   .note {
   border: 1px solid #1976d2 !important;
   }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/seller.css">
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
                        </ul>
                     </div>
                  </div>
               </div>
            </div>  
            <div class="card">   
               <!--<div class="message" ></div>-->
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-lg-12 col-xlg-12 col-md-12">
                        <!-- <div class=""> -->
                        <div class="row">
                           <div class="col-12">
                              <?php $this->load->view('backend/form_top'); ?>                            
                              <div class="card-outline-info">
                                 <form action="<?php echo base_url();?>SellerRegister/register_seller" method="post" enctype="multipart/form-data">
                                    <!--<div class="note" style="border: 2px solid; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 15px; text-transform: capitalize;color:red;">-->                               
                                    <div class="card-body">
                                       <div class="note" style="border-radius: 5px;border: 2px solid; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 18px; text-transform: capitalize;color:black">
                                          <i class="fa fa-user-circle-o" aria-hidden="true" style="color:#ff0000;"></i>&nbsp;&nbsp;
                                          <span style="color:#ff0000;">Personal Details</span> 
                                       </div>
                                    </div>
                                    <div class="row mx-3">
									
									            <input type="hidden" name="labh_executive_id" class="form-control" value="<?php echo $laabh_executive;?>" placeholder="">
                                       <input type="hidden" name="labh_agent_id" class="form-control" value="<?php echo $labhid;?>" placeholder="">
									   								   
                                       <input type="hidden" name="sellerid" class="form-control" value="<?php echo $sellerid;?>" placeholder="">
                                       <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" placeholder="">
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>User Type  <span class="red-color span1">*</span></label>
                                          <select id="usertype" name="usertype" required class="form-control" autocomplete="off">
                                             <option value="3" selected="selected">Seller</option>
                                          </select>
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>Seller Name  <span class="red-color">*</span></label>
                                          <input type="text" name="fname" class="form-control form-control-line" required value="<?php echo $fname; ?>" placeholder="Your first name" minlength="2"  set_value='fname'>
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>Gender  <span class="red-color">*</span></label>                                         
                                          <select name="gender" class="form-control custom-select" required >
                                             <option>Select Gender</option>
                                             <option value="MALE" <?php echo $em_gender == "MALE" ? " selected" : "";?> >Male</option>
                                             <option value="FEMALE" <?php echo $em_gender == "FEMALE" ? " selected" : "";?> >Female</option>
                                             <option value="OTHER" <?php echo $em_gender == "OTHER" ? " selected" : "";?> >Other</option>
                                          </select>
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>Aadhar No.  <span class="red-color span1">*</span></label>
                                          <input type="number" name="aadhar" class="form-control form-control-line" value="<?php echo $aadhar; ?>" required placeholder="Aadhar" minlength="12" maxlength="14" >
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>Mobile Number  <span class="red-color">*</span></label>
                                          <input type="number" name="contact" class="form-control"  value="<?php echo $contact; ?>" required placeholder="Please enter mobile number" minlength="10" maxlength="12" >
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>Alternate Number  </label>
                                          <input type="number" name="altcontact" class="form-control" value="<?php echo $altcontact; ?>" placeholder="Please enter mobile number" minlength="10" maxlength="12">
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>Date Of Birth <span class="red-color span1">*</span></label>
                                          <input type="date" name="dob" value="<?php echo $dob; ?>" class="form-control" placeholder="" required >
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>Email  <span class="red-color">*</span></label>
                                          <input type="email" id="example-email2" name="email" value="<?php echo $email; ?>" required class="form-control" placeholder="email@mail.com" minlength="7" >
                                       </div>
										  
									   <div class="form-group col-md-4 m-t-20">
                                          <label>Region <span class="red-color"> * </span></label>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
												<input type="text" id="region_id" name="regionid" value="<?php echo $region_name; ?>" class="form-control"  autocomplete="off" required readonly > 
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
                                       
                                        <div class="form-group col-md-4 m-t-20">
                                             <label>Region State <span class="red-color"> * </span></label>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
												<input type="text" id="region_state" name="region_state" value="<?php echo $region_state; ?>" class="form-control"  autocomplete="off" required readonly>
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

                                          <div class="form-group col-md-4 m-t-20">
                                             <label>Distinct Branch <span class="red-color"> * </span></label>
                                             <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
												<input type="text" id="district_branch" name="district_branch" value="<?php echo $district_branch; ?>" class="form-control"  autocomplete="off" required readonly>
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


                                       <div class="note" style="border: 2px solid;margin-left: 17px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;width: 1181px;color:#5049251a">
                                          <div class="col-md-6 offset-md-0 photo box1"  >
                                             <div class="box">
                                                <div class="box-body">
                                                   <div class="box-body box-profile">
                                                      <?php if(isset($Seller_Details)) { ?>
                                                      <span id="pro_pic" style="display: block;">                                                        
                                                      <img id="blah" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>/<?php if(isset($Seller_Details)) { echo $seller_image; } else{ echo "your-picture.png"; } ?> " height="100" width="100" />                                                                                                                          
                                                      </span>
                                                      <p class="text-muted text-left" style="margin-bottom: 5px;">
                                                         Seller Passport Size Photo Only *
                                                      </p>
                                                      <div class="input-group">
                                                         <div class="input-group-addon">
                                                            <input type='file' accept="image/png, image/gif, image/jpeg, image/jpg" name="seller_photo" onchange="proPic(this);"  />                              
                                                         </div>
                                                      </div>
                                                      <?php } else { ?>
                                                      <span id="pro_pic" style="display: block;">                                   
                                                      <img id="blah" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>assets/images/your-picture.png" height="100" width="100" />                                                                                                                           
                                                      </span>
                                                      <p class="text-muted text-left" style="margin-bottom: 5px;">
                                                         Seller Passport Size Photo Only *
                                                      </p>
                                                      <div class="input-group">
                                                         <div class="input-group-addon">
                                                            <input type='file' accept="image/png, image/gif, image/jpeg, image/jpg" required name="seller_photo" onchange="proPic(this);" />                              
                                                         </div>
                                                      </div>
                                                      <?php }  ?> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
																											
									
                                    <!--  ============ Permanent Address ============  -->
                                    <div class="card-body">
                                       <div class="note" style="border-radius: 5px;border: 2px solid; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 18px; text-transform: capitalize;color:black">
                                          <i class="fa fa-home" aria-hidden="true" style="color:#ff0000;"></i>&nbsp;&nbsp;
                                          <span style="color:#ff0000;">Registered/Permanaent Address</span>
                                          <span class="pull-right "></span>                                          
                                       </div>
                                    </div>
                                    <div class="row mx-3">
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>State : <span class="red-color">*</span></label>
                                          <select id="stateid_second" name="state_second" class="form-control get_state_id" required autocomplete="off">
                                             <option value="">-- Select State --</option>
                                             <?php 
                                                //var_dump($country);
                                                foreach($state_list as $c)
                                                {   ?>
                                             <option value="<?= $c->statecode; ?>" <?php echo $state_second == $c->statecode ? " selected" : ""; ?> ><?= $c->statename; ?></option>
                                             <?php  
                                                }  ?>
                                          </select>
										  <!--<input type="hidden" id="conutryprice" name="regionid" value="ctotalprice">-->
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>District : <span class="red-color span1">*</span></label>
                                          <select id="district_second" name="district_second" class="form-control" required autocomplete="off">
                                             <?php if(isset($Seller_Details)) 
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
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>City : <span class="red-color span1">*</span></label>
                                          <input type="text" name="city_second" class="form-control" value="<?php echo $city_second; ?>" required placeholder="" >                                    
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>Pin Code <span class="red-color span1">*</span></label>
                                          <input type="number" name="pincode_second" class="form-control" value="<?php echo $pincode_second; ?>" required placeholder="Please Enter Your PIN Code" minlength="6" maxlength="6" >
                                       </div>
                                       <div class="form-group col-md-12 m-t-20">
                                          <label>Address : <span class="red-color">*</span></label>
                                          <textarea id="address" name="permanent_address" class="form-control" rows="4" placeholder="full permanaent address" required autocomplete="off" maxlength="100"><?php echo $permanent_full_address; ?></textarea>
                                       </div>
                                    </div>
                                    <!-- ============ End Permanent Address ============ -->
                                    
                                    <!-- ============ Current Address ============ -->
                                    <div class="card-body">
                                       <div class="note" style="border-radius: 5px;border: 2px solid; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 18px; text-transform: capitalize;color:black">
                                          <i class="fa fa-address-card" aria-hidden="true" style="color:#ff0000;"></i>&nbsp;&nbsp;
                                          <span style="color:#ff0000;">Current Address</span> 
                                       </div>
                                       <!--<input type="checkbox" id="checkBox"  onclick="autoFilAddress()"> Same as permanent address-->
                                    </div>
                                    <div class="row mx-3">
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>State : <span class="red-color">*</span></label>
                                          <select id="stateid_first" name="state_first" class="form-control " id="stateid" required autocomplete="off">
                                             <option value="">-- Select State --</option>
                                             <?php 
                                                //var_dump($country);
                                                foreach($state_list as $c)
                                                {  ?>
                                             <option value="<?= $c->statecode; ?>" <?php echo $state_first == $c->statecode ? " selected" : ""; ?>   ><?= $c->statename; ?></option>
                                             <?php  
                                                }  
                                                ?>
                                          </select>
                                          
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>District : <span class="red-color span1">*</span></label>
                                          <select id="district_first" name="district_first" class="form-control" required autocomplete="off">
                                             <?php if(isset($Seller_Details)) 
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
                                                }   ?>                                                
                                          </select>
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>City : <span class="red-color span1">*</span></label>
                                          <input type="text" name="city_first" class="form-control" value="<?php echo $city_first; ?>" required placeholder="" >                       
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>Pin Code <span class="red-color">*</span></label>
                                          <input type="number" name="pincode_first" class="form-control" value="<?php echo $pincode_first; ?>" required placeholder="" minlength="6" maxlength="6" >
                                       </div>
                                       <div class="form-group col-md-12 m-t-20">
                                          <label>Address : <span class="red-color">*</span></label>
                                          <textarea id="address" name="current_address" class="form-control" rows="4" placeholder="full current address" required autocomplete="off" maxlength="100"><?php echo $current_address; ?></textarea>
                                       </div>
                                    </div>
                                    <!-- ============ End Current Address ============ --> 
									
                                    <div class="card-body">
                                       <div class="note" style="border-radius: 5px;border: 2px solid; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 18px; text-transform: capitalize;color:black">
                                          <i class="fa fa-university" aria-hidden="true" style="color:#ff0000;"></i>&nbsp;&nbsp;
                                          <span style="color:#ff0000;">Company Detail</span>
                                          <span class="pull-right "></span>                                          
                                       </div>
                                    </div>
                                    <div class="row mx-3">
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>Company Name : <span class="red-color">*</span></label>
                                          <input type="text" name="companyname" class="form-control" value="<?php echo $companyname; ?>" required placeholder="Company Name">
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>Proprietor Name : <span class="red-color">*</span></label>
                                          <input type="text" name="proprietor_name" class="form-control" value="<?php echo $proprietor_name; ?>" required placeholder="">
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>PAN Number : <span class="red-color">*</span></label>
                                          <input type="text" name="panNo" class="form-control" value="<?php echo $panNo; ?>" required placeholder="Please Enter Your PAN">
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>GSTIN : <span class="red-color">*</span></label>                                         
                                          <input type="text" name="gstin" class="form-control" value="<?php echo $gstin; ?>" required placeholder="">
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>TAN Number : </label>
                                          <input type="text" name="tanNo" class="form-control" value="<?php echo $tanNo; ?>" required placeholder="">
                                       </div>
                                    </div>
                                    <input type="hidden" name="isedit" value="<?php echo $update; ?>">
                                    <div class="form-actions col-md-12 mb-3">
                                       <section class="btn-section">
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="" style="float:right;">                                                
                                                   <button type="submit"  name="submit" class="btn footer-button"><i class="fa fa-check"></i> Save & Next</button>                                                   
                                                </div>
                                             </div>
                                          </div>
                                       </section>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <!-- </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Optional JavaScript -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                //alert(state_id);
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
      
         });
      
/*      
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
 */       
        
   </script>
   <script type="text/javascript">
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
