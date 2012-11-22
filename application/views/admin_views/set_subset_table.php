
  
        <div  align=" center">
            <table  align=" center" class='table table-bordered table-striped' style=" margin-left: 1%; margin-right: 1%; margin-bottom: 20px;">
              <tr  class='error'  style ='font-size:16px;'>
                <th class=' btn-inverse'>Serial No</th>
                <th class=' btn-inverse'>Name</th>
                <th class=' btn-inverse'>Date and time</th>
                <th class=' btn-inverse'>Manage Subset</th>
              </tr>
            
            <?php
            foreach($data as $row){
                echo "
                  <tr   style ='font-size:16px;'>";
                echo "
                    <td >".$row['id']."</td>
                    <td >".$row['name']."</td>
                    <td >".$row['time_date']."</td>
                    <td >    ";
                    if(!isset($my_tmp[$row['id']])){
                        $str="onclick='add_question_to_set(".$set_id.",".$row['id'].")'";
                        echo "<div id='my_qus_id".$row['id']."'><input ".$str." type='submit' class='btn  btn-success' value='Add to Set'/></div>";
                    }
                    else {
                        echo "
                            <input type='submit' class='btn  btn-info' value='Added to Set'/>
                        ";
                    }
                echo "
                    </td>
                    </tr>";
             }
              ?>
            </table>
            </div>