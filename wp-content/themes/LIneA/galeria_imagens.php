<?php
/*
Template Name: Galeria de Imagens
*/
?>
<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
    <div id="content" class="conteudo galeria-imagens" role="main">
        <h1><?php echo get_the_title() ?></h1>
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $query_result = new WP_Query( array('post_type' => 'fotos', 'posts_per_page' => 15, 'paged' => $paged) );
        ?>
        <div class="grid-imagens are-images-unloaded">
            <div class="grid-imagens__col-sizer"></div>
            <div class="grid-imagens__gutter-sizer"></div>
            <?php
            if ( $query_result->have_posts() ) {
                while ( $query_result->have_posts() ) {
                    $query_result->the_post(); 
                    ?>
                        <div class="grid-imagens__item <?php echo $grid_size; ?>">
                            <img src="<?php echo get_the_post_thumbnail_url($query_result->ID)?>"/>
                        </div>
                    <?php
                } // end while
            } // end if
            ?>
            
        </div>
        <div class="grid-alpha"></div>
        <div class="page-load-status">
            <div class="loader-ellips infinite-scroll-request">
                <span class="loader-ellips__dot"></span>
                <span class="loader-ellips__dot"></span>
                <span class="loader-ellips__dot"></span>
                <span class="loader-ellips__dot"></span>
            </div>
            <p class="infinite-scroll-last">Fim do conteúdo</p>
            <p class="infinite-scroll-error">Sem mais fotos para carregar</p>
        </div>
    </div><!-- MAIN -->
<div class="clearboth"></div>
<?php get_footer(); ?>