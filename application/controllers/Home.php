<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

	public function index()
	{
		
	
		$data['page_name'] = 'index';

		$this->load->view('header');
		
		$this->load->view('index');
		$this->load->view('footer');
	
	}
	
	
}
