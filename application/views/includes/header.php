<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $page_title ?></title>

        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.css"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/example-fluid-layout.css"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/jqueryui/ui-lightness/jquery-ui-1.7.2.custom.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/jHtmlArea.css"/>

        <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap-transition.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap-alert.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap-modal.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap-dropdown.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap-scrollspy.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap-tab.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap-tooltip.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap-popover.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap-button.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap-collapse.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap-carousel.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap-typeahead.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/js_for_popup_form.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/jquery_validate.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/jHtmlArea-0.7.5.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/jquery-ui-1.7.2.custom.min.js"></script>
        
        <!-- test code  -->
            <script type="text/javascript" src="<?php echo base_url(); ?>/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
        <script type="text/javascript">
            tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "newdocument,|,bold,italic,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "styleprops,|,visualchars,nonbreaking,template",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
        </script>
        <!-- test code  -->


    </head>
    <body >

