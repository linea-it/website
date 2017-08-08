<?php

require( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );
if (!is_user_logged_in()) {
	header("Location: /");
}

?>
<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
	<div id="content" class="conteudo create page" role="main">
			<?php
			require 'database.php';
			require 'linea_func.php';
			require_once 'page-videos-functions.php';

			if ( !empty($_GET) ) {
				$id = $_GET['id'];
				$pdo = Database::connect();
				$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );

				$sql_categoria = "SELECT * FROM videos WHERE id = ?";
				$prep = $pdo->prepare($sql_categoria);
			  $prep->execute(array($id));
			  $result = $prep->fetchAll();
				$video_row = $result[0];

				$titulo = $video_row['titulo'];
				$video = $video_row['video'];
				$id_grupo = $video_row['video_grupo_id'];
			} else {
				header("Location: /060-divulgacao/videos/");
			}
			if ( !empty($_POST)) {
			    $tituloError = null;
			    $videoError = null;

			    // keep track post values
			    $titulo = $_POST['titulo'];
			    $video = $_POST['video'];
					$id_grupo = $_POST['categoria'];
					$id = $_POST['id'];

			    // validate input
			    $valid = true;

					if ( empty($titulo) ) {
						$tituloError = 'Título não pode ser vazio.';
						$valid = false;
					}
					if ( empty($video) ) {
						$videoError = 'Vídeo não pode ser vazio.';
					} else {
						if (!filter_var($video, FILTER_VALIDATE_URL)) {
							$videoError = 'URL inválida.';
							$valid = false;
						}
					}

			    // insert data
			    if ($valid) {
						$pdo = Database::connect();
						$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );

		        $sql = "UPDATE videos set titulo = ?, video = ?, video_grupo_id = ? WHERE id = ?";
		        $q = $pdo->prepare($sql);

						$q->execute(array($titulo, $video, $id_grupo, $id));


		        // Inserindo LOG da operação no banco
		        $sql_log = "INSERT INTO log (wp_username, datetime, action, page, resumo) VALUES (?, now(), 'UPDATE', 'VIDEOS', ?)";
		        $q_log = $pdo->prepare($sql_log);

		        $current_user = wp_get_current_user();
		        $wp_username = $current_user->user_login;

		        $q_log->execute(array($wp_username, resumo($titulo)));

		        Database::disconnect();
		        header("Location: /060-divulgacao/videos/");
			    }
			}
			?>

	  <main class="container">
	    <section>
	      <h1>Update Vídeo</h1>
	      <form action="<?php echo get_bloginfo('template_url') . '/videos-update.php' ?>" method="post" enctype="multipart/form-data">

						<!-- Titulo -->
						<div class="grupo-input <?php echo !empty($tituloError)?'error':'';?>">
							<label for="titulo" class="control-label">Título:</label>
							<input id="titulo" name="titulo" type="text"  placeholder="Título" value="<?php echo !empty($titulo)?$titulo:'';?>">
							<?php if (!empty($tituloError)): ?>
							    <span class="errormsg"><?php echo $tituloError;?></span>
							<?php endif; ?>
						</div>

						<!-- Vídeo -->
						<div class="grupo-input">
							<label for="video" class="control-label">Vídeo:</label>
							<input id="video" name="video" type="text"  placeholder="Vídeo" value="<?php echo !empty($video)?$video:'';?>">
							<?php if (!empty($videoError)): ?>
							    <span class="errormsg"><?php echo $videoError;?></span>
							<?php endif; ?>
						</div>

						<!-- Categorias -->
						<div class="grupo-input">
							<label for="categoria" class="control-label">Categoria:</label>
							<?php echo get_video_grupos_select($pdo, $id_grupo); ?>
						</div>

						<input name="id" type="hidden" value="<?php echo $id; ?>">

	        	<div class="form-actions">
	            <button type="submit" class="btn">Salvar</button>
	            <a class="btn" href="/060-divulgacao/videos/">Voltar</a>
	          </div>
	      </form>
	    </section>
	  </main>
	</div>
	<div class="clearboth"></div>
<?php get_footer(); ?>
