<?php
/**
 * Template Name: Sloan Digital Sky Survey
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

?>
<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="home-card projects-card">
            <?php
            $mypages = get_pages( array( 'parent' => '7638', 'sort_column' => 'post_name', 'sort_order' => 'asc' ) );
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
</div> 
<?php get_footer(); ?>