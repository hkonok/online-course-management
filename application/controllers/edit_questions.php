<?php

class edit_questions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    function index(){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $header_data['page_title'] = 'GRE | Create Question';
            $this->load->view('includes/header', $header_data);
            $this->load->view('top_navigations/top_navigation_for_admin');
            $this->load->view('side_navigations/admin/side_navigation_for_question');


            $this->load->library('form_validation');
            $this->form_validation->set_rules('question_category', 'Question Category', 'required');
            if ($this->form_validation->run() == FALSE && !isset($_POST['description'])) {
                $t_name=$this->input->post('t_name');
                $q_id=$this->input->post('q_id');
                $this->load->model('edit_question_model');
                $tmp=$this->edit_question_model->ques_category($t_name,$q_id);
                //var_dump($tmp);
                //var_dump($tmp2);
                $my_data['t_name']=$this->input->post('t_name');
                $my_data['q_id']=$this->input->post('q_id');
                $my_data['type_id']=$tmp['id'];
                $my_data['option_name']=$tmp['name'];

                $tmp2=$this->edit_question_model->ques_query($t_name,$q_id);
                $tmp2['type_id']=$my_data['type_id'];
                $my_data['my_qus']=$tmp2;
                $this->load->view('admin_views/update_question_creation_view', $my_data);
            }
            else {
                $q_id=$this->input->post('q_id');
                $description = $this->input->post('description', TRUE);



                switch (intval($this->input->post('question_category'))) {

                    case 1:
                        $options = implode('|', $_POST['question_options_select_one']);
                        $correct_answer = $this->input->post('right_answer', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));


                        $this->insert_question_data($description, $options,$correct_answer,$question_table,$q_id);


                        break;

                    case 2:
                        $options = implode('|', $_POST['question_options_select_two']);
                        $correct_answer = $this->input->post('right_answer', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));

                        $this->insert_question_data($description, $options, $correct_answer,$question_table,$q_id);
                       break;

                    case 4:
                        //echo $_POST['right_answer'];
                        //print_r($_POST['question_options_three_blank_one']);
                        $options['blank_one'] = implode('|', $_POST['question_options_three_blank_one']);
                        $options['blank_two'] = implode('|', $_POST['question_options_three_blank_two']);
                        $options['blank_three'] = implode('|', $_POST['question_options_three_blank_three']);
                        $correct_answers = explode('|', $this->input->post('right_answer', TRUE));
                        $correct_answer = array();
                        for ($i = 0; $i < count($correct_answers) - 1; $i++) {
                            $new_correct_answer_value = substr($correct_answers[$i], 0, strlen($correct_answers[$i]) - 1);
                            $new_key = intval($correct_answers[$i][strlen($correct_answers[$i]) - 1]);
                            $correct_answer[$new_key] = $new_correct_answer_value;
                        }
                        //unset($correct_answers);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));
                        $this->insert_question_data($description, $options, $correct_answer,$question_table,$q_id);

                        break;

                    case 5:
                        //echo $_POST['right_answer'];
                        //print_r($_POST['question_options_three_blank_one']);
                        $options['blank_one'] = implode('|', $_POST['question_options_two_blank_one']);
                        $options['blank_two'] = implode('|', $_POST['question_options_two_blank_two']);
                        $correct_answers = explode('|', $this->input->post('right_answer', TRUE));
                        $correct_answer = array();
                        for ($i = 0; $i < count($correct_answers) - 1; $i++) {
                            $new_correct_answer_value = substr($correct_answers[$i], 0, strlen($correct_answers[$i]) - 1);
                            $new_key = intval($correct_answers[$i][strlen($correct_answers[$i]) - 1]);
                            $correct_answer[$new_key] = $new_correct_answer_value;
                        }
                        //unset($correct_answers);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));
                        $this->insert_question_data($description, $options, $correct_answer,$question_table,$q_id);

                        break;

                    case 6:

                        $options['blank_one'] = implode('|', $_POST['question_options_one_blank_one']);
                        $correct_answer = $this->input->post('right_answer', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));

                        $this->insert_question_data($description, $options, $correct_answer,$question_table,$q_id);

                        break;

                    case 8:
                        $quantity_a = $this->input->post('quantity_a', TRUE);
                        $quantity_b = $this->input->post('quantity_b', TRUE);
                        $options = implode('|', $_POST['question_options_quantitative_select_one']);
                        $correct_answer = $this->input->post('right_answer', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));

                        $this->insert_question_data_modified($quantity_a,$quantity_b, $options, $correct_answer,$question_table,$q_id);


                        break;

                    case 9:
                        $options = implode('|', $_POST['question_options_select_one']);
                        $correct_answer = $this->input->post('right_answer', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));
                        $this->insert_question_data($description, $options, $correct_answer, $question_table,$q_id);

                        break;

                    case 10:
                        $options = implode('|', $_POST['question_options_select_two']);
                        $correct_answer = $this->input->post('right_answer', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));
                        $this->insert_question_data($description, $options, $correct_answer, $question_table,$q_id);
                       break;

                    case 11:

                        $answer = $this->input->post('numeric_answer', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));
                        $this->insert_question_numeric_answer($description, $answer,$question_table,$q_id);

                        break;

                    case 12:
                        $numerator = $this->input->post('numerator', TRUE);
                        $denominator = $this->input->post('denominator', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));
                        $this->insert_question_fraction_answer($description, $numerator,$denominator,$question_table,$q_id);
                        break;

                }
                 redirect(base_url().'index.php?view_questions/view/'.$question_table.'/', 'refresh');
            }
            $this->load->view('includes/footer');
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }

    
   

    function insert_question_data($description, $options, $correct_answer,$question_table,$q_id) {
      if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
        $this->load->model('edit_question_model');
        return $this->edit_question_model->insert_question($description, $options, $correct_answer, $question_table,$q_id);
      }
      else{
          redirect(base_url().'index.php?admin/login');
      }
    }
    function insert_question_data_modified($quantity_a,$quantity_b, $options, $correct_answer,$question_table,$q_id) {
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->load->model('edit_question_model');
            return $this->edit_question_model->insert_question_modified($quantity_a,$quantity_b,$options, $correct_answer,
                    $question_table,$q_id);
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }

    function insert_question_numeric_answer($description, $answer,$question_table,$q_id) {
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->load->model('edit_question_model');
            return $this->edit_question_model->insert_numeric_question($description, $answer,$question_table,$q_id);
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }

    function insert_question_fraction_answer($description, $numerator,$denominator,$question_table,$q_id) {
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->load->model('edit_question_model');
            return $this->edit_question_model->insert_fraction_question($description, $numerator,$denominator,
                    $question_table,$q_id);
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }

}

