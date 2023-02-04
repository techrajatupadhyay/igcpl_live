<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	    class Document extends CI_Controller 
	    {
		    public function __construct()
			{
				parent::__construct();
			   
        $this->load->database();
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
        $this->load->model('login_model');
        $this->load->model('payroll_model');
        $this->load->model('settings_model');
        $this->load->model('leave_model');
        $this->load->model('Seller_model'); 
			}
	public function index()
	{
		
		
		$data['title'] = 'Register - Tech Arise';
		$data['metaDescription'] = 'Register';
		$data['metaKeywords'] = 'Register';
		//$data['sellerid'] = $sellerid;
		
		$this->load->view('backend/header'); 
		$this->load->view('backend/sidebar');
		$this->load->view('backend/document', $data);
		$this->load->view('backend/footer');
	}


		    public function actionresume()
			{
				
				date_default_timezone_set('Asia/Kolkata');      
                $createddate = date('Y-m-d H:i:s', time());

		        $pannumber = $this->input->post('pannumber');
			    $tannumber = $this->input->post('tannumber');
			    $GSTIN = $this->input->post('GSTIN');
			    //$resume = $this->input->post('resume_file');
			   

			    $saveData=array(
				    /'pannumber'=>$pannumber,
				    /'tannumber'=>$tannumber,
				    /'GSTIN'=>$GSTIN,
				    /'resume'=>$resume,
				    'created_at'=>$createddate,
				    'updated_at'=>$createddate,
			     );
			    //$this->load->model('Contact_model');         
			    $last_ins_id=$this->Resume_model->resume_user($saveData);


                $targetDir = "uploads/Job_Portal/".$last_ins_id ."/" ;
                $allowTypes = array('pdf','doc','csv');
                if (!file_exists($targetDir)) 
                {    

                    mkdir($targetDir, 0777, true);

                } 

                $fileName = basename($_FILES['resume_file']['name']);
                $targetFilePath = $targetDir . $fileName;                        
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                
                if (in_array($fileType, $allowTypes)) 
                {    

                    //Upload file to server
                    
                    ini_set( 'memory_limit', '1024M' );
                    ini_set('upload_max_filesize', '500M');  
                    ini_set('post_max_size', '500M');  
                    ini_set('max_input_time', 3600);  
                    ini_set('max_execution_time', 3600);
                    
                    move_uploaded_file($_FILES["resume_file"]["tmp_name"], $targetFilePath); 

                }

                $data = array(

                            'resume' => $targetFilePath,
                           
                            );    

                        $this->db->set($data);            
                        $this->db->where('id',$last_ins_id);                       
                        $this->db->update('job_portal', $data);
                        $queryresult = $this->db->affected_rows();
                        //print_r($this->db->last_query());
                        print_r($queryresult);

                if($queryresult >0)
	            {     
	               echo "<script>alert('New Document Uploaded Successfully');</script>";         
			     } 
	            else
	            {  
                  echo "<script>alert('Somthing went Wrong ! Please try again !');</script>";
				 }     


			     $this->session->set_flashdata('status_test', 'Your Resume Submitted Succcessfully ! We well get back to you!');
                 $this->session->set_flashdata('status_icon', 'success');
                 $this->session->set_flashdata('status', 'Resume Submitted Succcessfully');
        
      redirect('Home');
		    }
		}

?>