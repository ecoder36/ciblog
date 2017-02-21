

<?php
	class User extends CI_Controller{
		public function index(){
			
 			$data['title'] = 'Users List';
 			$data['users'] = $this->post_model->get_users();
 		//	print_r($data['posts']);
			$this->load->view('templates/header');
			$this->load->view('user/index', $data);
			$this->load->view('templates/footer');
		}
		
	
		
		public function create(){
			$data['title'] = 'Create User';
			
			
		//	$data['user'] = $this->user_model->get_users(); //1111
			
			
			
		//	$data['categories'] = $this->post_model->get_categories();
		
			// $this->form_validation->set_rules('title', 'Title', 'is_unique[posts.title]') AND 
			// $this->form_validation->set_rules('body', 'Body', 'is_unique[posts.body]');
			
// 			$where = "title='Title' OR body='Body' ";
// $this->form_validation->db->where($where);
//callback
				
		$username=	$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[user.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$email =	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]' ,array('valid_email' => 'email problem.'));
//		$password =	$this->form_validation->set_rules('password', 'Password', 'required');
 		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
 		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
//		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('user/create', $data);
				$this->load->view('templates/footer');
 			} else {

 				$this->post_model->create_user();
 			//	$this->user_model->create_user($username, $email, $password);
 				$data['msg'] = 'Created';
 				$this->load->view('templates/header');
				$this->load->view('user/create', $data);
				$this->load->view('templates/footer');
 			//	redirect('user/create');
 			}
		}
		
			public function delete($id){
	//	    echo $id;
			$this->post_model->delete_user($id);
			redirect('user/index');
		}
		
			public function edit($id){
			$data['users'] = $this->post_model->get_users($id);
			$data['title'] = 'Edit user';
			//$data['categories'] = $this->post_model->get_categories();
			if(empty($data['users'])){
				show_404();
			}
			
	
			
			$data['title'] = 'Edit user';
			$this->load->view('templates/header');
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
	//	}
			}
			
public function isEmailExist($email) {
    $this->load->library('form_validation');
    $this->load->model('post_model');
    $is_exist = $this->post_model->isEmailExist($email);

    if ($is_exist) {
        $this->form_validation->set_message(
            'isEmailExist', 'Email address is already exist.'
        );    
        return false;
    } else {
        return true;
    }
}		
public function isUserExist($username) {
    $this->load->library('form_validation');
    $this->load->model('post_model');
    $is_exist = $this->post_model->isUserExist($username);

    if ($is_exist) {
        $this->form_validation->set_message(
            'isUserExist', 'Username is already exist.'
        );    
        return false;
    } else {
        return true;
    }
}


		public function update($id){
		//	echo 'SUBMITED';
	
			
				$data['title'] = 'Users List';
				//	$data['users'] = $this->post_model->get_users();
		$data['users'] = $this->post_model->get_users($id);
	
	//	$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[user.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|callback_isUserExist');
	//	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]' ,array('valid_email' => 'email problem.'));
		$this->form_validation->set_rules(
    'email', 'Email', 'trim|required|valid_email|callback_isEmailExist'
);

 	 	$this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]');
 	// 	$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
 	
 	
//		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');





			 if($this->form_validation->run() === FALSE ){
			 	
			 		
			 		$data['msg'] = 'error';
			 	$this->load->view('templates/header');
			 	$this->load->view('user/edit', $data);
			 	$this->load->view('templates/footer');
			 	
			 	
 		 	} else {
 		 		
 		 		$this->post_model->update_user($id);
 		 	$t = $this->input->post('username');
			$data['msg'] = "Updated $t";
			$data['users'] = $this->post_model->get_users();
			//	redirect('user/index/abc', $data);
			$this->load->view('templates/header');
			$this->load->view('user/index', $data);
			$this->load->view('templates/footer');	
	
			}
			
			//redirect('user/index', $data);
 			
		}
		
	}
?>





<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
// /**
//  * User class.
//  * 
//  * @extends CI_Controller
//  */
// class User extends CI_Controller {
// 	/**
// 	 * __construct function.
// 	 * 
// 	 * @access public
// 	 * @return void
// 	 */
// 	public function __construct() {
		
