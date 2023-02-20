 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{

	function __construct() 
    {
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
		if($this->session->userdata('user_login_access') != False)
		{		
			if($this->session->userdata('user_type')==1)
			{	
		
                $this->load->view('backend/new_header');         
				$this->load->view('backend/new_sidebar');
                $this->load->view('backend/ho_dashboard'); 				
				$this->load->view('backend/new_footer');
				
			}
			else if($this->session->userdata('user_type')==2)
			{
								
				$this->load->view('backend/new_header');         
				$this->load->view('backend/new_sidebar');
                $this->load->view('backend/labh_exec_dashboard'); 				
				$this->load->view('backend/new_footer');
				
			}
			else if($this->session->userdata('user_type')==3)
			{
				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/seller_module_dashboard',$data);
				$this->load->view('backend/new_footer');
				
			}
			else if($this->session->userdata('user_type')==4)
			{
				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/fulfilment_dashboard',$data);
				$this->load->view('backend/new_footer');
				
			}

			else if($this->session->userdata('user_type')==5)
			{
				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/agent_dashboard',$data);
				$this->load->view('backend/new_footer');
				
			}
			else if($this->session->userdata('user_type')==6)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/manager_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			else if($this->session->userdata('user_type')==7)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/manager_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			else if($this->session->userdata('user_type')==8)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/manager_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			else if($this->session->userdata('user_type')==9)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/manager_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			else if($this->session->userdata('user_type')==10)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/manager_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			else if($this->session->userdata('user_type')==11)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/agm_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			else if($this->session->userdata('user_type')==12)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/manager_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			else if($this->session->userdata('user_type')==13)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/manager_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			
        }
		else
		{
			
			redirect('Login');
			
		} 
		/*	
        if ($this->session->userdata('user_login_access') == 1)
		{		
            redirect('Dashboard/Dashboard');
            $data=array();           
		}
		else
		{		
			redirect('Login');		
		}
		*/	
	}
	
	
    function Dashboard()
	{
		
        if($this->session->userdata('user_login_access') != False)
		{		
			if($this->session->userdata('user_type')==1)
			{	
		
                $this->load->view('backend/new_header');         
				$this->load->view('backend/new_sidebar');
                $this->load->view('backend/ho_dashboard'); 				
				$this->load->view('backend/new_footer');
				
			}
			else if($this->session->userdata('user_type')==2)
			{
								
				$this->load->view('backend/new_header');         
				$this->load->view('backend/new_sidebar');
                $this->load->view('backend/labh_exec_dashboard'); 				
				$this->load->view('backend/new_footer');
				
			}
			else if($this->session->userdata('user_type')==3)
			{
				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/seller_module_dashboard',$data);
				$this->load->view('backend/new_footer');
				
			}
			else if($this->session->userdata('user_type')==4)
			{
				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/fulfilment_dashboard',$data);
				$this->load->view('backend/new_footer');
				
			}

			else if($this->session->userdata('user_type')==5)
			{
				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/agent_dashboard',$data);
				$this->load->view('backend/new_footer');
				
			}
			else if($this->session->userdata('user_type')==6)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/manager_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			else if($this->session->userdata('user_type')==7)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/manager_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			else if($this->session->userdata('user_type')==8)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/manager_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			else if($this->session->userdata('user_type')==9)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/manager_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			else if($this->session->userdata('user_type')==10)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/manager_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			else if($this->session->userdata('user_type')==11)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/agm_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			else if($this->session->userdata('user_type')==12)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/manager_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			else if($this->session->userdata('user_type')==13)
			{				
				$data['title'] = 'Register - Tech Arise';
				$data['metaDescription'] = 'Register';
				$data['metaKeywords'] = 'Register';
				$data['state_list'] = @$this->db->get('state_master')->result();
				$data['district_list'] = @$this->db->get('district_master')->result();
				$this->load->view('backend/new_header');
				$this->load->view('backend/new_sidebar'); 
				$this->load->view('backend/manager_dashboard',$data);
				$this->load->view('backend/new_footer');				
			}
			
        }
		else
		{
			
			redirect('Login');
			
		} 
		
    }
	
	
    public function add_todo()
	{
        $userid = $this->input->post('userid');
        $tododata = $this->input->post('todo_data');
        $date = date("Y-m-d h:i:sa");
        $this->load->library('form_validation');
        //validating to do list data
        $this->form_validation->set_rules('todo_data', 'To-do Data', 'trim|required|min_length[5]|max_length[150]|xss_clean');        
        if($this->form_validation->run() == FALSE){
            echo validation_errors();
        } else {
        $data=array();
        $data = array(
        'user_id' => $userid,
        'to_dodata' =>$tododata,
        'value' =>'1',
        'date' =>$date    
        );
        $success = $this->dashboard_model->insert_tododata($data);
            #echo "successfully added";
            if($this->db->affected_rows()){
                echo "successfully added";
            } else {
                echo "validation Error";
            }
        }        
    }
	public function Update_Todo(){
        $id = $this->input->post('toid');
		$value = $this->input->post('tovalue');
			$data = array();
			$data = array(
				'value'=> $value
			);
        $update= $this->dashboard_model->UpdateTododata($id,$data);
        $inserted = $this->db->affected_rows();
		if($inserted){
			$message="Successfully Added";
			echo $message;
		} else {
			$message="Something went wrong";
			echo $message;			
		}
	}    
    
}