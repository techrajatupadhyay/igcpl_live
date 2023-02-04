<?php

class Executive_model extends CI_Model{

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


    public function all_laabh_executive($user_type,$region,$region_state,$district_branch)
    {
		
        if($user_type==1)
		{
			$sql = "SELECT * FROM `users` WHERE  user_type='2' and status='ACTIVE' ";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
				
			return $result;
		}
		else if($user_type==6)
		{
			$sql = "SELECT * FROM `users` WHERE region='".$region."'  and user_type='2' and region_state='".$region_state."' and district_branch IN (".$district_branch.") and status='ACTIVE' ";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
				
			return $result;			
		}
		else if($user_type==11)
		{
			$sql = "SELECT * FROM `users` WHERE region IN (".$region.")  and user_type='2' and status='ACTIVE' ";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
				
			return $result;			
		}
		
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



    public function employeeSingle($sellerid)
    {
             
        $sql = "SELECT * FROM seller WHERE seller_id='".$sellerid."' limit 1";
        $data['employeeSingle'] = $this->db->query($sql)->result();
        //var_dump($Seller_Details);
                    
                
        return $data['employeeSingle'];

    }


    public function laabh_executive_details($id,$user_id,$user_type,$region)
    {
             
        $sql = "SELECT * FROM users WHERE id='".$id."' and user_id='".$user_id."' and user_type='".$user_type."' and region='".$region."' limit 1";
        $data['Laabh_Executive_Single'] = $this->db->query($sql)->result();
        //var_dump($Seller_Details);
        //print_r($this->db->last_query());            
                
        return $data['Laabh_Executive_Single'];

    }



    public function Laabh_ExecutiveSingle($user_id)
    {
             
        $sql = "SELECT * FROM users WHERE user_id='".$user_id."' limit 1";
        $data['Laabh_ExecutiveSingle'] = $this->db->query($sql)->result();
        //var_dump($Seller_Details);
                    
                
        return $data['Laabh_ExecutiveSingle'];

    }
    

    public function approve_laabh_executive($id,$region,$user_id)
    {
        
        date_default_timezone_set('Asia/Kolkata');      
        $createddate = date('Y-m-d H:i:s', time());
              
        
        $data = array(
                                                    
                'user_status' => 1,
			    'manager_approvel' => 1,
				'executive_approvel' => 1,
                    
                );  

            $this->db->set($data);				
            $this->db->where('user_id',$user_id);
		    $this->db->where('id',$id);
            $this->db->where('region',$region);                              
            $this->db->update('users', $data);
                
            return $queryresult = $this->db->affected_rows();
            //print_r($this->db->last_query());
                          
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


