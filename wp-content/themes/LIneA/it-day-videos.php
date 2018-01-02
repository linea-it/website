<?php
/*
Template Name: it-day
*/
?>
<?php
require 'ytb_functions.php';
?>
<?php get_header();?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
	<div id="content" class="conteudo webinars" role="main">
		<h1>IT Day</h1>
        <?php
            $args = array(
                'post_type' => 'post',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => 'apresentacoes'
                    ),
                ),
                'tag' => 'it-day',
                'orderby' => 'date',
                'order' => 'ASC',
                'posts_per_page' => -1
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    $video_url = get_post_meta(get_the_ID(), 'apresentacao_url', true);
                    $ytbID = getID($video_url);
                    ?>
                    <div class="apresentacao-horiz-container">
                        <div class="apresentacao-horiz-video">
                            <a class="apresentacao-horiz-link" href="<?php echo $video_url ?>"/>
                                <img class="apresentacao-horiz-thumb" src="http://img.youtube.com/vi/<?php echo $ytbID ?>/hqdefault.jpg"/>
                            </a>
                        </div>
                        <div class="apresentacao-horiz-caption">
                            <p class="apresentacao-horiz-titulo">Título: <?php echo get_the_title() ?></p>
                            <p class="apresentacao-horiz-autor">Autor: <?php echo get_post_meta(get_the_ID(), 'apresentacao_autor', true) ?></p>
                            <p class="apresentacao-horiz-arquivo">Arquivo: <?php echo get_post_meta(get_the_ID(), 'apresentacao_arquivo', true) ?></p>
                        </div>
                    </div>
                    <?php
                } // end while
            } // end if
        ?>
    </div>
<div class="clearboth"></div>
<?php get_footer(); ?>