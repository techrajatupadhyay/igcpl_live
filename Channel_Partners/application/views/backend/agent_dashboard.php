<?php
    
    $userid = $this->session->userdata('user_login_id');  
    $sql2 ="SELECT * from users Where user_id='".$userid."' and status='ACTIVE'" ;
	$data['user_details'] = $this->db->query($sql2)->result();	
							
	foreach($data['user_details'] as $det)
	{				
		$region = $det->region ;
        $region_state = $det->region_state;
        $district_branch = $det->district_branch;		
    }      
   ?>

                        <div class="row">
                              <div class="col-md-2"></div>
                              <div class="col-md-10 my-3 ">
                                 <div class="row mx-3">
                                    <div class=" col-md-4">
                                       <div class="card bg-c-yellow text-white" style="background: linear-gradient(to right,#FF7B54,#feb798);">
                                          <div class="card-block">
                                             <div class="row align-items-center">
                                                <div class="col">
                                                   <p class="m-b-5 text-white">Onborded Sellers </p>
                                                    <h4 class="m-b-0 text-white"> 
                                                      <?php 														
                                                         $this->db->from("seller");															
                                                         $this->db->where('region_id',$region);
                                                         $this->db->where('region_state',$region_state);
                                                         $this->db->where('district_branch',$district_branch);
                                                         $this->db->where('labh_agent_id',$userid);
                                                         $this->db->where('seller_status',1);
                                                         echo $this->db->count_all_results();
                                                      ?> 
                                                   </h4>
                                                </div>
                                                <div class="col col-auto text-right">
                                                   <i class="feather icon-user-check f-50 text-c-yellow" style="font-size: 50px;color:#FF7B54"></i>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>								    
                                    <div class=" col-md-4">
                                       <div class="card bg-c-blue text-white">
                                          <div class="card-block">
                                             <div class="row align-items-center">
                                                <div class="col">
                                                   <p class="m-b-5 text-white">Workorders</p>
                                                    <h4 class="m-b-0 text-white"> 
                                                      <?php 														
                                                         $this->db->from("work_order");
                                                         $this->db->where('agent_id',$userid);
                                                         $this->db->where('region_id',$region);
                                                         $this->db->where('region_state',$region_state);
                                                         $this->db->where('district_branch',$district_branch);
                                                         //$this->db->where('user_type',2);
                                                         //$this->db->where('status','ACTIVE');
                                                         echo $this->db->count_all_results();
                                                      ?> 
                                                   </h4>
                                                </div>
                                                <div class="col col-auto text-right">
                                                   <i class="feather icon-shopping-cart f-50 text-c-blue"></i>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class=" col-md-4">
                                       <div class="card bg-c-pink text-white" style="background: linear-gradient(to right,#0E5E6F,#3A8891);">
                                          <div class="card-block">
                                             <div class="row align-items-center">
                                                <div class="col">
                                                   <p class="m-b-5 text-white">Delivered Workorders</p>
                                                    <h4 class="m-b-0 text-white"> 
                                                      <?php 														
                                                         $this->db->from("work_order");
                                                         $this->db->where('agent_id',$userid);
                                                         $this->db->where('region_id',$region);
                                                         $this->db->where('region_state',$region_state);
                                                         $this->db->where('district_branch',$district_branch);
                                                         $this->db->where('isactive',2);
                                                         //$this->db->where('status','ACTIVE');
                                                         echo $this->db->count_all_results();
                                                      ?> 
                                                   </h4>
                                                </div>
                                                <div class="col col-auto text-right">
                                                   <i class="fa fa-truck f-50 text-c-pink" style="font-size: 50px;color:#0E5E6F"></i>
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
                  </div>
               </div>
            </div>
         </div>
      </div>