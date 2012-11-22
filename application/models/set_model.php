<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class set_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    function all_questions($set_id){
        $qury=$this->db->where('subset_id',$set_id)
                 ->order_by('sequence','asc')
                 ->get('question_subset_for_mock');
    
        return $qury->result_array();
    }

    function all_subsets($type,$set_id){
        if($type==1)$tname = 'subsets_of_sets_for_mocktest';
        else $tname = 'subsets_of_sets_for_practicetest';
        $qury=$this->db->where('set_id',$set_id)
                       ->order_by("sequence", "asc")
                       ->get($tname);
        return $qury->result_array();
    }


   function restricted_subset_q_ids($subset_id,$t_name){
        $category_id=$this->table_name_to_id($t_name);
        $qury = $this->db->where('subset_id',$subset_id)
                         ->where('category_id',$category_id)
                         ->get(' question_subset_for_mock');
        return $qury->result_array();
    }
    public function table_name_to_id($t_name) {

        $data = $this->db->select('id')
                        ->where('question_table', $t_name)
                        ->get('question-categories')
                        ->row_array();
        return $data['id'];
    }

    function add_question_to_subset($subset_id,$segment_id,$question_id){
        $qury = $this->db->select_max('sequence')
                 ->where('subset_id',$subset_id)
                 ->get('question_subset_for_mock');
        if($qury == NULL){
            $tmp=0;
        }
        else{
              $row = $qury->row_array();
              $tmp=$row['sequence'];
        }
        $tmp++;
        $qus=array('subset_id'=>$subset_id,'sequence'=>$tmp,'category_id'=>$segment_id,'question_id'=>$question_id);
        $this->db->insert('question_subset_for_mock', $qus);
    }
    function add_question_to_set($type,$set_id,$subset_id){
        if($type==1)$tname = 'subsets_of_sets_for_mocktest';
        else $tname = 'subsets_of_sets_for_practicetest';
        $qury = $this->db->select_max('sequence')
                 ->where('set_id',$set_id)
                 ->get($tname);
        if($qury == NULL){
            $tmp=0;
        }
        else{
              $row = $qury->row_array();
              $tmp=$row['sequence'];
        }
        $tmp++;
        $qus=array('set_id'=>$set_id,'sequence'=>$tmp,'subset_id'=>$subset_id);
        $this->db->insert($tname, $qus);
    }
    function remove_question_from_subset($subset_id,$segment_id,$question_id){
        $this->db->where('subset_id',$subset_id)
                 ->where('category_id',$segment_id)
                 ->where('question_id',$question_id)
                 ->delete('question_subset_for_mock');
    }
    function remove_question_from_set($type, $set_id, $subset_id){
        if($type==1)$tname = 'subsets_of_sets_for_mocktest';
        else $tname = 'subsets_of_sets_for_practicetest';
        $this->db->where('set_id',$set_id)
                 ->where('subset_id',$subset_id)
                 ->delete($tname);
    }
    function move_up_subset($type,$set_id,$subset_id){
        if($type==1)$tname = 'subsets_of_sets_for_mocktest';
        else $tname = 'subsets_of_sets_for_practicetest';
        $qury = $this->db->where('set_id',$set_id)
                 ->where('subset_id',$subset_id)
                 ->get($tname);
        $row = $qury->row_array();

        $qury2 = $this->db->where('set_id', $set_id)
                         ->where('sequence <',$row['sequence'])
                         ->order_by("sequence", "desc")
                         ->get($tname);
        $row2 = $qury2->row_array();

        if(isset($row2['set_id'])){
            $data = array(
                        'sequence' => $row2['sequence']
                    );
            $data2 = array(
                        'sequence' => $row['sequence']
                    );
            $this->db->where('set_id',$set_id)
                     ->where('subset_id',$subset_id)
                     ->update($tname,$data);
            $this->db->where('set_id', $row2['set_id'])
                     ->where('subset_id', $row2['subset_id'])
                     ->update($tname,$data2);
        }
    }
    function move_down_subset($type,$set_id,$subset_id){
        if($type==1)$tname = 'subsets_of_sets_for_mocktest';
        else $tname = 'subsets_of_sets_for_practicetest';
        $qury = $this->db->where('set_id',$set_id)
                 ->where('subset_id',$subset_id)
                 ->get($tname);
        $row = $qury->row_array();

        $qury2 = $this->db->where('set_id', $set_id)
                         ->where('sequence >',$row['sequence'])
                         ->order_by("sequence", "inc")
                         ->get($tname);
        $row2 = $qury2->row_array();

        if(isset($row2['set_id'])){
            $data = array(
                        'sequence' => $row2['sequence']
                    );
            $data2 = array(
                        'sequence' => $row['sequence']
                    );
            $this->db->where('set_id',$set_id)
                     ->where('subset_id',$subset_id)
                     ->update($tname,$data);
            $this->db->where('set_id', $row2['set_id'])
                     ->where('subset_id', $row2['subset_id'])
                     ->update($tname,$data2);
        }
    }
    function create_subset($type){
        $this->load->helper('date');
        $timestamp = now();
        $timezone = 'UM6';
        $daylight_saving = FALSE;
        $tmp= date("y-m-d h-i-s", gmt_to_local($timestamp, $timezone, $daylight_saving));
        
        $data=array('id'=>null,'type'=>$type,'name'=>$this->input->post('name',TRUE),'time_date'=>$tmp);
        $this->db->insert('subset', $data);
        return $this->db->insert_id();
    }
    function create_set($type){
        if($type==1)$tname = 'set_for_mock';
        else $tname = 'set_for_practice';
        $this->load->helper('date');
        $timestamp = now();
        $timezone = 'UM6';
        $daylight_saving = FALSE;
        $tmp= date("y-m-d h-i-s", gmt_to_local($timestamp, $timezone, $daylight_saving));

        $data=array('id'=>null,'name'=>$this->input->post('name',TRUE),'date_time'=>$tmp);
        $this->db->insert($tname, $data);
        
        return $this->db->insert_id();
    }
    function subset_list($type,$start,$limit){
        $qury=$this->db->where('type',$type)
                       ->order_by("id", "desc")
                       ->limit($limit,$start)
                       ->get('subset');
    
        return $qury->result_array();
    }
    function set_list($type,$start,$limit){
        if($type==1)$tname = 'set_for_mock';
        else $tname = 'set_for_practice';
        $qury=$this->db->order_by("id", "desc")
                       ->limit($limit,$start)
                       ->get($tname);

        return $qury->result_array();
    }
    public function table_row_number($table_name,$type){
       $query=$this->db->where('type',$type)
                       ->get($table_name);
       return $query->num_rows();
   }
   public function table_set_row_number($table_name,$type){
       if($type==1)$tname = 'set_for_mock';
       else $tname = 'set_for_practice';
       $query=$this->db->get($tname);
       return $query->num_rows();
   }
   function my_subset($subset_id){
     return  $this->db->where('id',$subset_id)
                ->get('subset')->row_array();
   }
   function sub_set_in_set($type,$set_id){
       if($type==1)$tname = 'subsets_of_sets_for_mocktest';
       else $tname = 'subsets_of_sets_for_practicetest';

       $qury=$this->db->where('set_id',$set_id)
                      ->get($tname);
       return $qury->result_array();
   }
   function dlt_subset($id){
       $this->db->where('id',$id)
                ->delete('subset');
   }
   function dlt_set($id){
       $this->db->where('id',$id)
                ->delete('set_for_mock');
   }
}


?>
