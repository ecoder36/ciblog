<?php
	class Post_model extends CI_Model{
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

function isUserExist($user)
{
    $this->db->where('username',$user);
    $query = $this->db->get('user');
    if ($query->num_rows() >= 1){
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
			return $this->db->update('user', $data);
		}
		
		
		public function get_posts($slug = FALSE){
			if($slug === FALSE){
				$this->db->order_by('posts.id', 'DESC');
				$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('posts');
				return $query->result_array();
			}
			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}
		
		
		
		public function create_post($post_image){
			$slug = url_title($this->input->post('title'));
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'category_id' => $this->input->post('category_id'),
				'post_image' => $post_image
			);
			return $this->db->insert('posts', $data);
		}
		
        public function delete_post($id){
			$this->db->where('id', $id);
			$this->db->delete('posts');
			return true;
		}

		public function update_post(){
		//	echo $this->input->post('id');die(); //to test to see if we can get the id
			$slug = url_title($this->input->post('title'));
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'category_id' => $this->input->post('category_id')
			);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data);
		}
		
		public function get_categories(){
			$this->db->order_by('name');
			$query = $this->db->get('categories');
			return $query->result_array();
		}


	}
?>