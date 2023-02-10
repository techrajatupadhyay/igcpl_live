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


			function profile_upload()
			{
				//print_r($_FILES);
				
			
					$file = $_FILES['agent_profile_file']['tmp_name'];
			       //var_dump($file);
					if (file_exists($file)) 
					{
						
						$allowedExts = array("gif", "jpeg", "jpg", "png", "pdf");
						$typefile    = explode(".", $_FILES["agent_profile_file"]["name"]);
						$extension   = end($typefile);
			
						if (!in_array(strtolower($extension), $allowedExts)) {
							//not image
							$data['message'] = "images";
						} else {
							$userid = 11;
			
							$full_path = "uploads/agent_image/" . $userid . "/profileImg/";
			
							/*if(!is_dir($full_path)){
							mkdir($full_path, 0777, true);
							}*/
							$path = $_FILES['agent_profile_file']['tmp_name'];
			
							$image_name = $full_path . preg_replace("/[^a-z0-9\._]+/", "-", strtolower(uniqid() . $_FILES['agent_profile_file']['name']));
							//move_uploaded_file($path,$image_name);
			
							$data['message'] = "sucess";
			
							$s3_bucket = $this->s3_bucket_upload($path, $image_name);
			
							if ($s3_bucket['message'] == "sucess") {
								$data['imagename'] = $s3_bucket['imagepath'];
								$data['imagepath'] = $s3_bucket['imagename'];
							}
			
							//print_r($imagesizedata);
							//image
							//use $imagesizedata to get extra info
						}
					} 
					else
					{
						//not file
						$data['message'] = "images";
					}
			
				
				echo json_encode($data);
				//$file_name2 = preg_replace("/ /", "-", $file_name);
			}
			
			
			
			
			// type for if image then it will reduce size
			// site for it in web of mobile because mobile webservice image will in base 64
			// $tempth will file temp path
			// $image_path will file where to save path
			
			function s3_bucket_upload($temppath, $image_path, $type = "image", $site = "web")
			{
				$bucket = "indigemcpdocs";
			
				$data = array();
			
				$data['message'] = "false";
			
				// For website only
				if ($site == "web") 
				{
					if ($type == "image") 
					{
						$file_Path = $this->compress($temppath, $image_path, 90);
					} else {
						$file_Path = $temppath;
					}
				}
			
				try {
					$s3Client = new S3Client([
						'version'     => 'latest',
						'region'      => 'ap-south-1',
						'credentials' => [
							'key'    => 'AKIAZXJ7DMJW3BI46IFP',
							'secret' => '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',
						],
					]);
			
					// For website only
					if ($site == "web") {
			
						$result = $s3Client->putObject([
							'Bucket'     => $bucket,
							'Key'        => $image_path,
							'SourceFile' => $file_Path,
							//'body'=> $file_Path,
							'ACL'        => 'public-read',
							//'StorageClass' => 'REDUCED_REDUNDANCY',
						]);
			
						$data['message']   = "sucess";
						$data['imagename'] = $image_path;
						$data['imagepath'] = $result['ObjectURL'];
					} else {
						// $tmp = base64_decode($base64);
						$upload            = $s3Client->upload($bucket, $image_path, $temppath, 'public-read');
						$data['message']   = "sucess";
						$data['imagepath'] = $upload->get('ObjectURL');
					}
			
				} catch (Exception $e) {
					$data['message'] = "false";
					// echo $e->getMessage() . "\n";
				}
			
				return $data;
			}

			function compress($source, $destination, $quality)
			{
				ob_start();
				$info = getimagesize($source);
			
				if ($info['mime'] == 'image/jpeg') {
					$image = imagecreatefromjpeg($source);
				} elseif ($info['mime'] == 'image/gif') {
					$image = imagecreatefromgif($source);
				} elseif ($info['mime'] == 'image/png') {
					$image = imagecreatefrompng($source);
				}
			
				$filename = tempnam(sys_get_temp_dir(), "beyondbroker");
			
				imagejpeg($image, $filename, $quality);
			
				//ob_get_contents();
				$imagedata = ob_end_clean();
				return $filename;
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