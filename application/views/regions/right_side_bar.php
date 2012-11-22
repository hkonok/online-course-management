<div class="container">
    <div class="row">
        <div class="span4">
            <table class='table table-bordered ' style='width:500px;margin-left:20%;margin-right:20%;'>
              <tr  class='error' style='background-color:#6E8B3D;'>
                <th>word</th>
                <th>Description</th>
              </tr>
              <?php
              for($i=0;$i<100;$i++)
              echo "
              <tr  class='error' style='background-color:#6E8B3D;'>
                <th>word</th>
                <th>Description</th>
              </tr>";
              ?>
              </table>
        </div>
        
        <div class="span4" style=" margin-left: 50%; padding: 10px; border-style:  ridge; float: right; background-color:  #f2f3f4; border: 2px; border-color: black; position: fixed;">
            <h2>Column one</h2>
            <p style="  color:black; font-size: 125%; font-weight: bold;" >
            Number of Words
            </p>
            
        </div>
    </div>
</div>