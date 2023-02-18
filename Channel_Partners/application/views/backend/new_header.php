<?php
    
   $userid = $this->session->userdata('user_login_id');  
	$usertype = $this->session->userdata('user_type');
	$user_image = $this->session->userdata('user_image');
	$user_name = $this->session->userdata('name');
	$email = $this->session->userdata('email');
	
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

<!--<html lang="en">-->
<DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="#">
      <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
      <meta name="author" content="#">
	
	<link rel="icon" href="<?php echo base_url();?>assets/images/logo_new.png" type="image/x-icon">
	
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/bower_components/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/assets/icon/themify-icons/themify-icons.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/assets/icon/icofont/css/icofont.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/assets/icon/feather/css/feather.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/assets/pages/data-table/css/buttons.dataTables.min.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/assets/pages/data-table/extensions/buttons/css/buttons.dataTables.min.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/assets/css/style.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/assets/css/jquery.mCustomScrollbar.css">
	<meta name="robots" content="noindex, nofollow">

	<script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js" nonce="8b135931-f7e3-4677-b913-fa4eba157b8d"></script>
   
   <!-- <script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyQWRtaW50eSUyMC0lMjBQcmVtaXVtJTIwQWRtaW4lMjBUZW1wbGF0ZSUyMGJ5JTIwQ29sb3JsaWIlMjAlMjIlMkMlMjJ4JTIyJTNBMC4yMzAwODk1Mzg1NzM5MjYxJTJDJTIydyUyMiUzQTEzNjYlMkMlMjJoJTIyJTNBNzY4JTJDJTIyaiUyMiUzQTg2NSUyQyUyMmUlMjIlM0ExODIxJTJDJTIybCUyMiUzQSUyMmh0dHBzJTNBJTJGJTJGY29sb3JsaWIuY29tJTJGJTJGcG9seWdvbiUyRmFkbWludHklMkZkZWZhdWx0JTJGZHQtZXh0LWJ1dHRvbnMtaHRtbC01LWRhdGEtZXhwb3J0Lmh0bWwlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZjb2xvcmxpYi5jb20lMkYlMkZwb2x5Z29uJTJGYWRtaW50eSUyRmRlZmF1bHQlMkZkdC1leHQtYmFzaWMtYnV0dG9ucy5odG1sJTIyJTJDJTIyayUyMiUzQTI0JTJDJTIybiUyMiUzQSUyMlVURi04JTIyJTJDJTIybyUyMiUzQS0zMzAlMkMlMjJxJTIyJTNBJTVCJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjIwJTIyJTJDJTIyVSUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyMSUyMiUyQyUyMkElMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjIlMjIlMkMlMjItJTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjIzJTIyJTJDJTIyMiUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyNCUyMiUyQyUyMjMlMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjUlMjIlMkMlMjI1JTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjI2JTIyJTJDJTIyOCUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyNyUyMiUyQyUyMjElMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjglMjIlMkMlMjI1JTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjI5JTIyJTJDJTIyNiUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyMTAlMjIlMkMlMjI4JTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjIxMSUyMiUyQyUyMi0lMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjEyJTIyJTJDJTIyMSUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyMTMlMjIlMkMlMjIzJTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTVEJTdE"></script> -->
   <!--<script nonce="8b135931-f7e3-4677-b913-fa4eba157b8d">(function(w,d){!function(eK,eL,eM,eN){eK.zarazData=eK.zarazData||{};eK.zarazData.executed=[];eK.zaraz={deferred:[],listeners:[]};eK.zaraz.q=[];eK.zaraz._f=function(eO){return function(){var eP=Array.prototype.slice.call(arguments);eK.zaraz.q.push({m:eO,a:eP})}};for(const eQ of["track","set","debug"])eK.zaraz[eQ]=eK.zaraz._f(eQ);eK.zaraz.init=()=>{var eR=eL.getElementsByTagName(eN)[0],eS=eL.createElement(eN),eT=eL.getElementsByTagName("title")[0];eT&&(eK.zarazData.t=eL.getElementsByTagName("title")[0].text);eK.zarazData.x=Math.random();eK.zarazData.w=eK.screen.width;eK.zarazData.h=eK.screen.height;eK.zarazData.j=eK.innerHeight;eK.zarazData.e=eK.innerWidth;eK.zarazData.l=eK.location.href;eK.zarazData.r=eL.referrer;eK.zarazData.k=eK.screen.colorDepth;eK.zarazData.n=eL.characterSet;eK.zarazData.o=(new Date).getTimezoneOffset();if(eK.dataLayer)for(const eX of Object.entries(Object.entries(dataLayer).reduce(((eY,eZ)=>({...eY[1],...eZ[1]})))))zaraz.set(eX[0],eX[1],{scope:"page"});eK.zarazData.q=[];for(;eK.zaraz.q.length;){const e_=eK.zaraz.q.shift();eK.zarazData.q.push(e_)}eS.defer=!0;for(const fa of[localStorage,sessionStorage])Object.keys(fa||{}).filter((fc=>fc.startsWith("_zaraz_"))).forEach((fb=>{try{eK.zarazData["z_"+fb.slice(7)]=JSON.parse(fa.getItem(fb))}catch{eK.zarazData["z_"+fb.slice(7)]=fa.getItem(fb)}}));eS.referrerPolicy="origin";eS.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(eK.zarazData)));eR.parentNode.insertBefore(eS,eR)};["complete","interactive"].includes(eL.readyState)?zaraz.init():eK.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script>
   -->

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/assets/pages/j-pro/css/demo.css">
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/assets/pages/j-pro/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/assets/pages/j-pro/css/j-pro-modern.css">
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/assets/css/jquery.mCustomScrollbar.css">	
		
      <style id="" media="all">/* cyrillic-ext */
         .wizard>.content>.body {
         float: left;
         position: relative!important;
         width: 95%;
         height: 85%;
         padding: 2.5%;
         }
         .wizard>.steps .current a, .wizard>.steps .current a:hover, .wizard>.steps .current a:active {
         background: #fff!important;
         color: #000!important;
         cursor: default!important;
         border-bottom: 2px solid #01a9ac!important;
         }
         .wizard>.steps .disabled a, .wizard>.steps .disabled a:hover, .wizard>.steps .disabled a:active {
         background: #fff!important;
         color: #aaa;
         cursor: default;
         }
         .wizard>.steps .done a, .wizard>.steps .done a:hover, .wizard>.steps .done a:active {
         background: #fff;
         color: #000;
         }
         #myInput {
         background-image: url('');
         background-position: 10px 10px;
         background-repeat: no-repeat;
         width: 100%;
         font-size: 16px;
         padding: 12px 20px 12px 40px;
         border: 1px solid #ddd;
         margin-bottom: 12px;
         }
         #myTable {
         border-collapse: collapse;
         width: 100%;
         border: 1px solid #ddd;
         font-size: 18px;
         }
         #myTable th, #myTable td {
         text-align: left;
         padding: 12px;
         }
         #myTable tr {
         border-bottom: 1px solid #ddd;
         }
         #myTable tr.header, #myTable tr:hover {
         background-color: #f1f1f1;
         }
         .color-red{
         color:red;
         }
         .navbar-container {
         text-align: center;
         background-color: #fff;
         color: #000;
         padding: 10px;
         font-size: 0;
         }
         .navbar {
         margin: 0;
         padding: 0;
         text-align: right;
         vertical-align: middle;
         }
        
         .navbar-container ul li a {
         color: #000;
         text-decoration: none;
         display: inline-block;  
         padding: 10px;
         transition: color 0.5s;
         }
         .navbar-container ul li .underline {
         height: 3px;
         background-color: transparent;
         width: 0%;
         transition: width 0.2s, background-color 0.5s;
         margin: 0 auto;
         }
         .navbar-container ul li.active-link .underline {
         width: 100%;
         background-color: #00acaf;
         }
         .navbar-container ul li:hover .underline {
         background-color: white;
         width: 100%;
         }
         .navbar-container ul li:hover a {
         }
         .navbar-container ul li:active a {
         transition: none;
         color: rgba(0,0,0,0.76);
         }
         .navbar-container ul li:active .underline {
         transition: none;
         background-color: #00acaf;
         }
         .form-heading{
         margin-bottom: 0;
         color: #505458;
         font-size: 14px;
         font-weight: 600;
         display: inline-block;
         margin-right: 10px;
         line-height: 1.4;
         }
       /* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');*/
         h1,h2,h3,h4,h5,h6,p,li,a tr th td span{
         font-family: 'Poppins', sans-serif;
         color:#67757c;
         font-size:15px;
         }
		 
		  .pcoded-main-container{
      margin-top: -63.9844px;
   }
   .header-navbar .navbar-wrapper .navbar-logo {
    position: relative;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    float: left;
    height: 64px;
    text-align: center;
    text-transform: uppercase;
    width: 240px;
    padding: 10px;
}
      </style>
   </head>
   
   <body>
      <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
      
      <!-- <div id="pcoded" class="pcoded"> -->
      <div class="pcoded-overlay-box"></div>
      <!-- <div class="pcoded-container navbar-wrapper"> -->
      <nav class="navbar header-navbar pcoded-header">
         <div class="navbar-wrapper">
            <div class="navbar-logo">
               <a class="mobile-menu" id="mobile-collapse" href="#!">
               <i class="feather icon-menu"></i>
               </a>
               <a href="index.html">
               <img class="img-fluid" src="<?php echo base_url();?>assets/images/INDIGEM1.png" alt="Theme-Logo" / style="height:62px;">
               </a>
               <a class="mobile-options">
               <i class="feather icon-more-horizontal"></i>
               </a>
            </div>
            <div class="navbar-container container-fluid">
               <ul class="nav-left">
                  <li class="header-search">
                     <div class="main-search morphsearch-search">
                        <div class="input-group">
                           <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                           <input type="text" class="form-control">
                           <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                        </div>
                     </div>
                  </li>
                  <li>
                     <a href="#!" onclick="javascript:toggleFullScreen()">
                     <i class="feather icon-maximize full-screen"></i>
                     </a>
                  </li>
               </ul>
               <ul class="nav-right">						      				   
                    <li class="header-notification">
						<div class="dropdown-primary dropdown">
						
							<div class="dropdown-toggle" data-toggle="dropdown">						
							    <i class="feather icon-check-circle"></i>							   
							    <!--<span class="badge bg-c-green">5</span>-->
							</div>
							<ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
								<li>
									<h6>User Details</h6>
									<label class="label label-success">Live</label>
								</li>
								<li>
									<div class="media">
										<img class="rounded-circle" class="d-flex align-self-center img-radius"  src="<?php echo base_url(); ?><?php echo $this->session->userdata('user_image') ?>" alt="seller Profile">
										<div class="media-body">
											<h5 class="notification-user"><?php echo $this->session->userdata('name'); ;?> </h5>
											<p class="notification-msg"><?php echo $user_type;?></p>											
											<span class="notification-time"><?php echo $email;?></span>
										</div>
									</div>
								</li>
							</ul>
						</div>
                    </li>
                    <!--   
                     <li class="header-notification">
                        <div class="dropdown-primary dropdown">
                           <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                              <i class="feather icon-message-square"></i>
                              <span class="badge bg-c-green">3</span>
                           </div>
                        </div>
                     </li>
                    -->   
                  <li class="user-profile header-notification">
                     <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                           <img class="rounded-circle" src="<?php echo base_url(); ?><?php echo $this->session->userdata('user_image') ?>" class="img-radius" alt="User-Profile-Image">
                           <span><?php echo $this->session->userdata('name') ;?><!--(<?php //echo $user_type ;?>)--></span>
                           <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">                          
                            <li>
                                <a href="<?php echo base_url();?>Employee/Employee_Details/<?php echo $userid;?>/<?php echo $usertype;?>">
                                   <i class="ti-user"></i>My Profile
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="ti-settings"></i> Account Setting
                                </a>
                            </li>                            
                            <li>
                                <a href="<?php echo base_url();?>Login/change_password">
                                    <i class="feather icon-lock"></i> Change Password
                                </a>
                            </li>  
                            <li>
                                <a href="#" onclick='return submitForm()' id="logout_btn">
                                    <i class="feather icon-log-out"></i> Logout
                                </a>
                            </li>
                        </ul>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </nav>

      
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

   function submitForm()
	{
		alert("asa");
      //document.getElementById('sub_btn').disabled = true;  <?php echo base_url();?>Login/logout
		//$("#sub_btn").html('<i class="fa fa-spinner fa-spin"></i>Submitting...');
	   //document.getElementById('sub_btn').disabled = true;		
		//var frm = $('#employee_registration_form');		
		//var user_type = document.getElementById('user_type').value;
      //var designation = document.getElementById('designation').value;        		
		//var emp_name = document.getElementById('emp_name').value;

      const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
               confirmButton: 'btn btn-success',
               cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You want  to Logout!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Logout!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
               swalWithBootstrapButtons.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
               )
            } 
            /* Read more about handling dismissals below */
            else if ( result.dismiss === Swal.DismissReason.cancel)                         
            {
               swalWithBootstrapButtons.fire(
                  'Cancelled',
                  'Your imaginary file is safe :)',
                  'error'
               )
            }
            })


		   /*	
			document.getElementById("employee_registration_form").submit();
			
			$("#sub_btn").html('<i class="fa fa-spinner fa-spin"></i>Submitting...');
	        document.getElementById('sub_btn').disabled = true;
			
				$.ajax({
					type: frm.attr('method'),
					url:  frm.attr('action'),				
					data: frm.serialize(),
					success: function (data) {
						//alert('Submission was successful.');
						console.log(data);
					},
					error: function (data) {
						alert('An error occurred.');
						console.log('An error occurred.');
						console.log(data);
					},
				});
			*/	
		}
		
    
		
</script>