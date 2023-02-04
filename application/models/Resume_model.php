<?php
  defined('BASEPATH') or exit('No direct script access allowed');
    class Resume_model extends CI_Model
      {
        public function resume_user($data)
          {
            $this->db->insert('job_portal', $data); 
             return  $insert_id = $this->db->insert_id();
           }
      }
?>