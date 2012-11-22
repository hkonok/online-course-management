<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title ?></title>
        <?php echo $css_header ?>

    </head>
    <body>
        <?php $this->load->view('regions/top_navigation'); ?>
        <?php $this->load->view('regions/side_navigation'); ?>
        <div class="span9">
            <?php echo $page_content;?>
        </div>
        <?php echo $end_script ?>


    </body>
</html>