<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>

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
            <a href="#" title="+ mais notícias">
                <div class="card-more"></div>
                <span class="card-more-plus">+</span>
            </a>
        </div><!--NEWS CARD-->

        <div class="home-card webinar-card">
            <h2 class="home-card-title">Webinars</h2>
            <a href="#" title="+ mais webinars">
                <div class="card-more"></div>
                <span class="card-more-plus">+</span>
            </a>
        </div><!--WEBINAR CARD-->

        <div class="home-card gallery-card">
            <h2 class="home-card-title">Galeria de Imagens</h2>
            <a href="#" title="+ mais imagens">
                <div class="card-more"></div>
                <span class="card-more-plus">+</span>
            </a>
        </div><!--GALLERY CARD-->

    </div><!--RIGHT COLUMN-->

    <div class="clearboth"></div>
</div><!--HOME CONTAINER-->
<div class="clearboth"></div>
<?php get_footer(); ?>
