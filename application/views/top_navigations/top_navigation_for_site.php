<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">

            <a class="brand" href="#"><img src="<?php echo base_url()?>/img/codeigniter_logo.gif" width="111" height="30" alt="w3resource logo" /></a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="#about">About</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="#contact">Contact</a></li>
                    <li class="divider-vertical"></li>

                </ul>

                <ul class="nav pull-right">
                    <li class="dropdown" id="menu1">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
                            Login
                            <b class="caret"></b>
                        </a>
                        <?php $this->load->view('top_navigation_forms/login_form'); ?>
                    </li>
                    <li class="divider-vertical"></li>
                    <?php //echo Modules::run('login/login_module/index'); ?>
                    <li><?php echo anchor('registration','Register');?></li>
                        <li class="divider-vertical"></li>
                        <li>
                        <?php $this->load->view('top_navigation_forms/search_form'); ?>
                    </li>
                    <li class="divider-vertical"></li>

                </ul>

            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