// 		parent::__construct();
// 		$this->load->library(array('session'));
// 		$this->load->helper(array('url'));
// 		$this->load->model('user_model');
		
// 	}
	
	
// 	public function index() {
		
		
// 	}
	
// 	/**
// 	 * register function.
// 	 * 
// 	 * @access public
// 	 * @return void
// 	 */
// 	public function register() {
		
// 		// create the data object
// 		$data = new stdClass();
		
// 		// load form helper and validation library
// 		$this->load->helper('form');
// 		$this->load->library('form_validation');
		
// 		// set validation rules
// 		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
// 		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
// 		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
// 		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
// 		if ($this->form_validation->run() === false) {
			
// 			// validation not ok, send validation errors to the view
// 			$this->load->view('header');
// 			$this->load->view('user/register/register', $data);
// 			$this->load->view('footer');
			
// 		} else {
			
// 			// set variables from the form
// 			$username = $this->input->post('username');
// 			$email    = $this->input->post('email');
// 			$password = $this->input->post('password');
			
// 			if ($this->user_model->create_user($username, $email, $password)) {
				
// 				// user creation ok
// 				$this->load->view('header');
// 				$this->load->view('user/register/register_success', $data);
// 				$this->load->view('footer');
				
// 			} else {
				
// 				// user creation failed, this should never happen
// 				$data->error = 'There was a problem creating your new account. Please try again.';
				
// 				// send error to the view
// 				$this->load->view('header');
// 				$this->load->view('user/register/register', $data);
// 				$this->load->view('footer');
				
// 			}
			
// 		}
		
// 	}
		
// 	/**
// 	 * login function.
// 	 * 
// 	 * @access public
// 	 * @return void
// 	 */
// 	public function login() {
		
// 		// create the data object
// 		$data = new stdClass();
		
// 		// load form helper and validation library
// 		$this->load->helper('form');
// 		$this->load->library('form_validation');
		
// 		// set validation rules
// 		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
// 		$this->form_validation->set_rules('password', 'Password', 'required');
		
// 		if ($this->form_validation->run() == false) {
			
// 			// validation not ok, send validation errors to the view
// 			$this->load->view('header');
// 			$this->load->view('user/login/login');
// 			$this->load->view('footer');
			
// 		} else {
			
// 			// set variables from the form
// 			$username = $this->input->post('username');
// 			$password = $this->input->post('password');
			
// 			if ($this->user_model->resolve_user_login($username, $password)) {
				
// 				$user_id = $this->user_model->get_user_id_from_username($username);
// 				$user    = $this->user_model->get_user($user_id);
				
// 				// set session user datas
// 				$_SESSION['user_id']      = (int)$user->id;
// 				$_SESSION['username']     = (string)$user->username;
// 				$_SESSION['logged_in']    = (bool)true;
// 				$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
// 				$_SESSION['is_admin']     = (bool)$user->is_admin;
				
// 				// user login ok
// 				$this->load->view('header');
// 				$this->load->view('user/login/login_success', $data);
// 				$this->load->view('footer');
				
// 			} else {
				
// 				// login failed
// 				$data->error = 'Wrong username or password.';
				
// 				// send error to the view
// 				$this->load->view('header');
// 				$this->load->view('user/login/login', $data);
// 				$this->load->view('footer');
				
// 			}
			
// 		}
		
// 	}
	
// 	/**
// 	 * logout function.
// 	 * 
// 	 * @access public
// 	 * @return void
// 	 */
// 	public function logout() {
		
// 		// create the data object
// 		$data = new stdClass();
		
// 		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
// 			// remove session datas
// 			foreach ($_SESSION as $key => $value) {
// 				unset($_SESSION[$key]);
// 			}
			
// 			// user logout ok
// 			$this->load->view('header');
// 			$this->load->view('user/logout/logout_success', $data);
// 			$this->load->view('footer');
			
// 		} else {
			
// 			// there user was not logged in, we cannot logged him out,
// 			// redirect him to site root
// 			redirect('/');
			
// 		}
		
// 	}
	
// }