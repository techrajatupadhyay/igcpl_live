<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logistic_Support extends CI_Controller {

	public function index()
	{
		$data['page_name'] = 'logistics_support';

	
		$this->load->view('header');
		$this->load->view('logistics_support');
		$this->load->view('footer');
	
	}
}
