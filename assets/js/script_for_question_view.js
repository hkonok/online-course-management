$(document).ready(function(){
    //$('textarea').htmlarea();
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
    
    
    function getSelectedTextFrmTextarea(){
       
       var textarea = tinyMCE.get('description').selection.getContent({format : 'text'});
       return textarea;
    }

    $('.input-xlarge').change(function(){
        var category_num=$(this).val();
        //$('#description').remove();
        
        //$('textarea').show();
        //$('iframe').hide();
        switch(category_num){
          //  $('#description').html('empty');
           // tinyMCE.get('description').html('empty');
            case '1':

                //$('input#right_answer').val('');
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap-for-three_blank').hide();
                $('.insert-gap-for-two_blank').hide();
                $('.insert-gap-for-one_blank').hide();
                $('.insert-gap').hide();
                $('.get_selection').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('div.option-selection-for-select_in').hide();
                //$('span').hide();
                $('.options').hide();
                $('.quantity_a').hide();
                $('.quantity_b').hide();
                $('.numerator').hide();
                $('.denominator').hide();
                $('.numeric_answer').hide();
                ///////////////////////////////////////////////////////////
                
                $('.question').show();
                $('div.options_group#select-one').show();
                $('a.correct_answer_for_select-one').show();
                //$('span').show;
                //$('span.confirmation-for-right-options-select-two').hide();
                $('.submit-question').show();
                break;
            case '2':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap-for-three_blank').hide();
                $('.insert-gap-for-two_blank').hide();
                $('.insert-gap-for-one_blank').hide();
                $('.get_selection').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('div.option-selection-for-select_in').hide();
                
                $('.options').hide();
                $('.quantity_a').hide();
                $('.quantity_b').hide();
                $('.numerator').hide();
                $('.denominator').hide();
                $('.numeric_answer').hide();
                ///////////////////////////////////////////////////////////
                $('.question').show();
                $('input#right_answer').val('');
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').show();
                $('a.correct_answer_for_select-two').show();
                //$('span').hide();
                //$('span.confirmation-for-right-options-select-one').hide();
                $('.submit-question').show();
                break;
            case '3':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap-for-three_blank').hide();
                $('.insert-gap-for-two_blank').hide();
                $('.insert-gap-for-one_blank').hide();
                $('.get_selection').show();
                $('div.options_group:not(#select-in_passage)').hide();
                $('div.options_group#select-in_passage').show();
                $('a.correct_answer_for_select-one').hide();
                $('div.option-selection-for-select_in').show();
                
                $('.submit-question').show();
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
                $('.insert-gap-for-three_blank').show();
                $('.insert-gap-for-two_blank').hide();
                $('.insert-gap-for-one_blank').hide();
                $('.get_selection').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('div.option-selection-for-select_in').hide();
                
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
                $('div.options_group:not(#three-blank)').hide();
                $('div.options_group#three-blank').show();
                $('.correct_answer_for_three_blank-one').show();
                $('.correct_answer_for_three_blank-two').show();
                $('.correct_answer_for_three_blank-three').show();
                //$('span').hide();
                $('.submit-question').show();
                break;
            case '5':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap-for-three_blank').hide();
                $('.insert-gap-for-two_blank').show();
                $('.insert-gap-for-one_blank').hide();
                $('.get_selection').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('div.option-selection-for-select_in').hide();
                
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
                $('div.options_group:not(#two-blank)').hide();
                $('div.options_group#two-blank').show();
                $('.correct_answer_for_two_blank-one').show();
                $('.correct_answer_for_two_blank-two').show();
                //$('span').hide();
                $('.submit-question').show();
                break;
            case '6':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap-for-three_blank').hide();
                $('.insert-gap-for-two_blank').hide();
                $('.insert-gap-for-one_blank').show();
                $('.get_selection').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('div.option-selection-for-select_in').hide();
                
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
                $('div.options_group:not(#one-blank)').hide();
                $('div.options_group#one-blank').show();
                $('.correct_answer_for_one_blank-one').show();
                
                $('.submit-question').show();
                break;
            case '7':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap-for-three_blank').hide();
                $('.insert-gap-for-two_blank').hide();
                $('.insert-gap-for-one_blank').show();
                $('.get_selection').hide();
                $('div.option-selection-for-select_in').hide();
                
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
                $('div.options_group:not(#one-blank-sentence-completion)').hide();
                $('div.options_group#one-blank-sentence-completion').show();
                
                $('.submit-question').show();
                break;
            case '8':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap-for-three_blank').hide();
                $('.insert-gap-for-two_blank').hide();
                $('.insert-gap-for-one_blank').hide();
                $('.get_selection').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('div.option-selection-for-select_in').hide();
                
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
               
                $('.options').show();
                $('.submit-question').show();
                break;
            case '9':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap-for-three_blank').hide();
                $('.insert-gap-for-two_blank').hide();
                $('.insert-gap-for-one_blank').hide();
                $('.get_selection').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('div.option-selection-for-select_in').hide();
                
                $('.submit-question').hide();
                $('.options').hide();
                $('.quantity_a').hide();
                $('.quantity_b').hide();
                $('.numerator').hide();
                $('.denominator').hide();
                $('.numeric_answer').hide();
                ///////////////////////////////////////////////////////////
                $('.question').show();
                $('.insert-gap-for-three_blank').hide();
                $('.insert-gap-for-two_blank').hide();
                $('.insert-gap-for-one_blank').hide();
                $('div.options_group:not(#select-one)').hide();
                $('.get_selection').hide();
                $('div.options_group#select-one').show();
                $('a.correct_answer_for_select-one').show();
                
                //$('span.confirmation-for-right-options-select-two').hide();
                $('.submit-question').show();
                break;
            case '10':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap-for-three_blank').hide();
                $('.insert-gap-for-two_blank').hide();
                $('.insert-gap-for-one_blank').hide();
                $('.get_selection').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('div.option-selection-for-select_in').hide();
                
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
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').show();
                $('a.correct_answer_for_select-two').show();
                
                //$('span.confirmation-for-right-options-select-one').hide();
                $('.submit-question').show();
                break;
            case '11':
                //////////////////////////////////////////////////////////
                $('.question').hide();
                $('.insert-gap-for-three_blank').hide();
                $('.insert-gap-for-two_blank').hide();
                $('.insert-gap-for-one_blank').hide();
                $('.get_selection').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('div.option-selection-for-select_in').hide();
                
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
                $('.insert-gap-for-three_blank').hide();
                $('.insert-gap-for-two_blank').hide();
                $('.insert-gap-for-one_blank').hide();
                $('.get_selection').hide();
                $('div.options_group:not(#select-one)').hide();
                $('div.options_group#select-one').hide();
                $('a.correct_answer_for_select-one').hide();
                $('div.options_group:not(#select-two)').hide();
                $('div.options_group#select-two').hide();
                $('a.correct_answer_for_select-two').hide();
                $('div.option-selection-for-select_in').hide();
                
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
   
    $('textarea#numerator').focus(function(){
        if((!$('#description').is(":hidden") && tinyMCE.get('description').getContent()=='')){
            alert('Please insert the question first');
            $('#description').focus();
        }
    })
    
    $('textarea#denominator').focus(function(){
        if((!$('#description').is(":hidden") && tinyMCE.get('description').getContent()=='')){
            alert('Please insert the question first');
            $('#description').focus();
        }
        
        else if(($('#numerator').val()=='')){
            alert('Please insert the numerator');
            $('#numerator').focus();
        }
    })
    
    $('textarea#numeric_answer').focus(function(){
        if((!$('#description').is(":hidden") && tinyMCE.get('description').getContent()=='')){
            alert('Please insert the question first');
            $('#description').focus();
        }
    })
    
    $('.correct_answer_for_select-one').each(function(){
        $(this).click(function(){
            //$(this).css('background-color','red');
            if(!$('#description').is(":hidden") && tinyMCE.get('description').getContent()==''){
                alert('Please insert the question first');
                $('#description').focus();
            }
            else if(!$('textarea[id^="quantity_"]').is(":hidden") && $('textarea[id="quantity_a"]').val()==''){
                alert('Please insert the quantities first');
                $('#description').focus();
            }
            else{
                var option_input=$(this).prev();
                if(option_input.val()==''){
                    alert('No options are available for this answer.Please insert one.');
                    option_input.focus();
                }
                else{
                    var confirm_to_proceed=confirm('Are you sure that this is the correct answer?');
                    if(confirm_to_proceed==true){
                        $('input#right_answer').val($(option_input).val());
                        var confirmation_div=$(this).next();
                        $(this).hide();
                        $(confirmation_div).show();
                        var other_buttons=$('div.options_group').find('a');
                        $(other_buttons).each(function(){
                            $(this).hide();
                        })
                    }

                }
            }
        })
    })
    
    $('a.first-option').click(function(){
        
        var selected_portion=getSelectedTextFrmTextarea();
        $('input.select-in#option_one').val(selected_portion);

    })
    
    $('a.second-option').click(function(){
        
        var selected_portion=getSelectedTextFrmTextarea();
        $('input.select-in#option_two').val(selected_portion);

    })
    
    $('a.third-option').click(function(){
        
        var selected_portion=getSelectedTextFrmTextarea();
        $('input.select-in#option_three').val(selected_portion);

    })
    
    
    $('.correct_answer_for_select_in').each(function(){
        $(this).click(function(){
            
            if(tinyMCE.get('description').getContent()==''){
                alert('Please insert the question first');
                $('#description').focus();
            }
            else{
                
                var question=tinyMCE.get('description').getContent();
                var blank=' . ';
                var ques_parts=question.split(blank);
            
                if(ques_parts.length<3){
                    alert("You must insert at least three sentences");
                    $('#description').focus();
                }
                else{
                    var option_input=$(this).prev();
                    if(option_input.val()==''){
                        alert('No options are available for this answer.Please insert one.');
                        $(option_input).focus();
                    }
                    else{
                        var confirm_to_proceed=confirm('Are you sure that this is the correct answer?');
                        if(confirm_to_proceed==true){
                            var option_input=$(this).prev();
                            $('input#right_answer').val($(option_input).val());
                            var confirmation_div=$(this).next();
                            $(this).hide();
                            $(confirmation_div).show();
                            var other_buttons=$('div.options_group').find('a.correct_answer_for_select_in');
                            $(other_buttons).each(function(){
                                $(this).hide();
                            })
                        }
                
                    }
                }
                
            }
        //$(this).css('background-color','red');
            
        //alert(right_answer);
        })
    })


    $('.correct_answer_for_three_blank-one').each(function(){
        $(this).click(function(){
            //$(this).css('background-color','red');
            if(tinyMCE.get('description').getContent()==''){
                alert('Please insert the question first fff');
                $('#description').focus();
            }
            else{
                
                var question=tinyMCE.get('description').getContent();
                var blank='________';
                var ques_parts=question.split(blank);
            
                if(ques_parts.length<4){
                    alert("You must insert exactly three blanks");
                    $('#description').focus();
                }
                else{
                    var option_input=$(this).prev();
                    if(option_input.val()==''){
                        alert('No options are available for this answer.Please insert one.');
                        $(option_input).focus();
                    }
                    else{
                        var confirm_to_proceed=confirm('Are you sure that this is the correct answer?');
                        if(confirm_to_proceed==true){
                            var right_answer=$('input#right_answer').val()+$(option_input).val()+'1|';
                            //alert($('input#right_answer').val());
                            $('input#right_answer').val(right_answer);
                            //alert($('input#right_answer').val());
                            var confirmation_div=$(this).next();
                            $(this).hide();
                            $(confirmation_div).show();
                            var other_buttons=$('div.options_group').find('a.correct_answer_for_three_blank-one');
                            $(other_buttons).each(function(){
                                $(this).hide();
                            })
                        }
                
                    }
                }
                
            }
            
        //alert(right_answer);
        })
    })



    $('.correct_answer_for_three_blank-two').each(function(){
        $(this).click(function(){
            //$(this).css('background-color','red');
            if(tinyMCE.get('description').getContent()==''){
                alert('Please insert the question first');
                $('#description').focus();
            }
            else{
                
                var question=tinyMCE.get('description').getContent();
                var blank='________';
                var ques_parts=question.split(blank);
            
                if(ques_parts.length<4){
                    alert("You must insert exactly three blanks");
                    $('#description').focus();
                }
                else{
                    var option_input=$(this).prev();
                    if(option_input.val()==''){
                        alert('No options are available for this answer.Please insert one.');
                        $(option_input).focus();
                    }
                    else{
                        var confirm_to_proceed=confirm('Are you sure that this is the correct answer?');
                        if(confirm_to_proceed==true){
                            var right_answer=$('input#right_answer').val()+$(option_input).val()+'1|';
                            //alert($('input#right_answer').val());
                            $('input#right_answer').val(right_answer);
                            //alert($('input#right_answer').val());
                            var confirmation_div=$(this).next();
                            $(this).hide();
                            $(confirmation_div).show();
                            var other_buttons=$('div.options_group').find('a.correct_answer_for_three_blank-two');
                            $(other_buttons).each(function(){
                                $(this).hide();
                            })
                        }
                
                    }
                }
                
            }
            
        //alert(right_answer);
        })
    })

    $('.correct_answer_for_three_blank-three').each(function(){
        $(this).click(function(){
            //$(this).css('background-color','red');
            if(tinyMCE.get('description').getContent()==''){
                alert('Please insert the question first');
                $('#description').focus();
            }
            else{
                
                var question=tinyMCE.get('description').getContent();
                var blank='________';
                var ques_parts=question.split(blank);
            
                if(ques_parts.length<4){
                    alert("You must insert exactly three blanks");
                    $('#description').focus();
                }
                else{
                    var option_input=$(this).prev();
                    if(option_input.val()==''){
                        alert('No options are available for this answer.Please insert one.');
                        $(option_input).focus();
                    }
                    else{
                        var confirm_to_proceed=confirm('Are you sure that this is the correct answer?');
                        if(confirm_to_proceed==true){
                            var right_answer=$('input#right_answer').val()+$(option_input).val()+'1|';
                            //alert($('input#right_answer').val());
                            $('input#right_answer').val(right_answer);
                            //alert($('input#right_answer').val());
                            var confirmation_div=$(this).next();
                            $(this).hide();
                            $(confirmation_div).show();
                            var other_buttons=$('div.options_group').find('a.correct_answer_for_three_blank-three');
                            $(other_buttons).each(function(){
                                $(this).hide();
                            })
                        }
                
                    }
                }
                
            }
            
        //alert(right_answer);
        })
    })

    $('.correct_answer_for_two_blank-one').each(function(){
    
        $(this).click(function(){
            //$(this).css('background-color','red');
            if(tinyMCE.get('description').getContent()==''){
                alert('Please insert the question first');
                $('#description').focus();
            }
            else{
                
                var question=tinyMCE.get('description').getContent();
                var blank='________';
                var ques_parts=question.split(blank);
            
                if(ques_parts.length<3){
                    alert("You must insert exactly two blanks");
                    $('#description').focus();
                }
                else{
                    var option_input=$(this).prev();
                    if(option_input.val()==''){
                        alert('No options are available for this answer.Please insert one.');
                        $(option_input).focus();
                    }
                    else{
                        var confirm_to_proceed=confirm('Are you sure that this is the correct answer?');
                        if(confirm_to_proceed==true){
                            var right_answer=$('input#right_answer').val()+$(option_input).val()+'1|';
                            //alert($('input#right_answer').val());
                            $('input#right_answer').val(right_answer);
                            alert($('input#right_answer').val());
                            var confirmation_div=$(this).next();
                            $(this).hide();
                            $(confirmation_div).show();
                            var other_buttons=$('div.options_group').find('a.correct_answer_for_two_blank-one');
                            $(other_buttons).each(function(){
                                $(this).hide();
                            })
                        }
                
                    }
                }
                
            }
            
        //alert(right_answer);
        })
        
    })

    $('.correct_answer_for_two_blank-two').each(function(){
    
        $(this).click(function(){
            //$(this).css('background-color','red');
            if(tinyMCE.get('description').getContent()==''){
                alert('Please insert the question first');
                $('#description').focus();
            }
            else{
                
                var question=tinyMCE.get('description').getContent();
                var blank='________';
                var ques_parts=question.split(blank);
            
                if(ques_parts.length<3){
                    alert("You must insert exactly two blanks");
                    $('#description').focus();
                }
                else{
                    var option_input=$(this).prev();
                    if(option_input.val()==''){
                        alert('No options are available for this answer.Please insert one.');
                        $(option_input).focus();
                    }
                    else{
                        var confirm_to_proceed=confirm('Are you sure that this is the correct answer?');
                        if(confirm_to_proceed==true){
                            var right_answer=$('input#right_answer').val()+$(option_input).val()+'1|';
                            //alert($('input#right_answer').val());
                            $('input#right_answer').val(right_answer);
                            alert($('input#right_answer').val());
                            var confirmation_div=$(this).next();
                            $(this).hide();
                            $(confirmation_div).show();
                            var other_buttons=$('div.options_group').find('a.correct_answer_for_two_blank-two');
                            $(other_buttons).each(function(){
                                $(this).hide();
                            })
                        }
                
                    }
                }
                
            }
            
        //alert(right_answer);
        })
        
    })


    $('.correct_answer_for_one_blank-one').each(function(){
        $(this).click(function(){
            if(tinyMCE.get('description').getContent()==''){
                alert('Please insert the question first');
                $('#description').focus();
            }
            else{
                var question=tinyMCE.get('description').getContent();
                var blank='________';
                var ques_parts=question.split(blank);
            
                if(ques_parts.length!=2){
                    alert("You must insert exactly one blank");
                    $('#description').focus();
                }
                else{
                    var option_input=$(this).prev();
                    if(option_input.val()==''){
                        alert('No options are available for this answer.Please insert one.');
                        $(option_input).focus();
                    }
                    else{
                        var confirm_to_proceed=confirm('Are you sure that this is the correct answer?');
                        if(confirm_to_proceed==true){
                            $('input#right_answer').val($(option_input).val());
                            var confirmation_div=$(this).next();
                            $(this).hide();
                            $(confirmation_div).show();
                            var other_buttons=$('div.options_group').find('a.correct_answer_for_one_blank-one');
                            $(other_buttons).each(function(){
                                $(this).hide();
           
                            })
                        }
                
                    }
                }
            }
            
        //alert(right_answer);
        })
    })
        

    $('.insert-gap-for-three_blank').click(function(){

        //$(this).css('background-color','red');
        if(tinyMCE.get('description').getContent()==''){
            alert('Please insert the question first');
            $('#description').focus();
        }
        else{
            
            var question=tinyMCE.get('description').getContent();
            //tinyMCE.execCommand('mceInsertContent',false,'<b>Hello world!!</b>');
            
            var blank='________';
            //alert(question);
            var ques_parts=question.split(blank);
            //alert(ques_parts);
            if(ques_parts.length>=4){
                alert("You can insert exactly three blanks");
            }
            else{
                //alert("hi");
                tinyMCE.execCommand('mceInsertContent',false,'('+ques_parts.length+')'+blank);
            }
            
        }
    //alert($('#description').getCursorPosition());
        
        
    })
    
    $('.insert-gap-for-two_blank').click(function(){

        //$(this).css('background-color','red');
        if(tinyMCE.get('description').getContent()==''){
            alert('Please insert the question first');
            $('#description').focus();
        }
        else{
            var question=tinyMCE.get('description').getContent();
        
            var blank='________';
        
            var ques_parts=question.split(blank);
            //alert(ques_parts);
            if(ques_parts.length>=3){
                alert("You can insert exactly two blanks");
                new_question=question;
            }
            else{
                var new_counter='('+ques_parts.length+')';
                tinyMCE.execCommand('mceInsertContent',false,'('+ques_parts.length+')'+blank);
            }
        }
        
    })
    
    $('.insert-gap-for-one_blank').click(function(){

        //$(this).css('background-color','red');
        if(tinyMCE.get('description').getContent()==''){
            alert('Please insert the question first');
            $('#description').focus();
        }
        else{
            var question=tinyMCE.get('description').getContent();
        
            var blank='________';
           
            var ques_parts=question.split(blank);
            //alert(ques_parts);
            if(ques_parts.length>=2){
                alert("You can insert exactly one blank");
            }
            else{
               tinyMCE.execCommand('mceInsertContent',false,'('+ques_parts.length+')'+blank);
            }
        }
        
        
    })
    
    

    $('.correct_answer_for_select-two').each(function(){
        //$(this).show();
        $(this).click(function(){
            if(tinyMCE.get('description').getContent()==''){
                alert('Please insert the question first');
                $('#description').focus();
            }
            else{
                var option_input=$(this).prev();
                if(option_input.val()==''){
                    alert('No options are available for this answer.Please insert one.');
                    option_input.focus();
                }
                else{
                    var confirm_to_proceed=confirm('Are you sure that this is the correct answer?');
                    if(confirm_to_proceed==true){
                        
                        var right_answers=$('input#right_answer').val();
                        right_answers+=$(option_input).val()+'|';
                        $('input#right_answer').val(right_answers);
                        var confirmation_div=$(this).next();
                        $(this).hide();
                        $(confirmation_div).show();
                        
                    }
                    
                }
            }
        //$(this).css('background-color','red');
            
        })
    })
    
    $('.correct_answer_for_two_blank_sentence_one').each(function(){
        //$(this).show();
        $(this).click(function(){
            
            var correct_answer_buttons=$('div.controls').children('a.correct_answer_for_two_blank_sentence_one');
            var hidden_button=$(correct_answer_buttons).filter(':hidden').size();
            if(hidden_button>=2){
                alert('You already have selected your answer.');
                var other_buttons=$('div.options_group').find('a.correct_answer_for_two_blank_sentence_one');
                $(other_buttons).each(function(){
                    $(this).hide();
           
                })
            }
            else{
                
                if(tinyMCE.get('description').getContent()==''){
                    alert('Please insert the question first');
                    $('#description').focus();
                }
                else{
                    
                    var question=tinyMCE.get('description').getContent();
                    var blank='________';
                    var ques_parts=question.split(blank);
                    
                    if(ques_parts.length!=2){
                        alert("You must insert exactly one blank");
                        $('#description').focus();
                    }
                    
                    else{
                        var option_input=$(this).prev();
                        if(option_input.val()==''){
                            alert('Please insert the option for correct answer');
                            option_input.focus();
                        }
                        else{
                            var confirm_to_proceed=confirm('Are you sure that this is the correct answer?');
                            if(confirm_to_proceed==true){
                                var right_answers=$('input#right_answer').val();
                                right_answers+=$(option_input).val()+'|';
                                $('input#right_answer').val(right_answers);
                                var confirmation_div=$(this).next();
                                $(this).hide();
                                $(confirmation_div).show();
                            }
                            
                        }
                    }
                    
                }
            }
            
        //alert(hidden_button);
        //$(this).css('background-color','red');
           

        })
    })

})