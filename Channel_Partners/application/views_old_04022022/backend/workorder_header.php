<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
-->
<?php
    
    $sellerid = $this->session->userdata('user_login_id');  
          
   ?>
<style>
   .md-tabs .nav-item {
    width: calc(100% / 3);
    text-align: center;
}
</style>
<div class="pcoded-content">
   <div class="pcoded-inner-content">
      <div class="main-body">
         <div class="page-wrapper">
            <div class="page-header">
               <div class="row align-items-end">
                  <div class="col-lg-8">
                     <div class="page-header-title">
                        <div class="d-inline">
                           <h4>New Work Order</h4>
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
            <div class="tab-header card">
               <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                  <li class="nav-item ">
                     <a class="nav-link active"data-toggle="tab" href="<?php echo base_url();?>Seller_module/New_workorder" role="tab">Order Details</a>
                     <div class="slide"></div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="<?php echo base_url();?>Seller_module/Payment_workorder" role="tab">Payment</a>
                     <div class="slide"></div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="<?php echo base_url();?>Seller_module/Workorder_Preview/<?php echo $sellerid;?>" role="tab">Preview</a>
                     <div class="slide"></div>
                  </li>
               </ul>
            </div>

