<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

	public function index()
	{
		
	    date_default_timezone_set('Asia/Kolkata');      
        $create_time = date('Y-m-d H:i:s', time());
		//echo $ip_addr = $this->input->ip_address();
		
		 $data= array(
				'ip_add' =>$_SERVER['REMOTE_ADDR'],
				'current_time' =>$create_time,
			); 
		$insert_id = $this->db->insert('hits', $data);
		$insert_id = $this->db->insert_id();  
		//print_r($this->db->last_query());

		$data['page_name'] = 'index';
		$this->load->view('header');	
		$this->load->view('index');
		$this->load->view('footer');
	
	}

	public function gem()
	{
		//echo "ascac";			
		$this->load->view('index_gem');	
	
	}



	
	
}
