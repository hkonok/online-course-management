<?php

class Authentication extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function login() {

        //$this->load->library('form_validation');
        //$this->form_validation->set_rules('email', 'E-mail', 'required');
       // if ($this->form_validation->run() == FALSE) {
       //     redirect('home/Index');
       // } else {

            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);
            $this->load->model('authentication_model');
            $is_user_valid = $this->authentication_model->check_login_data($email, $password);
            if ($is_user_valid) {
                $_SESSION['username'] = $email;
                $_SESSION['user_id'] = $is_user_valid;
                //echo $_SESSION['username'];
                redirect('mock_test/test/GRE');
            } else {
                redirect('home/Index');
            }
        //}
    }

}
