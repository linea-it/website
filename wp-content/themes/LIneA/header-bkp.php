<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//PT">
<html <?php language_attributes(); ?>>
	<head>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/lightbox.css" type="text/css" media="screen" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,700,400' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/imagens/favicon.ico" type="image/x-icon" />
		<meta name="description" content="LIneA - Laboratório Interinstitucional de e-Astronomia" />
		<?php
		  $bg = array('bg01.jpg', 'bg02.jpg', 'bg03.jpg', 'bg04.jpg', 'bg05.jpg', 'bg06.jpg', 'bg07.jpg' ); // array of filenames

		  $i = rand(0, count($bg)-1); // generate random number size of the array
		  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
		?>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/prototype.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/lightbox.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
		  $("#af-menu").click(function(){
			$("#menu").toggleClass("menu-resp");
		  });
		});
		</script>
	</head>
	<body <?php body_class(); ?>>
		<div class="tudo">
			<div class="header" style="background:url('<?php bloginfo('template_url'); ?>/fotos/<?php echo $selectedBg; ?>') center center no-repeat">
				<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/imagens/logo-header.png" alt="Home" title="Home" /></a>
				<div class="busca"><?php get_search_form(); ?></div>
				<div class="clearboth"></div>
			</div>
			<div class="meddle">
				<div class="af-menu" id="af-menu">Menu</div>
