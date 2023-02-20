<?php
    
    $userid = $this->session->userdata('user_login_id'); 
    $user_type = $this->session->userdata('user_type');	
    $sql = "SELECT * FROM users WHERE user_id='".$userid."' and user_type='".$user_type."' and status='ACTIVE' limit 1";
	$data['user_details'] = $this->db->query($sql)->result();
	//print_r($this->db->last_query());
				
	foreach ($data['user_details'] as $user_data) 
	{  			
		$region=$user_data->region;	
		
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
													<p class="m-b-5 text-white">All Employees</p>
													<h4 class="m-b-0 text-white"> 
														<?php 														
														$this->db->from("users");
														$this->db->where('user_type',2);
                                                        $this->db->or_where('user_type',6);
                                                        $this->db->or_where('user_type',7);
     													$this->db->or_where('user_type',8);
                                                        $this->db->or_where('user_type',9);
														$this->db->or_where('user_type',10);
                                                        $this->db->or_where('user_type',11);
														$this->db->or_where('user_type',12);
                                                        $this->db->or_where('user_type',13);														
														$this->db->where('user_status',1);
														$this->db->where('status','ACTIVE');
														echo $this->db->count_all_results();
														?> 
													</h4>
												 </div>
												 <div class="col col-auto text-right">
													<i class="feather icon-users f-50 text-c-yellow" style="font-size: 50px;color:#FF7B54"></i>
												 </div>
											  </div>
										   </div>
										</div>
									</div>
								<!--	
									<div class=" col-md-4">
										<div class="card bg-c-green text-white">
										   <div class="card-block">
											  <div class="row align-items-center">
												 <div class="col">
													<p class="m-b-5 text-white">Assistant General Manager</p>
													<h4 class="m-b-0 text-white"> 
														<?php 														
														$this->db->from("users");														
                                                        $this->db->or_where('user_type',11);														
														$this->db->where('user_status',1);
														$this->db->where('status','ACTIVE');
														echo $this->db->count_all_results();
														?> 
													</h4>
												 </div>
												 <div class="col col-auto text-right">
													<i class="feather icon-user f-50 text-c-green"></i>
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
													<p class="m-b-5 text-white"> Branch Managers</p>
													<h4 class="m-b-0 text-white"> 
														<?php 														
														$this->db->from("users");														
                                                        $this->db->or_where('user_type',6);														
														$this->db->where('user_status',1);
														$this->db->where('status','ACTIVE');
														echo $this->db->count_all_results();
														?> 
													</h4>
												 </div>
												 <div class="col col-auto text-right">
													<i class="feather icon-users f-50 text-c-blue"></i>
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
													<p class="m-b-5 text-white">Laabh Executive</p>
													<h4 class="m-b-0 text-white"> 
														<?php 														
															$this->db->from("users");
															$this->db->where('user_type',2);														
															$this->db->where('user_status',1);
															$this->db->where('status','ACTIVE');
															echo $this->db->count_all_results();
														?> 
													</h4>
												 </div>
												 <div class="col col-auto text-right">
													<i class="feather icon-users f-50 text-c-green"></i>
												 </div>
											  </div>
										   </div>
										</div>
									</div>
                                -->	
                                    <div class=" col-md-4">
										<div class="card bg-c-pink text-white" >
										   <div class="card-block">
											  <div class="row align-items-center">
												 <div class="col">
													<p class="m-b-5 text-white">Laabh Agents</p>
													<h4 class="m-b-0 text-white"> 
														<?php 														
															$this->db->from("users");
															$this->db->where('user_type',5);															
															$this->db->where('user_status',1);
															$this->db->where('status','ACTIVE');
															echo $this->db->count_all_results();
														?> 
													</h4>
												 </div>
												 <div class="col col-auto text-right">
													<i class="feather icon-user-plus f-50 text-c-pink" style="color:#fe5d70" ></i>
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
														$this->db->from("users");
														$this->db->where('user_type',3);																
														$this->db->where('user_status',1);
														$this->db->where('status','ACTIVE');
														echo $this->db->count_all_results();
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
															$this->db->from("work_order");
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
									<div class=" col-md-4">
										<div class="card bg-c-yellow text-white" style="background: linear-gradient(to right,#FF7B54,#feb798);">
										   <div class="card-block">
											  <div class="row align-items-center">
												 <div class="col">
													<p class="m-b-5 text-white">Seller Onbording Amount</p>													
													<h4 class="m-b-0 text-white"> 
													<i class="fa fa-inr" aria-hidden="true"></i>	
													<?php 														
														$this->db->from("work_order");
														$this->db->where('isactive',2);
														//$this->db->where('status','ACTIVE');
														echo $this->db->count_all_results();
													?> 
													</h4>
												 </div>
												 <div class="col col-auto text-right">
													<i class="fa fa-inr f-50 text-c-yellow" style="font-size: 50px;color:#FF7B54"></i>
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
