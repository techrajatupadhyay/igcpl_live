<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('Employee_model');
  }
  
  
  public function index()
  {
    $data['title'] = 'Register - Tech Arise';
    $data['metaDescription'] = 'Register';
    $data['metaKeywords'] = 'Register';
    
    $this->load->view('header');
    $this->load->view('registration', $data);
    $this->load->view('footer');
  }
  
    public function actionRegister()
    {
        
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$mobile_no = $this->input->post('mobile_no');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$address = $this->input->post('address');
		$image = $this->input->post('image');
		
		$user_password=hash_hmac('sha256', $password, 'aSm0$i_20eNh3os');
				
		$this->db->select('*');
		$this->db->from('user_registration');
		$this->db->where('email ',$email);
		//$this->db->where('status ',1);					
		$query=$this->db->get();
        $count = $query->num_rows();
				
		if($count == 0)	
		{			
		
			$saveData=array(
								   
						'firstname'=> $firstname,
						'lastname'=> $lastname,
						'mobile_no'=> $mobile_no,
						'email'=> $email,
						'Password'=> $user_password,
						'password_dec' => $password,
						'address'=> $address,
						'image'=> $image,
										  
						);
						
			$this->load->model('Employee_model');         
			$last_ins_id=$this->Employee_model->register_user($saveData);
			
            if($last_ins_id)
			{				
				  
				$this->session->set_flashdata('status_test', 'User Registered Successfully! please log in');
                $this->session->set_flashdata('status_icon', 'success');
                $this->session->set_flashdata('status', 'Registration Successful');
				
			    redirect('Signin');
								
			}
			else
			{
				
				$this->session->set_flashdata('status_test', 'Something went wrong!');
                $this->session->set_flashdata('status_icon', 'error');
                $this->session->set_flashdata('status', 'Registration Failed !');
				
				redirect('Registration');
				
			}
			  
		}
		else
		{
			
			$this->session->set_flashdata('status_test', 'This e-mail is already Registered !');
            $this->session->set_flashdata('status_icon', 'error');
            $this->session->set_flashdata('status', 'Registration Failed !');
				
		    redirect('Registration');
						
		}

    }
	
	
  }

