<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FP_Management_Module extends CI_Controller
{

    public function index()
    {
        $data['page_name'] = './module/fp_management_module';
        
       $this->load->view('header');
        $this->load->view('./module/fp_management_module');
       // $this->load->view('footer');
    }

    

}
