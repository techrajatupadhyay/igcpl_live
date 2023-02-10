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
								<!--
								    <div class=" col-md-4">
										<div class="card bg-c-yellow text-white">
										   <div class="card-block">
											  <div class="row align-items-center">
												 <div class="col">
													<p class="m-b-5 text-white">All Employees</p>
													<h4 class="m-b-0 text-white"> 
														<?php 														
														$this->db->from("users");
														$this->db->where('user_type',2);
                                                        $this->db->or_where('user_type',6);														
														$this->db->where('user_status',1);
														$this->db->where('status','ACTIVE');
														echo $this->db->count_all_results();
														?> 
													</h4>
												 </div>
												 <div class="col col-auto text-right">
													<i class="feather icon-users f-50 text-c-yellow"></i>
												 </div>
											  </div>
										   </div>
										</div>
									</div>
								-->	
									<div class=" col-md-4">
										<div class="card bg-c-blue text-white">
										   <div class="card-block">
											  <div class="row align-items-center">
												 <div class="col">
													<p class="m-b-5 text-white">All Managers</p>
													<h4 class="m-b-0 text-white"> 
														<?php 														
														$this->db->from("users");														
                                                        $this->db->where('user_type',6);
                                                        $this->db->where_in('region',$region);														
														$this->db->where('user_status',1);
														$this->db->where('status','ACTIVE');
														echo $this->db->count_all_results();
														//print_r($this->db->last_query());
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
														$this->db->where_in('region',$region);
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
                                    <div class=" col-md-4">
										<div class="card bg-c-yellow text-white">
										   <div class="card-block">
											  <div class="row align-items-center">
												 <div class="col">
													<p class="m-b-5 text-white">Laabh Agents</p>
													<h4 class="m-b-0 text-white"> 
														<?php 														
															$this->db->from("users");
															$this->db->where('user_type',5);
															$this->db->where_in('region',$region);
															$this->db->where('user_status',1);
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
                                    
                                    <div class=" col-md-4">
										<div class="card bg-c-yellow text-white">
										   <div class="card-block">
											  <div class="row align-items-center">
												 <div class="col">
													<p class="m-b-5 text-white">Onborded Seller</p>
													<h4 class="m-b-0 text-white"> 
													<?php 														
														$this->db->from("users");
														$this->db->where('user_type',3);
                                                        $this->db->where_in('region',$region);														
														$this->db->where('user_status',1);
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
                                    <div class=" col-md-4">
										<div class="card bg-c-blue text-white">
										   <div class="card-block">
											  <div class="row align-items-center">
												 <div class="col">
													<p class="m-b-5 text-white">Workorders</p>
													<h4 class="m-b-0 text-white"> 
														<?php 														
														$this->db->from("work_order");
														$this->db->where_in('region_id',$region);
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
										<div class="card bg-c-pink text-white">
										   <div class="card-block">
											  <div class="row align-items-center">
												 <div class="col">
													<p class="m-b-5 text-white">Delivered Workorders</p>
													<h4 class="m-b-0 text-white"> 
													<?php 														
														$this->db->from("work_order");
														$this->db->where_in('region_id',$region);
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
   
   <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         
         gtag('config', 'UA-23581568-13');
   </script>
     
   <script>
         function myFunction() {
           var input, filter, table, tr, td, i, txtValue;
           input = document.getElementById("myInput");
           filter = input.value.toUpperCase();
           table = document.getElementById("myTable");
           tr = table.getElementsByTagName("tr");
           for (i = 0; i < tr.length; i++) {
             td = tr[i].getElementsByTagName("td")[0];
             if (td) {
               txtValue = td.textContent || td.innerText;
               if (txtValue.toUpperCase().indexOf(filter) > -1) {
                 tr[i].style.display = "";
               } else {
                 tr[i].style.display = "none";
               }
             }       
           }
         }
   </script>

   
   <script>
         function toggleFullScreen()
         {
            if (!document.fullscreenElement) 
            {
               document.documentElement.requestFullscreen();
            } 
            else if (document.exitFullscreen) 
                  {
                     document.exitFullscreen();
                  }
         }
   </script>
   <script>
      $(document).ready(function(){
         
     
      /*dropdwon*/
         document.addEventListener("DOMContentLoaded", function(){
         document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
         
         element.addEventListener('click', function (e) {
         
         let nextEl = element.nextElementSibling;
         let parentEl  = element.parentElement; 
         
           if(nextEl) {
               e.preventDefault();  
               let mycollapse = new bootstrap.Collapse(nextEl);
               
               if(nextEl.classList.contains('show')){
                 mycollapse.hide();
               } else {
                   mycollapse.show();
                   // find other submenus with class=show
                   var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                   // if it exists, then close all of them
                   if(opened_submenu){
                     new bootstrap.Collapse(opened_submenu);
                   }
               }
           }
         }); // addEventListener
         }) // forEach
         }); 
         // DOMContentLoaded  end
           
      </script>
      <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7729a56a58cd6efa","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>
   </body>
</html>