<?php

class question_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_question($description, $options, $correct_answer, $question_table) {

        $data = array();
        switch ($question_table) {

            case 'select-one_choice_questions':

                $data['id'] = NULL;
                $data['question'] = $description;
                $data['options'] = $options;
                $data['correct_answer'] = $correct_answer;

                break;

            case 'select-many_choice_questions':

                $data['id'] = NULL;
                $data['question'] = $description;
                $data['options'] = $options;
                $data['correct_answer'] = $correct_answer;
                $data['question_set_for_practice'] = $question_set_for_practice;
                $data['question_set_for_mock'] = $question_set_for_mock;
                if (is_array($question_set_for)) {
                    $data['for_practice'] = 'Yes';
                    $data['for_mock'] = 'Yes';
                } else if ($question_set_for == "Practice")
                    $data['for_practice'] = 'Yes';
                else if ($question_set_for == "Mock")
                    $data['for_mock'] = 'Yes';

                break;

            case 'select-in_passage_questions':

                $data['id'] = NULL;
                $data['question'] = $description;
                $data['options'] = $options;
                $data['correct_answer'] = $correct_answer;
                break;


            case 'three-blank_completion_questions':

                $data['id'] = NULL;
                $data['question'] = $description;
                $data['blank_one_options'] = $options['blank_one'];
                $data['blank_two_options'] = $options['blank_two'];
                $data['blank_three_options'] = $options['blank_three'];
                $data['blank_one_correct_answer'] = $correct_answer[1];
                $data['blank_two_correct_answer'] = $correct_answer[2];
                $data['blank_three_correct_answer'] = $correct_answer[3];
                break;

            case 'two-blank_completion_questions':

                $data['id'] = NULL;
                $data['question'] = $description;
                $data['blank_one_options'] = $options['blank_one'];
                $data['blank_two_options'] = $options['blank_two'];
                $data['blank_one_correct_answer'] = $correct_answer[1];
                $data['blank_two_correct_answer'] = $correct_answer[2];
                break;

            case 'one-blank_completion_questions':

                $data['id'] = NULL;
                $data['question'] = $description;
                $data['blank_one_options'] = $options['blank_one'];
                $data['blank_one_correct_answer'] = $correct_answer;
                break;
            
            case 'one-blank_sentence_completion_questions':

                $data['id'] = NULL;
                $data['question'] = $description;
                $data['options'] = $options;
                $data['first_correct_answer'] = $correct_answer[0];
                $data['second_correct_answer'] = $correct_answer[1];
                break;

            case 'quantitative_select-one_choice_questions':

                $data['id'] = NULL;
                $data['question'] = $description;
                $data['options'] = $options;
                $data['correct_answer'] = $correct_answer;
                $data['question_set_for_practice'] = $question_set_for_practice;
                $data['question_set_for_mock'] = $question_set_for_mock;
                if (is_array($question_set_for)) {
                    $data['for_practice'] = 'Yes';
                    $data['for_mock'] = 'Yes';
                } else if ($question_set_for == "Practice")
                    $data['for_practice'] = 'Yes';
                else if ($question_set_for == "Mock")
                    $data['for_mock'] = 'Yes';

                break;
            case 'quantitative_select-many_choice_questions':

                $data['id'] = NULL;
                $data['question'] = $description;
                $data['options'] = $options;
                $data['correct_answer'] = $correct_answer;
                $data['question_set_for_practice'] = $question_set_for_practice;
                $data['question_set_for_mock'] = $question_set_for_mock;
                if (is_array($question_set_for)) {
                    $data['for_practice'] = 'Yes';
                    $data['for_mock'] = 'Yes';
                } else if ($question_set_for == "Practice")
                    $data['for_practice'] = 'Yes';
                else if ($question_set_for == "Mock")
                    $data['for_mock'] = 'Yes';

                break;
        }

        if (!$id = $this->db->insert($question_table, $data)) {
            return false;
        }
        return $this->db->insert_id();
    }

    public function insert_question_modified($quantity_a, $quantity_b, $options, $correct_answer, $question_table) {

        $data = array();

        $data['id'] = NULL;
        $data['quantity_a'] = $quantity_a;
        $data['quantity_b'] = $quantity_a;
        $data['options'] = $options;
        $data['correct_answer'] = $correct_answer;
        $data['question_set_for_practice'] = $question_set_for_practice;
        $data['question_set_for_mock'] = $question_set_for_mock;
        if (is_array($question_set_for)) {
            $data['for_practice'] = 'Yes';
            $data['for_mock'] = 'Yes';
        } else if ($question_set_for == "Practice")
            $data['for_practice'] = 'Yes';
        else if ($question_set_for == "Mock")
            $data['for_mock'] = 'Yes';


        if (!$id = $this->db->insert($question_table, $data)) {
            return false;
        }
        return $this->db->insert_id();

        //echo $question_table;
    }

    public function insert_numeric_question($description, $correct_answer, $question_set_for_practice, $question_set_for_mock, $question_set_for, $question_table) {
        $data['id'] = NULL;
        $data['question'] = $description;
        $data['answer'] = $correct_answer;
        $data['question_set_for_practice'] = $question_set_for_practice;
        $data['question_set_for_mock'] = $question_set_for_mock;
        if (is_array($question_set_for)) {
            $data['for_practice'] = 'Yes';
            $data['for_mock'] = 'Yes';
        } else if ($question_set_for == "Practice")
            $data['for_practice'] = 'Yes';
        else if ($question_set_for == "Mock")
            $data['for_mock'] = 'Yes';


        if (!$id = $this->db->insert($question_table, $data)) {
            return false;
        }
        return $this->db->insert_id();

        echo $question_table;
    }

    public function insert_fraction_question($description, $numerator, $denominator, $question_set_for_practice, $question_set_for_mock, $question_set_for, $question_table) {
        $data['id'] = NULL;
        $data['question'] = $description;
        $data['numerator'] = $numerator;
        $data['denominator'] = $denominator;
        $data['question_set_for_practice'] = $question_set_for_practice;
        $data['question_set_for_mock'] = $question_set_for_mock;
        if (is_array($question_set_for)) {
            $data['for_practice'] = 'Yes';
            $data['for_mock'] = 'Yes';
        } else if ($question_set_for == "Practice")
            $data['for_practice'] = 'Yes';
        else if ($question_set_for == "Mock")
            $data['for_mock'] = 'Yes';


        if (!$id = $this->db->insert($question_table, $data)) {
            return false;
        }
        return $this->db->insert_id();

        echo $question_table;
    }

}

?>
