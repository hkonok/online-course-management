<div class="dropdown-menu has-tip">
    <form style="margin: 0px; overflow:auto;" accept-charset="UTF-8" action="<?php echo base_url() ?>index.php?authentication/login" method="post"><div style="margin:0;padding:0;display:inline;"><input name="utf8" type="hidden" value="&#x2713;"  /><input name="authenticity_token" type="hidden" value="4L/A2ZMYkhTD3IiNDMTuB/fhPRvyCNGEsaZocUUpw40=" /></div>
        <fieldset class='textbox' style="padding:10px">
            <input name="email" style="margin-top: 8px" type="text" placeholder="Email" />
            <input name="password" style="margin-top: 8px" type="password" placeholder="Passsword" />
            <input id="user_remember_me" style="float: left; margin-right: 10px; " type="checkbox" name="user[remember_me]" value="1" />
            <label class="string optional" for="user_remember_me">Remember me</label>
            <input class="btn btn-primary" style="clear: left; width: 96%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
        </fieldset>
    </form>
</div>