<?php
    
    $userid = $this->session->userdata('user_login_id');
    $usertype = $this->session->userdata('user_type');
	$user_type ="";
	
    if($usertype=='1')
	{
       $user_type='HO';
	}		
    else if($usertype=='2')
	{
       $user_type='Laabh Executive';
	}
	else if($usertype=='3')
	{
       $user_type='Seller';
	}
	else if($usertype=='4')
	{
       $user_type='Fulfilment Partner';
	}
	else if($usertype=='5')
	{
       $user_type='Laabh Abhikarta/Agent';
	}
	else if($usertype=='6')
	{
       $user_type='Branch Manager';
	}
	else if($usertype=='7')
	{
       $user_type='Senior Office Executive';
	}
	else if($usertype=='8')
	{
       $user_type='Office Executive (GEM)';
	}
	else if($usertype=='9')
	{
       $user_type='Office Support Staff';
	}
	else if($usertype=='10')
	{
       $user_type='Customer Care Executive ';
	}
	else if($usertype=='11')
	{
       $user_type='Assistant General Manager';
	}
	else if($usertype=='12')
	{
       $user_type='Senior Executive';
	}
	else if($usertype=='13')
	{
       $user_type='Assistant manager';
	}
          
?>

<div class="pcoded-main-container">
   <div class="pcoded-wrapper">
      <div class="pcoded-main-container">
         <div class="pcoded-wrapper">
            <nav class="pcoded-navbar">
                <div class="pcoded-inner-navbar main-menu">
                   
					<div class="pcoded-navigatio-lavel" menu-title-theme="theme5"><?php echo $user_type;?></div>
						<ul class="pcoded-item pcoded-left-item" item-border="true" item-border-style="none" subitem-border="true">
							<?php  if($usertype==1){ ?>
							
								<li class="active">
									<a href="<?php echo base_url();?>Dashboard">
									<span class="pcoded-micon"><i class="feather icon-home"></i></span>
									<span class="pcoded-mtext">Dashboard</span>
									</a>
								</li>
								
								<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="fa fa-group"></i></span>
										<span class="pcoded-mtext">Employees</span>
									</a>								
									<ul class="pcoded-submenu">
										<li class="">
											<a href="<?php echo base_url();?>Admin/Register_Employee">
												<span class="pcoded-mtext">Register Employees</span>
											</a>
										</li>
										<li class="">
											<a href="<?php echo base_url();?>Admin/Allemployees">
												<span class="pcoded-mtext">All Employees</span>
											</a>
										</li>								
									</ul>							
							    </li>
								
								<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="fa fa-user-circle-o"></i></span>
										<span class="pcoded-mtext">Branch Manager</span>
									</a>								
									<ul class="pcoded-submenu">										
										<li class="">
											<a href="<?php echo base_url();?>Admin/All_Managers">
												<span class="pcoded-mtext">All Managers</span>
											</a>
										</li>								
									</ul>							
							    </li>

							    <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="feather icon-users"></i></span>
										<span class="pcoded-mtext">Laabh Executive</span>
									</a>								
									<ul class="pcoded-submenu">
									<!--
										<li class="">
											<a href="<?php echo base_url();?>Laabh_executive/add_Laabh_Executive">
												<span class="pcoded-mtext">Register Laabh Executive</span>
											</a>
										</li>
									-->	
										<li class="">
											<a href="<?php echo base_url();?>Laabh_executive/All_Laabh_Executive">
												<span class="pcoded-mtext">All Laabh Executive</span>
											</a>
										</li>								
									</ul>							
							    </li>	

							    <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="fa fa-user-plus"></i></span>
										<span class="pcoded-mtext">Laabh Agent(LAE)</span>
									</a>								
									<ul class="pcoded-submenu">
									<!--
										<li class="">
											<a href="<?php echo base_url();?>Laabh_agent/register_laabh_agent">
												<span class="pcoded-mtext">Register Laabh Agent </span>
											</a>
										</li>
									-->	
										<li class="">
											<a href="<?php echo base_url();?>Laabh_agent/All_Laabh_agents">
												<span class="pcoded-mtext">All Laabh Agent</span>
											</a>
										</li>								
									</ul>							
							    </li>
																				
								
                                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="fa fa-user-o"></i></span>
										<span class="pcoded-mtext">Onborded Sellers</span>
									</a>								
									<ul class="pcoded-submenu">										
										<li class="">
											<a href="<?php echo base_url();?>SellerRegister/AllSeller">
												<span class="pcoded-mtext">All Sellers</span>
											</a>
										</li>								
									</ul>							
							    </li>
                                								
								<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
										<span class="pcoded-mtext"> Workorders</span>
									</a>								
									<ul class="pcoded-submenu">										
										<li class="">
											<a href="<?php echo base_url();?>Seller_module/Workorders">
												<span class="pcoded-mtext">All Workorders</span>
											</a>
										</li>								
									</ul>							
								</li>
								
							<?php } else if($usertype==2){ ?>
							
								<li class="active">
									<a href="<?php echo base_url();?>Dashboard">
									<span class="pcoded-micon"><i class="feather icon-home"></i></span>
									<span class="pcoded-mtext">Dashboard</span>
									</a>
								</li>
								
								<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="feather icon-users"></i></span>
										<span class="pcoded-mtext">Laabh Abhikarta/Agent</span>
									</a>								
									<ul class="pcoded-submenu">
										<li class="">
											<a href="<?php echo base_url();?>Laabh_agent/register_laabh_agent">
												<span class="pcoded-mtext">Register Laabh Agent </span>
											</a>
										</li>
										<li class="">
											<a href="<?php echo base_url();?>Laabh_agent/All_Laabh_agents">
												<span class="pcoded-mtext">All Laabh Agent</span>
											</a>
										</li>								
									</ul>							
							    </li>
								
								<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="fa fa-user-plus"></i></span>
										<span class="pcoded-mtext">Sellers</span>
									</a>								
									<ul class="pcoded-submenu">
									<!--
										<li class="">
											<a href="<?php echo base_url();?>SellerRegister">
												<span class="pcoded-mtext">Add New Seller</span>
											</a>
										</li>
									-->	
										<li class="">
											<a href="<?php echo base_url();?>SellerRegister/AllSeller">
												<span class="pcoded-mtext">All Sellers</span>
											</a>
										</li>								
									</ul>							
							    </li>
																															    																
								<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
										<span class="pcoded-mtext"> Workorders</span>
									</a>								
									<ul class="pcoded-submenu">										
										<li class="">
											<a href="<?php echo base_url();?>Seller_module/Workorders">
												<span class="pcoded-mtext">All Workorders</span>
											</a>
										</li>								
									</ul>							
								</li>	
													
							<?php } else if($usertype==3){ ?>
														
						    <li class="active">
								<a href="<?php echo base_url();?>Seller_module">
								<span class="pcoded-micon"><i class="feather icon-home"></i></span>
								<span class="pcoded-mtext">Dashboard</span>
								</a>
							</li>
							
							<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
								<a href="javascript:void(0)">
								    <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
								    <span class="pcoded-mtext">MY Workorder</span>
								</a>								
								<ul class="pcoded-submenu">
									<li class="active">
										<a href="<?php echo base_url();?>Seller_module/New_workorder">
										    <span class="pcoded-mtext">Genrate Workorders</span>
										</a>
									</li>
									<li class="">
										<a href="<?php echo base_url();?>Seller_module/Workorders">
										    <span class="pcoded-mtext">My All Workorders</span>
										</a>
									</li>								
								</ul>							
							</li>
						   
						<?php } else if($usertype==4){ ?>
												
						        <li class="active">
									<a href="<?php echo base_url();?>Dashboard">
									<span class="pcoded-micon"><i class="feather icon-home"></i></span>
									<span class="pcoded-mtext">Dashboard</span>
									</a>
								</li>
																							
								<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
										<span class="pcoded-mtext"> Workorders</span>
									</a>								
									<ul class="pcoded-submenu">										
										<li class="">
											<a href="<?php echo base_url();?>Seller_module/Workorders">
												<span class="pcoded-mtext">All Workorders</span>
											</a>
										</li>								
									</ul>							
								</li>
						    
                        <?php } else if($usertype==5){ ?>
												
						        <li class="active">
									<a href="<?php echo base_url();?>Dashboard">
									<span class="pcoded-micon"><i class="feather icon-home"></i></span>
									<span class="pcoded-mtext">Dashboard</span>
									</a>
								</li>
																							
								<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="fa fa-user-o"></i></span>
										<span class="pcoded-mtext">Sellers</span>
									</a>								
									<ul class="pcoded-submenu">
										<li class="">
											<a href="<?php echo base_url();?>SellerRegister">
												<span class="pcoded-mtext">Add New Seller</span>
											</a>
										</li>
										<li class="">
											<a href="<?php echo base_url();?>SellerRegister/AllSeller">
												<span class="pcoded-mtext">All Sellers</span>
											</a>
										</li>								
									</ul>							
							    </li>
								
								<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
										<span class="pcoded-mtext"> My Region Workorders</span>
									</a>								
									<ul class="pcoded-submenu">										
										<li class="">
											<a href="<?php echo base_url();?>Seller_module/Workorders">
												<span class="pcoded-mtext">All Workorders</span>
											</a>
										</li>								
									</ul>							
								</li>


							 <?php } else if($usertype==6){ ?>
												
						      <li class="active">
									<a href="<?php echo base_url();?>Dashboard">
									<span class="pcoded-micon"><i class="feather icon-home"></i></span>
									<span class="pcoded-mtext">Dashboard</span>
									</a>
								</li>
																							
								<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="feather icon-users"></i></span>
										<span class="pcoded-mtext">Laabh Executive</span>
									</a>								
									<ul class="pcoded-submenu">
										<li class="">
											<a href="<?php echo base_url();?>Laabh_executive/All_Laabh_Executive">
												<span class="pcoded-mtext">All Laabh Executive</span>
											</a>
										</li>								
									</ul>							
							   </li>	

							    <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="fa fa-user-plus"></i></span>
										<span class="pcoded-mtext">Laabh Agent(LAE)</span>
									</a>								
									<ul class="pcoded-submenu">										
										<li class="">
											<a href="<?php echo base_url();?>Laabh_agent/All_Laabh_agents">
												<span class="pcoded-mtext">All Laabh Agent(LAE)</span>
											</a>
										</li>								
									</ul>							
							    </li>

								<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="fa fa-user-o"></i></span>
										<span class="pcoded-mtext">Sellers</span>
									</a>								
									<ul class="pcoded-submenu">
										
										<li class="">
											<a href="<?php echo base_url();?>SellerRegister/AllSeller">
												<span class="pcoded-mtext">All Sellers</span>
											</a>
										</li>								
									</ul>							
							    </li>

							    <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
										<span class="pcoded-mtext"> Workorders</span>
									</a>								
									<ul class="pcoded-submenu">										
										<li class="">
											<a href="<?php echo base_url();?>Seller_module/Workorders">
												<span class="pcoded-mtext">All Workorders</span>
											</a>
										</li>								
									</ul>							
								</li>
                             <?php } else if($usertype==7){ ?>
												
						      <li class="active">
									<a href="<?php echo base_url();?>Dashboard">
									<span class="pcoded-micon"><i class="feather icon-home"></i></span>
									<span class="pcoded-mtext">Dashboard</span>
									</a>
								</li>
							  <?php } else if($usertype==8){ ?>
												
						        <li class="active">
									<a href="<?php echo base_url();?>Dashboard">
									<span class="pcoded-micon"><i class="feather icon-home"></i></span>
									<span class="pcoded-mtext">Dashboard</span>
									</a>
								</li>																
							  <?php } else if($usertype==9){ ?>
												
						        <li class="active">
									<a href="<?php echo base_url();?>Dashboard">
									<span class="pcoded-micon"><i class="feather icon-home"></i></span>
									<span class="pcoded-mtext">Dashboard</span>
									</a>
								</li>	
						      <?php } else if($usertype==10){ ?>
												
						        <li class="active">
									<a href="<?php echo base_url();?>Dashboard">
									<span class="pcoded-micon"><i class="feather icon-home"></i></span>
									<span class="pcoded-mtext">Dashboard</span>
									</a>
								</li>
							  <?php } else if($usertype==11){ ?>
												
						        <li class="active">
									<a href="<?php echo base_url();?>Dashboard">
									<span class="pcoded-micon"><i class="feather icon-home"></i></span>
									<span class="pcoded-mtext">Dashboard</span>
									</a>
								</li>
															
								<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="fa fa-user-circle-o"></i></span>
										<span class="pcoded-mtext">Branch Manager</span>
									</a>								
									<ul class="pcoded-submenu">										
										<li class="">
											<a href="<?php echo base_url();?>Admin/All_Managers">
												<span class="pcoded-mtext">All Managers</span>
											</a>
										</li>								
									</ul>							
							    </li>

							    <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="feather icon-users"></i></span>
										<span class="pcoded-mtext">Laabh Executive</span>
									</a>								
									<ul class="pcoded-submenu">
									<!--
										<li class="">
											<a href="<?php echo base_url();?>Laabh_executive/add_Laabh_Executive">
												<span class="pcoded-mtext">Register Laabh Executive</span>
											</a>
										</li>
									-->	
										<li class="">
											<a href="<?php echo base_url();?>Laabh_executive/All_Laabh_Executive">
												<span class="pcoded-mtext">All Laabh Executive</span>
											</a>
										</li>								
									</ul>							
							    </li>	

							    <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="fa fa-user-plus"></i></span>
										<span class="pcoded-mtext">Laabh Agent(LAE)</span>
									</a>								
									<ul class="pcoded-submenu">
									<!--
										<li class="">
											<a href="<?php echo base_url();?>Laabh_agent/register_laabh_agent">
												<span class="pcoded-mtext">Register Laabh Agent </span>
											</a>
										</li>
									-->	
										<li class="">
											<a href="<?php echo base_url();?>Laabh_agent/All_Laabh_agents">
												<span class="pcoded-mtext">All Laabh Agent</span>
											</a>
										</li>								
									</ul>							
							    </li>
																				
								
                                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="fa fa-user-o"></i></span>
										<span class="pcoded-mtext">Onborded Sellers</span>
									</a>								
									<ul class="pcoded-submenu">										
										<li class="">
											<a href="<?php echo base_url();?>SellerRegister/AllSeller">
												<span class="pcoded-mtext">All Sellers</span>
											</a>
										</li>								
									</ul>							
							    </li>
                                								
								<li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
										<span class="pcoded-mtext"> Workorders</span>
									</a>								
									<ul class="pcoded-submenu">										
										<li class="">
											<a href="<?php echo base_url();?>Seller_module/Workorders">
												<span class="pcoded-mtext">All Workorders</span>
											</a>
										</li>								
									</ul>							
								</li>	
						<?php } ?>	

					</ul>
                </div>
            </nav>