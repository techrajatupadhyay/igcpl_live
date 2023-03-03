   <style>
    /*--------------------------------Id card--------------------------------------*/
    @import url('https://fonts.cdnfonts.com/css/cerebri-sans'); 
    
  .modal-content{
   width:282px;
   height: 560px;
   }
   .idcard-background-img{
   background-image:url("<?php echo base_url(); ?>assets/images/id-card.png");
   height:450px;
   }
   .company_name{
   font-size: 14px;
    padding: 7px;
    text-align: center;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
    padding-top: 18px;
    padding-left: 93px;

   }
   .company_logo{
   width: 60px;
   height: 60px;
   float: right;
   margin-top: -12px;
   margin-right: 14px;
   }
   .label{
   font-weight: 700;
   font-size: 11px;
   color: #000!important;
   }
   .user_info{
    border-left: 2px solid #ffaf00!important;
    line-height: 2!important;
    margin-bottom: 20px;
    padding-left: 5px;
   }
   .employee_img{
      width: 90px;
    height: 90px;
    margin-top: 7px;
    margin-left: 100px;

   }
   .employee_qr{
         width: 62px;
    height: 62px;
    margin-left: 36%;
    
   }
   .company_info{
   margin-left: 8%;
   margin-top: -21px;
   }
   .company_info p {
   font-size:11px;
   margin-top: -10px;
   font-family: 'Poppins', sans-serif;
   }
   .employee_details {
    margin-left: 36%;
    margin-top: 17px;
}
   .employee_details p{
   font-size: 11px;
   margin-top: -19px;
   font-family: 'Poppins', sans-serif;
   }
   tbody{
   font-size: 12px;
   text-align: justify;
   }
</style>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
</head>

<div class="print-mou" >
    <div id="toprint">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content ">
            <?php  
			if (isset($Employee_Details)) 
            {
                $prifile_image=""; 
				$user_type=""; 
				$regionid="";

				foreach ($Employee_Details as $row) 
				{ 
					$prifile_image= $row->em_image;
					$user_type= $row->user_type;

					$reg_val = $row->region;
					$region_value = explode (",", $reg_val); 
					$regionid = $region_value[0];
                }
                foreach ($Id_Card_Details as $row) 
                {  ?>    
                    <div class="modal-body" id="divToExport"   onload="window.print()">
                        <div class="idcard-background-img" >
                            <div class="row">
                                <div class="col-md-12">
                                <h3 class="text-dark company_name mt-2 ml-5">Indigem Channel Partners<br>Pvt. Ltd.  </h3>
                                
                                </div>
                                <div class="col-md-12">
                                <img src="<?php echo base_url();?>assets/images/logo_new.png" class="company_logo " alt="company logo">
                                </div>
                                <div class="col-md-12 text-center">
                                <img src="<?php echo base_url(); ?><?php echo $prifile_image; ?>" alt="employee_img" class="employee_img ">
                                </div>
                                <div class="col-md-12 employee_details">
                                    <div class="user_info">
                                        <p class="mt-1"><span class="label"><?php echo $row->employee_name; ?></span></p>
                                        <p><span class="ml-2" style="font-size:12px;"><?php echo $row->designation; ?></span></p>
                                        <p style="margin-top: -19px;"><span class="ml-2" style="font-size:12px;"><?php echo $row->employee_code; ?></span></p>
                                    </div>                                    
                                </div>
                                <div class="col-md-12">
                                <div class="company_info ">
                                        <table style="border: none!important;">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Branch :</th>
                                                    <td><?php echo $row->branch_office_address; ?></td>
                                                </tr>                                               
                                                <tr>
                                                    <th scope="row">Blood Group :</th>
                                                    <td><?php echo $row->blood_group; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">validity (Till) :</th>
                                                    <td><?php echo $row->valid_till; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class="fa fa-phone" aria-hidden="true"></i> </th>
                                                    <td><?php echo $row->phone_number; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><i class="fa fa-globe" aria-hidden="true"></i></th>
                                                    <td>https://indigemcp.com</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php $qrpath = "uploads/Employee_Documents/".$regionid."/".$row->employee_code."/".$row->employee_code.".png" ;  ?>
                                <div class="col-md-12">
                                    <div class="text-center">
                                       <!--<img src="<?php echo base_url();?>assets/images/QR_code.png" alt="qr code" class="employee_qr">-->
								       <img src="<?php echo base_url(); ?><?php echo $qrpath; ?>" alt="qr code" class="employee_qr">
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                <?php }  } ?>    
            </div>
        </div>
    </div>
  </div>
 
<script>
	function printpart () 
	{
	    var printwin = window.open("");
	    printwin.stop();
	    printwin.document.write(document.getElementById("toprint").innerHTML);
	    printwin.print();
	    printwin.close();
	}
</script>		
