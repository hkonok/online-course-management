<legend>Insert Options</legend>

<label class="control-label" for="question_options">Option For A</label>
<div class="controls">
    <input type="text" class="input-xlarge" name="question_options_quantitative_select_one[]" id="a"
           <?php if(isset($type_id)&&$type_id==8) echo "value='".strtok($options,"|")."'"; ?>
           >
    <a class="btn btn-mini btn-success correct_answer_for_select-one">Correct Answer?</a>
    <span class="confirmation-for-right-options-select-one" style="display:none">ok</span>
    <br/><br/>
</div>
<label class="control-label" for="question_options">Option For B</label>
<div class="controls">
    <input type="text" class="input-xlarge" name="question_options_quantitative_select_one[]" id="b"
           <?php if(isset($type_id)&&$type_id==8) echo "value='".strtok("|")."'"; ?>
           >
    <a class="btn btn-mini btn-success correct_answer_for_select-one">Correct Answer?</a>
    <span class="confirmation-for-right-options-select-one" style="display:none">ok</span>
    <br/><br/>
</div>
<label class="control-label" for="question_options">Option For C</label>
<div class="controls">
    <input type="text" class="input-xlarge" name="question_options_quantitative_select_one[]" id="c"
           <?php if(isset($type_id)&&$type_id==8) echo "value='".strtok("|")."'"; ?>
           >
    <a class="btn btn-mini btn-success correct_answer_for_select-one">Correct Answer?</a>
    <span class="confirmation-for-right-options-select-one" style="display:none">ok</span>
    <br/><br/>
</div>
<label class="control-label" for="question_options">Option For D</label>
<div class="controls">
    <input type="text" class="input-xlarge" name="question_options_quantitative_select_one[]" id="d"
           <?php if(isset($type_id)&&$type_id==8) echo "value='".strtok("|")."'"; ?>
           >
    <a class="btn btn-mini btn-success correct_answer_for_select-one">Correct Answer?</a>
    <span class="confirmation-for-right-options-select-one" style="display:none">ok</span>
    <br/><br/>
</div>


