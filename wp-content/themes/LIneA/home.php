<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<?php
require 'database.php';
require 'lineadb.php';
require 'webinar_functions.php';
require 'home_functions.php';

?>

<div class="home-container">
    <div class="home-left-column">
        <div class="home-card main-card">
            <div class="main-card-linea">
                <?php
                $linea_page_id = 3718; // TODO: Buscar por tag
                $page_data = get_post( $linea_page_id );
                setup_postdata($page_data);
                $thumbnail_tag = get_the_post_thumbnail($linea_page_id, 'full');
                ?>
                <a class="main-card-link" href="<?php echo get_the_permalink($linea_page_id); ?>">
                    <?php
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
                </a>
            </div><!--MAIN CARD LINEA-->

            <div class="main-card-inct">
                <?php
                $inct_page_id = 4488; // TODO: Buscar por tag
                $page_data = get_post( $inct_page_id );
                setup_postdata($page_data);
                $thumbnail_tag = get_the_post_thumbnail($inct_page_id, 'full');
                ?>
                <a class="main-card-link" href="<?php echo get_the_permalink($inct_page_id); ?>">
                    <?php
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
                </a>
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

        <div class="home-card data-access-card">
            <h2 class="home-card-title">Acesso à Dados</h2>
            <?php
            $args = array(
                'post_type' => 'page',
                'order'=> 'ASC',
                'orderby' => 'title',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => 'acesso-a-dados'
                    )
                )
            );
            $query = new WP_Query( $args );
            ?>
            <div class="card-links-container">
            <?php
            while ( $query->have_posts() ) {
                $query->the_post();
                ?>
                <?php echo page_link_container($post->ID); ?>
                <?php
            }
            ?>
            </div>
        </div><!--DATA-ACCESS CARD-->

        <!--div class="home-card">
            <div class="card-links-container">
                <?php echo page_link_container(4230); ?> <!--PUBLICACOES>

                <?php echo page_link_container(4865); ?> <!--ACESSO A DADOS>

            </div><!--GENERAL CONTAINER>
        </div><!--GENERAL CARD-->

        <!--div class="home-card">
            <h2 class="home-card-title">Serviços</h2>
            <div class="card-links-container">
                <?php echo page_link_container(
                    '', 
                    'Download Request Form', 
                    'https://docs.google.com/forms/d/1pmEFXiBQL1kMD0UE5Zuu4EgN2Wx_aiphedTuMsWkQgU/viewform',
                    6976
                ); 
                ?> <!--DOWNLOAD FORM>

                <?php echo page_link_container(5693);?> <!--DOWNLOAD STATUS>
                
                <?php echo page_link_container(
                    '', 
                    'Registro de Participantes', 
                    'https://docs.google.com/forms/d/1NX1pfvF84rIq4MToD23mHCHwv5AHTPmXqWADJ6HIqLw/viewform',
                    6978
                ); 
                ?> <!--REGISTRO DE PARTICIPANTES>

            </div><!--SERVICES CONTAINER>
        </div--><!--SERVICES CARD-->

    </div><!--LEFT COLUMN-->

    <div class="home-right-column">
        <div class="home-card tweets-card">
            <h2 class="home-card-title">Notícias</h2>
            <?php
            $twitter_screen_name='LIneA_mcti';
            $twitter_base_url='https://twitter.com/';
            $twitter_news_tag=' ';
            $twitter_url=$twitter_base_url.$twitter_screen_name;
            ?>
            <a href="<?php echo $twitter_url ?>" title="+ mais notícias">
                <div class="card-more"></div>
                <span class="card-more-plus">+</span>
            </a>
            <?php
            
            $num_of_tweets=3;
            $twitter_logo_slug='twitter-logo-small-fade-100x100';
            $tweets = get_tweets($twitter_screen_name, $num_of_tweets, $twitter_news_tag);
            ?>
            <div class="owl-carousel owl-theme">
            <?php
            foreach($tweets as $tweet){
                show_tweet($tweet, $twitter_base_url, $twitter_logo_slug);
            }
            ?>
            </div><!--OWL-CAROUSEL-->
        </div><!--NEWS CARD-->


        <div class="home-card news-card">
            <h2 class="home-card-title">Blogs</h2>
            <a href="/noticias/" title="+ mais blogs">
                <div class="card-more"></div>
                <span class="card-more-plus">+</span>
            </a>
            <?php
            $posts = get_blogs(5);
            ?>
            <div class="owl-carousel owl-theme">
                <?php
                foreach($posts as $post_object){
                    show_blog($post_object);
                }
                ?>
            </div><!--OWL-CAROUSEL-->
        </div><!--BLOGS CARD-->

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
                    $args = array(
                        'post_type' => 'post',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'recesso-webinar'
                            ),
                        ),
                    );
                    $query = new WP_Query( $args );
                    if ($query->have_posts()) {
                        $query->the_post();
                        $thumb_url = get_the_post_thumbnail_url($query->ID, 'full');
                    }
                    ?>
                    <div class="webinar-card-photo-container">
                        <img class="webinar-card-photo" src="<?php echo $thumb_url; ?>"/>
                    </div>
                    <div class="webinar-card-info">
                        <h3 class="webinar-card-title"><?php echo get_the_title(); ?></h3>
                    </div>
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
            <h2 class="home-card-title">Galerias</h2>
            <div class="card-links-container">
                <?php echo page_link_container(6039, 'Fotos'); ?> <!--AFILIADOS-->
                
                <?php echo page_link_container(2547, 'Imagens'); ?> <!--IMAGENS-->

                <?php echo page_link_container(5016, 'Vídeos'); ?> <!--VIDEOS-->

            </div><!--GALLERIES CONTAINER-->
        </div><!--GALLERY CARD-->

    </div><!--RIGHT COLUMN-->

    <div class="clearboth"></div>
</div><!--HOME CONTAINER-->
<div class="clearboth"></div>
<?php get_footer(); ?>
