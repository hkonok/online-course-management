<?php

class User_test_model extends CI_Controller {

    public function save_answered_question($question_id, $question_table, $given_answer, $is_correct, $is_answered) {

        $data = array(
            'question_id' => $question_id,
            'question_table' => $question_table,
            'given_answer' => $given_answer,
            'is_correct' => $is_correct,
            'is_answered' => $is_answered
        );
        
        $this->db->insert('user_taken_exam',$data);
    }

}
