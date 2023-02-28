<?php
   $sellerid = $this->session->userdata('user_login_id'); 

   if(isset($seller) && $seller !="")
   {
      foreach ($seller as $value)
      {
         $seller_id = $value->seller_id;
         $permanent_state = $value->state_second;
         $permanent_district = $value->district_second;
         $permanent_city =$value->city_second;
         $permanent_pincode =$value->pincode_second;
         $permanent_address =$value->permanent_address;
		   $labh_executive_id =$value->labh_emp_id;
		   $labh_agent_id =$value->labh_agent_id;
         $region_id =$value->region_id;
			$region_state =$value->region_state;
			$district_branch =$value->district_branch;
          
      }
			
    /*
        $state = $this->db->query("SELECT statename FROM state_master WHERE state_id=".$permanent_state." limit 1");
        $state = $state->result_array();
        foreach($state as $state)
        { 
           $state_name = $state['statename'] ; 
        } 
		
        $District_name='';
        $district = $this->db->query("SELECT Districtname FROM district_master WHERE Districtcode=".$permanent_district." limit 1");
        $district = $district->result_array();
        foreach($district as $district)
        {
           $District_name = $district['Districtname'] ;
        }
	*/	
   }

   $id = "";
   $update = "";
   $order_type ="";
   
   //$seller_id = "";
   //$region_id = "";
   //$labh_executive_id = "";
   //$labh_agent_id = "";

   $igcpl_workorder_id="";
   $gemNgem_workorder_id="";
   $pick_location = "";
   $state_first = "";
   $district_first = "";
   $seller_city = "";
   $seller_pincode = "";
   $select_product ="";
   //$order_type = "";
   $buyer_name = "";
   $email = "";
   $quantity = "";
   $contact = "";
   $statename = "";
   $districtname ="";
   $city = "";
   $pincode = "";
   $consignee_address = "";
   $organization_name = "";
   $gstin = "";
   $logistics = "";
   $ready_delivery_date ="";
   $expected_date = "";
   $gem_workorder_doc = "";
   $eway_bill_part_1 = "";
   $value_gem_order = "";
   $including_gst = "";
   $bill_discounting = "";
   $sample_clause = "";
   //$product_list ="";
          
   if(isset($workorder) && $workorder !="")
   {
      $update = true;
      foreach($workorder as $value)
      {
         $id = $value['id'];
         $sellerid = $value['sellerid'];

         //$region_id = $value['region_id'];
         //$labh_executive_id = $value['labh_emp_id'];
         //$labh_agent_id = $value['agent_id'];

         $igcpl_workorder_id = $value['igcpl_workorder_id'];
         $gemNgem_workorder_id = $value['gemNgem_workorder_id'];
         $order_type = $value['order_type'];
         $pick_location = $value['pick_location'];
         $state_first = $value['seller_state'];
         $district_first = $value['seller_district'];
         $seller_city = $value['seller_city'];
         $seller_pincode = $value['seller_pincode'];
         $select_product = $value['select_product'];
         $buyer_name = $value['buyer_name'];
         $email = $value['email'];
         $quantity = $value['quantity'];
         $contact = $value['contact'];
         $statename = $value['statename'];
         $districtname = $value['districtname'];
         $city = $value['city'];
         $pincode = $value['pincode'];
         $consignee_address = $value['consignee_address'];
         $organization_name= $value['organization_name'];
         $gstin = $value['gstin'];
         $logistics = $value['logistics'];
         $ready_delivery_date = $value['ready_delivery_date'];
         $expected_date = $value['expected_date'];
         $value_gem_order = $value['value_gem_order'];
         $including_gst = $value['including_gst'];
         $gem_workorder_doc = $value['gem_workorder_doc'];
		   $eway_bill_part_1 = $value['eway_bill_part_1'];
         $bill_discounting = $value['bill_discounting'];
         $sample_clause = $value['sample_clause'];
      };
   }
?>
<style>
   .star
   {
      color:red;
      font-size: 18px;
   }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/seller.css">

