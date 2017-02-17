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
				require 'lineadb.php';
				require 'linea_func.php';

			$id = null;
			if ( !empty($_GET['id'])) {
			    $id = $_REQUEST['id'];
			}
			 
			if ( null==$id ) {
			    header("Location: /");
			}
			 
			if ( !empty($_POST)) {

			    $nomeError = null;
			    $sobrenomeError = null;
			    $instituicaoError = null;
			    $tituloError = null;
			    $dataError = null;
			    $horarioError = null;
			    $resumoError = null;
			    $apresentacaoError = null;
			    $videoError = null;
			    $fotoError = null;
			     
			    // keep track post values
			    $nome = $_POST['nome'];
			    $sobrenome = $_POST['sobrenome'];
			    $instituicao = $_POST['instituicao'];
			    $titulo = $_POST['titulo'];
			    $data = $_POST['data'];
			    $horario = $_POST['horario'];
			    $resumo = $_POST['resumo'];
			    if (!empty($_FILES['upload']['name'][1])) {
			    	$apresentacao = $_FILES['upload']['name'][1];
			    } else {
			    	$apresentacao = $_POST['old_apresentacao'];
			    }
			    $video = $_POST['video'];
			    if (!empty($_FILES['upload']['name'][0])) {
			    	$foto = $_FILES['upload']['name'][0];
			    } else {
			    	$foto = $_POST['old_foto'];
			    }
			     
			    // validate input
			    require 'checkUpload.php';

			    $valid = true;

			    if (empty($nome)) {
			        $nomeError = 'Insira o nome.';
			        $valid = false;
			    }

			    if (empty($sobrenome)) {
			        $sobrenomeError = 'Insira o sobrenome.';
			        $valid = false;
			    }
			     
			    if (empty($instituicao)) {
			        $instituicaoError = 'Insira a instituicao.';
			        $valid = false;
			    }
				
				if (!empty($foto) && $foto != $_POST['old_foto']) {
					// usar checkUpload.php para testar imagem
					$errMsg = checkImg(0, 'upload');
					if ($errMsg){
						$fotoError = $errMsg;
						$foto = $_POST['old_foto'];
						$valid = false;
					}
				}

				if (!empty($apresentacao) && $apresentacao != $_POST['old_apresentacao']) {
					// usar checkUpload.php para testar arquivo
					$errMsg = checkDoc(1, 'upload');
					if ($errMsg){
						$apresentacaoError = $errMsg;
						$apresentacao = $_POST['old_apresentacao'];
						$valid = false;
					}
				}

				if (!empty($video)) {
					if (!filter_var($video, FILTER_VALIDATE_URL)) {
						$videoError = 'URL inválida.';
						$valid = false;
					}
				}
			     
			    // update data
			    if ($valid) {
			        $pdo = Database::connect();
			        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			        $sql = "UPDATE lunchtalks set nome = ?, sobrenome = ?, instituicao = ?, titulo = ?, data = ?, horario = ?, resumo = ?, apresentacao = ?, video = ?, foto = ? WHERE id = ?";
			        $q = $pdo->prepare($sql);
			        $uploadOK = true;
			        if (!empty($foto) && $foto != $_POST['old_foto']) {
			        	if (!upload(0, 'upload', FOTO_DIR)){
			        		$uploadOK = false;
			        	}
			        } else {
			        	$foto = $_POST['old_foto'];
			        }
			        if (empty($titulo)) {
			        	$titulo = WEBINAR_DEFAULT_TITLE;
			        }
			        if (!empty($apresentacao) && $apresentacao != $_POST['old_apresentacao']) {
			        	if (!upload(1, 'upload', APRESENTACAO_DIR)){
			        		$uploadOK = false;
			        	}
			        } else {
			        	$apresentacao = $_POST['old_apresentacao'];
			        }
			        if ($uploadOK) {
			        	$q->execute(array($nome, $sobrenome, $instituicao, $titulo, $data, $horario, $resumo, $apresentacao, $video, $foto, $id));
			        } // Colocar um else para mostrar um possível erro de upload

			        // Inserindo LOG da operação no banco
			        $sql_log = "INSERT INTO log (wp_username, datetime, action, page, resumo) VALUES (?, now(), 'UPDATE', 'LUNCHTALKS', ?)";
			        $q_log = $pdo->prepare($sql_log);
			        
			        $current_user = wp_get_current_user();
			        $wp_username = $current_user->user_login;
					
			        $q_log->execute(array($wp_username, resumo($titulo)));

			        Database::disconnect();
			        header("Location: /lunchtalks/");
			    } else {
			    	$foto = $_POST['old_foto'];
			    	$apresentacao = $_POST['old_apresentacao'];
			    }
			} else {
			    $pdo = Database::connect();
			    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    $sql = "SELECT * FROM lunchtalks where id = ?";
			    $q = $pdo->prepare($sql);
			    $q->execute(array($id));
			    $row = $q->fetch(PDO::FETCH_ASSOC);
			    $nome = $row['nome'];
			    $sobrenome = $row['sobrenome'];
			    $instituicao = $row['instituicao'];
			    $titulo = $row['titulo'];
			    $data = $row['data'];
			    $horario = $row['horario'];
			    $resumo = $row['resumo'];
			    $apresentacao = $row['apresentacao'];
			    $old_apresentacao = $apresentacao;
			    $video = $row['video'];
			    $foto = $row['foto'];
			    $old_foto = $foto;
			    $id = $row['id'];
			    Database::disconnect();
			}
			?>

		    <main class="container">
		    <section>
		        <h1>Editar</h1>
		           
		            <form action="<?php echo get_bloginfo('template_url') . '/lunchtalks_update.php?id=' . $id ?>" method="post" enctype="multipart/form-data">
						<!-- Nome -->
						<div class="grupo-input <?php echo !empty($nomeError)?'error':'';?>">
							<label for="nome" class="control-label">Nome:</label>
							<input id="nome" name="nome" type="text"  placeholder="Nome" value="<?php echo !empty($nome)?$nome:'';?>">
							<?php if (!empty($nomeError)): ?>
							    <span class="errormsg"><?php echo $nomeError;?></span>
							<?php endif; ?>
						</div>
						<!-- Sobrenome -->
						<div class="grupo-input <?php echo !empty($sobrenomeError)?'error':'';?>">
							<label for="sobrenome" class="control-label">Sobrenome:</label>
							<input id="sobrenome" name="sobrenome" type="text"  placeholder="Sobrenome" value="<?php echo !empty($sobrenome)?$sobrenome:'';?>">
							<?php if (!empty($sobrenomeError)): ?>
							    <span class="errormsg"><?php echo $sobrenomeError;?></span>
							<?php endif; ?>
						</div>
						<!-- Instituição -->
						<div class="grupo-input <?php echo !empty($instituicaoError)?'error':'';?>">
							<label for="instituicao" class="control-label">Instituição:</label>
							<input id="instituicao" name="instituicao" type="text"  placeholder="Instituicao" value="<?php echo !empty($instituicao)?$instituicao:'';?>">
							<?php if (!empty($instituicaoError)): ?>
							    <span class="errormsg"><?php echo $instituicaoError;?></span>
							<?php endif; ?>
						</div>
						<!-- Foto -->
						<div class="grupo-input <?php echo !empty($fotoError)?'error':'';?>">
							<img class="speaker-photo" src="<?php  echo FOTO_URL . $foto; ?>" />
							<p> <?php echo $foto; ?> </p> 
							<label for="foto" class="control-label">Foto:</label>
							<input name="old_foto" type="hidden" value="<?php echo $old_foto; ?>">
							<input id="foto" name="upload[]" type="file" value="<?php echo !empty($foto)?$foto:'';?>">
							<?php if (!empty($fotoError)): ?>
							    <span class="errormsg"><?php echo $fotoError;?></span>
							<?php endif; ?>
						</div>
						<!-- Titulo -->
						<div class="grupo-input <?php echo !empty($tituloError)?'error':'';?>">
							<label for="titulo" class="control-label">Título:</label>
							<input id="titulo" name="titulo" type="text"  placeholder="Título" value="<?php echo !empty($titulo)?$titulo:'';?>">
							<?php if (!empty($tituloError)): ?>
							    <span class="errormsg"><?php echo $tituloError;?></span>
							<?php endif; ?>
						</div>
						<!-- Data -->
						<div class="grupo-input <?php echo !empty($dataError)?'error':'';?>">
							<label for="data" class="control-label">Data:</label>
							<input id="data" name="data" type="date" value="<?php echo !empty($data)?$data:'';?>">
							<?php if (!empty($dataError)): ?>
							    <span class="errormsg"><?php echo $dataError;?></span>
							<?php endif; ?>
						</div>
						<!-- Horário -->
						<div class="grupo-input <?php echo !empty($horarioError)?'error':'';?>">
							<label for="horario" class="control-label">Horário:</label>
							<input id="horario" name="horario" type="time" value="<?php echo !empty($horario)?$horario:'';?>">
							<?php if (!empty($horarioError)): ?>
							    <span class="errormsg"><?php echo $horarioError;?></span>
							<?php endif; ?>
						</div>
				        <!-- Resumo -->
				        <div class="grupo-input <?php echo !empty($resumoError)?'error':'';?>">
				          <label for="resumo" class="control-label">Resumo</label>
			              <textarea id="resumo" name="resumo" placeholder="<?php echo !empty($resumo)?$resumo:'Resumo';?>" value="<?php echo !empty($resumo)?$resumo:'';?>"><?php echo !empty($resumo)?$resumo:'';?></textarea>
			              <?php if (!empty($resumoError)): ?>
			                  <span class="errormsg"><?php echo $resumoError;?></span>
			              <?php endif;?>
				        </div>
						<!-- Apresentação -->
						<div class="grupo-input">
							<p><a href="<?php echo APRESENTACAO_URL . $apresentacao;?>"><?php echo $apresentacao;?></a></p>
							<label for="apresentacao" class="control-label">Apresentação:</label>
							<input name="old_apresentacao" type="hidden" value="<?php echo $old_apresentacao; ?>">
							<input id="apresentacao" name="upload[]" type="file" value="<?php echo !empty($apresentacao)?$apresentacao:'';?>">
							<?php if (!empty($apresentacaoError)): ?>
							    <span class="errormsg"><?php echo $apresentacaoError;?></span>
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


		              	<div class="form-actions">
		                  <button type="submit" class="btn">Atualizar</button>
		                  <a class="btn" href="/lunchtalks/">Voltar</a>
		                </div>
		            </form>
		    </section>
		    </main>
	</div>
	<div class="clearboth"></div>
<?php get_footer(); ?>