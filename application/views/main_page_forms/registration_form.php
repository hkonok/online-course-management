<?php
$form_attributes = array(
    'class' => 'form-horizontal',
    'id' => "registerHere",
);

echo form_open('authentication/register', $form_attributes);
?>

<fieldset>

    <legend>Registration</legend>

    <div class="control-group">
        <label class="control-label">Name</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="name" name="name" rel="popover" data-content="Enter your first and last name." data-original-title="Full Name">
        </div>
    </div>


    <div class="control-group">
        <label class="control-label">Email</label>
        <div class="controls">
            <input type="text" class="input-xlarge" id="email" name="email" rel="popover" data-content="What’s your email address?" data-original-title="Email">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Password</label>
        <div class="controls">
            <input type="password" class="input-xlarge" id="password" name="password" rel="popover" data-content="What’s your email address?" data-original-title="Email">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Confirm Password</label>
        <div class="controls">
            <input type="password" class="input-xlarge" id="conf_password" name="conf_password" rel="popover" data-content="What’s your email address?" data-original-title="Email">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
            <button type="submit" class="btn btn-success" >Create My Account</button>
        </div>
    </div>
</fieldset>

<?php echo form_close() ?>

<script type="text/javascript">
    $(document).ready(function()
    {
        // Popover
        $('#registerHere input').hover(function()
        {
            $(this).popover('show')
        });

        // Validation
        $("#registerHere").validate({
            rules:{
                user_name:"required",
                user_email:{required:true,email: true},
                pwd:{required:true,minlength: 6},
                cpwd:{required:true,equalTo: "#pwd"},
                gender:"required"
            },

            messages:{
                user_name:"Enter your first and last name",
                user_email:{
                    required:"Enter your email address",
                    email:"Enter valid email address"},
                pwd:{
                    required:"Enter your password",
                    minlength:"Password must be minimum 6 characters"},
                cpwd:{
                    required:"Enter confirm password",
                    equalTo:"Password and Confirm Password must match"},
                gender:"Select Gender"
            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight:function(element, errorClass, validClass)
            {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass)
            {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });
    });
</script>
