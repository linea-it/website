<?php
/*
Template Name: Publicacoes
*/
?>

<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
	<div id="content" class="conteudo publicacoes" role="main">
		<h1>Publicações</h1>

		<?php
	    	include 'database.php';
	    	$pdo = Database::connect();
	    	$sql = 'SELECT * FROM publicacoes ORDER BY ano DESC, link DESC, status';
	    	$prep = $pdo->prepare($sql);
	    	$prep->execute();
	    	$result = $prep->fetchAll();
	    	$submetidos = array();
	    	$aceitos = array();
	    	$publicados = array();

	    	Database::disconnect();
	    	if (is_user_logged_in()) {
	       		$login = 'ativado';
	       	} else {
	       		$login = 'desativado';
	       	}
	    	echo '<h3>Publicações com participação de afiliados ao LIneA (2008 – Presente) <span class="countnum card">' . sprintf("%02d", count($result)) . '</h3>'; 
	       	
	       	echo (is_user_logged_in() ? '<a class="btn" href="'. get_bloginfo('template_url') .'/public_create.php"> Adicionar </a>' : '');


	    	foreach ($result as $row) {
	    		if ($row['status'] == 'submetido'){
	    			array_push($submetidos, $row);
	    		} elseif ($row['status'] == 'publicado'){
	    			array_push($publicados, $row);
	    		} else {
	    			array_push($aceitos, $row);
	    		}
	    	}

	    	// Submetidos

	    	echo '<h3>Submetidos <span class="countnum card">' . sprintf("%02d", count($submetidos)) . '</span></h3>';
	    	echo '<ol>';
	    	foreach ($submetidos as $row) {
	    		if ($row['link'] == ''){
	    			$link = '';
	    			$link_class = 'desativado';
	    		} else {
	    			$link = $row['link'];
	    			$link_class = 'ativado';
	    		}
	    		echo '<li><em>' . $row['titulo'] . ' ' . $row['autor'] . ' <strong>' . $row['ano'] . '</strong>, <strong>' . $row['revista'] .
	    		'</strong>.</em> <a class=' . $link_class . ' href=' . $link . '> arXiv </a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/public_update.php?id='. $row['id'] .'"><img src="' . get_bloginfo('template_url') . '/imagens/ic_create_white_24dp_2x.png" alt="Edit icon"/></a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/public_delete.php?id='. $row['id'] .'"><img src="' . get_bloginfo('template_url') . '/imagens/ic_remove_circle_outline_white_24dp_2x.png" alt="Remove icon"/></a></li>';
	    	}
	    	echo '</ol>';	    	

	    	// Aceitos

	    	echo '<h3>Aceitos <span class="countnum card">' . sprintf("%02d", count($aceitos)) . '</span></h3>';
	    	echo '<ol>';
	    	foreach ($aceitos as $row) {
	    		if ($row['link'] == ''){
	    			$link = '';
	    			$link_class = 'desativado';
	    		} else {
	    			$link = $row['link'];
	    			$link_class = 'ativado';
	    		}
	    		echo '<li><em>' . $row['titulo'] . ' ' . $row['autor'] . ' <strong>' . $row['ano'] . '</strong>, <strong>' . $row['revista'] .
	    		'</strong>.</em> <a class=' . $link_class . ' href=' . $link . '> arXiv </a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/public_update.php?id='. $row['id'] .'"><img src="' . get_bloginfo('template_url') . '/imagens/ic_create_white_24dp_2x.png" alt="Edit icon"/></a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/public_delete.php?id='. $row['id'] .'"><img src="' . get_bloginfo('template_url') . '/imagens/ic_remove_circle_outline_white_24dp_2x.png" alt="Remove icon"/></a></li>';
	    	}
	    	echo '</ol>';	    	

	    	// Publicados

	    	echo '<h3>Publicados <span class="countnum card">' . sprintf("%02d", count($publicados)) . '</span></h3>';
	    	echo '<ol>';
	    	foreach ($publicados as $row) {
	    		if ($row['link'] == ''){
	    			$link = '';
	    			$link_class = 'desativado';
	    		} else {
	    			$link = $row['link'];
	    			$link_class = 'ativado';
	    		}
	    		echo '<li><em>' . $row['titulo'] . ' ' . $row['autor'] . ' <strong>' . $row['ano'] . '</strong>, <strong><a class=' . $link_class . ' href=' . $link .
	    		'>'. $row['revista'] . '</a></strong>, ' . $row['numpagina'] . '.</em><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/public_update.php?id='. $row['id'] .'"><img src="' . get_bloginfo('template_url') . '/imagens/ic_create_white_24dp_2x.png" alt="Edit icon"/></a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/public_delete.php?id='. $row['id'] .'"><img src="' . get_bloginfo('template_url') . '/imagens/ic_remove_circle_outline_white_24dp_2x.png" alt="Remove icon"/></a></li>';
	    	}
	    	echo '</ol>';
	           
        ?>

	
				
	</div><div class="clearboth"></div>
<?php get_footer(); ?>