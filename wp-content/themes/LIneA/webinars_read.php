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
	<div id="content" class="conteudo read page" role="main">
			<?php
				require 'database.php';
				$id = null;

				if (!empty($_GET['id'])) {
					$id = $_REQUEST['id'];
				}
			
			    // read data
			    if ($id != null) {
			        $pdo = Database::connect();
			        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			        $sql = "SELECT * from afiliados WHERE id = ?";
			        $q = $pdo->prepare($sql);
			        $q->execute(array($id));
			        $result = $q->fetchAll();
			        $row = $result[0];
			        Database::disconnect();
			    }
			
			?>

		    <main class="container">
		    <section>
		        <h1>Descrição</h1>
		        <?php
		        	echo '<p><strong>Nome:</strong> ' . $row['nome'] . '</p>';
		        	echo '<p><strong>Nascimento:</strong> ' . $row['nascimento'] . '</p>';
		        	echo '<p><strong>Nacionalidade:</strong> ' . $row['nacionalidade'] . '</p>';
		        	echo '<p><strong>Telefone:</strong> ' . $row['telefone'] . '</p>';
		        	echo '<p><strong>Celular:</strong> ' . $row['celular'] . '</p>';
		        	echo '<p><strong>Instituição:</strong> ' . $row['instituicao'] . '</p>';
		        	echo '<p><strong>Cargo:</strong> ' . $row['cargo'] . '</p>';
		        	echo '<p><strong>Supervisor:</strong> ' . $row['supervisor'] . '</p>';
		        	echo '<p><strong>e-mail LIneA:</strong> ' . $row['email_linea'] . '</p>';
		        	echo '<p><strong>e-mail Gmail:</strong> ' . $row['gmail'] . '</p>';
		        	echo '<p><strong>e-mail Alternativo:</strong> ' . $row['email_alt'] . '</p>';
		        	echo '<p><strong>CPF:</strong> ' . $row['cpf'] . '</p>';
		        	echo '<p><strong>Identidade:</strong> ' . $row['identidade'] . '</p>';
		        	echo '<p><strong>Orgão Emissor:</strong> ' . $row['org_emissor'] . '</p>';
		        	echo '<p><strong>UF Emissor:</strong> ' . $row['uf_emissor'] . '</p>';
		        	echo '<p><strong>Passaporte Estrangeiro:</strong> ' . $row['passaporte_estrangeiro'] . '</p>';
		        	echo '<p><strong>Passaporte Residente:</strong> ' . $row['passaporte_residente'] . '</p>';
		        	echo '<p><strong>CPF Estrangeiro Residente:</strong> ' . $row['cpf_estrangeiro_residente'] . '</p>';
		        	echo '<p><strong>Data de início:</strong> ' . $row['data_inicio'] . '</p>';
		        	echo '<p><strong>Data de saída:</strong> ' . $row['data_saida'] . '</p>';
		        	echo '<p><strong>Status:</strong> ' . $row['status'] . '</p>';
		        	echo '<p><strong>Projeto:</strong> ' . $row['projeto'] . '</p>';
		        	echo '<p><strong>País Atual:</strong> ' . $row['pais_atual'] . '</p>';
		        	echo '<p><strong>Função:</strong> ' . $row['funcao'] . '</p>';
		        	echo '<p><strong>Skype:</strong> ' . $row['skype'] . '</p>';
		        ?>																					
              	<div>
                  <a class="btn" href="<?php echo get_bloginfo('template_url') . '/afiliados_update.php?id=' . $id ?>">Editar</a>
                  <a class="btn" href="/new-afiliados/">Voltar</a>
                </div>	        
		    </section>
		    </main>
	</div>
	<div class="clearboth"></div>
<?php get_footer(); ?>