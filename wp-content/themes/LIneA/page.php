<?php get_header(); ?>
<?php get_sidebar(); ?>
			<?php if(function_exists('simple_breadcrumb')) {simple_breadcrumb();} ?>
			<div class="clearboth"></div>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="conteudo" id="post-<?php the_ID(); ?>">
					<h1><?php the_title(); ?></h1>
					<p>
						<?php the_content(); ?>
					</p>
				<div class="clearboth"></div>
					

				</div>
			<?php endwhile; endif; ?>
			<div class="clearboth"></div>
			</div>			
<?php get_footer(); ?>
