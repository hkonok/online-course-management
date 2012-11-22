<div  class='span8' style=" margin-left: 1%; margin-right: 1%;">
    <h3 class='btn-primary btn-large' align='center' style='margin-bottom:10px;margin-top:15px;'>Add Questions to Subset</h3>
<div >
    <?php
    if(isset($type) && $type>=15 && $type<=18){
        echo '<div align="center" >
        <select  onclick="question_category(this.value)" >
        <option value="-1">Select Question Type</option>';
         if($type == 15 || $type == 18) echo '<option value="1">Verbal Reasoning</option>';
         if($type == 16 || $type == 18) echo '<option value="2" >Quantitative Reasoning</option>';
         if($type == 17 || $type == 18) echo '<option value="3" >Analytical Writting</option>';
        echo '</select>
        </div>';
    }
    ?>
    <div id="question_category_id" align="center">
        <?php
            if(isset($type) && $type>=1 && $type <=14){
               echo '<select  onclick="qus_function_two(this.value,0)" >
                <option value="-1">Select Question</option>';

                if($type==1 ) echo'<option value="1">MCQ Select One Answer Choice</option>';
                if($type==2 ) echo'<option value="2" >MCQ Select One or More Answer Choice</option>';
                if($type==3 ) echo'<option value="3" >Select-in-Passage</option>';
                if($type==4 ) echo'<option value="4" >Three-Blank Text Completion Question</option>';
                if($type==5 ) echo'<option value="5" >Two-Blank Text Completion Question</option>';
                if($type==6 ) echo'<option value="6" >Single-Blank Text Completion Question</option>';
                if($type==7 ) echo'<option value="7" >Sentence Equivalence Question</option>';

                if($type==8 ) echo'<option value="8">Quantitative Comparison Questions</option>';
                if($type==9 ) echo'<option value="9" >MCQ Select One Answer Choice</option>';
                if($type==10) echo'<option value="10" >MCQ Select One or More Answer Choice</option>';
                if($type==11) echo'<option value="11" >Numeric Entry Questions Integer or Decimal Answer</option>';
                if($type==12) echo'<option value="12" >Numeric Entry Questions Fraction Answer</option>';


                if($type==13) echo '<option value="13">An Analyze an Issue task</option>';
                if($type==14) echo '<option value="14">An Analyze an Argument task</option>';

                echo '</select>';
            }
            
        ?>
    </div>
</div>

    <div id="qus_div" >


</div>
</div>
    


<script>
    var xmlhttp;
    function load_qus(url,cfunc)
    {
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=cfunc;
        xmlhttp.open("GET",url,true);
        xmlhttp.send();
    }
    function qus_function(str)
    {
        load_qus("<?php echo base_url() ;?>index.php?sub_set_view/qus_type/<?php echo $subset_id; ?>/"+str,function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("qus_div").innerHTML=xmlhttp.responseText;
            }
        });
    }
    function qus_function_two(str,str2)
    {
        if(str=="-1"){
             document.getElementById("qus_div").innerHTML="";
            return;
        }
        load_qus("<?php echo base_url(); ?>index.php?sub_set_view/qus_type/<?php echo $subset_id; ?>/"+str+"/"+str2,function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("qus_div").innerHTML=xmlhttp.responseText;
            }
        });
    }
    function question_category(str)
    {
        if(str == "-1"){
            document.getElementById("question_category_id").innerHTML="";
            qus_function_two("-1","-1");
        }
        else{
            if(str=='1'){
                document.getElementById("question_category_id").innerHTML=
                                         '<select  onclick="qus_function_two(this.value,0)" >'+
                                         '<option value="-1">Select Question</option>'+
                                         '<option value="1">MCQ Select One Answer Choice</option>'+
                                         '<option value="2" >MCQ Select One or More Answer Choice</option>'+
                                         '<option value="3" >Select-in-Passage</option>'+
                                         '<option value="4" >Three-Blank Text Completion Question</option>'+
                                         '<option value="5" >Two-Blank Text Completion Question</option>'+
                                         '<option value="6" >Single-Blank Text Completion Question</option>'+
                                         '<option value="7" >Sentence Equivalence Question</option>'+
                                         '</select>';
                                     qus_function_two("-1","-1");
            }
            if(str == '2'){
                document.getElementById("question_category_id").innerHTML=
                                         '<select  onclick="qus_function_two(this.value,0)" >'+
                                         '<option value="-1">Select Question</option>'+
                                         '<option value="8">Quantitative Comparison Questions</option>'+
                                         '<option value="9" >MCQ Select One Answer Choice</option>'+
                                         '<option value="10" >MCQ Select One or More Answer Choice</option>'+
                                         '<option value="11" >Numeric Entry Questions Integer or Decimal Answer</option>'+
                                         '<option value="12" >Numeric Entry Questions Fraction Answer</option>'+
                                         '</select>';
                                     qus_function_two("-1","-1");
            }
            if(str=='3'){
                document.getElementById("question_category_id").innerHTML=
                                         '<select  onclick="qus_function_two(this.value,0)" >'+
                                         '<option value="-1">Select Question</option>'+
                                         '<option value="13">An Analyze an Issue task</option>'+
                                         '<option value="14">An Analyze an Argument task</option>'+
                                         '</select>';
                                     qus_function_two("-1","-1");
            }
        }
    }

    function add_question_to_subset(subset_id,segment_id,question_id)
    {
        if(subset_id == "" || segment_id == "" || question_id == "")return ;
        
        load_qus("<?php echo base_url(); ?>index.php?create_subset/add_question_to_subset/"+subset_id+"/"+segment_id+"/"+question_id+"/",function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("my_qus_id"+question_id).innerHTML=
                                        "<input type='submit' class='btn btn-large btn-info' value='Added to Subset'/>";
                subset_view(subset_id);
            }
        });
    }
    function remove_question_from_subset(subset_id,segment_id,question_id)
    {
        if(subset_id == "" || segment_id == "" || question_id == "")return ;
        
        load_qus("<?php echo base_url(); ?>index.php?create_subset/remove_question_from_subset/"+subset_id+"/"+segment_id+"/"+question_id+"/",function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
               
                subset_view(subset_id);
            }
        });
    }

    function subset_view(subset_id){
        if(subset_id == "")return;
        load_qus("<?php echo base_url(); ?>index.php?create_subset/test/"+subset_id+"/",function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("my_subset_view").innerHTML=xmlhttp.responseText;
            }
        });
    }
</script>