<?php

class dlt_question_model extends CI_Model {

   
    public function __construct() {
        parent::__construct();
    }
    public function ques_query($table_name,$id){
        $qury=$this->db->where('id',$id)
                       ->get($table_name);
        //echo  $id.$table_name;
        return $qury->result_array();
    }
    public function dlt_final($table_name,$aladin_id){
        $this->db->where('id',$aladin_id)
                 ->delete($table_name);
        $qury=$this->db->where('question_table',$table_name)
                       ->get('question-categories')
                       ->row_array();
        $this->db->where('category_id',$qury['id'])
                 ->where('question_id',$aladin_id)
                 ->delete('question_under_question-categories');
    }
}

