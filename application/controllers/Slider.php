<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

    public function index()
    {
        /*$data['page_name'] = 'about';*/
        
        $this->load->view('header');
        $this->load->view('slider');
        $this->load->view('footer');
    
    }
}
