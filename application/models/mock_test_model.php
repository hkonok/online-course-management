<?php

class Mock_test_model extends CI_Model {

    public function get_course_id($course_name) {

        $course = $this->db->select('id')
                ->where('name', $course_name)
                ->get('courses')
                ->row_array();

        return $course;
    }

    public function get_segements($course_name) {

        $course = $this->get_course_id($course_name);

        $segments = $this->db->select('id')
                ->where('course_id', $course['id'])
                ->get('segments')
                ->result_array();

        return $segments;
    }

    public function get_question_types($course_name) {

        $segments = $this->get_segements($course_name);

        $i = 0;
        $j = 0;

        foreach ($segments as $segment) {
            $question_types[$i++] = $this->db->select('id')
                    ->where('segment_id', $segment['id'])
                    ->get('question-types')
                    ->result_array();
            //array_push($question_types,$temp[$i++]);
        }

        return $question_types;
    }

    public function get_categories_for_mock_test($course_name) {

        $question_types = $this->get_question_types($course_name);

        $i = 0;
        $j = 0;

        for ($i = 0; $i < count($question_types); $i++) {
            foreach ($question_types[$i] as $question_type) {
                $categories[$j++] = $this->db
                        ->where('question_type_id', $question_type['id'])
                        ->get('question-categories')
                        ->result_array();
                //array_push($question_types,$temp[$i++]);
            }
        }

        return $categories;
    }

    public function get_question_tables($categories) {
        $i = 0;
        $j = 0;

        for ($i = 0; $i < count($categories); $i++) {
            foreach ($categories[$i] as $category) {
                $questions[$j++] = $this->db->distinct()
                        ->select('question_set_for_mock')
                        ->where('for_mock', 'Yes')
                        ->get($category['question_table'])
                        ->result_array();
                //array_push($question_types,$temp[$i++]);
            }
        }

        return $questions;
    }

    public function get_problem_set_for_mock_test($course_name) {

        $categories = $this->get_categories_for_mock_test($course_name);
        $questions = $this->get_question_tables($categories);

        $i = 0;
        $j = 0;
        $k = 0;

        $question_sets = array();
        for ($i = 0; $i < count($questions); $i++) {
            for ($j = 0; $j < count($questions[$i]); $j++) {
                array_push($question_sets, $questions[$i][$j]);
            }
        }

        $i = 0;
        foreach ($question_sets as $question_set) {
            $sets[$i++] = $question_set['question_set_for_mock'];
        }
        return array_unique($sets);
    }

    public function get_questions_for_mock_test($course_name, $problem_set) {



        $categories = $this->get_categories_for_mock_test($course_name);

        $i = 0;
        $j = 0;
        $k = 0;

        $question_tables = array();
        for ($i = 0; $i < count($categories); $i++) {
            for ($j = 0; $j < count($categories[$i]); $j++) {
                array_push($question_tables, $categories[$i][$j]);
            }
        }

        $i = 0;
        $j = 0;

        foreach ($question_tables as $question_table) {

            $questions[$i] = $this->db
                    ->where('for_mock', 'Yes')
                    ->where('question_set_for_mock', $problem_set)
                    ->order_by('sequence_in_mock')
                    ->get($question_table['question_table'])
                    ->result_array();
            //$t[$i++]=$question_table['question_table'];

            $questions[$i]['question_category'] = $question_table['question_table'];

            $question_type_id = $this->db->select('question_type_id')
                    ->where('question_table', $question_table['question_table'])
                    ->get('question-categories')
                    ->row_array();

            $question_type = $this->db
                    ->where('id', $question_type_id['question_type_id'])
                    ->get('question-types')
                    ->row_array();

            $questions[$i]['question_type'] = $question_type['name'];

            $segment = $this->db->select('name', 'course_id')
                    ->where('id', $question_type['segment_id'])
                    ->get('segments')
                    ->row_array();

            $questions[$i++]['question_segments'] = $segment['name'];
        }

        return $questions;
    }

}