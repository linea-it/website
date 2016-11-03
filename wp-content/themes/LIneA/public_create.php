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
			    // keep track validation errors
			    $tituloError = null;
			    $autorError = null;
			    $anoError = null;
			    $statusError = null;
			     
			    // keep track post values
			    $titulo = $_POST['titulo'];
			    $autor = $_POST['autor'];
			    $ano = $_POST['ano'];
			    $revista = $_POST['revista'];
			    $status = $_POST['status'];
			    $numpagina = $_POST['numpagina'];
			    $link = $_POST['link'];
			     
			    // validate input
			    $valid = true;
			    if (empty($titulo)) {
			        $tituloError = 'Insira o título';
			        $valid = false;
			    }
			     
			    if (empty($autor)) {
			        $autorError = 'Insira o autor';
			        $valid = false;
			    }
			     
			    if (empty($ano)) {
			        $anoError = 'Insira o ano';
			        $valid = false;
			    }

			     
			    // update data
			    if ($valid) {
			        $pdo = Database::connect();
			        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			        $sql = "INSERT INTO publicacoes (titulo, autor, ano, revista, status, numpagina, link) values (?, ?, ?, ?, ?, ?, ?)";
			        $q = $pdo->prepare($sql);
			        $q->execute(array($titulo, $autor, $ano, $revista, $status, $numpagina, $link));

			        // Inserindo LOG da operação no banco
			        $sql_log = "INSERT INTO log (wp_username, datetime, action, page, resumo) VALUES (?, now(), 'INSERT', 'PUBLICACOES', ?)";
			        $q_log = $pdo->prepare($sql_log);
			        
			        $current_user = wp_get_current_user();
			        $wp_username = $current_user->user_login;
					
			        $q_log->execute(array($wp_username, resumo($titulo)));

			        Database::disconnect();
			        header("Location: /new-publicacoes/");
			    }
			}
			?>

		    <main class="container">
		    <section>
		        <h1>Create</h1>
		           
		            <form action="<?php echo get_bloginfo('template_url') . '/public_create.php' ?>" method="post">
						<div class="grupo-input <?php echo !empty($tituloError)?'error':'';?>">
							<label for="titulo" class="control-label">Titulo:</label>
							<input id="titulo" name="titulo" type="text"  placeholder="Titulo" value="<?php echo !empty($titulo)?$titulo:'';?>">
							<?php if (!empty($tituloError)): ?>
							    <span class="errormsg"><?php echo $tituloError;?></span>
							<?php endif; ?>
						</div>
						<div class="grupo-input <?php echo !empty($autorError)?'error':'';?>">
							<label for="autor" class="control-label">Autor:</label>
							<input id="autor" name="autor" type="text"  placeholder="Autor" value="<?php echo !empty($autor)?$autor:'';?>">
							<?php if (!empty($autorError)): ?>
							    <span class="errormsg"><?php echo $autorError;?></span>
							<?php endif; ?>
						</div>
						<div class="grupo-input <?php echo !empty($anoError)?'error':'';?>">
							<label for="ano" class="control-label">Ano:</label>
							<input name="ano" type="number" value="<?php echo !empty($ano)?$ano:'';?>">
							<?php if (!empty($anoError)): ?>
							    <span class="errormsg"><?php echo $anoError;?></span>
							<?php endif; ?>
						</div>
						<div class="grupo-input">
							<label for="revista" class="control-label">Revista:</label>
							<input id="revista" name="revista" type="text"  placeholder="Revista" value="<?php echo !empty($revista)?$revista:'';?>">
							<?php if (!empty($revistaError)): ?>
							    <span class="errormsg"><?php echo $revistaError;?></span>
							<?php endif; ?>
						</div>
						<div class="grupo-input">
							<label for="status" class="control-label">Status:</label>
							<select name="status" id="status">
								<option value="submetido" <?php echo $status == 'submetido'?'selected':''; ?> >Submetido</option>
								<option value="aceito" <?php echo $status == 'aceito'?'selected':''; ?> >Aceito</option>
								<option value="publicado" <?php echo $status == 'publicado'?'selected':''; ?> >Publicado</option>
							</select>
						</div>
						<div class="grupo-input">
							<label for="numpagina" class="control-label">Página:</label>
							<input id="numpagina" name="numpagina" type="text"  placeholder="Página" value="<?php echo !empty($numpagina)?$numpagina:'';?>">
							<?php if (!empty($numpaginaError)): ?>
							    <span class="errormsg"><?php echo $numpaginaError;?></span>
							<?php endif; ?>
						</div>	
						<div class="grupo-input">
							<label for="link" class="control-label">Link:</label>
							<input id="link" name="link" type="text"  placeholder="Link" value="<?php echo !empty($link)?$link:'';?>">
							<?php if (!empty($linkError)): ?>
							    <span class="errormsg"><?php echo $linkError;?></span>
							<?php endif; ?>
						</div>																							
		              	<div class="form-actions">
		                  <button type="submit" class="btn">Create</button>
		                  <a class="btn" href="/new-publicacoes/">Back</a>
		                </div>
		            </form>
		    </section>
		    </main>
	</div>
	<div class="clearboth"></div>
<?php get_footer(); ?>