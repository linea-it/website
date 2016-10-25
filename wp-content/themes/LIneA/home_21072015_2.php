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
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,700,400' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/imagens/favicon.ico" type="image/x-icon" />
		<meta name="description" content="LIneA - Laboratório Interinstitucional de e-Astronomia" />
		
			<script>
				function change(id, newClass) {
					identity=document.getElementById(id);
					identity.className=newClass;
				}
			</script>
		<?php
		  $bg = array('bg01.jpg', 'bg02.jpg', 'bg03.jpg'); // array of filenames

		  $i = rand(0, count($bg)-1); // generate random number size of the array
		  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
		?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="tudo">
			<div class="header" style="background:url('<?php bloginfo('template_url'); ?>/fotos/<?php echo $selectedBg; ?>') left center">
				<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/imagens/logo-header.png" alt="Home" title="Home" class="logo-linea" /></a>
				<div class="busca"><?php get_search_form(); ?></div>
				<div class="sociais">
					<a href="https://www.facebook.com/linea.mcti"><img src="<?php bloginfo('template_url'); ?>/imagens/facebook_circle.png" /></a>
					<a href="https://twitter.com/LIneA_mcti"><img src="<?php bloginfo('template_url'); ?>/imagens/twitter_circle.png" /></a></div>
				<div class="clearright"></div>
				
				<div class="clearboth"></div>
			</div>
			<div class="meddle">
				<?php get_sidebar(); ?>
				<div class="breadcrumb">&raquo; Home</div>
				<div class="conteudo">
					<div class="box-home-left">
						<h1><?php 
						$page_id = 82;
						$page_data = get_page( $page_id );
						echo ''. $page_data->post_title .'';// echo the title
						?></h1>
						<p class="oqueeolinea"><?php 
						$page_id = 82;
						$page_data = get_page( $page_id );
						echo ''. $page_data->post_content .'';// echo the content
						?></p>
						<h1><?php 
						$page_id = 2915;
						$page_data = get_page( $page_id );
						echo ''. $page_data->post_title .'';// echo the title
						?></h1>
						<p class="oqueeolinea"><?php 
						$page_id = 2915;//2612/2915 
						$page_data = get_page( $page_id );
						echo ''. $page_data->post_content .'';// echo the content
						?></p>
						<h1>Projetos</h1>
						<div class="box-projetos">
						
						<?php
	$mypages = get_pages( array( 'parent' => '2488', 'sort_column' => 'post_name', 'sort_order' => 'asc' ) );

	foreach( $mypages as $page ) {		
		$title = $page->post_title;
		$content = $page->post_content;

		$title = apply_filters( 'the_title', $title );
		$content = apply_filters( 'the_content', $content );
	?>
		<hr />
		<!-- <img src="<?php
//$src = wp_get_attachment_image_src( get_post_thumbnail_id($page->ID), 'full', '' );
//echo $src[0];
?>" class="img-box-projetos" /> -->
		<?php
			$src = get_the_post_thumbnail($page->ID, 'thumbnail');
			echo $src
		?>
		<p class="tit-box-projetos"><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></p>
		<p><?php echo get_post_meta( $page->ID, 'resumo-projeto-home', true ); ?></p>
		<div class="clearboth"></div>
	<?php
	}	
?>						
						</div>
					</div>
					<div class="blog-capa">
						<h2>Notícias</h2>
						<?php
						$args = array( 'posts_per_page' => 6, 'order'=> 'DESC', 'orderby' => 'date' );
						$postslist = get_posts( $args );
						foreach ( $postslist as $post ) :
						  setup_postdata( $post ); ?> 
						  <p class="data-blog-capa"><?php the_date(); ?></p>
							<div class="modulo-novidades">
								<?php 
								if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
								  the_post_thumbnail('thumbnail');
								} 
								?>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<!--<p><?php echo get_post_meta( $post->ID, 'resumo-noticia-home', true ); ?></p>-->
								<p style="color: red"><?php the_excerpt(); ?></p>
								<div class="clearboth"></div>
							</div>
						<?php
						endforeach; 
						wp_reset_postdata();
						?>
					</div>
					<div class="clearboth"></div>
				</div>
				<div class="clearboth"></div>
			</div>
<?php get_footer(); ?>