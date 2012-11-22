<div data-spy="scroll" data-target="#mybar" class="span3">
    <div   class="well sidebar-nav " style=" position: fixed; padding-left: 5%; height: 20px;">
        <ul class="nav pull-right ">
            <li class="dropdown " id="my">
                <a   style="  font-size: 125%; font-weight: bold;" class="dropdown-toggle " data-toggle="dropdown" href="#my">
                    Number of Words
                    <b class="caret"></b>
                </a>
                <div class="dropdown-menu has-tip " >
                    <form style="margin: 0px; overflow:auto;height: 500px;width: 110%; " accept-charset="UTF-8" action="<?php echo base_url() ?>index.php/wordlist/word_form" method="post">
                        <div style="margin:0;padding:0;display:inline;">
                            <input name="utf8" type="hidden" value="&#x2713;"  />
                            <input name="authenticity_token" type="hidden" value="4L/A2ZMYkhTD3IiNDMTuB/fhPRvyCNGEsaZocUUpw40=" />
                        </div >
                        <fieldset class='textbox' style="padding:5px;">
                            <input name="total" style="margin-top: 8px;" type="text" placeholder="Total Number" onKeyPress="return numbersonly(this, event)" />
                            <?php
                            for ($i = 'A';; $i++) {
                                echo "<input  name='" . $i . "' style='margin-top: 8px;' type='text' placeholder='Number of words starting with " . $i . "' onKeyPress='return numbersonly(this, event)' />";
                                if ($i=='Z'

                                    )break;
                            }
                            ?>
                            <input class="btn btn-primary" style="clear: left; width: 96%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Submit" />
                        </fieldset>
                    </form>
                </div>
            </li>
        </ul>
    </div><!--/.well -->
</div>
<script>
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function numbersonly(myfield, e, dec)
{
var key;
var keychar;

if (window.event)
   key = window.event.keyCode;
else if (e)
   key = e.which;
else
   return true;
keychar = String.fromCharCode(key);

// control keys
if ((key==null) || (key==0) || (key==8) ||
    (key==9) || (key==13) || (key==27) )
   return true;

// numbers
else if ((("0123456789").indexOf(keychar) > -1))
   return true;

// decimal point jump
else if (dec && (keychar == "."))
   {
   myfield.form.elements[dec].focus();
   return false;
   }
else
   return false;
}

function table_word(var1)
{

//alert("xxx");
//alert(var1);

var one= document.getElementById(var1+"x").innerHTML;
var two= document.getElementById(var1+"y").innerHTML;


document.getElementById("my_word1").innerHTML=one;
document.getElementById("my_word2").innerHTML=two;


}


</script>