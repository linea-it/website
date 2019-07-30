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
			require_once 'database.php';
			require_once 'linea_func.php';

            $pdo = Database::connect();
            $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );

			if ( !empty($_POST)) {

			    $autorError = null;
			    $instituicaoError = null;
			    $tipoError = null;
			    $orientadorError = null;
                $anoError = null;
                $tituloError = null;

			    // keep track post values
                $autor = $_POST['autor'];
                $instituicao = $_POST['instituicao'];
                $tipo = $_POST['tipo'];
                $orientador = $_POST['orientador'];
                $ano = $_POST['ano'];
                $titulo = $_POST['titulo'];

                // validate input

			    $valid = true;
			    if (empty($autor)) {
			        $autorError = 'Insira o Autor';
			        $valid = false;
                }

                if (empty($instituicao)) {
                    $instituicaoError = 'Insira a instituicao';
                    $valid = false;
                }
                
                if (empty($orientador)) {
                    $orientadorError = 'Insira o orientador';
                    $valid = false;
                }

                if (empty($titulo)) {
                    $tituloError = 'Insira o titulo';
                    $valid = false;
                }
                
			    // update data
			    if ($valid) {
			        $sql = "INSERT INTO `' . DBLINEA_NAME . '`.teses (autor, instituicao, tipo, orientador, ano, titulo) VALUES (?,?,?,?,?,?)";
                    $q = $pdo->prepare($sql);
                    
                    $q->execute(array($autor, $instituicao, $tipo, $orientador, $ano, $titulo));
                    
                    // Inserindo LOG da operação no banco
                    $sql_log = "INSERT INTO log (wp_username, datetime, action, page, resumo) VALUES (?, now(), 'INSERT', 'TESES', ?)";
                    $q_log = $pdo->prepare($sql_log);

                    $current_user = wp_get_current_user();
                    $wp_username = $current_user->user_login;

                    $q_log->execute(array($wp_username, resumo($titulo)));
                    
                    Database::disconnect();
                    header("Location: /new-teses/");
                }
            }
			?>

		    <main class="container">
		    <section>
		        <h1>Criar</h1>

                    <form action="<?php echo get_bloginfo('template_url') . '/teses_create.php' ?>" method="post" enctype="multipart/form-data">
                        <!-- Autor -->
                        <div class="grupo-input <?php echo !empty($autorError)?'error':'';?>">
                            <label for="autor" class="control-label">Autor:</label>
                            <input id="autor" name="autor" type="text"  placeholder="Autor" value="<?php echo !empty($autor)?$autor:'';?>">
                            <?php if (!empty($autorError)): ?>
                                <span class="errormsg"><?php echo $autorError;?></span>
                            <?php endif; ?>
                        </div>
                        <!-- Titulo -->
                        <div class="grupo-input <?php echo !empty($tituloError)?'error':'';?>">
                            <label for="titulo" class="control-label">Titulo:</label>
                            <input id="titulo" name="titulo" type="text"  placeholder="Titulo" value="<?php echo !empty($titulo)?$titulo:'';?>">
                            <?php if (!empty($tituloError)): ?>
                                <span class="errormsg"><?php echo $tituloError;?></span>
                            <?php endif; ?>
                        </div>
                        <!-- Ano -->
                        <div class="grupo-input <?php echo !empty($anoError)?'error':'';?>">
                            <label for="ano" class="control-label">Ano:</label>
                            <input id="ano" name="ano" type="number" value="<?php echo !empty($ano)?$ano:'';?>">
                            <?php if (!empty($anoError)): ?>
                                <span class="errormsg"><?php echo $anoError;?></span>
                            <?php endif; ?>
                        </div>
                        <!-- Instituição -->
                        <div class="grupo-input">
                            <label for="instituicao" class="control-label">Instituição:</label>
                            <input id="instituicao" name="instituicao" type="text"  placeholder="Instituicao" value="<?php echo !empty($instituicao)?$instituicao:'';?>">
                            <?php if (!empty($instituicaoError)): ?>
                                <span class="errormsg"><?php echo $instituicaoError;?></span>
                            <?php endif; ?>
                        </div>
                        <!-- Orientador -->
                        <div class="grupo-input <?php echo !empty($orientadorError)?'error':'';?>">
                            <label for="orientador" class="control-label">Orientador:</label>
                            <input id="orientador" name="orientador" type="text"  placeholder="Orientador" value="<?php echo !empty($orientador)?$orientador:'';?>">
                            <?php if (!empty($orientadorError)): ?>
                                <span class="errormsg"><?php echo $orientadorError;?></span>
                            <?php endif; ?>
                        </div>
                        <!-- Tipo -->
                        <div class="grupo-input">
                            <label for="tipo" class="control-label">Tipo:</label>
                            <select name="tipo" id="tipo">
                                <option value="Mestrado" <?php echo $tipo == 'Mestrado'?'selected':''; ?> >Mestrado</option>
                                <option value="Doutorado" <?php echo $tipo == 'Doutorado'?'selected':''; ?> >Doutorado</option>
                            </select>
                        </div>


                        <div class="form-actions">
                            <button type="submit" class="btn">Criar</button>
                            <a class="btn" href="/new-teses/">Voltar</a>
                        </div>
                    </form>
            </section>
            </main>
    </div>
    <div class="clearboth"></div>
<?php get_footer(); ?>
