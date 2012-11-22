<?php
class admin_panel extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function views($id){
        if (isset($_SESSION['user_status']) && $_SESSION['user_status'] == 'Admin') {
            $header_data['page_title'] = 'GRE | Create Question';
            $this->load->view('includes/header', $header_data);
            $this->load->view('top_navigations/top_navigation_for_admin');
            $my_data['id']=$id;
            $this->load->view('side_navigations/admin/side_navigation_for_question',$my_data);

            if($id==1){
                $this->load->view('admin_views/create_question_option');
            }
            else if($id==2){
                $this->load->view('admin_views/view_question_option');
            }
            else if($id==3){
                $this->load->view('admin_views/view_subset_option');
            }
            else if($id==4){
               $this->load->view('admin_views/manage_subset');
            }
            else if($id==5){
                $my_data['my_url_1']=base_url()."index.php?create_subset/new_set/1/";
                $my_data['my_url_2']=base_url()."index.php?create_subset/new_set/2/";
                $this->load->view('admin_views/create_set_option',$my_data);
            }
            else if($id==6){
                $my_data['my_url_1']=base_url()."index.php?create_subset/manage_set/1/";
                $my_data['my_url_2']=base_url()."index.php?create_subset/manage_set/2/";
                $this->load->view('admin_views/create_set_option',$my_data);
            }
            $this->load->view('includes/footer');
        }
    else {
        redirect(base_url().'index.php?admin/login');
        }
    }
}

?>
