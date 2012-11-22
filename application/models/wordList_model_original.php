<?php

/* * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class wordList_model extends CI_Model {

    public function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function wordList_all() {
        $query = $this->db->query("SELECT * FROM wordlist ORDER by word");
        //var_dump($query->result_array());
        //echo "fine";
        //echo $this->table->generate($query);
        return $query->result_array();
    }

    public function restricted_wordList($var) {

        $ttl_word = 0;
        $i = 'A';
        while (true) {
            $this->db->select('count(*) as task_count');
            $this->db->from('wordlist');
            $this->db->like('word', $i, 'after');
            $query = $this->db->get();

            foreach ($query->result() as $row) {
                $word_number[$i] = $row->task_count;
            }
            //...........................................
            //echo $i . " = " . $word_number[$i] . "<br/>";
            //...........................................
            $ttl_word+=$word_number[$i];
            if ($var[$i] > $word_number[$i])$var[$i] = $word_number[$i];
            if ($i=='Z')break;
            $i++;
        }


        if ($var['total']== - 1) {
            for($i = 'A'; ; $i++) {
                if ($var[$i]== - 1)
                    $qury = "SELECT word,meaning FROM wordlist WHERE word LIKE'" . $i . "%' ORDER by word ";
                else
                    $qury="SELECT word,meaning FROM wordlist WHERE word LIKE'" . $i . "%' ORDER by word LIMIT " . $var[$i];
                $query = $this->db->query($qury);
                $res[$i] = $query->result_array();
                if($i=='Z')break;
            }
        }
        else {
            $ttl = 0;
            for ($i = 'A'; ; $i++) {
                if ($var[$i]>0)
                    $ttl+=$var[$i];
                if($i=='Z')break;
            }
            if ($ttl > $var['total']) {
                $ttl_result=0;
                for ($i = 'A'; ; $i++) {
                    if ($var[$i] > 0) {
                        $tmp = $var['total'] * $var[$i];
                        $lim = ($tmp - ($tmp % $ttl)) / $ttl;
                        $ttl_result+=$lim;
                        $var[$i]=$lim;
                    }
                    if($i=='Z')break;
                }
                $my=$var['total']-$ttl_result;
                for($i='A';;$i++){
                    if($var[$i]!=-1 && $my>0 && $var[$i]<$word_number[$i]){
                        $var[$i]++;
                        $my--;
                        $qury = "SELECT word,meaning FROM wordlist WHERE word LIKE'" . $i . "%' ORDER by word LIMIT ".$var[$i];
                        $query = $this->db->query($qury);
                        $res[$i] = $query->result_array();
                    }
                    else if($var[$i]>0){
                        $qury = "SELECT word,meaning FROM wordlist WHERE word LIKE'" . $i . "%' ORDER by word LIMIT ".$var[$i];
                        $query = $this->db->query($qury);
                        $res[$i] = $query->result_array();
                    }
                    if($i=='Z')break;
                }
            } else {
                $var['total']-=$ttl;
                $ttl_result=0;
                for ($i = 'A'; ; $i++) {
                    if ($var[$i]== - 1) {
                        $tmp = $word_number[$i] * $var['total'];
                        $lim = ($tmp - ($tmp % $ttl_word)) / $ttl_word;
                        $ttl_result+=$lim;
                        $my_tmp[$i]=$lim;
                    }
                    else $my_tmp[$i]=0;
                    if($i=='Z')break;
                }
                $my=$var['total']-$ttl_result;
                for($i='A';;$i++){
                    if($var[$i]==-1 && $my>0 && $my_tmp[$i]<$word_number[$i]){
                        $my--;
                        $my_tmp[$i]++;
                        $qury="SELECT word,meaning FROM wordlist WHERE word LIKE'" . $i . "%' ORDER by word LIMIT ".$my_tmp[$i];
                    }
                    else if($var[$i]==-1){
                        $qury="SELECT word,meaning FROM wordlist WHERE word LIKE'" . $i . "%' ORDER by word LIMIT ".$my_tmp[$i];
                    }
                    else{
                        $qury="SELECT word,meaning FROM wordlist WHERE word LIKE'" . $i . "%' ORDER by word LIMIT ".$var[$i];
                    }
                    $query = $this->db->query($qury);
                    $res[$i] = $query->result_array();
                    if($i=='Z')break;
                }
            }
        }
        return $res;
    }

}
?>
