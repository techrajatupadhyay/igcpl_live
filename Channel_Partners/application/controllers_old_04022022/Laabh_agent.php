<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laabh_agent extends CI_Controller
{
  
    public function __construct()
    {
		
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->model('Agent_model');
		$this->load->model('Seller_model');
		$this->load->model('Admin_model');
		
    }

  
    public function index()
    {
		
        if ($this->session->userdata('user_login_access') != False)
        {
            $data['state_list'] = @$this->db->get('state_master')->result();
            $data['district_list'] = @$this->db->get('district_master')->result();
            $data['designation'] = @$this->db->get('designation')->result();
          
            $this->load->view('backend/new_header');
            $this->load->view('backend/new_sidebar'); 
            $this->load->view('backend/add-employee',$data);
            $this->load->view('backend/new_footer'); 
        } 
        else 
        {
            redirect(base_url(), 'refresh');
        }
		
    }
	
	
	/*------------------------Laabh Agent------------------*/
	 
    public function register_laabh_agent()
    {

        if ($this->session->userdata('user_login_access') != False)
        {
            $data['state_list'] = @$this->db->get('state_master')->result();
            $data['district_list'] = @$this->db->get('district_master')->result();
            //$data['designation'] = @$this->db->get('designation')->result();
			$data['designation'] =  $this->db->select('*')->from('designation')->where('value', 'GLA')->limit(1)->get()->result();
            $data['division'] = @$this->db->get('division')->result();
            
			$data['region_list'] = @$this->db->get('region')->result();
            $data['region_state_list'] = @$this->db->get('region')->result();
            $data['districtbranch'] = @$this->db->get('district_branch')->result();         
            
			$this->load->view('backend/new_header');
            $this->load->view('backend/new_sidebar'); 
            $this->load->view('backend/add_laabh_agent',$data);
            $this->load->view('backend/new_footer'); 
        } 
        else 
        {
            redirect(base_url(), 'refresh');
        }
    }


    public function add_agent()
    {
                        
        date_default_timezone_set('Asia/Kolkata');      
        $created_on = date('Y-m-d H:i:s', time());
       
        $usertype = $this->input->post('user_type');  
        $first_name = $this->input->post('agent_name');
        $contact_no = $this->input->post('contact_no');
        $alter_mobileno = $this->input->post('alter_mobileno');
        $em_email = $this->input->post('em_email');
        $em_gender = $this->input->post('em_gender');
        //$emrand = substr($lname,0,3).rand(1000,2000);
        $designation = $this->input->post('designation');
        $em_birthday = $this->input->post('em_birthday');
        
        $regionid = $this->input->post('region');
        $region_state = $this->input->post('region_state');
        $district_branch = $this->input->post('district_branch');

        $division = $this->input->post('division');
        $Laabh_executive = $this->input->post('laabh_executive');
        $state_first = $this->input->post('state_first');
        $district_first = $this->input->post('district_first');
        $present_city = $this->input->post('present_city');
        $present_pincode = $this->input->post('present_pincode');
        $present_full_address = $this->input->post('present_full_address');
        $state_second = $this->input->post('state_second');
        $district_second = $this->input->post('district_second');   
        $permanent_city = $this->input->post('permanent_city');
        $permanent_pincode = $this->input->post('permanent_pincode');
        $permanent_full_address = $this->input->post('permanent_full_address');
        $joining_date = $this->input->post('joining_date');
        $aadhar_number = $this->input->post('aadhar_number');
        $pan_number = $this->input->post('pan_number');
        $pf_number = $this->input->post('pf_number');
        $bank_name = $this->input->post('bank_name');
        $bank_acc_no = $this->input->post('bank_acc_no');
        $ifsc_code = $this->input->post('ifsc_code');
		$agent_image = $this->input->post('agent_image');		
        $agent_signature = $this->input->post('agent_signature');		
        $resume = $this->input->post('resume');
        $marksheet = $this->input->post('marksheet');
        $experience_letter = $this->input->post('experience_letter'); 
        $contract_letter = $this->input->post('contract_letter'); 		
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr( str_shuffle( $chars ), 0, 8 );				
		$user_password=hash_hmac('sha256',$password, 'aSm0$i_20eNh3os');

			
        if($this->input->post('isedit')==0)
        {
            
            $this->db->select('*');
			$this->db->from('users');
			$this->db->where('user_type',$usertype);
			$this->db->where('region',$regionid);
			$this->db->where('region_state',$region_state);
            $this->db->where('district_branch',$district_branch);								                   
			$query=$this->db->get();
			$user_total_count = $query->num_rows();
			//print_r($this->db->last_query());				
				
            if($user_total_count == 30)
            {
				
                $this->session->set_flashdata('status_test', 'Limit of Maximum no of Executive in one Branch is Exceeded !');
				$this->session->set_flashdata('status_icon', 'info');
				$this->session->set_flashdata('status', 'Limit Exceeded !');
				
				return redirect('Laabh_agent/All_Laabh_agents');
				
			}
			else
			{
				
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('contact_no',$contact_no);
				$this->db->where('em_email',$em_email); 
				$this->db->where('user_type',$usertype);
				//$this->db->where('region',$regionid);	                   
				$query=$this->db->get();
				$agentcount = $query->num_rows();
				//print_r($this->db->last_query());
				//die;
				if($agentcount ==0)
				{   
		
					date_default_timezone_set('Asia/Kolkata');      
					$createddate = date('Y-m-d');
					$year = date('y', strtotime($createddate));
					//$regionid = $this->input->post('region');
					$query_state = $this->db->query('SELECT id  AS agent_id FROM users ORDER BY id DESC  limit 1');
					$usercount= $query_state->result_array() ;
					$user_count= $query_state->num_rows() ; 				
					$sell_ip="";
					
					if($user_count > 0)                 
					{
						foreach($usercount as $usercount)
						{           
						   $sell_ip = $usercount['agent_id']; 
						}                   
						$registerNo =$sell_ip + 1;
						$user_id = $year.$regionid.$designation."000".$registerNo;
					}
					else
					{					                                      
						$registerNo = 1;
						$user_id = $year.$regionid.$designation."000".$registerNo;					
					}
					
				   
						$agent_image = $this->input->post('agent_image');                  
						$targetDir = "uploads/Agent_Documents/".$regionid."/".$user_id."/" ;
						$allowTypes = array('jpg', 'png', 'jpeg');
						if (!file_exists($targetDir)) 
						{    
							mkdir($targetDir, 0777, true);
						}                                      
						$fileName = basename($_FILES['agent_image']['name']);
						$targetFilePath = $targetDir . $fileName;                        
						$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
						if (in_array($fileType, $allowTypes)) 
						{    
							ini_set('memory_limit', '1024M' );
							ini_set('upload_max_filesize', '500M');  
							ini_set('post_max_size', '500M');  
							ini_set('max_input_time', 3600);  
							ini_set('max_execution_time', 3600);
							move_uploaded_file($_FILES["agent_image"]["tmp_name"], $targetFilePath); 
						}
						
						$agent_signature = $this->input->post('agent_signature');                  
						$targetDir = "uploads/Agent_Documents/".$regionid."/".$user_id."/" ;
						$allowTypes = array('jpg', 'png', 'jpeg');
						if (!file_exists($targetDir)) 
						{    
							mkdir($targetDir, 0777, true);
						}                                      
						$fileName = basename($_FILES['agent_signature']['name']);
						$targetFilePath2 = $targetDir . $fileName;                        
						$fileType = pathinfo($targetFilePath2, PATHINFO_EXTENSION);
						if (in_array($fileType, $allowTypes)) 
						{    
							ini_set('memory_limit', '1024M' );
							ini_set('upload_max_filesize', '500M');  
							ini_set('post_max_size', '500M');  
							ini_set('max_input_time', 3600);  
							ini_set('max_execution_time', 3600);
							move_uploaded_file($_FILES["agent_signature"]["tmp_name"], $targetFilePath2); 
						}
						
						$resume = $this->input->post('resume');                  
						$targetDir = "uploads/Agent_Documents/".$regionid."/".$user_id."/" ;
						$allowTypes = array('pdf','doc','csv');
						if (!file_exists($targetDir)) 
						{    
							mkdir($targetDir, 0777, true);
						}                                      
						$fileName = basename($_FILES['resume']['name']);
						$targetFilePath3 = $targetDir . $fileName;                        
						$fileType = pathinfo($targetFilePath3, PATHINFO_EXTENSION);
						if (in_array($fileType, $allowTypes)) 
						{    
							ini_set('memory_limit', '1024M' );
							ini_set('upload_max_filesize', '500M');  
							ini_set('post_max_size', '500M');  
							ini_set('max_input_time', 3600);  
							ini_set('max_execution_time', 3600);
							move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFilePath3); 
						}
						
						$marksheet = $this->input->post('marksheet');                  
						$targetDir = "uploads/Agent_Documents/".$regionid."/".$user_id."/" ;
						$allowTypes = array('pdf','doc','csv');
						if (!file_exists($targetDir)) 
						{    
							mkdir($targetDir, 0777, true);
						}                                      
						$fileName = basename($_FILES['marksheet']['name']);
						$targetFilePath4 = $targetDir . $fileName;                        
						$fileType = pathinfo($targetFilePath4, PATHINFO_EXTENSION);
						if (in_array($fileType, $allowTypes)) 
						{    
							ini_set('memory_limit', '1024M' );
							ini_set('upload_max_filesize', '500M');  
							ini_set('post_max_size', '500M');  
							ini_set('max_input_time', 3600);  
							ini_set('max_execution_time', 3600);
							move_uploaded_file($_FILES["marksheet"]["tmp_name"], $targetFilePath4); 
						}
						
						if($_FILES['experience_letter']['name'] != null || $_FILES['experience_letter']['name'] !="")
						{
							$experience_letter = $this->input->post('experience_letter');                  
							$targetDir = "uploads/Agent_Documents/".$regionid."/".$user_id."/" ;
							$allowTypes = array('pdf','doc','csv');
							if (!file_exists($targetDir)) 
							{    
								mkdir($targetDir, 0777, true);
							}                                      
							$fileName = basename($_FILES['experience_letter']['name']);
							$targetFilePath5 = $targetDir . $fileName;                        
							$fileType = pathinfo($targetFilePath5, PATHINFO_EXTENSION);
							if (in_array($fileType, $allowTypes)) 
							{    
								ini_set('memory_limit', '1024M' );
								ini_set('upload_max_filesize', '500M');  
								ini_set('post_max_size', '500M');  
								ini_set('max_input_time', 3600);  
								ini_set('max_execution_time', 3600);
								move_uploaded_file($_FILES["experience_letter"]["tmp_name"], $targetFilePath5); 
							}
						}
						else
						{
							$targetFilePath5="";
						}
						
						$contract_letter = $this->input->post('contract_letter');                  
						$targetDir = "uploads/Agent_Documents/".$regionid."/".$user_id."/" ;
						$allowTypes = array('pdf','doc','csv');
						if (!file_exists($targetDir)) 
						{    
							mkdir($targetDir, 0777, true);
						}                                      
						$fileName = basename($_FILES['contract_letter']['name']);
						$targetFilePath6 = $targetDir . $fileName;                        
						$fileType = pathinfo($targetFilePath6, PATHINFO_EXTENSION);
						if (in_array($fileType, $allowTypes)) 
						{    
							ini_set('memory_limit', '1024M' );
							ini_set('upload_max_filesize', '500M');  
							ini_set('post_max_size', '500M');  
							ini_set('max_input_time', 3600);  
							ini_set('max_execution_time', 3600);
							move_uploaded_file($_FILES["contract_letter"]["tmp_name"], $targetFilePath6); 
						}

						$usersaveData=array(           
							   
								'user_id'=> $user_id,
								'user_type'=> $usertype,
								'des_id' => $designation,							
								'first_name'=> $first_name,
								'em_email'=> $em_email,
								'username'=> $em_email,
								'em_password'=>$user_password,
								'password_dec'=>$password,
								'em_role' => 'EMPLOYEE',
								'contact_no'=> $contact_no,
								'alter_mobileno'=> $alter_mobileno,
								
								'region'=> $regionid,
								'region_state'=>$region_state,
								'district_branch'=>$district_branch,

								'division'=> $division,
								'Laabh_executive'=> $Laabh_executive,
								'designation' => $designation,
								'state_first'=>$state_first,
								'district_first'=> $district_first,
								'present_city'=>$present_city,
								'present_pincode '=> $present_pincode ,
								'present_full_address'=> $present_full_address,
								
								'state_second'=> $state_second,
								'district_second' => $district_second,
								'permanent_city'=> $permanent_city,
								'permanent_pincode'=>$permanent_pincode,							
								'permanent_full_address'=>$permanent_full_address,
								
								'status'=>'ACTIVE',
								'em_gender'=> $em_gender,                                                
								'em_birthday'=> $em_birthday,
															
								'joining_date'=> $joining_date,
								'aadhar_number'=>$aadhar_number,
								'pan_number'=>$pan_number,
								'pf_number' => $pf_number,
								'bank_name'=>$bank_name,
								'bank_acc_no' =>$bank_acc_no,
								'ifsc_code' => $ifsc_code,
															
								'em_image' => $targetFilePath,
								'upload_resume' => $targetFilePath3,
								'marksheet' => $targetFilePath4,
								'experience_letter' => $targetFilePath5,
								'signature' => $targetFilePath2,
								'contract_letter' => $targetFilePath6,
								'user_status' => 0,
								'executive_approvel' => 1,
								
								'created_on'=> $created_on,
								'updated_on'=> $created_on 
									
								);
							$user_insert_id = $this->db->insert('users', $usersaveData);
							$user_insert_id = $this->db->insert_id();
							//print_r($this->db->last_query());
							

						$saveData=array(           
							
								'user_id'=> $user_id,
								'user_type'=> $usertype,
								'des_id' => $designation,
								'laabh_executive'=> $Laabh_executive,							
								'first_name'=> $first_name,
								'em_email'=> $em_email,
								'username'=> $em_email,
								'em_password'=>$user_password,
								'password_dec'=>$password,
								
								'contact_no'=> $contact_no,
								'alter_mobileno'=> $alter_mobileno,
								
								'region'=> $regionid,
								'region_state'=>$region_state,
								'district_branch'=>$district_branch,

								'division'=> $division,
								'joining_date'=> $joining_date,						
								'state_first'=>$state_first,
								'district_first'=> $district_first,
								'present_city'=>$present_city,
								'present_pincode '=> $present_pincode ,
								'present_full_address'=> $present_full_address,
								
								'state_second'=> $state_second,
								'district_second' => $district_second,
								'permanent_city'=> $permanent_city,
								'permanent_pincode'=>$permanent_pincode,							
								'permanent_full_address'=>$permanent_full_address,
								
								'status'=>'ACTIVE',
								'em_gender'=> $em_gender,                                                
								'em_birthday'=> $em_birthday,
																						
								'aadhar_number'=>$aadhar_number,
								'pan_number'=>$pan_number,
								'pf_number' => $pf_number,
								'bank_name'=>$bank_name,
								'bank_acc_no' =>$bank_acc_no,
								'ifsc_code' => $ifsc_code,
															
								'em_image' => $targetFilePath,
								'upload_resume' => $targetFilePath3,
								'marksheet' => $targetFilePath4,
								'experience_letter' => $targetFilePath5,
								'signature' => $targetFilePath2,
								'contract_letter' => $targetFilePath6,
								
								'created_on'=> $created_on,
								'updated_on'=> $created_on 
							   
							);
							$lastinsertid = $this->Agent_model->insert_laabh_agent($saveData);
															
							if($lastinsertid > 0)
							{ 
												
								//$this->session->set_userdata('sellerid',$seller_id);
								$this->session->set_flashdata('status_test', 'Agent Registered Successfully !');
								$this->session->set_flashdata('status_icon', 'success');
								$this->session->set_flashdata('status', 'Data Saved !');
								
								return redirect("Laabh_agent/All_Laabh_agents");                            
								
							}
							else
							{
								
								$this->session->set_flashdata('status_test', 'Error due to Faild to Save Data!');
								$this->session->set_flashdata('status_icon', 'error');
								$this->session->set_flashdata('status', 'Data Not Saved !');
								return redirect('Laabh_agent/register_laabh_agent');
								
							}            
				}
				else
				{
					
					$this->session->set_flashdata('status_test', 'This Agent is already Registered !');
					$this->session->set_flashdata('status_icon', 'info');
					$this->session->set_flashdata('status', 'Data Not Saved !');
					return redirect('Laabh_agent/register_laabh_agent');
					
				}
				
			}
            
        }
		else
		{
			
			$user_id = $this->input->post('laabh_agent_id');
			$laabh_executive = $this->input->post('laabh_executive');
			$id = $this->input->post('id');
			
			if($_FILES['agent_image']['name'] !=null || $_FILES['agent_image']['name'] !="")
			{
			        $agent_image = $this->input->post('agent_image');                  
                    $targetDir = "uploads/Agent_Documents/".$regionid."/".$user_id."/" ;
                    $allowTypes = array('jpg', 'png', 'jpeg');
                    if (!file_exists($targetDir)) 
                    {    
                        mkdir($targetDir, 0777, true);
                    }                                      
                    $fileName = basename($_FILES['agent_image']['name']);
                    $targetFilePath = $targetDir . $fileName;                        
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                    if (in_array($fileType, $allowTypes)) 
                    {    
                        ini_set('memory_limit', '1024M' );
                        ini_set('upload_max_filesize', '500M');  
                        ini_set('post_max_size', '500M');  
                        ini_set('max_input_time', 3600);  
                        ini_set('max_execution_time', 3600);
                        move_uploaded_file($_FILES["agent_image"]["tmp_name"], $targetFilePath); 
                    }
					
					$usersaveData=array(                                    																																																					
							'em_image' => $targetFilePath,															
							);                        						
						$this->db->set($usersaveData);								
						$this->db->where('user_id',$user_id);
						$this->db->where('user_type',$usertype);
						$this->db->where('Laabh_executive',$laabh_executive);
                        $this->db->where('region',$regionid);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('users', $usersaveData);
						$queryresult1 = $this->db->affected_rows();
						//print_r($this->db->last_query());
						
					$this->db->set($usersaveData);
						$this->db->where('id',$id);			
						$this->db->where('user_id',$user_id);
                        $this->db->where('laabh_executive',$laabh_executive);
                        $this->db->where('region',$regionid);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('laabh_agents', $usersaveData);
						$queryresult2 = $this->db->affected_rows();	
			}
            else
			{
                $targetFilePath="";
			}

			if($_FILES['agent_signature']['name'] !=null || $_FILES['agent_signature']['name'] !="")
			{
				
					$agent_signature = $this->input->post('agent_signature');                  
                    $targetDir = "uploads/Agent_Documents/".$regionid."/".$user_id."/" ;
                    $allowTypes = array('jpg', 'png', 'jpeg');
                    if (!file_exists($targetDir)) 
                    {    
                        mkdir($targetDir, 0777, true);
                    }                                      
                    $fileName = basename($_FILES['agent_signature']['name']);
                    $targetFilePath2 = $targetDir . $fileName;                        
                    $fileType = pathinfo($targetFilePath2, PATHINFO_EXTENSION);
                    if (in_array($fileType, $allowTypes)) 
                    {    
                        ini_set('memory_limit', '1024M' );
                        ini_set('upload_max_filesize', '500M');  
                        ini_set('post_max_size', '500M');  
                        ini_set('max_input_time', 3600);  
                        ini_set('max_execution_time', 3600);
                        move_uploaded_file($_FILES["agent_signature"]["tmp_name"], $targetFilePath2); 
                    }
					
					$usersaveData=array(                                    																																																					
							'signature' => $targetFilePath2,															
							);                        						
						$this->db->set($usersaveData);								
						$this->db->where('user_id',$user_id);
						$this->db->where('user_type',$usertype);
						$this->db->where('Laabh_executive',$laabh_executive);
                        $this->db->where('region',$regionid);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('users', $usersaveData);
						$queryresult1 = $this->db->affected_rows();
						//print_r($this->db->last_query());
					
					$this->db->set($usersaveData);
						$this->db->where('id',$id);			
						$this->db->where('user_id',$user_id);
                        $this->db->where('laabh_executive',$laabh_executive);
                        $this->db->where('region',$regionid);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('laabh_agents', $usersaveData);
						$queryresult2 = $this->db->affected_rows();	
            }
            else
			{
                $targetFilePath2="";
			} 
			
			
			if($_FILES['resume']['name'] !=null || $_FILES['resume']['name'] !="")
			{
					$resume = $this->input->post('resume');                  
                    $targetDir = "uploads/Agent_Documents/".$regionid."/".$user_id."/" ;
                    $allowTypes = array('pdf','doc','csv');
                    if (!file_exists($targetDir)) 
                    {    
                        mkdir($targetDir, 0777, true);
                    }                                      
                    $fileName = basename($_FILES['resume']['name']);
                    $targetFilePath3 = $targetDir . $fileName;                        
                    $fileType = pathinfo($targetFilePath3, PATHINFO_EXTENSION);
                    if (in_array($fileType, $allowTypes)) 
                    {    
                        ini_set('memory_limit', '1024M' );
                        ini_set('upload_max_filesize', '500M');  
                        ini_set('post_max_size', '500M');  
                        ini_set('max_input_time', 3600);  
                        ini_set('max_execution_time', 3600);
                        move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFilePath3); 
                    }
					
					$usersaveData=array(                                    																																																					
							'upload_resume' => $targetFilePath3,															
							);                        						
						$this->db->set($usersaveData);								
						$this->db->where('user_id',$user_id);
						$this->db->where('user_type',$usertype);
						$this->db->where('Laabh_executive',$laabh_executive);
                        $this->db->where('region',$regionid);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('users', $usersaveData);
						$queryresult1 = $this->db->affected_rows();
						//print_r($this->db->last_query());
						
					$this->db->set($usersaveData);
						$this->db->where('id',$id);			
						$this->db->where('user_id',$user_id);
                        $this->db->where('laabh_executive',$laabh_executive);
                        $this->db->where('region',$regionid);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('laabh_agents', $usersaveData);
						$queryresult2 = $this->db->affected_rows();	
			}
            else
			{
                $targetFilePath3="";
			}
			
			
			if($_FILES['marksheet']['name'] !=null || $_FILES['marksheet']['name'] !="")
			{
					$marksheet = $this->input->post('marksheet');                  
                    $targetDir = "uploads/Agent_Documents/".$regionid."/".$user_id."/" ;
                    $allowTypes = array('pdf','doc','csv');
                    if (!file_exists($targetDir)) 
                    {    
                        mkdir($targetDir, 0777, true);
                    }                                      
                    $fileName = basename($_FILES['marksheet']['name']);
                    $targetFilePath4 = $targetDir . $fileName;                        
                    $fileType = pathinfo($targetFilePath4, PATHINFO_EXTENSION);
                    if (in_array($fileType, $allowTypes)) 
                    {    
                        ini_set('memory_limit', '1024M' );
                        ini_set('upload_max_filesize', '500M');  
                        ini_set('post_max_size', '500M');  
                        ini_set('max_input_time', 3600);  
                        ini_set('max_execution_time', 3600);
                        move_uploaded_file($_FILES["marksheet"]["tmp_name"], $targetFilePath4); 
                    }
					
					$usersaveData=array(                                    																																																					
							'marksheet' => $targetFilePath4,															
							);                        						
						$this->db->set($usersaveData);								
						$this->db->where('user_id',$user_id);
						$this->db->where('user_type',$usertype);
						$this->db->where('Laabh_executive',$laabh_executive);
                        $this->db->where('region',$regionid);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('users', $usersaveData);
						$queryresult1 = $this->db->affected_rows();
						//print_r($this->db->last_query());
						
					$this->db->set($usersaveData);
						$this->db->where('id',$id);			
						$this->db->where('user_id',$user_id);
                        $this->db->where('laabh_executive',$laabh_executive);
                        $this->db->where('region',$regionid);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('laabh_agents', $usersaveData);
						$queryresult2 = $this->db->affected_rows();	
			}
            else
			{
                $targetFilePath4="";
			}
			
			
			if($_FILES['experience_letter']['name'] != null || $_FILES['experience_letter']['name'] !="")
			{
						$experience_letter = $this->input->post('experience_letter');                  
						$targetDir = "uploads/Agent_Documents/".$regionid."/".$user_id."/" ;
						$allowTypes = array('pdf','doc','csv');
						if (!file_exists($targetDir)) 
						{    
							mkdir($targetDir, 0777, true);
						}                                      
						$fileName = basename($_FILES['experience_letter']['name']);
						$targetFilePath5 = $targetDir . $fileName;                        
						$fileType = pathinfo($targetFilePath5, PATHINFO_EXTENSION);
						if (in_array($fileType, $allowTypes)) 
						{    
							ini_set('memory_limit', '1024M' );
							ini_set('upload_max_filesize', '500M');  
							ini_set('post_max_size', '500M');  
							ini_set('max_input_time', 3600);  
							ini_set('max_execution_time', 3600);
							move_uploaded_file($_FILES["experience_letter"]["tmp_name"], $targetFilePath5); 
						}
						
					$usersaveData=array(                                    																																																					
							'experience_letter' => $targetFilePath5,															
							);                        						
					$this->db->set($usersaveData);								
						$this->db->where('user_id',$user_id);
						$this->db->where('user_type',$usertype);
						$this->db->where('Laabh_executive',$laabh_executive);
                        $this->db->where('region',$regionid);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('users', $usersaveData);
						$queryresult1 = $this->db->affected_rows();
						//print_r($this->db->last_query());
												                       						
					$this->db->set($usersaveData);
						$this->db->where('id',$id);			
						$this->db->where('user_id',$user_id);
                        $this->db->where('laabh_executive',$laabh_executive);
                        $this->db->where('region',$regionid);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('laabh_agents', $usersaveData);
						$queryresult2 = $this->db->affected_rows();
			}
			else
			{
				$targetFilePath5="";
			}
			
			if($_FILES['contract_letter']['name'] != null || $_FILES['contract_letter']['name'] !="")
			{			
					$contract_letter = $this->input->post('contract_letter');                  
                    $targetDir = "uploads/Agent_Documents/".$regionid."/".$user_id."/" ;
                    $allowTypes = array('pdf','doc','csv');
                    if (!file_exists($targetDir)) 
                    {    
                        mkdir($targetDir, 0777, true);
                    }                                      
                    $fileName = basename($_FILES['contract_letter']['name']);
                    $targetFilePath6 = $targetDir . $fileName;                        
                    $fileType = pathinfo($targetFilePath6, PATHINFO_EXTENSION);
                    if (in_array($fileType, $allowTypes)) 
                    {    
                        ini_set('memory_limit', '1024M' );
                        ini_set('upload_max_filesize', '500M');  
                        ini_set('post_max_size', '500M');  
                        ini_set('max_input_time', 3600);  
                        ini_set('max_execution_time', 3600);
                        move_uploaded_file($_FILES["contract_letter"]["tmp_name"], $targetFilePath6); 
                    }
					
					$usersaveData=array(                                    																																																					
							'contract_letter' => $targetFilePath6,															
							);                        						
						$this->db->set($usersaveData);								
						$this->db->where('user_id',$user_id);
						$this->db->where('user_type',$usertype);
						$this->db->where('Laabh_executive',$laabh_executive);
                        $this->db->where('region',$regionid);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('users', $usersaveData);
						$queryresult1 = $this->db->affected_rows();
						//print_r($this->db->last_query());
						
					$this->db->set($usersaveData);
						$this->db->where('id',$id);			
						$this->db->where('user_id',$user_id);
                        $this->db->where('laabh_executive',$laabh_executive);
                        $this->db->where('region',$regionid);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('laabh_agents', $usersaveData);
						$queryresult2 = $this->db->affected_rows();	
					
            }
			else
			{
				$targetFilePath6="";
			}
                    $usersaveData=array(           
                           
							//'user_id'=> $user_id,
							'user_type'=> $usertype,
                            'des_id' => $designation,							
							'first_name'=> $first_name,
							//'em_email'=> $em_email,
							//'username'=> $em_email,
							//'em_password'=>$user_password,
							//'password_dec'=>$password,
							'em_role' => 'EMPLOYEE',
							//'contact_no'=> $contact_no,
							'alter_mobileno'=> $alter_mobileno,
							
							//'division'=> $division,
							//'Laabh_executive'=> $Laabh_executive,
                            //'region'=> $regionid,
                            //'region_state'=>$region_state,
                            //'district_branch'=>$district_branch,

                            
							'designation' => $designation,
							'state_first'=>$state_first,
							'district_first'=> $district_first,
							'present_city'=>$present_city,
							'present_pincode '=> $present_pincode ,
							'present_full_address'=> $present_full_address,
							
							'state_second'=> $state_second,
							'district_second' => $district_second,
							'permanent_city'=> $permanent_city,
							'permanent_pincode'=>$permanent_pincode,							
							'permanent_full_address'=>$permanent_full_address,
							
							'status'=>'ACTIVE',
							'em_gender'=> $em_gender,                                                
							'em_birthday'=> $em_birthday,
														
							'joining_date'=> $joining_date,
							'aadhar_number'=>$aadhar_number,
							'pan_number'=>$pan_number,
							'pf_number' => $pf_number,
							'bank_name'=>$bank_name,
							'bank_acc_no' =>$bank_acc_no,
							'ifsc_code' => $ifsc_code,																																									
							'updated_on'=> $created_on 
								
							);                        						
						$this->db->set($usersaveData);								
						$this->db->where('user_id',$user_id);
						$this->db->where('user_type',$usertype);
						$this->db->where('Laabh_executive',$laabh_executive);
                        $this->db->where('region',$regionid);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('users', $usersaveData);
						$queryresult = $this->db->affected_rows();
						//print_r($this->db->last_query());

                    $saveData=array(           
                        
                            //'user_id'=> $user_id,
							//'user_type'=> $usertype,
                            'des_id' => $designation,
                            //'laabh_executive'=> $laabh_executive,							
							'first_name'=> $first_name,
							//'em_email'=> $em_email,
							//'username'=> $em_email,													
							//'contact_no'=> $contact_no,
							'alter_mobileno'=> $alter_mobileno,
							//'region'=> $regionid,												
                            //'region_state'=>$region_state,
                            //'district_branch'=>$district_branch,
							//'division'=> $division,
							
							'joining_date'=> $joining_date,						
							'state_first'=>$state_first,
							'district_first'=> $district_first,
							'present_city'=>$present_city,
							'present_pincode '=> $present_pincode ,
							'present_full_address'=> $present_full_address,
							
							'state_second'=> $state_second,
							'district_second' => $district_second,
							'permanent_city'=> $permanent_city,
							'permanent_pincode'=>$permanent_pincode,							
							'permanent_full_address'=>$permanent_full_address,
							
							'status'=>'ACTIVE',
							'em_gender'=> $em_gender,                                                
							'em_birthday'=> $em_birthday,
																					
							'aadhar_number'=>$aadhar_number,
							'pan_number'=>$pan_number,
							'pf_number' => $pf_number,
							'bank_name'=>$bank_name,
							'bank_acc_no' =>$bank_acc_no,
							'ifsc_code' => $ifsc_code,																																		
							'updated_on'=> $created_on
							                         
                        );                        
                        $this->db->set($saveData);
						$this->db->where('id',$id);			
						$this->db->where('user_id',$user_id);
                        $this->db->where('laabh_executive',$laabh_executive);
                        $this->db->where('region',$regionid);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('laabh_agents', $saveData);
						$queryresult3 = $this->db->affected_rows();
						
                        if($queryresult >= 0)
                        { 
                                            
                            //$this->session->set_userdata('sellerid',$seller_id);
                            $this->session->set_flashdata('status_test', 'Agent Details Updated Successfully !');
                            $this->session->set_flashdata('status_icon', 'success');
                            $this->session->set_flashdata('status', 'Data Updated !');
                            
                            return redirect("Laabh_agent/All_Laabh_agents");                            
                            
                        }
                        else
                        {
                            
                            $this->session->set_flashdata('status_test', 'Error due to Faild to Save Data!');
                            $this->session->set_flashdata('status_icon', 'error');
                            $this->session->set_flashdata('status', 'Data Not Saved !');
                            return redirect('Laabh_agent/All_Laabh_agents');
                            
                        }
						
		}
		
       
    }


    public function All_Laabh_agents()
    {

        if ($this->session->userdata('user_login_access') != False)
        {
			
            $user_id = $this->session->userdata('user_login_id');
			$user_type = $this->session->userdata('user_type');
    	    $regionid='';
			$region_state='';
			$district_branch='';
			
			if($user_type==1)
			{
    									
				$regionid = 0;											    							
								
				$data['laabhagentlist'] = $this->Agent_model->GetAllLaabhagent($user_type,$user_id,$regionid,$region_state,$district_branch);
				//$this->load->view('backend/seller_list', $data);
						 
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/laabh_agent_list',$data);            
				$this->load->view('backend/new_footer'); 
				
			}
            else if($user_type==2)
			{
    	
				$user_details = $this->db->query("SELECT * FROM users WHERE user_id='".$user_id."' and user_type='".$user_type."'  AND STATUS='ACTIVE' ");
				$user_details= $user_details->result();
				//print_r($user_details);
				foreach($user_details as $pay)
				{				
				    $regionid = $pay->region;
                    $region_state = $pay->region_state;
                    $district_branch = $pay->district_branch;					
				}
				
				$data['laabhagentlist'] = $this->Agent_model->GetAllLaabhagent($user_type,$user_id,$regionid,$region_state,$district_branch);
				//$this->load->view('backend/seller_list', $data);
						 
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/laabh_agent_list',$data);            
				$this->load->view('backend/new_footer'); 
				
			}
            else if($user_type==6)
			{
    	
				$user_details = $this->db->query("SELECT * FROM users WHERE user_id='".$user_id."' and user_type='".$user_type."' AND STATUS='ACTIVE' ");
				$user_details= $user_details->result();
				//print_r($user_details);
				foreach($user_details as $pay)
				{				
				    $regionid = $pay->region;
                    $region_state = $pay->region_state;
                    $district_branch = $pay->district_branch;					
				}
				
				$data['laabhagentlist'] = $this->Agent_model->GetAllLaabhagent($user_type,$user_id,$regionid,$region_state,$district_branch);
				//$this->load->view('backend/seller_list', $data);
						 
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/laabh_agent_list',$data);            
				$this->load->view('backend/new_footer'); 
				
			}			
            
        } 
        else 
        {
            redirect(base_url(), 'refresh');
        }
        
    }
    


  
    public function laabh_agent_details($user_id)
    {
        
        if ($this->session->userdata('user_login_access') != False)
        {
			
            $user_type = $this->session->userdata('user_type');
			$regionid='';
            if($user_type==1)
			{
							
				$regionid = 0 ;											    							
								
				$data['laabhagent_details'] = $this->Agent_model->laabhagentSingle($user_type,$user_id,$regionid);
				
				$this->load->view('backend/new_header'); 
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/laabhagent_details', $data);
				$this->load->view('backend/new_footer');
				
			}
			else if($user_type==6)
			{
				
				$log_user_id = $this->session->userdata('user_login_id');
				$user_details = $this->db->query("SELECT * FROM users WHERE user_id='".$log_user_id."' AND user_type='".$user_type."'  AND STATUS='ACTIVE' ");
				$user_details= $user_details->result();
				//print_r($user_details);
				foreach($user_details as $pay)
				{				
				    $regionid = $pay->region;											    							
				}
				
				$data['laabhagent_details'] = $this->Agent_model->laabhagentSingle($user_type,$user_id,$regionid);
				
				$this->load->view('backend/new_header'); 
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/laabhagent_details', $data);
				$this->load->view('backend/new_footer');
				
			}
			else if($user_type==2)
			{
				
				$log_user_id = $this->session->userdata('user_login_id');
				$user_details = $this->db->query("SELECT * FROM users WHERE user_id='".$log_user_id."' AND user_type='".$user_type."'  AND STATUS='ACTIVE' ");
				$user_details= $user_details->result();
				//print_r($this->db->last_query());
				foreach($user_details as $pay)
				{				
				    $regionid = $pay->region;											    							
				}
				
				$data['laabhagent_details'] = $this->Agent_model->laabhagentSingle($user_type,$user_id,$regionid);
				
				$this->load->view('backend/new_header'); 
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/laabhagent_details', $data);
				$this->load->view('backend/new_footer');
				
			}
			
            
        } 
        else 
        {
            redirect(base_url(), 'refresh');
        }   

    }



    public function Laabhagent_approvel($user_id,$id,$laabh_executive)
    {

        if ($this->session->userdata('user_login_access') != False)
        {
			
			$user_type = $this->session->userdata('user_type');
			
            if($user_type==1)
			{	
		
				$update = $this->Agent_model->approve_laabhagent($user_id,$id,$laabh_executive);				
				$user_details = $this->db->query("SELECT * FROM laabh_agents WHERE user_id='".$user_id."' AND laabh_executive='".$laabh_executive."'  AND STATUS='ACTIVE' ");
				$data['users']= $user_details->result();
				
				foreach ($data['users'] as $user_data) 
				{           
					$first_name=$user_data->first_name;
					$contact_no=$user_data->contact_no;
					$ememail=$user_data->em_email;
					$em_password=$user_data->password_dec;
                    $des_id=$user_data->des_id;					
				}
				
				$des_name='';
                $value='';											
				$designation = $this->db->query("SELECT * FROM designation WHERE (value='".$des_id."' || id='".$des_id."') ");
				$pay_details= $designation->result();
				//print_r($this->db->last_query());
				foreach($pay_details as $row)
				{			
					$des_name = $row->des_name;							
					$value = $row->value;																							
				}
				
				if($update > 0) 
				{
					
					$this->load->library('email');
											
					$message  = 'Dear Agent <b>'.ucwords(strtolower($first_name)).'</b>,<br><br>';
					$message .= 'Thank you for your Registration with INDIGEM CHANNEL PARTNERS PVT. LTD. <br><br>';
					$message .= 'Your Login details is...<br>';
					$message .= 'Designation/User Type : <b>'.$des_name." (".$value.")".'</b> <br>';
					$message .= 'Laabh Agent ID : <b>'.$user_id.'</b> <br>';
					$message .= 'User ID : <b>'.$ememail.'</b> <br>';
					$message .= 'Password : <b>'.$em_password.'</b>';
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
					$this->email->to($ememail);
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
																										
						$this->session->set_flashdata('status_test', 'Agent Approved & Activated !');
						$this->session->set_flashdata('status_icon', 'success');
						$this->session->set_flashdata('status', 'Approved !');
						
						redirect('Laabh_agent/All_Laabh_agents');
						
					}
					else
					{
						
						$this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
						$this->session->set_flashdata('status_icon', 'error');
						$this->session->set_flashdata('status', 'E-MAIL Not Send !');
						
						redirect('Laabh_agent/All_Laabh_agents');
						
					}
					
				}
				else
				{
					$this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
					$this->session->set_flashdata('status_icon', 'error');
					$this->session->set_flashdata('status', 'Data Not Saved !');
					
					redirect('Laabh_agent/All_Laabh_agents');
				}
			}
			else if($user_type==6)
			{
				
				$update = $this->Agent_model->approve_laabhagent($user_id,$id,$laabh_executive);
				
				$user_details = $this->db->query("SELECT * FROM laabh_agents WHERE user_id='".$user_id."' AND laabh_executive='".$laabh_executive."'  AND STATUS='ACTIVE' ");
				$data['users']= $user_details->result();
				//print_r($this->db->last_query());
				
				foreach ($data['users'] as $user_data) 
				{  				
					$first_name=$user_data->first_name;
					$contact_no=$user_data->contact_no;
					$ememail=$user_data->em_email;
					$em_password=$user_data->password_dec; 
					$des_id=$user_data->des_id;					
				}
				
				$des_name='';
                $value='';											
				$designation = $this->db->query("SELECT * FROM designation WHERE (value='".$des_id."' || id='".$des_id."') ");
				$pay_details= $designation->result();
				//print_r($this->db->last_query());
				foreach($pay_details as $row)
				{			
					$des_name = $row->des_name;							
					$value = $row->value;																							
				}
				
				if($update > 0) 
				{
										
					$this->load->library('email');
											
					$message  = 'Dear Agent <b>'.ucwords(strtolower($first_name)).'</b>,<br><br>';
					$message .= 'Thank you for your Registration with INDIGEM CHANNEL PARTNERS PVT. LTD. <br><br>';
					$message .= 'Your Login details is...<br>';
					$message .= 'Designation/User Type : <b>'.$des_name." (".$value.")".'</b> <br>';
					$message .= 'Laabh Agent ID : <b>'.$user_id.'</b> <br>';
					$message .= 'User ID : <b>'.$ememail.'</b> <br>';
					$message .= 'Password : <b>'.$em_password.'</b>';
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
					$this->email->to($ememail);
					$this->email->from('indigeminfo@gmail.com', 'indigeminfo@gmail.com');
					$this->email->subject('Registration Confirmation || INDIGEMCP');
					$this->email->message($htmlContent);
								
					$email_response= $this->email->send();
					//var_dump($email_response);                
					$errors = $this->email->print_debugger();
					//var_dump($errors);
					
					
					if($email_response == 1)
					{
																										
						$this->session->set_flashdata('status_test', 'Agent Approved & Activated !');
						$this->session->set_flashdata('status_icon', 'success');
						$this->session->set_flashdata('status', 'Approved !');
						
						redirect('Laabh_agent/All_Laabh_agents');
						
					}
					else
					{
						
						$this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
						$this->session->set_flashdata('status_icon', 'error');
						$this->session->set_flashdata('status', 'E-MAIL Not Send !');
						
						redirect('Laabh_agent/All_Laabh_agents');
						
					}
					
				}
				else
				{
					$this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
					$this->session->set_flashdata('status_icon', 'error');
					$this->session->set_flashdata('status', 'Data Not Saved !');
					
					redirect('Laabh_agent/All_Laabh_agents');
				}
								
			}
            
        }
        else
        {
			
            redirect('Login');
			
        }

    }


    public function reject_user($user_id)
    {
        if ($this->session->userdata('user_login_access') != False)
        {

            $user_status =  $this->Admin_model->Laabhagent_Reject($user_id);

            if ($user_status>0) 
            {
                $this->session->set_flashdata('status_test', 'Seller Rejected!');
                $this->session->set_flashdata('status_icon', 'success');
                $this->session->set_flashdata('status', 'Rejected !');
                redirect('Admin/All_Laabh_agent');
            }
            else
            {

                $this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
                $this->session->set_flashdata('status_icon', 'error');
                $this->session->set_flashdata('status', 'error !');
                        
                redirect('Admin/All_Laabh_agent');
            }
        }
        else
        {

            redirect('Login');

        }
        
    }



    public function Laabhagent_Delete($user_id)
    {
        
        if ($this->session->userdata('user_login_access') != False)
        {
            $success = $this->Admin_model->LaabhagentDelete($user_id);
                
            if($success > 0)
            {
                $this->session->set_flashdata('status_test', 'Seller Deleted!');
                $this->session->set_flashdata('status_icon', 'danger');
                $this->session->set_flashdata('status', 'Deleted !');
                redirect('Admin/All_Laabh_agent');
            }
            else
            {               
                $this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
                $this->session->set_flashdata('status_icon', 'error');
                $this->session->set_flashdata('status', 'error !');
                redirect('Admin/All_Laabh_agent');               
            }
        
        }
        else
        {

            redirect('Login');
        }           
        
    }



    public function edit_agent_details($user_id,$laabh_executive,$region)
    {
            
        if ($this->session->userdata('user_login_access') == 1)
        {
			
			//$user_id = $this->session->userdata('user_login_id');
            $user_type = $this->session->userdata('user_type');			
			$regionid= $region;
			
			$sql = "SELECT * FROM laabh_agents WHERE user_id='".$user_id."' and laabh_executive='".$laabh_executive."' and region='".$regionid."' and status='ACTIVE' limit 1";                                    
			$data['Laabhagent_Details'] = $this->db->query($sql)->result_array();
			//print_r($this->db->last_query());
								   
			$data['title'] = 'Register - Tech Arise';
			$data['metaDescription'] = 'Register';
			$data['metaKeywords'] = 'Register';
			$data['user_id'] = $user_id ;             
			$data['state_list'] = @$this->db->get('state_master')->result();
			$data['district_list'] = @$this->db->get('district_master')->result();

			$data['designation'] =  $this->db->select('*')->from('designation')->where('value', 'GLA')->limit(1)->get()->result();
			//print_r($this->db->last_query());
			$data['division'] = @$this->db->get('division')->result();
			$data['region_list'] = @$this->db->get('region')->result();			
            $data['region_state_list'] = @$this->db->get('region')->result();
            $data['districtbranch'] = @$this->db->get('district_branch')->result();
													 
			$this->load->view('backend/new_header'); 
			$this->load->view('backend/new_sidebar'); 
			$this->load->view('backend/add_laabh_agent', $data);
			$this->load->view('backend/new_footer');
				
			               
        }
        else
        {
                
            redirect('Login');
                
        }   
            
    }



    public function All_Sellers()
    {

        if ($this->session->userdata('user_login_access') != False)
        {
            

            $user_id = $this->session->userdata('user_login_id');
            $user_type = $this->session->userdata('user_type');

            if($user_type==1)
            {

                $sql2 ="SELECT * from users Where user_id='".$user_id."' and status='ACTIVE'" ;
                $data['user_details'] = $this->db->query($sql2)->result();  
                                
                foreach($data['user_details'] as $det)
                {               
                     $region = $det->region;             
                }

                $data['allseller'] = $this->Admin_model->all_seller($region);
                $this->load->view('backend/new_header');
                $this->load->view('backend/new_sidebar'); 
                $this->load->view('backend/region_seller');
                $this->load->view('backend/new_footer');

            } 
            else if($user_type==6)
            {

                $sql2 ="SELECT * from users Where user_id='".$user_id."' and status='ACTIVE'" ;
                $data['user_details'] = $this->db->query($sql2)->result();  
                                
                foreach($data['user_details'] as $det)
                {               
                     $region = $det->region;             
                }

                $data['allseller'] = $this->Admin_model->all_laabh_executive($region);
                $this->load->view('backend/new_header');
                $this->load->view('backend/new_sidebar'); 
                $this->load->view('backend/region_seller',$data);
                $this->load->view('backend/new_footer');

            } 


        } 
        else 
        {
            redirect(base_url(), 'refresh');
        }
    }



    public function SellerView($user_id)
    {
        
        if ($this->session->userdata('user_login_access') != False)
        {
            
            //$this->checkLogin();
            $data['sellerView'] = $this->Admin_model->SellerView($user_id);

            //$this->load->view('backend/header');
            //$this->load->view('backend/sidebar');
            //$this->load->view('backend/seller_details',$seller);
            //$this->load->view('backend/footer');
            
            $this->load->view('backend/new_header'); 
            $this->load->view('backend/new_sidebar'); 
            $this->load->view('backend/sellerView', $data);
            $this->load->view('backend/new_footer');
            
        } 
        else 
        {
            redirect(base_url(), 'refresh');
        }   

    }




    public function sellerview_approvel($user_id)
    {

        if ($this->session->userdata('user_login_access') != False)
        {
                                
            $update = $this->Admin_model->approve_seller($user_id);
            $data['user'] = $this->Admin_model->SellerView($user_id);
            
            foreach ($data['users'] as $user_data) 
            {           
                $first_name=$user_data->first_name;
                $contact_no=$user_data->contact_no;
                $em_email=$user_data->em_email;
                $em_password=$user_data->dec_pass;           
            }
            
            if($update > 0) 
            {
                
                $this->load->library('email');
                                        
                $message  = 'Dear Client <b>'.ucwords(strtolower($first_name)).'</b>,<br><br>';
                $message .= 'Thank you for your Registration with INDIGEM CHANNEL PARTNERS PVT. LTD. <br><br>';
                $message .= 'Your Login details is...<br>';
                $message  .= 'Seller ID : <b>'.$user_id.'</b> <br>';
                $message .= 'User ID : <b>'.$contact.'</b> <br>';
                $message .= 'Password : <b>'.$password.'</b>';
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
                $this->em_email->to($em_email);
                $this->em_email->from('indigeminfo@gmail.com', 'indigeminfo@gmail.com');
                $this->em_email->subject('Registration Confirmation || INDIGEMCP');
                $this->em_email->message($htmlContent);
                            
                $email_response= $this->em_email->send();
                //var_dump($email_response);                
                $errors = $this->em_email->print_debugger();
                //var_dump($errors);
                //echo $email_response;
                
                if($email_response == 1)
                {
                                                                                                    
                    $this->session->set_flashdata('status_test', 'Seller Approved & Activated !');
                    $this->session->set_flashdata('status_icon', 'success');
                    $this->session->set_flashdata('status', 'Approved !');
                    redirect('Admin/sellerview_approvel');
                    
                }
                else
                {
                    
                    $this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
                    $this->session->set_flashdata('status_icon', 'error');
                    $this->session->set_flashdata('status', 'E-MAIL Not Send !');
                    
                    redirect('Admin/sellerview_approvel');
                    
                }
                
            }
            else
            {
                $this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
                $this->session->set_flashdata('status_icon', 'error');
                $this->session->set_flashdata('status', 'Data Not Saved !');
                
                redirect('Admin/sellerview_approvel');
            }
            
        }
        else
        {
            redirect('Login');
        }

    }




     public function LaabhExecutive($user_id)
    {
        
        if ($this->session->userdata('user_login_access') != False)
        {
            

            $user_id = $this->session->userdata('user_login_id');
            $user_type = $this->session->userdata('user_type');

            if($user_type==1)
            {

                $sql2 ="SELECT * from users Where user_id='".$user_id."' and status='ACTIVE'" ;
                $data['user_details'] = $this->db->query($sql2)->result();  
                                
                foreach($data['user_details'] as $det)
                {               
                     $region = $det->region;             
                }

                $data['employeeslist'] = $this->Admin_model->regionemployee($region);
                $this->load->view('backend/new_header');
                $this->load->view('backend/new_sidebar'); 
                $this->load->view('backend/region_employee');
                $this->load->view('backend/new_footer');

            } 
            else if($user_type==2)
            {

                $sql2 ="SELECT * from users Where user_id='".$user_id."' and status='ACTIVE'" ;
                $data['user_details'] = $this->db->query($sql2)->result();  
                                
                foreach($data['user_details'] as $det)
                {               
                     $region = $det->region;             
                }

                $data['employeeslist'] = $this->Admin_model->AllLaabh_agent($region);
                $this->load->view('backend/new_header');
                $this->load->view('backend/new_sidebar'); 
                $this->load->view('backend/region_employee',$data);
                $this->load->view('backend/new_footer');

            } 


        } 
        else 
        {
            redirect(base_url(), 'refresh');
        }

    }


     public function AllLaabh_agent()
   {

        if ($this->session->userdata('user_login_access') != False)
        {
            

            $user_id = $this->session->userdata('user_login_id');
            $user_type = $this->session->userdata('user_type');

            if($user_type==1)
            {

                $sql2 ="SELECT * from users Where user_id='".$user_id."' and status='ACTIVE'" ;
                $data['user_details'] = $this->db->query($sql2)->result();  
                                
                foreach($data['user_details'] as $det)
                {               
                     $region = $det->region;             
                }

                $data['allseller'] = $this->Admin_model->all_seller($region);
                $this->load->view('backend/new_header');
                $this->load->view('backend/new_sidebar'); 
                $this->load->view('backend/region_seller');
                $this->load->view('backend/new_footer');

            } 
            else if($user_type==5)
            {

                $sql2 ="SELECT * from users Where user_id='".$user_id."' and status='ACTIVE'" ;
                $data['user_details'] = $this->db->query($sql2)->result();  
                                
                foreach($data['user_details'] as $det)
                {               
                     $region = $det->region;             
                }

                $data['alllabbh_agent'] = $this->Admin_model->AllLaabh_agent($region);
                $this->load->view('backend/new_header');
                $this->load->view('backend/new_sidebar'); 
                $this->load->view('backend/region_seller',$data);
                $this->load->view('backend/new_footer');

            } 


        } 
        else 
        {
            redirect(base_url(), 'refresh');
        }
    }

}