<?php

class Authentication_model extends CI_Model {

    public function check_login_data($email, $password) {

        $user_info = $this->db
                ->where('email', $email)
                ->where('password', $password)
                ->get('user_basic_info')
                ->row_array();
        if (!empty($user_info))
            return $user_info;
        else
            return FALSE;
    }

}
