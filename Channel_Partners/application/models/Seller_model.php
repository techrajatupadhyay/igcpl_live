<?php


require_once __DIR__ . '/vendor/autoload.php';
use Aws\S3\S3Client; 


class Seller_model extends CI_Model 
{
  
    function insert_data($saveData)
    {
        $this->db->insert('seller',$saveData);
        //print_r($this->db->last_query());
        return true;
    }


	public function sellerSingle($sellerid)
	{
			 
		$sql = "SELECT * FROM seller WHERE seller_id='".$sellerid."' limit 1";
		$data['seller'] = $this->db->query($sql)->result();
		//var_dump($Seller_Details);
					
				
		return $data['seller'];

	}


    public function approve_seller($region,$user_id,$sellerid,$user_type)
    {
        
        date_default_timezone_set('Asia/Kolkata');      
        $createddate = date('Y-m-d H:i:s', time());
        $currentyear=date('Y');
        
		if($user_type==1)
		{
			
			$sql2 ="SELECT * from seller Where seller_id='".$sellerid."' and isactive='1'" ;
			$data['user_details'] = $this->db->query($sql2)->result();	
							
			foreach($data['user_details'] as $det)
			{				
				$labh_emp_id = $det->labh_emp_id;
                $labh_agent_id = $det->labh_agent_id;				
			}
			
			$data = array(													
					'manager_approvel' => 1,
					'seller_status' => 1,					
					);  
				$this->db->set($data);          
				$this->db->where('seller_id',$sellerid);
				//$this->db->where('region_id',$region);
				$this->db->where('labh_emp_id',$labh_emp_id);
				$this->db->where('labh_agent_id',$labh_agent_id);				
				$this->db->update('seller', $data);
				$queryresult = $this->db->affected_rows();
				//print_r($this->db->last_query());
				
			$data = array(			  
					'user_status' => 1,					
					'manager_approvel' => 1,
					);  
				$this->db->set($data);          
				$this->db->where('user_id',$sellerid);
				//$this->db->where('region',$region);
				$this->db->where('Laabh_executive',$labh_emp_id);								
				$this->db->update('users', $data);	
				
				$queryresult2 = $this->db->affected_rows();
				//print_r($this->db->last_query());
				
			return $queryresult2;

		}
		else if($user_type==2)
		{
			
			$data = array(										
					'executive_approvel' => 1,		
					);  
				$this->db->set($data);          
				$this->db->where('seller_id',$sellerid);
				$this->db->where('region_id',$region);
				$this->db->where('labh_emp_id',$user_id);
				//$this->db->where('seller_status',0);
				$this->db->update('seller', $data);	
				$queryresult = $this->db->affected_rows();
				//print_r($this->db->last_query());

				$data = array(											
					'executive_approvel' => 1,		
					);  
				$this->db->set($data);          
				$this->db->where('user_id',$sellerid);
				$this->db->where('region',$region);
				$this->db->where('Laabh_executive',$user_id);
				//$this->db->where('seller_status',0);
				$this->db->update('users', $data);
				
				$queryresult2 = $this->db->affected_rows();
				//print_r($this->db->last_query());
				
			return $queryresult2;
				
		}
		else if($user_type==6)
		{
			
			$sql2 ="SELECT * from seller Where seller_id='".$sellerid."' and isactive='1'" ;
			$data['user_details'] = $this->db->query($sql2)->result();	
							
			foreach($data['user_details'] as $det)
			{				
				$labh_emp_id = $det->labh_emp_id;
                $labh_agent_id = $det->labh_agent_id;				
			}
			
			$data = array(													
					'manager_approvel' => 1,
					'seller_status' => 1,					
					);  
				$this->db->set($data);          
				$this->db->where('seller_id',$sellerid);
				$this->db->where('region_id',$region);
				$this->db->where('labh_emp_id',$labh_emp_id);
				$this->db->where('labh_agent_id',$labh_agent_id);				
				$this->db->update('seller', $data);
				$queryresult = $this->db->affected_rows();
				//print_r($this->db->last_query());	
				
			$data = array(			  
					'user_status' => 1,					
					'manager_approvel' => 1,
					);  
				$this->db->set($data);          
				$this->db->where('user_id',$sellerid);
				$this->db->where('region',$region);
				$this->db->where('Laabh_executive',$labh_emp_id);								
				$this->db->update('users', $data);					
				$queryresult2 = $this->db->affected_rows();
				//print_r($this->db->last_query());
				
			return $queryresult2;	
		}
            
    }
    
