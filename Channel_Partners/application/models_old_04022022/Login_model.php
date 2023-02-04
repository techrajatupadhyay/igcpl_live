<?php

class Login_model extends CI_Model
{


	function __consturct()
	{
	    parent::__construct();	
	}
	
	
	
	public function getUserForLogin($credential)
	{	
	
        return $this->db->get_where('users', $credential);
		
	}


    public function login_verify($email,$password_enc,$usertype)
	{

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('em_email ',$email);
		$this->db->where('em_password ',$password_enc);
		$this->db->where('user_type ',$usertype);
		$this->db->where('status ','ACTIVE');
		$this->db->limit(1);
		 $query = $this->db->get();
	    //print_r($this->db->last_query());
		  
	    if ($query->num_rows() > 0) 
		{
			
			return true ;
		} 
		else 
		{
			return false ;
		}
      
	}


    public function get_seller_details($email,$password)
    {
      		
        $data=array(
		
				'email'=>$email,
				'password'=>$password
				
				);
        $query=$this->db->where($data);
        $query=$this->db->get('seller');
		
        return  $User_Data=$query->result(); 	      
        //var_dump($this->db->last_query());
          
    }



 public function get_laabhagent_details($email,$password)
    {
      		
        $data=array(
		
				'em_email'=>$em_email,
				'em_password'=>$em_password
				
				);
        $query=$this->db->where($data);
        $query=$this->db->get('users');
		
        return  $User_Data=$query->result(); 	      
        //var_dump($this->db->last_query());
          
    }



	public function getdata(){
	$query =$this->db->get('users');
	$result=$query->result();
	return $result;
	}
	//**exists employee email check**//
    public function Does_email_exists($email) {
		$user = $this->db->dbprefix('users');
        $sql = "SELECT `email` FROM $user
		WHERE `email`='$email'";
		$result=$this->db->query($sql);
        if ($result->row()) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function insertUser($data){
		$this->db->insert('users',$data);
	}
	public function UpdateKey($data,$email){
		$this->db->where('email',$email);
		$this->db->update('users',$data);
	}
	public function UpdatePassword($key,$data){
		$this->db->where('forgotten_code',$key);
		$this->db->update('users',$data);	    
	}	
	public function UpdateStatus($verifycode,$data){
		$this->db->where('confirm_code',$verifycode);
		$this->db->update('users',$data);	    
	}
	//**exists employee email check**//
    public function Does_Key_exists($reset_key) 
	{
		$user = $this->db->dbprefix('users');
        $sql = "SELECT `forgotten_code` FROM $user
		WHERE `forgotten_code`='$reset_key'";
		$result=$this->db->query($sql);
		
        if ($result->row()) 
		{
            return $result->row();
        } 
		else 
		{
            return false;
        }
    }
	
	public function GetUserInfo($key)
	{
		
		$user = $this->db->dbprefix('users');
        $sql = "SELECT `password` FROM $user
		WHERE `forgotten_code`='$key'";
		$query=$this->db->query($sql);
		$result = $query->row();
		return $result;	
		
	}
	
	public function GetuserInfoBycode($verifycode)
	{
		
		$user = $this->db->dbprefix('users');
        $sql = "SELECT * FROM $user
		WHERE `confirm_code`='$verifycode'";
		$query=$this->db->query($sql);
		$result = $query->row();
		return $result;	
		
	}

	
}
?>