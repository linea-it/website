<?php
/*
Template Name: acesso-a-dados
*/
?>

<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
	<div id="content" class="conteudo" role="main">
		<h1>Acesso a dados</h1>
    <?php
      $taxQuery = array(
        array(
          'taxonomy' => 'category',
          'field' => 'slug',
          'terms' => 'acesso-a-dados'
        )
      );

      $args = array(
        'post_type' => 'page',
        'tax_query' => $taxQuery,
        'orderby' => 'title',
        'order' => 'ASC'
      );

      $loop = new WP_Query( $args );

      if ( $loop->have_posts() ) {
        ?>
        <div class="subpagina-acesso-container">
        <?php
        while ( $loop->have_posts() ) {
          $loop->the_post();
          ?>
            <div class="subpagina-acesso">
              <?php
              if ( has_post_thumbnail() ) {
								?>
								<div class="card">
								<?php
								the_post_thumbnail(array(150, 150));
								?>
								</div>
							<?php
							}
              ?>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </div>
          <div class="clearboth"></div>
          <?php
        }
        ?>
        </div>
      <?php
      }
    ?>
	</div><div class="clearboth"></div>
<?php get_footer(); ?>
