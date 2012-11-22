<?php

class question_category_model extends CI_Model {

    var $id;
    var $category_id;
    var $question_id;

    public function __construct() {
        parent::__construct();
    }

    public function get_question_categories($type) {
        $data=$this->db->select('id')
                       ->where('name',$type)
                       ->where('course_id',1)
                       ->get('segments')
                       ->row_array();
        $data_min=$this->db->select_min('id')
                       ->where('segment_id',$data['id'])
                       ->get('question-types')
                       ->row_array();
        $data_max=$this->db->select_max('id')
                       ->where('segment_id',$data['id'])
                       ->get('question-types')
                       ->row_array();
        return $this->db->where('question_type_id >=',$data_min['id'])
                        ->where('question_type_id <=',$data_max['id'])
                        ->get('question-categories')->result_array();
    }

    public function get_question_table($category) {

        $data = $this->db->select('question_table')
                        ->where('id', $category)
                        ->get('question-categories')
                        ->row_array();
        return $data['question_table'];
    }

    public function insert_question_category($question_id, $question_category_id) {

        $this->id=NULL;
        $this->category_id=$question_category_id;
        $this->question_id=$question_id;

        if (!$id = $this->db->insert('question_under_question-categories', $this)) {
            return false;
        }
        return $this->db->insert_id();
    }

}
?>
