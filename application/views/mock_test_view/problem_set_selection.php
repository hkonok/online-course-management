<form class="well form-inline">
    <fieldset>
        <legend>Select Problem Set</legend>
        <select name="problem_set_for_mock" id="problem_set_for_mock">
            <option value="0">-Select-</option>
            <?php for ($i = 0; $i < count($mock_problem_sets); $i++): ?>
                <option value="<?php echo $mock_problem_sets[$i]; ?>"><?php echo $mock_problem_sets[$i]; ?></option>
            <?php endfor; ?>
        </select>
        <input class="btn" type="button" id="problem_set_submit" value="Submit"/>
    </fieldset>
</form>

<div class="confirm_test_start" style="display: none">
    <?php $this->load->view('mock_test_view/test_start_confirmation'); ?>
</div>
<script>
    
   
    $(document).ready(function(){
        $('input#problem_set_submit').click(function(){
            $('.confirm_test_start').show();
            $('input#course_name').val('GRE');
            $('input#problem_set').val($('select#problem_set_for_mock').val());
        })

    })
</script>
