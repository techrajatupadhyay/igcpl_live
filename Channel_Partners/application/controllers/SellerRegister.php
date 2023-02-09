<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
class SellerRegister extends CI_Controller 
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
	        $this->load->model('Registration_Duration_Model');
        }
		
		
        public function index()
        {
			
			if ($this->session->userdata('user_login_access') == 1)
		    {
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['region_list'] = @$this->db->get('region')->result();
                $data['districtbranch'] = @$this->db->get('district_branch')->result();
				
				$data['state_list'] = @$this->db->get('state_master')->result();
				$this->load->view('backend/new_header'); 
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/seller_information', $data);
				$this->load->view('backend/new_footer');
			}
			else
			{
				
				redirect('Login');
				
			}
			
        }
		
	

	    public function get_state_by_region()
        {
            
            $id=$this->input->post('region_id');
            $this->db->from('region');     
            $this->db->where('region_id',$id);
            $query=$this->db->get();
            $data= $query->result_array();
            //print_r($data);
            $output = '<option value="">----Select State----</option>';
            foreach( $data as $row )
            {
                $output .='<option value="'.$row['region_id'].'">'.$row['region_name'].'</option>';
            }

            echo $output;
            //echo $data;
            
        }
        
        public function get_districtbrance_by_state()
        {
                 
            $region_state_id=$this->input->post('region_state_id');
            $this->db->from('district_branch');     
            $this->db->where('Districtcode',$region_state_id);
			$this->db->where('IsActive',1);
            $query=$this->db->get();
            $data= $query->result_array();
            //print_r($data);
            $output = '<option value="">----Select District Branch----</option>';
            foreach( $data as $row )
                {
                    $output .='<option value="'.$row['Districtcode'].'">'.$row['Districtname'].'</option>';
                }

            //echo $output;
            print_r($output);
			
        }



        public function get_state_region()
        {
			
	        $id=$this->input->post('state_id');
	        $this->db->from('state_master');     
	        $this->db->where('state_id',$id);
	        $query=$this->db->get();
	        $data= $query->result_array();
	       // print_r($data);
	        $output = '<option value="">----Select District----</option>';
	        foreach( $data as $row )
				{
                    $output .='<option value="'.$row['state_id'].'">'.$row['statename'].'</option>';
                }

			echo $output;
	        //echo $data;
			
        }
		
		public function get_district_by_state()
        {
			
			$state_id=$this->input->post('state_id');
			
			$sql = "SELECT * FROM district_master WHERE Statecode='".$state_id."' ";
				$data['District'] = $this->db->query($sql)->result_array();
				//print_r($this->db->last_query());
                $output = '<option value="">----Select District----</option>';
                
                foreach($this->db->query($sql)->result_array() as $row )
				{
                    $output .='<option value="'.$row['Districtcode'].'">'.$row['Districtname'].'</option>';
                }

			echo $output;
		}
		
		
	public function register_seller()
    {
						
            date_default_timezone_set('Asia/Kolkata');      
	        $createddate = date('Y-m-d H:i:s', time());
	        $fname = $this->input->post('fname');				
			$gender = $this->input->post('gender');
			
			$labh_executive_id = $this->input->post('labh_executive_id');
			$labh_agent_id = $this->input->post('labh_agent_id');			
			
			$usertype = $this->input->post('usertype');		
			$aadhar = $this->input->post('aadhar');
			$contact = $this->input->post('contact');
			$altcontact = $this->input->post('altcontact');
			$dob = $this->input->post('dob');
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			
	        $regionid = $this->input->post('regionid');           
            $region_state = $this->input->post('region_state');
            $district_branch = $this->input->post('district_branch');

			$state_first = $this->input->post('state_first');
			$district_first = $this->input->post('district_first');
			$city_first = $this->input->post('city_first');
			$pincode_first = $this->input->post('pincode_first');
			$permanent_address = $this->input->post('permanent_address');
			$current_address = $this->input->post('current_address');
			$state_second = $this->input->post('state_second');
			$district_second = $this->input->post('district_second');
			$city_second = $this->input->post('city_second');
			$pincode_second = $this->input->post('pincode_second');
			$state = $this->input->post('state');
			$pincode = $this->input->post('pincode');
			$companyname = $this->input->post('companyname');
			$proprietor_name = $this->input->post('proprietor_name');
			$gstin = $this->input->post('gstin');
			$panNo = $this->input->post('panNo');
			$tanNo = $this->input->post('tanNo');
			$seller_photo = $this->input->post('seller_photo');
			
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $password = substr( str_shuffle( $chars ), 0, 8 );				
		    $user_password=hash_hmac('sha256',$password, 'aSm0$i_20eNh3os');
			
		if($this->input->post('isedit') == 0)
        {
						
	        $this->db->select('*');
	        $this->db->from('users');
	        //$this->db->where('contact_no',$contact);
	        //$this->db->where('em_email',$email); 
	        $this->db->where('user_type',$usertype);
	        $this->db->where('pan_number',$panNo);	                   
	        //$this->db->where('isactive ',1);                    
	        $query=$this->db->get();
	        $sellercount = $query->num_rows();
		    //print_r($this->db->last_query());
			
            if($sellercount == 0)
            {   
	
				date_default_timezone_set('Asia/Kolkata');      
				$createddate = date('Y-m-d');
				$year = date('y', strtotime($createddate));
				$regionid = $this->input->post('regionid');
				$query_state = $this->db->query('SELECT id  AS seller_id FROM users ORDER BY id DESC  limit 1');
				$usercount= $query_state->result_array() ;
                $user_count= $query_state->num_rows() ; 				
				$sell_ip="";
				
				if($user_count >= 0)
				{
					foreach($usercount as $sellerid)
					{			
					   $sell_ip = $sellerid['seller_id']; 
					}					
					//echo $registerNo= str_replace($year.$regionid."000000", "",$sell_ip);
					$registerNo =$sell_ip + 1;
					$seller_id = $year.$regionid."000000".$registerNo;
				}								
				else
				{					                                      
                    $registerNo = 1;                    
                    $seller_id = $year.$regionid."000000".$registerNo;					
				}
				
				
				    //$seller_photo = $this->input->post('seller_photo');
                    $targetDir = "uploads/Seller_Documents/".$regionid."/".$seller_id."/" ;										
					$allowTypes = array('jpg', 'png', 'jpeg');
					if (!file_exists($targetDir)) 
					{    
						mkdir($targetDir, 0777, true);
					}					
					$fileName = basename($_FILES['seller_photo']['name']);
					$targetFilePath = $targetDir . $fileName;                        
					$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
					if (in_array($fileType, $allowTypes)) 
					{    
						ini_set('memory_limit', '1024M' );
						ini_set('upload_max_filesize', '500M');  
						ini_set('post_max_size', '500M');  
						ini_set('max_input_time', 3600);  
						ini_set('max_execution_time', 3600);
						move_uploaded_file($_FILES["seller_photo"]["tmp_name"], $targetFilePath); 
					}
					

                    $usersaveData=array(		   
							'user_id'=>$seller_id,							
							'user_type'=> $usertype,
							'first_name'=>$fname,
							'des_id'=>'SEL',
							'designation'=>'SEL',
							'em_email'=>$email,
							'username'=>$email,
							'em_password'=>$user_password,
							'password_dec'=>$password,
							'contact_no'=>$contact,							
                            'alter_mobileno'=>$altcontact,
							
							'region'=>$regionid,
							'region_state'=>$region_state,
                            'district_branch'=>$district_branch,

							//'division'=>$fname,
							'Laabh_executive'=>$labh_executive_id,
							
							'state_first'=>$state_first,
							'district_first'=>$district_first,
							'present_city'=>$city_second,
							'present_pincode'=>$pincode_first,
							'present_full_address'=>$current_address,	
							
							'state_second'=>$state_second,
							'district_second'=>$district_second,
							'permanent_city'=>$pincode_second,
							'permanent_pincode'=>$pincode_second,
							'permanent_full_address'=>$permanent_address,							
							'status'=> 'ACTIVE',														
							'em_gender'=>$gender,							
							'aadhar_number'=>$aadhar,
							'pan_number'=>$panNo,													
							'em_birthday'=>$dob,
							'em_image'=>$targetFilePath,
							
							'status'=>'ACTIVE',
							'created_on'=>date('Y-m-d H:i:s', time()),
							'updated_on'=>date('Y-m-d H:i:s', time()) ,
							
						   );
				        $user_insert_id = $this->db->insert('users', $usersaveData);
						$user_insert_id = $this->db->insert_id();
						//print_r($this->db->last_query());

			        $saveData=array(		   
							'fname'=>$fname,							
							'gender'=>$gender,
							'seller_id'=>$seller_id,
							'labh_emp_id'=>  $labh_executive_id,
							'labh_agent_id' =>$labh_agent_id,                           							
							'usertype'=>$usertype,
							'aadhar'=>$aadhar,
							'contact'=>$contact,
							'altcontact'=>$altcontact,
							'dob'=>$dob,
							'username'=>$email,							
							'email'=>$email,
							'seller_image'=>$targetFilePath,
							'password'=>$user_password,
							'dec_pass'=>$password,
							
							'region_id'=>$regionid,
							'region_state'=>$region_state,
                            'district_branch'=>$district_branch,
							
							'state_first'=>$state_first,
							'district_first'=>$district_first,
							'city_first'=>$city_first,
							'pincode_first'=>$pincode_first,						
							'current_address'=>$current_address,
							
							'state_second'=>$state_second,
							'district_second'=>$district_second,
							'city_second'=>$city_second,
							'pincode_second'=>$pincode_second,
							'permanent_address'=>$permanent_address,
							'companyname'=>$companyname,
							'proprietor_name'=>$proprietor_name,
							'gstin'=>$gstin,
							'panNo'=>$panNo,
							'tanNo'=>$tanNo,
							'createdon'=>date('Y-m-d H:i:s', time()),
							'updatedon'=>date('Y-m-d H:i:s', time()),
							'isactive'=>1
						   );
				        $lastinsertid = $this->Seller_model->insert_data($saveData);
													    
				        if($lastinsertid > 0)
				        { 
							echo "vvava";
							die;			 	    
							//$this->session->set_userdata('sellerid',$seller_id);
	                        $this->session->set_flashdata('status_test', 'Data Save Successfully !');
	                        $this->session->set_flashdata('status_icon', 'success');
	                        $this->session->set_flashdata('status', 'Data Saved !');
	                        
                            return redirect("SellerRegister/Documents/".$seller_id." ");							
							
                        }
				        else
				        {
							
				  	        $this->session->set_flashdata('status_test', 'Error due to Faild to Save Data!');
                            $this->session->set_flashdata('status_icon', 'error');
                            $this->session->set_flashdata('status', 'Data Not Saved !');
                            return redirect('SellerRegister/index');
							
				        }			 
			}
			else
			{
				
                $this->session->set_flashdata('status_test', 'This Seller is already Registered !');
                $this->session->set_flashdata('status_icon', 'info');
                $this->session->set_flashdata('status', 'Data Not Saved !');
                return redirect('SellerRegister/index');
				
			}
			
		}
		else
		{
			//echo "edit11";
			$sellerid = $this->input->post('sellerid');
			$id = $this->input->post('id');
			//die ;
			$usersaveData=array(		   
					//'user_id'=>$seller_id,							
					//'user_type'=> $usertype,
					'first_name'=>$fname,
					//'em_email'=>$email,
					//'username'=>$email,
					//'em_password'=>$user_password,
					//'password_dec'=>$password,
					//'contact_no'=>$contact,							
                    'alter_mobileno'=>$altcontact,							
					//'region'=>$regionid,
					//'division'=>$fname,
					//'Laabh_executive'=>$labh_executive_id,							
					'state_first'=>$state_first,
					'district_first'=>$district_first,
					'present_city'=>$city_second,
					'present_pincode'=>$pincode_first,
					'present_full_address'=>$current_address,	
							
					'state_second'=>$state_second,
					'district_second'=>$district_second,
					'permanent_city'=>$pincode_second,
					'permanent_pincode'=>$pincode_second,
					'permanent_full_address'=>$permanent_address,							
					'status'=> 'ACTIVE',														
					'em_gender'=>$gender,							
					'aadhar_number'=>$aadhar,
					'pan_number'=>$panNo,													
					'em_birthday'=>$dob,											
					'status'=>'ACTIVE',					
					'updated_on'=>date('Y-m-d H:i:s', time())
							
				);		    
			$this->db->set($usersaveData);					
			$this->db->where('user_id',$sellerid);
			$this->db->where('user_type',$usertype);
			$this->db->where('status','ACTIVE');
			$this->db->update('users', $usersaveData);
			$queryresult = $this->db->affected_rows();
			//print_r($this->db->last_query());
						
						
			$saveData=array(		   
					'fname'=>$fname,					
					'gender'=>$gender,
					//'seller_id'=>$seller_id,
					//'labh_agent_id'=>$labh_agent_id,
					//'usertype'=>$usertype,
					'aadhar'=>$aadhar,
					//'contact'=>$contact,
					'altcontact'=>$altcontact,
					'dob'=>$dob,
				
					//'username'=>$email,
					//'email'=>$email,
					//'seller_image'=>$targetFilePath,
					//'password'=>$user_password,
					//'dec_pass'=>$password,						
					//'region_id'=>$regionid,
					
					'state_first'=>$state_first,
					'district_first'=>$district_first,
					'city_first'=>$city_first,
					'pincode_first'=>$pincode_first,
					'permanent_address'=>$permanent_address,
					'current_address'=>$current_address,
					'state_second'=>$state_second,
					'district_second'=>$district_second,
					'city_second'=>$city_second,
					'pincode_second'=>$pincode_second,
					'companyname'=>$companyname,
					'proprietor_name'=>$proprietor_name,
					'gstin'=>$gstin,
					'panNo'=>$panNo,
					'tanNo'=>$tanNo,					
					'updatedon'=>date('Y-m-d H:i:s', time()) 					
			    );
		    $this->db->set($saveData);
            $this->db->where('id',$id);			
			$this->db->where('seller_id',$sellerid);
			$this->db->where('isactive',1);
			$this->db->update('seller', $saveData);
			$queryresult = $this->db->affected_rows();
			//print_r($this->db->last_query());
            
            if($_FILES['seller_photo']['name'] !=null)				
            {
                $seller_photo = $this->input->post('seller_photo');
					$targetDir = "uploads/Seller_Documents/".$regionid."/".$sellerid."/" ;					
					$allowTypes = array('jpg', 'png', 'jpeg');
					if (!file_exists($targetDir)) 
					{    
						mkdir($targetDir, 0777, true);
					}
                    					
					$fileName = basename($_FILES['seller_photo']['name']);
					$targetFilePath = $targetDir . $fileName;                        
					$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
					if (in_array($fileType, $allowTypes)) 
					{    
						ini_set('memory_limit', '1024M' );
						ini_set('upload_max_filesize', '500M');  
						ini_set('post_max_size', '500M');  
						ini_set('max_input_time', 3600);  
						ini_set('max_execution_time', 3600);
						move_uploaded_file($_FILES["seller_photo"]["tmp_name"], $targetFilePath); 
					}
					
					$data = array(
					
							'seller_image'=>$targetFilePath,
							
						    );
					    $this->db->set($data);
						$this->db->where('id',$id);			
						$this->db->where('seller_id',$sellerid);
						$this->db->where('isactive',1);
						$this->db->update('seller', $data);
						$queryresult2 = $this->db->affected_rows();
						//print_r($this->db->last_query());
                
				$this->session->set_flashdata('status_test', 'Data Updated Successfully !');
	            $this->session->set_flashdata('status_icon', 'success');
	            $this->session->set_flashdata('status', 'Data Updated !');
	            //return redirect('SellerRegister/addDocument/');
                return redirect("SellerRegister/Documents/".$sellerid." ");
				
            }
            else
			{
				
				$this->session->set_flashdata('status_test', 'Data Updated Successfully !');
	            $this->session->set_flashdata('status_icon', 'success');
	            $this->session->set_flashdata('status', 'Data Updated !');
	            //return redirect('SellerRegister/addDocument/');
                return redirect("SellerRegister/Documents/".$sellerid." ");
								
			}
           								
		}

	}	
	
	
	public function Documents($seller_id)
	{
		
		if ($this->session->userdata('user_login_access') == 1)
		{
			
			$data['title'] = 'Register - Tech Arise';
			$data['metaDescription'] = 'Register';
			$data['metaKeywords'] = 'Register';
			$data['sellerid'] = $seller_id;
				
			//$this->load->view('backend/header'); 
			//$this->load->view('backend/sidebar');
			//$this->load->view('backend/document', $data);
			//$this->load->view('backend/footer');
			
			$data['state_list'] = @$this->db->get('state_master')->result();
			$this->load->view('backend/new_header'); 
			$this->load->view('backend/new_sidebar'); 
			$this->load->view('backend/document', $data);
			$this->load->view('backend/new_footer');
			
			
		}
		else
		{
				
			return redirect('Login');
				
		}
		
					
	}
	
	
	public function upload_document()
	{
		
		date_default_timezone_set('Asia/Kolkata');      
        $createddate = date('Y-m-d H:i:s', time());
		
		$labhid = $this->input->post('labhid');
		$sellerid = $this->input->post('sellerid');
		$doctype = $this->input->post('doctype');
		$seller_details = $this->db->query("SELECT * FROM users WHERE user_id='".$sellerid."' AND user_type='3' AND status='ACTIVE' ");
		$sell_details= $seller_details->result();
		//print_r($this->db->last_query());
		
		foreach($sell_details as $row)
		{				
			$regionid = $row->region;																																	
		}
		
		if($doctype==1)
		{
			
			$docfile = $this->input->post('pandocfile');
			$targetDir = "uploads/Seller_Documents/".$regionid."/".$sellerid."/" ;
            $allowTypes = array('pdf','doc','csv');
            if (!file_exists($targetDir)) 
            {    
                mkdir($targetDir, 0777, true);
            } 
            $fileName = basename($_FILES['pandocfile']['name']);
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
                    
                move_uploaded_file($_FILES["pandocfile"]["tmp_name"], $targetFilePath); 
            }
			
		}
		else if($doctype==2)
		{
			
			$docfile = $this->input->post('tandocfile');
			
			$targetDir = "uploads/Seller_Documents/".$regionid."/".$sellerid."/" ;
            $allowTypes = array('pdf','doc','csv');
            if (!file_exists($targetDir)) 
            {    
                mkdir($targetDir, 0777, true);
            } 
            $fileName = basename($_FILES['tandocfile']['name']);
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
                    
                move_uploaded_file($_FILES["tandocfile"]["tmp_name"], $targetFilePath); 
            }
			
		}
		else if($doctype==3)
		{
			
			$docfile = $this->input->post('gstindocfile');
			
			$targetDir = "uploads/Seller_Documents/".$regionid."/".$sellerid."/" ;
            $allowTypes = array('pdf','doc','csv');
            if (!file_exists($targetDir)) 
            {    
                mkdir($targetDir, 0777, true);
            } 
            $fileName = basename($_FILES['gstindocfile']['name']);
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
                    
                move_uploaded_file($_FILES["gstindocfile"]["tmp_name"], $targetFilePath); 
            }
			
		}
		else if($doctype==4)
		{
			
			$docfile = $this->input->post('gemdocfile');
			
			$targetDir = "uploads/Seller_Documents/".$regionid."/".$sellerid."/" ;
            $allowTypes = array('pdf','doc','csv');
            if (!file_exists($targetDir)) 
            {    
                mkdir($targetDir, 0777, true);
            } 
            $fileName = basename($_FILES['gemdocfile']['name']);
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
                    
                move_uploaded_file($_FILES["gemdocfile"]["tmp_name"], $targetFilePath); 
            }
			
		}
		else if($doctype==5)
		{
			
			$docfile = $this->input->post('paymentdocfile');
			
			$targetDir = "uploads/Seller_Documents/".$regionid."/".$sellerid."/" ;
            $allowTypes = array('pdf','doc','csv');
            if (!file_exists($targetDir)) 
            {    
                mkdir($targetDir, 0777, true);
            } 
            $fileName = basename($_FILES['paymentdocfile']['name']);
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
                    
                move_uploaded_file($_FILES["paymentdocfile"]["tmp_name"], $targetFilePath); 
            }
			
		}
		else if($doctype==6)
		{
			
			$docfile = $this->input->post('moudocfile');
			
			$targetDir = "uploads/Seller_Documents/".$regionid."/".$sellerid."/" ;
            $allowTypes = array('pdf','doc','csv');
            if (!file_exists($targetDir)) 
            {    
                mkdir($targetDir, 0777, true);
            } 
            $fileName = basename($_FILES['moudocfile']['name']);
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
                    
                move_uploaded_file($_FILES["moudocfile"]["tmp_name"], $targetFilePath); 
            }
			
		}
					
            $data = array(
                    'labhid' => $labhid,
					'seller_id' => $sellerid,
					'doc_type_id' => $doctype,
					'document_path' => $targetFilePath,
					'status'=> 1,
					'created_time'=>$createddate,
					'updated_time'=>$createddate,
                    );    
                $last_insert_id = $this->db->insert('seller_document', $data);
    		    $last_insert_id = $this->db->insert_id();
    		    //print_r($this->db->last_query());
			    

                if($last_insert_id >0)
	            {   
                    if($doctype==1 || $doctype==2 || $doctype==3 || $doctype==4)
					{						
						$this->session->set_flashdata('status_test', 'Document Uploaded Successfully!');
						$this->session->set_flashdata('status_icon', 'success');
						$this->session->set_flashdata('status', 'Uploaded');
						return redirect("SellerRegister/Documents/".$sellerid." ");
					}
					else
					{
						$this->session->set_flashdata('status_test', 'Document Uploaded Successfully!');
						$this->session->set_flashdata('status_icon', 'success');
						$this->session->set_flashdata('status', 'Uploaded');
						return redirect("SellerRegister/mou/".$sellerid." ");
					}
					
			    } 
	            else
	            {  
                    if($doctype==1 || $doctype==2 || $doctype==3 || $doctype==4)
					{
						$this->session->set_flashdata('status_test', 'Error due to Faild to Save Data!');
						$this->session->set_flashdata('status_icon', 'error');
						$this->session->set_flashdata('status', 'Data Not Saved !');
						return redirect("SellerRegister/Documents/".$sellerid." ");
					}
					else
					{
						$this->session->set_flashdata('status_test', 'Error due to Faild to Save Data!');
						$this->session->set_flashdata('status_icon', 'error');
						$this->session->set_flashdata('status', 'Data Not Saved !');
						return redirect("SellerRegister/mou/".$sellerid." ");					
					}
					
				}     
                
	}


		
	
	
	
	public function submit_document()
	{
		
		$sellerid = $this->input->post('sellerid');
		
		$this->session->set_flashdata('status_test', 'Document Uploaded Successfully!');
		$this->session->set_flashdata('status_icon', 'success');
		$this->session->set_flashdata('status', 'Document Submitted !');
		
		return redirect("SellerRegister/Payment/".$sellerid." ");
		
	}
	
    public function Payment($sellerid)
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
			$this->load->view('backend/payment', $data);
			$this->load->view('backend/new_footer');
						
		}
		else
		{
				
			return redirect('Login');
				
		}
						
	}
	
	public function submit_payment()
	{
		
		$sellerid = $this->input->post('sellerid');
		
		$this->session->set_flashdata('status_test', 'Pyment updated Successfully!');
		$this->session->set_flashdata('status_icon', 'success');
		$this->session->set_flashdata('status', 'Payment Submitted !');
		
		return redirect("SellerRegister/mou/".$sellerid." ");
		
	}
   
	
	public function mou($sellerid)
	{
		
		if ($this->session->userdata('user_login_access') == 1)
		{
			
			$sql ="SELECT * from seller Where seller_id=".$sellerid." and isactive=1" ;
			$data['seller'] = $this->db->query($sql)->result();		
			
			$data['title'] = 'Register - Tech Arise';
			$data['metaDescription'] = 'Register';
			$data['metaKeywords'] = 'Register';
			$data['sellerid'] = $sellerid;
			
			$this->load->view('backend/new_header'); 
			$this->load->view('backend/new_sidebar'); 
			$this->load->view('backend/mou', $data);
			$this->load->view('backend/new_footer');
			
			
		}
		else
		{
				
			return redirect('Login');
				
		}
							
	}
	
	public function PrintMou($sellerid)
	{
		
		$sql ="SELECT * from seller Where seller_id=".$sellerid." and isactive=1" ;
		$data['seller'] = $this->db->query($sql)->result();	
		$this->load->view('backend/print_mou', $data);
		
	}


	public function submit_mou()
	{
		
		$sellerid = $this->input->post('sellerid');
		
		$this->session->set_flashdata('status_test', 'MOU Uploaded Successfully!');
		$this->session->set_flashdata('status_icon', 'success');
		$this->session->set_flashdata('status', 'Submitted !');
		
		return redirect("SellerRegister/application_preview/".$sellerid." ");
		
	}


    public function application_preview($sellerid)
	{
		
		if ($this->session->userdata('user_login_access') == 1)
		{	
	
			$sql ="SELECT * from seller Where  seller_id=".$sellerid."  " ;
			$data['seller'] = $this->db->query($sql)->result();						
			//var_dump($data['seller']); 
				
			$sql ="SELECT * from work_order Where  sellerid='".$sellerid."'  " ;
			$data['workorder'] = $this->db->query($sql)->result();			

			$data['title'] = 'Register - Tech Arise';
			$data['metaDescription'] = 'Register';
			$data['metaKeywords'] = 'Register';
			$data['sellerid'] = $sellerid;
			
			$this->load->view('backend/new_header'); 
			$this->load->view('backend/new_sidebar'); 
			$this->load->view('backend/preview', $data);
			$this->load->view('backend/new_footer');
								
		}
		else
		{
			
			return redirect('Login');
			
		}
								
	}
	
	
	public function print_preview($sellerid)
	{
			
		$sql ="SELECT * from seller Where seller_id=".$sellerid."  " ;
		$data['seller'] = $this->db->query($sql)->result();	
		
		$data['sellerid'] = $sellerid;
		$this->load->view('backend/print_preview', $data);
		
	}
	
	
	public function submit_registration()
	{
		
		$sellerid = $this->input->post('sellerid');
		
		$this->session->set_flashdata('status_test', 'Seller Registered Successfully!');
		$this->session->set_flashdata('status_icon', 'success');
		$this->session->set_flashdata('status', 'Submitted !');
		
		return redirect("SellerRegister/AllSeller");
		
	}


    public function AllSeller()
    {

        if ($this->session->userdata('user_login_access') != False)
        {
			
			$user_id = $this->session->userdata('user_login_id');
			$user_type = $this->session->userdata('user_type');
			$region='';
			$region_state='';
			$district_branch='';
			
			if($user_type==1)
			{
											
				$region = 0;				
								
				$data['sellerlist'] = $this->Seller_model->GetAllSeller($user_type,$user_id,$region,$region_state,$district_branch);
										 
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/seller_list',$data);				
				$this->load->view('backend/new_footer');
			} 
			else if($user_type==2)
			{
			
				$sql2 ="SELECT * from users Where user_id='".$user_id."' and status='ACTIVE'" ;
				$data['user_details'] = $this->db->query($sql2)->result();	
							
				foreach($data['user_details'] as $det)
				{				
					$region = $det->region;
					$region_state = $det->region_state;
                    $district_branch = $det->district_branch;
				}
				
				$data['sellerlist'] = $this->Seller_model->GetAllSeller($user_type,$user_id,$region,$region_state,$district_branch);
										 
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/seller_list',$data);				
				$this->load->view('backend/new_footer');
			}
			else if($user_type==5)
			{
			
				$sql2 ="SELECT * from users Where user_id='".$user_id."' and status='ACTIVE'" ;
				$data['user_details'] = $this->db->query($sql2)->result();	
							
				foreach($data['user_details'] as $det)
				{				
					$region = $det->region;
					$region_state = $det->region_state;
                    $district_branch = $det->district_branch;
				}
				
				$data['sellerlist'] = $this->Seller_model->GetAllSeller($user_type,$user_id,$region,$region_state,$district_branch);
										 
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/seller_list',$data);				
				$this->load->view('backend/new_footer');
			} 
			else if($user_type==6)
			{
			
				$sql2 ="SELECT * from users Where user_id='".$user_id."' and status='ACTIVE'" ;
				$data['user_details'] = $this->db->query($sql2)->result();	
							
				foreach($data['user_details'] as $det)
				{				
					$region = $det->region;
					$region_state = $det->region_state;
                    $district_branch = $det->district_branch;
				}
				
				$data['sellerlist'] = $this->Seller_model->GetAllSeller($user_type,$user_id,$region,$region_state,$district_branch);
										 
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/seller_list',$data);				
				$this->load->view('backend/new_footer');
			} 
			else if($user_type==11)
			{
			
				$sql2 ="SELECT * from users Where user_id='".$user_id."' and status='ACTIVE'" ;
				$data['user_details'] = $this->db->query($sql2)->result();	
							
				foreach($data['user_details'] as $det)
				{				
					$region = $det->region;
					$region_state = $det->region_state;
                    $district_branch = $det->district_branch;
				}
				
				$data['sellerlist'] = $this->Seller_model->GetAllSeller($user_type,$user_id,$region,$region_state,$district_branch);
										 
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/seller_list',$data);				
				$this->load->view('backend/new_footer');
			} 
			
			
        } 
        else 
        {
            redirect(base_url(), 'refresh');
        }
		
    }
	
	public function seller_personal_details($sellerid)
    {
			
		if ($this->session->userdata('user_login_access') == 1)
		{
												
			$sql = "SELECT * FROM seller WHERE seller_id='".$sellerid."' ";
			$data['Seller_Details'] = $this->db->query($sql)->result_array();
			//var_dump($Seller_Details);
				               
			$data['title'] = 'Register - Tech Arise';
			$data['metaDescription'] = 'Register';
			$data['metaKeywords'] = 'Register';
			$data['sellerid'] = $sellerid ;				
			$data['state_list'] = @$this->db->get('state_master')->result();
			$data['district_list'] = @$this->db->get('district_master')->result();
			
			$this->load->view('backend/new_header'); 
			$this->load->view('backend/new_sidebar'); 
			$this->load->view('backend/seller_information', $data);
			$this->load->view('backend/new_footer');
				
	    }
		else
		{
				
			redirect('Login');
				
		}	
			
    }
	
		
	public function SellerDetails($sellerid)
	{
		
        if ($this->session->userdata('user_login_access') != False)
        {
			
			//$this->checkLogin();
			$seller['seller'] = $this->Seller_model->sellerSingle($sellerid);
  						
			$this->load->view('backend/new_header'); 
			$this->load->view('backend/new_sidebar'); 
			$this->load->view('backend/seller_details', $seller);
			$this->load->view('backend/new_footer');
			
		} 
        else 
        {
            redirect(base_url(), 'refresh');
        }	

	}
	
	
	public function seller_approvel($sellerid)
    {

		if ($this->session->userdata('user_login_access') != False)
        {
			
			$user_id = $this->session->userdata('user_login_id');	
            $user_type = $this->session->userdata('user_type');
			
            if($user_type==2)
			{	
		
			    $sql2 ="SELECT * from users Where user_id='".$user_id."' and status='ACTIVE'" ;
				$data['user_details'] = $this->db->query($sql2)->result();	
							
				foreach($data['user_details'] as $det)
				{				
					$region = $det->region;				
				}
				
				$update = $this->Seller_model->approve_seller($region,$user_id,$sellerid,$user_type);
				$data['seller'] = $this->Seller_model->sellerSingle($sellerid);
				
				foreach ($data['seller'] as $seller_data) 
				{ 			
					$seller_name=$seller_data->fname;
					$contact=$seller_data->contact;
					$email=$seller_data->email;
					$password=$seller_data->dec_pass;			
				}
				
				if($update >= 0)	
				{																																								
					$this->session->set_flashdata('status_test', 'Seller Approved !');
					$this->session->set_flashdata('status_icon', 'success');
					$this->session->set_flashdata('status', 'Approved !');
					
					redirect('SellerRegister/AllSeller');															
				}
				else
				{
					$this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
					$this->session->set_flashdata('status_icon', 'error');
					$this->session->set_flashdata('status', 'Data Not Saved !');
					
					redirect('SellerRegister/AllSeller');
				}
				
			}
			else if($user_type==6)
			{	
		
			    $sql2 ="SELECT * from users Where user_id='".$user_id."' and status='ACTIVE'" ;
				$data['user_details'] = $this->db->query($sql2)->result();	
							
				foreach($data['user_details'] as $det)
				{				
					$region = $det->region ;				
				}
				
				$update = $this->Seller_model->approve_seller($region,$user_id,$sellerid,$user_type);
				$data['seller'] = $this->Seller_model->sellerSingle($sellerid);
				
				foreach ($data['seller'] as $seller_data) 
				{ 			
					$seller_name=$seller_data->fname;
					$labh_agent_id=$seller_data->labh_agent_id;
					$contact=$seller_data->contact;
					$email=$seller_data->email;
					$password=$seller_data->dec_pass;
					$renew_date=$seller_data->renew_date;
				}
				
				if($update > 0)	
				{
					
					$this->load->library('email');
											
					$message  = 'Dear Client <b>'.ucwords(strtolower($seller_name)).'</b>,<br><br>';
					$message .= 'Thank you for your Registration with INDIGEM CHANNEL PARTNERS PVT. LTD. <br><br>';
					$message .= 'Your Login details is...<br>';
					$message .= 'User Type : <b>Seller</b> <br>';
					$message .= 'Seller ID : <b>'.$sellerid.'</b> <br>';
					$message .= 'Laabh Agent ID : <b>'.$labh_agent_id.'</b> <br>';
					$message .= 'User ID : <b>'.$email.'</b> <br>';
					$message .= 'Password : <b>'.$password.'</b> <br>';
					$message .= 'Valid Upto : <b>'.$renew_date.'</b>';
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
					$this->email->to($email);
					$this->email->from('indigeminfo@gmail.com', 'indigeminfo@gmail.com');
					$this->email->subject('Registration Confirmation || INDIGEMCP');
					$this->email->message($htmlContent);
								
					$email_response= $this->email->send();
					//var_dump($email_response);				
					$errors = $this->email->print_debugger();
					//var_dump($errors);
					//echo $email_response;
					
					if($email_response == 1)
					{
																										
						$this->session->set_flashdata('status_test', 'Seller Approved & Activated !');
						$this->session->set_flashdata('status_icon', 'success');
						$this->session->set_flashdata('status', 'Approved !');
						
						redirect('SellerRegister/AllSeller');
						
					}
					else
					{
						
						$this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
						$this->session->set_flashdata('status_icon', 'error');
						$this->session->set_flashdata('status', 'E-MAIL Not Send !');
						
						redirect('SellerRegister/AllSeller');
						
					}
					
				}
				else
				{
					$this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
					$this->session->set_flashdata('status_icon', 'error');
					$this->session->set_flashdata('status', 'Data Not Saved !');
					
					redirect('SellerRegister/AllSeller');
				}
				
			}
			
		}
		else
		{
			redirect('Login');
		}

    }
	
	
	public function Seller_Delete($sellerid)
    {
		
		if ($this->session->userdata('user_login_access') != False)
		{
			$success = $this->Seller_model->SellerDelete($sellerid);
				
			if($success > 0)
			{
				$this->session->set_flashdata('status_test', 'Seller Deleted!');
				$this->session->set_flashdata('status_icon', 'danger');
				$this->session->set_flashdata('status', 'Deleted !');
				redirect('SellerRegister/AllSeller');
			}
			else
			{				
				$this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
				$this->session->set_flashdata('status_icon', 'error');
				$this->session->set_flashdata('status', 'error !');
				redirect('SellerRegister/AllSeller');				
			}
		
		}
		else
		{

			redirect('Login');
		}			
		
	}
	
	
	public function reject_seller($sellerid)
	{
		if ($this->session->userdata('user_login_access') != False)
		{

			$sellerstatus =  $this->Seller_model->Seller_Reject($sellerid);

			if ($sellerstatus>0) 
			{
				$this->session->set_flashdata('status_test', 'Seller Rejected!');
				$this->session->set_flashdata('status_icon', 'success');
				$this->session->set_flashdata('status', 'Rejected !');
				redirect('SellerRegister/AllSeller');
			}
			else
			{

				$this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
				$this->session->set_flashdata('status_icon', 'error');
				$this->session->set_flashdata('status', 'error !');
						
				redirect('SellerRegister/AllSeller');
			}
		}
		else
		{

			redirect('Login');

		}
		
	}


    



	
/*
    public function sellerlistDelet()
	{
		
		if ($this->session->userdata('user_login_access') != False) 
		{
			$id    = base64_decode($this->input->get('D'));
			$value = $this->seller_model->DletSellerData($id);
			redirect('SellerRegister/AllSeller');
		} 
		else 
		{
			redirect(base_url(), 'refresh');
		}
		
	}

*/













}


