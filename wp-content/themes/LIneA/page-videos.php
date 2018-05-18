<?php
/*
Template Name: page-videos
*/
?>
<?php
require_once 'database.php';
require_once 'page-videos-functions.php';

if (is_user_logged_in()) {
		$login = 'ativado';
	} else {
		$login = 'desativado';
}

?>
<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
	<div id="content" class="conteudo videos" role="main">
		<h1>Videos <?php echo get_video_group_action('add-category', $login, null) ?></h1>

		<?php

      $pdo = Database::connect();
      $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );

			// Videos com categorias definidas
      $video_grupos = get_video_grupos($pdo);
      foreach ($video_grupos as $row_grupos) {
				$videos = get_videos_por_grupo($pdo, $row_grupos['id']);
				?>
        <h2 class="video-grupo-titulo">
                <i class="fa fa-caret-right"></i>
					<?php echo $row_grupos['titulo'] ?>
					<span class="category-group-icon">
						<?php echo get_video_action('add', $login, $row_grupos['id']); ?>
						<?php echo get_video_group_action('delete', $login, $row_grupos['id']) ?>
					</span>
					<span class="countnum card"><?php echo sprintf("%02d", count($videos)); ?></span>
				</h2>
        <div class="video-grupo">
          <?php
          foreach ($videos as $row_videos) {
            echo video_card($row_videos, $login);
          }
          ?>
        </div>
        <?php
      }

			// Videos sem categorias
      $videos_sem_categoria = get_videos_sem_categoria($pdo);
			if ( $videos_sem_categoria ) {
      ?>
	      <h2 class="video-grupo-titulo">
                    <i class="fa fa-caret-right"></i>
                    Sem Categoria
					<span class="countnum card"><?php echo sprintf("%02d", count($videos_sem_categoria)); ?></span>
				</h2>
	      <div class="video-grupo">
	        <?php
	        foreach ($videos_sem_categoria as $row_videos) {
	          echo video_card($row_videos, $login);
	        }
	        ?>
	      </div>
			<?php
			}
			?>
  </div>
<div class="clearboth"></div>
<?php get_footer(); ?>
