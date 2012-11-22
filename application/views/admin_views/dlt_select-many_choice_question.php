<div >
    <?php
       foreach($data as $qus):

          $option['A']=trim(strtok($qus['options'],"|"));

          if($option['A']==trim($qus['correct_answer'])){
              $correct_answer_option="A. ";
          }
          for($i='B'; ;$i++){
              $tmp=strtok("|");
              if($tmp==NULL or $tmp=="")break;
              $tmp=trim($tmp);
                $option[$i]=$tmp;
                if($option[$i]==trim($qus['correct_answer']))
                    $correct_answer_option = $correct_answer_option.$i.". ";
          }
          $option[$i]="";
    ?>
    <?php
    if(!isset($partition)){
        echo "
        <div style='background-color: #f5f6f6; margin-left: 23%;
                    margin-right: 10%; padding: 1%; border-right-style:  hidden;
                    margin-bottom:20px;'>
        ";
    }
    else{
        echo "
        <div style='background-color: #f5f6f6; margin-left: 4%;
                    margin-right: 1%; padding: 1%; border-right-style:  hidden;
                    margin-bottom:20px;'>
        ";
    }
    echo "<fieldset>
            <legend>Question</legend>
            <div style=' padding-left: 5%;'>";
                    if(isset ($qus['question']))echo $qus['question'];
                    echo "</div>
            <legend>Options</legend>
            <div style=' padding-left: 5%;'>";

                    for($i='A'; ;$i++){
                        if($option[$i]=="")break;
                        echo "<b>".$i.". </b>".$option[$i]."<br/>";
                    }

           echo "
            </div>
            <legend>Answer</legend>
            <div style='padding-left: 5%;'>";
                    if($qus['correct_answer']=="")echo "correct answer not given.";
                    else {
                        $ca['1']=strtok($qus['correct_answer'],"|");
                        for($i=2;;$i++){
                            $ca[$i]=strtok("|");
                            if($ca[$i]=="")break;
                        }
                        for($j=1;$j<$i;$j++)
                        echo "<p><b>".$j.") </b>".$ca[$j]."</p>";
                    }

            echo "
                </div>";
           echo "

            <legend></legend>
            <div style='display:inline;'>";
           if (!isset($create_subset)) {
             echo "
                <form style='display:inline;' action='".base_url()."index.php?dlt_questions/dlt_final/' method='post'>
                    <input name='t_name'  type='hidden'  value='".$t_name."' />
                    <input name='q_id'  type='hidden'  value='".$q_id."' />
                    <input type='submit' class='btn btn-large btn-danger' value='Permanently Delete Question?'/>
                </form>
                ";
            }
            else{
                 $str="onclick='remove_question_from_subset(".$subset_id.",".$category_id.",".$q_id.")'";
                 echo "<input ".$str." type='submit' class='btn btn-large btn-danger' value='Remove Question'/>";
            }
            echo "
            </div>
        </fieldset>
    </div>";
     endforeach; ?>

</div>
 