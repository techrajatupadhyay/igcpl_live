<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Employee_model extends CI_Model
{
  // declare private variable
  //private $_userID;
 // private $_name;
  //private $_userName;
  //private $_email;
  //private $_password;
  //private $_status;



public function register_user($data)
{
       
    $this->db->insert('user_registration', $data); 
    
    return  $insert_id = $this->db->insert_id();
     
}






  public function setUserID($userID)
  {
    $this->_userID = $userID;
  }
  public function setfirstName($firstname)
  {
    $this->_firstname = $firstname;
  }
  public function setlastName($lastName)
  {
    $this->_lastName = $lastName;
  }


  public function setMobile_no($mobile_no)
  {
    $this->_mobile_no = $mobile_no;
  }

  public function setEmail($email)
  {
    $this->_email = $email;
  }

  public function setPassword($password)
  {
    $this->_password = $password;
  }
  public function setAddress($address)
  {
    $this->_address = $address;
  }


  public function setImage($image)
  {
    $this->_image = $image;
  }

  


    




  
}

?>