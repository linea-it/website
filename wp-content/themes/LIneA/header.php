<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//PT">
<!-- 
######################################
#   Este site foi desenvolvido por   #
# Mairus "Webber" Maichrovicz Cabral #
# www.mairus.com -- mairus@gmail.com #
######################################
 -->
<html <?php language_attributes(); ?>>
	<head>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/lightbox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/owl.carousel.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/owl.theme.css" type="text/css" media="screen" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,700,400' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
		
		<?php
		  $bg = array('DES_img01_alt.png', 'DES_img02_alt.png', 'DES_img07_alt.png'); // array of filenames

		  $i = rand(0, count($bg)-1); // generate random number size of the array
		  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
		?>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/prototype.js"></script>
		
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scriptaculous.js?load=effects,builder"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/lightbox.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
		<script>
			function change(id, newClass) {
				identity=document.getElementById(id);
				identity.className=newClass;
			}
		</script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="tudo">
			<div class="header" style="background:url('<?php bloginfo('template_url'); ?>/fotos/<?php echo $selectedBg; ?>') center center no-repeat">
				<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/imagens/logo-header.png" alt="Home" title="Home" class="logo-linea" /></a>
				<div class="busca"><?php get_search_form(); ?></div>
				<div class="sociais">
					<a href="https://www.facebook.com/linea.mcti"><img src="<?php bloginfo('template_url'); ?>/imagens/facebook_circle.png" /></a>
					<a href="https://twitter.com/LIneA_mcti"><img src="<?php bloginfo('template_url'); ?>/imagens/twitter_circle.png" /></a></div>
				<div class="clearright"></div>
				<div class="clearboth"></div>
			</div>
			<div class="meddle">
