<?php
defined('BASEPATH') OR exit('No direct script access allowed');


   
class Seller_module extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
	    $this->load->database();
	    $this->load->model('dashboard_model');
	    $this->load->model('employee_model');
	    $this->load->model('login_model');
	    $this->load->model('payroll_model');
	    $this->load->model('settings_model');
	    $this->load->model('leave_model');
	    $this->load->model('Seller_model'); 

	    $this->load->helper('url_helper');  
			 $this->load->helper('form_helper');
    }
	
	
	public function index()
    {
		
		if ($this->session->userdata('user_login_access') == '1')
		{
			$data['title'] = 'Register - Tech Arise';
			$data['metaDescription'] = 'Register';
			$data['metaKeywords'] = 'Register';
			$data['state_list'] = @$this->db->get('state_master')->result();
			$data['district_list'] = @$this->db->get('district_master')->result();
			$this->load->view('backend/new_header');
            $this->load->view('backend/new_sidebar'); 
			$this->load->view('backend/seller_module_dashboard',$data);
			$this->load->view('backend/new_footer'); 
		}
		else
		{
			redirect('Login');
		}
	}




    public function New_workorder()
    {
 
      if ($this->session->userdata('user_login_access') == 1)
		{
           		   
            $sellerid = $this->session->userdata('user_login_id');
		    $data['title'] = 'Register - Tech Arise';
			$data['metaDescription'] = 'Register';
			$data['metaKeywords'] = 'Register';
			$data['state_list'] = @$this->db->get('state_master')->result();
			$data['district_list'] = @$this->db->get('district_master')->result();
			//$data['sellerlist'] = $this->Seller_model->gem_workorder();

            $sql ="SELECT * from seller Where  seller_id=".$sellerid."  " ;
			$data['seller'] = $this->db->query($sql)->result();


			$sql ="SELECT * from gem_product_category " ;
			$data['product'] = $this->db->query($sql)->result();



            $this->load->view('backend/new_header');
            $this->load->view('backend/new_sidebar'); 
            $this->load->view('backend/new_workorder',$data);
            $this->load->view('backend/new_footer'); 
			
		}
		else
		{
			redirect('Login');
		}

	} 	

    public function genrate_workorder()
    {
		
       	date_default_timezone_set('Asia/Kolkata');      
        $create_time = date('Y-m-d H:i:s', time());
		$sellerid = $this->input->post('sellerid');
		
		$region_id = $this->input->post('region_id');
		$region_state = $this->input->post('region_state');
        $district_branch = $this->input->post('district_branch');
			
		$labh_emp_id = $this->input->post('labh_emp_id');
		$labh_agent_id = $this->input->post('labh_agent_id');
		$gemNgem_workorder_id = $this->input->post('gemNgem_workorder_id');
	    $pick_location = $this->input->post('pick_location');
        $seller_state = $this->input->post('seller_state');
	    $seller_district = $this->input->post('seller_district');
	    $seller_city = $this->input->post('seller_city');
	    $seller_pincode = $this->input->post('seller_pincode');
	    $select_product = $this->input->post('select_product');
        $order_type = $this->input->post('order_type');
		$buyer_name = $this->input->post('buyer_name');
		$email = $this->input->post('email');
        $product_length = $this->input->post('product_length');
        $product_width = $this->input->post('product_width');
        $product_height = $this->input->post('product_height');
        $quantity = $this->input->post('quantity');
		$contact = $this->input->post('contact');
		$statename = $this->input->post('statename');
		$districtname = $this->input->post('districtname');
		$consignee_address = $this->input->post('consignee_address');
		$city = $this->input->post('city');
		$pincode = $this->input->post('pincode');
		$organization_name = $this->input->post('organization_name');
        $gstin = $this->input->post('gstin');
		$logistics = $this->input->post('logistics');
		$ready_delivery_date = $this->input->post('ready_delivery_date');
        $expected_date = $this->input->post('expected_date');
		$value_gem_order = $this->input->post('value_gem_order');
		$including_gst = $this->input->post('including_gst');
		$sample_clause = $this->input->post('sample_clause');
		$bill_discounting = $this->input->post('bill_discounting');
		//$gem_workorder_doc = $this->input->post('gem_workorder_doc');       
		$docfile = $this->input->post('gem_workorder_doc');
        $pick_pincode = $this->input->post('pick_pincode');
		$delivered_pincode = $this->input->post('delivered_pincode');
		$travle_mode = $this->input->post('travle_mode');
		$declared_value = $this->input->post('declared_value');
		//$packages = $this->input->post('packages');
		$noofpackages = $this->input->post('noofpackages');
		$actual_weight = $this->input->post('actual_weight');
		$charged_weight = $this->input->post('charged_weight');
		$cod_dod = $this->input->post('cod_dod');
		$shipment_charges = $this->input->post('shipment_charges');


		if($this->input->post('isedit')==0)
		{

		    $sql = "SELECT * FROM work_order WHERE sellerid='".$sellerid."' AND gemNgem_workorder_id='".$gemNgem_workorder_id."' AND (isactive='0' || isactive='1' || isactive='2')  limit 1";
			$count = $this->db->query($sql)->num_rows();
			//print_r($this->db->last_query());	
			//var_dump($Seller_Details);
						
			if($count<=0)
			{
				$statecode="";
				$state_length = strlen($statename);
				if($state_length < 2)
				{
					$statecode = '0'.$statename;
				}
				else if($state_length==2)
				{
					$statecode = $statename;
				}
				
	            date_default_timezone_set('Asia/Kolkata');      
				$createddate = date('Y-m-d');
				$year = date('y', strtotime($createddate));
				$regionid = $this->input->post('regionid');
				$query = $this->db->query('SELECT id  AS workorder_id FROM work_order ORDER BY id DESC  limit 1');
				$usercount= $query->result_array() ; 
				$sell_ip="";
				
				if($usercount >=0)
				{   
					$workorder_ip="";
					foreach($usercount as $workorderid)
					{			
						$workorder_ip = $workorderid['workorder_id']; 
					}
													    
					$registerNo = intval($workorder_ip) + 1;
					$igcpl_workorder_id = $year.$order_type.$statecode.'000'.$registerNo;
				}
								 				
				$targetDir = "uploads/Seller_Documents/".$region_id ."/".$sellerid ."/Workorder/".$igcpl_workorder_id ."/" ;
	            $allowTypes = array('pdf','zip');
	            if (!file_exists($targetDir)) 
	            {    
	                mkdir($targetDir, 0777, true);
	            } 
	            $fileName = basename($_FILES['gem_workorder_doc']['name']);
	            $targetFilePath = $targetDir . $fileName;                        
	            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
	                
	            if (in_array($fileType, $allowTypes)) 
	            {    
	                //Upload file to server
	                ini_set( 'memory_limit', '1024M' );
			        ini_set('upload_max_filesize', '500M');  
			        ini_set('post_max_size', '500M');  
			        ini_set('max_input_time', 3600);  
			        ini_set('max_execution_time', 3600);
	                    
	                move_uploaded_file($_FILES["gem_workorder_doc"]["tmp_name"], $targetFilePath); 
	            }	

				$saveData=array(
							
						'igcpl_workorder_id'=> $igcpl_workorder_id,
						'sellerid'=> $sellerid,
						'executive_id'=> $labh_emp_id,
						'agent_id'=> $labh_agent_id,
						'gemNgem_workorder_id'=> $gemNgem_workorder_id,
						
						'region_id'=> $region_id,
						'region_state'=> $region_state,
						'district_branch'=> $district_branch,
						
						'pick_location'=> $pick_location,
	                    'seller_state'=> $seller_state,
	                    'seller_district'=> $seller_district,
	                    'seller_city'=> $seller_city,
	                    'seller_pincode'=> $seller_pincode,
	                    'select_product'=> $select_product,
	                    'order_type'=>$order_type,
						'buyer_name'=> $buyer_name,
						'email'=> $email,
                        'product_length'=> $product_length,
                        'product_width'=> $product_width,
                        'product_height'=> $product_height,
                        'quantity'=>$quantity,
						'contact'=> $contact,
						'statename'=> $statename,
						'districtname'=> $districtname,
						'consignee_address'=>$consignee_address,
						'city '=> $city ,
						'pincode'=> $pincode,
						'organization_name'=> $organization_name,
						'gstin' => $gstin,
						'logistics'=> $logistics,
						'ready_delivery_date'=>$ready_delivery_date,
						'expected_date'=>$expected_date,
						'gem_workorder_doc'=> $targetFilePath,
						'value_gem_order'=>$value_gem_order,
						'including_gst'=>$including_gst,
						'sample_clause' => $sample_clause,
                        'pick_pincode' => $pick_pincode,
                        'delivered_pincode' => $delivered_pincode,
                        'travle_mode' => $travle_mode,
                        'declaredValue' => $declared_value,
                        'noofpackages' => $noofpackages,
                        'actual_weight' => $actual_weight,
                        'charged_weight' => $charged_weight,
                        'cod_dod' => $cod_dod,
                        'shipment_charges' => $shipment_charges,
                        'bill_discounting'=>$bill_discounting,
						'isactive' => '0',
						'status' => '1',
						'create_time' => $create_time,
															  
						);
				    
	                $this->Seller_model->insert_gem_workorder($saveData);

	                $this->session->set_flashdata('status_test', 'Workorder Generated Successfully');
	                $this->session->set_flashdata('status_icon', 'success');
	                $this->session->set_flashdata('status', 'Workorder Generated');
					
				    return redirect("Seller_module/Payment_Workorder/".$sellerid."/".$igcpl_workorder_id." ");
	        }
			else
			{
				
				$this->session->set_flashdata('status_test', 'This workorder is Already generated ! ');
	            $this->session->set_flashdata('status_icon', 'info');
	            $this->session->set_flashdata('status', 'Not Generated !');
					
				return redirect('Seller_module');
							
			}

	    }

	    else
	    {

            $sellerid = $this->input->post('sellerid');
			//$id = $this->input->post('id');
			$igcpl_workorder_id = $this->input->post('igcpl_workorder_id');
			
			$saveData=array(

			        //'igcpl_workorder_id' =>$igcpl_workorder_id,
                    'executive_id'=> $labh_emp_id,
					'agent_id'=> $labh_agent_id,
 
					'region_id'=> $region_id,
					'region_state'=> $region_state,
					'district_branch'=> $district_branch,
						
					'order_type'=>$order_type,					
					'pick_location'=>$pick_location,
					'seller_state'=>$seller_state,
					'seller_district'=>$seller_district,
					'seller_city'=>$seller_city,
					'seller_pincode'=>$seller_pincode,
					'select_product'=>$select_product,
					'buyer_name'=>$buyer_name,
					'email'=>$email,
                    'product_length'=> $product_length,
                    'product_width'=> $product_width,
                    'product_height'=> $product_height,
                    'quantity'=>$quantity,
					'contact'=>$contact,
					'statename'=>$statename,
					'districtname'=>$districtname,
					'city'=>$city,
					'pincode'=>$pincode,						
					'consignee_address'=>$consignee_address,
					'organization_name'=>$organization_name,
					'gstin'=>$gstin,
					'logistics'=>$logistics,
					'ready_delivery_date'=>$ready_delivery_date,
					'expected_date'=>$expected_date,
					'value_gem_order'=>$value_gem_order,
					'including_gst'=>$including_gst,
					//'gem_workorder_doc'=>$gem_workorder_doc,
					'bill_discounting'=>$bill_discounting,
					'sample_clause'=>$sample_clause,
                    'pick_pincode' => $pick_pincode,
                    'delivered_pincode' => $delivered_pincode,
                    'travle_mode' => $travle_mode,
                    'declared_value' => $declaredValue,
                    'noofpackages' => $noofpackages,
                    'actual_weight' => $actual_weight,
                    'charged_weight' => $charged_weight,
                    'cod_dod' => $cod_dod,
                    'shipment_charges' => $shipment_charges,

					'updatedon'=>date('Y-m-d H:i:s', time()) 
					//'isactive'=>1
			    );
		    $this->db->set($saveData);
            //$this->db->where('id',$id);			
			$this->db->where('sellerid',$sellerid);
			$this->db->where('igcpl_workorder_id', $igcpl_workorder_id);
			$this->db->where('isactive',0);
			$this->db->update('work_order', $saveData);
			$queryresult = $this->db->affected_rows();
			//print_r($this->db->last_query());
            
            if($_FILES['gem_workorder_doc']['file'] !=null)				
            {
                $gem_workorder_doc = $this->input->post('gem_workorder_doc');
					
					$targetDir = "uploads/Seller_Documents/".$region_id ."/".$sellerid ."/Workorder/".$igcpl_workorder_id ."/" ;
					//$targetDir = "uploads/Seller_Documents/".$sellerid."/".$igcpl_workorder_id." " ;
					$allowTypes = array('pdf', 'zip');
					if (!file_exists($targetDir)) 
					{    
						mkdir($targetDir, 0777, true);
					}
                    					
					$fileName = basename($_FILES['gem_workorder_doc']['name']);
					$targetFilePath = $targetDir . $fileName;                        
					$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
					if (in_array($fileType, $allowTypes)) 
					{    
						ini_set('memory_limit', '1024M' );
						ini_set('upload_max_filesize', '500M');  
						ini_set('post_max_size', '500M');  
						ini_set('max_input_time', 3600);  
						ini_set('max_execution_time', 3600);
						move_uploaded_file($_FILES["gem_workorder_doc"]["tmp_name"], $targetFilePath); 
					}
					
					$data = array(
					
							'gem_workorder_doc'=>$targetFilePath,
							
						    );
					    $this->db->set($data);
						//$this->db->where('id',$id);			
						$this->db->where('sellerid',$sellerid);
						$this->db->where('igcpl_workorder_id',$igcpl_workorder_id);
						$this->db->where('isactive',0);
						$this->db->update('work_order', $data);
						$queryresult2 = $this->db->affected_rows();
						//print_r($this->db->last_query());
                
				$this->session->set_flashdata('status_test', 'Workorder Details Updated Successfully !');
	            $this->session->set_flashdata('status_icon', 'success');
	            $this->session->set_flashdata('status', 'Workorder Updated !');
	            //return redirect('SellerRegister/addDocument/');
                return redirect("Seller_module/Payment_Workorder/".$sellerid."/".$igcpl_workorder_id." ");
				
            }
            else
			{
				
				$this->session->set_flashdata('status_test', 'Workorder Details Updated Successfully !');
	            $this->session->set_flashdata('status_icon', 'success');
	            $this->session->set_flashdata('status', 'Workorder Updated !');
	            //return redirect('SellerRegister/addDocument/');
                return redirect("Seller_module/Payment_Workorder/".$sellerid."/".$igcpl_workorder_id." ");
								
			}
           								
	    }
	
    }


    /*-------------------------------WorkOrder PAyment----------------------------*/
	

    public function Payment_Workorder($sellerid)
	{
		
		if ($this->session->userdata('user_login_access') == 1)
		{
						
			$sql ="SELECT * from seller Where seller_id=".$sellerid." and isactive=1" ;
			$data['seller'] = $this->db->query($sql)->result();
			
			foreach($data['seller'] as $sell)
			{
			    $is_paid = $sell->ispaid;
                $state_second = $sell->state_second;			   
			}
			$sql ="SELECT * from registration_duration Where  status=1" ;
			$data['reg_duration'] = $this->db->query($sql)->result_array();

			$this->load->model('Registration_Duration_Model');
			$data['usersplan']=$this->Registration_Duration_Model->get_reg_duration();
			
			$data['title'] = 'Register - Tech Arise';
			$data['metaDescription'] = 'Register';
			$data['metaKeywords'] = 'Register';
			
			$data['ispaid'] = $is_paid;
			$data['state_second'] = $state_second;
			//var_dump($data['ispaid']);
			
			$data['sellerid'] = $sellerid ;			
			$data['registration_duration'] = $sellerid;
						
			$this->load->view('backend/new_header'); 
			$this->load->view('backend/new_sidebar'); 
			$this->load->view('backend/payment_workorder', $data);
			$this->load->view('backend/new_footer');
						
		}
		else
		{
				
			return redirect('Login');
				
		}
						
	}

   

	public function Workorders()
    {

        if ($this->session->userdata('user_login_access') == 1)
		{
           		             
			$usertype = $this->session->userdata('user_type');
			$region='';
			$region_state='';
			$district_branch='';
			
			if($usertype==1)
			{
				
				$regionid='';
		        $user_id = $this->session->userdata('user_login_id');
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				
				//$sql ="SELECT * from seller Where  seller_id=".$user_id."  " ;
				//$data['seller'] = $this->db->query($sql)->result();
                $data['workorder'] = $this->Seller_model->get_my_workorders($regionid,$usertype,$user_id,$region_state,$district_branch);
				
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/my_workorders',$data);
				$this->load->view('backend/new_footer');
				
			}
            else if($usertype==2)
            {
				
				$user_id = $this->session->userdata('user_login_id');
                $query_state = $this->db->query("SELECT * FROM users where user_id='".$user_id."' and user_type='".$usertype."' limit 1");
                $user_data= $query_state->result_array() ;
				$regionid='';
				foreach($user_data as $row)
                {           
                    $regionid = $row['region']; 
					$region_state = $row['region_state'];
                    $district_branch = $row['district_branch'];
                } 
									
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				
				//$sql ="SELECT * from seller Where  seller_id=".$sellerid."  " ;
				//$data['seller'] = $this->db->query($sql)->result();
                $data['workorder'] = $this->Seller_model->get_my_workorders($regionid,$usertype,$user_id,$region_state,$district_branch);
				
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/my_workorders',$data);
				$this->load->view('backend/new_footer');
				
            }
            else if($usertype==3)
            {	
		
				$user_id = $this->session->userdata('user_login_id');
                $query_state = $this->db->query("SELECT * FROM users where user_id='".$user_id."' and user_type='".$usertype."' limit 1");
                $user_data= $query_state->result_array() ;
				$regionid='';
				foreach($user_data as $row)
                {           
                    $regionid = $row['region']; 
					$region_state = $row['region_state'];
                    $district_branch = $row['district_branch']; 
                } 
									
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				
				//$sql ="SELECT * from seller Where  seller_id=".$sellerid."  " ;
				//$data['seller'] = $this->db->query($sql)->result();
                $data['workorder'] = $this->Seller_model->get_my_workorders($regionid,$usertype,$user_id,$region_state,$district_branch);
				
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/my_workorders',$data);
				$this->load->view('backend/new_footer');
				
            }
            else if($usertype==5)
            {	
		
				$user_id = $this->session->userdata('user_login_id');
                $query_state = $this->db->query("SELECT * FROM users where user_id='".$user_id."' and user_type='".$usertype."' limit 1");
                $user_data= $query_state->result_array() ;
				$regionid='';
				foreach($user_data as $row)
                {           
                    $regionid = $row['region']; 
					$region_state = $row['region_state'];
                    $district_branch = $row['district_branch']; 
                } 
									
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				
				//$sql ="SELECT * from seller Where  seller_id=".$sellerid."  " ;
				//$data['seller'] = $this->db->query($sql)->result();
                $data['workorder'] = $this->Seller_model->get_my_workorders($regionid,$usertype,$user_id,$region_state,$district_branch);
				
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/my_workorders',$data);
				$this->load->view('backend/new_footer');
				
            }
            else if($usertype==6)
            {	
		
				$user_id = $this->session->userdata('user_login_id');
                $query_state = $this->db->query("SELECT * FROM users where user_id='".$user_id."' and user_type='".$usertype."' limit 1");
                $user_data= $query_state->result_array() ;
				$regionid='';
				foreach($user_data as $row)
                {           
                    $regionid = $row['region']; 
					$region_state = $row['region_state'];
                    $district_branch = $row['district_branch']; 
                } 
									
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				
				//$sql ="SELECT * from seller Where  seller_id=".$sellerid."  " ;
				//$data['seller'] = $this->db->query($sql)->result();
                $data['workorder'] = $this->Seller_model->get_my_workorders($regionid,$usertype,$user_id,$region_state,$district_branch);
				
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/my_workorders',$data);
				$this->load->view('backend/new_footer');
				
            }			
			
		}
		else
		{
			redirect('Login');
		}

	}
    

    public function Workorder_Preview($sellerid="", $igcpl_workorder_id="")
    {
		
		if ($this->session->userdata('user_login_access') == 1)
		{	
	
			$sql ="SELECT * from work_order Where  sellerid='".$sellerid."' AND  igcpl_workorder_id= '".$igcpl_workorder_id."' " ;
			$data['workorder'] = $this->db->query($sql)->result();						
			//var_dump($data['workorder']); 
				
			//$sql ="SELECT * from work_order Where  seller_id=".$sellerid."  " ;
			//$data['workorder'] = $this->db->query($sql)->result();			

			$data['title'] = 'Register - Tech Arise';
			$data['metaDescription'] = 'Register';
			$data['metaKeywords'] = 'Register';
			$data['sellerid'] = $sellerid;
			//$data['igcpl_workorder_id'] = $igcpl_workorder_id;

			$this->load->view('backend/new_header');
            $this->load->view('backend/new_sidebar'); 
            $this->load->view('backend/new_workorder',$data);
            $this->load->view('backend/new_footer');
			
		}
		else
		{
			
			return redirect('Login');
			
		}
								
	}


    public function Print_Workorder_Preview($sellerid="", $igcpl_workorder_id="")
    {
		
		if ($this->session->userdata('user_login_access') == 1)
		{	
	
			$sql ="SELECT * from work_order Where  sellerid='".$sellerid."' AND  igcpl_workorder_id= '".$igcpl_workorder_id."' " ;
			$data['workorder'] = $this->db->query($sql)->result();						
			//var_dump($data['workorder']); 
				
			//$sql ="SELECT * from work_order Where  seller_id=".$sellerid."  " ;
			//$data['workorder'] = $this->db->query($sql)->result();			

			$data['title'] = 'Register - Tech Arise';
			$data['metaDescription'] = 'Register';
			$data['metaKeywords'] = 'Register';
			$data['sellerid'] = $sellerid;
			//$data['igcpl_workorder_id'] = $igcpl_workorder_id;

			//$this->load->view('backend/new_header');
            //$this->load->view('backend/new_sidebar'); 
            $this->load->view('backend/print_workorder_preview',$data);
            //$this->load->view('backend/new_footer');
			
		}
		else
		{
			
			return redirect('Login');
			
		}
								
	}



	

	public function Workorder_details($sellerid, $igcpl_workorder_id)
    {
			
		if ($this->session->userdata('user_login_access') == 1)
		{

									
			$sql1 ="SELECT * from work_order Where  sellerid='".$sellerid."' AND  igcpl_workorder_id='".$igcpl_workorder_id."' " ;
			$data['workorder'] = $this->db->query($sql1)->result_array();				
			//var_dump($data['workorder']);
							               					
			$data['state_list'] = @$this->db->get('state_master')->result();
			$data['district_list'] = @$this->db->get('district_master')->result();
			$data['product'] = @$this->db->get('gem_product_category')->result();
			
            $sql2 ="SELECT * from seller Where  seller_id=".$sellerid."  " ;
			$data['seller'] = $this->db->query($sql2)->result();
			
	
			//$sql4 ="SELECT * from gem_product_category " ;
			//$data['product'] = $this->db->query($sql4)->result();
			
			$data['title'] = 'Register - Tech Arise';
			$data['metaDescription'] = 'Register';
			$data['metaKeywords'] = 'Register';
			$this->load->view('backend/new_header'); 
			$this->load->view('backend/new_sidebar'); 
			$this->load->view('backend/new_workorder', $data);
			$this->load->view('backend/new_footer');
				
	    }
		else
		{
				
			redirect('Login');
				
		}	
			
    }


    public function calculate_shipping_price()
    {
			
		if ($this->session->userdata('user_login_access') == 1)
		{
			
	        $pickup_pincode=$this->input->post('pickup_pincode');
			$delivery_pincode=$this->input->post('delivery_pincode');
			$travle_mode=$this->input->post('travle_mode');
			$declared_value=$this->input->post('declared_value');
			$noofpackages=$this->input->post('noofpackages');
			$actual_weight=$this->input->post('actual_weight');
			$charged_weight=$this->input->post('charged_weight');
			$cod_dod=$this->input->post('cod_dod');
			
			$auth_access_url = '';							
			$login_id = '';
		    $login_pass = '';
			$access_token = '';
            $valid_upto = '';					
            $is_expired = '';			
			$ethics_auth = $this->db->query("SELECT * FROM ethics_login WHERE status=1 ");
			$ethicsauth= $ethics_auth->result();
			//print_r($sellerpayment);
			foreach($ethicsauth as $row)
			{				
			    $auth_access_url = $row->auth_access_url;							
			    $login_id = $row->login_id;
				$login_pass = $row->login_pass;
				$access_token = $row->access_token;
                $valid_upto = $row->valid_upto;					
                $is_expired = $row->is_expired;					
			}									
			$url = $auth_access_url ;
			$data = array(
					"userName" => $login_id,
					"password" => $login_pass,										
				);
			$encodedData = json_encode($data);
			$curl = curl_init($url);
			$data_string = urlencode(json_encode($data));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $encodedData);
			$response = curl_exec($curl);					
            //print_r($response);
			curl_close($curl);					
		    $data1 = json_decode($response);
	        $token =  $data1->token;
			
			
			echo $response = $this->get_shippping_price($pickup_pincode,$delivery_pincode,$travle_mode,$declared_value,$noofpackages,$actual_weight,$charged_weight,$cod_dod,$token);
						

			//return $response;	
	    }
		else
		{
				
			redirect('Login');
				
		}	
			
    }
	
    public function get_shippping_price($pickup_pincode,$delivery_pincode,$travle_mode,$declared_value,$noofpackages,$actual_weight,$charged_weight,$cod_dod,$token)
    {
		//$token1="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJJZCI6IjEiLCJHcm91cElkIjoiMSIsIm5iZiI6MTY3MzUxOTE2MiwiZXhwIjoxNjczNTIyNzYyLCJpYXQiOjE2NzM1MTkxNjIsImlzcyI6Imh0dHBzOi8vbG9jYWxob3N0OjQ0MzU0LyIsImF1ZCI6Imh0dHA6Ly9sb2NhbGhvc3Q6NDIwMC8ifQ.K6xtZRWL_osX_V8nRZWo5YF89yzZTTT6LeWgjce824s";
		$url = "http://136.232.165.58:6168/RateCalculate/ratecalculate" ;
		$data = array(
					"fromPinCode" => $pickup_pincode,
					"toPincode" => $delivery_pincode,
                    "mode" => $travle_mode,
                    "declaredValue" => $declared_value,
					"packages" => $noofpackages,
                    "actualWeight" => $actual_weight,
                    "chargedWeight" => $charged_weight,
                    "cod_dod" => $cod_dod,					
				);
		$authorization = "Authorization: Bearer ".$token;		
		$encodedData = json_encode($data);
		$curl = curl_init($url);
		$data_string = urlencode(json_encode($data));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $encodedData);
		$response = curl_exec($curl);					
        //print_r($response);
		curl_close($curl);					
		$data1 = json_decode($response);
		 
	    //echo $status =  $data1->status;
        echo $message =  $data1->message;
        echo $data_dat =  $data1->data;		
		 	
    }

    public function Whomsoever()
    {
			
		if ($this->session->userdata('user_login_access') == 1)
		{
								
			$this->load->view('backend/new_header'); 
			$this->load->view('backend/new_sidebar'); 
			$this->load->view('backend/whomsoever');
			$this->load->view('backend/new_footer');
				
	    }
		else
		{
				
			redirect('Login');
				
		}	
			
    }

    
    public function Onboding_Mou()
    {
			
		if ($this->session->userdata('user_login_access') == 1)
		{
      
			$this->load->view('backend/new_header'); 
			$this->load->view('backend/new_sidebar'); 
			$this->load->view('backend/onboding_mou');
			$this->load->view('backend/new_footer');
				
	    }
		else
		{
				
			redirect('Login');
				
		}	
			
    }




   


    public function Documents_workorder()
    {
        $data['page_name'] = 'new_workorder';
        /*$this->load->view('backend/sidebar');
        $this->load->view('backend/header');*/
        $this->load->view('backend/new_workorder_dcouments');
       /* $this->load->view('backend/footer');*/
    }
	public function get_state_region()
    {
		$id=$this->input->post('eid');
	    $this->db->from('state_master');     
	    $this->db->where('state_id',$id);
	    $query=$this->db->get();
	    $data= $query->row_array();
	    echo $data['RegionID'];
	}
	public function get_district_by_state()
    {
		$state_id=$this->input->post('state_id');
		$sql = "SELECT * FROM district_master WHERE Statecode='".$state_id."' ";
		$data['District'] = $this->db->query($sql)->result_array();
		print_r($this->db->last_query());
        $output = '<option value="">----Select District----</option>';
        foreach($this->db->query($sql)->result_array() as $row )
		{
            $output .='<option value="'.$row['Districtcode'].'">'.$row['Districtname'].'</option>';
        }
            echo $output;
	}














    













}


