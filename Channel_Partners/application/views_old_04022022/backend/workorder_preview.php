<?php
   $sellerid = $this->session->userdata('seller_login_id'); 
    
    ?>
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
   <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js" nonce="8b135931-f7e3-4677-b913-fa4eba157b8d"></script><script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyQWRtaW50eSUyMC0lMjBQcmVtaXVtJTIwQWRtaW4lMjBUZW1wbGF0ZSUyMGJ5JTIwQ29sb3JsaWIlMjAlMjIlMkMlMjJ4JTIyJTNBMC4yMzAwODk1Mzg1NzM5MjYxJTJDJTIydyUyMiUzQTEzNjYlMkMlMjJoJTIyJTNBNzY4JTJDJTIyaiUyMiUzQTg2NSUyQyUyMmUlMjIlM0ExODIxJTJDJTIybCUyMiUzQSUyMmh0dHBzJTNBJTJGJTJGY29sb3JsaWIuY29tJTJGJTJGcG9seWdvbiUyRmFkbWludHklMkZkZWZhdWx0JTJGZHQtZXh0LWJ1dHRvbnMtaHRtbC01LWRhdGEtZXhwb3J0Lmh0bWwlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZjb2xvcmxpYi5jb20lMkYlMkZwb2x5Z29uJTJGYWRtaW50eSUyRmRlZmF1bHQlMkZkdC1leHQtYmFzaWMtYnV0dG9ucy5odG1sJTIyJTJDJTIyayUyMiUzQTI0JTJDJTIybiUyMiUzQSUyMlVURi04JTIyJTJDJTIybyUyMiUzQS0zMzAlMkMlMjJxJTIyJTNBJTVCJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjIwJTIyJTJDJTIyVSUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyMSUyMiUyQyUyMkElMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjIlMjIlMkMlMjItJTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjIzJTIyJTJDJTIyMiUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyNCUyMiUyQyUyMjMlMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjUlMjIlMkMlMjI1JTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjI2JTIyJTJDJTIyOCUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyNyUyMiUyQyUyMjElMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjglMjIlMkMlMjI1JTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjI5JTIyJTJDJTIyNiUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyMTAlMjIlMkMlMjI4JTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjIxMSUyMiUyQyUyMi0lMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjEyJTIyJTJDJTIyMSUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyMTMlMjIlMkMlMjIzJTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTVEJTdE"></script><script nonce="8b135931-f7e3-4677-b913-fa4eba157b8d">(function(w,d){!function(eK,eL,eM,eN){eK.zarazData=eK.zarazData||{};eK.zarazData.executed=[];eK.zaraz={deferred:[],listeners:[]};eK.zaraz.q=[];eK.zaraz._f=function(eO){return function(){var eP=Array.prototype.slice.call(arguments);eK.zaraz.q.push({m:eO,a:eP})}};for(const eQ of["track","set","debug"])eK.zaraz[eQ]=eK.zaraz._f(eQ);eK.zaraz.init=()=>{var eR=eL.getElementsByTagName(eN)[0],eS=eL.createElement(eN),eT=eL.getElementsByTagName("title")[0];eT&&(eK.zarazData.t=eL.getElementsByTagName("title")[0].text);eK.zarazData.x=Math.random();eK.zarazData.w=eK.screen.width;eK.zarazData.h=eK.screen.height;eK.zarazData.j=eK.innerHeight;eK.zarazData.e=eK.innerWidth;eK.zarazData.l=eK.location.href;eK.zarazData.r=eL.referrer;eK.zarazData.k=eK.screen.colorDepth;eK.zarazData.n=eL.characterSet;eK.zarazData.o=(new Date).getTimezoneOffset();if(eK.dataLayer)for(const eX of Object.entries(Object.entries(dataLayer).reduce(((eY,eZ)=>({...eY[1],...eZ[1]})))))zaraz.set(eX[0],eX[1],{scope:"page"});eK.zarazData.q=[];for(;eK.zaraz.q.length;){const e_=eK.zaraz.q.shift();eK.zarazData.q.push(e_)}eS.defer=!0;for(const fa of[localStorage,sessionStorage])Object.keys(fa||{}).filter((fc=>fc.startsWith("_zaraz_"))).forEach((fb=>{try{eK.zarazData["z_"+fb.slice(7)]=JSON.parse(fa.getItem(fb))}catch{eK.zarazData["z_"+fb.slice(7)]=fa.getItem(fb)}}));eS.referrerPolicy="origin";eS.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(eK.zarazData)));eR.parentNode.insertBefore(eS,eR)};["complete","interactive"].includes(eL.readyState)?zaraz.init():eK.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/assets/pages/j-pro/css/demo.css">
   <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/assets/pages/j-pro/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/assets/pages/j-pro/css/j-pro-modern.css">
   <link rel="stylesheet" type="text/css" href="https://colorlib.com/polygon/adminty/files/assets/css/jquery.mCustomScrollbar.css"> 
<style>
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
   h1,h2,h3,h4,h5,h6,p,li,a tr th td span{
   font-family: 'Poppins', sans-serif;
   color:#67757c;
   /*font-size:25px;*/
   }
   .mou-img{
   width:100px;
   }
   .logo-mou{
   width:110px;
   float: right;
   margin-top: -95px;
   }
   .company_name{
   font-size:24px;
   color: #00054c;
   text-align: center;
   margin-left:-10%;
   font-weight: 700;
   } 
   .doc{
   width: 90%;
   }
   .logo{
   margin-left:30%;
   }
   .logo-img{
   height:80px;
   float: left;
   margin-top:20px;
   }
   .sellerinfo h4{
   font-size:20px;
   }
   .table-sec{
   margin-left:-30px;
   }
   table{
   margin-bottom: 0rem;
   }
   .profile-img{
   margin-left: 30px !important;
   height: 127px; 
   }
   .profile{
   height: 120px;
   border: 1px solid;
   padding: 5px;
   margin-bottom:10px!important;
   box-shadow: 2px 2px 2px 2px #ccccccad;}
   .view{
   margin-left: 16%!important;
   border: 3px solid #ddd;
   }
   .sellerinfo {
   background-color: #5c5c5c;
   margin: 20px 0px;
   }
   .preview-input{
      width: 24.7%;
   }
</style>
<br>
<div class="view card card-body" id="toprint">
   <div class="print-area" onclick="window.print()">
      <div class="row " >
         <div class="col-md-3">
            <img src="<?php echo base_url()?>/assets/images/mou.png" class="mou-img ml-3" >
         </div>
         <div class="col-md-6 col-sm-6 mou-heading" >
            <h2 class="mt-4 ml-5 text-center">
               <span class="company_name mt-5">Indigem Channel partners Private Limited</span>
            </h2>
         </div>
         <div class="col-md-3">
            <img src="<?php echo base_url()?>/assets/images/logo-icon-preview.png" class="logo-mou mt-1 mx-3">
         </div>
         <div class="col-md-12">
            <div class="bg-secondary">
               <h5 class="text-center text-white py-3 my-1">Acknowledgement For Indigem Channel partners Private Limited, 2022-2023</h5>
            </div>
         </div>
      </div>
      <div>
         <?php foreach($workorder as $value): ?>    
            <div class="row">
               <div class="col-md-6">
                  <div class="my-2">
                     <h4 class=" text-center">
                        <b>Seller ID :</b> 
                        <span><?php echo $value->sellerid ?></span>
                     </h4>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="my-2">
                     <h4 class="text-center"><b>Work Order ID :</b> <span> <?php echo $value->igcpl_workorder_id ?></span></h4>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="sellerinfo">
                     <h3 class="text-white py-2 pl-3 mb-3" style="color: #000;">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>&nbsp;&nbsp; Product Details
                     </h3>
                  </div>
               </div>
               <div class="col-md-2">
                  <input type="text" class=" my-1" readonly value="Product Pickup Loaction">
               </div>
               <div class="col-md-10">
                  <textarea type="text" name="" class=" w-100 my-1" readonly value=""><?php echo $value->pick_location ?>, <?php echo $value->seller_city ?>, <?php echo $value->seller_district ?>
                  </textarea>
               </div>
              
               <div class="col-md-12">
                  <input class="preview-input my-1" readonly type="" name="" value="District">
                  <input class="preview-input my-1" readonly type="" name="" value="<?php echo $value->seller_district; ?>">
                  <input class="preview-input my-1" readonly type="" name="" value="Pincode">
                  <input class="preview-input my-1" readonly type="" name="" value="<?php echo $value->seller_pincode; ?>">
               </div>

                <div class="col-md-2">
                  <input type="text" class=" my-1" readonly value="Product ">
               </div>
               <div class="col-md-10">
                  <textarea type="text" class=" w-100 my-1" readonly value=""><?php echo $value->select_product ?>
                  </textarea>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="sellerinfo">
                     <h3 class="text-white py-2 pl-3 mb-3" style="color: #000;">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;&nbsp; Buyer Details
                     </h3>
                  </div>
               </div>
               <div class="col-md-12">
                  <input class="preview-input my-1" readonly type="" name="" value="Buyer Name">
                  <input class="preview-input my-1" readonly type="" name="" value="<?php echo $value->buyer_name; ?>">
                  <input class="preview-input my-1" readonly type="" name="" value="Email">
                  <input class="preview-input my-1" readonly type="" name="" value="<?php echo $value->email ?>">
                  <input class="preview-input my-1" readonly type="" name="" value="Mobile Number">
                  <input class="preview-input my-1" readonly type="" name="" value="<?php echo $value->contact ?>">
                  <input class="preview-input my-1" readonly type="" name="" value="Order Type">
                  <input class="preview-input my-1" readonly type="" name="" value="<?php echo $value->order_type; ?>">
                  <input class="preview-input my-1" readonly type="" name="" value="Gem Work Order Id">
                  <input class="preview-input my-1" readonly type="" name="" value="<?php echo $value->gemNgem_workorder_id ?>">
                 <!--  <input class="preview-input my-1" readonly type="" name="" value="Work Order Id">
                  <input class="preview-input my-1" readonly type="" name="" value="<?php echo $value->igcpl_workorder_id ?>"> -->
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="sellerinfo">
                     <h3 class="text-white py-2 pl-3 mb-3" style="color: #000;">
                        <i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp; Buyer Address
                     </h3>
                  </div>
               </div>
               <div class="col-md-2">
                  <input class=" my-1" readonly type="" name="" value="Buyer Address">
               </div>
               <div class="col-md-10">
                  <textarea class="preview-input w-100 my-1" readonly type="" name="" value=""><?php echo $value->consignee_address ?></textarea>
               </div>
               <div class="col-md-12">
                  <input class="preview-input mt-1" readonly value="State ">
                  <input class="preview-input mt-1" readonly value="<?php echo $value->statename ?>
                     <?php                                           
                        $state = $this->db->query("SELECT statename FROM state_master WHERE state_id=".$value->statename." limit 1");
                                 $state = $state->result_array();
                        foreach($state as $state)
                        {
                           $statename = $state['statename'] ;
                        }
                        ?> 
                     ">
                  <input class="preview-input my-1" readonly value="District">
                  <input class="preview-input my-1" readonly value="<?php echo $value->districtname ?>">
                  <input class="preview-input my-1" readonly value="City">
                  <input class="preview-input my-1" readonly value="<?php echo $value->city ?>">
                  <input class="preview-input my-1" readonly value="Pincode">
                  <input class="preview-input my-1" readonly value="<?php echo $value->pincode ?>">
               </div>
            </div>
            <div class="row">
            <div class="col-md-12">
               <div class="sellerinfo">
                  <h3 class="text-white py-2 pl-3 mb-3" style="color: #000;">
                     <i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;&nbsp; Logistics Details
                  </h3>
               </div>
            </div>
            <div class="col-md-12">
               <input class="preview-input" readonly type="" name="" value="Organization Name ">
               <input class="preview-input" readonly type="" name="" value="<?php echo $value->organization_name ?>">
               <input class="preview-input" readonly type="" name="" value="GSTIN">
               <input class="preview-input" readonly type="" name="" value="<?php echo $value->gstin ?>">
               <input class="preview-input" readonly type="" name="" value="Logistics">
               <input class="preview-input" readonly type="" name="" value="<?php echo $value->logistics ?>">
               
               <input class="preview-input" readonly type="" name="" value="Delivery Date ">
               <input class="preview-input" readonly type="" name="" value="<?php echo $value->ready_delivery_date ?>">
               <input class="preview-input" readonly type="" name="" value="Expected Date">
               <input class="preview-input" readonly type="" name="" value="<?php echo $value->expected_date ?>">
               <input class="preview-input" readonly type="" name="" value="gem_workorder_doc">
               <input class="preview-input" readonly type="" name="" value="<?php echo $value->gem_workorder_doc ?>">
               <input class="preview-input" readonly type="" name="" value="Gem Order ">
               <input class="preview-input" readonly type="" name="" value="<?php echo $value->value_gem_order ?>">
               <input class="preview-input" readonly type="" name="" value="Bill Discounting">
               <input class="preview-input" readonly type="" name="" value="<?php echo $value->bill_discounting ?>">
               <input class="preview-input" readonly type="" name="" value="Sample Clause">
               <input class="preview-input" readonly type="" name="" value="<?php echo $value->sample_clause ?>">
            </div>
            </div>
         <?php endforeach; ?>
          <a target="_blank" type="button" class="btn btn-primary" href="<?php echo base_url();?>/Seller_module/Print_Workorder_Preview/<?php echo $value->sellerid;?>/<?php echo $value->igcpl_workorder_id; ?>"><i class="fa fa-print" aria-hidden="true"></i>Print</a>
      
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
      function printpart () {
        var printwin = window.open("");
        printwin.stop();
        printwin.document.write(document.getElementById("toprint").innerHTML);
        printwin.print();
        printwin.close();
      }
   </script>