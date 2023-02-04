<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{
  
    public function __construct()
    {
		parent::__construct();
		//ini_set('error_reporting', E_ALL);
		//ini_set('display_errors', '1');
		
		//$this->load->library('Payg');
		$this->load->model('Seller_model');
		$this->load->model('Admin_model');
		$this->load->library('Payg');
		$this->load->library('email');
        
		//$this->load->library('Payg');
		//$this->payg =  new \application\libraries\Payg();
	/*	
		$payg_config = new \Config\PaygConfig(); 
		$this->payg =     new \App\Libraries\Payg(); 
		$this->merchant_key=$payg_config->merchant_key;
		$this->aggregator_id=$payg_config->aggregator_id; 
		$this->merchant_id=$payg_config->merchant_id;
		$this->payg_url=$payg_config->pay_url;		
		$this->merchant_key=$payg_config->merchant_key;
		$this->aggregator_id=$payg_config->aggregator_id; 
		$this->merchant_id=$payg_config->merchant_id;
		$this->payg_url=$payg_config->pay_url;
	*/
	
		//$this->merchant_key = 'zEjxm6Km1Y1lNxpnIVybKbWCdPqya7Bfn6zjwZO06MM=';  for testing
		$this->merchant_key = '1MEWWe8SirXYhEsYLwzou2PesNDPZhoOcYVv7Ftauak=';
		$this->aggregator_id = 'Paygate'; 
		//$this->merchant_id = '202209050002';  for testing
		$this->merchant_id = '202301210021';
		//$this->payg_url = 'https://pguat.safexpay.com/agcore/paymentProcessing';   
		$this->payg_url = 'https://www.avantgardepayments.com/agcore/paymentProcessing';
				
    }
	 
	public function index()
	{
		
	    return $this->load->view('transaction/index');
		
	}
	
	public function encrypt($text, $key, $type)
    { 

        $iv = "0123456789abcdef"; 
        $size =16;
        $pad = $size - (strlen($text) % $size);
        $padtext = $text . str_repeat(chr($pad) , $pad);
        $crypt = openssl_encrypt($padtext,"AES-256-CBC", base64_decode($key), OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING,$iv); 
        return base64_encode($crypt);
		
    }
	
	
	public function decrypt($crypt, $key, $type) 
    {
		
		$iv = "0123456789abcdef";
		$crypt = base64_decode($crypt);
		$padtext = openssl_decrypt($crypt, "AES-256-CBC", base64_decode($key), OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv);
		$pad = ord($padtext[strlen($padtext) - 1]);
		if ($pad > strlen($padtext)) 
		{
			return false;
		}
		if (strspn($padtext, $padtext[strlen($padtext) - 1], strlen($padtext) - $pad) != $pad) 
		{
			$text = "Error";
		}
		$text = substr($padtext, 0, -1 * $pad);

		return $text;

	}
	

	public function sendData()
	{
		
		if(isset($_POST))
		//if(isset($_POST) && isset($_POST['order_no']) && !empty($_POST['order_no']))
		{
						
			$post = $_POST ;
			$userid = $post['sellerid'] ;
			$labhid = $post['labhid'] ;
			//$sql ="SELECT * from payment_details_safe " ;
			//$pay_count = $this->db->query($sql)->num_rows();
			//$r = $pay_count + 1;
			$digits = 5;
            $ran = rand(pow(10, $digits-1), pow(10, $digits)-1);
			$type ='OB';
			$order_no = $userid.$ran.$type ;
						
			$sql2 ="SELECT * from seller Where seller_id=".$userid." and isactive=1" ;
			$data['seller'] = $this->db->query($sql2)->result();	
			
			foreach($data['seller'] as $sell)
			{				
			    $cust_name = $sell->fname;
                $mobile_no = $sell->contact;
				$email_id = $sell->email;
			}
					
			$return_elements = array();
			$return_elements['me_id'] = $this->merchant_id;
			$txn_details = $this->aggregator_id . '|' . $this->merchant_id . '|' . $order_no . '|' . $post['amount'] . '|' . $post['country'] . '|' . $post['currency'] . '|' . $post['txn_type'] . '|' . $post['success_url'] . '|' . $post['failure_url'] . '|' . $post['channel'];
			//echo $this->payg_url;
			//print_r($txn_details); 
			//die;
			
			$pg_details    =  $post['pg_id'] . '|' . $post['paymode'] . '|' . $post['scheme'] . '|' . $post['emi_months'];
			$card_details  =  $post['card_no'] . '|' . $post['exp_month'] . '|' . $post['exp_year'] . '|' . $post['cvv2'] . '|' . $post['card_name'];
			$cust_details  =  $cust_name . '|' . $email_id . '|' . $mobile_no . '|' . $post['unique_id'] . '|' . $post['is_logged_in'];
			$bill_details  =  $post['bill_address'] . '|' . $post['bill_city'] . '|' . $post['bill_state'] . '|' . $post['bill_country'] . '|' . $post['bill_zip'];
			$ship_details  =  $post['ship_address'] . '|' . $post['ship_city'] . '|' . $post['ship_state'] . '|' . $post['ship_country'] . '|' . $post['ship_zip'] . '|' . $post['ship_days'] . '|' . $post['address_count'];
			$item_details  =  $post['item_count'] . '|' . $post['item_value'] . '|' . $post['item_category'];
			$UPI_Details   =  $post['UPI_Details'];
			$other_details =  $userid . '|' . $type . '|' . $labhid . '|' . $post['udf_4'] . '|' . $post['udf_5'];
			
			$request = $txn_details."~".$pg_details."~".$card_details."~".$cust_details."~".$bill_details."~".$ship_details."~".$item_details."~".$UPI_Details."~".$other_details;
			//var_dump($request);
			
			$return_elements['merchant_request'] = $this->encrypt($request,$this->merchant_key,256);
			
			$values = $this->merchant_id."~".$order_no."~".$post['amount']."~".$post['country']."~".$post["currency"];
			$hash = hash("sha256",$values,FALSE);
			$return_elements['hash'] = $this->encrypt($hash,$this->merchant_key,256);         			
			$data=['return_elements'=>$return_elements,'payg_payment_url'=>$this->payg_url];			
			//return$this->load->view('transaction/send_data', $data);
			
			if (isset($return_elements))
            {
               
				
                echo '<html>

					<head>

					<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

					<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

					<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

					<script type="text/javascript" src="https://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>

					<script type="text/javascript" src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>

					<script type="text/javascript" src="http://formvalidation.io/vendor/jquery.steps/js/jquery.steps.min.js"></script><?php */?>

					<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css" rel="stylesheet" />

					<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" />

					<link href="http://formvalidation.io/vendor/jquery.steps/css/jquery.steps.css" rel="stylesheet" />

					<link href="http://formvalidation.io/vendor/formvalidation/css/formValidation.min.css" rel="stylesheet" /><?php */?>

					<script type="text/javascript" src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script><?php */?>

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

					<form class="form-horizontal" id="payg_payment_form" action="'.$this->payg_url.'" method="POST">


					<input type="hidden" class="form-control" name="me_id" id="" value="' . $this->merchant_id . '" />

					<input type="hidden" class="form-control" name="merchant_request" id="" value="'.$return_elements['merchant_request'].'" /> 

					<input type="hidden" class="form-control" name="hash" id="" value="'.$return_elements['hash'] .'" /> 



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
						$(document).ready(function(e) 
						{
							$("#payg_payment_form").submit();
						});
					</script>';

            }
            else
            {
                echo "no data found";				
            }
						
		}		
		
	}


	public function response()
	{
		
		if(isset($_POST) && isset($_POST['txn_response']) && !empty($_POST['txn_response']))
		{
			
			date_default_timezone_set('Asia/Kolkata');      
            $created_on = date('Y-m-d H:i:s', time());
			
			$post = $_POST;				 	
			$return_elements = array();			
			//Transaction Response
			$post['txn_response'] = isset($post['txn_response']) ? $post['txn_response'] : '';
			$txn_response = $this->decrypt($post['txn_response'], $this->merchant_key,256);			
			//print_r($txn_response);die;

			$txn_response_hash  = explode('~', rawurldecode($txn_response));

            //print_r($txn_response_hash);
		    $txn_res_hash  = $txn_response_hash[1];
			$txn_response_actual = $txn_response_hash[0].''.$txn_response_hash[2];	
	
			$txn_response_arr = explode('|',$txn_response_actual);
				   
			$hash 	= (isset($txn_response_arr[10]) ? $txn_response_arr[10] : '')."~".(isset($txn_response_arr[1]) ? $txn_response_arr[1] : '')."~".(isset($txn_response_arr[2]) ? $txn_response_arr[2] : '')."~".(isset($txn_response_arr[3]) ? $txn_response_arr[3] : '')."~".(isset($txn_response_arr[4]) ? $txn_response_arr[4] : '')."~".(isset($txn_response_arr[5]) ? $txn_response_arr[5] : '')."~".(isset($txn_response_arr[8]) ? $txn_response_arr[8] : '');	
			$checksum  = hash("sha256", $hash, FALSE);
			$create_hash  = $this->encrypt($checksum,$this->merchant_key,256);	
		
			//print_r($checksum);	die;	
			if($txn_res_hash == $create_hash) 
			{
				$return_elements['txn_response']['protocol'] = 'Genuine';
			} 
		    else 
			{
				$return_elements['txn_response']['protocol'] = 'Fake';
			}
			

			$return_elements['txn_response']['ag_id'] 			= isset($txn_response_arr[0]) ? $txn_response_arr[0] : '';
			$return_elements['txn_response']['me_id'] 			= isset($txn_response_arr[1]) ? $txn_response_arr[1] : '';
			$return_elements['txn_response']['order_no'] 		= isset($txn_response_arr[2]) ? $txn_response_arr[2] : '';
			$return_elements['txn_response']['amount'] 			= isset($txn_response_arr[3]) ? $txn_response_arr[3] : '';
				
			$return_elements['txn_response']['country'] 		= isset($txn_response_arr[4]) ? $txn_response_arr[4] : '';
			$return_elements['txn_response']['currency'] 		= isset($txn_response_arr[5]) ? $txn_response_arr[5] : '';
			$return_elements['txn_response']['txn_date'] 		= isset($txn_response_arr[6]) ? $txn_response_arr[6] : '';
			$return_elements['txn_response']['txn_time'] 		= isset($txn_response_arr[7]) ? $txn_response_arr[7] : '';
			$return_elements['txn_response']['ag_ref'] 			= isset($txn_response_arr[8]) ? $txn_response_arr[8] : '';
			$return_elements['txn_response']['pg_ref'] 			= isset($txn_response_arr[9]) ? $txn_response_arr[9] : '';
			$return_elements['txn_response']['status'] 			= isset($txn_response_arr[10]) ? $txn_response_arr[10] : '';
			//$return_elements['txn_response']['txn_type'] 		= isset($txn_response_arr[11]) ? $txn_response_arr[11] : '';
			$return_elements['txn_response']['res_code'] 		= isset($txn_response_arr[11]) ? $txn_response_arr[11] : '';
			$return_elements['txn_response']['res_message'] 	= isset($txn_response_arr[12]) ? $txn_response_arr[12] : '';
			
			//Payment Gateway Details
			$post['pg_details']					= isset($post['pg_details']) ? $post['pg_details'] : '';
			$pg_details 						= $this->decrypt($post['pg_details'],$this->merchant_key, 256);
			$pg_details_arr						= explode('|', $pg_details);
			$return_elements['pg_details']['pg_id'] 			= isset($pg_details_arr[0]) ? $pg_details_arr[0] : '';
			$return_elements['pg_details']['pg_name'] 			= isset($pg_details_arr[1]) ? $pg_details_arr[1] : '';
			$return_elements['pg_details']['paymode'] 			= isset($pg_details_arr[2]) ? $pg_details_arr[2] : '';
			$return_elements['pg_details']['emi_months'] 		= isset($pg_details_arr[3]) ? $pg_details_arr[3] : '';

			//Fraud Details
			$post['fraud_details']				= isset($post['fraud_details']) ? $post['fraud_details'] : '';
			$fraud_details 						= $this->decrypt($post['fraud_details'],$this->merchant_key, 256);
			$fraud_details_arr					= explode('|', $fraud_details);
			$return_elements['fraud_details']['fraud_action'] 	= isset($fraud_details_arr[0]) ? $fraud_details_arr[0] : '';
			$return_elements['fraud_details']['fraud_message'] 	= isset($fraud_details_arr[1]) ? $fraud_details_arr[1] : '';
			$return_elements['fraud_details']['score'] 			= isset($fraud_details_arr[2]) ? $fraud_details_arr[2] : '';

			//Other Details
			$post['other_details']				= isset($post['other_details']) ? $post['other_details'] : '';
			$other_details 						= $this->decrypt($post['other_details'],$this->merchant_key, 256);
			$other_details_arr					= explode('|', $other_details);
			$return_elements['other_details']['udf_1'] 			= isset($other_details_arr[0]) ? $other_details_arr[0] : '';
			$return_elements['other_details']['udf_2'] 			= isset($other_details_arr[1]) ? $other_details_arr[1] : '';
			$return_elements['other_details']['udf_3'] 			= isset($other_details_arr[2]) ? $other_details_arr[2] : '';
			$return_elements['other_details']['udf_4'] 			= isset($other_details_arr[3]) ? $other_details_arr[3] : '';
			$return_elements['other_details']['udf_5'] 			= isset($other_details_arr[4]) ? $other_details_arr[4] : ''; 
			
			$data=['return_elements'=>$return_elements];
			//return view('transaction/response', $data);			
			//return $this->load->view('transaction/response', $data);
			
			$order_no = $return_elements['txn_response']['order_no'];
			$amount = $return_elements['txn_response']['amount'];
			//$amount = intval($amount);
			$txn_date = $return_elements['txn_response']['txn_date'];
		    $txn_time = $return_elements['txn_response']['txn_time'];			
			$res_code = $return_elements['txn_response']['res_code'];
			$status = $return_elements['txn_response']['status'];
			$ag_ref = $return_elements['txn_response']['ag_ref'];
			$pg_ref = $return_elements['txn_response']['pg_ref'];
			$res_message = $return_elements['txn_response']['res_message'];
			$user_id = $return_elements['other_details']['udf_1'];
            $pay_type = $return_elements['other_details']['udf_2'];	
            $labhid = $return_elements['other_details']['udf_3'];
			$reg_duration = $return_elements['other_details']['udf_4'];
			
            $pg_name = $return_elements['pg_details']['pg_name'];
            $paymode = $return_elements['pg_details']['paymode'];
            $renew_date = date('Y-m-d', strtotime("+ ".$reg_duration." years"));			
															
			if ($status == 'Failed') 
			{
				
				$payment_data = [
							'user_id' =>  $user_id,
							'pay_type'=> $pay_type,
							'order_no'=> $order_no,
							'amount' => $amount,
							'payment_id' => $ag_ref,
							'payment_status' => $status,
							'payment_request_id' => $res_code,
							'ag_ref' => $ag_ref,
							'pg_ref' => $pg_ref,
							'res_message' => $res_message,							
							'pg_name' => $pg_name,
							'paymode' => $paymode,														
							'txn_date' => $txn_date,
							'txn_time' => $txn_time,
							'status' => 0,
							'created_at' => $created_on,
							'updated_at' => $created_on
					    ];
					$p_info = $this->db->insert('payment_details_safe', $payment_data);
                    $p_info = $this->db->insert_id();
                    //print_r($this->db->last_query());	
				    				
				if($p_info > 0)	
				{
					
					$sql3 ="SELECT * from users Where user_id='".$labhid."' and status='ACTIVE' " ;
					$data['labh_abhikreta'] = $this->db->query($sql3)->result();	
							
					foreach($data['labh_abhikreta'] as $labh)
					{				
						$cust_name = $labh->first_name;							
						$email_id = $labh->em_email;
						$usertype = $labh->user_type;
						$em_image = $labh->em_image;						
					}
					
                    $this->session->set_userdata("user_login_access", "1");
					$this->session->set_userdata("user_login_id", $labhid);
					$this->session->set_userdata("name", $cust_name);
					$this->session->set_userdata("email", $email_id);
					$this->session->set_userdata("user_image",$em_image );
					$this->session->set_userdata("user_type", $usertype);
					
					
                    $this->session->set_flashdata('status_test', 'Payment Failed, Please try again !');
					$this->session->set_flashdata('status_icon', 'warning');
					$this->session->set_flashdata('status', 'Payment Failed !');
					//redirect('SellerRegister/Payment');
                    return redirect("SellerRegister/Payment/".$user_id." ");					
					
				}

			}
            else
            {

                if ($status == 'Pending') 
                {

                    $payment_data = [
						    'user_id' => $user_id,
							'pay_type'=> $pay_type,
							'order_no'=> $order_no,
							'amount' => $amount,
							'payment_id' => $ag_ref,
							'payment_status' => $status,
							'payment_request_id' => $res_code,
							'ag_ref' => $ag_ref,
							'pg_ref' => $pg_ref,
							'res_message' => $res_message,							
							'pg_name' => $pg_name,
							'paymode' => $paymode,														
							'txn_date' => $txn_date,
							'txn_time' => $txn_time,
							'status' => 1,
							'created_at' => $created_on,
							'updated_at' => $created_on
						];
						
                    $p_info = $this->db->insert('payment_details_safe', $payment_data);
                    $p_info = $this->db->insert_id();
                    //print_r($this->db->last_query());
					
					$sell_pay_data = [
							    'ispaid' =>  1,
								'amount' =>  $amount,
								'pay_status' =>  $status,
								'order_id' =>  $order_no,
								'reg_duration' => $reg_duration,
								'paid_on'=> $created_on,
                                'renew_date' => $renew_date,								
							];
						$this->db->set($sell_pay_data);									
						$this->db->where('seller_id',$user_id);
						$this->db->where('labh_agent_id',$labhid);
						$this->db->where('isactive',1);
						$this->db->update('seller', $sell_pay_data);
						$sell_pay_requ = $this->db->affected_rows();
						//print_r($this->db->last_query());	
					                  
                    if ($p_info) 
                    {  
				
				        $sql2 ="SELECT * from seller Where seller_id='".$user_id."' and isactive=1" ;
						$data['seller'] = $this->db->query($sql2)->result();	
						
						foreach($data['seller'] as $sell)
						{				
							$cust_name = $sell->fname;
							$mobile_no = $sell->contact;
							$email_id = $sell->email;
						}
						
				        $this->load->library('email');						
						$message  = 'Dear Client <b>'.ucwords(strtolower($cust_name)).'</b>,<br><br>';
						$message .= 'Your Payment for Onboarding  with INDIGEM CHANNEL PARTNERS PVT. LTD. <br>';
						$message .= 'is Pending, Please Contact for more information.<br>';
						$message .= 'Your Payment details is...<br>';
						$message .= 'Payment Status : <b>'.$status.'</b> <br>';
						$message .= 'Amount : <b>'.$amount.' ₹</b> <br>';
						$message .= 'Order Number : <b>'.$order_no.'</b> <br>';
						$message .= 'Bank Name : <b>'.$pg_name.'</b> <br>';
						$message .= 'Mode of Payment : <b>'.$paymode.'</b> <br>';
						$message .= 'Date & Time : <b>'.$txn_date . $txn_time.'</b>';
						$message .= '<br><br><br>';
						$message .= ' Regards <br>';
						$message .= 'INDIGEMCP';

									
						$config = array(
								'protocol'  => 'smtp',
								'smtp_host' => 'mail.smtp2go.com',
								'smtp_port' => 2525,						
								'smtp_user' => 'indigemcp',
								'smtp_pass' => 'VmIMtvHx6xzNhmln',
								'mailtype'  => 'html',
								'charset'   => 'utf-8',
								'smtp_timeout' => '30',
								'mailpath' => '/usr/sbin/sendmail',
								'wordwrap' => TRUE
							);
						$this->email->initialize($config);
						$this->email->set_mailtype("html");
						$this->email->set_newline("\r\n");
						
						$htmlContent = $message;
						$this->email->to($email_id);
						$this->email->from('indigeminfo@gmail.com', 'indigeminfo@gmail.com');
						$this->email->subject('Payment Status || INDIGEMCP');
						$this->email->message($htmlContent);
									
						$email_response= $this->email->send();
						//var_dump($email_response);				
						$errors = $this->email->print_debugger();
						//var_dump($errors);
						//echo $email_response;
						
						
					    $sql3 ="SELECT * from users Where user_id='".$labhid."' and status='ACTIVE' " ;
						$data['labh_abhikreta'] = $this->db->query($sql3)->result();	
							
						foreach($data['labh_abhikreta'] as $labh)
						{				
							$cust_name = $labh->first_name;							
							$email_id = $labh->em_email;
							$usertype = $labh->user_type;
							$em_image = $labh->em_image;
							
						}
						
						$this->session->set_userdata("user_login_access", "1");
						$this->session->set_userdata("user_login_id", $labhid);
						$this->session->set_userdata("name", $cust_name);
						$this->session->set_userdata("email", $email_id);
						$this->session->set_userdata("user_image",$em_image );
						$this->session->set_userdata("user_type", $usertype);  
					
					
						$this->session->set_flashdata('status_test', 'Payment Pending, Please Contact for more information !');
						$this->session->set_flashdata('status_icon', 'warning');
						$this->session->set_flashdata('status', 'Payment Pending !');
						
						return redirect("SellerRegister/Payment/".$user_id." ");
						
                    }
                    else
                    {
						
						$sql3 ="SELECT * from users Where user_id='".$labhid."' and status='ACTIVE' " ;
						$data['labh_abhikreta'] = $this->db->query($sql3)->result();	
							
						foreach($data['labh_abhikreta'] as $labh)
						{				
							$cust_name = $labh->first_name;							
							$email_id = $labh->em_email;
							$usertype = $labh->user_type;
							$em_image = $labh->em_image;							
						}
						
						$this->session->set_userdata("user_login_access", "1");
						$this->session->set_userdata("user_login_id", $labhid);
						$this->session->set_userdata("name", $cust_name);
						$this->session->set_userdata("email", $email_id);
						$this->session->set_userdata("user_image",$em_image );
						$this->session->set_userdata("user_type", $usertype);
						
						$this->session->set_flashdata('status_test', 'Payment Unsuccessful, Please Contact for more information !');
						$this->session->set_flashdata('status_icon', 'warning');
						$this->session->set_flashdata('status', 'Payment Unsuccessful !');
						
						return redirect("SellerRegister/Payment/".$user_id." ");
						                       
                    }
					
                }
                else
                {

                    $payment_data = [
							    'user_id' =>  $user_id,
								'pay_type'=> $pay_type,
								'order_no'=> $order_no,
								'amount' => $amount,
								'payment_id' => $ag_ref,
								'payment_status' => $status,
								'payment_request_id' => $res_code,
								'ag_ref' => $ag_ref,
								'pg_ref' => $pg_ref,
								'res_message' => $res_message,							
								'pg_name' => $pg_name,
								'paymode' => $paymode,														
								'txn_date' => $txn_date,
								'txn_time' => $txn_time,
								'status' => 2,
								'created_at' => $created_on,
								'updated_at' => $created_on
							];
                    $p_info = $this->db->insert('payment_details_safe', $payment_data);
                    $p_info = $this->db->insert_id();
					  
					$sell_pay_data = [
							    'ispaid' =>  1,
								'amount' =>  $amount,
								'pay_status' =>  $status,
								'order_id' =>  $order_no,
								'reg_duration' => $reg_duration,
								'paid_on'=> $created_on,
                                'renew_date' => $renew_date,								
							];
						$this->db->set($sell_pay_data);									
						$this->db->where('seller_id',$user_id);
						$this->db->where('labh_agent_id',$labhid);
						$this->db->where('isactive',1);
						$this->db->update('seller', $sell_pay_data);
						$sell_pay_requ = $this->db->affected_rows();
						//print_r($this->db->last_query());	
					                           
					if ($sell_pay_requ) 
					{
                      						
						$sql2 ="SELECT * from seller Where seller_id=".$user_id." and isactive=1" ;
						$data['seller'] = $this->db->query($sql2)->result();	
						
						foreach($data['seller'] as $sell)
						{				
							$cust_name = $sell->fname;
							$mobile_no = $sell->contact;
							$email_id = $sell->email;
						}
						
				        $this->load->library('email');						
						$message  = 'Dear Client <b>'.ucwords(strtolower($cust_name)).'</b>,<br><br>';
						$message .= 'Your Payment for Onboarding  with INDIGEM CHANNEL PARTNERS PVT. LTD. <br>';
						$message .= 'is Successfully submitted, Your Payment details is....<br>';						
						$message .= 'Payment Status : <b>'.$status.'</b> <br>';
						$message .= 'Amount : <b>'.$amount.' ₹</b> <br>';
						$message .= 'Order Number : <b>'.$order_no.'</b> <br>';						
						$message .= 'Bank Name : <b>'.$pg_name.'</b> <br>';
						$message .= 'Mode of Payment : <b>'.$paymode.'</b> <br>';
						$message .= 'Date & Time : <b>'.$txn_date . $txn_time.'</b>';
						$message .= '<br><br><br>';
						$message .= ' Regards <br>';
						$message .= 'INDIGEMCP';

									
						$config = array(
								'protocol'  => 'smtp',
								'smtp_host' => 'mail.smtp2go.com',
								'smtp_port' => 2525,						
								'smtp_user' => 'indigemcp',
								'smtp_pass' => 'VmIMtvHx6xzNhmln',
								'mailtype'  => 'html',
								'charset'   => 'utf-8',
								'smtp_timeout' => '30',
								'mailpath' => '/usr/sbin/sendmail',
								'wordwrap' => TRUE
							);
						$this->email->initialize($config);
						$this->email->set_mailtype("html");
						$this->email->set_newline("\r\n");
						
						$htmlContent = $message;
						$this->email->to($email_id);
						$this->email->from('indigeminfo@gmail.com', 'indigeminfo@gmail.com');
						$this->email->subject('Payment Status || INDIGEMCP');
						$this->email->message($htmlContent);							
						$email_response= $this->email->send();
						//var_dump($email_response);				
						$errors = $this->email->print_debugger();						
						
					    $sql3 ="SELECT * from users Where user_id='".$labhid."' and status='ACTIVE' " ;
						$data['labh_abhikreta'] = $this->db->query($sql3)->result();	
							
						foreach($data['labh_abhikreta'] as $labh)
						{				
							$cust_name = $labh->first_name;							
							$email_id = $labh->em_email;
							$usertype = $labh->user_type;
							$em_image = $labh->em_image;
							
						}
						
						$this->session->set_userdata("user_login_access", "1");
						$this->session->set_userdata("user_login_id", $labhid);
						$this->session->set_userdata("name", $cust_name);
						$this->session->set_userdata("email", $email_id);
						$this->session->set_userdata("user_image",$em_image );
						$this->session->set_userdata("user_type", $usertype);
						
						$this->session->set_flashdata('status_test', 'Your Payment has been successfully submitted !');
						$this->session->set_flashdata('status_icon', 'success');
						$this->session->set_flashdata('status', 'Payment Succcessful ');
						
						return redirect("SellerRegister/Payment/".$user_id." ");

					}
					else
					{
						
						$sql3 ="SELECT * from users Where user_id='".$labhid."' and status='ACTIVE' " ;
						$data['labh_abhikreta'] = $this->db->query($sql3)->result();	
							
						foreach($data['labh_abhikreta'] as $labh)
						{				
							$cust_name = $labh->first_name;							
							$email_id = $labh->em_email;
							$usertype = $labh->user_type;
							$em_image = $labh->em_image;
							
						}
						
						$this->session->set_userdata("user_login_access", "1");
						$this->session->set_userdata("user_login_id", $labhid);
						$this->session->set_userdata("name", $cust_name);
						$this->session->set_userdata("email", $email_id);
						$this->session->set_userdata("user_image",$em_image );
						$this->session->set_userdata("user_type", $usertype);
						
						$this->session->set_flashdata('status_test', 'Payment Unsuccessful, Please Contact for more information !');
						$this->session->set_flashdata('status_icon', 'warning');
						$this->session->set_flashdata('status', 'Payment Unsuccessful !');
						
						return redirect("SellerRegister/Payment/".$user_id." ");
						
					}
                }
            }			
		} 		
	}
	
	

	
		
	public function index_new() 
    {
                if ($this->request->getPost('submit') == 'भुगतान करें Net Banking से') {
                $db = \Config\Database::connect();
                $loggedUserId = session()->get('loggedUser');

                if ($loggedUserId) {

                     $users_qry = $db->query('SELECT * FROM users where user_id = '.$loggedUserId);
                     $user= $users_qry->getRowArray() ;

                     $name = $user['full_name'];
                     $contact_no = $user['contact_no'];
                     $email = $user['user_email'];
                     $user_id = $loggedUserId;
                     $amt = 101;


                    // code...
                }
				else
				{

                        $authModel = new AuthModel();
                       
                        $count_user = $authModel->findAll();
                        $reg = count($count_user);
                        $registerNo=1000000 + $reg + 1;
      

                        $password = rand (1000, 9999);
                        $user_password=hash_hmac('sha256', $password, 'aSm0$i_20eNh3os');

                        $email = $registerNo."@ramkedham.com";

                        $amt =     $this->request->getPost('total_amt');

                        $name = $this->request->getPost('name');
                        $contact_no = $this->request->getPost('contact_no');
                        $email = $email;

                          $saveData=array(
                            'registration_no' =>$registerNo, 
                            'user_name'=> $this->request->getPost('contact_no'),
                            'full_name'=> $this->request->getPost('name'),
                            'user_email'=> $email,
                            'domicile_dis'=>$this->request->getPost('domicile_dis'),
                            'ip_address'=>$_SERVER['REMOTE_ADDR'],
                            'user_login_ip'=>$_SERVER['REMOTE_ADDR'],
                            'contact_no'=> $this->request->getPost('contact_no'),
                            'user_password'=>password_hash($user_password, PASSWORD_DEFAULT),
                            'created_at' => date('Y-m-d')
                        );

                        $query = $authModel->save($saveData);
                        $user_id = $authModel->getInsertID();
                             
                            $curl = curl_init();
                            // curl_setopt_array($curl, array(
                            //   CURLOPT_URL => 'http://api.equence.in/pushsms?username=tecsm_ddrp&password=zyDT-19_&peId=1201162261478998529&tmplId=1207163441542117591&from=AKDJSR&charset=UTF-16&text=%E0%A4%9C%E0%A4%AF%20%E0%A4%B6%E0%A5%8D%E0%A4%B0%E0%A5%80%E0%A4%B0%E0%A4%BE%E0%A4%AE%0A%E0%A4%86%E0%A4%B5%E0%A5%87%E0%A4%A6%E0%A4%A8%20%E0%A4%B9%E0%A5%8B%20%E0%A4%97%E0%A4%AF%E0%A4%BE%20%E0%A4%B9%E0%A5%88%0A%E0%A4%86%E0%A4%88%E0%A4%A1%E0%A5%80:%20'.$registerNo.'%0A%E0%A4%AA%E0%A4%BE%E0%A4%B8%E0%A4%B5%E0%A4%B0%E0%A5%8D%E0%A4%A1:%20'.$password.'&to=91'.$this->request->getPost('contact_no').'',
                            //   CURLOPT_RETURNTRANSFER => true,
                            //   CURLOPT_ENCODING => '',
                            //   CURLOPT_MAXREDIRS => 10,
                            //   CURLOPT_TIMEOUT => 0,
                            //   CURLOPT_FOLLOWLOCATION => true,
                            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            //   CURLOPT_CUSTOMREQUEST => 'GET',
                            // ));
                           
                            //   curl_setopt_array($curl, array(
                            //    CURLOPT_URL => 'https://api.equence.in/pushsms?username=tecsm_ddrp&password=zyDT-19_&to=91'.$this->request->getPost('contact_no').'&from=AKDJSR&charset=auto&text=%E0%A4%9C%E0%A4%AF%20%E0%A4%B6%E0%A5%8D%E0%A4%B0%E0%A5%80%E0%A4%B0%E0%A4%BE%E0%A4%AE%20%250A%E0%A4%AD%E0%A5%81%E0%A4%97%E0%A4%A4%E0%A4%BE%E0%A4%A8%20%E0%A4%95%E0%A4%B0%20%E0%A4%AA%E0%A5%8D%E0%A4%B0%E0%A4%95%E0%A5%8D%E0%A4%B0%E0%A4%BF%E0%A4%AF%E0%A4%BE%20%E0%A4%AA%E0%A5%82%E0%A4%B0%E0%A5%8D%E0%A4%A3%20%E0%A4%95%E0%A4%B0%E0%A5%87%E0%A4%82%20%257C%250A%E0%A4%86%E0%A4%AA%E0%A4%95%E0%A4%BE%250A%E0%A4%AF%E0%A5%82%E0%A4%9C%E0%A4%B0%20ID%20-%20'.$registerNo.'%250A%E0%A4%AA%E0%A4%BE%E0%A4%B8%E0%A4%B5%E0%A4%B0%E0%A5%8D%E0%A4%A1%20-%20%20123432'.$password.'%250A%E0%A4%86%E0%A4%A8%E0%A4%82%E0%A4%A6%20%E0%A4%95%E0%A5%87%20%E0%A4%A7%E0%A4%BE%E0%A4%AE%0A',
                            //   CURLOPT_RETURNTRANSFER => true,
                            //   CURLOPT_ENCODING => '',
                            //   CURLOPT_MAXREDIRS => 10,
                            //   CURLOPT_TIMEOUT => 0,
                            //   CURLOPT_FOLLOWLOCATION => true,
                            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            //   CURLOPT_CUSTOMREQUEST => 'GET',
                            // ));
                            // $response = curl_exec($curl);

                            // curl_close($curl);
                            curl_setopt_array($curl, array(
                                     CURLOPT_URL => 'https://api.equence.in/pushsms?username=tecsm_ddrp&password=zyDT-19_&to=91'.$this->request->getPost('contact_no').'&from=AKDJSR&charset=auto&text=%E0%A4%9C%E0%A4%AF%20%E0%A4%B6%E0%A5%8D%E0%A4%B0%E0%A5%80%E0%A4%B0%E0%A4%BE%E0%A4%AE%20%0A%E0%A4%AD%E0%A5%81%E0%A4%97%E0%A4%A4%E0%A4%BE%E0%A4%A8%20%E0%A4%95%E0%A4%B0%20%E0%A4%AA%E0%A5%8D%E0%A4%B0%E0%A4%95%E0%A5%8D%E0%A4%B0%E0%A4%BF%E0%A4%AF%E0%A4%BE%20%E0%A4%AA%E0%A5%82%E0%A4%B0%E0%A5%8D%E0%A4%A3%20%E0%A4%95%E0%A4%B0%E0%A5%87%E0%A4%82%20%7C%0A%E0%A4%86%E0%A4%AA%E0%A4%95%E0%A4%BE%0A%E0%A4%AF%E0%A5%82%E0%A4%9C%E0%A4%B0%20ID%20-%20'.$registerNo.'%0A%E0%A4%AA%E0%A4%BE%E0%A4%B8%E0%A4%B5%E0%A4%B0%E0%A5%8D%E0%A4%A1%20-%20'.$password.'%0A%E0%A4%86%E0%A4%A8%E0%A4%82%E0%A4%A6%20%E0%A4%95%E0%A5%87%20%E0%A4%A7%E0%A4%BE%E0%A4%AE',
                                  CURLOPT_RETURNTRANSFER => true,
                                  CURLOPT_ENCODING => '',
                                  CURLOPT_MAXREDIRS => 10,
                                  CURLOPT_TIMEOUT => 0,
                                  CURLOPT_FOLLOWLOCATION => true,
                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                  CURLOPT_CUSTOMREQUEST => 'GET',
                                ));

                                $response = curl_exec($curl);

                                curl_close($curl);
                      


                }

               
                      

                     $base_url = "https://anandkdham.com/";

                    // $payg_payment_url = "https://pguat.safexpay.com/agcore/paymentProcessing";

                    $payg_payment_url = "https://www.avantgardepayments.com/agcore/paymentProcessing"; 

                    // for Merchant key

                   // $merchant_key = "89diCMlKzp+GWwwBm5aVDv6sD+7wJj9ewrMjC6MsHmc=";

                     $merchant_key = "GpxHY1D6zrG/Yj4y7BuQ7fmW40pbK2hkAfBtq4lmppQ=";



                    // for Merchant id

                    //$merchant_id = "202104230001";

                      $merchant_id = "202110140017";

                    // for Aggregator id

                    $aggregator_id = "paygate";

                    $country = "IND";

                    $amount = $amt;

                   // $amount = 10;

                    $currency = "INR";

                    $txn_type = "SALE";

                    $success_url = "https://anandkdham.com/Paymentcntrl/payment_conf_safe";

                    $failure_url = "https://anandkdham.com/Paymentcntrl/payment_conf_safe";

                    $channel = "WEB";

                 


                    $r  = rand();

                    $order_no = $r.'AJ-'.$user_id;





                $post = $_POST;

                $return_elements = array();

                $return_elements['me_id'] = $merchant_id;

                $txn_details = $aggregator_id . '|' . $merchant_id . '|' . $order_no . '|' . $amount . '|' . $country . '|' .  $currency . '|' . $txn_type . '|' .  $success_url . '|' . $failure_url . '|' . $channel;

                 

                $pg_details = $this->request->getPost('pg_id') . '|' . $this->request->getPost('paymode') . '|' . $this->request->getPost('scheme') . '|' . $this->request->getPost('emi_months');

                 

                $card_details = $this->request->getPost('card_no') . '|' . $this->request->getPost('exp_month') . '|' . $this->request->getPost('exp_year') . '|' . $this->request->getPost('cvv2') . '|' . $this->request->getPost('card_name');

                 

                $cust_details = $name . '|' . $email . '|' . $contact_no . '|' . $user_id . '|' . $this->request->getPost('is_logged_in');

                $bill_details = $this->request->getPost('bill_address') . '|' . $this->request->getPost('bill_city') . '|' . $this->request->getPost('bill_state') . '|' . $this->request->getPost('bill_country') . '|' . $this->request->getPost('bill_zip');

                $ship_details = $this->request->getPost('ship_address') . '|' . $this->request->getPost('ship_city') . '|' . $this->request->getPost('ship_state') . '|' . $this->request->getPost('ship_country') . '|' . $this->request->getPost('ship_zip') . '|' . $this->request->getPost('ship_days') . '|' . $this->request->getPost('address_count');

                $item_details = $this->request->getPost('item_count') . '|' . $this->request->getPost('item_value') . '|' . $this->request->getPost('item_category');

                $upi_details=$this->request->getPost('upi_details');

                $other_details =$user_id . '|' . $email . '|' . $contact_no . '|' . $this->request->getPost('udf_4') . '|' . $this->request->getPost('udf_5');

                $all_values =$txn_details.'~'.$pg_details.'~'.$card_details.'~'.$cust_details.'~'.$bill_details.'~'.$ship_details.'~'.$item_details.'~'.$upi_details.'~'.$other_details;

                $merchant_request['merchant_request'] = $this->encrypt($all_values, $merchant_key, 256);

                $hash = $merchant_id.'~'.$order_no.'~'.$amount.'~'.$country.'~'.$currency;

                $checksum =hash("sha256", $hash, FALSE);

                $merchant_request['hash'] =$this->encrypt($checksum, $merchant_key, 256);

                if (isset($return_elements))

                    {

                    echo '<HTML>

                <HEAD>

                  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

                <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

                <script type="text/javascript" src="https://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>

                <script type="text/javascript" src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>

                <script type="text/javascript" src="http://formvalidation.io/vendor/jquery.steps/js/jquery.steps.min.js"></script><?php */?>

                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css" rel="stylesheet" />

                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" />

                <link href="http://formvalidation.io/vendor/jquery.steps/css/jquery.steps.css" rel="stylesheet" />

                <link href="http://formvalidation.io/vendor/formvalidation/css/formValidation.min.css" rel="stylesheet" /><?php */?>

                <script type="text/javascript" src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script><?php */?>

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

                </HEAD>

                <BODY>

                <form class="form-horizontal" id="payg_payment_form" action="'.$payg_payment_url.'" method="POST">



                <input type="hidden" class="form-control" name="me_id" id="" value="' . $merchant_id . '" />

                <input type="hidden" class="form-control" name="merchant_request" id="" value="'.$merchant_request['merchant_request'].'" /> 

                <input type="hidden" class="form-control" name="hash" id="" value="'.$merchant_request['hash'] .'" /> 



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

                </BODY>

                </HTML>

                <script type="text/javascript">

                $(document).ready(function(e) {

                    $("#payg_payment_form").submit();

                });

                </script>';

                    }

                  else

                    {

                    echo "no data found";

                    }



                //decrypt function use for encryption

               

} else if ($this->request->getPost('submit') == 'भुगतान करें UPI से') {


                        $db = \Config\Database::connect();
                $loggedUserId = session()->get('loggedUser');

                if ($loggedUserId) {

                     $users_qry = $db->query('SELECT * FROM users where user_id = '.$loggedUserId);
                     $user= $users_qry->getRowArray() ;

                     $name = $user['full_name'];
                     $contact_no = $user['contact_no'];
                     $email = $user['user_email'];
                     $user_id = $loggedUserId;
                     $amt = 101;


                    // code...
                }else{

                        $authModel = new AuthModel();
                       
                        $count_user = $authModel->findAll();
                        $reg = count($count_user);
                        $registerNo=1000000 + $reg + 1;
      

                        $password = rand (1000, 9999);
                        $user_password=hash_hmac('sha256', $password, 'aSm0$i_20eNh3os');

                        $email = $registerNo."@ramkedham.com";

                        $amt =     $this->request->getPost('total_amt');

                        $name = $this->request->getPost('name');
                        $contact_no = $this->request->getPost('contact_no');
                        $email = $email;

                          $saveData=array(
                            'registration_no' =>$registerNo, 
                            'user_name'=> $this->request->getPost('contact_no'),
                            'full_name'=> $this->request->getPost('name'),
                            'user_email'=> $email,
                            'domicile_dis'=>$this->request->getPost('domicile_dis'),
                            'ip_address'=>$_SERVER['REMOTE_ADDR'],
                            'user_login_ip'=>$_SERVER['REMOTE_ADDR'],
                            'contact_no'=> $this->request->getPost('contact_no'),
                            'user_password'=>password_hash($user_password, PASSWORD_DEFAULT),
                            'created_at' => date('Y-m-d')
                        );

                        $query = $authModel->save($saveData);
                        $user_id = $authModel->getInsertID();
                             
                            $curl = curl_init();
                            // curl_setopt_array($curl, array(
                            //   CURLOPT_URL => 'http://api.equence.in/pushsms?username=tecsm_ddrp&password=zyDT-19_&peId=1201162261478998529&tmplId=1207163441542117591&from=AKDJSR&charset=UTF-16&text=%E0%A4%9C%E0%A4%AF%20%E0%A4%B6%E0%A5%8D%E0%A4%B0%E0%A5%80%E0%A4%B0%E0%A4%BE%E0%A4%AE%0A%E0%A4%86%E0%A4%B5%E0%A5%87%E0%A4%A6%E0%A4%A8%20%E0%A4%B9%E0%A5%8B%20%E0%A4%97%E0%A4%AF%E0%A4%BE%20%E0%A4%B9%E0%A5%88%0A%E0%A4%86%E0%A4%88%E0%A4%A1%E0%A5%80:%20'.$registerNo.'%0A%E0%A4%AA%E0%A4%BE%E0%A4%B8%E0%A4%B5%E0%A4%B0%E0%A5%8D%E0%A4%A1:%20'.$password.'&to=91'.$this->request->getPost('contact_no').'',
                            //   CURLOPT_RETURNTRANSFER => true,
                            //   CURLOPT_ENCODING => '',
                            //   CURLOPT_MAXREDIRS => 10,
                            //   CURLOPT_TIMEOUT => 0,
                            //   CURLOPT_FOLLOWLOCATION => true,
                            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            //   CURLOPT_CUSTOMREQUEST => 'GET',
                            // ));
                           
                            //   curl_setopt_array($curl, array(
                            //    CURLOPT_URL => 'https://api.equence.in/pushsms?username=tecsm_ddrp&password=zyDT-19_&to=91'.$this->request->getPost('contact_no').'&from=AKDJSR&charset=auto&text=%E0%A4%9C%E0%A4%AF%20%E0%A4%B6%E0%A5%8D%E0%A4%B0%E0%A5%80%E0%A4%B0%E0%A4%BE%E0%A4%AE%20%250A%E0%A4%AD%E0%A5%81%E0%A4%97%E0%A4%A4%E0%A4%BE%E0%A4%A8%20%E0%A4%95%E0%A4%B0%20%E0%A4%AA%E0%A5%8D%E0%A4%B0%E0%A4%95%E0%A5%8D%E0%A4%B0%E0%A4%BF%E0%A4%AF%E0%A4%BE%20%E0%A4%AA%E0%A5%82%E0%A4%B0%E0%A5%8D%E0%A4%A3%20%E0%A4%95%E0%A4%B0%E0%A5%87%E0%A4%82%20%257C%250A%E0%A4%86%E0%A4%AA%E0%A4%95%E0%A4%BE%250A%E0%A4%AF%E0%A5%82%E0%A4%9C%E0%A4%B0%20ID%20-%20'.$registerNo.'%250A%E0%A4%AA%E0%A4%BE%E0%A4%B8%E0%A4%B5%E0%A4%B0%E0%A5%8D%E0%A4%A1%20-%20%20123432'.$password.'%250A%E0%A4%86%E0%A4%A8%E0%A4%82%E0%A4%A6%20%E0%A4%95%E0%A5%87%20%E0%A4%A7%E0%A4%BE%E0%A4%AE%0A',
                            //   CURLOPT_RETURNTRANSFER => true,
                            //   CURLOPT_ENCODING => '',
                            //   CURLOPT_MAXREDIRS => 10,
                            //   CURLOPT_TIMEOUT => 0,
                            //   CURLOPT_FOLLOWLOCATION => true,
                            //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            //   CURLOPT_CUSTOMREQUEST => 'GET',
                            // ));
                            // $response = curl_exec($curl);

                            // curl_close($curl);
                            curl_setopt_array($curl, array(
                                     CURLOPT_URL => 'https://api.equence.in/pushsms?username=tecsm_ddrp&password=zyDT-19_&to=91'.$this->request->getPost('contact_no').'&from=AKDJSR&charset=auto&text=%E0%A4%9C%E0%A4%AF%20%E0%A4%B6%E0%A5%8D%E0%A4%B0%E0%A5%80%E0%A4%B0%E0%A4%BE%E0%A4%AE%20%0A%E0%A4%AD%E0%A5%81%E0%A4%97%E0%A4%A4%E0%A4%BE%E0%A4%A8%20%E0%A4%95%E0%A4%B0%20%E0%A4%AA%E0%A5%8D%E0%A4%B0%E0%A4%95%E0%A5%8D%E0%A4%B0%E0%A4%BF%E0%A4%AF%E0%A4%BE%20%E0%A4%AA%E0%A5%82%E0%A4%B0%E0%A5%8D%E0%A4%A3%20%E0%A4%95%E0%A4%B0%E0%A5%87%E0%A4%82%20%7C%0A%E0%A4%86%E0%A4%AA%E0%A4%95%E0%A4%BE%0A%E0%A4%AF%E0%A5%82%E0%A4%9C%E0%A4%B0%20ID%20-%20'.$registerNo.'%0A%E0%A4%AA%E0%A4%BE%E0%A4%B8%E0%A4%B5%E0%A4%B0%E0%A5%8D%E0%A4%A1%20-%20'.$password.'%0A%E0%A4%86%E0%A4%A8%E0%A4%82%E0%A4%A6%20%E0%A4%95%E0%A5%87%20%E0%A4%A7%E0%A4%BE%E0%A4%AE',
                                  CURLOPT_RETURNTRANSFER => true,
                                  CURLOPT_ENCODING => '',
                                  CURLOPT_MAXREDIRS => 10,
                                  CURLOPT_TIMEOUT => 0,
                                  CURLOPT_FOLLOWLOCATION => true,
                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                  CURLOPT_CUSTOMREQUEST => 'GET',
                                ));

                                $response = curl_exec($curl);

                                curl_close($curl);
                      


                }
                     $r  = rand();

                    $order_no = $r.'AJ-'.$user_id;
                        unset($_POST['i_agr']);
                        unset($_POST['submit']);
                        $salt = 'bcdd10c33b6b429c698644113c28fc1ecb9e889a'; //Pass your SALT here
                        $_POST['api_key'] = '8332ce92-37d8-41e3-a478-143e22a5c21c'; //Pass your API KEY here
                        $_POST['return_url'] = 'https://anandkdham.com/Paymentcntrl/payment_conf_omni';
                        $_POST['mode'] = 'LIVE';
                        $_POST['order_id']= $order_no;
                        $_POST['amount']= '101';
                        $_POST['currency'] = 'INR';
                        $_POST['description']= 'anandkdham';
                        $_POST['name']=$this->request->getPost('name');
                        $_POST['email']=$email;
                        $_POST['phone']=$this->request->getPost('contact_no');
                        $_POST['address_line_1']="";
                        $_POST['address_line_2']= "";
                        $_POST['city']= $this->request->getPost('domicile_dis');
                        $_POST['state']= "MP";
                        $_POST['zip_code']="462001";
                        $_POST['country']="IND";
                        $_POST['udf1']=$user_id;
                        // $_POST['udf2']="";
                        // $_POST['udf3']="";
                        // $_POST['udf4']="";
                        // $_POST['udf5']="";

                      //  print_r($_POST); die();
                        $hash = $this->hashCalculate($salt, $_POST);

                        ?>
                        <p>Redirecting...</p>
                        <form action="https://pgbiz.omniware.in/v2/paymentrequest" id="payment_form" method="POST">
                        <input type="hidden" value="<?php echo $hash; ?>"                   name="hash"/>
                        <input type="hidden" value="<?php echo $_POST['api_key'];?>"        name="api_key"/>
                        <input type="hidden" value="<?php echo $_POST['return_url']; ?>"    name="return_url"/>
                        <input type="hidden" value="<?php echo $_POST['mode'];?>"           name="mode"/>
                        <input type="hidden" value="<?php echo $_POST['order_id'];?>"       name="order_id"/>
                        <input type="hidden" value="<?php echo $_POST['amount'];?>"         name="amount"/>
                        <input type="hidden" value="<?php echo $_POST['currency'];?>"       name="currency"/>
                        <input type="hidden" value="<?php echo $_POST['description'];?>"    name="description"/>
                        <input type="hidden" value="<?php echo $_POST['name'];?>"           name="name"/>
                        <input type="hidden" value="<?php echo $_POST['email'];?>"          name="email"/>
                        <input type="hidden" value="<?php echo $_POST['phone'];?>"          name="phone"/>
                        <input type="hidden" value="<?php echo $_POST['address_line_1'];?>" name="address_line_1"/>
                        <input type="hidden" value="<?php echo $_POST['address_line_2'];?>" name="address_line_2"/>
                        <input type="hidden" value="<?php echo $_POST['city'];?>"           name="city"/>
                        <input type="hidden" value="<?php echo $_POST['state'];?>"          name="state"/>
                        <input type="hidden" value="<?php echo $_POST['zip_code'];?>"       name="zip_code"/>
                        <input type="hidden" value="<?php echo $_POST['country'];?>"        name="country"/>
                        <input type="hidden" value="<?php echo $_POST['udf1'];?>"           name="udf1"/>
                        <noscript><input type="submit" value="Continue"/></noscript>
                        </form>
                        <script>
                        function formAutoSubmit () {
                            var payform = document.getElementById("payment_form");
                            payform.submit();
                        }
                        window.onload = formAutoSubmit;
                        </script>
					<?php
					} else {
						//invalid action!
					}




}

 
    
    public function payment_conf_omni()
	{
                if(isset($_POST))
				{
                    $response = $_POST;
                    
                    /* It is very important to calculate the hash using the returned value and compare it against the hash that was sent while payment request, to make sure the response is legitimate */
                    $salt = "bc1ql6wkdytnfy5r2tuwjnsh8xnw0n5g4nekqu905d"; /* put your salt provided by Omniware here */
                    if(isset($salt) && !empty($salt)){
                        $response['calculated_hash']=$this->res_hashCalculate($salt, $response);
                        $response['valid_hash'] = ($response['hash']==$response['calculated_hash'])?'Yes':'No';
                    } else {
                        $response['valid_hash']='Set your salt in return_page.php to do a hash check on receiving response from Omniware';
                    }
                }
                $response['order_id'];
                $response['amount'];
                $response['name'];
                $response['transaction_id'];
                $response['payment_datetime'];
                $response['payment_mode'];
                $response['response_code'];
                $response['response_message'];
                $response['udf1'];

               $payment_data = [
			   
                    'user_id' =>  $response['udf1'],

                    'order_no'=> $response['order_id'],

                    'amount' => $response['amount'],

                    'payment_id' => $response['transaction_id'],

                    'payment_status' => $response['response_message'],

                    'payment_request_id' =>  $response['response_code']



                ];


                $PaymentModel = new \App\Models\PaymentModelSafe();

                $p_info = $PaymentModel->save($payment_data);
               

                if ($p_info) 
				{
                    session()->set('loggedUser',$response['udf1']);

                    session()->setFlashdata('status_test', 'Payment Succcessful / भुगतान सफल');

                    return redirect()->to('/Eform/per_info')->with('status_icon', 'success')->with('status','Registration Succcessful / पंजीकरण सफल');               
				}
				else
				{

                         session()->setFlashdata('status_test', 'Payment Unsuccessful, Please Contact for more information');

                    return redirect()->to('Eform')->with('status_icon', 'warning')->with('status','Payment Unsuccessful');

                }

        
    }

    public  function hashCalculate($salt,$input){
                            /* Columns used for hash calculation, Donot add or remove values from $hash_columns array */
                            $hash_columns = ['address_line_1', 'address_line_2', 'amount', 'api_key', 'city', 'country', 'currency', 'description', 'email', 'mode', 'name', 'order_id', 'phone', 'return_url', 'state', 'udf1', 'udf2', 'udf3', 'udf4', 'udf5', 'zip_code',];
                            /*Sort the array before hashing*/
                            sort($hash_columns);

                            /*Create a | (pipe) separated string of all the $input values which are available in $hash_columns*/
                            $hash_data = $salt;
                            foreach ($hash_columns as $column) {
                                if (isset($input[$column])) {
                                    if (strlen($input[$column]) > 0) {
                                        $hash_data .= '|' . trim($input[$column]);
                                    }
                                }
                            }
                            
                          //  print_r($hash_data);
                            $hash = strtoupper(hash("sha512", $hash_data));
                            
                            return $hash;
                        }


    public function res_hashCalculate($salt,$input){

                                /* Remove hash key if it is present */
                                unset($input['hash']);
                                /*Sort the array before hashing*/
                                ksort($input);
                                
                                /*first value of hash data will be salt*/
                                $hash_data = $salt;
                                
                                /*Create a | (pipe) separated string of all the $input values which are available in $hash_columns*/
                                foreach ($input as $key=>$value) {
                                    if (strlen($value) > 0) {
                                        $hash_data .= '|' . $value;
                                    }
                                }

                                $hash = null;
                                if (strlen($hash_data) > 0) {
                                    $hash = strtoupper(hash("sha512", $hash_data));
                                }
                                    
                                return $hash;
                            }

    public function index2()

            {

                      

                     $base_url = "https://anandkdham.com/dev/";

                    // $payg_payment_url = "https://pguat.safexpay.com/agcore/paymentProcessing";

                    $payg_payment_url = "https://www.avantgardepayments.com/agcore/paymentProcessing"; 

                    // for Merchant key

                   // $merchant_key = "89diCMlKzp+GWwwBm5aVDv6sD+7wJj9ewrMjC6MsHmc=";

                     $merchant_key = "GpxHY1D6zrG/Yj4y7BuQ7fmW40pbK2hkAfBtq4lmppQ=";



                    // for Merchant id

                    //$merchant_id = "202104230001";

                      $merchant_id = "202110140017";

                    // for Aggregator id

                    $aggregator_id = "paygate";

                    $country = "IND";

                    $amount = $this->request->getPost('total_amt');

                    // $amount = 10;

                    $currency = "INR";

                    $txn_type = "SALE";

                    $success_url = "https://anandkdham.com/Paymentcntrl/payment_conf_safe";

                    $failure_url = "https://anandkdham.com/Paymentcntrl/payment_conf_safe";

                    $channel = "WEB";

                     $authModel = new AuthModel();

                     $rNo=$authModel->where('user_id', session()->get('loggedUser'))->first();

                    $r  = rand();

                    $order_no = $r.'AJ-'.$rNo['user_id'];





                $post = $_POST;

                $return_elements = array();

                $return_elements['me_id'] = $merchant_id;

                $txn_details = $aggregator_id . '|' . $merchant_id . '|' . $order_no . '|' . $amount . '|' . $country . '|' .  $currency . '|' . $txn_type . '|' .  $success_url . '|' . $failure_url . '|' . $channel;

                 

                $pg_details = $this->request->getPost('pg_id') . '|' . $this->request->getPost('paymode') . '|' . $this->request->getPost('scheme') . '|' . $this->request->getPost('emi_months');

                 

                $card_details = $this->request->getPost('card_no') . '|' . $this->request->getPost('exp_month') . '|' . $this->request->getPost('exp_year') . '|' . $this->request->getPost('cvv2') . '|' . $this->request->getPost('card_name');

                 

                $cust_details = $this->request->getPost('name') . '|' . $this->request->getPost('email') . '|' . $this->request->getPost('contact_no') . '|' . session()->get('loggedUser') . '|' . $this->request->getPost('is_logged_in');

                 $bill_details = $this->request->getPost('bill_address') . '|' . $this->request->getPost('bill_city') . '|' . $this->request->getPost('bill_state') . '|' . $this->request->getPost('bill_country') . '|' . $this->request->getPost('bill_zip');

                $ship_details = $this->request->getPost('ship_address') . '|' . $this->request->getPost('ship_city') . '|' . $this->request->getPost('ship_state') . '|' . $this->request->getPost('ship_country') . '|' . $this->request->getPost('ship_zip') . '|' . $this->request->getPost('ship_days') . '|' . $this->request->getPost('address_count');

                 $item_details = $this->request->getPost('item_count') . '|' . $this->request->getPost('item_value') . '|' . $this->request->getPost('item_category');

                $upi_details=$this->request->getPost('upi_details');

                $other_details = session()->get('loggedUser') . '|' . $this->request->getPost('email') . '|' . $this->request->getPost('contact_no') . '|' . $this->request->getPost('udf_4') . '|' . $this->request->getPost('udf_5');

                $all_values =$txn_details.'~'.$pg_details.'~'.$card_details.'~'.$cust_details.'~'.$bill_details.'~'.$ship_details.'~'.$item_details.'~'.$upi_details.'~'.$other_details;

                  $merchant_request['merchant_request'] = $this->encrypt($all_values, $merchant_key, 256);

                $hash = $merchant_id.'~'.$order_no.'~'.$amount.'~'.$country.'~'.$currency;

                $checksum =hash("sha256", $hash, FALSE);

                $merchant_request['hash'] =$this->encrypt($checksum, $merchant_key, 256);





                if (isset($return_elements))

                    {

                    echo '<HTML>

                <HEAD>

                  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

                <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

                <script type="text/javascript" src="https://formvalidation.io/vendor/formvalidation/js/formValidation.min.js"></script>

                <script type="text/javascript" src="http://formvalidation.io/vendor/formvalidation/js/framework/bootstrap.min.js"></script>

                <script type="text/javascript" src="http://formvalidation.io/vendor/jquery.steps/js/jquery.steps.min.js"></script><?php */?>

                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css" rel="stylesheet" />

                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet" />

                <link href="http://formvalidation.io/vendor/jquery.steps/css/jquery.steps.css" rel="stylesheet" />

                <link href="http://formvalidation.io/vendor/formvalidation/css/formValidation.min.css" rel="stylesheet" /><?php */?>

                <script type="text/javascript" src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script><?php */?>

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

                </HEAD>

                <BODY>

                <form class="form-horizontal" id="payg_payment_form" action="'.$payg_payment_url.'" method="POST">



                <input type="hidden" class="form-control" name="me_id" id="" value="' . $merchant_id . '" />

                <input type="hidden" class="form-control" name="merchant_request" id="" value="'.$merchant_request['merchant_request'].'" /> 

                <input type="hidden" class="form-control" name="hash" id="" value="'.$merchant_request['hash'] .'" /> 



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

                </BODY>

                </HTML>

                <script type="text/javascript">

                $(document).ready(function(e) {

                    $("#payg_payment_form").submit();

                });

                </script>';

                    }

                  else

                    {

                    echo "no data found";

                    }



                //decrypt function use for encryption


            }



    

    public function webhook()
	{

            header('Content-Type: application/json');
            header('Content-Type: FormData');
            header('Content-Type: application/x-www-form-urlencode');

            $request = \Config\Services::request();
            $json = $request->getJSON();
          
             $res =  json_encode($json);
            
    
            
             $response_data = [
                    'response' =>  $res
                ];

            // print_r($response_data);

                           $db = \Config\Database::connect();
                           $member_info = $db->table('webhook');  
                           $query_m = $member_info->insert($response_data);

           //  print_r($member_info);

            if ($query_m) {
        

             $data = [
                'Status' => 'true',
            ];

            return $this->response->setJSON($data);

            }
            $data = [
                'Status' => 'false',
            ];

            return $this->response->setJSON($data);

      }



    public function payment_conf_safe()
	{
		
        $aggregator_id = "paygate";
        if ($aggregator_id) 
		{
			if(isset($_POST) && isset($_POST['txn_response']) && !empty($_POST['txn_response']))
			{
				
				$post = $_POST;
				  
				$merchant_key = "GpxHY1D6zrG/Yj4y7BuQ7fmW40pbK2hkAfBtq4lmppQ=";
				//$merchant_key = "89diCMlKzp+GWwwBm5aVDv6sD+7wJj9ewrMjC6MsHmc=";

				  
				  
				 
				$return_elements = array();
			   
				//Transaction Response
				$post['txn_response']               = isset($post['txn_response']) ? $post['txn_response'] : '';
				$txn_response                       = $this->decrypt($post['txn_response'], $merchant_key, 256);
			   $txn_response_hash                  = explode('~', $txn_response);
				// print_r($txn_response_hash); die();


			   $txn_res_hash                       = $txn_response_hash[1];

				// echo "txn res ";

				// print_r($txn_res_hash);

				$txn_response_actual             = $txn_response_hash[0].''.$txn_response_hash[2];    
				$txn_response_arr                   = explode('|', $txn_response_actual);
				
				
				$hash                               = (isset($txn_response_arr[10]) ? $txn_response_arr[10] : '').'~'.(isset($txn_response_arr[1]) ? $txn_response_arr[1] : '').'~'.(isset($txn_response_arr[2]) ? $txn_response_arr[2] : '').'~'.(isset($txn_response_arr[3]) ? $txn_response_arr[3] : '').'~'.(isset($txn_response_arr[4]) ? $txn_response_arr[4] : '').'~'.(isset($txn_response_arr[5]) ? $txn_response_arr[5] : '').'~'.(isset($txn_response_arr[8]) ? $txn_response_arr[8] : '');  
				
				$checksum                           = hash("sha256", $hash, FALSE);
				$create_hash                        = $this->encrypt($checksum, $merchant_key, 256);   

				 //print_r($create_hash); die();

			   if($txn_res_hash == $create_hash) {
					$return_elements['txn_response']['protocol'] = 'Genuine';
				} else {
					$return_elements['txn_response']['protocol'] = 'Fake';
				}


					//print_r($txn_response);die;
				//$txn_response_arr                 = explode('|', $txn_response);
				$return_elements['txn_response']['ag_id']           = isset($txn_response_arr[0]) ? $txn_response_arr[0] : '';
				$return_elements['txn_response']['me_id']           = isset($txn_response_arr[1]) ? $txn_response_arr[1] : '';
				$return_elements['txn_response']['order_no']        = isset($txn_response_arr[2]) ? $txn_response_arr[2] : '';
				$return_elements['txn_response']['amount']          = isset($txn_response_arr[3]) ? $txn_response_arr[3] : '';
					
				   
				$return_elements['txn_response']['country']         = isset($txn_response_arr[4]) ? $txn_response_arr[4] : '';
				$return_elements['txn_response']['currency']        = isset($txn_response_arr[5]) ? $txn_response_arr[5] : '';
				$return_elements['txn_response']['txn_date']        = isset($txn_response_arr[6]) ? $txn_response_arr[6] : '';
				$return_elements['txn_response']['txn_time']        = isset($txn_response_arr[7]) ? $txn_response_arr[7] : '';
				$return_elements['txn_response']['ag_ref']          = isset($txn_response_arr[8]) ? $txn_response_arr[8] : '';
				$return_elements['txn_response']['pg_ref']          = isset($txn_response_arr[9]) ? $txn_response_arr[9] : '';
				$return_elements['txn_response']['status']          = isset($txn_response_arr[10]) ? $txn_response_arr[10] : '';
				//$return_elements['txn_response']['txn_type']      = isset($txn_response_arr[11]) ? $txn_response_arr[11] : '';
				$return_elements['txn_response']['res_code']        = isset($txn_response_arr[11]) ? $txn_response_arr[11] : '';
				$return_elements['txn_response']['res_message']     = isset($txn_response_arr[12]) ? $txn_response_arr[12] : '';
				
				//Payment Gateway Details
				$post['pg_details']                 = isset($post['pg_details']) ? $post['pg_details'] : '';
				$pg_details                         = $this->decrypt($post['pg_details'], $merchant_key, 256);
				$pg_details_arr                     = explode('|', $pg_details);
				$return_elements['pg_details']['pg_id']             = isset($pg_details_arr[0]) ? $pg_details_arr[0] : '';
				$return_elements['pg_details']['pg_name']           = isset($pg_details_arr[1]) ? $pg_details_arr[1] : '';
				$return_elements['pg_details']['paymode']           = isset($pg_details_arr[2]) ? $pg_details_arr[2] : '';
				$return_elements['pg_details']['emi_months']        = isset($pg_details_arr[3]) ? $pg_details_arr[3] : '';

				//Fraud Details
				$post['fraud_details']              = isset($post['fraud_details']) ? $post['fraud_details'] : '';
				$fraud_details                      = $this->decrypt($post['fraud_details'], $merchant_key, 256);
				$fraud_details_arr                  = explode('|', $fraud_details);
				$return_elements['fraud_details']['fraud_action']   = isset($fraud_details_arr[0]) ? $fraud_details_arr[0] : '';
				$return_elements['fraud_details']['fraud_message']  = isset($fraud_details_arr[1]) ? $fraud_details_arr[1] : '';
				$return_elements['fraud_details']['score']          = isset($fraud_details_arr[2]) ? $fraud_details_arr[2] : '';

				//Other Details
				$post['other_details']              = isset($post['other_details']) ? $post['other_details'] : '';
				$other_details                      = $this->decrypt($post['other_details'], $merchant_key, 256);
				$other_details_arr                  = explode('|', $other_details);
				$return_elements['other_details']['udf_1']          = isset($other_details_arr[0]) ? $other_details_arr[0] : '';
				$return_elements['other_details']['udf_2']          = isset($other_details_arr[1]) ? $other_details_arr[1] : '';
				$return_elements['other_details']['udf_3']          = isset($other_details_arr[2]) ? $other_details_arr[2] : '';
				$return_elements['other_details']['udf_4']          = isset($other_details_arr[3]) ? $other_details_arr[3] : '';
				$return_elements['other_details']['udf_5']          = isset($other_details_arr[4]) ? $other_details_arr[4] : '';
						  

				$order_no = $return_elements['txn_response']['order_no'];

				$amount = $return_elements['txn_response']['amount'];

				$amount = intval($amount);

				$txn_date = $return_elements['txn_response']['txn_date'];

				$txn_time = $return_elements['txn_response']['txn_time'];

				$ag_ref = $return_elements['txn_response']['ag_ref'];

				$res_code = $return_elements['txn_response']['res_code'];

				$status = $return_elements['txn_response']['status'];

				$pg_ref = $return_elements['txn_response']['pg_ref'];


						  

						$user_id = explode("-",$order_no);



					   if ($status == 'Failed') {

						  $payment_data = [



							'user_id' =>  $user_id[1],

							'order_no'=> $order_no,

							'amount' => $amount,

							'payment_id' => $ag_ref,

							'payment_status' => $status,

							'payment_request_id' => $res_code



						];

				  



						$PaymentModel = new \App\Models\PaymentModelSafe();

					 
					   

						 $p_info = $PaymentModel->save($payment_data);

						 if ($p_info) {

									 session()->set('loggedUser',$user_id[1]);



								 session()->setFlashdata('status_test', 'Payment Failed, Please try again');

								 return redirect()->to('/Paymentcntrl')->with('status_icon', 'warning')->with('status','Payment Failed');

							 }

						 }else{

							  if ($status == 'Pending') {



								 $payment_data = [



							'user_id' =>  $user_id[1],

							'order_no'=> $order_no,

							'amount' => $amount,

							'payment_id' => $ag_ref,

							'payment_status' => $status,

							'payment_request_id' => $res_code



						];

					   


						$PaymentModel = new \App\Models\PaymentModelSafe();

						$p_info = $PaymentModel->save($payment_data);

					   

						  if ($p_info) {

									 session()->set('loggedUser',$user_id[1]);

								 session()->setFlashdata('status_test', 'Payment Pending, Please Contact for more information');

								 return redirect()->to('/Eform')->with('status_icon', 'warning')->with('status','Payment Pending');

							 }else{

								   session()->setFlashdata('status_test', 'Payment Unsuccessful, Please Contact for more information');

							return redirect()->to('/Eform')->with('status_icon', 'warning')->with('status','Payment Unsuccessful');

							 }

						 }else{

					   

						$payment_data = [



							'user_id' =>  $user_id[1],

							'order_no'=> $order_no,

							'amount' => $amount,

							'payment_id' => $order_no,

							'payment_status' => $status,

							'payment_request_id' => $res_code



						];

				   



						$PaymentModel = new \App\Models\PaymentModelSafe();

					 $p_info = $PaymentModel->save($payment_data);

				  

					   $rNo= $PaymentModel->where('user_id', $user_id[1])->first();

					if ($rNo) {

						if ($rNo['payment_status'] != 'Succcessful') {

						   $p_info = $PaymentModel->save($payment_data);

						}

					}   
						 



						 if ($p_info) {

									 session()->set('loggedUser',$user_id[1]);

								 session()->setFlashdata('status_test', 'Payment Succcessful / भुगतान सफल');
								  // session()->setFlashdata('status_icon', 'success');
								  //  session()->setFlashdata('status', 'Registration Succcessful / पंजीकरण सफल');

						   // // $loggedUserId = session()->get('loggedUser');
						   // //          if ($loggedUserId) {
						   // //          session()->setFlashdata('status_test', 'Please Check Your Mail / कृपया अपने मेल की जाँच करें');
						   // //                    return redirect()->to('/Eform/application_preview')->with('status_icon', 'success')->with('status','Please make a Payment / कृपया भुगतान करें');
						   // //  }

						   //  $db = \Config\Database::connect();


						   //  $query_state = $db->query('SELECT * FROM state_list where id = 13');
						   //  // print_r($db); die(); 
						   //  $state_list= $query_state->getRowArray() ;

						   //  $query_dist = $db->query('SELECT * FROM dist_list WHERE state_id = 13');

						   //  $dist_list= $query_dist->getResult() ;

						   //  $data = [       
						   //           'state_list' => $state_list,
						   //           'dist' =>$dist_list 

						   //       ];
						   //  echo view('include/header');
						   //  // echo view('include/topbar');
						   //  echo view('user/personal_info', $data);
						   //  echo view('ramkedham/footer');

								 return redirect()->to('/Eform/per_info')->with('status_icon', 'success')->with('status','Registration Succcessful / पंजीकरण सफल');

						 }else{

								 session()->setFlashdata('status_test', 'Payment Unsuccessful, Please Contact for more information');

							return redirect()->to('Eform')->with('status_icon', 'warning')->with('status','Payment Unsuccessful');

						 }

					 }

				}

            }
			else
			{

                session()->setFlashdata('status_test', 'Payment Unsuccessful, Please Contact for more information');

                return redirect()->to('/Eform')->with('status_icon', 'warning')->with('status','Payment Unsuccessful');

            }
			
        }
		
    }



 


    public function final_sub()
    {   
        $loggedUserId = session()->get('loggedUser');

        $personalinfoModel = new \App\Models\PersonalinfoModel();
        $userInfo = $personalinfoModel->where('user_id', $loggedUserId)->first();


        $db = \Config\Database::connect();

        $mem_list = $db->query('SELECT * FROM members WHERE pid='.$loggedUserId);
        $member_list= $mem_list->getResult() ;



        $userA_pay_s = $db->query('SELECT * FROM payment_details_safe where payment_status = "Successful" or payment_status = "Transaction successful" AND user_id='.$loggedUserId);
            
        $userA_payment_s= $userA_pay_s->getRowArray() ;


        

        $data = [
                        'userInfo' => $userInfo,
                        'member_list'=>$member_list,
                        'payment_status_s' =>$userA_payment_s
                            
                    ]; 

        echo view('include/header');
        echo view('user/payment_done' ,$data);
        echo view('ramkedham/footer');
    }
   



	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

}
