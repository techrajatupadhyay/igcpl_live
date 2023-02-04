<?php

    if($this->session->userdata('user_login_access') != 1)
    {
        return redirect('Login'); 
    }
    
    if(isset($sellerid))
	{  	
		$sellerid = $sellerid;						  
	}
	else
	{
		$sellerid = " ";		
	}
    
    $labhid = $this->session->userdata('user_login_id');
    //$sellerid = $this->session->userdata('sellerid');
   
    //$labhid = $this->session->userdata('user_login_id');
	   	
    //$loggedUserId = $this->session->userdata('user_login_id');
   
      
    $seller_personaldata = $this->db->query("SELECT * FROM seller WHERE labh_agent_id='".$labhid."' AND seller_id='".$sellerid."' AND isactive=1");
    $sellerpersonal= $seller_personaldata->num_rows();
	
	$seller_status = $this->db->query("SELECT * FROM seller WHERE labh_agent_id='".$labhid."' AND seller_id='".$sellerid."' AND seller_status='1' limit 1 ");
	$seller_status = $seller_status->num_rows();
      
    $seller_document = $this->db->query("SELECT * FROM seller_document WHERE labhid='".$labhid."' AND seller_id='".$sellerid."' and (doc_type_id =1 || doc_type_id =2 || doc_type_id =3 || doc_type_id =4) and status=1");
    $sellerdoc= $seller_document->num_rows();
	
	$seller_payment = $this->db->query("SELECT * FROM seller WHERE seller_id='".$sellerid."'AND labh_agent_id='".$labhid."' AND ispaid='1' and (pay_status='Successful' || pay_status='Pending') AND isactive=1 ");
    $sellerpayment= $seller_payment->num_rows();
	     
    $seller_mou = $this->db->query("SELECT * FROM seller_document WHERE labhid='".$labhid."' AND seller_id='".$sellerid."' and (doc_type_id =5 || doc_type_id =6)  and status=1");
    $sellermou= $seller_mou->num_rows();
	
	$seller_mou_doc = $this->db->query("SELECT * FROM seller_document WHERE labhid='".$labhid."' AND seller_id='".$sellerid."' and doc_type_id =5   and status=1");
    $sellermoudoc= $seller_mou_doc->num_rows();
	
	$seller_payment = $this->db->query("SELECT * FROM seller_document WHERE labhid='".$labhid."' AND seller_id='".$sellerid."' and  doc_type_id =6  and status=1");
    $sellerpaymentdoc= $seller_payment->num_rows();
    
?>

<style>
   .check-icon{
   border-radius: 50%;
   border: 1px solid #00821a;
   padding:5px;
   color:#00821a;
   background-color:rgba(37,180,91,.2)!important;
   margin-right:5px;
   }
   .sub-nav{
   margin: -7px -7px -7px 0px;
   color:#000;
   border-right:1px solid #0078d2;
   }
   .sub-navbar ul{
   }
   .sub-nav a{
   color:#6e6e6e;
   margin-right: 42px;
   font-size: 17px;
   font-weight: 500;
   font-family: "Poppins", sans-serif;
   }
   .sub-navbar{
   border-radius: 15px 15px 0px 0px;
   background:#f1f5ffb0;
   }
   .nav-pills .nav-link.active, .show>.nav-pills .nav-link {
   color: green;
   border-bottom: 1px solid;
   width: 100%;
   background-color: #fff;
   }
   .active .fa-check{
   border-radius: 50%;
   border: 1px solid #fff;
   padding:5px;
   color: #fff;
   background-color:#008000!important;
   margin-right:5px;
   }
   /*	.sub-nav.active{
   color: #007bff !important; 
   background-color: #fff !important; 
   border-right:1px solid !important;
   border-bottom:1px solid !important;
   width:100%;
   }
   .nav-pills .nav-link.active, .show>.nav-pills .nav-link {
   color: #007bff !important; 
   background-color: #fff !important; 
   border: 0px 1px 1px 0px  solid !important;
   width:100%;
   }*/
   /* Fade in */
   .sub-nav a::before {
   content: "";
   position: absolute;
   display: block;
   width: 100%;
   height: 2px;
   bottom: 0;
   left: 0;
   background-color: #000;
   transform: scaleX(0);
   transition: transform 0.3s ease;
   }
</style> 
   				
		<ul class="nav nav-pills nav-fill mt-3 mb-2">
		    <li class="nav-item sub-nav">
			    <a class="nav-link <?php if ($sellerpersonal >0) { ?> active<?php } ?>" href="<?php if ($sellerpersonal >0) { echo site_url("SellerRegister/seller_personal_details/".$sellerid."") ; } ?>">
			        <i class="check-icon fa fa-check" aria-hidden="true"></i> Seller Infomation
			    </a>
		    </li>
			
		    <li class="nav-item sub-nav">
			    <a class="nav-link <?php if ($sellerdoc > 0) { ?> active<?php } ?>" href="<?php if ($sellerdoc >0) { echo site_url("SellerRegister/Documents/".$sellerid.""); } ?>">
			        <i class="check-icon fa fa-check" aria-hidden="true"></i> Documents
			    </a>
		    </li>
			
		    <li class="nav-item sub-nav">
			    <a class="nav-link <?php if ($sellerpayment > 0) { ?> active<?php } ?>" href="<?php if ($sellerpayment >0) { echo site_url("SellerRegister/Payment/".$sellerid.""); } ?>">
				    <i class="check-icon fa fa-check" aria-hidden="true"></i> Payment
				</a>
		    </li>
			
		    <li class="nav-item sub-nav">
			    <a class="nav-link <?php if ($sellermou >0) { ?> active<?php } ?>" href="<?php if ($sellermou >0) { echo site_url("SellerRegister/mou/".$sellerid.""); } ?>">
				    <i class="check-icon fa fa-check" aria-hidden="true"></i> MOU
				</a>
		    </li>
			
		    <li class="nav-item sub-nav" style="border:none;">
			    <a class="nav-link <?php if ($sellerpersonal && $sellerdoc && $sellermou && $sellerpaymentdoc && $sellermoudoc && $seller_status > 0 ) { ?> active<?php } ?>" href="<?php if ($sellerpersonal && $sellerdoc && $sellermou && $sellerpaymentdoc && $sellermoudoc && $seller_status > 0 ) { echo site_url("SellerRegister/application_preview/".$sellerid."");  } ?>" >
			        <i class="check-icon fa fa-check" aria-hidden="true"></i> Preview
			    </a>
		    </li>
		</ul>
   
   
 