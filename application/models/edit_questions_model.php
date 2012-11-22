<?php

class edit_questions_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    public function ques_category($table_name,$q_id){
        
        $qury=$this->db->where('question_table',$table_name)
                 ->get('question-categories');
        return $qury->row_array();
    }
    public function ques_query($table_name,$q_id){
        
        $qury=$this->db->where('id',$q_id)
                       ->get($table_name);
        return $qury->row_array(); 
    }
    
}