    public function Seller_Reject($sellerid)
    {
        
        date_default_timezone_set('Asia/Kolkata');      
        $createddate = date('Y-m-d H:i:s', time());
        
        $data = array(
                                                
                'seller_status' => 2,                            
                'createdon' => $createdon
                
                );  

            $this->db->set($data);          
            $this->db->where('seller_id',$sellerid);
            $this->db->where('seller_status',0);
            $this->db->update('seller', $data);
            
            return $queryresult = $this->db->affected_rows();
            //print_r($this->db->last_query());
            
    }
    

    public function SellerDelete($sellerid)	
	{

        $this->db->delete('seller',array('seller_id'=> $sellerid)); 

    }
    

    public function getData($tblName, $dataget='', $limits ='', $orderby='', $orderformat ='DESC', $orDatget='' ) 
    {

        $this->db->select('*');
        if($dataget != ''){                 
            foreach ($dataget as $field => $value)                  
                $this->db->where($field, $value);
        }   
        if($orDatget != ''){                    
            foreach ($orDatget as $field => $value)             
            $this->db->or_where($field, $value);    
        }                                               
        if ($limits != ''){             
            $this->db->limit($limits);
        }   
        if ($orderby != ''){
            $this->db->order_by($orderby, $orderformat);
        }                       
        $query = $this->db->get($tblName);          
        return $query->result();        
    }





public function sendSMS($mobile,$message){
       
         $message = urlencode($message);
         
         //$url_set = "http://universal24sms.org/app/smsapi/index.php?key=45F1033AADCFAF&routeid=575&type=text&contacts=".$mobile."&senderid=SATGRU&msg=".$message;
         
         $url_set = "http://msg.msgclub.net/rest/services/sendSMS/sendGroupSms?AUTH_KEY=dce02c7255a171cfb3c13967e3603351&message=".$message."&senderId=SBJILE&routeId=1&mobileNos=".$mobile."&smsContentType=english";
         
         
               //   $ch = curl_init();
            //     $curlConfig = array(
            //         CURLOPT_URL            => $url_set,
            //         CURLOPT_POST           => true,
            //         CURLOPT_RETURNTRANSFER => true,
            //         CURLOPT_POSTFIELDS     => array(
            //             'field1' => 'some date',
            //             'field2' => 'some other data',
            //         )
            //     );
            //     curl_setopt_array($ch, $curlConfig);
            //     $result = curl_exec($ch);
                return  file_get_contents($url_set);
       
   }



    public function GetAllDuration()
    {
        $query = $this->db->get('registration_duration');
        return $query;
        //print_r($this->db->last_query());
        
        
    }


    public function GetAllSeller($user_type,$user_id,$region,$region_state,$district_branch)
    {
		if($user_type==1)
		{
					
			$sql = "SELECT * FROM `seller` WHERE isactive=1";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
				
			return $result;
			
		}
		else if($user_type==2)
		{
						
			$sql = "SELECT * FROM `seller` WHERE region_id='".$region."' AND  labh_emp_id='".$user_id."' AND region_state='".$region_state."' AND district_branch='".$district_branch."' AND isactive=1";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
				
			return $result;
			
		}
		else if($user_type==5)
		{
					
			$sql = "SELECT * FROM `seller` WHERE region_id='".$region."' AND  labh_agent_id='".$user_id."' AND region_state='".$region_state."' AND district_branch='".$district_branch."' AND isactive=1";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
				
			return $result;
			
		}
		else if($user_type==6)
		{
					
			$sql = "SELECT * FROM `seller` WHERE region_id='".$region."' AND region_state='".$region_state."' AND district_branch IN (".$district_branch.") AND isactive=1";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
				
			return $result;
			
		}
		else if($user_type==11)
		{
					
			$sql = "SELECT * FROM `seller` WHERE region_id IN (".$region.") AND isactive=1";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
				
			return $result;
			
		}
			

    }


