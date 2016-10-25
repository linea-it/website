<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div class="breadcrumb"><a href="<?php bloginfo('url'); ?>">LIneA</a> » <a href="<?php bloginfo('url'); ?>/Noticias/" rel="category tag">Noticias</a></div>
<div class="clearboth"></div>
		<div id="content" class="conteudo" role="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			
			<h1><?php the_title(); ?></h1>
			<div class="date-single">
				<small><?php the_date('d \d\e F \d\e Y') ?> | LIneA</small>
			</div>
			<div class="clearboth"></div>
			<div class="entry">
				<?php the_content('<p class="serif">' . __('Read the rest of this entry &raquo;', 'kubrick') . '</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'kubrick') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>' . __('Tags:', 'kubrick') . ' ', ', ', '</p>'); ?>
				<div class="clearboth"></div>
				<p class="postmetadata alt">
					<small>
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/wordpress/time-since/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); $time_since = sprintf(__('%s ago', 'kubrick'), time_since($entry_datetime)); */ ?>
						
						<?php //printf(__('This entry was posted on %1$s at %2$s and is filed under %3$s.', 'kubrick'), get_the_time(__('l, F jS, Y', 'kubrick')), get_the_time(), get_the_category_list(', ')); ?>
						<?php //printf(__("You can follow any responses to this entry through the <a href='%s'>RSS 2.0</a> feed.", "kubrick"), get_post_comments_feed_link()); ?> 
						
						<?php if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
							<?php //printf(__('You can <a href="#respond">leave a response</a>, or <a href="%s" rel="trackback">trackback</a> from your own site.', 'kubrick'), get_trackback_url()); ?>

						<?php } elseif ( !comments_open() && pings_open() ) {
							// Only Pings are Open ?>
							<?php //printf(__('Responses are currently closed, but you can <a href="%s" rel="trackback">trackback</a> from your own site.', 'kubrick'), get_trackback_url()); ?>

						<?php } elseif ( comments_open() && !pings_open() ) {
							// Comments are open, Pings are not ?>
							<?php //_e('You can skip to the end and leave a response. Pinging is currently not allowed.', 'kubrick'); ?>

						<?php } elseif ( !comments_open() && !pings_open() ) {
							// Neither Comments, nor Pings are open ?>
							<?php //_e('Both comments and pings are currently closed.', 'kubrick'); ?>

						<?php } //edit_post_link(__('Edit this entry', 'kubrick'),'','.'); ?>

					</small>
				</p>

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.', 'kubrick'); ?></p>

<?php endif; ?>

	</div>
				<div class="clearboth"></div>
<!-- <hr style="clear: both"> -->
<?php get_footer(); ?>