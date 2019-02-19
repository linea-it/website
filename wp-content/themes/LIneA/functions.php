<?php
/**
 * Twenty Fourteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see twentyfourteen_content_width()
 *
 * @since Twenty Fourteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 474;
}

/**
 * Twenty Fourteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfourteen_setup' ) ) :
/**
 * Twenty Fourteen setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_setup() {

	/*
	 * Make Twenty Fourteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentyfourteen', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url(), 'genericons/genericons.css' ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'twentyfourteen-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'twentyfourteen_get_featured_posts',
		'max_posts' => 6,
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'twentyfourteen_setup' );

/**
 * Adjust content_width value for image attachment template.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'twentyfourteen_content_width' );

/**
 * Getter function for Featured Content Plugin.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return array An array of WP_Post objects.
 */
function twentyfourteen_get_featured_posts() {
	/**
	 * Filter the featured posts to return in Twenty Fourteen.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array|bool $posts Array of featured posts, otherwise false.
	 */
	return apply_filters( 'twentyfourteen_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return bool Whether there are featured posts.
 */
function twentyfourteen_has_featured_posts() {
	return ! is_paged() && (bool) twentyfourteen_get_featured_posts();
}

/**
 * Register three Twenty Fourteen widget areas.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_widget( 'Twenty_Fourteen_Ephemera_Widget' );

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'twentyfourteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'twentyfourteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'twentyfourteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'twentyfourteen_widgets_init' );

/**
 * Register Lato Google font for Twenty Fourteen.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return string
 */
function twentyfourteen_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'twentyfourteen' ) ) {
		$query_args = array(
			'family' => urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_scripts() {
	// Add Lato font, used in the main stylesheet.
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfourteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfourteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfourteen-style' ), '20131205' );
	wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfourteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		wp_enqueue_script( 'twentyfourteen-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ), '20131205', true );
		wp_localize_script( 'twentyfourteen-slider', 'featuredSliderDefaults', array(
			'prevText' => __( 'Previous', 'twentyfourteen' ),
			'nextText' => __( 'Next', 'twentyfourteen' )
		) );
	}

	wp_enqueue_script( 'twentyfourteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20140616', true );
}
add_action( 'wp_enqueue_scripts', 'twentyfourteen_scripts' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_admin_fonts() {
	wp_enqueue_style( 'twentyfourteen-lato', twentyfourteen_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'twentyfourteen_admin_fonts' );

if ( ! function_exists( 'twentyfourteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default Twenty Fourteen attachment size.
	 *
	 * @since Twenty Fourteen 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentyfourteen_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'twentyfourteen_list_authors' ) ) :
/**
 * Print a list of all site contributors who published at least one post.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_list_authors() {
	$contributor_ids = get_users( array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	) );

	foreach ( $contributor_ids as $contributor_id ) :
		$post_count = count_user_posts( $contributor_id );

		// Move on if user has not published a post (yet).
		if ( ! $post_count ) {
			continue;
		}
	?>

	<div class="contributor">
		<div class="contributor-info">
			<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
			<div class="contributor-summary">
				<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></h2>
				<p class="contributor-bio">
					<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
				</p>
				<a class="button contributor-posts-link" href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
					<?php printf( _n( '%d Article', '%d Articles', $post_count, 'twentyfourteen' ), $post_count ); ?>
				</a>
			</div><!-- .contributor-summary -->
		</div><!-- .contributor-info -->
	</div><!-- .contributor -->

	<?php
	endforeach;
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image except in Multisite signup and activate pages.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentyfourteen_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} elseif ( ! in_array( $GLOBALS['pagenow'], array( 'wp-activate.php', 'wp-signup.php' ) ) ) {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}
add_filter( 'body_class', 'twentyfourteen_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function twentyfourteen_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'twentyfourteen_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @global int $paged WordPress archive pagination page count.
 * @global int $page  WordPress paginated post page count.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentyfourteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );

// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] ) {
	require get_template_directory() . '/inc/featured-content.php';
}

// Customização da galeria default

add_filter('post_gallery', 'my_post_gallery', 10, 2);
function my_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';

    // Here's your actual output, you may customize it to your need
    $output = "<div class=\"gallery\">\n";

    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
      $img = wp_get_attachment_image_src($id, 'thumbnail');
      $img2 = wp_get_attachment_image_src($id, 'large');
//      $img = wp_get_attachment_image_src($id, 'full');

		$output .= "<a href=\"{$img2[0]}\" rel=\"lightbox\">\n";
        $output .= "<img src=\"{$img[0]}\" width=\"{$img[1]}\" height=\"{$img[2]}\" alt=\"\" />\n";
		$output .= "</a>\n";
    }

    $output .= "</div>\n";

    return $output;
}

function custom_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function project_excerpt_length( $length ) {
	return 50;
}

function main_card_excerpt_length( $length ) {
    return 10;
}

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


function posts_by_year() {
  // array to use for results
  $years = array();

  // get posts from WP
  $posts = get_posts(array(
    'numberposts' => -1,
    'orderby' => 'post_date',
    'order' => 'ASC',
    'post_type' => 'post',
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => 'blog'
        ),
    )
  ));

  // loop through posts, populating $years arrays
  foreach($posts as $post) {
    $years[date('Y', strtotime($post->post_date))][] = $post;
  }

  // reverse sort by year
  krsort($years);

  return $years;
}

function add_taxonomies_to_pages() {
 register_taxonomy_for_object_type( 'post_tag', 'page' );
 register_taxonomy_for_object_type( 'category', 'page' );
 }
add_action( 'init', 'add_taxonomies_to_pages' );

// remove width & height attributes from images
//
function remove_img_attr ($html) {
	return preg_replace('/(width|height)="\d+"\s/', "", $html);
}
add_filter( 'post_thumbnail_html', 'remove_img_attr' );

// Videos
//
function create_post_type_video() {
    $nome_singular = 'Video';
    $nome = 'Videos';
    $labels = array(
        'name' => $nome,
        'singular_name' => $nome_singular,
        'add_new' => 'Adicionar novo',
        'add_new_item' => 'Adicionar novo ' . $nome_singular,
        'edit_item' => 'Editar ' . $nome_singular,
        'new_item' => 'Novo ' . $nome_singular,
        'view_item' => 'Visualizar ' . $nome_singular,
        'view_items' => 'Visualizar ' . $nome,
        'search_items' => 'Localizar ' . $nome
    );
    $supports = array(
        'title',
        'editor',
        'excerpt',
        'custom-fields'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-video-alt2',
        'supports' => $supports
    );
    register_post_type( 'video', $args );
}
add_action( 'init', 'create_post_type_video' );

function adiciona_suporte_videos() {
    register_taxonomy_for_object_type('grupo', 'video');
    register_taxonomy_for_object_type('post_tag', 'video');
}
add_action( 'init', 'adiciona_suporte_videos' );


function criar_taxonomia_grupo() {
    $nome_singular = 'Grupo';
    $nome = 'Grupos';
    $labels = array(
        'name'                       => $nome,
        'singular_name'              => $nome_singular,
        'search_items'               => 'Procurar ' . $nome,
        'popular_items'              => $nome . 'Populares',
        'all_items'                  => 'Todas as ' . $nome,
        'edit_item'                  => 'Editar ' . $nome_singular,
        'update_item'                => 'Atualizar ' . $nome_singular,
        'add_new_item'               => 'Adicionar nova ' . $nome_singular,
        'new_item_name'              => 'Nova ' . $nome_singular,
        'separate_items_with_commas' => 'Separar ' . $nome . ' com vírgulas',
        'add_or_remove_items'        => 'Adicionar ou remover ' . $nome,
        'choose_from_most_used'      => 'Escolher entre as ' . $nome . ' mais usadas',
        'not_found'                  => 'Nenhuma ' . $nome_singular . ' encontrada',
        'menu_name'                  => $nome_plural
    );
    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels
    );
    register_taxonomy( 'grupo', 'video' , $args);
}
add_action('init', 'criar_taxonomia_grupo');

function muda_colunas_lista_videos( $cols ) {
    $cols = array(
      'cb' => '<input type="checkbox" />',
      'title' => __('Title'),
      'author' => __('Author'),
      'taxonomy-grupo' => 'Grupos',
      'tags' => __('Tags'),
      'comments' => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
      'date' => __('Date')
    );
    return $cols;
  }
  add_filter( "manage_video_posts_columns", "muda_colunas_lista_videos" );

  // Anúncios
  //
  function create_post_type_anuncios() {
    $nome_singular = 'Anúncio';
    $nome = 'Anúncios';
    $labels = array(
        'name' => $nome,
        'singular_name' => $nome_singular,
        'add_new' => 'Adicionar novo',
        'add_new_item' => 'Adicionar novo ' . $nome_singular,
        'edit_item' => 'Editar ' . $nome_singular,
        'new_item' => 'Novo ' . $nome_singular,
        'view_item' => 'Visualizar ' . $nome_singular,
        'view_items' => 'Visualizar ' . $nome,
        'search_items' => 'Localizar ' . $nome
    );
    $supports = array(
        'title',
        'editor',
        'excerpt',
        'custom-fields',
        'thumbnail'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-email',
        'supports' => $supports,
        'taxonomies' => array('category')
    );
    register_post_type( 'anuncio', $args );
}
add_action( 'init', 'create_post_type_anuncios' );

// Galeria de Images

function criando_taxonomia_album() {
    $singular = 'Album';
    $plural = 'Albums';

    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'view_item' => 'Ver ' . $singular,
        'edit_item' => 'Editar ' . $singular,
        'new_item' => 'Novo ' . $singular,
        'add_new_item' => 'Adicionar novo ' . $singular
        );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true,
        'query_var' => true,
        'show_admin_column' => true
        );

    register_taxonomy('album', 'fotos', $args);
}

add_action( 'init' , 'criando_taxonomia_album' );

function registra_post_type_fotos() {

    $nomeSingular = 'Foto';
    $nomePlural = 'Fotos';

    $labels = array(
        'name' => $nomePlural,
        'singular_name' => $nomeSingular,
        'add_new' => 'Adicionar nova ' . $nomeSingular,
        'add_new_item' => 'Adicionar nova ' . $nomeSingular,
        'edit_item' => 'Editar ' . $nomeSingular,
        'new_item' => 'Nova ' . $nomeSingular,
        'all_items' => 'Todas as ' . $nomePlural,
        'view_item' => 'Visualizar ' . $nomeSingular,
        'search_items' => 'Procurar ' . $nomePlural,
        'not_found' => 'Nenhuma ' . $nomeSingular . 'encontrada',
        'not_found_in_trash' => 'Nenhuma ' . $nomeSingular . 'encontrada na Lixeira',
        'parent_item_colon' => '',
        'menu_name' => $nomePlural
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'taxonomies' => array( 'album', 'post_tag' ),
        'supports' => array( 'title', 'author', 'thumbnail', 'comments' ),
        'menu_icon' => 'dashicons-camera'
    );
    register_post_type( 'fotos', $args );
    add_image_size( 'thumbnail-list', '100', '100', true );
}

add_action( 'init', 'registra_post_type_fotos' );

function muda_colunas_lista_fotos( $cols ) {
    $cols = array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Title'),
        'author' => __('Author'),
        'taxonomy-album' => 'Album',
        'tags' => __('Tags'),
        'comments' => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
        'date' => __('Date'),
        'thumbnail' => __('Thumbnail')
      );
      return $cols;
  }
  add_filter( "manage_fotos_posts_columns", "muda_colunas_lista_fotos" );
  
  function colunas_customizadas( $col, $post_id ) {
      switch ( $col ) {
        case 'thumbnail':
          $tag = '<img style="width: 100px" src="' . get_the_post_thumbnail_url($post_id, "thumbnail-list") . '"/>';
          echo $tag;
          break;
      }
  }
  add_action( 'manage_fotos_posts_custom_column' , 'colunas_customizadas', 10, 2);

// Documentos
//
function create_post_type_documento() {
    $nome_singular = 'Documento';
    $nome = 'Documentos';
    $labels = array(
        'name' => $nome,
        'singular_name' => $nome_singular,
        'add_new' => 'Adicionar novo',
        'add_new_item' => 'Adicionar novo ' . $nome_singular,
        'edit_item' => 'Editar ' . $nome_singular,
        'new_item' => 'Novo ' . $nome_singular,
        'view_item' => 'Visualizar ' . $nome_singular,
        'view_items' => 'Visualizar ' . $nome,
        'search_items' => 'Localizar ' . $nome
    );
    $supports = array(
        'title',
        'editor',
        'excerpt',
        'custom-fields'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-aside',
        'supports' => $supports
    );
    register_post_type( 'documento', $args );
}
add_action( 'init', 'create_post_type_documento' );

function adiciona_suporte_documentos() {
    register_taxonomy_for_object_type('categoria', 'documento');
    register_taxonomy_for_object_type('post_tag', 'documento');
}
add_action( 'init', 'adiciona_suporte_documentos' );


function criar_taxonomia_categoria() {
    $nome_singular = 'Categoria';
    $nome = 'Categorias';
    $labels = array(
        'name'                       => $nome,
        'singular_name'              => $nome_singular,
        'search_items'               => 'Procurar ' . $nome,
        'popular_items'              => $nome . 'Populares',
        'all_items'                  => 'Todas as ' . $nome,
        'edit_item'                  => 'Editar ' . $nome_singular,
        'update_item'                => 'Atualizar ' . $nome_singular,
        'add_new_item'               => 'Adicionar nova ' . $nome_singular,
        'new_item_name'              => 'Nova ' . $nome_singular,
        'separate_items_with_commas' => 'Separar ' . $nome . ' com vírgulas',
        'add_or_remove_items'        => 'Adicionar ou remover ' . $nome,
        'choose_from_most_used'      => 'Escolher entre as ' . $nome . ' mais usadas',
        'not_found'                  => 'Nenhuma ' . $nome_singular . ' encontrada',
        'menu_name'                  => $nome_plural
    );
    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels
    );
    register_taxonomy( 'categoria', 'documento' , $args);
}
add_action('init', 'criar_taxonomia_categoria');

function muda_colunas_lista_categorias( $cols ) {
    $cols = array(
      'cb' => '<input type="checkbox" />',
      'title' => __('Title'),
      'author' => __('Author'),
      'taxonomy-categoria' => 'Categorias',
      'tags' => __('Tags'),
      'comments' => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
      'date' => __('Date')
    );
    return $cols;
  }
  add_filter( "manage_categoria_posts_columns", "muda_colunas_lista_categorias" );
