<?php
    
    $userid = $this->session->userdata('user_login_id'); 
    $user_type = $this->session->userdata('user_type');	
    $sql = "SELECT * FROM users WHERE user_id='".$userid."' and user_type='".$user_type."' and status='ACTIVE' limit 1";
	$data['user_details'] = $this->db->query($sql)->result();
	//print_r($this->db->last_query());
				
	foreach ($data['user_details'] as $user_data) 
	{  			
		$region=$user_data->region;
		$region_state=$user_data->region_state;
		$district_branch=$user_data->district_branch;			
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
													<p class="m-b-5 text-white">Branch Managers</p>
													<h4 class="m-b-0 text-white"> 
														<?php
														$sql = "SELECT * FROM `users` WHERE user_type='6' AND region IN (".$region.") AND region_state IN (".$region_state.") AND district_branch IN (".$district_branch.") AND user_status='1' AND status='ACTIVE' ";
														$query = $this->db->query($sql);
														echo$result = $query->num_rows();
														//print_r($this->db->last_query());																																														
														?> 
													</h4>
												 </div>
												 <div class="col col-auto text-right">
													<i class="feather icon-users f-50 text-c-blue" style="font-size: 50px;color:#FF7B54"></i>
												 </div>
											  </div>
										   </div>
										</div>
									</div>
                                    <div class=" col-md-4">
										
										<div class="card bg-c-pink text-white" style="background: linear-gradient(to right,#77a39a,#ade9dd);">	
										   <div class="card-block">
											  <div class="row align-items-center">
												 <div class="col">
													<p class="m-b-5 text-white">Laabh Executive</p>
													<h4 class="m-b-0 text-white"> 
														<?php 														
															$sql = "SELECT * FROM `users` WHERE user_type='2' AND region IN (".$region.") AND region_state IN (".$region_state.") AND district_branch IN (".$district_branch.") AND user_status='1' AND status='ACTIVE' ";
															$query = $this->db->query($sql);
															echo $result = $query->num_rows();
															//print_r($this->db->last_query());
														?> 
													</h4>
												 </div>
												 <div class="col col-auto text-right">
													<i class="feather icon-users f-50 text-c-yellow" style="font-size: 50px;color:#77a39a"></i>
												 </div>
											  </div>
										   </div>
										</div>
									</div>
                                    <div class=" col-md-4">
										<div class="card bg-c-pink text-white">
										   <div class="card-block">
											  <div class="row align-items-center">
												 <div class="col">
													<p class="m-b-5 text-white">Laabh Agents</p>
													<h4 class="m-b-0 text-white"> 
														<?php 														
															$sql = "SELECT * FROM `users` WHERE user_type='5' AND region IN (".$region.") AND region_state IN (".$region_state.") AND district_branch IN (".$district_branch.") AND user_status='1' AND status='ACTIVE' ";
															$query = $this->db->query($sql);
															echo $result = $query->num_rows();
															//print_r($this->db->last_query());
														?> 
													</h4>
												 </div>
												 <div class="col col-auto text-right">
													<i class="feather icon-user-plus f-50 text-c-pink"></i>
												 </div>
											  </div>
										   </div>
										</div>
									 </div>
                                    
                                    <div class=" col-md-4">
										<div class="card bg-c-green text-white">
										   <div class="card-block">
											  <div class="row align-items-center">
												 <div class="col">
													<p class="m-b-5 text-white">Onborded Seller</p>
													<h4 class="m-b-0 text-white"> 
													<?php 														
														$sql = "SELECT * FROM `users` WHERE user_type='3' AND region IN (".$region.") AND region_state IN (".$region_state.") AND district_branch IN (".$district_branch.") AND user_status='1' AND status='ACTIVE' ";
														$query = $this->db->query($sql);
														echo $result = $query->num_rows();
														//print_r($this->db->last_query());
													?> 
													</h4>
												 </div>
												 <div class="col col-auto text-right">
													<i class="feather icon-user-check f-50 text-c-green"></i>
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
															$sql = "SELECT * FROM `work_order` WHERE  region_id IN (".$region.") AND region_state IN (".$region_state.") AND district_branch IN (".$district_branch.")  ";
															$query = $this->db->query($sql);
															echo $result = $query->num_rows();
															//print_r($this->db->last_query());
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
														$sql = "SELECT * FROM `work_order` WHERE  region_id IN (".$region.") AND region_state IN (".$region_state.") AND district_branch IN (".$district_branch.") AND isactive='2' ";
														$query = $this->db->query($sql);
														echo $result = $query->num_rows();
														//print_r($this->db->last_query());
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
