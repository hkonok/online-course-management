<p>Welcome to the question creation view</p>
<div>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <input name='q_id'  type='hidden'  <?php echo "value='".$q_id."'";?> />
        <fieldset>
            <legend>Select Category</legend>
            <div class="control-group">
                <label class="control-label" for="question_category">Question Category</label>
                <div class="controls">
                    <select name="question_category" class="input-xlarge" >
                        <option value="<?php echo $type_id; ?>" selected><?php echo $option_name; ?></option>

                        
                        </select>
                        <p class="help-block">Determines what problem category the question belongs to</p>
                    </div>
                </div>

                <div class="question"
                <?php
                      if($type_id==8 )echo "style='display: none;'";
                ?>
                >
                <?php $this->load->view('admin_views/question_description_view',$my_qus) ?>
                        </div>

                        <a class="btn btn-primary insert-gap" style="display:none">Insert Blank</a>
                        <div class="quantity_a"
                        <?php
                              if($type_id == 8);
                              else echo "style='display: none;'";
                        ?>
                        >
                <?php $this->load->view('admin_views/question_quantity_a',$my_qus) ?>
                        </div>
                        <div class="quantity_b"
                        <?php
                              if($type_id==8);
                              else echo "style='display: none;'";
                        ?>
                        >
                <?php $this->load->view('admin_views/question_quantity_b',$my_qus) ?>
                        </div>

                        <div class="numeric_answer"
                        <?php
                              if($type_id==11);
                              else echo "style='display: none;'";
                        ?>
                        >
                <?php $this->load->view('admin_views/question_numeric_answer',$my_qus) ?>
                        </div>

                        <div class="numerator"
                        <?php
                              if($type_id==12);
                              else echo "style='display: none;'";
                        ?>
                        >
                <?php $this->load->view('admin_views/question_numerator',$my_qus) ?>
                        </div>
                        <div class="denominator"
                         <?php
                              if($type_id==12);
                              else echo "style='display: none;'";
                        ?>
                        >
                <?php $this->load->view('admin_views/question_denominator',$my_qus) ?>
                        </div>

                        <div class="control-group options_group" id="quantitative-select-one"
                        <?php
                              if($type_id==8);
                              else echo "style='display: none;'";
                        ?>
                        >
                <?php $this->load->view('admin_views/quantitative_options_view',$my_qus) ?>
                        </div>

                        

                        <div class="control-group options_group" id="select-one"
                        <?php
                              if($type_id==1 || $type_id==9);
                              else echo "style='display: none;'";
                        ?>
                        >
                <?php $this->load->view('admin_views/select_one_options_view',$my_qus) ?>
                        </div>
                        <div class="control-group options_group" id="select-two"
                        <?php
                              if($type_id==2 || $type_id==10);
                              else echo "style='display: none;'";
                        ?>
                        >
                <?php $this->load->view('admin_views/select_two_options_view',$my_qus) ?>
                        </div>
                        <div class="control-group options_group" id="three-blank" style="display:none"
                        <?php
                              if($type_id==4);
                              else echo "style='display: none;'";
                        ?>
                         >
                <?php $this->load->view('admin_views/three_blank_options_view') ?>
                        </div>
                        <div class="control-group options_group" id="two-blank" style="display:none"
                        <?php
                              if($type_id==5);
                              else echo "style='display: none;'";
                        ?>
                        >
                <?php $this->load->view('admin_views/two_blank_options_view') ?>
                        </div>
                        <div class="control-group options_group" id="one-blank" style="display:none"
                        <?php
                              if($type_id==6);
                              else echo "style='display: none;'";
                        ?>
                        >
                <?php $this->load->view('admin_views/one_blank_options_view') ?>
                        </div>
                        <div class="control-group options_group" id="one-blank"
                             <?php
                              if($type_id==5);
                              else echo "style='display: none;'";
                        ?>
                             >
                <?php $this->load->view('admin_views/two_blank_sentence_options_view') ?>
                        </div>
                        <div class="problem-type" style=" display: none;">
                <?php $this->load->view('admin_views/question_type_view'); ?>
                        </div>
                        <div class="problem-set_for_practice" style=" display: none;" >
                <?php $this->load->view('admin_views/question_set_for_practice_view'); ?>
                        </div>
                        <div class="problem-set_for_mock" style=" display: none;" >
                <?php $this->load->view('admin_views/question_set_for_mock_view'); ?>
            </div>
            <legend></legend>
            <div class="submit-question"  >
                <input type="submit" class="btn btn-large btn-primary" value="edit Submit Question"/>
                <a type="reset" class="btn btn-large btn-danger" href="<?php echo base_url()."index.php?view_questions/view/".$t_name."/"; ?>">Cancel</a>
            </div>

            <input type="hidden" name="right_answer" id="right_answer"/>
        </fieldset>

    </form>

