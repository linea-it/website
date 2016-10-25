<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//PT">
<html <?php language_attributes(); ?>>
	<head>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,700,400' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/imagens/favicon.ico" type="image/x-icon" />
		<meta name="description" content="LIneA - Laboratório Interinstitucional de e-Astronomia" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/carrossel-responsivo.css" type="text/css" media="screen" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
		  $("#af-menu").click(function(){
			$("#menu").toggleClass("menu-resp");
		  });
		});
		</script>
		<?php
		  $bg = array('bg01.jpg', 'bg02.jpg', 'bg03.jpg', 'bg04.jpg', 'bg05.jpg', 'bg06.jpg', 'bg07.jpg' ); // array of filenames

		  $i = rand(0, count($bg)-1); // generate random number size of the array
		  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
		?>
	</head>
	<body <?php body_class(); ?>>
		<div class="tudo">
			<div class="header" style="background:url('<?php bloginfo('template_url'); ?>/fotos/<?php echo $selectedBg; ?>') center center no-repeat">
				<a href="index.html"><img src="<?php bloginfo('template_url'); ?>/imagens/logo-header.png" alt="Home" title="Home" /></a>
				<div class="busca"><?php get_search_form(); ?></div>
				<div class="clearboth"></div>
			</div>
			<div class="meddle">
				<div class="af-menu" id="af-menu">Menu</div>
				<?php get_sidebar(); ?>
				<div class="breadcrumb">&raquo; Home</div>
				<div class="conteudo">
					<h1><?php 
$page_id = 82;
$page_data = get_page( $page_id );
echo ''. $page_data->post_title .'';// echo the title
?></h1>
					<p><?php 
$page_id = 82;
$page_data = get_page( $page_id );
echo ''. $page_data->post_content .'';// echo the content
?></p>
					<div class="blog-capa">
						<h2>Novidades</h2>
						<?php
						$args = array( 'posts_per_page' => 3, 'order'=> 'DESC', 'orderby' => 'date' );
						$postslist = get_posts( $args );
						foreach ( $postslist as $post ) :
						  setup_postdata( $post ); ?> 
							<div>
								<p class="data-blog-capa"><?php the_date(); ?></p>
								<h3><?php the_title(); ?></h3>
								<p><?php the_excerpt(); ?></p><br />
							</div>
						<?php
						endforeach; 
						wp_reset_postdata();
						?>
							<!--<div class="modulo-blog-capa">
							<p class="data-blog-capa">17 de Outubro de 2014</p>
							<h3><a href="">Galeria do Levantamento DES – UGC12578</a></h3>
							<p>O levantamento Dark Energy Survey está no seu segundo ano de observações fazendo imagens em cinco filtros (grizY) de uma grande região do céu. Ao examinarmos as imagens combinadas do primeiro ano de levantamento, nos deparamos com objetos interessantes além...</p>
						</div>
						<div class="modulo-blog-capa">
							<p class="data-blog-capa">14 de Outubro de 2014</p>
							<h3><a href="">Participantes do LIneA tem projeto aprovado em Edital da FAPERJ</a></h3>
							<p>Pessoal associado ao LIneA teve aprovado um auxílio dentro do Edital FAPERJ – Apoio às Instituições de Ensino e Pesquisa Sediadas no Estado do Rio de Janeiro – 2014. Sob coordenação de Luiz Nicolaci da Costa, a equipe do...</p>
						</div>
						<div class="modulo-blog-capa">
							<p class="data-blog-capa">14 de Outubro de 2014</p>
							<h3><a href="">Pesquisador do LIneA tem livro de divulgação indicado ao prêmio Jabuti</a></h3>
							<p>O Prêmio Jabuti anunciou no dia 23/09 a lista de finalistas da sua 56ª edição. O prêmio de literatura brasileira listou dez obras indicadas para cada uma das 27 categorias. A cerimônia de entrega aos vencedores está marcada...</p>
						</div>-->
					</div>
				</div>
				<div class="clearboth"></div>
			</div>
<?php get_footer(); ?>