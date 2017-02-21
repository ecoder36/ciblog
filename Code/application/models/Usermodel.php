<?php

    class Usermodel extends CI_Model{
        public function getUsers(){
            
           // $this->load->database();
            
            //$q = $this->db->query("SELECT * FROM user_accounts");
            $q = $this->db->select('firstname,lastname')
                            ->where('id',1)
                            ->or_where('id', 2) 
                            ->get("user_accounts")
                            ;
            
            //return $q->result_array();   
            return $q->result();
            
        }
    }