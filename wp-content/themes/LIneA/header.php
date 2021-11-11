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
        <?php
        if (has_tag('mosaico', $post_id)){
            ?>
            <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/elastic_grid.min.css" />
            <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/demo.css" />
            <?php
        }
        ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/lightbox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/owl.carousel.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/owl.theme.default.min.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery-ui.min.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,700,400' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />	
		<?php
		  $bg = array('DES_img01_alt.png', 'DES_img02_alt.png', 'DES_img07_alt.png'); // array of filenames

		  $i = rand(0, count($bg)-1); // generate random number size of the array
		  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
		?>
		<script>
			function change(id, newClass) {
				identity=document.getElementById(id);
				identity.className=newClass;
			}
		</script>
		<?php wp_head(); ?>
        <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
	</head>
	<body <?php body_class(); ?>>
		<div class="tudo">
            <div class="header" style="background:url('<?php bloginfo('template_url'); ?>/fotos/<?php echo $selectedBg; ?>') center center no-repeat">
                <div class="logos-header-container">
					<div class="logo-linea-header-container">
						<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/imagens/logo-header.png" alt="Home" title="Home" class="logo-linea" /></a>
					</div>
					<div class="logo-inct-header-container">
						<a href="http://inct.cnpq.br/home/"><img src="<?php bloginfo('template_url'); ?>/imagens/inct_logo.png" alt="INCT" title="INCT" class="logo-inct" /></a>
					</div>
					<div class="logo-euniverso-header-container">
						<a href="<?php bloginfo('url'); ?>/010-ciencia/1-projetos/3-inct-do-e-universo-2/"><img src="<?php bloginfo('template_url'); ?>/imagens/inct_euniverso_logo.png" alt="INCT" title="INCT" class="logo-inct" /></a>
					</div>
				</div>
				<div class="tools-header-container">
                    <a class="lrm-login lrm-hide-if-logged-in">Login</a>
                    <?php if (is_user_logged_in()) {
                        $current_user = wp_get_current_user();
                        ?>
                        <p class="user-info"><?php echo $current_user->user_login ?></p>
                        <a href="<?php echo wp_logout_url(); ?>">Logout</a>
                        <?php
                    }
                    ?>
					<div class="busca"><?php get_search_form(); ?></div>
					<div class="sociais">
						<a href="https://www.facebook.com/linea.mcti"><img src="<?php bloginfo('template_url'); ?>/imagens/facebook_circle.png" /></a>
						<a href="https://twitter.com/LIneA_mcti"><img src="<?php bloginfo('template_url'); ?>/imagens/twitter_circle.png" /></a>
						<a href="https://www.instagram.com/linea_mcti/"><img src="<?php bloginfo('template_url'); ?>/imagens/instagram_circle.png" /></a>
					</div>
				</div>
			</div>
			<div class="meddle">
