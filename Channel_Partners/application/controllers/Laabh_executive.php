<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laabh_executive extends CI_Controller
{
  
    public function __construct()
    {
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->model('Seller_model');
		$this->load->model('Agent_model');
		$this->load->model('Admin_model');
		$this->load->model('Executive_model');
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
            $this->load->view('backend/region_employee',$data);
            $this->load->view('backend/new_footer'); 
        } 
        else 
        {
            redirect(base_url(), 'refresh');
        }
    }
	

    public function All_Laabh_Executive()
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
                
                $data['employeeslist'] = $this->Executive_model->all_laabh_executive($user_type,$region,$region_state,$district_branch);
                $this->load->view('backend/new_header');
                $this->load->view('backend/new_sidebar'); 
                $this->load->view('backend/laabh_executive_list',$data);
                $this->load->view('backend/new_footer');
            } 
            else if($user_type==6)
            {

                $sql2 ="SELECT * from users Where user_id='".$user_id."' and user_type='".$user_type."' and status='ACTIVE'" ;
                $data['user_details'] = $this->db->query($sql2)->result();  
                                
                foreach($data['user_details'] as $det)
                {               
                    $region = $det->region; 
					$region_state = $det->region_state;
                    $district_branch = $det->district_branch;
                }

                $data['employeeslist'] = $this->Executive_model->all_laabh_executive($user_type,$region,$region_state,$district_branch);
                $this->load->view('backend/new_header');
                $this->load->view('backend/new_sidebar'); 
                $this->load->view('backend/laabh_executive_list',$data);
                $this->load->view('backend/new_footer');

            } 
			else if($user_type==11)
            {

                $sql2 ="SELECT * from users Where user_id='".$user_id."' and user_type='".$user_type."' and status='ACTIVE'" ;
                $data['user_details'] = $this->db->query($sql2)->result();  
                                
                foreach($data['user_details'] as $det)
                {               
                    $region = $det->region; 
					$region_state = $det->region_state;
                    $district_branch = $det->district_branch;
                }

                $data['employeeslist'] = $this->Executive_model->all_laabh_executive($user_type,$region,$region_state,$district_branch);
                $this->load->view('backend/new_header');
                $this->load->view('backend/new_sidebar'); 
                $this->load->view('backend/laabh_executive_list',$data);
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



   

    public function Laabh_Executive_Details($id,$user_id,$user_type,$region)
    {
        
        if ($this->session->userdata('user_login_access') != False)
        {
            
            $data['Laabh_Executive_Single'] = $this->Executive_model->laabh_executive_details($id,$user_id,$user_type,$region);
                       
            $this->load->view('backend/new_header'); 
            $this->load->view('backend/new_sidebar'); 
            $this->load->view('backend/laabh_executive_details', $data);
            $this->load->view('backend/new_footer');
            
        } 
        else 
        {
            redirect(base_url(), 'refresh');
        }   
    }




    public function Laabh_Executive_approvel($user_id,$id,$region)
    {

        if ($this->session->userdata('user_login_access') != False)
        {
                         
            $user_type = $this->session->userdata('user_type');
            
            if($user_type==1)
            {   
                                                              
                $update = $this->Executive_model->approve_laabh_executive($id,$region,$user_id);
                $data['Laabh_ExecutiveSingle'] = $this->Executive_model->Laabh_ExecutiveSingle($user_id);
                
                foreach ($data['Laabh_ExecutiveSingle'] as $Laabh_Executive_data) 
                {           
                    $first_name=$Laabh_Executive_data->first_name;
                    $contact=$Laabh_Executive_data->contact_no;
                    $email=$Laabh_Executive_data->em_email;
                    $password=$Laabh_Executive_data->password_dec;           
                }
                
                if($update > 0) 
                {
                    
                    $this->load->library('email');
                                            
                    $message  = 'Dear Laabh Executive <b>'.ucwords(strtolower($seller_name)).'</b>,<br><br>';
                    $message .= 'Thank you for your Registration with INDIGEM CHANNEL PARTNERS PVT. LTD. <br><br>';
                    $message .= 'Your Login details is...<br>';
                    $message .= 'Executive ID : <b>'.$user_id.'</b> <br>';                   
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
                                                                                                        
                        $this->session->set_flashdata('status_test', 'Executive Approved & Activated !');
                        $this->session->set_flashdata('status_icon', 'success');
                        $this->session->set_flashdata('status', 'Approved !');
                        
                        redirect('Laabh_executive/All_Laabh_Executive');
                        
                    }
                    else
                    {
                        
                        $this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
                        $this->session->set_flashdata('status_icon', 'error');
                        $this->session->set_flashdata('status', 'E-MAIL Not Send !');
                        
                        redirect('Laabh_executive/All_Laabh_Executive');
                        
                    }
                    
                }
                else
                {
                    $this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
                    $this->session->set_flashdata('status_icon', 'error');
                    $this->session->set_flashdata('status', 'Data Not Saved !');
                    
                    redirect('Laabh_executive/All_Laabh_Executive');
                }
                
            }
            else if($user_type==6)
            {
				
                               
                $update = $this->Executive_model->approve_laabh_executive($id,$region,$user_id);
                $data['Laabh_ExecutiveSingle'] = $this->Executive_model->Laabh_ExecutiveSingle($user_id);
                
                foreach ($data['Laabh_ExecutiveSingle'] as $Laabh_ExecutiveSingle) 
                {           
                    $first_name=$Laabh_Executive_data->first_name;
                    $contact=$Laabh_Executive_data->contact_no;
                    $email=$Laabh_Executive_data->em_email;
                    $password=$Laabh_Executive_data->password_dec;     
                }
                
                if($update > 0) 
                {
                    
                    $this->load->library('email');
                                            
                    $message  = 'Dear Laabh Executive <b>'.ucwords(strtolower($seller_name)).'</b>,<br><br>';
                    $message .= 'Thank you for your Registration with INDIGEM CHANNEL PARTNERS PVT. LTD. <br><br>';
                    $message .= 'Your Login details is...<br>';
                    $message .= 'Executive ID : <b>'.$user_id.'</b> <br>';                   
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
                                                                                                        
                        $this->session->set_flashdata('status_test', 'Executive Approved & Activated !');
                        $this->session->set_flashdata('status_icon', 'success');
                        $this->session->set_flashdata('status', 'Approved !');
                        
                        redirect('Laabh_executive/All_Laabh_Executive');
                        
                    }
                    else
                    {
                        
                        $this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
                        $this->session->set_flashdata('status_icon', 'error');
                        $this->session->set_flashdata('status', 'E-MAIL Not Send !');
                        
                        redirect('Laabh_executive/All_Laabh_Executive');
                        
                    }
                    
                }
                else
                {
                    $this->session->set_flashdata('status_test', 'Somthing went Wrong! Pease try Again!');
                    $this->session->set_flashdata('status_icon', 'error');
                    $this->session->set_flashdata('status', 'Data Not Saved !');
                    
                    redirect('Laabh_executive/All_Laabh_Executive');
                }
                
            }
            
        }
        else
        {
            redirect('Login');
        }

    }
    

}