    public function gem_workorder()
    {
	   
        $sql = "SELECT * FROM `seller` WHERE isactive=1";
        $query = $this->db->query($sql);
        $result = $query->result();
        //print_r($this->db->last_query());
        // $this->db->insert('work_order',$saveData);
        return $result;
		
    }


    public function get_my_workorders($regionid,$usertype,$user_id,$region_state,$district_branch)
    {
		
        if($usertype==1)
		{
			
			$sql = "SELECT * FROM `work_order` WHERE isactive='0' and status='1' ";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
			
			return $result;
			
		}
		else if($usertype==2)
		{
						
			$sql = "SELECT * FROM `work_order` WHERE executive_id='".$user_id."' and region_id='".$regionid."' and region_state='".$region_state."' and district_branch='".$district_branch."' and isactive='0' and status='1' ";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
			
			return $result;
			
		}
		else if($usertype==3)
		{
			
			$sql = "SELECT * FROM `work_order` WHERE sellerid='".$user_id."' and region_id='".$regionid."' and region_state='".$region_state."' and district_branch='".$district_branch."' and isactive='0' and status='1' ";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
			
			return $result;
			
		}
		else if($usertype==4)
		{
			
			$sql = "SELECT * FROM `work_order` WHERE (logistics='Picemeal'  ||  status='BulkFulfilment') and isactive='0' and status='1' ";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
			
			return $result;
			
		}
		else if($usertype==5)
		{
			
			$sql = "SELECT * FROM `work_order` WHERE agent_id='".$user_id."' and region_id='".$regionid."' and region_state='".$region_state."' and district_branch='".$district_branch."' and isactive='0' and status='1' ";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
			
			return $result;
			
		}
		else if($usertype==6)
		{
			
			$sql = "SELECT * FROM `work_order` WHERE region_id=".$regionid." and isactive='0' and region_state='".$region_state."' and district_branch IN (".$district_branch.") and status='1' ";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
			
			return $result;
			
		}
		else if($usertype==11)
		{
			
			$sql = "SELECT * FROM `work_order` WHERE region_id IN (".$regionid.") and status='1' ";
			$query = $this->db->query($sql);
			$result = $query->result();
			//print_r($this->db->last_query());
			
			return $result;
			
		}

    }


    public function insert_gem_workorder($saveData)
	{
	
	    $this->db->insert('work_order', $saveData); 
		return  $insert_id = $this->db->insert_id();
		
	}
	
	
    public function workorder_preview()
    {
        $sql = "SELECT * FROM `work_order` WHERE`id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->result();
        //print_r($this->db->last_query());
        // $this->db->insert('work_order',$saveData);
        return $result;
    }



    public function GetSellerVal($id)
	{
        $sql = "SELECT * FROM `seller` WHERE `id`='$id'";
        $query=$this->db->query($sql);
        $result = $query->row();
        return $result;         
    }
	
    public function DeletPro($id)
	{
        $this->db->delete('pro_task',array('id'=> $id));
    }
    public function DeletAssignuser($id)
	{
        $this->db->delete('assign_task',array('task_id'=> $id));
    }
    public function Delet_members_Data($id)
	{
        $this->db->delete('assign_task',array('task_id'=> $id));
    }
    public function DeletProFile($id)
	{
        $this->db->delete('project_file',array('id'=> $id));
    }
    public function DeletExpensesByid($id)
	{
        $this->db->delete('pro_expenses',array('id'=> $id));
    }
    public function DeletNotesByID($id)
	{
        $this->db->delete('pro_notes',array('id'=> $id));
    }
    public function DeletAssetssByid($id)
	{
        $this->db->delete('assets',array('id'=> $id));
    }


     public function DletSellerData($id){
        $this->db->delete('pro_notes', array('pro_id' => $id)); 
        $this->db->delete('pro_task', array('pro_id' => $id));
        $this->db->delete('project', array('id' => $id));
        $this->db->delete('pro_expenses', array('pro_id' => $id));
        $this->db->delete('project_file', array('pro_id' => $id));
        $this->db->delete('assign_task', array('project_id' => $id));
    }

  




 

}

   
  
?>