<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FAQ extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

       $this->load->model('FAQ_model');
    }
  
	public function index()
	{
		
		if (isset($this->session->userdata['logged_in'])) 
		{
			
	        $userid=$this->session->userdata['logged_in']['userid'];
			$data['title'] = 'Register - Tech Arise';
			$data['metaDescription'] = 'Register';
			$data['metaKeywords'] = 'Register';
			$data['faq'] = @$this->db->get('services')->result();
			
			$this->db->select('*');
			$this->db->from('faqs');
			$this->db->where('userid ',$userid);			
			$this->db->where('status ',1);					
			$query=$this->db->get();
            $query = $query->num_rows();
					
			//$cart_data=$query;
			$data['service_count']=$query;
			
			
			$this->load->view('header');
			$this->load->view('faqs', $data);
			$this->load->view('footer');
		
		}
		else
		{
						
			redirect('Signin');
			
		}
		
	}

  
    public function actionfaq()
    {

        if (isset($this->session->userdata['logged_in'])) 
		{			
	        $userid=$this->session->userdata['logged_in']['userid'];
		}
		
		date_default_timezone_set('Asia/Kolkata');      
		$createddate = date('Y-m-d H:i:s', time());
	   
		$serviceid = $this->input->post('serviceid');
		
		foreach ($serviceid as $service_id)
        {
			
			$saveData=array(
						
						'userid'=>$userid,
						'serviceid'=>$service_id,						
						'status'=>1,					
						'create_time'=>$createddate,
						'update_time'=>$createddate
						  
						);
												  
			$last_ins_id=$this->FAQ_model->register_user($saveData);
			
		}   				

	    $this->session->set_flashdata('status_test', 'Your Services  Submitted Succcessfully ! We well get back to you!');
	    $this->session->set_flashdata('status_icon', 'success');
	    $this->session->set_flashdata('status', 'Services  Submitted Succcessfully');
				
		redirect('Signin/logout');
					

    }
	
	
	
	
	
	
  }

