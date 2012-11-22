<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class sub_set_view extends CI_Controller {
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public  function qus_type($subset_id=0,$val=0,$start=0){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $per_page=2;
            /////////need to edit
                $my_data['subset_id']=$subset_id;
                /////// need to edit
            switch($val){

                case 1:
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model
                                      ->question_view("select-one_choice_questions",$start,2);

                $my_data['t_name']="select-one_choice_questions";

                $this->load->model('set_model');
                $array_tmp=$this->set_model->restricted_subset_q_ids($subset_id,$my_data['t_name']);
                foreach($array_tmp as $row){
                    $my_map[$row['question_id']]=1;
                }
                if(isset($my_map))$my_data['my_map']=$my_map;
                $my_data['segment_id']=$this->set_model->table_name_to_id($my_data['t_name']);
                $my_data['partition']=1;

                $this->load->view('admin_views/verbal_select_one_answer',$my_data);


                    $this->load->library('pagination_modified');
                    $config['base_url'] ="";
                    $config['total_rows'] = $this->question_view_model->table_row_number($my_data['t_name']);
                    $config['per_page'] = $per_page;
                    $config['num_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['num_tag_close'] = ' </li>';
                    $config['last_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['last_tag_close'] = ' </li>';
                    $config['first_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['first_tag_close'] = ' </li>';


                    $this->pagination_modified->initialize($config);
                    $this->load->view('admin_views/pagination_view_modified');

                    break;
                case 2:
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model
                                      ->question_view("select-many_choice_questions",$start,2);
                $my_data['t_name']="select-many_choice_questions";


                $this->load->model('set_model');
                $array_tmp=$this->set_model->restricted_subset_q_ids($subset_id,$my_data['t_name']);
                foreach($array_tmp as $row){
                    $my_map[$row['question_id']]=1;
                }
                if(isset($my_map))$my_data['my_map']=$my_map;
                $my_data['segment_id']=$this->set_model->table_name_to_id($my_data['t_name']);
                $my_data['partition']=1;


                $this->load->view('admin_views/verbal_select_multiple_answer',$my_data);

                    $this->load->library('pagination_modified');
                    $config['base_url'] ="";
                    $config['total_rows'] = $this->question_view_model->table_row_number($my_data['t_name']);
                    $config['per_page'] = $per_page;
                    $config['num_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['num_tag_close'] = ' </li>';
                    $config['last_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['last_tag_close'] = ' </li>';
                    $config['first_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['first_tag_close'] = ' </li>';

                    $this->pagination_modified->initialize($config);
                    $this->load->view('admin_views/pagination_view_modified');
                    break;

                case 3:
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model
                                      ->question_view("select-in_passage_questions",$start,2);
                $my_data['t_name']="select-in_passage_questions";


                $this->load->model('set_model');
                $array_tmp=$this->set_model->restricted_subset_q_ids($subset_id,$my_data['t_name']);
                foreach($array_tmp as $row){
                    $my_map[$row['question_id']]=1;
                }
                if(isset($my_map))$my_data['my_map']=$my_map;
                $my_data['segment_id']=$this->set_model->table_name_to_id($my_data['t_name']);
                $my_data['partition']=1;


                $this->load->view('admin_views/select-in_passage',$my_data);

                    $this->load->library('pagination_modified');
                    $config['base_url'] ="";
                    $config['total_rows'] = $this->question_view_model->table_row_number($my_data['t_name']);
                    $config['per_page'] = $per_page;
                    $config['num_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['num_tag_close'] = ' </li>';
                    $config['last_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['last_tag_close'] = ' </li>';
                    $config['first_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['first_tag_close'] = ' </li>';

                    $this->pagination_modified->initialize($config);
                    $this->load->view('admin_views/pagination_view_modified');
                    break;

                case 4:
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model
                                      ->question_view("three-blank_completion_questions",$start,2);
                $my_data['t_name']="three-blank_completion_questions";


                $this->load->model('set_model');
                $array_tmp=$this->set_model->restricted_subset_q_ids($subset_id,$my_data['t_name']);
                foreach($array_tmp as $row){
                    $my_map[$row['question_id']]=1;
                }
                if(isset($my_map))$my_data['my_map']=$my_map;
                $my_data['segment_id']=$this->set_model->table_name_to_id($my_data['t_name']);
                $my_data['partition']=1;


                $this->load->view('admin_views/three-blank_completion_questions',$my_data);

                    $this->load->library('pagination_modified');
                    $config['base_url'] ="";
                    $config['total_rows'] = $this->question_view_model->table_row_number($my_data['t_name']);
                    $config['per_page'] = $per_page;
                    $config['num_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['num_tag_close'] = ' </li>';
                    $config['last_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['last_tag_close'] = ' </li>';
                    $config['first_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['first_tag_close'] = ' </li>';

                    $this->pagination_modified->initialize($config);
                    $this->load->view('admin_views/pagination_view_modified');
                    break;

                case 5:
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model
                                      ->question_view("two-blank_completion_questions",$start,2);
                $my_data['t_name']="two-blank_completion_questions";


                $this->load->model('set_model');
                $array_tmp=$this->set_model->restricted_subset_q_ids($subset_id,$my_data['t_name']);
                foreach($array_tmp as $row){
                    $my_map[$row['question_id']]=1;
                }
                if(isset($my_map))$my_data['my_map']=$my_map;
                $my_data['segment_id']=$this->set_model->table_name_to_id($my_data['t_name']);
                $my_data['partition']=1;


                $this->load->view('admin_views/two-blank_completion_questions',$my_data);

                    $this->load->library('pagination_modified');
                    $config['base_url'] ="";
                    $config['total_rows'] = $this->question_view_model->table_row_number($my_data['t_name']);
                    $config['per_page'] = $per_page;
                    $config['num_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['num_tag_close'] = ' </li>';
                    $config['last_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['last_tag_close'] = ' </li>';
                    $config['first_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['first_tag_close'] = ' </li>';

                    $this->pagination_modified->initialize($config);
                    $this->load->view('admin_views/pagination_view_modified');
                    break;
                case 6:
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model
                                      ->question_view("one-blank_completion_questions",$start,2);
                $my_data['t_name']="one-blank_completion_questions";


                $this->load->model('set_model');
                $array_tmp=$this->set_model->restricted_subset_q_ids($subset_id,$my_data['t_name']);
                foreach($array_tmp as $row){
                    $my_map[$row['question_id']]=1;
                }
                if(isset($my_map))$my_data['my_map']=$my_map;
                $my_data['segment_id']=$this->set_model->table_name_to_id($my_data['t_name']);
                $my_data['partition']=1;


                $this->load->view('admin_views/one-blank_completion_questions',$my_data);

                    $this->load->library('pagination_modified');
                    $config['base_url'] ="";
                    $config['total_rows'] = $this->question_view_model->table_row_number($my_data['t_name']);
                    $config['per_page'] = $per_page;
                    $config['num_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['num_tag_close'] = ' </li>';
                    $config['last_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['last_tag_close'] = ' </li>';
                    $config['first_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['first_tag_close'] = ' </li>';

                    $this->pagination_modified->initialize($config);
                    $this->load->view('admin_views/pagination_view_modified');
                    break;

                case 7:
                $this->load->model('question_view_model');
                $my_data['data']=$this->question_view_model
                                      ->question_view("one-blank_sentence_completion_questions",$start,2);
                $my_data['t_name']="one-blank_sentence_completion_questions";


                $this->load->model('set_model');
                $array_tmp=$this->set_model->restricted_subset_q_ids($subset_id,$my_data['t_name']);
                foreach($array_tmp as $row){
                    $my_map[$row['question_id']]=1;
                }
                if(isset($my_map))$my_data['my_map']=$my_map;
                $my_data['segment_id']=$this->set_model->table_name_to_id($my_data['t_name']);
                $my_data['partition']=1;


                $this->load->view('admin_views/one-blank_sentence_completion_questions',$my_data);

                    $this->load->library('pagination_modified');
                    $config['base_url'] ="";
                    $config['total_rows'] = $this->question_view_model->table_row_number($my_data['t_name']);
                    $config['per_page'] = $per_page;
                    $config['num_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['num_tag_close'] = ' </li>';
                    $config['last_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['last_tag_close'] = ' </li>';
                    $config['first_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['first_tag_close'] = ' </li>';

                    $this->pagination_modified->initialize($config);
                    $this->load->view('admin_views/pagination_view_modified');
                    break;

                case 8:


                    $this->load->model('question_view_model');
                    $my_data['data']=$this->question_view_model
                                          ->question_view("quantitative_comparison_questions",$start,2);
                    $my_data['t_name']="quantitative_comparison_questions";


                    $this->load->model('set_model');
                    $array_tmp=$this->set_model->restricted_subset_q_ids($subset_id,$my_data['t_name']);
                    foreach($array_tmp as $row){
                        $my_map[$row['question_id']]=1;
                    }
                    if(isset($my_map))$my_data['my_map']=$my_map;
                    $my_data['segment_id']=$this->set_model->table_name_to_id($my_data['t_name']);
                    $my_data['partition']=1;


                    $this->load->view('admin_views/quantitative_comparison_questions',$my_data);

                    $this->load->library('pagination_modified');
                    $config['base_url'] ="";
                    $config['total_rows'] = $this->question_view_model->table_row_number($my_data['t_name']);
                    $config['per_page'] = $per_page;
                    $config['num_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['num_tag_close'] = ' </li>';
                    $config['last_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['last_tag_close'] = ' </li>';
                    $config['first_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['first_tag_close'] = ' </li>';

                    $this->pagination_modified->initialize($config);
                    $this->load->view('admin_views/pagination_view_modified');

                    break;

                case 9:
                    $this->load->model('question_view_model');
                    $my_data['data']=$this->question_view_model
                                          ->question_view("quantitative_select-one_choice_questions",$start,2);
                    $my_data['t_name']="quantitative_select-one_choice_questions";

                    $this->load->model('set_model');
                    $array_tmp=$this->set_model->restricted_subset_q_ids($subset_id,$my_data['t_name']);
                    foreach($array_tmp as $row){
                        $my_map[$row['question_id']]=1;
                    }
                    if(isset($my_map))$my_data['my_map']=$my_map;
                    $my_data['segment_id']=$this->set_model->table_name_to_id($my_data['t_name']);
                    $my_data['partition']=1;

                    $this->load->view('admin_views/verbal_select_one_answer',$my_data);

                    $this->load->library('pagination_modified');
                    $config['base_url'] ="";
                    $config['total_rows'] = $this->question_view_model->table_row_number($my_data['t_name']);
                    $config['per_page'] = $per_page;
                    $config['num_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['num_tag_close'] = ' </li>';
                    $config['last_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['last_tag_close'] = ' </li>';
                    $config['first_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['first_tag_close'] = ' </li>';

                    $this->pagination_modified->initialize($config);
                    $this->load->view('admin_views/pagination_view_modified');
                    break;

                case 10:
                    $this->load->model('question_view_model');
                    $my_data['data']=$this->question_view_model
                                          ->question_view("quantitative_select-many_choice_questions",$start,2);
                    $my_data['t_name']="quantitative_select-many_choice_questions";

                    $this->load->model('set_model');
                    $array_tmp=$this->set_model->restricted_subset_q_ids($subset_id,$my_data['t_name']);
                    foreach($array_tmp as $row){
                        $my_map[$row['question_id']]=1;
                    }
                    if(isset($my_map))$my_data['my_map']=$my_map;
                    $my_data['segment_id']=$this->set_model->table_name_to_id($my_data['t_name']);
                    $my_data['partition']=1;


                    $this->load->view('admin_views/verbal_select_multiple_answer',$my_data);

                    $this->load->library('pagination_modified');
                    $config['base_url'] ="";
                    $config['total_rows'] = $this->question_view_model->table_row_number($my_data['t_name']);
                    $config['per_page'] = $per_page;
                    $config['num_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['num_tag_close'] = ' </li>';
                    $config['last_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['last_tag_close'] = ' </li>';
                    $config['first_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['first_tag_close'] = ' </li>';

                    $this->pagination_modified->initialize($config);
                    $this->load->view('admin_views/pagination_view_modified');
                    break;

                case 11:
                    $this->load->model('question_view_model');
                    $my_data['data']=$this->question_view_model
                                          ->question_view("quantitative_numeric_entry_questions_one_answer",$start,2);
                    $my_data['t_name']="quantitative_numeric_entry_questions_one_answer";

                    $this->load->model('set_model');
                    $array_tmp=$this->set_model->restricted_subset_q_ids($subset_id,$my_data['t_name']);
                    foreach($array_tmp as $row){
                        $my_map[$row['question_id']]=1;
                    }
                    if(isset($my_map))$my_data['my_map']=$my_map;
                    $my_data['segment_id']=$this->set_model->table_name_to_id($my_data['t_name']);
                    $my_data['partition']=1;

                    $this->load->view('admin_views/quantitative_numeric_entry_questions_one_answer',$my_data);

                    $this->load->library('pagination_modified');
                    $config['base_url'] ="";
                    $config['total_rows'] = $this->question_view_model->table_row_number($my_data['t_name']);
                    $config['per_page'] = $per_page;
                    $config['num_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['num_tag_close'] = ' </li>';
                    $config['last_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['last_tag_close'] = ' </li>';
                    $config['first_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['first_tag_close'] = ' </li>';

                    $this->pagination_modified->initialize($config);
                    $this->load->view('admin_views/pagination_view_modified');
                    break;

                case 12:
                    $this->load->model('question_view_model');
                    $my_data['data']=$this->question_view_model
                                          ->question_view("quantitative_numeric_entry_questions_fraction_answer",$start,2);
                    $my_data['t_name']="quantitative_numeric_entry_questions_fraction_answer";

                    $this->load->model('set_model');
                    $array_tmp=$this->set_model->restricted_subset_q_ids($subset_id,$my_data['t_name']);
                    foreach($array_tmp as $row){
                        $my_map[$row['question_id']]=1;
                    }
                    if(isset($my_map))$my_data['my_map']=$my_map;
                    $my_data['segment_id']=$this->set_model->table_name_to_id($my_data['t_name']);
                    $my_data['partition']=1;

                    $this->load->view('admin_views/quantitative_numeric_entry_questions_fraction_answer',$my_data);

                    $this->load->library('pagination_modified');
                    $config['base_url'] ="";
                    $config['total_rows'] = $this->question_view_model->table_row_number($my_data['t_name']);
                    $config['per_page'] = $per_page;
                    $config['num_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['num_tag_close'] = ' </li>';
                    $config['last_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['last_tag_close'] = ' </li>';
                    $config['first_tag_open'] = '<li onclick="qus_function_two('.$val.',';
                    $config['first_tag_close'] = ' </li>';

                    $this->pagination_modified->initialize($config);
                    $this->load->view('admin_views/pagination_view_modified');
                    break;
            }
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }
}


?>
