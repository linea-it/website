<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<?php
require 'database.php';
require 'lineadb.php';
require 'webinar_functions.php';
?>

<div class="home-container">
    <div class="home-left-column">
        <div class="home-card main-card">
            <div class="main-card-linea">
                <?php
                $linea_page_id = 82; // TODO: Buscar por tag
                $page_data = get_post( $linea_page_id );
                setup_postdata($page_data);
                add_filter( 'excerpt_length', 'main_card_excerpt_length', 999 );
                $thumbnail_tag = get_the_post_thumbnail($linea_page_id, 'full');
                if ($thumbnail_tag){
                    ?>
                    <div class="logo-container">
                    <?php
                    echo $thumbnail_tag;
                    ?>
                    </div>
                    <?php
                }
                ?>
                <h3 class="main-card-title">
                    <?php echo $page_data->post_title; ?>
                </h3>
                <p class="main-card-excerpt">
                    <?php echo get_the_excerpt(); ?>
                </p>
                <a class="main-card-link" href="<?php echo get_the_permalink($linea_page_id); ?>">leia mais</a>
            </div><!--MAIN CARD LINEA-->

            <div class="main-card-inct">
                <?php
                $inct_page_id = 4488; // TODO: Buscar por tag
                $page_data = get_post( $inct_page_id );
                setup_postdata($page_data);
                add_filter( 'excerpt_length', 'main_card_excerpt_length', 999 );
                $thumbnail_tag = get_the_post_thumbnail($inct_page_id, 'full');
                if ($thumbnail_tag){
                    ?>
                    <div class="logo-container">
                    <?php
                    echo $thumbnail_tag;
                    ?>
                    </div>
                    <?php
                }
                ?>
                <h3 class="main-card-title">
                    <?php echo $page_data->post_title; ?>
                </h3>
                <p class="main-card-excerpt">
                    <?php echo get_the_excerpt(); ?>
                </p>
                <a class="main-card-link" href="<?php echo get_the_permalink($inct_page_id); ?>">leia mais</a>
            </div><!--MAIN CARD INCT-->

        </div><!--MAIN CARD-->

        <div class="home-card projects-card">
            <?php
            $mypages = get_pages( array( 'parent' => '2488', 'sort_column' => 'post_name', 'sort_order' => 'asc' ) );
            foreach( $mypages as $page ) {
                $title = $page->post_title;
                $link = get_the_permalink($page->ID);
                $title = apply_filters( 'the_title', $title );
                $thumbnail_tag = get_the_post_thumbnail($page->ID, 'full');
                ?>
                <div class="project">
                    <a href="<?php echo $link; ?>">
                        <div class="project-logo-container">
                            <?php echo $thumbnail_tag; ?>
                        </div>
                        <h3 class="project-title"><?php echo $title ?></h3>
                    </a>
                </div>
                <?php
            }
            ?>
        </div><!--PROJECTS CARD-->

    </div><!--LEFT COLUMN-->

    <div class="home-right-column">
        <div class="home-card news-card">
            <h2 class="home-card-title">Notícias</h2>
            <a href="/noticias/" title="+ mais notícias">
                <div class="card-more"></div>
                <span class="card-more-plus">+</span>
            </a>
            <?php
            $args = array( 
                'posts_per_page' => 3,
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
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) {
                ?>
                <div class="owl-carousel owl-theme">
                <?php
                while ( $query->have_posts() ) {
                    $query->the_post();
                    ?>

                    <div class="news-item">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <div class="news-img-container">
                                <?php echo the_post_thumbnail('full');; ?>
                            </div>
                            <h3 class="news-item-title"><?php echo get_the_title();?></h3>
                        </a>
                        <span class="news-item-date"><?php echo get_the_date('d \d\e F \d\e Y'); ?></span>
                    </div>
                    <?php
                }
                ?>
                </div><!--OWL-CAROUSEL-->
                <?php
            }
            ?>
        </div><!--NEWS CARD-->

        <div class="home-card webinar-card">
            <h2 class="home-card-title">Webinars</h2>
            <a href="/seminarios/" title="+ mais webinars">
                <div class="card-more"></div>
                <span class="card-more-plus">+</span>
            </a>
            <div class="webinar-card-container">
                <?php
                $next_webinar = get_next_webinar();
                if ( empty($next_webinar) ) {
                    ?>
                    <p style="text-align: center; font-size: 30px">Em Recesso</p>
                    <p style="text-align: center; margin-bottom: 30px"> A série retorna em março. </p>
                <?php
                } else {
                    $webinar_img_src = FOTO_URL . $next_webinar["foto"];
                    $webinar_date = date("d/m", strtotime($next_webinar["data"]));
                    $webinar_hour = date("h:ia", strtotime($next_webinar["horario"])) . ' BRT';
                    $webinar_author = $next_webinar["nome"] . ' ' . $next_webinar["sobrenome"];
                    ?>
                    <div class="webinar-card-photo-container">
                        <img class="webinar-card-photo" src="<?php echo $webinar_img_src; ?>"/>
                    </div>
                    <div class="webinar-card-info">
                        <div class="webinar-card-first-line">
                            <span class="webinar-card-date"><?php echo $webinar_date; ?></span> - 
                            <span class="webinar-card-hour"><?php echo $webinar_hour;?></span> - 
                            <span class="webinar-card-author"><?php echo $webinar_author; ?></span>
                            <span class="webinar-card-institution">(<?php echo $next_webinar["instituicao"]; ?>)</span>
                        </div>
                        <h3 class="webinar-card-title"><?php echo $next_webinar["titulo"]; ?></h3>
                    </div>
                    <a id="webinar-link-on" href="<?php echo WEBINAR_GTM_LINK; ?>">Assistir Webinar</a>
                <?php
                }
                ?>
            </div><!--WEBINAR-CARD-CONTAINER-->
        </div><!--WEBINAR CARD-->

        <div class="home-card gallery-card">
            <h2 class="home-card-title">Galeria de Imagens</h2>
            <a href="/060-divulgacao/2-galeria-de-imagens/" title="+ mais imagens">
                <div class="card-more"></div>
                <span class="card-more-plus">+</span>
            </a>
            <div class="gallery-container">
                <?php echo do_shortcode("[huge_it_gallery id='2']");?>
            </div>
        </div><!--GALLERY CARD-->

    </div><!--RIGHT COLUMN-->

    <div class="clearboth"></div>
</div><!--HOME CONTAINER-->
<div class="clearboth"></div>
<?php get_footer(); ?>
