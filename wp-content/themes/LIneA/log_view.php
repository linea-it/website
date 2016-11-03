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
				
		        $pdo = Database::connect();
		        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        $sql = "SELECT * from log ORDER BY datetime DESC";
		        $q = $pdo->prepare($sql);
		        $q->execute();
		        $result = $q->fetchAll();
		        Database::disconnect();
			   
			
			?>

		    <main class="container">
		    <section>
		        <h1>Log</h1>
		        <?php
		        	echo '<table class="card">';
	        		echo '<thead>';
	        		echo '<tr>';
	        		echo '<th>Datetime</th>';
	        		echo '<th>User</th>';
	        		echo '<th>Action</th>';
	        		echo '<th>Page</th>';
	        		echo '<th>Resumo</th>';
	        		echo '</tr>';
	        		echo '</thead>';
	        		echo '<tbody>';
		        	foreach ($result as $row) {
		        		echo '<tr>';
		        		echo '<td>' . $row['datetime'] . '</td>';
		        		echo '<td>' . $row['wp_username'] . '</td>';
		        		echo '<td>' . $row['action'] . '</td>';
		        		echo '<td>' . $row['page'] . '</td>';
		        		echo '<td>' . $row['resumo'] . '</td>';
		        		echo '</tr>';
		        	}
		        	echo '</tbody>';
		        	echo '</table>';
		        ?>																					
              	<div>
                  
                  <a class="btn" href="/seminarios/">Voltar</a>
                </div>	        
		    </section>
		    </main>
	</div>
	<div class="clearboth"></div>
<?php get_footer(); ?>