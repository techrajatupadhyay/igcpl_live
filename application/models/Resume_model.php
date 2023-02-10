<?php

require_once __DIR__ . '/vendor/autoload.php'; 

use Aws\S3\S3Client;

    class Resume_model extends CI_Model
      {
          public function resume_user($data)
          {

                  $bucket = "indigemcpdocs";
                  $data = array();

                  $s3Client = new S3Client([
                        'version' => 'latest',
                        'region'  => 'ap-south-1',
                        'credentials' => [
                        'key'    => 'AKIAZXJ7DMJW3BI46IFP',
                        'secret' => 'nUJqpBDP9r5t55vhfsrt82zKKKBp8g8dy7A4+//'
                        ],
                      ]);    
                  $file_Path2 = $_FILES['resume_file']['tmp_name'];	                 												
                  $image_path2 = basename($_FILES['resume_file']['name']);
                  //echo $image_path2;
//die;
                  $result = $s3Client->putObject([
                        'Bucket' => $bucket,
                        'Key' => $image_path2,
                        'SourceFile' => $file_Path2,
                        'ACL' => 'public-read'
                        //'Prefix' => 'files/'
                      ]);
            echo  $targetFilePath2 =  $result->get('ObjectURL');


                die;







            $this->db->insert('job_portal', $data); 
             return  $insert_id = $this->db->insert_id();
           }
      }
?>