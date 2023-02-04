<style>
   hr 
   {
   margin-top: 1rem;
   margin-bottom: 1rem;
   border: 0;
   border-top: 1px solid #01054c !important;
   width: 100%;
   }
   .red-color 
   {
   color: red;
   }
   .profile-tab .navtab 
   {
   font-size: 15px;
   font-weight: bold;
   padding: 15px 32px !important;
   margin-right: 52px !important;
   background-color: white !important;
   color: blue !important;
   }
   .tap-btn 
   {
   margin: 10px 33px;
   font-size: 20px;
   font-weight: 400;
   color: #00054c;
   }
   .preview-card 
   {
   padding: 0px 30px !important;
   border: 2px solid !important;
   }
   .preview-input 
   {
   width: 24% !important;
   }
   .sellerinfo 
   {
   background-color: #00054c;
   }
   .table th, .table tbody td 
   {
   border: 1px solid !important;
   }
   .infosection 
   {
   border: 1px solid;
   margin-bottom: 10px;
   }
   .nav-link:hover::before 
   {
   content: ''!important;
   display: block!important;
   width: 0px!important;
   height: 2px!important;
   background: #fec400!important;
   transition: 0.4s!important
   }
   .nav-link:hover::after 
   {
   width: 100%
   }
   .nav-link .active>.nav-link,
   .nav-link.active,
   .nav-link.show,
   .show>.nav-link,
   .nav-link:focus,
   .nav-link:hover 
   {
   color: red!important;
   content: ''!important;
   text-decoration: underline;!important;
   }
   .print-mou
   {
   border: 3px solid;
   margin: 65px;
   }
   .sub-navigetion{
   margin:0px 15px!important;
   }
   .sub-navigetion a {
   padding: 7px 30px;
   border-radius: 5px;
   }
   .footer-button {
   margin: 5px 3px 0 3px;
   padding: 5px;
   text-decoration: none;
   text-align: center;
   font: bold 13px Verdana, Arial, Helvetica, sans-serif;
   width: 100px;
   color: #FFF;
   outline-style: none;
   background-color: #5A5655;
   border: 1px solid #5A5655;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   }
   section{
      margin-left: 140px!important;
   }
</style>
<body>
   <?php $this->load->view('backend/header'); ?>
   <?php $this->load->view('backend/sidebar'); ?>
   <div class="row">
      <div class="col-md-12">
         <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="sub-navigetion nav-item active">
                     <a class="nav-link active" href="index.php">Seller Information</a>
                  </li>
                  <li class="sub-navigetion nav-item">
                     <a class="nav-link disabled" href="mou.php">MOU Print</a>
                  </li>
                  <li class="sub-navigetion nav-item">
                     <a class="nav-link disabled" href="document.php">Document</a>
                  </li>
                  <li class="sub-navigetion nav-item">
                     <a class="nav-link disabled" href="Payment.php">Payment</a>
                  </li>
                  <li class="sub-navigetion nav-item">
                     <a class="nav-link disabled" href="Preview.php">Preview</a>
                  </li>
               </ul>
            </div>
         </nav>
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
               <div class="col-md-5 align-self-center">
                  <h3 class="text-themecolor">
                     <i class="fa fa-university" aria-hidden="true"></i> Seller Registration
                  </h3>
               </div>
               <div class="col-md-7 align-self-center">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item">
                        <a href=" "> Seller Details</a>
                     </li>
                     <li class="breadcrumb-item active">Seller</li>
                  </ol>
               </div>
             <!--   <div class="message"></div> -->
               <div class="container-fluid">
                  <div class="row m-b-10">
                     <div class="col-12">
                        <button type="button" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <a href="" class="text-white">
                        <i class="" aria-hidden="true"></i> Seller List </a>
                        </button>
                     </div>
                  </div>
               </div>
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                           <div class="row">
                              <div class="col-12">
                                 <div class="card card-outline-info">
                                    <form action="" method="post" enctype="multipart/form-data">
                                       <div class="card-body">
                                          <div class="card-header mx-3">
                                             <h4 class="m-b-0 ">
                                                <i class="fa fa-user-o" aria-hidden="true" style="color:#ff0000;"></i>
                                                <span style="color:#ff0000;"> Personal Details</span>
                                                <span class="pull-right "></span>
                                             </h4>
                                          </div>
                                          <input type="hidden" name="labhid" value="<?php $labhid;?>">
                                          <div class="row mx-3">
                                             <div class="form-group col-md-3 m-t-20">
                                                <label>First Name : <span class="red-color">*</span></label>
                                                <input type="text" name="fname" class="form-control form-control-line" placeholder="Your first name" minlength="2"  set_value='fname'>
                                             </div>
                                             <div class="form-group col-md-3 m-t-20">
                                                <label>Last Name </label>
                                                <input type="text" id="" name="lname" class="form-control form-control-line" value="" placeholder="Your last name" minlength="2">
                                             </div>
                                             <div class="form-group col-md-3 m-t-20">
                                                <label>Gender : <span class="red-color">*</span>
                                                </label>
                                                <select name="gender" class="form-control custom-select" >
                                                   <option>Select Gender</option>
                                                   <option value="MALE">Male</option>
                                                   <option value="FEMALE">Female</option>
                                                   <option value="Other">Other</option>
                                                </select>
                                             </div>
                                             <input type="hidden" name="employeeid" class="form-control" value="" placeholder="" minlength="10" maxlength="15" >
                                             <div class="form-group col-md-3 m-t-20">
                                                <label>User Type : </label>
                                                <select id="usertype" name="usertype" class="form-control" autocomplete="off">
                                                   <option value="3" selected="selected">Seller</option>
                                                </select>
                                             </div>
                                             <div class="form-group col-md-3 m-t-20">
                                                <label>Aadhar No. : <span class="red-color span1">*</span></label>
                                                <input type="number" name="aadhar" class="form-control form-control-line" placeholder="Aadhar" minlength="12" maxlength="12" >
                                             </div>
                                             <div class="form-group col-md-3 m-t-20">
                                                <label>Mobile Number : <span class="red-color">*</span></label>
                                                <input type="number" name="contact" class="form-control" value="" placeholder="Please enter mobile number" minlength="10" maxlength="10" >
                                             </div>
                                             <div class="form-group col-md-3 m-t-20">
                                                <label>Alternate Number : </label>
                                                <input type="number" name="altcontact" class="form-control" value="" placeholder="Please enter mobile number" minlength="10" maxlength="10">
                                             </div>
                                             <div class="form-group col-md-3 m-t-20">
                                                <label>Date Of Birth </label>
                                                <input type="date" name="dob" class="form-control" placeholder="" >
                                             </div>
                                             <div class="form-group col-md-3 m-t-20">
                                                <label>Email : <span class="red-color">*</span></label>
                                                <input type="email" id="example-email2" name="email" class="form-control" placeholder="email@mail.com" minlength="7" >
                                             </div>
                                             <div class="card-body">
                                                <div class="card-header">
                                                   <h4 class="m-b-0 ">
                                                      <i class="fa fa-location-arrow" aria-hidden="true" style="color:#ff0000;"></i>
                                                      <span style="color:#ff0000;"> Current Address</span>
                                                      <span class="pull-right "></span>
                                                   </h4>
                                                </div>
                                                <div class="row">
                                                   <div class="form-group col-md-3 m-t-20">
                                                      <label>State : <span class="red-color">*</span></label>
                                                      <select id="stateID" name="state_first" class="form-control" autocomplete="off">
                                                         <option value="">-- Select State --</option>
                                                         <option value="1429">ANDAMAN &amp; NICOBAR</option>
                                                         <option value="1430">ANDHRA PRADESH</option>
                                                         <option value="1431">ARUNACHAL PRADESH</option>
                                                         <option value="1432">ASSAM</option>
                                                         <option value="1433">BIHAR</option>
                                                         <option value="1434">CHANDIGARH</option>
                                                         <option value="1435">DAMAN &amp; DIU</option>
                                                         <option value="1436">DELHI</option>
                                                         <option value="1438">DADRA &amp; NAGAR HAVELI</option>
                                                         <option value="1439">GOA</option>
                                                         <option value="1440" selected="selected">GUJARAT</option>
                                                         <option value="1441">HIMACHAL PRADESH</option>
                                                         <option value="1442">HARYANA</option>
                                                         <option value="1443">JAMMU &amp; KASHMIR</option>
                                                         <option value="1444">KERALA</option>
                                                         <option value="1445">KARNATAKA</option>
                                                         <option value="1446">LAKSHADWEEP</option>
                                                         <option value="1447">MEGHALAYA</option>
                                                         <option value="1448">MAHARASHTRA</option>
                                                         <option value="1449">MANIPUR</option>
                                                         <option value="1450">MADHYA PRADESH</option>
                                                         <option value="1451">MIZORAM</option>
                                                         <option value="1452">NAGALAND</option>
                                                         <option value="1453">ODISHA</option>
                                                         <option value="1454">PUNJAB</option>
                                                         <option value="1455">PUDUCHERRY</option>
                                                         <option value="1456">RAJASTHAN</option>
                                                         <option value="1457">SIKKIM</option>
                                                         <option value="1458">TAMIL NADU</option>
                                                         <option value="1459">TRIPURA</option>
                                                         <option value="1460">UTTAR PRADESH</option>
                                                         <option value="1461">WEST BENGAL</option>
                                                         <option value="1462">CHHATTISGARH</option>
                                                         <option value="1463">JHARKHAND</option>
                                                         <option value="3883">UTTARAKHAND</option>
                                                         <option value="4990">TELANGANA</option>
                                                      </select>
                                                   </div>
                                                   <div class="form-group col-md-3 m-t-20">
                                                      <label>District : <span class="red-color span1">*</span></label>
                                                      <select id="stateID" name="district_first" class="form-control" autocomplete="off">
                                                         <option value="">-- Select City --</option>
                                                         <option value="1429">Bhopal</option>
                                                         <option value="1430">Indore</option>
                                                         <option value="1430">Gwalior</option>
                                                      </select>
                                                   </div>
                                                   <div class="form-group col-md-3 m-t-20">
                                                      <label>City : <span class="red-color span1">*</span></label>
                                                      <select id="cityID" name="city_first" class="form-control" autocomplete="off">
                                                         <option value="">-- Select City --</option>
                                                         <option value="1429">Bhopal</option>
                                                         <option value="1430">Indore</option>
                                                         <option value="1430">Gwalior</option>
                                                      </select>
                                                   </div>
                                                   <div class="form-group col-md-3 m-t-20">
                                                      <label>Pin Code <span class="red-color">*</span></label>
                                                      <input type="number" name="pincode_first" class="form-control" value="" placeholder="" minlength="6" maxlength="6" >
                                                   </div>
                                                   <div class="form-group col-md-12 m-t-20">
                                                      <label>Address : <span class="red-color">*</span></label>
                                                      <textarea id="address" name="current_address" class="form-control" rows="4" placeholder="full current address" autocomplete="off" maxlength="100"></textarea>
                                                   </div>
                                                </div>
                                                <div class="card-header">
                                                   <h4 class="m-b-0 ">
                                                      <i class="fa fa-home" aria-hidden="true" style="color:#ff0000;"></i>
                                                      <span style="color:#ff0000;">Permanaent Address</span>
                                                      <span class="pull-right "></span>
                                                   </h4>
                                                </div>
                                                <div class="row">
                                                   <div class="form-group col-md-3 m-t-20">
                                                      <label>State : <span class="red-color">*</span></label>
                                                      <select id="stateID" name="state_second" class="form-control" autocomplete="off">
                                                         <option value="">-- Select State --</option>
                                                         <option value="1429">ANDAMAN &amp; NICOBAR</option>
                                                         <option value="1430">ANDHRA PRADESH</option>
                                                         <option value="1431">ARUNACHAL PRADESH</option>
                                                         <option value="1432">ASSAM</option>
                                                         <option value="1433">BIHAR</option>
                                                         <option value="1434">CHANDIGARH</option>
                                                         <option value="1435">DAMAN &amp; DIU</option>
                                                         <option value="1436">DELHI</option>
                                                         <option value="1438">DADRA &amp; NAGAR HAVELI</option>
                                                         <option value="1439">GOA</option>
                                                         <option value="1440" selected="selected">GUJARAT</option>
                                                         <option value="1441">HIMACHAL PRADESH</option>
                                                         <option value="1442">HARYANA</option>
                                                         <option value="1443">JAMMU &amp; KASHMIR</option>
                                                         <option value="1444">KERALA</option>
                                                         <option value="1445">KARNATAKA</option>
                                                         <option value="1446">LAKSHADWEEP</option>
                                                         <option value="1447">MEGHALAYA</option>
                                                         <option value="1448">MAHARASHTRA</option>
                                                         <option value="1449">MANIPUR</option>
                                                         <option value="1450">MADHYA PRADESH</option>
                                                         <option value="1451">MIZORAM</option>
                                                         <option value="1452">NAGALAND</option>
                                                         <option value="1453">ODISHA</option>
                                                         <option value="1454">PUNJAB</option>
                                                         <option value="1455">PUDUCHERRY</option>
                                                         <option value="1456">RAJASTHAN</option>
                                                         <option value="1457">SIKKIM</option>
                                                         <option value="1458">TAMIL NADU</option>
                                                         <option value="1459">TRIPURA</option>
                                                         <option value="1460">UTTAR PRADESH</option>
                                                         <option value="1461">WEST BENGAL</option>
                                                         <option value="1462">CHHATTISGARH</option>
                                                         <option value="1463">JHARKHAND</option>
                                                         <option value="3883">UTTARAKHAND</option>
                                                         <option value="4990">TELANGANA</option>
                                                      </select>
                                                   </div>
                                                   <div class="form-group col-md-3 m-t-20">
                                                      <label>District : <span class="red-color span1">*</span></label>
                                                      <select id="stateID" name="district_second" class="form-control" autocomplete="off">
                                                         <option value="">-- Select City --</option>
                                                         <option value="1429">Bhopal</option>
                                                         <option value="1430">Indore</option>
                                                         <option value="1430">Gwalior</option>
                                                      </select>
                                                   </div>
                                                   <div class="form-group col-md-3 m-t-20">
                                                      <label>City : <span class="red-color span1">*</span></label>
                                                      <select id="cityID" name="city_second" class="form-control" autocomplete="off">
                                                         <option value="">-- Select City --</option>
                                                         <option value="1429">Bhopal</option>
                                                         <option value="1430">Indore</option>
                                                         <option value="1430">Gwalior</option>
                                                      </select>
                                                   </div>
                                                   <div class="form-group col-md-3 m-t-20">
                                                      <label>Pin Code <span class="red-color span1">*</span></label>
                                                      <input type="number" name="pincode_second" class="form-control" value="" placeholder="Please Enter Your PIN Code" minlength="6" maxlength="6" >
                                                   </div>
                                                   <div class="form-group col-md-12 m-t-20">
                                                      <label>Address : <span class="red-color">*</span></label>
                                                      <textarea id="address" name="permanent_address" class="form-control" rows="4" placeholder="full permanaent address" autocomplete="off" maxlength="100"></textarea>
                                                   </div>
                                                </div>
                                                <div class="card-header">
                                                   <h4 class="m-b-0 ">
                                                      <i class="fa fa-building" aria-hidden="true" style="color:#ff0000;"></i>
                                                      <span style="color:#ff0000;">Company Detail</span>
                                                      <span class="pull-right "></span>
                                                   </h4>
                                                </div>
                                                <div class="row">
                                                   <div class="form-group col-md-3 m-t-20">
                                                      <label>Company Name : <span class="red-color">*</span></label>
                                                      <input type="text" name="companyname" class="form-control" value="" placeholder="Company Name">
                                                   </div>
                                                   <div class="form-group col-md-3 m-t-20">
                                                      <label>Proprietor Name : <span class="red-color">*</span></label>
                                                      <input type="text" name="proprietor_name" class="form-control" value="" placeholder="">
                                                   </div>
                                                   <div class="form-group col-md-3 m-t-20">
                                                      <label>PAN Number : <span class="red-color">*</span></label>
                                                      <input type="text" name="panNo" class="form-control" value="" placeholder="Please Enter Your PAN">
                                                   </div>
                                                   <div class="form-group col-md-3 m-t-20">
                                                      <label>GSTIN : <span class="red-color">*</span>
                                                      </label>
                                                      <input type="text" name="gstin" class="form-control" value="" placeholder="">
                                                   </div>
                                                   <div class="form-group col-md-3 m-t-20">
                                                      <label>TAN Number : </label>
                                                      <input type="text" name="tanNo" class="form-control" value="" placeholder="">
                                                   </div>
                                                </div>
                                                <div class="form-actions col-md-12">
                                                   <button type="submit" class="btn btn-info">
                                                   <i class="fa fa-check"></i> Save & Next 
                                                   </button>
                                                   <button type="button" class="btn btn-info">Cancel</button>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <section style="margin-top: 5px;border: 1px solid #5b5655;">
               <div class="row">
                  <div class="col-md-12">
                     <div class="" style="float:right;">
                        <button type="button" class="btn btn-primary  footer-button">Previous</button>
                        <button type="button" class="btn btn-secondary footer-button">Secondary</button>
                        <button type="button" class="btn btn-success footer-button">Success</button>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>

   <!-- Optional JavaScript -->
</body>