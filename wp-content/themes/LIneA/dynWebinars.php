<?php
/*
Template Name: Webinars
*/
?>
<?php get_header(); ?>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php get_sidebar(); ?>
<div class="clearboth"></div>
	<div id="content" class="conteudo webinars" role="main">
		<h1>Webinars</h1>

		<?php
	    	include 'database.php';
	    	require 'lineadb.php';
	    	require 'ytb_functions.php';

	    	$pdo = Database::connect();
	    	$sql = 'SELECT * FROM webinars ORDER BY data DESC';
	    	$prep = $pdo->prepare($sql);
	    	$prep->execute();
	    	$result = $prep->fetchAll();

	    	Database::disconnect();

	    	if (is_user_logged_in()) {
	       		$login = 'ativado';
	       	} else {
	       		$login = 'desativado';
	       	}
	    	echo '<p>
	    		Since 2011 we promote webinars which are an important aspect of our personnel development. This allows collaborators anywhere in the world to join seminars about the latest developments in several astronomical and technical fields. Webinars are presented in english and announced to a mailing list. Click <a href="' . MAILCHIMP_SUBS . '">here</a> if you want to subscribe.
 
	    	</p>'; 
	       	
	       	echo (is_user_logged_in() ? '<a class="btn" href="'. get_bloginfo('template_url') .'/webinars_create.php"> Adicionar </a>' : '');
	       	echo (is_user_logged_in() ? '<a class="btn" href="'. get_bloginfo('template_url') .'/log_view.php"> Exibir Log </a>' : '');

	       	function showWebinarSumary($row, $login) {
	       		$data = date('d/m', strtotime($row['data']));
	       		$horario = date('h:i a', strtotime($row['horario']));
	       		echo '<div class="webinar-sumary">';
	       		// icones
	       		echo '<span class="group-icon"><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/webinars_update.php?id='. $row['id'] .'"><img src="' . get_bloginfo('template_url') . '/imagens/ic_create_white_24dp_2x.png" alt="Edit icon"/></a><a class="icon ' . $login . '" href="'. get_bloginfo('template_url') .'/webinars_delete.php?id='. $row['id'] .'"><img src="' . get_bloginfo('template_url') . '/imagens/ic_remove_circle_outline_white_24dp_2x.png" alt="Remove icon"/></a></span>';
	       		// imagem
	       		echo '<img class="speaker-photo" src="' . FOTO_URL . $row['foto'] . '" />';
	       		// data e hora
	       		echo '<p><span class="data">' . $data . '</span> - <span class="hora">' . $horario . ' BRT </span></p>';
	       		// nome e instituicao
	       		echo '<p><span class="nome">' . $row['nome'] . ' ' . $row['sobrenome'] . '</span><span class="instituicao"> ( ' . $row['instituicao'] . ' )</span></p>';
	       		// titulo
	       		echo '<p class="titulo">' . $row['titulo'] . '</p>';
	       		echo '<div class="clearboth"></div>';
	       		// Tabs
	       		echo '<ul class="tab">';
	       		echo '<li><a class="tablinks" onclick="openTab(event, \'resumo\')">Abstract</a></li>';
	       		echo '<li><a class="tablinks" onclick="openTab(event, \'apresentacao\')">Presentation</a></li>';
	       		echo '<li><a class="tablinks" onclick="openTab(event, \'video\')">Video</a></li>';
	       		echo '</ul>';
	       		// div apresentacao
	       		echo '<div id="apresentacao" class="tabcontent hide">';
	       		if ( !empty($row['apresentacao']) ) {
	       			echo '<p><a class="apresentacao" href="' . APRESENTACAO_URL . $row['apresentacao'] .'" >' . $row['apresentacao'] . '</a></p>';
	       		}
	       		echo '</div>';
	       		// div video
	       		echo '<div id="video" class="tabcontent hide">';
	       		if ( !empty($row['video']) ) {
	       			$ytbID = getID($row['video']);
	       			echo '<div class="ytb-video">';
	       			echo '<img class="ytb-thumb" src="http://img.youtube.com/vi/' . $ytbID . '/hqdefault.jpg"/>';
	       			echo '<a class="ytb-icon-link" onclick="loadYtbVideo(event, \'' . $ytbID . '\')"><img class="ytb-icon" src="' . get_bloginfo('template_url') . '/imagens/YouTube-icon-full_color.png"/></a>';
	       			echo '</div>';
				}
	       		echo '</div>';
	       		// div resumo
	       		echo '<div id="resumo" class="tabcontent hide">';
	       		if ( !empty($row['resumo']) ) {
	       			echo '<p class="resumo">' . $row['resumo'] . '</p>';
	       		}
	       		echo '</div>';
	       		echo '</div>';
	       	}

	       	function isInTheFuture($stringDate, $stringTime){
	       		$data = strtotime($stringDate);
	       		$dia = date('d', $data);
	       		$h = strtotime($stringTime);
	       		return ( (date('Y-m-d', $data) > date('Y-m-d')) || 
	       			(date('Y-m-d', $data) == date('Y-m-d')) && 
	       			(date('H:i', strtotime('-1hour')) <= date('H:i', $h)) );
	       	}

	       	// Preparando os arrays com seminário e speakers
	        $futureWebinars = array();
	        $pastWebinars = array();
	        $speakers = array();
	        $speakersUnique = array();

	        foreach ($result as $row) {

	        	array_push($speakers, $row['nome'] . ' ' . $row['sobrenome']);

	        	$hora = date('H', $h);
	        	if ( isInTheFuture($row['data'], $row['horario']) ) {
	        		array_push($futureWebinars, $row);
	        	} else {
	        		array_push($pastWebinars, $row);
	        	}
	        }

	        sort($speakers);
	        $speakersUnique = array_unique($speakers);


	        // Select
	        
	        echo '<select class="speakers-sel" onchange="speakerSearch(event)">';
	        echo '<option value="All">All</option>';
	        foreach ($speakersUnique as $nome) {
	        	echo '<option value="' . $nome . '">' . $nome . '</option>';
	        }
	        echo '</select>';


	        //
	        // Busca
	        //
	        echo '<div class="searchdiv">';
	        // echo '<form>';
	        echo '<input type="search" name="inputsearch" onchange="webinarSearch(event)"><span class="search-icon"><img src="' . get_bloginfo('template_url') . '/imagens/ic_search_white_24dp_2x.png" alt="Search icon"/></span>';
	        // echo '</form>';
	        echo '</div>';




	        //
	        // Seletor de speakers
	        //
	        
	        echo '<h3> Speakers <span class="countnum card">' . sprintf("%02d", count($speakersUnique)) . '</span></h3>';

	        // Carrossel

	        foreach (range(date('Y'), 2011, -1) as $ano) {
	        	echo '<a class="year-link ', $ano == date('Y') ? 'active':'', '" href="#' . $ano . '">' . $ano . '</a>';
	        }

	        echo '<div class="owl-carousel owl-theme">';
	        foreach (range(date('Y'), 2011, -1) as $ano) {
	        	$ano_array = array();
	        	$count = 0;
	        	foreach ($result as $row) {
	        		if ( date('Y', strtotime($row['data'])) == $ano && !isInTheFuture($row['data'], $row['horario']) ) {
	        			array_push($ano_array, $row);
	        			$count += 1;
	        		}
	        	}
	        	echo '<div class="item-div" data-hash="' . $ano . '">';
	        	echo '<p class="year">' . $ano . '</p>';
	        	echo '</div>';

	        	foreach ($ano_array as $row) {
		        	echo '<div class="item-div">';
		        	echo '<div class="thumb">';
		        	echo '<img src="' . FOTO_URL . $row['foto'] . '" />';
		        	echo '</div>';
		        	echo '<p>' . $row['nome'] . ' ' . $row['sobrenome'] . '</p>';
		        	echo '</div>';
	        	}
	        }
	        echo '</div>';
	        

	        //
	        // Webinars futuros
	        //
	        echo '<h3> Scheduled webinars </h3>';
	        $rev = array_reverse($futureWebinars);
	        foreach ($rev as $row) {
	        	showWebinarSumary($row, $login);
	        }


	        //
	        // Webinars antigos
	        //
	        echo '<h2> Past webinars </h2>';

	        foreach (range(date('Y'), 2011, -1) as $ano) {
	        	$ano_array = array();
	        	$count = 0;
	        	foreach ($pastWebinars as $row) {
	        		if (date('Y', strtotime($row['data'])) == $ano) {
	        			array_push($ano_array, $row);
	        			$count += 1;
	        		}
	        	}
	        	echo '<h2>' . $ano . ' <span class="countnum card">' . sprintf("%02d", $count) . '</span></h2>';
	        	foreach ($ano_array as $row) {
	        		showWebinarSumary($row, $login);
	        	}
	        }
        ?>

	
				
	</div><div class="clearboth"></div>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/owl-carousel.js"></script>
<?php get_footer(); ?>