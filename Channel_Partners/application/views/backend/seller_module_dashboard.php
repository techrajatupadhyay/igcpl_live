<?php
    
    $sellerid = $this->session->userdata('user_login_id');

    $sql2 ="SELECT * from users Where user_id='".$sellerid."' and status='ACTIVE'" ;
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
                                       <div class="card bg-c-blue text-white">
                                          <div class="card-block">
                                             <div class="row align-items-center">
                                                <div class="col">
                                                   <p class="m-b-5 text-white"> Workorders</p>
                                                    <h4 class="m-b-0 text-white"> <?php 
                                                      $this->db->where('sellerid',$sellerid);
                                                      $this->db->from("work_order");
                                                      echo $this->db->count_all_results();
                                                    ?> </h4>
                                                </div>
                                                <div class="col col-auto text-right">
                                                   <i class="feather icon-shopping-cart f-50 text-c-blue"></i>
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
                                                   <p class="m-b-5 text-white">Completed Workorders</p>
                                                   <h4 class="m-b-0 text-white"> 
                                                      <?php 														
                                                         $this->db->from("work_order");
                                                         $this->db->where('sellerid',$sellerid);
                                                         $this->db->where('isactive',2);														
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
                                    
                                    <div class=" col-md-4">
                                       <div class="card bg-c-pink text-white" style="background: linear-gradient(to right,#0E5E6F,#3A8891);">
                                          <div class="card-block">
                                             <div class="row align-items-center">
                                                <div class="col">
                                                   <p class="m-b-5 text-white">Delivered Workorders</p>
                                                   <?php 														
                                                      $this->db->from("work_order");
                                                      $this->db->where('sellerid',$sellerid);
                                                      $this->db->where('isactive',2);														
                                                      echo $this->db->count_all_results();
                                                      
                                                   ?> 
                                                </div>
                                                <div class="col col-auto text-right">
                                                   <i class="fa fa-truck f-50 text-c-pink" style="font-size: 50px;color:#0E5E6F"></i>
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
                                                   <p class="m-b-5 text-white">Total</p>
                                                   <h4 class="m-b-0 text-white">8</h4>
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
      <!-- table filter  -->
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
      
      <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7729a56a58cd6efa","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>
   </body>
</html>