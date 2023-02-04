<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_History extends CI_Controller {

    public function index()
    {
        $data['page_name'] = 'company_history';
        
    
        $this->load->view('header');
        $this->load->view('company_history');
        $this->load->view('footer');
    
    }
}
    