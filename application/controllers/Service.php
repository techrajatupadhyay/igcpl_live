<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	public function index()
	{
		$data['page_name'] = 'service';

	
		$this->load->view('header');
		$this->load->view('service');
		$this->load->view('footer');
	
	}
}
