<div >
    
    <?php
     foreach($data as $qus):
     if(!isset($partition)){
        echo "

            <div style='background-color: #f5f6f6; margin-left: 23%;
                        margin-right: 10%; padding: 1%; border-right-style:  hidden;
                        margin-bottom:20px;'
            >";
    }
    else{
        echo "

            <div style='background-color: #f5f6f6; margin-left: 1%;
                        margin-right: 1%; padding: 1%; border-right-style:  hidden;
                        margin-bottom:20px;'
            >";
    }

      echo "  <fieldset>
            <legend>Question</legend>
            <div style=' padding-left: 5%;'>";
                    if(isset ($qus['question']))echo $qus['question'];
                    echo "</div>
            <legend>Blank-One Options</legend>
            <div style=' padding-left: 5%;'>";
                    $option['A']=trim(strtok($qus['blank_one_options'],"|"));
                    for($i='B';$i<='C';$i++){
                        $option[$i] = trim(strtok("|"));
                    }

                    for($i='A';$i<='C';$i++){
                        if($option[$i]=="")break;
                        echo "<b>".$i.". </b>".$option[$i]."<br/>";
                    }
              echo "
                  </div>
                  <legend>Blank-Two Options</legend>
            <div style=' padding-left: 5%;'>";
                    $option['A']=trim(strtok($qus['blank_two_options'],"|"));
                    for($i='B';$i<='C';$i++){
                        $option[$i] = trim(strtok("|"));
                    }

                    for($i='A';$i<='C';$i++){
                        if($option[$i]=="")break;
                        echo "<b>".$i.". </b>".$option[$i]."<br/>";
                    }
              echo "
                  </div>
                  <legend>Blank-Three Options</legend>
            <div style=' padding-left: 5%;'>";
                    $option['A']=trim(strtok($qus['blank_three_options'],"|"));
                    for($i='B';$i<='C';$i++){
                        $option[$i] = trim(strtok("|"));
                    }

                    for($i='A';$i<='C';$i++){
                        if($option[$i]=="")break;
                        echo "<b>".$i.". </b>".$option[$i]."<br/>";
                    }

           echo "
            </div>
            <legend>Answer Blank-One</legend>
            <div style='padding-left: 5%;'>";
                    
                        echo "<p>".$qus['blank_one_correct_answer']."</p>";
                   
                
            echo "
                </div>";
            echo "
            <legend>Answer Blank-Two</legend>
            <div style='padding-left: 5%;'>";

                        echo "<p>".$qus['blank_two_correct_answer']."</p>";


            echo "
                </div>";
            echo "
            <legend>Answer Blank-Three</legend>
            <div style='padding-left: 5%;'>";

                        echo "<p>".$qus['blank_three_correct_answer']."</p>";


            echo "
                </div>";
           echo "
            <legend></legend>
            <div style='display:inline;'>";
            if(!isset($subset_id)){
               echo "
            <form style='display:inline;' action='".base_url()."index.php?edit_questions/' method='post'>
                <input name='t_name'  type='hidden'  value='".$t_name."' />
                <input name='q_id'  type='hidden'  value='".$qus['id']."' />
                <input type='submit' class='btn btn-large btn-success' value='Edit Question'/>
            </form>
            <form style='display:inline;' action='".base_url()."index.php?dlt_questions/' method='post'>
                <input name='t_name'  type='hidden'  value='".$t_name."' />
                <input name='q_id'  type='hidden'  value='".$qus['id']."' />
                <input type='submit' class='btn btn-large btn-danger' value='Delete Question'/>
            </form>
            ";
           }
           else {
              if(!isset($my_map[$qus['id']])){
               $str="onclick='add_question_to_subset(".$subset_id.",".$segment_id.",".$qus['id'].")'";
               echo "<div id='my_qus_id".$qus['id']."'><input ".$str." type='submit' class='btn btn-large btn-success' value='Add to Subset'/></div>";
              }
              else {
                  echo "
                    <input type='submit' class='btn btn-large btn-info' value='Added to Subset'/>
                  ";
              }
           }
           echo "
            </div>
        </fieldset>
    </div>";
     endforeach; ?>
   
</div>
 