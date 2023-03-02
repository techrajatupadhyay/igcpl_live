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

   $region_id_edit ="";
   $region_state_edit ="";
   $distinct_branch_edit  ="";
	
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

        $region_id_edit = $row['region_id'];
        $region_state_edit =$row['region_state'];
        $distinct_branch_edit =$row['district_branch'];
		
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
<style>
   .star{
   color:red;
   font-size: 18px;
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
         
            <?php $this->load->view('backend/form_top'); ?> 

               <div class="container-fluid">
                  <div class="row">                     
                     <div class="col-12">                                                               
                        <div class="card-outline-info">                             
                           <form id="seller_registration_form" action="<?php echo base_url();?>SellerRegister/register_seller" method="post" enctype="multipart/form-data">                                      
                              <input type="hidden" name="labh_executive_id" class="form-control" value="<?php echo $laabh_executive;?>" required placeholder="">
                              <input type="hidden" name="labh_agent_id" class="form-control" value="<?php echo $labhid;?>" required placeholder="">									   								   
                              <input type="hidden" name="sellerid" class="form-control" value="<?php echo $sellerid;?>" required placeholder="">
                              <input type="hidden" id="usertype" name="usertype" value="3" required placeholder="">
                              <input type="hidden" id="region_id" name="regionid" value="<?php echo $region_name; ?>"  required  >  
                              <input type="hidden" id="region_state" name="region_state" value="<?php echo $region_state; ?>"  required > 
                              <input type="hidden" id="district_branch" name="district_branch" value="<?php echo $district_branch; ?>" required >
                              <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" >

                              <div class="tab-header card">
                                 <div class="form-group col-md-12 m-t-20">
                                 <h4 class="sub-title">Seller Type <span class="star"> * </span>  </h4>
                                    <select id="seller_type" name="seller_type" onchange ="ShowHideDiv()" class="form-control"  required>
                                       <option> Please Select Seller Type &#8594; </option>
                                       <option value="1" > Proprietorship &#8594; </option>
                                       <option value="2" > Partnership Firm &#8594; </option>
                                       <option value="3" > Company &#8594; </option>
                                       <option value="4" > LLP &#8594; </option>
                                       <option value="5" > Others &#8594; </option>                                      
                                    </select>                                          
                                 </div>
                              </div>
                              <div id="seller_info" style="display:none">
                                 <div class="card-body" >
                                    <div class="note" style="border-radius: 5px;border: 2px solid; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 15px; text-transform: capitalize;color:black">
                                       <i class="fa fa-university" aria-hidden="true" style="color:#ff0000;"></i>&nbsp;&nbsp;
                                       <span style="color:#ff0000;">Organization/Company/Firm/Shop Details &#8594; </span> 
                                    </div>
                                 </div>

                                 <div style="display:block">
                                    <div class="row mx-3">
                                       <!--                                     
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>User Type  <span class="red-color span1">*</span></label>
                                          <select class="form-control" autocomplete="off" disabled ="disabled" required>
                                             <option value="3" selected="selected">Seller</option>
                                          </select> 	
                                       </div>
                                       -->
                                       <div class="form-group col-md-4 m-t-20" id="seller_name_view">
                                          <label> Seller name (Name of Shop/company) : <span class="star">*</span></label>
                                          <input type="text" id="seller_name" name="fname" class="form-control form-control-line" required value="<?php echo $fname; ?>" placeholder="Seller name (Name of Shop/company)" >
                                       </div>

                                       <div class="form-group col-md-4 m-t-20" id="partners_name_view" style="display:block">
                                          <label>Partner’s name (Name of any one partner) : <span class="star">*</span></label>
                                          <input type="text" id="partners_name" name="partners_name" class="form-control form-control-line" value="<?php echo $fname; ?>" placeholder="Partner’s name (Name of any one partner)" >
                                       </div>

                                       <div class="form-group col-md-4 m-t-20" id="proprietor_name_view" style="display:block">
                                          <label>Proprietor name (Name of individual) : <span class="star">*</span></label>
                                          <input type="text" id="proprietor_name" name="proprietor_name" class="form-control form-control-line" value="<?php echo $fname; ?>" placeholder="Proprietor name (Name of individual)" >
                                       </div>

                                       <div class="form-group col-md-4 m-t-20" id="director_name_view" style="display:block">
                                          <label>Director’s name (Name of any one Director) : <span class="star">*</span></label>
                                          <input type="text" id="director_name" name="director_name" class="form-control form-control-line" value="<?php echo $fname; ?>" placeholder="Director’s name (Name of any one Director)" >
                                       </div>

                                       <div class="form-group col-md-4 m-t-20" id="gender_details_view" style="display:block">
                                          <label>Gender : <span class="star">*</span></label>                                         
                                          <select id="gender" name="gender" class="form-control custom-select" >
                                             <option>Select Gender</option>
                                             <option value="MALE" <?php echo $em_gender == "MALE" ? " selected" : "";?> >Male</option>
                                             <option value="FEMALE" <?php echo $em_gender == "FEMALE" ? " selected" : "";?> >Female</option>
                                             <option value="OTHER" <?php echo $em_gender == "OTHER" ? " selected" : "";?> >Other</option>
                                          </select>
                                       </div>
                                       
                                       <div class="form-group col-md-4 m-t-20">    
                                          <label>Mobile Number : <span class="star">*</span></label>
                                          <input type="number" name="contact" id="contact" class="form-control"  value="<?php echo $contact; ?>" required placeholder=" mobile number" minlength="10" maxlength="12" >
                                       </div>

                                       <div class="form-group col-md-4 m-t-20">
                                          <label>Alternate Number : </label>
                                          <input type="number" name="altcontact" id="altcontact" class="form-control" value="<?php echo $altcontact; ?>" placeholder=" alternate mobile number" minlength="10" maxlength="12">
                                       </div>
                                                                     
                                       <div class="form-group col-md-4 m-t-20">
                                          <label>Email  <span class="star">*</span></label>
                                          <input type="text" id="email" name="email" value="<?php echo $email; ?>" required class="form-control" placeholder="email@mail.com" >
                                       </div>

                                       <div class="form-group col-md-4 m-t-20" id="aadharno_details_view" style="display:block">
                                          <label>Aadhar Number :  <span class="star span1">*</span></label>
                                          <input type="number" name="aadhar" id="aadharno" class="form-control form-control-line" value="<?php echo $aadhar; ?>" placeholder="Aadhar" minlength="12" maxlength="12" >
                                       </div>
                                    
                                       <div class="form-group col-md-4 m-t-20">
                                          <label>PAN Number : <span class="star">*</span></label>
                                          <input type="text" name="panNo" id="panNo" class="form-control" value="<?php echo $panNo; ?>" required placeholder="PAN Number">
                                       </div>
                                      
                                       <div class="form-group col-md-4 m-t-20">
                                          <label>GSTIN Number : <span class="star">*</span></label>                                         
                                          <input type="text" id="gstin" name="gstin" class="form-control" value="<?php echo $gstin; ?>" required placeholder="GSTIN number">
                                       </div>

                                       <div class="form-group col-md-4 m-t-20">
                                          <label>TAN Number : </label>
                                          <input type="text" id="tanNo" name="tanNo" class="form-control" value="<?php echo $tanNo; ?>" required placeholder="TAN number">
                                       </div>

                                       <div class="form-group col-md-4 m-t-20" id="cin_no_view" style="display:block">
                                          <label>CIN Number of company : <span class="star">*</span></label>
                                          <input type="text" name="cin_no" id="cin_no" class="form-control" value="<?php echo $panNo; ?>" required placeholder="CIN number of company">
                                       </div>
                                                                                                   
                                       <?php if(isset($Seller_Details)) { ?>
                                             <div class="form-group col-md-4 m-t-20">
                                                <label>Region <span class="star"> * </span></label>
                                                <div class="input-group">
                                                   <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                   <input type="text" value="<?php echo $region_id_edit; ?>" class="form-control" disabled ="disabled" > 
                                                   <input type="hidden" id="region_id" name="regionid" value="<?php echo $region_id_edit; ?>" required >                                            	
                                                </div>
                                             </div> 
                                          
                                             <div class="form-group col-md-4 m-t-20">
                                                <label>Region State <span class="star"> * </span></label>
                                                <div class="input-group">
                                                   <?php  
                                                      $sta = $this->db->query("SELECT * FROM region WHERE id=".$region_state_edit." ");
                                                      $state_det= $sta->result();
                                                      //print_r($this->db->last_query());
                                                      foreach($state_det as $dec)
                                                      {			
                                                         $state_name = $dec->region_name ;																																												
                                                      }  
                                                   ?>
                                                      <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                      <input type="text"  value="<?php echo $state_name; ?>" class="form-control"  disabled ="disabled">
                                                      <input type="hidden" id="region_state" name="region_state" value="<?php echo $region_state_edit; ?>" required >                                                   	
                                                </div>
                                             </div>

                                             <div class="form-group col-md-4 m-t-20">
                                                <label>District Branch <span class="star"> * </span></label>
                                                <div class="input-group">
                                                   <?php  
                                                      $dist = $this->db->query("SELECT * FROM district_branch WHERE Districtcode=".$distinct_branch_edit." ");
                                                      $state_dest= $dist->result();
                                                      //print_r($this->db->last_query());
                                                      foreach($state_dest as $t)
                                                      {			
                                                         $dist_name = $t->Districtname ;																																												
                                                      }  
                                                   ?>
                                                   <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                   <input type="text" value="<?php echo $dist_name; ?>" class="form-control"  disabled ="disabled">
                                                   <input type="hidden" id="district_branch" name="district_branch" value="<?php echo $distinct_branch_edit; ?>"  required >                                                  
                                                </div>
                                             </div>
                                          <?php } else  { ?> 
                                             <div class="form-group col-md-4 m-t-20">
                                                <label>Region <span class="star"> * </span></label>
                                                <div class="input-group">
                                                   <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                   <input type="text" value="<?php echo $region_name; ?>" class="form-control"  disabled ="disabled" > 
                                                   <!--<input type="hidden" id="region_id" name="regionid" value="<?php //echo $region_name; ?>" class="form-control" required  >-->                                                	
                                                </div>
                                             </div> 
                                          
                                             <div class="form-group col-md-4 m-t-20">
                                                <label>Region State <span class="star"> * </span></label>
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
                                                      <input type="text"  value="<?php echo $state_name; ?>" class="form-control"  autocomplete="off" disabled ="disabled">
                                                      <!--<input type="hidden" id="region_state" name="region_state" value="<?php //echo $region_state; ?>" class="form-control" required >-->                                                   	
                                                </div>
                                             </div>

                                             <div class="form-group col-md-4 m-t-20">
                                                <label>District Branch <span class="star"> * </span></label>
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
                                                   <input type="text" value="<?php echo $dist_name; ?>" class="form-control"   disabled ="disabled">
                                                   <!--<input type="hidden" id="district_branch" name="district_branch" value="<?php echo $district_branch; ?>" required >-->                                                       
                                                </div>
                                             </div>
                                          <?php } ?> 
                                    </div>
                                 </div>

                                 <div class="card-body">
                                    <div class="note" style="border-radius: 5px;border: 2px solid; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 15px; text-transform: capitalize;color:black">
                                       <i class="fa fa-address-card" aria-hidden="true" style="color:#ff0000;"></i>&nbsp;&nbsp;
                                       <span style="color:#ff0000;">Nodal Person (employee who will coordinate with IndiGem)  Details &#8594; </span>
                                       <span class="pull-right "></span>                                          
                                    </div>
                                 </div>
                                 <div style="display:block">
                                    <div class="row mx-3">                                          
                                       <div class="form-group col-md-4 m-t-20">
                                             <label>Nodal Person  Name : <span class="star">*</span></label>
                                             <input type="text" id="nodal_person_pame" name="nodal_person_pame" class="form-control" value="<?php echo $companyname; ?>" required placeholder="Nodal Person  Name">
                                       </div>
                                       <div class="form-group col-md-4 m-t-20">
                                             <label>Nodal Person  Contact Number : <span class="star">*</span></label>
                                             <input type="number" id="nodal_person_contact" name="nodal_person_contact" class="form-control" minlength="10" maxlength="10" value="<?php echo $proprietor_name; ?>" required placeholder="Nodal Person  Contact Number">
                                       </div>
                                       <div class="form-group col-md-4 m-t-20">
                                             <label>Nodal Person  Email : <span class="star">*</span></label>
                                             <input type="text" name="nodal_person_email" id="nodal_person_email" class="form-control" value="<?php echo $panNo; ?>" required placeholder="Nodal Person  Email">
                                       </div>                                    
                                    </div>
                                 </div><br><br>

                                 <div class="card-body" >
                                    <div class="note" style="border-radius: 5px;border: 2px solid; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 15px; text-transform: capitalize;color:black">
                                       <i class="fa fa-user-circle-o" aria-hidden="true" style="color:#ff0000;"></i>&nbsp;&nbsp;
                                       <span style="color:#ff0000;">Organization/Company/Firm/Shop Logo & Signature &#8594; </span> 
                                    </div>
                                 </div>
                                 <div style="display:block">
                                    <div class="row mx-3">
                                       <div class="form-group col-md-6 m-t-20">
                                          <div class="note" id="pro_img" style="border: 2px solid;margin-left: 0px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a">
                                             <div class="col-md-12 offset-md-0 photo box1"  >
                                                <div class="box">
                                                   <div class="box-body">
                                                      <div class="box-body box-profile">
                                                         <?php if(isset($Seller_Details)) { ?>
                                                         <span id="pro_pic" style="display: block;">                                                        
                                                         <img id="blah" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>/<?php if(isset($Seller_Details)) { echo $seller_image; } else{ echo "arrow-emblem.png"; } ?> " height="100" width="100" />                                                                                                                          
                                                         </span>
                                                         <p class="text-muted text-left" style="font-size:12px; margin-top:5px; margin-bottom: 10px;"> Organization/Company/Firm/Shop Logo <span class="star"> * </span> </p>                                                     
                                                         <p class="text-left" style="font-size:10px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 1MB</b></p>
                                                         <div class="input-group">
                                                            <div class="input-group-addon">
                                                               <input type='file' accept="image/png, image/gif, image/jpeg, image/jpg" id="emp_image" name="seller_photo" onchange="proPic(this);"  />                              
                                                            </div>
                                                         </div>
                                                         <?php } else { ?>
                                                         <span id="pro_pic" style="display: block;">                                   
                                                         <img id="blah" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>assets/images/arrow-emblem.png" height="100" width="100" />                                                                                                                           
                                                         </span>
                                                         <p class="text-muted text-left" style="font-size:12px; margin-top:5px; margin-bottom: 10px;"> Organization/Company/Firm/Shop Logo <span class="star"> * </span> </p>                                                     
                                                         <p class="text-left" style="font-size:10px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 1MB</b></p>
                                                         <div class="input-group">
                                                            <div class="input-group-addon">
                                                               <input type='file' accept="image/png, image/gif, image/jpeg, image/jpg" required  id="emp_image" name="seller_photo" onchange="proPic(this);" />                              
                                                            </div>
                                                         </div>
                                                         <?php }  ?> 
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="form-group col-md-6 m-t-20">
                                          <div class="note" id="sign_img" style="border: 2px solid;margin-left: 0px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a">
                                             <div class="col-md-12 offset-md-0 photo box1"  >
                                                <div class="box">
                                                   <div class="box-body">
                                                      <div class="box-body box-profile">
                                                         <?php if(isset($Seller_Details)) { ?>
                                                         <span id="signature" style="display: block;">                                                        
                                                         <img id="la_signature" style="border:1px solid grey !important;" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>/<?php if(isset($Seller_Details)) { echo $seller_image; } else{ echo "your-picture.png"; } ?> " height="100" width="100" />                                                                                                                          
                                                         </span>
                                                         <p class="text-muted text-left" style="font-size:12px; margin-top:5px; margin-bottom: 10px;"> Seller Scan signature Photo Only <span class="star"> * </span> </p>                                                     
                                                         <p class="text-left" style="font-size:10px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 1MB</b></p>
                                                         <div class="input-group">
                                                            <div class="input-group-addon">
                                                               <input type='file' accept="image/png, image/gif, image/jpeg, image/jpg" id="agent_signature" name="seller_signature" onchange="signature_pic(this);"  />                              
                                                            </div>
                                                         </div>
                                                         <?php } else { ?>
                                                         <span id="signature" style="display: block;">                                   
                                                         <img id="la_signature" style="border:1px solid grey !important;" accept="image/png, image/gif, image/jpeg, image/jpg" src="<?=base_url()?>assets/images/signature.png" height="100" width="100" />                                                                                                                           
                                                         </span>
                                                         <p class="text-muted text-left" style="font-size:12px; margin-top:5px; margin-bottom: 10px;"> Seller Scan signature Photo Only <span class="star"> * </span> </p>                                                     
                                                         <p class="text-left" style="font-size:10px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 1MB</b></p>
                                                         <div class="input-group">
                                                            <div class="input-group-addon">
                                                               <input type='file' accept="image/png, image/gif, image/jpeg, image/jpg" required  id="agent_signature" name="seller_signature" onchange="signature_pic(this);" />                              
                                                            </div>
                                                         </div>
                                                         <?php }  ?> 
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                                               
                                 <!-- ============ Current Address ============ -->
                                 <div class="card-body">
                                    <div class="note" style="border-radius: 5px;border: 2px solid; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 15px; text-transform: capitalize;color:black">
                                       <i class="fa fa-map-marker" aria-hidden="true" style="color:#ff0000;"></i>&nbsp;&nbsp;
                                       <span style="color:#ff0000;">Current Address &#8594; </span> 
                                    </div>                                   
                                 </div>
                                 <div  style="display:block">
                                    <div class="row mx-3">                                         
                                          <div class="form-group col-md-3 m-t-20">
                                             <label>State : <span class="star">*</span></label>
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
                                             <label>District : <span class="star span1">*</span></label>
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
                                             <label>City : <span class="star span1">*</span></label>
                                             <input type="text" name="city_first" id="present_city" class="form-control" value="<?php echo $city_first; ?>" required placeholder="city" >                       
                                          </div>
                                          <div class="form-group col-md-3 m-t-20">
                                             <label>Pin Code <span class="star">*</span></label>
                                             <input type="number" name="pincode_first" class="form-control" id="pin_code1" value="<?php echo $pincode_first; ?>" required placeholder="pin code" pattern="[0-9]{6}" minlength="6" maxlength="6" >
                                          </div>
                                          <div class="form-group col-md-12 m-t-20">
                                             <label>Address : <span class="star">*</span></label>
                                             <textarea id="present_full_address" name="current_address" class="form-control" rows="4" placeholder="Complete Current/Present address" required autocomplete="off" maxlength="100"><?php echo $current_address; ?></textarea>
                                          </div>
                                    </div>
                                 </div>
                                                                                                                                                   
                                 <div class="card-body">
                                    <div class="note" style="border-radius: 5px;border: 2px solid; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 15px; text-transform: capitalize;color:black">
                                       <i class="fa fa-home" aria-hidden="true" style="color:#ff0000;"></i>&nbsp;&nbsp;
                                       <span style="color:#ff0000;">Registered/Permanaent Address &#8594; </span>
                                       <span class="pull-right "></span>                                          
                                    </div>
                                    <div class="col-md-12">
                                       <div class="" style="float:center;">															   
                                          <b><span style="color:#3a8ace;"> <input type="checkbox" id='same_addr_check' name="same_addr_check"  onclick="autoFilAddress()"  >&nbsp; Same as Present address </span></b>                                                                                                                         
                                       </div>
                                    </div>
                                 </div>

                                 <div style="display:block">
                                    <div class="row mx-3">                                                   
                                       <div class="form-group col-md-3 m-t-20">
                                             <label>State : <span class="star">*</span></label>
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
                                             <label>District : <span class="star span1">*</span></label>
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
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>City : <span class="star span1">*</span></label>
                                          <input type="text" id="permanent_city" name="city_second" class="form-control" value="<?php echo $city_second; ?>" required placeholder="city" >                                    
                                       </div>
                                       <div class="form-group col-md-3 m-t-20">
                                          <label>Pin Code <span class="star span1">*</span></label>
                                          <input type="number" name="pincode_second" id="pin_code2" class="form-control" id="pin_code1" value="<?php echo $pincode_second; ?>" pattern="[0-9]{6}" required placeholder="pin code" minlength="6" maxlength="6" >
                                       </div>
                                       <div class="form-group col-md-12 m-t-20">
                                          <label>Address : <span class="star">*</span></label>
                                          <textarea id="permanent_full_address" name="permanent_address" class="form-control" rows="3" placeholder="Complete Registered/Permanaent address" required autocomplete="off" maxlength="100"><?php echo $permanent_full_address; ?></textarea>
                                       </div>
                                    </div>                                   
                                 </div>  
                                                                                                 
                                 <br><br><br><br>                              
                                 <input type="hidden" name="isedit" value="<?php echo $update; ?>">                                 
                                 <div style="background-color: #fff;border-top: 1px dashed #1abc9c;padding: 20px 25px;position: inherit"></div>
                                 
                                    <!--<section class="btn-section" style="border-color:#1976d2">-->
                                       <div class="row">
                                          <div class="col-md-12">
                                             <div class="" style="float:right;">                                                
                                                <button type="submit"  name="submit" onclick='return submitForm()' id="sub_btn" class="btn footer-button"><i class="fa fa-check"></i> Save & Next</button>                                                   
                                             </div>
                                          </div>
                                       </div>
                                    <!--</section>-->                                                       

                                 <!--
                                 <div class="tab-header card">
                                    <div class="form-group col-md-12 m-t-20">
                                       <div class="" style="float:right;">                                                
                                          <button type="submit"  name="submit" onclick='return submitForm()' id="sub_btn" class="btn footer-button"><i class="fa fa-check"></i> Save & Next</button>                                                   
                                       </div>                                          
                                    </div>
                                 </div>
                                 -->
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
</div></div></div>      
<!-- Optional JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

   function ShowHideDiv() 
   {
         var seller_type = document.getElementById("seller_type");
         //alert(seller_type);
         if(seller_type.value == "1" || seller_type.value == "5")
         {           
            $("#seller_info").show();

            $("#proprietor_name_view").show();
            $("#gender_details_view").show();
            $("#aadharno_details_view").show();

            $("#partners_name_view").hide();
            $("#director_name_view").hide();
            $("#cin_no_view").hide();                     
         }
         else if(seller_type.value == "2" || seller_type.value == "4")
         {
            $("#seller_info").show();

            $("#partners_name_view").show();
            
            $("#proprietor_name_view").hide();
            $("#director_name_view").hide();
            $("#gender_details_view").hide();
            $("#aadharno_details_view").hide();
            $("#cin_no_view").hide();                   
         } 
         else if(seller_type.value == "3")
         {
            $("#seller_info").show();

            $("#director_name_view").show();
            $("#cin_no_view").show();

            $("#partners_name_view").hide();            
            $("#proprietor_name_view").hide();   
            $("#gender_details_view").hide();
            $("#aadharno_details_view").hide();                      
         } 
         else
         {
            $("#seller_info").hide();                                 
         }             
   }
   
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
				
		var frm = $('#seller_registration_form');
      var seller_type = document.getElementById('seller_type').value;		
		var user_type = document.getElementById('usertype').value;

		var seller_name = document.getElementById('seller_name').value;
      var proprietor_name = document.getElementById('proprietor_name').value;
      var partners_name = document.getElementById('partners_name').value;
      var director_name = document.getElementById('director_name').value;
      var cin_no = document.getElementById('cin_no').value;
      var panNo = document.getElementById('panNo').value;
		var gstin = document.getElementById('gstin').value;
      var tanNo = document.getElementById('tanNo').value;
   
      var nodal_person_pame = document.getElementById('nodal_person_pame').value;
      var nodal_person_contact = document.getElementById('nodal_person_contact').value;
      var nodal_person_email = document.getElementById('nodal_person_email').value;

      var contact = document.getElementById('contact').value;
      var email = document.getElementById('email').value;
      var gender = document.getElementById('gender').value;
      var aadharno = document.getElementById('aadharno').value;					

      var region_id = document.getElementById('region_id').value;
      var region_state = document.getElementById('region_state').value;
      var district_branch = document.getElementById('district_branch').value;
	
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
        
		var emp_image = document.getElementById('emp_image').value;
      var agent_signature = document.getElementById('agent_signature').value;
		
		if (seller_type =="") 
		{
			alert("Seller Type is Mandatory!");
         return false;			
		}
		else if (user_type =="") 
		{
			alert("User Type is Mandatory!");
         return false;			
		}
		else if (seller_name =='') 
		{
			if(seller_type ==1 || seller_type ==5 || seller_type ==2 || seller_type ==4)
         {
            alert("Seller name (Name of Shop) is Mandatory!");
            return	false; 
         }
         else if(seller_type ==3)
         {
            alert("Seller name (Name of company) is Mandatory!");
            return	false; 
         } 
		}
      else if (proprietor_name =='') 
		{
			if(seller_type ==1 || seller_type ==5)
         {
            alert("Proprietor name (Name of individual) is Mandatory!");
            return	false; 
         } 
		}
      else if (partners_name =='') 
		{
			if(seller_type ==2 || seller_type ==4)
         {
            alert("Partner’s name (Name of any one partner) is Mandatory!");
            return	false; 
         } 
		}
      else if (director_name =='') 
		{
			if(seller_type ==3)
         {
            alert("Director’s name (Name of any one Director) is Mandatory!");
            return	false; 
         } 
		}
      else if (nodal_person_pame =='') 
		{
			alert("Nodal Person (Employee who will coordinate with IndiGem) is Mandatory!");
         return false;
		}
      else if (nodal_person_contact =='') 
		{
			alert("Nodal Person (Employee who will coordinate with IndiGem) is Mandatory!");
         return false; 
		}
      else if (nodal_person_email =='') 
		{
			alert("Nodal Person (Employee who will coordinate with IndiGem) is Mandatory!");
         return false; 
		}
		else if (contact =='') 
		{
			alert("Mobile Number is Mandatory!");
         return false;
		}
		else if (email =='') 
		{
			alert("Email is Mandatory!");
         return false;
		}
		else if (gender =='') 
		{
			if(seller_type ==1 || seller_type ==5)
         {
            alert("Gender is  Mandatory!");
            return	false; 
         } 
		}
      else if (aadharno =='') 
		{
         if(seller_type ==1 || seller_type ==5)
         {
            alert("Aadhar Number is  Mandatory!");
            return	false; 
         }  
		}
		else if (panNo =='') 
		{
			alert("PAN Number is Mandatory!");
         return false;
		}
		else if (gstin =='') 
		{
			alert("GSTIN Number is Mandatory!");
         return false;
		}
      else if (tanNo =='') 
		{
			if(seller_type ==2 || seller_type ==3 || seller_type ==4)
         {
            alert("TAN Number is Mandatory!");
            return	false; 
         } 
		}
      else if (cin_no =='') 
		{
			if(seller_type ==3)
         {
            alert("CIN Number of company is Mandatory!");
            return	false; 
         } 
		}
      else if (region_id =='') 
		{
			alert("Region ID is Mandatory!");
         return false;
		}
		else if (region_state =='') 
		{
			alert("Region State is Mandatory!");
         return false;
		}
		else if (district_branch =='') 
		{
			alert("State Branch is Mandatory!");
         return false;
		}
		else if (stateid_first =='' || district_first =='' || city_first =='' || pin_code1 =='' || present_full_address =='') 
		{
			alert("Current/Present address is Mandatory!");
         return false;
		}
		else if (stateid_second =='' || district_second =='' || city_second =='' || pin_code2 =='' || permanent_full_address =='') 
		{
			alert("Registered/Permanent address is Mandatory!");
         return false;
		}		
		else if (emp_image =='') 
		{
			alert("Organization/Company/Firm/Shop Logo is Mandatory!");
         return false;
		}
      else if (agent_signature =='') 
		{
			alert("Seller Scan Signature Photo in Passport size is Mandatory!");
         return false;
		}	
		else
		{
			//document.getElementById("seller_registration_form").submit();
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
		//var mobileno = document.getElementById('contact').val;
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
        //var regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
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

   $('#nodal_person_contact').change(function () {
		var text = "";
		//var mobileno = document.getElementById('nodal_person_contact').val;
		var mobileno = $(this).val();
		//var cellphoneNummber = /^[0123456789]\d{9}$/;
        var cellphoneNummber = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;		
		if (mobileno.match(cellphoneNummber))	
		{
			$('#nodal_person_contact').attr('style', 'border:1px solid green !important;');
            $('#nodal_person_contact').css({ "background-color": "#ffffff" });
			return true;						
		}
		else
		{		        			
			$("#nodal_person_contact").attr('style', 'border:1px solid #d03100 !important;');
            $("#nodal_person_contact").css({ "background-color": "#fff2ee" });
	        text += " \u002A" + " Please Enter Valid 10 digit Mobile Number.";
			alert(text);
		    $("#nodal_person_contact").val("");
            $(this).focus();
            return false;
		}		      
   });

   $('#nodal_person_email').change(function () {
		var text = "";
		var match = "";		
		var email_val = $(this).val();
        //var regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;        
		if (email_val.match(mailformat))	       
		{
			$('#nodal_person_email').attr('style', 'border:1px solid green !important;');
            $('#nodal_person_email').css({ "background-color": "#ffffff" });
			return true;			           
        }
		else
		{
            $("#nodal_person_email").attr('style', 'border:1px solid #d03100 !important;');
            $("#nodal_person_email").css({ "background-color": "#fff2ee" });
	        text += " \u002A" + " Please Enter Valid Email ID.";
			alert(text);
		    $("#nodal_person_email").val("");
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

	$('#gstin').on('change', function () {
		var text = "";
        //var statecode = $(this).val().substring(0, 2);
        //var pancarno = $(this).val().substring(2, 12);
        //var entityNumber = $(this).val().substring(12, 13);
        //var defaultZvalue = $(this).val().substring(13, 14);
        //var checksumdigit = $(this).val().substring(14, 15);
			
        if ($(this).val().length != 15) 
		  {           
			text += " \u002A" + " Please Enter Valid 15 digit GST Number.";
			alert(text);
			$("#gstin").attr('style', 'border:1px solid #d03100 !important;');
            $("#gstin").css({ "background-color": "#fff2ee" });
		    $("#gstin").val("");
            $(this).focus();
            return false;			
        }
		else       
		{
			$('#gstin').attr('style', 'border:1px solid green !important;');
            $('#gstin').css({ "background-color": "#ffffff" });
			return true;			           
        }
		/*	
            if (pancarno.length != 10) {
                alert('GST number is invalid ');
                $(this).focus();
                return false;
            }
            if (defaultZvalue !== 'Z') {
                alert('GST Number is invalid Z not in Entered Gst Number');
                $(this).focus();
            }

            if ($.isNumeric(statecode)) {
                $('#gst_state_code').val(statecode).trigger('change');
            } else {
                alert('Please Enter Valid State Code');
                $(this).focus();
            }

            if ($.isNumeric(checksumdigit)) {
                return true;
            } else {
                alert('GST number is invalid last character must be digit');
                $(this).focus();

            }
        */
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
      
                  
 </script>

 <script type="text/javascript">
  
   function proPic(input) 
   {
      var fileEmpty = $('#emp_image').get(0).files.length === 0;
      var size = parseFloat(emp_image.files[0].size / 1048576).toFixed(2);
            
      if (!fileEmpty && size > 1) 
      {
         alert("File size must be under 1MB !");
         $('#emp_image').val('');                             
         document.getElementById("blah").src = "<?php  echo base_url(); ?>assets/images/arrow-emblem.png";
         $('#blah').attr('style', 'border:0px solid grey !important;');
         $("#pro_img").attr('style', 'border: 1px solid #d03100 !important;margin-left: 0px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a');                                       
      }
      else
      {
         var fileInput = document.getElementById('emp_image');
         var filePath = fileInput.value;
         // Allowing file type
         var allowedExtensions =  /(\.jpg|\.jpeg|\.png)$/i;              
         if (!allowedExtensions.exec(filePath)) 
         {
            alert('Invalid file type ! Please Select jpg/jpeg/png file type');
            $('#emp_image').val('');                             
            document.getElementById("blah").src = "<?php  echo base_url(); ?>assets/images/arrow-emblem.png";
            $('#blah').attr('style', 'border:0px solid grey !important;');
            $("#pro_img").attr('style', 'border: 1px solid #d03100 !important;margin-left: 0px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a');
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
               $("#pro_img").attr('style', 'border: 1px solid green !important;margin-left: 0px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a');
                     
            }
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
               $("#sign_img").attr('style', 'border: 1px solid #d03100 !important;margin-left: 0px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a');                                
            }
            else
            {
               var fileInput = document.getElementById('agent_signature');
               var filePath = fileInput.value;
               // Allowing file type
               var allowedExtensions =  /(\.jpg|\.jpeg|\.png)$/i;              
               if (!allowedExtensions.exec(filePath)) 
               {
                  alert('Invalid file type ! Please Select jpg/jpeg/png file type');
                  $('#agent_signature').val('');                             
                  document.getElementById("la_signature").src = "<?php  echo base_url(); ?>assets/images/signature.png";
                  $("#sign_img").attr('style', 'border: 1px solid #d03100 !important;margin-left: 0px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a');                                
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
                     $("#sign_img").attr('style', 'border: 1px solid green !important;margin-left: 0px; margin-bottom: 15px; padding: 5px; font-weight: bold; font-size: 13px; text-transform: capitalize;color:#5049251a');                 
                  }
               }
            }
   }
</script>

</script>
