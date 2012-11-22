
<div >
    <?php 
       foreach($data as $qus):
          $correct_answer_option="";
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
    ?>
    <?php if(!isset($partition)){
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
            <legend>Quantity A</legend>
            <div style=' padding-left: 5%;'>";
                    if(isset ($qus['quantity_a']))echo $qus['quantity_a'];
                    echo "</div>
            <legend>Quantity B</legend>
            <div style=' padding-left: 5%;'>";
                    if(isset ($qus['quantity_b']))echo $qus['quantity_b'];
                    echo "</div>
            <legend>Options</legend>
            <div style=' padding-left: 5%;'>";

                    for($i='A';$i<='D';$i++){
                        echo "<b>".$i.". </b>";
                        if(isset($option[$i]))echo $option[$i];
                        echo "<br/>";
                    }
                
           echo "
            </div>
            <legend>Answer</legend>
            <div style='padding-left: 5%;'>";
                    if($qus['correct_answer']=="")echo "correct answer not given.";
                    else echo "<b>".$correct_answer_option.")</b> ".$qus['correct_answer'];
                
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
 