</div>
<script>

    (function ($, undefined) {
        $.fn.getCursorPosition = function() {
            var el = $(this).get(0);
            var pos = 0;
            if('selectionStart' in el) {
                pos = el.selectionStart;
            } else if('selection' in document) {
                el.focus();
                var Sel = document.selection.createRange();
                var SelLength = document.selection.createRange().text.length;
                Sel.moveStart('character', -el.value.length);
                pos = Sel.text.length - SelLength;
            }
            return pos;
        }
    })(jQuery);

    $('.input-xlarge').change(function(){
        var category_num=$(this).val();
        
        

        switch(category_num){
            case '1':

                //$('input#right_answer').val('');
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('span').hide();
                $('.submit-question').hide();
                $('.options').hide();
                $('.quantity_a').hide();
                $('.quantity_b').hide();
                $('.numerator').hide();
                $('.denominator').hide();
                $('.numeric_answer').hide();
                ///////////////////////////////////////////////////////////
                $('.question').show();
                $('.insert-gap').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').show();
                $('a.correct_answer_for_select-one').show();
                $('span').hide();
                //$('span.confirmation-for-right-options-select-two').hide();
                $('.submit-question').show();
                break;
            case '2':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('span').hide();
                $('.submit-question').hide();
                $('.options').hide();
                $('.quantity_a').hide();
                $('.quantity_b').hide();
                $('.numerator').hide();
                $('.denominator').hide();
                $('.numeric_answer').hide();
                ///////////////////////////////////////////////////////////
                $('.question').show();
                $('input#right_answer').val('');
                $('.insert-gap').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').show();
                $('a.correct_answer_for_select-two').show();
                $('span').hide();
                //$('span.confirmation-for-right-options-select-one').hide();
                $('.submit-question').show();
                break;
            case '3':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('span').hide();
                $('.submit-question').hide();
                $('.options').hide();
                $('.quantity_a').hide();
                $('.quantity_b').hide();
                $('.numerator').hide();
                $('.denominator').hide();
                $('.numeric_answer').hide();
                ///////////////////////////////////////////////////////////
                $('.question').show();
                $('.options').show();
                break;
            case '4':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('span').hide();
                $('.submit-question').hide();
                $('.options').hide();
                $('.quantity_a').hide();
                $('.quantity_b').hide();
                $('.numerator').hide();
                $('.denominator').hide();
                $('.numeric_answer').hide();
                ///////////////////////////////////////////////////////////
                $('.question').show();
                $('input#right_answer').val('');
                $('.insert-gap').show();
                $('div.options_group:not(#three-blank)').hide();
                $('div.options_group#three-blank').show();
                $('.correct_answer_for_three_blank-one').show();
                $('.correct_answer_for_three_blank-two').show();
                $('.correct_answer_for_three_blank-three').show();
                $('span').hide();
                $('.submit-question').show();
                break;
            case '5':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('span').hide();
                $('.submit-question').hide();
                $('.options').hide();
                $('.quantity_a').hide();
                $('.quantity_b').hide();
                $('.numerator').hide();
                $('.denominator').hide();
                $('.numeric_answer').hide();
                ///////////////////////////////////////////////////////////
                $('.question').show();
                $('input#right_answer').val('');
                $('.insert-gap').show();
                $('div.options_group:not(#two-blank)').hide();
                $('div.options_group#two-blank').show();
                $('.correct_answer_for_two_blank-one').show();
                $('.correct_answer_for_two_blank-two').show();
                $('span').hide();
                $('.submit-question').show();
                break;
            case '6':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('span').hide();
                $('.submit-question').hide();
                $('.options').hide();
                $('.quantity_a').hide();
                $('.quantity_b').hide();
                $('.numerator').hide();
                $('.denominator').hide();
                $('.numeric_answer').hide();
                ///////////////////////////////////////////////////////////
                $('.question').show();
                $('input#right_answer').val('');
                $('.insert-gap').show();
                $('div.options_group:not(#one-blank)').hide();
                $('div.options_group#one-blank').show();
                $('.correct_answer_for_one_blank-one').show();
                $('span').hide();
                $('.submit-question').show();
                break;
            case '7':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('span').hide();
                $('.submit-question').hide();
                $('.options').hide();
                $('.quantity_a').hide();
                $('.quantity_b').hide();
                $('.numerator').hide();
                $('.denominator').hide();
                $('.numeric_answer').hide();
                ///////////////////////////////////////////////////////////
                $('.question').show();
                $('.options').show();
                break;
            case '8':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('span').hide();
                $('.submit-question').hide();
                $('.options').hide();
                $('.quantity_a').hide();
                $('.quantity_b').hide();
                $('.numerator').hide();
                $('.denominator').hide();
                $('.numeric_answer').hide();
                ///////////////////////////////////////////////////////////
                $('.quantity_a').show();
                $('.quantity_b').show();
                $('div.options_group:not(#quantitative-select-one)').hide();
                $('div.options_group#quantitative-select-one').show();
                $('a.correct_answer_for_select-one').show();
                $('span').hide();
                $('.options').show();
                $('.submit-question').show();
                break;
            case '9':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('span').hide();
                $('.submit-question').hide();
                $('.options').hide();
                $('.quantity_a').hide();
                $('.quantity_b').hide();
                $('.numerator').hide();
                $('.denominator').hide();
                $('.numeric_answer').hide();
                ///////////////////////////////////////////////////////////
                $('.question').show();
                $('.insert-gap').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').show();
                $('a.correct_answer_for_select-one').show();
                $('span').hide();
                //$('span.confirmation-for-right-options-select-two').hide();
                $('.submit-question').show();
                break;
            case '10':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('span').hide();
                $('.submit-question').hide();
                $('.options').hide();
                $('.quantity_a').hide();
                $('.quantity_b').hide();
                $('.numerator').hide();
                $('.denominator').hide();
                $('.numeric_answer').hide();
                ///////////////////////////////////////////////////////////
                $('.question').show();
                $('input#right_answer').val('');
                $('.insert-gap').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').show();
                $('a.correct_answer_for_select-two').show();
                $('span').hide();
                //$('span.confirmation-for-right-options-select-one').hide();
                $('.submit-question').show();
                break;
            case '11':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('span').hide();
                $('.submit-question').hide();
                $('.options').hide();
                $('.quantity_a').hide();
                $('.quantity_b').hide();
                $('.numerator').hide();
                $('.denominator').hide();
                $('.numeric_answer').hide();
                ///////////////////////////////////////////////////////////
                $('.question').show();
                $('.options').show();
                $('.numeric_answer').show();
                $('.submit-question').show();
                break;
            case '12':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('span').hide();
                $('.submit-question').hide();
                $('.options').hide();
                $('.quantity_a').hide();
                $('.quantity_b').hide();
                $('.numerator').hide();
                $('.denominator').hide();
                $('.numeric_answer').hide();
                ///////////////////////////////////////////////////////////
                $('.question').show();
                $('.options').show();
                $('.numerator').show();
                $('.denominator').show();
                $('.submit-question').show();
                break;

        }
        $('.problem-type').show();
    });

    $('input.question_set_for').change(function(){
        
        switch($(this).val()){

            case 'Practice':
                //alert($(this).val());
                $('div.problem-set_for_mock').hide();
                $('div.problem-set_for_practice').show();
                break;
            case 'Mock':
                $('div.problem-set_for_practice').hide();
                $('div.problem-set_for_mock').show();
                break;
            case 'Both':
                $('div.problem-set_for_practice').show();
                $('div.problem-set_for_mock').show();
                break;

        }

    })

    
    $('.correct_answer_for_select-one').each(function(){
        $(this).click(function(){
            //$(this).css('background-color','red');
            var option_input=$(this).prev();
            $('input#right_answer').val($(option_input).val());
            var confirmation_div=$(this).next();
            $(this).hide();
            $(confirmation_div).show();
            var other_buttons=$('div.options_group').find('a');
            $(other_buttons).each(function(){
                $(this).hide();
            })

        })
    })


    $('.correct_answer_for_three_blank-one').each(function(){
        $(this).click(function(){
            //$(this).css('background-color','red');
            var option_input=$(this).prev();
            var right_answer=$('input#right_answer').val()+$(option_input).val()+'1|';
            alert($('input#right_answer').val());
            $('input#right_answer').val(right_answer);
            alert($('input#right_answer').val());
            var confirmation_div=$(this).next();
            $(this).hide();
            $(confirmation_div).show();
            var other_buttons=$('div.options_group').find('a.correct_answer_for_three_blank-one');
            $(other_buttons).each(function(){
                $(this).hide();
            })
            //alert(right_answer);
        })
    })



    $('.correct_answer_for_three_blank-two').each(function(){
        $(this).click(function(){
            //$(this).css('background-color','red');
            var option_input=$(this).prev();
            var right_answer=$('input#right_answer').val()+$(option_input).val()+'2|';
            alert($('input#right_answer').val());
            $('input#right_answer').val(right_answer);
            alert($('input#right_answer').val());
            var confirmation_div=$(this).next();
            $(this).hide();
            $(confirmation_div).show();
            var other_buttons=$('div.options_group').find('a.correct_answer_for_three_blank-two');
            $(other_buttons).each(function(){
                $(this).hide();
            })
            //alert(right_answer);

        })
    })

    $('.correct_answer_for_three_blank-three').each(function(){
        $(this).click(function(){
            //$(this).css('background-color','red');
            var option_input=$(this).prev();
            var right_answer=$('input#right_answer').val()+$(option_input).val()+'3|';
            alert($('input#right_answer').val());
            //alert(right_answer);
            $('input#right_answer').val(right_answer);
            alert($('input#right_answer').val());
            var confirmation_div=$(this).next();
            $(this).hide();
            $(confirmation_div).show();
            var other_buttons=$('div.options_group').find('a.correct_answer_for_three_blank-three');
            $(other_buttons).each(function(){
                $(this).hide();
            })
            //alert(right_answer);

        })
    })

    $('.correct_answer_for_two_blank-one').each(function(){
        $(this).click(function(){
            //$(this).css('background-color','red');
            var option_input=$(this).prev();
            var right_answer=$('input#right_answer').val()+$(option_input).val()+'1|';
            $('input#right_answer').val(right_answer);
            var confirmation_div=$(this).next();
            $(this).hide();
            $(confirmation_div).show();
            var other_buttons=$('div.options_group').find('a.correct_answer_for_two_blank-one');
            $(other_buttons).each(function(){
                $(this).hide();
            })
            //alert(right_answer);
        })
    })

    $('.correct_answer_for_two_blank-two').each(function(){
        $(this).click(function(){
            //$(this).css('background-color','red');
            var option_input=$(this).prev();
            var right_answer=$('input#right_answer').val()+$(option_input).val()+'2|';
            $('input#right_answer').val(right_answer);
            var confirmation_div=$(this).next();
            $(this).hide();
            $(confirmation_div).show();
            var other_buttons=$('div.options_group').find('a.correct_answer_for_two_blank-two');
            $(other_buttons).each(function(){
                $(this).hide();
            })
            //alert(right_answer);

        })
    })

    $('.correct_answer_for_one_blank-one').each(function(){
        $(this).click(function(){
            //$(this).css('background-color','red');
            var option_input=$(this).prev();
            $('input#right_answer').val($(option_input).val());
            var confirmation_div=$(this).next();
            $(this).hide();
            $(confirmation_div).show();
            var other_buttons=$('div.options_group').find('a.correct_answer_for_one_blank-one');
            $(other_buttons).each(function(){
                $(this).hide();
            })

        })
    })

    $('.insert-gap').click(function(){

        //$(this).css('background-color','red');
        var question=$('#description').val();
        
        //alert($('#description').getCursorPosition());
        var blank='________';
        //alert(question);
        var ques_parts=question.split(blank);
        var new_counter='('+ques_parts.length+')';

        var new_question=question.substring(0,$('#description').getCursorPosition()-1)
            +' '+new_counter+' '+blank+' '
            +question.substring($('#description').getCursorPosition(),question.length);
        //alert(new_question);
        $('#description').val(new_question);
        
    })

    $('.correct_answer_for_select-two').each(function(){
        //$(this).show();
        $(this).click(function(){
            //$(this).css('background-color','red');
            var option_input=$(this).prev();
            var right_answers=$('input#right_answer').val();
            right_answers+=$(option_input).val()+'|';
            $('input#right_answer').val(right_answers);
            var confirmation_div=$(this).next();
            $(this).hide();
            $(confirmation_div).show();

        })
    })

</script>
