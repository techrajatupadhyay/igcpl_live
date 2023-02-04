<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_single extends CI_Controller {

	public function index()
	{
		$data['page_name'] = 'service-single';

	
		$this->load->view('header');
		$this->load->view('service-single');
		$this->load->view('footer');
	
	}
}
