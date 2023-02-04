
<style>
   .accordion-section .panel-default > .panel-heading {
   border: 0;
   background: #f4f4f4;
   padding: 0;
   }
   .accordion-section .panel-default .panel-title a {
   display: block;
   font-style: italic;
   font-size: 1.5rem;
   }
   .accordion-section .panel-default .panel-title a:after {
   left: 0;
   top: 17px;
   /* right: 13px; */
   content: "";
   background-color: #e2e2e2;
   height: 2px;
   width: 13px;
   /* position: absolute;*/
   display: inline-block;
   }
   .accordion-section .panel-default .panel-title a.collapsed:after {
   content: "\f107";
   }
   .accordion-section .panel-default .panel-body {
   font-size: 1.2rem;
   }
   .panel-title a {
   color: #607d8b;
   padding: 8px 35px 8px 15px;
   display: block;
   font-size: 14px;
   white-space: nowrap;
   }
   .mdi{
   font-size:18px;
   }
   .show > li:before {
   left: 0;
   top: 17px;
   /* right: 13px; */
   content: "";
   background-color: #e2e2e2;
   height: 2px;
   width: 13px;
   display: inline-block;
   }
   .panel-body ul li{
   border-left:1px solid #607d8b;
   margin-left:30px;
   font-size:12px;
   font-weight:200;
   }
   .fa-minus{
   margin-left: -15px;
   font-size: 14px;
   }
   .faqHeader {
   font-size: 27px;
   margin: 20px;
   }
   .panel-heading [data-toggle="collapse"]:after {
   font-family: 'fontawesome';
   content: "\f054"; /* "play" icon */
   float: right!important;
   color:#99abb4!important;
   font-size: 12px!important;
   line-height: 22px!important;
   -webkit-transform: rotate(-90deg);
   -moz-transform: rotate(-90deg);
   -ms-transform: rotate(-90deg);
   -o-transform: rotate(-90deg);
   transform: rotate(-90deg);
   }
   .panel-heading [data-toggle="collapse"].collapsed:after {
   -webkit-transform: rotate(90deg);
   -moz-transform: rotate(90deg);
   -ms-transform: rotate(90deg);
   -o-transform: rotate(90deg);
   transform: rotate(90deg);
   color: #99abb4!important;
   font-size:12px!important;
   font-weight: 100!important;
   }
</style>
<aside class="left-sidebar">
   <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
      <!-- User profile -->
        <?php 
            $id = $this->session->userdata('user_login_id');
			$user_type = $this->session->userdata('user_type');
			$user_image = $this->session->userdata('user_image');
			$user_name = $this->session->userdata('name');
			if($user_type=="2")
			{
               $basicinfo = $this->employee_model->GetBasic($id); 
			}
			else if($user_type=="3")
			{
                $basicinfo = $this->Seller_model->sellerSingle($id);
			}				
        ?>                
    <div class="user-profile">
        
        <div class="profile-img">		    
			<img src="<?php echo base_url(); ?>assets/images/users/<?php echo $user_image; ?>" alt="user" />				                     
            <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
        </div>        
        <div class="profile-text">
            <h5>
				<?php
					
				echo $basicinfo->first_name.' '.$basicinfo->last_name;
					
                    					
				?>
			</h5>			
			<a href="<?php echo base_url(); ?>settings/Settings" class="dropdown-toggle u-dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
		    <a href="<?php echo base_url(); ?>login/logout" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>				              
		</div>
    </div>
      
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="nav-devider"></li>           			          		
				<li> <a href="<?php echo base_url(); ?>" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a></li>
			<!--
				<li> <a class=" waves-effect waves-dark" href="<?php echo base_url(); ?>employee/view?I=" aria-expanded="false">
				<i class="mdi mdi-account-multiple"></i><span class="hide-menu">Employees </span></a></li>
			-->	
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<!--
					<div class="panel panel-default">
					    <div class="panel-heading sidebarnav " role="tab" id="heading0">
							<li class="panel-title active">
								<a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0"><i class="mdi mdi-rocket mr-2"></i>
								Leave
								</a>
							</li>
					    </div>
					    <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
							<div class="panel-body px-3 ">
								<ul>
								   <li><a href="<?php echo base_url(); ?>leave/Holidays" class="active"><i class="fa fa-minus" aria-hidden="true"></i> Holiday </a></li>
								   <li><a href="<?php echo base_url(); ?>leave/EmApplication"><i class="fa fa-minus" aria-hidden="true"></i> Leave Application </a></li>
								   <li><a href="<?php echo base_url(); ?>leave/EmLeavesheet"><i class="fa fa-minus" aria-hidden="true"></i> Leave Sheet </a></li>
								</ul>
							</div>
					    </div>
					</div>
					
				    <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="heading1">
						 <li class="panel-title">
							<a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1"><i class="mdi mdi-briefcase-check mr-2"></i>
							Project 
							</a>
						 </li>
					    </div>
					    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
						 <div class="panel-body px-3 ">
							<ul>
							   <li><a href="<?php echo base_url(); ?>Projects/All_Projects"><i class="fa fa-minus" aria-hidden="true"></i> Projects </a></li>
							   <li><a href="<?php echo base_url(); ?>Projects/All_Tasks"><i class="fa fa-minus" aria-hidden="true"></i>  Task List </a></li>
							</ul>
						 </div>
					    </div>
				    </div>
				-->	
				    <div class="panel panel-default">
					  <div class="panel-heading " role="tab" id="heading2">
						 <li class="panel-title">
							<a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2"><i class="mdi mdi-account mr-2"></i> 
							Seller
							</a>
						 </li>
					  </div>
					  <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
						 <div class="panel-body px-3 ">
							<ul>
							   <li><a href="<?php echo base_url(); ?>SellerRegister/"><i class="fa fa-minus" aria-hidden="true"></i> Add Seller  </a></li>
							   <li><a href="<?php echo base_url(); ?>SellerRegister/AllSeller/<?php echo $id; ?>"><i class="fa fa-minus" aria-hidden="true"></i>  All Sellers </a></li>
							</ul>
						 </div>
					  </div>
				    </div>
				</div>
                                                                    
                
			
         </ul>
    </nav>






    
    
   </div>

</aside>



<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 --><script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>