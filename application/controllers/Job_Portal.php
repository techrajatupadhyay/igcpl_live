<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	    class Job_Portal extends CI_Controller 
	    {
		    public function __construct()
			{
				parent::__construct();
			    $this->load->model('Resume_model');
			    $this->load->library('session');
			}
			public function index()
			{
		        $data['title'] = 'Register - Tech Arise';
			    $data['metaDescription'] = 'Register';
			    $data['metaKeywords'] = 'Register';   
		        $data['page_name'] = 'job_portal';
		        $this->load->view('header');
				$this->load->view('job_portal');
				$this->load->view('footer');
			}


		    public function actionresume()
			{
				
				date_default_timezone_set('Asia/Kolkata');      
                $createddate = date('Y-m-d H:i:s', time());

		        $username = $this->input->post('username');
			    $userphone = $this->input->post('userphone');
			    $useremail = $this->input->post('useremail');
			    $resume = $this->input->post('resume_file');
			   

			    $saveData=array(
				    'username'=>$username,
				    'userphone'=>$userphone,
				    'useremail'=>$useremail,
				    'resume'=>$resume,
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
	                
	                /*echo "<script>alert('Query Submited Successfully');</script>";*/  
	                echo "<script>alert('New Document Uploaded Successfully');</script>";         
				    //$this->session->set_flashdata('status_test', 'Query Sended Succcessfully');
                    //$this->session->set_flashdata('status_icon', 'success');
                    //$this->session->set_flashdata('status', 'We will get back to you !');
                     
	            } 
	            else
	            {  
                     
                    echo "<script>alert('Somthing went Wrong ! Please try again !');</script>";
				    //$this->session->set_flashdata('status_test', ' Please try again later !');
	                //$this->session->set_flashdata('status_icon', 'error');
	               // $this->session->set_flashdata('status', 'something went wrong !');
	            }     


			     $this->session->set_flashdata('status_test', 'Your Resume Submitted Succcessfully ! We well get back to you!');
                 $this->session->set_flashdata('status_icon', 'success');
                 $this->session->set_flashdata('status', 'Resume Submitted Succcessfully');
        
      redirect('Home');
		    }
		}

?>