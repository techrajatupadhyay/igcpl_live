<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller 
{
    function __construct() 
    {
        parent::__construct();
        $this->load->model('login_model');
    }
    public function index()
	{
		$this->load->view('header');
        $this->load->view('sign-in');
		$this->load->view('footer');
	}

	public function Login_Auth()
	{	
	    $email = $this->input->post('email');
        $password = $this->input->post('password');
		$user_password=hash_hmac('sha256', $password, 'aSm0$i_20eNh3os');
		$result=$this->login_model->getUserForLogin($email,$user_password);           
		if ($result == TRUE) 
		{
			$User_Data=$this->login_model->get_user_data($email,$user_password);
			foreach($User_Data as $userdata)
			{						
			    $userid= $userdata->id;
			    $firstname= 	$userdata->firstname;
			    $lastname= 	$userdata->lastname;
			    $email= $userdata->email;
			    $phone= $userdata->mobile_no;
			}
				$session_data = array(							
							'userid' => $userid,
							'firstname' => $firstname,
							'lastname' => $lastname,
							'email' => $email,
							'phone' => $phone,													
						);
									
				$this->session->set_userdata('logged_in', $session_data);
				$this->session->set_flashdata('status_test', 'User Login Succcessfully');
                $this->session->set_flashdata('status_icon', 'success');
                $this->session->set_flashdata('status', 'Login Succcessful');
				redirect('FAQ');					
		}
		else
		{
			$this->session->set_flashdata('status_test', 'Invalid id of password');
            $this->session->set_flashdata('status_icon', 'error');
            $this->session->set_flashdata('status', 'Login Failed !');
            return redirect('Signin');								
		}	
    }


    function validate_login($email = '', $password = '') 
    {
        $credential = array('em_email' => $email, 'em_password' => $password,'status' => 'ACTIVE');
        $query = $this->login_model->getUserForLogin($credential);
        if ($query->num_rows() > 0) 
        {
            $row = $query->row();
            $this->session->set_userdata('user_login_access', '1');
            $this->session->set_userdata('user_login_id', $row->em_id);
            $this->session->set_userdata('name', $row->first_name);
            $this->session->set_userdata('email', $row->em_email);
            return 'success';
        }
	}
    
    public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->set_flashdata('status_icon', 'success');	
	    $this->session->set_flashdata('status', 'Services Submitted Succcessfully !');
		redirect('Contact');	
    }
}