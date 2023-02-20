<?php
    
    $userid = $this->session->userdata('user_login_id');  
          
   ?>

                        <div class="row">
                              <div class="col-md-2"></div>
                              <div class="col-md-10 my-3 ">
                                <div class="row mx-3">
								 <!--
                                    <div class=" col-md-3">
                                       <div class="card bg-c-yellow text-white">
                                          <div class="card-block">
                                             <div class="row align-items-center">
                                                <div class="col">
                                                    <p class="m-b-5 text-white">Onborded Seller</p>
                                                    <h4 class="m-b-0 text-white"> 
														<?php 														
															$this->db->from("users");
															$this->db->where('user_type',3);
															$this->db->where('status','ACTIVE');
															echo $this->db->count_all_results();
														?> 
													</h4>
                                                </div>
                                                <div class="col col-auto text-right">
                                                   <i class="feather icon-user f-50 text-c-yellow"></i>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class=" col-md-3">
                                       <div class="card bg-c-green text-white">
                                          <div class="card-block">
                                             <div class="row align-items-center">
                                                <div class="col">
                                                    <p class="m-b-5 text-white">Laabh Executive</p>
                                                    <h4 class="m-b-0 text-white"> 
														<?php 														
															$this->db->from("users");
															$this->db->where('user_type',2);
															$this->db->where('status','ACTIVE');
															echo $this->db->count_all_results();
														?> 
													</h4>
                                                </div>
                                                <div class="col col-auto text-right">
                                                   <i class="feather icon-credit-card f-50 text-c-green"></i>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                -->    
                                    <div class=" col-md-3">
                                       <div class="card bg-c-blue text-white">
                                          <div class="card-block">
                                             <div class="row align-items-center">
                                                <div class="col">
                                                   <p class="m-b-5 text-white">All Workorders</p>
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
                                    <div class=" col-md-3">
                                       <div class="card bg-c-pink text-white">
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
                                                   <i class="feather icon-book f-50 text-c-pink"></i>
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
   