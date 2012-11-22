<?php

class Login_module extends MX_Controller {

    function __construct() {
        parent::__construct();

    }

    function index(){
        //echo 'Hello';
        $this->load->view('login_module_view');
    }

}
