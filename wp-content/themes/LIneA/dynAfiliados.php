<?php
/*
Template Name: Afiliados
*/
?>

<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
	<div id="content" class="conteudo afiliados" role="main">
		<h1>Afiliados</h1>

		<?php
	    	include 'database.php';
	    	$pdo = Database::connect();
	    	$sql = 'SELECT * FROM afiliados ORDER BY nome COLLATE utf8_unicode_ci';
	    	$prep = $pdo->prepare($sql);
	    	$prep->execute();
	    	$result = $prep->fetchAll();
	    	$ativos = array();
	    	$inativos = array();

	    	Database::disconnect();
	    	if (is_user_logged_in()) {
	       		$login = 'ativado';
	       	} else {
	       		$login = 'desativado';
	       	}
	       	
	       	echo (is_user_logged_in() ? '<a class="btn" href="'. get_bloginfo('template_url') .'/afiliados_create.php"> Adicionar </a>' : '');


	    	foreach ($result as $row) {
	    		if (strtoupper($row['status']) == 'ATIVO'){
	    			array_push($ativos, $row);
	    		} else {
	    			array_push($inativos, $row);
	    		}
	    	}

	    	// Função para trocar @ por imagem
	    	$at_img_url = get_bloginfo('template_url') . '/imagens/at2.png';

	    	function esconde_email ($img_url, $email) {
	    		$at_img_tag = '<img src="' . $img_url . '"/>';
	    		return str_replace("@", $at_img_tag, $email);
	    	}

	    	// Afiliados ativos

	    	echo '<h3>Afiliados</h3>';
	    	echo '<table class="card">';
	    	echo '<thead>';
	    	echo '<tr>';
	    	echo '<th>Nome <span class="countnum card">' . sprintf("%02d", count($ativos)) . '</span></th>';
	    	echo '<th>Posição</th>';
	    	echo '<th>Instituição</th>';
	    	echo '<th>e-mail</th>';
	    	echo '</tr>';
	    	echo '</thead>';
	    	echo '<tbody>';
	    	foreach ($ativos as $row) {
	    		echo '<tr>';
	    		echo '<td>' . $row['nome'] . '<a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/afiliados_read.php?id='. $row['id'] .'" title="Descrição"><img src="' . get_bloginfo('template_url') . '/imagens/ic_description_white_24dp_2x.png" alt="Read icon"/></a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/afiliados_update.php?id='. $row['id'] .'" title="Editar"><img src="' . get_bloginfo('template_url') . '/imagens/ic_create_white_24dp_2x.png" alt="Edit icon"/></a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/afiliados_delete.php?id='. $row['id'] .'" title="Apagar"><img src="' . get_bloginfo('template_url') . '/imagens/ic_remove_circle_outline_white_24dp_2x.png" alt="Remove icon"/></a></td>';
	    		echo '<td>' . $row['cargo'] . '</td>';
	    		echo '<td>' . $row['instituicao'] . '</td>';

	    		if ($row['email_linea'] != '') {
	    			echo '<td>' . esconde_email($at_img_url, $row['email_linea']) . '</td>';
	    		} else if ($row['gmail'] != '') {
	    			echo '<td>' . esconde_email($at_img_url, $row['gmail']) . '</td>';
	    		} else {
	    			echo '<td>' . esconde_email($at_img_url, $row['email_alt']) . '</td>';	
	    		}
	    		echo '</tr>';
	    	}
	    	echo '</tbody>';
	    	echo '</table>';	    	

	    	// Afiliados inativos

	    	echo '<h3>Ex afiliados</h3>';
	    	echo '<table class="card">';
	    	echo '<thead>';
	    	echo '<tr>';
	    	echo '<th>Nome <span class="countnum card">' . sprintf("%02d", count($inativos)) . '</span></th>';
	    	echo '<th>Posição</th>';
	    	echo '<th>Instituição</th>';
	    	echo '</tr>';
	    	echo '</thead>';
	    	echo '<tbody>';
	    	foreach ($inativos as $row) {
	    		echo '<tr>';
	    		echo '<td>' . $row['nome'] . '<a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/afiliados_read.php?id='. $row['id'] .'" title="Descrição"><img src="' . get_bloginfo('template_url') . '/imagens/ic_description_white_24dp_2x.png" alt="Read icon"/></a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/afiliados_update.php?id='. $row['id'] .'" title="Editar"><img src="' . get_bloginfo('template_url') . '/imagens/ic_create_white_24dp_2x.png" alt="Edit icon"/></a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/afiliados_delete.php?id='. $row['id'] .'" title="Apagar"><img src="' . get_bloginfo('template_url') . '/imagens/ic_remove_circle_outline_white_24dp_2x.png" alt="Remove icon"/></a></td>';
	    		echo '<td>' . $row['cargo'] . '</td>';
	    		echo '<td>' . $row['instituicao'] . '</td>';
	    		echo '</tr>';
	    	}
	    	echo '</tbody>';
	    	echo '</table>';


	           
        ?>

	
				
	</div><div class="clearboth"></div>
<?php get_footer(); ?>