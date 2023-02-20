<?php
   if($this->session->userdata('user_login_access') != 1)
   {
      return redirect('Login'); 
   }
   $labhid = $this->session->userdata('user_login_id');
   ?>
 <html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="#">
      <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
      <meta name="author" content="#">
      <link rel="icon" href="" type="image/x-icon">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style id="" media="all">/* cyrillic-ext */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 400;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSKmu1aB.woff2) format('woff2');
         unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
         }
         /* cyrillic */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 400;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSumu1aB.woff2) format('woff2');
         unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
         }
         /* greek-ext */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 400;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSOmu1aB.woff2) format('woff2');
         unicode-range: U+1F00-1FFF;
         }
         /* greek */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 400;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSymu1aB.woff2) format('woff2');
         unicode-range: U+0370-03FF;
         }
         /* hebrew */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 400;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS2mu1aB.woff2) format('woff2');
         unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F;
         }
         /* vietnamese */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 400;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSCmu1aB.woff2) format('woff2');
         unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
         }
         /* latin-ext */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 400;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSGmu1aB.woff2) format('woff2');
         unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
         }
         /* latin */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 400;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS-muw.woff2) format('woff2');
         unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
         }
         /* cyrillic-ext */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 600;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSKmu1aB.woff2) format('woff2');
         unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
         }
         /* cyrillic */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 600;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSumu1aB.woff2) format('woff2');
         unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
         }
         /* greek-ext */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 600;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSOmu1aB.woff2) format('woff2');
         unicode-range: U+1F00-1FFF;
         }
         /* greek */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 600;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSymu1aB.woff2) format('woff2');
         unicode-range: U+0370-03FF;
         }
         /* hebrew */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 600;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS2mu1aB.woff2) format('woff2');
         unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F;
         }
         /* vietnamese */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 600;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSCmu1aB.woff2) format('woff2');
         unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
         }
         /* latin-ext */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 600;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSGmu1aB.woff2) format('woff2');
         unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
         }
         /* latin */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 600;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS-muw.woff2) format('woff2');
         unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
         }
         /* cyrillic-ext */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 800;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSKmu1aB.woff2) format('woff2');
         unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
         }
         /* cyrillic */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 800;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSumu1aB.woff2) format('woff2');
         unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
         }
         /* greek-ext */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 800;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSOmu1aB.woff2) format('woff2');
         unicode-range: U+1F00-1FFF;
         }
         /* greek */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 800;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSymu1aB.woff2) format('woff2');
         unicode-range: U+0370-03FF;
         }
         /* hebrew */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 800;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS2mu1aB.woff2) format('woff2');
         unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F;
         }
         /* vietnamese */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 800;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSCmu1aB.woff2) format('woff2');
         unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
         }
         /* latin-ext */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 800;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTSGmu1aB.woff2) format('woff2');
         unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
         }
         /* latin */
         @font-face {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 800;
         font-stretch: 100%;
         font-display: swap;
         src: url(/fonts.gstatic.com/s/opensans/v34/memvYaGs126MiZpBA-UvWbX2vVnXBbObj2OVTS-muw.woff2) format('woff2');
         unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
         }
      </style>
      <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/icon/themify-icons/themify-icons.css">
      <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/icon/icofont/css/icofont.css">
      <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/icon/feather/css/feather.css">
      <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/jquery.steps/css/jquery.steps.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style_new.css">
      <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/css/jquery.mCustomScrollbar.css">
      <meta name="robots" content="noindex, nofollow">
      <script nonce="a751bdfc-52af-47b4-aace-8162f1982d9c">(function(w,d){!function(cM,cN,cO,cP){cM.zarazData=cM.zarazData||{};cM.zarazData.executed=[];cM.zaraz={deferred:[],listeners:[]};cM.zaraz.q=[];cM.zaraz._f=function(cQ){return function(){var cR=Array.prototype.slice.call(arguments);cM.zaraz.q.push({m:cQ,a:cR})}};for(const cS of["track","set","debug"])cM.zaraz[cS]=cM.zaraz._f(cS);cM.zaraz.init=()=>{var cT=cN.getElementsByTagName(cP)[0],cU=cN.createElement(cP),cV=cN.getElementsByTagName("title")[0];cV&&(cM.zarazData.t=cN.getElementsByTagName("title")[0].text);cM.zarazData.x=Math.random();cM.zarazData.w=cM.screen.width;cM.zarazData.h=cM.screen.height;cM.zarazData.j=cM.innerHeight;cM.zarazData.e=cM.innerWidth;cM.zarazData.l=cM.location.href;cM.zarazData.r=cN.referrer;cM.zarazData.k=cM.screen.colorDepth;cM.zarazData.n=cN.characterSet;cM.zarazData.o=(new Date).getTimezoneOffset();if(cM.dataLayer)for(const cZ of Object.entries(Object.entries(dataLayer).reduce(((c_,da)=>({...c_[1],...da[1]})))))zaraz.set(cZ[0],cZ[1],{scope:"page"});cM.zarazData.q=[];for(;cM.zaraz.q.length;){const db=cM.zaraz.q.shift();cM.zarazData.q.push(db)}cU.defer=!0;for(const dc of[localStorage,sessionStorage])Object.keys(dc||{}).filter((de=>de.startsWith("_zaraz_"))).forEach((dd=>{try{cM.zarazData["z_"+dd.slice(7)]=JSON.parse(dc.getItem(dd))}catch{cM.zarazData["z_"+dd.slice(7)]=dc.getItem(dd)}}));cU.referrerPolicy="origin";cU.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(cM.zarazData)));cT.parentNode.insertBefore(cU,cT)};["complete","interactive"].includes(cN.readyState)?zaraz.init():cM.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script>
      <style>
         .wizard>.content>.body {
         float: left;
         position: relative!important;
         width: 95%;
         height: 95%;
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
      </style>
   </head>
   <body>
      <div id="pcoded" class="pcoded">
         <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">
            <?php $this->load->view('backend/new_header'); ?>
            <div id="sidebar" class="users p-chat-user showChat">
               <div class="had-container">
                  <div class="card card_main p-fixed users-main">
                     <div class="user-box">
                        <div class="chat-inner-header">
                           <div class="back_chatBox">
                              <div class="right-icon-control">
                                 <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                 <div class="form-icon">
                                    <i class="icofont icofont-search"></i>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="main-friend-list">
                           <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                              <a class="media-left" href="#!">
                                 <img class="media-object img-radius img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-3.jpg" alt="Generic placeholder image ">
                                 <div class="live-status bg-success"></div>
                              </a>
                              <div class="media-body">
                                 <div class="f-13 chat-header">Josephin Doe</div>
                              </div>
                           </div>
                           <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">
                              <a class="media-left" href="#!">
                                 <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                 <div class="live-status bg-success"></div>
                              </a>
                              <div class="media-body">
                                 <div class="f-13 chat-header">Lary Doe</div>
                              </div>
                           </div>
                           <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                              <a class="media-left" href="#!">
                                 <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                 <div class="live-status bg-success"></div>
                              </a>
                              <div class="media-body">
                                 <div class="f-13 chat-header">Alice</div>
                              </div>
                           </div>
                           <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
                              <a class="media-left" href="#!">
                                 <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                 <div class="live-status bg-success"></div>
                              </a>
                              <div class="media-body">
                                 <div class="f-13 chat-header">Alia</div>
                              </div>
                           </div>
                           <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">
                              <a class="media-left" href="#!">
                                 <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                 <div class="live-status bg-success"></div>
                              </a>
                              <div class="media-body">
                                 <div class="f-13 chat-header">Suzen</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="showChat_inner">
               <div class="media chat-inner-header">
                  <a class="back_chatBox">
                  <i class="feather icon-chevron-left"></i> Josephin Doe
                  </a>
               </div>
               <div class="media chat-messages">
                  <a class="media-left photo-table" href="#!">
                  <img class="media-object img-radius img-radius m-t-5" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                  </a>
                  <div class="media-body chat-menu-content">
                     <div class="">
                        <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                        <p class="chat-time">8:20 a.m.</p>
                     </div>
                  </div>
               </div>
               <div class="media chat-messages">
                  <div class="media-body chat-menu-reply">
                     <div class="">
                        <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                        <p class="chat-time">8:20 a.m.</p>
                     </div>
                  </div>
                  <div class="media-right photo-table">
                     <a href="#!">
                     <img class="media-object img-radius img-radius m-t-5" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                     </a>
                  </div>
               </div>
               <div class="chat-reply-box p-b-20">
                  <div class="right-icon-control">
                     <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                     <div class="form-icon">
                        <i class="feather icon-navigation"></i>
                     </div>
                  </div>
               </div>
            </div>
            <div class="pcoded-main-container">
               <div class="pcoded-wrapper">
                  <nav class="pcoded-navbar" style="color:#31445e;">
                     <div class="pcoded-inner-navbar main-menu">
                        <div class="pcoded-navigatio-lavel">Navigation</div>
                        <ul class="pcoded-item pcoded-left-item">
                           <li class="pcoded-hasmenu">
                              <a href="javascript:void(0)">
                              <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                              <span class="pcoded-mtext">Dashboard</span>
                              </a>
                           </li>
                        </ul>
                        <div class="pcoded-navigatio-lavel">Work Order</div>
                        <ul class="pcoded-item pcoded-left-item">
                           <li class="pcoded-hasmenu">
                              <a href="javascript:void(0)">
                              <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                              <span class="pcoded-mtext">New Work Order</span>
                              </a>
                              <ul class="pcoded-submenu">
                                 <li class="">
                                    <a href="<?php echo base_url();?>Seller_module/New_workorder">
                                    <span class="pcoded-mtext">Gem Work Order</span>
                                    </a>
                                 </li>
                                 <li class="">
                                    <a href="">
                                    <span class="pcoded-mtext">Non-Gem Work Order</span>
                                    </a>
                                 </li>
                                 <li class=" ">
                                    <a href="">
                                    <span class="pcoded-mtext">Tracking Order</span>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                  </nav>
                  <div class="pcoded-content">
                     <div class="pcoded-inner-content">
                        <div class="main-body">
                           <div class="page-wrapper">
                              <div class="page-header">
                                 <div class="row align-items-end">
                                    <div class="col-lg-8">
                                       <div class="page-header-title">
                                          <div class="d-inline">
                                             <h4>Work Order</h4>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-4">
                                       <div class="page-header-breadcrumb">
                                          <ul class="breadcrumb-title">
                                             <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="feather icon-home"></i> </a>
                                             </li>
                                             <li class="breadcrumb-item"><a href="#!">New Work Order</a></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="page-body">
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="card">
                                          <div class="card-header">
                                             <h5>Add New Work Order</h5>
                                          </div>
                                          <div class="card-block">
                                             <div class="row">
                                                <div class="col-md-12">
                                                   <div id="wizard">
                                                      <section>
                                                         <form class="wizard-form" id="example-advanced-form" action="#">
                                                            <h3 class="nav-link text-dark active">Buyer Details </h3>
                                                            <div class="slide"></div>
                                                            <fieldset>
                                                               <div class="form-group row">
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                           <label for="userName-2" class="block">seller Id *</label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                                                           <input id="userName-2" name="sellerid" type="text" class=" form-control" value="<?php echo $this->session->userdata('seller_id') ;?>">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                           <label for="userName-2" class="block">Name *</label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                                                           <input id="userName-2" name="userName" type="text" class=" form-control">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                           <label for="userName-2" class="block">Gender *</label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                                                           <select class="form-control">
                                                                              <option value="">Select Gender</option>
                                                                              <option value="Male">Male</option>
                                                                              <option value="Female">Female</option>
                                                                              <option value="Other">Other</option>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                           <label for="userName-2" class="block">Email *</label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                                                           <input id="email-2" name="email" type="email" class=" form-control">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                           <label for="userName-2" class="block">Mobile Number *</label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                                                           <input id="userName-2" name="contact" type="number" class=" form-control">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                           <label for="password-2" class="block">Alternate Number </label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                                                           <input id="alt-contact" name="alt-contact" type="number" class="form-control">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <!-- <div class="form-group row">
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                            <label for="confirm-2" class="block">Date Of Birth *</label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                                                            <input id="" name="dob" type="date" class="form-control ">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                           <label for="confirm-2" class="block">Aadhar No. *</label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                                                            <input id="" name="aadhar" type="number" class="form-control ">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  </div> -->
                                                               <div class="form-group row">
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                           <label for="confirm-2" class="block">State *</label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                             <select class="form-control" name="statename">
                                             <option value="">-- Select State --</option>
                                             <?php 
                                                foreach($state_list as $c)
                                                {  ?>
   <option value="<?= $c->state_id; ?>"   ><?= $c->statename; ?></option>
                                             <?php  
                                                }  
                                                ?>

                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                           <label for="confirm-2" class="block">District *</label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                                                           <select class="form-control ">
                                                                              <option value="">Select District</option>
                                                                              <?php foreach($district_list as $c)
                                                                                {  ?> 
   <option value="<?= $c->Districtcode; ?>" ><?= $c->Districtname; ?></option>
   <?php   }  ?>
                                                                           </select>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                           <label for="confirm-2" class="block">City *</label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                                                           <input id="" name="city" type="text" class="form-control ">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                           <label for="confirm-2" class="block">PinCode *</label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                                                           <input id="" name="PinCode" type="number" class="form-control ">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                  <div class="col-md-12">
                                                                     <div class="row">
                                                                        <div class="col-md-2 col-lg-2">
                                                                           <label for="confirm-2" class="block">Full Address *</label>
                                                                        </div>
                                                                        <div class="col-md-10 col-lg-10">
                                                                           <input id="" name="address" type="text" class="form-control ">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <!-- <div class="form-group row">
                                                                  <div class="col-md-12">
                                                                     <div class="row">
                                                                        <div class="col-md-2 col-lg-2">
                                                                            <label for="confirm-2" class="block">Comapny Name</label>
                                                                        </div>
                                                                        <div class="col-md-10 col-lg-10">
                                                                           <input id="" name="company_name" type="text" class="form-control">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  </div> -->
                                                               <div class="form-group row">
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                           <label for="confirm-2" class="block">Comapny Name</label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                                                           <input id="" name="company_name" type="text" class="form-control">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                           <label for="confirm-2" class="block">PAN Number </label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                                                           <input id="" name="panNo" type="number" class="form-control ">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                           <label for="confirm-2" class="block">GSTIN </label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                                                           <input id="" name="gstin" type="text" class="form-control">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                     <div class="row">
                                                                        <div class="col-md-4 col-lg-4">
                                                                           <label for="confirm-2" class="block">TAN Number </label>
                                                                        </div>
                                                                        <div class="col-md-8 col-lg-8">
                                                                           <input id="" name="tanNo" type="number" class="form-control ">
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                  <div class="col-md-4 col-lg-2">
                                                                     <label for="confirm-2" class="block">Upload Gem Work Order pdf or zip Format *</label>
                                                                  </div>
                                                                  <div class="col-md-8 col-lg-10">
                                                                     <input id="" name="doc" type="file" accept=".pdf, .zip" class="form-control " placeholder="pdf or zip file upload">
                                                                  </div>
                                                               </div>
                                                            </fieldset>
                                                            <h3> Logistics </h3>
                                                            <fieldset>
                                                               <div class="form-group row">
                                                                  <div class="col-md-4 col-lg-2">
                                                                     <label for="name-2" class="block">First name *</label>
                                                                  </div>
                                                                  <div class="col-md-8 col-lg-10">
                                                                     <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                                                                  </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                  <div class="col-md-12 col-lg-12">
                                                                     <table id="myTable">
                                                                        <tr class="header">
                                                                           <th style="width:60%;">Name</th>
                                                                           <th style="width:40%;">Country</th>
                                                                        </tr>
                                                                        <tr>
                                                                           <td>Alfreds Futterkiste</td>
                                                                           <td>Germany</td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td>Berglunds snabbkop</td>
                                                                           <td>Sweden</td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td>Island Trading</td>
                                                                           <td>UK</td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td>Koniglich Essen</td>
                                                                           <td>Germany</td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td>Laughing Bacchus Winecellars</td>
                                                                           <td>Canada</td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td>Magazzini Alimentari Riuniti</td>
                                                                           <td>Italy</td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td>North/South</td>
                                                                           <td>UK</td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td>Paris specialites</td>
                                                                           <td>France</td>
                                                                        </tr>
                                                                     </table>
                                                                  </div>
                                                               </div>
                                                            </fieldset>
                                                            <h3> Payment </h3>
                                                            <fieldset>
                                                               <div class="form-group row">
                                                                  <div class="col-md-4 col-lg-2">
                                                                     <label for="University-2" class="block">University</label>
                                                                  </div>
                                                                  <div class="col-md-8 col-lg-10">
                                                                     <input id="University-2" name="University" type="text" class="form-control ">
                                                                  </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                  <div class="col-md-4 col-lg-2">
                                                                     <label for="Country-2" class="block">Country</label>
                                                                  </div>
                                                                  <div class="col-md-8 col-lg-10">
                                                                     <input id="Country-2" name="Country" type="text" class="form-control ">
                                                                  </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                  <div class="col-md-4 col-lg-2">
                                                                     <label for="Degreelevel-2" class="block">Degree level #</label>
                                                                  </div>
                                                                  <div class="col-md-8 col-lg-10">
                                                                     <input id="Degreelevel-2" name="Degree level" type="text" class="form-control  phone">
                                                                  </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                  <div class="col-md-4 col-lg-2">
                                                                     <label for="datejoin" class="block">Date Join</label>
                                                                  </div>
                                                                  <div class="col-md-8 col-lg-10">
                                                                     <input id="datejoin" name="Date Of Birth" type="text" class="form-control ">
                                                                  </div>
                                                               </div>
                                                            </fieldset>
                                                            <h3> Preview </h3>
                                                            <fieldset>
                                                               <div class="form-group row">
                                                                  <div class="col-md-4 col-lg-2">
                                                                     <label for="Company-2" class="block">Company:</label>
                                                                  </div>
                                                                  <div class="col-md-8 col-lg-10">
                                                                     <input id="Company-2" name="Company:" type="text" class="form-control ">
                                                                  </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                  <div class="col-md-4 col-lg-2">
                                                                     <label for="CountryW-2" class="block">Country</label>
                                                                  </div>
                                                                  <div class="col-md-8 col-lg-10">
                                                                     <input id="CountryW-2" name="Country" type="text" class="form-control ">
                                                                  </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                  <div class="col-md-4 col-lg-2">
                                                                     <label for="Position-2" class="block">Position</label>
                                                                  </div>
                                                                  <div class="col-md-8 col-lg-10">
                                                                     <input id="Position-2" name="Position" type="text" class="form-control ">
                                                                  </div>
                                                               </div>
                                                            </fieldset>
                                                         </form>
                                                      </section>
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
      </div>
      <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery/js/jquery.min.js"></script>
      <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
      <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/popper.js/js/popper.min.js"></script>
      <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
      <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/modernizr/js/modernizr.js"></script>
      <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/modernizr/js/css-scrollbars.js"></script>
      <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next/js/i18next.min.js"></script>
      <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
      <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
      <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
      <script src="https://colorlib.com//polygon/adminty/files/bower_components/jquery.cookie/js/jquery.cookie.js"></script>
      <script src="https://colorlib.com//polygon/adminty/files/bower_components/jquery.steps/js/jquery.steps.js"></script>
      <script src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-validation/js/jquery.validate.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
      <script type="text/javascript" src="../files/assets/pages/form-validation/validate.js"></script>
      <script src="https://colorlib.com//polygon/adminty/files/assets/pages/forms-wizard-validation/form-wizard.js"></script>
      <script src="https://colorlib.com//polygon/adminty/files/assets/js/pcoded.min.js"></script>
      <script src="https://colorlib.com//polygon/adminty/files/assets/js/vartical-layout.min.js"></script>
      <script src="https://colorlib.com//polygon/adminty/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script type="text/javascript" src="https://colorlib.com//polygon/adminty//files/assets/js/script.js"></script>
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
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
      <script>
      $(document).ready(function(){
      
              $('#stateid').change(function()
      {        
                    
                  var state_id = document.getElementById('stateid').value;                   
                      //alert("Selected value is : " + class_id);
                      if (state_id !='') 
         {
      
                          $.ajax({     
                              url: "<?php  echo base_url(); ?>SellerRegister/get_district_by_state",                            
                method:"POST",
                data:{state_id:state_id},
                              success: function(data) 
                { 
                   //alert("hii:" + data);
                                  $('#district').html(data);
                              }
                         
                          })
      
                      }
      
                                       
              });
      
      
     /* $('#stateid_second').change(function()
      {        
                    
                  var state_id = document.getElementById('stateid_second').value;                   
                      //alert("Selected value is : " + class_id);
                      if (state_id !='') 
         {
      
                          $.ajax({     
                              url: "<?php  echo base_url(); ?>SellerRegister/get_district_by_state",                            
                method:"POST",
                data:{state_id:state_id},
                              success: function(data) 
                { 
                   //alert("hii:" + data);
                                  $('#district_second').html(data);
                              }
                         
                          })
      
                      }
      
                                       
              });
      
       });*/
      
      
        $('.get_state_id').on('change', function() 
        {
           var eid = this.value;
              //alert(eid);          
              var url="<?php echo site_url('SellerRegister/get_state_region'); ?>";
                 $.ajax({
           
                        url:url,
                        method:"POST",
                        data:{eid:eid},
                        dataType:"json",
                        success:function(data)
                        {   
                           // alert(data);               
                            $("#conutryprice").val(data);                        
                        }
                    });         
        });                      
             
   </script>
      <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7729a56a58cd6efa","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>
   </body>
</html>