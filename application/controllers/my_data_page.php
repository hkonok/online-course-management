<?php
class My_data_page extends Controller{
    function My_data_page(){
       parent::Controller();
       session_start();
       $this->load->library('table');
       $this->load->helper('html');
       $this->load->library('Ajax_pagination');
    }
    function index(){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $data['makeColums'] = $this->makeColums();
            $data['getTotalData'] = $this->getTotaData();
            $data['perPage'] = $this->perPage();
            $this->load->view('my_data_page', $data);
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }
    //Pull 'name' field records from table 'contact'
    function getData(){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $page = $this->input->post('page'); //Look at $config['postVar']
            if(!$page):
            $offset = 0;
            else:
            $offset = $page;
            endif;

            $sql = "SELECT name FROM contact LIMIT ".$offset.", ".$this->perPage();
            $q = $this->db->query($sql);
            return $q->result();
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }
    function getTotalData(){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
          $sql = "SELECT * FROM people";
          $q = $this->db->query($sql);
          return $q->num_rows();
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }

    function perPage(){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
         return 10; //define total records per page
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
      }

    //Generate table from array
    function makeColumns(){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
             $peoples = $this->getData();
             foreach($peoples as $pep):
             $data[] = $pep->name;
             endforeach;
             return  $this->table->make_columns($data, 6);
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }
}
?>