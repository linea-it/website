<?php
/*
Template Name: landing_page
*/
?>
<?php

require_once 'database.php';
require_once 'landing_page_functions.php';
require_once 'access_functions.php';

if (is_user_logged_in()) {
        $login = 'ativado';
    } else {
        $login = 'desativado';
}

$auth_terms = get_user_auth_terms();
$auth_tax_query = build_auth_tax_query($auth_terms);

?>
<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
    <div id="content" class="conteudo landing-page" role="main">
        <?php
            $query_result = new WP_Query( array('post_type' => 'lpcard', 'posts_per_page' => -1) );
        ?>
        <h1>Landing Page</h1>
        <?php

        $lpcategory = 0;
        if (isset($_GET["lpcategory_id"])){
            $lpcategory = $_GET["lpcategory_id"];
        }
        the_breadcrumb($lpcategory);

        // Cards
        //
        if ($lpcategory != 0) {
            // Args for generic cards
            $args = array(
                'post_type' => 'lpcard',
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => -1,
                'tax_query' => array (
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'lpcategory',
                        'field' => 'term_id',
                        'terms' => $lpcategory,
                        'include_children' => false
                    ),
                    $auth_tax_query
                )
            );
            $main_card_class="";
        } else {
            // Args for main cards
            $args = array(
                'post_type' => 'lpcard',
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => -1,
                'tax_query' => array (
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'lpcategory',
                        'field' => 'slug',
                        'terms' => 'main-lpcards',
                        'include_children' => false
                    ),
                    $auth_tax_query
                )
            );
            $main_card_class="main-lpcard";
        }
        $query_result = new WP_Query($args);
            ?>
            <h2>
                <?php echo get_term($lpcategory, 'lpcategory')->name; ?>
            </h2>
            <?php
        if ($query_result->have_posts()) {
            ?>
            <div class="lpcards-container <?php echo $main_card_class; ?>">
            <?php
            while($query_result->have_posts()) {
                $query_result->the_post();
                $thumb_tag = get_the_post_thumbnail(get_the_ID(), 'full');
                $main_link = get_post_meta(get_the_ID(), 'card_main_link', true);
                $alt_link = get_post_meta(get_the_ID(), 'card_alt_link', true);
                $content = get_the_content();
                $row_lpcard = array(
                    'titulo' => get_the_title(),
                    'main_link' => $main_link,
                    'alt_link' => $alt_link,
                    'thumb_tag' => $thumb_tag,
                    'content' => $content
                );
                $permissao = get_permissao(get_the_ID());
                if ($lpcategory != 0) {
                    echo lpcard($row_lpcard, $permissao);
                } else {
                    echo main_lpcard($row_lpcard);
                }

            }
        ?>
        </div>
        <?php
        }
        ?>
  </div>
<div class="clearboth"></div>
<?php get_footer(); ?>
