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
			
			if ( !empty($_POST)) {
			    $tituloError = null;

			    // keep track post values
			    $titulo = $_POST['titulo'];

			    // validate input
			    $valid = true;

					if ( empty($titulo) ) {
						$tituloError = 'Título não pode ser vazio.';
						$valid = false;
					}

			    // insert data
			    if ($valid) {
						$pdo = Database::connect();
						$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );

		        $sql = "INSERT INTO video_grupos (titulo) VALUES (?)";
		        $q = $pdo->prepare($sql);

						$q->execute(array($titulo));


		        // Inserindo LOG da operação no banco
		        $sql_log = "INSERT INTO log (wp_username, datetime, action, page, resumo) VALUES (?, now(), 'INSERT', 'VIDEOS-CATEGORIA', ?)";
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
	      <h1>Nova Categoria</h1>
	      <form action="<?php echo get_bloginfo('template_url') . '/video-group-add-category.php' ?>" method="post" enctype="multipart/form-data">

						<!-- Titulo -->
						<div class="grupo-input <?php echo !empty($tituloError)?'error':'';?>">
							<label for="titulo" class="control-label">Título:</label>
							<input id="titulo" name="titulo" type="text"  placeholder="Título" value="<?php echo !empty($titulo)?$titulo:'';?>">
							<?php if (!empty($tituloError)): ?>
							    <span class="errormsg"><?php echo $tituloError;?></span>
							<?php endif; ?>
						</div>

	        	<div class="form-actions">
	            <button type="submit" class="btn">Criar</button>
	            <a class="btn" href="/060-divulgacao/videos/">Voltar</a>
	          </div>
	      </form>
	    </section>
	  </main>
	</div>
	<div class="clearboth"></div>
<?php get_footer(); ?>
