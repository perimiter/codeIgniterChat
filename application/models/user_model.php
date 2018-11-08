<?php

// a class to handle users in the database
// CREATE TABLE `user` (
//  `id` int(11) NOT NULL,
//  `name` varchar(64) NOT NULL,
//  `email` varchar(64) NOT NULL,
//  `password` varchar(64) NOT NULL
//) ENGINE=InnoDB DEFAULT CHARSET=utf8;

class User_model extends CI_model {

    // this function searches for the given email password user in the DB
    // returns the DB row (an array) or false
    public function login($email, $pass) {
        // validate params
        if (trim($email) == "" || trim($pass) == "") {
            throw new Exception("Email or password empty!");
        }
        // search
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        // we encrypt the password and compare to what's in the DB (encrypted with md5)
        $this->db->where('password', md5($pass));

        $query = $this->db->get();
        //return  data or false
        if ($query) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    //insert new user data to database
    public function register_user($user) {
        $this->db->insert('user', $user);
    }

    //check if email is in DB
    public function email_check($email) {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    //join tables. field that has the same ID join together
    //join name with chat data
    public function tableJoin() {

        $this->db->select('user.name');
        $this->db->select('chat.*');
        $this->db->from('chat');
        $this->db->join('user', 'chat.user_id = user.id');

        $query = $this->db->get();

        return $query->result_array();
    }

    //delete msg from chat
    public function deleteThisMsg($msg_id) {

        $this->db->where('id', $msg_id);
        $this->db->delete('chat');
    }

    //insert new msg
    public function insertMsg($message) {

        $this->db->insert('chat', $message);
    }

}
