<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Document_model extends CI_Model
{
    public function register_user($data)
    {
      $this->db->insert('seller_document', $data); 
      return  $insert_id = $this->db->insert_id();
    }
}

?>