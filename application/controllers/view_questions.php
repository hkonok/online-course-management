<?php

class view_questions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function create_question($course_name,$q_segment) {
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            //$style_sheet_src = $this->load->view('includes/style_sheet', NULL, TRUE);
            //$js_src = $this->load->view('includes/scripts', NULL, TRUE);
            if($q_segment=='verbal'){
                $this->verbal('verbal');
            }
            else if($q_segment=='quantitative'){
                $this->quantitative('quantitative');

            }
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }
    public function init_view($table_name){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->view($table_name,0);
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }

   public function view($table_name,$start_val=0){
       if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $header_data['page_title'] = 'GRE | Create Question';
            $this->load->view('includes/header', $header_data);
            $this->load->view('top_navigations/top_navigation_for_admin');
            $this->load->view('side_navigations/admin/side_navigation_for_question');

            $my_data['t_name']=$table_name;

            switch ($table_name){
                case "select-one_choice_questions":
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model->question_view($table_name,$start_val,2);
                $this->load->library('pagination');
                $config['base_url'] = base_url()."index.php?view_questions/view/".$table_name."/";
                $config['total_rows'] = $this->question_view_model->table_row_number($table_name);
                $config['per_page'] = 2;

                $this->pagination->initialize($config);


                $this->load->view('admin_views/verbal_select_one_answer',$my_data);
                $this->load->view('admin_views/pagination_view');
                break;

                case "select-many_choice_questions":
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model->question_view($table_name,$start_val,2);
                $this->load->library('pagination');
                $config['base_url'] = base_url()."index.php?view_questions/view/".$table_name."/";
                $config['total_rows'] = $this->question_view_model->table_row_number($table_name);
                $config['per_page'] = 2;

                $this->pagination->initialize($config);


                $this->load->view('admin_views/verbal_select_multiple_answer',$my_data);
                $this->load->view('admin_views/pagination_view');
                break;

                case "select-in_passage_questions":
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model->question_view($table_name,$start_val,2);
                $this->load->library('pagination');
                $config['base_url'] = base_url()."index.php?view_questions/view/".$table_name."/";
                $config['total_rows'] = $this->question_view_model->table_row_number($table_name);
                $config['per_page'] = 2;

                $this->pagination->initialize($config);


                $this->load->view('admin_views/select-in_passage',$my_data);
                $this->load->view('admin_views/pagination_view');
                break;

                case "three-blank_completion_questions":
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model->question_view($table_name,$start_val,2);
                $this->load->library('pagination');
                $config['base_url'] = base_url()."index.php?view_questions/view/".$table_name."/";
                $config['total_rows'] = $this->question_view_model->table_row_number($table_name);
                $config['per_page'] = 2;

                $this->pagination->initialize($config);


                $this->load->view('admin_views/three-blank_completion_questions',$my_data);
                $this->load->view('admin_views/pagination_view');
                break;


                case "two-blank_completion_questions":
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model->question_view($table_name,$start_val,2);
                $this->load->library('pagination');
                $config['base_url'] = base_url()."index.php?view_questions/view/".$table_name."/";
                $config['total_rows'] = $this->question_view_model->table_row_number($table_name);
                $config['per_page'] = 2;

                $this->pagination->initialize($config);


                $this->load->view('admin_views/two-blank_completion_questions',$my_data);
                $this->load->view('admin_views/pagination_view');
                break;

                case "one-blank_completion_questions":
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model->question_view($table_name,$start_val,2);
                $this->load->library('pagination');
                $config['base_url'] = base_url()."index.php?view_questions/view/".$table_name."/";
                $config['total_rows'] = $this->question_view_model->table_row_number($table_name);
                $config['per_page'] = 2;

                $this->pagination->initialize($config);


                $this->load->view('admin_views/one-blank_completion_questions',$my_data);
                $this->load->view('admin_views/pagination_view');
                break;

                case "one-blank_sentence_completion_questions":
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model->question_view($table_name,$start_val,2);
                $this->load->library('pagination');
                $config['base_url'] = base_url()."index.php?view_questions/view/".$table_name."/";
                $config['total_rows'] = $this->question_view_model->table_row_number($table_name);
                $config['per_page'] = 2;

                $this->pagination->initialize($config);


                $this->load->view('admin_views/one-blank_sentence_completion_questions',$my_data);
                $this->load->view('admin_views/pagination_view');
                break;


                //quantitative/////////////////////////////////////////////////////////////////////////////////////////////

                case "quantitative_comparison_questions":
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model->question_view($table_name,$start_val,2);
                $this->load->library('pagination');
                $config['base_url'] = base_url()."index.php?view_questions/view/".$table_name."/";
                $config['total_rows'] = $this->question_view_model->table_row_number($table_name);
                $config['per_page'] = 2;

                $this->pagination->initialize($config);


                $this->load->view('admin_views/quantitative_comparison_questions',$my_data);
                $this->load->view('admin_views/pagination_view');
                break;
                break;

                case "quantitative_select-one_choice_questions":
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model->question_view($table_name,$start_val,2);
                $this->load->library('pagination');
                $config['base_url'] = base_url()."index.php?view_questions/view/".$table_name."/";
                $config['total_rows'] = $this->question_view_model->table_row_number($table_name);
                $config['per_page'] = 2;

                $this->pagination->initialize($config);


                $this->load->view('admin_views/verbal_select_one_answer',$my_data);
                $this->load->view('admin_views/pagination_view');
                break;

                case "quantitative_select-many_choice_questions":
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model->question_view($table_name,$start_val,2);
                $this->load->library('pagination');
                $config['base_url'] = base_url()."index.php?view_questions/view/".$table_name."/";
                $config['total_rows'] = $this->question_view_model->table_row_number($table_name);
                $config['per_page'] = 2;

                $this->pagination->initialize($config);


                $this->load->view('admin_views/verbal_select_multiple_answer',$my_data);
                $this->load->view('admin_views/pagination_view');
                break;

                case "quantitative_numeric_entry_questions_one_answer":
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model->question_view($table_name,$start_val,2);
                $this->load->library('pagination');
                $config['base_url'] = base_url()."index.php?view_questions/view/".$table_name."/";
                $config['total_rows'] = $this->question_view_model->table_row_number($table_name);
                $config['per_page'] = 2;

                $this->pagination->initialize($config);


                $this->load->view('admin_views/quantitative_numeric_entry_questions_one_answer',$my_data);
                $this->load->view('admin_views/pagination_view');
                break;

                case "quantitative_numeric_entry_questions_fraction_answer":
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model->question_view($table_name,$start_val,2);
                $this->load->library('pagination');
                $config['base_url'] = base_url()."index.php?view_questions/view/".$table_name."/";
                $config['total_rows'] = $this->question_view_model->table_row_number($table_name);
                $config['per_page'] = 2;

                $this->pagination->initialize($config);


                $this->load->view('admin_views/quantitative_numeric_entry_questions_fraction_answer',$my_data);
                $this->load->view('admin_views/pagination_view');
                break;
            }

            $this->load->view('includes/footer');
       }
       else{
           redirect(base_url().'index.php?admin/login');
       }
    }
    
}

