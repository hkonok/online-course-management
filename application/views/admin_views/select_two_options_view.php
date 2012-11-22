<legend>Insert Options</legend>
<div class="option-group">
    <label class="control-label" for="question_options">Option For A</label>
    <div class="controls">
        <input type="text" class="input-xlarge" name="question_options_select_two[]">
        <a class="btn btn-mini btn-success correct_answer_for_select-two">Correct Answer?</a>
        <span class="confirmation-for-right-options-select-two" style="display:none">ok</span>
        <br/><br/>
    </div>
</div>
<div class="option-group">
    <label class="control-label" for="question_options">Option For B</label>
    <div class="controls">
        <input type="text" class="input-xlarge" name="question_options_select_two[]">
        <a class="btn btn-mini btn-success correct_answer_for_select-two">Correct Answer?</a>
        <span class="confirmation-for-right-options-select-two" style="display:none">ok</span>
        <br/><br/>
    </div>
</div>
<div class="option-group">
    <label class="control-label" for="question_options">Option For C</label>
    <div class="controls">
        <input type="text" class="input-xlarge" name="question_options_select_two[]">
        <a class="btn btn-mini btn-success correct_answer_for_select-two">Correct Answer?</a>
        <span class="confirmation-for-right-options-select-two" style="display:none">ok</span>
        <br/><br/>
    </div>
</div>
<div class="add_option" style="margin-left: 5%"><a class="btn btn-mini btn-primary add_option_button">Add Another Option</a></div>

<script>
    
    $('a.add_option_button').click(function() {
        if($('div.option-group').length==10){
            alert("You can't add more than ten options");
        }
        else{
            var option_div=$('div.option-group').last();
            var last_label=$.trim($(option_div).children('label').html());
            var option_array=new Array('A','B','C','D','E','F','G','H','I','J');
            var new_label='Option for ' + option_array[jQuery.inArray(last_label[last_label.length -1], option_array)+1];
            option_div.clone(true).insertAfter(option_div);
            $('div.option-group').last().children('label').text(new_label);
        }
    });
  
</script>