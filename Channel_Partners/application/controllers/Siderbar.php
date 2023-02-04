 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siderbar extends CI_Controller {

	    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model');
        $this->load->model('settings_model');    
        $this->load->model('notice_model');    
        $this->load->model('project_model');    
        $this->load->model('leave_model');    
    }
    
	
	public function index()
	{
		$this->load->view('backend/header-new');
        $this->load->view('backend/sidebar_old');
        $this->load->view('backend/footer_new');
        
	}
	
	
  
	
	
   
    
}