<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">

            <a class="brand" href="#"><img src="<?php echo base_url() ?>/img/codeigniter_logo.gif" width="111" height="30" alt="w3resource logo" /></a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a href="<?php echo base_url(); ?>index.php?admin/">Home</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="#about">About</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="#contact">Contact</a></li>
                    <li class="divider-vertical"></li>

                </ul>

                <ul class="nav pull-right">
                    <li><?php if (isset($_SESSION['user_id'])) echo '<a>'.$_SESSION['user_email'].'</a>'; ?></li>
                    <li class="divider-vertical"></li>
                    <?php //echo Modules::run('login/login_module/index'); ?>
                    <li><?php if (isset($_SESSION['user_id'])) echo anchor('admin/logout','Logout'); ?></li>

                </ul>

            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

