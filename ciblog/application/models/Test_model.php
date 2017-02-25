<?php
	class Test_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		
			public function get_users($id = FALSE){
				
			if($id === FALSE){
				
				$this->db->order_by('tuser.id', 'DESC');
			//	$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('tuser');
				return $query->result_array();
			}
				
			$query = $this->db->get_where('tuser', array('id' => $id));
			return $query->row_array();
		}
		
		function isEmailExist($email) {
    $this->db->select('id');
    $this->db->where('email', $email);
    $query = $this->db->get('tuser');

    if ($query->num_rows() > 1) {
        return true;
    } else {
        return false;
    }
}


function isUserExist($user )
{
	$id = $this->input->post('id');
	$usernamea = $this->input->post('username');
//	echo $id;die();
	 $idc = $this->db->select('*');
	 
    $username = $this->db->where('username',$user);
    $query = $this->db->get('tuser');
   // echo $query->num_rows();
   foreach ($query->result_array() as $row)
{
        echo $row['id'];
        echo $row['username'];
}

echo $id ;
echo $usernamea ;
   // die();
    if ( $query->num_rows() > 0 AND $id != $row['id']){
        return true;
    }
    else{
        return false;
    }
}
		
			public function create_user(){
				//	echo $this->input->post('username');die(); //to test to see if we can get the ...
			$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
					 //'password'  => md5($this->input->post('password'))
					  'password'  => $this->input->post('password')
                      
			
			);
			return $this->db->insert('tuser', $data);
		}
		
		public function delete_user($id){
			$this->db->where('id', $id);
			$this->db->delete('tuser');
			return true;
		}
		
		public function update_user(){
		//	echo $this->input->post('id');die(); //to test to see if we can get the id
			if (!empty($this->input->post('password'))){
			$data = array(	
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password'  => $this->input->post('password') 
			);
			}else{
			$data = array(	
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email')
				);
			}
			
		
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('tuser', $data);
		}
		
	
		
		
		
		
	
		
   


	}
?>





<?php

// if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// class User extends CI_Model{
//     function __construct() {
//         $this->userTbl = 'users';
//     }
//     /*
//      * get rows from the users table
//      */
//     function getRows($params = array()){
//         $this->db->select('*');
//         $this->db->from($this->userTbl);
        
//         //fetch data by conditions
//         if(array_key_exists("conditions",$params)){
//             foreach ($params['conditions'] as $key => $value) {
//                 $this->db->where($key,$value);
//             }
//         }
        
//         if(array_key_exists("id",$params)){
//             $this->db->where('id',$params['id']);
//             $query = $this->db->get();
//             $result = $query->row_array();
//         }else{
//             //set start and limit
//             if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
//                 $this->db->limit($params['limit'],$params['start']);
//             }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
//                 $this->db->limit($params['limit']);
//             }
//             $query = $this->db->get();
//             if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
//                 $result = $query->num_rows();
//             }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
//                 $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
//             }else{
//                 $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
//             }
//         }

//         //return fetched data
//         return $result;
//     }
    
//     /*
//      * Insert user information
//      */
//     public function insert($data = array()) {
//         //add created and modified data if not included
//         if(!array_key_exists("created", $data)){
//             $data['created'] = date("Y-m-d H:i:s");
//         }
//         if(!array_key_exists("modified", $data)){
//             $data['modified'] = date("Y-m-d H:i:s");
//         }
        
//         //insert user data to users table
//         $insert = $this->db->insert($this->userTbl, $data);
        
//         //return the status
//         if($insert){
//             return $this->db->insert_id();;
//         }else{
//             return false;
//         }
//     }

// }

?>