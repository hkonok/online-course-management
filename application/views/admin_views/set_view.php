<div  class='span8' style=" margin-left: 1%; margin-right: 1%;">
    <h3 class='btn-primary btn-large' align='center' style='margin-bottom:10px;margin-top:15px;'>Add Subset to Set</h3>
<div >
        <div align="center" >
        <select  onclick="question_category(this.value)" >
        <option value="-1">Select Subset Type</option>
        <option value="1">Verbal Reasoning</option>
        <option value="2" >Quantitative Reasoning</option>
        <option value="3" >Analytical Writting</option>
        <option value="4" >Mixed Type</option>
        </select>
        </div>

    <div id="question_category_id" align="center">
        
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

  function qus_function_two(str,str2)
    {
      
        if(str=="-1"){
             document.getElementById("qus_div").innerHTML="";
            return;
        }
        
        load_qus("<?php echo base_url(); ?>index.php?create_subset/set_left_view/<?php echo $type."/".$set_id; ?>/"+str+"/"+str2,function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("qus_div").innerHTML=xmlhttp.responseText;
            }
        });
      //  alert("I am an alert box!");
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
                                         '<option value="-1">Select Subset</option>'+
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
                                         '<option value="-1">Select Subset</option>'+
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
                                         '<option value="-1">Select Subset</option>'+
                                         '<option value="13">An Analyze an Issue task</option>'+
                                         '<option value="14">An Analyze an Argument task</option>'+
                                         '</select>';
                                     qus_function_two("-1","-1");
            }
             if(str=='4'){
                document.getElementById("question_category_id").innerHTML=
                                         '<select  onclick="qus_function_two(this.value,0)" >'+
                                         '<option value="-1">Select Subset</option>'+
                                         '<option value="15">Verbal Reasoning</option>'+
                                         '<option value="16">Quantitative Reasoning</option>'+
                                         '<option value="17">Analytical Writting</option>'+
                                         '<option value="18">Mixed Type Subset</option>'+
                                         '</select>';
                                     qus_function_two("-1","-1");
            }
        }
    }

    function add_question_to_set(set_id,subset_id)
    {
        
        
        if(set_id == "" || subset_id == "")return ;

        load_qus("<?php echo base_url(); ?>index.php?create_subset/add_question_to_set/<?php echo $type."/"; ?>"+set_id+"/"+subset_id+"/",function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("my_qus_id"+subset_id).innerHTML=
                                        "<input type='submit' class='btn btn-info' value='Added to Set'/>";
                set_view(set_id);
            }
        });
    }
    function remove_question_from_set(set_id,subset_id)
    {
        if(set_id == "" || subset_id == "" )return ;

        load_qus("<?php echo base_url(); ?>index.php?create_subset/remove_question_from_set/<?php echo $type."/"; ?>"+set_id+"/"+subset_id+"/",function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {

                set_view(set_id);
            }
        });
    }
    function move_up_subset(set_id,subset_id)
    {
        if(set_id == "" || subset_id == "" )return ;

        load_qus("<?php echo base_url(); ?>index.php?create_subset/move_up_subset/<?php echo $type."/"; ?>"+set_id+"/"+subset_id+"/",function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {

                set_view(set_id);
            }
        });
    }
    function move_down_subset(set_id,subset_id)
    {
        if(set_id == "" || subset_id == "" )return ;

        load_qus("<?php echo base_url(); ?>index.php?create_subset/move_down_subset/<?php echo $type."/"; ?>"+set_id+"/"+subset_id+"/",function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {

                set_view(set_id);
            }
        });
    }
    function set_view(set_id){
     
        if(set_id == "")return;
        load_qus("<?php echo base_url(); ?>index.php?create_subset/set_right_view/<?php echo $type."/"; ?>"+set_id+"/",function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                //alert("I am an alert box!");
                document.getElementById("sub_set_qus").innerHTML=xmlhttp.responseText;
            }
        });
    }

</script>