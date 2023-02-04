<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('Contact_model');
  }
  
  // Register
  public function index()
  {
    $data['title'] = 'Register - Tech Arise';
    $data['metaDescription'] = 'Register';
    $data['metaKeywords'] = 'Register';
    $this->load->view('header');
    $this->load->view('contact', $data);
    $this->load->view('footer');
  }

  
  
  public function actioncontact()
  {

    date_default_timezone_set('Asia/Kolkata');      
    $createddate = date('Y-m-d H:i:s', time());
   
    $name = $this->input->post('name');
    $phone = $this->input->post('phone');
    $email = $this->input->post('email');
    $business = $this->input->post('business');
    $message = $this->input->post('message');
    
    $saveData=array(
                           
                'name'=>$name,
                'phone'=>$phone,
                'email'=>$email,
                'department'=>$business,
                'message'=>$message,
                'create_time'=>$createddate,
                'update_time'=>$createddate
                  
                );
                
                  
          $last_ins_id=$this->Contact_model->register_user($saveData);

       if($last_ins_id) 
       {
           
            $session_data = array(              
                    'userid' => $last_ins_id,
                    'firstname' => $name,                   
                    'email' => $email,
                    'phone' => $phone,                          
                  );                
            $this->session->set_userdata('logged_in', $session_data);
            
            $this->session->set_flashdata('status_test', 'Your Query Submitted Succcessfully !');
            $this->session->set_flashdata('status_icon', 'success');
            $this->session->set_flashdata('status', 'Query Submitted Succcessfully');

             redirect('FAQ');

       }  
       else
       {

          $this->session->set_flashdata('status_test', 'some error occurred!');
          $this->session->set_flashdata('status_icon', 'error');
          $this->session->set_flashdata('status', 'Query Not submitted!');
            
          redirect('Contact');
   
      }


    }
  }

