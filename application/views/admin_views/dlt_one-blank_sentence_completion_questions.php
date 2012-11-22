
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
                    $option['A']=trim(strtok($qus['options'],"|"));
                    for($i='B';$i<='G';$i++){
                        $option[$i] = trim(strtok("|"));
                    }

                    for($i='A';$i<='G';$i++){
                        if($option[$i]=="")break;
                        echo "<b>".$i.". </b>".$option[$i]."<br/>";
                    }

           echo "
            </div>
            <legend>First Answer</legend>
            <div style='padding-left: 5%;'>";

                        echo "<p>".$qus['first_correct_answer']."</p>";


            echo "
                </div>";
            echo "
                <legend>Second Answer</legend>
            <div style='padding-left: 5%;'>";

                        echo "<p>".$qus['second_correct_answer']."</p>";


            echo "
                </div>";

    echo "
            <legend></legend>
            <div style='display:inline;'>";
    if (!isset($create_subset)) {
        echo "
                <form style='display:inline;' action='" . base_url() . "index.php?dlt_questions/dlt_final/' method='post'>
                    <input name='t_name'  type='hidden'  value='" . $t_name . "' />
                    <input name='q_id'  type='hidden'  value='" . $q_id . "' />
                    <input type='submit' class='btn btn-large btn-danger' value='Permanently Delete Question?'/>
                </form>
                <form style='display:inline;' action='" . base_url() . "index.php?dlt_questions/dlt_final/' method='post'>

                    <a class='btn btn-large btn-success' style='display:inline' href='" . base_url() . "index.php?view_questions/view/" . $t_name . "'>Cancel</a>
                </form>";
    } else {
        $str="onclick='remove_question_from_subset(".$subset_id.",".$category_id.",".$q_id.")'";
        echo "<input ".$str." type='submit' class='btn btn-large btn-danger' value='Remove Question'/>";
    }

    echo "
            </div>
        </fieldset>
    </div>";
endforeach;
    ?>


</div>
