<?php
   if($this->session->userdata('user_login_access') != 1)
   {
      return redirect('Login'); 
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
        small{
         font-size: 12px
         }
         .icon{
         background-color: #eee;
         width: 40px;
         height: 40px;
         display: flex;
         justify-content: center;
         align-items: center;
         border-radius: 50%
         }
        .b-bottom{
         border-bottom: 2px dotted black;
         padding-bottom: 20px
         }
         p{
         margin: 0px
         }
        .payment-summary .unregistered{
         width: 100%;
         display: flex;
         align-items: center;
         justify-content: center;
         background-color: #eee;
         text-transform: uppercase;
         font-size: 14px
         }
         .payment-summary input{
         width: 100%;
         margin-right: 20px
         }
         .sale button{
         width: 100%;
         border-radius: 50px;
         font-size: 20px;
         font-family: -webkit-body;
         }
         .red{
         color: #fd1c1c
         }
         .del{
         width: 35px;
         height: 35px;
         object-fit: cover
         }
         .delivery .card{
         padding: 10px 5px
         }
         .option{
         position: relative;
         top: 50%;
         display: block;
         cursor: pointer;
         color: #888
         }
         .option input{
         display: none
         }
         .checkmark{
         position: absolute;
         top: 40%;
         left: -25px;
         height: 20px;
         width: 20px;
         background-color: #fff;
         border: 1px solid #ccc;
         border-radius: 50%
         }
         .option input:checked~.checkmark:after{
         display: block
         }
         .option .checkmark:after{
         content: "\2713";
         width: 10px;
         height: 10px;
         display: block;
         position: absolute;
         top: 30%;
         left: 50%;
         transform: translate(-50%, -50%) scale(0);
         transition: 200ms ease-in-out 0s
         }
         .option:hover input[type="radio"]~.checkmark{
         background-color: #f4f4f4
         }
         .option input[type="radio"]:checked~.checkmark{
         background: #ac1f32;
         color: #fff;
         transition: 300ms ease-in-out 0s
         }
         .option input[type="radio"]:checked~.checkmark:after{
         transform: translate(-50%, -50%) scale(1);
         color: #fff
         }
         .payment-summary{
         text-align: center;
         margin: auto;
         }
      </style>
   </head>
   <body>
<?php  $this->load->view('backend/workorder_header');?>


                        <div class="page-body" aria-labelledby="payment">
                           <div class="card">
                           
                              <div class="container mt-4 p-0">
                                 <div class="row px-md-4 px-2 pt-4">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8  payment-summary">
                                       <div class="card px-md-3 px-2 pt-4">
                                          <div class="unregistered mb-4"> <span class="py-1"><strong>Payment Summary</strong></span> </div>

                                          <div class="d-flex flex-column b-bottom">

                                             <?php foreach($workorder_payment as $value): ?> 
                                             <div class="d-flex justify-content-between py-3">
                                                <small class="">Subtotal</small>
                                                <p><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $value->value_gem_order ?></p>
                                             </div>
                                             <div class="d-flex justify-content-between pb-3">
                                                <small class="">Shipping</small>
                                                <p><i class="fa fa-inr" aria-hidden="true"></i>  <?php echo $value->shipment_charges ?></p>
                                             </div>
                                             <div class="d-flex justify-content-between pb-3">
                                                <small class="">GST</small>
                                                <p><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $value->including_gst ?></p>
                                             </div>
                                             <div class="d-flex justify-content-between pb-3">
                                                <small class="">Delivery charges</small>
                                                <p><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $value->gstin ?></p>
                                             </div>
                                             <div class="d-flex justify-content-between pb-3">
                                                <small class="">Agency charges</small>
                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 1200</p>
                                             </div>
                                             <div class="d-flex justify-content-between" style="border-top:2px solid #b3b3b3; padding-top:7px;">
                                                <strong> Total Amount </strong>
                                                <p ><i class="fa fa-inr" aria-hidden="true"></i><strong> 17050</strong> </p>
                                             </div>


                                           <?php endforeach; ?>

                                          </div>
                                          <div class="sale my-3"> 
                                             <button type="button" class="btn btn-primary"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                             Pay Now</button>
                                          </div>
                                       </div>
                                       <div class="col-lg-2"></div>
                                    </div>
                                    <div class="col-lg-2"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
     <!--  </div> -->
   </body>
</html>