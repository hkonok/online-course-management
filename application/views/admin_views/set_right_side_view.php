
  
        <div  align=" center">
            <table  align=" center" class='table table-bordered table-striped' style=" margin-left: 2%; margin-right: 1%; margin-bottom: 20px;">
              <tr   style ='font-size:16px;'>
                <th class=' btn-inverse'>Serial No</th>
                <th class=' btn-inverse'>Name</th>
                <th class=' btn-inverse'>Date and time</th>
                <th class=' btn-inverse'>Manage Subset</th>
                <th class=' btn-inverse'>Move Up</th>
                <th class=' btn-inverse'>Move Down</th>
              </tr>
            
            <?php
            
            $this->load->model('set_model');
            foreach($data as $row){
                echo "
                  <tr   style ='font-size:16px;'>";
                echo "
                    <td >".$row['subset_id']."</td>";
               $row1=$this->set_model->my_subset($row['subset_id']);
               //var_dump($row1);
                if(isset($row1['name'])){
                  $str = "onclick='remove_question_from_set(".$set_id.",".$row['subset_id'].")'";
                  $str1 = "onclick='move_up_subset(".$set_id.",".$row['subset_id'].")'";
                  $str2 = "onclick='move_down_subset(".$set_id.",".$row['subset_id'].")'";
                echo"
                    <td >".$row1['name']."</td>
                    <td >".$row1['time_date']."</td>
                    <td ".$str."><button class='btn  btn-success' type='button'>Remove</button></td>
                    <td ".$str1."><button class='btn  btn-success' type='button'>Up</button></td>
                    <td ".$str2."><button class='btn  btn-success' type='button'>Down</button></td>
                  </tr>";
               }
             }
              ?>
            </table>
            </div>