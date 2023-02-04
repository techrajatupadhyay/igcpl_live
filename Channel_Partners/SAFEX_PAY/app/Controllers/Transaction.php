<?php
namespace App\Controllers;
use  App\Libraries\Payg;
class Transaction extends BaseController {
	function __construct() {
		ini_set('error_reporting', E_ALL);
		ini_set('display_errors', '1');
		 
		$payg_config = new \Config\PaygConfig(); 
		$this->payg =     new \App\Libraries\Payg(); 
		$this->merchant_key=$payg_config->merchant_key;
		$this->aggregator_id=$payg_config->aggregator_id; 
		$this->merchant_id=$payg_config->merchant_id;
		$this->payg_url=$payg_config->pay_url;
    }
	 
	public function index()
	{
	//	echo "rajesh";exit;
	return view('transaction/index');
	 
	}

	public function sendData(){
		if(isset($_POST) && isset($_POST['order_no']) && !empty($_POST['order_no']))
		{
			$post = $_POST;
			$return_elements = array();
			$return_elements['me_id'] = $this->merchant_id;
			$txn_details = $this->aggregator_id . '|' . $this->merchant_id . '|' . $post['order_no'] . '|' . $post['amount'] . '|' . $post['country'] . '|' . $post['currency'] . '|' . $post['txn_type'] . '|' . $post['success_url'] . '|' . $post['failure_url'] . '|' . $post['channel'];
			//print_r($txn_details); die;
			$pg_details = $post['pg_id'] . '|' . $post['paymode'] . '|' . $post['scheme'] . '|' . $post['emi_months'];
			$card_details = $post['card_no'] . '|' . $post['exp_month'] . '|' . $post['exp_year'] . '|' . $post['cvv2'] . '|' . $post['card_name'];
			$cust_details = $post['cust_name'] . '|' . $post['email_id'] . '|' . $post['mobile_no'] . '|' . $post['unique_id'] . '|' . $post['is_logged_in'];
			$bill_details = $post['bill_address'] . '|' . $post['bill_city'] . '|' . $post['bill_state'] . '|' . $post['bill_country'] . '|' . $post['bill_zip'];
			$ship_details = $post['ship_address'] . '|' . $post['ship_city'] . '|' . $post['ship_state'] . '|' . $post['ship_country'] . '|' . $post['ship_zip'] . '|' . $post['ship_days'] . '|' . $post['address_count'];
			$item_details = $post['item_count'] . '|' . $post['item_value'] . '|' . $post['item_category'];
			$UPI_Details = $post['UPI_Details'];
			$other_details = $post['udf_1'] . '|' . $post['udf_2'] . '|' . $post['udf_3'] . '|' . $post['udf_4'] . '|' . $post['udf_5'];
			
			$request = $txn_details."~".$pg_details."~".$card_details."~".$cust_details."~".$bill_details."~".$ship_details."~".$item_details."~".$UPI_Details."~".$other_details;
			$return_elements['merchant_request']=$this->payg->encrypt($request,$this->merchant_key);
			$values = $this->merchant_id."~".$post['order_no']."~".$post['amount']."~".$post['country']."~".$post["currency"];
			$hash = hash("sha256",$values,FALSE);
			$return_elements['hash']=$this->payg->encrypt($hash,$this->merchant_key);

			
			$data=['return_elements'=>$return_elements,'payg_payment_url'=>$this->payg_url];
			
			return view('transaction/send_data', $data);
		}
	}

	public function response(){
		if(isset($_POST) && isset($_POST['txn_response']) && !empty($_POST['txn_response']))
		{
			
			$post = $_POST;				 	
			$return_elements = array();			
			//Transaction Response
			$post['txn_response']				= isset($post['txn_response']) ? $post['txn_response'] : '';
			$txn_response 						= $this->payg->decrypt($post['txn_response'], $this->merchant_key);			
				//print_r($txn_response);die;

				$txn_response_hash                  = explode('~', rawurldecode($txn_response));

				$txn_res_hash                       = $txn_response_hash[1];
				$txn_response_actual                = $txn_response_hash[0].''.$txn_response_hash[2];	
	
					
				$txn_response_arr = explode('|',$txn_response_actual);
				   
		
				$hash 						        = (isset($txn_response_arr[10]) ? $txn_response_arr[10] : '')."~".(isset($txn_response_arr[1]) ? $txn_response_arr[1] : '')."~".(isset($txn_response_arr[2]) ? $txn_response_arr[2] : '')."~".(isset($txn_response_arr[3]) ? $txn_response_arr[3] : '')."~".(isset($txn_response_arr[4]) ? $txn_response_arr[4] : '')."~".(isset($txn_response_arr[5]) ? $txn_response_arr[5] : '')."~".(isset($txn_response_arr[8]) ? $txn_response_arr[8] : '');	
				$checksum                           = hash("sha256", $hash, FALSE);
				$create_hash                        = $this->payg->encrypt($checksum,$this->merchant_key);	
		
					
					if($txn_res_hash == $create_hash) {
					$return_elements['txn_response']['protocol'] = 'Genuine';
					} else {
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
			$pg_details 						= $this->payg->decrypt($post['pg_details'],$this->merchant_key, 256);
			$pg_details_arr						= explode('|', $pg_details);
			$return_elements['pg_details']['pg_id'] 			= isset($pg_details_arr[0]) ? $pg_details_arr[0] : '';
			$return_elements['pg_details']['pg_name'] 			= isset($pg_details_arr[1]) ? $pg_details_arr[1] : '';
			$return_elements['pg_details']['paymode'] 			= isset($pg_details_arr[2]) ? $pg_details_arr[2] : '';
			$return_elements['pg_details']['emi_months'] 		= isset($pg_details_arr[3]) ? $pg_details_arr[3] : '';

			//Fraud Details
			$post['fraud_details']				= isset($post['fraud_details']) ? $post['fraud_details'] : '';
			$fraud_details 						= $this->payg->decrypt($post['fraud_details'],$this->merchant_key, 256);
			$fraud_details_arr					= explode('|', $fraud_details);
			$return_elements['fraud_details']['fraud_action'] 	= isset($fraud_details_arr[0]) ? $fraud_details_arr[0] : '';
			$return_elements['fraud_details']['fraud_message'] 	= isset($fraud_details_arr[1]) ? $fraud_details_arr[1] : '';
			$return_elements['fraud_details']['score'] 			= isset($fraud_details_arr[2]) ? $fraud_details_arr[2] : '';

			//Other Details
			$post['other_details']				= isset($post['other_details']) ? $post['other_details'] : '';
			$other_details 						= $this->payg->decrypt($post['other_details'],$this->merchant_key, 256);
			$other_details_arr					= explode('|', $other_details);
			$return_elements['other_details']['udf_1'] 			= isset($other_details_arr[0]) ? $other_details_arr[0] : '';
			$return_elements['other_details']['udf_2'] 			= isset($other_details_arr[1]) ? $other_details_arr[1] : '';
			$return_elements['other_details']['udf_3'] 			= isset($other_details_arr[2]) ? $other_details_arr[2] : '';
			$return_elements['other_details']['udf_4'] 			= isset($other_details_arr[3]) ? $other_details_arr[3] : '';
			$return_elements['other_details']['udf_5'] 			= isset($other_details_arr[4]) ? $other_details_arr[4] : ''; 
			$data=['return_elements'=>$return_elements];
			return view('transaction/response', $data);
		} 

		
	}
}
