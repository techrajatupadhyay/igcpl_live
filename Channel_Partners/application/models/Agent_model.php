<?php

class agent_model extends CI_Model{

	function __consturct()
	{
	    parent::__construct();	
	}

	public function get_workorder_details($sellerid,$workorderid)
    {

        $sql = "SELECT * FROM `work_order` where sellerid=".$sellerid." and  igcpl_workorder_id=".$workorderid." and isactive=0 limit 1";
        $query = $this->db->query($sql);
        $result = $query->result();
        //print_r($this->db->last_query());
        return $result;

    }

	
	public function get_source_buddy($sellerid,$workorderid)
    {

        $sql = "SELECT * FROM `work_order` where sellerid=".$sellerid." and  igcpl_workorder_id=".$workorderid." and isactive=0 limit 1";
        $query = $this->db->query($sql);
        $result = $query->result();
        //print_r($this->db->last_query());
        return $result;

    }
	

	public function get_destination_buddy($sellerid,$workorderid)
    {

        $sql = "SELECT * FROM `work_order` where sellerid=".$sellerid." and  igcpl_workorder_id=".$workorderid." and isactive=0 limit 1";
        $query = $this->db->query($sql);
        $result = $query->result();
        //print_r($this->db->last_query());
        return $result;

    }


    public function get_laabh_agent($division, $region)
    {

        echo $division;
        echo $region;
        $sql = "SELECT * FROM `users` where   division=".$division." and  region=".$region."  ";
        $query = $this->db->query($sql);
        $result = $query->result();
        //print_r($this->db->last_query());
        return $result;

    }

	public function insert_laabh_agent($saveData)
    {
		
        $this->db->insert('laabh_agents', $saveData); 
        
        return  $insert_id = $this->db->insert_id();
         
    }
	

    public function GetAllLaabhagent($user_type,$user_id,$regionid,$region_state,$district_branch)
    {
        
		if($user_type==1)
		{
					
			$sql = "SELECT * FROM `laabh_agents` WHERE status='ACTIVE' ";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
				
			return $result;
			
		}
		else if($user_type==2)
		{
					
			$sql = "SELECT * FROM `laabh_agents` WHERE laabh_executive='".$user_id."' and region='".$regionid."' and region_state='".$region_state."' and district_branch='".$district_branch."' and status='ACTIVE' ";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
				
			return $result;
			
		}
		else if($user_type==6)
		{
					
			$sql = "SELECT * FROM `laabh_agents` WHERE  region='".$regionid."' and region_state='".$region_state."' and district_branch IN(".$district_branch.") and status='ACTIVE' ";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
				
			return $result;			
		}
		else if($user_type==11)
		{
					
			$sql = "SELECT * FROM `laabh_agents` WHERE  region IN (".$regionid.") and status='ACTIVE' ";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
				
			return $result;			
		}
		
		

    }


    public function laabhagentSingle($user_type,$user_id,$regionid)
    {
		
        if($user_type==1)
		{     
			$sql = "SELECT * FROM laabh_agents WHERE  user_id='".$user_id."' AND  status='ACTIVE' limit 1";
			$data['laabhagent_details'] = $this->db->query($sql)->result();
			//print_r($this->db->last_query());
			//var_dump($Seller_Details);
									
		    return $data['laabhagent_details'];
			
        }
		else if($user_type==2)
		{
			
			$log_user_id = $this->session->userdata('user_login_id');
			
			$sql = "SELECT * FROM laabh_agents WHERE user_id='".$user_id."' and laabh_executive='".$log_user_id."' and region='".$regionid."' and status='ACTIVE' limit 1";
			$data['laabhagent_details'] = $this->db->query($sql)->result();
			//print_r($this->db->last_query());
			//var_dump($Seller_Details);
											
		    return $data['laabhagent_details'];
			
		}
		else if($user_type==6)
		{
			
			$sql = "SELECT * FROM laabh_agents WHERE user_id='".$user_id."'  and region='".$regionid."' and status='ACTIVE' limit 1";
			$data['laabhagent_details'] = $this->db->query($sql)->result();
			//print_r($this->db->last_query());
			//var_dump($Seller_Details);
											
		    return $data['laabhagent_details'];
			
		}
		else if($user_type==11)
		{
			
			$sql = "SELECT * FROM laabh_agents WHERE region IN (".$regionid.") and status='ACTIVE' limit 1";
			$data['laabhagent_details'] = $this->db->query($sql)->result();
			//print_r($this->db->last_query());
			//var_dump($Seller_Details);
											
		    return $data['laabhagent_details'];
			
		}
		
    }


   


