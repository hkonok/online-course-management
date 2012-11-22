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

