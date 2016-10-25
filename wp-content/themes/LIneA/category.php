<?php get_header(); ?>
<?php get_sidebar(); ?>
<?php //if(function_exists('simple_breadcrumb')) {simple_breadcrumb();} ?>
<div class="clearboth"></div>
	<div id="content" class="conteudo" role="main">

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h1 class="pagetitle"><?php printf(__('%s', 'kubrick'), single_cat_title('', false)); ?></h1>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1 class="pagetitle"><?php printf(__('Posts Tagged &#8216;%s&#8217;', 'kubrick'), single_tag_title('', false) ); ?></h1>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="pagetitle"><?php printf(_c('Archive for %s|Daily archive page', 'kubrick'), get_the_time(__('F jS, Y', 'kubrick'))); ?></h1>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="pagetitle"><?php printf(_c('Archive for %s|Monthly archive page', 'kubrick'), get_the_time(__('F, Y', 'kubrick'))); ?></h1>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="pagetitle"><?php printf(_c('Archive for %s|Yearly archive page', 'kubrick'), get_the_time(__('Y', 'kubrick'))); ?></h1>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="pagetitle"><?php _e('Author Archive', 'kubrick'); ?></h1>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="pagetitle"><?php _e('Blog Archives', 'kubrick'); ?></h1>
 	  <?php } ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Mais Antigas', 'kubrick')); ?></div>
			<div class="alignright"><?php previous_posts_link(__('Mais Recentes &raquo;', 'kubrick')); ?></div>
		</div>
		<div class="clearboth"></div>
		<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?>>
				<small><?php the_date('d \d\e F \d\e Y') ?></small>
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>

				<div class="entry">
					<?php the_content() ?>
				</div>
				<div class="clearboth"></div>
				<p class="postmetadata"><?php the_tags(__('Tags:', 'kubrick'), ', ', '<br />'); ?> <?php printf(__('Publicado em %s', 'kubrick'), get_the_category_list(', ')); ?> | <?php edit_post_link(__('Edit', 'kubrick'), '', ' | '); ?>  <?php comments_popup_link(__('Nenhum comentário &#187;', 'kubrick'), __('1 Comentário &#187;', 'kubrick'), __('% Comentários &#187;', 'kubrick'), '', __('Comentários Encerrados', 'kubrick') ); ?></p>

			</div>

			<hr /><br /><br />
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Mais Antigas', 'kubrick')); ?></div>
			<div class="alignright"><?php previous_posts_link(__('Mais Recentes &raquo;', 'kubrick')); ?></div>
		</div>
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>".__("Sorry, but there aren't any posts in the %s category yet.", 'kubrick').'</h2>', single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo('<h2>'.__("Sorry, but there aren't any posts with this date.", 'kubrick').'</h2>');
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>".__("Sorry, but there aren't any posts by %s yet.", 'kubrick')."</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>".__('No posts found.', 'kubrick').'</h2>');
		}
	  get_search_form();
	endif;
?>
				
	</div><div class="clearboth"></div>
<?php get_footer(); ?>
