<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
    }

    // display the login form
    public function index() {
        $data = array("error" => "");

        if ($this->session->userdata('error')) {
            $data['error_msg'] = $this->session->userdata('error');
        }
        //this is in case we are alrady loged in
        if (!empty($this->session->userdata('user_id'))) {
            redirect('login/home');
        }

        $this->load->view("login_view", $data);
    }

    // this is the restricted access home page of the user
    public function home() {
        
        if ($this->session->userdata('user_id')) {
            // user already logged in, let's get information from the session
            // and go to the chat page

            $this->getAllMsgs();
        } else {
            // otherwise bring the login page
            redirect('login', 'refresh');
        }
    }

    // action of the login form
    // it redirects either to the login form or to the chat home page
    public function checklogin() {

        $this->session->set_flashdata('email', $this->input->post('email'));
        try {
            // search the user in the DB - use form params (email,pwd)
            $data = $this->user_model->login($this->input->post('email'), $this->input->post('pwd'));
            if ($data) {       
                // successful login, store user data in session and go to chat
                $this->session->set_userdata('user_id', $data['id']);
                $this->session->set_userdata('user_email', $data['email']);
                $this->session->set_userdata('user_name', $data['name']);
                redirect('login/home');
            } else {
                // failed login, display login form again and put an error message
                $this->session->set_flashdata('error', 'Wrong credentials, try again.');
                redirect('login', false);
            }
        } catch (Exception $exc) {  // model validation failed
            $this->session->set_flashdata('error', 'Please enter an email and password');
            redirect('login', 'refresh');
        }
    }
    //add a new msg to chat 
    public function addMsg() {
        //get msg and id 
        $arrData["message"] = $this->input->post("msg");
        $arrData["user_id"] = $this->session->userdata('user_id');
        //add msg to chat database 
        $this->user_model->insertMsg($arrData);

        redirect('login/home', false);
    }
    //display the chat
    public function getAllMsgs() {
        //get names of each chat message
        $data['messages'] = $this->user_model->tableJoin();
        //display in ascending order
        $data['messages'] = array_reverse($data['messages']);

        $data['name'] = $this->session->userdata('user_name');
        $data['email'] = $this->session->userdata('user_email');
        $data['session_id'] = $this->session->userdata('user_id');

        $this->load->view('chat_view', $data);
    }
    //delete msg from chat
    public function deleteMsg($msg_id) {
        //get proper msg id 
        $msg_id_decoded = urldecode($msg_id);
        //delete msg from server who has that spesific ID
        $this->user_model->deleteThisMsg($msg_id_decoded);

        redirect('login/home', FALSE);
    }

    // logout button action
    public function logout() {
        $this->session->sess_destroy();
        redirect('login', FALSE);
    }

}
