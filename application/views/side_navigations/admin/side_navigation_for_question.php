
<div class="span4" style="padding-right: 30px">
    
                    <div class="well sidebar-nav">
                        <ul class="nav nav-list">
                            <li class="nav-header" style=" background-color: #F9FCFC;">Manage Questions</li>
                            <li <?php if(isset($id) && $id==1) echo "class='active'"; ?> ><a href="<?php echo base_url()."index.php?admin_panel/views/1/"; ?>">Create Questions</a></li>
                            <li <?php if(isset($id) && $id==2) echo "class='active'"; ?> ><a href="<?php echo base_url()."index.php?admin_panel/views/2/"; ?>">View Questions</a></li>
                           
                            <li class="nav-header" style=" background-color: #F9FCFC;">Manage Problem Set</li>
                            <li <?php if(isset($id) && $id==3) echo "class='active'"; ?> ><a href="<?php echo base_url()."index.php?admin_panel/views/3/";?>" >Create Problem Subset</a></li>
                            <li <?php if(isset($id) && $id==4) echo "class='active'"; ?> ><a href="<?php echo base_url()."index.php?admin_panel/views/4/";?>">Manage Problem Subset</a></li>
                            <li <?php if(isset($id) && $id==5) echo "class='active'"; ?> ><a href="<?php echo base_url()."index.php?admin_panel/views/5/";?>">Create Problem Set</a></li>
                            <li <?php if(isset($id) && $id==6) echo "class='active'"; ?> ><a href="<?php echo base_url()."index.php?admin_panel/views/6/";?>">Manage Problem Set</a></li>
                        </ul>
                    </div>

                </div>
