<?php

class edit_question_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_question($description, $options, $correct_answer,$question_table,$q_id) {
        //echo "in my model";
        $data = array();
        switch ($question_table) {

            case 'select-one_choice_questions':
                
                $data['question'] = $description;
                $data['options'] = $options;
                $data['correct_answer'] = $correct_answer;
                break;

            case 'select-many_choice_questions':

         
                $data['question'] = $description;
                $data['options'] = $options;
                $data['correct_answer'] = $correct_answer;
                break;

            case 'three-blank_completion_questions':

          
                $data['question'] = $description;
                $data['blank_one_options'] = $options['blank_one'];
                $data['blank_two_options'] = $options['blank_two'];
                $data['blank_three_options'] = $options['blank_three'];
                $data['blank_one_correct_answer'] = $correct_answer[1];
                $data['blank_two_correct_answer'] = $correct_answer[2];
                $data['blank_three_correct_answer'] = $correct_answer[3];
                break;

            case 'two-blank_completion_questions':

         
                $data['question'] = $description;
                $data['blank_one_options'] = $options['blank_one'];
                $data['blank_two_options'] = $options['blank_two'];
                $data['blank_one_correct_answer'] = $correct_answer[1];
                $data['blank_two_correct_answer'] = $correct_answer[2];
                break;

            case 'one-blank_completion_questions':

          
                $data['question'] = $description;
                $data['blank_one_options'] = $options['blank_one'];
                $data['blank_one_correct_answer'] = $correct_answer;
                break;

           case 'quantitative_select-one_choice_questions':

            
                $data['question'] = $description;
                $data['options'] = $options;
                $data['correct_answer'] = $correct_answer;
                break;
           case 'quantitative_select-many_choice_questions':

              
                $data['question'] = $description;
                $data['options'] = $options;
                $data['correct_answer'] = $correct_answer;
                break;
        }

        return $this->db->where('id',$q_id)
                        ->update($question_table,$data);
    }
    public function insert_question_modified($quantity_a,$quantity_b, $options, $correct_answer,$question_table,$q_id) {

        $data = array();

            
                $data['quantity_a'] = $quantity_a;
                $data['quantity_b'] = $quantity_a;
                $data['options'] = $options;
                $data['correct_answer'] = $correct_answer;


        return $this->db->where('id',$q_id)
                        ->update($question_table,$data);
     }
     public function insert_numeric_question($description,$correct_answer,$question_table,$q_id){
                $data['id'] = NULL;
                $data['question'] = $description;
                $data['answer'] = $correct_answer;
                
       $this->db->where('id',$q_id)
                ->update($question_table,$data);
     }

     public function insert_fraction_question($description,$numerator,$denominator,$question_table,$q_id){
                $data['id'] = NULL;
                $data['question'] = $description;
                $data['numerator'] = $numerator;
                $data['denominator'] = $denominator;
               
                $this->db->where('id',$q_id)
                         ->update($question_table,$data);
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
?>
