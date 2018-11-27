<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>

<div class="home-container">
    <div class="home-left-column">
        <div class="home-card main-card"></div>
        <div class="home-card projects-card">
        </div>
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
