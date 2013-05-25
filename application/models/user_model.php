<?php
    class User_model extends CI_Model{
        public function User_model(){
            parent::__construct();
        }
        
//        function insertUser($data){
//            $this->db->insert('user', $data);
//            $id = $this->db->insert_id();
//            return $id;
//        }
        
        function cekLogin($name, $pass){
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('EMAIL', $name);
            $this->db->where('USER_PASSWORD', $pass);
            $query = $this->db->get();
            return $query;
        }
        
        function getUsername($id){
            $this->db->select('user_name, email');
            $this->db->from('user');
            $this->db->where('user_id', $id);
            $query = $thhis->db->get();
            foreach ($query->result() as $row) {
                $data['username'] = $row->USER_NAME;
                $data['email'] = $row->EMAIL;
            }
            return $data;
        }
    }
?>
