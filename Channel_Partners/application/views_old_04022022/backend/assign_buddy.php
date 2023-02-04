<?php 

if(isset($workorder_details) && $workorder_details !="")
{
	
	foreach($workorder_details as $value)
	{
		$igcpl_workorder_id = $value->igcpl_workorder_id ;		
		$sellerid=$value->sellerid;
		$workorder_type = $value->order_type;
		$gemNgem_workorder_id = $value->gemNgem_workorder_id;
		$pick_location = $value->pick_location;
		$product_category = $value->select_product;
		$buyer_name = $value->buyer_name;
		$email = $value->email;
		$contact = $value->contact;
		$statename = $value->statename;
		$districtname = $value->districtname;
		$city = $value->city;
		$pincode = $value->pincode;
		$consignee_address = $value->consignee_address;
		$logistics = $value->logistics;
		$ready_delivery_date = $value->ready_delivery_date;
		$expected_date = $value->expected_date;
		$gem_workorder_doc = $value->gem_workorder_doc;
		$value_gem_order = $value->value_gem_order;
		$bill_discounting = $value->bill_discounting;
		$sample_clause = $value->sample_clause;
				
	}
	
}

?>


<div class="pcoded-content">
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4>Assign Buddy</h4>
									<span>assign buddy to the source & destination </span>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
									<a href="index.html"> <i class="feather icon-home"></i> </a>
									</li>
									<li class="breadcrumb-item"><a href="#!">All Workorders</a>
									</li>
									<li class="breadcrumb-item"><a href="#">Assign Buddy</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				<div class="tab-content">
					<div class="tab-pane active" id="personal" role="tabpanel">
						<div class="card">
							<div class="card-header">
								<h5 class="card-header-text">Workorder Details</h5>
								<button id="edit-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
								<i class="icofont icofont-edit"></i>
								</button>
							</div>
							<div class="card-block">
								<div class="view-info" style="">
									<div class="row">
										<div class="col-lg-12">
											<div class="general-info">
												<div class="row">
													<div class="col-lg-12 col-xl-6">
														<div class="table-responsive">
															<table class="table m-0">
																<tbody>
																	<tr>
																	<th scope="row">Seller ID</th>
																	<td><?php echo $sellerid; ?> </td>
																	</tr>
																	<tr>
																	<th scope="row">Gem Workorder ID</th>
																	<td><?php echo $gemNgem_workorder_id; ?></td>
																	</tr>
																	<tr>
																	<th scope="row">Buyer Name</th>
																	<td><?php echo $buyer_name; ?></td>
																	</tr>
																	<tr>
																	<th scope="row">Buyer Email</th>
																	<td><?php echo $email; ?></td>
																	</tr>
																	<tr>
																	<th scope="row">Pickup Location</th>
																	<td><?php echo $pick_location; ?></td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>

													<div class="col-lg-12 col-xl-6">
														<div class="table-responsive">
															<table class="table">
																<tbody>
																	<tr>
																	<th scope="row">IGCPL Workorder ID</th>
																	<td><?php echo $igcpl_workorder_id; ?></td>
																	</tr>
																	<tr>
																	<th scope="row">Workorder Type</th>
																	<td>
																		<?php 
																		if($workorder_type=='01')
                                                                        {
																			echo "GEM Workorder";
																		}
																		else if($workorder_type=='02')
                                                                        {
																			echo "Non-GEM Workorder";
																		}																				
																		?>
																	</td>
																	</tr>
																	<tr>
																	<th scope="row">Product</th>
																	<td><?php echo $product_category; ?></td>
																	</tr>
																	<tr>
																	<th scope="row">Buyer Contact</th>
																	<td><?php echo $contact; ?></td>
																	</tr>
																	 <tr>
																	<th scope="row">Delevery Location</th>
																	<td><a href="#!"><?php echo $consignee_address; ?></a></td>
																	</tr>
																</tbody>
															</table>
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
					
				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
							
							   <!--  <div class="card-header">
									<h5>Hello Card</h5>
									<span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
									<div class="card-header-right">
										<ul class="list-unstyled card-option">
										<li><i class="feather icon-maximize full-card"></i></li>
										<li><i class="feather icon-minus minimize-card"></i></li>
										<li><i class="feather icon-trash-2 close-card"></i></li>
										</ul>
									</div>
								</div> -->
							
								<div class="card-header">
									<h5>Please select source  buddy and destination buddy !</h5>
									<!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
									<br>
								</div>
								<div class="card-block">
									<div class="row">
									    <div class="col-sm-12 col-xl-6 m-b-30">
										<h4 class="sub-title">Source Buddy *</h4> 
										<select name="source_buddy" required class="form-control form-control-primary">
										<option value="opt1">Select One Value Only</option>
										<option value="opt2">Type 2</option>
										<option value="opt3">Type 3</option>
										<option value="opt4">Type 4</option>
										<option value="opt5">Type 5</option>
										<option value="opt6">Type 6</option>
										<option value="opt7">Type 7</option>
										<option value="opt8">Type 8</option>
										</select>
										</div>
										
										<div class="col-sm-12 col-xl-6 m-b-30">
										<h4 class="sub-title">Destination Buddy</h4>
										<select name="destination_buddy" required class="form-control form-control-info">
										<option value="opt1">Select One Value Only</option>
										<option value="opt2">Type 2</option>
										<option value="opt3">Type 3</option>
										<option value="opt4">Type 4</option>
										<option value="opt5">Type 5</option>
										<option value="opt6">Type 6</option>
										<option value="opt7">Type 7</option>
										<option value="opt8">Type 8</option>
										</select>
										</div>
									</div>

									<div class="row">
									    <div class="col-sm-12 col-xl-6 m-b-30">
										<h4 class="sub-title">G-Laabh Source *</h4> 
										<select name="source_buddy" required class="form-control form-control-primary">
										<option value="opt1">Select One Value Only</option>
										<option value="opt2">Type 2</option>
										<option value="opt3">Type 3</option>
										<option value="opt4">Type 4</option>
										<option value="opt5">Type 5</option>
										<option value="opt6">Type 6</option>
										<option value="opt7">Type 7</option>
										<option value="opt8">Type 8</option>
										</select>
										</div>
										
										<div class="col-sm-12 col-xl-6 m-b-30">
										<h4 class="sub-title">G-Laabh Destination</h4>
										<select name="destination_buddy" required class="form-control form-control-info">
										<option value="opt1">Select One Value Only</option>
										<option value="opt2">Type 2</option>
										<option value="opt3">Type 3</option>
										<option value="opt4">Type 4</option>
										<option value="opt5">Type 5</option>
										<option value="opt6">Type 6</option>
										<option value="opt7">Type 7</option>
										<option value="opt8">Type 8</option>
										</select>
										</div>
									</div>

									<br><br><br><br><br><br><br><br><br>
									<div class="col-lg-12 col-md-12">
										<div class="form-group">										
										<!--<button class="btn btn-primary btn-outline-primary btn-block"><i class="icofont icofont-user-alt-3"></i>Border Button</button>-->
										<button class="btn btn-info btn-round btn-block"><i class="fa fa-user-plus"></i>Assign Buddy </button>
										</div>
									</div>
								    <!--	
									<div class="row">
										<div class="col-sm-12 col-xl-3 m-b-30">
											<h4 class="sub-title">Warning Select</h4>
											<select name="select" class="form-control form-control-warning">
												<option value="opt1">Select One Value Only</option>
												<option value="opt2">Type 2</option>
												<option value="opt3">Type 3</option>
												<option value="opt4">Type 4</option>
												<option value="opt5">Type 5</option>
												<option value="opt6">Type 6</option>
												<option value="opt7">Type 7</option>
												<option value="opt8">Type 8</option>
											</select>
										</div>
										<div class="col-sm-12 col-xl-3 m-b-30">
											<h4 class="sub-title">Danger Select</h4>
											<select name="select" class="form-control form-control-danger">
												<option value="opt1">Select One Value Only</option>
												<option value="opt2">Type 2</option>
												<option value="opt3">Type 3</option>
												<option value="opt4">Type 4</option>
												<option value="opt5">Type 5</option>
												<option value="opt6">Type 6</option>
												<option value="opt7">Type 7</option>
												<option value="opt8">Type 8</option>
											</select>
										</div>
										<div class="col-sm-12 col-xl-3 m-b-30">
											<h4 class="sub-title">Inverse Select</h4>
											<select name="select" class="form-control form-control-inverse">
												<option value="opt1">Select One Value Only</option>
												<option value="opt2">Type 2</option>
												<option value="opt3">Type 3</option>
												<option value="opt4">Type 4</option>
												<option value="opt5">Type 5</option>
												<option value="opt6">Type 6</option>
												<option value="opt7">Type 7</option>
												<option value="opt8">Type 8</option>
											</select>
										</div>
									</div>
								-->	
								</div>								
							</div>
						</div>
					</div>
				<!--	
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
							<div class="card-header">
							<div class="card-header-left">
							<h5>Block Buttons</h5>
							</div>
							</div>
							<div class="card-block">
							<div class="row">
							<div class="col-lg-6 col-md-12">
							<div class="form-group">
							<button class="btn btn-primary btn-block">Default Button</button>
							<button class="btn btn-primary btn-outline-primary btn-block"><i class="icofont icofont-user-alt-3"></i>Border Button</button>
							</div>
							</div>
							<div class="col-lg-6 col-md-12">

							<div class="form-group">
							<button class="btn btn-success btn-square btn-block">Square Button</button>
							<button class="btn btn-info btn-round btn-block">Rounded Button</button>
							</div>
							</div>
							</div>
							</div>
							</div>
						</div>
					</div>
				-->	
				</div>			 
			</div>
		</div>		
		<!--<div id="styleSelector"><div class="selector-toggle"><a href="javascript:void(0)"></a></div><ul><li><p class="selector-title main-title st-main-title"><b>Adminty </b>Customizer</p><span class="text-muted">Live customizer with tons of options</span></li><li><p class="selector-title">Main layouts</p></li><li><div class="theme-color"><a href="#" class="navbar-theme" navbar-theme="themelight1"><span class="head"></span><span class="cont"></span></a><a href="#" class="navbar-theme" navbar-theme="theme1"><span class="head"></span><span class="cont"></span></a></div></li></ul><div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: calc(100vh - 440px);"><div class="style-cont m-t-10" style="overflow: hidden; width: auto; height: calc(100vh - 440px);"><ul class="nav nav-tabs  tabs" role="tablist"><li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#sel-layout" role="tab">Layouts</a></li><li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sel-sidebar-setting" role="tab">Sidebar Settings</a></li></ul><div class="tab-content tabs"><div class="tab-pane active" id="sel-layout" role="tabpanel"><ul><li class="theme-option"><div class="checkbox-fade fade-in-primary"><label><input type="checkbox" value="false" id="sidebar-position" name="sidebar-position" checked=""><span class="cr"><i class="cr-icon feather icon-check txt-success f-w-600"></i></span><span>Fixed Sidebar Position</span></label></div></li><li class="theme-option"><div class="checkbox-fade fade-in-primary"><label><input type="checkbox" value="false" id="header-position" name="header-position" checked=""><span class="cr"><i class="cr-icon feather icon-check txt-success f-w-600"></i></span><span>Fixed Header Position</span></label></div></li></ul></div><div class="tab-pane" id="sel-sidebar-setting" role="tabpanel"><ul><li class="theme-option"><p class="sub-title drp-title">Menu Type</p><div class="form-radio" id="menu-effect"><div class="radio radio-inverse radio-inline" data-toggle="tooltip" title="" data-original-title="simple icon"><label><input type="radio" name="radio" value="st6" onclick="handlemenutype(this.value)" checked="true"><i class="helper"></i><span class="micon st6"><i class="feather icon-command"></i></span></label></div><div class="radio  radio-primary radio-inline" data-toggle="tooltip" title="" data-original-title="color icon"><label><input type="radio" name="radio" value="st5" onclick="handlemenutype(this.value)"><i class="helper"></i><span class="micon st5"><i class="feather icon-command"></i></span></label></div></div></li><li class="theme-option"><p class="sub-title drp-title">SideBar Effect</p><select id="vertical-menu-effect" class="form-control minimal"><option name="vertical-menu-effect" value="shrink">shrink</option><option name="vertical-menu-effect" value="overlay">overlay</option><option name="vertical-menu-effect" value="push">Push</option></select></li><li class="theme-option"><p class="sub-title drp-title">Hide/Show Border</p><select id="vertical-border-style" class="form-control minimal"><option name="vertical-border-style" value="solid">Style 1</option><option name="vertical-border-style" value="dotted">Style 2</option><option name="vertical-border-style" value="dashed">Style 3</option><option name="vertical-border-style" value="none">No Border</option></select></li><li class="theme-option"><p class="sub-title drp-title">Drop-Down Icon</p><select id="vertical-dropdown-icon" class="form-control minimal"><option name="vertical-dropdown-icon" value="style1">Style 1</option><option name="vertical-dropdown-icon" value="style2">style 2</option><option name="vertical-dropdown-icon" value="style3">style 3</option></select></li><li class="theme-option"><p class="sub-title drp-title">Sub Menu Drop-down Icon</p><select id="vertical-subitem-icon" class="form-control minimal"><option name="vertical-subitem-icon" value="style1">Style 1</option><option name="vertical-subitem-icon" value="style2">style 2</option><option name="vertical-subitem-icon" value="style3">style 3</option><option name="vertical-subitem-icon" value="style4">style 4</option><option name="vertical-subitem-icon" value="style5">style 5</option><option name="vertical-subitem-icon" value="style6">style 6</option></select></li></ul></div><ul><li><p class="selector-title">Header Brand color</p></li><li class="theme-option"><div class="theme-color"><a href="#" class="logo-theme" logo-theme="theme1"><span class="head"></span><span class="cont"></span></a><a href="#" class="logo-theme" logo-theme="theme2"><span class="head"></span><span class="cont"></span></a><a href="#" class="logo-theme" logo-theme="theme3"><span class="head"></span><span class="cont"></span></a><a href="#" class="logo-theme" logo-theme="theme4"><span class="head"></span><span class="cont"></span></a><a href="#" class="logo-theme" logo-theme="theme5"><span class="head"></span><span class="cont"></span></a></div></li><li><p class="selector-title">Header color</p></li><li class="theme-option"><div class="theme-color"><a href="#" class="header-theme" header-theme="theme1"><span class="head"></span><span class="cont"></span></a><a href="#" class="header-theme" header-theme="theme2"><span class="head"></span><span class="cont"></span></a><a href="#" class="header-theme" header-theme="theme3"><span class="head"></span><span class="cont"></span></a><a href="#" class="header-theme" header-theme="theme4"><span class="head"></span><span class="cont"></span></a><a href="#" class="header-theme" header-theme="theme5"><span class="head"></span><span class="cont"></span></a><a href="#" class="header-theme" header-theme="theme6"><span class="head"></span><span class="cont"></span></a></div></li><li><p class="selector-title">Active link color</p></li><li class="theme-option"><div class="theme-color"><a href="#" class="active-item-theme small" active-item-theme="theme1">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme2">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme3">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme4">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme5">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme6">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme7">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme8">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme9">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme10">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme11">&nbsp;</a><a href="#" class="active-item-theme small" active-item-theme="theme12">&nbsp;</a></div></li><li><p class="selector-title">Menu Caption Color</p></li><li class="theme-option"><div class="theme-color"><a href="#" class="leftheader-theme small" lheader-theme="theme1">&nbsp;</a><a href="#" class="leftheader-theme small" lheader-theme="theme2">&nbsp;</a><a href="#" class="leftheader-theme small" lheader-theme="theme3">&nbsp;</a><a href="#" class="leftheader-theme small" lheader-theme="theme4">&nbsp;</a><a href="#" class="leftheader-theme small" lheader-theme="theme5">&nbsp;</a><a href="#" class="leftheader-theme small" lheader-theme="theme6">&nbsp;</a></div></li></ul></div></div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 270.453px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div><ul><li><a href="http://html.codedthemes.com/Adminty/doc" target="_blank" class="btn btn-primary btn-block m-r-15 m-t-5 m-b-10">Online Documentation</a></li><li class="text-center"><span class="text-center f-18 m-t-15 m-b-15 d-block">Thank you for sharing !</span><a href="#!" target="_blank" class="btn btn-facebook soc-icon m-b-20"><i class="feather icon-facebook"></i></a><a href="#!" target="_blank" class="btn btn-twitter soc-icon m-l-20 m-b-20"><i class="feather icon-twitter"></i></a></li></ul></div>-->
	</div>
</div>