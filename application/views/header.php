<?php defined('BASEPATH') OR exit('No direct script access allowed');

$CI =& get_instance();

if( ! $CI->input->is_ajax_request() ):


?><!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	
	<title>Election Libre</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/normalize.css">
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/jquery.datetimepicker.css">
	<link rel="stylesheet" href="<?php echo site_url() ?>assets/css/style.css">
	
	<script src="<?php echo site_url() ?>assets/js/jquery-1.11.3.js"></script>
	<script src="<?php echo site_url() ?>assets/js/jquery-ui-1.11.4.js"></script>
<!--	<script src="<?php echo site_url() ?>assets/js/bootstrap.min.js"></script>	-->
	<script src="<?php echo site_url() ?>assets/js/jquery.datetimepicker.full.js"></script>
<!--	<script src="<?php echo site_url() ?>assets/js/datepicker-fr.js"></script>	-->
	<script src="<?php echo site_url() ?>assets/js/lang.jquery.js"></script>
	<script src="<?php echo site_url() ?>assets/js/radio.jquery.js"></script>
	<script src="<?php echo site_url() ?>assets/js/manage.jquery.js"></script>
	<script src="<?php echo site_url() ?>assets/js/vote.jquery.js"></script>
	<script src="<?php echo site_url() ?>assets/js/candidate.jquery.js"></script>
	<script src="<?php echo site_url() ?>assets/js/elector.jquery.js"></script>
	<script src="<?php echo site_url() ?>assets/js/result.jquery.js"></script>
	<script src="<?php echo site_url() ?>assets/js/admin.jquery.js"></script>
	<script src="<?php echo site_url() ?>assets/js/catalog.jquery.js"></script>
	<script src="<?php echo site_url() ?>assets/js/tinymce/tinymce.min.js"></script>
	<script src="<?php echo site_url() ?>assets/js/app.js"></script>
</head>
<body>
	
	<header>
	
		<nav>
			<a href="<?php echo site_url() ?>"><?=lang('header_index')?></a>
			<a href="<?php echo site_url() ?>cms/manage"><?=lang('header_manage')?></a>
			<a href="<?php echo site_url() ?>vote/index"><?=lang('header_vote')?></a>
		</nav>

		<?php /*
			Illustration de Bryce Durbin
			http://www.brycedurbin.com/
			http://techcrunch.com/2014/08/02/political-yield/
		*/ ?>
		
		<div class="illustration"></div>
		
	</header>
	
	<main>
	
<?php endif; ?>
