<?php

	class Login_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
	public function getUserForLogin($email,$user_password)
	{

		$this->db->select('*');
		$this->db->from('user_registration');
		$this->db->where('email ',$email);
		$this->db->where('Password ',$user_password);
		//$this->db->where('status ','Active');
		$this->db->limit(1);
		$query = $this->db->get();
	    //print_r($this->db->last_query());
		
	    if ($query->num_rows() > 0) 
		{
			//echo "asac";	
			return true ;
		} 
		else 
		{
			return false ;
		}

       // return $this->db->get_where('user_registration', $credential);
	}


	public function get_user_data($email,$password)
    {
      		
        $data=array(		
				'email'=>$email,
				'password'=>$password			
				);
        $query=$this->db->where($data);
        $query=$this->db->get('user_registration');
		
        return  $User_Data=$query->result(); 
	    //var_dump($data['User_Data']);   
        //var_dump($this->db->last_query());

          
    }
	

}
?>