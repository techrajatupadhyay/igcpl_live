<?php
   $sellerid = $this->session->userdata('user_login_id'); 

   if(isset($seller) && $seller !="")
   {

        foreach ($seller as $value)
        {
            $seller_id = $value->seller_id;
            $current_address = $value->current_address;
            $state_first = $value->state_first;
            //$district_first = $value->district_first;
            $city_first =$value->city_first;
            $pincode_first =$value->pincode_first;
		    $region_id =$value->region_id;
		    $labh_emp_id =$value->labh_emp_id;
		    $labh_agent_id =$value->labh_agent_id;
			$region_state =$value->region_state;
			$district_branch =$value->district_branch;
        }
		
		
    /*
        $state = $this->db->query("SELECT statename FROM state_master WHERE state_id=".$state_first." limit 1");
        $state = $state->result_array();
        foreach($state as $state)
        { 
           $state_name = $state['statename'] ; 
        } 
		
        $District_name='';
        $district = $this->db->query("SELECT Districtname FROM district_master WHERE Districtcode=".$district_first." limit 1");
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
   $seller_id = "";

   //$region_id = "";
   //$labh_emp_id = "";
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
         //$labh_emp_id = $value['labh_emp_id'];
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
         $bill_discounting = $value['bill_discounting'];
         $sample_clause = $value['sample_clause'];
      };
   }
?>
<style>
   .star
   {
      color:red;
   }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/seller.css">

<?php  $this->load->view('backend/workorder_header');?>
<div class="page-body">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <form id="workorder_form" action="<?php echo base_url();?>Seller_module/genrate_workorder" method="post" enctype="multipart/form-data">
               <div class="card-block">
                  <div class="row">
                     <div class="col-sm-12">					     
						 <input type="hidden" class="form-control" name="labh_emp_id" readonly required value="<?php echo $labh_emp_id; ?>" >
						 <input type="hidden" class="form-control" name="labh_agent_id" readonly required value="<?php echo $labh_agent_id; ?>" >
						 <input type="hidden" class="form-control" name="region_id" readonly required value="<?php echo $region_id; ?>" >						 
						 <input type="hidden" class="form-control" name="region_state"  required readonly value="<?php echo $region_state; ?>">
						 <input type="hidden" class="form-control" name="district_branch" readonly required value="<?php echo $district_branch; ?>" >
						 
                        <h4 class="sub-title">Workorder Details</h4>
                        <div class="card-block inner-card-block">
                           <div class="row">
                              <div class="col-sm-4">
                                 <h4 class="sub-title">Seller Id <span class="star">*</span></h4>
                                 <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon7"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="sellerid" readonly required value="<?php echo $sellerid; ?>" >
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <h4 class="sub-title">Gem Workorder Id <span class="star">*</span></h4>
                                 <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon7"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="gemNgem_workorder_id" required placeholder="Gem Workorder Id" value="<?php echo $gemNgem_workorder_id; ?>">
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <h4 class="sub-title">Order Type <span class="star">*</span></h4>
                                 <div class="input-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon7"><i class="fa fa-shopping-basket" aria-hidden="true"></i></span>
                                        <select name="order_type" required class="form-control form-control-primary">
                                          <option value="">Order Type</option>
                                          <!-- <option value="01" <?php echo $order_type == "01" ? " selected" : "";?>>Gem Work Order</option> -->
                                          <!-- <option value="02">Non Gem Work Order</option> -->
                                          <option value="01" <?php echo $order_type == "01" ? " selected" : "";?>>Gem Work Order</option>
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
                           <h4 class="sub-title">Seller Address </h4>
                           <div class="card-block inner-card-block">
                              <div class="row m-b-30">
                                 <div class="col-sm-3">
                                    <h4 class="sub-title">Seller State <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>    
									   <select name="seller_state" class="form-control get_state_id" id="seller_stateid" required autocomplete="off">
                                          <option value="">-- Select State --</option>
                                          <?php if(isset($state_list))
                                          {
                                             foreach($state_list as $c)
                                             { 
                                                if($state_first == $c->state_id)
                                                {
                                          ?>
                                          <option value="<?= $c->state_id; ?>" selected ><?= $c->statename; ?></option>
                                          <?php  } else {  ?>
                                          <option value="<?= $c->state_id; ?>" ><?= $c->statename; ?></option>
                                          <?php }  
                                                        
                                                } 
                                                } 
                                          ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-sm-3">
                                    <h4 class="sub-title">Seller District <span class="star">*</span></h4>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>   
                                        <select id="seller_district" name="seller_district" class="form-control"  autocomplete="off">
                                        <?php 
                                       
                                        if(isset($workorder[0]['seller_district'])) 
                                        {

                                            foreach($district_list as $dist)
                                            { 
                                                ?>
                                                    <option value="<?= $dist->Districtcode; ?>" <?php if($dist->Districtcode == $workorder[0]['seller_district']){ ?> selected <?php } ?>  > <?= $dist->Districtname; ?></option>
                                                <?php 
										        																							 
                                            } 
                                        } 
                                        else 
										{   ?>
                                            <option value="">-- Select District --</option>
                                            <?php 
										}   ?>
                                                    
                                        </select>
                                    </div>
                                 </div>
                                 <div class="col-sm-3">
                                    <h4 class="sub-title">Seller City <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>   
                                       <input type="text" class=" form-control" required name="seller_city" value="<?php echo $seller_city ; ?>">
                                    </div>
                                 </div>
                                 <div class="col-sm-3">
                                    <h4 class="sub-title">Seller Pincode <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" required name="seller_pincode" value="<?php echo $seller_pincode; ?>">
                                    </div>
                                 </div>
                              </div>
                              <div class="row m-b-30">
                                 <div class="col-sm-12">
                                    <h4 class="sub-title"><i class="fa fa-home" aria-hidden="true"></i> Seller Full Address <span class="star">*</span></h4>
                                    <textarea class="form-control max-textarea" name="pick_location" maxlength="255" rows="3"><?php echo $pick_location; ?></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
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
                                    <h4 class="sub-title">Select Product Categort</h4>
                                    <div class="card card-block user-card">
                                       <div class="slimScrollDiv"style=" position:relative; width:auto; height:500px;overflow:scroll; white:100%;">
                                          <div class="row ">
                                             <?php  foreach($product as $value) { 
                                                $check = $value->pro_cat_id." ".$value->product_category;
                                                ?> 

                                             <div class="col-lg-6">
                                                <input class="mr-2" onclick="myFunc()" type="checkbox"  id="check" 
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
                  <div class="card-block">
                     <div class="row">
                        <div class="col-sm-12">
                           <h4 class="sub-title">Buyer Details </h4>
                           <div class="card-block inner-card-block">
                              <div class="row m-b-30">
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">Buyer Name <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-user" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" required name="buyer_name" placeholder="Buyer Name"  minlength="3" value="<?php echo $buyer_name;?>">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">Phone Number <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" placeholder="Phone" required id="phone" name="contact" minlength="10" maxlength="12" value="<?php echo $contact;?>">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">Email Id  <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                       <input type="email" class="form-control" required name="email" placeholder="Email" value="<?php echo $email;?>">
                                    </div>
                                 </div>
                              </div>
                               <div class="row m-b-30">
                                 
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">Value of Gem Order (GMV) <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control"  name="value_gem_order" placeholder="Value of Gem Order" required value="<?php echo $value_gem_order; ?>">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <h4 class="sub-title"> GST Value in Gem Order <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control"  name="including_gst" placeholder="Including gst(GMV)" required value="<?php echo $including_gst; ?>">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">Is There a Sample Clause in work Order ? <span class="star">*</span></h4>
                                    <div class="form-radio">
                                       <div class="radio radiofill radio-primary radio-inline">
                                          <label>
                                             <input type="radio" name="sample_clause" value="yes" data-bv-field="member" <?php echo $sample_clause == "yes" ? " checked" : "";?>>
                                             <i class="helper"></i>Yes  
                                          </label>
                                       </div>
                                       <div class="radio radiofill radio-primary radio-inline">
                                          <label>
                                             <input type="radio" name="sample_clause" value="no" data-bv-field="member" <?php echo $sample_clause == "no" ? " checked" : "";?> >
                                             <i class="helper"></i>No
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row m-b-30">
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">Quantity (as on gem workorder) <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" name="quantity" placeholder="Quantity" required="" minlength="1" value="<?php echo $quantity;?>">
                                    </div>
                                 </div>
								 <div class="col-sm-4">
                                    <h4 class="sub-title">Organization Name <span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-building" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" placeholder="Organization Name" name="organization_name" value="<?php echo $organization_name?>">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">GSTIN <span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" placeholder="GSTIN" name="gstin" maxlength="12" value="<?php echo $gstin?>">
                                    </div>
                                 </div>                               
							  </div> 
							  
                              <div class="row m-b-30">
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">Logistics <span class="star"> *</span></h4>
									<div class="input-group">
                                    <span class="input-group-addon" id="basic-addon7"><i class="fa fa-truck" aria-hidden="true"></i></span>
									<select name="logistics" id="logistics_type" onchange ="ShowHideDiv()" required class="form-control " value="<?php echo $logistics?>">
                                       <option>---- select logistics ----</option>
                                       <option value="Picemeal" onClick="showDiv()" <?php echo $logistics == "Picemeal" ? " selected" : "";?>>Picemeal</option>
                                       <option value="BulkFulfilment" <?php echo $logistics == "BulkFulfilment" ? " selected" : "";?>>Bulk Fulfilment</option>
                                       <option value="selfFulfillment" <?php echo $logistics == "selfFulfillment" ? " selected" : "";?>>self Fulfillment</option>
                                    </select>
									</div>
                                 </div>
                                 <div class="col-sm-4" id="ready_date" style="display: block">
                                    <h4 class="sub-title">Ready for Delivery Date <span class="star">*</span></h4>
                                    <div class="form-group">
                                       <div class="input-group date" id="datetimepicker1">
                                          <span class="input-group-addon ">
                                             <span class="icofont icofont-ui-calendar"></span>
                                          </span>
                                          <input type="date" class="form-control" name="ready_delivery_date" value="<?php echo $ready_delivery_date; ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4" id="delivery_date" style="display: block">
                                    <h4 class="sub-title">Expected Delivery Date <span class="star">*</span></h4>
                                    <div class="form-group">
                                       <div class="input-group date" id="datetimepicker1">
                                          <span class="input-group-addon " style="">
                                              <span class="icofont icofont-ui-calendar"></span>
                                          </span>
                                          <input type="date" class="form-control"  name="expected_date" value="<?php echo $expected_date; ?>">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row m-b-30">
                                 <div class="col-sm-3">
                                    <h4 class="sub-title"> State <span class="star">*</span></h4>
									<div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>  
										<select name="statename" id="buyer_stateid" required class="form-control">   
										   <option value="">-- Select State --</option>
										   <?php 
											  //var_dump($country);
											  foreach($state_list as $c)
											  {   ?>
										   <option value="<?= $c->state_id; ?>" <?php echo $statename == $c->state_id ? " selected" : ""; ?> ><?= $c->statename; ?></option>
										   <?php  }  ?>
										</select>
									</div>
                                 </div>
                                 <div class="col-sm-3">
                                    <h4 class="sub-title"> District <span class="star">*</span></h4>
									<div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
										<select id="buyer_district"  name="districtname"  autocomplete="off" class="form-control">
										  <!--  <option value="">Select District</option> -->
										   <?php if(isset($workorder)) 
										   {                                            
											  foreach($district_list as $dist)
										   {  ?>
										   <option value="<?= $dist->Districtcode; ?>" <?php echo $districtname == $dist->Districtcode ? " selected" : ""; ?>   ><?= $dist->Districtname; ?></option>
										   <?php } 
												 }
										   else 
										   {  ?>                                        
										   <option value="">-- Select District --</option>
										   <?php } ?> 
										</select>
									</div>
                                 </div>
                                 <div class="col-sm-3">
                                    <h4 class="sub-title"> City <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>   
                                       <input type="text" class="form-control" name="city" placeholder="city" required="" value="<?php echo $city; ?>">
                                    </div>
                                 </div>
                                 <div class="col-sm-3">
                                    <h4 class="sub-title">Pincode <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" name="pincode" placeholder="pincode" required="" minlength="6" maxlength="6" value="<?php echo $pincode; ?>">
                                    </div>
                                 </div>
                              </div>
                              <div class="row m-b-30">
                                 <div class="col-sm-12">
                                    <h4 class="sub-title"><i class="fa fa-home" aria-hidden="true"></i> Consignee  Full Address <span class="star">*</span></h4>
                                    <textarea class="form-control max-textarea" maxlength="255" rows="3" name="consignee_address" placeholder="Buyer Full Address" required="" ><?php echo $consignee_address; ?></textarea>
                                 </div>
                              </div>
                             
                              <div class="row m-b-30">
                                 <div class="col-sm-6">
                                    <h4 class="sub-title">Would You like to opt for Bill Discounting <span class="star">*</span></h4>
                                    <div class="form-radio">
                                       <div class="radio radiofill radio-primary radio-inline">
                                          <label>
                                             <input type="radio" name="bill_discounting" value="Yes" data-bv-field="member" <?php echo $bill_discounting == "Yes" ? " checked" : "";?>>
                                             <i class="helper"></i>Yes
                                          </label>
                                       </div>
                                       <div class="radio radiofill radio-primary radio-inline">
                                          <label>
                                             <input type="radio" name="bill_discounting" value="No" data-bv-field="member" <?php echo $bill_discounting == "No" ? " checked" : "";?>>
                                             <i class="helper"></i>No
                                          </label>
                                       </div>
                                       <div class="radio radiofill radio-primary radio-inline">
                                          <label>
                                             <input type="radio" name="bill_discounting" value="Cant_say" data-bv-field="member" <?php echo $bill_discounting == "Cant_say" ? " checked" : "";?>>
                                             <i class="helper"></i>Can't say now
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <h4 class="sub-title">Upload Gem Work Order (Only: pdf / zip) <span class="star">*</span></h4>
                                    <?php if(isset($workorder) && $workorder !="") { ?>
                                       <div class="input-group">
                                          <input type="file" accept=".pdf,.zip"  class="form-control bg-white" name="gem_workorder_doc"  value="<?php echo $gem_workorder_doc; ?>">
                                          <span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-o" aria-hidden="true"></i></span>
                                       </div>
                                    <?php } else { ?>
                                      <div class="input-group">
                                          <input type="file" accept=".pdf,.zip"  class="form-control bg-white" name="gem_workorder_doc" required="" value="<?php echo $gem_workorder_doc; ?>">
                                          <span class="input-group-addon" id="basic-addon7"><i class="fa fa-file-o" aria-hidden="true"></i></span>
                                       </div>
                                    <?php } ?>
                                 </div>
                              </div>                          							  
                           </div>
                        </div>
                     </div>
                  </div>
				  
				  <div class="card-block">
                     <div class="row">
                        <div class="col-sm-12">
                            <h4 class="sub-title"><i class="fa fa-truck " aria-hidden="true"></i> Shipping Rate Calculation </h4>
                            <div class="card-block inner-card-block">
				                <div class="row m-b-30">
								
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">Pickup Pincode <span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" id="pickup_pincode" name="pick_pincode" placeholder="pickup pincode" required="" minlength="6" maxlength="6" value="">
                                    </div>
                                 </div>
                                 <div class="col-sm-4">
                                    <h4 class="sub-title">Delivery  Pincode <span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" id="delivery_pincode" name="delivered_pincode" placeholder="delivery pincode" required="" minlength="6" maxlength="6" value="">
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
                                       <input type="text" class="form-control" id="declared_value" name="declared_value" placeholder="declared value of consignment" required="" value="" value="" minlength="2" maxlength="5">
                                    </div>
                                 </div>  

                                 <div class="col-sm-3">
                                     <h4 class="sub-title">No of Packages/Box<span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" id="noofpackages" name="noofpackages" placeholder="no of packages" required="" value="" value="" minlength="2" maxlength="5">
                                    </div>
                                 </div> 							 
								 
								 <div class="col-sm-3">
                                    <h4 class="sub-title">Product Length (in cms) <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" id="product_length" name="product_length" placeholder="Product Length (in cms)" required value="">
                                    </div>
                                 </div>
                                 <div class="col-sm-3">
                                    <h4 class="sub-title">Product Width (in cms)<span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" id="product_width" name="product_width" placeholder="Product Width (in cms)" required value="">
                                    </div>
                                 </div>
								 <div class="col-sm-3">
                                    <h4 class="sub-title">Product Height (in cms)<span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                       <input type="number" class="form-control" id="product_height" name="product_height" placeholder="Product Height (in cms)" required value="">
                                    </div>
                                 </div>	
								 							
                                 <div class="col-sm-4">
                                     <h4 class="sub-title">Actual Weight of Consignment<span class="star"> *</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" id="actual_weight" name="actual_weight" placeholder="actual weight" required="" value="" value="" minlength="2" maxlength="5">
                                    </div>
                                 </div>

                                 <div class="col-sm-4">
                                     <h4 class="sub-title">Charged Weight of Consignment<span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-list-ol" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" id="charged_weight" name="charged_weight" placeholder="charged weight" required="" value="" minlength="2" maxlength="5">
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
                                 
                                 <div class="col-sm-6">
                                     <h4 class="sub-title uppercaser">Shipping Price <span class="star">*</span></h4>
                                    <div class="input-group">
                                       <span class="input-group-addon" id="basic-addon7"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                       <input type="text" class="form-control" id="shipping_charges" name="shipment_charges"  value="0.00" readonly required >
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <h4 class="sub-title uppercaser" style="text-align:center;" >Action<span class="star"> *</span></h4>
                                      <div class="input-group">
                                        <!--<a id='shipping_price' onclick='calculateShipping()' class="btn  btn-round btn-block text-white btn-out-dashed" style="background: #00acaf; border: 2px solid #00acaf;font-size:18px;"><i class="fa fa-calculator"></i>Calculate Shipping price</a>-->
									   <button  id='shipping_price' onclick='calculateShipping()' class="btn  btn-round btn-block text-white btn-out-dashed" style="background: #00acaf; border: 1px solid #00acaf;"> <i class="fa fa-calculator"></i> Calculate Shipping price</button>
                                     </div>
                                 </div>
								 
                              </div>
				            </div>
                        </div>
                     </div>
                  </div>
				 
                  <div class="card-block">
                     <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <h4 class="sub-title"> </h4>                           
                        </div>
                     </div>
                  </div>				 
                  <div class="row">				  
                     <div class="col-lg-4 col-md-4"></div>					 
                     <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                           <input type="hidden"  name="isedit" value="<?php echo $update ; ?>"> 
                           <input type="hidden"  name="igcpl_workorder_id" value="<?php echo $igcpl_workorder_id; ?>">                       
                           <button type="submit"  name="submit" onclick='submitForm()' class="btn  btn-round btn-block text-white" style="background: #00acaf; border: 1px solid #00acaf;"><i class="fa fa-user-plus"></i>Generate Workorder </button>
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

<script>

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
				    success: function(data) 
				    { 
					    //alert(data);
					    //$('#seller_district').html(data);
					    $("#shipping_charges").val(data);
						$("#shipping_price").html('<i class="fa fa-calculator"></i> Calculate Shipping price');
			            document.getElementById('shipping_price').disabled = false;
                       					   
				    }
				})
		}
									
    }
	
	
	function submitForm() 
	{
		alert("da");
	    document.getElementById('form1').submit();
	}
	
</script>
	
<script type="text/javascript">
    function ShowHideDiv() 
    {
        var logistics_type = document.getElementById("logistics_type");
        //alert(logistics_type);
        if(logistics_type.value == "selfFulfillment")
        {
          $("#ready_date").hide();
          $("#delivery_date").hide();
        }
        else 
        {
          $("#ready_date").show();
          $("#delivery_date").show();           
        }           
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
   // $(document).ready(function()
   // {
      $('#seller_stateid').change(function()
      {        
         var state_id = document.getElementById('seller_stateid').value;   
         //$('#seller_district').val();                
         //alert("Selected value is : " + state_id);
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
               }
            })
         }
      });


      $('#buyer_stateid').change(function()
      {        
         var state_id = document.getElementById('buyer_stateid').value;                   
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
                  $('#buyer_district').html(data);
               }
            })
         }
      });
   //});  
        
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