    public function approve_laabhagent($user_id,$id,$laabh_executive)
    {
        
        date_default_timezone_set('Asia/Kolkata');      
        $created_on = date('Y-m-d H:i:s', time());
        $currentyear=date('Y');
       	   
        $data = array(
                                                
                'user_status' => 1,               
				'manager_approvel' => 1,
                );  

            $this->db->set($data);         			
            $this->db->where('user_id',$user_id);			
			$this->db->where('Laabh_executive', $laabh_executive);
            $this->db->update('users', $data);
			$queryresult = $this->db->affected_rows();
			//print_r($this->db->last_query());
			
		$data2 = array(
                                                
                'approvel_status' => 1,               
				
                );  

            $this->db->set($data2);         			
            $this->db->where('user_id',$user_id);
			$this->db->where('id',$id);
            $this->db->where('laabh_executive',$laabh_executive);			
            $this->db->update('laabh_agents', $data2);	
            $queryresult1 = $this->db->affected_rows();
			//print_r($this->db->last_query());
        return $queryresult1 ;
        
            
    }


    public function Laabhagent_Reject($user_id)
    {
        
        date_default_timezone_set('Asia/Kolkata');      
        $created_on = date('Y-m-d H:i:s', time());
        
        $data = array(
                                                
                'user_status' => 2,                            
                'created_on' => $created_on
                
                );  

            $this->db->set($data);          
            $this->db->where('user_id',$user_id);
            $this->db->where('user_status',0);
            $this->db->update('users', $data);
            
            return $queryresult = $this->db->affected_rows();
            //print_r($this->db->last_query());
            
    }
   
     public function LaabhagentDelete($user_id){
        $this->db->delete('users',array('user_id'=> $user_id));        
    }
    




/*---------------------------------------Employee---------------------------------------*/

    public function insert_employees($saveData)
    {
        $this->db->insert('users', $saveData); 
        
        return  $insert_id = $this->db->insert_id();
         
    }


    public function GetAllemployees($user_id)
    {
        if($user_id !="")
        {
    
            $sql = "SELECT * FROM `users` WHERE user_id='".$user_id."' ";
            $query = $this->db->query($sql);
            $result = $query->result();
            //print_r($this->db->last_query());
            
            return $result;

        }
        else
        {

            $sql = "SELECT * FROM `users` ";
            $query = $this->db->query($sql);
            $result = $query->result();
            //print_r($this->db->last_query());
            
            return $result;

        }


    }



    public function all_laabh_executive($region)
    {

        $sql = "SELECT * FROM `users` WHERE region='".$region."'  and user_type='2' ";
        $query = $this->db->query($sql);
        $result = $query->result();
        //print_r($this->db->last_query());
            
        return $result;
    }

    public function all_seller($region)
    {

        $sql = "SELECT * FROM `users` WHERE region='".$region."'  and user_type='3' ";
        $query = $this->db->query($sql);
        $result = $query->result();
        //print_r($this->db->last_query());
            
        return $result;
    }

