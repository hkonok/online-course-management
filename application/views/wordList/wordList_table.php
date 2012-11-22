
<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo $this->table->generate($wordlist);

echo "<div class='container'>
    <div class='row'>
        <div class='span4'>
        <div>
            <table class='table table-bordered table-striped' style='width:500px;margin-left:20%;margin-right:20%;'>
              <tr  class='error'  style ='font-size:16px;'>
                <th class=' btn-inverse'>word</th>
                <th class=' btn-inverse'>Description</th>
                <th class=' btn-inverse'>add word</p></th>
              </tr>
              ";
              $i=0;
              $j=1;
              foreach($wordlist as $row){
              $j++;
              if($i==0){
                $i=1;
                $clr="#A2CD5A";
              }
              else{
                  $i=0;
                  $clr="#BCEE68";
              }
             echo "
             <tr id='".$j."' class='success'  onmouseover='table_word(this.id)' >
                <td id='".$j."x"."'>".$row['word']."</td>
                <td id='".$j."y"."'>".$row['meaning']."</td>
                <td style='width:25%;'><button class='btn btn-success' type='button'>add to my list</button></td>
            </tr>
            ";
              }
echo "
            </table>
            </div>
        </div>

        <div class='span4' style=' margin-left: 50%; padding: 10px; border-style:  ridge; float: right;  border: 2px; border-color: black; position: fixed;'>
             <table class='table table-bordered '>
            <tr >
            <td class='btn-primary'>
            <div>
            <h3 >Word</h3>
            </td>
            </tr>
            <tr>
            <td>
            <p id='my_word1' style='  color:black; font-size: 125%; '></p>
            </td>
            </tr>
            <tr>
            <td class='btn-primary'>
            <h3 >Description</h>
            </td>
            </tr>
            <tr>
            <td>
            <p id='my_word2'  style='  color:black; font-size: 125%;' >
            </p>
            </td>
            </tr>
            </table>
        </div>
    </div>
</div>";
            

?>
