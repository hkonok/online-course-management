<?php

class admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    function index() {
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $header_data['page_title'] = 'GRE | Create Question';
            $this->load->view('includes/header', $header_data);
            $this->load->view('top_navigations/top_navigation_for_admin');
            $this->load->view('side_navigations/admin/side_navigation_for_question');
            $this->load->view('includes/footer');
        }
        else {
            redirect('admin/login');
        }
    }

    public function login() {

        //$this->load->library('form_validation');
        //$this->form_validation->set_rules();
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            redirect(base_url().'index.php?admin');
        }
        else{
            $header_data['page_title'] = 'Administrator | Login';
            $this->load->library('form_validation');
            $this->form_validation->set_rules('admin_username', 'Username', 'required');
            $this->form_validation->set_rules('admin_password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('includes/header', $header_data);
                $this->load->view('admin_views/login_view');
                $this->load->view('includes/footer');
            } else {

                $email = $this->input->post('admin_username', TRUE);
                $password = $this->input->post('admin_password', TRUE);
                $this->load->model('authentication_model');
                $admin = $this->authentication_model->check_login_data($email, $password);
                if ($admin['user_status'] == 'Admin') {
                    $_SESSION['user_status'] = 'Admin';
                    $_SESSION['user_id'] = $admin['id'];
                    $_SESSION['user_email'] = $admin['email'];
                    redirect('admin_panel/views/1');
                } else {
                    redirect('admin/login');
                }
                //redirect('admin_panel/views/1');
            }
        }
    }

    public function logout() {
        //unset($_SESSION);
        //print_r($_SESSION);
        session_destroy();
        redirect('admin/login');
    }

    public function create_question($course_name, $q_segment) {

        //$style_sheet_src = $this->load->view('includes/style_sheet', NULL, TRUE);
        //$js_src = $this->load->view('includes/scripts', NULL, TRUE);
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            if ($q_segment == 'verbal') {
                $this->verbal('verbal');
            } else if ($q_segment == 'quantitative') {
                $this->quantitative('quantitative');
            }
        } else {
            redirect('admin/login');
        }

        //echo 'Success!!';
    }

    function verbal($ques_type) {
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {

            $header_data['page_title'] = 'GRE | Create Question';
            $this->load->library('form_validation');
            $this->form_validation->set_rules('question_category', 'Question Category', 'required');
            if ($this->form_validation->run() == FALSE) {

                $this->load->model('question_category_model');
                $question_creation_data['categories'] = $this->question_category_model->get_question_categories($ques_type);
                $this->load->view('includes/header', $header_data);
                $this->load->view('top_navigations/top_navigation_for_admin');
                $this->load->view('side_navigations/admin/side_navigation_for_question');
                $this->load->view('admin_views/question_creation_view', $question_creation_data);
                $this->load->view('includes/footer');
            } else {
                //print_r($_POST['question_options_select_one']);
                //echo $this->input->post('right_answer');
                $description = $this->input->post('description', TRUE);
                //echo $question_set_for;
                switch (intval($this->input->post('question_category'))) {

                    case 1:
                        $options = implode('|', $_POST['question_options_select_one']);
                        $correct_answer = $this->input->post('right_answer', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));

                        if (isset($question_sets) && is_array($question_sets))
                            $question_id = $this->insert_question_data($description, $options, $correct_answer, $question_table);
                        else
                            $question_id = $this->insert_question_data($description, $options, $correct_answer, $question_table);

                        $question_category_id = intval($this->input->post('question_category'));
                        $question_with_category_id = $this->map_question_with_category($question_id, $question_category_id);
                        //unset($question_sets[$i]);
                        break;

                    case 2:
                        $options = implode('|', $_POST['question_options_select_two']);
                        $correct_answer = $this->input->post('right_answer', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));
                        if (isset($question_sets) && is_array($question_sets))
                            $question_id = $this->insert_question_data($description, $options, $correct_answer, $question_set_for_practice, $question_set_for_mock, $question_sets, $question_table);
                        else
                            $question_id = $this->insert_question_data($description, $options, $correct_answer, $question_set_for_practice, $question_set_for_mock, $question_set_for, $question_table);

                        $question_category_id = intval($this->input->post('question_category'));
                        $question_with_category_id = $this->map_question_with_category($question_id, $question_category_id);
                        break;

                    case 3:
                        //print_r($_POST);
                        $options = implode('|', $_POST['question_options_select_in_passage']);
                        $correct_answer = $this->input->post('right_answer', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));
                        $question_id = $this->insert_question_data($description, $options, $correct_answer, $question_table);
                        $question_category_id = intval($this->input->post('question_category'));
                        $question_with_category_id = $this->map_question_with_category($question_id, $question_category_id);
                        //unset($question_sets[$i]);
                        if ($question_with_category_id)
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
                        $question_id = $this->insert_question_data($description, $options, $correct_answer, $question_table);
                        $question_category_id = intval($this->input->post('question_category'));
                        $question_with_category_id = $this->map_question_with_category($question_id, $question_category_id);
                        //unset($question_sets[$i]);
                        break;

                    case 5:
                        //echo $_POST['right_answer'];
                        //print_r($_POST['question_options_three_blank_one']);
                        //print_r($_POST);
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
                        $question_id = $this->insert_question_data($description, $options, $correct_answer, $question_table);
                        $question_category_id = intval($this->input->post('question_category'));
                        $question_with_category_id = $this->map_question_with_category($question_id, $question_category_id);
                        //unset($question_sets[$i]);
                        break;

                    case 6:
                        //echo $_POST['right_answer'];
                        //print_r($_POST['question_options_three_blank_one']);
                        $options['blank_one'] = implode('|', $_POST['question_options_one_blank_one']);
                        $correct_answer = $this->input->post('right_answer', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));
                        $question_id = $this->insert_question_data($description, $options, $correct_answer, $question_table);
                        $question_category_id = intval($this->input->post('question_category'));
                        $question_with_category_id = $this->map_question_with_category($question_id, $question_category_id);
                        //unset($question_sets[$i]);
                        break;

                    case 7:
                        $options = implode('|', $_POST['question_options_two_blank_sentence']);
                        $correct_answers = $this->input->post('right_answer', TRUE);
                        $correct_answer = explode('|', $correct_answers);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));
                        $question_id = $this->insert_question_data($description, $options, $correct_answer, $question_table);
                        $question_category_id = intval($this->input->post('question_category'));
                        $question_with_category_id = $this->map_question_with_category($question_id, $question_category_id);
                        break;
                }
            }
        }
        else {
             redirect('admin/login');
        }
    }

    function quantitative($ques_type) {
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $header_data['page_title'] = 'GRE | Create Question';
            $this->load->library('form_validation');
            $this->form_validation->set_rules('question_category', 'Question Category', 'required');
            if ($this->form_validation->run() == FALSE) {

                $this->load->model('question_category_model');
                $question_creation_data['categories'] = $this->question_category_model->get_question_categories($ques_type);
                $this->load->view('includes/header', $header_data);
                $this->load->view('top_navigations/top_navigation_for_admin');
                $this->load->view('side_navigations/admin/side_navigation_for_question');
                $this->load->view('admin_views/question_creation_view', $question_creation_data);
                $this->load->view('includes/footer');
            } else {
                //print_r($_POST['question_options_select_one']);
                //echo $this->input->post('right_answer');
                $description = $this->input->post('description', TRUE);
                $question_set_for = $this->input->post('question_set_for', TRUE);

                //echo $question_set_for;
                if ($question_set_for == 'Both') {
                    $question_sets = array('Practice', 'Mock');
                    $question_set_for_practice = $this->input->post('question_set_for_practice', TRUE);
                    $question_set_for_mock = $this->input->post('question_set_for_mock', TRUE);
                } else if ($question_set_for == 'Practice') {

                    $question_set_for_practice = $this->input->post('question_set_for_practice', TRUE);
                    $question_set_for_mock = '';
                } else if ($question_set_for == 'Mock') {

                    $question_set_for_mock = $this->input->post('question_set_for_mock', TRUE);
                    $question_set_for_practice = '';
                }
                switch (intval($this->input->post('question_category'))) {

                    case 8:
                        $quantity_a = $this->input->post('quantity_a', TRUE);
                        $quantity_b = $this->input->post('quantity_b', TRUE);
                        $options = implode('|', $_POST['question_options_quantitative_select_one']);
                        $correct_answer = $this->input->post('right_answer', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));

                        if (isset($question_sets) && is_array($question_sets))
                            $question_id = $this->insert_question_data_modified($quantity_a, $quantity_b, $options, $correct_answer, $question_set_for_practice, $question_set_for_mock, $question_sets, $question_table);
                        else
                            $question_id = $this->insert_question_data_modified($quantity_a, $quantity_b, $options, $correct_answer, $question_set_for_practice, $question_set_for_mock, $question_set_for, $question_table);

                        $question_category_id = intval($this->input->post('question_category'));
                        $question_with_category_id = $this->map_question_with_category($question_id, $question_category_id);


                        break;

                    case 9:
                        $options = implode('|', $_POST['question_options_select_one']);
                        $correct_answer = $this->input->post('right_answer', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));

                        if (isset($question_sets) && is_array($question_sets))
                            $question_id = $this->insert_question_data($description, $options, $correct_answer, $question_set_for_practice, $question_set_for_mock, $question_sets, $question_table);
                        else
                            $question_id = $this->insert_question_data($description, $options, $correct_answer, $question_set_for_practice, $question_set_for_mock, $question_set_for, $question_table);

                        $question_category_id = intval($this->input->post('question_category'));
                        $question_with_category_id = $this->map_question_with_category($question_id, $question_category_id);


                        break;

                    case 10:
                        $options = implode('|', $_POST['question_options_select_two']);
                        $correct_answer = $this->input->post('right_answer', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));
                        if (isset($question_sets) && is_array($question_sets))
                            $question_id = $this->insert_question_data($description, $options, $correct_answer, $question_set_for_practice, $question_set_for_mock, $question_sets, $question_table);
                        else
                            $question_id = $this->insert_question_data($description, $options, $correct_answer, $question_set_for_practice, $question_set_for_mock, $question_set_for, $question_table);

                        $question_category_id = intval($this->input->post('question_category'));
                        $question_with_category_id = $this->map_question_with_category($question_id, $question_category_id);
                        break;

                    case 11:

                        $answer = $this->input->post('numeric_answer', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));
                        if (isset($question_sets) && is_array($question_sets))
                            $question_id = $this->insert_question_numeric_answer($description, $answer, $question_set_for_practice, $question_set_for_mock, $question_sets, $question_table);
                        else
                            $question_id = $this->insert_question_numeric_answer($description, $answer, $question_set_for_practice, $question_set_for_mock, $question_set_for, $question_table);

                        $question_category_id = intval($this->input->post('question_category'));
                        $question_with_category_id = $this->map_question_with_category($question_id, $question_category_id);


                        break;

                    case 12:
                        $numerator = $this->input->post('numerator', TRUE);
                        $denominator = $this->input->post('denominator', TRUE);
                        $this->load->model('question_category_model');
                        $question_table = $this->question_category_model->get_question_table(intval($this->input->post('question_category')));
                        if (isset($question_sets) && is_array($question_sets))
                            $question_id = $this->insert_question_fraction_answer($description, $numerator, $denominator, $question_set_for_practice, $question_set_for_mock, $question_sets, $question_table);
                        else
                            $question_id = $this->insert_question_fraction_answer($description, $numerator, $denominator, $question_set_for_practice, $question_set_for_mock, $question_set_for, $question_table);

                        $question_category_id = intval($this->input->post('question_category'));
                        $question_with_category_id = $this->map_question_with_category($question_id, $question_category_id);


                        break;
                }
            }
        }
        else {
             redirect('admin/login');
        }
    }

    function insert_question_data($description, $options, $correct_answer, $question_table) {
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->load->model('question_model');
            return $this->question_model->insert_question($description, $options, $correct_answer, $question_table);
        }
        else {
            redirect('admin/login');
        }
    }

    function insert_question_data_modified($quantity_a, $quantity_b, $options, $correct_answer, $question_set_for_practice, $question_set_for_mock, $question_set_for, $question_table) {
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->load->model('question_model');
            return $this->question_model->insert_question_modified($quantity_a, $quantity_b, $options, $correct_answer, $question_set_for_practice, $question_set_for_mock, $question_set_for, $question_table);
        }
        else{
            redirect('admin/login');
        }
    }

    function insert_question_numeric_answer($description, $answer, $question_set_for_practice, $question_set_for_mock, $question_sets, $question_table) {
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->load->model('question_model');
            return $this->question_model->insert_numeric_question($description, $answer, $question_set_for_practice, $question_set_for_mock, $question_sets, $question_table);
        }
        else {
            redirect('admin/login');
        }
    }

    function insert_question_fraction_answer($description, $numerator, $denominator, $question_set_for_practice, $question_set_for_mock, $question_sets, $question_table) {
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->load->model('question_model');
            return $this->question_model->insert_fraction_question($description, $numerator, $denominator, $question_set_for_practice, $question_set_for_mock, $question_sets, $question_table);
        }
        else{
            redirect('admin/login');
        }

    }

    function map_question_with_category($question_id, $question_category_id) {
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->load->model('question_category_model');
            return $this->question_category_model->insert_question_category($question_id, $question_category_id);
        }
        else{
            redirect('admin/login');
        }
    }

}

