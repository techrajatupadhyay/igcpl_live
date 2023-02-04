<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function index()
	{
		$data['page_name'] = 'project';
        

       
	
		$this->load->view('header');
		$this->load->view('project');
		$this->load->view('footer');
	
	}
}
