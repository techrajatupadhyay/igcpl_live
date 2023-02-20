<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
      <title>ID Card</title>
      <style> 
        /* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap'); */ 
         /*.container{
         max-width:630px;
         border:2px solid #ccc;
         }*/
         h1, h2, h3, h4, h5, h6, p ul li span{
         font-family: 'Poppins', sans-serif;
         }
         header{
         border-bottom: 2px solid #000770;
         background: #000770;
         color: #fff;
         }
         h4{
         font-weight:bold;
         font-size:24px!important;
         }
         .company-info{
         	text-align: center;
         }
        .address{
         font-weight:bold;
         font-size:12px!important;
         }
         .logo{
         height:100px;
         }
         .employee_img{
         width: 90%;
         border: 1px solid;
         box-shadow: 1px 1px 1px 1px #ccc;
         }
         .qr_code{
         height:80px;
         margin-top:18px;
         }
        
		      </style>
   </head>
    <body>
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
               <div class="container">
                  <header>
                     <div class="row">
                        <div class="col-md-2 col-sm-2">
                           <div class="my-2">
                              <img src="https://indigemcp.tsdemo.co.in/assets/img/logo/logo_new.png" class="logo mx-2">
                           </div>
                        </div>
                        <div class="col-md-10 col-sm-10 company-info">
                            <h4 class="mt-4">INDIGEM CHANNEL PARTNERS PVT LTD</h4>
                            <p class="text-center address">637, Star Chambers, Harihar Chowk, Rajkot, Gujrat,360001<br>
                                <a href="https://indigemcp.com/" class="text-white">https://indigemcp.com/</a>
                            </p>
                        </div>
                     </div>
                  </header>
                  <div class="" style="border:1px solid #000770;">
                     <div class="row mx-1" >
                        <div class="col-md-9 mt-2">
                           <table>
                              <tbody>
                                 <tr>
                                    <th>Name</th>
                                    <td>&nbsp; Devika Sinha</td>
                                 </tr>
                                 <tr>
                                    <th>Designation</th>
                                    <td>&nbsp; CEO</td>
                                 </tr>
                                 <tr>
                                    <th>Employee Code</th>
                                    <td>&nbsp; CEO2212001</td>
                                 </tr>
                                 <tr>
                                    <th><img src="<?php echo base_url();?>assets/images/QR_code.png" class="qr_code"></th>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <div class="col-md-3 mt-2">
                           <div class="mr-2" >
                              <img src="<?php echo base_url();?>assets/images/user.png" class="employee_img">
                           </div>
                        </div>
                     </div>
                     <div class="row mt-4 ml-1">
                        <div class="col-md-9 col-sm-9">
                           <div class="sign_employee">
                              <p>Sign of Employee</p>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                           <div class=" sign_director">
                              <p>Sign of Director</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 pt-2" style="border:1px solid #000770;">
               <div class="container">
                  <div class="row">
                     <div class="col-md-6">
                        <table>
                           <tbody>
                              <tr>
                                 <th>DOB</th>
                                 <td>&nbsp; 02/07/1997</td>
                              </tr>
                              <tr>
                                 <th>Blood Group </th>
                                 <td>&nbsp; B+</td>
                              </tr>
                              <tr>
                                 <th>Validity </th>
                                 <td>&nbsp; 31 Dec 2023</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="col-md-6">
                        <table>
                           <tbody>
                              <tr>
                                 <th>Mobile</th>
                                 <td>&nbsp; +91 9867542301</td>
                              </tr>
                              <tr>
                                 <th>Aadhar No.</th>
                                 <td>&nbsp; &nbsp; 98459845386745</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                    <div class="col-md-3 mt-3">
                        <p><b>Address:</b></p>
                    </div>
                    <div class="col-md-9 mt-3">
                       <p>637, Star Chambers, Harihar Chowk, Rajkot, Gujrat,360001</p>
                    </div>
                    <div class="col-md-3 mt-3">
                        <p><b>HO Address:</b></p>
                    </div>
                    <div class="col-md-9 mt-3">
                        <p>305-306,3rd Floor, Tower A, Spacedge, Sector 46, Sohna Road Gurgaon, Haryana, India, 122018</p>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
     
   </body>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>