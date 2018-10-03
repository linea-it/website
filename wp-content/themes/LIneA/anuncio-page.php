<?php
/*
Template Name: anuncio-page
*/
?>
<?php
require 'anuncio-page_functions.php';
?>
<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
    <div id="content" class="conteudo anuncio" role="main">
        <?php
            $categorias = get_the_category();
            $categoria = $categorias[0]->slug;
            $query_result = new WP_Query( array('post_type' => 'anuncio', 'posts_per_page' => -1) );
            $num_anuncios = count($query_result->posts);
        ?>
        <h1><?php echo get_the_title() ?> <span class="countnum card"><?php echo sprintf("%02d", $num_anuncios); ?></span></h1>
        
        <?php
        
        the_content();
        ?>
        <a class="btn" onclick="showAll('anuncio-year-container')"> Mostrar </a>
        <a class="btn" onclick="hideAll('anuncio-year-container')"> Esconder </a>
        <?php
        foreach(get_anuncios_por_ano($categoria) as $year => $posts){

            $today = getdate();
            if ($year == $today[year]) {
                $display = 'block';
            } else {
                $display = 'none';
            }
            ?>
            <a onclick="toggleYear('<?php echo $year; ?>')">
                <h2><?php echo $year; ?> <span class="countnum card"><?php echo sprintf("%02d", count($posts));?></span></h2>
            </a>
            <div style="display: <?php echo $display?>" class="anuncio-year-container" id="<?php echo $year; ?>">
                <div class="anuncio-year">
                <?php 
                $rposts = array_reverse($posts);
                foreach($rposts as $post){
                    setup_postdata($post);
                    $anuncio_url = get_post_meta( get_the_ID(), 'anuncio_url', true );
                    ?>
                    <div class="anuncio-card">  
                        <a href="<?php echo $anuncio_url; ?>">
                        <?php 
                            $post_id_img_default = 4017;
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('full');
                            } else {
                                echo get_the_post_thumbnail($post_id_img_default, 'full');
                            }
                        ?>
                        <h3><?php the_title(); ?></h3>
                        </a>
                        <p><?php echo get_the_date('d \d\e F \d\e Y'); ?></p>
                    </div>    
                    <div class="clearboth"></div>
                    <?php
                }
                ?>
                </div><!-- anuncio-year -->
            </div><!-- id $year -->
        <?php
        }
        ?>
    </div><!-- MAIN -->
<div class="clearboth"></div>
<?php get_footer(); ?>