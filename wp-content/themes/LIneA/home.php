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
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,200,600,100,300' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
		<meta name="description" content="LIneA - Laboratório Interinstitucional de e-Astronomia" />

			<script>
				function change(id, newClass) {
					identity=document.getElementById(id);
					identity.className=newClass;
				}
			</script>
		<?php
		  $bg = array('DES_img01_alt.png', 'DES_img02_alt.png', 'DES_img07_alt.png'); // array of filenames

		  $i = rand(0, count($bg)-1); // generate random number size of the array
		  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
		?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="tudo">
			<div class="header" style="background:url('<?php bloginfo('template_url'); ?>/fotos/<?php echo $selectedBg; ?>') center">
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
						<h1>Projetos Apoiados</h1>
						<div class="box-projetos">

						<?php
	$mypages = get_pages( array( 'parent' => '2488', 'sort_column' => 'post_name', 'sort_order' => 'asc' ) );

	foreach( $mypages as $page ) {
		$title = $page->post_title;
		$content = $page->post_content;
		$link = get_page_link($page->ID);
		$title = apply_filters( 'the_title', $title );
		$content = apply_filters( 'the_content', $content );
	?>
		<hr />
		<div class="project-card">

		<?php
            $src = get_the_post_thumbnail($page->ID, 'thumbnail');
            ?>
            <a href="<?php echo $link; ?>">
            <?php
            echo $src;
            ?>
            </a>
            <?php
			$project_post = get_post($page->ID);
			setup_postdata($project_post);
			add_filter( 'excerpt_length', 'project_excerpt_length', 999 );
		?>

		<p class="tit-box-projetos truncate-project-title"><strong><a href="<?php echo $link; ?>"><?php echo $title; ?></a></strong></p>
		<p class="truncate-project-excerpt"><?php echo get_the_excerpt(); ?></p>
		</div>
		<div class="clearboth"></div>
	<?php
	}
?>
						</div>
					</div>
					<div class="blog-capa">
						<h2>Galeria</h2>
						<div class="slider-back">
							<div class="slider">
								<?php echo do_shortcode("[huge_it_gallery id='2']"); ?>
							</div>
						</div>
					</div>

					<?php
						require 'database.php';
	    				require 'lineadb.php';

	    				$pdo = Database::connect();
				    	$sql = 'SELECT * FROM webinars ORDER BY data DESC';
				    	$prep = $pdo->prepare($sql);
				    	$prep->execute();
				    	$result = $prep->fetchAll();

	    				Database::disconnect();
	    				$futureWebinars = array();

				        foreach ($result as $row) {

				        	$data = strtotime($row['data']);
				        	$h = strtotime($row['horario']);

				        	if ( (date('Y-m-d', $data) > date('Y-m-d')) || (date('Y-m-d', $data) == date('Y-m-d')) && (date('H:i', strtotime('-1hour')) <= date('H:i', $h)) ) {
				        		array_push($futureWebinars, $row);
				        	}
				        }
			        	$rev = array_reverse($futureWebinars);
					?>


					<div class="blog-capa">
						<h2>Webinars</h2><a href="/seminarios/">+ mais webinars</a>
						<?php
							if ( empty($futureWebinars) ) {
								echo '<p style="text-align: center; font-size: 30px">Em Recesso</p>';
								echo '<p style="text-align: center; margin-bottom: 30px"> A série retorna em março. </p>';

							} else {
								echo '<div>';
								echo '<img class="alignleft" style="height:100px; margin-top: 0px; margin-botton: 0px;" src="' . FOTO_URL . $rev[0]["foto"] . '"/>';
								echo '</div>';
								echo '<div style="padding-top: 10px; padding-bottom: 20px"><spam>' . date("d/m", strtotime($rev[0]["data"])) . ' - </spam> <spam style="color: #fed700;">';
								echo date("h:ia", strtotime($rev[0]["horario"])) . ' BRT</spam> - <em><strong>';
								echo $rev[0]["nome"] . ' ' . $rev[0]["sobrenome"] . '</strong> (' . $rev[0]["instituicao"] . ')</em></span><br/>';
								echo '<em>' . $rev[0]["titulo"] . '</em>';
								echo '</div>';
								echo '<a id="webinar-link-on" href="' . WEBINAR_GTM_LINK . '">Assistir Webinar</a>';
							}

						?>

					</div>

					<div class="blog-capa">
						<h2>Notícias </h2><a href="/noticias/">+ mais notícias</a>
						<?php

                        // Contador para Notícia importante
                        $args = array(
                        	'post_type' => 'post',
                            'post_status' => 'future',
                        	'tax_query' => array(
                        		array(
                        			'taxonomy' => 'category',
                        			'field'    => 'slug',
                        			'terms'    => 'important-news'
                        		),
                        	),
                        );
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) {
                        	while ( $query->have_posts() ) {
                        		$query->the_post();
                                ?>
                                <div class="contador-container">
                                    <p class="texto-contador"><?php echo get_the_content() ?></p>
                                    <p id="contador"><?php echo get_the_date('r') ?></p>
                                </div>
                                <?php
                        	} // end while
                        } // end if


                        // Notícias
						remove_filter( 'excerpt_length', 'project_excerpt_length', 999);
						add_filter( 'excerpt_length', 'custom_excerpt_length', 998 );
						$args = array( 
							'posts_per_page' => 9,
							'order'=> 'DESC',
							'orderby' => 'date',
							'tax_query' => array(
								array(
									'taxonomy' => 'category',
									'field' => 'slug',
									'terms' => 'blog'
								)
							)
						);
						$postslist = get_posts( $args );
						foreach ( $postslist as $post ) :
						  setup_postdata( $post );


						?>

						  <p class="data-blog-capa"><?php the_date('d \d\e F \d\e Y'); ?></p>
							<div class="modulo-novidades truncate news-card">
								<?php
								if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
								  the_post_thumbnail('thumbnail');
								}
								?>
								<p class="truncate-news"><strong><a style="font-size: 17px; color: white" href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></strong></p>
								<!--<p><?php echo get_post_meta( $post->ID, 'resumo-noticia-home', true ); ?></p>-->

								<p class="truncate-news" style="font-size: 13px"><?php echo get_the_excerpt(); ?></p>
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
