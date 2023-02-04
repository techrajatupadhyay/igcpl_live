<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing_and_coordination extends CI_Controller {

	public function index()
	{
		$data['page_name'] = 'marketing_and_coordination';

	
		$this->load->view('header');
		$this->load->view('marketing_and_coordination');
		$this->load->view('footer');
	
	}
}
