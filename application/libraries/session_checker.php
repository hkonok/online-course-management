<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Session_checker {
    function isAdmin(){
        return $this->check_role(1);
    }
    function isDeliveryManager(){
        return $this->check_role(2);
    }
    function isProductionManager(){
        return $this->check_role(7);
    }
    function isComplainManager(){
        return $this->check_role(3);
    }
    function isHelpManager(){
        return $this->check_role(4);
    }
    function isSalesPerson(){
        return $this->check_role(5);
    }
    function isMD(){
        return $this->check_role(6);
    }
    function getPersonId(){
        return $_SESSION['user'];
    }
    function setUserId($user_id){
        $_SESSION['user'] = $user_id;
    }
    function setRoles($roles_array){
        $_SESSION['roles'] = $roles_array;
    }
    function get_roles(){
        return $_SESSION['roles'];
    }
    private function check_role($role){
        if(!$this->isLoggedIn())return FALSE;
        $roles_array = $_SESSION['roles'];
        if(in_array($role, $roles_array))return true;
        else return false;
    }
    function isLoggedIn(){
        if(isset($_SESSION['user']))return true;
        else return false;
    }
    function logout(){
        unset($_SESSION['user']);
        unset($_SESSION['roles']);
    }
}