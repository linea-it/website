<?php get_header(); ?>
<?php get_sidebar(); ?>
<?php if(function_exists('simple_breadcrumb')) {simple_breadcrumb();} ?>
	<section id="primary">
			<?php if ( have_posts() ) : ?>
				<div class="conteudo" id="content">
				<h1><?php printf( __( '%s', 'twentyfourteen' ), single_cat_title( '', false ) ); ?></h1>
			
<p>
			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					endwhile;
					// Previous/next page navigation.
					twentyfourteen_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?> </p><hr />
		</div><!-- #content -->
	</section><!-- #primary -->
<?php get_footer(); ?>
