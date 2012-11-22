<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class create_subset extends CI_Controller {
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index($subset_id=0,$type=0)
    {
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $header_data['page_title'] = 'GRE | Create Question';
            $this->load->view('includes/header', $header_data);
            $this->load->view('top_navigations/top_navigation_for_admin');
          //  $this->load->view('side_navigations/admin/side_navigation_for_set');
            $my_tmp['subset_id']=$subset_id;
            $my_tmp['type']=$type;
            $this->load->view('admin_views/sub_set_qus_view',$my_tmp);
            ////////////////////////////////////////////////////////////////////////////////////////////////
            $tmp['data']="<div id=my_subset_view>";
            $this->load->view('admin_views/fake_view',$tmp);
            ///////////////////////////////////////////////////////////////////////////////////////////////

            $this->test($subset_id);

            ///////////////////////////////////////////////////////////////////////
            $tmp['data']="</div>";
            $this->load->view('admin_views/fake_view',$tmp);
            ////////////////////////////////////////////////////////////////////////////////////////////
            $this->load->view('includes/footer');
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }

   
    function manage_subset($type,$start=0){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $limit=2;
            $header_data['page_title'] = 'GRE | Create Question';
            $this->load->view('includes/header', $header_data);
            $this->load->view('top_navigations/top_navigation_for_admin');

            $this->load->model('set_model');
            $my_data['data']=$this->set_model->subset_list($type,$start,$limit);
            $my_data['type']=$type;

                $table_name="subset";

                $this->load->library('pagination');
                $config['base_url'] = base_url()."index.php?create_subset/manage_subset/".$type."//";
                $config['total_rows'] = $this->set_model->table_row_number($table_name,$type);
                $config['per_page'] = $limit;
                if($start==0)$config['uri_segment'] = '1';
                $this->pagination->initialize($config);

                $this->load->view('admin_views/subset_table',$my_data);

                $this->load->view('admin_views/pagination_view');

                $this->load->view('includes/footer');
            }
            else{
                redirect(base_url().'index.php?admin/login');
            }
    }
        function dlt_subset($type,$id){
            if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
                $this->load->model('set_model');
                $this->set_model->dlt_subset($id);
                redirect(base_url().'index.php?create_subset/manage_subset/'.$type.'/', 'refresh');
            }
            else{
                redirect(base_url().'index.php?admin/login');
            }
        }
         function manage_set($type,$start=0){
             if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin'){
                $limit=2;
                $header_data['page_title'] = 'GRE | Create Question';
                $this->load->view('includes/header', $header_data);
                $this->load->view('top_navigations/top_navigation_for_admin');

                $this->load->model('set_model');
                $my_data['data']=$this->set_model->set_list($type,$start,$limit);
                $my_data['type']=$type;

                    if($type==1)$table_name="set_for_mock";
                    else if($type==2)$table_name="set_for_practice";

                    $this->load->library('pagination');
                    $config['base_url'] = base_url()."index.php?create_subset/manage_set/".$type."/";
                    $config['total_rows'] = $this->set_model->table_set_row_number($table_name,$type);
                    $config['per_page'] = $limit;
                    if($start==0)$config['uri_segment'] = '1';
                    $this->pagination->initialize($config);

                    $this->load->view('admin_views/set_table',$my_data);

                    $this->load->view('admin_views/pagination_view');

                    $this->load->view('includes/footer');
             }
             else{
                 redirect(base_url().'index.php?admin/login');
             }
    }

    function dlt_set($type,$id){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin'){
            $this->load->model('set_model');
            $this->set_model->dlt_set($id);
            redirect(base_url().'index.php?create_subset/manage_set/'.$type.'/', 'refresh');
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }

    function new_subset($type){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin'){
            $tmp_data['id']=3;


            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'name', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                 $header_data['page_title'] = 'GRE | Create Question';
                 $this->load->view('includes/header', $header_data);
                 $this->load->view('top_navigations/top_navigation_for_admin');
                 $this->load->view('side_navigations/admin/side_navigation_for_question',$tmp_data);
                 $this->load->view('admin_views/subset_creation_form');
                 $this->load->view('includes/footer');
            }
            else{
                $this->load->model('set_model');
                $subset_id=$this->set_model->create_subset($type);
                redirect(base_url().'index.php?create_subset/index/'.$subset_id.'/'.$type.'/', 'refresh');
            }
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }

    function new_set($type){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin'){
            $tmp_data['id']=5;


            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'name', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                 $header_data['page_title'] = 'GRE | Create Question';
                 $this->load->view('includes/header', $header_data);
                 $this->load->view('top_navigations/top_navigation_for_admin');
                 $this->load->view('side_navigations/admin/side_navigation_for_question',$tmp_data);
                 $this->load->view('admin_views/subset_creation_form');
                 $this->load->view('includes/footer');
            }
            else{
               // echo "success";
                $this->load->model('set_model');
                 $set_id=$this->set_model->create_set($type);
                // echo $set_id;
                 redirect(base_url().'index.php?create_subset/show_set/'.$type.'/'.$set_id.'/', 'refresh');


            }
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }


   function test($subset_id){
       if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin'){
            //<div style="border-left-style: solid"></div>
           $my_data['data'] = "<div  class='span8'
                                    style='border-left-style: outset; margin-left: 1%; margin-right: 1%;
                               '>
                    <h3 class='btn-primary btn-large' align='center'
                               style='margin-left:3%;margin-bottom:10px;margin-top:15px;
                               '>Questions in Current Subset</h3>
                       <div id='sub_set_qus'>";
            $this->load->view('admin_views/fake_view',$my_data);
            $this->show_subset($subset_id);
            $my_data['data'] = "</div></div>";
            $this->load->view('admin_views/fake_view',$my_data);
            $this->load->view('includes/footer');
       }
       else{
           redirect(base_url().'index.php?admin/login');
       }
    }

    function show_subset($subset_id){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin'){
            $this->load->model('set_model');
            $data=$this->set_model->all_questions($subset_id);
            $this->load->model('question_category_model');
            //var_dump($data);

            foreach($data as $row){
                $t_name = $this->question_category_model->get_question_table($row['category_id']);
                $q_id = $row['question_id'];
                $this->show_questions($t_name,$q_id,$subset_id);
            }
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }


   function show_questions($t_name=0,$q_id=0,$subset_id=0){
       if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin'){
            switch($t_name){
                case "select-one_choice_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($t_name,$q_id);
                $my_data['t_name']=$t_name;
                $my_data['q_id']=$q_id;
                $my_data['partition']=1;
                $my_data['create_subset']=1;
                $my_data['subset_id']=$subset_id;
                $this->load->model('set_model');
                $my_data['category_id']=$this->set_model->table_name_to_id($t_name);

                $this->load->view('admin_views/dlt_select-one_choice_question',$my_data);
                break;

                case "select-many_choice_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($t_name,$q_id);
                $my_data['t_name']=$t_name;
                $my_data['q_id']=$q_id;
                $my_data['partition']=1;
                $my_data['create_subset']=1;
                $my_data['subset_id']=$subset_id;
                $this->load->model('set_model');
                $my_data['category_id']=$this->set_model->table_name_to_id($t_name);

                $this->load->view('admin_views/dlt_select-many_choice_question',$my_data);
                break;

                case "select-in_passage_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($t_name,$q_id);
                $my_data['t_name']=$t_name;
                $my_data['q_id']=$q_id;
                $my_data['partition']=1;
                $my_data['create_subset']=1;
                $my_data['subset_id']=$subset_id;
                $this->load->model('set_model');
                $my_data['category_id']=$this->set_model->table_name_to_id($t_name);

                $this->load->view('admin_views/dlt_select-in_passage_question',$my_data);
                break;

                case "three-blank_completion_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($t_name,$q_id);
                $my_data['t_name']=$t_name;
                $my_data['q_id']=$q_id;
                $my_data['partition']=1;
                $my_data['create_subset']=1;
                $my_data['subset_id']=$subset_id;
                $this->load->model('set_model');
                $my_data['category_id']=$this->set_model->table_name_to_id($t_name);

                $this->load->view('admin_views/dlt_three-blank_completion_questions',$my_data);
                break;

                case "two-blank_completion_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($t_name,$q_id);
                $my_data['t_name']=$t_name;
                $my_data['q_id']=$q_id;
                $my_data['partition']=1;
                $my_data['create_subset']=1;
                $my_data['subset_id']=$subset_id;
                $this->load->model('set_model');
                $my_data['category_id']=$this->set_model->table_name_to_id($t_name);

                $this->load->view('admin_views/dlt_two-blank_completion_questions',$my_data);
                break;

                case "one-blank_completion_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($t_name,$q_id);
                $my_data['t_name']=$t_name;
                $my_data['q_id']=$q_id;
                $my_data['partition']=1;
                $my_data['create_subset']=1;
                $my_data['subset_id']=$subset_id;
                $this->load->model('set_model');
                $my_data['category_id']=$this->set_model->table_name_to_id($t_name);

                $this->load->view('admin_views/dlt_one-blank_completion_questions',$my_data);
                break;

                case "one-blank_sentence_completion_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($t_name,$q_id);
                $my_data['t_name']=$t_name;
                $my_data['q_id']=$q_id;
                $my_data['partition']=1;
                $my_data['create_subset']=1;
                $my_data['subset_id']=$subset_id;
                $this->load->model('set_model');
                $my_data['category_id']=$this->set_model->table_name_to_id($t_name);

                $this->load->view('admin_views/dlt_one-blank_sentence_completion_questions',$my_data);
                break;



                //quantitative

                case "quantitative_select-one_choice_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($t_name,$q_id);
                $my_data['t_name']=$t_name;
                $my_data['q_id']=$q_id;
                $my_data['partition']=1;
                $my_data['create_subset']=1;
                $my_data['subset_id']=$subset_id;
                $this->load->model('set_model');
                $my_data['category_id']=$this->set_model->table_name_to_id($t_name);

                $this->load->view('admin_views/dlt_select-one_choice_question',$my_data);
                break;

                case "quantitative_select-many_choice_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($t_name,$q_id);
                $my_data['t_name']=$t_name;
                $my_data['q_id']=$q_id;
                $my_data['partition']=1;
                $my_data['create_subset']=1;
                $my_data['subset_id']=$subset_id;
                $this->load->model('set_model');
                $my_data['category_id']=$this->set_model->table_name_to_id($t_name);

                $this->load->view('admin_views/dlt_select-many_choice_question',$my_data);
                break;

                case "quantitative_comparison_questions":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($t_name,$q_id);
                $my_data['t_name']=$t_name;
                $my_data['q_id']=$q_id;
                $my_data['partition']=1;
                $my_data['create_subset']=1;
                $my_data['subset_id']=$subset_id;
                $this->load->model('set_model');
                $my_data['category_id']=$this->set_model->table_name_to_id($t_name);

                $this->load->view('admin_views/dlt_quantitative_comparison_questions',$my_data);
                break;

                case "quantitative_numeric_entry_questions_one_answer":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($t_name,$q_id);
                $my_data['t_name']=$t_name;
                $my_data['q_id']=$q_id;
                $my_data['partition']=1;
                $my_data['create_subset']=1;
                $my_data['subset_id']=$subset_id;
                $this->load->model('set_model');
                $my_data['category_id']=$this->set_model->table_name_to_id($t_name);

                $this->load->view('admin_views/dlt_quantitative_numeric_entry_questions_one_answer',$my_data);
                break;

                case "quantitative_numeric_entry_questions_fraction_answer":
                $this->load->model('dlt_question_model');
                $my_data['data']=$this->dlt_question_model->ques_query($t_name,$q_id);
                $my_data['t_name']=$t_name;
                $my_data['q_id']=$q_id;
                $my_data['partition']=1;
                $my_data['create_subset']=1;
                $my_data['subset_id']=$subset_id;
                $this->load->model('set_model');
                $my_data['category_id']=$this->set_model->table_name_to_id($t_name);

                $this->load->view('admin_views/dlt_quantitative_numeric_entry_questions_fraction_answer',$my_data);
                break;
            }
       }
       else{
           redirect(base_url().'index.php?admin/login');
       }
    }
     function test_set($type,$set_id){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            //<div style="border-left-style: solid"></div>
           $my_data['data'] = "<div  class='span8'
                                    style='border-left-style: outset; margin-left: 1%; margin-right: 1%;
                               '>
                    <h3 class='btn-primary btn-large' align='center'
                               style='margin-left:3%;margin-bottom:10px;margin-top:15px;
                               '>Subsets in Current Set</h3>
                       <div id='sub_set_qus'>";
            $this->load->view('admin_views/fake_view',$my_data);
            $this->set_right_view($type,$set_id);
            $my_data['data'] = "</div></div>";
            $this->load->view('admin_views/fake_view',$my_data);
            $this->load->view('includes/footer');
       }
       else{
           redirect(base_url().'index.php?admin/login');
       }
    }
    function set_right_view($type,$set_id){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->load->model('set_model');
            $my_data['data']=$this->set_model->all_subsets($type,$set_id);
            $my_data['set_id']=$set_id;
            $my_data['type']=$type;
            //var_dump($data);
            $this->load->view('admin_views/set_right_side_view',$my_data);
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }
    function show_set($type,$set_id){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $header_data['page_title'] = 'GRE | Create Question';
            $this->load->view('includes/header', $header_data);
            $this->load->view('top_navigations/top_navigation_for_admin');
            $my_data['set_id']=$set_id;
            $my_data['type']=$type;
            $this->load->view('admin_views/set_view',$my_data);
            $this->test_set($type,$set_id);
            $this->load->view('includes/footer');
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }
    function set_left_view($set_type,$set_id,$type,$start=0){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $limit=20;


            $this->load->model('set_model');
            $my_data['data']=$this->set_model->subset_list($type,$start,$limit);
            $my_data['type']=$type;
            $my_data['set_id']=$set_id;
            $my_row = $this->set_model->sub_set_in_set($set_type,$set_id);
            foreach($my_row as $row){
                $my_tmp[$row['subset_id']]=1;
            }
            if(isset($my_tmp))$my_data['my_tmp']=$my_tmp;
                $this->load->view('admin_views/set_subset_table',$my_data);

                $this->load->library('pagination_modified');
                $config['base_url'] ="";

                $table_name="subset";

                $this->load->model('set_model');
                $config['total_rows'] = $this->set_model->table_row_number($table_name,$type);
                $config['per_page'] = $limit;
                $config['num_tag_open'] = '<li onclick="qus_function_two('.$type.',';
                $config['num_tag_close'] = ' </li>';
                $config['last_tag_open'] = '<li onclick="qus_function_two('.$type.',';
                $config['last_tag_close'] = ' </li>';
                $config['first_tag_open'] = '<li onclick="qus_function_two('.$type.',';
                $config['first_tag_close'] = ' </li>';


                $this->pagination_modified->initialize($config);
                $this->load->view('admin_views/pagination_view_modified');
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }

    function add_question_to_subset($subset_id,$segment_id,$question_id){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->load->model('set_model');
            $this->set_model->add_question_to_subset($subset_id,$segment_id,$question_id);
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }
    function add_question_to_set($type,$set_id,$subset_id){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->load->model('set_model');
            $this->set_model->add_question_to_set($type, $set_id, $subset_id);
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }
    function remove_question_from_subset($subset_id,$segment_id,$question_id){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->load->model('set_model');
            $this->set_model->remove_question_from_subset($subset_id,$segment_id,$question_id);
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }
    function remove_question_from_set($type,$set_id,$subset_id){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->load->model('set_model');
            $this->set_model->remove_question_from_set($type,$set_id,$subset_id);
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }
    function move_up_subset($type,$set_id,$subset_id){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->load->model('set_model');
            $this->set_model->move_up_subset($type,$set_id,$subset_id);
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }
    function move_down_subset($type,$set_id,$subset_id){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $this->load->model('set_model');
            $this->set_model->move_down_subset($type,$set_id,$subset_id);
        }
        else{
            redirect(base_url().'index.php?admin/login');
        }
    }

}


?>
