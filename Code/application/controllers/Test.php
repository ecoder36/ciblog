

<?php 
//   class Test extends CI_Controller {  
	
// 	public function index() { 
//           echo "Hello World!"; 
//       } 

//       public function home() { 
//          echo "This is default function."; 
//       } 
  
//       public function hello() { 
//          echo "This is hello function."; 
//       } 
//   } 
// 

?>

<?php 
   class Test extends CI_Controller { 
	
      public function index() { 
         $this->load->view('test'); 
      } 
      
       public function hello() { 
           $this->load->helper('url');
       } 
     
      
      
   } 
?>