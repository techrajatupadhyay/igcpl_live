<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Email_model extends CI_Model
{
 
  public function email_user($data)
  {
       
      $this->db->insert('email', $data); 
   
      
    return  $insert_id = $this->db->insert_id();
     
  }
}
?>