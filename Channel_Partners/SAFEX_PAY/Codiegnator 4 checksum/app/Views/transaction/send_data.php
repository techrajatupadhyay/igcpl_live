 <html>
<head>
<script type="text/javascript" src="<?=base_url('assets/js/jquery.min.js');?>"></script> 
<meta charset="utf-8" />
<title>Payment Service Provider | Merchant Accounts</title>
<style>
.has-success .form-control, .has-success .control-label, .has-success .radio, .has-success .checkbox, .has-success .radio-inline, .has-success .checkbox-inline {
	color: #1cb78c !important;
}
.has-success .help-block {
	color: #1cb78c !important;
	border-color: #1cb78c !important;
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #1cb78c;
}
.has-error .form-control, .has-error .help-block, .has-error .control-label, .has-error .radio, .has-error .checkbox, .has-error .radio-inline, .has-error .checkbox-inline {
	color: #f0334d;
	border-color: #f0334d;
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #f0334d;
}
table {
	color: #333; /* Lighten up font color */
	font-family: "Raleway", Helvetica, Arial, sans-serif;
	font-weight: bold;
	width: 640px;
	border-collapse: collapse;
	border-spacing: 0;
}
td, th {
	border: 1px solid #CCC;
	height: 30px;
} /* Make cells a bit taller */
th {
	background: #F3F3F3; /* Light grey background */
	font-weight: bold; /* Make sure theyre bold */
	font-color: #1cb78c !important;
}
td {
	background: #FAFAFA; /* Lighter grey background */
	text-align: left;
	padding: 2px;/* Center our text */
}
label {
	font-weight: normal;
	display: block;
}
</style>
</head>
<body>
<form class="form-horizontal" id="payg_payment_form" action="<?=$payg_payment_url?>" method="POST">

<input type="hidden" class="form-control" name="me_id" id="" value="<?=$return_elements['me_id'];?>" />
                  <input type="hidden" class="form-control" name="merchant_request" id="" value="<?=$return_elements['merchant_request'];?>" />
                  <input type="hidden" class="form-control" name="hash" id="" value="<?=$return_elements['hash'];?>" />
                  
  <div class="container cs-border-light-blue"> 
    
    <!-- first line -->
    <div class="row pad-top"></div>
    <!-- end first line -->
    
    <div class="equalheight row" style="padding-top: 10px;">
      <div id="cs-main-body" class="cs-text-size-default pad-bottom">
        <div class="col-sm-9  equalheight-col pad-top">
          <div style="padding-bottom: 50px;">
            <h1>Initiating your payment process</h1>
            <div class="row">
              <div class="col-sm-12">
                <legend>Your payment is being processed, Please wait for a moment.</legend>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</form>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(e) {
   $("#payg_payment_form").submit();
});
</script>  