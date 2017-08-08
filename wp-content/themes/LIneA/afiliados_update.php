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
			require_once 'database.php';
			require_once 'linea_func.php';
			require_once 'afiliados_functions.php';

			$pdo = Database::connect();
			$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
			$projetos_todos = get_projetos($pdo);

			$id = null;
			if ( !empty($_GET['id'])) {
			    $id = $_REQUEST['id'];
			}

			if ( null==$id ) {
			    header("Location: /");
			}

			if ( !empty($_POST)) {

			    $nomeError = null;
			    $nascimentoError = null;
			    $nacionalidadeError = null;
			    $telefoneError = null;
			    $celularError = null;
			    $instituicaoError = null;
			    $cargoError = null;
			    $supervisorError = null;
			    $emailLineaError = null;
			    $gmailError = null;
			    $emailAltError = null;
			    $cpfError = null;
			    $identidadeError = null;
			    $orgEmissorError = null;
			    $ufEmissorError = null;
			    $passaporteEstrangeiroError = null;
			    $passaporteResidenteError = null;
			    $cpfEstrangeiroResidenteError = null;
			    $dataInicioError = null;
			    $dataSaidaError = null;
			    $statusError = null;
			    $paisAtualError = null;
			    $funcaoError = null;
			    $skypeError = null;

			    // keep track post values
			    $nome = $_POST['nome'];
			    $nascimento = $_POST['nascimento'];
			    $nacionalidade = $_POST['nacionalidade'];
			    $telefone = $_POST['telefone'];
			    $celular = $_POST['celular'];
			    $instituicao = $_POST['instituicao'];
			    $cargo = $_POST['cargo'];
			    $supervisor = $_POST['supervisor'];
			    $emailLinea = $_POST['emailLinea'];
			    $gmail = $_POST['gmail'];
			    $emailAlt = $_POST['emailAlt'];
			    $cpf = $_POST['cpf'];
			    $identidade = $_POST['identidade'];
			    $orgEmissor = $_POST['orgEmissor'];
			    $ufEmissor = $_POST['ufEmissor'];
			    $passaporteEstrangeiro = $_POST['passaporteEstrangeiro'];
			    $passaporteResidente = $_POST['passaporteResidente'];
			    $cpfEstrangeiroResidente = $_POST['cpfEstrangeiroResidente'];
			    $dataInicio = $_POST['dataInicio'];
			    $dataSaida = $_POST['dataSaida'];
			    $status = $_POST['status'];
					if ( isset($_POST['projetos']) ) {
						$projetos = $_POST['projetos'];
					}
			    $paisAtual = $_POST['paisAtual'];
			    $funcao = $_POST['funcao'];
			    $skype = $_POST['skype'];

			    // validate input
			    $valid = true;
			    if (empty($nome)) {
			        $nomeError = 'Insira o nome';
			        $valid = false;
			    }

			    // if (empty($nacionalidade)) {
			    //     $nacionalidadeError = 'Insira a nacionalidade';
			    //     $valid = false;
			    // }

			    // if (empty($instituicao)) {
			    //     $instituicaoError = 'Insira a instituicao';
			    //     $valid = false;
			    // }

			    // update data
			    if ($valid) {
			        $sql = "UPDATE afiliados set nome = ?, nascimento = ?, nacionalidade = ?, telefone = ?, celular = ?, instituicao = ?,
			        		cargo = ?, supervisor = ?, email_linea = ?, gmail = ?, email_alt = ?, cpf = ?, identidade = ?, org_emissor = ?,
			        		uf_emissor = ?, passaporte_estrangeiro = ?, passaporte_residente = ?, cpf_estrangeiro_residente = ?, data_inicio = ?,
			        		data_saida = ?, status = ?, pais_atual = ?, funcao = ?, skype = ? WHERE id = ?";
			        $q = $pdo->prepare($sql);
			        $q->execute(array($nome, $nascimento, $nacionalidade, $telefone, $celular, $instituicao, $cargo, $supervisor, $emailLinea, $gmail, $emailAlt, $cpf,
			        	$identidade, $orgEmissor, $ufEmissor, $passaporteEstrangeiro, $passaporteResidente, $cpfEstrangeiroResidente, $dataInicio, $dataSaida, $status,
			        	$paisAtual, $funcao, $skype, $id));

							// Update projetos_associados
							if ( isset( $projetos ) ) {
								$projetos_associados = get_projetos_associados($pdo, $id);
								foreach ( $projetos as $projeto ) {
									if ( !in_array( $projeto, $projetos_associados ) ) {
										$projeto_id = get_projeto_id($projetos_todos, $projeto);
										salva_projeto_associado($pdo, $projeto_id, $id);
									}
								}
								foreach ($projetos_associados as $projeto_associado) {
									if ( !in_array( $projeto_associado, $projetos ) ) {
										$projeto_id = get_projeto_id($projetos_todos, $projeto_associado);
										remove_projeto_associado($pdo, $projeto_id, $id);
									}
								}
							} else {
								remove_todos_projetos_associados($pdo, $id);
							}

			        // Inserindo LOG da operação no banco
			        $sql_log = "INSERT INTO log (wp_username, datetime, action, page, resumo) VALUES (?, now(), 'UPDATE', 'AFILIADOS', ?)";
			        $q_log = $pdo->prepare($sql_log);

			        $current_user = wp_get_current_user();
			        $wp_username = $current_user->user_login;

			        $q_log->execute(array($wp_username, resumo($nome)));

			        Database::disconnect();
			        header("Location: /new-afiliados/");
			    }
			} else {
			    $sql = "SELECT * FROM afiliados where id = ?";
			    $q = $pdo->prepare($sql);
			    $q->execute(array($id));
			    $row = $q->fetch(PDO::FETCH_ASSOC);
					$id = $row['id'];
			    $nome = $row['nome'];
			    $nascimento = $row['nascimento'];
			    $nacionalidade = $row['nacionalidade'];
			    $telefone = $row['telefone'];
			    $celular = $row['celular'];
			    $instituicao = $row['instituicao'];
			    $cargo = $row['cargo'];
			    $supervisor = $row['supervisor'];
			    $emailLinea = $row['email_linea'];
			    $gmail = $row['gmail'];
			    $emailAlt = $row['email_alt'];
			    $cpf = $row['cpf'];
			    $identidade = $row['identidade'];
			    $orgEmissor = $row['org_emissor'];
			    $ufEmissor = $row['uf_emissor'];
			    $passaporteEstrangeiro = $row['passaporte_estrangeiro'];
			    $passaporteResidente = $row['passaporte_residente'];
			    $cpfEstrangeiroResidente = $row['cpf_estrangeiro_residente'];
			    $dataInicio = $row['data_inicio'];
			    $dataSaida = $row['data_saida'];
			    $status = $row['status'];
			    $projetos = get_projetos_associados($pdo, $id);
			    $paisAtual = $row['pais_atual'];
			    $funcao = $row['funcao'];
			    $skype = $row['skype'];

			    Database::disconnect();
			}
			?>

		    <main class="container">
		    <section>
		        <h1>Editar</h1>

		            <form action="<?php echo get_bloginfo('template_url') . '/afiliados_update.php?id=' . $id ?>" method="post">
						<!-- Nome -->
						<div class="grupo-input <?php echo !empty($nomeError)?'error':'';?>">
							<label for="titulo" class="control-label">Nome:</label>
							<input id="nome" name="nome" type="text"  placeholder="Nome" value="<?php echo !empty($nome)?$nome:'';?>">
							<?php if (!empty($nomeError)): ?>
							    <span class="errormsg"><?php echo $nomeError;?></span>
							<?php endif; ?>
						</div>
						<!-- Nascimento -->
						<div class="grupo-input <?php echo !empty($nascimentoError)?'error':'';?>">
							<label for="nascimento" class="control-label">Nascimento:</label>
							<input id="nascimento" name="nascimento" type="date" value="<?php echo !empty($nascimento)?$nascimento:'';?>">
							<?php if (!empty($nascimentoError)): ?>
							    <span class="errormsg"><?php echo $nascimentoError;?></span>
							<?php endif; ?>
						</div>
						<!-- Nacionalidade -->
						<div class="grupo-input <?php echo !empty($nacionalidadeError)?'error':'';?>">
							<label for="nacionalidade" class="control-label">Nacionalidade:</label>
							<input id="nacionalidade" name="nacionalidade" type="text" placeholder="Nacionalidade" value="<?php echo !empty($nacionalidade)?$nacionalidade:'';?>">
							<?php if (!empty($nacionalidadeError)): ?>
							    <span class="errormsg"><?php echo $nacionalidadeError;?></span>
							<?php endif; ?>
						</div>
						<!-- Telefone -->
						<div class="grupo-input">
							<label for="telefone" class="control-label">Telefone:</label>
							<input id="telefone" name="telefone" type="text"  placeholder="Telefone" value="<?php echo !empty($telefone)?$telefone:'';?>">
							<?php if (!empty($telefoneError)): ?>
							    <span class="errormsg"><?php echo $telefoneError;?></span>
							<?php endif; ?>
						</div>
						<!-- Celular -->
						<div class="grupo-input">
							<label for="celular" class="control-label">Celular:</label>
							<input id="celular" name="celular" type="text"  placeholder="Celular" value="<?php echo !empty($celular)?$celular:'';?>">
							<?php if (!empty($celularError)): ?>
							    <span class="errormsg"><?php echo $celularError;?></span>
							<?php endif; ?>
						</div>
						<!-- Instituição -->
						<div class="grupo-input">
							<label for="instituicao" class="control-label">Instituição:</label>
							<input id="instituicao" name="instituicao" type="text"  placeholder="Instituição" value="<?php echo !empty($instituicao)?$instituicao:'';?>">
							<?php if (!empty($instituicaoError)): ?>
							    <span class="errormsg"><?php echo $instituicaoError;?></span>
							<?php endif; ?>
						</div>
						<!-- Cargo -->
						<div class="grupo-input">
							<label for="cargo" class="control-label">Cargo:</label>
							<select name="cargo" id="cargo">
								<option value="Cientista" <?php echo $cargo == 'Cientista'?'selected':''; ?> >Cientista</option>
								<option value="Tecnologista" <?php echo $cargo == 'Tecnologista'?'selected':''; ?> >Tecnologista</option>
								<option value="Administrativo" <?php echo $cargo == 'Administrativo'?'selected':''; ?> >Administrativo</option>
								<option value="Graduando" <?php echo $cargo == 'Graduando'?'selected':''; ?> >Graduando</option>
								<option value="Mestrando" <?php echo $cargo == 'Mestrando'?'selected':''; ?> >Mestrando</option>
								<option value="Doutorando" <?php echo $cargo == 'Doutorando'?'selected':''; ?> >Doutorando</option>
								<option value="Pós-doutorando" <?php echo $cargo == 'Pós-doutorando'?'selected':''; ?> >Pós-doutorando</option>
							</select>
						</div>
						<!-- Projetos -->
						<div class="grupo-input">
							<label for="projeto" class="control-label">Projetos:</label>
							<?php foreach ($projetos_todos as $projeto_row): ?>
								<?php
								 	if ($projetos) {
										$checked = ( in_array($projeto_row['nome_projeto'], $projetos) )?'checked':'';
									} else {
										$checked = '';
									}
								?>
								<input type="checkbox" name="projetos[]" value="<?php echo $projeto_row['nome_projeto'] ?>" <?php echo $checked ?>>
								<span><?php echo $projeto_row['nome_projeto'] ?></span>
							<?php endforeach; ?>
						</div>
						<!-- Supervisor -->
						<div class="grupo-input">
							<label for="supervisor" class="control-label">Supervisor:</label>
							<input id="supervisor" name="supervisor" type="text"  placeholder="Supervisor" value="<?php echo !empty($supervisor)?$supervisor:'';?>">
							<?php if (!empty($supervisorError)): ?>
							    <span class="errormsg"><?php echo $supervisorError;?></span>
							<?php endif; ?>
						</div>
						<!-- email LIneA -->
						<div class="grupo-input">
							<label for="emailLinea" class="control-label">e-mail LIneA:</label>
							<input id="emailLinea" name="emailLinea" type="email"  placeholder="email do LIneA" value="<?php echo !empty($emailLinea)?$emailLinea:'';?>">
							<?php if (!empty($emailLineaError)): ?>
							    <span class="errormsg"><?php echo $emailLineaError;?></span>
							<?php endif; ?>
						</div>
						<!-- email Gmail -->
						<div class="grupo-input">
							<label for="gmail" class="control-label">Gmail:</label>
							<input id="gmail" name="gmail" type="email"  placeholder="Gmail" value="<?php echo !empty($gmail)?$gmail:'';?>">
							<?php if (!empty($gmailError)): ?>
							    <span class="errormsg"><?php echo $gmailError;?></span>
							<?php endif; ?>
						</div>
						<!-- email Alternativo -->
						<div class="grupo-input">
							<label for="emailAlt" class="control-label">e-mail Alternativo:</label>
							<input id="emailAlt" name="emailAlt" type="email"  placeholder="email Alternativo" value="<?php echo !empty($emailAlt)?$emailAlt:'';?>">
							<?php if (!empty($emailAltError)): ?>
							    <span class="errormsg"><?php echo $emailAltError;?></span>
							<?php endif; ?>
						</div>
						<!-- CPF -->
						<div class="grupo-input">
							<label for="cpf" class="control-label">CPF:</label>
							<input id="cpf" name="cpf" type="text"  placeholder="cpf" value="<?php echo !empty($cpf)?$cpf:'';?>">
							<?php if (!empty($cpfError)): ?>
							    <span class="errormsg"><?php echo $cpfError;?></span>
							<?php endif; ?>
						</div>
						<!-- identidade -->
						<div class="grupo-input">
							<label for="identidade" class="control-label">Identidade:</label>
							<input id="identidade" name="identidade" type="text"  placeholder="Identidade" value="<?php echo !empty($identidade)?$identidade:'';?>">
							<?php if (!empty($identidadeError)): ?>
							    <span class="errormsg"><?php echo $identidadeError;?></span>
							<?php endif; ?>
						</div>
						<!-- Orgão Emissor -->
						<div class="grupo-input">
							<label for="orgEmissor" class="control-label">Orgão Emissor:</label>
							<input id="orgEmissor" name="orgEmissor" type="text"  placeholder="Orgão Emissor" value="<?php echo !empty($orgEmissor)?$orgEmissor:'';?>">
							<?php if (!empty($orgEmissorError)): ?>
							    <span class="errormsg"><?php echo $orgEmissorError;?></span>
							<?php endif; ?>
						</div>
						<!-- UF Emissor -->
						<div class="grupo-input">
							<label for="ufEmissor" class="control-label">UF Emissor:</label>
							<input id="ufEmissor" name="ufEmissor" type="text"  placeholder="UF Emissor" value="<?php echo !empty($ufEmissor)?$ufEmissor:'';?>">
							<?php if (!empty($ufEmissorError)): ?>
							    <span class="errormsg"><?php echo $ufEmissorError;?></span>
							<?php endif; ?>
						</div>
						<!-- Passaporte Estrangeiro -->
						<div class="grupo-input">
							<label for="passaporteEstrangeiro" class="control-label">Passaporte Estrangeiro:</label>
							<input id="passaporteEstrangeiro" name="passaporteEstrangeiro" type="text"  placeholder="Passaporte Estrangeiro" value="<?php echo !empty($passaporteEstrangeiro)?$passaporteEstrangeiro:'';?>">
							<?php if (!empty($passaporteEstrangeiroError)): ?>
							    <span class="errormsg"><?php echo $passaporteEstrangeiroError;?></span>
							<?php endif; ?>
						</div>
						<!-- Passaporte Residente -->
						<div class="grupo-input">
							<label for="passaporteResidente" class="control-label">Passaporte Residente:</label>
							<input id="passaporteResidente" name="passaporteResidente" type="text"  placeholder="Passaporte Residente" value="<?php echo !empty($passaporteResidente)?$passaporteResidente:'';?>">
							<?php if (!empty($passaporteResidenteError)): ?>
							    <span class="errormsg"><?php echo $passaporteResidenteError;?></span>
							<?php endif; ?>
						</div>
						<!-- CPF Estrangeiro Residente -->
						<div class="grupo-input">
							<label for="cpfEstrangeiroResidente" class="control-label">CPF Estrangeiro Residente:</label>
							<input id="cpfEstrangeiroResidente" name="cpfEstrangeiroResidente" type="text"  placeholder="CPF Estrangeiro Residente" value="<?php echo !empty($cpfEstrangeiroResidente)?$cpfEstrangeiroResidente:'';?>">
							<?php if (!empty($cpfEstrangeiroResidenteError)): ?>
							    <span class="errormsg"><?php echo $cpfEstrangeiroResidenteError;?></span>
							<?php endif; ?>
						</div>
						<!-- Data Início -->
						<div class="grupo-input <?php echo !empty($dataInicioError)?'error':'';?>">
							<label for="dataInicio" class="control-label">Data Início:</label>
							<input id="dataInicio" name="dataInicio" type="date" value="<?php echo !empty($dataInicio)?$dataInicio:'';?>">
							<?php if (!empty($dataInicioError)): ?>
							    <span class="errormsg"><?php echo $dataInicioError;?></span>
							<?php endif; ?>
						</div>
						<!-- Data Saída -->
						<div class="grupo-input <?php echo !empty($dataSaidaError)?'error':'';?>">
							<label for="dataSaida" class="control-label">Data Saída:</label>
							<input id="dataSaida" name="dataSaida" type="date" value="<?php echo !empty($dataSaida)?$dataSaida:'';?>">
							<?php if (!empty($dataSaidaError)): ?>
							    <span class="errormsg"><?php echo $dataSaidaError;?></span>
							<?php endif; ?>
						</div>
						<!-- Status -->
						<div class="grupo-input">
							<label for="status" class="control-label">Status:</label>
							<select name="status" id="status">
								<option value="Ativo" <?php echo $status == 'Ativo'?'selected':''; ?> >Ativo</option>
								<option value="Inativo" <?php echo $status == 'Inativo'?'selected':''; ?> >Inativo</option>
							</select>
						</div>
						<!-- País Atual -->
						<div class="grupo-input">
							<label for="paisAtual" class="control-label">País Atual:</label>
							<input id="paisAtual" name="paisAtual" type="text"  placeholder="País Atual" value="<?php echo !empty($paisAtual)?$paisAtual:'';?>">
							<?php if (!empty($paisAtualError)): ?>
							    <span class="errormsg"><?php echo $paisAtualError;?></span>
							<?php endif; ?>
						</div>
						<!-- Função -->
						<div class="grupo-input">
							<label for="funcao" class="control-label">Função:</label>
							<input id="funcao" name="funcao" type="text"  placeholder="Função" value="<?php echo !empty($funcao)?$funcao:'';?>">
							<?php if (!empty($funcaoError)): ?>
							    <span class="errormsg"><?php echo $funcaoError;?></span>
							<?php endif; ?>
						</div>
						<!-- skype -->
						<div class="grupo-input">
							<label for="skype" class="control-label">Skype:</label>
							<input id="skype" name="skype" type="text"  placeholder="Skype" value="<?php echo !empty($skype)?$skype:'';?>">
							<?php if (!empty($skypeError)): ?>
							    <span class="errormsg"><?php echo $skypeError;?></span>
							<?php endif; ?>
						</div>


		              	<div class="form-actions">
		                  <button type="submit" class="btn">Atualizar</button>
		                  <a class="btn" href="/new-afiliados/">Voltar</a>
		                </div>
		            </form>
		    </section>
		    </main>
	</div>
	<div class="clearboth"></div>
<?php get_footer(); ?>