   public function SellerView($user_id)
    {
             
        $sql = "SELECT * FROM users WHERE user_id='".$user_id."' limit 1";
        $data['sellerView'] = $this->db->query($sql)->result();
        //var_dump($Seller_Details);
                    
                
       return $data['sellerView'];

    }



public function approve_seller($user_id)
    {
        
        date_default_timezone_set('Asia/Kolkata');      
        $created_on = date('Y-m-d H:i:s', time());
        $currentyear=date('Y');
       
        $data = array(
                                                
                'user_status' => 1,
                
                );  

            $this->db->set($data);          
            $this->db->where('user_id',$user_id);
            $this->db->where('user_status',0);
            $this->db->update('users', $data);
            
            return $queryresult = $this->db->affected_rows();
            //print_r($this->db->last_query());
            
    }





     public function AllLaabh_agent($user_id)
    {
             
        $sql = "SELECT * FROM users WHERE user_id='".$user_id."' limit 1";
        $data['alllabbh_agent'] = $this->db->query($sql)->result();
        //var_dump($Seller_Details);
                    
                
       return $data['alllabbh_agent'];

    }



     public function regionemployee($user_id)
    {
             
        $sql = "SELECT * FROM users WHERE user_id='".$user_id."' limit 1";
        $data['employeeslist'] = $this->db->query($sql)->result();
        //var_dump($Seller_Details);
                    
                
       return $data['employeeslist'];

    }







    public function LogisticsupportValue(){
        $sql = "SELECT `logistic_assign`.*,
        `employee`.`em_id`,`first_name`,`last_name`,
        `assets`.`ass_name`,
        `pro_task`.`id`,`task_title`
        FROM `logistic_assign`
        LEFT JOIN `employee` ON `logistic_assign`.`assign_id`=`employee`.`em_id`
        LEFT JOIN `assets` ON `logistic_assign`.`asset_id`=`assets`.`ass_id`
        LEFT JOIN `pro_task` ON `logistic_assign`.`task_id`=`pro_task`.`id`
        ORDER BY `logistic_assign`.`ass_id` DESC ";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result;         
    }
    public function GetLogisticesupportvalByid($id){
        $sql = "SELECT `logistic_assign`.*,
        `employee`.`em_id`,`first_name`,`last_name`,
        `assets`.`ass_name`,
        `pro_task`.`id`,`task_title`
        FROM `logistic_assign`
        LEFT JOIN `employee` ON `logistic_assign`.`assign_id`=`employee`.`em_id`
        LEFT JOIN `assets` ON `logistic_assign`.`asset_id`=`assets`.`ass_id`
        LEFT JOIN `pro_task` ON `logistic_assign`.`task_id`=`pro_task`.`id`
        WHERE `logistic_assign`.`ass_id`='$id' ";
        $query=$this->db->query($sql);
		$result = $query->row();
		return $result;         
    }
    public function GettaskByProid($id){
        $sql = "SELECT * FROM `pro_task` WHERE `pro_id`='$id'";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result;         
    }
    public function getAssetsQty($logid){
        $sql = "SELECT * FROM `assets` WHERE `ass_id`='$logid'";
        $query=$this->db->query($sql);
		$result = $query->row();
		return $result;         
    }
    public function GetAssignByProid($id){
    $sql = "SELECT `assign_task`.*,
      `employee`.*
      FROM `assign_task`
      LEFT JOIN `employee` ON `assign_task`.`assign_user`=`employee`.`em_id`
      WHERE `assign_task`.`task_id`='$id'";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result;         
    }
    public function Update_Assets_Category($id,$data){
        $this->db->where('cat_id',$id);
        $this->db->update('assets_category',$data);
    } 
    public function GetAssetsValueId($id){
        $sql = "SELECT `assets`.*,
        `assets_category`.*
        FROM `assets`
        LEFT JOIN `assets_category` ON `assets`.`catid`=`assets_category`.`cat_id`
        WHERE `assets`.`ass_id`='$id'";
        $query=$this->db->query($sql);
        $result = $query->row();
		return $result;          
    }        
    }


