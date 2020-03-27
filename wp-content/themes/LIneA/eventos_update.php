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
	<div id="content" class="conteudo update page" role="main">
			<?php
				require 'database.php';
				require 'linea_func.php';

			$id = null;
			if ( !empty($_GET['id'])) {
			    $id = $_REQUEST['id'];
			}
			if ( !empty($_GET['last_page'])) {
				$last_page = $_REQUEST['last_page'];
			}

			if ( null==$id ) {
			    header("Location: /");
			}

			if ( !empty($_POST)) {
				// keep track validation errors
				$tituloError = null;
				$linkError = null;

				// keep track post values
				$titulo = $_POST['titulo'];
				$data_inicial = $_POST['data_inicial'];
				$data_final = $_POST['data_final'];
				$local = $_POST['local'];
				$envolvimento = $_POST['envolvimento'];
				$porte = $_POST['porte'];
				$link = $_POST['link'];
				$tipo = $_POST['tipo'];
				if (isset($_POST['publico'])){
					$publico = 1;
				} else {
					$publico = 0;
				}
				$last_page = $_POST['last_page'];

		    // validate input
		    $valid = true;
		    if (empty($titulo)) {
		        $tituloError = 'Insira o título';
		        $valid = false;
		    }
				if (!empty($link)) {
					if (!filter_var($link, FILTER_VALIDATE_URL)) {
							$linkError = "$link is not a valid URL";
							$valid = false;
					}
				}

		    // update data
		    if ($valid) {
		        $pdo = Database::connect();
		        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        $sql = "UPDATE eventos set titulo = ?, data_inicial = ?, data_final = ?, local = ?, envolvimento = ?, porte = ?, link = ?, tipo = ?, publico = ? WHERE id = ?";
		        $q = $pdo->prepare($sql);
		        $q->execute(array($titulo, $data_inicial, $data_final, $local, $envolvimento, $porte, $link, $tipo, $publico, $id));

		        // Inserindo LOG da operação no banco
		        $sql_log = "INSERT INTO log (wp_username, datetime, action, page, resumo) VALUES (?, now(), 'UPDATE', 'EVENTOS', ?)";
		        $q_log = $pdo->prepare($sql_log);

		        $current_user = wp_get_current_user();
		        $wp_username = $current_user->user_login;

		        $q_log->execute(array($wp_username, resumo($titulo)));

		        Database::disconnect();
		        header("Location: /" . $last_page . "/");
		    }
			} else {
			    $pdo = Database::connect();
			    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $sql = "SELECT * FROM eventos where id = ?";
			    $q = $pdo->prepare($sql);
			    $q->execute(array($id));
			    $row = $q->fetch(PDO::FETCH_ASSOC);
			    $titulo = $row['titulo'];
			    $data_inicial = $row['data_inicial'];
			    $data_final = $row['data_final'];
					$local = $row['local'];
					$envolvimento = $row['envolvimento'];
					$porte = $row['porte'];
			    $link = $row['link'];
				$id = $row['id'];
				$tipo = $row['tipo'];
				$publico = $row['publico'];
			    Database::disconnect();
			}
			?>

		    <main class="container">
			    <section>
		        <h1>Update</h1>
            <form action="<?php echo get_bloginfo('template_url') . '/eventos_update.php?id=' . $id ?>" method="post">
							<!-- Titulo -->
							<div class="grupo-input <?php echo !empty($tituloError)?'error':'';?>">
								<label for="titulo" class="control-label">Titulo:</label>
								<input id="titulo" name="titulo" type="text"  placeholder="Titulo" value="<?php echo !empty($titulo)?$titulo:'';?>">
								<?php if (!empty($tituloError)): ?>
								    <span class="errormsg"><?php echo $tituloError;?></span>
								<?php endif; ?>
							</div>

							<!-- Local -->
							<div class="grupo-input <?php echo !empty($localError)?'error':'';?>">
								<label for="local" class="control-label">Local:</label>
								<input id="local" name="local" type="text"  placeholder="ex.: LIneA, Rio de Janeiro, Brasil" value="<?php echo !empty($local)?$local:'';?>">
								<?php if (!empty($localError)): ?>
								    <span class="errormsg"><?php echo $localError;?></span>
								<?php endif; ?>
							</div>

							<!-- Data Inicial -->
							<div class="grupo-input">
		  					<label>Data inicial:</label>
		  					<input class="datepicker" type="text" name="data_inicial" placeholder="AAAA-MM-DD" value="<?php echo !empty($data_inicial)?$data_inicial:'';?>">
		  				</div>

							<!-- Data Final -->
		  				<div class="grupo-input">
		  					<label>Data final</label>
		  					<input class="datepicker" type="text" name="data_final" placeholder="AAAA-MM-DD" value="<?php echo !empty($data_final)?$data_final:'';?>">
		  				</div>
							
							<!-- Tipo -->
							<div class="grupo-input">
								<label for="tipo" class="control-label">Tipo:</label>
								<select name="tipo" id="tipo">
									<option value="Ambos" <?php echo $tipo == 'Ambos'?'selected':''; ?> >Ambos</option>
									<option value="Calendario" <?php echo $tipo == 'Calendario'?'selected':''; ?> >Calendario</option>
									<option value="Evento" <?php echo $tipo == 'Evento'?'selected':''; ?> >Evento</option>
								</select>
							</div>

							<!-- Publico -->
							<div class="grupo-input">
								<?php $checked = $publico ?'checked':''; ?>
								<input type="checkbox" name="publico" value="<?php echo $publico ?>" <?php echo $checked ?>>
								<span>Público</span>
							</div>

							<!-- Envolvimento -->
							<div class="grupo-input">
								<label for="envolvimento" class="control-label">Envolvimento:</label>
								<select name="envolvimento" id="envolvimento">
									<option value="Organizacao" <?php echo $envolvimento == 'Organizacao'?'selected':''; ?> >Organizacao</option>
									<option value="Participacao" <?php echo $envolvimento == 'Participacao'?'selected':''; ?> >Participacao</option>
								</select>
							</div>

							<!-- Porte -->
							<div class="grupo-input">
								<label for="porte" class="control-label">Envolvimento:</label>
								<select name="porte" id="porte">
									<option value="Nacional" <?php echo $porte == 'Nacional'?'selected':''; ?> >Nacional</option>
									<option value="Internacional" <?php echo $porte == 'Internacional'?'selected':''; ?> >Internacional</option>
								</select>
							</div>

							<!-- Link -->
							<div class="grupo-input">
								<label for="link" class="control-label">Link:</label>
								<input id="link" name="link" type="text"  placeholder="Link" value="<?php echo !empty($link)?$link:'';?>">
								<?php if (!empty($linkError)): ?>
								    <span class="errormsg"><?php echo $linkError;?></span>
								<?php endif; ?>
							</div>
							<input name="last_page" type="hidden" value="<?php echo $last_page; ?>">
	            <div class="form-actions">
	              <button type="submit" class="btn">Update</button>
	              <a class="btn" href="/<?php echo $last_page ?>/">Back</a>
	            </div>
            </form>
			    </section>
		    </main>
	</div><div class="clearboth"></div>
<?php get_footer(); ?>
