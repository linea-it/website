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
	<div id="content" class="conteudo delete page" role="main">
			<?php
				require 'database.php';

			$id = null;
			if ( !empty($_GET['id'])) {
			    $id = $_REQUEST['id'];
			}
			
			if ( !empty($_POST)) {
		    	$id = $_POST['id'];

		        $pdo = Database::connect();
		        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        $sql = "DELETE from publicacoes WHERE id = ?";
		        $q = $pdo->prepare($sql);
		        $q->execute(array($id));

		        // Inserindo LOG da operação no banco
		        $sql_log = "INSERT INTO log (wp_username, datetime, action, page) VALUES (?, now(), 'DELETE', 'PUBLICACOES')";
		        $q_log = $pdo->prepare($sql_log);
		        
		        $current_user = wp_get_current_user();
		        $wp_username = $current_user->user_login;
				
		        $q_log->execute(array($wp_username));

		        Database::disconnect();
		        header("Location: /new-publicacoes/");
			}
			?>

		    <main class="container">
		    <section>
		        <h1>Delete</h1>
		           
		            <form action="<?php echo get_bloginfo('template_url') . '/public_delete.php'; ?>" method="post">
						<div class="grupo-input">
							<input name="id" type="hidden" value="<?php echo $id; ?>">
							<p> Tem certeza que quer deletar? </p>
						</div>																						
		              	<div class="form-actions">
		                  <button type="submit" class="btn">Sim</button>
		                  <a class="btn" href="/new-publicacoes/">Não</a>
		                </div>
		            </form>
		    </section>
		    </main>
	</div>
	<div class="clearboth"></div>
<?php get_footer(); ?>