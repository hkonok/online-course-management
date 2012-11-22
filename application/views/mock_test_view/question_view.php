<?php
echo $exam_time;
//echo mktime($_SESSION['initial_exam_time'][0], $_SESSION['initial_exam_time'][1], $_SESSION['initial_exam_time'][2]);
?>
<?php echo form_open('mock_test/save_answer_info') ?>

<fieldset>
    <legend><?php
if (isset($question_segment))
    echo $question_segment
    ?></legend>
    <div><?php
    if (isset($question_type))
        echo $question_type
    ?></div>
    <div>
        <div><?php
    if (isset($question_category))
        echo $question_category
    ?></div>
        <?php
        //$data = array();>
        switch ($question_category) {
            case 'select-one_choice_questions':
                ?>
                <div>
                    <div>
                        <?php echo $question
                        ?>
                    </div>

                    <div>
                        <?php $options_array = explode('|', $options); ?>
                        <ul style="list-style:none">
                            <?php for ($i = 0; $i < count($options_array); $i++): ?>
                                <li>
                                    <span><input type="radio" name="given_answer" class="given_answer" value="<?php echo $i ?>"></span>
                                    <span class="option"><?php echo $options_array[$i]; ?></span>

                                </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    <input type="hidden" name="question_id" id="question_id" value="<?php echo $question_id ?>">
                    <input type="hidden" name="correct_answer" id="correct_answer" value="<?php echo $correct_answer ?>">
                    <input type="hidden" name="question_set_for_mock" id="question_set_for_mock" value="<?php echo $question_set_for_mock ?>">


                </div>
                <?php
                break;

            case 'select-many_choice_questions':
                ?>
                <div>
                    <div>
                        <?php echo $question
                        ?>
                    </div>

                    <div>
                        <?php $options_array = explode('|', $options); ?>
                        <ul style="list-style:none">
                            <?php for ($i = 0; $i < count($options_array); $i++): ?>
                                <li>
                                    <span><input type="checkbox" name="given_answer[]" value="given_answer"></span>
                                    <span><?php echo $options_array[$i]; ?></span></li>
                            <?php endfor; ?>
                        </ul>
                    </div>

                    <input type="hidden" name="question_id" id="question_id" value="<?php echo $question_id ?>">
                    <input type="hidden" name="correct_answer" id="correct_answer" value="<?php echo $correct_answer ?>">
                    <input type="hidden" name="question_set_for_mock" id="question_set_for_mock" value="<?php echo $question_set_for_mock ?>">

                    
                </div>
                <?php
                break;

            case 'select-in_passage_questions':
                ?>
                <div>
                    <div>
                        <?php echo $question
                        ?>
                    </div>

                    <div>
                        <?php $options_array = explode('|', $options); ?>
                        <ul style="list-style:none">
                            <?php for ($i = 0; $i < count($options_array); $i++): ?>
                                <li>
                                    <span><input type="radio" name="given_answer" value="given_answer"></span>
                                    <span><?php echo $options_array[$i]; ?></span></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    
                    <input type="hidden" name="question_id" id="question_id" value="<?php echo $question_id ?>">
                    <input type="hidden" name="correct_answer" id="correct_answer" value="<?php echo $correct_answer ?>">
                    <input type="hidden" name="question_set_for_mock" id="question_set_for_mock" value="<?php echo $question_set_for_mock ?>">
                    
                </div>
                <?php
                break;

            case 'three-blank_completion_questions':
                ?>
                <div>
                    <div>
                        <?php echo $question
                        ?>
                    </div>

                    <div>
                        <?php $blank_one_options_array = explode('|', $blank_one_options); ?>
                        <ul style="list-style:none">
                            <?php for ($i = 0; $i < count($blank_one_options_array); $i++): ?>
                                <li>
                                    <span><input type="radio" name="given_answer_for_blank_one" value="given_answer_for_blank_one"></span>
                                    <span><?php echo $blank_one_options_array[$i]; ?></span></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    <div>
                        <?php $blank_two_options_array = explode('|', $blank_two_options); ?>
                        <ul style="list-style:none">
                            <?php for ($i = 0; $i < count($blank_two_options_array); $i++): ?>
                                <li>
                                    <span><input type="radio" name="given_answer_for_blank_two" value="given_answer_for_blank_two"></span>
                                    <span><?php echo $blank_two_options_array[$i]; ?></span></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    <div>
                        <?php $blank_three_options_array = explode('|', $blank_three_options); ?>
                        <ul style="list-style:none">
                            <?php for ($i = 0; $i < count($blank_three_options_array); $i++): ?>
                                <li>
                                    <span><input type="radio" name="given_answer_for_blank_three" value="given_answer_for_blank_three"></span>
                                    <span><?php echo $blank_three_options_array[$i]; ?></span></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    
                    <input type="hidden" name="question_id" id="question_id" value="<?php echo $question_id ?>">
                    <input type="hidden" name="correct_answer" id="correct_answer" value="<?php echo $correct_answer ?>">
                    <input type="hidden" name="question_set_for_mock" id="question_set_for_mock" value="<?php echo $question_set_for_mock ?>">
                    
                </div>
                <?php
                break;

            case 'two-blank_completion_questions':
                ?>
                <div>
                    <div>
                        <?php echo $question ?>
                    </div>

                    <div>
                        <?php $blank_one_options_array = explode('|', $blank_one_options); ?>
                        <ul style="list-style:none">
                            <?php for ($i = 0; $i < count($blank_one_options_array); $i++): ?>
                                <li>
                                    <span><input type="radio" name="given_answer_for_blank_one" value="given_answer_for_blank_one"></span>
                                    <span><?php echo $blank_one_options_array[$i]; ?></span></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    <div>
                        <?php $blank_two_options_array = explode('|', $blank_two_options); ?>
                        <ul style="list-style:none">
                            <?php for ($i = 0; $i < count($blank_two_options_array); $i++): ?>
                                <li>
                                    <span><input type="radio" name="given_answer_for_blank_two" value="given_answer_for_blank_two"></span>
                                    <span><?php echo $blank_two_options_array[$i]; ?></span></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    
                    <input type="hidden" name="question_id" id="question_id" value="<?php echo $question_id ?>">
                    <input type="hidden" name="correct_answer" id="correct_answer" value="<?php echo $correct_answer ?>">
                    <input type="hidden" name="question_set_for_mock" id="question_set_for_mock" value="<?php echo $question_set_for_mock ?>">

                    
                </div>
                <?php
                break;

            case 'one-blank_completion_questions':
                ?>
                <div>
                    <div>
                        <?php echo $question
                        ?>
                    </div>

                    <div>
                        <?php $blank_one_options_array = explode('|', $blank_one_options); ?>
                        <ul style="list-style:none">
                            <?php for ($i = 0; $i < count($blank_one_options_array); $i++): ?>
                                <li>
                                    <span><input type="radio" value="given_answer_for_blank_one"></span>
                                    <span><?php echo $blank_one_options_array[$i]; ?></span></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    
                    <input type="hidden" name="question_id" id="question_id" value="<?php echo $question_id ?>">
                    <input type="hidden" name="correct_answer" id="correct_answer" value="<?php echo $correct_answer ?>">
                    <input type="hidden" name="question_set_for_mock" id="question_set_for_mock" value="<?php echo $question_set_for_mock ?>">

                    
                </div>
                <?php
                break;

            case 'one-blank_sentence_completion_questions':
                ?>
                <div>
                    <div>
                        <?php echo $question
                        ?>
                    </div>

                    <div>
                        <?php $options_array = explode('|', $options); ?>
                        <ul style="list-style:none">
                            <?php for ($i = 0; $i < count($options_array); $i++): ?>
                                <li>
                                    <span><input type="checkbox" name="given_answers[]" value=""></span>
                                    <span><?php echo $options_array[$i]; ?></span></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                    
                    <input type="hidden" name="question_id" id="question_id" value="<?php echo $question_id ?>">
                    <input type="hidden" name="correct_answer" id="correct_answer" value="<?php echo $correct_answer ?>">
                    <input type="hidden" name="question_set_for_mock" id="question_set_for_mock" value="<?php echo $question_set_for_mock ?>">

                </div>
                <?php
                break;
        }
//echo $question_category;
        ?>
        <input type="hidden" name="question_category" id="question_category" value="<?php echo $question_category ?>">
    </div>
    <input type="submit" class="btn btn-success submit_answer" id="submit_answer" value="Next">
</fieldset>
<?php echo form_close() ?>
<script>
    
    $(document).ready(function(){
        
        //alert($('input#question_category').val());
        switch($('input#question_category').val()){
            case 'select-one_choice_questions':
                //alert('hello');
                $('input.given_answer').click(function(){
                    var given_answer=$(this).parent().siblings().html();
                    $(this).val(given_answer);
                    //alert($(this).val());
                })
                break;
                
            case 'select-many_choice_questions':
                break;
                
            case 'select-in_passage_questions':
                break;
                
            case 'three-blank_completion_questions':
                break;
                
            case 'two-blank_completion_questions':
                break;
                
            case 'one-blank_completion_questions':
                break;
                
            case 'one-blank_sentence_completion_questions':
                break;
        }
    })
</script>


