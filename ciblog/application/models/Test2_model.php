<?php
	class Test_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		
		
		public function get_users($id = FALSE){
			if($id === FALSE){
				$this->db->order_by('user.id', 'DESC');
			//	$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('user');
				return $query->result_array();
			}
			$query = $this->db->get_where('user', array('id' => $id));
			return $query->row_array();
		}
		
		function isEmailExist($email) {
    $this->db->select('id');
    $this->db->where('email', $email);
    $query = $this->db->get('user');

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
    $query = $this->db->get('user');
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
			return $this->db->insert('user', $data);
		}
		
		public function delete_user($id){
			$this->db->where('id', $id);
			$this->db->delete('user');
			return true;
		}
		

		
        


	}
?>