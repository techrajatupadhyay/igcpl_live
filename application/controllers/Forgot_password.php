<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends CI_Controller
{
    
    public function __construct() 
    {
        parent::__construct();
       
        $this->load->model('Otp_Model');
        $this->load->library('email');		
    }

    
    public function index()
    { 
	
        $data['page_name'] = 'forgot_pass';        
        $this->load->view('header',);
        $this->load->view('forgot_pass',$data);
        $this->load->view('footer');
   
    }
    
    
    public function get_otp()
    {
        
        date_default_timezone_set('Asia/Kolkata');      
	    $createddate = date('Y-m-d H:i:s', time());
								
		$email=$this->input->post('emailid');
												
        $this->db->select('*');
		$this->db->from('user_registration');
		$this->db->where('email ',$email);
	    $this->db->where('is_active ','1');					
		$query=$this->db->get();
        $query = $query->num_rows();				
						
		if($query ==0) 
		{
			echo "2";	
			//session()->setFlashdata('status_test', 'Please Check Your Mail');
            //return redirect()->to('/Signin')->with('status_icon', 'warning')->with('status','Email Already Exist');
					
		}
		else
		{
																		
			$otp = random_int(100000, 999999);
		  
            $saveData_otp=array(
                                           
						'email'=> $this->input->post('emailid'),
						'otp'=> $otp,
					    'verify' => 0,
						'otp_type' => 'forgot_pwd',
						'create_on' =>$createddate
								
                        );
								 
            $this->load->model('Otp_Model');                   
		    $query=$this->Otp_Model->saveOtp($saveData_otp);
										
			if ($query!='') 
		    {
										
				$this->load->library('email');
						
				$message = 'Dear <b>User</b><br><br>';
				$message .= 'Your OTP for email verifivation is : <b>'.$otp.'</b> <br>';
				$message .= '<br><br>';
				$message .= 'Thank & Regards <br>';
				$message .= 'indigem';
						 	
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
				$this->email->to($this->input->post('emailid'));
				$this->email->from('indigeminfo@gmail.com', 'indigeminfo@gmail.com');
				$this->email->subject('OTP Verification || indigemcp');
				$this->email->message($htmlContent);
							
				$email_response= $this->email->send();
				//var_dump($email_response);
				
				//$email_response=1;
				//echo $errors = $this->email->print_debugger();
                //die();					    					 						
                if ($email_response == 1) 
			    {
							                  							
					$this->session->set_userdata('email',$this->input->post('emailid'));
					$this->session->set_userdata('otp',$otp);
							
                    echo "1";
                                            															
                }
			    else
			    {							
					echo "0";         							
                }

            }
			else
			{															
				echo "-1";					
            }			
													
	    }
        
    }
	
	public function verify_otp()
    {
						
		$otp_input =  $this->input->post('otp');
		$email = $this->session->userdata('email');
		$otp = $this->session->userdata('otp');
			
		if ($otp_input ==  $otp) 
		{
					
			date_default_timezone_set('Asia/Kolkata');      
			$createddate = date('Y-m-d H:i:s', time());	
						
			$this->db->select('*');
			$this->db->from('user_registration');
			$this->db->where('email ',$email);
			$this->db->where('is_active ',1);					
			$query=$this->db->get();
			$data['Password'] = $query->result_array();
			
			foreach ($data['Password'] as $row)
			{				
				$password=$row['password_dec'];
				$inc_password=$row['password'];				
			}
			
            $user_password=hash_hmac('sha256', $inc_password, 'aSm0$i_20eNh3os');
																		
			$message = 'Dear <b> User </b><br>';
            $message .= 'Your password is : <b>'.$password.'</b><br>';
            $message .= 'for User ID : <b>'.$email.'</b> <br>';           
            $message .= '<br><br>';
            $message .= 'Thank & Regards <br>';
            $message .= 'indigemcp';
						 	
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
			$this->email->subject('Forgot Password || indigemcp');
			$this->email->message($htmlContent);
							
			$email_response= $this->email->send();
																						
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('otp');
							
			$this->session->set_flashdata('status_test', 'Please check your mail for  Password');
			$this->session->set_flashdata('status_icon', 'success');
			$this->session->set_flashdata('status', 'Password Send Successfully ');
													
		    redirect('Signin');																			
							
		}
		else
		{
														
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('otp');
										
			$this->session->set_flashdata('status_test', ' OTP Not Verified !');
		    $this->session->set_flashdata('status_icon', 'error');
		    $this->session->set_flashdata('status', 'Invalid OTP !');
							
		    redirect('Signin');
																				
		}
											   			
		       
    }

    
  
    
    
    
    
    
    
    
    

                
}