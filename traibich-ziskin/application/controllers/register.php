<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function index() {
        $data = array("error" => ""); 
        
        if ($this->session->userdata('error')) {
            $data['error'] = $this->session->userdata('error');
        }

        $this->load->view("register_view", $data);
    }
    //register user to database
    function register_user() {
        //data to be inserted to DB
        $user = array(
            'name' => $this->input->post('user_name'),
            'email' => $this->input->post('user_email'),
            'password' => md5($this->input->post('user_password'))
        );
        //i am not using $user['password'] because in md5 empty field has a value
        //validation if fields are empty
        if (strlen($user['name']) > 0 and strlen($user['email']) > 0 and strlen($this->input->post('user_password')) > 0) {
            //check if email is in DB
            $email_check = $this->user_model->email_check($user['email']);
            //register user
            if ($email_check) {
                $this->user_model->register_user($user);
                
                $user['success_msg'] = $user['name'] . ' Registered successfully.Now login to your account.';
                
                $this->load->view("login_view.php",$user);              
            } else {//email is alrady in the DB

                $user['error_msg'] = 'this email is already in use';
                
                $this->load->view("register_view.php",$user);
            }
        } else {//valdation failed one of the fields is empty
            $user['empty_error_msg'] = 'fields cant be empty';
            
             $this->load->view("register_view", $user);
        }
    }

}
