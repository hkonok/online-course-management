<?php

class question_view_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function question_view($table_name,$start,$limit) {
         $query=$this->db->limit($limit,$start)
                         ->get($table_name);
        if ($query->num_rows() > 0) {
           return $query->result_array();
        }
        return false;
     }
   public function table_row_number($table_name){
       $query=$this->db->get($table_name);
       return $query->num_rows();


   }

}
?>
