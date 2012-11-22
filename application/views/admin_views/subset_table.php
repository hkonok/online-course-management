<div class=" container" align=" center">
  
        <div  align=" center">
            <table  align=" center" class='table table-bordered table-striped' style=" margin-left: 1%; margin-right: 1%; margin-bottom: 20px;">
              <tr  class='error'  style ='font-size:16px;'>
                <th class=' btn-inverse'>Serial No</th>
                <th class=' btn-inverse'>Name</th>
                <th class=' btn-inverse'>Data and time</th>
                <th class=' btn-inverse'>Manage Subset</th>
                <th class=' btn-inverse'>Delete Subset</th>
              </tr>
            
            <?php
            foreach($data as $row){
                echo "
                  <tr   style ='font-size:16px;'>";
                echo "
                    <td >".$row['id']."</td>
                    <td >".$row['name']."</td>
                    <td >".$row['time_date']."</td>
                    <td ><a class='btn btn-success' href='".base_url()."index.php?create_subset/index/".$row['id']."/".$type."/' >manage</a></td>
                    <td ><a class='btn  btn-danger' onClick='return deleteConfirmation()' href='".base_url()."/index.php?create_subset/dlt_subset/".$row['type']."/".$row['id']."/'>delete</a></td>
                  </tr>";
             }
              ?>
            </table>
            </div>
        </div>

<script>
    function deleteConfirmation()
    {
    var x;
    var r=confirm("Delete This Subset?");
    if (r==true)
      {
        return true;
      }
    else
      {
        return false;
      }
    }
</script>