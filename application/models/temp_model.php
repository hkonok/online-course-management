<?php

class Temp_model extends CI_Model {

    public function insert_temp_question($question) {

        $question_exists = $this->check_question_existance($question);
        if ($question_exists)
            return;

        $data = array(
            'question_id' => $question['question_id'],
            'user_id' => $_SESSION['user_id'],
            'question' => $question['question'],
        );

        if (isset($question['options']))
            $data['options'] = $question['options'];
        if (isset($question['blank_three_options']))
            $data['blank_three_options'] = $question['blank_three_options'];
        if (isset($question['blank_two_options']))
            $data['blank_two_options'] = $question['blank_two_options'];
        if (isset($question['blank_one_options']))
            $data['blank_one_options'] = $question['blank_one_options'];
        if (isset($question['blank_three_correct_answer']))
            $data['blank_three_correct_answer'] = $question['blank_three_correct_answer'];
        if (isset($question['blank_two_correct_answer']))
            $data['blank_two_correct_answer'] = $question['blank_two_correct_answer'];
        if (isset($question['blank_one_correct_answer']))
            $data['blank_one_correct_answer'] = $question['blank_one_correct_answer'];
        if (isset($question['correct_answers']))
            $data['correct_answers'] = $question['correct_answers'];
        if (isset($question['correct_answer']))
            $data['correct_answer'] = $question['correct_answer'];
        if (isset($question['question_set_for_practice']))
            $data['question_set_for_practice'] = $question['question_set_for_practice'];
        if (isset($question['question_set_for_mock']))
            $data['question_set_for_mock'] = $question['question_set_for_mock'];

        $data['question_category'] = $question['question_category'];
        $data['question_type'] = $question['question_type'];
        $data['question_segment'] = $question['question_segment'];

        $this->db->insert('temp_question_table', $data);
    }

    public function check_question_existance($question) {

        $question_data = $this->db
                ->where('question_id', $question['question_id'])
                ->where('question_category', $question['question_category'])
                ->where('user_id', $_SESSION['user_id'])
                ->get('temp_question_table');

        if ($question_data->num_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function delete_question_data($question_id, $question_table) {

        return $this->db
                        ->where('question_id', $question_id)
                        ->where('question_category', $question_table)
                        ->where('user_id', $_SESSION['user_id'])
                        ->delete('temp_question_table');
    }

    public function get_next_question() {

        return $this->db
                        ->where('user_id', $_SESSION['user_id'])
                        ->get('temp_question_table')
                        ->row_array();
    }

    public function save_answered_question($question_id, $problem_set_for_mock, $question_table, $given_answer, $is_correct, $is_answered) {

        $data = array(
            'question_id' => $question_id,
            'user_id' => $_SESSION['user_id'],
            'question_set' => $problem_set_for_mock,
            'question_table' => $question_table,
            'given_answer' => $given_answer,
            'is_correct' => $is_correct,
            'is_answered' => $is_answered
        );

        $this->db->insert('user_taken_exam', $data);
    }

    public function delete_all_temp_questions() {

        return $this->db->empty_table('temp_question_table');
    }

}
