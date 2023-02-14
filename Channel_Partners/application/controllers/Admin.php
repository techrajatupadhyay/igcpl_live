<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  
    public function __construct()
    {
		parent::__construct();
		//is_weekends();
		//is_logged_in();
		//is_checked_in();
		//is_checked_out();
		$this->load->library('form_validation');
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
	
	
	public function get_single_state_by_region()
    {
            
            $id=$this->input->post('region_id');
            $this->db->from('region');     
            $this->db->where('region_id',$id);
            $query=$this->db->get();
            $data= $query->result_array();
            //print_r($data);
            $output = '<option value=""> --- Select Region State --- </option>';
            foreach( $data as $row )
            {
                $output .='<option value="'.$row['id'].'">'.$row['region_name'].'</option>';
            }

            echo $output;
            //echo $data;
            
    }
        
    public function get_single_districtbrance_by_state()
    {
                 
            $region_state_id=$this->input->post('region_state_id');
            $this->db->from('district_branch');     
            $this->db->where('Statecode',$region_state_id);
			$this->db->where('IsActive',1);
            $query=$this->db->get();
            $data= $query->result_array();
            //print_r($data);
            $output = '<option value=""> --- Select District Branch --- </option>';
            foreach( $data as $row )
                {
                    $output .='<option value="'.$row['Districtcode'].'">'.$row['Districtname'].'</option>';
                }

            //echo $output;
            print_r($output);
			
    }
	

    public function get_state_by_region()
    {
            
            $id=$this->input->post('region_id');
            $this->db->from('region');     
            //$this->db->where('region_id',$id);           
			$this->db->where_in('region_id',$id);
            $query=$this->db->get();
            $data= $query->result_array();
            //print_r($data);
            $output = '<li><label> --- Select Region Sate --- </label></</li>';
            foreach( $data as $row )
            {
                $output .="<li><label class='px-3' ><input  type='checkbox' name='region_state[]' onchange='getDistrict(`".$row['id']."`)'   value='".$row['id']."'> ".$row['region_name']."</label></li>";
            }

            echo $output;
            //echo $data;
            
    }
        
    public function get_districtbrance_by_state()
    {
                
            $id=$this->input->post('region_state_id');
		   //var_dump($id);
            $this->db->from('district_branch');     
            $this->db->where_in('Statecode',$id);
			$this->db->where('IsActive',1);
            $query=$this->db->get();
            $data= $query->result_array();
			//print_r($this->db->last_query());
            
            $output = '<li><label> --- Select District Branch --- </label></</li>';
            foreach( $data as $row )
            {
                $output .='<li><label class="px-3"><input  type="checkbox" name="district_branch[]" onchange="getDistrictBranch(`'.$row['Districtcode'].'`)" value="'.$row['Districtcode'].'"> '.$row['Districtname'].'</label></li>';
            }

            //echo $output;
            print_r($output);
			
    }



    /*----------------------------------------------Employees---------------------------------------*/

    public function Register_Employee()
    {

        if ($this->session->userdata('user_login_access') != False)
        {
            $data['state_list'] = @$this->db->get('state_master')->result();
            $data['district_list'] = @$this->db->get('district_master')->result();
            $data['Employee_Designation'] = $this->db->select('*')->from('designation')->where('status', '1')->get()->result();	
            //$data['region'] = @$this->db->get('region')->result();		
            $data['division'] = @$this->db->get('division')->result();
            $data['region_list'] = @$this->db->get('region')->result();
			$data['region_state_list'] = @$this->db->get('region')->result();
            $data['districtbranch'] = @$this->db->get('district_branch')->result();
          
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
    



    public function add_employee()
    {
		                        
        date_default_timezone_set('Asia/Kolkata');      
        $created_on = date('Y-m-d H:i:s', time());
        $usertype = $this->input->post('user_type');      
        $first_name = $this->input->post('first_name');
        $contact_no = $this->input->post('contact_no');
        $alter_mobileno = $this->input->post('alter_mobileno');
        $em_email = $this->input->post('em_email');
        $em_gender = $this->input->post('em_gender');       
        $designation = $this->input->post('designation');
        $em_birthday = $this->input->post('em_birthday');
		
        if($usertype==6)
		{			
			$regionid = $this->input->post('single_reg_val');           	
			$region_state = $this->input->post('single_reg_sta_val');						
			$district_branch_val = $this->input->post('district_branch_val');
			//$district_branch_id = explode (",", $district_branch_val); 		
			//$district_branch = $district_branch_id[0];						
		}
        else if($usertype==11 || $usertype==13)
		{
            $rid['region'] = $this->input->post('region[]');
			$reg_val = $this->input->post('reg_val');					
			$region_value = explode (",", $reg_val); 
			//print_r($region_value[0]);
			$regionid = $region_value[0];	
			
			$rsid['region_state'] = $this->input->post('region_state[]');
			$reg_sta_val = $this->input->post('reg_sta_val');
			$reg_sta = explode (",", $reg_sta_val); 		
			$region_state = $reg_sta[0];
			
			$rsdbid['district_branch'] = $this->input->post('district_branch[]');
			$district_branch_val = $this->input->post('district_branch_val');
			$district_branch_id = explode (",", $district_branch_val); 		
			$district_branch = $district_branch_id[0];
		}
        else
		{			
            $regionid = $this->input->post('single_reg_val');									
			$region_state = $this->input->post('single_reg_sta_val');
			$district_branch = $this->input->post('single_district_branch_val');
		}					
						
        $division = $this->input->post('division');        
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
        
		//$em_image = $this->input->post('em_image');  		
        //$em_signature = $this->input->post('em_signature');		
        //$resume = $this->input->post('resume');
        //$marksheet = $this->input->post('marksheet');
        //$experience_letter = $this->input->post('experience_letter');
		
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr( str_shuffle( $chars ), 0, 8 );              
        $user_password=hash_hmac('sha256',$password, 'aSm0$i_20eNh3os');
					
		//print_r($_POST);
		//print_r($_FILES);
        //print_r($region_state);       	
		//die();
		
        if($this->input->post('isedit')==0)
        {
            
			if($usertype==11)
			{			
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('user_type',$usertype);
				$this->db->where_in('region',$reg_val);
				$this->db->where_in('region_state',$reg_sta_val);
                $this->db->where_in('district_branch',$reg_sta_val);								                   
				$query=$this->db->get();
				$user_total_count = $query->num_rows();
				//print_r($this->db->last_query());				
				
                if($user_total_count == 1)
                {
                    $this->session->set_flashdata('status_test', 'Limit of Maximum no of Assistant General Manager in one Region is Exceeded !');
					$this->session->set_flashdata('status_icon', 'info');
					$this->session->set_flashdata('status', 'Limit Exceeded !');
					return redirect('Admin/Allemployees');
				}
				else
			    {

					$this->db->select('*');
					$this->db->from('users');
					$this->db->where('contact_no',$contact_no);
					$this->db->where('em_email',$em_email); 
					$this->db->where('user_type',$usertype);                   
					$query=$this->db->get();
					$agentcount = $query->num_rows();
					//print_r($this->db->last_query());
					
					if($agentcount ==0)
					{  
			
						date_default_timezone_set('Asia/Kolkata');      
						$createddate = date('Y-m-d');
						$year = date('y', strtotime($createddate));
						
						$query_state = $this->db->query('SELECT id  AS user_id FROM users ORDER BY id DESC  limit 1');
						$usercount= $query_state->result_array() ; 
						$sell_ip="";
									 
						if($usercount > 0)                 
						{
							foreach($usercount as $usercount)
							{           
							   $sell_ip = $usercount['user_id']; 
							}                   
							$registerNo =$sell_ip + 1;
							$user_id = $year.$regionid.$designation."000".$registerNo;
						}
						else
						{					                                      
							$registerNo = 1;
							$user_id = $year.$regionid.$designation."000".$registerNo;					
						}
													
						    //$em_image = $this->input->post('em_image');
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
							$allowTypes = array('jpg', 'png', 'jpeg');
							if (!file_exists($targetDir)) 
							{    
								mkdir($targetDir, 0777, true);
							}                                      
							$fileName = basename($_FILES['em_image']['name']);
							$targetFilePath = $targetDir . $fileName;                        
							$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
							if (in_array($fileType, $allowTypes)) 
							{    
								ini_set('memory_limit', '1024M' );
								ini_set('upload_max_filesize', '500M');  
								ini_set('post_max_size', '500M');  
								ini_set('max_input_time', 3600);  
								ini_set('max_execution_time', 3600);
								move_uploaded_file($_FILES["em_image"]["tmp_name"], $targetFilePath); 
							}
							
						    //$em_signature = $this->input->post('em_signature');                  
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
							$allowTypes = array('jpg', 'png', 'jpeg');
							if (!file_exists($targetDir)) 
							{    
								mkdir($targetDir, 0777, true);
							}                                      
							$fileName = basename($_FILES['em_signature']['name']);
							$targetFilePath2 = $targetDir . $fileName;                        
							$fileType = pathinfo($targetFilePath2, PATHINFO_EXTENSION);
							if (in_array($fileType, $allowTypes)) 
							{    
								ini_set('memory_limit', '1024M' );
								ini_set('upload_max_filesize', '500M');  
								ini_set('post_max_size', '500M');  
								ini_set('max_input_time', 3600);  
								ini_set('max_execution_time', 3600);
								move_uploaded_file($_FILES["em_signature"]["tmp_name"], $targetFilePath2); 
							}
							
						    //$resume = $this->input->post('resume');                  
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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
							
						    //$marksheet = $this->input->post('marksheet');                  
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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
							
							if($_FILES['experience_letter']['name'] != null)
							{
								//$experience_letter = $this->input->post('experience_letter');                  
								$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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
								//print_r($region_state); die();
								$targetFilePath5="";
							}
							//print_r($region_state); die();
							$usersaveData=array(           
								   
									'user_id'=> $user_id,
									'user_type'=> $usertype,
									'des_id' => $designation,                           
									'first_name'=> $first_name,
									'contact_no'=> $contact_no,
									'alter_mobileno'=> $alter_mobileno,
									'em_email'=> $em_email,
									'em_gender'=> $em_gender,
									'username'=> $em_email,
									'em_password'=>$user_password,
									'password_dec'=>$password,
									'em_birthday'=> $em_birthday,
									'district_first'=>$district_first,
									
									'region'=> $reg_val,
									'region_state'=> $reg_sta_val,
									'district_branch'=> $district_branch_val,
									
									'division'=> $division,						
									'Laabh_executive'=> $user_id,
									'designation'=> $designation,
									'state_first'=> $state_first,
									'district_first'=> $district_first,
									'present_city'=>$present_city,
									'present_pincode '=> $present_pincode ,
									'present_full_address'=> $present_full_address,
									'state_second'=> $state_second,
									'district_second' => $district_second,
									'permanent_city'=> $permanent_city,
									'permanent_pincode'=>$permanent_pincode,
									'permanent_full_address'=>$permanent_full_address,
									'joining_date'=> $joining_date,
									'aadhar_number'=>$aadhar_number,
									'pan_number'=>$pan_number,
									'pf_number' => $pf_number,
									'bank_name'=>$bank_name,
									'bank_acc_no' =>$bank_acc_no,
									'ifsc_code' => $ifsc_code,
									'em_image' => $targetFilePath,
									'signature' => $targetFilePath2,
									'upload_resume' => $targetFilePath3,
									'marksheet' => $targetFilePath4,
									'experience_letter' => $targetFilePath5,
									
									'executive_approvel' => 1,
									'created_on'=> $created_on,
									'updated_on'=> $created_on                                
								);
							   
								$lastinsertid = $this->Admin_model->insert_employees($usersaveData);
																
								if($lastinsertid > 0)
								{ 
																				 
									$this->session->set_flashdata('status_test', 'Employee Registered Successfully !');
									$this->session->set_flashdata('status_icon', 'success');
									$this->session->set_flashdata('status', 'Data Saved !');
									
									return redirect("Admin/Allemployees");                            
									
								}
								else
								{
									
									$this->session->set_flashdata('status_test', 'Error due to Faild to Save Data!');
									$this->session->set_flashdata('status_icon', 'error');
									$this->session->set_flashdata('status', 'Data Not Saved !');
									return redirect('Admin/Register_Employee');
									
								}            
					}
					else
					{
						
						$this->session->set_flashdata('status_test', 'This Employee is already Registered !');
						$this->session->set_flashdata('status_icon', 'warning');
						$this->session->set_flashdata('status', 'Data Not Saved !');
						return redirect('Admin/Allemployees');
						
					}			
			    }
		    }          			
			else if($usertype==2)
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
				
                if($user_total_count == 10)
                {
                    $this->session->set_flashdata('status_test', 'Limit of Maximum no of Executive in one Branch is Exceeded !');
					$this->session->set_flashdata('status_icon', 'info');
					$this->session->set_flashdata('status', 'Limit Exceeded !');
					return redirect('Admin/Allemployees');
				}
				else
			    {

					$this->db->select('*');
					$this->db->from('users');
					$this->db->where('contact_no',$contact_no);
					$this->db->where('em_email',$em_email); 
					$this->db->where('user_type',$usertype);                   
					$query=$this->db->get();
					$agentcount = $query->num_rows();
					//print_r($this->db->last_query());
					
					if($agentcount ==0)
					{  
			
						date_default_timezone_set('Asia/Kolkata');      
						$createddate = date('Y-m-d');
						$year = date('y', strtotime($createddate));
						
						$query_state = $this->db->query('SELECT id  AS user_id FROM users ORDER BY id DESC  limit 1');
						$usercount= $query_state->result_array() ; 
						$sell_ip="";
									 
						if($usercount > 0)                 
						{
							foreach($usercount as $usercount)
							{           
							   $sell_ip = $usercount['user_id']; 
							}                   
							$registerNo =$sell_ip + 1;
							$user_id = $year.$regionid.$designation."000".$registerNo;
						}
						else
						{					                                      
							$registerNo = 1;
							$user_id = $year.$regionid.$designation."000".$registerNo;					
						}
													
						//$em_image = $this->input->post('em_image');
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
							$allowTypes = array('jpg', 'png', 'jpeg');
							if (!file_exists($targetDir)) 
							{    
								mkdir($targetDir, 0777, true);
							}                                      
							$fileName = basename($_FILES['em_image']['name']);
							$targetFilePath = $targetDir . $fileName;                        
							$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
							if (in_array($fileType, $allowTypes)) 
							{    
								ini_set('memory_limit', '1024M' );
								ini_set('upload_max_filesize', '500M');  
								ini_set('post_max_size', '500M');  
								ini_set('max_input_time', 3600);  
								ini_set('max_execution_time', 3600);
								move_uploaded_file($_FILES["em_image"]["tmp_name"], $targetFilePath); 
							}
							
						//$em_signature = $this->input->post('em_signature');                  
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
							$allowTypes = array('jpg', 'png', 'jpeg');
							if (!file_exists($targetDir)) 
							{    
								mkdir($targetDir, 0777, true);
							}                                      
							$fileName = basename($_FILES['em_signature']['name']);
							$targetFilePath2 = $targetDir . $fileName;                        
							$fileType = pathinfo($targetFilePath2, PATHINFO_EXTENSION);
							if (in_array($fileType, $allowTypes)) 
							{    
								ini_set('memory_limit', '1024M' );
								ini_set('upload_max_filesize', '500M');  
								ini_set('post_max_size', '500M');  
								ini_set('max_input_time', 3600);  
								ini_set('max_execution_time', 3600);
								move_uploaded_file($_FILES["em_signature"]["tmp_name"], $targetFilePath2); 
							}
							
						//$resume = $this->input->post('resume');                  
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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
							
						//$marksheet = $this->input->post('marksheet');                  
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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
							
							if($_FILES['experience_letter']['name'] != null)
							{
								//$experience_letter = $this->input->post('experience_letter');                  
								$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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
								//print_r($region_state); die();
								$targetFilePath5="";
							}
							//print_r($region_state); die();
							$usersaveData=array(           
								   
									'user_id'=> $user_id,
									'user_type'=> $usertype,
									'des_id' => $designation,                           
									'first_name'=> $first_name,
									'contact_no'=> $contact_no,
									'alter_mobileno'=> $alter_mobileno,
									'em_email'=> $em_email,
									'em_gender'=> $em_gender,
									'username'=> $em_email,
									'em_password'=>$user_password,
									'password_dec'=>$password,
									'em_birthday'=> $em_birthday,
									'district_first'=>$district_first,
									
									'region'=> $regionid,
									'region_state'=> $region_state,
									'district_branch'=> $district_branch,
									
									'division'=> $division,						
									'Laabh_executive'=> $user_id,
									'designation'=> $designation,
									'state_first'=> $state_first,
									'district_first'=> $district_first,
									'present_city'=>$present_city,
									'present_pincode '=> $present_pincode ,
									'present_full_address'=> $present_full_address,
									'state_second'=> $state_second,
									'district_second' => $district_second,
									'permanent_city'=> $permanent_city,
									'permanent_pincode'=>$permanent_pincode,
									'permanent_full_address'=>$permanent_full_address,
									'joining_date'=> $joining_date,
									'aadhar_number'=>$aadhar_number,
									'pan_number'=>$pan_number,
									'pf_number' => $pf_number,
									'bank_name'=>$bank_name,
									'bank_acc_no' =>$bank_acc_no,
									'ifsc_code' => $ifsc_code,
									'em_image' => $targetFilePath,
									'signature' => $targetFilePath2,
									'upload_resume' => $targetFilePath3,
									'marksheet' => $targetFilePath4,
									'experience_letter' => $targetFilePath5,
									
									'executive_approvel' => 1,
									'created_on'=> $created_on,
									'updated_on'=> $created_on                                
								);
							   
								$lastinsertid = $this->Admin_model->insert_employees($usersaveData);
																
								if($lastinsertid > 0)
								{ 
																				 
									$this->session->set_flashdata('status_test', 'Employee Registered Successfully !');
									$this->session->set_flashdata('status_icon', 'success');
									$this->session->set_flashdata('status', 'Data Saved !');
									
									return redirect("Admin/Allemployees");                            
									
								}
								else
								{
									
									$this->session->set_flashdata('status_test', 'Error due to Faild to Save Data!');
									$this->session->set_flashdata('status_icon', 'error');
									$this->session->set_flashdata('status', 'Data Not Saved !');
									return redirect('Admin/Register_Employee');
									
								}            
					}
					else
					{
						
						$this->session->set_flashdata('status_test', 'This Employee is already Registered !');
						$this->session->set_flashdata('status_icon', 'warning');
						$this->session->set_flashdata('status', 'Data Not Saved !');
						return redirect('Admin/Allemployees');
						
					}			
			    }
		    }
			else if($usertype==6)
			{	
		
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('user_type',$usertype);
				$this->db->where('region',$regionid);
				$this->db->where('region_state',$region_state);
                $this->db->where_in('district_branch',$district_branch_val);									                   
				$query=$this->db->get();
				$user_total_count = $query->num_rows();
				//print_r($this->db->last_query());				
				
                if($user_total_count == 1)
                {
                    $this->session->set_flashdata('status_test', 'Limit of Maximum no of Branch Manager in  Branch is Exceeded !');
					$this->session->set_flashdata('status_icon', 'info');
					$this->session->set_flashdata('status', 'Limit Exceeded !');
					return redirect('Admin/Allemployees');
				}
				else
				{
			
					$this->db->select('*');
					$this->db->from('users');
					$this->db->where('contact_no',$contact_no);
					$this->db->where('em_email',$em_email); 
					$this->db->where('user_type',$usertype);                   
					$query=$this->db->get();
					$agentcount = $query->num_rows();
					//print_r($this->db->last_query());
					
					if($agentcount ==0)
					{   
			
						date_default_timezone_set('Asia/Kolkata');      
						$createddate = date('Y-m-d');
						$year = date('y', strtotime($createddate));
						
						//$regionid = $this->input->post('region');
						$query_state = $this->db->query('SELECT id  AS user_id FROM users ORDER BY id DESC  limit 1');
						$usercount= $query_state->result_array() ; 
						$sell_ip="";
									 
						if($usercount > 0)                 
						{
							foreach($usercount as $usercount)
							{           
							   $sell_ip = $usercount['user_id']; 
							}                   
							$registerNo =$sell_ip + 1;
							$user_id = $year.$regionid.$designation."000".$registerNo;
						}
						else
						{					                                      
							$registerNo = 1;
							$user_id = $year.$regionid.$designation."000".$registerNo;					
						}
													
						//$em_image = $this->input->post('em_image');
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
							$allowTypes = array('jpg', 'png', 'jpeg');
							if (!file_exists($targetDir)) 
							{    
								mkdir($targetDir, 0777, true);
							}                                      
							$fileName = basename($_FILES['em_image']['name']);
							$targetFilePath = $targetDir . $fileName;                        
							$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
							if (in_array($fileType, $allowTypes)) 
							{    
								ini_set('memory_limit', '1024M' );
								ini_set('upload_max_filesize', '500M');  
								ini_set('post_max_size', '500M');  
								ini_set('max_input_time', 3600);  
								ini_set('max_execution_time', 3600);
								move_uploaded_file($_FILES["em_image"]["tmp_name"], $targetFilePath); 
							}
							
						//$em_signature = $this->input->post('em_signature');                  
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
							$allowTypes = array('jpg', 'png', 'jpeg');
							if (!file_exists($targetDir)) 
							{    
								mkdir($targetDir, 0777, true);
							}                                      
							$fileName = basename($_FILES['em_signature']['name']);
							$targetFilePath2 = $targetDir . $fileName;                        
							$fileType = pathinfo($targetFilePath2, PATHINFO_EXTENSION);
							if (in_array($fileType, $allowTypes)) 
							{    
								ini_set('memory_limit', '1024M' );
								ini_set('upload_max_filesize', '500M');  
								ini_set('post_max_size', '500M');  
								ini_set('max_input_time', 3600);  
								ini_set('max_execution_time', 3600);
								move_uploaded_file($_FILES["em_signature"]["tmp_name"], $targetFilePath2); 
							}
							
						//$resume = $this->input->post('resume');                  
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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
							
						//$marksheet = $this->input->post('marksheet');                  
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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
							
							if($_FILES['experience_letter']['name'] != null)
							{
								//$experience_letter = $this->input->post('experience_letter');                  
								$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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

							$usersaveData=array(           
								   
									'user_id'=> $user_id,
									'user_type'=> $usertype,
									'des_id' => $designation,                           
									'first_name'=> $first_name,
									'contact_no'=> $contact_no,
									'alter_mobileno'=> $alter_mobileno,
									'em_email'=> $em_email,
									'em_gender'=> $em_gender,
									'username'=> $em_email,
									'em_password'=>$user_password,
									'password_dec'=>$password,
									'em_birthday'=> $em_birthday,
									'district_first'=>$district_first,
									
									'region'=> $regionid,
									'region_state'=> $region_state,
									'district_branch'=> $district_branch_val,
									
									'division'=> $division,						
									'Laabh_executive'=> $user_id,
									'designation'=> $designation,
									'state_first'=> $state_first,
									'district_first'=> $district_first,
									'present_city'=>$present_city,
									'present_pincode '=> $present_pincode ,
									'present_full_address'=> $present_full_address,
									'state_second'=> $state_second,
									'district_second' => $district_second,
									'permanent_city'=> $permanent_city,
									'permanent_pincode'=>$permanent_pincode,
									'permanent_full_address'=>$permanent_full_address,
									'joining_date'=> $joining_date,
									'aadhar_number'=>$aadhar_number,
									'pan_number'=>$pan_number,
									'pf_number' => $pf_number,
									'bank_name'=>$bank_name,
									'bank_acc_no' =>$bank_acc_no,
									'ifsc_code' => $ifsc_code,
									'em_image' => $targetFilePath,
									'signature' => $targetFilePath2,
									'upload_resume' => $targetFilePath3,
									'marksheet' => $targetFilePath4,
									'experience_letter' => $targetFilePath5,
									
									'executive_approvel' => 1,
									'created_on'=> $created_on,
									'updated_on'=> $created_on                                
								);
							   
								$lastinsertid = $this->Admin_model->insert_employees($usersaveData);
																
								if($lastinsertid > 0)
								{ 
																				 
									$this->session->set_flashdata('status_test', 'Employee Registered Successfully !');
									$this->session->set_flashdata('status_icon', 'success');
									$this->session->set_flashdata('status', 'Data Saved !');
									
									return redirect("Admin/Allemployees");                            
									
								}
								else
								{
									
									$this->session->set_flashdata('status_test', 'Error due to Faild to Save Data!');
									$this->session->set_flashdata('status_icon', 'error');
									$this->session->set_flashdata('status', 'Data Not Saved !');
									return redirect('Admin/Register_Employee');
									
								}            
					}
					else
					{
						
						$this->session->set_flashdata('status_test', 'This Employee is already Registered !');
						$this->session->set_flashdata('status_icon', 'warning');
						$this->session->set_flashdata('status', 'Data Not Saved !');
						return redirect('Admin/Allemployees');
						
					}
			
			    }
		    }
			else if($usertype==13)
			{	
		
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('user_type',$usertype);
				$this->db->where('region',$regionid);
				$this->db->where('region_state',$region_state);
                $this->db->where_in('district_branch',$district_branch_val);									                   
				$query=$this->db->get();
				$user_total_count = $query->num_rows();
				//print_r($this->db->last_query());				
				
                if($user_total_count == 1)
                {
                    $this->session->set_flashdata('status_test', 'Limit of Maximum no of Assistant manager in  Branch is Exceeded !');
					$this->session->set_flashdata('status_icon', 'info');
					$this->session->set_flashdata('status', 'Limit Exceeded !');
					return redirect('Admin/Allemployees');
				}
				else
				{
			
					$this->db->select('*');
					$this->db->from('users');
					$this->db->where('contact_no',$contact_no);
					$this->db->where('em_email',$em_email); 
					$this->db->where('user_type',$usertype);                   
					$query=$this->db->get();
					$agentcount = $query->num_rows();
					//print_r($this->db->last_query());
					
					if($agentcount ==0)
					{   
			
						date_default_timezone_set('Asia/Kolkata');      
						$createddate = date('Y-m-d');
						$year = date('y', strtotime($createddate));
											
						$query_state = $this->db->query('SELECT id  AS user_id FROM users ORDER BY id DESC  limit 1');
						$usercount= $query_state->result_array() ; 
						$sell_ip="";
									 
						if($usercount > 0)                 
						{
							foreach($usercount as $usercount)
							{           
							   $sell_ip = $usercount['user_id']; 
							}                   
							$registerNo =$sell_ip + 1;
							$user_id = $year.$regionid.$designation."000".$registerNo;
						}
						else
						{					                                      
							$registerNo = 1;
							$user_id = $year.$regionid.$designation."000".$registerNo;					
						}
													
						//$em_image = $this->input->post('em_image');
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
							$allowTypes = array('jpg', 'png', 'jpeg');
							if (!file_exists($targetDir)) 
							{    
								mkdir($targetDir, 0777, true);
							}                                      
							$fileName = basename($_FILES['em_image']['name']);
							$targetFilePath = $targetDir . $fileName;                        
							$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
							if (in_array($fileType, $allowTypes)) 
							{    
								ini_set('memory_limit', '1024M' );
								ini_set('upload_max_filesize', '500M');  
								ini_set('post_max_size', '500M');  
								ini_set('max_input_time', 3600);  
								ini_set('max_execution_time', 3600);
								move_uploaded_file($_FILES["em_image"]["tmp_name"], $targetFilePath); 
							}
							
						//$em_signature = $this->input->post('em_signature');                  
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
							$allowTypes = array('jpg', 'png', 'jpeg');
							if (!file_exists($targetDir)) 
							{    
								mkdir($targetDir, 0777, true);
							}                                      
							$fileName = basename($_FILES['em_signature']['name']);
							$targetFilePath2 = $targetDir . $fileName;                        
							$fileType = pathinfo($targetFilePath2, PATHINFO_EXTENSION);
							if (in_array($fileType, $allowTypes)) 
							{    
								ini_set('memory_limit', '1024M' );
								ini_set('upload_max_filesize', '500M');  
								ini_set('post_max_size', '500M');  
								ini_set('max_input_time', 3600);  
								ini_set('max_execution_time', 3600);
								move_uploaded_file($_FILES["em_signature"]["tmp_name"], $targetFilePath2); 
							}
							
						//$resume = $this->input->post('resume');                  
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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
							
						//$marksheet = $this->input->post('marksheet');                  
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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
							
							if($_FILES['experience_letter']['name'] != null)
							{
								//$experience_letter = $this->input->post('experience_letter');                  
								$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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

							$usersaveData=array(           
								   
									'user_id'=> $user_id,
									'user_type'=> $usertype,
									'des_id' => $designation,                           
									'first_name'=> $first_name,
									'contact_no'=> $contact_no,
									'alter_mobileno'=> $alter_mobileno,
									'em_email'=> $em_email,
									'em_gender'=> $em_gender,
									'username'=> $em_email,
									'em_password'=>$user_password,
									'password_dec'=>$password,
									'em_birthday'=> $em_birthday,
									'district_first'=>$district_first,
									
									'region'=> $regionid,
									'region_state'=> $region_state,
									'district_branch'=> $district_branch_val,
									
									'division'=> $division,						
									'Laabh_executive'=> $user_id,
									'designation'=> $designation,
									'state_first'=> $state_first,
									'district_first'=> $district_first,
									'present_city'=>$present_city,
									'present_pincode '=> $present_pincode ,
									'present_full_address'=> $present_full_address,
									'state_second'=> $state_second,
									'district_second' => $district_second,
									'permanent_city'=> $permanent_city,
									'permanent_pincode'=>$permanent_pincode,
									'permanent_full_address'=>$permanent_full_address,
									'joining_date'=> $joining_date,
									'aadhar_number'=>$aadhar_number,
									'pan_number'=>$pan_number,
									'pf_number' => $pf_number,
									'bank_name'=>$bank_name,
									'bank_acc_no' =>$bank_acc_no,
									'ifsc_code' => $ifsc_code,
									'em_image' => $targetFilePath,
									'signature' => $targetFilePath2,
									'upload_resume' => $targetFilePath3,
									'marksheet' => $targetFilePath4,
									'experience_letter' => $targetFilePath5,
									
									'executive_approvel' => 1,
									'created_on'=> $created_on,
									'updated_on'=> $created_on                                
								);
							   
								$lastinsertid = $this->Admin_model->insert_employees($usersaveData);
																
								if($lastinsertid > 0)
								{ 
																				 
									$this->session->set_flashdata('status_test', 'Employee Registered Successfully !');
									$this->session->set_flashdata('status_icon', 'success');
									$this->session->set_flashdata('status', 'Data Saved !');
									
									return redirect("Admin/Allemployees");                            
									
								}
								else
								{
									
									$this->session->set_flashdata('status_test', 'Error due to Faild to Save Data!');
									$this->session->set_flashdata('status_icon', 'error');
									$this->session->set_flashdata('status', 'Data Not Saved !');
									return redirect('Admin/Register_Employee');
									
								}            
					}
					else
					{
						
						$this->session->set_flashdata('status_test', 'This Employee is already Registered !');
						$this->session->set_flashdata('status_icon', 'warning');
						$this->session->set_flashdata('status', 'Data Not Saved !');
						return redirect('Admin/Allemployees');
						
					}
			
			    }
		    }
			else
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
				
                if($user_total_count ==10)
                {
                    $this->session->set_flashdata('status_test', 'Limit of Maximum no of Employees in one Branch is Exceeded !');
					$this->session->set_flashdata('status_icon', 'info');
					$this->session->set_flashdata('status', 'Limit Exceeded !');
					return redirect('Admin/Allemployees');
				}
				else
				{
			
					$this->db->select('*');
					$this->db->from('users');
					$this->db->where('contact_no',$contact_no);
					$this->db->where('em_email',$em_email); 
					$this->db->where('user_type',$usertype);                   
					$query=$this->db->get();
					$agentcount = $query->num_rows();
					//print_r($this->db->last_query());
					
					if($agentcount ==0)
					{   
			
						date_default_timezone_set('Asia/Kolkata');      
						$createddate = date('Y-m-d');
						$year = date('y', strtotime($createddate));
												
						$query_state = $this->db->query('SELECT id  AS user_id FROM users ORDER BY id DESC  limit 1');
						$usercount= $query_state->result_array() ; 
						$sell_ip="";
									 
						if($usercount > 0)                 
						{
							foreach($usercount as $usercount)
							{           
							   $sell_ip = $usercount['user_id']; 
							}                   
							$registerNo =$sell_ip + 1;
							$user_id = $year.$regionid.$designation."000".$registerNo;
						}
						else
						{					                                      
							$registerNo = 1;
							$user_id = $year.$regionid.$designation."000".$registerNo;					
						}
													
						//$em_image = $this->input->post('em_image');
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
							$allowTypes = array('jpg', 'png', 'jpeg');
							if (!file_exists($targetDir)) 
							{    
								mkdir($targetDir, 0777, true);
							}                                      
							$fileName = basename($_FILES['em_image']['name']);
							$targetFilePath = $targetDir . $fileName;                        
							$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
							if (in_array($fileType, $allowTypes)) 
							{    
								ini_set('memory_limit', '1024M' );
								ini_set('upload_max_filesize', '500M');  
								ini_set('post_max_size', '500M');  
								ini_set('max_input_time', 3600);  
								ini_set('max_execution_time', 3600);
								move_uploaded_file($_FILES["em_image"]["tmp_name"], $targetFilePath); 
							}
							
						//$em_signature = $this->input->post('em_signature');                  
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
							$allowTypes = array('jpg', 'png', 'jpeg');
							if (!file_exists($targetDir)) 
							{    
								mkdir($targetDir, 0777, true);
							}                                      
							$fileName = basename($_FILES['em_signature']['name']);
							$targetFilePath2 = $targetDir . $fileName;                        
							$fileType = pathinfo($targetFilePath2, PATHINFO_EXTENSION);
							if (in_array($fileType, $allowTypes)) 
							{    
								ini_set('memory_limit', '1024M' );
								ini_set('upload_max_filesize', '500M');  
								ini_set('post_max_size', '500M');  
								ini_set('max_input_time', 3600);  
								ini_set('max_execution_time', 3600);
								move_uploaded_file($_FILES["em_signature"]["tmp_name"], $targetFilePath2); 
							}
							
						//$resume = $this->input->post('resume');                  
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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
							
						//$marksheet = $this->input->post('marksheet');                  
							$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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
							
							if($_FILES['experience_letter']['name'] != null)
							{
								//$experience_letter = $this->input->post('experience_letter');                  
								$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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

							$usersaveData=array(           
								   
									'user_id'=> $user_id,
									'user_type'=> $usertype,
									'des_id' => $designation,                           
									'first_name'=> $first_name,
									'contact_no'=> $contact_no,
									'alter_mobileno'=> $alter_mobileno,
									'em_email'=> $em_email,
									'em_gender'=> $em_gender,
									'username'=> $em_email,
									'em_password'=>$user_password,
									'password_dec'=>$password,
									'em_birthday'=> $em_birthday,
									'district_first'=>$district_first,
									
									'region'=> $regionid,
									'region_state'=>$region_state,
									'district_branch'=>$district_branch,
									
									'division'=> $division,						
									'Laabh_executive'=> $user_id,
									'designation'=> $designation,
									'state_first'=> $state_first,
									'district_first'=> $district_first,
									'present_city'=>$present_city,
									'present_pincode '=> $present_pincode ,
									'present_full_address'=> $present_full_address,
									'state_second'=> $state_second,
									'district_second' => $district_second,
									'permanent_city'=> $permanent_city,
									'permanent_pincode'=>$permanent_pincode,
									'permanent_full_address'=>$permanent_full_address,
									'joining_date'=> $joining_date,
									'aadhar_number'=>$aadhar_number,
									'pan_number'=>$pan_number,
									'pf_number' => $pf_number,
									'bank_name'=>$bank_name,
									'bank_acc_no' =>$bank_acc_no,
									'ifsc_code' => $ifsc_code,
									'em_image' => $targetFilePath,
									'signature' => $targetFilePath2,
									'upload_resume' => $targetFilePath3,
									'marksheet' => $targetFilePath4,
									'experience_letter' => $targetFilePath5,
									
									'executive_approvel' => 1,
									'created_on'=> $created_on,
									'updated_on'=> $created_on                                
								);
							   
								$lastinsertid = $this->Admin_model->insert_employees($usersaveData);
																
								if($lastinsertid > 0)
								{ 
																				 
									$this->session->set_flashdata('status_test', 'Employee Registered Successfully !');
									$this->session->set_flashdata('status_icon', 'success');
									$this->session->set_flashdata('status', 'Data Saved !');
									
									return redirect("Admin/Allemployees");                            
									
								}
								else
								{
									
									$this->session->set_flashdata('status_test', 'Error due to Faild to Save Data!');
									$this->session->set_flashdata('status_icon', 'error');
									$this->session->set_flashdata('status', 'Data Not Saved !');
									return redirect('Admin/Register_Employee');
									
								}            
					}
					else
					{
						
						$this->session->set_flashdata('status_test', 'This Employee is already Registered !');
						$this->session->set_flashdata('status_icon', 'warning');
						$this->session->set_flashdata('status', 'Data Not Saved !');
						return redirect('Admin/Allemployees');
						
					}
			
			    }
		    }
            
        }
		else
		{
			
			$user_id = $this->input->post('user_id');			
			$id = $this->input->post('id');
			
			if($_FILES['em_image']['name'] !=null || $_FILES['em_image']['name'] !="")
			{
			        //$em_image = $this->input->post('em_image');
					$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
                    $allowTypes = array('jpg', 'png', 'jpeg');
                    if (!file_exists($targetDir)) 
                    {    
                        mkdir($targetDir, 0777, true);
                    }                                      
                    $fileName = basename($_FILES['em_image']['name']);
                    $targetFilePath = $targetDir . $fileName;                        
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                    if (in_array($fileType, $allowTypes)) 
                    {    
                        ini_set('memory_limit', '1024M' );
                        ini_set('upload_max_filesize', '500M');  
                        ini_set('post_max_size', '500M');  
                        ini_set('max_input_time', 3600);  
                        ini_set('max_execution_time', 3600);
                        move_uploaded_file($_FILES["em_image"]["tmp_name"], $targetFilePath); 
                    }
					
					$usersaveData=array(                                    																																																					
							'em_image' => $targetFilePath,															
							);                        						
						$this->db->set($usersaveData);								
						$this->db->where('user_id',$user_id);
						$this->db->where('id',$id);						
                        //$this->db->where('region',$region);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('users', $usersaveData);
						$queryresult1 = $this->db->affected_rows();
						//print_r($this->db->last_query());
											
			}
            else
			{
                $targetFilePath="";
			}

			if($_FILES['em_signature']['name'] !=null || $_FILES['em_signature']['name'] !="")
			{
				
					//$em_signature = $this->input->post('em_signature');                  
                    $targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
                    $allowTypes = array('jpg', 'png', 'jpeg');
                    if (!file_exists($targetDir)) 
                    {    
                        mkdir($targetDir, 0777, true);
                    }                                      
                    $fileName = basename($_FILES['em_signature']['name']);
                    $targetFilePath2 = $targetDir . $fileName;                        
                    $fileType = pathinfo($targetFilePath2, PATHINFO_EXTENSION);
                    if (in_array($fileType, $allowTypes)) 
                    {    
                        ini_set('memory_limit', '1024M' );
                        ini_set('upload_max_filesize', '500M');  
                        ini_set('post_max_size', '500M');  
                        ini_set('max_input_time', 3600);  
                        ini_set('max_execution_time', 3600);
                        move_uploaded_file($_FILES["em_signature"]["tmp_name"], $targetFilePath2); 
                    }
					
					$usersaveData=array(                                    																																																					
							'signature' => $targetFilePath2,															
							);                        						
						$this->db->set($usersaveData);								
						$this->db->where('user_id',$user_id);
						$this->db->where('id',$id);						
                        //$this->db->where('region',$region);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('users', $usersaveData);
						$queryresult1 = $this->db->affected_rows();
						//print_r($this->db->last_query());	
					
						
            }
            else
			{
                $targetFilePath2="";
			} 
			
			
			if($_FILES['resume']['name'] !=null || $_FILES['resume']['name'] !="")
			{
					//$resume = $this->input->post('resume');                  
                    $targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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
						$this->db->where('id',$id);						
                        //$this->db->where('region',$region);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('users', $usersaveData);
						$queryresult1 = $this->db->affected_rows();
						//print_r($this->db->last_query());	
						
						
			}
            else
			{
                $targetFilePath3="";
			}
			
			
			if($_FILES['marksheet']['name'] !=null || $_FILES['marksheet']['name'] !="")
			{
					//$marksheet = $this->input->post('marksheet');                  
                    $targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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
						$this->db->where('id',$id);						
                        //$this->db->where('region',$region);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('users', $usersaveData);
						$queryresult1 = $this->db->affected_rows();
						//print_r($this->db->last_query());		
			}
            else
			{
                $targetFilePath4="";
			}
			
			
			if($_FILES['experience_letter']['name'] != null || $_FILES['experience_letter']['name'] !="")
			{
						//$experience_letter = $this->input->post('experience_letter');                  
						$targetDir = "uploads/Employee_Documents/".$regionid."/".$user_id."/" ;
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
						$this->db->where('id',$id);						
                        //$this->db->where('region',$region);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('users', $usersaveData);
						$queryresult1 = $this->db->affected_rows();
						//print_r($this->db->last_query());	
												                       						
					
			}
			else
			{
				$targetFilePath5="";
			}

                    $usersaveData1=array(           
                           							
							//'user_type'=> $usertype,
                            //'des_id' => $designation,							
							'first_name'=> $first_name,
							//'em_email'=> $em_email,
							//'username'=> $em_email,
							//'em_password'=>$user_password,
							//'password_dec'=>$password,
							'em_role' => 'EMPLOYEE',
							//'contact_no'=> $contact_no,
							'alter_mobileno'=> $alter_mobileno,
							//'region'=> $region,
							//'region_state'=>$region_state,
                            //'district_branch'=>$district_branch,
							
							'division'=> $division,							
							//'Laabh_executive'=> $Laabh_executive,
							//'designation' => $designation,
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
						$this->db->set($usersaveData1);								
						$this->db->where('user_id',$user_id);
						$this->db->where('id',$id);						
                        $this->db->where('region',$region);						
						$this->db->where('STATUS','ACTIVE');
						$this->db->update('users', $usersaveData1);
						$queryresult1 = $this->db->affected_rows();
						//print_r($this->db->last_query());

                    						
                        if($queryresult >= 0)
                        { 
                                                                   
                            $this->session->set_flashdata('status_test', 'Employee Details Updated Successfully !');
                            $this->session->set_flashdata('status_icon', 'success');
                            $this->session->set_flashdata('status', 'Data Updated !');
                            
                            return redirect("Admin/Allemployees");                            
                            
                        }
                        else
                        {
                            
                            $this->session->set_flashdata('status_test', 'Error due to Faild to Save Data!');
                            $this->session->set_flashdata('status_icon', 'error');
                            $this->session->set_flashdata('status', 'Data Not Saved !');
							
                            return redirect("Admin/Allemployees");
                            
                        }
					
		}
		
       
    }

   
    public function Allemployees()
    {
        if ($this->session->userdata('user_login_access') != False)
        {
            $user_id = $this->session->userdata('user_login_id');
            $data['employeeslist'] = $this->Admin_model->GetAllemployees();
            $this->load->view('backend/new_header');
            $this->load->view('backend/new_sidebar'); 
            $this->load->view('backend/all_employees',$data);            
            $this->load->view('backend/new_footer');
        } 
        else 
        {
            redirect(base_url(), 'refresh');
        }
        
    }
	
	public function All_Managers()
    {
        if ($this->session->userdata('user_login_access') != False)
        {			
			$user_id = $this->session->userdata('user_login_id');
            $user_type = $this->session->userdata('user_type');
            $region="";
			$region_state="";
			$district_branch="";
			
            if($user_type==1)
            {				              
                $region = 0;
				$region_state = 0;
			    $district_branch = 0;             
                								
				$data['employeeslist'] = $this->Admin_model->get_managers($user_type,$region,$region_state,$district_branch);
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/all_managers',$data);            
				$this->load->view('backend/new_footer');
			}
			else if($user_type==11)
			{
				$sql2 ="SELECT * from users Where user_id='".$user_id."' AND user_type='".$user_type."' AND status='ACTIVE'" ;
                $data['user_details'] = $this->db->query($sql2)->result();  
                                
                foreach($data['user_details'] as $det)
                {               
                    $region = $det->region;
                    $region_state = $det->region_state;
                    $district_branch = $det->district_branch;					
                }
				
				$user_id = $this->session->userdata('user_login_id');
				$data['employeeslist'] = $this->Admin_model->get_managers($user_type,$region,$region_state,$district_branch);
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/all_managers',$data);            
				$this->load->view('backend/new_footer');
			}	
        } 
        else 
        {
            redirect(base_url(), 'refresh');
        }
        
    }
	
	public function Employee_Details($user_id,$user_type)
    {
        if ($this->session->userdata('user_login_access') != False)
        {
            
            $data['Employee_Details'] = $this->Admin_model->get_employee_details($user_id,$user_type);
            $this->load->view('backend/new_header');
            $this->load->view('backend/new_sidebar'); 
            $this->load->view('backend/employee_details',$data);            
            $this->load->view('backend/new_footer');					
			
        } 
        else 
        {
            redirect(base_url(), 'refresh');
        }
        
    }
	
	
	public function edit_employee_details($user_id,$user_type)
    {
		
        if ($this->session->userdata('user_login_access') != False)
        {
   
            $data['Employee_Details'] = $this->Admin_model->get_edit_employee_details($user_id,$user_type);
			
			$data['state_list'] = @$this->db->get('state_master')->result();
            $data['district_list'] = @$this->db->get('district_master')->result();            
            $data['Employee_Designation'] =  $this->db->select('*')->from('designation')->where('status', '1')->get()->result();
            $data['division'] = @$this->db->get('division')->result();
            $data['region_list'] = @$this->db->get('region')->result();			
			$data['region_state_list'] = @$this->db->get('region')->result();
            $data['districtbranch'] = @$this->db->get('district_branch')->result();
            $data['user_id'] = $user_id;
			
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
	
	public function Employee_Approvel($user_id,$id)
    {

        if ($this->session->userdata('user_login_access') != False)
        {
            
            $login_user_id = $this->session->userdata('user_login_id');   
            $user_type = $this->session->userdata('user_type');
            
            if($user_type==1)
            {   
        
                $update = $this->Admin_model->approve_employee($user_id,$id);
                $data['Details'] = $this->Admin_model->get_employee_details_mail($user_id,$id);
                
                foreach ($data['Details'] as $row) 
                {           
                    $first_name=$row->first_name;
                    $contact=$row->contact_no;
                    $email=$row->em_email;
                    $password=$row->password_dec;
                    $des_id=$row->des_id;					
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
                                            
                    $message  = 'Dear Employee <b>'.ucwords(strtolower($seller_name)).'</b>,<br><br>';
                    $message .= 'Thank you for your Registration with INDIGEM CHANNEL PARTNERS PVT. LTD. <br><br>';
                    $message .= 'Your Login details is...<br>';
					$message .= 'Designation/User Type : <b>'.$des_name." (".$value.")".'</b> <br>';
                    $message .= 'Employee ID : <b>'.$user_id.'</b> <br>';                    
                    $message .= 'User ID : <b>'.$email.'</b> <br>';
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
                                                                                                        
                        $this->session->set_flashdata('status_test', 'Employee Approved & Activated !');
                        $this->session->set_flashdata('status_icon', 'success');
                        $this->session->set_flashdata('status', 'Approved !');
                        
                        return redirect("Admin/Allemployees");
                        
                    }
                    else
                    {
                        
                        $this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
                        $this->session->set_flashdata('status_icon', 'error');
                        $this->session->set_flashdata('status', 'E-MAIL Not Send !');
                        
                        return redirect("Admin/Allemployees");
                        
                    }
                    
                }
                else
                {
                    $this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
                    $this->session->set_flashdata('status_icon', 'error');
                    $this->session->set_flashdata('status', 'Data Not Saved !');
                    
                    return redirect("Admin/Allemployees");
                }
                
            }
            
        }
        else
        {
            redirect('Login');
        }

    }


    public function All_Laabh_Executive()
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
            else if($user_type==6)
            {

                $sql2 ="SELECT * from users Where user_id='".$user_id."' and status='ACTIVE'" ;
                $data['user_details'] = $this->db->query($sql2)->result();  
                                
                foreach($data['user_details'] as $det)
                {               
                     $region = $det->region;             
                }

                $data['employeeslist'] = $this->Admin_model->all_laabh_executive($region);
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






   public function Laabh_Executive_view($user_id)
    {
        
        if ($this->session->userdata('user_login_access') != False)
        {
            
            //$this->checkLogin();
            $data['Laabh_Executive_Single'] = $this->Admin_model->Laabh_Executive_Single($user_id);
                        
            $this->load->view('backend/new_header'); 
            $this->load->view('backend/new_sidebar'); 
            $this->load->view('backend/laabh_Executive_view', $data);
            $this->load->view('backend/new_footer');
            
        } 
        else 
        {
            redirect(base_url(), 'refresh');
        }   

    }




    public function Laabh_Executive_approvel($user_id)
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
                
                $update = $this->Admin_model->approve_Laabh_Executive($region,$user_id,$user_type);
                $data['Laabh_ExecutiveSingle'] = $this->Admin_model->Laabh_ExecutiveSingle($user_id);
                
                foreach ($data['Laabh_ExecutiveSingle'] as $Laabh_Executive_data) 
                {           
                    $first_name=$Laabh_Executive_data->first_name;
                    $contact=$Laabh_Executive_data->contact_no;
                    $email=$Laabh_Executive_data->em_email;
                    $password=$Laabh_Executive_data->dec_pass;           
                }
                
                if($update >= 0)    
                {                                                                                                                                                               
                    $this->session->set_flashdata('status_test', 'Seller Approved !');
                    $this->session->set_flashdata('status_icon', 'success');
                    $this->session->set_flashdata('status', 'Approved !');
                    
                    redirect('Admin/All_Laabh_Executive');                                                           
                }
                else
                {
                    $this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
                    $this->session->set_flashdata('status_icon', 'error');
                    $this->session->set_flashdata('status', 'Data Not Saved !');
                    
                    redirect('Admin/All_Laabh_Executive');
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
                
                $update = $this->Admin_model->approve_Laabh_Executive($region,$user_id,$user_type);
                $data['Laabh_ExecutiveSingle'] = $this->Admin_model->Laabh_ExecutiveSingle($user_id);
                
                foreach ($data['Laabh_ExecutiveSingle'] as $Laabh_ExecutiveSingle) 
                {           
                    $first_name=$Laabh_ExecutiveSingle->first_name;
                    $contact=$Laabh_ExecutiveSingle->contact_no;
                    $email=$Laabh_ExecutiveSingle->em_email;
                    $password=$Laabh_ExecutiveSingle->dec_pass;     
                }
                
                if($update > 0) 
                {
                    
                    $this->load->library('email');
                                            
                    $message  = 'Dear Client <b>'.ucwords(strtolower($seller_name)).'</b>,<br><br>';
                    $message .= 'Thank you for your Registration with INDIGEM CHANNEL PARTNERS PVT. LTD. <br><br>';
                    $message .= 'Your Login details is...<br>';
                    $message .= 'Seller ID : <b>'.$sellerid.'</b> <br>';
                    $message .= 'Laabh Agent ID : <b>'.$labh_agent_id.'</b> <br>';
                    $message .= 'User ID : <b>'.$contact.'</b> <br>';
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
                        
                        redirect('Admin/All_Laabh_Executive');
                        
                    }
                    else
                    {
                        
                        $this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
                        $this->session->set_flashdata('status_icon', 'error');
                        $this->session->set_flashdata('status', 'E-MAIL Not Send !');
                        
                        redirect('Admin/All_Laabh_Executive');
                        
                    }
                    
                }
                else
                {
                    $this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
                    $this->session->set_flashdata('status_icon', 'error');
                    $this->session->set_flashdata('status', 'Data Not Saved !');
                    
                    redirect('Admin/All_Laabh_Executive');
                }
                
            }
            
        }
        else
        {
            redirect('Login');
        }

    }
    

}