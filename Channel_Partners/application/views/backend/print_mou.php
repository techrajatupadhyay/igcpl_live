<style>
  <!-- @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');-->
   h1,h2,h3,h4,h5,h6,p,li,a tr th td span strong{
   font-family: 'Poppins', sans-serif;
   color:#000;
   }
   .mou-img{
   width:120px;
   }
   .logo-mou{
   width:110px;
   float: right;
   margin-top: -95px;
   }
   .PrintMou{
   float:right;
   width:130px;
   background-color:#448acc!important;
   border:1px solid #448acc!important;
   border-radius:5px!important
   } 
   .mou-heading{
   text-align: center;
   margin-top: -159px;
   } 
   table{
   margin-top:100px;
   margin-left:35px;
   }
   table tbody th td{
   font-size:20px!important;
   }
   strong p h1 h4 h3 tr  td span{
   font-size: 30px!important;
   }
</style>
<body onload="window.print()">
   <?php foreach($seller as $value): ?> 
    <div class="print-mou" >
        <div id="toprint">
	        <div class="row">
	            <div class="col-md-2 col-sm-2">
	               <img src="<?php echo base_url()?>/assets/images/mou.png" class="mou-img ml-3" style="width: 120px;">
	            </div>
	            <div class="col-md-8 col-sm-6 mou-heading" >
	               <h1 class="mt-3 ml-5 text-center">
	                  <strong style="color:#ff0000;  font-size: 25px;"> INDIGEM CHANNEL PARTNERS PVT. LTD.</strong>
	               </h1>
	               <h4 class="text-center text-dark" style="font-size: 20px;">
	                  <strong>CIN: U74999HR2022PTC105548 </strong>
	               </h4>
	            </div>
	            <div class="col-md-2 ">
	               <img src="<?php echo base_url()?>/assets/images/logo-icon.png" class="logo-mou mt-1 ml-3">
	            </div>
	        </div>
	        <table class="m-4">
	            <tbody>
	                <tr>
	                    <td style="font-size:25px; line-height:40px;">To,</td>
	                </tr>
	                <tr>
	                  <td style="font-size:25px; line-height:40px;">The Manager </td>
	                </tr>
	                <tr>
	                    <td>
	                    	<span style="font-size:25px; line-height:40px;">IGCPL,</span> 
	                    	<b style="font-size:25px; line-height:40px;">INDIGEM CHANNEL PARTNERS</b>; 
	                    </td>
	                </tr>
	                <tr>
	                  <td style="font-size:30px; line-height:40px;">Madam/Sir,</td>
	                </tr>
	                <tr>
	                    <td style="word-spacing:8px;line-height:25px; font-size:25px;">
		                    <b style="font-size:30px; line-height:40px;">Subject :- </b>Request for onboarding M/s. 
		                    <strong style="font-weight:bold;font-size:30px; line-height:40px;">
		                    <?php echo ucwords(strtolower($value->fname)); ?>
		                    </strong> for the<br>Period <strong style="font-weight:bold;"> 
		                    <strong style="font-weight:bold;"> 
																	<?php 
																		$timestamp = strtotime($value->paid_on);
	                                                   print date("d-m-Y ", $timestamp, );
	                                                ?>
                                                </strong> to 
                                                <strong style="font-weight:bold;">
                                                   <?php
						                                    $newdate = date('d-m-Y', strtotime("+ ".$value->reg_duration." years"))	;	
							                                 echo $newdate ;							
							                              ?>

																</strong>  
	                    </td>
	                </tr>
	                <tr>
	                    <td style="font-size:25px;">
	                  	    <strong>Please Find Enclosed Following Documents :</strong>
	                   </td>
	                </tr>
	                <tr>
	                    <td>
		                    <span style="font-size:25px; margin-left:30px; line-height:40px;">1. Documents as per check list<br></span>

		                    <span style="font-size:25px; margin-left:30px; line-height:40px;">2. Channel partner Authorization Letter<br></span>

		                    <span style="font-size:25px; margin-left:30px; line-height:40px;">3. Proof of payment of onboarding fee/Draft number/Cheque Number/Order Number
		                    	<strong style="font-weight:bold;"><?php echo  $value->order_id?></strong>
		                    	<br>
		                    <span style="margin-left:30px;"> of an amount of 
		                    	<strong style="font-weight:bold;">Rs. <?php echo $value->amount;?> ₹</strong> dated towards payment of onboarding fee.</span></span><br>
	                    </td>
	                </tr>
	                <tr>
		                <td>
		                    <strong style="font-size:25px;margin-left:30px; line-height:40px;">It is requested to grant approval for the same and generate the following :</strong>
		                </td>
	                </tr>
	                <tr>
		                <td>
			               <span  style="font-size:25px;margin-left:30px; line-height:40px;">1. IGCPL Client code</span> <br> 
			               <span  style="font-size:25px;margin-left:30px; line-height:40px;">2. User ID and Password for Seller Module</span> 
		                </td>
	                </tr>
	                <tr>
	                    <td style="font-size:25px;margin-left:30px; line-height:40px; float:right;"> Name and Sign of Agent with Code </td>
	                </tr>
	                <tr>
	                    <td>*********************************************************************************************************************************</td>
	                </tr>
	                <tr>
		                <td  style="font-size:25px;margin-left:30px; line-height:40px;">
		               	    <strong>1. Matter discussed with Manager and approved/rejected</strong>
		                </td>
	                </tr>
	                <tr>
	                    <td  style="font-size:25px;margin-left:30px; line-height:40px;">
	                        <b style="font-weight:600;">a. Approved cases </b><br> 
	                        <span style="margin-left:30px">i. IGCPL client code is - </span>
	                        <strong style="font-weight:900;"><?php echo $value->seller_id ?></strong><br>
	                        <span style="margin-left:30px">ii. User ID is - </span> 
	                        <strong  style="font-size:25px;margin-left:30px; line-height:40px;font-weight:bold;"> <?php echo $value->email ?></strong><br> 
	                        <span style="margin-left:30px">iii. Password - </span>
	                        <strong  style="font-size:25px;margin-left:30px; line-height:40px;"> <?php echo $value->dec_pass ?></strong>
	                    </td>
	                </tr>
	                <tr>
		                <td  style="font-size:25px;margin-left:30px; line-height:40px;"><b>b. Rejected cases</b>
		               </td>
		            </tr>
	                <tr>
	                    <td style="font-size:25px;"> i. Documents Required <br></td>
	               </tr>
	                <tr>
		                <td>
		                    <span style="font-size:25px;margin-left:30px; line-height:40px;">1. Permanent Account Number (PAN)</span><br>
		                    <span style="font-size:25px;margin-left:30px; line-height:40px;">2. Tax Deduction Account Number (TAN)</span><br>
		                    <span style="font-size:25px;margin-left:30px; line-height:40px;">3. GSTIN</span><br>
		                    <span style="font-size:25px;margin-left:30px; line-height:40px;">4. GeM Registration Document</span><br>
		                    <span style="font-size:25px;margin-left:30px; line-height:40px;">5. MOU</span>
		                </td>
	                </tr>
	                <tr>
	                    <td style="font-size:25px;"> ii. Date of Intimation to Laabh Agent <br></td>
	                </tr>
	            </tbody>
	        </table><br><br>
            <div class="row ">
    <div class="col-md-6">
      <p style="color:#000!important; float:left; font-size:25px; font-family: 'Poppins', sans-serif;" class="ml-3"> Name and Sign of Laabh Executive with Code </p>
    </div>
    <div class="col-md-6">
      <p style="color:#000!important; float:right; font-size:25px; font-family: 'Poppins', sans-serif;" class="mr-3"><span style="text-align: left;">Name and Sign of Manager</span></p>
    </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
	<script>
	   function printpart () {
	     var printwin = window.open("");
	     printwin.stop();
	     printwin.document.write(document.getElementById("toprint").innerHTML);
	     printwin.print();
	     printwin.close();
	   }
	</script>			
</body>