<?php
class Otp_Model extends CI_Model 
{
	
	function saveOtp($data)
	{
        $this->db->insert('email_verify',$data);
        return true;
	}
	
}
?>