<?php  $this->load->view('backend/workorder_header');?>
<div class="page-body" aria-labelledby="orderdetails">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <form id="workorder_form" action="<?php echo base_url()?>Seller_module/genrate_workorder" method="post" enctype="multipart/form-data">
               <div class="card-header">
                  <h5>Workorder Details</h5>
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
                        <input type="hidden" class="form-control" id="labh_executive_id" name="labh_executive_id" readonly required value="<?php echo $labh_executive_id; ?>" >
                        <input type="hidden" class="form-control" id="labh_agent_id" name="labh_agent_id" readonly required value="<?php echo $labh_agent_id; ?>" >
                        <input type="hidden" class="form-control" id="region_id" name="region_id" readonly required value="<?php echo $region_id; ?>" >						 
                        <input type="hidden" class="form-control" id="region_state" name="region_state"  required readonly value="<?php echo $region_state; ?>">
                        <input type="hidden" class="form-control" id="district_branch" name="district_branch" readonly required value="<?php echo $district_branch; ?>" >

                        <h4 class="sub-title" style="color:red;"><i class="feather icon-shopping-cart"></i>&nbsp; Order Details :</h4>
                        <div class="card-block inner-card-block">                        
                           <div class="row m-b-30">
                              <div class="col-sm-4">
                                 <h4 class="sub-title">Seller Id <span class="star">*</span></h4>
                                 <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon7"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control"  readonly disabled ="disabled" required value="<?php echo $sellerid; ?>" >
                                    <input type="hidden" class="form-control" id="sellerid" name="sellerid" readonly  required value="<?php echo $sellerid; ?>" >
                                 </div>
                              </div>

                              <div class="col-sm-4">
                                 <h4 class="sub-title">Order Type <span class="star">*</span></h4>
                                 <div class="input-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon7"><i class="fa fa-shopping-basket" aria-hidden="true"></i></span>
                                        <select name="order_type" id="order_type" required class="form-control">
                                          <option value="">Order Type</option>                                                                                  
                                          <option value="01" <?php echo $order_type == "01" ? " selected" : "";?>> GeM </option>
                                          <option value="02" <?php echo $order_type == "02" ? " selected" : "";?>> Non GeM </option>
                                        </select>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-sm-4">
                                 <h4 class="sub-title">Gem Contract No. <span class="star">*</span></h4>
                                 <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon7"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" id="gemNgem_workorder_id" name="gemNgem_workorder_id" required placeholder="Gem Workorder Id" value="<?php echo $gemNgem_workorder_id; ?>">
                                 </div>
                              </div>

                              <div class="col-sm-12">
                                 <h4 class="sub-title" style="color:red;"><i class="fa fa-map-marker"></i>&nbsp; Seller Address/Product Pickup Address :</h4>
                              </div>

                              <div class="col-sm-3" id="seller_registered_state" style="display:none;">
                                 <h4 class="sub-title"> State <span class="star">*</span></h4>
                                 <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>    
									         <select name="seller_state" class="form-control" id="seller_state" required autocomplete="off">
                                       <option value="">-- Select State --</option>                                      
                                       <?php 
                                          foreach($state_list as $c)
                                          {  ?>
                                             <option value="<?= $c->statecode; ?>" <?php echo $permanent_state == $c->statecode ? " selected" : ""; ?> ><?= $c->statename; ?></option>
                                             <?php  
                                          }  ?>
                                       ?>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-sm-3" id="seller_registered_district" style="display:none;">
                                 <h4 class="sub-title">  District <span class="star">*</span></h4>                                   
                                 <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>   
                                    <select id="seller_district" name="seller_district" class="form-control"  autocomplete="off">                                                                                                          
                                       <?php 
                                          if(isset($workorder) && $workorder !="") 
                                          {                                            
                                             foreach($district_list as $dist)
                                             {  ?>
                                                <option value="<?= $dist->Districtcode; ?>" <?php echo workorder[0]['seller_district'] == $dist->Districtcode ? " selected" : ""; ?>><?= $dist->Districtname; ?></option>
                                                <?php  
                                             } 
                                          }
                                          else 
                                          {  ?>
                                             <option value=""> -- Select District -- </option>
                                             <?php                                                                        
                                             foreach($district_list as $dist)
                                             {  ?>                                                           
                                                <option value="<?= $dist->Districtcode; ?>" <?php echo $permanent_district == $dist->Districtcode ? " selected" : ""; ?>><?= $dist->Districtname; ?></option>
                                                <?php  
                                             } 
                                          }   
                                       ?> 
                                    </select>
                                 </div>
                              </div>

                              <div class="col-sm-3" id="seller_registered_city" style="display:none;">
                                 <h4 class="sub-title"> City <span class="star">*</span></h4>
                                 <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>   
                                    <input type="text" class="form-control" id="seller_city" required name="seller_city" value="<?php echo $permanent_city ; ?>">
                                 </div>
                              </div>

                              <div class="col-sm-3" id="seller_registered_pincode" style="display:none;">
                                 <h4 class="sub-title"> Pincode <span class="star">*</span></h4>
                                 <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control"  id="seller_pincode" name="seller_pincode" required pattern="[0-9]{6}" minlength="6" maxlength="6" value="<?php echo $permanent_pincode; ?>">
                                 </div>
                              </div>
                              
                              <div class="col-sm-11">
                                 <h4 class="sub-title">Address <span class="star">*</span></h4>
                                 <div class="input-group">
                                    <div class="input-group">
                                       <textarea class="form-control max-textarea" id="seller_pickup_location_disable" oninput="newAddress()"  required disabled ="disabled" placeholder="Seller Full Address"  rows="2"><?php echo $permanent_address; ?></textarea>
                                       <input type="hidden" class="form-control" id="seller_pickup_location" name="seller_pickup_location" required  value="<?php echo $permanent_address; ?>">
                                       <!--<textarea hidden class="form-control max-textarea"  id="seller_pickup_location" name="seller_pickup_location"  value="<?php //echo $permanent_address; ?>" >-->
                                    </div>
                                 </div>
                              </div>

                              <div class="col-sm-1">
                                 <!--<h4 class="sub-title uppercaser" style="text-align:left;" >Actio</h4>-->                                
                                 <div class="input-group" style="margin-top:55px;">                                  
									         <a  id='change_address' onclick='changeAddress()' class="btn  btn-round btn-block text-white btn-out-dashed" style="background: #00acaf; border: 1px solid #00acaf;padding: 7px 19px"> <i class="fa fa-pencil-square-o"></i> </Address></a>
                                 </div>                        
                              </div>                           
                           </div>
                        </div>
                     </div>
                  </div>
             
               <!--
                  <div class="card-block">
                     <div class="row">
                        <div class="col-sm-12">
                           <h4 class="sub-title"><i class="fa fa-cart-plus" aria-hidden="true"></i> Product Details </h4>
                           <div class="card-block inner-card-block">
                              <div class="row m-b-30">
                                 <div class="col-sm-12">
                                    <h4 class="sub-title">Selected Product Categort</h4>
                                    <textarea class="form-control max-textarea bg-white" maxlength="255" rows="4" name="select_product" id="result"  placeholder="Seller Full Address" > <?php echo $select_product; ?></textarea>
                                 </div>
                              </div>
                              <div class="row m-b-30">
                                 <div class="col-sm-12">
                                    <h4 class="sub-title">Select Product Categort <span class="star">*</span></h4>
                                    <div class="card card-block user-card">
                                       <div class="slimScrollDiv"style=" position:relative; width:auto; height:500px;overflow:scroll; white:100%;">
                                          <div class="row ">
                                             <?php  foreach($product as $value) { 
                                                $check = $value->pro_cat_id." ".$value->product_category;
                                                ?> 

                                             <div class="col-lg-6">
                                                <input class="mr-2" onclick="myFunc()" type="checkbox"  id="select_product" 
                                                 <?php if(isset($workorder)){if($check == $workorder[0]['select_product']){ ?> checked <?php }} ?> 
                                                name="productcategory_name[]"
                                                value="<?php echo $check ?>"><?php echo $value->product_category ?>                                     
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
               -->

                <!--<div class="card-block"> this is for space from left side and right side in this page-->
                     <div class="row">
                        <div class="col-sm-12">
                           <h4 class="sub-title" style="color:red;"><i class="fa fa-user-secret"></i>&nbsp; Buyer Details :</h4>
                           
                           <div class="card-block inner-card-block">
                              <div class="row m-b-30">
                                 <div class="col-sm-3">
                                    <h4 class="sub-title">Buyer Name <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-user" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" required id="buyer_name"  name="buyer_name" placeholder="Buyer Name"  minlength="3" value="<?php echo $buyer_name;?>">
                                    </div>
                                 </div>
                                 <div class="col-sm-3">
                                    <h4 class="sub-title">Organization Name <span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-university" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" id="buyer_organization_name" placeholder="Organization Name" name="buyer_organization_name" value="<?php echo $organization_name?>">
                                    </div>
                                 </div>
                                 <div class="col-sm-3">
                                    <h4 class="sub-title">Phone Number <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" placeholder="Phone" required id="buyer_contact" name="buyer_contact" minlength="10" maxlength="12" value="<?php echo $contact;?>">
                                    </div>
                                 </div>
                                 <div class="col-sm-3">
                                    <h4 class="sub-title">Email Id  <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                       <input type="email" class="form-control" required id="buyer_email" name="buyer_email" placeholder="Email" value="<?php echo $email;?>">
                                    </div>
                                 </div>                                
                              </div>buyer_city                             
                              <div class="row m-b-30">
                                 <div class="col-sm-3">
                                    <h4 class="sub-title">Delevery City <span class="star">*</span></h4>
                                    <div class="input-group"><!--oninput="getAddressByPincode()"-->
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" id="buyer_city"  name="buyer_city"  placeholder="city name"  value="<?php echo $pincode; ?>">
                                    </div>
                                 </div>                               
                                 <div class="col-sm-3">
                                    <h4 class="sub-title">Delevery Pincode <span class="star">*</span></h4>
                                    <div class="input-group"><!--oninput="getAddressByPincode()"-->
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" id="buyer_pincode"  name="buyer_pincode" onchange="getAddressByPincode()" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="pincode" required pattern="[0-9]{6}" minlength="6" maxlength="6" value="<?php echo $pincode; ?>">
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <h4 class="sub-title"> Buyer Full Address <span class="star">*</span></h4>
                                    <textarea class="form-control max-textarea" maxlength="255" rows="1" id="buyer_full_address" name="buyer_full_address" placeholder="Buyer Full Address" required="" ><?php echo $consignee_address; ?></textarea>
                                 </div>
                              </div>                                                                                                   							  
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-sm-12">
                           <h4 class="sub-title" style="color:red;"><i class="fa fa-newspaper-o"></i>&nbsp; Contract Details :</h4>
                           <div class="card-block inner-card-block">                              
                              <div class="row m-b-30">                                                                
                                 <div class="col-sm-12">
                                    <h4 class="sub-title"> Product Category <span class="star">*</span></h4>
                                    <textarea class="form-control max-textarea" rows="2" id="product_category" name="product_category" placeholder="Product Category" required="" ><?php echo $select_product; ?></textarea>
                                 </div>
                              </div> 
                              <div class="row m-b-30">
                                 <div class="col-sm-6">
                                    <h4 class="sub-title">Quantity (as on gem workorder) <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" name="product_quantity" id="product_quantity" placeholder="Quantity" required="" minlength="1" value="<?php echo $quantity;?>">
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <h4 class="sub-title">Contract Value (GMV) <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" id="value_gem_order" name="value_gem_order" placeholder="Value of Gem Order" required value="<?php echo $value_gem_order; ?>">
                                    </div>
                                 </div>                                  
                              </div>                                                  
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-sm-12">
                           <h4 class="sub-title" style="color:red;"><i class="fa fa-handshake-o"></i>&nbsp; Service Requirement :</h4>
                           <div class="card-block inner-card-block">                                                            
                              <div class="row m-b-30">                                                                                           
                                 <div class="col-sm-5">
                                    <h4 class="sub-title">Is There a Sample Clause in work Order ? <span class="star">*</span></h4>
                                    <div class="form-radio">
                                       <div class="radio radiofill radio-primary radio-inline">
                                          <label>
                                             <input type="radio" id="sample_clause" name="sample_clause" value="yes" data-bv-field="member" <?php echo $sample_clause == "yes" ? " checked" : "";?>>
                                             <i class="helper"></i>Yes  
                                          </label>
                                       </div>
                                       <div class="radio radiofill radio-primary radio-inline">
                                          <label>
                                             <input type="radio" id="sample_clause" name="sample_clause" value="no" data-bv-field="member" <?php echo $sample_clause == "no" ? " checked" : "";?> >
                                             <i class="helper"></i>No
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-5">
                                    <h4 class="sub-title">Would You like to opt for Bill Discounting ? <span class="star">*</span></h4>
                                    <div class="form-radio">
                                       <div class="radio radiofill radio-primary radio-inline">
                                          <label>
                                             <input type="radio" id="bill_discounting" name="bill_discounting" value="Yes" data-bv-field="member" <?php echo $bill_discounting == "Yes" ? " checked" : "";?>>
                                             <i class="helper"></i>Yes
                                          </label>
                                       </div>
                                       <div class="radio radiofill radio-primary radio-inline">
                                          <label>
                                             <input type="radio" id="bill_discounting" name="bill_discounting" value="No" data-bv-field="member" <?php echo $bill_discounting == "No" ? " checked" : "";?>>
                                             <i class="helper"></i>No
                                          </label>
                                       </div>
                                       <!--   
                                       <div class="radio radiofill radio-primary radio-inline">
                                          <label>
                                             <input type="radio" id="bill_discounting" name="bill_discounting" value="Cant_say" data-bv-field="member" <?php echo $bill_discounting == "Cant_say" ? " checked" : "";?>>
                                             <i class="helper"></i>Can't say now
                                          </label>
                                       </div>
                                       -->   
                                    </div>
                                 </div>

                                 <div class="col-sm-2">
                                    <h4 class="sub-title">Coordination ? <span class="star">*</span>  </br></h4>
                                    <div class="form-radio">
                                       <div class="radio radiofill radio-primary radio-inline">
                                          <label>
                                             <input type="radio" id="coordination" name="coordination" value="yes" disabled ="disabled" data-bv-field="member" <?php echo $sample_clause == "yes" ? " checked" : "";?>>
                                             <i class="helper"></i>Yes  
                                          </label>
                                       </div>
                                       <div class="radio radiofill radio-primary radio-inline">
                                          <label>
                                             <input type="radio" id="coordination" name="coordination" value="no" disabled ="disabled" data-bv-field="member" <?php echo $sample_clause == "no" ? " checked" : "";?> >
                                             <i class="helper"></i>No
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                             						  
                              <div class="row m-b-30">
                                 <div class="col-sm-6">
                                    <h4 class="sub-title">upload GeM/Non GeM Contract Doc. (Only: pdf / zip) <span class="star">*</span></h4>
                                    <?php if(isset($workorder) && $workorder !="") { ?>
                                       <div class="input-group">
                                          <input type="file" accept=".pdf,.zip" id="gem_workorder_doc"  class="form-control bg-white" name="gem_workorder_doc"  value="<?php echo $gem_workorder_doc; ?>">
                                          <span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-o" aria-hidden="true"></i></span>
                                       </div>
                                       
                                    <?php } else { ?>
                                      <div class="input-group">
                                          <input type="file" accept=".pdf,.zip" id="gem_workorder_doc"  class="form-control bg-white" name="gem_workorder_doc" required="" value="<?php echo $gem_workorder_doc; ?>">
                                          <span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-o" aria-hidden="true"></i></span>
                                       </div>
                                       <h4 class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 2MB</b> </h4>
                                    <?php } ?>
                                 </div>
                                 <div class="col-sm-6">
                                    <h4 class="sub-title">Logistics <span class="star"> *</span></h4>
                                       <div class="input-group">
                                          <span class="input-group-addon" id="basic-addon7"><i class="fa fa-truck" aria-hidden="true"></i></span>
                                          <select name="logistics_type" id="logistics_type" onchange ="ShowHideDiv()" required class="form-control " value="<?php echo $logistics?>">
                                             <option> --- select logistics ---</option>
                                             <option value="selfFulfillment" <?php echo $logistics == "selfFulfillment" ? " selected" : "";?>>Self Fulfillment</option>
                                             <option value="Picemeal" <?php echo $logistics == "Picemeal" ? " selected" : "";?>>Picemeal Fulfilment</option>
                                             <option value="BulkFulfilment" <?php echo $logistics == "BulkFulfilment" ? " selected" : "";?>>Bulk Fulfilment</option>                                            
                                          </select>
                                       </div>
                                 </div>                                
                              </div>                                                       
                             
                              <div class="row m-b-30">                              
                                 <div class="col-sm-4" id="ready_date" style="display: block">
                                    <h4 class="sub-title">Ready for Delivery Date <span class="star">*</span></h4>
                                    <div class="form-group">
                                       <div class="input-group date" id="datetimepicker1">
                                          <span class="input-group-addon ">
                                             <span class="icofont icofont-ui-calendar"></span>
                                          </span>
                                          <input type="date" class="form-control" id="ready_delivery_date" name="ready_delivery_date" value="<?php echo $ready_delivery_date; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4" id="delivery_date" style="display: block">
                                    <h4 class="sub-title"> Delivery Completion Date <span class="star">*</span></h4>
                                    <div class="form-group">
                                       <div class="input-group date" id="datetimepicker1">
                                          <span class="input-group-addon " style="">
                                              <span class="icofont icofont-ui-calendar"></span>
                                          </span>
                                          <input type="date" class="form-control" id="delivery_completion_date"  name="delivery_completion_date" value="<?php echo $expected_date; ?>">
                                       </div>
                                    </div>
                                 </div>
								         <div class="col-sm-4" id="eway_bil" style="display: block">
                                    <h4 class="sub-title">Upload E-Way Bill(Part 1) (Only: pdf) <span class="star">*</span></h4>
                                    <?php if(isset($workorder) && $workorder !="") { ?>
                                       <div class="input-group">
                                          <input type="file" accept=".pdf" id="eway_bill_part_1"  class="form-control bg-white" name="eway_bill_part_1"  value="<?php echo $eway_bill_part_1; ?>">
                                          <span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-o" aria-hidden="true"></i></span>
                                       </div>
                                    <?php } else { ?>
                                      <div class="input-group">
                                          <input type="file" accept=".pdf"  id="eway_bill_part_1" class="form-control bg-white" name="eway_bill_part_1"  value="<?php echo $eway_bill_part_1; ?>">
                                          <span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-o" aria-hidden="true"></i></span>
                                       </div>
                                       <h4 class="text-left" style="font-size:11px; margin-top:-11px; margin-bottom: 5px;"><b>Maximum upload file size : 2MB</b> </h4>
                                    <?php } ?>
                                 </div>
                              </div>                          							  
                           </div>
                        </div>
                     </div>

                     <div class="row" id="shipping_calculation" style="display: block">
                        <div class="col-sm-12">
                           <h4 class="sub-title" style="color:red;"><i class="fa fa-truck " aria-hidden="true"></i>&nbsp; Shipping Charges Calculation :</h4>                           
                           <div class="card-block inner-card-block">
				                  <div class="row m-b-30">								
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">Pickup Pincode <span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" id="pickup_pincode" name="pickup_pincode" placeholder="pickup pincode" required="" pattern="[0-9]{6}" minlength="6" maxlength="6" value="">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">Delivery  Pincode <span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" id="delivery_pincode" name="delivery_pincode" placeholder="delivery pincode" required="" pattern="[0-9]{6}" minlength="6" maxlength="6" value="">
                                    </div>
                                 </div>
                                 
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">No of Packages/Box<span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" id="noofpackages" name="noofpackages" placeholder="no of packages" required="" value="" value="" pattern="[0-9]{6}" minlength="1" maxlength="5">
                                    </div>
                                 </div> 
								
                                 <div class="col-sm-4" style="display:none;">
                                    <h4 class="sub-title">Travle Mode<span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" id="travle_mode" name="travle_mode" placeholder="travle mode" required="" value="Road">
                                    </div>
                                 </div>
								
                                 <div class="col-sm-4">
                                     <h4 class="sub-title">Declared Value of Consignment<span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" id="declared_value" name="declared_value" placeholder="declared value of consignment" required="" value="" value="" minlength="2" maxlength="10">
                                    </div>
                                 </div>  
                              
								         <div class="col-sm-4">
                                    <h4 class="sub-title">Product Box Length (in cm) <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" id="product_length"  onchange="javascript:getChangedWeight()" name="product_length" placeholder="Product Length (in cm)" required minlength="1">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">Product Box Width (in cm)<span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" id="product_width" onchange="javascript:getChangedWeight()" name="product_width" placeholder="Product Width (in cm)" required minlength="1">
                                    </div>
                                 </div>
								         <div class="col-sm-4">
                                    <h4 class="sub-title">Product Box Height (in cm)<span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" id="product_height" onchange="javascript:getChangedWeight()" name="product_height" placeholder="Product Height (in cm)" required minlength="1">
                                    </div>
                                 </div>									 							
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">Actual Weight of Consignment (in kg)<span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" id="actual_weight" name="actual_weight" placeholder="actual weight" required="" value="" value="" minlength="1" >
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">Charged Weight of Consignment (in kg)<span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" id="charged_weight" name="charged_weight" placeholder="charged weight (in kg)" required="" value="" minlength="1" readonly>
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">COD/DOD <span class="star">*</span></h4>
									         <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon7"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
                                       <select id="cod_dod" name="cod_dod" required class="form-control " >                                      
                                          <option value="Y" <?php echo $logistics == "Picemeal" ? " selected" : "";?>>Yes</option>
                                          <option value="N" <?php echo $logistics == "BulkFulfilment" ? " selected" : "";?>>No</option>                                       
                                       </select>
									         </div>
                                 </div>                                
                                 <div class="col-sm-4">
                                    <h4 class="sub-title uppercaser">Shipping Price <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" id="shipping_charges" name="shipping_charges"  value="00.00" readonly disabled ="disabled" required >
                                       <!--<input type="hidden"  id="logistics_amount_ethics" name="logistics_amount_ethics"  value readonly  required >-->
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <h4 class="sub-title uppercaser" style="text-align:left;" >Action<span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <!--<a id='shipping_price' onclick='calculateShipping()' class="btn  btn-round btn-block text-white btn-out-dashed" style="background: #00acaf; border: 2px solid #00acaf;font-size:18px;"><i class="fa fa-calculator"></i>Calculate Shipping price</a>-->
									            <a id='shipping_price' onclick='calculateShipping()' class="btn  btn-round btn-block text-white btn-out-dashed" style="background: #00acaf; border: 1px solid #00acaf;padding: 7px 19px"> <i class="fa fa-calculator"></i> Calculate Shipping price</a>
                                    </div>
                                 </div>
								      </div>
				               </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-sm-12">
                           <h4 class="sub-title" style="color:red;"><i class="fa fa-calculator" aria-hidden="true"></i>&nbsp; Estimate of Charges :</h4>                           
                           <div class="card-block inner-card-block">
				                  <div class="row m-b-30">               
                                 <div class="col-sm-12">                                                                   
                                    <div class="table-responsive">
                                       <table class="table  invoice-detail-table">
                                          <thead>
                                             <tr class="thead-default">
                                                <th>Description</th>
                                                <th>Amount &#8377 </th>                                               
                                                <th>Discount %</th>
                                                <th>Total &#8377</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>
                                                <h6><b>Coordination Charges : </b></h6>
                                                <p>G-Laabh Services </p>
                                                </td>                                               
                                                <td id="coordination_charges"> 00.00 </td>                                      
                                                <td id="coordination_discount"> 0.0 </td>
                                                <td id="coordination_total"> 00.00 </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                <h6><b>Logistics Charges : </b></h6>
                                                <p>G-Plus Services (Fulfilment Charges) { 50% Advance Payment } </p>
                                                </td>                                              
                                                <td id="logistics_amount"> 00.00 </td>                                               
                                                <td id="logistics_discount"> 0.0 </td>
                                                <td id="logistics_total"> 00.00 </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                <h6><b>Sample Clause Facilitation Charges : </b></h6>
                                                <p>G-Laabh Services </p>
                                                </td>                                              
                                                <td id="sample_clause_amount"> 00.00 </td>                                               
                                                <td id="sample_clause_discount"> 0.0 </td>
                                                <td id="sample_clause_total"> 00.00 </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                <h6><b>Cash flow Documentation Charges : </b></h6>
                                                <p>G-Laabh Services </p>
                                                </td>                                              
                                                <td id="cashflow_amount"> 00.00 </td>                                               
                                                <td id="cashflow_discount"> 0.0 </td>
                                                <td id="cashflow_total"> 00.00 </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              
                                 <div class="col-sm-12">
                                    <div class="table-responsive">
                                       <table class="table table-responsive invoice-table invoice-total">
                                          <tbody>
                                             <tr>
                                                <th>&nbsp; Total Taxable Amount  &#8377 : &nbsp;</th>
                                                <td id="total_amount"> 00.00 </td>
                                             </tr>
                                             <tr>
                                                <th>&nbsp;  IGST (18%)  &#8377  : &nbsp;</th>
                                                <td id="total_gst"> 00.00  </td>
                                             </tr>                                            
                                             <tr>
                                                <th>&nbsp;  SGST (9%)  &#8377  : &nbsp;</th>
                                                <td id="sgst"> 00.00 </td>
                                             </tr>
                                             <tr>
                                                <th>&nbsp;  CGST (9%)  &#8377;  : &nbsp;</th>
                                                <td id="cgst"> 00.00 </td>
                                             </tr>                                            
                                             <tr class="text-info">
                                                <td>
                                                   <hr>
                                                   <h5 class="text-primary">&nbsp; Payable Total &#8377; : &nbsp;</h5>
                                                </td>
                                                <td>
                                                   <hr>
                                                   <h5 class="text-primary" id="total_payable_amount"> 00.00  </h5>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>   
                                 </div>
                                 
                                 <input type="hidden" class="form-control" id="coordination_payable_amount" name="coordination_payable_amount" readonly  required value >
                                 <input type="hidden"  id="logistics_amount_ethics" name="logistics_amount_ethics"  value readonly  required >
                                 <input type="hidden" class="form-control" id="logistics_payable_amount" name="logistics_payable_amount" readonly  required value >
                                 <input type="hidden" class="form-control" id="sample_clause_payable_amount" name="sample_clause_payable_amount" readonly  required value >
                                 <input type="hidden" class="form-control" id="cashflow_payable_amount" name="cashflow_payable_amount" readonly  required value >
                                 <input type="hidden" class="form-control" id="total_igst_amount" name="total_igst_amount" readonly  required value >
                                 <input type="hidden" class="form-control" id="total_sgst_amount" name="total_sgst_amount" readonly  required value >
                                 <input type="hidden" class="form-control" id="total_cgst_amount" name="total_cgst_amount" readonly  required value >
                                 <input type="hidden" class="form-control" id="total_workorder_payable_amount" name="total_workorder_payable_amount" readonly  required value >

                                 <div class="col-sm-12">
                                    <h6><b> Note : </b></h6>
                                    <p>This is Preliminary Estimation. Discount is negotiable on case to case basis.Cash flow bill discounting charges of financer are not included in this estimate. </p>
                                 </div>
                              </div>
                           </div>
                        </div>         
                     </div>
                     
                     <div class="card-body">
                        <div class="row my-4">
                           <div class="form-actions col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="" style="float:center;">															   
                                       <b><span> <input type="checkbox" id='tac' name="terms_and_conditions" value="yes" onclick="EnableDisableTextBox()" >&nbsp; I have read and agree to the
                                       <a href="https://indigemcp.com/uploads/Terms_and_conditions/terms_and_conditions.pdf" style="color:#3a8ace;" target="_blank">  Terms and Conditions</a>
                                       </span></b>                                             
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                  </div>
            
                  <div  style="background-color: #fff;border-top: 1px dashed #1abc9c;padding: 20px 25px;position: inherit"></div>

                     <?php
                     /*
                     $ch = curl_init("http://twitter.com/statuses/user_timeline/{yourtwitterfeed}.rss");
                     curl_setopt($ch,CURLOPT_HEADER,0);
                     curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

                     $data = simplexml_load_string(curl_exec($ch));
                     curl_close($ch);

                     echo $data->channel->item[0]->title;
                     */
                     ?>
				      
                  <div class="row">				  
                     <div class="col-lg-4 col-md-4"></div>                                           					 
                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <input type="hidden"  name="isedit" value="<?php echo $update ; ?>"> 
                           <input type="hidden"  name="igcpl_workorder_id" value="<?php echo $igcpl_workorder_id; ?>">                       
                           <!--<button type="submit"  name="submit" onclick='submitForm()' class="btn  btn-round btn-block text-white" style="background: #00acaf; border: 1px solid #00acaf;"><i class="fa fa-user-plus"></i>Generate Workorder </button>-->
                           <button onclick='return submitForm()' id="sub_btn" disabled="disabled" class="btn  btn-round btn-block text-white" style="background: #00acaf; border: 1px solid #00acaf;"><i class="feather icon-shopping-cart"></i>Generate Workorder request</button>
						      </div>
                     </div>
                     <div class="col-lg-4 col-md-4"></div>
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

<script type="text/javascript">

$(document).ready(function() {

	$('#buyer_contact').change(function () {
		var text = "";
		var mobileno = $(this).val();
		//var cellphoneNummber = /^[0123456789]\d{9}$/;
        var cellphoneNummber = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;		
		if (mobileno.match(cellphoneNummber))	
		{
			$('#buyer_contact').attr('style', 'border:1px solid green !important;');
            $('#buyer_contact').css({ "background-color": "#ffffff" });
			return true;						
		}
		else
		{		        			
			$("#buyer_contact").attr('style', 'border:1px solid #d03100 !important;');
         $("#buyer_contact").css({ "background-color": "#fff2ee" });
	      text += " \u002A" + " Please Enter Valid 10 digit Mobile Number.";
			alert(text);
		   $("#buyer_contact").val("");
         $(this).focus();
         return false;
		}
		      
    });
	
    	
	$('#buyer_email').change(function () {
		
		var text = "";
		var match = "";		
		var email_val = $(this).val();
		//var mailformat = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;        
		if (email_val.match(mailformat))	       
		{
			$('#buyer_email').attr('style', 'border:1px solid green !important;');
         $('#buyer_email').css({ "background-color": "#ffffff" });
			return true;			           
      }
		else
		{
         $("#buyer_email").attr('style', 'border:1px solid #d03100 !important;');
         $("#buyer_email").css({ "background-color": "#fff2ee" });
	      text += " \u002A" + " Please Enter Valid Email ID.";
			alert(text);
		   $("#buyer_email").val("");
         $(this).focus();
         return false; 		
      }

    });

   $('#seller_pincode').change(function () {	
		var text = "";
		var match = "";		
		var pin_code1 = $(this).val();	
		var pinpat1=/^\d{6}$/;      
		if (pin_code1.match(pinpat1))	       
		{
			$('#seller_pincode').attr('style', 'border:1px solid green !important;');
         $('#seller_pincode').css({ "background-color": "#ffffff" });
			return true;			           
      }
		else
		{
         $("#seller_pincode").attr('style', 'border:1px solid #d03100 !important;');
         $("#seller_pincode").css({ "background-color": "#fff2ee" });
	      text += " \u002A" + " Please Enter Valid 6 digit Pin code.";
			alert(text);
		   $("#seller_pincode").val("");
         $(this).focus();
         return false; 		
      }
   }); 
	
	
	$('#pickup_pincode').change(function () {	
		var text = "";
		var match = "";		
		var pin_code1 = $(this).val();	
		var pinpat1=/^\d{6}$/;      
		if (pin_code1.match(pinpat1))	       
		{
			$('#pickup_pincode').attr('style', 'border:1px solid green !important;');
         $('#pickup_pincode').css({ "background-color": "#ffffff" });
			return true;			           
      }
		else
		{
         $("#pickup_pincode").attr('style', 'border:1px solid #d03100 !important;');
         $("#pickup_pincode").css({ "background-color": "#fff2ee" });
	      text += " \u002A" + " Please Enter Valid 6 digit Pin code.";
			alert(text);
		   $("#pickup_pincode").val("");
         $(this).focus();
         return false; 		
      }
   });
	
	$('#delivery_pincode').change(function () {
		var text = "";
		var match = "";		
		var pin_code2 = $(this).val();
		var pinpat1=/^\d{6}$/;             
		if (pin_code2.match(pinpat1))	       
		{
			$('#delivery_pincode').attr('style', 'border:1px solid green !important;');
         $('#delivery_pincode').css({ "background-color": "#ffffff" });
			return true;			           
      }
		else
		{
         $("#delivery_pincode").attr('style', 'border:1px solid #d03100 !important;');
         $("#delivery_pincode").css({ "background-color": "#fff2ee" });
	      text += " \u002A" + " Please Enter Valid 6 digit Pin code.";
			alert(text);
		   $("#delivery_pincode").val("");
         $(this).focus();
         return false; 		
      }
   });
	  
   $('#gem_workorder_doc').on('change', function ()
	{   		    
         var fileEmpty = $('#gem_workorder_doc').get(0).files.length === 0;
         var size = parseFloat(gem_workorder_doc.files[0].size / 1048576).toFixed(2);
            
         if (!fileEmpty && size > 2) 
         {
            alert("File size must under 2MB !");
            $('#gem_workorder_doc').val('');                               
            $("#gem_workorder_doc").attr('style', 'border:1px solid #d03100 !important;');
            $("#gem_workorder_doc").css({ "background-color": "#fff2ee" });
         } 
         else
         { 
            var fileInput = document.getElementById('gem_workorder_doc');
            var filePath = fileInput.value;
            
            var allowedExtensions =  /(\.pdf|\.zip)$/i;              
            if (!allowedExtensions.exec(filePath)) 
            {
               alert('Invalid file type ! Please Select pdf/zip file type');
               $('#gem_workorder_doc').val('');                               
               $("#gem_workorder_doc").attr('style', 'border:1px solid #d03100 !important;');
               $("#gem_workorder_doc").css({ "background-color": "#fff2ee" });
            }
            else
            {                
               $('#gem_workorder_doc').attr('style', 'border:1px solid green !important;');
               $('#gem_workorder_doc').css({ "background-color": "#ffffff" });
            }
         }         
   });

   $('#eway_bill_part_1').on('change', function ()
	{   		    
         var fileEmpty = $('#eway_bill_part_1').get(0).files.length === 0;
         var size = parseFloat(eway_bill_part_1.files[0].size / 1048576).toFixed(2);
            
         if (!fileEmpty && size > 2) 
         {
            alert("File size must under 2MB !");
            $('#eway_bill_part_1').val('');                               
            $("#eway_bill_part_1").attr('style', 'border:1px solid #d03100 !important;');
            $("#eway_bill_part_1").css({ "background-color": "#fff2ee" });
         } 
         else
         {
            var fileInput = document.getElementById('eway_bill_part_1');
            var filePath = fileInput.value;
            
            var allowedExtensions =  /(\.pdf)$/i;              
            if (!allowedExtensions.exec(filePath)) 
            {
               alert('Invalid file type ! Please Select pdf file type');
               $('#eway_bill_part_1').val('');                               
               $("#eway_bill_part_1").attr('style', 'border:1px solid #d03100 !important;');
               $("#eway_bill_part_1").css({ "background-color": "#fff2ee" });
            }
            else
            {                  
               $('#eway_bill_part_1').attr('style', 'border:1px solid green !important;');
               $('#eway_bill_part_1').css({ "background-color": "#ffffff" });
            }
         }         
   });

});

</script>

<script type="text/javascript">
   function EnableDisableTextBox() 
   {       
      var chkYes = $('#tac').is(':checked');    
      if(chkYes == true)
      {
         $('#sub_btn').attr('disabled',false);
      }
      else
      {
         $('#sub_btn').attr('disabled',true);
      }       
   }   
</script>

<script type="text/javascript">
   function changeAddress() 
   {
      document.getElementById("seller_pickup_location_disable").disabled = false;
      $("#seller_registered_state").show();
      $("#seller_registered_district").show();
      $("#seller_registered_city").show();
      $("#seller_registered_pincode").show();
      /*
      if(document.getElementById("seller_pickup_location_disable").disabled == true)
      {    
         document.getElementById("seller_pickup_location_disable").disabled = false;
         $("#seller_registered_state").show();
         $("#seller_registered_district").show();
         $("#seller_registered_city").show();
         $("#seller_registered_pincode").show();
      }
      else
      {
         document.getElementById("seller_pickup_location_disable").disabled = true;
         $("#seller_registered_state").hide();
         $("#seller_registered_district").hide();
         $("#seller_registered_city").hide();
         $("#seller_registered_pincode").hide();
      }
      */                     
   }
</script>

<script type="text/javascript">
    
   document.getElementById("buyer_name").onchange = function() {uppCase()};
   function uppCase() 
   {
      var dat = document.getElementById("buyer_name");
      dat.value = dat.value.toUpperCase();
   }
  
   function getChangedWeight()
	{
     			
		var product_length = document.getElementById('product_length').value;
      var product_width = document.getElementById('product_width').value;
      var product_height = document.getElementById('product_height').value;
      //alert(product_length); 
      /*	 
         if (product_length =='') 
         {
            alert("Length of Product Box is Mandatory!");			
         }
         else if (product_width =='') 
         {
            alert("Width of Product Box is Mandatory!");	
         }
         else if (product_height =='') 
         {
            alert("Height of Product is Mandatory!");
         }	
         else if (product_length !='' && product_width !='' && product_height !='')
         {
      */					
		var Volumetric_Weight = (product_length * product_width * product_height)/ 4700;	
		var Charged_Weight = Number(Volumetric_Weight).toFixed(2);	
		//alert(Volumetric_Weight);
      //alert(Charged_Weight);			
		$("#charged_weight").val(Charged_Weight);	    		
		//}
									
   }
</script>

<script>

   var Coordination_Charges=0;
   var Logistics_Charges=0;
   var Sample_Clause_Charges=0;
   var Cash_flow_Charges=0;
   var totalprice=0;
   var igst_value=0;
   var sgst_value=0;
   var cgst_value=0;
   var payable_amount=0;

   function ShowHideDiv() 
   {
         var logistics_type = document.getElementById("logistics_type");
         //alert(logistics_type);
         if(logistics_type.value == "selfFulfillment")
         {
            $("#ready_date").hide();
            $("#delivery_date").hide();
            $("#eway_bil").hide();
            $("#shipping_calculation").hide();

            $('#logistics_amount').html("00.00");
            $('#logistics_total').html("00.00");
            $("#shipping_charges").val("00.00");
            $('#logistics_amount_ethics').val('');
            $("#logistics_payable_amount").val('') ;
            Logistics_Charges= '00.00';
				addvalue();
         }
         else 
         {
            $("#ready_date").show();
            $("#delivery_date").show();
            $("#eway_bil").show(); 
            $("#shipping_calculation").show();
            
            addvalue();
         }           
   }

   function calculateShipping()
   {
      //document.getElementById('shipping_price').disabled = true;	
		var pickup_pincode = document.getElementById('pickup_pincode').value;
      var delivery_pincode = document.getElementById('delivery_pincode').value;
      var travle_mode = document.getElementById('travle_mode').value;
      var declared_value = document.getElementById('declared_value').value;
      var noofpackages = document.getElementById('noofpackages').value;
      var actual_weight = document.getElementById('actual_weight').value;		
		var charged_weight = document.getElementById('charged_weight').value;	
      var cod_dod = document.getElementById('cod_dod').value;	
	
		if (pickup_pincode =='') 
		{
			alert("Pickup Pincode is Mandatory!");			
		}
		else if (delivery_pincode =='') 
		{
			alert("Delivery pincode is Mandatory!");
		}
		else if (travle_mode =='') 
		{
			alert("Mode of Travle is Mandatory!");
		}
		else if (declared_value =='') 
		{
			alert("Declared value is Mandatory!");
		}
		else if (noofpackages =='') 
		{
			alert("Number of Packages is Mandatory!");
		}
		else if (actual_weight =='') 
		{
			alert("Actual Weight of Consignment is Mandatory!");
		}
		else if (charged_weight =='') 
		{
			alert("Charged Weight of Consignment is Mandatory!");
		}
		else if (cod_dod =='') 
		{
			alert("COD/DOD is Mandatory!");
		}
		else if (pickup_pincode !='' && delivery_pincode !='' && travle_mode !='' && declared_value !='' && noofpackages !='' && actual_weight !='' && charged_weight !='' && cod_dod !='')
		{
			$("#shipping_price").html('<i class="fa fa-spinner fa-spin"></i>Calculating...');
			document.getElementById('shipping_price').disabled = true;
			
        	$.ajax(
				{     
				   url: "<?php  echo base_url(); ?>Seller_module/calculate_shipping_price",
				   method:"POST", 
				   data:{pickup_pincode:pickup_pincode,delivery_pincode:delivery_pincode,travle_mode:travle_mode,declared_value:declared_value,noofpackages:noofpackages,actual_weight:actual_weight,charged_weight:charged_weight,cod_dod:cod_dod},
				   datatype:'json',
               success: function(data) 
				   {     
                     //alert(data);            
                     const obj = JSON.parse(data);
                     //alert(obj.status);
                     //alert(obj.message);
                     //alert(obj.data);
                     
                     if(obj.status== true)
                     {
                        var str = obj.message;
                        var matches = str.match(/(\d+)/);     
                        if (matches) 
                        {
                           var  shipping_charges = matches[0];
                           $('#logistics_amount_ethics').val(Number(shipping_charges).toFixed(2));
                        }
                        const  shipping_charges_per = Number((10 / 100) * shipping_charges).toFixed(2);
                        const  total_shipping_charges =  +shipping_charges + +shipping_charges_per ;
                                              
                        $("#shipping_charges").val(Number(total_shipping_charges).toFixed(2));
                        $("#shipping_price").html('<i class="fa fa-calculator"></i> Calculate Shipping price');
                        document.getElementById('shipping_price').disabled = false;

                        /**** THIS IS FOR LOGISTICE ESTIMATES ****/
                        var logistics_charges = total_shipping_charges;
                        var logistics_discount = document.getElementById('logistics_discount').innerHTML;
                        var logistics_discount_value = Number((logistics_discount / 100) * logistics_charges).toFixed(2);
                        var logistics_total = logistics_charges - logistics_discount_value;
                        
                        $('#logistics_amount').html(Number(logistics_charges).toFixed(2));
                        $('#logistics_total').html(Number(logistics_total).toFixed(2));
                        $("#logistics_payable_amount").val(Number(logistics_total).toFixed(2)) ;                       
                        
                        Logistics_Charges=Number(logistics_total).toFixed(2);
						      addvalue();
                     }
                     else
                     {
                        $("#shipping_price").html('<i class="fa fa-calculator"></i> Calculate Shipping price');
                        document.getElementById('shipping_price').disabled = false;
                        $("#shipping_charges").val("00.00");
                        $('#logistics_amount').html("00.00");
                        $('#logistics_total').html("00.00");
                        $('#logistics_amount_ethics').val('');
                        $("#logistics_payable_amount").val('') ;  
                        Logistics_Charges= '00.00';
				            addvalue();
                     
                        alert(data);
                     }
     
				   }

				})
		}
   }
		

   $(document).ready(function()
   { 
      $(document).on('change', '#coordination', function()
      { 
         var coordination= document.querySelector('input[name="coordination"]:checked').value;

         if(coordination=="yes")
         {
            var value_gem_order = document.getElementById('value_gem_order').value;
            
            if(value_gem_order)
            {
               var coordination_discount = document.getElementById('coordination_discount').innerHTML;
               var coordination_charges =  Number((10 / 100) * value_gem_order).toFixed(2);
               var coordination_discount_value = Number((coordination_discount / 100) * coordination_charges).toFixed(2) ;
               var coordination_total = coordination_charges - coordination_discount_value;
               
               $('#coordination_charges').html(Number(coordination_charges).toFixed(2));
               $('#coordination_total').html(Number(coordination_total).toFixed(2));
               $("#coordination_payable_amount").val(Number(coordination_total).toFixed(2)) ;

               Coordination_Charges=Number(coordination_total).toFixed(2);
					addvalue();
            }
            else
            {
               alert("Please Enter GMV Value first !");
            }
         }
         else if(coordination=="no")
         {
            $('#coordination_charges').html("00.00");
            $('#coordination_total').html("00.00");
            $("#coordination_payable_amount").val('') ;

            Coordination_Charges= '00.00';
				addvalue();
         }       
      });
     
      $('#value_gem_order').on('change', function ()
      { 
         var value_gem_order = document.getElementById('value_gem_order').value;
         if(value_gem_order)
         {
            document.getElementsByName("coordination").forEach((e) => {
               e.disabled = false;
            });        
            /*   
               var coordination_discount = document.getElementById('coordination_discount').innerHTML;
               var coordination_charges = (10 / 100) * value_gem_order;
               var coordination_discount_value = (coordination_discount / 100) * coordination_charges;
               var coordination_total = coordination_charges - coordination_discount_value;
               //alert(coordination_charges);
               //alert(coordination_discount_value);
               //alert(coordination_discount);
               $('#coordination_charges').html(coordination_charges);
               $('#coordination_total').html(coordination_total);
            */
            
            var cashflow_discount = document.getElementById('cashflow_discount').innerHTML;
            var cashflow_amount = "0.00";
            
            if(value_gem_order > 0 && value_gem_order <= 1000000)
            {
               var cashflow_amount = 249 ; 
               var cashflow_discount_value = Number((cashflow_discount / 100) * cashflow_amount).toFixed(2);
               var cashflow_total = cashflow_amount - cashflow_discount_value;               
               
               $('#cashflow_amount').html(Number(cashflow_amount).toFixed(2));
               $('#cashflow_total').html(Number(cashflow_total).toFixed(2));
               $("#cashflow_payable_amount").val(Number(cashflow_total).toFixed(2)) ;

               Cash_flow_Charges=Number(cashflow_total).toFixed(2);
					addvalue();
            }
            else if(value_gem_order > 1000000 && value_gem_order <= 5000000)
            {
               var cashflow_amount = 599 ; 
               var cashflow_discount_value =  Number((cashflow_discount / 100) * cashflow_amount).toFixed(2)
               var cashflow_total = cashflow_amount - cashflow_discount_value; 
               
               $('#cashflow_amount').html(Number(cashflow_amount).toFixed(2));
               $('#cashflow_total').html(Number(cashflow_total).toFixed(2));
               $("#cashflow_payable_amount").val(Number(cashflow_total).toFixed(2)) ;
               
               Cash_flow_Charges=Number(cashflow_total).toFixed(2);
					addvalue();
            }
            else if(value_gem_order > 5000000 )
            {
               var cashflow_amount = 999 ; 
               var cashflow_discount_value =  Number((cashflow_discount / 100) * cashflow_amount).toFixed(2);
               var cashflow_total = cashflow_amount - cashflow_discount_value; 
               
               $('#cashflow_amount').html(Number(cashflow_amount).toFixed(2));
               $('#cashflow_total').html(Number(cashflow_total).toFixed(2));
               $("#cashflow_payable_amount").val(Number(cashflow_total).toFixed(2)) ; 
               
               Cash_flow_Charges=Number(cashflow_total).toFixed(2);
					addvalue();
            }
         }
         else
         {            
            document.getElementsByName("coordination").forEach((e) => {
               e.disabled = true;
            });

            Cash_flow_Charges= '00.00';
				addvalue();
         }

      });
   /*
      $('#shipping_charges').on('change', function ()
      { 
         var logistics_charges = document.getElementById('shipping_charges').value;
         var logistics_discount = document.getElementById('logistics_discount').innerHTML;
      
         var logistics_discount_value =  Number((logistics_discount / 100) * logistics_charges).toFixed(2)
         var logistics_total = logistics_charges - logistics_discount_value;
         
         $('#logistics_amount').html(Number(logistics_charges).toFixed(2));
         $('#logistics_total').html(Number(logistics_total).toFixed(2));
      });
   */
      $(document).on('change', '#sample_clause', function()
      { 
         var sample_clause_amount = 249;
         var sample_clause_discount = document.getElementById('sample_clause_discount').innerHTML;

         var sample_clause_discount_value =  Number((sample_clause_discount / 100) * sample_clause_amount).toFixed(2);
         var sample_clause_total = sample_clause_amount - sample_clause_discount_value;
        

         var sample_clause= document.querySelector('input[name="sample_clause"]:checked').value;

         if(sample_clause=="yes")
         {

            $('#sample_clause_amount').html(Number(sample_clause_amount).toFixed(2));
            $('#sample_clause_total').html(Number(sample_clause_total).toFixed(2));
            $("#sample_clause_payable_amount").val(Number(sample_clause_total).toFixed(2)) ;

            Sample_Clause_Charges=Number(sample_clause_total).toFixed(2);
				addvalue();
         }
         else if(sample_clause=="no")
         {
            $('#sample_clause_amount').html("00.00");
            $('#sample_clause_total').html("00.00");
            $("#sample_clause_payable_amount").val('') ;

            Sample_Clause_Charges= '00.00';
				addvalue();
         }
        
      });   

   });

  
   function addvalue()
	{
      //console.log(Coordination_Charges);
	   //console.log(Logistics_Charges);
		//console.log(Sample_Clause_Charges);	
     	//console.log(Cash_flow_Charges);
      //console.log(totalprice);
      //console.log(igst_value);
      //console.log(sgst_value);
      //console.log(cgst_value);
      //console.log(payable_amount);
      var seller_state_id = document.getElementById('seller_state').value;   
      //alert(seller_state_id);
      if(seller_state_id =="09")
      {
         totalprice = +Coordination_Charges +  +Logistics_Charges +  +Sample_Clause_Charges +  +Cash_flow_Charges ;
         igst_value =  '0';
         sgst_value =  Number((9 / 100) * totalprice).toFixed(2);
         cgst_value =  Number((9 / 100) * totalprice).toFixed(2);
         payable_amount = +totalprice +  +igst_value + +sgst_value + +cgst_value;
      }
      else
      {   
         totalprice = +Coordination_Charges +  +Logistics_Charges +  +Sample_Clause_Charges +  +Cash_flow_Charges ;
         igst_value =  Number((18 / 100) * totalprice).toFixed(2);
         sgst_value =  '0';
         cgst_value =  '0';
         payable_amount = +totalprice +  +igst_value + +sgst_value + +cgst_value;
      }
      
      $("#total_amount").html(Number(totalprice).toFixed(2));
      $("#total_gst").html(Number(igst_value).toFixed(2)); 
      $("#sgst").html(Number(sgst_value).toFixed(2));
      $("#cgst").html(Number(cgst_value).toFixed(2));
		$("#total_payable_amount").html(Number(payable_amount).toFixed(2));
      $("#total_igst_amount").val(Number(igst_value).toFixed(2)) ;
      $("#total_cgst_amount").val(Number(cgst_value).toFixed(2)) ;
      $("#total_sgst_amount").val(Number(sgst_value).toFixed(2)) ;
      $("#total_workorder_payable_amount").val(Number(payable_amount).toFixed(2)) ;
   }
</script>

<script type="text/javascript">
   $(document).ready(function()
   {
      $(document).on('change', '#seller_state', function()
      {        
         var state_id = document.getElementById('seller_state').value;   
         //$('#seller_district').val();                
         if (state_id !='') 
         {
            $.ajax(
            {     
               url: "<?php  echo base_url(); ?>SellerRegister/get_district_by_state",
               method:"POST", 
               data:{state_id:state_id},
               success: function(data) 
               { 
                  //alert(data);
                  $('#seller_district').html(data);
                  addvalue();
               }
            })
         }
      });      
   });
   
   function newAddress() 
	{        
      var seller_addr = document.getElementById('seller_pickup_location_disable').value;     
      $("#seller_pickup_location").val(seller_addr);
      //$('#seller_pickup_location').html(seller_addr);
   }


   function getAddressByPincode() 
	{  

      var buyer_pincode = document.getElementById('buyer_pincode').value;
                 
      let pin = document.getElementById("buyer_pincode").value; 
         $.getJSON("https://api.postalpincode.in/pincode/" + pin, function (data) {
            createHTML(data);
               //console.log( "JSON Data: " + data[0].Message );
               //console.log( "JSON Data: " + data[0].Status );
               //console.log( "JSON Data: " + data[0].PostOffice.length );
            })
                    
            function createHTML(data) 
            {
               var htmlElements = " ";
               var PostOfficeCircle = " ";
               var PostOfficeRegion = " ";
               var PostOfficeBlock = " ";
               var PostOfficeDivision = " ";
               var PostOfficeDistrict = " ";
               var PostOfficeState = " ";
               var PostOfficeCountry = " ";
               var PostOfficePincode = " ";

               if (data[0].PostOffice && data[0].PostOffice.length && data[0].Status=="Success") 
               {
                  for (var i = 0; i < data[0].PostOffice.length; i++) 
                  {
                     var PostOfficeCountry = data[0].PostOffice[i].Country ;
                     var PostOfficeState = data[0].PostOffice[i].State ;
                     var PostOfficeCircle = data[0].PostOffice[i].Circle ;
                     var PostOfficeRegion = data[0].PostOffice[i].Region ;
                     var PostOfficeDivision = data[0].PostOffice[i].Division ;
                     var PostOfficeDistrict = data[0].PostOffice[i].District ;
                     var PostOfficeBlock = data[0].PostOffice[i].Block ;                                     
                     var PostOfficePincode = data[0].PostOffice[i].Pincode ;
                     
                     //htmlElements += "State -" + PostOfficeState + ", Division - " + PostOfficeDivision + ", District - " + PostOfficeDistrict + ", Block - " + PostOfficeBlock + ", Pincode - " + PostOfficePincode ;                     
                  }

                  htmlElements += "State : " + PostOfficeState + ", Division : " + PostOfficeDivision + ", District : " + PostOfficeDistrict + ", Block : " + PostOfficeBlock + ", Pincode : " + PostOfficePincode ;
               
                  $("#buyer_full_address").val(htmlElements);
               }
               else 
               {
                  $("#buyer_pincode").val("");
                  $("#buyer_full_address").val("");
                  alert('Please Enter Valid Pincode!');                  
               }
                                                      
            }

   }
   
</script>

<script type="text/javascript">	
	
	function submitForm() 
	{	
      //debugger;
      var frm = $('#workorder_form');
      
      var labh_executive_id = document.getElementById('labh_executive_id').value;
      var labh_agent_id = document.getElementById('labh_agent_id').value;
      var region_id = document.getElementById('region_id').value;
      var region_state = document.getElementById('region_state').value;
      var district_branch = document.getElementById('district_branch').value;

      var sellerid = document.getElementById('sellerid').value;
      var order_type = document.getElementById('order_type').value;
      var gemNgem_workorder_id = document.getElementById('gemNgem_workorder_id').value;

      var seller_state = document.getElementById('seller_state').value;
      var seller_district = document.getElementById('seller_district').value;
      var seller_city = document.getElementById('seller_city').value;
      var seller_pincode = document.getElementById('seller_pincode').value;
      var seller_pickup_location = document.getElementById('seller_pickup_location').value;
               
      var buyer_name = document.getElementById('buyer_name').value;
      var buyer_organization_name = document.getElementById('buyer_organization_name').value;
      var buyer_contact = document.getElementById('buyer_contact').value;
      var buyer_email = document.getElementById('buyer_email').value;
      var buyer_city = document.getElementById('buyer_city').value;
      var buyer_pincode = document.getElementById('buyer_pincode').value;
      var buyer_full_address = document.getElementById('buyer_full_address').value;

      var product_category = document.getElementById('product_category').value;
      var product_quantity = document.getElementById('product_quantity').value;
      var value_gem_order = document.getElementById('value_gem_order').value;

      var sample_clause = document.getElementById('sample_clause').value;
      var bill_discounting = document.getElementById('bill_discounting').value;
      var coordination = document.getElementById('coordination').value;

      var gem_workorder_doc = document.getElementById('gem_workorder_doc').value;
      var logistics_type = document.getElementById('logistics_type').value;
      var eway_bill_part_1 = document.getElementById('eway_bill_part_1').value; 
      var ready_delivery_date = document.getElementById('ready_delivery_date').value;
      var delivery_completion_date = document.getElementById('delivery_completion_date').value;
           
	   var pickup_pincode = document.getElementById('pickup_pincode').value;
      var delivery_pincode = document.getElementById('delivery_pincode').value;
      var noofpackages = document.getElementById('noofpackages').value;
      var travle_mode = document.getElementById('travle_mode').value;
      var declared_value = document.getElementById('declared_value').value;              
      var product_length = document.getElementById('product_length').value; 
      var product_width = document.getElementById('product_width').value; 
      var product_height = document.getElementById('product_height').value;
      var actual_weight = document.getElementById('actual_weight').value;		
      var charged_weight = document.getElementById('charged_weight').value;	
      var cod_dod = document.getElementById('cod_dod').value;
      var logistics_amount_ethics = document.getElementById('logistics_amount_ethics').value;
      
      /*   ESTIMATE OF CHARGES */ 
      var coordination_total = document.getElementById('coordination_total').value;
      var logistics_total = document.getElementById('logistics_total').value;
      var sample_clause_total = document.getElementById('sample_clause_total').value; 
      var cashflow_total = document.getElementById('cashflow_total').value;

      var total_amount = document.getElementById('total_amount').value;
      var total_gst = document.getElementById('total_gst').value;
      var cgst = document.getElementById('cgst').value;
      var sgst = document.getElementById('sgst').value;
      var total_payable_amount = document.getElementById('total_payable_amount').value;
     
      //$("#coordination_payable_amount").val(coordination_total) ;
      //$("#logistics_amount_ethics").val(logistics_amount_ethics) ;
      //$("#logistics_payable_amount").val(logistics_total) ;
      //$("#sample_clause_payable_amount").val(sample_clause_total) ;
      //$("#cashflow_payable_amount").val(cashflow_total) ;
      //$("#total_igst_amount").val(total_gst) ;
      //$("#total_cgst_amount").val(cgst) ;
      //$("#total_sgst_amount").val(sgst) ;
      //$("#total_workorder_payable_amount").val(total_payable_amount) ;
      //return false;

      if (labh_executive_id == '')
      {
         alert("Executive ID is Missing!");
         return	false;
      }
      else if (labh_agent_id =='') 
      {
         alert("Agent ID is Missing!");
         return	false;       
      }
      else if (region_id =='') 
      {
         alert("Region ID is Missing!");
         return	false;
      }
      else if (region_state =='') 
      {
         alert("Region State is Missing!");
         return	false;
      }
      else if (district_branch =='') 
      {
         alert("District Branch is Missing!");
         return	false;
      }
      else if (sellerid =='') 
      {
         alert("Seller ID is Missing!");
         return	false;
      }     
      else if (order_type =='') 
      {
         alert("order ype is Mandatory!"); 
         return	false;      
      }
      else if (gemNgem_workorder_id == '')
      {
         alert("GEM Workorder ID is Missing!");
         return	false;
      }
      else if (seller_state =='') 
      {
         alert("Pickup State is Missing!"); 
         return	false;      
      }
      else if (seller_district =='') 
      {
         alert("Pickup District is Missing!"); 
         return	false;      
      }
      else if (seller_city =='') 
      {
         alert("Pickup City is Missing!"); 
         return	false;      
      }
      else if (seller_pincode =='') 
      {
         alert("Seller Pincode is Missing!"); 
         return	false;      
      }
      else if (seller_pickup_location =='') 
      {
         alert("Seller Pickup Location is Missing!"); 
         return	false;      
      }
      else if (buyer_name =='') 
      {
         alert("Buyer Name is Missing!");
         return	false; 
      }
      else if (buyer_organization_name =='') 
      {
         alert("Buyer Organization Name is Missing!"); 
         return	false;       
      }
      else if (buyer_contact =='') 
      {
         alert("Buyer Contact Number is Missing!"); 
         return	false;       
      }
      else if (buyer_email =='') 
      {
         alert("Buyer Email ID  is Missing!");
         return	false;        
      } 
      else if (buyer_city =='') 
      {
         alert("Buyer City  is Missing!");
         return	false;        
      } 
      else if (buyer_pincode =='') 
      {
         alert("Buyer Pincode is Missing!");
         return	false;        
      }
      else if (buyer_full_address =='') 
      {
         alert("Buyer Full Address is Missing!");
         return	false;        
      }
      else if (product_category =='') 
      {
         alert("Product Category Details is Missing!");
         return	false;        
      }
      else if (product_quantity =='') 
      {
         alert("Product Quantity is Missing!");
         return	false;        
      }   
      else if (value_gem_order =='') 
      {
         alert("Contract Value (GMV) is Missing!");
         return	false;        
      }
      else if (sample_clause =='') 
      {
         alert("Sample Clause Details (YES/NO) is Missing!");
         return	false;        
      }
      else if (bill_discounting =='') 
      {
         alert("Bill Discounting Details (YES/NO) is Missing!");
         return	false;        
      }   
      else if (coordination =='') 
      {
         alert("Coordination Details (YES/NO) is Missing!");
         return	false;        
      }
      else if (gem_workorder_doc =='') 
      {
         alert("Workorder Document is Mandatory!"); 
         return	false;       
      }
      else if (logistics_type == '')
      {
         alert ("Logistics type is Mandatory!");
         return	false; 
      }  
      else if (eway_bill_part_1 =='') 
      {
         if(logistics_type !="selfFulfillment")
         {
            alert("Organization Name is Mandatory!");
            return	false; 
         }       
      }
      else if (ready_delivery_date =='') 
      {
         if(logistics_type !="selfFulfillment")
         {
            alert("Ready For Delevery Date is Mandatory!");
            return	false; 
         }       
      }
      else if (delivery_completion_date =='') 
      {
         if(logistics_type !="selfFulfillment")
         {
            alert("Delevery Completion Date is Mandatory!");
            return	false; 
         }       
      }
      else if (pickup_pincode =='') 
		{
         if(logistics_type !="selfFulfillment")
         {
            alert("Pickup Pincode is Mandatory!");
            return	false; 
         }			
		}
		else if (delivery_pincode =='') 
		{
         if(logistics_type !="selfFulfillment")
         {
            alert("Delivery pincode is Mandatory!");
            return	false; 
         }
		}
      else if (noofpackages =='') 
      {
         if(logistics_type !="selfFulfillment")
         {
            alert("Number of Packages is Mandatory!"); 
            return	false;
         }       
      }
      else if (travle_mode =='') 
      {
         if(logistics_type !="selfFulfillment")
         {
            alert("Mod of Travle is Mandatory!"); 
            return	false; 
         }      
      }
      else if (declared_value =='') 
      {
         if(logistics_type !="selfFulfillment")
         {
            alert("Declared Value of Consignment is Mandatory!");
            return	false; 
         }
      } 
      else if (product_length =='') 
      {
         if(logistics_type !="selfFulfillment")
         {
            alert("Product Box Length is Mandatory!"); 
            return	false;
         }       
      }
      else if (product_width =='') 
      {
         if(logistics_type !="selfFulfillment")
         {
            alert("Product Box Width is Mandatory!"); 
            return	false;  
         }    
      }
      else if (product_height =='') 
      {
         if(logistics_type !="selfFulfillment")
         {
            alert("Product Box Height is Mandatory!"); 
            return	false; 
         }
      }  
      else if (actual_weight =='') 
      {
         if(logistics_type !="selfFulfillment")
         {
            alert("Actual weight of Consighment is Mandatory!");
            return	false;
         } 
      }
      else if (charged_weight =='') 
      {
         if(logistics_type !="selfFulfillment")
         {
            alert("Charged Weight of Consighment is Mandatory!");
            return	false; 
         }       
      }
      else if (cod_dod =='') 
      {
         if(logistics_type !="selfFulfillment")
         {
            alert("Cod/Dod Details is Mandatory!");
            return	false;
         } 
      }
      else if (logistics_amount_ethics =='') 
      {
         if(logistics_type !="selfFulfillment")
         {
            alert("Logistics Charges is Missing!");
            return	false;
         } 
      }
      else if (coordination_total =='') 
      {
         if(coordination =="yes")
         {
            alert("Coordination Charges is Missing!");
            return	false;
         } 
      }
      else if (logistics_total =='') 
      {
         if(logistics_type !="selfFulfillment")
         {
            alert("Logistics Charges is Missing!");
            return	false;
         } 
      }
      else if (sample_clause_total =='') 
      {
         if(sample_clause =="yes")
         {
            alert("Sample Clause Facilitation Charges is Missing!");
            return	false;
         } 
      }
      else if (cashflow_total =='') 
      { 
         alert("Cash Flow Charges is Missing!");
         return	false;    
      }
      else if (sub_total_amount =='') 
      { 
         alert("Sub Total Amount is Missing!");
         return	false;    
      }
      else if (total_gst =='') 
      {
         if(seller_state !="09")
         {
            alert("IGST Charges is Missing!");
            return	false;
         }             
      }
      else if (cgst =='' && sgst == '') 
      {
         if(seller_state =="09")
         {
            alert("CGST & SGST Charges is Missing!");
            return	false;
         }             
      }
      else if (total_payable_amount =='') 
      { 
         alert("Total Payable Amount Missing!");
         return	false;    
      }
		else 
		{
         //document.getElementById("workorder_form").submit();
			$("#sub_btn").html('<i class="fa fa-spinner fa-spin"></i>Submitting...');
	      //document.getElementById('sub_btn').disabled = true;
         return true;
			/*	
				$.ajax({
					type: frm.attr('method'),
					url:  frm.attr('action'),				
					data: frm.serialize(),
					success: function (data) {
						alert('Submission was successful.');
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

<script>          
   $('.nav-link').on('click', function() 
   {
      $('.active-link').removeClass('active-link');
      $(this).addClass('active-link');
   });  
</script>

<!-- --------------------------checkBox select------------------------- -->

<script>
   function myFunc() 
   {
      let arr = [];
      let checkboxes = document.querySelectorAll("input[type='checkbox']:checked");
      for (let i = 0; i < checkboxes.length; i++) 
      {
        arr.push(checkboxes[i].value)
      }
      document.getElementById("result").value = arr;
   }
</script>
<!-- hide and show -->

<script>
$(document).ready(function()
{
   $("select").change(function()
   {
      $(this).find("option:selected").each(function()
      {
         var optionValue = $(this).attr("value");
         if(optionValue)
         {
            $("#box").not("." + optionValue).hide();
            $("." + optionValue).show();
         } 
         else
         {
            $("#box").hide();
         }
      });
   }).change();
});
</script>


