<?php
	class User_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		
	
			public function get_users($id = FALSE){
			if($id === FALSE){
				$this->db->order_by('user.id', 'DESC');
				
				$query = $this->db->get('username');
				return $query->result_array();
			}
			$query = $this->db->get_where('user', array('id' => $id));
			return $query->row_array();
		}
		
		public function create_user(){
				//	echo $this->input->post('username');die(); //to test to see if we can get the ...
			$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			
			);
			return $this->db->insert('user', $data);
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