<?php
class Registration_Duration_Model extends CI_Model 
{
  public function get_reg_duration()
	{

		$this->load->database();

		$duration=$this->db->query("SELECT * FROM registration_duration ");

		// $result=$duration->result();

		// echo "<pre>";

		// print_r($result);


		//$result=$duration->result();

		return $duration->result();


	}
	

	}