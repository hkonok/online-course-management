<div class="span4">
    <h2>Learn</h2>
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris 
        condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. 
        Donec sed odio dui. </p>
    <p>
        <?php echo form_open('mock_test/start');?>
        <input type="hidden" name="course_name" id="course_name"/>
        <input type="hidden" name="problem_set" id="problem_set"/>
        <input type="submit" id="submit_form_for_test" class="btn btn-success btn-large" value="Start Test"/>
        <?php echo form_close();?>
    </p>
</div><!--/span-->