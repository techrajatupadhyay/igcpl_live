<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cash_flow_management extends CI_Controller {

	public function index()
	{
		$data['page_name'] = 'cash_flow_management';

	
		$this->load->view('header');
		$this->load->view('cash_flow_management');
		$this->load->view('footer');
	
	}
}
