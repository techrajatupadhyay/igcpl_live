<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gem_hosting extends CI_Controller {

	public function index()
	{
		$data['page_name'] = 'gem_hosting';

	
		$this->load->view('header');
		$this->load->view('gem_hosting');
		$this->load->view('footer');
	
	}
}
