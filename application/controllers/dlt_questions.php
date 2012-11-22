<?php

class dlt_questions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

   public function dlt_final(){
       if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
           $this->load->model('dlt_question_model');
           $this->dlt_question_model->dlt_final($this->input->post('t_name'),$this->input->post('q_id'));
           redirect('/view_questions/view/'.$this->input->post('t_name'), 'refresh');
       }
       else{
           redirect(base_url().'index.php?admin/login');
       }
   }

   public function Index() {
       if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $header_data['page_title'] = 'GRE | Create Question';
            $this->load->view('includes/header', $header_data);
            $this->load->view('top_navigations/top_navigation_for_admin');
            $this->load->view('side_navigations/admin/side_navigation_for_question');
            switch($this->input->post('t_name')){
                case "select-one_choice_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($this->input->post('t_name'),$this->input->post('q_id'));
                $my_data['t_name']=$this->input->post('t_name');
                $my_data['q_id']=$this->input->post('q_id');
                //var_dump($my_data['data']);
                $this->load->view('admin_views/dlt_select-one_choice_question',$my_data);
                break;

                case "select-in_passage_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($this->input->post('t_name'),$this->input->post('q_id'));
                $my_data['t_name']=$this->input->post('t_name');
                $my_data['q_id']=$this->input->post('q_id');
                //var_dump($my_data['data']);
                $this->load->view('admin_views/dlt_select-in_passage_question',$my_data);
                break;

                case "three-blank_completion_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($this->input->post('t_name'),$this->input->post('q_id'));
                $my_data['t_name']=$this->input->post('t_name');
                $my_data['q_id']=$this->input->post('q_id');
                //var_dump($my_data['data']);
                $this->load->view('admin_views/dlt_three-blank_completion_questions',$my_data);
                break;

                case "two-blank_completion_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($this->input->post('t_name'),$this->input->post('q_id'));
                $my_data['t_name']=$this->input->post('t_name');
                $my_data['q_id']=$this->input->post('q_id');
                //var_dump($my_data['data']);
                $this->load->view('admin_views/dlt_two-blank_completion_questions',$my_data);
                break;

                case "one-blank_completion_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($this->input->post('t_name'),$this->input->post('q_id'));
                $my_data['t_name']=$this->input->post('t_name');
                $my_data['q_id']=$this->input->post('q_id');
                //var_dump($my_data['data']);
                $this->load->view('admin_views/dlt_one-blank_completion_questions',$my_data);
                break;

                case "one-blank_sentence_completion_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($this->input->post('t_name'),$this->input->post('q_id'));
                $my_data['t_name']=$this->input->post('t_name');
                $my_data['q_id']=$this->input->post('q_id');
                //var_dump($my_data['data']);
                $this->load->view('admin_views/dlt_one-blank_sentence_completion_questions',$my_data);
                break;

                //quantitative

                case "quantitative_select-one_choice_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($this->input->post('t_name'),$this->input->post('q_id'));
                $my_data['t_name']=$this->input->post('t_name');
                $my_data['q_id']=$this->input->post('q_id');
                //var_dump($my_data['data']);
                $this->load->view('admin_views/dlt_select-one_choice_question',$my_data);
                break;

                case "quantitative_select-many_choice_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($this->input->post('t_name'),$this->input->post('q_id'));
                $my_data['t_name']=$this->input->post('t_name');
                $my_data['q_id']=$this->input->post('q_id');
                //var_dump($my_data['data']);
                $this->load->view('admin_views/dlt_select-many_choice_question',$my_data);
                break;

                case "quantitative_comparison_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($this->input->post('t_name'),$this->input->post('q_id'));
                $my_data['t_name']=$this->input->post('t_name');
                $my_data['q_id']=$this->input->post('q_id');
                //var_dump($my_data['data']);
                $this->load->view('admin_views/dlt_quantitative_comparison_questions',$my_data);
                break;

                case "quantitative_numeric_entry_questions_one_answer":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($this->input->post('t_name'),$this->input->post('q_id'));
                $my_data['t_name']=$this->input->post('t_name');
                $my_data['q_id']=$this->input->post('q_id');
                //var_dump($my_data['data']);
                $this->load->view('admin_views/dlt_quantitative_numeric_entry_questions_one_answer',$my_data);
                break;

                case "quantitative_numeric_entry_questions_fraction_answer":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($this->input->post('t_name'),$this->input->post('q_id'));
                $my_data['t_name']=$this->input->post('t_name');
                $my_data['q_id']=$this->input->post('q_id');
                //var_dump($my_data['data']);
                $this->load->view('admin_views/dlt_quantitative_numeric_entry_questions_fraction_answer',$my_data);
                break;
            }
            $this->load->view('includes/footer');
       }
       else{
           redirect(base_url().'index.php?admin/login');
       }
    }

}
