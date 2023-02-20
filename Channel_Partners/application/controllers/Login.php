<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Login extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */


    function __construct()
    {

        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->model("Login_model");
        $this->load->model("dashboard_model");

    }


    public function index()
    {
		
        if ($this->session->userdata("user_login_access") == 1) 
		{
            redirect(base_url() . "dashboard");
            $data = [];
        } 
		else 
		{
            $data['Employee_Designation'] = $this->db->select('*')->from('designation')->where('status', '1')->get()->result();
            $this->load->view("login",$data);
        }
		
    }

    public function Login_Auth()
    {
		
        $response = [];

        $usertype = $this->input->post("usertype");
        $email = $this->input->post("email");
        //$password = sha1($this->input->post("password"));
		$password = hash_hmac("sha256", $this->input->post("password"), 'aSm0$i_20eNh3os');
		//print_r($password);
		
        $remember = $this->input->post("remember");

        $login_status = $this->validate_login($email, $password, $usertype);

        $response["login_status"] = $login_status;
        if ($login_status == "success") 
	    {
                     
            $this->session->set_flashdata("status_test","User Login Succcessfully");
            $this->session->set_flashdata("status_icon", "success");
            $this->session->set_flashdata("login_status", "Login Succcessful"); 
          
            redirect(base_url() . "dashboard");

            /*
                if ($remember) 
                {
                    setcookie("email", $email, time() + 86400 * 30);
                    setcookie(
                        "password",
                        $this->input->post("password"),
                        time() + 86400 * 30
                    );
                    redirect(base_url() . "login", "refresh");
                } 
                else 
                {
                    if (isset($_COOKIE["email"])) {
                        setcookie("email", " ");
                    }
                    if (isset($_COOKIE["password"])) {
                        setcookie("password", " ");
                    }
                    redirect(base_url() . "login", "refresh");
                }
            */    
        } 
	    else				
		{
            $this->session->set_flashdata("feedback","User id or Password is Invalid");

            $this->session->set_flashdata("status_test","Invalid id of password");
            $this->session->set_flashdata("status_icon", "error");
            $this->session->set_flashdata("login_status", "Login Failed !");
            redirect(base_url() . "login", "refresh");          
        }
		
		
    }


    function validate_login($email = "", $password = "", $usertype = "")
    {
				
        $credential = [
            "em_email" => $email,
            "em_password" => $password,
            "user_type" => $usertype,
            "status" => "ACTIVE",
            "user_status" => "1",
        ];

        $query = $this->Login_model->getUserForLogin($credential);
	    //print_r($this->db->last_query());
		
        if ($query->num_rows() > 0) 
		{
		/*	
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
        */
				
			$row = $query->row();
			$this->session->set_userdata("user_login_access", "1");
			$this->session->set_userdata("user_login_id", $row->user_id);
			$this->session->set_userdata("name", $row->first_name);
			$this->session->set_userdata("email", $row->em_email);
			$this->session->set_userdata("contact", $row->contact_no);
			$this->session->set_userdata("user_image", $row->em_image);
			$this->session->set_userdata("user_type", $row->user_type);

			return "success";
        }
		
    }


    public function Seller_Auth()
    {
		
        $usertype = $this->input->post("usertype");
        $email = $this->input->post("email");
        $password = $this->input->post("password");		
        $password_enc = hash_hmac("sha256", $password, 'aSm0$i_20eNh3os');
        ///var_dump($password_enc);	
		
        $result = $this->Login_model->login_verify($email,$password_enc,$usertype);
        
        if ($result == true) 
        {

            $User_Data = $this->Login_model->get_seller_details($email,$password_enc); 

            foreach ($User_Data as $userdata) 
            {
                $sellerid = $userdata->seller_id;
                $firstname = $userdata->fname;
                $email = $userdata->email;
                $phone = $userdata->contact;
                //$usertype= $userdata->usertype;
                $usertype = $usertype;
                $seller_image = $userdata->seller_image;
            }

            $this->session->set_userdata("user_login_access", "1");
            $this->session->set_userdata("user_login_id", $sellerid);
            $this->session->set_userdata("name", $firstname);
            $this->session->set_userdata("email", $email);
            $this->session->set_userdata("user_image", $seller_image);
            $this->session->set_userdata("user_type", $usertype);
          

            $this->session->set_flashdata("status_test","User Login Succcessfully");
            $this->session->set_flashdata("status_icon", "success");
            $this->session->set_flashdata("status", "Login Succcessful");

            return redirect("Seller_module");

        } 
        else 
        { 

            $this->session->set_flashdata("feedback","User id or Password is Invalid");

            $this->session->set_flashdata("status_test","Invalid id of password");
            $this->session->set_flashdata("status_icon", "info");
            $this->session->set_flashdata("status", "Login Failed !");
            return redirect("Login");

        }
    }


    function logout()
    {

        $this->session->sess_destroy();
        $this->session->set_flashdata("feedback", "logged_out");
        redirect(base_url(), "refresh");

    }


    public function change_password()
    {
        
        $this->load->view('backend/new_header');
        $this->load->view('backend/new_sidebar'); 
        $this->load->view('backend/change_password');
        $this->load->view('backend/new_footer');

    }

    public function reset_password()
    {

        $user_id = $this->input->post("user_id");
        $email = $this->input->post("email");
        $usertype = $this->input->post("usertype");

        $current_password = $this->input->post("current_password");
        $new_password = $this->input->post("new_password");
        $cnf_password = $this->input->post("cnf_password");
        $current_password_enc = hash_hmac("sha256", $current_password, 'aSm0$i_20eNh3os');
        $new_password_enc = hash_hmac("sha256", $cnf_password, 'aSm0$i_20eNh3os');
        $ip = $this->input->ip_address();
        date_default_timezone_set('Asia/Kolkata');      
        $created_on = date('Y-m-d H:i:s', time());

        $credential = [
            "user_id" => $user_id,
            "em_email" => $email,
            "em_password" => $current_password_enc,
            "user_type" => $usertype,
            "status" => "ACTIVE",
            "user_status" => 1,
        ];

        $query = $this->Login_model->getUserForLogin($credential);

        if ($query->num_rows() > 0)
        {
              
                $savedata = [
                    "em_password" => $new_password_enc,
                    "password_dec" => $cnf_password,                    
                    "last_pass_changed_on" => $created_on,
                    "last_pass_changed_ip" => $ip,                    
                ];
        
                $result = $this->Login_model->reset_password($savedata,$user_id,$email,$usertype);

                if($result == true)
                {
                    $this->session->set_flashdata('status_test', 'Successfully Updated your password!!');
                    $this->session->set_flashdata('status_icon', 'success');
                    $this->session->set_flashdata('status', 'Password Updated !');
                    
                    return redirect("Login/change_password");
                }
                else
                {
                    $this->session->set_flashdata('status_test', 'Somthing went Wrong ! Please try Again !');
                    $this->session->set_flashdata('status_icon', 'error');
                    $this->session->set_flashdata('status', 'Password not Changed !');
                    
                    return redirect("Login/change_password");
                }

            

        } 
        else
        {

            $this->session->set_flashdata('status_test', 'Password does not match !');
            $this->session->set_flashdata('status_icon', 'warning');
            $this->session->set_flashdata('status', 'Password not Changed !');
            
            return redirect("Login/change_password");

        }
 
    }


    public function confirm_mail_send($email, $randcode)
    {
        $config = [
            "protocol" => "smtp",
            "smtp_host" => "ssl://smtp.googlemail.com",
            "smtp_port" => 465,
            "smtp_user" => "mail.imojenpay.com",
            "smtp_pass" => "",
        ];
        $from_email = "imojenpay@imojenpay.com";
        $to_email = $email;

        //Load email library
        $this->load->library("email", $config);

        $this->email->from($from_email, "Dotdev");
        $this->email->to($to_email);
        $this->email->subject("Confirm Your Account");
        $message = "Confirm Your Account";
        $message .=
            "Click Here : " .
            base_url() .
            "Confirm_Account?C=" .
            $randcode .
            "</br>";
        $this->email->message($message);

        //Send mail
        if ($this->email->send()) {
            $this->session->set_flashdata(
                "feedback",
                "Kindly check your email To reset your password"
            );
        } else {
            $this->session->set_flashdata(
                "feedback",
                "Error in sending Email."
            );
        }
    }
    public function verification_confirm()
    {
        $verifycode = $this->input->get("C");
        $userinfo = $this->Login_model->GetuserInfoBycode($verifycode);
        if ($userinfo) {
            $data = [];
            $data = [
                "status" => "ACTIVE",
                "confirm_code" => 0,
            ];
            $this->Login_model->UpdateStatus($verifycode, $data);
            if ($this->db->affected_rows()) {
                $this->session->set_flashdata(
                    "feedback",
                    "Your Account has been confirmed!! now login"
                );
                $this->load->view("backend/login");
            }
        } else {
            $this->session->set_flashdata(
                "feedback",
                "Sorry your account has not been varified"
            );
            $this->load->view("backend/login");
        }
    }
    public function forgotten_page()
    {
        $data = [];
        $data["settingsvalue"] = $this->dashboard_model->GetSettingsValue();
        $this->load->view("backend/forgot_password", $data);
    }
    public function forgot_password()
    {
        $email = $this->input->post("email");
        $checkemail = $this->Login_model->Does_email_exists($email);
        if ($checkemail) {
            $randcode = md5(uniqid());
            $data = [];
            $data = [
                "forgotten_code" => $randcode,
            ];
            $updatedata = $this->Login_model->UpdateKey($data, $email);
            $updateaffect = $this->db->affected_rows();
            if ($updateaffect) {
                $email = $this->input->post("email");
                $this->send_mail($email, $randcode);
                $this->session->set_flashdata(
                    "feedback",
                    "Kindly check your email" .
                        " " .
                        $email .
                        "To reset your password"
                );
                redirect("Retriev");
            } else {
            }
        } else {
            $this->session->set_flashdata(
                "feedback",
                "Please enter a valid email address!"
            );
            redirect("Retriev");
        }
    }
    public function send_mail($email, $randcode)
    {
        $config = [
            "protocol" => "smtp",
            "smtp_host" => "ssl://smtp.googlemail.com",
            "smtp_port" => 25,
            "smtp_user" => "mail.imojenpay.com",
            "smtp_pass" => "",
        ];
        $from_email = "imojenpay@imojenpay.com";
        $to_email = $email;

        //Load email library
        $this->load->library("email", $config);

        $this->email->from($from_email, "Dotdev");
        $this->email->to($to_email);
        $this->email->subject("Reset your password!!Dotdev");
        $message .= "Your or someone request to reset your password" . "<br />";
        $message .=
            "Click  Here : " .
            base_url() .
            "Reset_password?p=" .
            $randcode .
            "<br />";
        $this->email->message($message);

        //Send mail
        if ($this->email->send()) {
            $this->session->set_flashdata(
                "feedback",
                "Kindly check your email To reset your password"
            );
        } else {
            $this->session->set_flashdata(
                "feedback",
                "Error in sending Email."
            );
        }
    }
    public function Reset_View()
    {
        $this->load->helper("form");
        $reset_key = $this->input->get("p");
        if ($this->Login_model->Does_Key_exists($reset_key)) {
            $data["key"] = $reset_key;
            $this->load->view("backend/reset_page", $data);
        } else {
            $this->session->set_flashdata(
                "feedback",
                "Please enter a valid email address!"
            );
            redirect("Retriev");
        }
    }

   

    public function Reset_password_validation()
    {
        $password = $this->input->post("password");
        $confirm = $this->input->post("confirm");
        $key = $this->input->post("reset_key");
        $userinfo = $this->Login_model->GetUserInfo($key);

        if ($password == $confirm) {
            if ($userinfo->password != sha1($password)) {
                $data = [];
                $data = [
                    "forgotten_code" => 0,
                    "password" => sha1($password),
                ];
                $update = $this->Login_model->UpdatePassword($key, $data);
                if ($this->db->affected_rows()) {
                    $data["message"] = "Successfully Updated your password!!";
                    $this->load->view("backend/login", $data);
                }
            } else {
                $this->session->set_flashdata(
                    "feedback",
                    "You enter your old password.Please enter new password"
                );
                redirect("Reset_password?p=" . $key);
            }
        } else {
            $this->session->set_flashdata(
                "feedback",
                "Password does not match"
            );
            redirect("Reset_password?p=" . $key);
        }
    }
}
