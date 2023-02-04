<?php

   $sellerid = $this->session->userdata('user_login_id'); 
   
?>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">  
    <!--<script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js" nonce="4b1d7f9d-ab42-4815-ae4b-bcee5fb43cb7"></script><script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyQWRtaW50eSUyMC0lMjBQcmVtaXVtJTIwQWRtaW4lMjBUZW1wbGF0ZSUyMGJ5JTIwQ29sb3JsaWIlMjAlMjIlMkMlMjJ4JTIyJTNBMC41OTEzNTYwNTMwMDk5MzIlMkMlMjJ3JTIyJTNBMTM2NiUyQyUyMmglMjIlM0E3NjglMkMlMjJqJTIyJTNBNzg5JTJDJTIyZSUyMiUzQTE4MjElMkMlMjJsJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZjb2xvcmxpYi5jb20lMkYlMkZwb2x5Z29uJTJGYWRtaW50eSUyRmRlZmF1bHQlMkZkdC1leHQtcmVzcG9uc2l2ZS5odG1sJTIyJTJDJTIyciUyMiUzQSUyMmh0dHBzJTNBJTJGJTJGY29sb3JsaWIuY29tJTJGJTJGcG9seWdvbiUyRmFkbWludHklMkZkZWZhdWx0JTJGZHQtZXh0LWtleS10YWJsZS5odG1sJTIyJTJDJTIyayUyMiUzQTI0JTJDJTIybiUyMiUzQSUyMlVURi04JTIyJTJDJTIybyUyMiUzQS0zMzAlMkMlMjJxJTIyJTNBJTVCJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjIwJTIyJTJDJTIyVSUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyMSUyMiUyQyUyMkElMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjIlMjIlMkMlMjItJTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjIzJTIyJTJDJTIyMiUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyNCUyMiUyQyUyMjMlMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjUlMjIlMkMlMjI1JTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjI2JTIyJTJDJTIyOCUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyNyUyMiUyQyUyMjElMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjglMjIlMkMlMjI1JTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjI5JTIyJTJDJTIyNiUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyMTAlMjIlMkMlMjI4JTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjIxMSUyMiUyQyUyMi0lMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjEyJTIyJTJDJTIyMSUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyMTMlMjIlMkMlMjIzJTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTVEJTdE"></script><script nonce="4b1d7f9d-ab42-4815-ae4b-bcee5fb43cb7">(function(w,d){!function(eK,eL,eM,eN){eK.zarazData=eK.zarazData||{};eK.zarazData.executed=[];eK.zaraz={deferred:[],listeners:[]};eK.zaraz.q=[];eK.zaraz._f=function(eO){return function(){var eP=Array.prototype.slice.call(arguments);eK.zaraz.q.push({m:eO,a:eP})}};for(const eQ of["track","set","debug"])eK.zaraz[eQ]=eK.zaraz._f(eQ);eK.zaraz.init=()=>{var eR=eL.getElementsByTagName(eN)[0],eS=eL.createElement(eN),eT=eL.getElementsByTagName("title")[0];eT&&(eK.zarazData.t=eL.getElementsByTagName("title")[0].text);eK.zarazData.x=Math.random();eK.zarazData.w=eK.screen.width;eK.zarazData.h=eK.screen.height;eK.zarazData.j=eK.innerHeight;eK.zarazData.e=eK.innerWidth;eK.zarazData.l=eK.location.href;eK.zarazData.r=eL.referrer;eK.zarazData.k=eK.screen.colorDepth;eK.zarazData.n=eL.characterSet;eK.zarazData.o=(new Date).getTimezoneOffset();if(eK.dataLayer)for(const eX of Object.entries(Object.entries(dataLayer).reduce(((eY,eZ)=>({...eY[1],...eZ[1]})))))zaraz.set(eX[0],eX[1],{scope:"page"});eK.zarazData.q=[];for(;eK.zaraz.q.length;){const e_=eK.zaraz.q.shift();eK.zarazData.q.push(e_)}eS.defer=!0;for(const fa of[localStorage,sessionStorage])Object.keys(fa||{}).filter((fc=>fc.startsWith("_zaraz_"))).forEach((fb=>{try{eK.zarazData["z_"+fb.slice(7)]=JSON.parse(fa.getItem(fb))}catch{eK.zarazData["z_"+fb.slice(7)]=fa.getItem(fb)}}));eS.referrerPolicy="origin";eS.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(eK.zarazData)));eR.parentNode.insertBefore(eS,eR)};["complete","interactive"].includes(eL.readyState)?zaraz.init():eK.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script>-->
</head> 
  
<div class="pcoded-main-container" style="margin-top: 56px;">
   <div class="pcoded-wrapper">
      <div class="pcoded-content">
         <div class="pcoded-inner-content">
            <div class="main-body">
               <div class="page-wrapper">
                  <div class="page-header">
                     <div class="row align-items-end">
                        <div class="col-lg-8">
                           <div class="page-header-title">
                              <div class="d-inline">
                                 <br>
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
                                 <li class="breadcrumb-item"><a href="#!">My Workorders</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="page-body">
                     <div class="card">
                        <div class="card-header">
                           <h5>My All Work Orders</h5>
                           <div class="card-header-right">
                              <ul class="list-unstyled card-option">
                                 <li><i class="feather icon-maximize full-card"></i></li>
                                 <li><i class="feather icon-minus minimize-card"></i></li>
                                 <li><i class="feather icon-trash-2 close-card"></i></li>
                              </ul>
                           </div>
                        </div>
                        <div class="card-block">
                          <table  id="example" class="w-100 table table-striped table-bordered table-hover" width="100%">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Buyer Name</th>
                                    <th>Workorder Id</th>
                                    <th>Gem Workorder Id</th>
                                    <th>Pickup Location</th>
                                    <th>Logistics</th>
                                    <th>Order Type</th>
                                    <th>Contact</th>
                                    <th>E-mail</th>
                                    <th>Sample Clause</th>
								    <th>Payment Status</th>
								    <th>Order Status</th>
								    <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody> 
                                 <?php 
								 $i=0;
								 foreach($workorder as $value){ 
								 $i++;
								 ?>
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value->buyer_name ?></td>
                                    <td><?php echo $value->igcpl_workorder_id;?></td>
                                    <td><?php echo $value->gemNgem_workorder_id; ?></td>
                                    <td><?php echo $value->pick_location; ?></td>
									<td><?php echo $value->logistics; ?></td>
                                    <td>
									    <?php
                                        if($value->order_type=='01')
									    {												
										    echo "Gem Workorder";
									    }
                                        else
                                        {
										    echo "Non-Gem Workorder";
									    }												
										?>
									</td>
                                    <td><?php echo $value->contact ?></td>
                                    <td><?php echo $value->email ?></td>
                                    <td><?php echo $value->sample_clause ?></td>
									<td><?php echo "Unpaid" ?></td>
         							<td>
         							    <?php
         									if($value->isactive==0)
         									{
         										echo "Order Genrated";
         									}
         									else if($value->isactive==1)
         									{
         										echo "Pending";
         									}
         									else if($value->isactive==2)
         									{
         										echo "Delivered";
         									}
         								?>
         						    </td>
									<td class="jsgrid-align-center ">
									    <a href="#" title="view"><button class="btn btn-primary btn-outline-primary  btn-round"><i class="icofont icofont-eye-alt"></i></button></a>								
									    <a href="<?php echo base_url();?>Seller_module/Workorder_details/<?php echo $value->sellerid; ?>/<?php echo $value->igcpl_workorder_id; ?>" title="edit"><button class="btn btn-primary btn-outline-primary  btn-round"><i class="fa fa-pencil-square-o"></i></button></a>
									    <!--<a href="#" title="delete" onclick="confirm('Are Yoy Want To Delet !')"><button class="btn btn-primary btn-outline-primary  btn-round"><i class="fa fa-trash-o"></i></button></a> -->                               
                                        <a href="#" title="delete"><button class="btn btn-primary btn-outline-primary  btn-round"><i class="fa fa-trash-o"></i></button></a>
									</td>
                                 </tr>
                                 <?php } ?>
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